@extends('layouts.public')

@section('title', 'Profil Desa')

@section('content')
@php
    $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
@endphp
<!-- Header Profil -->
<div class="relative bg-gradient-to-br from-green-900 via-primary to-emerald-800 pt-16 pb-28 overflow-hidden">
    <!-- Decorative background shapes -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-10 w-72 h-72 bg-emerald-400/20 rounded-full blur-2xl"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/20 text-white text-sm font-semibold tracking-widest uppercase mb-6 border border-white/30 backdrop-blur-md shadow-sm" data-aos="fade-down">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Tentang Desa
        </div>
        <h1 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl md:text-5xl drop-shadow-lg" data-aos="zoom-in-up" data-aos-delay="200">Profil Desa Cigalontang</h1>
        <p class="mt-4 text-base md:text-lg text-green-50 max-w-3xl mx-auto drop-shadow leading-relaxed" data-aos="zoom-in-up" data-aos-delay="400">Mengenal lebih dekat Sejarah Desa, Visi & Misi, Geografi & Demografi, Peta Wilayah, Struktur Aparatur, hingga Data Desa Cigalontang.</p>
    </div>
</div>

<!-- Main Content Area -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 mb-12 relative z-20">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden" x-data="{ 
        tab: localStorage.getItem('profilTab') || 'sejarah',
        init() {
            this.$watch('tab', value => localStorage.setItem('profilTab', value))
        }
    }">
        
        <!-- Tab Navigation -->
        <div class="bg-white border-b border-gray-100 shadow-sm py-4">
            <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex overflow-x-auto space-x-3 hide-scrollbar md:justify-center items-center">
                <button @click="tab = 'sejarah'" :class="tab === 'sejarah' ? 'bg-primary text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="whitespace-nowrap py-2.5 px-6 rounded-full text-sm font-bold transition-all duration-300">Sejarah Desa</button>
                <button @click="tab = 'visimisi'" :class="tab === 'visimisi' ? 'bg-primary text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="whitespace-nowrap py-2.5 px-6 rounded-full text-sm font-bold transition-all duration-300">Visi & Misi</button>
                <button @click="tab = 'geografis'" :class="tab === 'geografis' ? 'bg-primary text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="whitespace-nowrap py-2.5 px-6 rounded-full text-sm font-bold transition-all duration-300">Geografi & Demografi</button>
                <button @click="tab = 'peta'" :class="tab === 'peta' ? 'bg-primary text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="whitespace-nowrap py-2.5 px-6 rounded-full text-sm font-bold transition-all duration-300">Peta Wilayah</button>
                <button @click="tab = 'aparatur'" :class="tab === 'aparatur' ? 'bg-primary text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="whitespace-nowrap py-2.5 px-6 rounded-full text-sm font-bold transition-all duration-300">Struktur Aparatur</button>
                <button @click="tab = 'data-desa'" :class="tab === 'data-desa' ? 'bg-primary text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="whitespace-nowrap py-2.5 px-6 rounded-full text-sm font-bold transition-all duration-300">Data Desa</button>
            </nav>
        </div>

        <!-- Sejarah Section -->
        <div x-show="tab === 'sejarah'" class="p-8 md:p-12" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="flex flex-col md:flex-row gap-12 items-center">
                <div class="md:w-1/2" data-aos="fade-right">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                        <div class="w-10 h-10 bg-accent/20 rounded-full flex items-center justify-center text-accent">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        Sejarah Desa
                    </h2>
                    <div class="prose prose-lg text-gray-600 text-justify">
                        {!! nl2br(e($settings['sejarah_lengkap'] ?? 'Desa Cigalontang merupakan salah satu desa yang memiliki nilai historis dan budaya yang kuat di wilayah Kabupaten Tasikmalaya.')) !!}
                    </div>
                </div>
                <div class="md:w-1/2 w-full group relative" data-aos="fade-left">
                    <div class="absolute -inset-2 bg-gradient-to-r from-primary to-accent rounded-3xl blur opacity-20 group-hover:opacity-40 transition duration-500"></div>
                    <div class="aspect-[4/3] w-full bg-gray-200 rounded-2xl overflow-hidden shadow-lg relative border border-gray-100">
                        @if(isset($settings['foto_sejarah']) && $settings['foto_sejarah'] != '')
                            <img src="{{ Storage::url($settings['foto_sejarah']) }}" alt="Foto Sejarah Desa Cigalontang" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        @else
                            <img src="/images/sejarah-desa.jpg" alt="Kegiatan Kesenian Tradisional Desa Cigalontang" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi Misi Section -->
        <div x-show="tab === 'visimisi'" class="p-8 md:p-12 bg-gray-50/50" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 max-w-7xl mx-auto">
                <!-- Visi (Kiri) -->
                <div class="lg:col-span-5" data-aos="zoom-in">
                    <div class="bg-gradient-to-br from-primary to-emerald-800 rounded-3xl p-8 text-white shadow-xl relative overflow-hidden h-full flex flex-col justify-center sticky top-28">
                        <div class="absolute top-0 right-0 p-8 opacity-10">
                            <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
                        </div>
                        <h3 class="text-xl md:text-2xl font-bold text-emerald-200 mb-6 uppercase tracking-widest relative z-10 flex items-center gap-3">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            Visi Desa
                        </h3>
                        <p class="text-xl md:text-2xl font-medium leading-relaxed relative z-10 italic">
                            "{!! nl2br(e($settings['visi'] ?? 'Mewujudkan desa Cigalontang sebagai desa yang religius Islami, mandiri, unggul, dan terdepan.')) !!}"
                        </p>
                    </div>
                </div>

                <!-- Misi (Kanan) -->
                <div class="lg:col-span-7">
                    <div class="flex items-center gap-3 mb-6" data-aos="fade-left">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        <h3 class="text-2xl font-bold text-gray-900">Misi Desa</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @php
                            $misiArray = isset($settings['misi']) && $settings['misi'] != '' ? explode("\n", $settings['misi']) : [
                                'Meningkatkan tata kelola pemerintahan yang lebih transparan di segala bidang.',
                                'Meningkatkan sumber daya manusia yang berakhlakulkarimah.',
                                'Meningkatkan daya beli masyarakat.'
                            ];
                        @endphp
                        
                        @foreach($misiArray as $index => $misi)
                            @if(trim($misi) != '')
                            <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex gap-4 items-start hover:shadow-md hover:-translate-y-1 transition-all duration-300 group">
                                <div class="flex-shrink-0 w-10 h-10 bg-primary/10 text-primary group-hover:bg-primary group-hover:text-white rounded-full flex items-center justify-center font-bold text-lg transition-colors">{{ $index + 1 }}</div>
                                <p class="text-gray-700 leading-relaxed text-sm md:text-base pt-1">{{ $misi }}</p>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Geografis & Demografi Section -->
        <div x-show="tab === 'geografis'" class="p-8 md:p-12" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="text-center mb-12" data-aos="fade-down">
                <h2 class="text-3xl font-bold text-gray-900">Gambaran Umum Desa</h2>
                <div class="w-20 h-1 bg-secondary mx-auto mt-4 rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                <!-- Geografis -->
                <div class="bg-gradient-to-br from-emerald-50 to-green-100 rounded-3xl p-8 border border-green-200 shadow-sm relative overflow-hidden group hover:shadow-md transition-all">
                    <div class="absolute -right-6 -top-6 text-green-500/10 group-hover:text-green-500/20 transition-colors">
                        <svg class="w-40 h-40" fill="currentColor" viewBox="0 0 24 24"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-green-900 mb-8 flex items-center gap-3 relative z-10">
                        <div class="p-3 bg-green-500 text-white rounded-xl shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        Kondisi Geografis
                    </h3>
                    <ul class="space-y-4 relative z-10">
                        <li class="flex justify-between items-center border-b border-green-200/60 pb-3">
                            <span class="text-green-800 font-medium">Luas Wilayah</span> 
                            <span class="font-bold text-green-900 bg-white px-4 py-1.5 rounded-lg shadow-sm">{{ $settings['luas_wilayah'] ?? '537.6 Ha' }}</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-green-200/60 pb-3">
                            <span class="text-green-800 font-medium">Ketinggian (MDPL)</span> 
                            <span class="font-bold text-green-900 bg-white px-4 py-1.5 rounded-lg shadow-sm">{{ $settings['ketinggian'] ?? '700 M' }}</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-green-200/60 pb-3">
                            <span class="text-green-800 font-medium">Curah Hujan Rata-rata</span> 
                            <span class="font-bold text-green-900 bg-white px-4 py-1.5 rounded-lg shadow-sm">{{ $settings['curah_hujan'] ?? '1200-1500 Mm' }}</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-green-200/60 pb-3">
                            <span class="text-green-800 font-medium">Jarak ke Kecamatan</span> 
                            <span class="font-bold text-green-900 bg-white px-4 py-1.5 rounded-lg shadow-sm">{{ $settings['jarak_kecamatan'] ?? '7 Km' }}</span>
                        </li>
                        <li class="flex justify-between items-center border-b border-green-200/60 pb-3">
                            <span class="text-green-800 font-medium">Jarak ke Kabupaten</span> 
                            <span class="font-bold text-green-900 bg-white px-4 py-1.5 rounded-lg shadow-sm">{{ $settings['jarak_kabupaten'] ?? '34 Km' }}</span>
                        </li>
                    </ul>
                </div>
                
                <!-- Batas Wilayah -->
                <div class="bg-gradient-to-bl from-teal-50 to-cyan-100 rounded-3xl p-8 border border-teal-200 shadow-sm relative overflow-hidden group hover:shadow-md transition-all">
                    <div class="absolute -left-6 -bottom-6 text-teal-500/10 group-hover:text-teal-500/20 transition-colors">
                        <svg class="w-40 h-40" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-teal-900 mb-8 flex items-center gap-3 relative z-10">
                        <div class="p-3 bg-teal-500 text-white rounded-xl shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        Batas Wilayah
                    </h3>
                    <ul class="space-y-4 relative z-10">
                        <li class="flex items-center gap-4 bg-white/60 p-4 rounded-2xl border border-white shadow-sm hover:bg-white transition-colors">
                            <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center text-teal-600 font-extrabold text-lg">U</div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-teal-800/70 mb-0.5">Sebelah Utara</p>
                                <p class="font-bold text-teal-950">{{ $settings['batas_utara'] ?? 'Kabupaten Garut (Kehutanan)' }}</p>
                            </div>
                        </li>
                        <li class="flex items-center gap-4 bg-white/60 p-4 rounded-2xl border border-white shadow-sm hover:bg-white transition-colors">
                            <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center text-teal-600 font-extrabold text-lg">T</div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-teal-800/70 mb-0.5">Sebelah Timur</p>
                                <p class="font-bold text-teal-950">{{ $settings['batas_timur'] ?? 'Desa Sirnaraja' }}</p>
                            </div>
                        </li>
                        <li class="flex items-center gap-4 bg-white/60 p-4 rounded-2xl border border-white shadow-sm hover:bg-white transition-colors">
                            <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center text-teal-600 font-extrabold text-lg">S</div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-teal-800/70 mb-0.5">Sebelah Selatan</p>
                                <p class="font-bold text-teal-950">{{ $settings['batas_selatan'] ?? 'Desa Jayapura' }}</p>
                            </div>
                        </li>
                        <li class="flex items-center gap-4 bg-white/60 p-4 rounded-2xl border border-white shadow-sm hover:bg-white transition-colors">
                            <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center text-teal-600 font-extrabold text-lg">B</div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-teal-800/70 mb-0.5">Sebelah Barat</p>
                                <p class="font-bold text-teal-950">{{ $settings['batas_barat'] ?? 'Desa Puspamukti' }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Penggunaan Lahan -->
            <div class="mb-16">
                <div class="text-center mb-8" data-aos="fade-up">
                    <h3 class="text-2xl font-bold text-gray-900 inline-flex items-center gap-3">
                        <div class="p-2.5 bg-green-100 text-green-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        </div>
                        Peruntukan Lahan
                    </h3>
                    <p class="text-gray-500 mt-2 font-medium">Distribusi penggunaan lahan di wilayah Desa Cigalontang</p>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                    <div class="bg-white rounded-2xl p-6 text-center border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all group">
                        <div class="w-14 h-14 mx-auto bg-green-50 text-green-600 group-hover:bg-green-500 group-hover:text-white transition-colors rounded-full flex items-center justify-center mb-4">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Sawah</p>
                        <p class="text-2xl font-black text-gray-900">196.2<span class="text-sm font-bold text-gray-400 ml-1">Ha</span></p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 text-center border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all group">
                        <div class="w-14 h-14 mx-auto bg-cyan-50 text-cyan-600 group-hover:bg-cyan-500 group-hover:text-white transition-colors rounded-full flex items-center justify-center mb-4">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Kolam</p>
                        <p class="text-2xl font-black text-gray-900">5.8<span class="text-sm font-bold text-gray-400 ml-1">Ha</span></p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 text-center border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all group">
                        <div class="w-14 h-14 mx-auto bg-emerald-50 text-emerald-600 group-hover:bg-emerald-500 group-hover:text-white transition-colors rounded-full flex items-center justify-center mb-4">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Perkebunan</p>
                        <p class="text-2xl font-black text-gray-900">3.5<span class="text-sm font-bold text-gray-400 ml-1">Ha</span></p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 text-center border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all group">
                        <div class="w-14 h-14 mx-auto bg-teal-50 text-teal-600 group-hover:bg-teal-500 group-hover:text-white transition-colors rounded-full flex items-center justify-center mb-4">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Ladang</p>
                        <p class="text-2xl font-black text-gray-900">151.4<span class="text-sm font-bold text-gray-400 ml-1">Ha</span></p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 text-center border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all group">
                        <div class="w-14 h-14 mx-auto bg-yellow-50 text-yellow-600 group-hover:bg-yellow-500 group-hover:text-white transition-colors rounded-full flex items-center justify-center mb-4">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Pemukiman</p>
                        <p class="text-2xl font-black text-gray-900">21.2<span class="text-sm font-bold text-gray-400 ml-1">Ha</span></p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 text-center border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all group">
                        <div class="w-14 h-14 mx-auto bg-slate-50 text-slate-500 group-hover:bg-slate-500 group-hover:text-white transition-colors rounded-full flex items-center justify-center mb-4">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Lain-lain</p>
                        <p class="text-2xl font-black text-gray-900">3.3<span class="text-sm font-bold text-gray-400 ml-1">Ha</span></p>
                    </div>
                </div>
            </div>

            <!-- Demografi Section -->
            <div class="mt-16 bg-white rounded-3xl p-8 md:p-12 border border-gray-100 shadow-sm relative overflow-hidden" data-aos="fade-up">
                <!-- Header -->
                <div class="text-center mb-10">
                    <h3 class="text-3xl font-bold text-gray-900 inline-flex items-center gap-3">
                        <div class="p-3 bg-primary/10 text-primary rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        Pembagian Wilayah Administratif
                    </h3>
                    <p class="text-gray-500 mt-3 font-medium">Struktur kepengurusan wilayah RT dan RW di Desa Cigalontang</p>
                </div>

                <!-- Cards for Dusun -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Dusun 1 -->
                    <div class="bg-gray-50 hover:bg-white rounded-2xl p-6 border border-gray-100 hover:border-primary/30 hover:shadow-lg transition-all group relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:opacity-10 transition-opacity">
                             <svg class="w-32 h-32 text-primary" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
                        </div>
                        <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center font-black text-xl mb-4 group-hover:scale-110 transition-transform">I</div>
                        <h4 class="text-lg font-bold text-gray-900 mb-4">Kedusunan Cigalontang</h4>
                        <div class="flex gap-4">
                            <div class="bg-white px-4 py-2 rounded-xl border border-gray-100 flex-1 relative z-10 shadow-sm">
                                <p class="text-[10px] text-gray-500 uppercase font-bold mb-1">Rukun Warga</p>
                                <p class="text-2xl font-black text-gray-800">3 <span class="text-xs font-bold text-gray-400">RW</span></p>
                            </div>
                            <div class="bg-primary/5 px-4 py-2 rounded-xl border border-primary/10 flex-1 relative z-10 shadow-sm">
                                <p class="text-[10px] text-primary/70 uppercase font-bold mb-1">Rukun Tetangga</p>
                                <p class="text-2xl font-black text-primary">9 <span class="text-xs font-bold text-primary/50">RT</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Dusun 2 -->
                    <div class="bg-gray-50 hover:bg-white rounded-2xl p-6 border border-gray-100 hover:border-primary/30 hover:shadow-lg transition-all group relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:opacity-10 transition-opacity">
                             <svg class="w-32 h-32 text-primary" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
                        </div>
                        <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center font-black text-xl mb-4 group-hover:scale-110 transition-transform">II</div>
                        <h4 class="text-lg font-bold text-gray-900 mb-4">Kedusunan Panyandungan</h4>
                        <div class="flex gap-4">
                            <div class="bg-white px-4 py-2 rounded-xl border border-gray-100 flex-1 relative z-10 shadow-sm">
                                <p class="text-[10px] text-gray-500 uppercase font-bold mb-1">Rukun Warga</p>
                                <p class="text-2xl font-black text-gray-800">2 <span class="text-xs font-bold text-gray-400">RW</span></p>
                            </div>
                            <div class="bg-primary/5 px-4 py-2 rounded-xl border border-primary/10 flex-1 relative z-10 shadow-sm">
                                <p class="text-[10px] text-primary/70 uppercase font-bold mb-1">Rukun Tetangga</p>
                                <p class="text-2xl font-black text-primary">6 <span class="text-xs font-bold text-primary/50">RT</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Dusun 3 -->
                    <div class="bg-gray-50 hover:bg-white rounded-2xl p-6 border border-gray-100 hover:border-primary/30 hover:shadow-lg transition-all group relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 opacity-5 group-hover:opacity-10 transition-opacity">
                             <svg class="w-32 h-32 text-primary" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
                        </div>
                        <div class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center font-black text-xl mb-4 group-hover:scale-110 transition-transform">III</div>
                        <h4 class="text-lg font-bold text-gray-900 mb-4">Kedusunan Cigalontang Girang</h4>
                        <div class="flex gap-4">
                            <div class="bg-white px-4 py-2 rounded-xl border border-gray-100 flex-1 relative z-10 shadow-sm">
                                <p class="text-[10px] text-gray-500 uppercase font-bold mb-1">Rukun Warga</p>
                                <p class="text-2xl font-black text-gray-800">3 <span class="text-xs font-bold text-gray-400">RW</span></p>
                            </div>
                            <div class="bg-primary/5 px-4 py-2 rounded-xl border border-primary/10 flex-1 relative z-10 shadow-sm">
                                <p class="text-[10px] text-primary/70 uppercase font-bold mb-1">Rukun Tetangga</p>
                                <p class="text-2xl font-black text-primary">9 <span class="text-xs font-bold text-primary/50">RT</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Banner -->
                <div class="bg-gradient-to-r from-emerald-800 to-primary rounded-2xl p-6 md:px-10 flex flex-col md:flex-row items-center justify-between text-white shadow-lg relative overflow-hidden">
                    <div class="absolute right-0 top-0 w-64 h-64 bg-white opacity-5 rounded-full blur-3xl -mr-20 -mt-20 pointer-events-none"></div>
                    <div class="relative z-10 flex items-center gap-4 mb-6 md:mb-0">
                        <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm shadow-inner">
                             <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold">Total Keseluruhan Wilayah</h4>
                            <p class="text-green-100 text-sm">Gabungan dari 3 Kedusunan di Desa Cigalontang</p>
                        </div>
                    </div>
                    <div class="relative z-10 flex gap-8">
                        <div class="text-center">
                            <p class="text-4xl font-black drop-shadow-md">8</p>
                            <p class="text-[10px] text-green-100 font-bold uppercase tracking-widest mt-1">Total RW</p>
                        </div>
                        <div class="w-px h-14 bg-white/20"></div>
                        <div class="text-center">
                            <p class="text-4xl font-black drop-shadow-md text-green-50">24</p>
                            <p class="text-[10px] text-green-100 font-bold uppercase tracking-widest mt-1">Total RT</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Peta Wilayah Section -->
        <div x-show="tab === 'peta'" class="p-8 md:p-12 bg-gray-50" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Peta Wilayah Desa</h2>
                <div class="w-20 h-1 bg-primary mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Peta administratif Desa Cigalontang beserta pembagian wilayah antar dusun secara detail.</p>
            </div>

            <!-- Peta Utama -->
            <div class="mb-12">
                <div class="bg-white rounded-2xl shadow-lg p-4 border border-gray-100 group overflow-hidden relative">
                    <div class="absolute inset-0 bg-primary/5 opacity-0 group-hover:opacity-100 transition-opacity z-10 pointer-events-none"></div>
                    <img src="/images/peta-desa.jpg" alt="Peta Desa Cigalontang" class="w-full h-auto rounded-xl object-contain bg-gray-100 shadow-sm">
                    <div class="mt-4 text-center">
                        <h3 class="text-xl font-bold text-gray-900">Peta Keseluruhan Desa Cigalontang</h3>
                    </div>
                </div>
            </div>

            <!-- Peta Dusun -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl shadow-md p-4 border border-gray-100 group overflow-hidden relative">
                    <div class="absolute inset-0 bg-secondary/5 opacity-0 group-hover:opacity-100 transition-opacity z-10 pointer-events-none"></div>
                    <img src="/images/peta-dusun1.png" alt="Peta Dusun 1 Cigalontang Tengah" class="w-full h-auto rounded-xl object-contain bg-gray-100 aspect-[4/3] shadow-sm">
                    <div class="mt-4 text-center">
                        <h3 class="text-lg font-bold text-gray-900">Peta Dusun 1</h3>
                        <p class="text-gray-500 text-sm">Cigalontang Tengah</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-md p-4 border border-gray-100 group overflow-hidden relative">
                    <div class="absolute inset-0 bg-green-500/5 opacity-0 group-hover:opacity-100 transition-opacity z-10 pointer-events-none"></div>
                    <img src="/images/peta-dusun2.png" alt="Peta Dusun 2 Panyandungan" class="w-full h-auto rounded-xl object-contain bg-gray-100 aspect-[4/3] shadow-sm">
                    <div class="mt-4 text-center">
                        <h3 class="text-lg font-bold text-gray-900">Peta Dusun 2</h3>
                        <p class="text-gray-500 text-sm">Panyandungan</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-md p-4 border border-gray-100 group overflow-hidden relative">
                    <div class="absolute inset-0 bg-accent/5 opacity-0 group-hover:opacity-100 transition-opacity z-10 pointer-events-none"></div>
                    <img src="/images/peta-dusun3.png" alt="Peta Dusun 3 Cigalontang Girang" class="w-full h-auto rounded-xl object-contain bg-gray-100 aspect-[4/3] shadow-sm">
                    <div class="mt-4 text-center">
                        <h3 class="text-lg font-bold text-gray-900">Peta Dusun 3</h3>
                        <p class="text-gray-500 text-sm">Cigalontang Girang</p>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 text-center text-sm text-gray-500 bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                <svg class="w-5 h-5 inline-block mr-1 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Peta ini didasarkan pada pemetaan administratif tingkat desa.
            </div>
        </div>

        <!-- Struktur Aparatur Section -->
        <div x-show="tab === 'aparatur'" class="p-8 md:p-12" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Aparatur Pemerintahan Desa</h2>
                <p class="mt-4 text-gray-600">Struktur Organisasi dan Tata Kerja Desa Cigalontang, Kecamatan Cigalontang, Kabupaten Tasikmalaya.</p>
            </div>

            <!-- Aparatur Dinamis -->
            @php
               $kades = $aparaturs->firstWhere('jabatan', 'Kepala Desa');
               $sekdes = $aparaturs->firstWhere('jabatan', 'Sekretaris Desa');
               
               $kaurs = $aparaturs->filter(function($a) {
                   return str_contains(strtolower($a->jabatan), 'kaur');
               });
               
               $kasis = $aparaturs->filter(function($a) {
                   return str_contains(strtolower($a->jabatan), 'kasi');
               });
               
               $kadus = $aparaturs->filter(function($a) {
                   $jab = strtolower($a->jabatan);
                   return str_contains($jab, 'dusun') || str_contains($jab, 'kadus');
               });
               
               // Fallback untuk staff dan lainnya
               $staffLainnya = $aparaturs->filter(function($a) {
                   $jab = strtolower($a->jabatan);
                   return $jab !== 'kepala desa' && $jab !== 'sekretaris desa' && !str_contains($jab, 'kaur') && !str_contains($jab, 'kasi') && !str_contains($jab, 'dusun') && !str_contains($jab, 'kadus');
               });
            @endphp

            <div class="max-w-6xl mx-auto space-y-16 mt-8">
                <!-- Pimpinan (Kades & Sekdes) -->
                <div class="flex flex-col items-center gap-12">
                    <!-- Card Kades -->
                    @if($kades)
                    <div class="text-center group w-72 mx-auto">
                        <div class="w-56 h-72 mx-auto rounded-3xl mb-5 overflow-hidden shadow-md border-4 border-white group-hover:border-primary/40 transition-all group-hover:shadow-xl relative bg-gradient-to-t from-gray-100 to-transparent">
                            <img src="{{ $kades->foto_url ? (Storage::disk('public')->exists($kades->foto_url) ? Storage::url($kades->foto_url) : $kades->foto_url) : 'https://ui-avatars.com/api/?name=' . urlencode($kades->nama) . '&background=random&color=fff&size=256' }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <h4 class="text-xl font-black text-gray-900 mb-1">{{ $kades->nama }}</h4>
                        <div class="inline-block px-4 py-1.5 bg-primary/10 text-primary font-bold uppercase tracking-widest text-xs rounded-full">{{ $kades->jabatan }}</div>
                    </div>
                    @endif

                    <!-- Card Sekdes -->
                    @if($sekdes)
                    <div class="text-center group w-64 mx-auto relative">
                        <!-- Connector Visual (Subtle) -->
                        <div class="absolute -top-10 left-1/2 -ml-px w-px h-6 bg-gray-300"></div>
                        <div class="w-48 h-60 mx-auto rounded-3xl mb-4 overflow-hidden shadow-sm border-4 border-white group-hover:border-secondary/40 transition-all group-hover:shadow-lg relative bg-gradient-to-t from-gray-100 to-transparent">
                            <img src="{{ $sekdes->foto_url ? (Storage::disk('public')->exists($sekdes->foto_url) ? Storage::url($sekdes->foto_url) : $sekdes->foto_url) : 'https://ui-avatars.com/api/?name=' . urlencode($sekdes->nama) . '&background=random&color=fff&size=256' }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <h4 class="text-lg font-bold text-gray-900 mb-1">{{ $sekdes->nama }}</h4>
                        <div class="inline-block px-3 py-1 bg-secondary/10 text-secondary font-bold uppercase tracking-wider text-[11px] rounded-full">{{ $sekdes->jabatan }}</div>
                    </div>
                    @endif
                </div>

                <!-- Bagian Kasi & Kaur -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-8 bg-gray-50/50 p-8 rounded-3xl border border-gray-100">
                    <!-- Kaur Group -->
                    @if($kaurs->count() > 0)
                    <div>
                        <div class="flex items-center gap-3 mb-8 justify-center">
                            <div class="w-8 h-px bg-gray-300"></div>
                            <h3 class="text-center text-sm font-bold text-gray-500 uppercase tracking-widest">Kepala Urusan</h3>
                            <div class="w-8 h-px bg-gray-300"></div>
                        </div>
                        <div class="flex justify-center gap-6 flex-wrap">
                            @foreach($kaurs as $kaur)
                            <div class="text-center group w-44">
                                <div class="w-36 h-48 mx-auto rounded-2xl mb-3 overflow-hidden shadow-sm border-4 border-white group-hover:border-gray-300 transition-all group-hover:shadow-md relative bg-gradient-to-t from-gray-100 to-transparent">
                                    <img src="{{ $kaur->foto_url ? (Storage::disk('public')->exists($kaur->foto_url) ? Storage::url($kaur->foto_url) : $kaur->foto_url) : 'https://ui-avatars.com/api/?name=' . urlencode($kaur->nama) . '&background=random&color=fff&size=256' }}" class="w-full h-full object-cover object-top group-hover:scale-110 transition-transform duration-500">
                                </div>
                                <h4 class="text-sm font-bold text-gray-900 leading-tight mb-1">{{ $kaur->nama }}</h4>
                                <p class="text-[11px] text-gray-500 font-medium leading-tight">{{ $kaur->jabatan }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Kasi Group -->
                    @if($kasis->count() > 0)
                    <div>
                        <div class="flex items-center gap-3 mb-8 justify-center">
                            <div class="w-8 h-px bg-gray-300"></div>
                            <h3 class="text-center text-sm font-bold text-gray-500 uppercase tracking-widest">Kepala Seksi</h3>
                            <div class="w-8 h-px bg-gray-300"></div>
                        </div>
                        <div class="flex justify-center gap-6 flex-wrap">
                            @foreach($kasis as $kasi)
                            <div class="text-center group w-44">
                                <div class="w-36 h-48 mx-auto rounded-2xl mb-3 overflow-hidden shadow-sm border-4 border-white group-hover:border-gray-300 transition-all group-hover:shadow-md relative bg-gradient-to-t from-gray-100 to-transparent">
                                    <img src="{{ $kasi->foto_url ? (Storage::disk('public')->exists($kasi->foto_url) ? Storage::url($kasi->foto_url) : $kasi->foto_url) : 'https://ui-avatars.com/api/?name=' . urlencode($kasi->nama) . '&background=random&color=fff&size=256' }}" class="w-full h-full object-cover object-top group-hover:scale-110 transition-transform duration-500">
                                </div>
                                <h4 class="text-sm font-bold text-gray-900 leading-tight mb-1">{{ $kasi->nama }}</h4>
                                <p class="text-[11px] text-gray-500 font-medium leading-tight">{{ $kasi->jabatan }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Aparatur Kewilayahan Group -->
                @if($kadus->count() > 0)
                <div class="pt-8 border-t border-gray-100">
                    <div class="flex items-center gap-3 mb-8 justify-center">
                        <div class="w-12 h-px bg-gray-300"></div>
                        <h3 class="text-center text-sm font-bold text-gray-500 uppercase tracking-widest">Aparatur Kewilayahan</h3>
                        <div class="w-12 h-px bg-gray-300"></div>
                    </div>
                    <div class="flex justify-center gap-8 flex-wrap">
                        @foreach($kadus as $kd)
                        <div class="text-center group w-44">
                            <div class="w-36 h-48 mx-auto rounded-2xl mb-3 overflow-hidden shadow-sm border-4 border-white group-hover:border-gray-300 transition-all group-hover:shadow-md relative bg-gradient-to-t from-gray-100 to-transparent">
                                <img src="{{ $kd->foto_url ? (Storage::disk('public')->exists($kd->foto_url) ? Storage::url($kd->foto_url) : $kd->foto_url) : 'https://ui-avatars.com/api/?name=' . urlencode($kd->nama) . '&background=random&color=fff&size=256' }}" class="w-full h-full object-cover object-top group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <h4 class="text-sm font-bold text-gray-900 leading-tight mb-1">{{ $kd->nama }}</h4>
                            <p class="text-[11px] text-gray-500 font-medium leading-tight">{{ $kd->jabatan }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Staff & Lainnya Group -->
                @if($staffLainnya->count() > 0)
                <div class="pt-8 border-t border-gray-100">
                    <div class="flex items-center gap-3 mb-8 justify-center">
                        <div class="w-12 h-px bg-gray-300"></div>
                        <h3 class="text-center text-sm font-bold text-gray-500 uppercase tracking-widest">Staff / Lainnya</h3>
                        <div class="w-12 h-px bg-gray-300"></div>
                    </div>
                    <div class="flex justify-center gap-8 flex-wrap">
                        @foreach($staffLainnya as $staff)
                        <div class="text-center group w-44">
                            <div class="w-36 h-48 mx-auto rounded-2xl mb-3 overflow-hidden shadow-sm border-4 border-white group-hover:border-gray-300 transition-all group-hover:shadow-md relative bg-gradient-to-t from-gray-100 to-transparent">
                                <img src="{{ $staff->foto_url ? (Storage::disk('public')->exists($staff->foto_url) ? Storage::url($staff->foto_url) : $staff->foto_url) : 'https://ui-avatars.com/api/?name=' . urlencode($staff->nama) . '&background=random&color=fff&size=256' }}" class="w-full h-full object-cover object-top group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <h4 class="text-sm font-bold text-gray-900 leading-tight mb-1">{{ $staff->nama }}</h4>
                            <p class="text-[11px] text-gray-500 font-medium leading-tight">{{ $staff->jabatan }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            
        </div>

        <!-- Data Desa Section -->
        <div x-show="tab === 'data-desa'" class="p-8 md:p-12 bg-gray-50/50" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900" data-aos="fade-down">Data & Statistik Desa</h2>
            </div>
            @include('data-desa')
        </div>
        
    </div>
</div>
@endsection
