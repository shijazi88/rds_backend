<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Validation\ValidationException;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Box;
use App\Models\ClientAddress;
use App\Models\OrderHistory;
use App\Models\Order;
use App\Models\Client;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Cache;
use App\Models\SmsOtp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Support\Facades\Notification;
class BoxController extends Controller
{
    public function getBoxes()
    {
        $boxesList = [
            [
                "title" => "Basic",
                "descrption" => "Lorem ipsum text",
                "price" => 200,
            ],
            [
                "title" => "Premium",
                "descrption" => "Lorem ipsum text",
                "price" => 650,
            ],
        ];
        return $this->response(true,'success',$boxesList);
    }

    public function groupByPrice()
    {
        $boxesGroupedByPrice = Box::select('price', \DB::raw('count(*) as count'))
            ->where('status','enabled')
            ->groupBy('price')
            ->orderBy('price')
            ->get();
        return $this->response(true,'success',$boxesGroupedByPrice);
    }

    public function memberBoxes(Request $request){

        $client = Auth::guard('api')->user();
        return $this->response(true,'success',$client->boxes);
    }
    public function buyBox2(Request $request)
    {

        try {
            $data = $request->only(['address_id']);
            $rules = [
                'address_id' => 'required|numeric',
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return $this->response(false,$this->validationHandle($validator->messages()));
            } else{
                $client = Auth::guard('api')->user();
                // Find an available box (assuming 'available' is a valid status)
                $availableBox = Box::where('status', 'enabled')->first();
        
                if (!$availableBox) {
                    return $this->response(false,'No available boxes found',$availableBox);
                    // return response()->json(['message' => 'No available boxes found'], 404);
                }
        
                // Assign the box to the client and update its status
                // $availableBox->address_id = $request->address_id;
                $availableBox->client_id = $client->id;
                $availableBox->status = 'assigned';
                $availableBox->save();
                return $this->response(true,'success',$availableBox);
            }
        } catch (Exception $e) {
            return $this->response(false,'system error');
        }
       
    }


    public function buyBox(Request $request)
    {
        try {
            $data = $request->only(['address_id']);
            $rules = [
                'address_id' => 'required|numeric',
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return $this->response(false, $this->validationHandle($validator->messages()));
            } else {
                $client = Auth::guard('api')->user();

                // Check if there's a box assigned to the client with status 'assigned'
                $assignedBox = Box::where('client_id', $client->id)
                ->where('status', 'assigned')
                ->first();

                if ($assignedBox) {
                // If a box is assigned, change its status to 'paid'
                $assignedBox->status = 'paid';
                $assignedBox->save();

                // Create an order
                $order = new Order();
                $order->client_id = $client->id;
                $order->box_id = $assignedBox->id;
                $order->amount_before_vat = $assignedBox->price;
                $order->address_id = $request->address_id;
                $order->delivery_date = now(); // Adjust this according to your logic
                $order->status = 'created';

                $order->vat = $assignedBox->price * 0.15; // Calculate vat
                $order->discount = 0; // Provide a default value for discount
                $order->amount_after_vat = $assignedBox->price * 1.15; // Calculate amount_after_vat

                $order->save();

                $client->notify(new OrderCreatedNotification($order));

                // Save order history
                $this->logOrderHistory($order, $order->status);


                return $this->response(true, 'success', $order);
            } else {
                return $this->response(false, 'No box assigned to the client, please try again');
            }


                // Find an available box (assuming 'available' is a valid status)
                // $availableBox = Box::where('status', 'enabled')->first();

                // if (!$availableBox) {
                //     return $this->response(false, 'No available boxes found', $availableBox);
                // }

                // // Assign the box to the client and update its status
                // $availableBox->client_id = $client->id;
                // $availableBox->status = 'paid';
                // $availableBox->save();

                // // Create an order
                // $order = new Order();
                // $order->client_id = $client->id;
                // $order->box_id = $availableBox->id;
                // $order->amount_before_vat = $request->address_id;
                // $order->address_id = $request->address_id;
                // $order->delivery_date = now(); // Adjust this according to your logic
                // $order->status = 'created';

                // $order->amount_before_vat =  $availableBox->price; // Provide a default value for amount_before_vat
                // $order->vat = $availableBox->price * 0.15; // Provide a default value for vat
                // $order->discount = 0; // Provide a default value for discount
                // $order->amount_after_vat = $availableBox->price*1.15; // Provide a default value for amount_after_vat
                
                // $order->save();

                // $client->notify(new OrderCreatedNotification($order));

                // return $this->response(true, 'success', $order);
            }
        } catch (Exception $e) {
            return $this->response(false, 'System error');
        }
    }

    public function getOrderHistory($orderId)
    {
        try {
            $order = Order::findOrFail($orderId);
            $orderHistory = $order->orderHistories()->orderBy('created_at', 'asc')->get();

            return $this->response(true, 'Order history retrieved', $orderHistory);
        } catch (Exception $e) {
            return $this->response(false, 'System error');
        }
    }


    public function assignBoxToClient(Request $request)
    {
        try {
            $data = $request->only(['address_id']);
            $rules = [
                // 'address_id' => 'required|numeric',
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return $this->response(false, $this->validationHandle($validator->messages()));
            } else {
                $client = Auth::guard('api')->user();

                // Check if the client already has an assigned box
                $assignedBox = Box::where('client_id', $client->id)
                                ->where('status', 'assigned')
                                ->first();

                if ($assignedBox) {
                    return $this->response(true, 'Client already has an assigned box', $assignedBox);
                }

                // If no assigned box found, find an available box
                $availableBox = Box::where('status', 'enabled')->first();

                if (!$availableBox) {
                    return $this->response(false, 'No available boxes found', $availableBox);
                }

                // Assign the box to the client and update its status
                $availableBox->client_id = $client->id;
                $availableBox->status = 'assigned';
                $availableBox->save();

                return $this->response(true, 'success', $availableBox);
            }
        } catch (Exception $e) {
            return $this->response(false, 'System error');
        }
    }



    public function verify(Request $request)
    {

        try {
            $data = $request->only(['box_id']);
            $rules = [
                'box_id' => 'required|numeric',
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return $this->response(false,$this->validationHandle($validator->messages()));
            } else{
                $client = Auth::guard('api')->user();
                $availableBox = Box::find( $request->box_id);
                $reference_number = 'ssskhflasd';
                $availableBox->status = 'paid';
                $availableBox->save();
                return $this->response(true,'success',$reference_number);
            }
        } catch (Exception $e) {
            return $this->response(false,'system error');
        }
       
    }

    protected function logOrderHistory($order, $status)
    {
        // Check if an order history record already exists for the given order and status
        $existingHistory = OrderHistory::where('order_id', $order->id)
                                    ->where('status', $status)
                                    ->first();

        // If an existing history record is found, do not add a new one
        if ($existingHistory) {
            return; // Or you can throw an exception or handle it in any other way you prefer
        }

        // Create a new order history entry
        $orderHistory = new OrderHistory();
        $orderHistory->order_id = $order->id;
        $orderHistory->status = $status;
        $orderHistory->save();
    }
}
