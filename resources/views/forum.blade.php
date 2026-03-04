@extends('layouts.app')

@section('title', 'Forum Diskusi Petani - TaniBantu')

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2 tracking-tight">Forum Diskusi Petani</h1>
            <p class="text-gray-500 font-medium">Tempat bertukar ilmu, tanya jawab, dan berbagi tips pertanian.
            </p>
        </div>
        @auth
        <button id="btn-buat-topik"
            class="bg-tanigreen-600 text-white px-6 py-3 rounded-full font-bold shadow-md hover:shadow-lg hover:bg-tanigreen-700 hover:-translate-y-0.5 transition-all duration-300 flex items-center gap-2 shrink-0">
            <i class="fa-solid fa-plus"></i> Buat Topik Baru
        </button>
        @else
        <a href="{{ route('login') }}"
            class="bg-tanigreen-600 text-white px-6 py-3 rounded-full font-bold shadow-md hover:shadow-lg hover:bg-tanigreen-700 hover:-translate-y-0.5 transition-all duration-300 flex items-center gap-2 shrink-0">
            <i class="fa-solid fa-right-to-bracket"></i> Login untuk Bertanya
        </a>
        @endauth
    </div>

    <!-- Main Layout: Sidebar Kategori & Daftar Topik -->
    <div class="flex flex-col lg:flex-row gap-8">

        <!-- Kiri: Pencarian & Kategori -->
        <div class="w-full lg:w-1/4 space-y-6">

            <!-- Search Bar -->
            <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100">
                <div class="relative">
                    <div
                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-search"></i>
                    </div>
                    <input type="text" placeholder="Cari topik diskusi..."
                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tanigreen-500 focus:bg-white transition-all text-sm font-medium">
                </div>
            </div>

            <!-- Kategori Populer -->
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
                <h3 class="font-bold text-gray-800 mb-4 border-b border-gray-100 pb-2">Kategori Populer</h3>
                <ul class="space-y-2 text-sm font-medium" id="category-list">
                    <!-- Kategori 1 (Active by default) -->
                    <li>
                        <a href="#"
                            class="category-link flex justify-between items-center bg-tanigreen-50 text-tanigreen-700 px-3 py-2.5 rounded-lg transition-colors group">
                            <span class="flex items-center gap-2">
                                <i class="fa-solid fa-fire text-orange-500 w-5 text-center"></i> Semua Topik
                            </span>
                            <span
                                class="cat-count bg-tanigreen-100 text-tanigreen-800 text-xs px-2 py-0.5 rounded-full font-bold">15</span>
                        </a>
                    </li>
                    <!-- Kategori 2 -->
                    <li>
                        <a href="#"
                            class="category-link flex justify-between items-center hover:bg-tanigreen-50 text-gray-600 hover:text-tanigreen-700 px-3 py-2.5 rounded-lg transition-colors group">
                            <span class="flex items-center gap-2">
                                <i
                                    class="fa-solid fa-bug text-gray-400 group-hover:text-tanigreen-500 w-5 text-center transition-colors"></i>
                                Hama & Penyakit
                            </span>
                            <span
                                class="cat-count bg-gray-100 text-gray-500 group-hover:bg-tanigreen-100 group-hover:text-tanigreen-800 text-xs px-2 py-0.5 rounded-full font-bold transition-colors">18</span>
                        </a>
                    </li>
                    <!-- Kategori 3 -->
                    <li>
                        <a href="#"
                            class="category-link flex justify-between items-center hover:bg-tanigreen-50 text-gray-600 hover:text-tanigreen-700 px-3 py-2.5 rounded-lg transition-colors group">
                            <span class="flex items-center gap-2">
                                <i
                                    class="fa-solid fa-seedling text-gray-400 group-hover:text-tanigreen-500 w-5 text-center transition-colors"></i>
                                Tips Bertanam
                            </span>
                            <span
                                class="cat-count bg-gray-100 text-gray-500 group-hover:bg-tanigreen-100 group-hover:text-tanigreen-800 text-xs px-2 py-0.5 rounded-full font-bold transition-colors">35</span>
                        </a>
                    </li>
                    <!-- Kategori 4 -->
                    <li>
                        <a href="#"
                            class="category-link flex justify-between items-center hover:bg-tanigreen-50 text-gray-600 hover:text-tanigreen-700 px-3 py-2.5 rounded-lg transition-colors group">
                            <span class="flex items-center gap-2">
                                <i
                                    class="fa-solid fa-droplet text-gray-400 group-hover:text-tanigreen-500 w-5 text-center transition-colors"></i>
                                Irigasi & Pupuk
                            </span>
                            <span
                                class="cat-count bg-gray-100 text-gray-500 group-hover:bg-tanigreen-100 group-hover:text-tanigreen-800 text-xs px-2 py-0.5 rounded-full font-bold transition-colors">9</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Kanan: Daftar Topik Diskusi -->
        <div class="w-full lg:w-3/4 space-y-5">

            <!-- Diskusi 1: Hama Wereng -->
            <div
                class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex items-start gap-4">
                    <!-- Avatar User -->
                    <div
                        class="w-12 h-12 bg-gray-200 rounded-full shrink-0 overflow-hidden border-2 border-white shadow-sm">
                        <img src="https://i.pravatar.cc/150?img=33" alt="Bapak Supardi"
                            class="w-full h-full object-cover">
                    </div>
                    <!-- Konten -->
                    <div class="flex-1">
                        <div class="flex flex-wrap items-center gap-2 mb-1">
                            <h4
                                class="font-bold text-gray-900 text-lg hover:text-tanigreen-600 transition-colors cursor-pointer">
                                Cara Mengatasi Hama Wereng Coklat pada Padi?</h4>
                            <span
                                class="bg-orange-100 text-orange-600 text-[10px] font-bold px-2 py-0.5 rounded uppercase flex items-center gap-1"><i
                                    class="fa-solid fa-fire text-[10px]"></i> Hot</span>
                        </div>
                        <p class="text-sm text-gray-500 font-medium mb-3">Oleh <span
                                class="text-gray-800 font-bold">Bapak Supardi</span> &bull; 2 jam yang lalu</p>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            Permisi sedulur tani, sawah saya di blok timur mulai terserang wereng coklat. Ada
                            yang punya pengalaman obat semprot apa yang paling efektif tapi tetap aman untuk
                            lingkungan?
                        </p>

                        <!-- Interaksi (Like, Komentar) -->
                        <div class="flex items-center gap-6 mt-4 pt-4 border-t border-gray-50">
                            <button
                                class="btn-like flex items-center gap-2 text-gray-400 font-bold text-sm hover:text-red-500 transition-colors group focus:outline-none"
                                onclick="toggleLike(this)">
                                <i
                                    class="fa-regular fa-heart text-lg group-active:scale-125 transition-transform"></i>
                                <span class="like-count">28</span> Suka
                            </button>
                            <button
                                class="flex items-center gap-2 text-gray-400 font-bold text-sm hover:text-blue-500 transition-colors focus:outline-none">
                                <i class="fa-regular fa-comment-dots text-lg"></i>
                                <span>14</span> Balasan
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Diskusi 2: Harga Pupuk Urea -->
            <div
                class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex items-start gap-4">
                    <!-- Avatar User -->
                    <div
                        class="w-12 h-12 bg-gray-200 rounded-full shrink-0 overflow-hidden border-2 border-white shadow-sm">
                        <img src="https://i.pravatar.cc/150?img=11" alt="Agus Petani Muda"
                            class="w-full h-full object-cover">
                    </div>
                    <!-- Konten -->
                    <div class="flex-1">
                        <div class="mb-1">
                            <h4
                                class="font-bold text-gray-900 text-lg hover:text-tanigreen-600 transition-colors cursor-pointer">
                                Harga Pupuk Urea Non-Subsidi di Pasaran Sekarang Berapa?</h4>
                        </div>
                        <p class="text-sm text-gray-500 font-medium mb-3">Oleh <span
                                class="text-gray-800 font-bold">Agus Petani Muda</span> &bull; 5 jam yang lalu
                        </p>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            Saya butuh tambahan pupuk urea tapi jatah subsidi sudah habis. Kira-kira di toko
                            pertanian sekitar Ajibarang harganya kisaran berapa ya per sak (50kg)?
                        </p>

                        <!-- Interaksi (Like, Komentar) -->
                        <div class="flex items-center gap-6 mt-4 pt-4 border-t border-gray-50">
                            <button
                                class="btn-like flex items-center gap-2 text-gray-400 font-bold text-sm hover:text-red-500 transition-colors group focus:outline-none"
                                onclick="toggleLike(this)">
                                <i
                                    class="fa-regular fa-heart text-lg group-active:scale-125 transition-transform"></i>
                                <span class="like-count">12</span> Suka
                            </button>
                            <button
                                class="flex items-center gap-2 text-gray-400 font-bold text-sm hover:text-blue-500 transition-colors focus:outline-none">
                                <i class="fa-regular fa-comment-dots text-lg"></i>
                                <span>5</span> Balasan
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Diskusi 3: Tips Persiapan Lahan (Pakar) -->
            <div
                class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow border-l-4 border-l-blue-500">
                <div class="flex items-start gap-4">
                    <!-- Avatar User (Pakar) -->
                    <div
                        class="relative w-12 h-12 bg-blue-100 text-blue-600 rounded-full shrink-0 flex items-center justify-center font-bold text-xl border-2 border-white shadow-sm">
                        P
                        <!-- Tanda Centang Biru / Verified -->
                        <div class="absolute -bottom-1 -right-1 bg-blue-500 text-white w-5 h-5 rounded-full flex items-center justify-center text-[10px] border-2 border-white"
                            title="Pakar Terverifikasi"><i class="fa-solid fa-check"></i></div>
                    </div>
                    <!-- Konten -->
                    <div class="flex-1">
                        <div class="mb-1">
                            <h4
                                class="font-bold text-gray-900 text-lg hover:text-tanigreen-600 transition-colors cursor-pointer">
                                Tips Jitu Persiapan Lahan Sebelum Musim Hujan</h4>
                        </div>
                        <p class="text-sm text-gray-500 font-medium mb-3">Oleh <span
                                class="text-blue-600 font-bold flex items-center gap-1">Penyuluh Pertanian <i
                                    class="fa-solid fa-circle-check text-xs"></i></span> &bull; 1 hari yang lalu
                        </p>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            Halo para petani tangguh. Menjelang musim hujan bulan depan, ini ada beberapa poin
                            penting yang wajib disiapkan dari sekarang mulai dari pembersihan gulma hingga
                            drainase agar tanaman tidak busuk akar. Mari disimak.
                        </p>

                        <!-- Interaksi (Like, Komentar) -->
                        <div class="flex items-center gap-6 mt-4 pt-4 border-t border-gray-50">
                            <button
                                class="btn-like flex items-center gap-2 text-gray-400 font-bold text-sm hover:text-red-500 transition-colors group focus:outline-none"
                                onclick="toggleLike(this)">
                                <i
                                    class="fa-regular fa-heart text-lg group-active:scale-125 transition-transform"></i>
                                <span class="like-count">89</span> Suka
                            </button>
                            <button
                                class="flex items-center gap-2 text-gray-400 font-bold text-sm hover:text-blue-500 transition-colors focus:outline-none">
                                <i class="fa-regular fa-comment-dots text-lg"></i>
                                <span>32</span> Balasan
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination Interaktif -->
            <div class="flex justify-center mt-8 pb-4">
                <nav class="flex items-center gap-2">
                    <button
                        class="w-10 h-10 rounded-xl flex items-center justify-center border border-gray-200 text-gray-400 hover:bg-gray-50 hover:text-gray-600 transition disabled:opacity-50"><i
                            class="fa-solid fa-chevron-left text-sm"></i></button>
                    <!-- Halaman Aktif (Hijau) -->
                    <button
                        class="w-10 h-10 rounded-xl flex items-center justify-center bg-tanigreen-600 text-white font-bold shadow-md">1</button>
                    <button
                        class="w-10 h-10 rounded-xl flex items-center justify-center border border-gray-200 text-gray-600 font-bold hover:bg-gray-50 hover:text-tanigreen-600 transition-colors">2</button>
                    <button
                        class="w-10 h-10 rounded-xl flex items-center justify-center border border-gray-200 text-gray-600 font-bold hover:bg-gray-50 hover:text-tanigreen-600 transition-colors">3</button>
                    <span class="px-2 text-gray-400 font-bold">...</span>
                    <button
                        class="w-10 h-10 rounded-xl flex items-center justify-center border border-gray-200 text-gray-600 hover:bg-gray-50 hover:text-tanigreen-600 transition"><i
                            class="fa-solid fa-chevron-right text-sm"></i></button>
                </nav>
            </div>

        </div>
    </div>

    <!-- 3. Modal Buat Topik Baru -->
    <div id="modal-topik"
        class="fixed inset-0 bg-gray-900 bg-opacity-60 hidden items-center justify-center p-4 z-[60] backdrop-blur-sm transition-opacity">
        <div
            class="bg-white rounded-[2rem] shadow-2xl w-full max-w-lg p-6 md:p-8 transform scale-100 transition-transform duration-300">

            <!-- Header Modal -->
            <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
                <h2 class="text-2xl font-extrabold text-gray-900">Buat Topik Baru</h2>
                <button id="btn-tutup-topik"
                    class="text-gray-400 hover:text-red-500 bg-gray-50 hover:bg-red-50 p-2 rounded-full focus:outline-none transition-colors">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <!-- Form -->
            <form id="form-topik">
                <!-- Judul Topik -->
                <div class="mb-5">
                    <label for="judul" class="block text-sm font-bold text-gray-700 mb-2">Judul Topik</label>
                    <input type="text" id="judul" required placeholder="Contoh: Harga Jagung Terbaru..."
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tanigreen-500 font-medium text-gray-800 transition-colors">
                </div>

                <!-- Kategori -->
                <div class="mb-5">
                    <label for="kategori" class="block text-sm font-bold text-gray-700 mb-2">Kategori</label>
                    <div class="relative">
                        <select id="kategori" required
                            class="w-full pl-4 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tanigreen-500 appearance-none font-medium text-gray-700 cursor-pointer transition-colors">
                            <option value="" disabled selected>Pilih Kategori...</option>
                            <option value="hama">Hama & Penyakit</option>
                            <option value="tips">Tips Bertanam</option>
                            <option value="irigasi">Irigasi & Pupuk</option>
                            <option value="umum">Tren & Umum</option>
                        </select>
                        <div
                            class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-400">
                            <i class="fa-solid fa-chevron-down text-sm"></i>
                        </div>
                    </div>
                </div>

                <!-- Isi Pesan -->
                <div class="mb-6">
                    <label for="pesan" class="block text-sm font-bold text-gray-700 mb-2">Isi Pesan</label>
                    <textarea id="pesan" required rows="5"
                        placeholder="Tuliskan pertanyaan atau diskusi Anda di sini..."
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tanigreen-500 resize-none font-medium text-gray-800 transition-colors"></textarea>
                </div>

                <!-- Tombol Submit -->
                <button type="submit"
                    class="w-full bg-tanigreen-600 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-xl hover:bg-tanigreen-700 hover:-translate-y-0.5 transition-all duration-300 flex justify-center items-center gap-2 text-lg active:scale-[0.98]">
                    <i class="fa-regular fa-paper-plane"></i> Terbitkan Diskusi
                </button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Script Interaktif JS -->
    <script>
        // 1. Sistem Like Interaktif
        function toggleLike(btn) {
            const icon = btn.querySelector('i');
            const countSpan = btn.querySelector('.like-count');
            let count = parseInt(countSpan.innerText);

            if (icon.classList.contains('fa-solid')) {
                // Proses batal suka (Unlike)
                icon.classList.remove('fa-solid', 'text-red-500');
                icon.classList.add('fa-regular');
                btn.classList.remove('text-red-500');
                countSpan.innerText = count - 1;
            } else {
                // Proses suka (Like)
                icon.classList.remove('fa-regular');
                icon.classList.add('fa-solid');
                btn.classList.add('text-red-500');
                countSpan.innerText = count + 1;
            }
        }

        // 2. Kategori Interaktif (Efek Active/Hover)
        const categoryLinks = document.querySelectorAll('.category-link');

        categoryLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault(); // Mencegah pindah halaman untuk demo

                // Menghapus status active dari semua kategori
                categoryLinks.forEach(item => {
                    item.classList.remove('bg-tanigreen-50', 'text-tanigreen-700');
                    item.classList.add('text-gray-600', 'hover:bg-tanigreen-50', 'hover:text-tanigreen-700'); // Kembalikan efek hover

                    const icon = item.querySelector('i:not(.text-orange-500)'); // mengecualikan icon default berwarna untuk 'Semua'
                    if (icon && icon.classList.contains('text-tanigreen-500')) {
                        icon.classList.remove('text-tanigreen-500');
                    }

                    const badge = item.querySelector('.cat-count');
                    badge.classList.remove('bg-tanigreen-100', 'text-tanigreen-800');
                    badge.classList.add('bg-gray-100', 'text-gray-500');
                });

                // Menambahkan status active ke kategori yang diklik
                this.classList.add('bg-tanigreen-50', 'text-tanigreen-700');
                this.classList.remove('text-gray-600', 'hover:bg-tanigreen-50', 'hover:text-tanigreen-700');

                const currentBadge = this.querySelector('.cat-count');
                currentBadge.classList.replace('bg-gray-100', 'bg-tanigreen-100');
                currentBadge.classList.replace('text-gray-500', 'text-tanigreen-800');
            });
        });

        // 3. Sistem Modal (Buat Topik Baru)
        const modalTopik = document.getElementById('modal-topik');
        const btnBuatTopik = document.getElementById('btn-buat-topik');
        const btnTutupTopik = document.getElementById('btn-tutup-topik');
        const formTopik = document.getElementById('form-topik');

        // Fungsi Buka Modal
        btnBuatTopik.addEventListener('click', () => {
            modalTopik.classList.remove('hidden');
            modalTopik.classList.add('flex');
            // Sedikit delay untuk efek transisi dari scale css form
            setTimeout(() => {
                modalTopik.firstElementChild.classList.remove('scale-95');
            }, 10);
        });

        // Fungsi Tutup Modal
        function tutupModal() {
            modalTopik.firstElementChild.classList.add('scale-95');
            setTimeout(() => {
                modalTopik.classList.add('hidden');
                modalTopik.classList.remove('flex');
            }, 200); // Sesuaikan dengan durasi animasi
        }

        btnTutupTopik.addEventListener('click', tutupModal);

        // Tutup modal jika user klik area luar (overlay hitam)
        modalTopik.addEventListener('click', (e) => {
            if (e.target === modalTopik) {
                tutupModal();
            }
        });

        // Submit Form (Notifikasi Sukses)
        formTopik.addEventListener('submit', (e) => {
            e.preventDefault(); // Mencegah reload halaman

            // Tampilkan alert sederhana
            alert('Sukses! Topik diskusi Anda telah berhasil diterbitkan.');

            // Tutup modal dan reset form
            tutupModal();
            formTopik.reset();
        });

    </script>
@endpush
