@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 to-purple-100 p-6">
    <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-md">

        <!-- Tombol Kembali -->
        <div class="mb-6">
            <a href="{{ route('pelanggan.dashboard') }}"
               class="inline-flex items-center text-sm text-indigo-600 hover:underline transition">
                ← Kembali ke Dashboard
            </a>
        </div>

        <!-- Judul -->
        <h2 class="text-2xl font-semibold mb-6 text-center text-indigo-700">Edit Profil</h2>

        <!-- Notifikasi Berhasil -->
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <!-- Nama -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-1">Nama</label>
                <input type="text" name="name" id="name"
                       value="{{ old('name', $user->name) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nomor Telepon -->
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-medium mb-1">Nomor Telepon</label>
                <input type="text" name="phone" id="phone"
                       value="{{ old('phone', $user->phone) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                @error('phone')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Alamat -->
            <div class="mb-6">
                <label for="address" class="block text-gray-700 font-medium mb-1">Alamat</label>
                <input type="text" name="address" id="address"
                       value="{{ old('address', $user->address) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                @error('address')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-end">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-2 rounded-lg shadow-md transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
