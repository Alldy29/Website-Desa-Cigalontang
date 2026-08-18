<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriUmkm;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriUmkmController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategoris = KategoriUmkm::withCount('umkmProducts')
            ->when($search, function ($query, $search) {
                return $query->where('nama_kategori', 'like', "%{$search}%");
            })
            ->get();
        return view('admin.umkm.kategori.index', compact('kategoris', 'search'));
    }

    public function create()
    {
        return view('admin.umkm.kategori.create');
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

        return redirect()->route('admin.umkm.kategori.index')->with('success', 'Kategori UMKM berhasil ditambahkan.');
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
