# 🌊 SAGARA LAMPUNG  
**Sistem Informasi Interaktif Pantai Digital Lampung**

Responsi PGWEBL — *Shafa Salsabila (23/519778/SV/23177)*

---

## 📖 Deskripsi Proyek

Sagara Lampung adalah media informasi interaktif yang menampilkan lokasi-lokasi pantai di Lampung secara digital. Website ini dibuat sebagai platform untuk mempermudah masyarakat dan wisatawan dalam mengenali, mengakses, serta memahami potensi wisata bahari di wilayah Lampung. 

Dengan penyajian data berbasis spasial, pengguna dapat melihat titik-titik pantai secara langsung melalui peta interaktif, memudahkan perencanaan perjalanan wisata.

---

## ✨ Keunggulan

- 🧭 **Dashboard Interaktif**: Peta dan interface pengguna yang menarik dan mudah digunakan.
- 📍 **Rekomendasi Lokasi**: Langsung diarahkan ke Google Maps untuk navigasi.
- 📖 **Informasi Lengkap**: Deskripsi tiap titik pantai secara ringkas dan jelas.
- 🔗 **Integrasi Maps**: Fitur "Rute ke Lokasi" dari lokasi pengguna ke pantai tujuan.

---

## 🚀 Fitur Utama

### 1. Peta Interaktif
- Menampilkan titik lokasi wisata pantai di Provinsi Lampung
- Fitur **"Rute ke Lokasi"** untuk membuat rute dari posisi pengguna
- Navigasi halaman (Home, Maps, Table, Data)
- Dilengkapi dengan **toolbar drawing** (marker, polyline, polygon)

### 2. Tabel Data
- Menampilkan data pantai: nama, lokasi, karakteristik, gambar, tanggal dibuat
- CRUD data pantai langsung dari tampilan web

### 3. Sistem Informasi Komprehensif
- Informasi detail tentang tiap pantai
- Tampilan responsif dan mudah digunakan
- Berbasis data spasial (GeoJSON, WKT)

---

## 🛠️ Teknologi yang Digunakan

| Kategori     | Teknologi               |
| ------------ | ---------------------- |
| Frontend     | HTML, CSS, JavaScript  |
| Framework    | Laravel Blade + Bootstrap 5 |
| Mapping      | Leaflet.js, Leaflet Routing Machine |
| Geospasial   | GeoJSON, PostGIS, Terraformer WKT |
| Database     | PostgreSQL             |
| Lainnya      | jQuery, AJAX, FontAwesome |

---

## 📦 Instalasi

```bash
# Clone repository
git clone https://github.com/syneticgweny/pgwebl.git
cd sagara-lampung

# Install dependencies
composer install
npm install && npm run dev

# Salin konfigurasi environment
cp .env.example .env
php artisan key:generate

# Konfigurasi database di .env, lalu migrasi
php artisan migrate --seed

# Jalankan server
php artisan serve
