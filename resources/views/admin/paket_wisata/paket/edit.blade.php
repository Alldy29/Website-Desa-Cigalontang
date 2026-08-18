<x-app-layout>
    @section('title', 'Edit Paket Wisata')
    @section('header_title', 'Edit Paket Wisata')

    <div class="max-w-2xl bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

        <form method="post" action="{{ route('admin.paket_wisata.paket.update', $paket->id) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <x-input-label for="nama_paket" value="Nama Paket Wisata" />
                <x-text-input id="nama_paket" name="nama_paket" type="text" class="mt-1 block w-full" :value="old('nama_paket', $paket->nama_paket)" required />
                <x-input-error class="mt-2" :messages="$errors->get('nama_paket')" />
            </div>

            <div>
                <x-input-label for="harga" value="Harga Paket (Rp)" />
                <x-text-input id="harga" name="harga" type="number" class="mt-1 block w-full" :value="old('harga', (int)$paket->harga)" required />
                <x-input-error class="mt-2" :messages="$errors->get('harga')" />
            </div>

            <div>
                <x-input-label for="deskripsi" value="Deskripsi Lengkap" />
                <textarea id="deskripsi" name="deskripsi" rows="5" class="mt-1 block w-full border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm" required>{{ old('deskripsi', $paket->deskripsi) }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('deskripsi')" />
            </div>

            <div>
                <x-input-label for="link_pemesanan" value="Link Paket Wisata (Misal: link Shopee, Traveloka, atau WA)" />
                <x-text-input id="link_pemesanan" name="link_pemesanan" type="url" class="mt-1 block w-full" :value="old('link_pemesanan', $paket->link_pemesanan)" placeholder="Masukkan URL atau link terkait..." />
                <x-input-error class="mt-2" :messages="$errors->get('link_pemesanan')" />
            </div>

            <div>
                <x-input-label for="gambar" value="Foto Paket (Biarkan kosong jika tidak diubah, Maks 10MB)" />
                <input id="gambar" name="gambar" type="file" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary\/10 file:text-primary-dark hover:file:bg-primary\/20" />
                <x-input-error class="mt-2" :messages="$errors->get('gambar')" />
                
                @if($paket->gambar)
                    <div class="mt-4">
                        <p class="text-sm text-gray-500 mb-2">Foto saat ini:</p>
                        <img src="{{ asset('storage/' . $paket->gambar) }}" class="w-48 h-32 object-cover rounded-lg border">
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="inline-flex items-center gap-2 text-white bg-primary hover:bg-green-700 font-medium rounded-xl text-sm px-5 py-2.5 transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.paket_wisata.paket.index') }}" class="inline-flex items-center gap-2 text-slate-700 bg-slate-100 hover:bg-slate-200 font-medium rounded-xl text-sm px-5 py-2.5 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
