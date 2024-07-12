<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\RoleController;

Route::get('/', [LandingPageController::class, 'index'])->name('index');
Route::get('umkm', [LandingPageController::class, 'umkm'])->name('umkm');
Route::get('informasi/{id}', [LandingPageController::class, 'informasi'])->name('informasi');
Route::get('pembina', [LandingPageController::class, 'pembina'])->name('pembina');
Route::get('contact', [LandingPageController::class, 'contact'])->name('contact');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('list', [DashboardController::class, 'index'])->name('dashboard');
});

Route::prefix('umkm')->middleware('auth')->group(function () {;
    Route::get('list', [UmkmController::class, 'index'])->name('umkm');
    Route::post('_kategori_umkm', [UmkmController::class, '_kategori_umkm']);
    Route::post('_post_umkm', [UmkmController::class, '_post_umkm']);
    Route::post('_get_umkm', [UmkmController::class, '_get_umkm']);
    Route::post('_get_umkm_by_id/{id}', [UmkmController::class, '_get_umkm_by_id']);
    Route::post('_update_umkm', [UmkmController::class, '_update_umkm']);
    Route::delete('_delete/{id}', [UmkmController::class, '_delete']);
});

Route::prefix('pembina')->middleware('auth')->group(function () {;
    Route::get('list', [PembinaController::class, 'index'])->name('pembina');
    Route::post('_pembina', [PembinaController::class, '_pembina']);
    Route::post('_list_pembina', [PembinaController::class, '_list_pembina']);
    Route::post('_post_pembina', [PembinaController::class, '_post_pembina']);
    Route::post('_get_pembina_by_id/{id}', [PembinaController::class, '_get_pembina_by_id']);
    Route::post('_update_pembina', [PembinaController::class, '_update_pembina']);
    Route::delete('_delete/{id}', [PembinaController::class, '_delete']);
});

Route::prefix('kategori')->middleware('auth')->group(function () {;
    Route::get('list', [KategoriController::class, 'index'])->name('kategori');
    Route::post('_list_kategori', [KategoriController::class, '_list_kategori']);
    Route::post('_post_kategori', [KategoriController::class, '_post_kategori']);
    Route::post('_get_kategori', [KategoriController::class, '_get_kategori']);
    Route::post('_get_kategori_by_id/{id}', [KategoriController::class, '_get_kategori_by_id']);
    Route::post('_update_kategori', [KategoriController::class, '_update_kategori']);
    Route::delete('_delete/{id}', [KategoriController::class, '_delete']);
});

Route::prefix('provinsi')->middleware('auth')->group(function () {;
    Route::get('list', [ProvinsiController::class, 'index'])->name('provinsi');
    Route::post('_list_provinsi', [ProvinsiController::class, '_list_provinsi']);
    Route::post('_post_provinsi', [ProvinsiController::class, '_post_provinsi']);
    Route::post('_get_provinsi', [ProvinsiController::class, '_get_provinsi']);
    Route::post('_get_provinsi_by_id/{id}', [ProvinsiController::class, '_get_provinsi_by_id']);
    Route::post('_update_provinsi', [ProvinsiController::class, '_update_provinsi']);
    Route::delete('_delete/{id}', [ProvinsiController::class, '_delete']);
});

Route::prefix('kota')->middleware('auth')->group(function () {;
    Route::get('list', [KotaController::class, 'index'])->name('kota');
    Route::post('_list_kota', [KotaController::class, '_list_kota']);
    Route::post('_post_kota', [KotaController::class, '_post_kota']);
    Route::post('_get_kota', [KotaController::class, '_get_kota']);
    Route::post('_get_kota_by_id/{id}', [KotaController::class, '_get_kota_by_id']);
    Route::post('_update_kota', [KotaController::class, '_update_kota']);
    Route::delete('_delete/{id}', [KotaController::class, '_delete']);
});

Route::prefix('role')->middleware('auth')->group(function () {;
    Route::get('list', [RoleController::class, 'index'])->name('role');
    Route::post('_list_role', [RoleController::class, '_list_role']);
    Route::post('_post_role', [RoleController::class, '_post_role']);
    Route::post('_get_role', [RoleController::class, '_get_role']);
    Route::post('_get_role_by_id/{id}', [RoleController::class, '_get_role_by_id']);
    Route::post('_update_role', [RoleController::class, '_update_role']);
    Route::delete('_delete/{id}', [RoleController::class, '_delete']);
});

Route::prefix('settings')->middleware('auth')->group(function () {;
    Route::get('list', [SettingsController::class, 'index'])->name('settings');
    Route::post('_update_user', [SettingsController::class, '_update_user']);
});

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('daftar', [AuthController::class, 'daftar'])->name('daftar');
    Route::post('_register', [AuthController::class, '_register'])->name('_register');
    Route::post('_login', [AuthController::class, '_login'])->name('_login');
    Route::post('_logout', [AuthController::class, '_logout']);
    Route::post('provinsi', [AuthController::class, 'getProvinsi']);
    Route::post('_kota', [AuthController::class, '_kota']);
    Route::post('_role', [AuthController::class, '_role']);
    Route::post('kota/{id}', [AuthController::class, 'getKota']);
});

