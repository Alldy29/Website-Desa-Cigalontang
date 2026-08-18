# Roadmap Pengembangan Portal Desa Cigalontang

Roadmap ini membagi siklus hidup pembuatan website ke dalam beberapa fase dari tahap perancangan hingga rilis publik (Deployment).

## Fase 1: Perencanaan & Fondasi Dasar (Selesai)
- [x] Diskusi dan pengumpulan spesifikasi kebutuhan (PRD).
- [x] Pemilihan teknologi (Laravel + Tailwind CSS).
- [x] Instalasi dan konfigurasi dasar proyek.
- [x] Merancang struktur database awal (Tabel Berita, Profil, Wisata, UMKM).
- [x] Setup autentikasi dasar dan sistem manajemen peran pengguna (Superadmin, Admin Desa, BUMDes, Kepala Desa).

## Fase 2: Pengembangan Panel Admin & CMS (Selesai)
- [x] Desain dan implementasi antarmuka Panel Admin (Layout Sidebar, Navbar).
- [x] Modul Manajemen Profil & Aparatur Desa.
- [x] Modul Manajemen Publikasi (Berita, Agenda, Pengumuman, Galeri).
- [x] Modul Potensi Desa (Destinasi Wisata, Paket Wisata).
- [x] Modul Ekonomi Desa (Mitra UMKM, Produk UMKM).
- [x] Implementasi notifikasi interaktif (SweetAlert2) untuk konfirmasi Hapus dan peringatan Validasi Form (kolom kosong).
- [x] Peningkatan *User Experience* (UX) dengan *Live Image Preview* pada saat menambah/mengedit data yang memiliki foto.

## Fase 3: Pengembangan Halaman Publik / Frontend (Selesai)
- [x] Merancang antarmuka publik yang estetik, modern, premium, dan responsif.
- [x] Desain ulang menu navigasi (Mobile Menu) dengan gaya *Floating Card*.
- [x] Integrasi data dinamis dari database ke halaman Beranda (Hero section, Statistik, Berita Terbaru).
- [x] Pembuatan halaman detail untuk Berita, Wisata, dan UMKM.
- [x] Integrasi Google Maps URL untuk lokasi destinasi wisata.
- [x] Pembuatan sistem Form Aspirasi Warga dengan keamanan validasi data.

## Fase 4: Peningkatan Sistem & Optimalisasi SEO (Tahap Saat Ini)
- [x] Konfigurasi *Search Engine Optimization* (SEO) Meta Tags & Deskripsi.
- [x] Implementasi *Open Graph* dan *Twitter Cards* agar link tampil rapi dengan *thumbnail* jika dibagikan ke WhatsApp / Facebook.
- [x] Konfigurasi `robots.txt` untuk mengizinkan rayapan Google pada konten publik dan memblokir akses ke halaman admin.
- [x] Penyempurnaan hierarki hak akses (Menu Pengaturan dipindah ke Info Desa untuk Admin Desa).

## Fase 5: Persiapan Rilis (Deployment) & Hosting (Mendatang)
- [ ] Membeli dan mengonfigurasi Domain Desa (contoh: `cigalontang.desa.id`).
- [ ] Migrasi database dari sistem lokal (SQLite/MySQL Localhost) ke database produksi (CPanel/VPS).
- [ ] Menyiapkan SMTP Server (Email) agar fitur Lupa Password bisa mengirimkan tautan reset ke email tujuan secara nyata.
- [ ] *Security Hardening* (Menutup mode Debug, mengatur permission folder storage).
- [ ] Rilis (Go Live).

## Fase 6: Pemeliharaan (Maintenance) & Iterasi Fitur Baru
- [ ] Pelatihan bagi aparatur desa untuk mengoperasikan Panel Admin.
- [ ] Evaluasi lalu lintas website dan stabilitas.
- [ ] Pengembangan modul tambahan di masa depan jika diperlukan (contoh: Layanan Surat Pengantar Online, Dashboard Kependudukan yang lebih rinci).
