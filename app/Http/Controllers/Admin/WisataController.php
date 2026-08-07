<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    public function index()
    {
        $wisatas = Wisata::paginate(10);
        return view('admin.wisata.index', compact('wisatas'));
    }

    public function create()
    {
        return view('admin.wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'nullable|string|max:255',
            'kategori' => 'required|string|max:255',
            'foto_url' => 'required|image|mimes:jpg,jpeg,png|max:5120'
        ]);

        $fotoPath = $request->file('foto_url')->store('wisata', 'public');

        Wisata::create([
            'nama_wisata' => $request->nama_wisata,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'kategori' => $request->kategori,
            'foto_url' => $fotoPath,
        ]);

        return redirect()->route('admin.wisata.index')->with('success', 'Destinasi wisata berhasil ditambahkan.');
    }

    public function edit(Wisata $wisatum)
    {
        return view('admin.wisata.edit', compact('wisatum'));
    }

    public function update(Request $request, Wisata $wisatum)
    {
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'nullable|string|max:255',
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
