# POS UMKM

**Aplikasi kasir digital gratis untuk Usaha Mikro, Kecil, dan Menengah (UMKM) di Indonesia.**

POS UMKM adalah sistem *Point of Sale* berbasis web (PWA) yang membantu pelaku usaha mengelola transaksi penjualan, stok produk, dan keuangan secara digital — sederhana, cepat, dan bisa diakses dari HP, tablet, maupun komputer.

[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
[![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3%2B-777BB4?logo=php&logoColor=white)](https://www.php.net)

---

## Daftar Isi

- [Latar Belakang](#latar-belakang)
- [Fitur](#fitur)
- [Tech Stack](#tech-stack)
- [Instalasi](#instalasi)
- [Akun Demo](#akun-demo)
- [PWA](#pwa-progressive-web-app)
- [Kontribusi](#kontribusi)
- [Lisensi](#lisensi)
- [Kontak](#kontak)

---

## Latar Belakang

Banyak UMKM di Indonesia masih mencatat transaksi secara manual di buku atau catatan HP, sehingga sulit untuk:

- Melacak pendapatan harian maupun bulanan
- Mengetahui produk yang paling laris
- Menghitung keuntungan (profit) secara akurat
- Mengelola stok barang
- Mencatat hutang/piutang pelanggan

POS UMKM hadir sebagai solusi kasir digital yang **gratis selamanya** — tanpa biaya langganan, tanpa iklan, dan tanpa batasan fitur.

## Fitur

| Fitur | Deskripsi |
|---|---|
| **Multi-Device** | Tampilan responsif dengan navigasi yang disesuaikan untuk HP, tablet, dan desktop |
| **PWA Ready** | Dapat diinstal ke home screen HP layaknya aplikasi native |
| **Multi-User** | Peran Owner & Staff, cocok untuk usaha dengan karyawan |
| **Kasir (POS)** | Antarmuka touchscreen dengan grid produk, keranjang, dan pembayaran |
| **Manajemen Produk** | Tambah, edit, hapus produk lengkap dengan kategori, stok, dan harga jual/beli |
| **Manajemen Pelanggan** | Database pelanggan untuk pelacakan riwayat pembelian |
| **Laporan Penjualan** | Omset, profit, produk terlaris, dan grafik penjualan harian |
| **Multi-Pembayaran** | Mendukung Tunai, Transfer, dan QRIS |
| **Multi-Tenant** | Setiap usaha memiliki data yang terisolasi |
| **Nota Digital** | Cetak struk transaksi secara otomatis setelah pembayaran |

## Tech Stack

| Teknologi | Kegunaan |
|---|---|
| [Laravel 13](https://laravel.com) | Framework backend (PHP) |
| MySQL | Database |
| [Tailwind CSS](https://tailwindcss.com) | Styling & responsive design |
| [Alpine.js](https://alpinejs.dev) | Interaktivitas frontend |
| [Vite](https://vitejs.dev) | Build tool |
| [Laravel Breeze](https://laravel.com/docs/starter-kits) | Scaffolding autentikasi |

## Instalasi

### Prasyarat

- PHP 8.3+
- Composer
- MySQL / MariaDB
- Node.js & NPM

### Langkah

```bash
# Clone repositori
git clone https://github.com/zusfan-ops/pos.git
cd pos

# Install dependencies
composer install
npm install

# Konfigurasi environment
cp .env.example .env
php artisan key:generate
```

Atur koneksi database pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pos_umkm
DB_USERNAME=root
DB_PASSWORD=
```

```bash
# Migrasi database & seeder
php artisan migrate:fresh --seed

# Buat storage link
php artisan storage:link

# Build asset frontend
npm run build

# Jalankan server
php artisan serve
```

Buka aplikasi di `http://127.0.0.1:8000`.

## Akun Demo

| Role | Email | Password | Akses |
|---|---|---|---|
| Owner | `owner@demo.com` | `password` | Pemilik usaha (akses penuh) |
| Staff | `staff@demo.com` | `password` | Karyawan (kasir saja) |

## PWA (Progressive Web App)

Aplikasi ini mendukung PWA. Buka melalui browser HP, lalu pilih **"Install App"** atau **"Add to Home Screen"** untuk menggunakannya seperti aplikasi native.

## Kontribusi

POS UMKM dikembangkan secara terbuka dan terbuka untuk kontribusi dari komunitas, khususnya:

- Developer Laravel / PHP
- Frontend Developer (Tailwind CSS, Alpine.js, Vue)
- UI/UX Designer
- QA & Tester
- Pemilik UMKM dengan masukan fitur

Langkah kontribusi:

1. Fork repositori ini
2. Buat branch fitur: `git checkout -b fitur-keren`
3. Commit perubahan: `git commit -m 'Menambahkan fitur keren'`
4. Push ke branch: `git push origin fitur-keren`
5. Buat Pull Request

## Lisensi

Didistribusikan di bawah [MIT License](https://opensource.org/licenses/MIT). Bebas digunakan, dimodifikasi, dan didistribusikan.

## Kontak

**Zusfan Mashuri**

| | |
|---|---|
| Website | [hallosemarang.com](https://hallosemarang.com) |
| Portofolio | [zusfan.hallosemarang.com](https://zusfan.hallosemarang.com) |
| Email | [zusfan.mashuri@gmail.com](mailto:zusfan.mashuri@gmail.com) |
| WhatsApp | [Tanya soal source code ini](https://wa.me/628998813000?text=Halo%2C%20saya%20ingin%20bertanya%20informasi%20terkait%20source%20code%20POS%20UMKM%20ini.) |

---

Dibangun untuk UMKM Indonesia.
