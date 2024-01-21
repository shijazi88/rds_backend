<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

use DateTime;
use Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function responseWithoutTransaltion($status,$message,$data = '', $preferred_language = null){

        
        
       
        // $return_message = trans('messages.'.$message, [], $userLanguage);

        $response['status'] = $status;
        $response['message'] = $message;
        if($data == null){
            $response['data'] =  null;
        } else {
            $response['data'] = $data;

        }

        return response($response, 200)->header('Content-Type', 'application/json');
    }

    function response($status,$message,$data = '', $preferred_language = null){

        $userLanguage = 'en';
        if (Auth::guard('api')->check()) {
            $member = Auth::guard('api')->user();
            if($member != null)
            {
                if($member->preferred_language == 'ar' )
                {
                    $userLanguage = 'ae';
                }
                // $userLanguage = $member->preferred_language;
            }
        } else{
            if($preferred_language != null)
            {
                if($preferred_language == 'ar' )
                {
                    $userLanguage = 'ae';
                } else{
                    $userLanguage = 'en';   
                }
            }
        }
        
       
        $return_message = trans('messages.'.$message, [], $userLanguage);

        $response['status'] = $status;
        $response['message'] = $return_message;
        if($data == null){
            $response['data'] =  null;
        } else {
            $response['data'] = $data;

        }

        return response($response, 200)->header('Content-Type', 'application/json');
    }
    

    function responseDefaultIsArray($status,$message,$data = []){

        $response['status'] = $status;
        $response['message'] = $message;
        if($data == null){
            $response['data'] =  array();
        } else {
            $response['data'] = $data;

        }
        return response($response, 200)->header('Content-Type', 'application/json');
    }

    function validationHandle($validation){
//        return $validation;
        foreach ($validation->getMessages() as $field_name => $messages){
            if(!isset($firstError)){
                $firstError        =$messages[0];
                $error[$field_name]=$messages[0];
            }
        }
        return $firstError;
    }
    function convert($string) {
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];
        $num = range(0, 9);
        $englishNumbersOnly = str_replace($arabic, $num, $string);
        return $englishNumbersOnly;
    }

    protected function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    protected function time_elapsed_stringArabic($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'سنة',
            'm' => 'شهر',
            'w' => 'اسبوع',
            'd' => 'يوم',
            'h' => 'ساعة',
            'i' => 'دقيقة',
            's' => 'ثانية',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                if($diff->$k > 1){
                    $v = $diff->$k . ' ' . $v ;

                    if (Str::contains($v, 'سنة')){
                        $v = Str::replaceLast("سنة", "سنوات", $v);
                    }
                    if (Str::contains($v, 'شهر')){
                        $v = Str::replaceLast("شهر", "أشهر", $v);
                    }
                    if (Str::contains($v, 'اسبوع')){
                        $v = Str::replaceLast("اسبوع", "آسابيع", $v);
                    }
                    if (Str::contains($v, 'ساعة')){
                        $v = Str::replaceLast("ساعة", "ساعات", $v);
                    }
                    if (Str::contains($v, 'دقيقة')){
                        $v = Str::replaceLast("دقيقة", "دقائق", $v);
                    }
                    if (Str::contains($v, 'ثانية')){
                        $v = Str::replaceLast("ثانية", "ثواني", $v);
                    }
                }
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ?  ' منذ '.implode(', ', $string)  : 'الآن';
    }

    public static function sendNotification($title, $body,$tokens){
        if (count($tokens) === 0) {
            return; // Exit early if tokens array is empty
        }
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = $tokens;//
        $serverKey = 'AAAA5ltwTX4:APA91bGPjaZiLomA0BKFJFMcJJrgTJ6VbUvtLImZGDBiGzVcUw1ZU2MBmQj_cA0GyoX1arXZbYERF8zICuawgqgei4SGeCWr2K5DP4NofjKp1CdaX-_KYzkdSnx5-RmpsSLjRRcNLQ6Y';

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $title,
                "body" => $body,
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            // die('Curl failed: ' . curl_error($ch));
            \Log::info('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // \Log::info('response');
        // \Log::info($result);
        return  $result;
    }

    public function sendSms($message,$mobile, $client,$otp)
    {
      
        if ($client) {
            $primarySmsProvider = $client->smsProviders()
                                         ->wherePivot('is_primary', true)
                                         ->first();

            if ($primarySmsProvider) {
                // Use the primary SMS provider to send the SMS
                $primarySmsProvider->sendSms($mobile, $message,$otp);
            } else {
                // Handle the case when no primary SMS provider is set
                // throw new Exception('No primary SMS provider set for the client of this member.');
            }
        } else {
            // Handle the case when the member is not associated with a client
            // throw new Exception('Member is not associated with any client.');
        }
    }

     public function sendSmsUsingWhatsapp($otp, $mobile)
     {
        // Check if the mobile number starts with "05"
        if (substr($mobile, 0, 2) === "05") {
            // Replace "05" with "9665"
            $mobile = "9665" . substr($mobile, 2);
        }

        // Define the WhatsApp number and API token
        $whatsappNumber = $mobile;
        $apiToken = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI0NWIxZDIwMy0zNzEyLTRkZjUtYjcyMi0zNzUxOWQ2NmE5MmEiLCJ1bmlxdWVfbmFtZSI6Im1hamVkQHRzcG9ydC5zYSIsIm5hbWVpZCI6Im1hamVkQHRzcG9ydC5zYSIsImVtYWlsIjoibWFqZWRAdHNwb3J0LnNhIiwiYXV0aF90aW1lIjoiMTAvMTcvMjAyMyAxNToxMToyOCIsImRiX25hbWUiOiIxMzExIiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy9yb2xlIjoiQURNSU5JU1RSQVRPUiIsImV4cCI6MjUzNDAyMzAwODAwLCJpc3MiOiJDbGFyZV9BSSIsImF1ZCI6IkNsYXJlX0FJIn0.u3POHh63TAKE9j21O5zq7rGS-6FxUNszUro6-58Ui7w'; // Replace with your actual API token

        $url = 'https://live-server-1311.wati.io/api/v1/sendTemplateMessage?whatsappNumber='.$mobile;
        $headers = [
            'Authorization' => 'Bearer '.$apiToken,
            'Content-Type' => 'application/json',
        ];

        // Define the request data
        $data = [
            'template_name' => 'verification_code',
            'broadcast_name' => '0551543042',
            'parameters' => [
                [
                    'name' => '1',
                    'value' => ''.$otp,
                ],
            ],
        ];
        // \Log::info($data);
        // Send the HTTP request using Laravel's HTTP client
        $response = Http::withHeaders($headers)->post($url, $data);



        // Check if the request was successful
        if ($response->successful()) {
            // API request was successful, handle the response as needed
            $responseData = $response->json();
            // \Log::info( $responseData);
            // You can return or process $responseData here
        } else {
            // API request failed, handle the error
            $errorMessage = $response->json('message', 'An error occurred while sending the message.');
            // \Log::error(  $responseData = $response->json());
            // You can return or log the error message here
            return response()->json(['error' => $errorMessage], $response->status());
        }
    }

    protected function generateRandomPassCodes($count = 10, $length = 6)
    {
        $passCodes = [];
    
        for ($i = 0; $i < $count; $i++) {
            // Generate a random numeric pass code of the specified length
            $randomPassCode = '';
    
            for ($j = 0; $j < $length; $j++) {
                $randomPassCode .= mt_rand(0, 9); // Append a random digit (0-9)
            }
    
            // Make sure the generated pass code is unique
            while (in_array($randomPassCode, $passCodes)) {
                $randomPassCode = '';
    
                for ($j = 0; $j < $length; $j++) {
                    $randomPassCode .= mt_rand(0, 9); // Append a random digit (0-9)
                }
            }
    
            $passCodes[] = $randomPassCode;
        }
    
        return $passCodes;
    }
    


}
