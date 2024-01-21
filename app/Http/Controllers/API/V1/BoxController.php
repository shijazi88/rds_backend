<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Validation\ValidationException;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Box;
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

class BoxController extends Controller
{
    public function groupByPrice()
    {
        $boxesGroupedByPrice = Box::select('price', \DB::raw('count(*) as count'))
            ->where('status','available')
            ->groupBy('price')
            ->orderBy('price')
            ->get();
        return $this->response(true,'success',$boxesGroupedByPrice);
    }

    public function memberBoxes(Request $request){

        $client = Auth::guard('api')->user();
        return $this->response(true,'success',$client->boxes);
    }
    public function buyBox(Request $request)
    {

        $client = Auth::guard('api')->user();
        // Find an available box (assuming 'available' is a valid status)
        $availableBox = Box::where('status', 'available')->first();

        if (!$availableBox) {
            return response()->json(['message' => 'No available boxes found'], 404);
        }

        // Assign the box to the client and update its status
        $availableBox->client_id = $client->id;
        $availableBox->status = 'assigned';
        $availableBox->save();
        return $this->response(true,'success',$availableBox);
    }
}
