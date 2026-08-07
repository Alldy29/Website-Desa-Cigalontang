@extends('layouts.public')

@section('title', 'Katalog UMKM')

@section('content')
<!-- Premium Hero Section -->
<div class="relative bg-gradient-to-br from-green-900 via-primary to-emerald-800 overflow-hidden pt-32 pb-24">
    <!-- Decorative background shapes -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-10 w-72 h-72 bg-emerald-400/20 rounded-full blur-2xl"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <span class="inline-flex items-center gap-2 py-1 px-4 rounded-full bg-white/20 text-white text-xs font-bold tracking-widest uppercase mb-4 backdrop-blur-md shadow-inner border border-white/30">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            Ekonomi Kreatif Warga
        </span>
        <h1 class="text-4xl font-extrabold text-white tracking-tight sm:text-5xl lg:text-6xl mb-6 drop-shadow-md">Katalog Produk UMKM</h1>
        <p class="text-xl text-white/90 max-w-2xl mx-auto font-medium">Mendukung karya lokal. Jelajahi beragam produk unggulan karya tangan-tangan terampil masyarakat Desa Cigalontang.</p>
    </div>
</div>

<!-- Kategori Filter -->
<div class="bg-white border-b border-gray-100 sticky top-16 z-40 shadow-sm transition-all">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex overflow-x-auto py-4 hide-scrollbar gap-2 md:justify-center">
            @php $currentFilter = request('kategori'); @endphp
            <a href="{{ route('umkm') }}" class="whitespace-nowrap px-6 py-2.5 text-sm font-bold rounded-full shadow-md transition-colors {{ !$currentFilter || $currentFilter == 'semua' ? 'bg-gray-900 text-white' : 'bg-white text-gray-600 border border-gray-200' }}">Semua Produk</a>
            @php 
                function getColorForCategory($slug) {
                    if (Str::contains($slug, 'makanan')) return 'secondary'; // Biru
                    if (Str::contains($slug, 'kerajinan')) return 'primary'; // Hijau
                    if (Str::contains($slug, 'golok')) return 'accent'; // Kuning
                    return 'gray-500';
                }
            @endphp
            @foreach($kategoris as $kategori)
                @php 
                    $color = getColorForCategory(Str::slug($kategori->nama_kategori));
                    $isActive = $currentFilter == $kategori->nama_kategori;
                @endphp
                <a href="{{ route('umkm', ['kategori' => $kategori->nama_kategori]) }}" class="whitespace-nowrap px-6 py-2.5 font-medium rounded-full transition-colors shadow-sm {{ $isActive ? 'bg-'.$color.' text-white border border-'.$color : 'bg-white border border-gray-200 text-gray-600 hover:border-'.$color.' hover:text-'.$color }}">{{ $kategori->nama_kategori }}</a>
            @endforeach
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-20">
    <!-- Product Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 pb-8" id="katalog-umkm">
        @foreach($produks as $produk)
            @php
                $catSlug = $produk->kategoriUmkm ? Str::slug($produk->kategoriUmkm->nama_kategori) : 'lainnya';
                $catName = $produk->kategoriUmkm ? $produk->kategoriUmkm->nama_kategori : 'Lainnya';
                $color = getColorForCategory($catSlug);
            @endphp
        <div data-category="{{ $catSlug }}" class="umkm-item bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-xl transition-all duration-300 flex flex-col h-full transform hover:-translate-y-1">
            <div class="aspect-w-4 aspect-h-3 bg-gray-100 relative overflow-hidden">
                @if($produk->gambar && Storage::disk('public')->exists($produk->gambar))
                    <img src="{{ Storage::url($produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700">
                @elseif($produk->gambar)
                    <img src="{{ $produk->gambar }}" alt="{{ $produk->nama_produk }}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400">No Image</span>
                    </div>
                @endif
                <div class="absolute top-3 left-3">
                    <span class="bg-{{ $color }}/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-bold shadow-md">{{ $catName }}</span>
                </div>
            </div>
            <div class="p-5 flex flex-col flex-grow">
                <h3 class="text-lg font-bold text-gray-900 group-hover:text-{{ $color }} transition-colors mb-1 line-clamp-1">{{ $produk->nama_produk }}</h3>
                <span class="text-xl font-black text-gray-900 mb-3">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                <p class="text-gray-600 mb-4 text-sm flex-grow line-clamp-3">{{ Str::limit(strip_tags($produk->deskripsi), 120) }}</p>
                
                <div class="flex items-center justify-between border-t border-gray-100 pt-4 mt-auto">
                    <div class="flex items-center">
                        <div class="w-7 h-7 rounded-full bg-{{ $color }}/20 flex items-center justify-center text-{{ $color }} font-bold text-[10px] mr-2">{{ strtoupper(substr($produk->mitraUmkm->nama_mitra ?? 'A', 0, 2)) }}</div>
                        <span class="text-xs text-gray-500 font-medium truncate max-w-[100px]">{{ $produk->mitraUmkm->nama_mitra ?? 'Warga' }}</span>
                    </div>
                    <div class="flex gap-2">
                        @if($produk->link_marketplace)
                        <a href="{{ $produk->link_marketplace }}" target="_blank" class="inline-flex items-center justify-center bg-gray-900 hover:bg-orange-500 text-white p-2 rounded-lg transition-colors shadow-sm" title="Beli di Marketplace">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </a>
                        @endif
                        @if($produk->mitraUmkm && $produk->mitraUmkm->no_whatsapp)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $produk->mitraUmkm->no_whatsapp) }}" target="_blank" class="inline-flex items-center justify-center bg-gray-900 hover:bg-green-500 text-white p-2 rounded-lg transition-colors shadow-sm" title="Pesan via WhatsApp">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.711.927 3.149.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.768-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.664.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 3.825 0 6.938 3.112 6.939 6.937.001 3.826-3.113 6.938-6.939 6.943z"/></svg>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <!-- Pagination -->
    {{ $produks->appends(request()->query())->onEachSide(1)->links('vendor.pagination.custom') }}
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

/* Animasi untuk Filter */
@keyframes fadeInScale {
  from { 
      opacity: 0; 
      transform: scale(0.95) translateY(15px); 
  }
  to { 
      opacity: 1; 
      transform: scale(1) translateY(0); 
  }
}
.animate-fade-in-scale {
  animation: fadeInScale 0.4s ease-out forwards;
}
</style>
@endsection
