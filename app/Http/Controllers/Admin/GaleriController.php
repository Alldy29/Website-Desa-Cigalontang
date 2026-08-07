<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->paginate(12);
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto_url' => 'required|image|mimes:jpg,jpeg,png|max:5120'
        ]);

        $fotoPath = $request->file('foto_url')->store('galeri', 'public');

        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto_url' => $fotoPath,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil ditambahkan ke Galeri.');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->foto_url && Storage::disk('public')->exists($galeri->foto_url)) {
            Storage::disk('public')->delete($galeri->foto_url);
        }
        
        $galeri->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil dihapus.');
    }
}
