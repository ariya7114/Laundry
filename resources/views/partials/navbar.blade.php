<nav class="bg-white border-b shadow px-6 py-4 flex justify-between items-center">
    <div class="text-xl font-bold text-gray-800 flex items-center gap-2">
        🧺 Laravel Laundry
    </div>

    <div class="flex items-center space-x-4">
        <a href="{{ route('profile.edit') }}" class="text-gray-600 hover:text-blue-600 font-medium">Profil</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Logout</button>
        </form>
    </div>
</nav>
