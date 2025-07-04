@extends('layouts.kasir')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Daftar Pekerja</h1>

    <div class="overflow-x-auto bg-white p-4 rounded shadow">
        @if($pekerjas->isEmpty())
            <p class="text-gray-600">Belum ada data pekerja.</p>
        @else
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telepon</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($pekerjas as $index => $pekerja)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $pekerja->nama }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $pekerja->telepon }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $pekerja->jabatan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
