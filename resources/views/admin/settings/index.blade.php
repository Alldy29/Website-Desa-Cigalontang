<x-app-layout>
    @section('title', 'Pengaturan Website')
    @section('header_title', 'Pengaturan Profil Website')

    <div class="max-w-4xl">
        
        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf

            <!-- Card: Identitas Utama -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">
                <h3 class="text-lg font-bold text-gray-900 mb-6 pb-2 border-b border-gray-100">Identitas Utama Desa</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="desa_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap Desa</label>
                        <input type="text" name="desa_name" id="desa_name" value="{{ $settings['desa_name'] ?? 'Desa Cigalontang' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5">
                    </div>
                    <div>
                        <label for="kepala_desa" class="block mb-2 text-sm font-medium text-gray-900">Nama Kepala Desa</label>
                        <input type="text" name="kepala_desa" id="kepala_desa" value="{{ $settings['kepala_desa'] ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5">
                    </div>
                    <div class="md:col-span-2">
                        <label for="desa_description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Singkat Desa (Motto/Visi Misi Singkat)</label>
                        <textarea name="desa_description" id="desa_description" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5">{{ $settings['desa_description'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Card: Kontak & Alamat -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">
                <h3 class="text-lg font-bold text-gray-900 mb-6 pb-2 border-b border-gray-100">Kontak & Alamat</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="contact_phone" class="block mb-2 text-sm font-medium text-gray-900">Nomor Telepon Desa</label>
                        <input type="text" name="contact_phone" id="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Contoh: 0812-3456-7890">
                    </div>
                    <div>
                        <label for="contact_email" class="block mb-2 text-sm font-medium text-gray-900">Email Desa</label>
                        <input type="email" name="contact_email" id="contact_email" value="{{ $settings['contact_email'] ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Contoh: info@cigalontang.desa.id">
                    </div>
                    <div class="md:col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat Lengkap Kantor Desa</label>
                        <textarea name="address" id="address" rows="2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Jl. Raya Cigalontang No...">{{ $settings['address'] ?? '' }}</textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label for="google_maps_link" class="block mb-2 text-sm font-medium text-gray-900">Link Google Maps (URL URL Peta)</label>
                        <input type="url" name="google_maps_link" id="google_maps_link" value="{{ $settings['google_maps_link'] ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="https://maps.google.com/...">
                    </div>
                </div>
            </div>

            <!-- Card: Media Sosial -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">
                <h3 class="text-lg font-bold text-gray-900 mb-6 pb-2 border-b border-gray-100">Media Sosial</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="social_instagram" class="block mb-2 text-sm font-medium text-gray-900">Link Instagram</label>
                        <input type="url" name="social_instagram" id="social_instagram" value="{{ $settings['social_instagram'] ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="https://instagram.com/...">
                    </div>
                    <div>
                        <label for="social_facebook" class="block mb-2 text-sm font-medium text-gray-900">Link Facebook</label>
                        <input type="url" name="social_facebook" id="social_facebook" value="{{ $settings['social_facebook'] ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="https://facebook.com/...">
                    </div>
                    <div>
                        <label for="social_youtube" class="block mb-2 text-sm font-medium text-gray-900">Link YouTube</label>
                        <input type="url" name="social_youtube" id="social_youtube" value="{{ $settings['social_youtube'] ?? '' }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="https://youtube.com/...">
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit" class="text-white bg-primary hover:bg-green-700 font-medium rounded-xl px-8 py-3 text-center transition-colors shadow-lg shadow-primary/30">
                    Simpan Semua Pengaturan
                </button>
            </div>
            
        </form>
    </div>
</x-app-layout>
