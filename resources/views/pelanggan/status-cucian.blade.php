@extends('layouts.app')

@section('title', 'Status Cucian')

@section('content')
<div class="min-h-screen bg-blue-50 py-10 px-4">
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md p-6">

        <!-- Tombol Kembali -->
        <div class="mb-4">
            <a href="{{ route('pelanggan.dashboard') }}" class="text-indigo-600 text-sm hover:underline">
                ← Kembali ke Dashboard
            </a>
        </div>

        <!-- Judul -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
            <span class="mr-2">📦</span> Status Cucian
        </h2>

        <!-- Data Status -->
        @if($transaksis->isEmpty())
            <p class="text-gray-600">Tidak ada cucian aktif saat ini.</p>
        @else
            <div class="space-y-4">
                @foreach($transaksis as $trx)
                    <div class="border border-gray-200 p-4 rounded-lg bg-gray-50 shadow-sm">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Jenis Jasa: <strong>{{ $trx->jenis_jasa }}</strong></p>
                                <p class="text-sm text-gray-500 mb-1">Berat: {{ $trx->berat }} kg</p>
                                <p class="text-sm text-gray-500 mb-1">Metode Pembayaran: {{ ucfirst($trx->metode_pembayaran) }}</p>
                                <p class="text-sm text-gray-500">Total Harga: Rp {{ number_format($trx->total_harga, 0, ',', '.') }}</p>
                            </div>
                            <span class="px-3 py-1 text-sm rounded-full font-semibold
                                {{ $trx->status === 'menunggu' ? 'bg-yellow-100 text-yellow-700' : 'bg-blue-100 text-blue-700' }}">
                                {{ ucfirst($trx->status) }}
                            </span>
                        </div>
                        <p class="text-xs text-right text-gray-400 mt-2">Tanggal: {{ $trx->created_at->format('d M Y H:i') }}</p>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>
@endsection
