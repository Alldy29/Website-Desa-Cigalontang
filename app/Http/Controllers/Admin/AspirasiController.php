<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    public function index()
    {
        $aspirasis = Aspirasi::latest()->paginate(15);
        return view('admin.aspirasi.index', compact('aspirasis'));
    }

    public function show(Aspirasi $aspirasi)
    {
        return view('admin.aspirasi.show', compact('aspirasi'));
    }

    public function updateStatus(Request $request, Aspirasi $aspirasi)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai'
        ]);

        $aspirasi->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status aspirasi berhasil diperbarui.');
    }

    public function destroy(Aspirasi $aspirasi)
    {
        $aspirasi->delete();
        return redirect()->route('admin.aspirasi.index')->with('success', 'Aspirasi berhasil dihapus.');
    }
}
