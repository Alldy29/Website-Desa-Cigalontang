<x-app-layout>
    @section('title', 'Manajemen Berita')
    @section('header_title', 'Daftar Berita & Artikel')

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
            <h3 class="text-lg font-bold text-gray-900">Publikasi Desa</h3>
            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                <form action="{{ route('admin.berita.index') }}" method="GET" class="relative w-full sm:w-64">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berita..." oninput="clearTimeout(this.timer); this.timer = setTimeout(() => { this.form.submit(); }, 500);" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block pl-10 p-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </form>
                <script>
                    if (performance.getEntriesByType("navigation")[0]?.type === "reload" && window.location.search.includes('search')) {
                        window.location.href = window.location.pathname;
                    }
                </script>
                <a href="{{ route('admin.berita.create') }}" class="shrink-0 bg-primary hover:bg-green-700 text-white px-4 py-2 rounded-xl text-sm font-semibold transition-colors flex items-center justify-center gap-2 shadow-lg shadow-primary/30">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Berita
                </a>
            </div>
        </div>

        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-4 text-sm">
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 rounded-t-xl">
                    <tr>
                        <th class="px-6 py-3 rounded-tl-xl w-16">No</th>
                        <th class="px-6 py-3">Gambar Sampul</th>
                        <th class="px-6 py-3">Judul Berita</th>
                        <th class="px-6 py-3">Tanggal Dibuat</th>
                        <th class="px-6 py-3 rounded-tr-xl text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($beritas as $index => $berita)
                    <tr class="bg-white border-b hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $beritas->firstItem() + $index }}
                        </td>
                        <td class="px-6 py-4">
                            @if($berita->gambar)
                                @if(Storage::disk('public')->exists($berita->gambar))
                                    <img src="{{ Storage::url($berita->gambar) }}" class="w-16 h-12 object-cover rounded-md shadow-sm" alt="{{ $berita->judul }}">
                                @else
                                    <img src="{{ $berita->gambar }}" class="w-16 h-12 object-cover rounded-md shadow-sm" alt="{{ $berita->judul }}">
                                @endif
                            @else
                                <div class="w-16 h-12 bg-gray-100 rounded-md flex items-center justify-center text-xs text-gray-400">No Image</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $berita->judul }}
                            <div class="text-xs text-gray-400 font-normal mt-1">{{ Str::limit(strip_tags($berita->konten), 50) }}</div>
                        </td>
                        <td class="px-6 py-4">
                            {{ $berita->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap flex justify-end gap-2 items-center">
                            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-slate-700 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 hover:text-primary transition-colors mr-2"> <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg> Edit</a>
                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 border border-red-100 rounded-lg hover:bg-red-100 transition-colors"> <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg> Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            Belum ada berita yang dipublikasikan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $beritas->onEachSide(1)->links('vendor.pagination.custom') }}
        </div>
    </div>
</x-app-layout>
