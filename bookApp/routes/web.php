<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
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

// HOME PAGE
Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth')->name('index');
Route::get('/test', function () {

});


// USERS
Route::get('/users', [UserController::class, 'index'])->middleware('auth')->name('users.index');
Route::get('/users/{student}', [UserController::class, 'show'])->middleware('auth');


// BOOKS
Route::middleware('auth')->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::post('/books', [BookController::class, 'store']);
    Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('book.show');
    Route::get('/books/{book}/edit/', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/books/{book}', [BookController::class, 'update']);
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('book.destroy');
});


Route::get('/purchases',
    [\App\Http\Controllers\ReservationController::class, 'index'])->middleware('auth')->name('purchases.index');


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

//SEARCH
Route::any('/search', [SearchController::class, 'index'])->middleware('auth');
