<x-app-layout>
    @section('title', 'Statistik UMKM')
    @section('header_title', 'Performa BUMDes & UMKM')

    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Statistik Perekonomian Desa</h2>
        <p class="text-gray-500">Melihat sejauh mana keaktifan Usaha Mikro Kecil dan Menengah di wilayah Desa Cigalontang.</p>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        
        <div class="bg-gradient-to-br from-green-900 to-primary rounded-3xl p-6 text-white shadow-md relative overflow-hidden">
            <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>
            <p class="text-green-100 font-medium mb-1">Total Produk Dijual</p>
            <h3 class="text-4xl font-black">{{ number_format($totalProduk, 0, ',', '.') }}</h3>
        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 flex flex-col justify-center">
            <p class="text-gray-500 font-medium mb-1">Total Mitra Penjual (Pedagang)</p>
            <h3 class="text-3xl font-black text-gray-900">{{ number_format($totalMitra, 0, ',', '.') }}</h3>
        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 flex flex-col justify-center">
            <p class="text-gray-500 font-medium mb-1">Jumlah Kategori Bisnis</p>
            <h3 class="text-3xl font-black text-gray-900">{{ number_format($totalKategori, 0, ',', '.') }}</h3>
        </div>

    </div>

    <!-- Porsi per Kategori -->
    <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
        <h3 class="text-xl font-bold text-gray-900 mb-6">Distribusi Kategori Produk</h3>
        
        <div class="space-y-6">
            @forelse($kategoriStats as $stat)
                @php 
                    $percent = $totalProduk > 0 ? round(($stat->umkm_products_count / $totalProduk) * 100) : 0; 
                @endphp
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-semibold text-gray-800">{{ $stat->nama_kategori }}</span>
                        <span class="text-sm font-bold text-gray-600">{{ $stat->umkm_products_count }} Produk ({{ $percent }}%)</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-3">
                        <div class="bg-orange-500 h-3 rounded-full" style="width: {{ $percent }}%"></div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 py-4">Belum ada data produk atau kategori.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
