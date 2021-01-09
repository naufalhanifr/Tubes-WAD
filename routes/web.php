<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\SpotController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/edit-profile', [AdminController::class, 'edit_profile'])->name('edit-profile');
    Route::patch('/edit-profile', [AdminController::class, 'update_profile'])->name('update-profile');
    Route::get('/edit-password', [AdminController::class, 'edit_password'])->name('edit-password');
    Route::patch('/edit-password', [AdminController::class, 'update_password'])->name('update-password');
    Route::resource('lokasi', LokasiController::class);
    Route::resource('spot', SpotController::class);
    Route::resource('jenis-kendaraan', jenisKendaraanController::class);
    Route::resource('kendaraan', KendaraanController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('user', UserController::class);
    Route::get('/transaksi/{transaksi}/set-status', [TransaksiController::class, 'set_status'])->name('transaksi.set-status');
    Route::patch('/transaksi/{transaksi}/set-status', [TransaksiController::class, 'set_status'])->name('transaksi.set-status');
    Route::get('/transaksi/{transaksi}/upload', [TransaksiController::class, 'transaksi_upload'])->name('transaksi.upload');
    Route::patch('/transaksi/{transaksi}/upload', [TransaksiController::class, 'transaksi_upload_update'])->name('transaksi.upload.update');
    Route::resource('pembayaran', PembayaranController::class);
    Route::get('/lokasi/{lokasi}/spot', [DashboardController::class, 'spot_lokasi'])->name('spot-lokasi');
    Route::get('/lokasi/{spot}/booking', [DashboardController::class, 'booking'])->name('booking-spot');
    Route::post('/lokasi/{spot}/booking', [DashboardController::class, 'booking_store'])->name('booking-spot-store');

});