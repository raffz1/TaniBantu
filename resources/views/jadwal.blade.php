@extends('layouts.app')

@section('title', 'Jadwal Tanam - TaniBantu')

@section('content')
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-2 tracking-tight">Jadwal Tanam Saya</h1>
        <p class="text-gray-500 font-medium">Pantau aktivitas perawatan tanaman Anda dengan mudah.</p>
    </div>

    @auth
    <!-- Upcoming Tasks Section -->
    <div class="mb-6 flex items-center justify-between">
        <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
            <i class="fa-regular fa-clock text-tanigreen-500"></i> Tugas Mendatang (Upcoming Tasks)
        </h2>
        <span class="bg-gray-200 text-gray-700 py-1 px-3 rounded-full text-xs font-bold">3 Tugas</span>
    </div>

    <!-- Task Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Card 1 (Hari ini) -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow flex flex-col justify-between border-t-4 border-t-tanigreen-500">
            <div>
                <div class="flex justify-between items-start mb-4">
                    <span class="bg-tanigreen-100 text-tanigreen-700 text-xs font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">
                        Hari Ini
                    </span>
                    <div class="w-10 h-10 bg-gray-50 rounded-full flex items-center justify-center text-gray-400">
                        <i class="fa-solid fa-wheat-awn"></i>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-1">Pupuk Padi Tahap 1</h3>
                <p class="text-gray-500 text-sm mb-4"><i class="fa-regular fa-calendar mr-1"></i> 3 Maret 2026</p>
                <p class="text-gray-600 font-medium text-sm mb-6 bg-gray-50 p-3 rounded-lg border border-gray-100">
                    Pemberian pupuk Urea 100kg/Ha dan NPK Mutiara 50kg/Ha. Pastikan air tergenang macak-macak.
                </p>
            </div>
            <button class="w-full flex items-center justify-center gap-2 bg-gray-50 hover:bg-tanigreen-50 text-gray-600 hover:text-tanigreen-600 border border-gray-200 hover:border-tanigreen-200 py-3 rounded-xl font-bold transition-colors group">
                <i class="fa-regular fa-circle-check text-xl group-hover:scale-110 transition-transform"></i>
                Selesai
            </button>
        </div>

        <!-- Card 2 (Mendatang) -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-start mb-4">
                    <span class="bg-blue-50 text-blue-600 text-xs font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">
                        Dalam 7 Hari
                    </span>
                    <div class="w-10 h-10 bg-gray-50 rounded-full flex items-center justify-center text-gray-400">
                        <i class="fa-solid fa-pepper-hot"></i>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-1">Penyemprotan Pestisida</h3>
                <p class="text-gray-500 text-sm mb-4"><i class="fa-regular fa-calendar mr-1"></i> 10 Maret 2026</p>
                <p class="text-gray-600 font-medium text-sm mb-6 bg-gray-50 p-3 rounded-lg border border-gray-100">
                    Penyemprotan pencegahan hama kutu daun pada tanaman Cabai Merah blok A.
                </p>
            </div>
            <button class="w-full flex items-center justify-center gap-2 bg-gray-50 hover:bg-tanigreen-50 text-gray-600 hover:text-tanigreen-600 border border-gray-200 hover:border-tanigreen-200 py-3 rounded-xl font-bold transition-colors group">
                <i class="fa-regular fa-circle-check text-xl group-hover:scale-110 transition-transform"></i>
                Selesai
            </button>
        </div>

        <!-- Card 3 (Mendatang) -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-start mb-4">
                    <span class="bg-orange-50 text-orange-600 text-xs font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">
                        Dalam 21 Hari
                    </span>
                    <div class="w-10 h-10 bg-gray-50 rounded-full flex items-center justify-center text-gray-400">
                        <i class="fa-solid fa-wheat-awn"></i>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-1">Pupuk Susulan Padi</h3>
                <p class="text-gray-500 text-sm mb-4"><i class="fa-regular fa-calendar mr-1"></i> 24 Maret 2026</p>
                <p class="text-gray-600 font-medium text-sm mb-6 bg-gray-50 p-3 rounded-lg border border-gray-100">
                    Pemberian pupuk Urea 50kg/Ha fase anakan aktif.
                </p>
            </div>
            <button class="w-full flex items-center justify-center gap-2 bg-gray-50 hover:bg-tanigreen-50 text-gray-600 hover:text-tanigreen-600 border border-gray-200 hover:border-tanigreen-200 py-3 rounded-xl font-bold transition-colors group">
                <i class="fa-regular fa-circle-check text-xl group-hover:scale-110 transition-transform"></i>
                Selesai
            </button>
        </div>

    </div>

    <!-- 3. Floating Action Button (FAB) -->
    <div class="fixed bottom-8 right-8 z-50">
        <button id="fab-tambah"
            class="bg-tanigreen-600 text-white px-6 py-4 rounded-full font-bold shadow-xl hover:shadow-2xl hover:bg-tanigreen-700 hover:-translate-y-1 transition-all duration-300 flex items-center gap-3 active:scale-95 focus:outline-none focus:ring-4 focus:ring-tanigreen-200">
            <i class="fa-solid fa-plus text-xl"></i>
            <span class="text-lg">Tambah Tanam Baru</span>
        </button>
    </div>

    <!-- 4. Modal Overlay & Form -->
    <div id="modal-tambah"
        class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4 z-[60] opacity-0 pointer-events-none transition-opacity duration-300 backdrop-blur-sm">
        <!-- Modal Content Box -->
        <div class="bg-white rounded-[2rem] shadow-2xl w-full max-w-md p-8 transform scale-95 transition-transform duration-300"
            id="modal-box">

            <!-- Header Modal -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-extrabold text-gray-900 tracking-tight">Tambah Jadwal</h2>
                    <p class="text-gray-500 text-sm font-medium mt-1">Mulai fase tanam baru Anda</p>
                </div>
                <!-- Tombol Tutup (X) -->
                <button id="btn-tutup-modal"
                    class="text-gray-400 hover:text-red-500 transition-colors bg-gray-50 hover:bg-red-50 p-3 rounded-full flex items-center justify-center focus:outline-none">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <!-- Form -->
            <form action="#" method="POST">

                <!-- Input: Pilih Komoditas (Dropdown) -->
                <div class="mb-6">
                    <label for="komoditas" class="block text-sm font-bold text-gray-700 mb-2">Pilih Komoditas
                        Tanaman</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                            <i class="fa-solid fa-leaf"></i>
                        </div>
                        <select id="komoditas" name="komoditas"
                            class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-700 focus:outline-none focus:ring-2 focus:ring-tanigreen-500 focus:border-transparent font-medium appearance-none transition-colors hover:bg-gray-100 cursor-pointer">
                            <option value="" disabled selected>-- Pilih Jenis Tanaman --</option>
                            <option value="padi">Padi</option>
                            <option value="jagung">Jagung</option>
                            <option value="cabai">Cabai Merah</option>
                            <option value="bawang">Bawang Merah</option>
                            <option value="tomat">Tomat</option>
                        </select>
                        <div
                            class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-400">
                            <i class="fa-solid fa-chevron-down text-sm"></i>
                        </div>
                    </div>
                </div>

                <!-- Input: Tanggal Tanam (Datepicker) -->
                <div class="mb-8">
                    <label for="tanggal_tanam" class="block text-sm font-bold text-gray-700 mb-2">Tanggal Mulai
                        Tanam</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                            <i class="fa-regular fa-calendar"></i>
                        </div>
                        <input type="date" id="tanggal_tanam" name="tanggal_tanam"
                            class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-700 focus:outline-none focus:ring-2 focus:ring-tanigreen-500 focus:border-transparent font-medium transition-colors hover:bg-gray-100 cursor-pointer">
                    </div>
                </div>

                <!-- Tombol Submit -->
                <button type="submit"
                    class="w-full bg-tanigreen-600 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-xl hover:bg-tanigreen-700 hover:-translate-y-0.5 transition-all duration-300 flex justify-center items-center gap-2 text-lg active:scale-[0.98]">
                    <i class="fa-solid fa-seedling"></i> Buat Jadwal Otomatis
                </button>

            </form>
        </div>
    </div>
    @else
    <!-- State Kosong / Belum Login -->
    <div class="bg-white rounded-3xl p-10 shadow-sm border border-gray-100 text-center flex flex-col items-center justify-center mt-10">
        <div class="w-32 h-32 bg-gray-50 text-gray-300 rounded-full flex items-center justify-center text-6xl mb-6">
            <i class="fa-regular fa-calendar-xmark"></i>
        </div>
        <h2 class="text-2xl font-extrabold text-gray-900 mb-2">Anda Belum Masuk</h2>
        <p class="text-gray-500 mb-8 max-w-md">Silakan masuk atau daftar terlebih dahulu untuk melihat progres dan menambahkan jadwal tanam baru Anda.</p>
        <a href="{{ route('login') }}" class="bg-tanigreen-600 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:bg-tanigreen-700 hover:-translate-y-1 transition-all flex items-center gap-2">
            <i class="fa-solid fa-right-to-bracket"></i> Masuk Sekarang
        </a>
    </div>
    @endauth
@endsection

@push('scripts')
    <!-- Script Sederhana untuk Toggle Modal -->
    <script>
        const fab = document.getElementById('fab-tambah');
        const modal = document.getElementById('modal-tambah');
        const modalBox = document.getElementById('modal-box');
        const btnTutup = document.getElementById('btn-tutup-modal');

        // Buka Modal
        fab.addEventListener('click', () => {
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modalBox.classList.remove('scale-95');
            modalBox.classList.add('scale-100');
        });

        // Tutup Modal
        btnTutup.addEventListener('click', () => {
            modal.classList.add('opacity-0', 'pointer-events-none');
            modalBox.classList.remove('scale-100');
            modalBox.classList.add('scale-95');
        });

        // Klik di luar kotak modal untuk menutup
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                btnTutup.click();
            }
        });
    </script>
@endpush
