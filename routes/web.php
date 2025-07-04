<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\TwoFactorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KasirTransaksiController;
use App\Http\Middleware\Ensure2FAIsVerified;
use App\Http\Controllers\PelangganTransaksiController;


/**
 * ================================
 * HALAMAN AWAL
 * ================================
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * ================================
 * AUTHENTICATION (LOGIN, REGISTER)
 * ================================
 */
require __DIR__ . '/auth.php';

/**
 * ================================
 * ROUTE UNTUK 2FA
 * ================================
 */
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/2fa/setup', [TwoFactorController::class, 'showSetupForm'])->name('2fa.setup');
    Route::post('/2fa/setup', [TwoFactorController::class, 'storeSecret'])->name('2fa.setup.store');

    Route::get('/2fa/verify', [TwoFactorController::class, 'showVerifyForm'])->name('2fa.verify');
    Route::post('/2fa/verify', [TwoFactorController::class, 'verify'])->name('2fa.verify.post');
});

/**
 * ================================
 * DASHBOARD BERDASARKAN ROLE
 * ================================
 */
Route::middleware(['auth', 'verified', Ensure2FAIsVerified::class])->group(function () {

    // Redirect otomatis sesuai role
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if (!$user) return redirect()->route('login');

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('pemilik')) {
            return redirect()->route('pemilik.dashboard');
        } elseif ($user->hasRole('kasir')) {
            return redirect()->route('kasir.dashboard');
        } elseif ($user->hasRole('pelanggan')) {
            return redirect()->route('pelanggan.dashboard');
        } else {
            abort(403, 'Role tidak dikenali');
        }
    })->name('dashboard');

    // =======================
    // Admin
    // =======================
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    // =======================
    // Pemilik
    // =======================
    Route::get('/dashboard/pemilik', [PemilikController::class, 'index'])->name('pemilik.dashboard');
    Route::get('/dashboard/pemilik/pendapatan', [PemilikController::class, 'pendapatan'])->name('pemilik.pendapatan');

    // =======================
    // Kasir
    // =======================
    Route::prefix('dashboard/kasir')->name('kasir.')->group(function () {
        Route::get('/', [KasirController::class, 'index'])->name('dashboard');

        // Transaksi via KasirTransaksiController
        Route::get('/transaksi', [KasirTransaksiController::class, 'index'])->name('transaksi.index');
        Route::post('/transaksi', [KasirTransaksiController::class, 'store'])->name('transaksi.store');

        Route::get('/riwayat', [KasirTransaksiController::class, 'history'])->name('transaksi.riwayat');
        Route::get('/transaksi/struk/{id}', [KasirTransaksiController::class, 'cetakStruk'])->name('transaksi.struk');

        // Transaksi via KasirController (opsional)
        Route::get('/transaksi/list', [KasirController::class, 'transaksi'])->name('transaksi.list');
        Route::post('/transaksi/simpan', [KasirController::class, 'simpanTransaksi'])->name('transaksi.simpan');
        Route::delete('/transaksi/{id}', [KasirController::class, 'hapusTransaksi'])->name('transaksi.hapus');
    });

    // =======================
    // Pelanggan
    // =======================
    Route::get('/dashboard/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.dashboard');

    // Fitur Tambahan Pelanggan
    Route::get('/dashboard/pelanggan/status-cucian', [PelangganTransaksiController::class, 'status'])->name('pelanggan.status');
    Route::get('/dashboard/pelanggan/riwayat-transaksi', [PelangganTransaksiController::class, 'riwayat'])->name('pelanggan.riwayat');
});

/**
 * ================================
 * PROFILE
 * ================================
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
