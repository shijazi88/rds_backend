<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Order;
use App\Notifications\OrderCanceledNotification;
use App\Notifications\OrderCompletedNotification;
use Illuminate\Http\Request;
use App\Services\TapPaymentService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PaymentController extends Controller
{
    protected $tapPaymentService;

    public function __construct(TapPaymentService $tapPaymentService)
    {
        $this->tapPaymentService = $tapPaymentService;
    }

    public function createPayment(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'currency' => 'required|string',
            'customer.first_name' => 'required|string',
            'customer.email' => 'required|email',
        ]);

        $paymentData = array_merge($validatedData, [
            'source' => ['id' => 'src_all'],
            'redirect' => ['url' => route('payment.callback')],
        ]);

        $response = $this->tapPaymentService->createPayment($paymentData);

        if (isset($response['error'])) {
            return response()->json(['error' => $response['message']], 500);
        }

        return response()->json($response);
    }

    public function callback(Request $request)
    {
        try {
            if (!$request->has('tap_id')) {
                return redirect('/');
            }

            $paymentId = $request->input('tap_id');
            $paymentDetails = $this->tapPaymentService->getPaymentDetails($paymentId);

            if (isset($paymentDetails['error'])) {
                return redirect('/');
            }

            $status = $paymentDetails['status'] ?? 'unknown';
            
            
            
            $availableBoxId = Cache::get('available_box_id');
            $orderId = Cache::get('order_id');
            $client = Auth::guard('api')->user();
            $order = Order::where('id', $orderId)->first();
            $box = Box::where('id', $order->box_id)->first();
            if ($status === 'CAPTURED') {
                $box->status = 'paid';
                $box->save();
            } elseif ($status === 'FAILED') {
                $order->status = 'cancelled';
                $order->save();
                $box = Box::findOrFail($order->box_id);
                $box->status = 'available';
                $box->client_id = null;
                $box->save();
            } else {
                $order->status = 'cancelled';
                $order->save();
                $box = Box::findOrFail($order->box_id);
                $box->status = 'available';
                $box->client_id = null;
                $box->save();
            }
            return redirect('/');
        } catch (\Exception $e) {
            return redirect('/');
        }
    }
}
