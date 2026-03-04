@extends('layouts.app')

@section('title', 'Toko Pertanian Organik - TaniBantu')

@section('content')
    <!-- Mobile Header & Keranjang Belanja (Moved inside content for Toko specific header additions) -->
    <div class="flex items-center justify-end mb-4 md:-mt-8">
        <!-- Ikon Keranjang (Desktop & Mobile) -->
        <div class="flex items-center gap-4">
            <button onclick="toggleCartModal()"
                class="relative text-gray-500 hover:text-tanigreen-600 bg-gray-50 hover:bg-tanigreen-50 w-10 h-10 rounded-full flex items-center justify-center transition-colors focus:outline-none">
                <i class="fa-solid fa-cart-shopping text-lg"></i>
                <span id="cart-badge"
                    class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center border-2 border-white shadow-sm transition-transform">0</span>
            </button>
        </div>
    </div>

    <!-- Page Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-6 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2 tracking-tight">Marketplace Produk Pertanian
                Organik</h1>
            <p class="text-gray-500 font-medium">Temukan sarana produksi pertanian terbaik dari toko terdekat.
            </p>
        </div>
    </div>

    <!-- Info Update Waktu -->
    <div class="mb-8">
        <div
            class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-3 py-1.5 rounded-md text-xs font-bold border border-blue-100 shadow-sm">
            <i class="fa-regular fa-clock"></i>
            <span id="update-time">Harga Terupdate: Memuat waktu...</span>
        </div>
    </div>

    <!-- Filter & Search Bar -->
    <div
        class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 mb-8 flex flex-col lg:flex-row gap-4 justify-between items-center">

        <!-- Filter Kategori (Buttons) -->
        <div class="flex flex-wrap gap-2 w-full lg:w-auto overflow-x-auto pb-2 lg:pb-0 hide-scrollbar"
            id="category-filters">
            <button
                class="filter-btn active bg-tanigreen-600 text-white px-4 py-2 rounded-xl text-sm font-bold shadow-md transition-colors whitespace-nowrap"
                data-filter="semua">Semua</button>
            <button
                class="filter-btn bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-xl text-sm font-bold transition-colors whitespace-nowrap"
                data-filter="pupuk">Pupuk Cair</button>
            <button
                class="filter-btn bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-xl text-sm font-bold transition-colors whitespace-nowrap"
                data-filter="benih">Benih</button>
            <button
                class="filter-btn bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-xl text-sm font-bold transition-colors whitespace-nowrap"
                data-filter="pestisida">Pestisida Nabati</button>
        </div>

        <!-- Kolom Pencarian -->
        <div class="relative w-full lg:w-72 mt-2 lg:mt-0">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                <i class="fa-solid fa-search"></i>
            </div>
            <input type="text" placeholder="Cari benih, pupuk..."
                class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tanigreen-500 focus:bg-white transition-all text-sm font-medium">
        </div>
    </div>

    @php
        if (!function_exists('getProductImage')) {
            function getProductImage($name) {
                $name = strtolower($name);
                if (str_contains($name, 'pupuk') || str_contains($name, 'kompos')) {
                    return 'https://images.unsplash.com/photo-1595033538458-7472099965d1?auto=format&fit=crop&q=80&w=500';
                } elseif (str_contains($name, 'benih') || str_contains($name, 'padi')) {
                    return 'https://images.unsplash.com/photo-1586771107445-d3afeb0ddcb6?auto=format&fit=crop&q=80&w=500';
                } elseif (str_contains($name, 'pestisida')) {
                    return 'https://images.unsplash.com/photo-1622383563227-04401ab4e5ea?auto=format&fit=crop&q=80&w=500';
                }
                return 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&q=80&w=500';
            }
        }
    @endphp

    <!-- Katalog Produk (Grid) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-10">

        <!-- Produk 1 -->
        <div onclick="window.location.href='{{ url('/toko/detail/1') }}'"
            class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-lg hover:border-tanigreen-200 transition-all duration-300 flex flex-col group cursor-pointer relative">
            <div class="absolute inset-0 bg-tanigreen-500/0 group-hover:bg-tanigreen-500/5 transition-colors z-0"></div>
            <!-- Image Container -->
            <div class="h-48 bg-green-100 relative overflow-hidden flex items-center justify-center z-10">
                <img src="{{ getProductImage('Pupuk Organik Cair Multiguna 1 Liter') }}" alt="Pupuk Organik Cair Multiguna 1 Liter" 
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 border-0">
                <span class="absolute top-3 left-3 bg-white px-2 py-1 rounded-md text-[10px] font-bold text-gray-700 shadow-sm flex items-center gap-1 z-20"><i class="fa-solid fa-star text-taniaccent-400"></i> 4.5</span>
            </div>
            <!-- Detail -->
            <div class="p-5 flex flex-col flex-1 z-10 bg-white">
                <h4 class="text-[10px] text-tanigreen-600 font-extrabold uppercase tracking-widest mb-1.5 bg-tanigreen-50 w-fit px-2 py-0.5 rounded">Pupuk Cair</h4>
                <h3
                    class="text-lg font-bold text-gray-900 leading-tight mb-2 group-hover:text-tanigreen-600 transition-colors line-clamp-2">
                    Pupuk Organik Cair Multiguna 1 Liter</h3>

                <div class="flex items-center gap-1.5 text-xs text-gray-500 mb-3 font-medium">
                    <i class="fa-solid fa-shop text-gray-400"></i> Kios Pertanian Ajibarang
                </div>

                <div class="flex items-center gap-2 mb-4 text-xs font-semibold text-gray-400">
                    <div class="flex text-taniaccent-400 text-[10px]">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <span>120 Terjual</span>
                </div>

                <div class="mt-auto flex items-end justify-between">
                    <div>
                        <p class="text-xs text-gray-400 line-through mb-0.5 font-medium">Rp85.000</p>
                        <p class="text-xl font-extrabold text-gray-900 leading-none">Rp75.000</p>
                    </div>
                    <button onclick="addToCart(event, this, 'Pupuk Organik Cair Multiguna 1 Liter', 75000)"
                        class="w-10 h-10 bg-tanigreen-50 text-tanigreen-600 hover:bg-tanigreen-600 hover:text-white rounded-xl transition-colors flex items-center justify-center hover:-translate-y-1 hover:shadow-lg">
                        <i class="fa-solid fa-cart-plus text-lg"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Produk 2 -->
        <div onclick="window.location.href='{{ url('/toko/detail/2') }}'"
            class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-lg hover:border-yellow-200 transition-all duration-300 flex flex-col group cursor-pointer relative">
            <div class="absolute inset-0 bg-yellow-500/0 group-hover:bg-yellow-500/5 transition-colors z-0"></div>
            <!-- Image Container -->
            <div class="h-48 bg-green-100 relative overflow-hidden flex items-center justify-center z-10">
                <img src="{{ getProductImage('Benih Padi Unggul Inpari 32 (5kg)') }}" alt="Benih Padi Unggul Inpari 32 (5kg)" 
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 border-0">
                <span class="absolute top-3 left-3 bg-white px-2 py-1 rounded-md text-[10px] font-bold text-gray-700 shadow-sm flex items-center gap-1 z-20"><i class="fa-solid fa-star text-taniaccent-400"></i> 4.8</span>
            </div>
            <!-- Detail -->
            <div class="p-5 flex flex-col flex-1 z-10 bg-white">
                <h4 class="text-[10px] text-yellow-600 font-extrabold uppercase tracking-widest mb-1.5 bg-yellow-50 w-fit px-2 py-0.5 rounded">Benih Padi</h4>
                <h3
                    class="text-lg font-bold text-gray-900 leading-tight mb-2 group-hover:text-yellow-600 transition-colors line-clamp-2">
                    Benih Padi Unggul Inpari 32 (5kg)</h3>

                <div class="flex items-center gap-1.5 text-xs text-gray-500 mb-3 font-medium">
                    <i class="fa-solid fa-shop text-gray-400"></i> Kios Tani Lingkar Ajibarang
                </div>

                <div class="flex items-center gap-2 mb-4 text-xs font-semibold text-gray-400">
                    <div class="flex text-taniaccent-400 text-[10px]">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <span>300 Terjual</span>
                </div>

                <div class="mt-auto flex items-end justify-between">
                    <div>
                        <p class="text-xs text-gray-400 mb-0.5 font-medium">&nbsp;</p>
                        <p class="text-xl font-extrabold text-gray-900 leading-none">Rp30.000</p>
                    </div>
                    <button onclick="addToCart(event, this, 'Benih Padi Unggul Inpari 32 (5kg)', 30000)"
                        class="w-10 h-10 bg-yellow-50 text-yellow-600 hover:bg-yellow-500 hover:text-white rounded-xl transition-colors flex items-center justify-center hover:-translate-y-1 hover:shadow-lg">
                        <i class="fa-solid fa-cart-plus text-lg"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Produk 3 -->
        <div onclick="window.location.href='{{ url('/toko/detail/3') }}'"
            class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-lg hover:border-red-200 transition-all duration-300 flex flex-col group cursor-pointer relative">
            <div class="absolute inset-0 bg-red-500/0 group-hover:bg-red-500/5 transition-colors z-0"></div>
            <!-- Image Container -->
            <div class="h-48 bg-green-100 relative overflow-hidden flex items-center justify-center z-10">
                <img src="{{ getProductImage('Pestisida Nabati Ekstrak Mimba 500ml') }}" alt="Pestisida Nabati Ekstrak Mimba 500ml" 
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 border-0">
                <span class="absolute top-3 left-3 bg-white px-2 py-1 rounded-md text-[10px] font-bold text-gray-700 shadow-sm flex items-center gap-1 z-20"><i class="fa-solid fa-star text-taniaccent-400"></i> 4.6</span>
            </div>
            <!-- Detail -->
            <div class="p-5 flex flex-col flex-1 z-10 bg-white">
                <h4 class="text-[10px] text-red-600 font-extrabold uppercase tracking-widest mb-1.5 bg-red-50 w-fit px-2 py-0.5 rounded">Pestisida Nabati</h4>
                <h3
                    class="text-lg font-bold text-gray-900 leading-tight mb-2 group-hover:text-red-600 transition-colors line-clamp-2">
                    Pestisida Nabati Ekstrak Mimba 500ml</h3>

                <div class="flex items-center gap-1.5 text-xs text-gray-500 mb-3 font-medium">
                    <i class="fa-solid fa-shop text-gray-400"></i> Distribusi area Banyumas Barat
                </div>

                <div class="flex items-center gap-2 mb-4 text-xs font-semibold text-gray-400">
                    <div class="flex text-taniaccent-400 text-[10px]">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <span>80 Terjual</span>
                </div>

                <div class="mt-auto flex items-end justify-between">
                    <div>
                        <p class="text-xs text-gray-400 mb-0.5 font-medium">&nbsp;</p>
                        <p class="text-xl font-extrabold text-gray-900 leading-none">Rp45.000</p>
                    </div>
                    <button onclick="addToCart(event, this, 'Pestisida Nabati Ekstrak Mimba 500ml', 45000)"
                        class="w-10 h-10 bg-red-50 text-red-600 hover:bg-red-500 hover:text-white rounded-xl transition-colors flex items-center justify-center hover:-translate-y-1 hover:shadow-lg">
                        <i class="fa-solid fa-cart-plus text-lg"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Produk 4 -->
        <div onclick="window.location.href='{{ url('/toko/detail/4') }}'"
            class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-lg hover:border-orange-200 transition-all duration-300 flex flex-col group cursor-pointer relative">
            <div class="absolute inset-0 bg-orange-500/0 group-hover:bg-orange-500/5 transition-colors z-0"></div>
            <!-- Image Container -->
            <div class="h-48 bg-green-100 relative overflow-hidden flex items-center justify-center z-10">
                <img src="{{ getProductImage('Kompos Blok Fermentasi Siap Pakai (10kg)') }}" alt="Kompos Blok Fermentasi Siap Pakai (10kg)" 
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 border-0">
                <span class="absolute top-3 left-3 bg-white px-2 py-1 rounded-md text-[10px] font-bold text-gray-700 shadow-sm flex items-center gap-1 z-20"><i class="fa-solid fa-star text-taniaccent-400"></i> 4.9</span>
            </div>
            <!-- Detail -->
            <div class="p-5 flex flex-col flex-1 z-10 bg-white">
                <h4 class="text-[10px] text-orange-600 font-extrabold uppercase tracking-widest mb-1.5 bg-orange-50 w-fit px-2 py-0.5 rounded">Pupuk Padat</h4>
                <h3
                    class="text-lg font-bold text-gray-900 leading-tight mb-2 group-hover:text-orange-600 transition-colors line-clamp-2">
                    Kompos Blok Fermentasi Siap Pakai (10kg)</h3>

                <div class="flex items-center gap-1.5 text-xs text-gray-500 mb-3 font-medium">
                    <i class="fa-solid fa-shop text-gray-400"></i> Pasar Ajibarang
                </div>

                <div class="flex items-center gap-2 mb-4 text-xs font-semibold text-gray-400">
                    <div class="flex text-taniaccent-400 text-[10px]">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <span>450 Terjual</span>
                </div>

                <div class="mt-auto flex items-end justify-between">
                    <div>
                        <p class="text-xs text-gray-400 mb-0.5 font-medium">&nbsp;</p>
                        <p class="text-xl font-extrabold text-gray-900 leading-none">Rp20.000</p>
                    </div>
                    <button onclick="addToCart(event, this, 'Kompos Blok Fermentasi Siap Pakai (10kg)', 20000)"
                        class="w-10 h-10 bg-orange-50 text-orange-600 hover:bg-orange-500 hover:text-white rounded-xl transition-colors flex items-center justify-center hover:-translate-y-1 hover:shadow-lg">
                        <i class="fa-solid fa-cart-plus text-lg"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal Keranjang (Slide Over Right) -->
    <div id="cartModal" class="fixed inset-0 z-[100] transform translate-x-full transition-transform duration-300 flex justify-end" style="display: none;">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm" onclick="toggleCartModal()"></div>
        
        <!-- Sidebar Content -->
        <div class="relative w-full max-w-md bg-white h-full shadow-2xl flex flex-col animate-slide-in-right">
            <!-- Header Keranjang -->
            <div class="p-6 border-b border-gray-100 flex items-center justify-between bg-white z-10 mt-16 sm:mt-0">
                <h2 class="text-xl font-extrabold text-gray-900 flex items-center gap-3">
                    <i class="fa-solid fa-cart-shopping text-tanigreen-600"></i> Keranjang Anda
                </h2>
                <button onclick="toggleCartModal()" class="w-10 h-10 bg-gray-50 text-gray-500 rounded-full flex items-center justify-center hover:bg-red-50 hover:text-red-500 transition-colors">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            
            <!-- Daftar Item -->
            <div id="cart-items-container" class="flex-1 overflow-y-auto p-6 bg-gray-50 flex flex-col gap-4">
                <!-- Items will be injected here via JS -->
                <div id="empty-cart-msg" class="text-center py-10 flex flex-col items-center justify-center h-full text-gray-400">
                    <i class="fa-solid fa-basket-shopping text-6xl mb-4 opacity-20"></i>
                    <p class="font-bold mb-1">Keranjang masih kosong</p>
                    <p class="text-sm">Yuk, tambah produk pertanian terbaik!</p>
                </div>
            </div>
            
            <!-- Footer Total -->
            <div class="p-6 border-t border-gray-100 bg-white shadow-[0_-10px_15px_-3px_rgba(0,0,0,0.05)] z-10">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-gray-500 font-bold">Total Belanja</span>
                    <span id="cart-total" class="text-2xl font-black text-gray-900">Rp0</span>
                </div>
                <button onclick="checkoutCart()" class="w-full bg-tanigreen-600 text-white py-4 rounded-xl font-bold text-lg hover:bg-tanigreen-700 shadow-lg transition-colors flex items-center justify-center gap-2">
                    Checkout Sekarang <i class="fa-solid fa-lock text-sm"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Notifikasi Toast -->
    <div id="toast"
        class="fixed bottom-8 right-8 bg-gray-900 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 transform translate-y-32 opacity-0 transition-all duration-300 z-50">
        <i class="fa-solid fa-circle-check text-tanigreen-400 text-xl"></i>
        <div>
            <h4 class="font-bold text-sm" id="toast-title">Berhasil!</h4>
            <p class="text-xs text-gray-300" id="toast-msg">Produk ditambahkan ke keranjang.</p>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Script Interaktif JS -->
    <script>
        // 1. Set Waktu Real-Time
        function updateTime() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
            const timeString = now.toLocaleDateString('id-ID', options);
            document.getElementById('update-time').innerText = `Harga Terupdate: ${timeString} WIB`;
        }
        updateTime();
        // Update setiap menit
        setInterval(updateTime, 60000);

        // 2. Filter Kategori Interaktif
        const filterBtns = document.querySelectorAll('.filter-btn');
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Reset semua tombog
                filterBtns.forEach(b => {
                    b.classList.remove('bg-tanigreen-600', 'text-white', 'shadow-md', 'active');
                    b.classList.add('bg-gray-100', 'text-gray-600');
                });

                // Set tombol yg diklik
                btn.classList.add('bg-tanigreen-600', 'text-white', 'shadow-md', 'active');
                btn.classList.remove('bg-gray-100', 'text-gray-600');
            });
        });

        // 3. Logika Keranjang & Toast Notification
        let cart = [];
        
        try {
            const savedCart = localStorage.getItem('taniCart');
            if(savedCart) {
                cart = JSON.parse(savedCart);
                updateCartUI();
            }
        } catch(e) {}

        function saveCart() {
            localStorage.setItem('taniCart', JSON.stringify(cart));
            updateCartUI();
        }

        const cartBadge = document.getElementById('cart-badge');
        const toast = document.getElementById('toast');
        let toastTimeout;

        function addToCart(event, button, name, price) {
            // Hentikan agar card tidak ikut ter-klik
            event.stopPropagation();

            const existingItem = cart.find(item => item.name === name);
            if(existingItem) {
                existingItem.qty += 1;
            } else {
                cart.push({ name, price, qty: 1 });
            }
            saveCart();

            // Ubah gaya tombol sebentar
            const originalHTML = button.innerHTML;
            button.classList.replace('bg-white', 'bg-tanigreen-100');
            button.classList.replace('text-tanigreen-600', 'text-tanigreen-800');
            button.innerHTML = '<i class="fa-solid fa-check"></i> Ditambahkan';

            setTimeout(() => {
                button.classList.replace('bg-tanigreen-100', 'bg-white');
                button.classList.replace('text-tanigreen-800', 'text-tanigreen-600');
                button.innerHTML = originalHTML;
            }, 1000);

            // Tampilkan Toast
            showToast('Berhasil!', `1x ${name} ditambahkan ke keranjang.`);
        }

        function removeFromCart(index) {
            cart.splice(index, 1);
            saveCart();
        }

        function updateCartUI() {
            const cartBadge = document.getElementById('cart-badge');
            const container = document.getElementById('cart-items-container');
            const totalEl = document.getElementById('cart-total');
            const emptyMsg = document.getElementById('empty-cart-msg');
            
            if(!container) return; // Guard clause in case elements aren't loaded

            const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
            cartBadge.innerText = totalItems;
            
            cartBadge.classList.add('scale-150');
            setTimeout(() => cartBadge.classList.remove('scale-150'), 200);

            if(cart.length === 0) {
                emptyMsg.style.display = 'flex';
                const itemEls = container.querySelectorAll('.cart-item-row');
                itemEls.forEach(el => el.remove());
                totalEl.innerText = 'Rp0';
                return;
            }
            
            emptyMsg.style.display = 'none';
            
            let html = '';
            let grandTotal = 0;
            
            cart.forEach((item, index) => {
                const itemTotal = item.price * item.qty;
                grandTotal += itemTotal;
                
                html += `
                <div class="cart-item-row bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex gap-4 items-center">
                    <div class="flex-1">
                        <h3 class="font-bold text-gray-900 text-sm mb-1 leading-tight line-clamp-1">${item.name}</h3>
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-tanigreen-600 font-extrabold">Rp${item.price.toLocaleString('id-ID')}</span>
                            <span class="text-xs bg-gray-100 text-gray-600 font-bold px-2 py-1 rounded">Qty: ${item.qty}</span>
                        </div>
                    </div>
                    <button onclick="removeFromCart(${index})" class="w-8 h-8 flex-shrink-0 bg-red-50 text-red-500 rounded-lg flex items-center justify-center hover:bg-red-500 hover:text-white transition-colors">
                        <i class="fa-solid fa-trash-can text-sm"></i>
                    </button>
                </div>
                `;
            });
            
            const oldItems = container.querySelectorAll('.cart-item-row');
            oldItems.forEach(el => el.remove());
            
            container.insertAdjacentHTML('beforeend', html);
            totalEl.innerText = 'Rp' + grandTotal.toLocaleString('id-ID');
        }

        function toggleCartModal() {
            const modal = document.getElementById('cartModal');
            if (modal.style.display === 'none') {
                modal.style.display = 'flex';
                setTimeout(() => {
                    modal.classList.remove('translate-x-full');
                }, 10);
            } else {
                modal.classList.add('translate-x-full');
                setTimeout(() => {
                    modal.style.display = 'none';
                }, 300);
            }
        }
        
        function checkoutCart() {
            if(cart.length === 0) return alert('Keranjang masih kosong!');
            @auth
            alert('Memproses Checkout...');
            cart = [];
            saveCart();
            toggleCartModal();
            showToast('Sukses!', 'Pesanan Anda sedang diproses.');
            @else
            window.location.href = "{{ route('login') }}";
            @endauth
        }

        function showToast(title = 'Berhasil!', msg = 'Produk ditambahkan ke keranjang.') {
            document.getElementById('toast-title').innerText = title;
            document.getElementById('toast-msg').innerText = msg;
            
            toast.classList.remove('translate-y-32', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');

            // Reset timer jika diklik berkali-kali
            clearTimeout(toastTimeout);

            // Sembunyikan toast setelah 3 detik
            toastTimeout = setTimeout(() => {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-32', 'opacity-0');
            }, 3000);
        }
    </script>
@endpush
