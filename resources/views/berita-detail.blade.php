@extends('layouts.public')

@section('title', $berita->judul)
@section('meta_description', Str::limit(strip_tags($berita->konten), 160))
@if($berita->gambar)
    @section('meta_image', Storage::disk('public')->exists($berita->gambar) ? Storage::url($berita->gambar) : (Str::startsWith($berita->gambar, 'http') ? $berita->gambar : asset('images/hero-bg-2.jpg')))
@endif

@php
    // Cek apakah judul mengandung tag [Pengumuman]
    $kategori = 'Berita Desa';
    $judulBiasa = $berita->judul;

    if (str_starts_with($berita->judul, '[Pengumuman] ')) {
        $kategori = 'Pengumuman';
        $judulBiasa = str_replace('[Pengumuman] ', '', $berita->judul);
    } elseif (str_starts_with($berita->judul, '[Agenda] ')) {
        $judulBiasa = str_replace('[Agenda] ', '', $berita->judul);
    }

    // Tentukan warna tag berdasarkan kategori
    if ($kategori === 'Berita Desa') {
        $tagColor = 'bg-primary/10 text-primary border-primary/20';
    } elseif ($kategori === 'Pengumuman') {
        $tagColor = 'bg-secondary/10 text-secondary border-secondary/20';
    } else {
        $tagColor = 'bg-accent/10 text-accent border-accent/20';
    }
@endphp

@section('content')
<!-- Header Berita -->
<div class="pt-32 pb-10 bg-white border-b border-gray-100">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex text-sm text-gray-500 mb-6" aria-label="Breadcrumb">
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
                        <a href="/berita" class="ml-1 md:ml-2 hover:text-primary transition-colors">Berita Desa</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 md:ml-2 text-gray-400 line-clamp-1 max-w-[150px] sm:max-w-none">Detail Artikel</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Kategori & Judul -->
        <span class="inline-block {{ $tagColor }} px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 border" data-aos="fade-down">{{ $kategori }}</span>
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-6" data-aos="fade-right">
            {{ $judulBiasa }}
        </h1>

        <!-- Info Penulis & Meta -->
        <div class="flex flex-wrap items-center gap-6 py-4 border-y border-gray-100 mb-8" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-gray-900">Administrator</p>
                    <p class="text-xs text-gray-500">Pemerintah Desa</p>
                </div>
            </div>
            <div class="h-8 w-px bg-gray-200 hidden sm:block"></div>
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                {{ $berita->created_at->format('d M Y, H:i') }}
            </div>
            <div class="h-8 w-px bg-gray-200 hidden sm:block"></div>
            <div class="flex items-center gap-2 text-sm text-gray-500" title="{{ $berita->views }} kali dilihat">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                {{ number_format($berita->views, 0, ',', '.') }} tayangan
            </div>
        </div>

        <!-- Gambar Utama -->
        @if($berita->gambar)
        <div class="relative aspect-[16/9] rounded-3xl overflow-hidden mb-12 shadow-lg group bg-gray-100" data-aos="zoom-in" data-aos-delay="200">
            @if(Storage::disk('public')->exists($berita->gambar))
                <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $judulBiasa }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @else
                <img src="{{ $berita->gambar }}" alt="{{ $judulBiasa }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @endif
        </div>
        @endif

        <!-- Konten Berita -->
        <article class="prose prose-lg md:prose-xl max-w-none text-gray-700 text-justify prose-headings:text-gray-900 prose-headings:font-bold prose-a:text-primary hover:prose-a:text-green-600 prose-img:rounded-2xl prose-p:leading-relaxed prose-p:mb-6" data-aos="fade-up" data-aos-delay="300">
            @foreach(explode("\n", trim($berita->konten)) as $paragraf)
                @if(trim($paragraf) !== '')
                    <p>{{ trim($paragraf) }}</p>
                @endif
            @endforeach
        </article>

        <!-- Bagikan -->
        <div class="mt-12 pt-8 border-t border-gray-100 flex items-center gap-4" data-aos="fade-up" data-aos-delay="400">
            <span class="text-sm font-bold text-gray-900">Bagikan artikel:</span>
            <div class="flex gap-2">
                <!-- WhatsApp -->
                <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' ' . request()->fullUrl()) }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 border border-gray-200 text-gray-500 flex items-center justify-center hover:bg-green-500 hover:text-white hover:border-green-500 transition-colors shadow-sm" title="Bagikan ke WhatsApp">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.031 2C6.495 2 2.032 6.463 2.032 12c0 1.761.458 3.486 1.332 5.01L2 22l5.122-1.343a9.924 9.924 0 0 0 4.909 1.306h.001c5.535 0 9.998-4.463 9.998-10.001 0-2.684-1.045-5.207-2.943-7.106A9.925 9.925 0 0 0 12.031 2Zm0 18.256h-.001a8.232 8.232 0 0 1-4.185-1.13l-.3-.178-3.109.816.831-3.03-.195-.31a8.216 8.216 0 0 1-1.258-4.425c0-4.551 3.702-8.253 8.255-8.253 2.205 0 4.278.86 5.837 2.42 1.56 1.56 2.417 3.633 2.417 5.839 0 4.551-3.702 8.252-8.252 8.252Zm4.526-6.177c-.248-.124-1.468-.724-1.696-.807-.227-.083-.393-.124-.559.124-.165.248-.64 .807-.785.972-.144.165-.29.186-.538.062-.248-.124-1.048-.387-1.996-1.233-.738-.659-1.236-1.474-1.381-1.722-.144-.248-.016-.382.109-.506.113-.112.248-.289.371-.434.124-.145.165-.248.248-.413.083-.165.041-.31-.02-.434-.063-.124-.559-1.348-.766-1.844-.2-.483-.404-.418-.559-.425-.144-.008-.309-.009-.474-.009a.908.908 0 0 0-.66.309c-.227.248-.867.847-.867 2.065s.888 2.396 1.011 2.56c.124.165 1.745 2.663 4.23 3.734.591.254 1.052.406 1.411.52.593.188 1.133.161 1.558.098.475-.07 1.468-.6 1.674-1.178.207-.578.207-1.074.145-1.178-.062-.104-.227-.165-.475-.29Z" clip-rule="evenodd"/></svg>
                </a>
                
                <!-- Facebook -->
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 border border-gray-200 text-gray-500 flex items-center justify-center hover:bg-blue-600 hover:text-white hover:border-blue-600 transition-colors shadow-sm" title="Bagikan ke Facebook">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.001 2C6.478 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V15.01h-2.54v-3.01h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562v1.876h2.773l-.443 3.01h-2.33v6.868C18.343 21.128 22 16.99 22 12c0-5.523-4.477-10-10-10Z" clip-rule="evenodd"/></svg>
                </a>

                <!-- Instagram -->
                <button onclick="copyLink('{{ request()->fullUrl() }}')" class="w-10 h-10 rounded-full bg-gray-50 border border-gray-200 text-gray-500 flex items-center justify-center hover:bg-gradient-to-tr hover:from-yellow-400 hover:via-pink-500 hover:to-purple-600 hover:text-white hover:border-transparent transition-all shadow-sm" title="Salin Tautan untuk Instagram">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                </button>

                <!-- TikTok -->
                <button onclick="copyLink('{{ request()->fullUrl() }}')" class="w-10 h-10 rounded-full bg-gray-50 border border-gray-200 text-gray-500 flex items-center justify-center hover:bg-black hover:text-white hover:border-black transition-colors shadow-sm" title="Salin Tautan untuk TikTok">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 448 512"><path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"/></svg>
                </button>
            </div>

            <script>
            function copyLink(url) {
                navigator.clipboard.writeText(url).then(() => {
                    alert('Tautan artikel berhasil disalin! Silakan tempel (paste) di aplikasi Instagram atau TikTok Anda.');
                }).catch(err => {
                    console.error('Gagal menyalin tautan: ', err);
                });
            }
            </script>
        </div>
    </div>
</div>

<!-- Berita Terkait -->
<div class="py-16 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8 flex items-center" data-aos="fade-right">
            <div class="w-2 h-8 bg-primary rounded-full mr-3"></div>
            Berita Lainnya
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($beritaLainnya as $lain)
            @php
                $kat = 'Berita Desa';
                $jud = $lain->judul;
                if (str_starts_with($lain->judul, '[Pengumuman] ')) {
                    $kat = 'Pengumuman';
                    $jud = str_replace('[Pengumuman] ', '', $lain->judul);
                } elseif (str_starts_with($lain->judul, '[Agenda] ')) {
                    $jud = str_replace('[Agenda] ', '', $lain->judul);
                }
            @endphp
            <a href="/berita/{{ $lain->slug }}" class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-xl transition-all duration-300 transform md:hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 100 }}">
                <div class="aspect-[4/3] overflow-hidden relative bg-gray-100">
                    @if($lain->gambar)
                        @if(Storage::disk('public')->exists($lain->gambar))
                            <img src="{{ Storage::url($lain->gambar) }}" alt="{{ $jud }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @else
                            <img src="{{ $lain->gambar }}" alt="{{ $jud }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @endif
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-300">
                            <svg class="w-16 h-16 opacity-50 group-hover:scale-105 transition-transform duration-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-6 flex flex-col">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-[10px] font-bold text-primary uppercase tracking-wider block">{{ $kat }}</span>
                        <span class="flex items-center gap-1 text-[10px] text-gray-500 font-medium" title="{{ $lain->views }} kali dilihat">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            {{ number_format($lain->views, 0, ',', '.') }}
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-primary line-clamp-2 transition-colors">{{ $jud }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
