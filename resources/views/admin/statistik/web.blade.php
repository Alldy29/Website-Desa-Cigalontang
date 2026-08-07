<x-app-layout>
    @section('title', 'Statistik Web')
    @section('header_title', 'Statistik Web Desa')

    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Performa Sistem Web</h2>
        <p class="text-gray-500">Laporan metrik pengelolaan konten publik dan pelayanan masyarakat.</p>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="w-14 h-14 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Berita Dipublikasi</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ number_format($totalBerita, 0, ',', '.') }}</h3>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="w-14 h-14 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Koleksi Galeri</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ number_format($totalGaleri, 0, ',', '.') }}</h3>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="w-14 h-14 rounded-full bg-purple-50 text-purple-500 flex items-center justify-center">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Total Aspirasi</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ number_format($totalAspirasi, 0, ',', '.') }}</h3>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="w-14 h-14 rounded-full bg-orange-50 text-orange-500 flex items-center justify-center">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Data Aparatur</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ number_format($totalAparatur, 0, ',', '.') }}</h3>
            </div>
        </div>

    </div>

    <!-- Progress Aspirasi -->
    <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 mb-8">
        <h3 class="text-xl font-bold text-gray-900 mb-6">Penyelesaian Aspirasi Masyarakat</h3>
        
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-semibold text-gray-700">Tingkat Kesuksesan (Selesai diproses)</span>
            <span class="text-sm font-bold text-primary">{{ $persentaseAspirasiSelesai }}%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-4 mb-6 overflow-hidden">
            <div class="bg-primary h-4 rounded-full transition-all duration-1000" style="width: {{ $persentaseAspirasiSelesai }}%"></div>
        </div>

        <div class="grid grid-cols-2 gap-4 text-center">
            <div class="bg-green-50 rounded-xl p-4 border border-green-100">
                <p class="text-sm text-green-600 font-semibold mb-1">Diselesaikan</p>
                <p class="text-3xl font-black text-green-700">{{ $aspirasiSelesai }}</p>
            </div>
            <div class="bg-blue-50 rounded-xl p-4 border border-blue-100">
                <p class="text-sm text-blue-600 font-semibold mb-1">Masih Menunggu</p>
                <p class="text-3xl font-black text-blue-700">{{ $aspirasiMenunggu }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
