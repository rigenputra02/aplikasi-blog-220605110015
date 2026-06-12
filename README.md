# Aplikasi Blog Laravel

## Deskripsi Aplikasi

Aplikasi Blog Laravel adalah website blog sederhana yang dibangun menggunakan Laravel dan Bootstrap 5. Aplikasi ini memiliki fitur manajemen artikel, kategori, penulis, autentikasi login, halaman publik, filter artikel berdasarkan kategori, artikel terkait, dan tampilan responsif yang dapat diakses melalui berbagai perangkat.

Blog Kami merupakan media informasi yang membahas berbagai topik seputar teknologi, pemrograman, dan pengembangan perangkat lunak. Melalui artikel yang informatif dan mudah dipahami, aplikasi ini berupaya menyajikan wawasan terbaru, tutorial praktis, serta berbagai tips yang dapat membantu pembaca dalam memahami dan mengikuti perkembangan dunia teknologi.

Aplikasi ini dibangun menggunakan Framework Laravel dengan menerapkan konsep MVC (Model-View-Controller), Eloquent ORM, Blade Template Engine, dan Middleware Authentication sehingga menghasilkan struktur aplikasi yang terorganisir, aman, dan mudah dikembangkan.

---

## Fitur Utama

### Area Publik

- Halaman Beranda
- Detail Artikel
- Artikel Berdasarkan Kategori
- Artikel Terkait
- Halaman Tentang Kami
- Widget Kategori Artikel
- Pagination Artikel
- Responsive Layout

### Area Admin

- Login dan Logout
- Dashboard
- CRUD Artikel
- CRUD Kategori Artikel
- CRUD Penulis
- Upload Gambar Artikel
- Manajemen Konten Blog

---

## Route dan Akses Halaman Publik

Pada tahap pengembangan ini, aplikasi blog dibagi menjadi dua area utama, yaitu area Admin yang dilindungi autentikasi dan area Publik yang dapat diakses oleh seluruh pengunjung tanpa harus melakukan login.

### Route Admin (Protected Route)

Semua fitur manajemen data ditempatkan di dalam grup middleware `auth` sehingga hanya pengguna yang telah berhasil login yang dapat mengaksesnya.

Fitur yang dilindungi meliputi:

- Dashboard Admin
- Manajemen Artikel
- Manajemen Penulis
- Manajemen Kategori
- Logout

```php
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('artikel', ArtikelController::class)
        ->except(['show']);

    Route::resource('penulis', PenulisController::class)
        ->except(['show']);

    Route::resource('kategori', KategoriArtikelController::class)
        ->except(['show']);
});
```

### Route Publik (Public Route)

Salah satu pengembangan utama pada project ini adalah penambahan halaman publik sehingga website dapat berfungsi sebagai media blog yang dapat dibaca oleh siapa saja tanpa perlu login.

#### Halaman Beranda

Menampilkan seluruh artikel yang telah dipublikasikan.

```php
Route::get('/', [LandingController::class, 'index'])
    ->name('beranda');
```

#### Halaman Tentang Kami

Menampilkan informasi mengenai website dan tujuan pengembangan blog.

```php
Route::get('/tentang-kami', [LandingController::class, 'tentangKami'])
    ->name('tentang.kami');
```

#### Artikel Berdasarkan Kategori

Memungkinkan pengunjung memfilter artikel berdasarkan kategori yang dipilih melalui widget kategori.

```php
Route::get('/kategori/{id}',
    [LandingController::class, 'kategori'])
    ->name('kategori.show');
```

#### Detail Artikel

Menampilkan isi artikel secara lengkap beserta artikel terkait yang berasal dari kategori yang sama.

```php
Route::get('/artikel/{id}',
    [LandingController::class, 'show'])
    ->name('blog.artikel');
```

### Manfaat Penambahan Route Publik

Dengan adanya route publik, aplikasi tidak lagi hanya berfungsi sebagai sistem administrasi artikel, tetapi juga sebagai website blog yang dapat digunakan oleh pengunjung untuk:

- Membaca artikel tanpa login
- Melihat artikel berdasarkan kategori
- Mengakses halaman detail artikel
- Menjelajahi artikel terkait
- Mengenal informasi website melalui halaman Tentang Kami

Implementasi ini menerapkan pemisahan yang jelas antara area administrasi dan area publik sehingga keamanan data tetap terjaga sekaligus memberikan pengalaman membaca yang nyaman bagi pengunjung.

---

## Sistem Autentikasi

Untuk menjaga keamanan data administrasi, aplikasi menggunakan sistem autentikasi Laravel yang membatasi akses ke halaman dashboard dan fitur manajemen data hanya untuk pengguna yang telah login.

### Fitur Login

- Verifikasi username dan password menggunakan Laravel Authentication.
- Regenerasi session setelah login berhasil.
- Menyimpan waktu login ke session.
- Redirect otomatis ke dashboard.

### Fitur Logout

- Menghapus status autentikasi pengguna.
- Menghapus seluruh session aktif.
- Regenerasi CSRF Token.
- Redirect kembali ke halaman login.

### Keamanan yang Diterapkan

- Middleware `auth`
- Middleware `guest`
- Session Regeneration
- Session Invalidation
- CSRF Protection

---

## Teknologi yang Digunakan

- Laravel
- PHP
- MySQL
- Bootstrap 5
- Blade Template Engine
- Eloquent ORM
- Laravel Authentication

---

## Cara Menjalankan Project di Lokal

### 1. Clone Repository

```bash
git clone https://github.com/username/aplikasi-blog.git
```

Masuk ke direktori project:

```bash
cd aplikasi-blog
```

### 2. Install Dependency

```bash
composer install
```

### 3. Buat File Environment

Linux / MacOS:

```bash
cp .env.example .env
```

Windows:

```bash
copy .env.example .env
```

### 4. Konfigurasi Database

Sesuaikan konfigurasi database pada file `.env`.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_blog
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Jalankan Migrasi Database

Jika menggunakan migration:

```bash
php artisan migrate
```

Jika tersedia seeder:

```bash
php artisan db:seed
```

### 7. Membuat Symbolic Link Storage

Agar gambar artikel dapat ditampilkan:

```bash
php artisan storage:link
```

### 8. Jalankan Server Laravel

```bash
php artisan serve
```

Aplikasi dapat diakses melalui:

```text
http://127.0.0.1:8000
```

---

## Struktur Fitur

```text
Aplikasi Blog Laravel
│
├── Login & Logout
├── Dashboard
├── CRUD Artikel
├── CRUD Kategori
├── CRUD Penulis
├── Upload Gambar Artikel
├── Halaman Publik
├── Filter Artikel Berdasarkan Kategori
├── Artikel Terkait
├── Widget Kategori Artikel
├── Pagination
├── Halaman Tentang Kami
└── Responsive Design
```

---

## Lisensi

Project ini dibuat untuk tujuan pembelajaran, pengembangan portofolio, dan implementasi Framework Laravel dalam membangun aplikasi web berbasis blog.
