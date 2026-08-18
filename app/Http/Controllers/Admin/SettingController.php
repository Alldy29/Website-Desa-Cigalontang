<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', 'foto_kades']);
        
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

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

        return redirect()->back()->with('success', 'Pengaturan website berhasil diperbarui.');
    }
}
