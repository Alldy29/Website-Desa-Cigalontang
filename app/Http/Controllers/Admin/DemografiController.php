<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Demografi;
use Illuminate\Http\Request;

class DemografiController extends Controller
{
    public function index()
    {
        $pendidikans = Demografi::where('kategori', 'pendidikan')->orderBy('jumlah', 'desc')->get();
        $pekerjaans = Demografi::where('kategori', 'pekerjaan')->orderBy('jumlah', 'desc')->get();
        
        return view('admin.demografis.index', compact('pendidikans', 'pekerjaans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|in:pendidikan,pekerjaan',
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
        ]);

        Demografi::create($request->all());

        return redirect()->route('admin.demografis.index')->with('success', 'Data demografi berhasil ditambahkan.');
    }

    public function update(Request $request, Demografi $demografi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
        ]);

        // Kategori tidak boleh diubah untuk mencegah inkonsistensi
        $demografi->update([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah
        ]);

        return redirect()->route('admin.demografis.index')->with('success', 'Data demografi berhasil diperbarui.');
    }

    public function destroy(Demografi $demografi)
    {
        $demografi->delete();

        return redirect()->route('admin.demografis.index')->with('success', 'Data demografi berhasil dihapus.');
    }
}
