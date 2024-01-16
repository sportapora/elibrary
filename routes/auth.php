<?php

use App\Http\Controllers\Auth\AuthenticatedAdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredAdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('admin/register', [RegisteredAdminController::class, 'create'])->name('admin.register.create');
    Route::post('admin/register', [RegisteredAdminController::class, 'store'])->name('admin.register.store');

    Route::get('admin/login', [AuthenticatedAdminController::class, 'create'])->name('admin.login.create');
    Route::post('admin/login', [AuthenticatedAdminController::class, 'store'])->name('admin.login.store');

    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
