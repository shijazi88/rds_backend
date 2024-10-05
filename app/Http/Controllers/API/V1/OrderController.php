<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Validation\ValidationException;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use App\Models\ReferralUsage;
use App\Models\Branch;
use App\Models\Client;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Cache;
use App\Models\SmsOtp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    //

    public function index(Request $request)
    {
        $client = Auth::guard('api')->user();
        if($request->status) {
            switch ($request->status) {
                case 'active':
                    $status = ["created","inprogress"];
                    break;
                case 'completed':
                    $status = ["completed"];
                    break;
            }
            $orders = $client->orders()->whereIn('orders.status', $status)->with('driver','box','orderHistories')->latest()->get();
        } else {
            $orders = $client->orders()->with('driver','box','orderHistories')->latest()->get();
        }
        return $this->response(true,'success',$orders);
    }
}
