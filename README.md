# Sistem Manajemen Tugas Kuliah (Task Management App)

Aplikasi web sederhana berbasis PHP tanpa database (menggunakan *Session*) untuk mengelola daftar tugas harian (*To-Do List*) bagi tim pengembang (*Senior & Junior Developer*) dengan menerapkan alur kerja **GitHub Flow**. Proyek ini dibuat untuk memenuhi tugas kuliah serta mendukung pengujian keamanan dasar menggunakan **Burp Suite**.

---

## 👥 Tim Pengembang (Roles)
- **Ketua / Project Lead:** Mengatur arsitektur sistem, memantau *Kanban Board*, dan mengelola *Pull Request*.
- **Senior Developer:** Bertanggung jawab pada inisialisasi repositori, struktur awal proyek, dan *code review*.
- **Junior Developer:** Mengembangkan fitur tambahan serta halaman antarmuka aplikasi.

---

## 🚀 Fitur Utama
1. **Manajemen Tugas Sederhana:** Menambah dan melihat daftar tugas harian tim secara interaktif menggunakan *Session* PHP (tanpa perlu konfigurasi database MySQL/XAMPP phpMyAdmin).
2. **Kolaborasi Git & GitHub:** Penerapan *branching strategy* (`main` dan *feature branch*) untuk menghindari konflik kode.
3. **Keamanan Dasar (Security Gate):** Kompatibel untuk pengujian kerentanan aplikasi (seperti *XSS* atau validasi input) menggunakan **Burp Suite** sebelum kode digabungkan (*merge*).

---

## 🛠️ Teknologi yang Digunakan
- **Bahasa Pemrograman:** PHP Native (Session-based)
- **Antarmuka:** HTML5, CSS3 (Styling sederhana & responsif)
- **Kontrol Versi:** Git & GitHub
- **Server Lokal:** XAMPP (Apache)

---

## 💻 Panduan Menjalankan Proyek (Installation Guide)

Karena aplikasi ini **tidak menggunakan database**, Anda bisa langsung menjalankannya dengan sangat mudah tanpa perlu import file SQL:

1. **Clone atau Pindahkan Repositori:**
   Pastikan folder proyek sudah berada di dalam direktori server lokal Anda (misalnya `htdocs` di XAMPP: `C:\xampp\htdocs\tugas-kuliah-proyek`).
2. **Nyalakan Server:**
   Buka aplikasi XAMPP Control Panel, lalu klik **Start** pada modul **Apache**.
3. **Buka di Browser:**
   Buka browser Anda (Chrome/Firefox/Edge), lalu ketik alamat berikut:
   ```text
   http://localhost/tugas-kuliah-proyek/
