<x-app-layout>
    @section('title', 'Detail Aspirasi')
    @section('header_title', 'Tindak Lanjut Aspirasi Warga')

    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ route('admin.aspirasi.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-gray-900 bg-white border border-gray-200 px-4 py-2 rounded-xl shadow-sm transition-colors hover:bg-gray-50">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Daftar
        </a>
    </div>

    <div class="max-w-5xl grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Kolom Kiri: Detail Pesan -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 md:p-8 relative overflow-hidden">
                <!-- Elemen Dekoratif -->
                <div class="absolute top-0 right-0 p-8 opacity-5 pointer-events-none">
                    <svg class="w-32 h-32 text-primary" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                </div>

                <div class="flex items-center gap-4 mb-8 pb-8 border-b border-gray-100 relative z-10">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-primary/20 to-primary/5 flex items-center justify-center text-primary font-black text-2xl border border-primary/20 shadow-inner">
                        {{ strtoupper(substr($aspirasi->nama, 0, 1)) }}
                    </div>
                    <div>
                        <h3 class="text-xl font-black text-gray-900 tracking-tight">{{ $aspirasi->nama }}</h3>
                        <div class="flex flex-wrap items-center gap-4 mt-1">
                            <span class="text-sm text-gray-500 flex items-center gap-1.5"><svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> {{ $aspirasi->email }}</span>
                            @if($aspirasi->whatsapp)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $aspirasi->whatsapp) }}" target="_blank" class="text-sm text-green-600 hover:text-green-700 font-medium flex items-center gap-1.5 transition-colors bg-green-50 px-2 py-0.5 rounded-md">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.711.927 3.149.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.768-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.664.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12z"/></svg> 
                                    {{ $aspirasi->whatsapp }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8 relative z-10">
                    <div class="bg-gray-50/80 rounded-2xl p-4 border border-gray-100 flex items-start gap-3">
                        <div class="p-2 bg-white rounded-lg shadow-sm border border-gray-100 text-primary">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block mb-0.5">Kategori Pesan</span>
                            <span class="text-sm font-bold text-gray-900">{{ $aspirasi->jenis_pesan ? ucwords(str_replace('_', ' ', $aspirasi->jenis_pesan)) : 'Umum' }}</span>
                        </div>
                    </div>
                    <div class="bg-gray-50/80 rounded-2xl p-4 border border-gray-100 flex items-start gap-3">
                        <div class="p-2 bg-white rounded-lg shadow-sm border border-gray-100 text-amber-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block mb-0.5">Lokasi (RT/RW)</span>
                            <span class="text-sm font-bold text-gray-900">{{ $aspirasi->rt_rw ?? 'Tidak Spesifik' }}</span>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <span class="text-xs font-bold text-gray-500 uppercase tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                        Isi Pesan / Pengaduan:
                    </span>
                </div>
                <div class="p-5 md:p-6 bg-slate-50 rounded-2xl border border-slate-100 text-gray-800 leading-relaxed whitespace-pre-wrap text-base relative z-10 shadow-inner font-medium">{{ $aspirasi->pesan }}</div>
                
                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-between items-center text-xs font-medium text-gray-400 relative z-10">
                    <span class="flex items-center gap-1.5"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> Dikirim: {{ $aspirasi->created_at->format('d M Y - H:i') }} WIB</span>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Panel Status -->
        <div class="space-y-6">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 sticky top-6">
                <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
                    <h3 class="text-lg font-black text-gray-900">Tindak Lanjut</h3>
                    @if($aspirasi->status == 'menunggu')
                        <span class="flex w-3 h-3 rounded-full bg-amber-500 animate-pulse" title="Menunggu"></span>
                    @elseif($aspirasi->status == 'diproses')
                        <span class="flex w-3 h-3 rounded-full bg-blue-500" title="Diproses"></span>
                    @else
                        <span class="flex w-3 h-3 rounded-full bg-emerald-500" title="Selesai"></span>
                    @endif
                </div>
                
                <form action="{{ route('admin.aspirasi.updateStatus', $aspirasi->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="space-y-3">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Perbarui Status</label>
                        
                        <!-- Pilihan Menunggu -->
                        <label class="cursor-pointer group block relative">
                            <input type="radio" name="status" value="menunggu" class="peer sr-only" {{ $aspirasi->status == 'menunggu' ? 'checked' : '' }}>
                            <div class="p-4 rounded-2xl border-2 border-gray-100 bg-white hover:bg-gray-50 peer-checked:border-amber-500 peer-checked:bg-amber-50 peer-checked:shadow-sm transition-all flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <div>
                                        <span class="text-sm font-bold text-gray-900 block">Menunggu</span>
                                        <span class="text-xs text-gray-500">Laporan baru masuk</span>
                                    </div>
                                </div>
                                <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-amber-500 flex items-center justify-center group-hover:border-amber-400 transition-colors">
                                    <div class="w-2.5 h-2.5 rounded-full bg-amber-500 scale-0 peer-checked:scale-100 transition-transform"></div>
                                </div>
                            </div>
                        </label>

                        <!-- Pilihan Diproses -->
                        <label class="cursor-pointer group block relative">
                            <input type="radio" name="status" value="diproses" class="peer sr-only" {{ $aspirasi->status == 'diproses' ? 'checked' : '' }}>
                            <div class="p-4 rounded-2xl border-2 border-gray-100 bg-white hover:bg-gray-50 peer-checked:border-blue-500 peer-checked:bg-blue-50 peer-checked:shadow-sm transition-all flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    </div>
                                    <div>
                                        <span class="text-sm font-bold text-gray-900 block">Diproses</span>
                                        <span class="text-xs text-gray-500">Sedang ditindaklanjuti</span>
                                    </div>
                                </div>
                                <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-blue-500 flex items-center justify-center group-hover:border-blue-400 transition-colors">
                                    <div class="w-2.5 h-2.5 rounded-full bg-blue-500 scale-0 peer-checked:scale-100 transition-transform"></div>
                                </div>
                            </div>
                        </label>

                        <!-- Pilihan Selesai -->
                        <label class="cursor-pointer group block relative">
                            <input type="radio" name="status" value="selesai" class="peer sr-only" {{ $aspirasi->status == 'selesai' ? 'checked' : '' }}>
                            <div class="p-4 rounded-2xl border-2 border-gray-100 bg-white hover:bg-gray-50 peer-checked:border-emerald-500 peer-checked:bg-emerald-50 peer-checked:shadow-sm transition-all flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                    <div>
                                        <span class="text-sm font-bold text-gray-900 block">Selesai</span>
                                        <span class="text-xs text-gray-500">Laporan ditutup</span>
                                    </div>
                                </div>
                                <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-emerald-500 flex items-center justify-center group-hover:border-emerald-400 transition-colors">
                                    <div class="w-2.5 h-2.5 rounded-full bg-emerald-500 scale-0 peer-checked:scale-100 transition-transform"></div>
                                </div>
                            </div>
                        </label>
                    </div>

                    <button type="submit" class="w-full flex items-center justify-center gap-2 text-white bg-gray-900 hover:bg-black font-bold rounded-2xl text-sm px-5 py-4 transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
