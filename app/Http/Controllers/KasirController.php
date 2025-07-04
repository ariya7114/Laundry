<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User; // Tambahkan ini untuk akses ke data user

class KasirController extends Controller
{
    public function index()
    {
        // Ambil semua data transaksi terbaru
        $transaksis = Transaksi::latest()->get();

        // Kirim data transaksi ke view dashboard kasir
        return view('kasir.dashboard', compact('transaksis'));
    }

    public function showForm()
    {
        return view('kasir.transaksi-form');
    }

    public function cetakStruk($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('kasir.struk', compact('transaksi'));
    }

    //public function pekerja()
    //{
        // Ambil semua user dengan role 'kasir' atau 'karyawan' (ganti sesuai struktur role kamu)
       // $pekerjas = User::whereIn('role', ['kasir', 'karyawan'])->get();

        // Kirim ke view
        //return view('kasir.pekerja', compact('pekerjas'));
    //}
}
