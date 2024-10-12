 <?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\BranchesController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\FirebaseNotificationsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\QRCodeScannerController;
use App\Http\Controllers\Admin\ClassSessionsController;
use App\Http\Controllers\InquiryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/contact', function () {
    return view('contact');
})->name('contact');



Route::post('/submit-inquiry', [InquiryController::class, 'store'])->name('inquiry.store');
// Auth::routes();
//Language Translation
Route::get('locale/{locale}', [App\Http\Controllers\LandingPageController::class, 'lang'])->name('change.locale.landing');
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang'])->name('change.locale');
Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index'] );
Route::post('/contact-form', [ContactController::class, 'store'])->name('contact.store');

// Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes(['register' => false]);


Route::get('products/product-terms/{product}', 'App\Http\Controllers\Admin\ProductsController@showTerms' )->name('product.terms');


// Route::redirect('/', '/login');
Route::redirect('/dashboard', '/login');
// Route::redirect('/login', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('home');
});



Route::middleware(['auth:web'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Route::get('/admin/login', 'App\Http\Controllers\Auth\LoginController@showAdminLoginForm')->name('admin.login');
Route::post('/admin/login', 'App\Http\Controllers\Auth\LoginController@login')->name('admin.login.submit');




Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth:web']], function () {
    // Route::get('/', 'HomeController@index')->name('home');
    // Permissions
   // Permissions
   Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
   Route::resource('permissions', 'PermissionsController');

   // Roles
   Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
   Route::resource('roles', 'RolesController');

   // Users
   Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
   Route::resource('users', 'UsersController');

   // Clients
   Route::delete('clients/destroy', 'ClientsController@massDestroy')->name('clients.massDestroy');
   Route::resource('clients', 'ClientsController');

   // Drivers
   Route::delete('drivers/destroy', 'DriversController@massDestroy')->name('drivers.massDestroy');
   Route::resource('drivers', 'DriversController');

   // Audit Logs
   Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

   // Box
   Route::delete('boxes/destroy', 'BoxController@massDestroy')->name('boxes.massDestroy');
   Route::resource('boxes', 'BoxController');

   Route::get('boxes/{box}/unlock', 'BoxController@unlock')->name('boxes.unlock');
   Route::post('boxes/{box}/send-command/{slug}', 'BoxController@sendCommand')->name('boxes.send-command');



   // Company
   Route::delete('companies/destroy', 'CompanyController@massDestroy')->name('companies.massDestroy');
   Route::resource('companies', 'CompanyController');

   // Company User
   Route::delete('company-users/destroy', 'CompanyUserController@massDestroy')->name('company-users.massDestroy');
   Route::resource('company-users', 'CompanyUserController');

   // Order
   Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
   Route::resource('orders', 'OrderController');

   // Client Address
   Route::delete('client-addresses/destroy', 'ClientAddressController@massDestroy')->name('client-addresses.massDestroy');
   Route::resource('client-addresses', 'ClientAddressController');
    // Command Logs
    Route::delete('command-logs/destroy', 'CommandLogsController@massDestroy')->name('command-logs.massDestroy');
    Route::resource('command-logs', 'CommandLogsController');

});



Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});