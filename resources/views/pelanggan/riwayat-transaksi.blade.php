@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('content')
<div class="min-h-screen bg-purple-50 py-10 px-4">
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-6">

        <!-- Tombol Kembali -->
        <div class="mb-4">
            <a href="{{ route('pelanggan.dashboard') }}" class="text-indigo-600 text-sm hover:underline">
                ← Kembali ke Dashboard
            </a>
        </div>

        <!-- Judul -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
            <span class="mr-2">🧾</span> Riwayat Transaksi
        </h2>

        <!-- Cek Riwayat -->
        @if ($transaksis->isEmpty())
            <p class="text-gray-600">Belum ada riwayat transaksi.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full table-auto text-sm border border-gray-200 rounded-lg">
                    <thead class="bg-gray-100 text-left">
                        <tr>
                            <th class="px-4 py-2">Tanggal</th>
                            <th class="px-4 py-2">Layanan</th>
                            <th class="px-4 py-2">Berat</th>
                            <th class="px-4 py-2">Biaya</th>
                            <th class="px-4 py-2">Pembayaran</th>
                            <th class="px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $trx)
                            <tr class="border-t border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $trx->created_at->format('d M Y') }}</td>
                                <td class="px-4 py-2">{{ ucfirst($trx->jenis_jasa) }}</td>
                                <td class="px-4 py-2">{{ $trx->berat }} kg</td>
                                <td class="px-4 py-2">Rp {{ number_format($trx->total_harga, 0, ',', '.') }}</td>
                                <td class="px-4 py-2">{{ ucfirst($trx->metode_pembayaran) }}</td>
                                <td class="px-4 py-2">
                                    <span class="text-green-700 bg-green-100 px-2 py-1 rounded text-xs font-semibold">
                                        {{ ucfirst($trx->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    </div>
</div>
@endsection
