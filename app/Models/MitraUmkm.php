<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MitraUmkm extends Model
{
    protected $fillable = ['nama_mitra', 'no_whatsapp', 'alamat'];

    public function umkmProducts()
    {
        return $this->hasMany(UmkmProduct::class);
    }
}
