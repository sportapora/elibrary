<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
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

Route::fallback(fn() => to_route('home'));

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/book/{book:id}', [HomeController::class, 'show'])->name('home.detail');
Route::get('/hubungi-kami', [ContactUsController::class, 'index'])->name('contact.index');
Route::post('/hubungi-kami', [ContactUsController::class, 'store'])->name('contact.store');

//Routes for Admin & Petugas
Route::group(['middleware' => ['auth', 'verified', 'role:Admin|Petugas']], function () {
    Route::resource('/books', BookController::class)->except('create', 'edit');
    Route::resource('/categories', CategoryController::class)->except('create', 'edit', 'show');
});

//Routes for Admin
Route::group(['middleware' => ['auth', 'role:Admin']], function () {
});


//Routes for Peminjam
Route::group(['middleware' => ['auth', 'role:Peminjam']], function () {

});

require __DIR__ . '/auth.php';
