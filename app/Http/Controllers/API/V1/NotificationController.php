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
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
        
    public function index(Request $request)
    {
        $client = Auth::guard('api')->user();
        $notifications = $client->notifications()->get()->map(function (DatabaseNotification $notification) {
            // Get the notification type
            $notificationType = $notification->type;
            
            // Initialize English and Arabic titles and descriptions
            $englishTitle = null;
            $arabicTitle = null;
            $englishDescription = null;
            $arabicDescription = null;
            
            // Map notification types to their titles and descriptions
            switch ($notificationType) {
                case 'App\Notifications\OrderCreatedNotification':
                    $englishTitle = 'Your order has been created';
                    $arabicTitle = 'تم إنشاء طلبك';
                    $englishDescription = 'Your order details: ';
                    $arabicDescription = 'تفاصيل طلبك: ';
                    break;
                // Add more cases for other notification types if needed
            }
            
            return [
                'id' => $notification->id,
                'type' => $notificationType,
                'english_title' => $englishTitle,
                'arabic_title' => $arabicTitle,
                'english_description' => $englishDescription,
                'arabic_description' => $arabicDescription,
                'data' => $notification->data,
                'read_at' => $notification->read_at,
                'created_at' => $notification->created_at,
                'updated_at' => $notification->updated_at,
            ];
        });
        return $this->response(true,'success',$notifications);
    }
}
