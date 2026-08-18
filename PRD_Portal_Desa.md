# Product Requirements Document (PRD)
**Nama Proyek:** Portal Website Resmi Desa Cigalontang
**Tujuan:** Membangun platform informasi dan administrasi publik digital untuk Desa Cigalontang yang mencakup publikasi desa, potensi wisata, UMKM, dan wadah interaksi antara masyarakat dengan aparatur desa.

## 1. Latar Belakang & Visi
Desa Cigalontang membutuhkan sebuah representasi digital (website) modern yang responsif dan mudah dikelola (CMS) untuk meningkatkan transparansi, mempromosikan potensi lokal (Wisata & UMKM), serta memudahkan warga dalam menyampaikan aspirasi kepada pemerintah desa.

## 2. Target Pengguna (Audiens)
1. **Masyarakat Umum & Warga Desa:** Sebagai konsumen informasi (Berita, Agenda, Pengumuman), pencari layanan, dan penyampai aspirasi.
2. **Wisatawan & Investor:** Mencari informasi terkait Destinasi Wisata, Paket Wisata, dan Produk UMKM Desa Cigalontang.
3. **Aparatur Desa / Admin:** Mengelola konten website secara mandiri tanpa perlu keahlian coding (melalui Panel Admin).

## 3. Fitur Utama (Core Features)
### A. Halaman Publik (Frontend)
- **Beranda (Home):** Sorotan berita terbaru, sekilas profil desa, statistik ringkas, dan akses cepat ke layanan.
- **Profil Desa:** Sejarah, Visi Misi, Data Aparatur (Perangkat Desa), Data Dusun, dan Demografi Penduduk.
- **Publikasi:** 
  - Berita Desa, Pengumuman, dan Agenda (dengan label/kategori otomatis).
  - Galeri Foto kegiatan desa.
- **Wisata & Budaya:** Katalog Destinasi Wisata (dengan peta lokasi/Google Maps) dan penawaran Paket Wisata.
- **BUMDes & UMKM:** Katalog produk-produk lokal dan UMKM Desa (dengan fitur filter kategori dan profil mitra).
- **Aspirasi Warga:** Formulir online terintegrasi bagi warga untuk mengirim pesan/pengaduan langsung ke sistem desa.

### B. Panel Admin (Backend / CMS)
- **Dashboard:** Statistik pengunjung, jumlah konten, dan notifikasi aspirasi terbaru.
- **Manajemen Konten (CRUD):** 
  - Modul Profil & Aparatur (termasuk foto profil dan jabatan).
  - Modul Berita & Galeri.
  - Modul Wisata & UMKM.
- **Manajemen Aspirasi:** Fitur untuk membaca dan menindaklanjuti aspirasi yang masuk dari form publik.
- **Manajemen Akun & Hak Akses (Role-Based Access Control):**
  - **Superadmin:** Akses penuh ke sistem dan pengaturan website.
  - **Admin Desa:** Mengelola informasi umum, berita, aparatur, dan membalas aspirasi.
  - **Kepala Desa:** Akses ke laporan statistik dan pemantauan aspirasi.
  - **BUMDes:** Akses khusus untuk mengelola lapak UMKM dan Paket Wisata.
- **Pengaturan Website:** Mengelola detail kontak, deskripsi SEO, dan informasi footer secara dinamis.

## 4. Spesifikasi Teknis & Lingkungan
- **Framework:** Laravel 10/11 (PHP) dengan arsitektur MVC.
- **Database:** MySQL / SQLite.
- **Frontend / Styling:** Tailwind CSS + Alpine.js untuk interaktivitas (responsif & modern UI).
- **Fitur Tambahan:**
  - *SweetAlert2* untuk notifikasi dan konfirmasi aksi (Hapus, Validasi Form).
  - Sistem SEO dinamis (Meta tags, Open Graph, Twitter Cards).
  - Live Image Preview pada saat form upload foto di panel admin.

## 5. Kriteria Sukses
- Website dapat diakses di perangkat Mobile maupun Desktop dengan tampilan yang tidak pecah (Responsif 100%).
- Kecepatan pemuatan halaman yang optimal (Clean Code & Asset Building via Vite).
- Admin dapat menginput data baru dan perubahan akan langsung terlihat di halaman publik tanpa menyentuh kode.
- Warga bisa mengirimkan pesan yang valid masuk ke sistem database.
