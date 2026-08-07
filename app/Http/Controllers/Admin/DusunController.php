<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DusunController extends Controller
{
    public function index()
    {
        $dusuns = \App\Models\Dusun::latest()->get();
        return view('admin.dusuns.index', compact('dusuns'));
    }

    public function create()
    {
        return view('admin.dusuns.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah_laki' => 'required|integer|min:0',
            'jumlah_perempuan' => 'required|integer|min:0',
        ]);

        \App\Models\Dusun::create($validated);
        return redirect()->route('admin.dusuns.index')->with('success', 'Data Dusun berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $dusun = \App\Models\Dusun::findOrFail($id);
        return view('admin.dusuns.edit', compact('dusun'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah_laki' => 'required|integer|min:0',
            'jumlah_perempuan' => 'required|integer|min:0',
        ]);

        $dusun = \App\Models\Dusun::findOrFail($id);
        $dusun->update($validated);
        return redirect()->route('admin.dusuns.index')->with('success', 'Data Dusun berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $dusun = \App\Models\Dusun::findOrFail($id);
        $dusun->delete();
        return redirect()->route('admin.dusuns.index')->with('success', 'Data Dusun berhasil dihapus!');
    }
}
