<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;

class RiwayatController extends Controller
{
    public function index()
    {
        // Ambil transaksi milik kasir yang login
        $transaksis = Transaksi::where('user_id', auth()->id())->latest()->get();

        return view('kasir.riwayat.index', compact('transaksis'));
    }
}
