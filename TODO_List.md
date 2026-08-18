# Daftar Tugas (TODO List) - Portal Desa Cigalontang

Daftar tugas ini merangkum sisa pekerjaan teknis yang perlu diselesaikan sebelum dan saat peluncuran (*deployment*) website, serta fitur-fitur operasional yang belum terwujud di versi saat ini.

## Persiapan Rilis & Migrasi Server (Penting)
- [ ] **Hosting & Domain:** Daftarkan/siapkan hosting (cPanel/VPS) dan hubungkan dengan nama domain resmi desa.
- [ ] **Konfigurasi Database Produksi:** Buat database baru di server, salin isi file `.env` ke server produksi, lalu ubah konfigurasi `DB_HOST`, `DB_PORT`, `DB_DATABASE`, dll.
- [ ] **Pindahkan Asset (Foto):** Salin seluruh folder `storage/app/public` dari laptop lokal ke server, kemudian jalankan kembali perintah `php artisan storage:link` di server untuk memperbaiki symlink gambar.
- [ ] **Kompilasi Aset Terakhir:** Jalankan perintah `npm run build` sekali lagi untuk memastikan seluruh desain Tailwind CSS telah dikemas rapi untuk versi produksi (menghapus kebutuhan akan `npm run dev`).
- [ ] **Email SMTP:** Hubungkan sistem ke layanan email (misalnya Gmail SMTP atau email bawaan hosting) dan ubah pengaturan `MAIL_MAILER` dari `log` menjadi `smtp` agar fitur "Lupa Password" bisa berjalan secara nyata.
- [ ] **Matikan Mode Debug:** Pastikan `APP_DEBUG=false` di dalam file `.env` di server untuk mencegah potensi kebocoran sistem jika terjadi error (keamanan).
- [ ] **Ganti URL Utama:** Ubah `APP_URL` di file `.env` server menjadi nama domain (contoh: `https://cigalontang.desa.id`).

## Tugas Harian & Penyempurnaan Konten (Aparatur / Admin Desa)
- [ ] **Ubah Sandi Default:** Login menggunakan akun Superadmin default dan segera ubah kata sandi demi keamanan.
- [ ] **Input Data Asli:** Mulai hapus data percobaan (*dummy*) pada modul Berita, Wisata, dan UMKM, lalu gantikan dengan konten tulisan dan foto yang sebenarnya.
- [ ] **Pengaturan Website:** Pastikan logo, deskripsi singkat (SEO), serta detail kontak diatur dengan benar melalui menu "Pengaturan Website" di dalam panel admin.
- [ ] **Update Google Maps:** Kumpulkan URL koordinat Google Maps untuk seluruh destinasi wisata dan inputkan ke dalam sistem agar mempermudah pengunjung mencari lokasi.

## Tugas Opsional / Ide Pengembangan Berikutnya
- [ ] Mengatur format sitemap XML secara otomatis (`sitemap.xml`) yang terhubung langsung ke mesin pencari Google.
- [ ] Menambahkan sistem pendaftaran mandiri (registrasi) apabila UMKM ingin mendaftarkan produknya sendiri dan menuggu persetujuan (*approval*) admin desa.
- [ ] Membangun antarmuka cetak laporan (*Print PDF*) untuk Statistik Penduduk dan Demografi yang rapi.
