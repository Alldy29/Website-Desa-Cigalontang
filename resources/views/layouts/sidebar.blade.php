<div class="flex flex-col w-64 bg-slate-900 text-white shadow-2xl h-full transition-all duration-300 border-r border-slate-800" :class="sidebarOpen ? 'block absolute z-20' : 'hidden md:flex'">
    <!-- Logo -->
    <div class="flex items-center gap-3 h-20 border-b border-white/10 px-6">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Desa" class="w-10 h-10 object-contain drop-shadow-md">
        <div>
            <h2 class="text-lg font-extrabold tracking-tight text-white leading-tight">SI-CIGA</h2>
            <span class="text-[10px] font-medium text-slate-400 uppercase tracking-widest">Panel Admin</span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('dashboard') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            Dashboard
        </a>


        @hasanyrole('superadmin|admin_desa')
        <!-- Dropdown: Profil & Aparatur -->
        <div x-data="{ open: {{ request()->routeIs('admin.profil_desa.*') || request()->routeIs('admin.aparatur.*') || request()->routeIs('admin.wisata.*') || request()->routeIs('admin.dusuns.*') ? 'true' : 'false' }} }" class="pt-2">
            <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-sm font-semibold rounded-xl transition-all hover:bg-white/10 text-left group">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="text-[13px] text-slate-300 group-hover:text-white font-medium tracking-wide">Info Desa</span>
                </div>
                <svg :class="{'rotate-180': open}" class="w-4 h-4 text-slate-400 group-hover:text-white transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div x-show="open" x-transition.opacity class="pl-4 pr-2 mt-1 space-y-1">
                <a href="{{ route('admin.profil_desa.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('admin.profil_desa.*') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    Profil Desa
                </a>
                <a href="{{ route('admin.aparatur.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('admin.aparatur.*') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Aparatur
                </a>
                <a href="{{ route('admin.wisata.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('admin.wisata.*') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Wisata & Budaya
                </a>
                <a href="{{ route('admin.dusuns.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('admin.dusuns.*') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    Data Dusun
                </a>
            </div>
        </div>

        <!-- Dropdown: Publikasi -->
        <div x-data="{ open: {{ request()->routeIs('admin.berita.*') || request()->routeIs('admin.galeri.*') ? 'true' : 'false' }} }" class="pt-2">
            <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-sm font-semibold rounded-xl transition-all hover:bg-white/10 text-left group">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    <span class="text-[13px] text-slate-300 group-hover:text-white font-medium tracking-wide">Publikasi</span>
                </div>
                <svg :class="{'rotate-180': open}" class="w-4 h-4 text-slate-400 group-hover:text-white transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div x-show="open" x-transition.opacity class="pl-4 pr-2 mt-1 space-y-1">
                <a href="{{ route('admin.berita.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('admin.berita.*') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    Berita
                </a>
                <a href="{{ route('admin.galeri.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('admin.galeri.*') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Galeri
                </a>
            </div>
        </div>
        @endhasanyrole

        @hasanyrole('superadmin|bumdes')
        <!-- Dropdown: Ekonomi (BUMDes) -->
        <div x-data="{ open: {{ request()->routeIs('admin.umkm.*') ? 'true' : 'false' }} }" class="pt-2">
            <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-sm font-semibold rounded-xl transition-all hover:bg-white/10 text-left group">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    <span class="text-[13px] text-slate-300 group-hover:text-white font-medium tracking-wide">BUMDes & UMKM</span>
                </div>
                <svg :class="{'rotate-180': open}" class="w-4 h-4 text-slate-400 group-hover:text-white transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div x-show="open" x-transition.opacity class="pl-4 pr-2 mt-1 space-y-1">
                <a href="{{ route('admin.umkm.produk.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('admin.umkm.produk.*') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    Produk UMKM
                </a>
                <a href="{{ route('admin.umkm.kategori.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('admin.umkm.kategori.*') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }}">
                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                    Kategori
                </a>
                <a href="{{ route('admin.umkm.mitra.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('admin.umkm.mitra.*') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }}">
                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Mitra Penjual
                </a>
            </div>
        </div>
        @endhasanyrole


        
        @hasanyrole('superadmin|kepala_desa')
        <!-- Dropdown: Laporan / Statistik -->
        <div x-data="{ open: {{ request()->routeIs('admin.statistik.*') ? 'true' : 'false' }} }" class="pt-2">
            <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-sm font-semibold rounded-xl transition-all hover:bg-white/10 text-left group">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    <span class="text-[13px] text-slate-300 group-hover:text-white font-medium tracking-wide">Laporan Statistik</span>
                </div>
                <svg :class="{'rotate-180': open}" class="w-4 h-4 text-slate-400 group-hover:text-white transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div x-show="open" x-transition.opacity class="pl-4 pr-2 mt-1 space-y-1">
                <a href="{{ route('admin.statistik.web') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('admin.statistik.web') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }}">
                    <svg class="w-4 h-4 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                    Statistik Sistem
                </a>
                <a href="{{ route('admin.statistik.umkm') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('admin.statistik.umkm') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }}">
                    <svg class="w-4 h-4 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    Statistik UMKM
                </a>
                <a href="{{ route('admin.statistik.pengunjung') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('admin.statistik.pengunjung') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }}">
                    <svg class="w-4 h-4 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Trafik Pengunjung
                </a>
            </div>
        </div>
        @endhasanyrole

        @hasanyrole('superadmin|kepala_desa|admin_desa')
        <div class="pt-2">
            <a href="{{ route('admin.aspirasi.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('admin.aspirasi.*') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }}">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                Aspirasi Warga
            </a>
        </div>
        @endhasanyrole
        @hasrole('superadmin')
        <!-- Dropdown: Sistem Utama -->
        <div x-data="{ open: {{ request()->routeIs('admin.users.*') || request()->routeIs('admin.settings.*') ? 'true' : 'false' }} }" class="pt-2 border-t border-white/10 mt-2">
            <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-sm font-semibold rounded-xl transition-all hover:bg-white/10 text-left group">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span class="text-[13px] text-slate-300 group-hover:text-white font-medium tracking-wide">Sistem Utama</span>
                </div>
                <svg :class="{'rotate-180': open}" class="w-4 h-4 text-slate-400 group-hover:text-white transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div x-show="open" x-transition.opacity class="pl-4 pr-2 mt-1 space-y-1">
                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('admin.users.*') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Manajemen Akun
                </a>
                <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium rounded-xl transition-all {{ request()->routeIs('admin.settings.*') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Pengaturan
                </a>
            </div>
        </div>
        @endhasrole
    </nav>
    
    <!-- User / Profile bottom -->
    <div class="p-4 border-t border-white/10 bg-slate-950/50">
        <div class="flex items-center gap-3 px-2 py-2">
            <div class="w-10 h-10 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center font-bold text-lg text-slate-300 shadow-inner">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-slate-400 truncate capitalize">{{ Auth::user()->roles->pluck('name')->implode(', ') }}</p>
            </div>
        </div>
    </div>
</div>
