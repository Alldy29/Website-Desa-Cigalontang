<!-- Data Utama (Highlight Cards) - Harmonious Palette -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
    <!-- Total Penduduk -->
    <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-8 flex flex-col items-center justify-center text-center group hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1.5 bg-green-500"></div>
        <div class="w-16 h-16 rounded-2xl bg-green-50 text-green-600 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
        <h3 class="text-gray-500 font-bold uppercase tracking-widest text-[10px] mb-2">Total Penduduk</h3>
        <p class="text-4xl font-black text-gray-900 group-hover:text-green-600 transition-colors">{{ number_format($dusuns->sum('jumlah_laki') + $dusuns->sum('jumlah_perempuan'), 0, ',', '.') }} <span class="text-sm font-bold text-gray-400">Jiwa</span></p>
    </div>

    <!-- Laki-laki -->
    <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-8 flex flex-col items-center justify-center text-center group hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1.5 bg-teal-500"></div>
        <div class="w-16 h-16 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
        </div>
        <h3 class="text-gray-500 font-bold uppercase tracking-widest text-[10px] mb-2">Laki-Laki</h3>
        <p class="text-4xl font-black text-gray-900 group-hover:text-teal-600 transition-colors">{{ number_format($dusuns->sum('jumlah_laki'), 0, ',', '.') }} <span class="text-sm font-bold text-gray-400">Jiwa</span></p>
    </div>

    <!-- Perempuan -->
    <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-8 flex flex-col items-center justify-center text-center group hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1.5 bg-emerald-400"></div>
        <div class="w-16 h-16 rounded-2xl bg-emerald-50 text-emerald-500 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
        </div>
        <h3 class="text-gray-500 font-bold uppercase tracking-widest text-[10px] mb-2">Perempuan</h3>
        <p class="text-4xl font-black text-gray-900 group-hover:text-emerald-500 transition-colors">{{ number_format($dusuns->sum('jumlah_perempuan'), 0, ',', '.') }} <span class="text-sm font-bold text-gray-400">Jiwa</span></p>
    </div>

    <!-- Jumlah Dusun -->
    <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-8 flex flex-col items-center justify-center text-center group hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1.5 bg-cyan-500"></div>
        <div class="w-16 h-16 rounded-2xl bg-cyan-50 text-cyan-600 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
        </div>
        <h3 class="text-gray-500 font-bold uppercase tracking-widest text-[10px] mb-2">Wilayah</h3>
        <p class="text-4xl font-black text-gray-900 group-hover:text-cyan-600 transition-colors">{{ $dusuns->count() }} <span class="text-sm font-bold text-gray-400">Dusun</span></p>
    </div>
</div>

<!-- Rincian per Kedusunan -->
<div class="mb-16">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-3">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600 shadow-inner">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            Distribusi Penduduk per Dusun
        </h2>
        <div class="hidden md:block h-px flex-1 bg-gradient-to-r from-gray-200 to-transparent ml-8"></div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($dusuns as $index => $dusun)
        <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-gray-200/50 transition-all duration-300 group hover:-translate-y-1">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Dusun {{ $index + 1 }}</p>
                    <h4 class="text-xl font-bold text-gray-900 group-hover:text-green-600 transition-colors">{{ $dusun->nama }}</h4>
                </div>
                <div class="w-12 h-12 rounded-full bg-gray-50 border border-gray-100 text-gray-400 flex items-center justify-center font-black group-hover:bg-green-50 group-hover:text-green-600 group-hover:border-green-100 transition-all">{{ $index + 1 }}</div>
            </div>
            <p class="text-4xl font-black text-gray-900 mb-8">{{ number_format($dusun->jumlah_laki + $dusun->jumlah_perempuan, 0, ',', '.') }}<span class="text-sm font-bold text-gray-400 ml-1">Jiwa</span></p>
            
            <div class="space-y-3">
                <div class="flex items-center justify-between bg-gray-50/50 p-4 rounded-2xl border border-gray-100 group-hover:border-teal-100 transition-colors">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-teal-50 text-teal-600 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 14c-4.418 0-8 3.582-8 8h16c0-4.418-3.582-8-8-8zm0-2c3.314 0 6-2.686 6-6s-2.686-6-6-6-6 2.686-6 6 2.686 6 6 6z"></path></svg>
                        </div>
                        <span class="text-xs font-bold text-gray-600 uppercase tracking-widest">Laki-laki</span>
                    </div>
                    <span class="font-black text-lg text-gray-900">{{ number_format($dusun->jumlah_laki, 0, ',', '.') }}</span>
                </div>
                <div class="flex items-center justify-between bg-gray-50/50 p-4 rounded-2xl border border-gray-100 group-hover:border-emerald-100 transition-colors">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 14c-4.418 0-8 3.582-8 8h16c0-4.418-3.582-8-8-8zm0-2c3.314 0 6-2.686 6-6s-2.686-6-6-6-6 2.686-6 6 2.686 6 6 6z"></path></svg>
                        </div>
                        <span class="text-xs font-bold text-gray-600 uppercase tracking-widest">Perempuan</span>
                    </div>
                    <span class="font-black text-lg text-gray-900">{{ number_format($dusun->jumlah_perempuan, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full py-12 text-center">
            <p class="text-gray-500">Belum ada data kewilayahan/dusun.</p>
        </div>
        @endforelse
    </div>
</div>

<!-- Rincian Data Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    
    <!-- Tingkat Pendidikan -->
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 hover:shadow-lg transition-shadow duration-300">
        <div class="flex items-center gap-4 mb-8 pb-6 border-b border-gray-100">
            <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900">Tingkat Pendidikan</h2>
        </div>
        
        <div class="space-y-6">
            @php $totalPendidikan = $pendidikans->sum('jumlah') ?: 1; @endphp
            @foreach($pendidikans as $index => $pendidikan)
            @php
                $colors = [
                    ['from-green-400', 'to-green-600', 'group-hover:text-green-600'],
                    ['from-teal-400', 'to-teal-600', 'group-hover:text-teal-600'],
                    ['from-emerald-400', 'to-emerald-600', 'group-hover:text-emerald-600'],
                    ['from-cyan-400', 'to-cyan-600', 'group-hover:text-cyan-600'],
                    ['from-blue-400', 'to-blue-600', 'group-hover:text-blue-600'],
                ];
                $color = $colors[$index % count($colors)];
            @endphp
            <!-- Bar Item -->
            <div class="group">
                <div class="flex justify-between text-sm font-bold mb-2">
                    <span class="text-gray-600 {{ $color[2] }} transition-colors">{{ $pendidikan->nama }}</span>
                    <span class="text-gray-900">{{ number_format($pendidikan->jumlah, 0, ',', '.') }} Jiwa</span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-3 overflow-hidden">
                    <div class="bg-gradient-to-r {{ $color[0] }} {{ $color[1] }} h-3 rounded-full relative" style="width: {{ ($pendidikan->jumlah / $totalPendidikan) * 100 }}%">
                        <div class="absolute top-0 right-0 bottom-0 left-0 bg-white/20 animate-pulse" style="animation-delay: {{ $index * 200 }}ms"></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Kelompok Pekerjaan -->
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 hover:shadow-lg transition-shadow duration-300">
        <div class="flex items-center gap-4 mb-8 pb-6 border-b border-gray-100">
            <div class="w-12 h-12 bg-teal-50 rounded-xl flex items-center justify-center text-teal-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900">Kelompok Pekerjaan</h2>
        </div>
        
        <div class="grid grid-cols-2 gap-4">
            @foreach($pekerjaans as $index => $pekerjaan)
            @php
                $cardColors = [
                    ['hover:border-green-200', 'hover:bg-green-50/30', 'group-hover:text-green-600'],
                    ['hover:border-teal-200', 'hover:bg-teal-50/30', 'group-hover:text-teal-600'],
                    ['hover:border-emerald-200', 'hover:bg-emerald-50/30', 'group-hover:text-emerald-600'],
                    ['hover:border-cyan-200', 'hover:bg-cyan-50/30', 'group-hover:text-cyan-600'],
                    ['hover:border-blue-200', 'hover:bg-blue-50/30', 'group-hover:text-blue-600'],
                    ['hover:border-indigo-200', 'hover:bg-indigo-50/30', 'group-hover:text-indigo-600'],
                ];
                $c = $cardColors[$index % count($cardColors)];
            @endphp
            <!-- Card Item -->
            <div class="bg-gray-50/50 rounded-2xl p-5 border border-gray-100 {{ $c[0] }} {{ $c[1] }} hover:shadow-sm transition-all group">
                <h4 class="text-[11px] font-bold text-gray-500 uppercase tracking-widest {{ $c[2] }} mb-2 line-clamp-1" title="{{ $pekerjaan->nama }}">{{ $pekerjaan->nama }}</h4>
                <p class="text-3xl font-black text-gray-900">{{ number_format($pekerjaan->jumlah, 0, ',', '.') }} <span class="text-xs font-bold text-gray-400">Jiwa</span></p>
            </div>
            @endforeach
        </div>
    </div>
</div>
