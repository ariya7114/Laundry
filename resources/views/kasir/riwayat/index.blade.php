@extends('layouts.app') {{-- Sesuaikan jika pakai layout lain --}}

@section('title', 'Riwayat Transaksi Kasir')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Riwayat Transaksi</h1>
        <a href="{{ route('kasir.dashboard') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow transition duration-300">
            ← Kembali ke Dashboard
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    @if($transaksis->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded mb-4 border border-yellow-300">
            Belum ada transaksi yang tercatat.
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse bg-white shadow rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-600 text-left">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Jenis Jasa</th>
                        <th class="px-4 py-3">Berat (Kg)</th>
                        <th class="px-4 py-3">Total Harga</th>
                        <th class="px-4 py-3">Metode Pembayaran</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($transaksis as $index => $transaksi)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 capitalize">{{ $transaksi->jenis_jasa }}</td>
                            <td class="px-4 py-2">{{ number_format($transaksi->berat, 2) }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 capitalize">{{ $transaksi->metode_pembayaran }}</td>
                            <td class="px-4 py-2">
                                <span class="inline-block px-2 py-1 text-sm rounded
                                    {{ $transaksi->status == 'selesai' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ ucfirst($transaksi->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2">{{ $transaksi->created_at->format('d M Y, H:i') }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('kasir.transaksi.struk', $transaksi->id) }}"
                                   class="text-blue-600 hover:underline text-sm">
                                   Cetak Struk
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
