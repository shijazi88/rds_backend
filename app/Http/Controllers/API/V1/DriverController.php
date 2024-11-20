<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Validation\ValidationException;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderHistory;
use Illuminate\Http\Request;use App\Models\Driver;
use Illuminate\Support\Facades\DB;
use App\Models\ReferralUsage;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Cache;
use App\Models\SmsOtp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class DriverController extends Controller
{
    public function login(Request $request)
    {

        try {
            $data = $request->only(['email','password']);
            $rules = [
                'email' => 'required|email',
                // 'fcm_token' => 'required',
                'password' => 'required',
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return $this->response(false,$this->validationHandle($validator->messages()));
            } else {
                $credentials = $request->only('email', 'password');

                
                $driver = Driver::where('email', $request->email)
                ->first();
                if ($driver) {
                    if (Hash::check($request->password, $driver->password)) {
                        $token = $driver->createToken('RDS Token')->accessToken;
                        $driver->accessToken = $token;
                        return response($driver, 200);
                    } else {
                        return $this->response(false,'The provided credentials are incorrect.');
                    }
                } else {
                    return $this->response(false,'The provided credentials are incorrect..');
                }
                return $this->response(false,'The provided credentials are incorrect...');

            }
        } catch (Exception $e) {
            return $this->response(false,'system error');
        }
    }

    public function orders(Request $request)
    {
        $driver = Auth::guard('driver')->user();
        if($request->status) {
            switch ($request->status) {
                case 'active':
                    $status = ["created","inprogress"];
                    break;
                case 'completed':
                    $status = ["completed"];
                    break;
            }
            $orders = $driver->orders()->whereIn('orders.status', $status)->with(['client','box','driver','address'])->get()->map(function ($order) {
                if ($order->box) {
                    if($order->address) {
                        $order->box->lat = $order->address->lat;
                        $order->box->lng = $order->address->lng;
                    }
                }
                return $order;
            });
            
        } else {
            $orders = $driver->orders()->get();
        }
        return $this->response(true,'success',$orders);
    }

    public function markAssign(Request $request, $orderId)
    {

        try {
            $order = Order::findOrFail($orderId);
            $order->driver_id = Auth::guard('driver')->user()->id;
            $order->save();
            return $this->response(true,'Order assigned to driver',$order);
        } catch (ModelNotFoundException $exception) {
            return $this->response(false,'Order not found');
        }

    }

    public function markInProgress(Request $request, $orderId)
    {

        try {
            $order = Order::findOrFail($orderId);
            $order->status = 'inprogress';
            $order->save();
            // Save order history
            $this->logOrderHistory($order, $order->status);
            return $this->response(true,'Order marked as In Progress',$order);
        } catch (ModelNotFoundException $exception) {
            return $this->response(false,'Order not found');
        }

    }

    public function markDelivered(Request $request, $orderId)
    {

        try {
            
            $order = Order::findOrFail($orderId);
            $order->status = 'completed';
            $order->save();
            // Save order history
            $this->logOrderHistory($order, $order->status);
            return $this->response(true,'Order marked as completed',$order);
        } catch (ModelNotFoundException $exception) {
            return $this->response(false,'Order not found');
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
