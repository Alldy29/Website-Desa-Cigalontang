<x-app-layout>
    @section('title', 'Dashboard Ringkasan')
    @section('header_title', 'Dashboard Overview')

    <!-- Welcome Section -->
    <div class="mb-8 bg-gradient-to-r from-slate-900 to-slate-800 rounded-3xl p-8 text-white shadow-lg relative overflow-hidden">
        <!-- Decorative Shapes -->
        <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-white opacity-10 blur-2xl"></div>
        <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-48 h-48 rounded-full bg-white opacity-10 blur-2xl"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <h2 class="text-3xl font-extrabold mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
                <p class="text-slate-300 text-lg">Anda login sebagai <span class="font-bold text-white capitalize">{{ Auth::user()->roles->pluck('name')->implode(', ') }}</span>. Berikut adalah ringkasan aktivitas website Desa Cigalontang hari ini.</p>
            </div>
            <div class="shrink-0 bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 text-center min-w-[150px]">
                <p class="text-xs font-semibold text-slate-300 uppercase tracking-wide">Tanggal Hari Ini</p>
                <p class="text-xl font-bold mt-1">{{ now()->translatedFormat('d F Y') }}</p>
            </div>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        <!-- Stat Card 1 -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition-shadow group">
            <div class="w-14 h-14 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Berita</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ number_format($totalBerita, 0, ',', '.') }}</h3>
            </div>
        </div>

        <!-- Stat Card 2 -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition-shadow group">
            <div class="w-14 h-14 rounded-full bg-orange-50 text-orange-500 flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Produk UMKM</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ number_format($totalUmkm, 0, ',', '.') }}</h3>
            </div>
        </div>

        <!-- Stat Card 3 -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition-shadow group">
            <div class="w-14 h-14 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Foto Galeri</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ number_format($totalGaleri, 0, ',', '.') }}</h3>
            </div>
        </div>

        <!-- Stat Card 4 -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4 hover:shadow-md transition-shadow group">
            <div class="w-14 h-14 rounded-full bg-purple-50 text-purple-500 flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Aspirasi Masuk</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ number_format($totalAspirasi, 0, ',', '.') }}</h3>
            </div>
        </div>
        
    </div>

    <!-- Quick Actions and Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left: Quick Actions -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-6">Akses Cepat</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    
                    @hasanyrole('superadmin|admin_desa')
                    <a href="{{ route('admin.berita.create') }}" class="flex flex-col items-center justify-center p-6 bg-gray-50 rounded-xl hover:bg-slate-100 hover:text-slate-800 transition-colors border border-gray-100 group">
                        <div class="w-12 h-12 bg-white rounded-full shadow-sm flex items-center justify-center mb-3 group-hover:shadow-md transition-shadow">
                            <svg class="w-6 h-6 text-gray-400 group-hover:text-slate-800 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-700 group-hover:text-slate-800">Tulis Berita</span>
                    </a>
                    <a href="{{ route('admin.galeri.create') }}" class="flex flex-col items-center justify-center p-6 bg-gray-50 rounded-xl hover:bg-slate-100 hover:text-slate-800 transition-colors border border-gray-100 group">
                        <div class="w-12 h-12 bg-white rounded-full shadow-sm flex items-center justify-center mb-3 group-hover:shadow-md transition-shadow">
                            <svg class="w-6 h-6 text-gray-400 group-hover:text-slate-800 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-700 group-hover:text-slate-800">Upload Galeri</span>
                    </a>
                    @endhasanyrole

                    @hasanyrole('superadmin|bumdes')
                    <a href="{{ route('admin.umkm.produk.create') }}" class="flex flex-col items-center justify-center p-6 bg-gray-50 rounded-xl hover:bg-slate-100 hover:text-slate-800 transition-colors border border-gray-100 group">
                        <div class="w-12 h-12 bg-white rounded-full shadow-sm flex items-center justify-center mb-3 group-hover:shadow-md transition-shadow">
                            <svg class="w-6 h-6 text-gray-400 group-hover:text-slate-800 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-700 group-hover:text-slate-800">Tambah UMKM</span>
                    </a>
                    @endhasanyrole
                    
                </div>
            </div>
        </div>

        <!-- Right: Recent Activity / Logs -->
        <div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 h-full">
                <h3 class="text-lg font-bold text-gray-900 mb-6">Aspirasi Terbaru</h3>
                
                @if($aspirasiTerbaru->count() > 0)
                    <div class="space-y-4">
                        @foreach($aspirasiTerbaru as $aspirasi)
                        <div class="flex items-start gap-4 p-4 rounded-xl border {{ $aspirasi->status == 'selesai' ? 'border-green-100 bg-green-50/50' : 'border-gray-100 bg-gray-50/50' }}">
                            <div class="w-10 h-10 rounded-full {{ $aspirasi->status == 'selesai' ? 'bg-green-100 text-green-600' : 'bg-blue-100 text-blue-600' }} flex items-center justify-center shrink-0">
                                @if($aspirasi->status == 'selesai')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                @else
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-gray-900 truncate">{{ $aspirasi->nama }}</p>
                                <p class="text-xs text-gray-500 mb-1">{{ $aspirasi->created_at->diffForHumans() }}</p>
                                <p class="text-sm text-gray-600 line-clamp-2">{{ $aspirasi->pesan }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-6 text-center">
                        <a href="{{ route('admin.aspirasi.index') }}" class="text-slate-800 hover:text-slate-900 text-sm font-semibold">Lihat Semua Aspirasi &rarr;</a>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="flex flex-col items-center justify-center py-10 text-center">
                        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                        </div>
                        <p class="text-sm font-medium text-gray-900">Belum ada aspirasi</p>
                        <p class="text-xs text-gray-500 mt-1">Aspirasi yang dikirimkan warga akan muncul di sini.</p>
                    </div>
                @endif
            </div>
        </div>
        
    </div>
</x-app-layout>
