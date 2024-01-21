<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Validation\ValidationException;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ClientAddress;
use App\Models\Client;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Cache;
use App\Models\SmsOtp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class AddressController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lat' => 'required',
            'lng' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $client = Auth::guard('api')->user();
        $address = new ClientAddress([
            'lat' => $request->input('lat'),
            'lng' => $request->input('lng'),
            'name' => $request->input('name'),
        ]);

        $client->addresses()->save($address);
        return $this->response(true,'success',$address);

    }

    public function index(Request $request)
    {
        $client = Auth::guard('api')->user();
        $addresses = $client->addresses;

        return $this->response(true,'success',$addresses);
    }
}
