@extends('layouts.public')

@section('title', 'Formulir Aspirasi')

@section('content')
<div class="relative bg-gradient-to-br from-green-900 via-primary to-emerald-800 overflow-hidden pt-32 pb-24">
    <!-- Decorative background shapes -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-10 w-72 h-72 bg-emerald-400/20 rounded-full blur-2xl"></div>
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center mb-16">
        <span class="inline-flex items-center gap-2 py-1 px-4 rounded-full bg-white/20 text-white text-xs font-bold tracking-widest uppercase mb-4 shadow-sm border border-white/30 backdrop-blur-md">
            Layanan Digital
        </span>
        <h1 class="text-4xl font-extrabold text-white tracking-tight sm:text-5xl mb-4 drop-shadow-lg">Suara Anda, Kemajuan Bersama</h1>
        <p class="text-lg text-green-50 drop-shadow">Sampaikan aspirasi, kritik, usulan pembangunan, atau laporan masyarakat langsung kepada Pemerintah Desa Cigalontang secara transparan.</p>
    </div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 sm:p-12">
            
            <form action="#" method="POST" class="space-y-8">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Nama Lengkap -->
                    <div>
                        <label for="nama" class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="nama" id="nama" class="block w-full rounded-2xl bg-gray-50 border-0 ring-1 ring-inset ring-gray-200 focus:ring-2 focus:ring-inset focus:ring-primary text-gray-900 px-4 py-3.5 transition-all" placeholder="Masukkan nama Anda" required>
                    </div>

                    <!-- NIK -->
                    <div>
                        <label for="nik" class="block text-sm font-bold text-gray-700 mb-2">NIK (Sesuai KTP) <span class="text-red-500">*</span></label>
                        <input type="number" name="nik" id="nik" class="block w-full rounded-2xl bg-gray-50 border-0 ring-1 ring-inset ring-gray-200 focus:ring-2 focus:ring-inset focus:ring-primary text-gray-900 px-4 py-3.5 transition-all" placeholder="16 digit NIK" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- No WhatsApp -->
                    <div>
                        <label for="whatsapp" class="block text-sm font-bold text-gray-700 mb-2">No. WhatsApp <span class="text-red-500">*</span></label>
                        <input type="text" name="whatsapp" id="whatsapp" class="block w-full rounded-2xl bg-gray-50 border-0 ring-1 ring-inset ring-gray-200 focus:ring-2 focus:ring-inset focus:ring-primary text-gray-900 px-4 py-3.5 transition-all" placeholder="08xxxxxxxxxx" required>
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label for="kategori" class="block text-sm font-bold text-gray-700 mb-2">Kategori Laporan <span class="text-red-500">*</span></label>
                        <select id="kategori" name="kategori" class="block w-full rounded-2xl bg-gray-50 border-0 ring-1 ring-inset ring-gray-200 focus:ring-2 focus:ring-inset focus:ring-primary text-gray-900 px-4 py-3.5 transition-all appearance-none" required>
                            <option value="">Pilih Kategori...</option>
                            <option value="infrastruktur">Pembangunan / Infrastruktur</option>
                            <option value="pelayanan">Pelayanan Publik</option>
                            <option value="keamanan">Ketertiban & Keamanan</option>
                            <option value="sosial">Kesejahteraan Sosial</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>

                <!-- Isi Aspirasi -->
                <div>
                    <label for="pesan" class="block text-sm font-bold text-gray-700 mb-2">Isi Aspirasi / Laporan <span class="text-red-500">*</span></label>
                    <textarea id="pesan" name="pesan" rows="5" class="block w-full rounded-2xl bg-gray-50 border-0 ring-1 ring-inset ring-gray-200 focus:ring-2 focus:ring-inset focus:ring-primary text-gray-900 px-4 py-3.5 transition-all resize-none" placeholder="Tuliskan detail aspirasi atau laporan Anda di sini secara jelas..." required></textarea>
                </div>
                
                <!-- Bukti Foto -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Lampiran Bukti Foto (Opsional)</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-2xl bg-gray-50 hover:bg-gray-100 transition-colors cursor-pointer group">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400 group-hover:text-primary transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600 justify-center">
                                <label for="file-upload" class="relative cursor-pointer bg-transparent rounded-md font-bold text-primary hover:text-primary-dark focus-within:outline-none">
                                    <span>Unggah file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">atau seret ke sini</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG maksimal 5MB</p>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-full shadow-lg text-lg font-bold text-white bg-primary hover:bg-primary-dark hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all transform hover:-translate-y-1">
                        Kirim Aspirasi Sekarang
                    </button>
                    <p class="text-center text-xs text-gray-400 mt-4">
                        Data privasi Anda (NIK & No HP) dijamin kerahasiaannya oleh sistem.
                    </p>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
