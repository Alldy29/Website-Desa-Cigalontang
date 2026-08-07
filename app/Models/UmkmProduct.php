<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UmkmProduct extends Model
{
    protected $fillable = ['nama_produk', 'slug', 'harga', 'kategori_umkm_id', 'mitra_umkm_id', 'deskripsi', 'gambar', 'link_marketplace'];

    public function kategoriUmkm()
    {
        return $this->belongsTo(KategoriUmkm::class, 'kategori_umkm_id');
    }

    public function mitraUmkm()
    {
        return $this->belongsTo(MitraUmkm::class, 'mitra_umkm_id');
    }
}
