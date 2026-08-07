@extends('layouts.public')

@section('title', 'Beranda')

@section('content')
@php 
    $settings = \App\Models\Setting::pluck('value', 'key')->toArray(); 
@endphp
<!-- Premium Hero Section -->
<section class="relative overflow-hidden min-h-screen flex items-center justify-center">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="/images/hero-bg-2.jpg" alt="Pemandangan Desa Cigalontang" class="w-full h-full object-cover">
        <!-- Cinematic Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/40 to-black/70"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full mt-20">
        <!-- Teks Sambutan Centered -->
        <div class="text-center flex flex-col items-center">
            
            <!-- Top Pill -->
            <div class="inline-flex items-center gap-2 px-5 py-2 rounded-full text-white/90 text-sm font-medium border border-white/30 backdrop-blur-sm shadow-sm mb-6">
                <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Tasikmalaya, Jawa Barat
            </div>
            
            <!-- Headline -->
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white tracking-tight drop-shadow-xl mb-2">
                Selamat Datang di Website Resmi
            </h1>
            
            <h2 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-extrabold text-green-400 drop-shadow-2xl tracking-tight mb-6">
                Desa Cigalontang
            </h2>
            
            <!-- Sub-pill Location -->
            <div class="flex items-center justify-center gap-2 text-white/90 text-base sm:text-lg mb-6 font-medium">
                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path></svg>
                Kecamatan Cigalontang, Kabupaten Tasikmalaya
            </div>
            
            <!-- Narasi (Existing) -->
            <p class="text-base sm:text-lg md:text-xl text-gray-200 max-w-3xl mx-auto leading-relaxed drop-shadow-md mb-10">
                {{ $settings['sejarah_singkat'] ?? 'Mewujudkan masyarakat yang mandiri, berbudaya, dan inovatif. Temukan segala informasi, potensi wisata, dan berita kegiatan Desa Cigalontang secara transparan.' }}
            </p>
            
            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full sm:w-auto px-4 sm:px-0">
                <a href="/profil" class="w-full sm:w-auto flex items-center justify-center gap-3 px-8 py-3.5 text-base font-bold rounded-lg text-white bg-primary hover:bg-primary-dark transition-all transform hover:-translate-y-0.5 shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7-7m7-7H3"></path></svg>
                    Jelajahi Profil Desa
                </a>
                <a href="/aspirasi" class="w-full sm:w-auto flex items-center justify-center gap-3 px-8 py-3.5 border border-white/40 text-base font-bold rounded-lg text-white bg-black/20 backdrop-blur-md hover:bg-white/10 hover:border-white/60 transition-all shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Sampaikan Aspirasi
                </a>
            </div>
            
        </div>
    </div>
</section>
<!-- Jelajahi Desa Section -->
<section class="py-24 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
    <!-- Background Decor -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full blur-3xl -mr-20 -mt-20"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-secondary/5 rounded-full blur-3xl -ml-20 -mb-20"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-primary font-bold tracking-wider uppercase text-sm mb-2 block">Eksplorasi</span>
            <h2 class="text-4xl font-extrabold text-gray-900 sm:text-5xl mb-6">Jelajahi Desa Kami</h2>
            <div class="w-24 h-1.5 bg-gradient-to-r from-primary to-secondary mx-auto mt-6 rounded-full"></div>
            <p class="mt-8 text-xl text-gray-600 leading-relaxed">
                Melalui website resmi ini, Anda dapat menjelajahi segala aspek Desa Cigalontang. Kami menyediakan berbagai layanan dan informasi publik secara terbuka untuk kemudahan masyarakat.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Menu Items -->
            <a href="/profil" class="group bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-primary/30 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-primary/10 to-primary/5 text-primary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors">Profil Desa</h3>
                <p class="text-gray-500">Mengenal lebih dekat sejarah, visi, misi, dan struktur pemerintahan Desa Cigalontang.</p>
            </a>

            <a href="/data-desa" class="group bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-secondary/30 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-secondary/10 to-secondary/5 text-secondary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-secondary transition-colors">Data Desa</h3>
                <p class="text-gray-500">Transparansi data kependudukan, statistik, dan demografi masyarakat desa secara real-time.</p>
            </a>

            <a href="/berita" class="group bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-accent/30 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-accent/10 to-accent/5 text-accent rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-accent transition-colors">Berita & Artikel</h3>
                <p class="text-gray-500">Kabar terbaru, pengumuman, dan artikel seputar kegiatan warga di Desa Cigalontang.</p>
            </a>

            <a href="/galeri" class="group bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-pink-500/30 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-pink-500/10 to-pink-500/5 text-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-pink-500 transition-colors">Galeri Dokumentasi</h3>
                <p class="text-gray-500">Kumpulan foto dan dokumentasi visual dari berbagai program pembangunan dan acara desa.</p>
            </a>

            <a href="/umkm" class="group bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-orange-500/30 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500/10 to-orange-500/5 text-orange-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-orange-500 transition-colors">Produk UMKM</h3>
                <p class="text-gray-500">Mendukung ekonomi lokal melalui etalase produk-produk unggulan dari masyarakat Cigalontang.</p>
            </a>

            <a href="/wisata" class="group bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-teal-500/30 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-teal-500/10 to-teal-500/5 text-teal-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-teal-500 transition-colors">Potensi Wisata</h3>
                <p class="text-gray-500">Jelajahi keindahan alam dan destinasi wisata menarik yang ada di wilayah Desa Cigalontang.</p>
            </a>
        </div>
    </div>
</section>

<!-- Sambutan Kepala Desa -->
<section id="sambutan" class="py-20 bg-gray-50 border-y border-gray-100 relative overflow-hidden">
    <div class="absolute inset-0 bg-primary/5"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 lg:p-16 border border-gray-100">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-center">
                <div class="lg:col-span-1 text-center">
                    <div class="relative w-48 h-48 mx-auto md:w-64 md:h-64 rounded-full p-2 border-4 border-primary/20 bg-white shadow-lg overflow-hidden">
                        <!-- Foto Kades -->
                        @if(isset($settings['foto_kades']) && $settings['foto_kades'])
                            <img src="{{ Storage::url($settings['foto_kades']) }}" alt="Kepala Desa" class="w-full h-full object-cover rounded-full">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($settings['kepala_desa'] ?? 'Kepala Desa') }}&background=15803d&color=fff&size=256" alt="Kepala Desa" class="w-full h-full object-cover rounded-full">
                        @endif
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mt-6 mb-1">{{ $settings['kepala_desa'] ?? 'Nama Kepala Desa' }}</h3>
                    <p class="text-primary font-bold uppercase tracking-widest text-sm">Kepala Desa</p>
                </div>
                <div class="lg:col-span-2">
                    <svg class="w-12 h-12 text-gray-200 mb-6" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"></path></svg>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Sambutan Kepala Desa</h2>
                    <div class="prose prose-lg text-gray-600">
                        {!! nl2br(e($settings['sambutan_kades'] ?? 'Assalamu’alaikum Warahmatullahi Wabarakatuh, Puji syukur senantiasa kita panjatkan kehadirat Allah SWT...')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Peta Desa Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Peta Wilayah Desa Cigalontang</h2>
            <div class="w-20 h-1.5 bg-primary mx-auto mt-6 rounded-full"></div>
            <p class="mt-6 text-lg text-gray-600">Representasi visual wilayah administratif Desa Cigalontang, Kecamatan Cigalontang, Kabupaten Tasikmalaya.</p>
        </div>
        
        <div class="bg-white rounded-3xl p-2 shadow-2xl border border-gray-100 relative group overflow-hidden">
            <div class="absolute inset-0 bg-primary/5 opacity-0 group-hover:opacity-100 transition-opacity z-10 pointer-events-none"></div>
            <img src="/images/peta-desa.jpg" alt="Peta Desa Cigalontang" class="w-full h-auto object-cover rounded-2xl bg-gray-50">
        </div>
        
        <div class="text-center mt-8">
            <a href="/profil" class="inline-flex items-center text-primary font-bold hover:text-primary-dark hover:underline">
                Lihat Detail Peta Per Dusun
                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>
</section>
<!-- Call to Action Aspirasi -->
<section class="py-20 relative overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="bg-gradient-to-br from-primary to-primary-dark rounded-3xl p-10 md:p-16 shadow-2xl overflow-hidden relative group">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-white opacity-5 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-1000"></div>
            <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-secondary opacity-20 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-1000"></div>
            
            <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="text-center md:text-left">
                    <div class="inline-flex items-center justify-center p-3 bg-white/10 rounded-2xl mb-6 backdrop-blur-sm border border-white/20">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">Suara Anda<br><span class="text-white/80 text-3xl md:text-4xl">Membangun Desa</span></h2>
                    <p class="text-lg mb-8 max-w-lg leading-relaxed text-white/90 mx-auto md:mx-0">Pemerintah Desa Cigalontang sangat terbuka terhadap aspirasi, kritik, dan saran dari masyarakat untuk kemajuan kita bersama.</p>
                </div>
                <div class="flex justify-center md:justify-end">
                    <a href="/aspirasi" class="group relative inline-flex items-center justify-center px-10 py-5 text-lg font-bold text-primary bg-white rounded-full overflow-hidden shadow-2xl hover:shadow-white/20 transition-all hover:-translate-y-1">
                        <span class="absolute inset-0 w-full h-full -mt-1 rounded-lg opacity-30 bg-gradient-to-b from-transparent via-transparent to-black"></span>
                        <span class="relative flex items-center gap-3">
                            Sampaikan Aspirasi
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7-7m7-7H3"></path></svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Profil Desa Section -->
<section class="py-20 bg-gray-50 border-t border-gray-100 relative overflow-hidden">
    <div class="absolute inset-0 bg-primary/5"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-primary font-bold tracking-wider uppercase text-sm mb-2 block">Dokumentasi Visual</span>
            <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Profil Desa Cigalontang</h2>
            <div class="w-20 h-1.5 bg-gradient-to-r from-primary to-secondary mx-auto mt-6 rounded-full"></div>
            <p class="mt-6 text-lg text-gray-600">Simak lebih dekat potensi, keindahan alam, serta kegiatan masyarakat Desa Cigalontang melalui tayangan video berikut ini.</p>
        </div>
        
        <div class="relative max-w-4xl mx-auto">
            <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white transform hover:scale-[1.01] transition-transform duration-500 bg-gray-100 aspect-video">
                <iframe class="w-full h-full absolute inset-0" src="https://www.youtube.com/embed/slA53pTHvhU" title="Profil Desa Cigalontang" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <!-- Floating Badge -->
            <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl border border-gray-100 hidden md:flex items-center gap-4 animate-bounce" style="animation-duration: 3s;">
                <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-bold uppercase">Status Desa</p>
                    <p class="text-sm font-black text-gray-900">Desa Mandiri 2026</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
