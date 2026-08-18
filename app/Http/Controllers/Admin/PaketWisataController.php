<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PaketWisataController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pakets = PaketWisata::when($search, function ($query, $search) {
                return $query->where('nama_paket', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search]);
        return view('admin.paket_wisata.paket.index', compact('pakets', 'search'));
    }

    public function create()
    {
        return view('admin.paket_wisata.paket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'link_pemesanan' => 'nullable|string|max:255',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('paket_wisata', 'public');
        }

        PaketWisata::create([
            'nama_paket' => $request->nama_paket,
            'slug' => Str::slug($request->nama_paket),
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $gambarPath,
            'link_pemesanan' => $request->link_pemesanan,
        ]);

        return redirect()->route('admin.paket_wisata.paket.index')->with('success', 'Paket wisata berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $paket = PaketWisata::findOrFail($id);
        return view('admin.paket_wisata.paket.edit', compact('paket'));
    }

    public function update(Request $request, string $id)
    {
        $paket = PaketWisata::findOrFail($id);
        
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'link_pemesanan' => 'nullable|string|max:255',
        ]);

        $gambarPath = $paket->gambar;
        if ($request->hasFile('gambar')) {
            if ($gambarPath) {
                Storage::disk('public')->delete($gambarPath);
            }
            $gambarPath = $request->file('gambar')->store('paket_wisata', 'public');
        }

        $paket->update([
            'nama_paket' => $request->nama_paket,
            'slug' => Str::slug($request->nama_paket),
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $gambarPath,
            'link_pemesanan' => $request->link_pemesanan,
        ]);

        return redirect()->route('admin.paket_wisata.paket.index')->with('success', 'Paket wisata berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $paket = PaketWisata::findOrFail($id);
        
        if ($paket->gambar) {
            Storage::disk('public')->delete($paket->gambar);
        }
        
        $paket->delete();

        return redirect()->route('admin.paket_wisata.paket.index')->with('success', 'Paket wisata berhasil dihapus.');
    }
}
