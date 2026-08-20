<x-app-layout>
    @section('title', 'Tambah Paket Wisata')
    @section('header_title', 'Tambah Paket Wisata Baru')

    <div class="max-w-2xl bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

        <form method="post" action="{{ route('admin.paket_wisata.paket.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <x-input-label for="nama_paket" value="Nama Paket Wisata" />
                <x-text-input id="nama_paket" name="nama_paket" type="text" class="mt-1 block w-full" :value="old('nama_paket')" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('nama_paket')" />
            </div>

            <div>
                <x-input-label for="harga" value="Harga Paket (Rp)" />
                <x-text-input id="harga" name="harga" type="number" class="mt-1 block w-full" :value="old('harga', 0)" required />
                <x-input-error class="mt-2" :messages="$errors->get('harga')" />
            </div>

            <div>
                <x-input-label for="deskripsi" value="Deskripsi Lengkap" />
                <textarea id="deskripsi" name="deskripsi" rows="5" class="mt-1 block w-full border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm" required>{{ old('deskripsi') }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('deskripsi')" />
            </div>

            <div>
                <x-input-label for="link_pemesanan" value="Link GitHub (URL Repositori atau Project)" />
                <x-text-input id="link_pemesanan" name="link_pemesanan" type="url" class="mt-1 block w-full" :value="old('link_pemesanan')" placeholder="Misal: https://github.com/username/project..." />
                <x-input-error class="mt-2" :messages="$errors->get('link_pemesanan')" />
            </div>

            <div x-data="{ previewUrl: '' }">
                <label class="block mb-2 text-sm font-medium text-gray-900">Foto Paket (Opsional, Maks 10MB)</label>
                <template x-if="previewUrl">
                    <div class="mb-3">
                        <img :src="previewUrl" class="w-64 h-40 object-cover rounded-lg shadow-sm border border-gray-200">
                    </div>
                </template>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-xl cursor-pointer bg-gray-50 focus:outline-none p-2.5" id="gambar" name="gambar" type="file" accept="image/*" @change="previewUrl = URL.createObjectURL($event.target.files[0])">
                <p class="mt-1 text-xs text-gray-500">Format yang didukung: JPG, JPEG, PNG. Ukuran maksimal: 10MB.</p>
                <x-input-error class="mt-2" :messages="$errors->get('gambar')" />
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="inline-flex items-center gap-2 text-white bg-primary hover:bg-green-700 font-medium rounded-xl text-sm px-5 py-2.5 transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Simpan Paket
                </button>
                <a href="{{ route('admin.paket_wisata.paket.index') }}" class="inline-flex items-center gap-2 text-slate-700 bg-slate-100 hover:bg-slate-200 font-medium rounded-xl text-sm px-5 py-2.5 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
