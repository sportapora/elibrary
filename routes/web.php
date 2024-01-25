<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FinePaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserCollectionController;
use App\Http\Controllers\UserController;
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
    Route::delete('/review/{bookreview:id}', [BookController::class, 'destroyReview'])->name('review.destroy');
    Route::resource('/users', UserController::class)->except('show', 'edit', 'create');
});


//Routes for Peminjam
Route::group(['middleware' => ['auth', 'role:Peminjam']], function () {
    Route::post('review/{book:id}', [HomeController::class, 'store'])->name('review.store');
    Route::get('/collections', [UserCollectionController::class, 'index'])->name('collections.index');
    Route::post('/collection/{book:id}', [UserCollectionController::class, 'store'])->name('collections.store');
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/pembayaran-denda', [FinePaymentController::class, 'index'])->name('fine-payment.index');
});

require __DIR__ . '/auth.php';
