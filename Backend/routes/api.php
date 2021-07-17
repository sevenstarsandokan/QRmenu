<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PkgController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\VendorChunkOne;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;


// Authentication
Route::post('login', [AuthController::class, 'postLogin']);
Route::post('signup', [AuthController::class, 'postSignup']);
Route::post('forgot-password', [AuthController::class, 'postForgotPassword']);
Route::get('user', [AuthController::class, 'getUser']);
Route::get('logout', [AuthController::class, 'getLogout']);
Route::post('check-token', [AuthController::class, 'postCheckToken']);

//Package Management
Route::get('pkglist', [PkgController::class, 'getPkgList']);
Route::post('addpkg', [PkgController::class, 'postAddPkg']);
Route::post('pkgitem', [PkgController::class, 'postGetItem']);
Route::post('editpkg', [PkgController::class, 'postUpdateItem']);
Route::delete('deletepkg/{id}', [PkgController::class, 'postDeleteItem']);

//Manage Restaurant
Route::get('restaurantlist', [RestaurantController::class, 'getRestList']);
Route::post('adduser',[RestaurantController::class, 'postAddUser']);

//Site Setting
Route::get('settingstatus', [SettingController::class, 'getStatus']);
Route::post('modifycreate', [SettingController::class, 'postModifyCreate']);

//Payment Setting
Route::post('modifycreate_payment', [PaymentController::class, 'postModifyPayment']);
Route::get('paymentsettings', [PaymentController::class, 'getPaymentSettings']);
Route::get('offlinepayment', [PaymentController::class, 'offlinepayment']);
Route::get('transactionhistory', [PaymentController::class, 'transactionhistory']);


/********** Vendor ***********/
Route::post('modifyorderconfig', [VendorChunkOne::class, 'modifyorderconfig']);
Route::post('configsettings', [VendorChunkOne::class, 'getconfigsetting']);
Route::post('vendorpaymenthistory', [VendorChunkOne::class, 'vendorpaymenthistory']);
Route::get('featurelist', [VendorChunkOne::class, 'featurelist']);
Route::post('updatefeature', [VendorChunkOne::class, 'updatefeature']);
Route::post('reservation_list', [VendorChunkOne::class, 'reservation_list']);
Route::post('updateitem', [VendorChunkOne::class, 'updateitem']);
Route::post('profileinfo', [ProfileController::class, 'getlistprofile']);
Route::post('updateprofile', [ProfileController::class, 'updateprofile']);
Route::post('gettimelist', [ProfileController::class, 'gettimelist']);
Route::post('updatetimelist', [ProfileController::class, 'updatetimelist']);

Route::post('categorylist', [MenuController::class, 'getcategorylist']);
Route::post('createcategory', [MenuController::class, 'createcategory']);
Route::post('updatecategory', [MenuController::class, 'updatecategory']);
Route::post('removecategory', [MenuController::class, 'removecategory']);
Route::post('removecategory', [MenuController::class, 'removecategory']);

Route::post('createitem', [MenuController::class, 'createitem']);
Route::post('itemlist', [MenuController::class, 'itemlist']);
Route::post('updateitem', [MenuController::class, 'updateitem']);
Route::post('removeitem', [MenuController::class, 'removeitem']);

Route::post('speciallist', [MenuController::class,'speciallist']);
Route::post('createspecial', [MenuController::class,'createspecial']);
Route::post('updatespecial', [MenuController::class,'updatespecial']);
Route::post('removespecial', [MenuController::class,'removespecial']);


Route::post('orderlist', [MenuController::class,'orderlist']);
Route::post('updateorder', [MenuController::class,'updateorder']);



/*------ For Front User ------*/
use App\Http\Controllers\FrontUser\HomeController;

Route::post('user/getspeciallist', [HomeController::class, 'getspeciallist']);
Route::post('user/getitemlist', [HomeController::class, 'getitemlist']);
Route::post('user/getcategorylist', [HomeController::class, 'getcategorylist']);
Route::post('user/getspecialities', [HomeController::class, 'getspecialities']);
Route::post('user/placereservation', [HomeController::class, 'placereservation']);
Route::post('user/getordertypelist', [HomeController::class, 'getordertypelist']);
Route::post('user/placeorder', [HomeController::class, 'placeorder']);
Route::post('user/createorder', [HomeController::class, 'createorder']);
Route::post('user/gettimelist', [HomeController::class, 'gettimelist']);

//Payment Integration
use App\Http\Controllers\Payment\PayPalController;

Route::get('payment', [PayPalController::class,'payment'])->name('payment');

Route::post('user/stripeMethod', [HomeController::class,'stripeMethod']);
