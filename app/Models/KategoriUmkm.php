<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriUmkm extends Model
{
    protected $fillable = ['nama_kategori', 'slug'];

    public function umkmProducts()
    {
        return $this->hasMany(UmkmProduct::class);
    }
}
