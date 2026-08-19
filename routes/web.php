<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $beritaTerbaru = \App\Models\Berita::latest()->limit(3)->get();
    return view('welcome', compact('beritaTerbaru'));
});

Route::get('/profil', function () {
    $aparaturs = \App\Models\Aparatur::oldest()->get();
    $dusuns = \App\Models\Dusun::all();
    $pendidikans = \App\Models\Demografi::where('kategori', 'pendidikan')->orderBy('jumlah', 'desc')->get();
    $pekerjaans = \App\Models\Demografi::where('kategori', 'pekerjaan')->orderBy('jumlah', 'desc')->get();
    
    return view('profil', compact('aparaturs', 'dusuns', 'pendidikans', 'pekerjaans'));
});

Route::get('/berita', function () {
    $query = \App\Models\Berita::latest();
    if (request()->has('search') && request('search') != '') {
        $search = request('search');
        $query->where('judul', 'like', "%{$search}%")
              ->orWhere('konten', 'like', "%{$search}%");
    }
    $beritas = $query->paginate(6)->appends(request()->query());
    return view('berita', compact('beritas'));
})->name('berita');

Route::get('/berita/{slug}', function ($slug) {
    $berita = \App\Models\Berita::where('slug', $slug)->firstOrFail();
    $berita->increment('views');
    $beritaLainnya = \App\Models\Berita::where('id', '!=', $berita->id)->latest()->limit(4)->get();
    return view('berita-detail', compact('berita', 'beritaLainnya'));
});

Route::get('/galeri', function () { 
    $galeris = \App\Models\Galeri::latest()->paginate(6);
    return view('galeri', compact('galeris')); 
});
Route::get('/umkm', function () { 
    $kategoris = \App\Models\KategoriUmkm::all();
    $kategoriFilter = request('kategori');
    
    $query = \App\Models\UmkmProduct::with('kategoriUmkm')->latest();
    
    if ($kategoriFilter && $kategoriFilter !== 'semua') {
        // Karena data-filter di UMKM di-slug, kita harus mencari berdasarkan slug atau LIKE
        // Namun, di DB `nama_kategori` adalah teks biasa (misal: "Makanan")
        $query->whereHas('kategoriUmkm', function($q) use ($kategoriFilter) {
            $q->where('nama_kategori', 'LIKE', $kategoriFilter);
        });
        $produks = $query->paginate(8);
    } else {
        $produks = $query->paginate(8);
    }
    
    return view('umkm', compact('kategoris', 'produks', 'kategoriFilter')); 
})->name('umkm');
Route::get('/umkm/{id}', function ($id) { 
    $produk = \App\Models\UmkmProduct::with(['kategoriUmkm', 'mitraUmkm'])->findOrFail($id);
    return view('umkm-detail', compact('produk')); 
})->name('umkm.show');
Route::get('/wisata', function () { 
    $wisatas = \App\Models\Wisata::latest()->paginate(6);
    return view('wisata', compact('wisatas')); 
});
Route::get('/wisata/{id}', function ($id) { 
    $wisata = \App\Models\Wisata::findOrFail($id);
    return view('wisata-detail', compact('wisata')); 
})->name('wisata.show');
Route::get('/aspirasi', function () { return view('aspirasi'); })->name('aspirasi');
Route::post('/aspirasi', function (Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'whatsapp' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'jenis_pesan' => 'nullable|string|max:255',
        'rt_rw' => 'nullable|string|max:255',
        'pesan' => 'required|string',
    ]);
    
    $validated['status'] = 'menunggu';
    \App\Models\Aspirasi::create($validated);
    
    return back()->with('success', 'Pesan aspirasi Anda telah berhasil dikirim dan akan segera ditindaklanjuti.');
})->name('aspirasi.store');

Route::get('/paket-wisata', function () { 
    $pakets = \App\Models\PaketWisata::latest()->paginate(6);
    
    return view('paket-wisata', compact('pakets')); 
})->name('paket-wisata.index');

Route::get('/dashboard', function () {
    $totalBerita = \App\Models\Berita::count();
    $totalUmkm = \App\Models\UmkmProduct::count();
    $totalGaleri = \App\Models\Galeri::count();
    $totalAspirasi = \App\Models\Aspirasi::count();
    
    $aspirasiTerbaru = \App\Models\Aspirasi::latest()->take(5)->get();

    return view('dashboard', compact(
        'totalBerita', 
        'totalUmkm', 
        'totalGaleri', 
        'totalAspirasi', 
        'aspirasiTerbaru'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Superadmin Routes
Route::middleware(['auth', 'role:superadmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
});

// Statistik Routes (Superadmin & Kepala Desa)
Route::middleware(['auth', 'role:superadmin|kepala_desa'])->prefix('admin/statistik')->name('admin.statistik.')->group(function () {
    Route::get('web', [\App\Http\Controllers\Admin\StatistikController::class, 'web'])->name('web');
    Route::get('umkm', [\App\Http\Controllers\Admin\StatistikController::class, 'umkm'])->name('umkm');
    Route::get('pengunjung', [\App\Http\Controllers\Admin\StatistikController::class, 'pengunjung'])->name('pengunjung');
});

// Admin Desa & Superadmin Routes (Konten Publik, Info Desa, Wisata)
Route::middleware(['auth', 'role:superadmin|admin_desa'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('profil-desa', [\App\Http\Controllers\Admin\ProfilDesaController::class, 'index'])->name('profil_desa.index');
    Route::post('profil-desa', [\App\Http\Controllers\Admin\ProfilDesaController::class, 'update'])->name('profil_desa.update');
    Route::get('settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
    Route::resource('berita', \App\Http\Controllers\Admin\BeritaController::class);
    Route::resource('galeri', \App\Http\Controllers\Admin\GaleriController::class)->except(['edit', 'update', 'show']);
    Route::resource('dusuns', \App\Http\Controllers\Admin\DusunController::class);
    Route::resource('demografis', \App\Http\Controllers\Admin\DemografiController::class)->except(['create', 'edit', 'show']);
    Route::resource('aparatur', \App\Http\Controllers\Admin\AparaturController::class);
    
    // Wisata
    Route::resource('wisata', \App\Http\Controllers\Admin\WisataController::class);
    Route::resource('wisata_kategori', \App\Http\Controllers\Admin\WisataKategoriController::class);
    Route::prefix('paket-wisata')->name('paket_wisata.')->group(function () {
        Route::resource('paket', \App\Http\Controllers\Admin\PaketWisataController::class)->except(['show']);
    });
});

// Aspirasi (Superadmin, Admin Desa, Kepala Desa)
Route::middleware(['auth', 'role:superadmin|admin_desa|kepala_desa'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('aspirasi', \App\Http\Controllers\Admin\AspirasiController::class)->only(['index', 'show', 'destroy']);
    Route::put('aspirasi/{aspirasi}/status', [\App\Http\Controllers\Admin\AspirasiController::class, 'updateStatus'])->name('aspirasi.updateStatus');
});

// UMKM Routes (Superadmin, Bumdes)
Route::middleware(['auth', 'role:superadmin|bumdes'])->prefix('admin')->name('admin.')->group(function () {
    Route::prefix('umkm')->name('umkm.')->group(function () {
        Route::resource('kategori', \App\Http\Controllers\Admin\KategoriUmkmController::class)->except(['show', 'edit']);
        Route::resource('mitra', \App\Http\Controllers\Admin\MitraUmkmController::class)->except(['show']);
        Route::resource('produk', \App\Http\Controllers\Admin\UmkmProductController::class);
    });
});

// Sitemap
Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

require __DIR__.'/auth.php';
