<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Aspirasi;
use App\Models\Aparatur;
use App\Models\UmkmProduct;
use App\Models\MitraUmkm;
use App\Models\KategoriUmkm;
use App\Models\User;

class StatistikController extends Controller
{
    public function web()
    {
        $data = [
            'totalBerita' => Berita::count(),
            'totalGaleri' => Galeri::count(),
            'totalAparatur' => Aparatur::count(),
            'totalAspirasi' => Aspirasi::count(),
            'aspirasiSelesai' => Aspirasi::where('status', 'selesai')->count(),
            'aspirasiMenunggu' => Aspirasi::where('status', 'menunggu')->count(),
        ];
        
        $data['persentaseAspirasiSelesai'] = $data['totalAspirasi'] > 0 
            ? round(($data['aspirasiSelesai'] / $data['totalAspirasi']) * 100) 
            : 0;

        return view('admin.statistik.web', $data);
    }

    public function umkm()
    {
        $data = [
            'totalProduk' => UmkmProduct::count(),
            'totalMitra' => MitraUmkm::count(),
            'totalKategori' => KategoriUmkm::count(),
        ];

        // Persebaran per kategori
        $data['kategoriStats'] = KategoriUmkm::withCount('umkmProducts')
            ->orderByDesc('umkm_products_count')
            ->get();

        return view('admin.statistik.umkm', $data);
    }

    public function pengunjung()
    {
        $today = Carbon::today()->toDateString();
        $thisMonth = Carbon::now()->startOfMonth()->toDateString();

        $data = [
            'pengunjungHariIni' => Visitor::where('visited_date', $today)->count(),
            'pengunjungBulanIni' => Visitor::where('visited_date', '>=', $thisMonth)->count(),
            'totalPengunjung' => Visitor::count(),
            'hitsHariIni' => Visitor::where('visited_date', $today)->sum('hits') ?: 0,
        ];

        // Grafik 7 Hari Terakhir
        $tujuhHari = collect();
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i)->toDateString();
            $tujuhHari->push([
                'tanggal' => Carbon::parse($date)->format('d M'),
                'jumlah' => Visitor::where('visited_date', $date)->count(),
            ]);
        }
        $data['grafikTujuhHari'] = $tujuhHari;
        $data['maxGrafik'] = $tujuhHari->max('jumlah') > 0 ? $tujuhHari->max('jumlah') : 10; // Hindari bagi 0

        return view('admin.statistik.pengunjung', $data);
    }
}
