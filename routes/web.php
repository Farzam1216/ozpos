<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/', function () {
    return view('frontend.resturant');
});

Route::get('/qr-code', function () {
    return view('frontend.resturantqr');
});

// Route::get('/checkout/{id}', function () {
//     return view('frontend.checkout');
// });

Route::get('logouts', [App\Http\Controllers\CheckoutController::class, 'logouts'])->name('logouts');
Route::get('checkout/{id}', [App\Http\Controllers\CheckoutController::class, 'checkout'])->name('checkout');
Route::get('qr-code-checkout/{id}', [App\Http\Controllers\CheckoutController::class, 'qrcode']);
Route::get('/my-order/{id}', [App\Http\Controllers\orderController::class, 'order']);
Route::get('/track/{id}', [App\Http\Controllers\trackingController::class, 'track']);

// Route::get('/my-order/{id}', function () {
//     return view('frontend.myOrder');
// });

Route::get('/user-register', function () {
    return view('frontend.register');
});

Route::get('/user-login', function () {
    return view('frontend.login');
});

Route::get('/user-profile', function () {
    return view('frontend.profile');
});

Route::get('/forgot-password', function () {
    return view('frontend.forgotPassword');
});

Route::get('/verification', function () {
    return view('frontend.verification');
});

Route::get('/contact-us', function () {
    return view('frontend.contactUS');
});

Route::get('/privacy', function () {
    return view('frontend.privacy');
});

Route::get('/terms', function () {
    return view('frontend.terms');
});

Route::get('/successful', function () {
    return view('frontend.successful');
});

Auth::routes();
Route::get('/get-location', [App\Http\Controllers\userLocationController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
