<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\ProductController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Admin Route
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('roles', RolesController::class);
    Route::resource('users', UsersController::class);
    Route::resource('admins', AdminsController::class);

    Route::resource('products', ProductController::class);

    //Login Route
    Route::get('/login', [App\Http\Controllers\Backend\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login/submit', [App\Http\Controllers\Backend\Auth\LoginController::class, 'login'])->name('login.submit');

    //Logout Route
    Route::post('/logout/submit', [App\Http\Controllers\Backend\Auth\LoginController::class, 'logout'])->name('logout.submit');

    //Forget Password Routes
    Route::get('/password/reset', [App\Http\Controllers\Backend\Auth\LoginController::class, 'showLinkRequstForm'])->name('password.request');
    Route::post('/password/reset/submit', [App\Http\Controllers\Backend\Auth\LoginController::class, 'reset'])->name('password.update');
});
