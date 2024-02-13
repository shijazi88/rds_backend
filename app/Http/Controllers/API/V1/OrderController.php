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
        $orders = $client->orders()->with('box')->latest()->get();
        return $this->response(true,'success',$orders);
    }
}
