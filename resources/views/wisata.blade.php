@extends('layouts.public')

@section('title', 'Destinasi Wisata')

@section('content')

@php
    $isCategoryClick = request()->has('filter');
    $heroAosBadge = $isCategoryClick ? 'data-aos="fade"' : 'data-aos="fade-down"';
    $heroAosTitle = $isCategoryClick ? 'data-aos="fade"' : 'data-aos="zoom-in-up" data-aos-delay="200"';
    $heroAosText  = $isCategoryClick ? 'data-aos="fade"' : 'data-aos="zoom-in-up" data-aos-delay="400"';
    $itemAos      = $isCategoryClick ? 'data-aos="zoom-in"' : 'data-aos="fade-up"';
@endphp

<!-- Hero Wisata Premium -->
<div class="relative bg-gradient-to-br from-green-900 via-primary to-emerald-800 pt-16 pb-28 overflow-hidden">
    <!-- Decorative background shapes -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-10 w-72 h-72 bg-emerald-400/20 rounded-full blur-2xl"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/20 text-white text-sm font-semibold tracking-widest uppercase mb-6 border border-white/30 backdrop-blur-md shadow-sm" {!! $heroAosBadge !!}>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Alam & Kesenian
        </div>
        <h1 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl md:text-5xl drop-shadow-lg" {!! $heroAosTitle !!}>Wisata & Budaya</h1>
        <p class="mt-4 text-base md:text-lg text-green-50 max-w-2xl mx-auto drop-shadow leading-relaxed" {!! $heroAosText !!}>Jelajahi keindahan alam yang asri dan pelajari kekayaan budaya serta kesenian lokal kebanggaan Desa Cigalontang.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 mb-12 relative z-20">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        
        <!-- Navigation Tabs -->
        <div class="bg-white border-b border-gray-100 shadow-sm py-4" data-aos="fade-down">
            <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex overflow-x-auto space-x-3 hide-scrollbar md:justify-center items-center">
                <a href="/wisata?filter=destinasi" class="whitespace-nowrap py-2.5 px-6 rounded-full text-sm font-bold transition-all duration-300 {{ request()->is('wisata') ? 'bg-primary text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">Destinasi Wisata</a>
                <a href="/paket-wisata?filter=paket" class="whitespace-nowrap py-2.5 px-6 rounded-full text-sm font-bold transition-all duration-300 {{ request()->is('paket-wisata*') ? 'bg-primary text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">Paket Wisata</a>
            </nav>
        </div>

        <div class="p-8 md:p-12 bg-gray-50/30">
            <!-- Grid Wisata Premium -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 pb-8">
        
        @foreach($wisatas as $wisata)
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-2xl transition-all duration-500 flex flex-col h-full transform hover:-translate-y-2" {!! $itemAos !!} data-aos-delay="{{ ($loop->index % 4) * 100 }}">
            <div class="relative overflow-hidden aspect-[4/3] bg-gray-100">
                @if($wisata->foto_url && Storage::disk('public')->exists($wisata->foto_url))
                    <img src="{{ Storage::url($wisata->foto_url) }}" alt="{{ $wisata->nama_wisata }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                @elseif($wisata->foto_url)
                    <img src="{{ $wisata->foto_url }}" alt="{{ $wisata->nama_wisata }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                @else
                    <div class="w-full h-full bg-secondary/20 flex items-center justify-center text-secondary">
                        <svg class="w-16 h-16 opacity-30 group-hover:scale-110 transition-transform duration-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                @endif
                <div class="absolute top-3 left-3">
                    <span class="bg-secondary/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-bold shadow-md">{{ $wisata->kategori ?? 'Destinasi' }}</span>
                </div>
            </div>
            
            <div class="p-6 flex flex-col flex-grow">
                <h3 class="text-xl font-black text-gray-900 group-hover:text-secondary transition-colors mb-2 line-clamp-2 leading-tight">{{ $wisata->nama_wisata }}</h3>
                <p class="text-gray-500 mb-6 text-sm flex-grow line-clamp-3 leading-relaxed">{{ Str::limit(strip_tags($wisata->deskripsi), 100) }}</p>
                
                <div class="flex items-center text-xs text-gray-500 mb-4 truncate font-medium">
                    <svg class="w-4 h-4 text-gray-400 mr-1.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> 
                    @if($wisata->url_lokasi)
                        <a href="{{ $wisata->url_lokasi }}" target="_blank" rel="noopener noreferrer" class="truncate hover:text-primary transition-colors hover:underline">{{ $wisata->lokasi ?? 'Lokasi belum disetel' }}</a>
                    @else
                        <span class="truncate">{{ $wisata->lokasi ?? 'Lokasi belum disetel' }}</span>
                    @endif
                </div>
                
                <div class="pt-4 mt-auto border-t border-gray-100 w-full">
                    <a href="{{ route('wisata.show', $wisata->id) }}" class="inline-flex items-center justify-between w-full bg-secondary/10 hover:bg-secondary text-secondary hover:text-white px-5 py-3 rounded-xl text-sm font-bold transition-colors shadow-sm group-hover:shadow-md">
                        Lihat Selengkapnya
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach

            </div>
            
            <div class="mt-8">
                {{ $wisatas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
