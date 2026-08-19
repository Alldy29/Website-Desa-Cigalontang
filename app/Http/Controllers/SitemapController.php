<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\UmkmProduct;
use App\Models\Wisata;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        $umkms = UmkmProduct::latest()->get();
        $wisatas = Wisata::latest()->get();

        return response()->view('sitemap', [
            'beritas' => $beritas,
            'umkms' => $umkms,
            'wisatas' => $wisatas,
        ])->header('Content-Type', 'text/xml');
    }
}
