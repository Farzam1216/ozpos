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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
