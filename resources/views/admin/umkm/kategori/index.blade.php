<x-app-layout>
    @section('title', 'Kategori UMKM')
    @section('header_title', 'Manajemen Kategori UMKM')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Form Tambah Kategori -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-24">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Tambah Kategori</h3>
                
                @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-4 text-sm">
                    {{ session('error') }}
                </div>
                @endif
                
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-4 text-sm">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('admin.umkm.kategori.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_kategori" class="block mb-2 text-sm font-medium text-gray-900">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Contoh: Makanan Ringan" required>
                        @error('nama_kategori') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 text-white bg-slate-800 hover:bg-slate-900 font-medium rounded-xl text-sm px-5 py-2.5 transition-colors shadow-sm"> <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Simpan Kategori</button>
                </form>
            </div>
        </div>

        <!-- Daftar Kategori -->
        <div class="md:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Daftar Kategori</h3>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 rounded-t-xl">
                            <tr>
                                <th class="px-6 py-3 rounded-tl-xl w-16">No</th>
                                <th class="px-6 py-3">Kategori</th>
                                <th class="px-6 py-3 text-center">Jumlah Produk</th>
                                <th class="px-6 py-3 rounded-tr-xl text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kategoris as $index => $kategori)
                            <tr class="bg-white border-b hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ $kategori->nama_kategori }}
                                    <div class="text-xs text-gray-400 font-normal">Slug: {{ $kategori->slug }}</div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded whitespace-nowrap inline-block">{{ $kategori->umkm_products_count }} Produk</span>
                                </td>
                                <td class="px-6 py-4 text-right whitespace-nowrap flex justify-end gap-2 items-center">
                                    <form action="{{ route('admin.umkm.kategori.destroy', $kategori->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 border border-red-100 rounded-lg hover:bg-red-100 transition-colors"> <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                    Belum ada kategori UMKM.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
