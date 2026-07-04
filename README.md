# POS UMKM - Aplikasi Kasir Gratis untuk Usaha Kecil

**POS UMKM** adalah aplikasi **Point of Sale** berbasis web (PWA) yang dibangun khusus untuk membantu pelaku Usaha Mikro, Kecil, dan Menengah (UMKM) di Indonesia dalam mengelola transaksi penjualan, stok produk, dan keuangan usaha secara digital.

> **100% GRATIS selamanya** - Tidak ada biaya langganan, tidak ada iklan, tidak ada batasan fitur. Selamanya gratis.

---

## 🎯 Tujuan Dibangun

Ribuan UMKM di Indonesia masih mencatat transaksi secara manual di buku atau menggunakan notes hp. Hal ini menyulitkan dalam:

- Melacak pendapatan harian/bulanan
- Mengetahui produk mana yang paling laris
- Menghitung keuntungan (profit) secara akurat
- Mengelola stok barang
- Mencatat hutang/piutang pelanggan

**POS UMKM** hadir untuk menjawab masalah tersebut dengan menyediakan sistem kasir digital yang **sederhana, touchscreen-friendly, dan bisa diakses dari HP, tablet, maupun komputer**.

---

## ✨ Fitur Unggulan

| Fitur | Deskripsi |
|-------|-----------|
| **🖥️ Multi-Device** | Tampilan optimal di HP, tablet, dan desktop dengan navigasi berbeda tiap device |
| **📱 PWA Ready** | Bisa diinstall ke home screen HP seperti aplikasi native |
| **👥 Multi-User** | Fitur Owner & Staff, cocok untuk usaha yang punya karyawan |
| **🧾 POS Kasir** | Antarmuka touchscreen dengan grid produk, keranjang, dan pembayaran |
| **📦 Manajemen Produk** | Tambah, edit, hapus produk dengan kategori, stok, harga jual/beli |
| **👤 Manajemen Pelanggan** | Database pelanggan untuk tracking pembelian |
| **📊 Laporan Penjualan** | Lihat omset, profit, produk terlaris, dan grafik harian |
| **🔄 Multi-Pembayaran** | Tunai, Transfer, QRIS |
| **🔐 Multi-Tenant** | Setiap usaha punya data sendiri-sendiri |
| **📄 Nota Digital** | Cetak struk transaksi setelah pembayaran |

---

## 🚀 Demo

| Akun | Email | Password | Role |
|------|-------|----------|------|
| Owner | `owner@demo.com` | `password` | Pemilik usaha (full akses) |
| Staff | `staff@demo.com` | `password` | Karyawan (kasir saja) |

---

## 🛠️ Tech Stack

| Teknologi | Kegunaan |
|-----------|----------|
| **Laravel 13** | Framework PHP Backend |
| **MySQL** | Database |
| **Tailwind CSS** | Styling & Responsive Design |
| **Alpine.js** | Interaktivitas Frontend |
| **Vite** | Build Tool |
| **Laravel Breeze** | Authentication Scaffolding |

---

## 💻 Panduan Instalasi

### Prasyarat
- PHP 8.3+
- Composer
- MySQL / MariaDB
- Node.js & NPM

### Langkah Instalasi

```bash
# Clone repositori
git clone https://github.com/zusfan/pos-umkm.git
cd pos-umkm

# Install dependencies PHP
composer install

# Install dependencies JavaScript
npm install

# Copy environment
cp .env.example .env

# Generate app key
php artisan key:generate

# Konfigurasi database di .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=pos_umkm
# DB_USERNAME=root
# DB_PASSWORD=

# Jalankan migrasi & seeder
php artisan migrate:fresh --seed

# Buat storage link
php artisan storage:link

# Build asset
npm run build

# Jalankan server
php artisan serve
```

Akses di browser: `http://127.0.0.1:8000`

---

## 📱 PWA (Progressive Web App)

Aplikasi ini sudah didukung PWA. Cukup buka di browser HP, lalu pilih **"Install App"** atau **"Add to Home Screen"**.

---

## 🤝 Ajak Developer Berkontribusi

**POS UMKM** dibangun dengan harapan bisa dikembangkan bersama oleh komunitas developer Indonesia. Kami sangat mengundang kontribusi dari:

- Developer Laravel / PHP
- Frontend Developer (Tailwind, Alpine.js, Vue)
- UI/UX Designer
- QA & Tester
- Pemilik UMKM yang punya masukan fitur

**Cara berkontribusi:**
1. Fork repositori ini
2. Buat branch fitur: `git checkout -b fitur-keren`
3. Commit perubahan: `git commit -m 'Menambahkan fitur keren'`
4. Push ke branch: `git push origin fitur-keren`
5. Buat Pull Request

---

## 👨‍💻 Developer

**Zusfan Mashuri**

| Kontak | Info |
|--------|------|
| 🌐 Website | [hallosemarang.com](https://hallosemarang.com) |
| 🖥️ Portofolio | [zusfan.hallosemarang.com](https://zusfan.hallosemarang.com) |
| 📧 Email | [zusfanmashuri@gmail.com](mailto:zusfanmashuri@gmail.com) |
| 💬 WhatsApp | [08998813000](https://wa.me/628998813000) |

---

## 📄 Lisensi

**MIT License** - Silakan gunakan, modifikasi, dan distribusikan secara bebas.

Dibangun dengan ❤️ untuk UMKM Indonesia.
