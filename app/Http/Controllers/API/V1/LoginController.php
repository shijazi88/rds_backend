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

class LoginController extends Controller
{
    public function login(Request $request)
    {

        try {
            $data = $request->only(['email','password','client_id','fcm_token']);
            $rules = [
                'email' => 'required|email',
                // 'fcm_token' => 'required',
                'password' => 'required',
                'client_id' => 'required',
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return $this->response(false,$this->validationHandle($validator->messages()));
            } else {
                $credentials = $request->only('email', 'password');

                $client = Client::find($request->client_id);
                if($client == null)
                {
                    return $this->response(false,'Client information is not correct.');
                }
                $member = Member::where('email', $request->email)
                ->where('removed_by_member', 0)
                ->where('client_id', $request->client_id)
                ->first();
                if ($member) {
                    if (Hash::check($request->password, $member->password)) {
                        $token = $member->createToken('Memvera Token')->accessToken;
                        $response = ['token' => $token,'member' => $member ];
                        return response($response, 200);
                    } else {
                        return $this->response(false,'The provided credentials are incorrect.');
                    }
                } else {
                    return $this->response(false,'The provided credentials are incorrect.');
                }
                return $this->response(false,'The provided credentials are incorrect.');

            }
        } catch (Exception $e) {
            return $this->response(false,'system error');
        }
    }


    public function sendOTP(Request $request)
    {

        try {
            $data = $request->only(['mobile']);
            $rules = [
                'mobile' => 'required|numeric|digits:10', // Adjust validation rules as needed
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return $this->response(false,$this->validationHandle($validator->messages()));
            } else{
                // Generate and send OTP to the provided mobile number
                $otp = generateOTP(); // Generate a random 4-digit OTP

                // Send the OTP to the user's mobile number (You can use an SMS gateway library)

                // Store the OTP in the database or cache for verification
                // Example: Cache::put('otp_' . $request->mobile, $otp, 300); // Store OTP for 5 minutes

                return $this->response(true,'OTP sent successfully');
            }
        } catch (Exception $e) {
            return $this->response(false,'system error');
        }

       
    }

    /**
     * Create a new client related to a parent user.
     */
    public function createChildClient(Request $request)
    {
        $validatedData = $request->validate([
            'parent_id' => 'required|exists:clients,id',
            'name'      => 'required|string|max:255',
            'email'     => 'nullable|email|unique:clients,email',
            'mobile'    => 'required|string|unique:clients,mobile',
            'language'  => 'nullable|string|in:ar,en',
            'status'    => 'nullable|string|in:enabled,not_enabled',
        ]);

        $childClient = Client::create([
            'parent_id' => $validatedData['parent_id'],
            'name'      => $validatedData['name'],
            'email'     => $validatedData['email'],
            'mobile'    => $validatedData['mobile'],
            'language'  => $validatedData['language'] ?? 'en',
            'status'    => $validatedData['status'] ?? 'enabled',
        ]);

        return response()->json([
            'message' => 'Child client created successfully.',
            'data'    => $childClient,
        ], 201);
    }

    /**
     * Get all children of a given parent client.
     */
    public function getClientChildren()
    {
        $parentClient = Auth::guard('api')->user();

        if (!$parentClient) {
            return response()->json(['message' => 'Parent client not found.'], 404);
        }

        $children = $parentClient->children;

        return response()->json([
            'message'  => 'Children retrieved successfully.',
            'children' => $children,
        ]);
    }

    /**
     * delete a client related to a parent user.
     */
    public function deleteChildClient($id)
    {
        $parentClient = Auth::guard('api')->user();
    
        if (!$parentClient) {
            return response()->json(['message' => 'Parent client not found.'], 404);
        }
    
        $childClient = $parentClient->children()->find($id);
    
        if (!$childClient) {
            return response()->json(['message' => 'Child client not found or does not belong to this parent.'], 404);
        }
    
        $childClient->delete();
    
        return response()->json(['message' => 'Child client deleted successfully.']);
    }

    public function registerClient(Request $request)
    {

        try {
            $data = $request->only(['mobile','email','name','fcm_token','language']);
            $rules = [
                'name' => 'required|string',
                'email' => 'required|email|unique:clients',
                'mobile' => 'required|numeric|digits:10|unique:clients',
                'customer_id' => 'required',
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return $this->response(false,$this->validationHandle($validator->messages()));
            } else{
                $otp = $this->generateOTP(); // Generate a random 4-digit OTP
                
                // Create a new client with the provided data
                $client = Client::create([
                    'mobile' => $data['mobile'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'fcm_token' => $data['fcm_token'],
                    'status' => 'not_enabled', // Set the initial status
                    'language' => $data['language'],
                    'customer_id' => $data['customer_id'],
                ]);

                // Store the OTP in the sms_otp table with status 'not_used'
                SmsOtp::create([
                    'mobile' => $data['mobile'],
                    'otp' => $otp,
                    'status' => 'not_used',
                ]);


                return $this->response(true, 'Registration OTP sent successfully');
            }
        } catch (Exception $e) {
            return $this->response(false,'system error');
        }
    }
    public function verifyRegistrationOTP(Request $request)
    {

        try {
            $data = $request->only(['mobile','otp','fcm_token','language']);
            $rules = [
                'mobile' => 'required|numeric|digits:10', // Adjust validation rules as needed
                'otp' => 'required|numeric|digits:4', // OTP should be 4 digits
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return $this->response(false,$this->validationHandle($validator->messages()));
            } else{
               
                // Retrieve the OTP record from the SmsOtp table based on the mobile number
                $otpRecord = SmsOtp::where('mobile', $request->mobile)
                ->where('otp', $data['otp'])
                ->where('status', 'not_used')
                ->first();
                if (!$otpRecord) {
                    // OTP not found, expired, or already used
                    return $this->response(false,'Invalid OTP');
                }

                $client = Client::where('mobile', $request->mobile)->first();
                if ($client) {
                    $client->update(['status' => 'enabled']); 
                }

                // Mark the OTP record as used
                $otpRecord->update(['status' => 'used']);
                $token = $client->createToken('RDS Token')->accessToken;
                $client->language = $request->language; 
                $client->fcm_token = $request->fcm_token; 
                $client->token =  $token;
                return $this->response(true,'OTP verified successfully',$client);
            }
        } catch (Exception $e) {
            return $this->response(false,'system error');
        }

    }


    public function verifyMobile(Request $request)
    {

        try {
            $data = $request->only(['mobile']);
            $rules = [
                'mobile' => 'required|numeric|digits:10',
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return $this->response(false,$this->validationHandle($validator->messages()));
            } else{
            // Check if a client with the provided mobile number exists and is enabled
            $client = Client::where('mobile', $request->mobile)
            ->where('status', 'enabled') 
            ->first();

            if (!$client) {
                return response()->json(['error' => 'Client not found or not enabled'], 404);
            }

            // Generate and send OTP to the provided mobile number
            $otp = $this->generateOTP(); // Generate a random 4-digit OTP

            // Store the OTP in the database
            SmsOtp::create([
                'mobile' => $request->mobile,
                'otp' => $otp,
                'status' => 'not_used', // Set the initial status to 'not_used'
                ]);

                return $this->response(true,'OTP sent successfully');
            }

        } catch (Exception $e) {
            return $this->response(false,'system error');
        }

    }

    public function updateFCM(Request $request)
    {
        try {
            $data = $request->only(['fcm_token']);
            $rules = [
                'fcm_token' => 'required'
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return $this->response(false,$this->validationHandle($validator->messages()));
            } else{
               
                $client = Auth::guard('api')->user();
                if ($client) {
                    $client->update(['fcm_token' => $data['otp']]); 
                }

                return $this->response(true,'FCM Token upgraded successfully',$client);
            }
        } catch (Exception $e) {
            return $this->response(false,'system error');
        }
    }

    function generateOTP()
    {
        return 1234;
        $min = 1000; // Minimum OTP value (4 digits)
        $max = 9999; // Maximum OTP value (4 digits)
        return random_int($min, $max);
    }
}
