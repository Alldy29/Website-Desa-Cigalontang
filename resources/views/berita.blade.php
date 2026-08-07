@extends('layouts.public')

@section('title', 'Berita & Kegiatan')

@section('content')
<!-- Premium Hero Section -->
<div class="relative bg-gradient-to-br from-green-900 via-primary to-emerald-800 overflow-hidden pt-32 pb-24">
    <!-- Decorative background shapes -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-10 w-72 h-72 bg-emerald-400/20 rounded-full blur-2xl"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <span class="inline-block py-1 px-3 rounded-full bg-white/20 text-white text-xs font-bold tracking-widest uppercase mb-4 backdrop-blur-sm border border-white/30">
            Pusat Informasi
        </span>
        <h1 class="text-4xl font-extrabold text-white tracking-tight sm:text-5xl lg:text-6xl mb-6">Berita Desa</h1>
        <p class="text-xl text-primary-100 max-w-2xl mx-auto text-white/90">Ikuti perkembangan terbaru dan informasi terkini dari Pemerintah Desa Cigalontang secara aktual.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-10 relative z-20">
    <!-- Filter/Sort Bar -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 mb-10 flex flex-col sm:flex-row justify-between items-center gap-4">

        <div class="relative w-full sm:w-64 flex-shrink-0">
            <input type="text" placeholder="Cari informasi..." class="w-full bg-gray-50 border-0 ring-1 ring-inset ring-gray-200 focus:ring-2 focus:ring-inset focus:ring-primary rounded-full pl-10 pr-4 py-2 text-sm text-gray-900 transition-all">
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
    </div>

    <!-- Grid Berita -->
    <div class="flex overflow-x-auto md:grid md:grid-cols-2 lg:grid-cols-3 gap-8 pb-8 md:pb-0 snap-x snap-mandatory md:snap-none hide-scrollbar" id="katalog-berita">
        
        @foreach($beritas as $berita)
        <a href="/berita/{{ $berita->slug }}" data-category="berita" class="berita-item snap-start shrink-0 w-[85vw] md:w-auto group flex flex-col h-full block">
            <div class="relative overflow-hidden aspect-[4/3] rounded-3xl mb-5 shadow-md border-4 border-white group-hover:border-primary/30 group-hover:shadow-2xl transition-all duration-500 bg-gray-100">
                @if($berita->gambar && Storage::disk('public')->exists($berita->gambar))
                    <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                @elseif($berita->gambar)
                    <img src="{{ $berita->gambar }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                @else
                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                        <svg class="w-20 h-20 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </div>
                @endif
                <div class="absolute top-4 left-4">
                    <span class="bg-primary text-white px-4 py-1.5 rounded-full text-xs font-bold shadow-lg tracking-widest uppercase">Berita</span>
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            </div>
            <div class="flex flex-col flex-grow px-2">
                <div class="flex items-center text-xs text-primary font-bold uppercase tracking-wider mb-3">
                    <span>{{ $berita->created_at->format('d M Y') }}</span>
                </div>
                <h3 class="text-xl font-black text-gray-900 mb-3 group-hover:text-primary transition-colors line-clamp-2 leading-tight">{{ $berita->judul }}</h3>
                <p class="text-gray-500 mb-5 line-clamp-3 text-sm flex-grow font-medium leading-relaxed">{{ Str::limit(strip_tags($berita->konten), 120) }}</p>
                <div class="inline-flex items-center text-primary font-bold text-sm mt-auto group-hover:gap-2 transition-all">
                    Baca Selengkapnya <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </div>
            </div>
        </a>
        @endforeach



    </div>

    <!-- Pagination Modern & Scrollable Horizontal -->
    {{ $beritas->onEachSide(1)->links('vendor.pagination.custom') }}
</div>

<style>
/* Hide scrollbar for Chrome, Safari and Opera */
.hide-scrollbar::-webkit-scrollbar {
  display: none;
}
/* Hide scrollbar for IE, Edge and Firefox */
.hide-scrollbar {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>
@endsection
