<div
    x-data="pwaInstall()"
    x-show="visible"
    style="display:none"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="-translate-y-full opacity-0"
    x-transition:enter-end="translate-y-0 opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="translate-y-0 opacity-100"
    x-transition:leave-end="-translate-y-full opacity-0"
    class="relative z-30 w-full bg-gradient-to-r from-indigo-600 to-violet-600 text-white"
>
    <div class="max-w-7xl mx-auto px-3 sm:px-6 py-2.5 flex items-center gap-3">
        <div class="w-9 h-9 rounded-lg overflow-hidden shrink-0 bg-white/15 flex items-center justify-center">
            <img src="/icons/icon-192.png" class="w-full h-full object-cover" alt="{{ config('app.name', 'POS UMKM') }}">
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-sm font-semibold leading-tight truncate">{{ __('Pasang') }} {{ config('app.name', 'POS UMKM') }} {{ __('di perangkat ini') }}</p>
            <p class="text-xs text-indigo-100 leading-tight truncate" x-text="iosMode ? 'Ketuk tombol Bagikan lalu pilih \'Tambah ke Layar Utama\'' : 'Akses lebih cepat & tetap bisa dipakai saat offline'"></p>
        </div>
        <button x-show="!iosMode" @click="install()"
                class="shrink-0 bg-white text-indigo-700 text-sm font-semibold px-3 sm:px-4 py-2 rounded-lg hover:bg-indigo-50 active:scale-95 transition-transform touch-btn">
            {{ __('Instal') }}
        </button>
        <button @click="dismiss()" class="shrink-0 p-2 rounded-lg hover:bg-white/10 touch-btn" aria-label="{{ __('Tutup') }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
</div>

<script>
    function pwaInstall() {
        return {
            visible: false,
            iosMode: false,
            deferredPrompt: null,
            init() {
                const STORAGE_KEY = 'pwaInstallDismissedAt';
                const cooldownMs = 7 * 24 * 60 * 60 * 1000;
                const dismissedAt = parseInt(localStorage.getItem(STORAGE_KEY) || '0', 10);
                const dismissedRecently = dismissedAt && (Date.now() - dismissedAt) < cooldownMs;
                const isStandalone = window.matchMedia('(display-mode: standalone)').matches
                    || window.navigator.standalone === true;

                if (isStandalone || dismissedRecently) {
                    return;
                }

                window.addEventListener('beforeinstallprompt', (e) => {
                    e.preventDefault();
                    this.deferredPrompt = e;
                    this.visible = true;
                });

                window.addEventListener('appinstalled', () => {
                    this.visible = false;
                    localStorage.setItem(STORAGE_KEY, Date.now().toString());
                });

                const ua = window.navigator.userAgent.toLowerCase();
                const isIos = /iphone|ipad|ipod/.test(ua);
                const isSafari = /safari/.test(ua) && !/crios|fxios|edgios|android/.test(ua);
                if (isIos && isSafari) {
                    this.iosMode = true;
                    this.visible = true;
                }
            },
            async install() {
                if (!this.deferredPrompt) {
                    return;
                }
                this.deferredPrompt.prompt();
                const { outcome } = await this.deferredPrompt.userChoice;
                this.deferredPrompt = null;
                this.visible = false;
                if (outcome !== 'accepted') {
                    localStorage.setItem('pwaInstallDismissedAt', Date.now().toString());
                }
            },
            dismiss() {
                this.visible = false;
                localStorage.setItem('pwaInstallDismissedAt', Date.now().toString());
            }
        };
    }
</script>
