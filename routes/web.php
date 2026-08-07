<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $beritaTerbaru = \App\Models\Berita::latest()->limit(3)->get();
    return view('welcome', compact('beritaTerbaru'));
});

Route::get('/profil', function () {
    $aparaturs = \App\Models\Aparatur::oldest()->get();
    return view('profil', compact('aparaturs'));
});

Route::get('/berita', function () {
    $beritas = \App\Models\Berita::latest()->paginate(4);
    return view('berita', compact('beritas'));
});

Route::get('/berita/{slug}', function ($slug) {
    $berita = \App\Models\Berita::where('slug', $slug)->firstOrFail();
    $beritaLainnya = \App\Models\Berita::where('id', '!=', $berita->id)->latest()->limit(4)->get();
    return view('berita-detail', compact('berita', 'beritaLainnya'));
});

Route::get('/galeri', function () { 
    $galeris = \App\Models\Galeri::latest()->paginate(8);
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
        $produks = $query->paginate(4);
    } else {
        $produks = $query->paginate(8);
    }
    
    return view('umkm', compact('kategoris', 'produks', 'kategoriFilter')); 
})->name('umkm');
Route::get('/wisata', function () { 
    $wisatas = \App\Models\Wisata::latest()->paginate(4);
    return view('wisata', compact('wisatas')); 
});
Route::get('/wisata/{id}', function ($id) { 
    $wisata = \App\Models\Wisata::findOrFail($id);
    return view('wisata-detail', compact('wisata')); 
})->name('wisata.show');
Route::get('/aspirasi', function () { return view('aspirasi'); });
Route::get('/data-desa', function () { 
    $dusuns = \App\Models\Dusun::all();
    return view('data-desa', compact('dusuns')); 
});

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
    Route::get('settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
    Route::resource('dusuns', \App\Http\Controllers\Admin\DusunController::class);
});

// Statistik Routes (Superadmin & Admin Desa)
Route::middleware(['auth', 'role:superadmin|admin_desa'])->prefix('admin/statistik')->name('admin.statistik.')->group(function () {
    Route::get('web', [\App\Http\Controllers\Admin\StatistikController::class, 'web'])->name('web');
    Route::get('umkm', [\App\Http\Controllers\Admin\StatistikController::class, 'umkm'])->name('umkm');
    Route::get('pengunjung', [\App\Http\Controllers\Admin\StatistikController::class, 'pengunjung'])->name('pengunjung');
});

// Admin Desa & Superadmin Routes (Konten Publik)
Route::middleware(['auth', 'role:superadmin|admin_desa'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('profil-desa', [\App\Http\Controllers\Admin\ProfilDesaController::class, 'index'])->name('profil_desa.index');
    Route::post('profil-desa', [\App\Http\Controllers\Admin\ProfilDesaController::class, 'update'])->name('profil_desa.update');
    Route::resource('berita', \App\Http\Controllers\Admin\BeritaController::class);
    Route::resource('galeri', \App\Http\Controllers\Admin\GaleriController::class)->except(['edit', 'update', 'show']);
    Route::resource('aparatur', \App\Http\Controllers\Admin\AparaturController::class);
    Route::resource('wisata', \App\Http\Controllers\Admin\WisataController::class);
    Route::resource('aspirasi', \App\Http\Controllers\Admin\AspirasiController::class)->only(['index', 'show', 'destroy']);
    Route::put('aspirasi/{aspirasi}/status', [\App\Http\Controllers\Admin\AspirasiController::class, 'updateStatus'])->name('aspirasi.updateStatus');
});

// UMKM Routes (Superadmin, Admin Desa, Bumdes)
Route::middleware(['auth', 'role:superadmin|admin_desa|bumdes'])->prefix('admin')->name('admin.')->group(function () {
    Route::prefix('umkm')->name('umkm.')->group(function () {
        Route::resource('kategori', \App\Http\Controllers\Admin\KategoriUmkmController::class)->except(['create', 'show', 'edit']);
        Route::resource('mitra', \App\Http\Controllers\Admin\MitraUmkmController::class)->except(['create', 'show', 'edit']);
        Route::resource('produk', \App\Http\Controllers\Admin\UmkmProductController::class);
    });
});

require __DIR__.'/auth.php';
