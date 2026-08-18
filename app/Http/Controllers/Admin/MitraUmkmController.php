<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MitraUmkm;
use Illuminate\Http\Request;

class MitraUmkmController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $mitras = MitraUmkm::withCount('umkmProducts')
            ->when($search, function ($query, $search) {
                return $query->where('nama_mitra', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->appends(['search' => $search]);
        return view('admin.umkm.mitra.index', compact('mitras', 'search'));
    }

    public function create()
    {
        return view('admin.umkm.mitra.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mitra' => 'required|string|max:255',
            'no_whatsapp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        MitraUmkm::create([
            'nama_mitra' => $request->nama_mitra,
            'no_whatsapp' => $request->no_whatsapp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.umkm.mitra.index')->with('success', 'Mitra UMKM berhasil ditambahkan.');
    }

    public function edit(MitraUmkm $mitra)
    {
        return view('admin.umkm.mitra.edit', compact('mitra'));
    }

    public function update(Request $request, MitraUmkm $mitra)
    {
        $request->validate([
            'nama_mitra' => 'required|string|max:255',
            'no_whatsapp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        $mitra->update([
            'nama_mitra' => $request->nama_mitra,
            'no_whatsapp' => $request->no_whatsapp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.umkm.mitra.index')->with('success', 'Mitra UMKM berhasil diperbarui.');
    }

    public function destroy(MitraUmkm $mitra)
    {
        if ($mitra->umkmProducts()->count() > 0) {
            return redirect()->route('admin.umkm.mitra.index')->with('error', 'Mitra tidak bisa dihapus karena memiliki produk.');
        }

        $mitra->delete();
        return redirect()->route('admin.umkm.mitra.index')->with('success', 'Mitra UMKM berhasil dihapus.');
    }
}
