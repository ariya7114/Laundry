<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir - Laundry App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    {{-- Navbar/Header --}}
    <header class="bg-white border-b shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <h1 class="text-lg font-semibold text-blue-600">Laundry App - Kasir</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-gray-600 hover:text-red-500 transition">
                    Logout
                </button>
            </form>
        </div>
    </header>

    {{-- Sidebar + Content --}}
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="hidden md:block w-64 bg-white border-r p-6">
            <nav class="space-y-4">
                <a href="{{ route('kasir.dashboard') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-blue-100 hover:text-blue-700 transition">Dashboard</a>
                <a href="{{ route('kasir.transaksi.index') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-blue-100 hover:text-blue-700 transition">Transaksi</a>
                <a href="{{ route('kasir.transaksi.riwayat') }}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-blue-100 hover:text-blue-700 transition">Riwayat Transaksi</a>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-6 md:p-10 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Selamat Datang, Kasir!</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Card: Transaksi Baru --}}
                    <a href="{{ route('kasir.transaksi.index') }}" class="bg-white p-6 rounded-xl shadow hover:shadow-lg border border-gray-200 hover:border-blue-500 transition card-tilt">
                        <h3 class="text-lg font-semibold text-blue-700 mb-2">Transaksi Baru</h3>
                        <p class="text-sm text-gray-600">Catat layanan baru pelanggan.</p>
                    </a>

                    {{-- Card: Riwayat Transaksi --}}
                    <a href="{{ route('kasir.transaksi.riwayat') }}" class="bg-white p-6 rounded-xl shadow hover:shadow-lg border border-gray-200 hover:border-blue-500 transition card-tilt">
                        <h3 class="text-lg font-semibold text-blue-700 mb-2">Riwayat Transaksi</h3>
                        <p class="text-sm text-gray-600">Lihat transaksi yang sudah dilakukan.</p>
                    </a>
                </div>
            </div>
        </main>
    </div>

    {{-- Hover Animasi Kartu --}}
    <style>
        .card-tilt {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-tilt:hover {
            transform: perspective(1000px) rotateY(4deg) rotateX(2deg) scale(1.02);
        }
    </style>

</body>
</html>
