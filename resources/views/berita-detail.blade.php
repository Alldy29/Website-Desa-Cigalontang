@extends('layouts.public')

@section('title', $berita->judul)

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
        <span class="inline-block {{ $tagColor }} px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 border">{{ $kategori }}</span>
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
            {{ $judulBiasa }}
        </h1>

        <!-- Info Penulis & Meta -->
        <div class="flex flex-wrap items-center gap-6 py-4 border-y border-gray-100 mb-8">
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
        </div>

        <!-- Gambar Utama -->
        @if($berita->gambar)
        <div class="relative aspect-[16/9] rounded-3xl overflow-hidden mb-12 shadow-lg group bg-gray-100">
            @if(Storage::disk('public')->exists($berita->gambar))
                <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $judulBiasa }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @else
                <img src="{{ $berita->gambar }}" alt="{{ $judulBiasa }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @endif
        </div>
        @endif

        <!-- Konten Berita -->
        <article class="prose prose-lg max-w-none text-gray-600 prose-headings:text-gray-900 prose-a:text-primary hover:prose-a:text-green-600 prose-img:rounded-2xl">
            {!! $berita->konten !!}
        </article>

        <!-- Bagikan -->
        <div class="mt-12 pt-8 border-t border-gray-100 flex items-center gap-4">
            <span class="text-sm font-bold text-gray-900">Bagikan artikel:</span>
            <div class="flex gap-2">
                <button class="w-10 h-10 rounded-full bg-gray-50 border border-gray-200 text-gray-500 flex items-center justify-center hover:bg-blue-600 hover:text-white hover:border-blue-600 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                </button>
                <button class="w-10 h-10 rounded-full bg-gray-50 border border-gray-200 text-gray-500 flex items-center justify-center hover:bg-blue-800 hover:text-white hover:border-blue-800 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
                </button>
                <button class="w-10 h-10 rounded-full bg-gray-50 border border-gray-200 text-gray-500 flex items-center justify-center hover:bg-green-500 hover:text-white hover:border-green-500 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.099.824z"/></svg>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Berita Terkait -->
<div class="py-16 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8 flex items-center">
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
            <a href="/berita/{{ $lain->slug }}" class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-xl transition-all duration-300 transform md:hover:-translate-y-1">
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
                    <span class="text-[10px] font-bold text-primary uppercase tracking-wider mb-2 block">{{ $kat }}</span>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-primary line-clamp-2 transition-colors">{{ $jud }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
