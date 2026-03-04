<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Dashboard TaniBantu') }}</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        tanigreen: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e', // Hijau Daun Utama
                            600: '#16a34a', // Hover
                            700: '#15803d',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800 antialiased font-sans flex h-screen overflow-hidden">

    <!-- 1. Sidebar -->
    <aside class="w-64 bg-white shadow-lg hidden md:flex flex-col border-r border-gray-100 z-20 sticky top-0 h-screen">
        <!-- Logo -->
        <div class="h-20 flex items-center px-6 border-b border-gray-100">
            <a href="{{ url('/') }}"
                class="flex items-center gap-2 text-tanigreen-600 hover:text-tanigreen-700 transition duration-300">
                <i class="fa-solid fa-leaf text-2xl"></i>
                <span class="text-xl font-extrabold tracking-tight">TaniBantu</span>
            </a>
        </div>

        <!-- Menu -->
        <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
            @auth
            @if(auth()->user()->role === 'seller')
            <a href="{{ url('/seller/dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->is('seller/dashboard') ? 'bg-emerald-50 text-emerald-700' : 'text-gray-500 hover:bg-emerald-50 hover:text-emerald-700' }} rounded-xl font-bold transition-colors">
                <i class="fa-solid fa-store text-lg w-5 text-center"></i> Seller Center
            </a>
            @endif
            @endauth
            <a href="{{ url('/jadwal') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->is('jadwal') ? 'bg-tanigreen-50 text-tanigreen-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }} rounded-xl font-bold transition-colors">
                <i class="fa-regular fa-calendar-check text-lg w-5 text-center"></i> Jadwal Tanam Saya
            </a>
            <a href="{{ url('/harga') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->is('harga') ? 'bg-tanigreen-50 text-tanigreen-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }} rounded-xl font-bold transition-colors">
                <i class="fa-solid fa-chart-line text-lg w-5 text-center"></i> Harga Komoditas
            </a>
            <a href="{{ url('/forum') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->is('forum') ? 'bg-tanigreen-50 text-tanigreen-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }} rounded-xl font-bold transition-colors">
                <i class="fa-regular fa-comments text-lg w-5 text-center"></i> Forum Diskusi
            </a>
            <a href="{{ url('/toko') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->is('toko') ? 'bg-tanigreen-50 text-tanigreen-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }} rounded-xl font-bold transition-colors">
                <i class="fa-solid fa-basket-shopping text-lg w-5 text-center"></i> Toko Pertanian
            </a>
            <a href="{{ url('/profil') }}"
                class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('profile.*') || request()->is('profil') ? 'bg-tanigreen-50 text-tanigreen-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }} rounded-xl font-bold transition-colors">
                <i class="fa-regular fa-user text-lg w-5 text-center"></i> Profil
            </a>
        </nav>

        <!-- Logout -->
        <div class="p-6 border-t border-gray-100">
            @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-3 px-4 py-2 text-red-500 hover:bg-red-50 rounded-xl font-bold transition-colors group">
                    <i class="fa-solid fa-arrow-right-from-bracket mt-1 group-hover:-translate-x-1 transition-transform"></i> Keluar
                </button>
            </form>
            @else
            <a href="{{ route('login') }}"
                class="flex items-center gap-3 px-4 py-2 text-tanigreen-600 hover:bg-tanigreen-50 rounded-xl font-bold transition-colors group">
                <i class="fa-solid fa-right-to-bracket mt-1 group-hover:translate-x-1 transition-transform"></i> Masuk
            </a>
            @endauth
        </div>
    </aside>

    <!-- 2. Main Content Area -->
    <main class="flex-1 flex flex-col h-screen overflow-hidden relative">

        <!-- Mobile Header (Visible only on small screens) -->
        <header class="md:hidden bg-tanigreen-600 shadow-sm h-16 flex items-center justify-between px-4 z-20">
            <div class="flex items-center gap-2 text-white">
                <i class="fa-solid fa-leaf text-xl"></i>
                <span class="text-lg font-extrabold tracking-tight drop-shadow-sm">TaniBantu</span>
            </div>
            <button class="text-white hover:text-tanigreen-100 focus:outline-none transition-colors">
                <i class="fa-solid fa-bars text-xl"></i>
            </button>
        </header>

        <!-- Dynamic Content -->
        <div class="flex-1 overflow-y-auto p-4 md:p-8 pb-32">
            @isset($header)
                <header class="bg-tanigreen-600 shadow-md mb-6 rounded-2xl border-none">
                    <div class="py-6 px-4 sm:px-6 lg:px-8 text-white">
                        {{ $header }}
                    </div>
                </header>
            @endisset
            @yield('content')
            {{ $slot ?? '' }}
        </div>

    </main>

    @stack('scripts')
</body>

</html>
