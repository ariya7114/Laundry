<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PemilikController extends Controller
{
    // Dashboard Pemilik
    public function index()
    {
        return view('pemilik.dashboard');
    }

    // Halaman Pendapatan Pemilik
    public function pendapatan()
    {
        $pendapatanHarian = [
            ['tanggal' => '2025-05-01', 'jumlah' => 250000],
            ['tanggal' => '2025-05-02', 'jumlah' => 300000],
            ['tanggal' => '2025-05-03', 'jumlah' => 150000],
            ['tanggal' => '2025-05-04', 'jumlah' => 500000],
            ['tanggal' => '2025-05-05', 'jumlah' => 275000],
        ];

        $labels = collect($pendapatanHarian)->pluck('tanggal');
        $values = collect($pendapatanHarian)->pluck('jumlah');

        return view('pemilik.pendapatan', compact('labels', 'values'));
    }
}
