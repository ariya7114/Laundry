@extends('layouts.app')
@section('title', 'Dashboard Pemilik')

@section('content')
{{-- Background animasi gradasi --}}
<style>
@keyframes gradientMove {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}
.bg-animated {
    background: linear-gradient(-45deg, #a1c4fd, #c2e9fb, #fbc2eb, #a6c1ee);
    background-size: 300% 300%;
    animation: gradientMove 15s ease infinite;
}
</style>

<div class="min-h-screen bg-animated p-10 text-gray-800">
    <h1 class="text-3xl font-bold mb-8">Halo, Pemilik {{ Auth::user()->name }}</h1>

    {{-- Statistik Utama --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl shadow-md transform transition duration-300 hover:scale-105 hover:shadow-xl">
            <h2 class="text-lg font-semibold mb-2">Statistik Pendapatan</h2>
            <p class="text-2xl font-bold text-green-600">Rp12.500.000</p>
            <a href="{{ route('pemilik.pendapatan') }}" class="text-blue-500 hover:underline">Lihat detail »</a>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md transform transition duration-300 hover:scale-105 hover:shadow-xl">
            <h2 class="text-lg font-semibold mb-2">Laporan Harian</h2>
            <p class="text-gray-600">Tersedia laporan harian, mingguan & bulanan</p>
            <a href="#" class="text-blue-500 hover:underline">Download laporan »</a>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md transform transition duration-300 hover:scale-105 hover:shadow-xl">
            <h2 class="text-lg font-semibold mb-2">Jumlah Kasir</h2>
            <p class="text-2xl font-bold text-indigo-600">5</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md transform transition duration-300 hover:scale-105 hover:shadow-xl">
            <h2 class="text-lg font-semibold mb-2">Jumlah Pelanggan</h2>
            <p class="text-2xl font-bold text-orange-500">120</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md transform transition duration-300 hover:scale-105 hover:shadow-xl md:col-span-2 xl:col-span-1">
            <h2 class="text-lg font-semibold mb-2">Total Layanan</h2>
            <p class="text-2xl font-bold text-purple-500">3 Jenis (Cuci, Gosok, Cuci-Gosok)</p>
        </div>
    </div>

    {{-- Footer --}}
    
</div>
@endsection
