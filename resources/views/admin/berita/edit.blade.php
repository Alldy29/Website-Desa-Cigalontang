<x-app-layout>
    @section('title', 'Edit Berita')
    @section('header_title', 'Edit Artikel Publikasi')

    <div class="max-w-4xl bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.berita.update', $beritum->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div>
                <label for="judul" class="block mb-2 text-sm font-medium text-gray-900">Judul Berita</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $beritum->judul) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" required>
                @error('judul') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Konten -->
            <div>
                <label for="konten" class="block mb-2 text-sm font-medium text-gray-900">Isi Berita</label>
                <textarea name="konten" id="konten" rows="8" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" required>{{ old('konten', $beritum->konten) }}</textarea>
                @error('konten') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Gambar Sampul -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Ganti Gambar Sampul (Opsional)</label>
                @if($beritum->gambar)
                    <div class="mb-3">
                        <p class="text-xs text-gray-500 mb-2">Gambar saat ini:</p>
                        @if(Storage::disk('public')->exists($beritum->gambar))
                            <img src="{{ Storage::url($beritum->gambar) }}" class="w-48 h-32 object-cover rounded-lg shadow-sm border border-gray-200">
                        @else
                            <img src="{{ $beritum->gambar }}" class="w-48 h-32 object-cover rounded-lg shadow-sm border border-gray-200">
                        @endif
                    </div>
                @endif
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-xl cursor-pointer bg-gray-50 focus:outline-none p-2.5" id="gambar" name="gambar" type="file" accept="image/*">
                <p class="mt-1 text-xs text-gray-500">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                @error('gambar') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="text-white bg-primary hover:bg-green-700 font-medium rounded-xl text-sm px-8 py-3 text-center transition-colors shadow-lg shadow-primary/30"> <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Simpan Perubahan</button>
                <a href="{{ route('admin.berita.index') }}" class="inline-flex items-center gap-2 text-slate-700 bg-slate-100 hover:bg-slate-200 font-medium rounded-xl text-sm px-5 py-2.5 transition-colors"> <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
