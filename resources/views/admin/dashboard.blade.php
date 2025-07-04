@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<style>
    body {
        background: linear-gradient(-45deg, #f0f4ff, #e0e7ff, #e0f7fa, #fce4ec);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
    }

    @keyframes gradientBG {
        0% { background-position: 0% 50%; }
        70% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>

<div class="space-y-6 p-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>
        <p class="text-gray-600">
            Halo, <span class="text-indigo-600 font-semibold">{{ ucfirst(Auth::user()->name) }}</span>!
            Anda login sebagai <strong>Admin</strong>.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-transform transform hover:scale-105 cursor-pointer group">
            <h2 class="text-sm text-gray-500 group-hover:text-purple-700 mb-1">Pengguna Terdaftar</h2>
            <p class="text-3xl font-bold text-indigo-600">150</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-transform transform hover:scale-105 cursor-pointer group">
            <h2 class="text-sm text-gray-500 group-hover:text-green-700 mb-1">Transaksi Hari Ini</h2>
            <p class="text-3xl font-bold text-green-600">27</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-transform transform hover:scale-105 cursor-pointer group">
            <h2 class="text-sm text-gray-500 group-hover:text-emerald-700 mb-1">Pendapatan</h2>
            <p class="text-3xl font-bold text-emerald-600">Rp 2.500.000</p>
        </div>
    </div>

    <div class="bg-white shadow-sm rounded-xl p-4 text-sm text-gray-500 italic">
        Terakhir login: {{ \Carbon\Carbon::parse(Auth::user()->last_login_at)->translatedFormat('d F Y, H:i') }}
    </div>
</div>
@endsection
