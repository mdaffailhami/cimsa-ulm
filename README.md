<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Dokumentasi Instalasi CMS Cimsa ULM

Dokumentasi ini akan memandu Anda melalui proses instalasi project CMS Cimsa ULM pada host ataupun server.

## Persyaratan Sistem

Sebelum memulai instalasi, pastikan sistem Anda memiliki beberapa dependecies berikut:

* **PHP version >= 8.2** 
* **Node version >= 20**
* **Node Package Manager (NPM)**
* **Mysql / MariaDB**
* **Git**

## Langkah-Langkah Instalasi

Ikuti langkah-langkah berikut untuk menginstal proyek CMS Cimsa ULM:

1. **Unduh Project :**
   * Silahkan download project menjalankan
```
git clone https://github.com/mdaffailhami/cimsa-ulm.git
```

2. **Instal Dependensi:**
   1. Setelah download selesai, lakukan instalasi dependesi php yang diperlukan menggunakan perintah
   ```
   composer install
   ```
   2. Setelah itu lakukan instalasi dependesi node js yang diperlukan menggunakan perintah
   ```
   npm install
   ```

3. **Konfigurasi Proyek**
   1. setelah semua dependesi selesai di install, copy file `.env.example` menjadi `.env`
   2. Sesuaikan variable `APP_MODE` menjadi `prod` jika dalam tahap production dan `dev` jika dalam tahap development
   3. Sesuaikan variable url seperti `APP_URL` dengan ip ataupun domain project yang dijalankan sebagai berikut
   ```
      APP_URL=https://cimsa.ulm.ac.id
      ASSET_URL="${APP_URL}"
      FRONTEND_URL ="${APP_URL}"
      BACKEND_URL ="${APP_URL}"
   ```
   4. Sesuaikan variable database seperti `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` dengan database yang sudah disediakan
   ```
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=cimsa_ulm
    DB_USERNAME=root
    DB_PASSWORD=
   ```
   5. Sebelum melakukan migrasi database diharapkan untuk memberikan izin akses pada folder storage dengan melakukan perintah `chmod -R 755 storage` jika os anda berbasis linux
   6. Lakukan perintah `php artisan migrate` untuk melakukan migrasi database
   7. Lakukan perintah `php artisan db:seed` untuk melakukan seed data dummy ke database
   8. Jalankan perintah `php artisan key:generate` untuk generate key laravel
   9. Jalankan perintah `php artisan storage:link` untuk menghubungkan folder storage dengan folder publik
   10. Jalankan perintah `npm run build`
   10. Jika kamu menggunakan server lokal jalankan project menggunakan perintah `php artisan serve` namun jika kamu menggunakan domain pribadi, kamu dapat menyesuaikan Konfigurasi site pada web server yang kalian gunakan

## Kontak

Jika Anda memiliki pertanyaan atau umpan balik, silahkan hubungi kami di **mdaffailhami@gmail.com**.

---

Terima kasih telah menggunakan jasa saya!