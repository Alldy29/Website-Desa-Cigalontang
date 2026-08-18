<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aparatur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AparaturController extends Controller
{
    public function index()
    {
        $aparaturs = Aparatur::paginate(8);
        return view('admin.aparatur.index', compact('aparaturs'));
    }

    public function create()
    {
        return view('admin.aparatur.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nip_nik' => 'nullable|string|max:255',
            'foto_url' => 'required|image|mimes:jpg,jpeg,png|max:5120'
        ]);

        $fotoPath = $request->file('foto_url')->store('aparatur', 'public');

        Aparatur::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'nip_nik' => $request->nip_nik,
            'foto_url' => $fotoPath,
        ]);

        return redirect()->route('admin.aparatur.index')->with('success', 'Data aparatur berhasil ditambahkan.');
    }

    public function edit(Aparatur $aparatur)
    {
        return view('admin.aparatur.edit', compact('aparatur'));
    }

    public function update(Request $request, Aparatur $aparatur)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nip_nik' => 'nullable|string|max:255',
            'foto_url' => 'nullable|image|mimes:jpg,jpeg,png|max:5120'
        ]);

        $fotoPath = $aparatur->foto_url;

        if ($request->hasFile('foto_url')) {
            if ($aparatur->foto_url && Storage::disk('public')->exists($aparatur->foto_url)) {
                Storage::disk('public')->delete($aparatur->foto_url);
            }
            $fotoPath = $request->file('foto_url')->store('aparatur', 'public');
        }

        $aparatur->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'nip_nik' => $request->nip_nik,
            'foto_url' => $fotoPath,
        ]);

        return redirect()->route('admin.aparatur.index')->with('success', 'Data aparatur berhasil diperbarui.');
    }

    public function destroy(Aparatur $aparatur)
    {
        if ($aparatur->foto_url && Storage::disk('public')->exists($aparatur->foto_url)) {
            Storage::disk('public')->delete($aparatur->foto_url);
        }
        
        $aparatur->delete();
        return redirect()->route('admin.aparatur.index')->with('success', 'Data aparatur berhasil dihapus.');
    }
}
