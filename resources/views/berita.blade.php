@extends('layouts.public')

@section('title', 'Berita & Kegiatan')

@section('content')
<!-- Premium Hero Section -->
<div class="relative bg-gradient-to-br from-green-900 via-primary to-emerald-800 pt-16 pb-28 overflow-hidden">
    <!-- Decorative background shapes -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-10 w-72 h-72 bg-emerald-400/20 rounded-full blur-2xl"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/20 text-white text-sm font-semibold tracking-widest uppercase mb-6 border border-white/30 backdrop-blur-md shadow-sm" data-aos="fade-down">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
            Pusat Informasi
        </div>
        <h1 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl md:text-5xl drop-shadow-lg" data-aos="zoom-in-up" data-aos-delay="200">Berita Desa</h1>
        <p class="mt-4 text-base md:text-lg text-green-50 max-w-2xl mx-auto drop-shadow leading-relaxed" data-aos="zoom-in-up" data-aos-delay="400">Ikuti perkembangan terbaru dan informasi terkini dari Pemerintah Desa Cigalontang secara aktual.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 mb-12 relative z-20">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="p-8 md:p-12 bg-gray-50/30">
    <!-- Search Bar -->
    <div class="flex justify-center mb-10">
        <form action="{{ route('berita') }}" method="GET" class="relative w-full max-w-2xl group">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari artikel, berita, atau informasi desa..." class="w-full bg-white border border-gray-200 shadow-sm group-hover:shadow-md focus:shadow-md focus:border-primary focus:ring-2 focus:ring-primary/20 rounded-full pl-12 pr-6 py-3.5 text-base text-gray-900 transition-all placeholder-gray-400">
            <svg class="w-5 h-5 text-gray-400 absolute left-5 top-4 group-focus-within:text-primary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <button type="submit" class="hidden" aria-hidden="true"></button>
        </form>
    </div>

    <!-- Grid Berita -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8" id="katalog-berita">
        
        @foreach($beritas as $index => $berita)
        <a href="/berita/{{ $berita->slug }}" data-category="berita" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}" class="berita-item group flex flex-col h-full bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 transform hover:-translate-y-2">
            <div class="relative overflow-hidden aspect-[4/3] bg-gray-100">
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
            <div class="flex flex-col flex-grow p-6">
                <div class="flex items-center justify-between text-xs text-primary font-bold uppercase tracking-wider mb-3">
                    <span>{{ $berita->created_at->format('d M Y') }}</span>
                    <span class="flex items-center gap-1 text-gray-500" title="{{ $berita->views }} kali dilihat">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        {{ number_format($berita->views, 0, ',', '.') }}
                    </span>
                </div>
                <h3 class="text-xl font-black text-gray-900 mb-3 group-hover:text-primary transition-colors line-clamp-2 leading-tight">{{ $berita->judul }}</h3>
                <p class="text-gray-500 mb-5 line-clamp-3 text-sm flex-grow font-medium leading-relaxed">{{ Str::limit(strip_tags($berita->konten), 120) }}</p>
                <div class="inline-flex items-center justify-between w-full mt-auto pt-4 border-t border-gray-100">
                    <span class="text-primary font-bold text-sm group-hover:underline">Baca Selengkapnya</span>
                    <svg class="w-5 h-5 text-primary transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </div>
            </div>
        </a>
        @endforeach



    </div>

    <!-- Pagination Modern & Scrollable Horizontal -->
    <div class="mt-8">
        {{ $beritas->onEachSide(1)->links('vendor.pagination.custom') }}
    </div>
        </div>
    </div>
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
