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
use App\Notifications\OrderCanceledNotification;
use App\Notifications\OrderCompletedNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Notifications\OrderCreatedNotification;
use Illuminate\Support\Facades\Notification;
class BoxController extends Controller
{
    public function getBoxes()
    {
        $boxesList = Box::$boxType;
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
            $data = $request->only(['box_id', 'address_id']);
            $rules = [
                'box_id' => 'required|numeric',
                'address_id' => 'required|numeric',
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return $this->response(false, $this->validationHandle($validator->messages()));
            }
            $box = Box::getPackageById($data['box_id']);
            $client = Auth::guard('api')->user();
            $availableBox = Box::whereNull('client_id')
            ->where('status', 'available')
            ->where('price', $box['price'])
            ->first();
            if ($availableBox) {
                $availableBox->status = 'assigned';
                $availableBox->client_id = $client->id;
                $availableBox->save();

                $order = new Order();
                $order->client_id = $client->id;
                $order->box_id = $availableBox->id;
                $order->amount_before_vat = $availableBox->price;
                $order->address_id = $request->address_id;
                $order->delivery_date = now();
                $order->status = 'created';
                $order->vat = $availableBox->price * 0.15;
                $order->discount = 0;
                $order->amount_after_vat = $availableBox->price * 1.15;

                $order->save();
                $client->notify(new OrderCreatedNotification($order));

                $this->logOrderHistory($order, $order->status);
                return $this->response(true, 'success', $order);
            } else {
                return $this->response(false, 'No box assigned to the client, please try again');
            }
        } catch (Exception $e) {
            return $this->response(false, 'System error');
        }
    }

    public function checkOutBox(Request $request) {
        try {
            $client = Auth::guard('api')->user();
            $data = $request->only(['order_id', 'status']);
            $rules = [
                'order_id' => 'required',
                'status' => 'required',
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return $this->response(false, $this->validationHandle($validator->messages()));
            }
            $order = Order::findOrFail($request->order_id);
            if($request->status == 'success') {
                $box = Box::findOrFail($order->box_id);
                $box->status = 'paid';
                $box->save();
                $client->notify(new OrderCompletedNotification($order));
            } else {
                $order->status = 'cancelled';
                $order->save();
                $box = Box::findOrFail($order->box_id);
                $box->status = 'available';
                $box->client_id = null;
                $box->save();
                $client->notify(new OrderCanceledNotification($order));
            }
            return $this->response(true, 'success', $order);
        } catch (Exception $e) {
            return $this->response(false, 'System error');
        }
    }

    public function initData() {
        Box::where('id', '>=', 0)->delete();
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '200.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '650.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '200.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '650.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '200.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '650.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '200.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '650.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '200.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '650.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '200.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '650.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '200.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '650.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '200.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '650.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '200.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '650.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '200.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '650.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '200.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '650.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '200.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
        DB::table('boxes')->insert([
            'status' => 'available',
            'price' => '650.00',
            'lat' => '32.52',
            'lng' => '32.52',
            'expiry_date' => '2025-10-31',
            'created_at' => '2024-09-03 15:04:26',
            'updated_at' => '2024-09-03 15:04:26',
            'deleted_at' => null,
            'serial_number' => '000000000',
            'color' => '#212121',
            'size' => '10m',
            'client_id' => null
        ]);
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
