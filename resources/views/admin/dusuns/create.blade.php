<x-app-layout>
    @section('title', 'Tambah Data Dusun')
    @section('header_title', 'Tambah Wilayah Dusun Baru')

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 max-w-2xl">
        <form action="{{ route('admin.dusuns.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="nama" class="block text-sm font-semibold text-gray-900 mb-2">Nama Dusun</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-3" placeholder="Contoh: Dusun I Cigalontang">
                @error('nama')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="jumlah_laki" class="block text-sm font-semibold text-gray-900 mb-2">Jumlah Laki-laki</label>
                    <input type="number" id="jumlah_laki" name="jumlah_laki" value="{{ old('jumlah_laki', 0) }}" min="0" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-3" placeholder="0">
                    @error('jumlah_laki')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="jumlah_perempuan" class="block text-sm font-semibold text-gray-900 mb-2">Jumlah Perempuan</label>
                    <input type="number" id="jumlah_perempuan" name="jumlah_perempuan" value="{{ old('jumlah_perempuan', 0) }}" min="0" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-3" placeholder="0">
                    @error('jumlah_perempuan')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center gap-3 pt-4">
                <button type="submit" class="text-white bg-primary hover:bg-green-700 font-semibold rounded-xl text-sm px-6 py-3 text-center transition-colors">
                    Simpan Dusun
                </button>
                <a href="{{ route('admin.dusuns.index') }}" class="inline-flex items-center gap-2 text-slate-700 bg-slate-100 hover:bg-slate-200 font-medium rounded-xl text-sm px-5 py-2.5 transition-colors"> <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
