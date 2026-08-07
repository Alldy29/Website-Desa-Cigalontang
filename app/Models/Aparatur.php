<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aparatur extends Model
{
    protected $fillable = ['nama', 'jabatan', 'foto_url', 'nip_nik'];
}
