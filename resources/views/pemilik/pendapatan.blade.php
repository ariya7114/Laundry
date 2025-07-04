@extends('layouts.app')

@section('title', 'Pendapatan Pemilik')

@section('content')
<div class="space-y-6 p-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800">Grafik Pendapatan Harian</h1>

        <a href="{{ url()->previous() }}"
           class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-lg shadow hover:bg-indigo-700 transition">
            ← Kembali
        </a>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <canvas id="pendapatanChart" class="w-full" style="height: 300px;"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('pendapatanChart').getContext('2d');

        // Hapus grafik sebelumnya jika ada
        if (window.chartInstance) {
            window.chartInstance.destroy();
        }

        // Buat grafik baru
        window.chartInstance = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Pendapatan Harian',
                    data: {!! json_encode($values) !!},
                    backgroundColor: 'rgba(99, 102, 241, 0.7)',
                    borderColor: 'rgba(99, 102, 241, 1)',
                    borderWidth: 1,
                    borderRadius: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: {
                    duration: 0
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
