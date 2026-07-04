<div align="center">

# 🧾 POS UMKM

### Aplikasi Kasir Digital Gratis untuk Usaha Mikro, Kecil, dan Menengah

*Kelola transaksi, stok, dan keuangan usahamu — langsung dari HP, tablet, atau komputer.*

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg?style=for-the-badge)](https://opensource.org/licenses/MIT)
[![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38BDF8?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Alpine.js](https://img.shields.io/badge/Alpine.js-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=white)](https://alpinejs.dev)

[![PWA Ready](https://img.shields.io/badge/PWA-Ready-5A0FC8?style=flat-square&logo=pwa&logoColor=white)](#-pwa-progressive-web-app)
[![100% Free](https://img.shields.io/badge/100%25-Gratis_Selamanya-brightgreen?style=flat-square)](#)
[![PRs Welcome](https://img.shields.io/badge/PRs-Welcome-ff69b4?style=flat-square)](#-kontribusi)
[![Made with Love](https://img.shields.io/badge/Made%20with-%E2%9D%A4-red?style=flat-square)](#)

</div>

---

## 📑 Daftar Isi

- [🎯 Latar Belakang](#-latar-belakang)
- [✨ Fitur](#-fitur)
- [🛠️ Tech Stack](#️-tech-stack)
- [🚀 Instalasi](#-instalasi)
- [🔑 Akun Demo](#-akun-demo)
- [📱 PWA](#-pwa-progressive-web-app)
- [🤝 Kontribusi](#-kontribusi)
- [📄 Lisensi](#-lisensi)
- [📬 Kontak](#-kontak)

---

## 🎯 Latar Belakang

Banyak UMKM di Indonesia masih mencatat transaksi secara manual di buku atau catatan HP, sehingga sulit untuk:

- 📉 Melacak pendapatan harian maupun bulanan
- 🏆 Mengetahui produk yang paling laris
- 💰 Menghitung keuntungan (profit) secara akurat
- 📦 Mengelola stok barang
- 📒 Mencatat hutang/piutang pelanggan

> 💡 **POS UMKM** hadir sebagai solusi kasir digital yang **gratis selamanya** — tanpa biaya langganan, tanpa iklan, dan tanpa batasan fitur.

---

## ✨ Fitur

<div align="center">

| | | |
|:---:|:---:|:---:|
| 🖥️ **Multi-Device**<br>Navigasi optimal di HP, tablet & desktop | 📱 **PWA Ready**<br>Instal ke home screen seperti app native | 👥 **Multi-User**<br>Peran Owner & Staff |
| 🧾 **Kasir Touchscreen**<br>Grid produk, keranjang & pembayaran | 📦 **Manajemen Produk**<br>Kategori, stok, harga jual/beli | 👤 **Manajemen Pelanggan**<br>Riwayat pembelian tercatat |
| 📊 **Laporan Penjualan**<br>Omset, profit & produk terlaris | 💳 **Multi-Pembayaran**<br>Tunai, Transfer, QRIS | 🔐 **Multi-Tenant**<br>Data usaha terisolasi aman |

</div>

---

## 🛠️ Tech Stack

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel_13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP_8.3+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-8BC0D0?style=for-the-badge&logo=alpinedotjs&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white)

</div>

| Teknologi | Kegunaan |
|---|---|
| [Laravel 13](https://laravel.com) | Framework backend (PHP) |
| MySQL | Database |
| [Tailwind CSS](https://tailwindcss.com) | Styling & responsive design |
| [Alpine.js](https://alpinejs.dev) | Interaktivitas frontend |
| [Vite](https://vitejs.dev) | Build tool |
| [Laravel Breeze](https://laravel.com/docs/starter-kits) | Scaffolding autentikasi |

---

## 🚀 Instalasi

### Prasyarat

![PHP](https://img.shields.io/badge/PHP-8.3+-777BB4?style=flat-square&logo=php&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-885630?style=flat-square&logo=composer&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-MariaDB-4479A1?style=flat-square&logo=mysql&logoColor=white)
![Node.js](https://img.shields.io/badge/Node.js-NPM-339933?style=flat-square&logo=node.js&logoColor=white)

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

> ✅ Buka aplikasi di `http://127.0.0.1:8000`

---

## 🔑 Akun Demo

| Role | Email | Password | Akses |
|:---:|---|:---:|---|
| 👑 Owner | `owner@demo.com` | `password` | Pemilik usaha (akses penuh) |
| 🧑‍💼 Staff | `staff@demo.com` | `password` | Karyawan (kasir saja) |

---

## 📱 PWA (Progressive Web App)

Aplikasi ini mendukung **PWA**. Buka melalui browser HP, lalu pilih **"Install App"** atau **"Add to Home Screen"** untuk menggunakannya seperti aplikasi native. 🚀

---

## 🤝 Kontribusi

POS UMKM dikembangkan secara terbuka dan mengundang kontribusi dari komunitas, khususnya:

🧑‍💻 Developer Laravel/PHP · 🎨 Frontend Developer (Tailwind, Alpine.js, Vue) · 🖌️ UI/UX Designer · 🧪 QA & Tester · 🏪 Pemilik UMKM dengan masukan fitur

**Cara berkontribusi:**

1. 🍴 Fork repositori ini
2. 🌿 Buat branch fitur: `git checkout -b fitur-keren`
3. 💾 Commit perubahan: `git commit -m 'Menambahkan fitur keren'`
4. 📤 Push ke branch: `git push origin fitur-keren`
5. 🔀 Buat Pull Request

---

## 📄 Lisensi

Didistribusikan di bawah [![License: MIT](https://img.shields.io/badge/MIT-yellow.svg?style=flat-square)](https://opensource.org/licenses/MIT) — bebas digunakan, dimodifikasi, dan didistribusikan.

---

## 📬 Kontak

<div align="center">

### Zusfan Mashuri

[![Website](https://img.shields.io/badge/Website-hallosemarang.com-0EA5E9?style=for-the-badge&logo=googlechrome&logoColor=white)](https://hallosemarang.com)
[![Portofolio](https://img.shields.io/badge/Portofolio-zusfan.hallosemarang.com-8B5CF6?style=for-the-badge&logo=aboutdotme&logoColor=white)](https://zusfan.hallosemarang.com)
[![Email](https://img.shields.io/badge/Email-zusfan.mashuri%40gmail.com-EA4335?style=for-the-badge&logo=gmail&logoColor=white)](mailto:zusfan.mashuri@gmail.com)
[![WhatsApp](https://img.shields.io/badge/WhatsApp-Tanya%20Source%20Code-25D366?style=for-the-badge&logo=whatsapp&logoColor=white)](https://wa.me/628998813000?text=Halo%2C%20saya%20ingin%20bertanya%20informasi%20terkait%20source%20code%20POS%20UMKM%20ini.)

**⭐ Jangan lupa beri Star jika proyek ini bermanfaat! ⭐**

*Dibangun dengan ❤️ untuk UMKM Indonesia*

</div>
