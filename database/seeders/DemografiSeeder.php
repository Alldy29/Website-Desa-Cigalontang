<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemografiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pendidikan = [
            ['kategori' => 'pendidikan', 'nama' => 'SD/Sederajat', 'jumlah' => 2571],
            ['kategori' => 'pendidikan', 'nama' => 'SMP / Sederajat', 'jumlah' => 123],
            ['kategori' => 'pendidikan', 'nama' => 'SMA / Sederajat', 'jumlah' => 31],
            ['kategori' => 'pendidikan', 'nama' => 'Perguruan Tinggi', 'jumlah' => 21],
            ['kategori' => 'pendidikan', 'nama' => 'Belum / tidak sekolah', 'jumlah' => 0],
        ];

        $pekerjaan = [
            ['kategori' => 'pekerjaan', 'nama' => 'Petani pemilik tanah', 'jumlah' => 53],
            ['kategori' => 'pekerjaan', 'nama' => 'Buruh tani', 'jumlah' => 1532],
            ['kategori' => 'pekerjaan', 'nama' => 'Pengusaha dagang', 'jumlah' => 145],
            ['kategori' => 'pekerjaan', 'nama' => 'Pengrajin', 'jumlah' => 19],
            ['kategori' => 'pekerjaan', 'nama' => 'Pengusaha angkutan', 'jumlah' => 2],
            ['kategori' => 'pekerjaan', 'nama' => 'PNS', 'jumlah' => 14],
            ['kategori' => 'pekerjaan', 'nama' => 'TNI/Polri', 'jumlah' => 0],
            ['kategori' => 'pekerjaan', 'nama' => 'Pensiunan PNS / Polri', 'jumlah' => 4],
            ['kategori' => 'pekerjaan', 'nama' => 'Peternak', 'jumlah' => 24],
        ];

        foreach (array_merge($pendidikan, $pekerjaan) as $data) {
            \App\Models\Demografi::create($data);
        }
    }
}
