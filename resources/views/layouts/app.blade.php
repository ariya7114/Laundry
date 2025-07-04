<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - LaundryApp</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="text-xl font-bold text-blue-600">LaundryApp</a>
            <div>
                <span class="mr-4">Halo, {{ Auth::user()->name ?? 'Guest' }}</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button class="text-red-500 hover:underline">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-8">
        <div class="container mx-auto px-4 py-4 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} LaundryApp. All rights reserved.
        </div>
    </footer>

    {{-- Tambahkan ini agar script grafik dari section @section('scripts') jalan --}}
    @yield('scripts')
</body>
</html>
