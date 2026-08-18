<x-app-layout>
    @section('title', 'Tambah Aparatur')
    @section('header_title', 'Tambah Perangkat Desa')

    <div class="max-w-2xl bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.aparatur.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Nama -->
            <div>
                <label for="nama" class="block mb-2 text-sm font-semibold text-slate-700">Nama Lengkap (Termasuk Gelar)</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" required>
                @error('nama') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Jabatan -->
            <div>
                <label for="jabatan" class="block mb-2 text-sm font-semibold text-slate-700">Jabatan</label>
                <select name="jabatan" id="jabatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" required>
                    <option value="">-- Pilih Jabatan --</option>
                    @php
                        $jabatanList = [
                            'Kepala Desa', 'Sekretaris Desa', 'Kaur Tata Usaha dan Umum',
                            'Kaur Keuangan', 'Kaur Perencanaan', 'Kasi Pemerintahan',
                            'Kasi Kesejahteraan', 'Kasi Pelayanan', 'Kepala Dusun (Kadus)',
                            'Staff Desa', 'Lainnya'
                        ];
                    @endphp
                    @foreach($jabatanList as $jbt)
                        <option value="{{ $jbt }}" {{ old('jabatan') == $jbt ? 'selected' : '' }}>{{ $jbt }}</option>
                    @endforeach
                </select>
                @error('jabatan') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- NIP / NIK -->
            <div>
                <label for="nip_nik" class="block mb-2 text-sm font-semibold text-slate-700">NIP / NIK (Opsional)</label>
                <input type="text" name="nip_nik" id="nip_nik" value="{{ old('nip_nik') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5">
                @error('nip_nik') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Foto -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900">Foto Profil/Pas Foto</label>
                <div class="mb-3">
                    <img id="image_preview" src="https://ui-avatars.com/api/?name=Aparatur&background=E5E7EB&color=374151&size=200" class="max-w-48 max-h-64 w-auto h-auto object-contain rounded-lg shadow-sm border border-gray-200">
                </div>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-xl cursor-pointer bg-gray-50 focus:outline-none p-2.5" id="foto_url" name="foto_url" type="file" accept="image/*" required onchange="previewImage(this)">
                <p class="mt-1 text-xs text-gray-500">Format yang didukung: JPG, JPEG, PNG. Disarankan rasio 3:4 atau persegi. Maksimal 5MB.</p>
                @error('foto_url') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <script>
                function previewImage(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById('image_preview').src = e.target.result;
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>

            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="inline-flex items-center justify-center gap-2 text-white bg-primary hover:bg-green-700 font-medium rounded-xl text-sm px-8 py-3 text-center transition-colors shadow-lg shadow-primary/30"> <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Simpan Data</button>
                <a href="{{ route('admin.aparatur.index') }}" class="inline-flex items-center justify-center gap-2 text-slate-700 bg-slate-100 hover:bg-slate-200 font-medium rounded-xl text-sm px-6 py-3 transition-colors"> <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
