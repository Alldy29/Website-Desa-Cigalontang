<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use App\Models\WisataKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $wisatas = Wisata::when($search, function ($query, $search) {
                return $query->where('nama_wisata', 'like', "%{$search}%")
                             ->orWhere('kategori', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search]);
        return view('admin.wisata.index', compact('wisatas', 'search'));
    }

    public function create()
    {
        $kategoris = WisataKategori::orderBy('nama', 'asc')->get();
        return view('admin.wisata.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'nullable|string|max:255',
            'url_lokasi' => 'nullable|url|max:255',
            'kategori' => 'required|string|max:255',
            'foto_url' => 'required|image|mimes:jpg,jpeg,png|max:5120'
        ]);

        $fotoPath = $request->file('foto_url')->store('wisata', 'public');

        Wisata::create([
            'nama_wisata' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'url_lokasi' => $request->url_lokasi,
            'kategori' => $request->kategori,
            'foto_url' => $fotoPath,
        ]);

        return redirect()->route('admin.wisata.index')->with('success', 'Destinasi wisata berhasil ditambahkan.');
    }

    public function edit(Wisata $wisatum)
    {
        $kategoris = WisataKategori::orderBy('nama', 'asc')->get();
        return view('admin.wisata.edit', compact('wisatum', 'kategoris'));
    }

    public function update(Request $request, Wisata $wisatum)
    {
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'nullable|string|max:255',
            'url_lokasi' => 'nullable|url|max:255',
            'kategori' => 'required|string|max:255',
            'foto_url' => 'nullable|image|mimes:jpg,jpeg,png|max:5120'
        ]);

        $fotoPath = $wisatum->foto_url;

        if ($request->hasFile('foto_url')) {
            if ($wisatum->foto_url && Storage::disk('public')->exists($wisatum->foto_url)) {
                Storage::disk('public')->delete($wisatum->foto_url);
            }
            $fotoPath = $request->file('foto_url')->store('wisata', 'public');
        }

        $wisatum->update([
            'nama_wisata' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'url_lokasi' => $request->url_lokasi,
            'kategori' => $request->kategori,
            'foto_url' => $fotoPath,
        ]);

        return redirect()->route('admin.wisata.index')->with('success', 'Destinasi wisata berhasil diperbarui.');
    }

    public function destroy(Wisata $wisatum)
    {
        if ($wisatum->foto_url && Storage::disk('public')->exists($wisatum->foto_url)) {
            Storage::disk('public')->delete($wisatum->foto_url);
        }
        
        $wisatum->delete();
        return redirect()->route('admin.wisata.index')->with('success', 'Destinasi wisata berhasil dihapus.');
    }
}
