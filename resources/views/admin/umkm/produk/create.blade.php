<x-app-layout>
    @section('title', 'Tambah Produk')
    @section('header_title', 'Tambah Produk UMKM Baru')

    <div class="max-w-4xl bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.umkm.produk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Produk -->
                <div>
                    <label for="nama_produk" class="block mb-2 text-sm font-medium text-gray-900">Nama Produk</label>
                    <input type="text" name="nama_produk" id="nama_produk" value="{{ old('nama_produk') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Contoh: Keripik Pisang Rasa Coklat" required>
                    @error('nama_produk') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Kategori -->
                <div>
                    <label for="kategori_umkm_id" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                    <select name="kategori_umkm_id" id="kategori_umkm_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_umkm_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('kategori_umkm_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Produk</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Jelaskan detail produk, bahan, dsb." required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Harga -->
                <div>
                    <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga (Rp)</label>
                    <input type="number" name="harga" id="harga" value="{{ old('harga') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Contoh: 15000" required>
                    @error('harga') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Mitra UMKM -->
                <div>
                    <label for="mitra_umkm_id" class="block mb-2 text-sm font-medium text-gray-900">Mitra Penjual (Opsional)</label>
                    <select name="mitra_umkm_id" id="mitra_umkm_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5">
                        <option value="">Pilih Mitra</option>
                        @foreach($mitras as $mitra)
                            <option value="{{ $mitra->id }}" {{ old('mitra_umkm_id') == $mitra->id ? 'selected' : '' }}>{{ $mitra->nama_mitra }}</option>
                        @endforeach
                    </select>
                    <p class="mt-1 text-xs text-gray-500">Nomor WA otomatis mengikuti profil Mitra. Kelola di menu Mitra UMKM.</p>
                    @error('mitra_umkm_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Link Marketplace -->
                <div class="md:col-span-2">
                    <label for="link_marketplace" class="block mb-2 text-sm font-medium text-gray-900">Link Marketplace (Opsional)</label>
                    <input type="url" name="link_marketplace" id="link_marketplace" value="{{ old('link_marketplace') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Contoh: https://shopee.co.id/produk...">
                    @error('link_marketplace') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Foto -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Foto Produk</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-xl cursor-pointer bg-gray-50 focus:outline-none p-2.5" id="gambar" name="gambar" type="file" accept="image/*" required>
                <p class="mt-1 text-xs text-gray-500">Format yang didukung: JPG, JPEG, PNG. Ukuran maksimal: 5MB.</p>
                @error('gambar') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="text-white bg-primary hover:bg-green-700 font-medium rounded-xl text-sm px-8 py-3 text-center transition-colors shadow-lg shadow-primary/30"> <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Simpan Produk</button>
                <a href="{{ route('admin.umkm.produk.index') }}" class="inline-flex items-center gap-2 text-slate-700 bg-slate-100 hover:bg-slate-200 font-medium rounded-xl text-sm px-5 py-2.5 transition-colors"> <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
