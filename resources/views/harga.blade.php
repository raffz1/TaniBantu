@extends('layouts.app')

@section('title', 'Harga Komoditas Hari Ini - TaniBantu')

@section('content')
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-2 tracking-tight">Harga Komoditas Hari Ini</h1>
        <p class="text-gray-500 font-medium w-full md:w-2/3">Pantau harga komoditas terkini di wilayah Ajibarang
            dan sekitarnya (Bumiayu/Cilongok).</p>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 mb-8 flex flex-col md:flex-row gap-4">

        <!-- Search Input -->
        <div class="relative flex-1">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                <i class="fa-solid fa-search"></i>
            </div>
            <input type="text" placeholder="Cari nama komoditas..."
                class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tanigreen-500 transition hover:bg-white text-sm font-medium">
        </div>

        <!-- Kategori Dropdown -->
        <div class="relative w-full md:w-64">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                <i class="fa-solid fa-filter"></i>
            </div>
            <select
                class="w-full pl-11 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tanigreen-500 appearance-none font-bold text-gray-700 transition hover:bg-white text-sm cursor-pointer">
                <option value="semua">Semua Kategori</option>
                <option value="sayuran">Sayuran</option>
                <option value="pangan">Pangan Utama</option>
                <option value="palawija">Palawija</option>
                <option value="buah">Buah-buahan</option>
            </select>
            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-400">
                <i class="fa-solid fa-chevron-down text-sm"></i>
            </div>
        </div>
    </div>

    <!-- Price Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

        <!-- Cabai Merah -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow group border-t-4 border-t-red-500">
            <div class="flex items-start gap-4 mb-4">
                <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center text-red-500 text-xl shadow-inner shrink-0 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-pepper-hot"></i>
                </div>
                <div>
                    <h4 class="text-gray-400 font-bold uppercase tracking-wider text-[10px] mb-1">Sayuran</h4>
                    <p class="text-lg font-bold text-gray-900 leading-tight">Cabai Merah Besar</p>
                </div>
            </div>
            <div class="mt-4 pt-5 border-t border-gray-50 flex items-end justify-between">
                <div>
                    <p class="text-2xl font-extrabold text-gray-900 leading-none">Rp40.000<span
                            class="text-xs font-semibold text-gray-400"> /kg</span></p>
                    <p class="text-xs text-gray-500 mt-2 font-medium flex items-center gap-1.5"><i
                            class="fa-solid fa-location-dot text-gray-400"></i> Pasar Ajibarang</p>
                </div>
                <div class="bg-red-50 text-red-600 px-2.5 py-1 rounded-full flex items-center gap-1 text-[11px] font-bold border border-red-100">
                    <i class="fa-solid fa-arrow-up text-[10px]"></i> 2.5%
                </div>
            </div>
        </div>

        <!-- Padi -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow group border-t-4 border-t-tanigreen-500">
            <div class="flex items-start gap-4 mb-4">
                <div class="w-12 h-12 bg-yellow-50 rounded-xl flex items-center justify-center text-taniaccent-500 text-xl shadow-inner shrink-0 group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-wheat-awn"></i>
                </div>
                <div>
                    <h4 class="text-gray-400 font-bold uppercase tracking-wider text-[10px] mb-1">Pangan Utama
                    </h4>
                    <p class="text-lg font-bold text-gray-900 leading-tight">Padi (Gabah Kering)</p>
                </div>
            </div>
            <div class="mt-4 pt-5 border-t border-gray-50 flex items-end justify-between">
                <div>
                    <p class="text-2xl font-extrabold text-gray-900 leading-none">Rp7.500<span
                            class="text-xs font-semibold text-gray-400"> /kg</span></p>
                    <p class="text-xs text-gray-500 mt-2 font-medium flex items-center gap-1.5"><i
                            class="fa-solid fa-location-dot text-gray-400"></i> Pasar Induk Sayur Ajibarang</p>
                </div>
                <div class="bg-green-50 text-green-600 px-2.5 py-1 rounded-full flex items-center gap-1 text-[11px] font-bold border border-green-100">
                    <i class="fa-solid fa-arrow-up text-[10px]"></i> 0.8%
                </div>
            </div>
        </div>

        <!-- Jagung -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow group border-t-4 border-t-orange-400">
            <div class="flex items-start gap-4 mb-4">
                <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center text-orange-400 text-xl shadow-inner shrink-0 group-hover:scale-110 transition-transform">
                    <i class="fa-brands fa-pagelines text-orange-400"></i>
                </div>
                <div>
                    <h4 class="text-gray-400 font-bold uppercase tracking-wider text-[10px] mb-1">Palawija</h4>
                    <p class="text-lg font-bold text-gray-900 leading-tight">Jagung Pipilan</p>
                </div>
            </div>
            <div class="mt-4 pt-5 border-t border-gray-50 flex items-end justify-between">
                <div>
                    <p class="text-2xl font-extrabold text-gray-900 leading-none">Rp5.000<span
                            class="text-xs font-semibold text-gray-400"> /kg</span></p>
                    <p class="text-xs text-gray-500 mt-2 font-medium flex items-center gap-1.5"><i
                            class="fa-solid fa-location-dot text-gray-400"></i> Kios Tani Lingkar Ajibarang</p>
                </div>
                <!-- Warna merah ke bawah (Turun) -->
                <div class="bg-red-50 text-red-600 px-2.5 py-1 rounded-full flex items-center gap-1 text-[11px] font-bold border border-red-100">
                    <i class="fa-solid fa-arrow-down text-[10px]"></i> 1.2%
                </div>
            </div>
        </div>

    </div>

    <!-- Tabel Detail Harga Komoditas -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
            <h3 class="font-bold text-gray-800 flex items-center gap-2">
                <i class="fa-solid fa-table-list text-gray-400"></i> Rincian Komoditas Lain
            </h3>
            <a href="#" class="text-sm text-tanigreen-600 font-bold hover:underline">Lihat Semua</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider font-bold">
                        <th class="px-6 py-4">Komoditas</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Lokasi Pantau</th>
                        <th class="px-6 py-4">Harga Terakhir</th>
                        <th class="px-6 py-4 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm font-medium text-gray-700">

                    <!-- Row 1: Bawang Merah -->
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-leaf text-xs"></i>
                            </div>
                            <span class="font-bold text-gray-900">Bawang Merah</span>
                        </td>
                        <td class="px-6 py-4 text-gray-500">Sayuran</td>
                        <td class="px-6 py-4 text-gray-500">Pasar Ajibarang</td>
                        <td class="px-6 py-4 font-bold text-gray-900">Rp25.000 <span
                                class="text-xs text-gray-400 font-normal">/kg</span></td>
                        <td class="px-6 py-4">
                            <div class="inline-flex items-center gap-1 justify-center bg-gray-100 text-gray-600 px-2.5 py-1 rounded-md text-[11px] font-bold w-full max-w-[80px]">
                                <i class="fa-solid fa-minus text-[10px]"></i> Stabil
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2: Tomat -->
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-red-50 text-red-500 flex items-center justify-center shrink-0">
                                <i class="fa-regular fa-lemon text-xs"></i>
                            </div>
                            <span class="font-bold text-gray-900">Tomat Sayur</span>
                        </td>
                        <td class="px-6 py-4 text-gray-500">Sayuran</td>
                        <td class="px-6 py-4 text-gray-500">Pasar Induk Sayur Ajibarang</td>
                        <td class="px-6 py-4 font-bold text-gray-900">Rp8.500 <span
                                class="text-xs text-gray-400 font-normal">/kg</span></td>
                        <td class="px-6 py-4">
                            <div class="inline-flex items-center gap-1 justify-center bg-red-50 text-red-600 border border-red-100 px-2.5 py-1 rounded-md text-[11px] font-bold w-full max-w-[80px]">
                                <i class="fa-solid fa-arrow-down text-[10px]"></i> Turun
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3: Kedelai -->
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-yellow-50 text-yellow-600 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-seedling text-xs"></i>
                            </div>
                            <span class="font-bold text-gray-900">Kedelai Lokal</span>
                        </td>
                        <td class="px-6 py-4 text-gray-500">Palawija</td>
                        <td class="px-6 py-4 text-gray-500">Kios Tani Lingkar Ajibarang</td>
                        <td class="px-6 py-4 font-bold text-gray-900">Rp11.000 <span
                                class="text-xs text-gray-400 font-normal">/kg</span></td>
                        <td class="px-6 py-4">
                            <div class="inline-flex items-center gap-1 justify-center bg-green-50 text-green-600 border border-green-100 px-2.5 py-1 rounded-md text-[11px] font-bold w-full max-w-[80px]">
                                <i class="fa-solid fa-arrow-up text-[10px]"></i> Naik
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
