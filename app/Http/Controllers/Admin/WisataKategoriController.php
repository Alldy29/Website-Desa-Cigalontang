<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WisataKategori;

class WisataKategoriController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategoris = WisataKategori::when($search, function ($query, $search) {
                return $query->where('nama', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search]);
        return view('admin.wisata_kategori.index', compact('kategoris', 'search'));
    }

    public function create()
    {
        return view('admin.wisata_kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:wisata_kategoris'
        ]);

        WisataKategori::create($request->all());
        return redirect()->route('admin.wisata_kategori.index')->with('success', 'Kategori wisata berhasil ditambahkan!');
    }

    public function edit(WisataKategori $wisata_kategori)
    {
        $kategori = $wisata_kategori;
        return view('admin.wisata_kategori.edit', compact('kategori'));
    }

    public function update(Request $request, WisataKategori $wisata_kategori)
    {
        $kategori = $wisata_kategori;
        $request->validate([
            'nama' => 'required|string|max:255|unique:wisata_kategoris,nama,' . $kategori->id
        ]);

        $kategori->update($request->all());
        return redirect()->route('admin.wisata_kategori.index')->with('success', 'Kategori wisata berhasil diperbarui!');
    }

    public function destroy(WisataKategori $wisata_kategori)
    {
        $wisata_kategori->delete();
        return redirect()->route('admin.wisata_kategori.index')->with('success', 'Kategori wisata berhasil dihapus!');
    }
}
