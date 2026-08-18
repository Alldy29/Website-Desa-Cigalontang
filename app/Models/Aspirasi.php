<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $fillable = ['nama', 'email', 'whatsapp', 'jenis_pesan', 'rt_rw', 'pesan', 'status'];
}
