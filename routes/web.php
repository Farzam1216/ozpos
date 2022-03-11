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

Route::get('/checkout', function () {
    return view('frontend.checkout');
});

Route::get('/my-order', function () {
    return view('frontend.myOrder');
});

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
