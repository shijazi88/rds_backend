<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\MemberBookingController;
use App\Http\Controllers\API\V1\BranchController;
use App\Http\Controllers\API\V1\LoginController;
use App\Http\Controllers\API\V1\ProductController;
use App\Http\Controllers\API\V1\MemberController;
use App\Http\Controllers\API\V1\MemberPaymentsController;
use App\Http\Controllers\API\V1\SubscriptionController;
use App\Http\Controllers\API\V1\TapConfigController;
use App\Http\Controllers\API\V1\CouponController;
use App\Http\Controllers\API\V1\FreePassController;
use App\Http\Controllers\API\V1\PaymentController;
use App\Http\Controllers\API\V1\AppController;
use App\Http\Controllers\API\V1\TermsAndConditionsController;
use App\Http\Controllers\API\V1\TrainerController;
use App\Http\Controllers\API\V1\ClientController;
use App\Http\Controllers\API\V1\TrainerLoginController;
use App\Http\Controllers\API\V1\AddressController;
use App\Http\Controllers\API\V1\TamaraController;
use App\Http\Controllers\API\V1\BoxController;
use App\Http\Controllers\MqttController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('send-command', [MqttController::class, 'receiveCommands'] )->name('mqtt.receiveCommands');
Route::post('client/register', [LoginController::class, 'registerClient'] )->name('client.register');
Route::post('otp/verify', [LoginController::class, 'verifyRegistrationOTP'] )->name('client.verifyRegistrationOTP');
Route::post('mobile/verify', [LoginController::class, 'verifyMobile'] )->name('client.verifyMobile');



Route::middleware('apiauth')->group(function () {

    Route::post('client/address/create', [AddressController::class, 'store'] )->name('client.address.create');
    Route::post('client/address/list', [AddressController::class, 'index'] )->name('client.address.list');
    Route::post('boxes/list', [BoxController::class, 'groupByPrice'] )->name('boxes.list');
    Route::post('boxes/buy', [BoxController::class, 'buyBox'] )->name('boxes.buy');
    Route::post('boxes/buy/verify', [BoxController::class, 'verify'] )->name('boxes.verify');

    Route::post('member/boxes', [BoxController::class, 'memberBoxes'] )->name('member.boxes');


    // Route::post('/member-bookings', [MemberBookingController::class, 'getAllBookings'])->name('member.old-bookings');
    // Route::post('/available-bookings',[MemberBookingController::class, 'getAvailableBookings'])->name('member.available-bookings');
    // Route::post('/book', [MemberBookingController::class, 'book'])->name('member.book');
    // Route::post('/cancel-booking/{id}', [MemberBookingController::class, 'cancelBooking'])->name('member.cancel_booking');

    // Route::post('/suspend-subscription', [SubscriptionController::class, 'suspendSubscription'])->name('member.suspend_subscription');
    // Route::post('/cancel-subscription', [SubscriptionController::class, 'cancelSubscriptionApi'])->name('member.cancel_subscription');
    // Route::post('/update-profile', [LoginController::class, 'updateProfile'])->name('member.update_profile');
    // Route::post('/branch/change', [LoginController::class, 'changeDefaultBranch'])->name('member.changeDefaultBranch');
    // Route::get('/profile', [LoginController::class, 'getProfile'])->name('member.get_profile');
    // Route::post('/profile/image/update', [LoginController::class, 'updateImage'])->name('member.updateImage');
    // Route::get('/member/notifications', [MemberController::class, 'notifications'])->name('member:notifications');
    // Route::get('member/notifications/status', [MemberController::class, 'unread'])->name('member:notifications-unread');

    
    // Route::post('/member/payments',  [MemberPaymentsController::class, 'payments'])->name('member.payments');
    // Route::post('/member/subscriptions',  [SubscriptionController::class, 'listPerMember'])->name('member.subscriptions');
    // Route::post('/member/subscriptions/bulkBuyProducts',  [SubscriptionController::class, 'bulkBuyProducts'])->name('member.bulkBuyProducts');
    // Route::post('/member/subscriptions/buy',  [SubscriptionController::class, 'buyproduct'])->name('member.buyproduct');
    // Route::post('/member/subscriptions/buy/validate',  [SubscriptionController::class, 'checkProductBeforePayment'])->name('member.validate-buyproduct');


    // Route::post('/branch/member/subscription/sessions',  [MemberBookingController::class, 'getFutureSessions'])->name('branch.getFutureSessions');
    // Route::post('/branch/member/pt/sessions',  [MemberBookingController::class, 'getFutureSessionsOfPt'])->name('branch.getFutureSessionsOfPt');
    // // Route::post('/branch/member/pt/allsessions',  [MemberBookingController::class, 'getFutureSessionsOfPt'])->name('branch.getallFutureSessionsOfPt');
    // Route::post('/branch/member/pt/allsessions',  [MemberBookingController::class, 'getAllPtSessions'])->name('branch.getallFutureSessionsOfPt');


    // Route::post('cancel-book',  [MemberBookingController::class, 'cancelBook'] )->name('cancel.book');
    // Route::post('reactivate-subscription',  [SubscriptionController::class, 'reactivateSubscription'] )->name('reactivate.subscription');
    // Route::post('class-session-ratings',  [MemberController::class, 'storeRating'] )->name('session.rating');

    // Route::post('class-sessions/count',  [MemberBookingController::class, 'getBookingsCount'] )->name('session.getBookingsCount');
    // Route::post('create-free-pass',  [FreePassController::class, 'create'] )->name('member.freepass');
    // Route::post('failed-payment-transactions',  [PaymentController::class, 'failedPaymentTransactions'])->name('payment.failed');
    // Route::get('member/subscription',  [SubscriptionController::class, 'getSubscriptionDetails'])->name('member.subscription');

    // Route::post('members/kids', [MemberController::class, 'getMembersByParentMobile'])->name('member.kidsprofiles');
    // Route::post('members/kids/new', [MemberController::class, 'registerNewKid'])->name('member.kids.profiles.new');

    // Route::any('member/delete',  [MemberController::class,'deleteAccount'])->name('member.deleteAccount');
    // Route::any('member/switch',  [MemberController::class,'switchProfileToKid'])->name('member.switchProfileToKid');


    // Route::any('tamara/checkout',  [TamaraController::class,'createSession'])->name('tamara.createSession');
    // Route::any('tamara/status',  [TamaraController::class,'getStatus'])->name('tamara.status');
    // Route::any('tamara/options',  [TamaraController::class,'getTamaraPaymentOptions'])->name('tamara.options');






});


// Route::any('trainer/login',  [TrainerLoginController::class,'login'])->name('trainer.login');
// Route::any('client/list',  [ClientController::class,'listActiveClients'])->name('client.list');
// Route::any('trainer/remove',  [TrainerLoginController::class,'removeAccount'])->name('trainer.remove');
// Route::any('trainer/sessions',  [TrainerLoginController::class,'todaySessions'])->name('trainer.sessions');
// Route::any('trainer/booking/update',  [TrainerLoginController::class,'changeBookingStatus'])->name('trainer.booking.update');
// Route::any('trainer/profile/update',  [TrainerLoginController::class,'updateProfile'])->name('trainer.profile.update');
// Route::any('trainer/profile',  [TrainerLoginController::class,'profile'])->name('trainer.profile.get');
// Route::any('trainer/image/update',  [TrainerLoginController::class,'updateImage'])->name('trainer.image.update');


// Route::get('/get-class-session/{member_id}',  [MemberController::class,'getClassSession']);

// Route::any('tamara/checkout/success',  [TamaraController::class,'success'])->name('tamara.success');
// Route::any('tamara/checkout/failure',  [TamaraController::class,'failure'])->name('tamara.failure');
// Route::any('tamara/checkout/cancel',  [TamaraController::class,'cancel'])->name('tamara.cancel');
// Route::any('tamara/checkout/notification',  [TamaraController::class,'notification'])->name('tamara.notification');
// Route::any('tamara/list',  [TamaraController::class,'listTamaraRequests'])->name('tamara.list');
// Route::any('trainers/list',  [TrainerController::class,'index'])->name('trainers.list');
// Route::any('programs/list',  [TrainerController::class,'programs'])->name('programs.list');
// Route::any('partners/list',  [TrainerController::class,'partners'])->name('partners.list');
