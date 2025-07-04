<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class PelangganTransaksiController extends Controller
{
    /**
     * Menampilkan status cucian yang masih aktif.
     */
    public function status()
    {
        $transaksis = Transaksi::where('kasir_id', Auth::id())
                            ->whereIn('status', ['menunggu', 'diproses'])
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('pelanggan.status-cucian', compact('transaksis'));
    }

    /**
     * Menampilkan riwayat transaksi yang sudah selesai.
     */
    public function riwayat()
    {
        $transaksis = Transaksi::where('kasir_id', Auth::id())
                            ->where('status', 'selesai')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('pelanggan.riwayat-transaksi', compact('transaksis'));
    }
}
