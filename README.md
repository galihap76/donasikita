## ❤️ DonasiKita

DonasiKita adalah platform donasi digital yang memudahkan siapa saja untuk berbagi kebaikan.
Melalui sistem yang transparan dan aman, DonasiKita menghubungkan para donatur dengan
berbagai kampanye sosial, kemanusiaan, dan kebutuhan masyarakat yang membutuhkan bantuan.

DonasiKita menggunakan layanan payment gateway <a href="https://mayar.id/">Mayar</a> untuk memproses pembayaran donasi secara aman dan terpercaya.
Pada DonasiKita teknologi yang dipakai menggunakan Laravel 12, MySQL, dan Boostrap.

## 📱 Fitur Sistem DonasiKita

**Admin**

1. Memantau statistik dan aktivitas melalui dashboard

2. Mengelola kampanye donasi (CRUD)

3. Melihat daftar donasi dari pengguna

4. Melihat pesan dari fitur Kontak Kami pada halaman landing page

5. Mengubah nama profil dan kata sandi akun

**User**

1. Memantau aktivitas melalui dashboard

2. Melihat daftar kampanye donasi yang tersedia

3. Melakukan donasi pada kampanye yang dipilih

4. Melihat riwayat donasi yang telah dilakukan

5. Mengubah nama profil dan kata sandi akun

## ⚙️ Install

1. Lakukan git clone :

```
git clone https://github.com/galihap76/donasikita.git
```

2. Masuk ke projek :

```
cd donasikita
```

3. Install package :

```
composer install
```

4. Copy file .env.example :

```
(Windows)

copy .env.example .env

(Linux / MacOS)

cp .env.example .env
```

5. Generate key :

```
php artisan key:generate
```

6. Konfigurasi :

```
# Sesuaikan konfigurasi database

DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

# Sesuaikan konfigurasi Mayar

MAYAR_BASE_URL=
MAYAR_API_KEY=
```

7. Jalankan migrasi :

```
php artisan migrate
```

8. Jalankan storage link :

```
php artisan storage:link
```

9. Jalankan seeder database :

```
php artisan db:seed
```

10. Jalankan Laravel :

```
php artisan serve
```

11. Selesai!

## 🌐 Demo Live Web

Untuk demo, silahkan kunjung pada link : <a href="https://donasikita.web.id">https://donasikita.web.id</a>

## Penutup

Semoga website ini dapat menjadi inspirasi dalam pengembangan platform donasi digital yang bermanfaat dan memberikan dampak positif bagi masyarakat.

<hr/>

**<p align="center">Made With ❤️ By Galih Anggoro Prasetya</p>**
