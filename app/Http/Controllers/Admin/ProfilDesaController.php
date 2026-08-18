<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilDesaController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.profil_desa.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', 'foto_sejarah']);
        
        // Simpan data text biasa
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // Handle upload foto sejarah jika ada
        if ($request->hasFile('foto_sejarah')) {
            $request->validate([
                'foto_sejarah' => 'image|mimes:jpg,jpeg,png|max:5120'
            ]);

            $oldFotoSejarah = Setting::where('key', 'foto_sejarah')->first();
            if ($oldFotoSejarah && $oldFotoSejarah->value && Storage::disk('public')->exists($oldFotoSejarah->value)) {
                Storage::disk('public')->delete($oldFotoSejarah->value);
            }

            $path = $request->file('foto_sejarah')->store('profil', 'public');
            Setting::updateOrCreate(
                ['key' => 'foto_sejarah'],
                ['value' => $path]
            );
        }

        return redirect()->back()->with('success', 'Profil Desa berhasil diperbarui.');
    }
}
