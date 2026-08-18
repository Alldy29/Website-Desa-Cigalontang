<x-app-layout>
    @section('title', 'Manajemen Data Desa')
    @section('header_title', 'Manajemen Data Dusun')

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold text-gray-900">Daftar Dusun & Statistik Penduduk</h3>
            <a href="{{ route('admin.dusuns.create') }}" class="bg-primary hover:bg-green-700 text-white px-4 py-2 rounded-xl text-sm font-semibold transition-colors flex items-center gap-2 shadow-lg shadow-primary/30">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Dusun
            </a>
        </div>

        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-4 text-sm">
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="py-3 px-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Dusun</th>
                        <th class="py-3 px-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Laki-laki</th>
                        <th class="py-3 px-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Perempuan</th>
                        <th class="py-3 px-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Total Penduduk</th>
                        <th class="py-3 px-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($dusuns as $dusun)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-3 px-4">
                            <span class="font-semibold text-gray-900">{{ $dusun->nama }}</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <span class="text-gray-600">{{ number_format($dusun->jumlah_laki, 0, ',', '.') }} Jiwa</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <span class="text-gray-600">{{ number_format($dusun->jumlah_perempuan, 0, ',', '.') }} Jiwa</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <span class="font-bold text-gray-900">{{ number_format($dusun->jumlah_laki + $dusun->jumlah_perempuan, 0, ',', '.') }} Jiwa</span>
                        </td>
                        <td class="py-3 px-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.dusuns.edit', $dusun->id) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-slate-700 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 hover:text-primary transition-colors" title="Edit">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg> Edit
                                </a>
                                <form action="{{ route('admin.dusuns.destroy', $dusun->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data dusun ini?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 border border-red-100 rounded-lg hover:bg-red-100 transition-colors" title="Hapus">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-12 text-center text-gray-500">
                            <p>Belum ada data dusun yang ditambahkan.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                @if($dusuns->count() > 0)
                <tfoot>
                    <tr class="bg-gray-50 border-t-2 border-gray-200">
                        <td class="py-3 px-4 font-bold text-gray-900 text-right">TOTAL:</td>
                        <td class="py-3 px-4 text-center font-bold text-teal-600">{{ number_format($dusuns->sum('jumlah_laki'), 0, ',', '.') }} Jiwa</td>
                        <td class="py-3 px-4 text-center font-bold text-emerald-600">{{ number_format($dusuns->sum('jumlah_perempuan'), 0, ',', '.') }} Jiwa</td>
                        <td class="py-3 px-4 text-center font-black text-gray-900">{{ number_format($dusuns->sum('jumlah_laki') + $dusuns->sum('jumlah_perempuan'), 0, ',', '.') }} Jiwa</td>
                        <td></td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>
</x-app-layout>
