<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriUmkm;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriUmkmController extends Controller
{
    public function index()
    {
        $kategoris = KategoriUmkm::withCount('umkmProducts')->get();
        return view('admin.umkm.kategori.index', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_umkms,nama_kategori'
        ]);

        KategoriUmkm::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);

        return redirect()->back()->with('success', 'Kategori UMKM berhasil ditambahkan.');
    }

    public function update(Request $request, KategoriUmkm $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_umkms,nama_kategori,' . $kategori->id
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori)
        ]);

        return redirect()->back()->with('success', 'Kategori UMKM berhasil diperbarui.');
    }

    public function destroy(KategoriUmkm $kategori)
    {
        if ($kategori->umkmProducts()->count() > 0) {
            return redirect()->back()->with('error', 'Kategori tidak bisa dihapus karena memiliki produk.');
        }

        $kategori->delete();
        return redirect()->back()->with('success', 'Kategori UMKM berhasil dihapus.');
    }
}
