@extends('layouts.app')

@section('content')
<div x-data="{ sidebarOpen: true }" class="min-h-screen flex bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100">

    <!-- Sidebar -->
    <div :class="sidebarOpen ? 'w-64' : 'w-0'" class="bg-white shadow-md transition-all duration-300 overflow-hidden">
        <div class="h-full p-6">
            <h2 class="text-2xl font-bold text-indigo-600 mb-8">LaundryApp</h2>
            <nav class="space-y-4">
                <a href="{{ route('pelanggan.dashboard') }}" class="block hover:text-indigo-600">🏠 Dashboard</a>
                <a href="{{ route('profile.edit') }}" class="block hover:text-indigo-600">👤 Edit Profil</a>
                <a href="{{ route('pelanggan.status') }}" class="block hover:text-indigo-600">📦 Status Cucian</a>
                <a href="{{ route('pelanggan.riwayat') }}" class="block hover:text-indigo-600">🧾 Riwayat Transaksi</a>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <!-- Toggle Sidebar Button -->
        <div class="mb-6">
            <button @click="sidebarOpen = !sidebarOpen"
                class="text-indigo-600 text-2xl focus:outline-none">
                <svg x-show="!sidebarOpen" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="sidebarOpen" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Selamat Datang -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800">👋 Selamat Datang, {{ Auth::user()->name }}!</h1>
            <p class="text-gray-600 mt-1">Berikut ringkasan akun dan layanan laundry Anda.</p>
        </div>

        <!-- Grid Info -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Profil Ringkas -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="font-bold text-lg mb-2">🧑 Profil Ringkas</h2>
                <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Telepon:</strong> {{ Auth::user()->phone ?? '-' }}</p>
            </div>

            <!-- Tagihan -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="font-bold text-lg mb-2">💵 Tagihan Terakhir</h2>
                <p class="text-green-600 text-2xl font-semibold">Rp 125.000</p>
                <p>Status: <span class="text-gray-700">Selesai</span></p>
            </div>

            <!-- Jadwal -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="font-bold text-lg mb-2">🕓 Jadwal</h2>
                <p>Penjemputan: <strong>Hari ini, 10.00</strong></p>
                <p>Pengantaran: <strong>Besok, 14.00</strong></p>
            </div>
        </div>
    </div>
</div>

<!-- AlpineJS untuk toggle -->
<script src="//unpkg.com/alpinejs" defer></script>
@endsection
