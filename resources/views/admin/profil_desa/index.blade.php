<x-app-layout>
    @section('title', 'Profil Desa')
    @section('header_title', 'Kelola Profil & Sejarah Desa')

    <div class="max-w-5xl">
        
        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm">
            {{ session('success') }}
        </div>
        @endif
        
        <form action="{{ route('admin.profil_desa.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Sejarah & Sambutan -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
                <div class="bg-gray-50 border-b border-gray-100 p-5">
                    <h3 class="text-lg font-bold text-gray-900">Sejarah & Visi Misi</h3>
                    <p class="text-sm text-gray-500">Konten ini akan ditampilkan di halaman Profil dan Beranda.</p>
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <label for="sejarah_singkat" class="block mb-2 text-sm font-medium text-gray-900">Sejarah Singkat (Tampil di Beranda)</label>
                        <textarea name="sejarah_singkat" id="sejarah_singkat" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-3">{{ $settings['sejarah_singkat'] ?? '' }}</textarea>
                    </div>
                    <div>
                        <label for="sejarah_lengkap" class="block mb-2 text-sm font-medium text-gray-900">Sejarah Lengkap (Tampil di Halaman Profil)</label>
                        <textarea name="sejarah_lengkap" id="sejarah_lengkap" rows="6" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-3">{{ $settings['sejarah_lengkap'] ?? '' }}</textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="visi" class="block mb-2 text-sm font-medium text-gray-900">Visi Desa</label>
                            <textarea name="visi" id="visi" rows="5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-3">{{ $settings['visi'] ?? '' }}</textarea>
                        </div>
                        <div>
                            <label for="misi" class="block mb-2 text-sm font-medium text-gray-900">Misi Desa (Pisahkan dengan baris baru untuk setiap poin)</label>
                            <textarea name="misi" id="misi" rows="5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-3">{{ $settings['misi'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sambutan Kades -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
                <div class="bg-gray-50 border-b border-gray-100 p-5">
                    <h3 class="text-lg font-bold text-gray-900">Sambutan Kepala Desa</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-1">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Foto Kepala Desa</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl">
                                <div class="space-y-1 text-center">
                                    @if(isset($settings['foto_kades']) && $settings['foto_kades'] != '')
                                        <img src="{{ Storage::url($settings['foto_kades']) }}" alt="Foto Kades" class="mx-auto h-32 w-32 object-cover rounded-full mb-4">
                                    @else
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                    @endif
                                    <div class="flex text-sm text-gray-600 justify-center">
                                        <label for="foto_kades" class="relative cursor-pointer bg-white rounded-md font-medium text-primary hover:text-green-700">
                                            <span>Upload a file</span>
                                            <input id="foto_kades" name="foto_kades" type="file" class="sr-only">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG up to 5MB</p>
                                </div>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <label for="sambutan_kades" class="block mb-2 text-sm font-medium text-gray-900">Isi Sambutan (Tampil di Beranda)</label>
                            <textarea name="sambutan_kades" id="sambutan_kades" rows="7" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-3">{{ $settings['sambutan_kades'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Geografi & Batas -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
                <div class="bg-gray-50 border-b border-gray-100 p-5">
                    <h3 class="text-lg font-bold text-gray-900">Geografi & Demografi</h3>
                    <p class="text-sm text-gray-500">Data letak dan luasan wilayah desa.</p>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                        <div>
                            <label class="block mb-2 text-xs font-bold text-gray-700">Luas Wilayah</label>
                            <input type="text" name="luas_wilayah" value="{{ $settings['luas_wilayah'] ?? '' }}" placeholder="Contoh: 537.6 Ha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary block w-full p-2.5">
                        </div>
                        <div>
                            <label class="block mb-2 text-xs font-bold text-gray-700">Ketinggian (MDPL)</label>
                            <input type="text" name="ketinggian" value="{{ $settings['ketinggian'] ?? '' }}" placeholder="Contoh: 700 M" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary block w-full p-2.5">
                        </div>
                        <div>
                            <label class="block mb-2 text-xs font-bold text-gray-700">Jarak ke Kecamatan</label>
                            <input type="text" name="jarak_kecamatan" value="{{ $settings['jarak_kecamatan'] ?? '' }}" placeholder="Contoh: 7 Km" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary block w-full p-2.5">
                        </div>
                        <div>
                            <label class="block mb-2 text-xs font-bold text-gray-700">Jarak ke Kabupaten</label>
                            <input type="text" name="jarak_kabupaten" value="{{ $settings['jarak_kabupaten'] ?? '' }}" placeholder="Contoh: 34 Km" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary block w-full p-2.5">
                        </div>
                    </div>
                    
                    <h4 class="text-sm font-bold text-gray-900 mb-3 border-t border-gray-100 pt-4">Batas Wilayah</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label class="block mb-2 text-xs font-bold text-gray-700">Sebelah Utara</label>
                            <input type="text" name="batas_utara" value="{{ $settings['batas_utara'] ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary block w-full p-2.5">
                        </div>
                        <div>
                            <label class="block mb-2 text-xs font-bold text-gray-700">Sebelah Timur</label>
                            <input type="text" name="batas_timur" value="{{ $settings['batas_timur'] ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary block w-full p-2.5">
                        </div>
                        <div>
                            <label class="block mb-2 text-xs font-bold text-gray-700">Sebelah Selatan</label>
                            <input type="text" name="batas_selatan" value="{{ $settings['batas_selatan'] ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary block w-full p-2.5">
                        </div>
                        <div>
                            <label class="block mb-2 text-xs font-bold text-gray-700">Sebelah Barat</label>
                            <input type="text" name="batas_barat" value="{{ $settings['batas_barat'] ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary block w-full p-2.5">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-2 pb-10">
                <button type="submit" class="text-white bg-primary hover:bg-green-700 font-medium rounded-xl px-8 py-3 text-center transition-colors shadow-lg shadow-primary/30">
                    Simpan Profil Desa
                </button>
            </div>
            
        </form>
    </div>
</x-app-layout>
