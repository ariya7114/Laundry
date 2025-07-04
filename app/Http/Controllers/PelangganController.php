<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Tampilkan halaman dashboard pelanggan.
     */
    public function index()
    {
        return view('pelanggan.dashboard');
    }
}
