<x-app-layout>
    @section('title', 'Mitra UMKM')
    @section('header_title', 'Manajemen Mitra UMKM')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Form Tambah Mitra -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-24">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Tambah Mitra</h3>
                
                @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-4 text-sm">
                    {{ session('error') }}
                </div>
                @endif
                
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-4 text-sm">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('admin.umkm.mitra.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_mitra" class="block mb-2 text-sm font-medium text-gray-900">Nama Toko/Pemilik</label>
                        <input type="text" name="nama_mitra" id="nama_mitra" value="{{ old('nama_mitra') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Contoh: Toko Berkah" required>
                        @error('nama_mitra') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="no_whatsapp" class="block mb-2 text-sm font-medium text-gray-900">Nomor WhatsApp (Opsional)</label>
                        <input type="text" name="no_whatsapp" id="no_whatsapp" value="{{ old('no_whatsapp') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Contoh: 08123456789">
                        @error('no_whatsapp') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat (Opsional)</label>
                        <textarea name="alamat" id="alamat" rows="2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Contoh: Dusun Sukamaju RT 01">{{ old('alamat') }}</textarea>
                        @error('alamat') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 text-white bg-slate-800 hover:bg-slate-900 font-medium rounded-xl text-sm px-5 py-2.5 transition-colors shadow-sm"> <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Simpan Mitra</button>
                </form>
            </div>
        </div>

        <!-- Daftar Mitra -->
        <div class="md:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Daftar Mitra UMKM</h3>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 rounded-t-xl">
                            <tr>
                                <th class="px-6 py-3 rounded-tl-xl w-16">No</th>
                                <th class="px-6 py-3">Nama Mitra</th>
                                <th class="px-6 py-3">Kontak & Alamat</th>
                                <th class="px-6 py-3 text-center">Jumlah Produk</th>
                                <th class="px-6 py-3 rounded-tr-xl text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mitras as $index => $mitra)
                            <tr class="bg-white border-b hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900">
                                    {{ $mitra->nama_mitra }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-gray-900 font-medium">{{ $mitra->no_whatsapp ?? '-' }}</div>
                                    <div class="text-xs text-gray-500">{{ $mitra->alamat ?? '-' }}</div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded whitespace-nowrap inline-block">{{ $mitra->umkm_products_count }} Produk</span>
                                </td>
                                <td class="px-6 py-4 text-right flex justify-end gap-3">
                                    <button type="button" onclick="editMitra({{ $mitra->id }}, '{{ addslashes($mitra->nama_mitra) }}', '{{ addslashes($mitra->no_whatsapp) }}', '{{ addslashes($mitra->alamat) }}')" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-slate-700 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 hover:text-blue-600 transition-colors"> <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg> Edit</button>
                                    <form action="{{ route('admin.umkm.mitra.destroy', $mitra->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus mitra ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 border border-red-100 rounded-lg hover:bg-red-100 transition-colors"> <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                    Belum ada Mitra UMKM.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit (Simple via JS prompt for now, or just use form manipulation) -->
    <script>
        function editMitra(id, nama, whatsapp, alamat) {
            // Update form action
            const form = document.querySelector('form[action="{{ route('admin.umkm.mitra.store') }}"]');
            form.action = `/admin/umkm/mitra/${id}`;
            
            // Add method PUT
            let methodInput = form.querySelector('input[name="_method"]');
            if (!methodInput) {
                methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'PUT';
                form.appendChild(methodInput);
            }

            // Fill inputs
            document.getElementById('nama_mitra').value = nama;
            document.getElementById('no_whatsapp').value = whatsapp;
            document.getElementById('alamat').value = alamat;

            // Change button text
            const btn = form.querySelector('button[type="submit"]');
            btn.textContent = 'Simpan Perubahan';
            
            // Add cancel button
            let cancelBtn = document.getElementById('cancel-edit');
            if (!cancelBtn) {
                cancelBtn = document.createElement('button');
                cancelBtn.type = 'button';
                cancelBtn.id = 'cancel-edit';
                cancelBtn.className = 'w-full mt-2 inline-flex items-center justify-center gap-2 text-slate-700 bg-slate-100 hover:bg-slate-200 font-medium rounded-xl text-sm px-5 py-2.5 transition-colors';
                cancelBtn.textContent = 'Batal Edit';
                cancelBtn.onclick = function() {
                    form.action = '{{ route('admin.umkm.mitra.store') }}';
                    methodInput.remove();
                    form.reset();
                    btn.textContent = 'Simpan Mitra';
                    this.remove();
                };
                form.appendChild(cancelBtn);
            }
        }
    </script>
</x-app-layout>
