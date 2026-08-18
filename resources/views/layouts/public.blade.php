<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    @php
        $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
    @endphp

    <!-- SEO Meta Tags -->
    <title>@yield('title', 'Beranda') - Desa Cigalontang</title>
    <meta name="description" content="@yield('meta_description', $settings['desa_description'] ?? 'Website Resmi Desa Cigalontang, Kecamatan Cigalontang, Kabupaten Tasikmalaya. Pusat informasi, layanan publik, berita, dan potensi desa.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Desa Cigalontang, Tasikmalaya, Kecamatan Cigalontang, Berita Desa, Wisata Desa, UMKM Desa, Layanan Publik, Desa Digital')">
    <meta name="author" content="Pemerintah Desa Cigalontang">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="theme-color" content="#16a34a">

    <!-- Open Graph / Facebook -->
    <meta property="og:site_name" content="Portal Desa Cigalontang">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Beranda') - Desa Cigalontang">
    <meta property="og:description" content="@yield('meta_description', $settings['desa_description'] ?? 'Website Resmi Desa Cigalontang, Kecamatan Cigalontang, Kabupaten Tasikmalaya.')">
    <meta property="og:image" content="@yield('meta_image', asset('images/hero-bg-2.jpg'))">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', 'Beranda') - Desa Cigalontang">
    <meta name="twitter:description" content="@yield('meta_description', $settings['desa_description'] ?? 'Website Resmi Desa Cigalontang, Kecamatan Cigalontang, Kabupaten Tasikmalaya.')">
    <meta name="twitter:image" content="@yield('meta_image', asset('images/hero-bg-2.jpg'))">

    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "GovernmentOrganization",
      "name": "Pemerintah Desa Cigalontang",
      "alternateName": "Desa Cigalontang",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('images/logo.png') }}",
      "address": {
        "@@type": "PostalAddress",
        "streetAddress": "{{ $settings['address'] ?? 'Kantor Kepala Desa Cigalontang' }}",
        "addressLocality": "Cigalontang",
        "addressRegion": "Jawa Barat",
        "addressCountry": "ID"
      },
      "contactPoint": {
        "@@type": "ContactPoint",
        "telephone": "{{ $settings['contact_phone'] ?? '' }}",
        "email": "{{ $settings['contact_email'] ?? '' }}",
        "contactType": "Informasi Publik"
      }
    }
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=montserrat:400,500,600,700,800,900|roboto:400,500,700&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50 relative selection:bg-primary/20 selection:text-primary">
    <!-- Navbar -->
    <nav x-data="{ open: false, scrolled: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 20)"
         :class="{'bg-white/90 backdrop-blur-xl border-b border-gray-200 shadow-sm': scrolled, '{{ request()->is('/') ? 'bg-white/70 backdrop-blur-lg border-b border-white/30' : 'bg-white border-b border-gray-100' }}': !scrolled}"
         class="fixed w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="/" class="flex items-center gap-3 group">
                        <!-- Logo Desa -->
                        <img src="/images/logo.png" alt="Logo Desa Cigalontang" class="w-12 h-12 object-contain group-hover:scale-105 transition-transform drop-shadow-md">
                        <div class="flex flex-col">
                            <span class="font-bold text-xl leading-none text-primary">Desa Cigalontang</span>
                            <span class="text-xs font-semibold text-accent tracking-widest mt-1 uppercase">Kabupaten Tasikmalaya</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex lg:items-center lg:space-x-2">
                    <a href="/" class="px-4 py-2 rounded-full font-medium transition-all {{ request()->is('/') ? 'bg-primary/10 text-primary font-bold' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">Beranda</a>
                    <a href="/profil" class="px-4 py-2 rounded-full font-medium transition-all {{ request()->is('profil') ? 'bg-primary/10 text-primary font-bold' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">Profil</a>
                    <a href="/berita" class="px-4 py-2 rounded-full font-medium transition-all {{ request()->is('berita*') ? 'bg-primary/10 text-primary font-bold' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">Berita</a>
                    <a href="/galeri" class="px-4 py-2 rounded-full font-medium transition-all {{ request()->is('galeri*') ? 'bg-primary/10 text-primary font-bold' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">Galeri</a>
                    <a href="/umkm" class="px-4 py-2 rounded-full font-medium transition-all {{ request()->is('umkm*') ? 'bg-primary/10 text-primary font-bold' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">UMKM</a>
                    
                    <a href="/wisata" class="px-4 py-2 rounded-full font-medium transition-all {{ request()->is('wisata*') || request()->is('paket-wisata*') ? 'bg-primary/10 text-primary font-bold' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">Wisata & Budaya</a>

                    <a href="/aspirasi" class="px-4 py-2 rounded-full font-medium transition-all {{ request()->is('aspirasi') ? 'bg-primary/10 text-primary font-bold' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">Hubungi Kami</a>
                    
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-5 py-2.5 bg-primary text-white font-medium rounded-full hover:bg-primary-dark transition-all shadow-md hover:shadow-lg">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-5 py-2.5 bg-primary/10 text-primary font-semibold rounded-full hover:bg-primary hover:text-white transition-all">Login</a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center lg:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             @click.outside="open = false" 
             style="display: none;" 
             class="lg:hidden absolute top-20 left-0 w-full px-4 pb-4">
            <div class="bg-white/95 backdrop-blur-xl border border-gray-100 shadow-2xl rounded-3xl overflow-hidden">
                <div class="pt-4 pb-4 space-y-1.5 text-center px-4">
                    <a href="/" class="block px-4 py-3 rounded-2xl {{ request()->is('/') ? 'bg-primary text-white font-bold shadow-md' : 'text-gray-600 hover:text-primary hover:bg-green-50 font-semibold' }} transition-all">Beranda</a>
                    <a href="/profil" class="block px-4 py-3 rounded-2xl {{ request()->is('profil') ? 'bg-primary text-white font-bold shadow-md' : 'text-gray-600 hover:text-primary hover:bg-green-50 font-semibold' }} transition-all">Profil</a>
                    <a href="/berita" class="block px-4 py-3 rounded-2xl {{ request()->is('berita*') ? 'bg-primary text-white font-bold shadow-md' : 'text-gray-600 hover:text-primary hover:bg-green-50 font-semibold' }} transition-all">Berita</a>
                    <a href="/galeri" class="block px-4 py-3 rounded-2xl {{ request()->is('galeri*') ? 'bg-primary text-white font-bold shadow-md' : 'text-gray-600 hover:text-primary hover:bg-green-50 font-semibold' }} transition-all">Galeri</a>
                    <a href="/umkm" class="block px-4 py-3 rounded-2xl {{ request()->is('umkm*') ? 'bg-primary text-white font-bold shadow-md' : 'text-gray-600 hover:text-primary hover:bg-green-50 font-semibold' }} transition-all">UMKM</a>
                    
                    <a href="/wisata" class="block px-4 py-3 rounded-2xl {{ request()->is('wisata*') || request()->is('paket-wisata*') ? 'bg-primary text-white font-bold shadow-md' : 'text-gray-600 hover:text-primary hover:bg-green-50 font-semibold' }} transition-all">Wisata & Budaya</a>
    
                    <a href="/aspirasi" class="block px-4 py-3 rounded-2xl {{ request()->is('aspirasi') ? 'bg-primary text-white font-bold shadow-md' : 'text-gray-600 hover:text-primary hover:bg-green-50 font-semibold' }} transition-all">Hubungi Kami</a>
                    
                    <div class="pt-4 mt-2 border-t border-gray-100">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="block px-4 py-3.5 rounded-2xl bg-primary text-white font-bold shadow-md hover:bg-green-700 transition-all flex items-center justify-center gap-2">
                                Dashboard
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="block px-4 py-3.5 rounded-2xl bg-primary/10 text-primary font-bold hover:bg-primary hover:text-white transition-all flex items-center justify-center gap-2">
                                Login Administrator
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="{{ request()->is('/') ? '' : 'pt-20' }} min-h-screen">
        @yield('content')
    </main>

    <!-- Footer Premium -->
    <footer class="bg-gray-950 text-white pt-20 pb-10 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8">
                <div class="lg:col-span-4">
                    <h3 class="text-3xl font-extrabold text-white flex items-center gap-3 mb-6 tracking-tight">
                        <img src="/images/logo.png" alt="Logo Desa Cigalontang" class="w-14 h-14 object-contain drop-shadow-lg">
                        Desa Cigalontang
                    </h3>
                    <p class="text-gray-400 mb-8 max-w-md leading-relaxed">{!! Str::inlineMarkdown($settings['desa_description'] ?? 'Mewujudkan desa yang maju, mandiri, dan berbudaya melalui inovasi digital dan pemberdayaan masyarakat seutuhnya. Nanjeur tur nanjung.') !!}</p>
                    
                    @if(
                        (isset($settings['social_facebook']) && $settings['social_facebook']) || 
                        (isset($settings['social_instagram']) && $settings['social_instagram']) || 
                        (isset($settings['social_youtube']) && $settings['social_youtube']) || 
                        (isset($settings['social_whatsapp']) && $settings['social_whatsapp']) || 
                        (isset($settings['social_tiktok']) && $settings['social_tiktok'])
                    )
                    <h4 class="text-lg font-bold text-white mb-6">Ikuti Kami</h4>
                    <div class="flex space-x-4">
                        @if(isset($settings['social_facebook']) && $settings['social_facebook'])
                        <a href="{{ $settings['social_facebook'] }}" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-primary hover:text-white transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>
                        @endif

                        @if(isset($settings['social_instagram']) && $settings['social_instagram'])
                        <a href="{{ $settings['social_instagram'] }}" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-primary hover:text-white transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                        @endif

                        @if(isset($settings['social_youtube']) && $settings['social_youtube'])
                        <a href="{{ $settings['social_youtube'] }}" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-primary hover:text-white transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg></a>
                        @endif
                        
                        @if(isset($settings['social_whatsapp']) && $settings['social_whatsapp'])
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['social_whatsapp']) }}" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-primary hover:text-white transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.711.927 3.149.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.768-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.664.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 3.825 0 6.938 3.112 6.939 6.937.001 3.826-3.113 6.938-6.939 6.943z"/></svg></a>
                        @endif

                        @if(isset($settings['social_tiktok']) && $settings['social_tiktok'])
                        <a href="{{ $settings['social_tiktok'] }}" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-primary hover:text-white transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg></a>
                        @endif
                    </div>
                    @endif
                </div>
                <div class="lg:col-span-2">
                    <h4 class="text-lg font-bold text-white mb-8">Navigasi Cepat</h4>
                    <ul class="space-y-4">
                        <li><a href="/" class="text-gray-400 hover:text-primary transition-colors flex items-center gap-3"><span class="text-primary text-[10px]">▶</span> Beranda</a></li>
                        <li><a href="/profil" class="text-gray-400 hover:text-primary transition-colors flex items-center gap-3"><span class="text-primary text-[10px]">▶</span> Profil</a></li>
                        <li><a href="/berita" class="text-gray-400 hover:text-primary transition-colors flex items-center gap-3"><span class="text-primary text-[10px]">▶</span> Berita</a></li>
                        <li><a href="/galeri" class="text-gray-400 hover:text-primary transition-colors flex items-center gap-3"><span class="text-primary text-[10px]">▶</span> Galeri</a></li>
                        <li><a href="/umkm" class="text-gray-400 hover:text-primary transition-colors flex items-center gap-3"><span class="text-primary text-[10px]">▶</span> UMKM</a></li>
                        <li><a href="/wisata" class="text-gray-400 hover:text-primary transition-colors flex items-center gap-3"><span class="text-primary text-[10px]">▶</span> Wisata & Budaya</a></li>
                        <li><a href="/aspirasi" class="text-gray-400 hover:text-primary transition-colors flex items-center gap-3"><span class="text-primary text-[10px]">▶</span> Hubungi Kami</a></li>
                    </ul>
                </div>
                <div class="lg:col-span-3">
                    <h4 class="text-lg font-bold text-white mb-8">Hubungi Kami</h4>
                    <ul class="space-y-6 text-gray-400">
                        <li class="flex items-start gap-4">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <a href="{{ $settings['google_maps_link'] ?? '#' }}" target="_blank" class="text-sm hover:text-primary transition-colors leading-relaxed block flex-1 break-words">{{ $settings['address'] ?? 'Jl. Desa Cigalontang' }}</a>
                        </li>
                        <li class="flex items-center gap-4">
                            <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span class="text-sm leading-relaxed">{{ $settings['contact_phone'] ?? '-' }}</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span class="text-sm leading-relaxed">{{ $settings['contact_email'] ?? '-' }}</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="text-sm leading-relaxed">Senin - Jumat: 08.00 - 16.00 WIB</span>
                        </li>
                    </ul>
                </div>
                <div class="lg:col-span-3">
                    <h4 class="text-lg font-bold text-white mb-8">Kolaborasi</h4>
                    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 text-center flex flex-col items-center justify-center shadow-lg hover:border-gray-700 hover:bg-gray-800 transition-all duration-300">
                        <a href="https://www.tiktok.com/@kkn0126.cigalontang" target="_blank" class="block mb-6 drop-shadow-lg hover:scale-110 transition-transform">
                            <img src="/images/logo-kkn.jpg" alt="Logo KKN LP3I Tasikmalaya" class="w-24 h-24 object-cover rounded-full border-2 border-gray-700">
                        </a>
                        <p class="text-xs font-bold text-primary mb-1.5 uppercase tracking-wider">KKN LP3I TASIKMALAYA</p>
                        <p class="text-xs text-gray-400 font-medium">&times; Desa Cigalontang</p>
                    </div>
                </div>
            </div>
            <div class="mt-16 pt-8 relative flex flex-col items-center justify-center gap-2 text-center pb-4">
                <!-- Garis Menarik -->
                <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-gray-950 via-gray-700 to-gray-950"></div>
                <div class="absolute top-[-1px] left-1/2 -translate-x-1/2 w-8 h-1 bg-primary rounded-full"></div>
                <div class="absolute top-[-3px] left-1/2 -translate-x-1/2 w-16 h-1.5 bg-primary rounded-full blur-[4px] opacity-60"></div>

                <!-- Teks Tumpang Tindih -->
                <p class="text-gray-500 text-sm font-medium">&copy; {{ date('Y') }} Portal Desa Cigalontang. Hak Cipta Dilindungi.</p>
                <p class="text-gray-400 text-sm mt-1">Dikembangkan oleh <span class="text-primary font-semibold tracking-wide">Tim KKN LP3I Tasikmalaya 2026</span></p>
            </div>
        </div>
    </footer>

    <!-- AOS Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 50,
            easing: 'ease-out-cubic'
        });
    </script>
</body>
</html>
