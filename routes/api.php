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
use App\Http\Controllers\API\V1\OrderController;
use App\Http\Controllers\API\V1\BoxController;
use App\Http\Controllers\API\V1\DriverController;
use App\Http\Controllers\API\V1\NotificationController;
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
    Route::post('boxes/assign', [BoxController::class, 'assignBoxToClient'] )->name('boxes.assign');
    Route::post('boxes/buy/verify', [BoxController::class, 'verify'] )->name('boxes.verify');

    Route::post('member/boxes', [BoxController::class, 'memberBoxes'] )->name('member.boxes');

    Route::get('/orders', [OrderController::class, 'index'] )->name('order.list');

    // Get notifications of the authenticated client
    Route::get('/notifications', [NotificationController::class, 'index'] )->name('notifications.list');

});


Route::middleware('auth.driver')->group(function () {

    Route::any('/orders/{orderId}/mark-in-progress', [DriverController::class, 'markInProgress']);
    Route::any('/orders/{orderId}/mark-delivered', [DriverController::class, 'markDelivered'] );
    Route::any('/driver/orders', [DriverController::class, 'orders'] )->name('driver.orders');

});

Route::post('driver/login', [DriverController::class, 'login'] )->name('driver.login');


