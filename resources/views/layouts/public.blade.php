<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Beranda') - Desa Cigalontang</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

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
                    <a href="/data-desa" class="px-4 py-2 rounded-full font-medium transition-all {{ request()->is('data-desa') ? 'bg-primary/10 text-primary font-bold' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">Data Desa</a>
                    <a href="/berita" class="px-4 py-2 rounded-full font-medium transition-all {{ request()->is('berita*') ? 'bg-primary/10 text-primary font-bold' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">Berita</a>
                    <a href="/galeri" class="px-4 py-2 rounded-full font-medium transition-all {{ request()->is('galeri*') ? 'bg-primary/10 text-primary font-bold' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">Galeri</a>
                    <a href="/umkm" class="px-4 py-2 rounded-full font-medium transition-all {{ request()->is('umkm*') ? 'bg-primary/10 text-primary font-bold' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">UMKM</a>
                    <a href="/wisata" class="px-4 py-2 rounded-full font-medium transition-all {{ request()->is('wisata*') ? 'bg-primary/10 text-primary font-bold' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">Wisata</a>
                    <a href="/aspirasi" class="px-4 py-2 rounded-full font-medium transition-all {{ request()->is('aspirasi*') ? 'bg-primary/10 text-primary font-bold' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">Aspirasi</a>
                    
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
        <div x-show="open" @click.outside="open = false" style="display: none;" class="lg:hidden bg-white border-t border-gray-100 shadow-xl absolute w-full backdrop-blur-md bg-white/95">
            <div class="pt-2 pb-3 space-y-1">
                <a href="/" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->is('/') ? 'border-primary text-primary font-medium bg-primary/5' : 'border-transparent text-gray-600 hover:text-primary hover:bg-gray-50 hover:border-gray-300 font-medium' }}">Beranda</a>
                <a href="/profil" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->is('profil') ? 'border-primary text-primary font-medium bg-primary/5' : 'border-transparent text-gray-600 hover:text-primary hover:bg-gray-50 hover:border-gray-300 font-medium' }}">Profil</a>
                <a href="/data-desa" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->is('data-desa') ? 'border-primary text-primary font-medium bg-primary/5' : 'border-transparent text-gray-600 hover:text-primary hover:bg-gray-50 hover:border-gray-300 font-medium' }}">Data Desa</a>
                <a href="/berita" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->is('berita*') ? 'border-primary text-primary font-medium bg-primary/5' : 'border-transparent text-gray-600 hover:text-primary hover:bg-gray-50 hover:border-gray-300 font-medium' }}">Berita</a>
                <a href="/galeri" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->is('galeri*') ? 'border-primary text-primary font-medium bg-primary/5' : 'border-transparent text-gray-600 hover:text-primary hover:bg-gray-50 hover:border-gray-300 font-medium' }}">Galeri</a>
                <a href="/umkm" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->is('umkm*') ? 'border-primary text-primary font-medium bg-primary/5' : 'border-transparent text-gray-600 hover:text-primary hover:bg-gray-50 hover:border-gray-300 font-medium' }}">UMKM</a>
                <a href="/wisata" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->is('wisata*') ? 'border-primary text-primary font-medium bg-primary/5' : 'border-transparent text-gray-600 hover:text-primary hover:bg-gray-50 hover:border-gray-300 font-medium' }}">Wisata</a>
                <a href="/aspirasi" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->is('aspirasi*') ? 'border-primary text-primary font-medium bg-primary/5' : 'border-transparent text-gray-600 hover:text-primary hover:bg-gray-50 hover:border-gray-300 font-medium' }}">Aspirasi</a>
                <div class="border-t border-gray-200 pt-4 pb-2">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block px-4 py-2 text-primary font-medium">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block px-4 py-2 text-primary font-medium">Login</a>
                    @endauth
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
                    <p class="text-gray-400 mb-8 max-w-md leading-relaxed">Mewujudkan desa yang maju, mandiri, dan berbudaya melalui inovasi digital dan pemberdayaan masyarakat seutuhnya. Nanjeur tur nanjung.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-primary hover:text-white transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-primary hover:text-white transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-primary hover:text-white transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg></a>
                    </div>
                </div>
                <div class="lg:col-span-2">
                    <h4 class="text-lg font-bold text-white mb-8">Navigasi Cepat</h4>
                    <ul class="space-y-4">
                        <li><a href="/" class="text-gray-400 hover:text-primary transition-colors flex items-center gap-3"><span class="text-primary text-[10px]">▶</span> Beranda</a></li>
                        <li><a href="/profil" class="text-gray-400 hover:text-primary transition-colors flex items-center gap-3"><span class="text-primary text-[10px]">▶</span> Profil Desa</a></li>
                        <li><a href="/data-desa" class="text-gray-400 hover:text-primary transition-colors flex items-center gap-3"><span class="text-primary text-[10px]">▶</span> Data Desa</a></li>
                        <li><a href="/umkm" class="text-gray-400 hover:text-primary transition-colors flex items-center gap-3"><span class="text-primary text-[10px]">▶</span> Produk UMKM</a></li>
                        <li><a href="/wisata" class="text-gray-400 hover:text-primary transition-colors flex items-center gap-3"><span class="text-primary text-[10px]">▶</span> Wisata Desa</a></li>
                        <li><a href="/aspirasi" class="text-gray-400 hover:text-primary transition-colors flex items-center gap-3"><span class="text-primary text-[10px]">▶</span> Hubungi Kami</a></li>
                    </ul>
                </div>
                <div class="lg:col-span-3">
                    <h4 class="text-lg font-bold text-white mb-8">Hubungi Kami</h4>
                    <ul class="space-y-6 text-gray-400">
                        <li class="flex items-start gap-4">
                            <svg class="w-5 h-5 text-primary flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <a href="https://share.google/mb5pcJRqwFtIVD0QH" target="_blank" class="text-sm hover:text-primary transition-colors leading-relaxed block">Jl. Desa Cigalontang No. 1, Kec. Cigalontang, Kab. Tasikmalaya, Jawa Barat</a>
                        </li>
                        <li class="flex items-center gap-4">
                            <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span class="text-sm leading-relaxed">(0265) 1234567</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span class="text-sm leading-relaxed">pemdescigalontang@gmail.com</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="text-sm leading-relaxed">Senin - Jumat: 08.00 - 16.00 WIB</span>
                        </li>
                    </ul>
                </div>
                <div class="lg:col-span-3">
                    <h4 class="text-lg font-bold text-white mb-8">Kolaborasi KKN LP3I</h4>
                    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 text-center flex flex-col items-center justify-center shadow-lg hover:border-gray-700 transition-all">
                        <a href="https://www.instagram.com/kkn0126.cigalontang?igsh=MTI2MjF3ZmpnZTJqeQ==" target="_blank" class="block mb-6 drop-shadow-lg hover:scale-110 transition-transform">
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
                <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} Portal Desa Cigalontang. Hak Cipta Dilindungi.</p>
                <p class="text-gray-400 text-sm">Dikembangkan oleh <span class="text-primary font-semibold tracking-wide">Tim KKN LP3I Tasikmalaya 2026</span></p>
            </div>
        </div>
    </footer>
</body>
</html>
