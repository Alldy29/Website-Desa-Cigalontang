@extends('layouts.public')

@section('title', 'Hubungi Kami')

@section('content')

@php
    $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
@endphp

<!-- Premium Hero Section -->
<div class="relative bg-gradient-to-br from-green-900 via-primary to-emerald-800 pt-16 pb-28 overflow-hidden">
    <!-- Decorative background shapes -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-10 w-72 h-72 bg-emerald-400/20 rounded-full blur-2xl"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/20 text-white text-sm font-semibold tracking-widest uppercase mb-6 border border-white/30 backdrop-blur-md shadow-sm" data-aos="fade-down">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            Kontak & Layanan
        </div>
        <h1 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl md:text-5xl drop-shadow-lg" data-aos="zoom-in-up" data-aos-delay="200">Hubungi Kami</h1>
        <p class="mt-4 text-base md:text-lg text-green-50 max-w-2xl mx-auto drop-shadow leading-relaxed" data-aos="zoom-in-up" data-aos-delay="400">Sampaikan aspirasi, pertanyaan, atau pengaduan Anda. Kami siap memberikan pelayanan terbaik untuk warga Desa Cigalontang.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 mb-12 relative z-20">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="p-8 md:p-12 bg-gray-50/30">

    <!-- Info Cards Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-16">
        <!-- Alamat -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-start gap-4 h-full" data-aos="fade-up" data-aos-delay="100">
            <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-600 flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <div>
                <h3 class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Alamat Kantor</h3>
                <p class="text-sm font-bold text-gray-800 leading-tight">{{ $settings['address'] ?? 'Jl. Desa Cigalontang No. 1, Kec. Cigalontang, Kab. Tasikmalaya' }}</p>
            </div>
        </div>

        <!-- Telepon -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-start gap-4 h-full" data-aos="fade-up" data-aos-delay="200">
            <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-600 flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
            </div>
            <div>
                <h3 class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Telepon</h3>
                <p class="text-sm font-bold text-gray-800 leading-tight">{{ $settings['contact_phone'] ?? '(0265) 1234567' }}</p>
            </div>
        </div>

        <!-- Email -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-start gap-4 h-full" data-aos="fade-up" data-aos-delay="300">
            <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-600 flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <div class="min-w-0 flex-1">
                <h3 class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Email</h3>
                <p class="text-sm font-bold text-gray-800 leading-tight break-all">{{ $settings['contact_email'] ?? 'info@cigalontang.desa.id' }}</p>
            </div>
        </div>

        <!-- Jam Pelayanan -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-start gap-4 h-full" data-aos="fade-up" data-aos-delay="400">
            <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-green-600 flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <h3 class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Jam Pelayanan</h3>
                <p class="text-sm font-bold text-gray-800 leading-tight">Senin-Kamis: 08.00-15.00<br>Jumat: 08.00-11.30 WIB</p>
            </div>
        </div>
    </div>

    <!-- Main Content Form & Maps -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
        
        <!-- Form Section -->
        <div class="lg:col-span-7" data-aos="fade-right" data-aos-delay="200">
            <div class="mb-8">
                <span class="inline-block px-3 py-1 bg-green-50 text-green-600 text-[10px] font-bold tracking-widest uppercase mb-4 rounded-sm">Hubungi Kami</span>
                <h2 class="text-3xl font-black text-gray-900 mb-3">Kirim Pesan atau Pengaduan</h2>
                <p class="text-gray-500 text-sm">Sampaikan pertanyaan, saran, maupun pengaduan Anda. Kami akan merespons dalam 1-2 hari kerja.</p>
            </div>
            
            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-gray-200 shadow-sm">
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-4 rounded-xl flex items-start gap-3">
                        <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p class="text-sm font-medium">{{ session('success') }}</p>
                    </div>
                @endif
                <form action="{{ route('aspirasi.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Lengkap -->
                        <div>
                            <label for="nama" class="block text-xs font-bold text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" name="nama" id="nama" class="block w-full rounded-xl bg-white border border-gray-200 focus:border-green-500 focus:ring-green-500 text-gray-900 px-4 py-3 text-sm transition-all" placeholder="Nama Anda" required>
                        </div>

                        <!-- Telepon / WhatsApp -->
                        <div>
                            <label for="whatsapp" class="block text-xs font-bold text-gray-700 mb-2">No. Telepon / WhatsApp <span class="text-red-500">*</span></label>
                            <input type="text" name="whatsapp" id="whatsapp" class="block w-full rounded-xl bg-white border border-gray-200 focus:border-green-500 focus:ring-green-500 text-gray-900 px-4 py-3 text-sm transition-all" placeholder="+62 812-xxxx-xxxx" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-xs font-bold text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email" class="block w-full rounded-xl bg-white border border-gray-200 focus:border-green-500 focus:ring-green-500 text-gray-900 px-4 py-3 text-sm transition-all" placeholder="email@anda.com" required>
                    </div>

                    <!-- Jenis Pesan -->
                    <div>
                        <label for="jenis_pesan" class="block text-xs font-bold text-gray-700 mb-2">Jenis Pesan</label>
                        <select id="jenis_pesan" name="jenis_pesan" class="block w-full rounded-xl bg-white border border-gray-200 focus:border-green-500 focus:ring-green-500 text-gray-900 px-4 py-3 text-sm transition-all appearance-none" required>
                            <option value="">Pilih jenis pesan</option>
                            <option value="pertanyaan_layanan">Pertanyaan Layanan</option>
                            <option value="pengaduan_infrastruktur">Pengaduan Infrastruktur</option>
                            <option value="pengaduan_pelayanan">Pengaduan Pelayanan</option>
                            <option value="saran_masukan">Saran & Masukan</option>
                            <option value="informasi_umum">Informasi Umum</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>

                    <!-- RT / RW -->
                    <div>
                        <label for="rt_rw" class="block text-xs font-bold text-gray-700 mb-2">RT / RW</label>
                        <select id="rt_rw" name="rt_rw" class="block w-full rounded-xl bg-white border border-gray-200 focus:border-green-500 focus:ring-green-500 text-gray-900 px-4 py-3 text-sm transition-all appearance-none">
                            <option value="">Pilih RT/RW Anda</option>
                            <optgroup label="Dusun Cigalontang Tengah">
                                <option value="RT 01 / RW 01">RT 01 / RW 01</option>
                                <option value="RT 02 / RW 01">RT 02 / RW 01</option>
                                <option value="RT 03 / RW 01">RT 03 / RW 01</option>
                                <option value="RT 01 / RW 02">RT 01 / RW 02</option>
                                <option value="RT 02 / RW 02">RT 02 / RW 02</option>
                                <option value="RT 03 / RW 02">RT 03 / RW 02</option>
                                <option value="RT 01 / RW 03">RT 01 / RW 03</option>
                                <option value="RT 02 / RW 03">RT 02 / RW 03</option>
                                <option value="RT 03 / RW 03">RT 03 / RW 03</option>
                            </optgroup>
                            <optgroup label="Dusun Panyandungan">
                                <option value="RT 01 / RW 04">RT 01 / RW 04</option>
                                <option value="RT 02 / RW 04">RT 02 / RW 04</option>
                                <option value="RT 03 / RW 04">RT 03 / RW 04</option>
                                <option value="RT 01 / RW 05">RT 01 / RW 05</option>
                                <option value="RT 02 / RW 05">RT 02 / RW 05</option>
                                <option value="RT 03 / RW 05">RT 03 / RW 05</option>
                            </optgroup>
                            <optgroup label="Dusun Cigalontang Girang">
                                <option value="RT 01 / RW 06">RT 01 / RW 06</option>
                                <option value="RT 02 / RW 06">RT 02 / RW 06</option>
                                <option value="RT 03 / RW 06">RT 03 / RW 06</option>
                                <option value="RT 01 / RW 07">RT 01 / RW 07</option>
                                <option value="RT 02 / RW 07">RT 02 / RW 07</option>
                                <option value="RT 03 / RW 07">RT 03 / RW 07</option>
                                <option value="RT 01 / RW 08">RT 01 / RW 08</option>
                                <option value="RT 02 / RW 08">RT 02 / RW 08</option>
                                <option value="RT 03 / RW 08">RT 03 / RW 08</option>
                            </optgroup>
                            <option value="Luar Desa">Bukan warga desa (Luar Desa)</option>
                        </select>
                    </div>

                    <!-- Pesan -->
                    <div>
                        <label for="pesan" class="block text-xs font-bold text-gray-700 mb-2">Pesan <span class="text-red-500">*</span></label>
                        <textarea id="pesan" name="pesan" rows="4" class="block w-full rounded-xl bg-white border border-gray-200 focus:border-green-500 focus:ring-green-500 text-gray-900 px-4 py-3 text-sm transition-all resize-none" placeholder="Tuliskan pesan, pertanyaan, atau pengaduan Anda secara lengkap..." required></textarea>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full flex justify-center items-center gap-2 py-3.5 px-4 rounded-xl font-bold text-white bg-[#10a345] hover:bg-green-700 focus:outline-none transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar Section -->
        <div class="lg:col-span-5 space-y-8" data-aos="fade-left" data-aos-delay="300">
            <!-- Google Maps Embed -->
            <div class="bg-gray-100 rounded-3xl overflow-hidden border border-gray-200 shadow-sm h-64 relative group">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.6091242787!2d107.9716942!3d-7.2798606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e65551c890a9089%3A0xc3ab531868461b47!2sCigalontang%2C%20Tasikmalaya%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="absolute inset-0 w-full h-full"></iframe>
                <a href="{{ $settings['google_maps_link'] ?? 'https://maps.google.com' }}" target="_blank" class="absolute top-4 left-4 bg-white/90 backdrop-blur text-[#1a73e8] font-bold text-xs px-3 py-1.5 rounded-md shadow-sm border border-gray-200 hover:bg-white transition-colors flex items-center gap-1 z-10">
                    Buka di Maps 
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                </a>
            </div>

            <!-- Media Sosial Desa -->
            <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8">
                <div class="flex items-center gap-2 mb-6">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
                    <h3 class="font-bold text-gray-900">Media Sosial Desa</h3>
                </div>

                <ul class="space-y-4">
                    <!-- Facebook -->
                    @if(isset($settings['social_facebook']) && $settings['social_facebook'])
                    <li>
                        <a href="{{ $settings['social_facebook'] }}" target="_blank" class="flex items-center justify-between p-3 rounded-2xl hover:bg-gray-50 transition-colors group">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900 leading-tight mb-1">Facebook</p>
                                    <p class="text-[11px] text-gray-500">Kunjungi Facebook Kami</p>
                                </div>
                            </div>
                            <svg class="w-4 h-4 text-gray-300 group-hover:text-gray-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </li>
                    @endif
                    
                    <!-- Instagram -->
                    @if(isset($settings['social_instagram']) && $settings['social_instagram'])
                    <li>
                        <a href="{{ $settings['social_instagram'] }}" target="_blank" class="flex items-center justify-between p-3 rounded-2xl hover:bg-gray-50 transition-colors group">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-pink-50 text-pink-600 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900 leading-tight mb-1">Instagram</p>
                                    <p class="text-[11px] text-gray-500">Kunjungi Instagram Kami</p>
                                </div>
                            </div>
                            <svg class="w-4 h-4 text-gray-300 group-hover:text-gray-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </li>
                    @endif
                    
                    <!-- WhatsApp -->
                    @if(isset($settings['social_whatsapp']) && $settings['social_whatsapp'])
                    <li>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['social_whatsapp']) }}" target="_blank" class="flex items-center justify-between p-3 rounded-2xl hover:bg-gray-50 transition-colors group">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-green-50 text-green-600 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.711.927 3.149.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.768-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.664.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 3.825 0 6.938 3.112 6.939 6.937.001 3.826-3.113 6.938-6.939 6.943z"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900 leading-tight mb-1">WhatsApp</p>
                                    <p class="text-[11px] text-gray-500">{{ $settings['social_whatsapp'] }}</p>
                                </div>
                            </div>
                            <svg class="w-4 h-4 text-gray-300 group-hover:text-gray-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </li>
                    @endif
                    
                    <!-- YouTube -->
                    @if(isset($settings['social_youtube']) && $settings['social_youtube'])
                    <li>
                        <a href="{{ $settings['social_youtube'] }}" target="_blank" class="flex items-center justify-between p-3 rounded-2xl hover:bg-gray-50 transition-colors group">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-red-50 text-red-600 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900 leading-tight mb-1">YouTube</p>
                                    <p class="text-[11px] text-gray-500">Tonton Video Kami</p>
                                </div>
                            </div>
                            <svg class="w-4 h-4 text-gray-300 group-hover:text-gray-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </li>
                    @endif
                    
                    <!-- TikTok -->
                    @if(isset($settings['social_tiktok']) && $settings['social_tiktok'])
                    <li>
                        <a href="{{ $settings['social_tiktok'] }}" target="_blank" class="flex items-center justify-between p-3 rounded-2xl hover:bg-gray-50 transition-colors group">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-black/5 text-gray-900 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900 leading-tight mb-1">TikTok</p>
                                    <p class="text-[11px] text-gray-500">Ikuti Kami di TikTok</p>
                                </div>
                            </div>
                            <svg class="w-4 h-4 text-gray-300 group-hover:text-gray-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        </div>
    </div>
        </div>
    </div>
</div>
@endsection
