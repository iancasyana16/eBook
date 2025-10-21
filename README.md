# 📚 E-Book Platform dengan PDF Viewer Aman
Platform manajemen e-book dengan sistem Login/Register, Dashboard, dan PDF Viewer aman yang mencegah download, copy, serta memberikan fitur tab lock dengan warning popup.
### ✨ Fitur
- 🔐 **Authentication** Sistem Login/Register menggunakan Session Laravel.
- 📊 **Dashboard Panel** Tabel eBook dengan fitur edit dan hapus.
- 👁️ **PDF Viewer** Modal viewer di tab yang sama (tanpa membuka tab baru).
- 🔒 **Keamanan** Anti-download, anti-copy, dan tab lock.
- 🛡️ **Proteksi** Memblokir F12, Ctrl+S/P, klik kanan, dan print.
- 💧 **Watermark** Overlay email user pada PDF sebagai watermark.
- ⚠️ **Tab Warning** Popup peringatan saat pengguna pindah tab.
  
### 🛠 Tech Stack   
| Frontend        | Backend       | Database            | Lainnya       |
|-----------------|---------------|---------------------|---------------|
| Blade Components| Laravel 12+   | MySQL               | PDF.js 3.11   |
| Tailwind CSS    | PHP 8.2+      |                     |               |

  
### 🚀 Persiapan & Instalasi
### Prasyarat
- PHP >= 8.2
- Composer & npm
- Database: MySQL
- Web Server: XAMPP / Laragon

### Langkah Instalasi
1. **Clone Repository**
   ```
   git clone https://github.com/iancasyana16/eBook.git
   cd ebook
   ```
2. **Install Dependencies PHP**
   ```
   composer install
   ```
7. **Install Dependencies Frontend** 
   ```
   npm install
   ```
9. **Konfigurasi Environment**
    - Salin file `.env.example` menjadi `.env`
    - Sesuaikan konfigurasi database dan setting lain di file `.env
    ```
    cp .env.example .env
    ```
11. **Generate Application Key**
    ```
    php artisan key:generate
    ```
13. **Migrasi Database**
    ```
    php artisan migrate --seed
    ```
15. **storage link**
    ```
    php artisan storage:link
    ```
17. **Build Assets Frontend**
    ```
    npm run build
    ```
19. **Jalankan Server**
    ```
    php artisan serve
    ```

### ⚙️ Penggunaan
- Akses aplikasi di `http://localhost:8000`
- login sebagai admin dengan email : admin@example.com | password : password
- Upload dan kelola eBook di Dashboard
- Registrasi akun baru kemudian login dengan akun yang sudah ada
- Buka eBook dengan PDF Viewer aman yang sudah disediakan
