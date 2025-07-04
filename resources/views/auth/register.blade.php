<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Laundry App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fade-in 0.6s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md fade-in">

        <!-- Tombol Kembali -->
        <div class="mb-4">
            <a href="{{ url('/') }}" class="inline-flex items-center text-sm text-blue-600 hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Halaman Utama
            </a>
        </div>

        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Buat Akun Laundry</h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium">Nama Lengkap</label>
                <input id="name" type="text" name="name" required autofocus value="{{ old('name') }}"
                       class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input id="email" type="email" name="email" required value="{{ old('email') }}"
                       class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-2 focus:ring-blue-500" />
            </div>

            <div class="relative">
                <label for="password" class="block text-sm font-medium">Password</label>
                <input id="password" type="password" name="password" required
                       class="w-full border border-gray-300 px-4 py-2 rounded-md pr-10 focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="role" class="block text-sm font-medium">Pilih Peran</label>
                <select id="role" name="role"
                        class="w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-2 focus:ring-blue-500">
                    <option value="pelanggan" selected>Pelanggan</option>
                    <option value="admin">Admin</option>
                    <option value="pemilik">Pemilik</option>
                    <option value="kasir">Kasir</option>
                </select>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">Sudah punya akun?</a>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                    Daftar
                </button>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const path1 = document.getElementById('eyeOpenPath');
            const path2 = document.getElementById('eyeOpenPath2');

            if (input.type === 'password') {
                input.type = 'text';
                path1.setAttribute('d', 'M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.978 9.978 0 012.231-3.592M6.18 6.18A9.993 9.993 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.978 9.978 0 01-1.845 2.888');
                path2.setAttribute('d', 'M15 12a3 3 0 01-3 3 3 3 0 01-3-3 3 3 0 013-3 3 3 0 013 3zm6 6L6 6');
            } else {
                input.type = 'password';
                path1.setAttribute('d', 'M15 12a3 3 0 11-6 0 3 3 0 016 0z');
                path2.setAttribute('d', 'M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z');
            }
        }
    </script>

</body>
</html>
