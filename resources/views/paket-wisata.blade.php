@extends('layouts.public')

@section('title', 'Paket Wisata')

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
            Eksplorasi Desa Kami
        </div>
        <h1 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl md:text-5xl drop-shadow-lg" {!! $heroAosTitle !!}>Paket Wisata Menarik</h1>
        <p class="mt-4 text-base md:text-lg text-green-50 max-w-2xl mx-auto drop-shadow leading-relaxed" {!! $heroAosText !!}>Temukan pengalaman liburan tak terlupakan melalui berbagai pilihan paket wisata alam dan budaya khas Desa Cigalontang.</p>
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
            <!-- Grid Paket Wisata -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 pb-8">
                @forelse($pakets as $paket)

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-2xl transition-all duration-500 flex flex-col h-full transform hover:-translate-y-2" {!! $itemAos !!} data-aos-delay="{{ ($loop->index % 4) * 100 }}">
            <div class="relative overflow-hidden aspect-[4/3] bg-gray-100">
                @if($paket->gambar && Storage::disk('public')->exists($paket->gambar))
                    <img src="{{ Storage::url($paket->gambar) }}" alt="{{ $paket->nama_paket }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                @elseif($paket->gambar)
                    <img src="{{ $paket->gambar }}" alt="{{ $paket->nama_paket }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                @else
                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                @endif

            </div>
            <div class="p-6 flex flex-col flex-grow">
                <h3 class="text-xl font-black text-gray-900 group-hover:text-primary transition-colors mb-2 line-clamp-2 leading-tight">{{ $paket->nama_paket }}</h3>
                <span class="text-2xl font-black text-primary mb-4 drop-shadow-sm">Rp {{ number_format($paket->harga, 0, ',', '.') }}</span>
                <p class="text-gray-500 mb-6 text-sm flex-grow line-clamp-3 leading-relaxed">{{ Str::limit(strip_tags($paket->deskripsi), 120) }}</p>
                
                <div class="flex items-center justify-between border-t border-gray-100 pt-4 mt-auto">
                    <div class="flex gap-2 w-full mt-2">
                        @if($paket->link_pemesanan)
                            <a href="{{ $paket->link_pemesanan }}" target="_blank" class="w-full flex items-center justify-center gap-2 bg-primary hover:bg-green-700 text-white font-bold py-2.5 px-4 rounded-xl transition-all shadow-md hover:-translate-y-1 text-sm">
                                Lihat Detail
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        @else
                            <button disabled class="w-full flex items-center justify-center gap-2 bg-gray-100 text-gray-400 font-bold py-2.5 px-4 rounded-xl text-sm cursor-not-allowed">
                                Tidak Tersedia
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full py-20 text-center bg-white rounded-3xl border border-gray-100 shadow-sm">
            <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
            <h3 class="text-2xl font-black text-gray-900 mb-2">Paket Tidak Ditemukan</h3>
            <p class="text-gray-500 text-lg">Belum ada data paket wisata yang tersedia di kategori ini.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8 flex justify-center">
        {{ $pakets->appends(request()->query())->links() }}
            </div>

            @if(method_exists($pakets, 'links'))
            <div class="mt-8">
                {{ $pakets->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
