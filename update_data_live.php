<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Aparatur;
use App\Models\Dusun;

// 1. Update Data Dusun
$dusunData = [
    [
        'nama' => 'Kedusunan Cigalontang',
        'jumlah_laki' => 589,
        'jumlah_perempuan' => 605
    ],
    [
        'nama' => 'Kedusunan Panyandungan',
        'jumlah_laki' => 454,
        'jumlah_perempuan' => 488
    ],
    [
        'nama' => 'Kedusunan Cigalontang Girang',
        'jumlah_laki' => 673,
        'jumlah_perempuan' => 577
    ]
];

foreach ($dusunData as $d) {
    Dusun::updateOrCreate(
        ['nama' => $d['nama']],
        ['jumlah_laki' => $d['jumlah_laki'], 'jumlah_perempuan' => $d['jumlah_perempuan']]
    );
}

echo "Data Dusun berhasil diperbarui.\n";

// 2. Update Data Aparatur (Tanpa Foto)
$aparaturData = [
    ['nama' => 'Deni Nugraha, S.IP', 'jabatan' => 'Kepala Desa'],
    ['nama' => 'Yuda Brahmantiar, S.IP', 'jabatan' => 'Sekretaris Desa'],
    ['nama' => 'Iday Rustandi', 'jabatan' => 'Kaur Tata Usaha dan Umum'],
    ['nama' => 'Dadang Sutisna, S.Pd', 'jabatan' => 'Kaur Keuangan'],
    ['nama' => 'Dedin, S.Kom', 'jabatan' => 'Kaur Perencanaan'],
    ['nama' => 'Naman Mulyadi', 'jabatan' => 'Kasi Pemerintahan'],
    ['nama' => 'Wawan Setiawan', 'jabatan' => 'Kasi Kesejahteraan'],
    ['nama' => 'Ade Wina', 'jabatan' => 'Kasi Pelayanan'],
    ['nama' => 'Oya Hermawan', 'jabatan' => 'Kepala Dusun I'],
    ['nama' => 'Iday Rustandi', 'jabatan' => 'Kepala Dusun II'],
    ['nama' => 'Engku Kuswanda', 'jabatan' => 'Kepala Dusun III'],
    ['nama' => 'Heri', 'jabatan' => 'Staff Desa'],
    ['nama' => 'Rina Hamidah', 'jabatan' => 'Staff Desa']
];

foreach ($aparaturData as $a) {
    Aparatur::updateOrCreate(
        ['jabatan' => $a['jabatan']],
        ['nama' => $a['nama']]
    );
}

echo "Data Aparatur berhasil diperbarui.\n";
