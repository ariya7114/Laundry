@extends('layouts.kasir') {{-- Pastikan file ini sesuai layout kasirmu --}}

@section('title', 'Form Transaksi')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-xl font-semibold mb-4">Form Transaksi Baru</h2>

    <form action="{{ route('kasir.transaksi.store') }}" method="POST">
        @csrf

        {{-- Berat Cucian --}}
        <div class="mb-4">
            <label for="berat" class="block text-sm font-medium text-gray-700">Berat Cucian (Kg)</label>
            <input type="number" name="berat" id="berat" step="0.1" min="0" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        {{-- Jenis Jasa --}}
        <div class="mb-4">
            <label for="jasa" class="block text-sm font-medium text-gray-700">Jenis Jasa</label>
            <select name="jasa" id="jasa" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="">-- Pilih Jasa --</option>
                <option value="cuci">Cuci</option>
                <option value="gosok">Gosok</option>
                <option value="cuci-gosok">Cuci & Gosok</option>
            </select>
        </div>

        {{-- Antar Jemput --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Antar Jemput</label>
            <div class="mt-2 space-x-4">
                <label><input type="radio" name="antar" value="ya" required> Ya</label>
                <label><input type="radio" name="antar" value="tidak"> Tidak</label>
            </div>
        </div>

        {{-- Harga (dummy, bisa dinamis pakai JS nanti) --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Total Harga</label>
            <div class="p-2 bg-gray-100 rounded-md text-lg" id="harga">Rp -</div>
        </div>

        {{-- Submit --}}
        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">Simpan Transaksi</button>
        </div>
    </form>
</div>

{{-- Skrip hitung harga sederhana (bisa diganti Vue/Livewire nantinya) --}}
<script>
    const beratInput = document.getElementById('berat');
    const jasaInput = document.getElementById('jasa');
    const hargaOutput = document.getElementById('harga');

    function hitungHarga() {
        const berat = parseFloat(beratInput.value) || 0;
        const jasa = jasaInput.value;

        let hargaPerKg = 0;

        if (jasa === 'cuci') hargaPerKg = 5000;
        else if (jasa === 'gosok') hargaPerKg = 4000;
        else if (jasa === 'cuci-gosok') hargaPerKg = 8000;

        const total = berat * hargaPerKg;
        hargaOutput.textContent = total ? `Rp ${total.toLocaleString()}` : 'Rp -';
    }

    beratInput.addEventListener('input', hitungHarga);
    jasaInput.addEventListener('change', hitungHarga);
</script>
@endsection
