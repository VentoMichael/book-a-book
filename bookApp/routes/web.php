<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::get('/', [UserController::class,'index'])->middleware('auth');


Route::get('/users', [UserController::class,'index'])->middleware('auth')->name('users');

Route::get('/users/{user}', [UserController::class,'show'])->middleware('auth');




Route::get('/books',[BookController::class,'index'])->middleware('auth')->name('books.index');
Route::post('/books',[BookController::class,'store'])->middleware('auth');

Route::get('/books/create',[BookController::class,'create'])->middleware('auth');

Route::get('/books/{book}',[BookController::class,'show'])->middleware('auth')->name('book.show');
Route::get('/books/{book}/edit',[BookController::class,'edit'])->middleware('auth');
Route::put('/books/{book}',[BookController::class,'update'])->middleware('auth');



Route::get('/purchases',[PurchaseController::class,'index'])->middleware('auth')->name('purchases');




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
