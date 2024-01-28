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
    public function buyBox(Request $request)
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
}
