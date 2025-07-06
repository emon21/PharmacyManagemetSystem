<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

# Authentication Route

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-post', [AuthController::class, 'LoginPost']);
// Route::get('/forgot', [AuthController::class, 'forgot']);

Route::get('/forgot-account', [AuthController::class, 'ForgotAccount'])->name('forgot-account');

Route::post('/forgot-password', [AuthController::class, 'ForgotPassword'])->name('forgot-password');


Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    # User Profile
    Route::get('admin/user/profile', [AuthController::class, 'userProfile'])->name('user.profile');
    Route::post('admin/user/profile/change', [AuthController::class, 'ProfileChange'])->name('profile.change');
    
});

Route::post('logout', [AuthController::class, 'logout']);


# ================== Backend Route ================== #


# Backend prefix and group route

// Route::prefix('admin')->group(function () {

//     // route for admin dashboard
// });

# ================== Frontend Route ================== #

// Route::prefix('frontend')->group(function () {

//     // route for frontend

// });
