@extends('layouts.app')

@section('title', 'Detail Produk - TaniBantu')

@section('content')
    <!-- Halaman Detail Produk -->
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ url('/toko') }}" class="text-gray-500 hover:text-tanigreen-600 font-bold transition-colors flex items-center gap-2">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Marketplace
        </a>

        <!-- Ikon Keranjang (Desktop & Mobile) -->
        <div class="flex items-center gap-4">
            <button onclick="toggleCartModal()"
                class="relative text-gray-500 hover:text-tanigreen-600 bg-gray-50 hover:bg-tanigreen-50 w-12 h-12 rounded-full flex items-center justify-center transition-colors focus:outline-none shadow-sm">
                <i class="fa-solid fa-cart-shopping text-xl"></i>
                <span id="cart-badge"
                    class="absolute -top-1 -right-1 bg-red-500 text-white text-[11px] font-bold w-6 h-6 rounded-full flex items-center justify-center border-2 border-white shadow-sm transition-transform">0</span>
            </button>
        </div>
    </div>

    @php
        // Simulasi Data Berdasarkan ID
        $productId = $id ?? 1;
        
        $products = [
            1 => [
                'name' => 'Pupuk Organik Cair Multiguna 1 Liter',
                'category' => 'Pupuk Cair',
                'price' => 75000,
                'original_price' => 85000,
                'sold' => 120,
                'rating' => 4.5,
                'shop' => 'Kios Pertanian Ajibarang',
                'icon' => 'fa-flask',
                'color' => 'tanigreen',
                'desc' => 'Pupuk organik cair yang diformulasikan khusus untuk merangsang pertumbuhan tunas baru dan memperkuat akar. Cocok untuk segala jenis tanaman sayur dan buah. Dibuat dari 100% bahan alami ramah lingkungan.',
                'stock' => 45
            ],
            2 => [
                'name' => 'Benih Padi Unggul Inpari 32 (5kg)',
                'category' => 'Benih Padi',
                'price' => 30000,
                'original_price' => null,
                'sold' => 300,
                'rating' => 4.8,
                'shop' => 'Kios Tani Lingkar Ajibarang',
                'icon' => 'fa-seedling',
                'color' => 'yellow',
                'desc' => 'Benih padi varietas Inpari 32 terbukti tahan terhadap penyakit Hawar Daun Bakteri. Potensi hasil panen tinggi mencapai 8-9 ton per hektar. Umur panen genjah sekitar 110-120 hari setelah tanam.',
                'stock' => 120
            ],
            3 => [
                'name' => 'Pestisida Nabati Ekstrak Mimba 500ml',
                'category' => 'Pestisida Nabati',
                'price' => 45000,
                'original_price' => null,
                'sold' => 80,
                'rating' => 4.6,
                'shop' => 'Distribusi area Banyumas Barat',
                'icon' => 'fa-spray-can-sparkles',
                'color' => 'red',
                'desc' => 'Efektif mengusir hama kutu daun, ulat grayak, dan walang sangit. Terbuat dari ekstrak daun dan biji mimba pilihan. Aman untuk tanaman dan tidak meninggalkan residu kimia berbahaya pada hasil panen.',
                'stock' => 25
            ],
            4 => [
                'name' => 'Kompos Blok Fermentasi Siap Pakai (10kg)',
                'category' => 'Pupuk Padat',
                'price' => 20000,
                'original_price' => null,
                'sold' => 450,
                'rating' => 4.9,
                'shop' => 'Pasar Ajibarang',
                'icon' => 'fa-sack-xmark',
                'color' => 'orange',
                'desc' => 'Kompos fermentasi berkualitas tinggi yang kaya akan unsur hara makro dan mikro. Memperbaiki struktur tanah yang rusak dan meningkatkan daya simpan air. Praktis langsung pakai tanpa perlu penambahan tanah lagi.',
                'stock' => 300
            ],
        ];

        $product = $products[$productId] ?? $products[1];

        if (!function_exists('getProductImage')) {
            function getProductImage($name) {
                $name = strtolower($name);
                if (str_contains($name, 'pupuk') || str_contains($name, 'kompos')) {
                    return 'https://images.unsplash.com/photo-1595033538458-7472099965d1?auto=format&fit=crop&q=80&w=800';
                } elseif (str_contains($name, 'benih') || str_contains($name, 'padi')) {
                    return 'https://images.unsplash.com/photo-1586771107445-d3afeb0ddcb6?auto=format&fit=crop&q=80&w=800';
                } elseif (str_contains($name, 'pestisida')) {
                    return 'https://images.unsplash.com/photo-1622383563227-04401ab4e5ea?auto=format&fit=crop&q=80&w=800';
                }
                return 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&q=80&w=800';
            }
        }
    @endphp

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden mb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-0">
            <!-- Bagian Gambar Kiri (2 Kolom) -->
            <div class="lg:col-span-2 bg-green-100 p-0 flex items-center justify-center relative min-h-[300px] md:min-h-full border-b md:border-b-0 md:border-r border-gray-100 overflow-hidden group">
                
                <!-- Dynamic Image -->
                <img src="{{ getProductImage($product['name']) }}" alt="{{ $product['name'] }}" 
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110 border-0">
                
                <!-- Overlay Gradient Bottom -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent pointer-events-none"></div>

                <!-- Badge Kategori Floating -->
                <span class="absolute top-6 left-6 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-lg text-xs font-extrabold text-{{ $product['color'] }}-600 shadow-sm uppercase tracking-widest border border-white/50 z-20">
                    {{ $product['category'] }}
                </span>
            </div>

            <!-- Bagian Informasi Kanan (3 Kolom) -->
            <div class="p-8 lg:p-12 lg:col-span-3">
                <div class="flex items-center gap-3 mb-4 text-sm font-bold text-gray-500">
                    <span class="flex items-center gap-1 text-taniaccent-500 bg-orange-50 px-2 py-1 rounded">
                        <i class="fa-solid fa-star"></i> {{ $product['rating'] }}
                    </span>
                    <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                    <span>{{ $product['sold'] }} Terjual</span>
                    <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                    <span class="flex items-center gap-1.5 text-gray-500">
                        <i class="fa-solid fa-shop"></i> {{ $product['shop'] }}
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 leading-tight mb-4">
                    {{ $product['name'] }}
                </h1>
                
                <div class="flex items-end gap-3 mb-8">
                    <p class="text-4xl font-black text-tanigreen-600 tracking-tight">Rp{{ number_format($product['price'], 0, ',', '.') }}</p>
                    @if($product['original_price'])
                        <p class="text-lg text-gray-400 line-through mb-1 font-bold">Rp{{ number_format($product['original_price'], 0, ',', '.') }}</p>
                        <span class="bg-red-100 text-red-600 text-xs font-bold px-2 py-1 rounded mb-2">Hemat Rp{{ number_format($product['original_price'] - $product['price'], 0, ',', '.') }}</span>
                    @endif
                </div>

                <div class="prose prose-sm sm:prose-base text-gray-600 mb-10 max-w-none leading-relaxed">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Deskripsi Produk</h3>
                    <p>{{ $product['desc'] }}</p>
                </div>

                <!-- Action Area -->
                <div class="bg-gray-50 p-6 rounded-2xl flex flex-col sm:flex-row gap-4 items-end border border-gray-100">
                    <div class="w-full sm:w-auto flex-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Kuantitas</label>
                        <div class="flex items-center bg-white border border-gray-200 rounded-xl overflow-hidden w-fit shadow-sm">
                            <button type="button" onclick="decrementQty()" class="w-10 h-10 flex items-center justify-center text-gray-500 hover:bg-gray-50 transition-colors">
                                <i class="fa-solid fa-minus text-sm"></i>
                            </button>
                            <input type="number" id="qty-input" value="1" min="1" max="{{ $product['stock'] }}" class="w-16 h-10 text-center font-bold text-gray-900 border-none focus:ring-0 p-0" readonly>
                            <button type="button" onclick="incrementQty()" class="w-10 h-10 flex items-center justify-center text-gray-500 hover:bg-gray-50 transition-colors">
                                <i class="fa-solid fa-plus text-sm"></i>
                            </button>
                        </div>
                        <p class="text-xs text-gray-500 font-medium mt-2">Tersisa {{ $product['stock'] }} buah</p>
                    </div>

                    <div class="flex-1 w-full flex gap-3">
                        <button onclick="addToCartDetail('{{ $product['name'] }}', {{ $product['price'] }})" class="flex-1 bg-white border-2 border-tanigreen-600 text-tanigreen-600 hover:bg-tanigreen-50 font-bold py-3.5 px-6 rounded-xl transition-colors flex items-center justify-center gap-2 shadow-sm">
                            <i class="fa-solid fa-cart-plus"></i> <span class="hidden sm:inline">Keranjang</span>
                        </button>
                        @auth
                        <button onclick="alert('Mengarahkan ke pembayaran...')" class="flex-[2] bg-tanigreen-600 text-white hover:bg-tanigreen-700 shadow-lg hover:shadow-xl font-bold py-3.5 px-6 rounded-xl transition-all flex items-center justify-center gap-2">
                            Beli Langsung <i class="fa-solid fa-arrow-right"></i>
                        </button>
                        @else
                        <button onclick="window.location.href='{{ route('login') }}'" class="flex-[2] bg-tanigreen-600 text-white hover:bg-tanigreen-700 shadow-lg hover:shadow-xl font-bold py-3.5 px-6 rounded-xl transition-all flex items-center justify-center gap-2">
                            Beli Langsung <i class="fa-solid fa-arrow-right"></i>
                        </button>
                        @endauth
                    </div>
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

    <style>
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        @keyframes slideInRight {
            from { transform: translateX(100%); }
            to { transform: translateX(0); }
        }
    </style>
@endsection

@push('scripts')
<script>
    const maxStock = {{ $product['stock'] }};
    const qtyInput = document.getElementById('qty-input');
    
    function incrementQty() {
        let val = parseInt(qtyInput.value);
        if(val < maxStock) {
            qtyInput.value = val + 1;
        }
    }
    
    function decrementQty() {
        let val = parseInt(qtyInput.value);
        if(val > 1) {
            qtyInput.value = val - 1;
        }
    }

    // --- Sistem Keranjang Global (Simulasi) ---
    let cart = [];
    
    // Inisialisasi dari LocalStorage (opsional, untuk konsistensi di toko)
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

    function addToCartDetail(name, price) {
        const qty = parseInt(qtyInput.value);
        
        // Cek apakah item sudah ada
        const existingItem = cart.find(item => item.name === name);
        if(existingItem) {
            existingItem.qty += qty;
        } else {
            cart.push({ name, price, qty });
        }
        
        saveCart();
        showToast('Berhasil!', `${qty}x ${name} ditambahkan ke keranjang.`);
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
        
        // Update total items badge
        const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
        cartBadge.innerText = totalItems;
        
        // Animasi badge
        cartBadge.classList.add('scale-150');
        setTimeout(() => cartBadge.classList.remove('scale-150'), 200);

        // Update list keranjang
        if(cart.length === 0) {
            emptyMsg.style.display = 'flex';
            const itemEls = container.querySelectorAll('.cart-item-row');
            itemEls.forEach(el => el.remove());
            totalEl.innerText = 'Rp0';
            return;
        }
        
        emptyMsg.style.display = 'none';
        
        // Render items
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
        
        // Menghapus elemen lama selain emptyMsg yg di hidden
        const oldItems = container.querySelectorAll('.cart-item-row');
        oldItems.forEach(el => el.remove());
        
        container.insertAdjacentHTML('beforeend', html);
        totalEl.innerText = 'Rp' + grandTotal.toLocaleString('id-ID');
    }

    function toggleCartModal() {
        const modal = document.getElementById('cartModal');
        if (modal.style.display === 'none') {
            modal.style.display = 'flex';
            // Trigger animation
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

    // --- Fungsi Toast ---
    const toast = document.getElementById('toast');
    let toastTimeout;
    
    function showToast(title = 'Berhasil!', msg = 'Tindakan selesai.') {
        document.getElementById('toast-title').innerText = title;
        document.getElementById('toast-msg').innerText = msg;
        
        toast.classList.remove('translate-y-32', 'opacity-0');
        toast.classList.add('translate-y-0', 'opacity-100');

        clearTimeout(toastTimeout);
        toastTimeout = setTimeout(() => {
            toast.classList.remove('translate-y-0', 'opacity-100');
            toast.classList.add('translate-y-32', 'opacity-0');
        }, 3000);
    }
</script>
@endpush
