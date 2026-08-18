<x-app-layout>
    @section('title', 'Mitra UMKM')
    @section('header_title', 'Manajemen Mitra UMKM')

    <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Manajemen Mitra UMKM</h2>
            <p class="text-sm text-gray-500 mt-1">Kelola data mitra penjual atau toko untuk produk UMKM desa.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <form action="{{ route('admin.umkm.mitra.index') }}" method="GET" class="relative w-full sm:w-64">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari mitra..." oninput="clearTimeout(this.timer); this.timer = setTimeout(() => { this.form.submit(); }, 500);" class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block pl-10 p-2.5 shadow-sm">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </form>
            <script>
                if (performance.getEntriesByType("navigation")[0]?.type === "reload" && window.location.search.includes('search')) {
                    window.location.href = window.location.pathname;
                }
            </script>
            <a href="{{ route('admin.umkm.mitra.create') }}" class="shrink-0 inline-flex items-center justify-center gap-2 bg-primary hover:bg-green-700 text-white font-medium rounded-xl text-sm px-5 py-2.5 transition-all shadow-sm hover:shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Mitra
            </a>
        </div>
    </div>

    @if(session('error'))
    <div class="p-4 mb-6 text-sm text-red-800 rounded-xl bg-red-50 border border-red-200">
        {{ session('error') }}
    </div>
    @endif
    
    @if(session('success'))
    <div class="p-4 mb-6 text-sm text-green-800 rounded-xl bg-green-50 border border-green-200">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50/50 border-b border-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-semibold w-16 text-center">No</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Nama Mitra</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Kontak & Alamat</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-center">Jumlah Produk</th>
                        <th scope="col" class="px-6 py-4 font-semibold w-32 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($mitras as $index => $mitra)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-center text-gray-500">{{ $mitras->firstItem() + $index }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $mitra->nama_mitra }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-gray-900">{{ $mitra->no_whatsapp ?: '-' }}</div>
                            <div class="text-xs text-gray-400 font-normal mt-0.5">{{ Str::limit($mitra->alamat ?: '-', 50) }}</div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-blue-50 text-blue-700 border border-blue-200 text-xs font-semibold px-2.5 py-1 rounded-md whitespace-nowrap inline-block">
                                {{ $mitra->umkm_products_count }} Produk
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.umkm.mitra.edit', $mitra->id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <form action="{{ route('admin.umkm.mitra.destroy', $mitra->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus mitra ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            Belum ada data mitra UMKM.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($mitras->hasPages())
        <div class="p-4 border-t border-gray-100">
            {{ $mitras->onEachSide(1)->links('vendor.pagination.custom') }}
        </div>
        @endif
    </div>
</x-app-layout>
