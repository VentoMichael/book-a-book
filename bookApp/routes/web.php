<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

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

// If admin
Route::get('/', function () {
    return view('admin.dashboard');
});

//Route::get('/login', function () {
//    return view('authentication.login');
//})->name('login');
//
//Route::get('/register', function () {
//    return view('authentication.register');
//});

Fortify::loginView(function () {
    return view('auth.login');
});

Fortify::registerView(function () {
    return view('auth.register');
});

Fortify::requestPasswordResetLinkView(function () {
    return view('auth.forgot-password');
});

Fortify::resetPasswordView(function () {
    return view('auth.reset-password');
});
