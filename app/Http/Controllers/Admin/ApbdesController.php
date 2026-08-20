<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apbdes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApbdesController extends Controller
{
    public function index()
    {
        $apbdesList = Apbdes::orderBy('tahun', 'desc')->get();
        return view('admin.apbdes.index', compact('apbdesList'));
    }

    public function create()
    {
        return view('admin.apbdes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer|unique:apbdes,tahun',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ], [
            'tahun.unique' => 'Data APBDes untuk tahun tersebut sudah ada.',
            'gambar.max' => 'Ukuran gambar maksimal 5MB.'
        ]);

        $path = $request->file('gambar')->store('apbdes', 'public');

        Apbdes::create([
            'tahun' => $request->tahun,
            'gambar' => $path,
        ]);

        return redirect()->route('admin.apbdes.index')->with('success', 'Data APBDes berhasil ditambahkan.');
    }

    public function edit(Apbdes $apbde) // Laravel resource routing uses $apbde by default for 'apbdes'
    {
        return view('admin.apbdes.edit', compact('apbde'));
    }

    public function update(Request $request, Apbdes $apbde)
    {
        $request->validate([
            'tahun' => 'required|integer|unique:apbdes,tahun,' . $apbde->id,
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ], [
            'tahun.unique' => 'Data APBDes untuk tahun tersebut sudah ada.',
            'gambar.max' => 'Ukuran gambar maksimal 5MB.'
        ]);

        $data = ['tahun' => $request->tahun];

        if ($request->hasFile('gambar')) {
            if ($apbde->gambar && Storage::disk('public')->exists($apbde->gambar)) {
                Storage::disk('public')->delete($apbde->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('apbdes', 'public');
        }

        $apbde->update($data);

        return redirect()->route('admin.apbdes.index')->with('success', 'Data APBDes berhasil diperbarui.');
    }

    public function destroy(Apbdes $apbde)
    {
        if ($apbde->gambar && Storage::disk('public')->exists($apbde->gambar)) {
            Storage::disk('public')->delete($apbde->gambar);
        }
        
        $apbde->delete();

        return redirect()->route('admin.apbdes.index')->with('success', 'Data APBDes berhasil dihapus.');
    }
}
