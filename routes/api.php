<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\UserController;

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
Route::post("create", [RegistrationController::class, "create"]);
Route::post("forgot_password", [RegistrationController::class, "forgetPassword"]);
Route::post("verify_otp", [RegistrationController::class, "verifyOtp"]);
Route::post("update_profile_photo", [RegistrationController::class, "update_profile_photo"]);
Route::post("show", [RegistrationController::class, "show"]);
Route::post("loginUser", [RegistrationController::class, "login"]);
Route::post("userDetail", [RegistrationController::class, "getUserDetail"]);

Route::get("getRestaurants", [RestaurantController::class, "showRestaurants"]);
Route::post("showRestaurants", [RestaurantController::class, "show"]);

Route::get("getAreaDetail", [AreaController::class, "getArea"]);
//Route::get("order/create", [\App\Http\Controllers\OrderController::class, "create"]);
Route::post("order_details/create", [\App\Http\Controllers\OrderDetailsController::class, "create"]);
Route::post("order_details", [\App\Http\Controllers\OrderDetailsController::class, "index"]);
Route::post("order_details/destroy", [\App\Http\Controllers\OrderDetailsController::class, "destroy"]);
Route::post("order/create", [\App\Http\Controllers\OrderController::class, "create"]);

