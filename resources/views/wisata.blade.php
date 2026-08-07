@extends('layouts.public')

@section('title', 'Destinasi Wisata')

@section('content')
<!-- Hero Wisata Premium -->
<div class="relative bg-gradient-to-br from-green-900 via-primary to-emerald-800 overflow-hidden pt-32 pb-48">
    <!-- Decorative background shapes -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-10 w-72 h-72 bg-emerald-400/20 rounded-full blur-2xl"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 pt-10">
        <span class="inline-flex items-center gap-2 py-1 px-4 rounded-full bg-white/20 text-white text-xs font-bold tracking-widest uppercase mb-4 backdrop-blur-md shadow-inner border border-white/30">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Alam & Kesenian
        </span>
        <h1 class="text-4xl font-extrabold text-white tracking-tight sm:text-6xl mb-6 drop-shadow-lg">Wisata & Budaya</h1>
        <p class="text-xl text-primary-100 max-w-2xl mx-auto font-medium drop-shadow-md">Jelajahi keindahan alam yang asri dan pelajari kekayaan budaya serta kesenian lokal kebanggaan Desa Cigalontang.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-28 relative z-20 pb-20">
    
    <!-- Grid Wisata Premium -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 pb-8">
        
        @foreach($wisatas as $wisata)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-xl transition-all duration-300 flex flex-col h-full transform hover:-translate-y-1">
            <div class="aspect-w-4 aspect-h-3 bg-gray-100 relative overflow-hidden">
                @if($wisata->foto_url && Storage::disk('public')->exists($wisata->foto_url))
                    <img src="{{ Storage::url($wisata->foto_url) }}" alt="{{ $wisata->nama_wisata }}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700">
                @elseif($wisata->foto_url)
                    <img src="{{ $wisata->foto_url }}" alt="{{ $wisata->nama_wisata }}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700">
                @else
                    <div class="w-full h-48 bg-secondary/20 flex items-center justify-center text-secondary">
                        <svg class="w-16 h-16 opacity-30 group-hover:scale-110 transition-transform duration-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                @endif
                <div class="absolute top-3 left-3">
                    <span class="bg-secondary/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-bold shadow-md">{{ $wisata->kategori ?? 'Destinasi' }}</span>
                </div>
            </div>
            
            <div class="p-5 flex flex-col flex-grow">
                <h3 class="text-lg font-bold text-gray-900 group-hover:text-secondary transition-colors mb-2 line-clamp-2">{{ $wisata->nama_wisata }}</h3>
                <p class="text-gray-600 mb-4 text-sm flex-grow line-clamp-3">{{ Str::limit(strip_tags($wisata->deskripsi), 100) }}</p>
                
                <div class="flex items-center text-xs text-gray-500 mb-4 truncate">
                    <svg class="w-4 h-4 text-gray-400 mr-1.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg> 
                    <span class="truncate">{{ $wisata->lokasi ?? 'Lokasi belum disetel' }}</span>
                </div>
                
                <div class="pt-4 mt-auto border-t border-gray-100">
                    <a href="{{ route('wisata.show', $wisata->id) }}" class="inline-flex items-center justify-center w-full bg-white border border-secondary text-secondary hover:bg-secondary hover:text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                        Lihat Selengkapnya
                    </a>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <!-- Pagination Custom -->
    {{ $wisatas->onEachSide(1)->links('vendor.pagination.custom') }}

</div>
@endsection
