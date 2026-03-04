<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaniBantu - Solusi Cerdas Bertani Lebih Hebat</title>

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
                        },
                        taniaccent: {
                            50: '#fffbeb',
                            100: '#fef3c7',
                            200: '#fde68a',
                            300: '#fcd34d',
                            400: '#fbbf24', // Aksen Oranye/Kuning
                            500: '#f59e0b',
                            600: '#d97706',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 text-gray-800 antialiased font-sans">

    <!-- 1. Header -->
    <header class="bg-tanigreen-700 shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center max-w-7xl">
            <!-- Logo -->
            <a href="{{ url('/') }}"
                class="flex items-center gap-2 text-white hover:text-tanigreen-100 transition duration-300">
                <i class="fa-solid fa-leaf text-2xl text-white"></i>
                <span class="text-2xl font-extrabold tracking-tight text-white drop-shadow-sm">TaniBantu</span>
            </a>

            <!-- Menu -->
            <nav class="hidden md:flex space-x-8 font-bold text-tanigreen-50">
                <a href="{{ url('/jadwal') }}" class="hover:text-white transition duration-200 drop-shadow-sm">Jadwal</a>
                <a href="{{ url('/harga') }}" class="hover:text-white transition duration-200 drop-shadow-sm">Harga</a>
                <a href="{{ url('/forum') }}" class="hover:text-white transition duration-200 drop-shadow-sm">Forum</a>
                <a href="{{ url('/toko') }}" class="hover:text-white transition duration-200 drop-shadow-sm">Toko</a>
            </nav>

            <!-- Tombol Profil / Auth -->
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="bg-white text-tanigreen-600 border border-transparent px-5 py-2.5 rounded-full font-bold hover:bg-tanigreen-50 flex items-center gap-2 transition duration-300 shadow-md hover:shadow-lg">
                        <i class="fa-solid fa-gauge"></i> Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-white text-tanigreen-600 border border-transparent px-5 py-2.5 rounded-full font-bold hover:bg-tanigreen-50 flex items-center gap-2 transition duration-300 shadow-md hover:shadow-lg">
                        <i class="fa-solid fa-right-to-bracket"></i> Masuk
                    </a>
                    <a href="{{ route('register') }}"
                        class="bg-tanigreen-800 text-white border border-transparent px-5 py-2.5 rounded-full font-bold hover:bg-tanigreen-900 flex items-center gap-2 transition duration-300 shadow-md hover:shadow-lg hidden sm:flex">
                        <i class="fa-solid fa-user-plus"></i> Daftar
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Toggle -->
            <div class="md:hidden">
                <button class="text-white hover:text-tanigreen-100 focus:outline-none">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- 2. Hero Section -->
    <section class="py-24 md:py-32 relative overflow-hidden bg-green-900 flex items-center min-h-[85vh]">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/bg-sawah.jpg') }}" alt="Sawah Nusantara" class="w-full h-full object-cover" />
        </div>
        
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-green-950/70 z-0 mix-blend-multiply"></div>

        <div class="container mx-auto px-4 text-center max-w-4xl relative z-10 animate-fade-in-up">
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-white mb-6 leading-[1.1] tracking-tight drop-shadow-xl">
                Solusi Cerdas <br class="hidden sm:block" />
                <span
                    class="text-tanigreen-400 bg-clip-text text-transparent bg-gradient-to-r from-tanigreen-300 to-tanigreen-100">Bertani
                    Lebih Hebat</span>
            </h1>
            <p class="text-xl md:text-2xl text-green-50/90 mb-10 max-w-2xl mx-auto leading-relaxed font-medium drop-shadow-md">
                Pantau harga pasar, jadwal tanam, dan konsultasi ahli dalam satu genggaman.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ url('/jadwal') }}"
                    class="bg-tanigreen-600 text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-tanigreen-700 hover:-translate-y-1 transition-all duration-300 shadow-xl hover:shadow-2xl hover:shadow-tanigreen-600/30 flex items-center justify-center gap-3">
                    <i class="fa-regular fa-calendar-check text-xl"></i> Mulai Jadwal Tanam
                </a>
                <a href="{{ url('/harga') }}"
                    class="bg-white/10 backdrop-blur-md text-white border-2 border-white/30 px-8 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-gray-900 hover:-translate-y-1 transition-all duration-300 shadow-xl hover:shadow-2xl group flex items-center justify-center gap-3">
                    <i class="fa-solid fa-tags text-taniaccent-400 text-xl group-hover:text-taniaccent-500 transition-colors"></i> Cek Harga Hari Ini
                </a>
            </div>
        </div>

        <style>
            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(30px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fade-in-up {
                animation: fadeInUp 1s ease-out forwards;
            }
        </style>
    </section>

    <!-- 3. Layanan Kami (Quick Access) -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">Layanan Kami</h2>
                <p class="text-xl text-gray-500 font-medium max-w-2xl mx-auto">Akses cepat fitur utama untuk kebutuhan
                    pertanian Anda</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card 1: Jadwal Tanam -->
                <a href="{{ url('/jadwal') }}"
                    class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 hover:shadow-2xl hover:-translate-y-3 transition-all duration-300 group cursor-pointer relative overflow-hidden block">
                    <div
                        class="absolute top-0 right-0 p-6 opacity-0 group-hover:opacity-100 transition-opacity text-tanigreen-200">
                        <i class="fa-solid fa-arrow-right -rotate-45 text-2xl"></i>
                    </div>
                    <div
                        class="bg-tanigreen-50 w-16 h-16 rounded-2xl flex items-center justify-center text-tanigreen-600 text-2xl mb-8 group-hover:bg-tanigreen-600 group-hover:text-white group-hover:scale-110 transition-all duration-300 shadow-sm">
                        <i class="fa-regular fa-calendar-alt"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-tanigreen-600 transition-colors">
                        Jadwal Tanam</h3>
                    <p class="text-gray-500 leading-relaxed font-medium">Reminder pupuk & air agar tanaman tumbuh
                        optimal.</p>
                </a>

                <!-- Card 2: Harga Pasar -->
                <a href="{{ url('/harga') }}"
                    class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 hover:shadow-2xl hover:-translate-y-3 transition-all duration-300 group cursor-pointer relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 p-6 opacity-0 group-hover:opacity-100 transition-opacity text-taniaccent-200">
                        <i class="fa-solid fa-arrow-right -rotate-45 text-2xl"></i>
                    </div>
                    <div
                        class="bg-orange-50 w-16 h-16 rounded-2xl flex items-center justify-center text-taniaccent-500 text-2xl mb-8 group-hover:bg-taniaccent-500 group-hover:text-white group-hover:scale-110 transition-all duration-300 shadow-sm">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-taniaccent-600 transition-colors">
                        Harga Pasar</h3>
                    <p class="text-gray-500 leading-relaxed font-medium">Update harga komoditas lokal secara real-time.
                    </p>
                </a>

                <!-- Card 3: Forum Ahli -->
                <a href="{{ url('/forum') }}"
                    class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 hover:shadow-2xl hover:-translate-y-3 transition-all duration-300 group cursor-pointer relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 p-6 opacity-0 group-hover:opacity-100 transition-opacity text-blue-200">
                        <i class="fa-solid fa-arrow-right -rotate-45 text-2xl"></i>
                    </div>
                    <div
                        class="bg-blue-50 w-16 h-16 rounded-2xl flex items-center justify-center text-blue-500 text-2xl mb-8 group-hover:bg-blue-500 group-hover:text-white group-hover:scale-110 transition-all duration-300 shadow-sm">
                        <i class="fa-regular fa-comments"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">Forum
                        Ahli</h3>
                    <p class="text-gray-500 leading-relaxed font-medium">Tanya jawab penyakit tanaman dengan para pakar.
                    </p>
                </a>

                <!-- Card 4: Pupuk Organik -->
                <a href="{{ url('/toko') }}"
                    class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 hover:shadow-2xl hover:-translate-y-3 transition-all duration-300 group cursor-pointer relative overflow-hidden block">
                    <div
                        class="absolute top-0 right-0 p-6 opacity-0 group-hover:opacity-100 transition-opacity text-emerald-200">
                        <i class="fa-solid fa-arrow-right -rotate-45 text-2xl"></i>
                    </div>
                    <div
                        class="bg-emerald-50 w-16 h-16 rounded-2xl flex items-center justify-center text-emerald-600 text-2xl mb-8 group-hover:bg-emerald-600 group-hover:text-white group-hover:scale-110 transition-all duration-300 shadow-sm">
                        <i class="fa-solid fa-basket-shopping"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-emerald-600 transition-colors">
                        Pupuk Organik</h3>
                    <p class="text-gray-500 leading-relaxed font-medium">Beli nutrisi alami terbaik untuk hasil panen
                        melimpah.</p>
                </a>
            </div>
        </div>
    </section>

    <!-- 4. Harga Terkini -->
    <section class="py-24 bg-gray-50 border-t border-gray-100">
        <div class="container mx-auto px-4 max-w-5xl">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-3 tracking-tight">Harga Komoditas Hari Ini</h2>
                    <p class="text-lg text-gray-500 font-medium">Pantauan harga rata-rata di pasar lokal</p>
                </div>
                <a href="{{ url('/harga') }}"
                    class="inline-flex py-3 px-6 bg-white border border-gray-200 rounded-full text-tanigreen-600 font-bold hover:bg-tanigreen-50 hover:border-tanigreen-200 transition-colors items-center gap-2 shadow-sm">
                    Lihat Semua Harga <i class="fa-solid fa-arrow-right text-sm"></i>
                </a>
            </div>

            <!-- Price Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Cabai Merah -->
                <div
                    class="bg-white p-7 rounded-3xl shadow-sm border border-gray-100 flex flex-col justify-between hover:border-red-200 hover:shadow-lg transition-all group">
                    <div class="flex items-center gap-4 mb-5">
                        <div
                            class="w-14 h-14 bg-red-50 rounded-2xl flex items-center justify-center text-red-500 text-2xl shadow-inner group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-pepper-hot"></i>
                        </div>
                        <div>
                            <h4 class="text-gray-400 font-bold uppercase tracking-wider text-[11px] mb-1">Sayuran</h4>
                            <p class="text-lg font-bold text-gray-900">Cabai Merah</p>
                        </div>
                    </div>
                    <div class="flex items-end justify-between mt-2 pt-5 border-t border-gray-50">
                        <div>
                            <p class="text-2xl font-extrabold text-gray-900">Rp40.000<span
                                    class="text-sm font-semibold text-gray-400"> /kg</span></p>
                        </div>
                        <div
                            class="bg-red-50 text-red-600 px-3 py-1.5 rounded-full flex items-center gap-1.5 text-sm font-bold border border-red-100">
                            <i class="fa-solid fa-arrow-up text-xs"></i> 2.5%
                        </div>
                    </div>
                </div>

                <!-- Padi -->
                <div
                    class="bg-white p-7 rounded-3xl shadow-sm border border-gray-100 flex flex-col justify-between hover:border-tanigreen-200 hover:shadow-lg transition-all group border-b-4 border-b-tanigreen-500">
                    <div class="flex items-center gap-4 mb-5">
                        <div
                            class="w-14 h-14 bg-yellow-50 rounded-2xl flex items-center justify-center text-taniaccent-500 text-2xl shadow-inner group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-wheat-awn"></i>
                        </div>
                        <div>
                            <h4 class="text-gray-400 font-bold uppercase tracking-wider text-[11px] mb-1">Pangan Utama
                            </h4>
                            <p class="text-lg font-bold text-gray-900">Padi</p>
                        </div>
                    </div>
                    <div class="flex items-end justify-between mt-2 pt-5 border-t border-gray-50">
                        <div>
                            <p class="text-2xl font-extrabold text-gray-900">Rp7.500<span
                                    class="text-sm font-semibold text-gray-400"> /kg</span></p>
                        </div>
                        <div
                            class="bg-green-50 text-green-600 px-3 py-1.5 rounded-full flex items-center gap-1.5 text-sm font-bold border border-green-100">
                            <i class="fa-solid fa-arrow-up text-xs"></i> 0.8%
                        </div>
                    </div>
                </div>

                <!-- Jagung -->
                <div
                    class="bg-white p-7 rounded-3xl shadow-sm border border-gray-100 flex flex-col justify-between hover:border-gray-200 hover:shadow-lg transition-all group">
                    <div class="flex items-center gap-4 mb-5">
                        <div
                            class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-400 text-2xl shadow-inner group-hover:scale-110 transition-transform">
                            <i class="fa-brands fa-pagelines text-orange-400"></i>
                        </div>
                        <div>
                            <h4 class="text-gray-400 font-bold uppercase tracking-wider text-[11px] mb-1">Palawija</h4>
                            <p class="text-lg font-bold text-gray-900">Jagung</p>
                        </div>
                    </div>
                    <div class="flex items-end justify-between mt-2 pt-5 border-t border-gray-50">
                        <div>
                            <p class="text-2xl font-extrabold text-gray-900">Rp5.000<span
                                    class="text-sm font-semibold text-gray-400"> /kg</span></p>
                        </div>
                        <div
                            class="bg-orange-50 text-orange-600 px-3 py-1.5 rounded-full flex items-center gap-1.5 text-sm font-bold border border-orange-100 text-red-500 bg-red-50 border-red-50">
                            <!-- Update color logic to match prompt: panah merah ke bawah = harga turun/trend down -->
                            <i class="fa-solid fa-arrow-down text-xs"></i> 1.2%
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 5. FOOTER -->
    <footer class="bg-green-900 text-white border-t border-green-800">
        <div class="container mx-auto px-4 py-16 max-w-7xl">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

                <!-- Kolom 1: Branding & Deskripsi -->
                <div class="space-y-6">
                    <a href="{{ url('/') }}" class="flex items-center gap-2 text-white hover:text-green-200 transition duration-300">
                        <i class="fa-solid fa-leaf text-3xl"></i>
                        <span class="text-3xl font-extrabold tracking-tight">TaniBantu</span>
                    </a>
                    <p class="text-green-100/80 leading-relaxed text-lg max-w-sm">
                        Solusi cerdas bagi petani lokal untuk memantau harga pasar, merencanakan jadwal tanam, dan
                        berkonsultasi dengan ahli secara praktis dalam satu genggaman.
                    </p>
                </div>

                <!-- Kolom 2: Navigasi Cepat -->
                <div>
                    <h3 class="text-xl font-bold mb-6 text-green-300 uppercase tracking-wider">Akses Cepat</h3>
                    <ul class="space-y-4 font-medium text-green-50/80">
                        <li><a href="{{ url('/') }}"
                                class="hover:text-white hover:underline transition-colors flex items-center gap-2"><i
                                    class="fa-solid fa-angle-right text-xs"></i> Beranda</a></li>
                        <li><a href="{{ url('/jadwal') }}"
                                class="hover:text-white hover:underline transition-colors flex items-center gap-2"><i
                                    class="fa-solid fa-angle-right text-xs"></i> Jadwal Tanam</a></li>
                        <li><a href="{{ url('/harga') }}"
                                class="hover:text-white hover:underline transition-colors flex items-center gap-2"><i
                                    class="fa-solid fa-angle-right text-xs"></i> Harga Pasar</a></li>
                        <li><a href="{{ url('/forum') }}"
                                class="hover:text-white hover:underline transition-colors flex items-center gap-2"><i
                                    class="fa-solid fa-angle-right text-xs"></i> Bantuan & Forum</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Sosial Media & Lokasi -->
                <div>
                    <h3 class="text-xl font-bold mb-6 text-green-300 uppercase tracking-wider">Hubungi Kami</h3>
                    <div class="space-y-4 font-medium text-green-50/80">
                        <div class="flex items-start gap-4 mb-6">
                            <i class="fa-solid fa-location-dot mt-1.5 text-green-400"></i>
                            <p class="leading-relaxed">Ajibarang<br />Jawa Tengah, Indonesia</p>
                        </div>

                        <!-- Ikon Sosmed -->
                        <div class="flex items-center gap-4 mt-8">
                            <a href="#"
                                class="w-12 h-12 rounded-full bg-green-800 flex items-center justify-center text-white hover:bg-green-700 hover:-translate-y-1 transition-all duration-300 shadow-lg">
                                <i class="fa-brands fa-facebook-f text-xl"></i>
                            </a>
                            <a href="#"
                                class="w-12 h-12 rounded-full bg-green-800 flex items-center justify-center text-white hover:bg-green-700 hover:-translate-y-1 transition-all duration-300 shadow-lg">
                                <i class="fa-brands fa-instagram text-xl"></i>
                            </a>
                            <a href="#"
                                class="w-12 h-12 rounded-full bg-green-800 flex items-center justify-center text-white hover:bg-green-700 hover:-translate-y-1 transition-all duration-300 shadow-lg">
                                <i class="fa-brands fa-whatsapp text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Copyright (Bottom Bar) -->
        <div class="border-t border-green-800/50 bg-green-950/20">
            <div class="container mx-auto px-4 py-6 text-center text-green-200/60 text-sm font-medium">
                <p>&copy; 2026 TaniBantu. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>

</html>
