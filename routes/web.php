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
Route::get('/forgot-account', [AuthController::class, 'ForgotAccount'])->name('forgot-account');


Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    
});

Route::get('logout', [AuthController::class, 'logout']);


# ================== Backend Route ================== #


# Backend prefix and group route

// Route::prefix('admin')->group(function () {

//     // route for admin dashboard
// });

# ================== Frontend Route ================== #

// Route::prefix('frontend')->group(function () {

//     // route for frontend

// });
