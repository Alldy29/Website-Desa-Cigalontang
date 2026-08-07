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
        $data = $request->except(['_token', 'foto_kades']);
        
        // Simpan data text biasa
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // Handle upload foto kades jika ada
        if ($request->hasFile('foto_kades')) {
            $request->validate([
                'foto_kades' => 'image|mimes:jpg,jpeg,png|max:5120'
            ]);

            $oldFoto = Setting::where('key', 'foto_kades')->first();
            if ($oldFoto && $oldFoto->value && Storage::disk('public')->exists($oldFoto->value)) {
                Storage::disk('public')->delete($oldFoto->value);
            }

            $path = $request->file('foto_kades')->store('profil', 'public');
            Setting::updateOrCreate(
                ['key' => 'foto_kades'],
                ['value' => $path]
            );
        }

        return redirect()->back()->with('success', 'Profil Desa berhasil diperbarui.');
    }
}
