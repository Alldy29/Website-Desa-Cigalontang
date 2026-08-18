<x-app-layout>
    @section('title', 'Aspirasi Warga')
    @section('header_title', 'Kotak Aspirasi & Pengaduan Warga')

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 p-6 border-b border-gray-100 bg-white">
            <h3 class="text-lg font-bold text-gray-900">Daftar Masukan Terbaru</h3>
            <div class="flex w-full sm:w-auto">
                <form action="{{ route('admin.aspirasi.index') }}" method="GET" class="relative w-full sm:w-64">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama/pesan..." oninput="clearTimeout(this.timer); this.timer = setTimeout(() => { this.form.submit(); }, 500);" class="w-full bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block pl-10 p-2.5 shadow-sm transition-colors hover:border-gray-300">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </form>
            </div>
        </div>
        <script>
            if (performance.getEntriesByType("navigation")[0]?.type === "reload" && window.location.search.includes('search')) {
                window.location.href = window.location.pathname;
            }
        </script>

        @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 m-6 mb-0 rounded-r-xl text-sm shadow-sm">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                {{ session('success') }}
            </div>
        </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-600 uppercase bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-4 py-3 font-semibold w-12 text-center">No</th>
                        <th class="px-4 py-3 font-semibold">Pengirim</th>
                        <th class="px-4 py-3 font-semibold">Kategori</th>
                        <th class="px-4 py-3 font-semibold">Pesan</th>
                        <th class="px-4 py-3 font-semibold">Tanggal</th>
                        <th class="px-4 py-3 font-semibold text-center">Status</th>
                        <th class="px-4 py-3 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($aspirasis as $index => $aspirasi)
                    <tr class="bg-white hover:bg-slate-50 transition-colors duration-200">
                        <td class="px-4 py-4 font-medium text-gray-500 text-center">
                            {{ $aspirasis->firstItem() + $index }}
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary/20 to-primary/10 flex items-center justify-center text-primary font-bold text-sm border border-primary/20">
                                    {{ strtoupper(substr($aspirasi->nama, 0, 1)) }}
                                </div>
                                <div>
                                    <span class="block font-bold text-gray-900 mb-0.5">{{ $aspirasi->nama }}</span>
                                    <div class="flex items-center gap-3 text-xs text-gray-500">
                                        <span class="flex items-center gap-1" title="Email"><svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> {{ Str::limit($aspirasi->email, 15) }}</span>
                                        @if($aspirasi->whatsapp)
                                        <span class="flex items-center gap-1" title="WhatsApp"><svg class="w-3.5 h-3.5 text-green-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.711.927 3.149.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.768-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.664.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 3.825 0 6.938 3.112 6.939 6.937.001 3.826-3.113 6.938-6.939 6.943z"/></svg> {{ $aspirasi->whatsapp }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4">
                            <span class="inline-block px-2.5 py-1 rounded-md border border-primary/20 text-[11px] font-bold bg-primary/5 text-primary mb-1.5 shadow-sm leading-tight">
                                {{ $aspirasi->jenis_pesan ? ucwords(str_replace('_', ' ', $aspirasi->jenis_pesan)) : 'Umum' }}
                            </span>
                            @if($aspirasi->rt_rw)
                            <div class="text-xs text-gray-500 flex items-center gap-1.5 mt-1">
                                <svg class="w-3.5 h-3.5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                <span>{{ $aspirasi->rt_rw }}</span>
                            </div>
                            @endif
                        </td>
                        <td class="px-4 py-4">
                            <p class="text-gray-600 line-clamp-2 max-w-[180px] text-xs leading-relaxed" title="{{ $aspirasi->pesan }}">{{ $aspirasi->pesan }}</p>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $aspirasi->created_at->format('d M Y') }}</div>
                            <div class="text-xs text-gray-400">{{ $aspirasi->created_at->format('H:i') }} WIB</div>
                        </td>
                        <td class="px-4 py-4 text-center">
                            @if($aspirasi->status == 'menunggu')
                                <span class="inline-flex items-center gap-1 bg-amber-50 text-amber-700 border border-amber-200/60 text-[11px] font-bold px-2 py-1 rounded-md shadow-sm">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span> Menunggu
                                </span>
                            @elseif($aspirasi->status == 'diproses')
                                <span class="inline-flex items-center gap-1 bg-blue-50 text-blue-700 border border-blue-200/60 text-[11px] font-bold px-2 py-1 rounded-md shadow-sm">
                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Diproses
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 bg-emerald-50 text-emerald-700 border border-emerald-200/60 text-[11px] font-bold px-2 py-1 rounded-md shadow-sm">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Selesai
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-4 text-right whitespace-nowrap">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.aspirasi.show', $aspirasi->id) }}" class="inline-flex items-center justify-center w-8 h-8 text-primary bg-primary/10 hover:bg-primary hover:text-white rounded-lg transition-colors shadow-sm" title="Detail & Proses">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </a>
                                @hasrole('superadmin')
                                <form action="{{ route('admin.aspirasi.destroy', $aspirasi->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus pesan aspirasi ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center justify-center w-8 h-8 text-red-600 bg-red-50 hover:bg-red-600 hover:text-white rounded-lg transition-colors shadow-sm" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                                @endhasrole
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-500">
                                <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                </div>
                                <p class="text-base font-medium text-gray-900">Belum ada pesan aspirasi</p>
                                <p class="text-sm mt-1">Belum ada warga yang mengirimkan masukan atau pengaduan.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($aspirasis->hasPages())
        <div class="p-4 border-t border-gray-100 bg-gray-50/50">
            {{ $aspirasis->onEachSide(1)->links('vendor.pagination.custom') }}
        </div>
        @endif
    </div>
</x-app-layout>
