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
                
                <!-- Bagikan -->
                <div class="mt-12 pt-8 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="flex items-center gap-4">
                        <span class="text-sm font-bold text-gray-900">Bagikan destinasi ini:</span>
                        <div class="flex gap-2">
                            <!-- WhatsApp -->
                            <a href="https://api.whatsapp.com/send?text={{ urlencode('Yuk kunjungi ' . $wisata->nama_wisata . ' di Desa Cigalontang! Cek info lengkapnya: ' . request()->fullUrl()) }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 border border-gray-200 text-gray-500 flex items-center justify-center hover:bg-green-500 hover:text-white hover:border-green-500 transition-colors shadow-sm" title="Bagikan ke WhatsApp">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.031 2C6.495 2 2.032 6.463 2.032 12c0 1.761.458 3.486 1.332 5.01L2 22l5.122-1.343a9.924 9.924 0 0 0 4.909 1.306h.001c5.535 0 9.998-4.463 9.998-10.001 0-2.684-1.045-5.207-2.943-7.106A9.925 9.925 0 0 0 12.031 2Zm0 18.256h-.001a8.232 8.232 0 0 1-4.185-1.13l-.3-.178-3.109.816.831-3.03-.195-.31a8.216 8.216 0 0 1-1.258-4.425c0-4.551 3.702-8.253 8.255-8.253 2.205 0 4.278.86 5.837 2.42 1.56 1.56 2.417 3.633 2.417 5.839 0 4.551-3.702 8.252-8.252 8.252Zm4.526-6.177c-.248-.124-1.468-.724-1.696-.807-.227-.083-.393-.124-.559.124-.165.248-.64 .807-.785.972-.144.165-.29.186-.538.062-.248-.124-1.048-.387-1.996-1.233-.738-.659-1.236-1.474-1.381-1.722-.144-.248-.016-.382.109-.506.113-.112.248-.289.371-.434.124-.145.165-.248.248-.413.083-.165.041-.31-.02-.434-.063-.124-.559-1.348-.766-1.844-.2-.483-.404-.418-.559-.425-.144-.008-.309-.009-.474-.009a.908.908 0 0 0-.66.309c-.227.248-.867.847-.867 2.065s.888 2.396 1.011 2.56c.124.165 1.745 2.663 4.23 3.734.591.254 1.052.406 1.411.52.593.188 1.133.161 1.558.098.475-.07 1.468-.6 1.674-1.178.207-.578.207-1.074.145-1.178-.062-.104-.227-.165-.475-.29Z" clip-rule="evenodd"/></svg>
                            </a>
                            
                            <!-- Facebook -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-50 border border-gray-200 text-gray-500 flex items-center justify-center hover:bg-blue-600 hover:text-white hover:border-blue-600 transition-colors shadow-sm" title="Bagikan ke Facebook">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.001 2C6.478 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V15.01h-2.54v-3.01h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562v1.876h2.773l-.443 3.01h-2.33v6.868C18.343 21.128 22 16.99 22 12c0-5.523-4.477-10-10-10Z" clip-rule="evenodd"/></svg>
                            </a>

                            <!-- Instagram -->
                            <button onclick="copyLinkWisata('{{ request()->fullUrl() }}')" class="w-10 h-10 rounded-full bg-gray-50 border border-gray-200 text-gray-500 flex items-center justify-center hover:bg-gradient-to-tr hover:from-yellow-400 hover:via-pink-500 hover:to-purple-600 hover:text-white hover:border-transparent transition-all shadow-sm" title="Salin Tautan untuk Instagram">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                            </button>

                            <!-- TikTok -->
                            <button onclick="copyLinkWisata('{{ request()->fullUrl() }}')" class="w-10 h-10 rounded-full bg-gray-50 border border-gray-200 text-gray-500 flex items-center justify-center hover:bg-black hover:text-white hover:border-black transition-colors shadow-sm" title="Salin Tautan untuk TikTok">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 448 512"><path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <script>
                function copyLinkWisata(url) {
                    navigator.clipboard.writeText(url).then(() => {
                        alert('Tautan destinasi wisata berhasil disalin! Silakan bagikan di Instagram atau TikTok Anda.');
                    }).catch(err => {
                        console.error('Gagal menyalin tautan: ', err);
                    });
                }
                </script>
                
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
