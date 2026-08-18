@extends('layouts.public')

@section('title', 'Katalog UMKM')

@section('content')

@php
    $isCategoryClick = request()->has('kategori');
    $heroAosBadge = $isCategoryClick ? 'data-aos="fade"' : 'data-aos="fade-down"';
    $heroAosTitle = $isCategoryClick ? 'data-aos="fade"' : 'data-aos="zoom-in-up" data-aos-delay="200"';
    $heroAosText  = $isCategoryClick ? 'data-aos="fade"' : 'data-aos="zoom-in-up" data-aos-delay="400"';
    $itemAos      = $isCategoryClick ? 'data-aos="zoom-in"' : 'data-aos="fade-up"';
@endphp

<!-- Premium Hero Section -->
<div class="relative bg-gradient-to-br from-green-900 via-primary to-emerald-800 pt-16 pb-28 overflow-hidden">
    <!-- Decorative background shapes -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-10 w-72 h-72 bg-emerald-400/20 rounded-full blur-2xl"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/20 text-white text-sm font-semibold tracking-widest uppercase mb-6 border border-white/30 backdrop-blur-md shadow-sm" {!! $heroAosBadge !!}>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            Ekonomi Kreatif Warga
        </div>
        <h1 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl md:text-5xl drop-shadow-lg" {!! $heroAosTitle !!}>Katalog Produk UMKM</h1>
        <p class="mt-4 text-base md:text-lg text-green-50 max-w-2xl mx-auto drop-shadow leading-relaxed" {!! $heroAosText !!}>Mendukung karya lokal. Jelajahi beragam produk unggulan karya tangan-tangan terampil masyarakat Desa Cigalontang.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 mb-12 relative z-20">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        
        <!-- Kategori Filter -->
        <div class="bg-white border-b border-gray-100 shadow-sm py-4" data-aos="fade-down">
            <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex overflow-x-auto space-x-3 hide-scrollbar md:justify-center items-center">
                @php 
                    $currentFilter = request('kategori'); 
                    if (!function_exists('getCategoryClasses')) {
                        function getCategoryClasses($slug, $isActive) {
                            if (Str::contains($slug, 'makanan')) {
                                return $isActive ? 'bg-secondary text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-secondary hover:text-white';
                            }
                            if (Str::contains($slug, 'kerajinan')) {
                                return $isActive ? 'bg-primary text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-primary hover:text-white';
                            }
                            if (Str::contains($slug, 'golok')) {
                                return $isActive ? 'bg-accent text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-accent hover:text-white';
                            }
                            return $isActive ? 'bg-gray-600 text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-600 hover:text-white';
                        }
                        function getCategoryBadgeClass($slug) {
                            if (Str::contains($slug, 'makanan')) return 'bg-secondary/90';
                            if (Str::contains($slug, 'kerajinan')) return 'bg-primary/90';
                            if (Str::contains($slug, 'golok')) return 'bg-accent/90';
                            return 'bg-gray-500/90';
                        }
                        function getColorForCategory($slug) {
                            if (Str::contains($slug, 'makanan')) return 'secondary';
                            if (Str::contains($slug, 'kerajinan')) return 'primary';
                            if (Str::contains($slug, 'golok')) return 'accent';
                            return 'gray-500';
                        }
                    }
                @endphp
                <a href="{{ route('umkm', ['kategori' => 'semua']) }}" class="whitespace-nowrap py-2.5 px-6 rounded-full text-sm font-bold transition-all duration-300 {{ !$currentFilter || $currentFilter == 'semua' ? 'bg-primary text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-primary hover:text-white' }}">Semua Produk</a>
                @foreach($kategoris as $kategori)
                    @php 
                        $isActive = $currentFilter == $kategori->nama_kategori;
                        $classes = getCategoryClasses(Str::slug($kategori->nama_kategori), $isActive);
                    @endphp
                    <a href="{{ route('umkm', ['kategori' => $kategori->nama_kategori]) }}" class="whitespace-nowrap py-2.5 px-6 rounded-full text-sm font-bold transition-all duration-300 {{ $classes }}">{{ $kategori->nama_kategori }}</a>
                @endforeach
            </nav>
        </div>

        <div class="p-8 md:p-12 bg-gray-50/30">
            <!-- Callout Banner Daftar UMKM -->
            <div class="mb-10 bg-gradient-to-r from-emerald-50 to-green-50 border border-green-100 rounded-3xl p-6 md:p-8 flex flex-col md:flex-row items-center justify-between gap-6 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                <div class="flex-1 text-center md:text-left">
                    <h3 class="text-xl md:text-2xl font-extrabold text-green-900 mb-2">Punya Produk atau Usaha UMKM? 🚀</h3>
                    <p class="text-sm md:text-base text-green-700/80 font-medium max-w-2xl">Mari majukan ekonomi desa! Daftarkan dan promosikan produk Anda di katalog website Desa Cigalontang secara gratis. Cukup kirimkan foto dan detail produk Anda ke Admin BUMDes.</p>
                </div>
                @php
                    $waAdmin = preg_replace('/[^0-9]/', '', !empty($settings['whatsapp_bumdes']) ? $settings['whatsapp_bumdes'] : ($settings['social_whatsapp'] ?? '6281234567890'));
                    if (Str::startsWith($waAdmin, '0')) {
                        $waAdmin = '62' . substr($waAdmin, 1);
                    }
                @endphp
                <a href="https://wa.me/{{ $waAdmin }}?text=Halo%20Admin%20BUMDes,%20saya%20warga%20Desa%20Cigalontang%20ingin%20mendaftarkan%20produk%20UMKM%20saya%20ke%20website%20desa." target="_blank" class="shrink-0 inline-flex items-center gap-3 bg-primary hover:bg-green-700 text-white font-bold text-sm md:text-base py-3 px-6 md:px-8 rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 group focus:ring-4 focus:ring-green-200">
                    <svg class="w-6 h-6 group-hover:-translate-y-0.5 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.711.927 3.149.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.768-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.664.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 3.825 0 6.938 3.112 6.939 6.937.001 3.826-3.113 6.938-6.939 6.943z"/></svg>
                    Daftar via WhatsApp
                </a>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 pb-8" id="katalog-umkm">
        @foreach($produks as $produk)
            @php
                $catSlug = $produk->kategoriUmkm ? Str::slug($produk->kategoriUmkm->nama_kategori) : 'lainnya';
                $catName = $produk->kategoriUmkm ? $produk->kategoriUmkm->nama_kategori : 'Lainnya';
                $badgeClass = getCategoryBadgeClass($catSlug);
                $color = getColorForCategory($catSlug);
            @endphp
        <div data-category="{{ $catSlug }}" {!! $itemAos !!} data-aos-delay="{{ ($loop->index % 4) * 100 }}" class="umkm-item bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-2xl transition-all duration-500 flex flex-col h-full transform hover:-translate-y-2">
            <a href="{{ route('umkm.show', $produk->id) }}" class="relative overflow-hidden aspect-[4/3] bg-gray-100 block">
                @if($produk->gambar && Storage::disk('public')->exists($produk->gambar))
                    <img src="{{ Storage::url($produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                @elseif($produk->gambar)
                    <img src="{{ $produk->gambar }}" alt="{{ $produk->nama_produk }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                @else
                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                @endif
                <div class="absolute top-3 left-3">
                    <span class="{{ $badgeClass }} backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-bold shadow-md">{{ $catName }}</span>
                </div>
            </a>
            <div class="p-6 flex flex-col flex-grow">
                <a href="{{ route('umkm.show', $produk->id) }}" class="text-xl font-black text-gray-900 group-hover:text-{{ $color }} transition-colors mb-2 line-clamp-2 leading-tight">{{ $produk->nama_produk }}</a>
                <span class="text-2xl font-black text-{{ $color }} mb-4 drop-shadow-sm">Rp {{ number_format($produk->harga, 0, ',', '.') }}{{ $produk->satuan ? ' / ' . $produk->satuan : '' }}</span>
                <p class="text-gray-500 mb-6 text-sm flex-grow line-clamp-3 leading-relaxed">{{ Str::limit(strip_tags($produk->deskripsi), 120) }}</p>
                
                <a href="{{ route('umkm.show', $produk->id) }}" class="text-left text-sm font-bold text-{{ $color }} hover:underline mb-4 inline-block">Baca Selengkapnya &rarr;</a>
                
                <div class="border-t border-gray-100 pt-4 mt-auto">
                    <div class="flex items-center mb-3">
                        <div class="w-7 h-7 rounded-full bg-{{ $color }}/20 flex items-center justify-center text-{{ $color }} font-bold text-[10px] mr-2">{{ strtoupper(substr($produk->mitraUmkm->nama_mitra ?? 'A', 0, 2)) }}</div>
                        <span class="text-xs text-gray-500 font-medium truncate max-w-[200px]">{{ $produk->mitraUmkm->nama_mitra ?? 'Warga' }}</span>
                    </div>
                    <div class="flex gap-2 w-full">
                        @if($produk->link_marketplace)
                        <a href="{{ $produk->link_marketplace }}" target="_blank" class="flex-1 inline-flex items-center justify-center gap-2 bg-orange-500 hover:bg-orange-600 text-white py-2.5 px-4 rounded-xl transition-all shadow-md hover:shadow-lg text-sm font-bold" title="Beli di Tokopedia/Shopee">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                            Toko Online
                        </a>
                        @endif
                        @if($produk->mitraUmkm && $produk->mitraUmkm->no_whatsapp)
                        @php
                            $wa = preg_replace('/[^0-9]/', '', $produk->mitraUmkm->no_whatsapp);
                            if (Str::startsWith($wa, '0')) {
                                $wa = '62' . substr($wa, 1);
                            }
                        @endphp
                        <a href="https://wa.me/{{ $wa }}?text=Halo,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($produk->nama_produk) }}%20yang%20ada%20di%20website%20Desa%20Cigalontang." target="_blank" class="flex-1 inline-flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white py-2.5 px-4 rounded-xl transition-all shadow-md hover:shadow-lg text-sm font-bold" title="Pesan via WhatsApp">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.711.927 3.149.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.768-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.664.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 3.825 0 6.938 3.112 6.939 6.937.001 3.826-3.113 6.938-6.939 6.943z"/></svg>
                            Pesan via WA
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $produks->appends(request()->query())->onEachSide(1)->links('vendor.pagination.custom') }}
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
