<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::fallback(fn () => to_route('home'));

Route::get('/', HomeController::class)->name('home');
Route::get('/hubungi-kami', ContactUsController::class)->name('contact');

//Routes for Admin & Petugas
Route::group(['middleware' => ['auth', 'verified', 'role:Admin|Petugas']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/books', BookController::class)->except('create', 'edit');
});

//Routes for Admin
Route::group(['middleware' => 'role:Admin'], function () {
});

//Routes for Petugas
Route::group(['middleware' => 'role:Petugas'], function () {

});

//Routes for Peminjam
Route::group(['middleware' => 'role:Peminjam'], function () {

});

require __DIR__ . '/auth.php';
