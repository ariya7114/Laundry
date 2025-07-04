<aside class="w-64 bg-white shadow-md min-h-screen hidden md:block">
    <div class="p-6 border-b text-center">
        <h1 class="text-lg font-bold text-gray-800 flex items-center justify-center gap-2">
            🧺 Laravel Laundry
        </h1>
    </div>

    <nav class="mt-4 px-4 space-y-1">
        @php $role = Auth::user()->role; @endphp

        @switch($role)
            @case('admin')
                <x-sidebar-link href="{{ route('admin.dashboard') }}" icon="📊">Dashboard Admin</x-sidebar-link>
                <x-sidebar-link href="#" icon="🧍‍♂️">Kelola Pengguna</x-sidebar-link>
                <x-sidebar-link href="#" icon="📈">Laporan Sistem</x-sidebar-link>
                @break
            @case('pemilik')
                <x-sidebar-link href="{{ route('pemilik.dashboard') }}" icon="📊">Dashboard Pemilik</x-sidebar-link>
                <x-sidebar-link href="#" icon="📦">Data Bisnis</x-sidebar-link>
                @break
            @case('kasir')
                <x-sidebar-link href="{{ route('kasir.dashboard') }}" icon="🧾">Dashboard Kasir</x-sidebar-link>
                <x-sidebar-link href="#" icon="🛒">Transaksi</x-sidebar-link>
                @break
            @case('pelanggan')
                <x-sidebar-link href="{{ route('pelanggan.dashboard') }}" icon="📦">Dashboard Pelanggan</x-sidebar-link>
                <x-sidebar-link href="#" icon="📤">Status Cucian</x-sidebar-link>
                @break
        @endswitch

        <x-sidebar-link href="{{ route('profile.edit') }}" icon="🧑‍💼">Profil</x-sidebar-link>

        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="w-full text-left flex items-center gap-2 px-3 py-2 rounded text-red-500 hover:bg-red-100 transition">
                🚪 Logout
            </button>
        </form>
    </nav>
</aside>
