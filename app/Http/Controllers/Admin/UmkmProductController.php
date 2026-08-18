<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UmkmProduct;
use App\Models\KategoriUmkm;
use App\Models\MitraUmkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UmkmProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = UmkmProduct::with('kategoriUmkm')
            ->when($search, function ($query, $search) {
                return $query->where('nama_produk', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(8)
            ->appends(['search' => $search]);
        return view('admin.umkm.produk.index', compact('products', 'search'));
    }

    public function create()
    {
        $kategoris = KategoriUmkm::all();
        $mitras = MitraUmkm::orderBy('nama_mitra')->get();
        return view('admin.umkm.produk.create', compact('kategoris', 'mitras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_umkm_id' => 'required|exists:kategori_umkms,id',
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'satuan' => 'nullable|in:Kg,Pcs',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:5120',
            'mitra_umkm_id' => 'nullable|exists:mitra_umkms,id',
            'link_marketplace' => 'nullable|url|max:255',
        ]);

        $fotoPath = $request->file('gambar')->store('umkm', 'public');

        UmkmProduct::create([
            'kategori_umkm_id' => $request->kategori_umkm_id,
            'nama_produk' => $request->nama_produk,
            'slug' => Str::slug($request->nama_produk),
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'gambar' => $fotoPath,
            'mitra_umkm_id' => $request->mitra_umkm_id,
            'link_marketplace' => $request->link_marketplace,
        ]);

        return redirect()->route('admin.umkm.produk.index')->with('success', 'Produk UMKM berhasil ditambahkan.');
    }

    public function edit(UmkmProduct $produk)
    {
        $kategoris = KategoriUmkm::all();
        $mitras = MitraUmkm::orderBy('nama_mitra')->get();
        return view('admin.umkm.produk.edit', compact('produk', 'kategoris', 'mitras'));
    }

    public function update(Request $request, UmkmProduct $produk)
    {
        $request->validate([
            'kategori_umkm_id' => 'required|exists:kategori_umkms,id',
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'satuan' => 'nullable|in:Kg,Pcs',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'mitra_umkm_id' => 'nullable|exists:mitra_umkms,id',
            'link_marketplace' => 'nullable|url|max:255',
        ]);

        $fotoPath = $produk->gambar;

        if ($request->hasFile('gambar')) {
            if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $fotoPath = $request->file('gambar')->store('umkm', 'public');
        }

        $produk->update([
            'kategori_umkm_id' => $request->kategori_umkm_id,
            'nama_produk' => $request->nama_produk,
            'slug' => Str::slug($request->nama_produk),
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'gambar' => $fotoPath,
            'mitra_umkm_id' => $request->mitra_umkm_id,
            'link_marketplace' => $request->link_marketplace,
        ]);

        return redirect()->route('admin.umkm.produk.index')->with('success', 'Produk UMKM berhasil diperbarui.');
    }

    public function destroy(UmkmProduct $produk)
    {
        if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
            Storage::disk('public')->delete($produk->gambar);
        }
        
        $produk->delete();
        return redirect()->route('admin.umkm.produk.index')->with('success', 'Produk UMKM berhasil dihapus.');
    }
}
