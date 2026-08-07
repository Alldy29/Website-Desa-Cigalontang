<x-app-layout>
    @section('title', 'Statistik Pengunjung')
    @section('header_title', 'Trafik & Kunjungan Web')

    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Trafik Website Desa</h2>
        <p class="text-gray-500">Pemantauan *real-time* jumlah masyarakat dan pengunjung luar yang mengakses Portal Desa Cigalontang.</p>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        <!-- Total Keseluruhan -->
        <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-3xl p-6 text-white shadow-md">
            <p class="text-gray-400 text-sm font-medium mb-2">Total Kunjungan (Selamanya)</p>
            <div class="flex items-end gap-3">
                <h3 class="text-4xl font-black">{{ number_format($totalPengunjung, 0, ',', '.') }}</h3>
                <span class="text-gray-400 text-sm mb-1">User</span>
            </div>
        </div>

        <!-- Bulan Ini -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
            <p class="text-gray-500 text-sm font-medium mb-2">Kunjungan Bulan Ini</p>
            <div class="flex items-end gap-3">
                <h3 class="text-3xl font-black text-blue-600">{{ number_format($pengunjungBulanIni, 0, ',', '.') }}</h3>
                <span class="text-gray-400 text-sm mb-1">User</span>
            </div>
        </div>

        <!-- Hari Ini -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
            <p class="text-gray-500 text-sm font-medium mb-2">Kunjungan Hari Ini</p>
            <div class="flex items-end gap-3">
                <h3 class="text-3xl font-black text-green-600">{{ number_format($pengunjungHariIni, 0, ',', '.') }}</h3>
                <span class="text-gray-400 text-sm mb-1">User</span>
            </div>
        </div>

        <!-- Hits/Klik Hari Ini -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
            <p class="text-gray-500 text-sm font-medium mb-2">Total Interaksi (Hits) Hari Ini</p>
            <div class="flex items-end gap-3">
                <h3 class="text-3xl font-black text-purple-600">{{ number_format($hitsHariIni, 0, ',', '.') }}</h3>
                <span class="text-gray-400 text-sm mb-1">Klik</span>
            </div>
        </div>

    </div>

    <!-- Simple Bar Chart 7 Hari -->
    <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
        <h3 class="text-xl font-bold text-gray-900 mb-8">Kunjungan 7 Hari Terakhir</h3>
        
        <div class="flex items-end justify-between h-48 gap-2 mt-4 relative border-b border-gray-100 pb-2">
            
            <!-- Lines Background -->
            <div class="absolute inset-0 flex flex-col justify-between pb-6 pointer-events-none">
                <div class="w-full border-t border-dashed border-gray-100"></div>
                <div class="w-full border-t border-dashed border-gray-100"></div>
                <div class="w-full border-t border-dashed border-gray-100"></div>
            </div>

            <!-- Bars -->
            @foreach($grafikTujuhHari as $grafik)
                @php 
                    $heightPercent = ($grafik['jumlah'] / $maxGrafik) * 100;
                    if($heightPercent < 5) $heightPercent = 5; // minimum height
                @endphp
                <div class="w-full flex flex-col items-center justify-end h-full z-10 group">
                    <div class="relative w-full px-1 sm:px-4 flex flex-col justify-end items-center h-full">
                        <span class="absolute -top-8 text-xs font-bold text-gray-800 opacity-0 group-hover:opacity-100 transition-opacity bg-white px-2 py-1 rounded shadow-sm border">{{ $grafik['jumlah'] }}</span>
                        <div class="w-full bg-primary hover:bg-green-500 rounded-t-md transition-all duration-500" style="height: {{ $heightPercent }}%;"></div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Labels -->
        <div class="flex items-center justify-between pt-3">
            @foreach($grafikTujuhHari as $grafik)
                <div class="w-full text-center text-xs text-gray-500 truncate">
                    {{ $grafik['tanggal'] }}
                </div>
            @endforeach
        </div>
        <p class="text-center text-xs text-gray-400 mt-6">*Arahkan kursor pada balok grafik untuk melihat angka pastinya.</p>
    </div>
</x-app-layout>
