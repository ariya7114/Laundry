@extends('layouts.app')

@section('title', 'Dashboard Kasir')

@section('content')

{{-- Background Gradient 3D Fullscreen --}}
<style>
    body {
        background: linear-gradient(120deg, #e0f7ff, #f3f4f6, #ffffff);
        background-size: 200% 200%;
        animation: gradientFlow 20s ease infinite;
    }

    @keyframes gradientFlow {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>

{{-- Container --}}
<div class="min-h-screen px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-blue-700">Halo, {{ Auth::user()->name }} 👋</h1>
        <p class="text-sm text-gray-600 mt-2 md:mt-0">Hari ini: {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Transaksi Baru --}}
        <a href="{{ route('kasir.transaksi.index') }}" class="group bg-white hover:bg-blue-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-blue-700 group-hover:text-blue-900">Transaksi Baru</h2>
                <span class="text-blue-400 group-hover:text-blue-700 transition">&#8594;</span>
            </div>
            <p class="text-sm text-gray-600 mt-2">Catat layanan baru pelanggan dengan cepat.</p>
            <div class="mt-3 text-sm text-gray-500">
                Nomor Antrian: <span class="font-semibold">#{{ 'TRX' . now()->format('Ymd') . rand(100,999) }}</span>
            </div>
        </a>

        {{-- Riwayat Transaksi --}}
        <a href="{{ route('kasir.transaksi.riwayat') }}" class="group bg-white hover:bg-blue-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-blue-700 group-hover:text-blue-900">Riwayat Transaksi</h2>
                <span class="text-blue-400 group-hover:text-blue-700 transition">&#8594;</span>
            </div>
            <p class="text-sm text-gray-600 mt-2">Lihat transaksi sebelumnya yang telah dicatat.</p>
        </a>
    </div>
</div>

@endsection
