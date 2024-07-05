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
Route::get('shop', [LandingPageController::class, 'shop'])->name('shop');
Route::get('shop-detail', [LandingPageController::class, 'shop_detail'])->name('shop_detail');
Route::get('chart', [LandingPageController::class, 'chart'])->name('chart');
Route::get('checkout', [LandingPageController::class, 'checkout'])->name('checkout');
Route::get('testimonial', [LandingPageController::class, 'testimonial'])->name('testimonial');
Route::get('contact', [LandingPageController::class, 'contact'])->name('contact');
