<x-app-layout>
    @section('title', 'Aspirasi Warga')
    @section('header_title', 'Kotak Aspirasi & Pengaduan Warga')

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold text-gray-900">Daftar Masukan Terbaru</h3>
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
                        <th class="px-6 py-3">Nama Warga</th>
                        <th class="px-6 py-3">Pesan (Singkat)</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 rounded-tr-xl text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aspirasis as $index => $aspirasi)
                    <tr class="bg-white border-b hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $aspirasis->firstItem() + $index }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $aspirasi->nama }}
                            <div class="text-xs text-gray-400 font-normal">{{ $aspirasi->email }}</div>
                        </td>
                        <td class="px-6 py-4">
                            {{ Str::limit($aspirasi->pesan, 50) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $aspirasi->created_at->format('d M Y H:i') }}
                        </td>
                        <td class="px-6 py-4">
                            @if($aspirasi->status == 'menunggu')
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded">Menunggu</span>
                            @elseif($aspirasi->status == 'diproses')
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">Diproses</span>
                            @else
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Selesai</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right whitespace-nowrap flex justify-end gap-2 items-center">
                            <a href="{{ route('admin.aspirasi.show', $aspirasi->id) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-slate-700 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 hover:text-green-600 transition-colors mr-2"> <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg> Detail & Proses</a>
                            @hasrole('superadmin')
                            <form action="{{ route('admin.aspirasi.destroy', $aspirasi->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus pesan aspirasi ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 border border-red-100 rounded-lg hover:bg-red-100 transition-colors"> <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg> Hapus</button>
                            </form>
                            @endhasrole
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500 bg-gray-50/50">
                            <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            Belum ada pesan aspirasi dari warga.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $aspirasis->links() }}
        </div>
    </div>
</x-app-layout>
