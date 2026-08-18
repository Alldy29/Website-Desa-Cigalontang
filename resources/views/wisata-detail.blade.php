@extends('layouts.public')

@section('title', $wisata->nama_wisata)
@section('meta_description', Str::limit(strip_tags($wisata->deskripsi), 160))
@if($wisata->gambar)
    @section('meta_image', Storage::disk('public')->exists($wisata->gambar) ? Storage::url($wisata->gambar) : (Str::startsWith($wisata->gambar, 'http') ? $wisata->gambar : asset('images/hero-bg-2.jpg')))
@endif

@section('content')
<div class="pt-24 pb-16 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="flex text-sm text-gray-500 mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ url('/') }}" class="hover:text-primary transition-colors">Beranda</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ url('/wisata') }}" class="ml-1 md:ml-2 hover:text-primary transition-colors">Wisata & Budaya</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 md:ml-2 text-gray-800 font-medium truncate max-w-[150px] sm:max-w-xs">{{ $wisata->nama_wisata }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Main Content Card -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden" data-aos="fade-up">
            <!-- Image Header -->
            <div class="relative h-64 sm:h-96 w-full bg-gray-100">
                @if($wisata->foto_url && Storage::disk('public')->exists($wisata->foto_url))
                    <img src="{{ Storage::url($wisata->foto_url) }}" alt="{{ $wisata->nama_wisata }}" class="w-full h-full object-cover">
                @elseif($wisata->foto_url)
                    <img src="{{ $wisata->foto_url }}" alt="{{ $wisata->nama_wisata }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-secondary/40">
                        <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                @endif
                <div class="absolute top-4 left-4">
                    <span class="bg-secondary/90 backdrop-blur-sm text-white px-4 py-1.5 rounded-full text-sm font-bold shadow-md">{{ $wisata->kategori ?? 'Destinasi' }}</span>
                </div>
            </div>

            <!-- Content Body -->
            <div class="p-6 sm:p-10">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4" data-aos="fade-right" data-aos-delay="100">{{ $wisata->nama_wisata }}</h1>
                
                <div class="flex items-center text-gray-600 mb-8 pb-8 border-b border-gray-100" data-aos="fade-right" data-aos-delay="200">
                    <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                    @if($wisata->url_lokasi)
                        <a href="{{ $wisata->url_lokasi }}" target="_blank" rel="noopener noreferrer" class="font-medium hover:text-primary hover:underline transition-colors">{{ $wisata->lokasi ?? 'Lokasi belum disetel' }}</a>
                    @else
                        <span class="font-medium">{{ $wisata->lokasi ?? 'Lokasi belum disetel' }}</span>
                    @endif
                </div>

                <div class="prose prose-lg md:prose-xl prose-green max-w-none text-gray-700 text-justify leading-relaxed prose-p:leading-loose prose-p:mb-6 first-letter:text-6xl first-letter:font-black first-letter:text-secondary first-letter:float-left first-letter:mr-3 first-letter:mt-2" data-aos="fade-up" data-aos-delay="300">
                    {!! nl2br(e($wisata->deskripsi)) !!}
                </div>
                
            </div>
            
            <!-- Footer Action -->
            <div class="bg-gray-50 px-6 py-6 sm:px-10 border-t border-gray-100 flex justify-between items-center">
                <a href="{{ url('/wisata') }}" class="inline-flex items-center text-gray-600 hover:text-primary font-medium transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
