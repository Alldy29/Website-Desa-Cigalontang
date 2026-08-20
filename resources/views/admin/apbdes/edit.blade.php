<x-app-layout>
@section('title', 'Edit Data APBDes')
@section('header_title', 'Edit Data APBDes')

<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit APBDes Tahun {{ $apbde->tahun }}</h1>
            <p class="text-sm text-gray-500 mt-1">Ubah tahun atau ganti gambar infografis APBDes.</p>
        </div>
        <a href="{{ route('admin.apbdes.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 flex items-center gap-2 text-sm font-medium transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.apbdes.update', $apbde->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Input Tahun -->
            <div>
                <label for="tahun" class="block text-sm font-medium text-gray-700 mb-2">Tahun APBDes <span class="text-red-500">*</span></label>
                <input type="number" name="tahun" id="tahun" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors @error('tahun') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror" placeholder="Contoh: 2026" value="{{ old('tahun', $apbde->tahun) }}" required>
                @error('tahun')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Input Gambar -->
            <div>
                <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Gambar / Infografis APBDes (Kosongkan jika tidak ingin mengubah)</label>
                
                <!-- Custom File Input -->
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl relative hover:bg-gray-50 transition-colors" x-data="imageViewer('{{ Storage::url($apbde->gambar) }}')">
                    <div class="space-y-1 text-center" x-show="!imageUrl">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 justify-center">
                            <label for="gambar" class="relative cursor-pointer bg-white rounded-md font-medium text-primary hover:text-primary-dark focus-within:outline-none">
                                <span>Pilih Gambar Baru</span>
                                <input id="gambar" name="gambar" type="file" class="sr-only" accept="image/*" @change="fileChosen">
                            </label>
                            <p class="pl-1">atau tarik dan lepas</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 5MB</p>
                    </div>
                    
                    <!-- Preview Image -->
                    <div x-show="imageUrl" class="w-full relative group" style="display: none;">
                        <img :src="imageUrl" class="max-h-96 mx-auto rounded-lg shadow-sm">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity rounded-lg">
                            <label for="gambar" class="cursor-pointer px-4 py-2 bg-white text-gray-900 rounded-lg font-medium text-sm hover:bg-gray-100 shadow-lg">Ganti Gambar</label>
                        </div>
                    </div>
                </div>
                @error('gambar')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('admin.apbdes.index') }}" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors">Batal</a>
                <button type="submit" class="px-5 py-2.5 bg-primary text-white rounded-lg hover:bg-primary/90 font-medium transition-colors">Perbarui APBDes</button>
            </div>
        </form>
    </div>
</div>
<script>
    function imageViewer(initialUrl) {
        return {
            imageUrl: initialUrl,
            fileChosen(event) {
                this.fileToDataUrl(event, src => this.imageUrl = src)
            },
            fileToDataUrl(event, callback) {
                if (! event.target.files.length) return
                let file = event.target.files[0],
                    reader = new FileReader()
                reader.readAsDataURL(file)
                reader.onload = e => callback(e.target.result)
            }
        }
    }
</script>
</x-app-layout>
