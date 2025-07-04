<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;


class KasirTransaksiController extends Controller
{
    public function index()
    {
        return view('kasir.transaksi.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_jasa' => 'required|string',
            'berat' => 'required|numeric|min:0.1',
            'metode_pembayaran' => 'required|in:cash,transfer',
        ]);

        $hargaPerKg = match ($request->jenis_jasa) {
            'cuci' => 5000,
            'gosok' => 4000,
            'cuci-gosok' => 8000,
            default => 0,
        };

        $total_harga = $hargaPerKg * $request->berat;

        Transaksi::create([
            'kasir_id' => auth()->id(),
            'jenis_jasa' => $request->jenis_jasa,
            'berat' => $request->berat,
            'total_harga' => $total_harga,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status' => 'selesai',
        ]);

        return redirect()->back()->with('success', 'Transaksi berhasil disimpan.');
    }

            public function history()
        {
            $user = Auth::user();
            $transaksis = Transaksi::where('kasir_id', $user->id)->orderBy('created_at', 'desc')->get();

            return view('kasir.riwayat.index', [
                'transaksis' => $transaksis
            ]);
        }


    public function cetakStruk($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        if ($transaksi->kasir_id !== auth()->id()) {
            abort(403, 'Anda tidak diizinkan mengakses struk ini.');
        }

        $pdf = Pdf::loadView('kasir.transaksi.struk', compact('transaksi'));
        $namaFile = 'Struk_Transaksi_' . $transaksi->id . '.pdf';

        return $pdf->download($namaFile);
    }
}
