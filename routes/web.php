<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\LandingPageController;

Route::get('dashboard/list', [DashboardController::class, 'index'])->name('index');
Route::get('umkm/list', [UmkmController::class, 'index'])->name('index');
Route::get('pembina/list', [PembinaController::class, 'index'])->name('index');

Route::get('/', [LandingPageController::class, 'index'])->name('index');
Route::get('umkm', [LandingPageController::class, 'umkm'])->name('umkm');
Route::get('informasi', [LandingPageController::class, 'informasi'])->name('informasi');
Route::get('chart', [LandingPageController::class, 'chart'])->name('chart');
Route::get('checkout', [LandingPageController::class, 'checkout'])->name('checkout');
Route::get('pembina', [LandingPageController::class, 'pembina'])->name('pembina');
Route::get('contact', [LandingPageController::class, 'contact'])->name('contact');
Route::get('login', [LandingPageController::class, 'login'])->name('login');
Route::get('daftar', [LandingPageController::class, 'daftar'])->name('daftar');
