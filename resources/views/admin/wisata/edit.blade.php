<x-app-layout>
    @section('title', 'Edit Destinasi Wisata')
    @section('header_title', 'Edit Direktori Wisata')

    <div class="max-w-4xl bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.wisata.update', $wisatum->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama Wisata -->
            <div>
                <label for="nama_wisata" class="block mb-2 text-sm font-medium text-gray-900">Nama Destinasi Wisata</label>
                <input type="text" name="nama_wisata" id="nama_wisata" value="{{ old('nama_wisata', $wisatum->nama_wisata) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" required>
                @error('nama_wisata') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Wisata</label>
                <textarea name="deskripsi" id="deskripsi" rows="6" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" required>{{ old('deskripsi', $wisatum->deskripsi) }}</textarea>
                @error('deskripsi') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Lokasi -->
                <div>
                    <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900">Lokasi / Alamat Lengkap</label>
                    <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi', $wisatum->lokasi) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5">
                    @error('lokasi') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Kategori -->
                <div>
                    <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                    <select name="kategori" id="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" required>
                        <option value="Wisata Alam" {{ old('kategori', $wisatum->kategori) == 'Wisata Alam' ? 'selected' : '' }}>Wisata Alam</option>
                        <option value="Wisata Buatan" {{ old('kategori', $wisatum->kategori) == 'Wisata Buatan' ? 'selected' : '' }}>Wisata Buatan</option>
                        <option value="Budaya & Sejarah" {{ old('kategori', $wisatum->kategori) == 'Budaya & Sejarah' ? 'selected' : '' }}>Budaya & Sejarah</option>
                        <option value="Kesenian" {{ old('kategori', $wisatum->kategori) == 'Kesenian' ? 'selected' : '' }}>Kesenian Lokal</option>
                    </select>
                    @error('kategori') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Foto -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Ganti Foto Utama (Opsional)</label>
                @if($wisatum->foto_url)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $wisatum->foto_url) }}" class="w-64 h-40 object-cover rounded-lg shadow-sm border border-gray-200">
                    </div>
                @endif
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-xl cursor-pointer bg-gray-50 focus:outline-none p-2.5" id="foto_url" name="foto_url" type="file" accept="image/*">
                <p class="mt-1 text-xs text-gray-500">Biarkan kosong jika tidak ingin mengubah foto.</p>
                @error('foto_url') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="text-white bg-primary hover:bg-green-700 font-medium rounded-xl text-sm px-8 py-3 text-center transition-colors shadow-lg shadow-primary/30"> <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Simpan Perubahan</button>
                <a href="{{ route('admin.wisata.index') }}" class="inline-flex items-center gap-2 text-slate-700 bg-slate-100 hover:bg-slate-200 font-medium rounded-xl text-sm px-5 py-2.5 transition-colors"> <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
