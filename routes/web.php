<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;


Route::get('/', [LandingPageController::class, 'index'])->name('index');
Route::get('shop', [LandingPageController::class, 'shop'])->name('shop');
Route::get('shop-detail', [LandingPageController::class, 'shop_detail'])->name('shop_detail');
Route::get('chart', [LandingPageController::class, 'chart'])->name('chart');
Route::get('checkout', [LandingPageController::class, 'checkout'])->name('checkout');
Route::get('testimoni', [LandingPageController::class, 'testimoni'])->name('testimoni');
Route::get('contact', [LandingPageController::class, 'contact'])->name('contact');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard/list', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('umkm/list', [UmkmController::class, 'index'])->name('umkm');
    Route::get('pembina/list', [PembinaController::class, 'index'])->name('pembina');
});

Route::prefix('auth')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::get('registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
    Route::post('_register', [AuthController::class, '_register'])->name('_register');
    Route::post('_login', [AuthController::class, '_login'])->name('_login');
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('auth.logout');
});
