<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingController;
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
Route::get('/test', function () {
});

//Route::group(['middleware' => ['administrator']], function () {
//HOME PAGE
    Route::get('/', [DashboardController::class, 'index'])->name('index');

// USERS
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{student}', [UserController::class, 'show']);
    Route::get('/users/Vento/edit', [UserController::class, 'edit']);
    Route::put('/users/Vento', [UserController::class, 'update']);

// BOOKS
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::post('/books', [BookController::class, 'store']);
    Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('book.show');
    Route::get('/books/{book}/edit/', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/books/{book}', [BookController::class, 'update']);
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('book.destroy');

//SEARCH
    Route::any('/search', [SearchController::class, 'index']);

//PURCHASES
    Route::get('/purchases', [ReservationController::class, 'index'])->name('purchases.index');

//SETTINGS
    Route::get('/settings', [SettingController::class, 'index']);
//});





