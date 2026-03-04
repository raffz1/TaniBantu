@extends('layouts.app')

@section('title', 'Profil Pengguna - TaniBantu')

@section('content')

@guest
    <div class="flex flex-col items-center justify-center h-full text-center mt-20">
        <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100 max-w-lg w-full">
            <div class="w-20 h-20 bg-tanigreen-50 text-tanigreen-500 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl">
                <i class="fa-solid fa-lock"></i>
            </div>
            <h2 class="text-2xl font-extrabold text-gray-900 mb-4">Akses Terbatas</h2>
            <p class="text-gray-500 font-medium mb-8">Silakan masuk atau daftar terlebih dahulu untuk mengakses fitur profil, mengelola aktivitas, dan melihat status Anda.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('login') }}" class="bg-tanigreen-600 text-white font-bold py-3 px-8 rounded-xl hover:bg-tanigreen-700 transition shadow-sm">
                    Masuk Sekarang
                </a>
                <a href="{{ route('register') }}" class="bg-white text-tanigreen-600 border-2 border-tanigreen-600 font-bold py-3 px-8 rounded-xl hover:bg-tanigreen-50 transition shadow-sm">
                    Daftar Akun Baru
                </a>
            </div>
        </div>
    </div>
@endguest

@auth
    @php
        $user = auth()->user();
        $isSeller = $user->role === 'seller';
    @endphp

    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-2 tracking-tight">Profil Pengguna</h1>
        <p class="text-gray-500 font-medium w-full md:w-2/3">Atur informasi pribadi, amati ringkasan pertanian,
            dan pantau status transaksi Anda.</p>
    </div>

    <div class="flex flex-col xl:flex-row gap-8">

        <!-- Kolom Kiri: Kartu Identitas & Statistik Ringkas -->
        <div class="w-full xl:w-1/3 space-y-6">

            <!-- Kartu Identitas -->
            <div
                class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 flex flex-col items-center text-center relative overflow-hidden">
                <!-- Latar Atas Dekoratif -->
                <div class="absolute top-0 left-0 w-full h-24 bg-tanigreen-500"></div>

                <!-- Foto Profil -->
                <div
                    class="relative w-28 h-28 rounded-full border-4 border-white shadow-md overflow-hidden bg-white mb-4 mt-8 z-10 mx-auto">
                    <!-- Preview Image Area -->
                    <img id="user-avatar" src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=E5E7EB&color=374151" alt="Foto Profil"
                        class="w-full h-full object-cover">
                </div>

                <!-- Data Diri -->
                <div class="z-10 w-full">
                    <h2 class="text-2xl font-extrabold text-gray-900 mb-1" id="display-name">{{ $user->name }}</h2>
                    <div class="flex items-center justify-center gap-1.5 mb-4">
                        @if ($isSeller)
                        <span class="bg-purple-50 text-purple-600 px-3 py-1 rounded-full text-xs font-bold border border-purple-100 flex items-center gap-1">
                            <i class="fa-solid fa-shop"></i> Penjual Terverifikasi
                        </span>
                        @else
                        <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-bold border border-blue-100 flex items-center gap-1">
                            <i class="fa-solid fa-circle-check"></i> Petani Terverifikasi
                        </span>
                        @endif
                    </div>
                    <p class="text-gray-500 text-sm font-medium mb-6"><i
                            class="fa-regular fa-envelope mr-1"></i> {{ $user->email }}</p>

                    <!-- Tombol Edit Profil -->
                    <a href="{{ route('profile.edit') }}"
                        class="w-full bg-white border-2 border-tanigreen-600 text-tanigreen-600 font-bold py-2.5 rounded-xl hover:bg-tanigreen-50 transition-colors flex justify-center items-center gap-2 text-sm shadow-sm group">
                        <i class="fa-solid fa-user-pen group-hover:scale-110 transition-transform"></i> Edit Profil
                    </a>
                </div>
            </div>

            <!-- Statistik Ringkas (Grid) -->
            <div class="grid grid-cols-1 sm:grid-cols-3 xl:grid-cols-1 gap-4">

                @if ($isSeller)
                <!-- Stat 1: Total Produk -->
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-500 text-xl shrink-0">
                        <i class="fa-solid fa-box-open"></i></div>
                    <div>
                        <h4 class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-0.5">Total Produk
                        </h4>
                        <p class="text-lg font-extrabold text-gray-900 leading-none">15 <span
                                class="text-sm font-medium text-gray-500">Item Tersedia</span></p>
                    </div>
                </div>

                <!-- Stat 2: Pesanan Selesai -->
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-500 text-xl shrink-0">
                        <i class="fa-solid fa-cart-shopping"></i></div>
                    <div>
                        <h4 class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-0.5">Pesanan Selesai
                            </h4>
                        <p class="text-lg font-extrabold text-gray-900 leading-none">42 <span
                                class="text-sm font-medium text-gray-500">Transaksi</span></p>
                    </div>
                </div>

                <!-- Stat 3: Rating Toko -->
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-yellow-50 rounded-xl flex items-center justify-center text-yellow-500 text-xl shrink-0">
                        <i class="fa-solid fa-star"></i></div>
                    <div>
                        <h4 class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-0.5">Rating Toko
                            </h4>
                        <p class="text-lg font-extrabold text-yellow-500 leading-none">4.8 <span
                                class="text-xs font-bold bg-yellow-100 text-yellow-700 px-1.5 py-0.5 rounded ml-1">/ 5</span>
                        </p>
                    </div>
                </div>
                @else
                <!-- Stat 1: Lahan -->
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-tanigreen-500 text-xl shrink-0">
                        <i class="fa-solid fa-layer-group"></i></div>
                    <div>
                        <h4 class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-0.5">Total Lahan
                        </h4>
                        <p class="text-lg font-extrabold text-gray-900 leading-none">2 <span
                                class="text-sm font-medium text-gray-500">Hektar</span></p>
                    </div>
                </div>

                <!-- Stat 2: Tanam Berjalan -->
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-yellow-50 rounded-xl flex items-center justify-center text-taniaccent-500 text-xl shrink-0">
                        <i class="fa-solid fa-seedling"></i></div>
                    <div>
                        <h4 class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-0.5">Tanam
                            Berjalan</h4>
                        <p class="text-lg font-extrabold text-gray-900 leading-none">3 <span
                                class="text-sm font-medium text-gray-500">Komoditas</span></p>
                    </div>
                </div>

                <!-- Stat 3: Poin Loyalitas -->
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center text-orange-500 text-xl shrink-0">
                        <i class="fa-solid fa-award"></i></div>
                    <div>
                        <h4 class="text-xs text-gray-400 font-bold uppercase tracking-wider mb-0.5">Poin
                            Loyalitas</h4>
                        <p class="text-lg font-extrabold text-orange-500 leading-none">1.250 <span
                                class="text-xs font-bold bg-orange-100 text-orange-700 px-1.5 py-0.5 rounded ml-1">Pts</span>
                        </p>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Kolom Kanan: Tabs Aktivitas -->
        <div class="w-full xl:w-2/3">
            <div
                class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden min-h-full flex flex-col">

                <!-- Tab Header Navigation -->
                <div class="flex border-b border-gray-100 overflow-x-auto hide-scrollbar bg-gray-50/50">
                    <button onclick="switchTab('riwayat')" id="tab-btn-riwayat"
                        class="tab-btn active px-6 py-4 text-sm font-bold text-tanigreen-600 border-b-2 border-tanigreen-600 bg-white hover:bg-gray-50 transition-colors whitespace-nowrap outline-none flex items-center gap-2">
                        @if($isSeller) <i class="fa-solid fa-boxes-stacked"></i> Produk Saya @else <i class="fa-solid fa-clock-rotate-left"></i> Riwayat Tanam @endif
                    </button>
                    <button onclick="switchTab('tawaran')" id="tab-btn-tawaran"
                        class="tab-btn px-6 py-4 text-sm font-bold text-gray-500 border-b-2 border-transparent hover:text-tanigreen-600 hover:bg-gray-50 transition-colors whitespace-nowrap outline-none flex items-center gap-2">
                        @if($isSeller) <i class="fa-solid fa-clipboard-list"></i> Pesanan Masuk @else <i class="fa-solid fa-handshake-angle"></i> Status Tawaran @endif
                    </button>
                    <button onclick="switchTab('pengaturan')" id="tab-btn-pengaturan"
                        class="tab-btn px-6 py-4 text-sm font-bold text-gray-500 border-b-2 border-transparent hover:text-tanigreen-600 hover:bg-gray-50 transition-colors whitespace-nowrap outline-none flex items-center gap-2">
                        <i class="fa-solid fa-gear"></i> Pengaturan
                    </button>
                </div>

                <!-- Tab Content Container -->
                <div class="p-6 md:p-8 flex-1">

                    <!-- 1. Tab Riwayat Tanam / Produk Saya -->
                    <div id="tab-content-riwayat" class="tab-content block animate-[fadeIn_0.3s_ease-in-out]">
                        
                        @if ($isSeller)
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-bold text-gray-900 text-xl">Daftar Produk Aktif</h3>
                            <button class="bg-tanigreen-600 text-white text-xs font-bold px-4 py-2 rounded-lg shadow-sm hover:bg-tanigreen-700 transition flex items-center gap-2"><i class="fa-solid fa-plus"></i> Tambah</button>
                        </div>
                        <div class="space-y-4">
                            <!-- Produk 1 -->
                            <div class="p-5 border border-gray-100 rounded-2xl hover:bg-gray-50 transition-colors flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400 text-xl"><i class="fa-solid fa-box"></i></div>
                                    <div>
                                        <h4 class="font-bold text-gray-900">Pupuk Urea Subsidi (Sak 50kg)</h4>
                                        <p class="text-xs text-gray-500 font-medium">Stok: <span class="text-tanigreen-600 font-bold">45 Sak</span></p>
                                    </div>
                                </div>
                                <div class="text-right sm:text-center shrink-0">
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-[10px] font-bold border border-green-200 uppercase tracking-wider"><i class="fa-solid fa-check mr-1"></i> Tersedia</span>
                                    <p class="text-sm font-extrabold text-gray-900 mt-2">Rp112.500</p>
                                </div>
                            </div>
                            
                            <!-- Produk 2 -->
                            <div class="p-5 border border-gray-100 rounded-2xl hover:bg-gray-50 transition-colors flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400 text-xl"><i class="fa-solid fa-box"></i></div>
                                    <div>
                                        <h4 class="font-bold text-gray-900">Benih Padi Inpari 32 (5kg)</h4>
                                        <p class="text-xs text-gray-500 font-medium">Stok: <span class="text-red-500 font-bold">Habis</span></p>
                                    </div>
                                </div>
                                <div class="text-right sm:text-center shrink-0">
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-[10px] font-bold border border-red-200 uppercase tracking-wider"><i class="fa-solid fa-xmark mr-1"></i> Kosong</span>
                                    <p class="text-sm font-extrabold text-gray-900 mt-2">Rp65.000</p>
                                </div>
                            </div>
                        </div>
                        @else
                        <h3 class="font-bold text-gray-900 mb-6 text-xl">Siklus Tanam Selesai</h3>
                        <div class="space-y-4">
                            <!-- Riwayat 1 -->
                            <div
                                class="p-5 border border-gray-100 rounded-2xl hover:bg-gray-50 transition-colors flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400 text-xl">
                                        <i class="fa-solid fa-wheat-awn"></i></div>
                                    <div>
                                        <h4 class="font-bold text-gray-900">Padi Inpari 32</h4>
                                        <p class="text-xs text-gray-500 font-medium">Panen: <span
                                                class="text-gray-700">12 Oktober 2025</span></p>
                                    </div>
                                </div>
                                <div class="text-right sm:text-center shrink-0">
                                    <span
                                        class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-bold border border-gray-200"><i
                                            class="fa-solid fa-check mr-1"></i> Selesai (110 Hari)</span>
                                    <p class="text-xs font-bold text-tanigreen-600 mt-2">Hasil: 3.5 Ton</p>
                                </div>
                            </div>

                            <!-- Riwayat 2 -->
                            <div
                                class="p-5 border border-gray-100 rounded-2xl hover:bg-gray-50 transition-colors flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400 text-xl">
                                        <i class="fa-solid fa-pepper-hot"></i></div>
                                    <div>
                                        <h4 class="font-bold text-gray-900">Cabai Rawit Merah</h4>
                                        <p class="text-xs text-gray-500 font-medium">Panen: <span
                                                class="text-gray-700">05 Agustus 2025</span></p>
                                    </div>
                                </div>
                                <div class="text-right sm:text-center shrink-0">
                                    <span
                                        class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-bold border border-gray-200"><i
                                            class="fa-solid fa-check mr-1"></i> Selesai (90 Hari)</span>
                                    <p class="text-xs font-bold text-tanigreen-600 mt-2">Hasil: 800 Kg</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- 2. Tab Status Tawaran / Pesanan Masuk -->
                    <div id="tab-content-tawaran" class="tab-content hidden animate-[fadeIn_0.3s_ease-in-out]">
                        
                        @if ($isSeller)
                        <h3 class="font-bold text-gray-900 mb-6 text-xl">Daftar Pesanan Masuk</h3>
                        <div class="space-y-4">
                            <div class="p-5 border border-gray-100 rounded-2xl flex flex-col sm:flex-row gap-4 relative overflow-hidden group">
                                <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-500"></div>
                                <div class="w-16 h-16 bg-blue-50 rounded-xl flex items-center justify-center text-blue-500 text-2xl shrink-0 border border-blue-100"><i class="fa-solid fa-box-open"></i></div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start mb-1">
                                        <h4 class="font-bold text-gray-900 leading-tight">Pupuk Urea Subsidi (2 Sak)</h4>
                                        <span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider whitespace-nowrap flex items-center gap-1"><i class="fa-solid fa-truck-fast"></i> Perlu Dikirim</span>
                                    </div>
                                    <p class="text-xs text-gray-500 mb-2 font-medium"><i class="fa-solid fa-user text-gray-400"></i> Pembeli: Budi Santoso (Desa Karangtengah)</p>
                                    <div class="flex gap-4 text-sm bg-gray-50 p-2 rounded-lg border border-gray-100 inline-block">
                                        <span class="font-bold text-gray-900">Total Belanja: <span class="text-blue-600">Rp225.000</span></span>
                                    </div>
                                    <div class="mt-3 flex gap-2">
                                        <button class="bg-blue-600 text-white text-xs font-bold px-4 py-2 rounded-lg shadow-sm hover:bg-blue-700 transition-colors">Kirim Pesanan</button>
                                        <button class="bg-red-50 text-red-600 text-xs font-bold px-4 py-2 rounded-lg hover:bg-red-100 transition-colors">Tolak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <h3 class="font-bold text-gray-900 mb-6 text-xl">Daftar Negosiasi Marketplace</h3>
                        <div class="space-y-4">
                            <!-- Tawaran 1 (Menunggu) -->
                            <div
                                class="p-5 border border-gray-100 rounded-2xl flex flex-col sm:flex-row gap-4 relative overflow-hidden group">
                                <div class="absolute left-0 top-0 bottom-0 w-1 bg-yellow-400"></div>
                                <div
                                    class="w-16 h-16 bg-tanigreen-50 rounded-xl flex items-center justify-center text-tanigreen-500 text-2xl shrink-0 border border-tanigreen-100">
                                    <i class="fa-solid fa-flask"></i></div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start mb-1">
                                        <h4 class="font-bold text-gray-900 leading-tight">Pupuk Organik Cair
                                            Ajibarang (POMA) 1 Liter</h4>
                                        <span
                                            class="bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider whitespace-nowrap flex items-center gap-1"><i
                                                class="fa-regular fa-clock"></i> Menunggu Respon</span>
                                    </div>
                                    <p class="text-xs text-gray-500 mb-2 font-medium"><i
                                            class="fa-solid fa-location-dot text-gray-400"></i> Kios Tani
                                        Terminal Ajibarang</p>
                                    <div
                                        class="flex gap-4 text-sm bg-gray-50 p-2 rounded-lg border border-gray-100 inline-block">
                                        <span class="text-gray-500">Harga Awal: <strike>Rp75.000</strike></span>
                                        <span class="font-bold text-gray-900">Tawaran Anda: <span
                                                class="text-taniaccent-500">Rp70.000</span></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Tawaran 2 (Diterima) -->
                            <div
                                class="p-5 border border-gray-100 rounded-2xl flex flex-col sm:flex-row gap-4 relative overflow-hidden">
                                <div class="absolute left-0 top-0 bottom-0 w-1 bg-tanigreen-500"></div>
                                <div
                                    class="w-16 h-16 bg-red-50 rounded-xl flex items-center justify-center text-red-500 text-2xl shrink-0 border border-red-100">
                                    <i class="fa-solid fa-spray-can-sparkles"></i></div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start mb-1">
                                        <h4 class="font-bold text-gray-900 leading-tight">Pestisida Nabati
                                            Ekstrak Mimba 500ml</h4>
                                        <span
                                            class="bg-tanigreen-100 text-tanigreen-700 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider whitespace-nowrap flex items-center gap-1"><i
                                                class="fa-solid fa-check-double"></i> Tawaran Diterima</span>
                                    </div>
                                    <p class="text-xs text-gray-500 mb-2 font-medium"><i
                                            class="fa-solid fa-location-dot text-gray-400"></i> Distribusi area
                                        Banyumas Barat</p>
                                    <div
                                        class="flex gap-4 text-sm bg-tanigreen-50 p-2 rounded-lg border border-tanigreen-100 inline-block">
                                        <span class="font-bold text-gray-900">Harga Deal: <span
                                                class="text-tanigreen-600">Rp40.000</span></span>
                                    </div>
                                    <div class="mt-3">
                                        <button
                                            class="bg-tanigreen-600 text-white text-xs font-bold px-4 py-2 rounded-lg shadow-sm hover:bg-tanigreen-700 transition-colors">Lanjutkan
                                            Pembayaran</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- 3. Tab Pengaturan (Keamanan & Keluar) -->
                    <div id="tab-content-pengaturan"
                        class="tab-content hidden animate-[fadeIn_0.3s_ease-in-out]">
                        <h3 class="font-bold text-gray-900 mb-6 text-xl">Keamanan Akun</h3>

                        <form class="max-w-md space-y-5 mb-10">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Kata Sandi Saat
                                    Ini</label>
                                <input type="password" placeholder="Masukkan sandi saat ini"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tanigreen-500 font-medium text-gray-800 transition-colors">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Kata Sandi
                                    Baru</label>
                                <input type="password" placeholder="Minimal 8 karakter"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tanigreen-500 font-medium text-gray-800 transition-colors">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Konfirmasi Kata Sandi
                                    Baru</label>
                                <input type="password" placeholder="Ulangi sandi baru"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tanigreen-500 font-medium text-gray-800 transition-colors">
                            </div>
                            <button type="button"
                                onclick="alert('Ini hanya simulasi UI. Gunakan form Edit Profil untuk fungsi keamanan sungguhan dari Laravel.')"
                                class="bg-gray-800 text-white font-bold py-3 px-6 rounded-xl hover:bg-gray-900 transition-colors">Perbarui
                                Kata Sandi</button>
                        </form>

                        <div class="border-t border-gray-100 pt-8 mt-4">
                            <h3 class="font-bold text-red-600 mb-2 text-lg"><i
                                    class="fa-solid fa-triangle-exclamation mr-2"></i> Zona Bahaya</h3>
                            <p class="text-sm text-gray-500 font-medium mb-4">Jika Anda keluar, Anda perlu
                                memasukkan kredensial login Anda kembali.</p>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="bg-red-50 w-full md:w-auto text-red-600 border border-red-200 font-bold py-3 px-6 rounded-xl hover:bg-red-600 hover:text-white transition-colors flex items-center justify-center gap-2 group">
                                    <i class="fa-solid fa-power-off group-hover:scale-110 transition-transform"></i> Keluar dari Akun Saya
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Keyframes Animation Helper -->
                    <style>
                        @keyframes fadeIn {
                            from {
                                opacity: 0;
                                transform: translateY(5px);
                            }

                            to {
                                opacity: 1;
                                transform: translateY(0);
                            }
                        }
                    </style>

                </div>
            </div>
        </div>

    </div>
@endauth
@endsection

@push('scripts')
@auth
    <script>
        // Script Sistem Tab Interaktif
        function switchTab(tabId) {
            // Sembunyikan semua tab content
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('block');
                content.classList.add('hidden');
            });

            // Reset semua style tab header button
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('text-tanigreen-600', 'border-tanigreen-600', 'bg-white', 'active');
                btn.classList.add('text-gray-500', 'border-transparent');
            });

            // Tampilkan tab yang dipilih
            document.getElementById(`tab-content-${tabId}`).classList.remove('hidden');
            document.getElementById(`tab-content-${tabId}`).classList.add('block');

            // Aktifkan style tombol tab yang dipilih
            const activeBtn = document.getElementById(`tab-btn-${tabId}`);
            if(activeBtn){
                activeBtn.classList.remove('text-gray-500', 'border-transparent');
                activeBtn.classList.add('text-tanigreen-600', 'border-tanigreen-600', 'bg-white', 'active');
            }
        }
    </script>
@endauth
@endpush
