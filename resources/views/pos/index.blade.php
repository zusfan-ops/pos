<x-app-layout>
    <div class="flex flex-col lg:flex-row gap-3 lg:gap-4 h-full"
         x-data="posApp()"
         x-init="init()">
        {{-- Mobile cart toggle --}}
        <div class="fixed bottom-20 right-3 z-40 sm:bottom-6 sm:right-6 sm:z-50 lg:hidden">
            <button @click="cartOpen = !cartOpen"
                    class="bg-indigo-600 text-white rounded-full p-3 sm:p-4 shadow-xl touch-btn flex items-center gap-1 sm:gap-2 text-base sm:text-lg">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                </svg>
                <span x-text="cartCount" class="font-bold text-base sm:text-xl"></span>
            </button>
        </div>

        {{-- LEFT: Product Grid --}}
        <div class="flex-1 lg:w-7/12 xl:w-7/12 min-w-0"
             :class="{'hidden lg:block': cartOpen}">
            {{-- Category Filters --}}
            <div class="mb-3 overflow-x-auto hide-scrollbar -mx-2 px-2 sm:-mx-3 sm:px-3">
                <div class="flex gap-1.5 sm:gap-2 pb-2">
                    <button @click="selectedCategory = 'all'"
                            class="whitespace-nowrap px-3 sm:px-5 py-2 sm:py-3 rounded-full text-xs sm:text-sm font-semibold transition-all touch-btn"
                            :class="selectedCategory === 'all' ? 'bg-indigo-600 text-white shadow-lg' : 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-100'">
                        Semua
                    </button>
                    <template x-for="cat in categories" :key="cat.id">
                        <button @click="selectedCategory = cat.id"
                                class="whitespace-nowrap px-3 sm:px-5 py-2 sm:py-3 rounded-full text-xs sm:text-sm font-semibold transition-all touch-btn"
                                :class="selectedCategory === cat.id ? 'bg-indigo-600 text-white shadow-lg' : 'bg-white text-gray-700 border border-gray-300 hover:bg-gray-100'"
                                x-text="cat.name">
                        </button>
                    </template>
                </div>
            </div>

            {{-- Products Grid --}}
            <div class="grid grid-cols-3 sm:grid-cols-3 xl:grid-cols-4 gap-2 sm:gap-4">
                <template x-for="product in filteredProducts" :key="product.id">
                    <div @click="addToCart(product)"
                         class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden touch-card active:scale-95 transition-transform hover:shadow-md cursor-pointer select-none">
                        {{-- Product Image --}}
                        <div class="aspect-square bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center relative overflow-hidden">
                            <template x-if="product.image_url">
                                <img :src="product.image_url" :alt="product.name"
                                     class="w-full h-full object-cover"
                                     loading="lazy">
                            </template>
                            <template x-if="!product.image">
                                <span class="text-2xl sm:text-4xl font-bold text-indigo-400"
                                      x-text="product.name.charAt(0).toUpperCase()"></span>
                            </template>
                            {{-- Stock badge --}}
                            <div x-show="product.stock !== undefined && product.stock <= 5 && product.stock >= 0"
                                 class="absolute top-1 right-1 sm:top-2 sm:right-2 bg-red-500 text-white text-[10px] sm:text-xs font-bold px-1.5 py-0.5 sm:px-2 sm:py-1 rounded-full"
                                 x-text="'Sisa ' + product.stock"></div>
                        </div>
                        {{-- Product Info --}}
                        <div class="p-1.5 sm:p-3">
                            <h3 class="font-medium text-gray-900 text-[11px] sm:text-sm leading-tight line-clamp-2"
                                x-text="product.name"></h3>
                            <p class="text-indigo-600 font-bold text-xs sm:text-base mt-0.5 sm:mt-1"
                               x-text="formatRupiah(product.price)"></p>
                        </div>
                    </div>
                </template>
                {{-- Empty state --}}
                <div x-show="filteredProducts.length === 0"
                     class="col-span-full text-center py-10 sm:py-16 text-gray-400">
                    <svg class="w-12 h-12 sm:w-16 sm:h-16 mx-auto mb-3 sm:mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    <p class="text-base sm:text-lg font-medium">Tidak ada produk</p>
                    <p class="text-xs sm:text-sm">Pilih kategori lain</p>
                </div>
            </div>
        </div>

        {{-- RIGHT / MOBILE MODAL: Cart Panel --}}
        <div class="lg:w-5/12 xl:w-5/12"
             :class="{'fixed inset-0 z-50 flex': cartOpen && !$el.classList.contains('lg\\:w-5\\/12'),
                      'hidden': !cartOpen && !$el.classList.contains('lg\\:w-5\\/12'),
                      'lg:block': true}">
            {{-- Overlay for mobile --}}
            <div class="fixed inset-0 bg-black/40 lg:hidden"
                 x-show="cartOpen"
                 @click="cartOpen = false"
                 x-transition.opacity></div>

            {{-- Cart Panel Content --}}
            <div class="bg-white rounded-t-2xl lg:rounded-xl shadow-lg border border-gray-200 flex flex-col"
                 :class="{'fixed bottom-0 left-0 right-0 z-50 rounded-b-none max-h-[75vh]': cartOpen && window.innerWidth < 1024,
                          'lg:sticky lg:top-24 lg:max-h-[85vh]': window.innerWidth >= 1024}"
                 x-show="cartOpen || window.innerWidth >= 1024"
                 x-transition:enter="transform transition ease-out duration-300"
                 x-transition:enter-start="translate-y-full lg:translate-y-0"
                 x-transition:enter-end="translate-y-0">
                {{-- Cart Header --}}
                <div class="flex items-center justify-between px-4 py-3 sm:p-4 border-b border-gray-200">
                    <h2 class="text-base sm:text-lg font-bold text-gray-900 flex items-center gap-2">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                        </svg>
                        Pesanan
                        <span class="bg-indigo-600 text-white text-xs rounded-full px-2 py-0.5" x-text="cartItems.length"></span>
                    </h2>
                    <button @click="cartOpen = false" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 touch-btn">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                {{-- Cart Items --}}
                <div class="flex-1 overflow-y-auto px-4 py-3 sm:p-4 space-y-2 sm:space-y-3 min-h-0 max-h-[35vh] lg:max-h-[50vh]">
                    <template x-for="(item, index) in cartItems" :key="item.id">
                        <div class="flex items-center gap-2 sm:gap-3 bg-gray-50 rounded-xl p-2 sm:p-3 border border-gray-100">
                            {{-- Item thumb --}}
                            <div class="w-8 h-8 sm:w-12 sm:h-12 rounded-lg bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center flex-shrink-0 overflow-hidden">
                                <template x-if="item.image_url">
                                    <img :src="item.image_url" :alt="item.name" class="w-full h-full object-cover">
                                </template>
                                <template x-if="!item.image_url">
                                    <span class="text-xs sm:text-lg font-bold text-indigo-400" x-text="item.name.charAt(0).toUpperCase()"></span>
                                </template>
                            </div>
                            {{-- Item details --}}
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-900 text-xs sm:text-sm truncate" x-text="item.name"></p>
                                <p class="text-indigo-600 font-semibold text-[11px] sm:text-sm" x-text="formatRupiah(item.price)"></p>
                            </div>
                            {{-- Quantity controls --}}
                            <div class="flex items-center gap-0.5 sm:gap-1 flex-shrink-0">
                                <button @click="updateQuantity(item.id, item.quantity - 1)"
                                        class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg bg-white border border-gray-300 flex items-center justify-center text-gray-700 font-bold text-sm sm:text-lg hover:bg-gray-100 touch-btn"
                                        :disabled="item.quantity <= 1">
                                    <span class="leading-none">−</span>
                                </button>
                                <span class="w-6 sm:w-10 text-center font-bold text-gray-900 text-sm sm:text-base" x-text="item.quantity"></span>
                                <button @click="updateQuantity(item.id, item.quantity + 1)"
                                        class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg bg-indigo-600 text-white flex items-center justify-center font-bold text-sm sm:text-lg hover:bg-indigo-700 touch-btn"
                                        :disabled="item.stock !== undefined && item.quantity >= item.stock">
                                    <span class="leading-none">+</span>
                                </button>
                            </div>
                            {{-- Subtotal & Remove --}}
                            <div class="text-right flex-shrink-0 min-w-[55px] sm:min-w-[70px]">
                                <p class="font-bold text-gray-900 text-[11px] sm:text-sm" x-text="formatRupiah(item.price * item.quantity)"></p>
                                <button @click="removeFromCart(item.id)"
                                        class="text-red-500 text-[10px] sm:text-xs hover:text-red-700 mt-0.5 sm:mt-1 touch-btn inline-flex items-center gap-0.5 sm:gap-1">
                                    <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </template>
                    {{-- Empty cart --}}
                    <div x-show="cartItems.length === 0"
                         class="text-center py-8 sm:py-12 text-gray-400">
                        <svg class="w-12 h-12 sm:w-16 sm:h-16 mx-auto mb-2 sm:mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                        </svg>
                        <p class="text-sm sm:text-base font-medium">Pesanan masih kosong</p>
                        <p class="text-xs sm:text-sm mt-1">Tap produk untuk menambahkan</p>
                    </div>
                </div>

                {{-- Cart Footer - Checkout --}}
                <div class="border-t border-gray-200 px-4 py-3 sm:p-4 space-y-2 sm:space-y-3">
                    {{-- Customer --}}
                    <div>
                        <label class="block text-[10px] sm:text-xs font-medium text-gray-500 mb-1">Pelanggan</label>
                        <select x-model="selectedCustomer"
                                class="w-full rounded-lg border-gray-300 text-xs sm:text-sm focus:border-indigo-500 focus:ring-indigo-500 py-2 sm:py-3">
                            <option value="">Umum</option>
                            <template x-for="cust in customers" :key="cust.id">
                                <option :value="cust.id" x-text="cust.name"></option>
                            </template>
                        </select>
                    </div>

                    {{-- Payment Method --}}
                    <div>
                        <label class="block text-[10px] sm:text-xs font-medium text-gray-500 mb-1">Metode Pembayaran</label>
                        <div class="grid grid-cols-3 gap-1.5 sm:gap-2">
                            <button @click="paymentMethod = 'cash'"
                                    class="py-2 sm:py-3 px-1 sm:px-2 rounded-xl text-[10px] sm:text-sm font-semibold transition-all border-2 touch-btn flex flex-col items-center gap-0.5 sm:gap-1"
                                    :class="paymentMethod === 'cash' ? 'border-indigo-600 bg-indigo-50 text-indigo-700' : 'border-gray-200 bg-white text-gray-600 hover:bg-gray-50'">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Tunai
                            </button>
                            <button @click="paymentMethod = 'transfer'"
                                    class="py-2 sm:py-3 px-1 sm:px-2 rounded-xl text-[10px] sm:text-sm font-semibold transition-all border-2 touch-btn flex flex-col items-center gap-0.5 sm:gap-1"
                                    :class="paymentMethod === 'transfer' ? 'border-indigo-600 bg-indigo-50 text-indigo-700' : 'border-gray-200 bg-white text-gray-600 hover:bg-gray-50'">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Transfer
                            </button>
                            <button @click="paymentMethod = 'qris'"
                                    class="py-2 sm:py-3 px-1 sm:px-2 rounded-xl text-[10px] sm:text-sm font-semibold transition-all border-2 touch-btn flex flex-col items-center gap-0.5 sm:gap-1"
                                    :class="paymentMethod === 'qris' ? 'border-indigo-600 bg-indigo-50 text-indigo-700' : 'border-gray-200 bg-white text-gray-600 hover:bg-gray-50'">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                                </svg>
                                QRIS
                            </button>
                        </div>
                    </div>

                    {{-- Payment Amount --}}
                    <div x-show="paymentMethod === 'cash'">
                        <label class="block text-[10px] sm:text-xs font-medium text-gray-500 mb-1">Jumlah Dibayar</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 font-semibold text-sm sm:text-lg">Rp</span>
                            <input type="number" x-model="paymentAmount"
                                   class="w-full rounded-lg border-gray-300 pl-8 sm:pl-10 pr-3 sm:pr-4 py-2 sm:py-3 text-sm sm:text-lg font-bold text-gray-900 focus:border-indigo-500 focus:ring-indigo-500"
                                   placeholder="0">
                        </div>
                    </div>

                    {{-- Change Amount --}}
                    <div x-show="paymentMethod === 'cash' && change >= 0 && paymentAmount > 0"
                         class="bg-green-50 border border-green-200 rounded-xl px-3 sm:px-4 py-2 sm:py-3 text-center">
                        <span class="text-[10px] sm:text-sm text-green-600 font-medium">Kembalian</span>
                        <p class="text-lg sm:text-2xl font-bold text-green-700" x-text="formatRupiah(change)"></p>
                    </div>

                    {{-- Total & Pay --}}
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-[10px] sm:text-xs text-gray-500">Total</p>
                            <p class="text-lg sm:text-2xl font-bold text-gray-900" x-text="formatRupiah(total)"></p>
                        </div>
                        <button @click="checkout()"
                                class="bg-indigo-600 text-white px-5 sm:px-8 py-3 sm:py-4 rounded-xl font-bold text-sm sm:text-lg shadow-lg hover:bg-indigo-700 active:scale-95 transition-all touch-btn flex items-center gap-2"
                                :disabled="cartItems.length === 0 || processing">
                            <span x-show="!processing">Bayar</span>
                            <span x-show="processing" class="flex items-center gap-2">
                                <svg class="animate-spin w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                                </svg>
                                Proses...
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function posApp() {
            return {
                cartOpen: false,
                selectedCategory: 'all',
                selectedCustomer: '',
                paymentMethod: 'cash',
                paymentAmount: '',
                processing: false,
                categories: @json($categories ?? []),
                products: @json($products ?? []),
                customers: @json($customers ?? []),
                cartItems: @json($cart ?? []),

                get filteredProducts() {
                    if (this.selectedCategory === 'all') return this.products;
                    return this.products.filter(p => p.category_id == this.selectedCategory);
                },

                get total() {
                    return this.cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                },

                get change() {
                    const paid = parseInt(this.paymentAmount) || 0;
                    return paid - this.total;
                },

                get cartCount() {
                    return this.cartItems.reduce((sum, item) => sum + item.quantity, 0);
                },

                init() {
                    if (this.cartItems.length > 0 && window.innerWidth >= 1024) {
                        this.cartOpen = true;
                    }
                },

                async addToCart(product) {
                    try {
                        const response = await fetch('{{ route("pos.add-to-cart") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({ product_id: product.id, quantity: 1 })
                        });
                        const data = await response.json();
                        if (data.success) {
                            this.cartItems = data.cart;
                            if (window.innerWidth < 1024) {
                                this.cartOpen = true;
                            }
                        }
                    } catch (e) {
                        console.error('Add to cart failed', e);
                    }
                },

                async updateQuantity(productId, quantity) {
                    if (quantity < 1) return;
                    try {
                        const response = await fetch('{{ route("pos.update-cart") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({ product_id: productId, quantity: quantity })
                        });
                        const data = await response.json();
                        if (data.success) {
                            this.cartItems = data.cart;
                        }
                    } catch (e) {
                        console.error('Update cart failed', e);
                    }
                },

                async removeFromCart(productId) {
                    try {
                        const response = await fetch('{{ route("pos.remove-from-cart", ["productId" => "__productId__"]) }}'.replace('__productId__', productId), {
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json'
                            }
                        });
                        const data = await response.json();
                        if (data.success) {
                            this.cartItems = data.cart;
                        }
                    } catch (e) {
                        console.error('Remove from cart failed', e);
                    }
                },

                async checkout() {
                    if (this.cartItems.length === 0) return;
                    this.processing = true;
                    try {
                        const response = await fetch('{{ route("pos.checkout") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                payment_method: this.paymentMethod,
                                payment_amount: this.paymentMethod === 'cash' ? parseInt(this.paymentAmount) || 0 : this.total,
                                customer_id: this.selectedCustomer
                            })
                        });
                        const data = await response.json();
                        if (data.success) {
                            this.cartItems = [];
                            this.paymentAmount = '';
                            if (data.redirect) {
                                window.location.href = data.redirect;
                            }
                        } else {
                            alert(data.message || 'Pembayaran gagal');
                        }
                    } catch (e) {
                        console.error('Checkout failed', e);
                        alert('Terjadi kesalahan');
                    } finally {
                        this.processing = false;
                    }
                },

                formatRupiah(value) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0
                    }).format(value || 0);
                }
            };
        }
    </script>
    @endpush
</x-app-layout>
