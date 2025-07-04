@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="bg-white shadow-md rounded-xl p-6 space-y-6">
        <!-- Header -->
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">Transaksi Baru</h2>
            <a href="{{ route('kasir.dashboard') }}"
                class="text-sm text-blue-600 hover:underline flex items-center gap-1">
                ← Kembali ke Dashboard
            </a>
        </div>

        <!-- Notifikasi sukses -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Transaksi -->
        <form action="{{ route('kasir.transaksi.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Jenis Jasa -->
            <div>
                <label for="jenis_jasa" class="block text-sm font-medium text-gray-700">Jenis Jasa</label>
                <select name="jenis_jasa" id="jenis_jasa" required
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Pilih Jasa --</option>
                    <option value="cuci" {{ old('jenis_jasa') == 'cuci' ? 'selected' : '' }}>Cuci (Rp5.000/kg)</option>
                    <option value="gosok" {{ old('jenis_jasa') == 'gosok' ? 'selected' : '' }}>Gosok (Rp4.000/kg)</option>
                    <option value="cuci-gosok" {{ old('jenis_jasa') == 'cuci-gosok' ? 'selected' : '' }}>Cuci & Gosok (Rp8.000/kg)</option>
                </select>
                @error('jenis_jasa')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Berat -->
            <div>
                <label for="berat" class="block text-sm font-medium text-gray-700">Berat Cucian (kg)</label>
                <input type="number" name="berat" id="berat" step="0.1" min="0.1" value="{{ old('berat') }}" required
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: 2.5">
                @error('berat')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Metode Pembayaran -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran</label>
                <div class="flex gap-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="metode_pembayaran" value="cash" class="text-blue-500"
                            {{ old('metode_pembayaran') == 'cash' ? 'checked' : '' }} required>
                        <span class="ml-2">Cash</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="metode_pembayaran" value="transfer" class="text-blue-500"
                            {{ old('metode_pembayaran') == 'transfer' ? 'checked' : '' }} required>
                        <span class="ml-2">Transfer</span>
                    </label>
                </div>
                @error('metode_pembayaran')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Simpan -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                    Simpan Transaksi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
