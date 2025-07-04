<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Laundry App</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />

  <!-- Animasi & Glow -->
  <style>
    @keyframes fade-in {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .fade-in { animation: fade-in 1s ease-out forwards; }
    .fade-in-delay { animation-delay: 0.4s; }

    /* Efek glow tombol */
    .glow-btn {
      position: relative;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .glow-btn::before {
      content: "";
      position: absolute;
      bottom: -5px;
      left: 50%;
      transform: translateX(-50%);
      width: 80%;
      height: 8px;
      background: radial-gradient(ellipse at center, rgba(59, 130, 246, 0.4), transparent);
      border-radius: 50%;
      filter: blur(4px);
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .glow-btn:hover {
      transform: translateY(-2px) scale(1.05);
      box-shadow: 0 6px 15px rgba(59, 130, 246, 0.4);
    }

    .glow-btn:hover::before {
      opacity: 1;
    }
  </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 text-gray-800">

  <!-- Navbar -->
  <nav class="flex justify-end p-6">
    <div class="space-x-4">
      <a href="{{ route('login') }}" class="glow-btn relative px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-all">
        Login
      </a>
      <a href="{{ route('register') }}" class="glow-btn relative px-6 py-2 bg-white text-gray-800 border border-gray-300 rounded hover:bg-gray-100 transition-all">
        Daftar
      </a>
    </div>
  </nav>

  <!-- Konten -->
  <div class="flex flex-col items-center justify-center text-center px-4 mt-10">
    <h1 class="text-4xl font-bold fade-in">Selamat Datang di Laundry App</h1>
    <p class="mt-4 text-lg max-w-2xl fade-in fade-in-delay">
      Aplikasi modern untuk memudahkan pengelolaan layanan laundry secara efisien, praktis, dan profesional.
    </p>

    <!-- Ikon Ramai -->
    <div class="mt-10 grid grid-cols-4 gap-6 text-blue-600 fade-in fade-in-delay">
      <!-- Kaos -->
      <div class="transform transition-transform duration-300 hover:scale-110 hover:-translate-y-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M4 4l4 2 4-2 4 2 4-2v6a4 4 0 01-4 4v6H8v-6a4 4 0 01-4-4V4z" />
        </svg>
      </div>

      <!-- Tetes air -->
      <div class="transform transition-transform duration-300 hover:scale-110 hover:-translate-y-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M12 3.75C12 3.75 6.75 10.125 6.75 13.5a5.25 5.25 0 0010.5 0c0-3.375-5.25-9.75-5.25-9.75z" />
        </svg>
      </div>

      <!-- Gelembung -->
      <div class="transform transition-transform duration-300 hover:scale-110 hover:-translate-y-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <circle cx="12" cy="12" r="5" stroke-width="1.5" />
          <circle cx="18" cy="8" r="2" stroke-width="1.5" />
        </svg>
      </div>

      <!-- Mesin cuci -->
      <div class="transform transition-transform duration-300 hover:scale-110 hover:-translate-y-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <rect x="4" y="4" width="16" height="16" rx="2" stroke-width="1.5"/>
          <circle cx="12" cy="14" r="4" stroke-width="1.5" />
          <circle cx="8" cy="8" r="1" fill="currentColor" />
          <circle cx="10.5" cy="8" r="1" fill="currentColor" />
        </svg>
      </div>
    </div>
  </div>

</body>
</html>
