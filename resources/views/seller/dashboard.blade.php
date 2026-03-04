@extends('layouts.app')

@section('content')
    <!-- Header Darurat Seller -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-2 tracking-tight">Pusat Kendali Penjual</h1>
        <p class="text-gray-500 font-medium w-full md:w-2/3">Pantau penjualan Anda, kelola stok produk, dan negosiasi harga dengan pembeli secara real-time.</p>
    </div>

    <!-- 1. Ringkasan Penjualan (Statistik) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Stat Kartu 1: Pendapatan -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-emerald-100 flex items-center gap-5 relative overflow-hidden group hover:border-emerald-300 transition-colors">
            <div class="absolute -right-6 -top-6 text-emerald-50 opacity-50 transform group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-wallet text-9xl"></i>
            </div>
            <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 text-2xl shrink-0 z-10">
                <i class="fa-solid fa-rupiah-sign"></i>
            </div>
            <div class="z-10">
                <h4 class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Total Pendapatan</h4>
                <p class="text-2xl font-extrabold text-gray-900 leading-none">4.2<span class="text-lg text-gray-500">Jt</span></p>
            </div>
        </div>

        <!-- Stat Kartu 2: Pesanan Baru -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-blue-100 flex items-center gap-5 relative overflow-hidden group hover:border-blue-300 transition-colors">
             <div class="absolute -right-6 -top-6 text-blue-50 opacity-50 transform group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-box-open text-9xl"></i>
            </div>
            <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-500 text-2xl shrink-0 z-10">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <div class="z-10">
                <h4 class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Pesanan Baru</h4>
                <p class="text-2xl font-extrabold text-gray-900 leading-none">12 <span class="text-sm font-bold bg-blue-100 text-blue-700 px-2 py-0.5 rounded ml-1 animate-pulse">Perlu Dikirim</span></p>
            </div>
        </div>

        <!-- Stat Kartu 3: Tawaran Masuk -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-yellow-100 flex items-center gap-5 relative overflow-hidden group hover:border-yellow-300 transition-colors">
            <div class="absolute -right-6 -top-6 text-yellow-50 opacity-50 transform group-hover:scale-110 transition-transform">
                <i class="fa-solid fa-handshake-angle text-9xl"></i>
            </div>
            <div class="w-14 h-14 bg-yellow-50 rounded-2xl flex items-center justify-center text-yellow-500 text-2xl shrink-0 z-10">
                <i class="fa-regular fa-comments"></i>
            </div>
            <div class="z-10">
                <h4 class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Tawaran (Nego)</h4>
                <p class="text-2xl font-extrabold text-gray-900 leading-none">5 <span class="text-sm font-bold bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded ml-1">Menunggu</span></p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 mb-8">
        
        <!-- Kolom Kiri: Tren Harga & Manajemen Produk -->
        <div class="xl:col-span-2 space-y-8">
            
            <!-- Grafik Tren Harga (Placeholder Chart.js) -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-bold text-gray-900 text-lg flex items-center gap-2">
                        <i class="fa-solid fa-chart-line text-emerald-500"></i> Tren Harga Komoditas Pasar Ajibarang
                    </h3>
                    <select class="text-sm border-gray-200 rounded-lg focus:ring-emerald-500 focus:border-emerald-500 text-gray-600 font-medium py-1.5 pl-3 pr-8">
                        <option>Bulan Ini</option>
                        <option>Minggu Ini</option>
                    </select>
                </div>
                <div class="h-64 w-full relative">
                    <canvas id="marketChart"></canvas>
                </div>
            </div>

            <!-- Tabel Manajemen Produk (CRUD) -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                    <h3 class="font-bold text-gray-900 text-lg flex items-center gap-2">
                        <i class="fa-solid fa-boxes-stacked text-emerald-500"></i> Produk Jualan Saya
                    </h3>
                    <button onclick="bukaModalProduk()" class="bg-emerald-600 text-white text-sm font-bold px-4 py-2.5 rounded-xl shadow-sm hover:bg-emerald-700 transition flex items-center justify-center gap-2 whitespace-nowrap active:scale-95">
                        <i class="fa-solid fa-plus"></i> Tambah Produk Baru
                    </button>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                                <th class="p-4 font-bold border-b border-gray-100">Nama Produk</th>
                                <th class="p-4 font-bold border-b border-gray-100">Kategori</th>
                                <th class="p-4 font-bold border-b border-gray-100">Harga</th>
                                <th class="p-4 font-bold border-b border-gray-100">Status</th>
                                <th class="p-4 font-bold border-b border-gray-100 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm" id="tabel-produk-body">
                            <!-- Baris Produk 1 -->
                            <tr class="hover:bg-gray-50 transition-colors border-b border-gray-50 group">
                                <td class="p-4">
                                    <div class="font-bold text-gray-900">Pupuk Urea Biru (50kg)</div>
                                    <div class="text-xs text-gray-500"><i class="fa-solid fa-location-dot text-gray-400"></i> Kios Tani Ajibarang</div>
                                </td>
                                <td class="p-4">
                                    <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs font-bold">Pupuk Sintetis</span>
                                </td>
                                <td class="p-4 font-extrabold text-gray-900">Rp 120.000</td>
                                <td class="p-4">
                                    <span class="bg-green-50 text-emerald-600 border border-emerald-100 px-2.5 py-1 rounded-full text-xs font-bold flex items-center gap-1 w-max">
                                        <i class="fa-solid fa-circle text-[8px]"></i> Tersedia
                                    </span>
                                </td>
                                <td class="p-4 text-center">
                                    <div class="flex justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-100 flex items-center justify-center transition-colors"><i class="fa-solid fa-pen text-xs"></i></button>
                                        <button class="w-8 h-8 rounded-lg bg-red-50 text-red-500 hover:bg-red-100 flex items-center justify-center transition-colors"><i class="fa-solid fa-trash text-xs"></i></button>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Baris Produk 2 -->
                            <tr class="hover:bg-gray-50 transition-colors border-b border-gray-50 group">
                                <td class="p-4">
                                    <div class="font-bold text-gray-900">Benih Padi Ciherang (5kg)</div>
                                    <div class="text-xs text-gray-500"><i class="fa-solid fa-location-dot text-gray-400"></i> Kios Tani Ajibarang</div>
                                </td>
                                <td class="p-4">
                                    <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs font-bold">Benih Padi</span>
                                </td>
                                <td class="p-4 font-extrabold text-gray-900">Rp 65.000</td>
                                <td class="p-4">
                                    <span class="bg-red-50 text-red-600 border border-red-100 px-2.5 py-1 rounded-full text-xs font-bold flex items-center gap-1 w-max">
                                        <i class="fa-solid fa-circle text-[8px]"></i> Stok Habis
                                    </span>
                                </td>
                                <td class="p-4 text-center">
                                    <div class="flex justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-100 flex items-center justify-center transition-colors"><i class="fa-solid fa-pen text-xs"></i></button>
                                        <button class="w-8 h-8 rounded-lg bg-red-50 text-red-500 hover:bg-red-100 flex items-center justify-center transition-colors"><i class="fa-solid fa-trash text-xs"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination Placeholder -->
                <div class="p-4 border-t border-gray-100 flex justify-center">
                    <nav class="flex gap-1">
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 hover:bg-gray-50"><i class="fa-solid fa-chevron-left text-xs"></i></button>
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-emerald-600 text-white font-bold text-sm">1</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 font-bold text-sm">2</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50"><i class="fa-solid fa-chevron-right text-xs"></i></button>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Tawar Menawar & Rekomendasi Harga -->
        <div class="space-y-8">
            
            <!-- Rekomendasi Harga AI Widget -->
            <div class="bg-gradient-to-br from-emerald-600 to-emerald-800 rounded-2xl p-6 shadow-md text-white relative overflow-hidden">
                <div class="absolute -right-4 -bottom-4 opacity-10">
                    <i class="fa-solid fa-robot text-8xl"></i>
                </div>
                <div class="flex items-center gap-3 mb-4 relative z-10">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                        <i class="fa-solid fa-wand-magic-sparkles text-xl text-yellow-300"></i>
                    </div>
                    <h3 class="font-bold text-lg">AI Pricing Assistant</h3>
                </div>
                <div class="relative z-10">
                    <p class="text-emerald-50 font-medium text-sm leading-relaxed mb-3">Harga rata-rata Cabai Rawit Merah di area Ajibarang saat ini mencapai <span class="font-bold text-white bg-emerald-900/50 px-1 rounded">Rp40.000/kg</span>.</p>
                    <div class="bg-white/10 border border-white/20 rounded-xl p-3 backdrop-blur-sm">
                        <p class="text-xs text-emerald-100 mb-1 uppercase tracking-wider font-bold">Saran Harga Jual Anda</p>
                        <p class="text-2xl font-extrabold text-yellow-300 flex items-center gap-2">
                             Rp39.500 <i class="fa-solid fa-arrow-trend-up text-sm"></i>
                        </p>
                        <p class="text-xs text-emerald-200 mt-1">Agar 85% lebih cepat laku</p>
                    </div>
                </div>
            </div>

            <!-- Fitur Tawar Menawar (Nego List) -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 flex flex-col h-[500px]">
                <div class="p-5 border-b border-gray-100 flex justify-between items-center">
                     <h3 class="font-bold text-gray-900 text-lg flex items-center gap-2">
                        <i class="fa-solid fa-comments-dollar text-yellow-500"></i> Permintaan Nego
                    </h3>
                    <span class="bg-yellow-100 text-yellow-700 text-xs font-bold px-2 py-0.5 rounded-full">5 Antrean</span>
                </div>
                
                <div class="flex-1 overflow-y-auto p-2 space-y-2">
                    
                    <!-- Nego Item 1 -->
                    <div class="p-4 border border-gray-100 rounded-xl bg-white hover:bg-gray-50 transition-colors group" id="nego-1">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm">Pupuk Organik Cair (POMA)</h4>
                                <p class="text-xs text-gray-500"><i class="fa-solid fa-user text-gray-400 mr-1"></i> Ahmad Petani</p>
                            </div>
                            <span class="text-xs font-bold text-gray-400 bg-gray-100 px-2 py-0.5 rounded">2 Menit lalu</span>
                        </div>
                        <div class="flex gap-4 text-sm bg-gray-50 border border-gray-100 p-2 rounded-lg mb-3">
                            <div>
                                <p class="text-[10px] text-gray-500 font-bold uppercase">Harga Awal</p>
                                <p class="font-medium text-gray-500 line-through">Rp75.000</p>
                            </div>
                            <div>
                                <p class="text-[10px] text-yellow-600 font-bold uppercase">Tawaran Pembeli</p>
                                <p class="font-extrabold text-yellow-600">Rp70.000</p>
                            </div>
                        </div>
                        <div class="flex gap-2 action-buttons">
                            <button onclick="prosesNego('nego-1', 'terima')" class="flex-1 bg-emerald-50 text-emerald-600 border border-emerald-200 text-xs font-bold py-2 rounded-lg hover:bg-emerald-600 hover:text-white transition-colors flex justify-center items-center gap-1">
                                <i class="fa-solid fa-check"></i> Terima
                            </button>
                            <button onclick="prosesNego('nego-1', 'tolak')" class="flex-1 bg-red-50 text-red-600 border border-red-200 text-xs font-bold py-2 rounded-lg hover:bg-red-600 hover:text-white transition-colors flex justify-center items-center gap-1">
                                <i class="fa-solid fa-xmark"></i> Tolak
                            </button>
                        </div>
                    </div>

                    <!-- Nego Item 2 -->
                    <div class="p-4 border border-gray-100 rounded-xl bg-white hover:bg-gray-50 transition-colors group" id="nego-2">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm">Benih Cabai Unggul (10gr)</h4>
                                <p class="text-xs text-gray-500"><i class="fa-solid fa-user text-gray-400 mr-1"></i> Siti Haryanti</p>
                            </div>
                            <span class="text-xs font-bold text-gray-400 bg-gray-100 px-2 py-0.5 rounded">1 Jam lalu</span>
                        </div>
                        <div class="flex gap-4 text-sm bg-gray-50 border border-gray-100 p-2 rounded-lg mb-3">
                            <div>
                                <p class="text-[10px] text-gray-500 font-bold uppercase">Harga Awal</p>
                                <p class="font-medium text-gray-500 line-through">Rp120.000</p>
                            </div>
                            <div>
                                <p class="text-[10px] text-yellow-600 font-bold uppercase">Tawaran Pembeli</p>
                                <p class="font-extrabold text-yellow-600">Rp90.000 <i class="fa-solid fa-arrow-down text-[10px] text-red-500 ml-1"></i></p>
                            </div>
                        </div>
                        <div class="flex gap-2 action-buttons">
                            <button onclick="prosesNego('nego-2', 'terima')" class="flex-1 bg-emerald-50 text-emerald-600 border border-emerald-200 text-xs font-bold py-2 rounded-lg hover:bg-emerald-600 hover:text-white transition-colors flex justify-center items-center gap-1">
                                <i class="fa-solid fa-check"></i> Terima
                            </button>
                            <button onclick="prosesNego('nego-2', 'tolak')" class="flex-1 bg-red-50 text-red-600 border border-red-200 text-xs font-bold py-2 rounded-lg hover:bg-red-600 hover:text-white transition-colors flex justify-center items-center gap-1">
                                <i class="fa-solid fa-xmark"></i> Tolak
                            </button>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>

    <!-- Modal Tambah Produk Baru -->
    <div id="modal-produk" class="fixed inset-0 bg-gray-900 bg-opacity-60 hidden items-center justify-center p-4 z-[60] backdrop-blur-sm transition-opacity">
        <div class="bg-white rounded-[2rem] shadow-2xl w-full max-w-lg p-6 transform scale-95 transition-transform duration-300" id="modal-produk-box">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-extrabold text-gray-900 flex items-center gap-2"><i class="fa-solid fa-box text-emerald-500"></i> Tambah Produk Jualan</h2>
                <button onclick="tutupModalProduk()" class="text-gray-400 hover:text-red-500 bg-gray-50 hover:bg-red-50 p-2 rounded-full focus:outline-none transition-colors">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>

            <form id="form-tambah-produk">
                <div class="space-y-5 mb-8">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Nama Produk</label>
                        <input type="text" id="input-nama-produk" required placeholder="Contoh: Pupuk NPK Mutiara" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 font-medium text-gray-800 transition-colors">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Kategori</label>
                            <select id="input-kategori" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 font-medium text-gray-800 transition-colors appearance-none">
                                <option value="Pupuk">Pupuk</option>
                                <option value="Benih">Benih</option>
                                <option value="Obat/Pestisida">Obat/Pestisida</option>
                                <option value="Alat Pertanian">Alat Pertanian</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Harga (Rp)</label>
                            <input type="number" id="input-harga" required placeholder="0" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 font-extrabold text-gray-800 transition-colors">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Lokasi Pasar/Kios</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fa-solid fa-location-dot text-gray-400"></i>
                            </div>
                            <input type="text" id="input-lokasi" required placeholder="Contoh: Kios Pasar Induk Ajibarang" class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 font-medium text-gray-800 transition-colors">
                        </div>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button type="button" onclick="tutupModalProduk()" class="flex-1 bg-white border border-gray-200 text-gray-700 font-bold py-3.5 rounded-xl hover:bg-gray-50 transition active:scale-95">Batal</button>
                    <button type="submit" class="flex-1 bg-emerald-600 text-white font-bold py-3.5 rounded-xl shadow-md hover:bg-emerald-700 transition flex justify-center items-center gap-2 active:scale-95">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        // 1. Script Chart Grafik Harga (Placeholder)
        document.addEventListener('DOMContentLoaded', function() {
             const ctx = document.getElementById('marketChart').getContext('2d');
             
             // Setup gradient under line
             let gradient = ctx.createLinearGradient(0, 0, 0, 400);
             gradient.addColorStop(0, 'rgba(16, 185, 129, 0.2)'); // Emerald-500 low opacity
             gradient.addColorStop(1, 'rgba(16, 185, 129, 0)');

             new Chart(ctx, {
                 type: 'line',
                 data: {
                     labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                     datasets: [{
                         label: 'Cabai Rawit Merah (Rp)',
                         data: [38000, 39500, 41000, 40000, 42000, 45000, 40000],
                         borderColor: '#10b981', // Emerald 500
                         backgroundColor: gradient,
                         borderWidth: 3,
                         pointBackgroundColor: '#fff',
                         pointBorderColor: '#10b981',
                         pointBorderWidth: 2,
                         pointRadius: 4,
                         pointHoverRadius: 6,
                         fill: true,
                         tension: 0.4
                     }]
                 },
                 options: {
                     responsive: true,
                     maintainAspectRatio: false,
                     plugins: {
                         legend: {
                             display: false
                         },
                         tooltip: {
                             backgroundColor: '#1f2937',
                             padding: 12,
                             titleFont: { family: 'Inter', size: 13 },
                             bodyFont: { family: 'Inter', size: 14, weight: 'bold' },
                             displayColors: false,
                             callbacks: {
                                 label: function(context) {
                                     return 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                                 }
                             }
                         }
                     },
                     scales: {
                         y: {
                             beginAtZero: false,
                             grid: {
                                 color: '#f3f4f6',
                                 drawBorder: false,
                             },
                             ticks: {
                                 font: { family: 'Inter', size: 11 },
                                 color: '#9ca3af',
                                 callback: function(value) {
                                     return value / 1000 + 'k';
                                 }
                             }
                         },
                         x: {
                             grid: {
                                 display: false,
                                 drawBorder: false,
                             },
                             ticks: {
                                 font: { family: 'Inter', size: 12, weight: 'bold' },
                                 color: '#6b7280'
                             }
                         }
                     }
                 }
             });
        });

        // 2. Script Tawar Menawar (Ubah Status Real-time)
        function prosesNego(idElement, status) {
            const elemenDiv = document.getElementById(idElement);
            const containerTombol = elemenDiv.querySelector('.action-buttons');
            
            // Ganti tombol dengan status badge menggunakan animasi fade
            containerTombol.style.opacity = '0';
            
            setTimeout(() => {
                let badgeHTML = '';
                if(status === 'terima') {
                    // Animasi warna elemen div
                    elemenDiv.classList.replace('border-gray-100', 'border-emerald-200');
                    elemenDiv.classList.add('bg-emerald-50/30');
                    
                    badgeHTML = `
                        <div class="w-full bg-emerald-100 text-emerald-700 text-sm font-bold py-2 rounded-lg text-center border border-emerald-200 fade-in-scale">
                            <i class="fa-solid fa-check-circle mr-1"></i> Tawaran Diterima
                        </div>
                    `;
                } else {
                    // Animasi warna elemen div
                    elemenDiv.classList.replace('border-gray-100', 'border-red-200');
                    elemenDiv.classList.add('opacity-70');
                    
                    badgeHTML = `
                        <div class="w-full bg-red-100 text-red-600 text-sm font-bold py-2 rounded-lg text-center border border-red-200 fade-in-scale">
                            <i class="fa-solid fa-xmark-circle mr-1"></i> Tawaran Ditolak
                        </div>
                    `;
                }
                
                containerTombol.innerHTML = badgeHTML;
                containerTombol.style.opacity = '1';
                containerTombol.classList.add('block');
                containerTombol.classList.remove('flex'); // remove original flex layout for buttons
            }, 200);
        }

        // 3. Script Modal Tambah Produk
        const modalProduk = document.getElementById('modal-produk');
        const modalProdukBox = document.getElementById('modal-produk-box');
        const formTambahProduk = document.getElementById('form-tambah-produk');
        const tabelBody = document.getElementById('tabel-produk-body');

        function bukaModalProduk() {
            modalProduk.classList.remove('hidden');
            modalProduk.classList.add('flex');
            // Sedikit delay agar transisi display dan scale berjalan mulus
            setTimeout(() => { 
                modalProdukBox.classList.remove('scale-95'); 
            }, 10);
        }

        function tutupModalProduk() {
            modalProdukBox.classList.add('scale-95');
            setTimeout(() => {
                modalProduk.classList.add('hidden');
                modalProduk.classList.remove('flex');
                formTambahProduk.reset(); // Kosongkan input setelah ditutup
            }, 200);
        }

        // Handle klik di luar modal untuk tutup
        modalProduk.addEventListener('click', (e) => { 
            if (e.target === modalProduk) tutupModalProduk(); 
        });

        // 4. Handle Submit Form Manajemen Produk (CRUD Simulation)
        formTambahProduk.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Ambil Nilai Input
            const nama = document.getElementById('input-nama-produk').value;
            const kategori = document.getElementById('input-kategori').value;
            const harga = document.getElementById('input-harga').value;
            const lokasi = document.getElementById('input-lokasi').value;
            
            // Format Harga ke Rupiah
            const hargaFormat = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(harga);

            // Buat Elemen Baris Baru (TR)
            const tr = document.createElement('tr');
            tr.className = 'hover:bg-gray-50 transition-colors border-b border-gray-50 group fade-in-scale bg-emerald-50'; // Efek highlight warna hijau awal
            
            tr.innerHTML = `
                <td class="p-4">
                    <div class="font-bold text-gray-900">${nama}</div>
                    <div class="text-xs text-gray-500"><i class="fa-solid fa-location-dot text-gray-400"></i> ${lokasi}</div>
                </td>
                <td class="p-4">
                    <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs font-bold">${kategori}</span>
                </td>
                <td class="p-4 font-extrabold text-gray-900 text-emerald-600">${hargaFormat}</td>
                <td class="p-4">
                    <span class="bg-green-50 text-emerald-600 border border-emerald-100 px-2.5 py-1 rounded-full text-xs font-bold flex items-center gap-1 w-max">
                        <i class="fa-solid fa-circle text-[8px]"></i> Tersedia
                    </span>
                </td>
                <td class="p-4 text-center">
                    <div class="flex justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <button class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-100 flex items-center justify-center transition-colors"><i class="fa-solid fa-pen text-xs"></i></button>
                        <button class="w-8 h-8 rounded-lg bg-red-50 text-red-500 hover:bg-red-100 flex items-center justify-center transition-colors"><i class="fa-solid fa-trash text-xs"></i></button>
                    </div>
                </td>
            `;

            // Prepend (tambahkan di urutan paling atas)
            tabelBody.insertBefore(tr, tabelBody.firstChild);
            
            // Hilangkan highlight hijau setelah 2 detik
            setTimeout(() => {
                tr.classList.remove('bg-emerald-50');
                tr.querySelector('.text-emerald-600.font-extrabold').classList.replace('text-emerald-600', 'text-gray-900');
            }, 2000);

            // Tutup Modal
            tutupModalProduk();
        });
    </script>

    <!-- Custom Style tambahan untuk animasi spesifik di halaman Seller -->
    <style>
        .fade-in-scale {
            animation: fadeInScale 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }
        @keyframes fadeInScale {
            0% { opacity: 0; transform: scale(0.95); }
            100% { opacity: 1; transform: scale(1); }
        }
    </style>
@endpush
