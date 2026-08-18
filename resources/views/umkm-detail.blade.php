@extends('layouts.public')

@section('title', $produk->nama_produk . ' - UMKM Desa Cigalontang')

@section('content')

@php
    if (!function_exists('getCategoryBadgeClass')) {
        function getCategoryBadgeClass($slug) {
            if (Str::contains($slug, 'makanan')) return 'bg-secondary/90';
            if (Str::contains($slug, 'kerajinan')) return 'bg-primary/90';
            if (Str::contains($slug, 'golok')) return 'bg-accent/90';
            return 'bg-gray-500/90';
        }
    }
    if (!function_exists('getColorForCategory')) {
        function getColorForCategory($slug) {
            if (Str::contains($slug, 'makanan')) return 'secondary';
            if (Str::contains($slug, 'kerajinan')) return 'primary';
            if (Str::contains($slug, 'golok')) return 'accent';
            return 'gray-900';
        }
    }
@endphp

<div class="pt-32 pb-16 bg-white min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center hover:text-primary transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('umkm') }}" class="ml-1 md:ml-2 hover:text-primary transition-colors">Katalog UMKM</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 md:ml-2 text-gray-400 line-clamp-1 max-w-[150px] sm:max-w-none">Detail Produk</span>
                    </div>
                </li>
            </ol>
        </nav>

        @php
            $catSlug = $produk->kategoriUmkm ? Str::slug($produk->kategoriUmkm->nama_kategori) : 'lainnya';
            $catName = $produk->kategoriUmkm ? $produk->kategoriUmkm->nama_kategori : 'Lainnya';
            $badgeClass = getCategoryBadgeClass($catSlug);
            $color = getColorForCategory($catSlug);
        @endphp

        <!-- Kategori & Judul -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-8">
            <div class="flex-1">
                <span class="inline-block {{ $badgeClass }} text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider mb-4 shadow-sm" data-aos="fade-down">{{ $catName }}</span>
                <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-4" data-aos="fade-right">
                    {{ $produk->nama_produk }}
                </h1>
                <!-- Info Mitra -->
                <div class="flex items-center text-gray-500" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-10 h-10 rounded-full bg-{{ $color }}/20 flex items-center justify-center text-{{ $color }} font-bold text-sm mr-3 border border-{{ $color }}/30">{{ strtoupper(substr($produk->mitraUmkm->nama_mitra ?? 'A', 0, 2)) }}</div>
                    <div>
                        <p class="text-sm font-bold text-gray-900">{{ $produk->mitraUmkm->nama_mitra ?? 'Warga Desa Cigalontang' }}</p>
                        <p class="text-xs text-gray-500">Mitra UMKM</p>
                    </div>
                </div>
            </div>
            <!-- Harga -->
            <div class="md:text-right mt-2 md:mt-0 flex-shrink-0" data-aos="fade-left">
                <p class="text-sm text-gray-400 font-bold mb-1 uppercase tracking-wider">Harga Produk</p>
                <div class="text-4xl lg:text-5xl font-black text-{{ $color }} drop-shadow-sm whitespace-nowrap">
                    Rp {{ number_format($produk->harga, 0, ',', '.') }}<span class="text-xl text-gray-400 font-medium ml-1">{{ $produk->satuan ? '/ ' . $produk->satuan : '' }}</span>
                </div>
            </div>
        </div>

        <!-- Gambar Utama -->
        <div class="relative aspect-[16/9] rounded-3xl overflow-hidden mb-12 shadow-lg group bg-gray-100 border border-gray-200/50" data-aos="zoom-in" data-aos-delay="200">
            @if($produk->gambar && Storage::disk('public')->exists($produk->gambar))
                <img src="{{ Storage::url($produk->gambar) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @elseif($produk->gambar)
                <img src="{{ $produk->gambar }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @else
                <div class="w-full h-full flex items-center justify-center text-gray-300">
                    <svg class="w-20 h-20 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
            @endif
        </div>

        <!-- Konten Deskripsi -->
        <div class="prose prose-lg md:prose-xl max-w-none text-gray-700 text-justify prose-p:leading-relaxed prose-p:mb-6" data-aos="fade-up" data-aos-delay="300">
            @foreach(explode("\n", trim($produk->deskripsi)) as $paragraf)
                @if(trim($paragraf) !== '')
                    <p>{{ trim($paragraf) }}</p>
                @endif
            @endforeach
        </div>

        <!-- Call to Action -->
        <div class="mt-16 bg-gray-50 rounded-3xl p-8 border border-gray-100 shadow-sm" data-aos="fade-up" data-aos-delay="400">
            <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-6 text-center">Tertarik dengan produk ini? Pesan Sekarang!</h3>
            <div class="flex flex-col sm:flex-row gap-4 justify-center max-w-2xl mx-auto">
                @if($produk->link_marketplace)
                <a href="{{ $produk->link_marketplace }}" target="_blank" class="flex-1 inline-flex items-center justify-center gap-3 bg-orange-500 hover:bg-orange-600 text-white py-4 px-6 rounded-2xl transition-all shadow-md hover:shadow-lg hover:-translate-y-1 text-lg font-bold">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    Beli di Toko Online
                </a>
                @endif
                @if($produk->mitraUmkm && $produk->mitraUmkm->no_whatsapp)
                @php
                    $wa = preg_replace('/[^0-9]/', '', $produk->mitraUmkm->no_whatsapp);
                    if (Str::startsWith($wa, '0')) { $wa = '62' . substr($wa, 1); }
                @endphp
                <a href="https://wa.me/{{ $wa }}?text=Halo,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($produk->nama_produk) }}%20yang%20ada%20di%20website%20Desa%20Cigalontang." target="_blank" class="flex-1 inline-flex items-center justify-center gap-3 bg-green-500 hover:bg-green-600 text-white py-4 px-6 rounded-2xl transition-all shadow-md hover:shadow-lg hover:-translate-y-1 text-lg font-bold">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.711.927 3.149.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.768-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.664.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 3.825 0 6.938 3.112 6.939 6.937.001 3.826-3.113 6.938-6.939 6.943z"/></svg>
                    Pesan via WhatsApp
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
