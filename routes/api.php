<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\Auth\UserLoginController;
use App\Http\Controllers\Api\Auth\UserRegistrationController;
use App\Http\Controllers\Api\Auth\UserProfileUpdateController;
use Illuminate\Support\Facades\Auth;

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
    return Auth::guard('sanctum')->user();
});

Route::middleware('auth:sanctum')->group(function () {
     
    // Profile Update route
    Route::post('/user/profile/update/{id}', [UserProfileUpdateController::class, 'profile_update']);

});


//Login Route
Route::post('/user/login', [UserLoginController::class, 'login']);

//Registration Route
Route::post('/user/registration', [UserRegistrationController::class, 'registration']);

// //Product Route
Route::get('/products', [ProductController::class, 'index']);
