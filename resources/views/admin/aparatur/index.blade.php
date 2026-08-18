<x-app-layout>
    @section('title', 'Perangkat Desa')
    @section('header_title', 'Struktur Organisasi Pemerintah Desa')

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold text-gray-900">Daftar Aparatur Desa</h3>
            <a href="{{ route('admin.aparatur.create') }}" class="bg-primary hover:bg-green-700 text-white px-4 py-2 rounded-xl text-sm font-semibold transition-colors flex items-center gap-2 shadow-lg shadow-primary/30">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Aparatur
            </a>
        </div>

        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-4 text-sm">
            {{ session('success') }}
        </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($aparaturs as $aparatur)
            <div class="bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition-shadow overflow-hidden text-center group">
                <div class="h-48 overflow-hidden relative">
                    <img src="{{ asset('storage/' . $aparatur->foto_url) }}" alt="{{ $aparatur->nama }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-3">
                        <a href="{{ route('admin.aparatur.edit', $aparatur->id) }}" class="bg-primary hover:bg-primary text-white p-2 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </a>
                        <form action="{{ route('admin.aparatur.destroy', $aparatur->id) }}" method="POST" onsubmit="return confirm('Hapus data aparatur ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="p-4">
                    <h4 class="font-bold text-gray-900 truncate">{{ $aparatur->nama }}</h4>
                    <p class="text-sm font-medium text-primary mb-1">{{ $aparatur->jabatan }}</p>
                    @if($aparatur->nip_nik)
                        <p class="text-xs text-gray-500">NIP/NIK: {{ $aparatur->nip_nik }}</p>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-full py-12 text-center text-gray-500">
                <p>Belum ada data aparatur desa.</p>
            </div>
            @endforelse
        </div>
        
        <div class="mt-8 flex justify-center">
            {{ $aparaturs->links('vendor.pagination.custom') }}
        </div>
    </div>
</x-app-layout>
