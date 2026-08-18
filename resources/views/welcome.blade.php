@extends('layouts.public')

@section('title', 'Beranda')

@section('content')
@php 
    $settings = \App\Models\Setting::pluck('value', 'key')->toArray(); 
@endphp
<!-- Premium Hero Section -->
<section class="relative overflow-hidden min-h-[100svh] flex items-center justify-center pt-28 pb-16">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="/images/hero-bg-2.jpg" alt="Pemandangan Desa Cigalontang" class="w-full h-full object-cover">
        <!-- Cinematic Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/40 to-black/70"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <!-- Teks Sambutan Centered -->
        <div class="text-center flex flex-col items-center">
            
            <!-- Top Pill -->
            <div data-aos="fade-down" data-aos-delay="100" class="inline-flex items-center gap-2 px-5 py-2 rounded-full text-white/90 text-sm font-medium border border-white/30 backdrop-blur-sm shadow-sm mb-6">
                <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Tasikmalaya, Jawa Barat
            </div>
            
            <!-- Headline -->
            <h1 data-aos="zoom-in-up" data-aos-delay="200" class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white tracking-tight drop-shadow-xl mb-2">
                Selamat Datang di Website Resmi
            </h1>
            
            <h2 data-aos="zoom-in-up" data-aos-delay="400" class="text-5xl sm:text-6xl md:text-7xl lg:text-[5rem] leading-tight font-extrabold text-green-400 drop-shadow-2xl tracking-tight mb-6">
                Desa Cigalontang
            </h2>
            
            <!-- Sub-pill Location -->
            <div data-aos="fade-up" data-aos-delay="600" class="flex items-center justify-center gap-2 text-white/90 text-base sm:text-lg mb-6 font-medium">
                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path></svg>
                Kecamatan Cigalontang, Kabupaten Tasikmalaya
            </div>
            
            
            <!-- Buttons -->
            <div data-aos="zoom-in" data-aos-delay="900" class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full sm:w-auto px-4 sm:px-0">
                <a href="/profil" class="w-full sm:w-auto flex items-center justify-center gap-3 px-8 py-3.5 text-base font-bold rounded-lg text-white bg-primary hover:bg-primary-dark transition-all transform hover:-translate-y-0.5 shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    Jelajahi Profil Desa
                </a>
                <a href="/aspirasi" class="w-full sm:w-auto flex items-center justify-center gap-3 px-8 py-3.5 border border-white/40 text-base font-bold rounded-lg text-white bg-black/20 backdrop-blur-md hover:bg-white hover:text-primary hover:border-white active:scale-95 transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-xl shadow-lg">
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
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <span class="text-primary font-bold tracking-wider uppercase text-sm mb-2 block">Eksplorasi</span>
            <h2 class="text-4xl font-extrabold text-gray-900 sm:text-5xl mb-6">Jelajahi Desa Kami</h2>
            <div class="w-24 h-1.5 bg-gradient-to-r from-primary to-secondary mx-auto mt-6 rounded-full"></div>
            <p class="mt-8 text-xl text-gray-600 leading-relaxed">
                Melalui website resmi ini, Anda dapat menjelajahi segala aspek Desa Cigalontang. Kami menyediakan berbagai layanan dan informasi publik secara terbuka untuk kemudahan masyarakat.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Menu Items -->
            <a href="/profil" data-aos="fade-up" data-aos-delay="100" class="group bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-primary/30 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-primary/10 to-primary/5 text-primary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors">Profil Desa</h3>
                <p class="text-gray-500">Mengenal lebih dekat sejarah, visi, misi, dan struktur pemerintahan Desa Cigalontang.</p>
            </a>

            <a href="/aspirasi" data-aos="fade-up" data-aos-delay="200" class="group bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-secondary/30 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-secondary/10 to-secondary/5 text-secondary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-secondary transition-colors">Hubungi Kami</h3>
                <p class="text-gray-500">Sampaikan aspirasi, pertanyaan, atau laporan Anda langsung kepada pemerintah Desa Cigalontang.</p>
            </a>

            <a href="/berita" data-aos="fade-up" data-aos-delay="300" class="group bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-accent/30 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-accent/10 to-accent/5 text-accent rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-accent transition-colors">Berita & Artikel</h3>
                <p class="text-gray-500">Kabar terbaru, pengumuman, dan artikel seputar kegiatan warga di Desa Cigalontang.</p>
            </a>

            <a href="/galeri" data-aos="fade-up" data-aos-delay="400" class="group bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-pink-500/30 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-pink-500/10 to-pink-500/5 text-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-pink-500 transition-colors">Galeri Dokumentasi</h3>
                <p class="text-gray-500">Kumpulan foto dan dokumentasi visual dari berbagai program pembangunan dan acara desa.</p>
            </a>

            <a href="/umkm" data-aos="fade-up" data-aos-delay="500" class="group bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-orange-500/30 transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500/10 to-orange-500/5 text-orange-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-orange-500 transition-colors">Produk UMKM</h3>
                <p class="text-gray-500">Mendukung ekonomi lokal melalui etalase produk-produk unggulan dari masyarakat Cigalontang.</p>
            </a>

            <a href="/wisata" data-aos="fade-up" data-aos-delay="600" class="group bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-teal-500/30 transition-all duration-300 transform hover:-translate-y-2">
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
<section id="sambutan" class="py-24 relative overflow-hidden bg-white">
    <!-- Decorative Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-green-50 via-white to-green-50/50"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-secondary/5 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="bg-white/80 backdrop-blur-xl rounded-[2.5rem] shadow-2xl p-8 md:p-12 lg:p-16 border border-white relative overflow-hidden group">
            <!-- Inner decoration -->
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-primary via-secondary to-primary"></div>
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                
                <!-- Foto Kades (Col 1-4) -->
                <div class="lg:col-span-4 flex flex-col items-center text-center relative" data-aos="zoom-in" data-aos-delay="100">
                    <!-- Decor ring behind image -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-full blur-2xl"></div>
                    
                    <div class="relative w-56 h-56 md:w-72 md:h-72 mx-auto rounded-full p-2.5 bg-gradient-to-br from-primary via-green-400 to-secondary shadow-2xl mb-8">
                        <div class="w-full h-full rounded-full overflow-hidden border-4 border-white bg-white relative">
                            @if(isset($settings['foto_kades']) && $settings['foto_kades'])
                                <img src="{{ Storage::url($settings['foto_kades']) }}" alt="Kepala Desa" class="w-full h-full object-cover">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($settings['kepala_desa'] ?? 'Kepala Desa') }}&background=15803d&color=fff&size=512" alt="Kepala Desa" class="w-full h-full object-cover">
                            @endif
                        </div>
                        
                        <!-- Badge -->
                        <div class="absolute -bottom-4 right-4 bg-white px-4 py-2 rounded-2xl shadow-xl border border-gray-100 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                            <span class="text-xs font-bold text-gray-700 uppercase tracking-wider">Kepala Desa</span>
                        </div>
                    </div>
                    
                    <h3 class="text-3xl font-black text-gray-900 mb-1 tracking-tight">{{ $settings['kepala_desa'] ?? 'Nama Kepala Desa' }}</h3>
                    <p class="text-primary font-bold uppercase tracking-widest text-sm bg-green-50 px-4 py-1.5 rounded-full inline-block">Desa Cigalontang</p>
                </div>
                
                <!-- Teks Sambutan (Col 5-12) -->
                <div class="lg:col-span-8">
                    <!-- Label & Judul (Di luar kotak hijau) -->
                    <div class="mb-6" data-aos="fade-left" data-aos-delay="200">
                        <div class="inline-block px-3 py-1 bg-green-50 text-primary text-xs font-bold tracking-widest uppercase rounded mb-3">Sambutan</div>
                        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight mb-4">Sambutan Kepala Desa</h2>
                        <div class="w-16 h-1.5 bg-gradient-to-r from-primary to-secondary rounded-full"></div>
                    </div>
                    
                    <!-- Kotak Hijau Sambutan -->
                    <div data-aos="fade-up" data-aos-delay="300" class="relative bg-primary rounded-tl-[3rem] rounded-br-[3rem] rounded-tr-xl rounded-bl-xl p-8 md:p-10 shadow-xl overflow-hidden group hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <!-- Ornamen Latar (Quote besar samar) -->
                        <svg class="absolute -top-6 -left-6 w-32 h-32 text-white/10 transform -rotate-12 group-hover:rotate-0 transition-transform duration-700" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"></path></svg>
                        
                        <!-- Teks Sambutan -->
                        <div class="prose prose-lg md:prose-xl max-w-none text-white/95 italic leading-relaxed relative z-10 font-medium">
                            "{!! nl2br(e($settings['sambutan_kades'] ?? 'Assalamu’alaikum Warahmatullahi Wabarakatuh, Puji syukur senantiasa kita panjatkan kehadirat Allah SWT...')) !!}"
                        </div>
                        
                        <!-- Lingkaran kecil ornamen di ujung -->
                        <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
                        <div class="absolute bottom-6 right-6 w-10 h-10 bg-white/20 rounded-full flex items-center justify-center transform group-hover:-translate-y-2 transition-transform duration-500">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

<!-- Peta Desa Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Peta Wilayah Desa Cigalontang</h2>
            <div class="w-20 h-1.5 bg-primary mx-auto mt-6 rounded-full"></div>
            <p class="mt-6 text-lg text-gray-600">Representasi visual wilayah administratif Desa Cigalontang, Kecamatan Cigalontang, Kabupaten Tasikmalaya.</p>
        </div>
        
        <div data-aos="zoom-in" data-aos-delay="200" class="bg-white rounded-3xl p-2 shadow-2xl border border-gray-100 relative group overflow-hidden">
            <div class="absolute inset-0 bg-primary/5 opacity-0 group-hover:opacity-100 transition-opacity z-10 pointer-events-none"></div>
            <img src="/images/peta-desa.jpg" alt="Peta Desa Cigalontang" class="w-full h-auto object-cover rounded-2xl bg-gray-50">
        </div>
        
        <div class="text-center mt-8" data-aos="fade-up" data-aos-delay="300">
            <a href="/profil" class="inline-flex items-center text-primary font-bold hover:text-primary-dark hover:underline">
                Lihat Detail Peta Per Dusun
                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>
</section>
<!-- Call to Action Aspirasi -->
<section class="pb-24 pt-4 relative overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div data-aos="flip-up" class="bg-gradient-to-br from-primary to-primary-dark rounded-3xl p-10 md:p-16 shadow-2xl overflow-hidden relative group">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-white opacity-5 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-1000"></div>
            <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-white opacity-10 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-1000"></div>
            
            <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="text-center md:text-left" data-aos="fade-right" data-aos-delay="200">
                    <div class="inline-flex items-center justify-center p-3 bg-white/10 rounded-2xl mb-6 backdrop-blur-sm border border-white/20">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">Suara Anda<br><span class="text-white/80 text-3xl md:text-4xl">Membangun Desa</span></h2>
                    <p class="text-lg mb-8 max-w-lg leading-relaxed text-white/90 mx-auto md:mx-0">Pemerintah Desa Cigalontang sangat terbuka terhadap aspirasi, kritik, dan saran dari masyarakat untuk kemajuan kita bersama.</p>
                </div>
                <div class="flex justify-center md:justify-end" data-aos="zoom-in" data-aos-delay="400">
                    <!-- Tombol dengan efek ripple/glow putih -->
                    <div class="relative">
                        <div class="absolute inset-0 bg-white rounded-full blur animate-pulse opacity-40"></div>
                        <a href="/aspirasi" class="group relative inline-flex items-center justify-center px-10 py-5 text-lg font-bold text-primary bg-white rounded-full overflow-hidden shadow-2xl hover:bg-gray-50 active:scale-95 transition-all duration-300 hover:-translate-y-1 hover:shadow-white/40 border border-white">
                            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-gray-100/50 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700 ease-in-out"></span>
                            <span class="relative flex items-center gap-3">
                                Sampaikan Aspirasi
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Profil Desa Section -->
<section class="py-20 bg-gray-50 border-t border-gray-100 relative overflow-hidden">
    <div class="absolute inset-0 bg-primary/5"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-12" data-aos="fade-up">
            <span class="text-primary font-bold tracking-wider uppercase text-sm mb-2 block">Dokumentasi Visual</span>
            <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Profil Desa Cigalontang</h2>
            <div class="w-20 h-1.5 bg-gradient-to-r from-primary to-secondary mx-auto mt-6 rounded-full"></div>
            <p class="mt-6 text-lg text-gray-600">Simak lebih dekat potensi, keindahan alam, serta kegiatan masyarakat Desa Cigalontang melalui tayangan video berikut ini.</p>
        </div>
        
        <div class="relative max-w-3xl mx-auto mt-10" data-aos="zoom-in-up" data-aos-delay="200">
            <div class="relative rounded-2xl overflow-hidden shadow-2xl ring-1 ring-gray-900/5 transform hover:scale-[1.02] transition-all duration-500 bg-gray-900 aspect-video group">
                <iframe class="w-full h-full absolute inset-0 opacity-95 group-hover:opacity-100 transition-opacity duration-500" src="https://www.youtube.com/embed/slA53pTHvhU" title="Profil Desa Cigalontang" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
