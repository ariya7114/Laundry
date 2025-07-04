@extends('layouts.app')

@section('content')
<style>
  @keyframes fade-in {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .fade-in {
    animation: fade-in 0.8s ease-out forwards;
  }
</style>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 px-4">
  <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md fade-in">

    <!-- Tombol Kembali -->
    <div class="mb-6">
      <a href="{{ url('/') }}" class="inline-flex items-center text-sm text-blue-600 hover:underline">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali ke Halaman Utama
      </a>
    </div>

    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Masuk ke Akun Laundry</h2>

    @if (session('status'))
      <div class="mb-4 text-sm text-green-600">
          {{ session('status') }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
      @csrf

      <!-- Email -->
      <div>
        <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0l4-4m-4 4l4 4" />
            </svg>
          </span>
          <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
            class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
        @error('email')
          <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Kata Sandi</label>
        <div class="relative">
          <!-- Ikon kunci -->
          <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 15v2m0-10a4 4 0 00-4 4v4h8v-4a4 4 0 00-4-4z" />
            </svg>
          </span>

          <!-- Input password -->
          <input id="password" type="password" name="password" required
            class="pl-10 pr-10 w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
        @error('password')
          <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
      </div>

      <!-- Remember -->
      <div class="flex items-center justify-between">
        <label class="flex items-center text-sm">
          <input type="checkbox" name="remember" class="mr-2 border-gray-300 rounded" />
          Ingat saya
        </label>
        @if (Route::has('password.request'))
          <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
            Lupa Password?
          </a>
        @endif
      </div>

      <!-- Submit -->
      <div>
        <button type="submit"
          class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition transform hover:scale-105">
          Masuk
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  function togglePassword() {
    const input = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');
    const path1 = document.getElementById('eyeOpenPath');
    const path2 = document.getElementById('eyeOpenPath2');

    if (input.type === 'password') {
      input.type = 'text';
      // Mata tertutup
      path1.setAttribute('d', 'M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.978 9.978 0 012.231-3.592M6.18 6.18A9.993 9.993 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.978 9.978 0 01-1.845 2.888');
      path2.setAttribute('d', 'M15 12a3 3 0 01-3 3 3 3 0 01-3-3 3 3 0 013-3 3 3 0 013 3zm6 6L6 6');
    } else {
      input.type = 'password';
      // Mata terbuka
      path1.setAttribute('d', 'M15 12a3 3 0 11-6 0 3 3 0 016 0z');
      path2.setAttribute('d', 'M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z');
    }
  }
</script>
@endsection
