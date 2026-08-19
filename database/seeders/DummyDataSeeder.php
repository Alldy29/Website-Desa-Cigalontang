<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use App\Models\Aparatur;
use App\Models\Wisata;
use App\Models\Galeri;
use App\Models\KategoriUmkm;
use App\Models\UmkmProduct;
use Illuminate\Support\Str;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Berita::truncate();
        Aparatur::truncate();
        Wisata::truncate();
        Galeri::truncate();
        KategoriUmkm::truncate();
        UmkmProduct::truncate();
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. BERITA & PENGUMUMAN
        Berita::insert([
            [
                'judul' => 'Kerja Bakti Pembangunan Irigasi Dusun 1 Cigalontang Tengah Berjalan Lancar',
                'slug' => Str::slug('Kerja Bakti Pembangunan Irigasi Dusun 1 Cigalontang Tengah Berjalan Lancar'),
                'konten' => 'Masyarakat Dusun 1 Cigalontang Tengah berbondong-bondong melakukan kerja bakti gotong royong memperbaiki saluran irigasi yang mengairi area persawahan produktif.',
                'gambar' => 'https://images.unsplash.com/photo-1596422846543-74c6eb2822a1?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kunjungan Bupati dalam Rangka Penilaian Desa Berprestasi',
                'slug' => Str::slug('Kunjungan Bupati dalam Rangka Penilaian Desa Berprestasi'),
                'konten' => 'Bupati melakukan kunjungan kerja ke Desa Cigalontang untuk meninjau secara langsung berbagai inovasi pelayanan publik dan pemberdayaan masyarakat yang ada.',
                'gambar' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kegiatan Syukuran Ronggeng Tahunan Desa Cigalontang',
                'slug' => Str::slug('Kegiatan Syukuran Ronggeng Tahunan Desa Cigalontang'),
                'konten' => 'Masyarakat Desa Cigalontang menggelar acara ronggeng tahunan sebagai bentuk rasa syukur atas mengalirnya air dari pegunungan hingga ke desa.',
                'gambar' => '/images/berita/kegiatan-ronggeng.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Penyaluran BLT Dana Desa Tahap II Tahun 2026',
                'slug' => Str::slug('Penyaluran BLT Dana Desa Tahap II Tahun 2026'),
                'konten' => 'Diberitahukan kepada seluruh Keluarga Penerima Manfaat (KPM) bahwa penyaluran Bantuan Langsung Tunai (BLT) Dana Desa akan dilaksanakan di GOR Desa.',
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pendaftaran Program Bantuan Bedah Rumah Dibuka',
                'slug' => Str::slug('Pendaftaran Program Bantuan Bedah Rumah Dibuka'),
                'konten' => 'Pemerintah Desa membuka pendaftaran usulan program Bantuan Stimulan Perumahan Swadaya (BSPS) bagi warga pra-sejahtera. Pendaftaran terakhir tanggal 30 Juni.',
                'gambar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 2. AGENDA
            [
                'judul' => 'Rapat Persiapan Menyambut HUT RI ke-81',
                'deskripsi' => 'Rapat persiapan perayaan kemerdekaan yang dihadiri oleh KKN LP3I Tasikmalaya, KKN UNPER, Aparatur Desa Cigalontang, dan Karang Taruna desa untuk mensukseskan acara 17 Agustus.',
                'tanggal_mulai' => '2026-08-01',
                'tanggal_selesai' => '2026-08-01',
                'lokasi' => 'Balai Desa Cigalontang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Musyawarah Rencana Pembangunan Desa (Musrenbangdes) 2027',
                'deskripsi' => 'Seluruh elemen masyarakat diundang hadir di Aula Balai Desa untuk menyusun draft program pembangunan desa tahun anggaran 2027.',
                'tanggal_mulai' => '2026-06-28',
                'tanggal_selesai' => '2026-06-28',
                'lokasi' => 'Aula Balai Desa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pelatihan Kewirausahaan untuk Anggota Ibu PKK',
                'deskripsi' => 'Pemerintah Desa akan mengadakan pelatihan pembuatan kerajinan dan tata boga untuk meningkatkan kemandirian ekonomi keluarga melalui organisasi PKK.',
                'tanggal_mulai' => '2026-07-02',
                'tanggal_selesai' => '2026-07-02',
                'lokasi' => 'Gedung Serbaguna Desa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 3. APARATUR DESA
        Aparatur::insert([
            [
                'nama' => 'Deni Nugraha, S.IP',
                'jabatan' => 'Kepala Desa',
                'foto_url' => 'https://ui-avatars.com/api/?name=Deni+Nugraha&background=15803d&color=fff&size=128',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Yuda Brahmantiar, S.IP',
                'jabatan' => 'Sekretaris Desa',
                'foto_url' => 'https://ui-avatars.com/api/?name=Yuda+Brahmantiar&background=0ea5e9&color=fff&size=128',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Iday Rustandi',
                'jabatan' => 'Kaur Tata Usaha dan Umum',
                'foto_url' => 'https://ui-avatars.com/api/?name=Iday+Rustandi&background=64748b&color=fff&size=128',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dadang Sutisna, S.Pd',
                'jabatan' => 'Kaur Keuangan',
                'foto_url' => 'https://ui-avatars.com/api/?name=Dadang+Sutisna&background=eab308&color=fff&size=128',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dedin, S.Kom',
                'jabatan' => 'Kaur Perencanaan',
                'foto_url' => 'https://ui-avatars.com/api/?name=Dedin&background=8b5cf6&color=fff&size=128',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Naman Mulyadi',
                'jabatan' => 'Kasi Pemerintahan',
                'foto_url' => 'https://ui-avatars.com/api/?name=Naman+Mulyadi&background=f43f5e&color=fff&size=128',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Wawan Setiawan',
                'jabatan' => 'Kasi Kesejahteraan',
                'foto_url' => 'https://ui-avatars.com/api/?name=Wawan+Setiawan&background=10b981&color=fff&size=128',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ade Wina',
                'jabatan' => 'Kasi Pelayanan',
                'foto_url' => 'https://ui-avatars.com/api/?name=Ade+Wina&background=06b6d4&color=fff&size=128',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 4. WISATA
        Wisata::insert([
            [
                'nama_wisata' => 'Curug Tersembunyi',
                'deskripsi' => 'Nikmati segarnya air terjun alami yang belum banyak tersentuh tangan manusia. Cocok untuk healing dan camping ceria di akhir pekan.',
                'foto_url' => 'https://images.unsplash.com/photo-1596422846543-74c6eb2822a1?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'lokasi' => 'Kawasan Hutan Lindung Cigalontang',
                'harga_tiket' => 'Rp 5.000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_wisata' => 'Terasering Pesawahan',
                'deskripsi' => 'Hamparan sawah berundak yang indah dan hijau. Anda bisa belajar menanam padi atau sekadar berfoto dengan latar memukau.',
                'foto_url' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'lokasi' => 'Dusun Panyandungan',
                'harga_tiket' => 'Gratis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 5. UMKM
        $katMakanan = KategoriUmkm::create(['nama_kategori' => 'Makanan', 'slug' => 'makanan']);
        $katKerajinan = KategoriUmkm::create(['nama_kategori' => 'Kerajinan Tangan', 'slug' => 'kerajinan-tangan']);
        $katGolok = KategoriUmkm::create(['nama_kategori' => 'Pengrajin Golok', 'slug' => 'pengrajin-golok']);

        UmkmProduct::insert([
            [
                'kategori_umkm_id' => $katMakanan->id,
                'nama_produk' => 'Gula Merah Aren Asli',
                'slug' => Str::slug('Gula Merah Aren Asli'),
                'deskripsi' => 'Gula merah murni hasil sadapan nira aren petani Cigalontang. Diolah secara tradisional tanpa bahan pengawet.',
                'harga' => 25000,
                'gambar' => '/images/umkm/gula-merah.png',
                'mitra' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_umkm_id' => $katKerajinan->id,
                'nama_produk' => 'Anyaman Bambu',
                'slug' => Str::slug('Anyaman Bambu'),
                'deskripsi' => 'Kerajinan anyaman bambu berkualitas ekspor. Cocok untuk hiasan dinding atau wadah.',
                'harga' => 75000,
                'gambar' => 'https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'mitra' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_umkm_id' => $katGolok->id,
                'nama_produk' => 'Golok Tebas Premium',
                'slug' => Str::slug('Golok Tebas Premium'),
                'deskripsi' => 'Golok asli tempaan pande besi Cigalontang. Terbuat dari baja tajam dengan gagang kayu eksotis.',
                'harga' => 250000,
                'gambar' => 'https://images.unsplash.com/photo-1590483736622-398541ce1fbb?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'mitra' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
        // 6. GALERI (Data dummy)
        Galeri::insert([
            [
                'judul' => 'Gotong Royong Irigasi',
                'deskripsi' => null,
                'foto_url' => 'https://images.unsplash.com/photo-1596422846543-74c6eb2822a1?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kunjungan Kerja',
                'deskripsi' => null,
                'foto_url' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Musrenbangdes',
                'deskripsi' => null,
                'foto_url' => '/images/berita/rapat-hut-ri.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pemandangan Sawah',
                'deskripsi' => null,
                'foto_url' => '/images/sejarah-desa.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
