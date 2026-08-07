<x-app-layout>
    @section('title', 'Detail Aspirasi')
    @section('header_title', 'Tindak Lanjut Aspirasi Warga')

    <div class="max-w-4xl grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Pesan Aspirasi -->
        <div class="md:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center gap-4 mb-6 pb-6 border-b border-gray-100">
                <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xl">
                    {{ substr($aspirasi->nama, 0, 1) }}
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">{{ $aspirasi->nama }}</h3>
                    <p class="text-sm text-gray-500">{{ $aspirasi->email }}</p>
                </div>
            </div>

            <div class="mb-2">
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Isi Pesan / Laporan:</span>
            </div>
            <div class="p-4 bg-gray-50 rounded-xl border border-gray-100 text-gray-800 leading-relaxed whitespace-pre-wrap">{{ $aspirasi->pesan }}</div>
            
            <div class="mt-6 flex justify-between items-center text-sm text-gray-500">
                <span>Dikirim pada: {{ $aspirasi->created_at->format('d M Y - H:i') }} WIB</span>
            </div>
        </div>

        <!-- Panel Status -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 self-start">
            <h3 class="text-base font-bold text-gray-900 mb-4 pb-2 border-b border-gray-100">Status Tindak Lanjut</h3>
            
            <form action="{{ route('admin.aspirasi.updateStatus', $aspirasi->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Ubah Status</label>
                    <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" required>
                        <option value="menunggu" {{ $aspirasi->status == 'menunggu' ? 'selected' : '' }}>🟡 Menunggu / Baru</option>
                        <option value="diproses" {{ $aspirasi->status == 'diproses' ? 'selected' : '' }}>🔵 Sedang Diproses</option>
                        <option value="selesai" {{ $aspirasi->status == 'selesai' ? 'selected' : '' }}>🟢 Selesai Ditindaklanjuti</option>
                    </select>
                </div>

                <button type="submit" class="w-full text-white bg-primary hover:bg-green-700 font-medium rounded-xl text-sm px-5 py-2.5 text-center transition-colors shadow-lg shadow-primary/30">Update Status</button>
            </form>

            <div class="mt-6 pt-6 border-t border-gray-100">
                <a href="{{ route('admin.aspirasi.index') }}" class="text-gray-500 hover:text-gray-900 text-sm flex items-center gap-2 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar
                </a>
            </div>
        </div>

    </div>
</x-app-layout>
