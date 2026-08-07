<x-app-layout>
    @section('title', 'Edit Aparatur')
    @section('header_title', 'Edit Perangkat Desa')

    <div class="max-w-2xl bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.aparatur.update', $aparatur->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div>
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap (Termasuk Gelar)</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $aparatur->nama) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" required>
                @error('nama') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Jabatan -->
            <div>
                <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $aparatur->jabatan) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" required>
                @error('jabatan') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- NIP / NIK -->
            <div>
                <label for="nip_nik" class="block mb-2 text-sm font-medium text-gray-900">NIP / NIK (Opsional)</label>
                <input type="text" name="nip_nik" id="nip_nik" value="{{ old('nip_nik', $aparatur->nip_nik) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5">
                @error('nip_nik') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Foto -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Ganti Foto Profil (Opsional)</label>
                @if($aparatur->foto_url)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $aparatur->foto_url) }}" class="w-32 h-40 object-cover object-top rounded-lg shadow-sm border border-gray-200">
                    </div>
                @endif
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-xl cursor-pointer bg-gray-50 focus:outline-none p-2.5" id="foto_url" name="foto_url" type="file" accept="image/*">
                <p class="mt-1 text-xs text-gray-500">Biarkan kosong jika tidak ingin mengubah foto.</p>
                @error('foto_url') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="text-white bg-primary hover:bg-green-700 font-medium rounded-xl text-sm px-8 py-3 text-center transition-colors shadow-lg shadow-primary/30"> <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Simpan Perubahan</button>
                <a href="{{ route('admin.aparatur.index') }}" class="inline-flex items-center gap-2 text-slate-700 bg-slate-100 hover:bg-slate-200 font-medium rounded-xl text-sm px-5 py-2.5 transition-colors"> <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
