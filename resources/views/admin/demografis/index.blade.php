<x-app-layout>
    @section('title', 'Demografi Penduduk')
    @section('header_title', 'Demografi Penduduk')

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Pendidikan Table -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-gray-900">Tingkat Pendidikan</h3>
                <button onclick="document.getElementById('modal-pendidikan').classList.remove('hidden')" class="bg-primary hover:bg-green-700 text-white px-3 py-1.5 rounded-xl text-sm font-semibold transition-colors flex items-center gap-1 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah
                </button>
            </div>

            @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-4 text-sm">
                {{ session('success') }}
            </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="py-2 px-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Tingkat Pendidikan</th>
                            <th class="py-2 px-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Jumlah</th>
                            <th class="py-2 px-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($pendidikans as $p)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-3 px-3 text-sm font-semibold text-gray-900">{{ $p->nama }}</td>
                            <td class="py-3 px-3 text-sm text-gray-600 text-center">{{ number_format($p->jumlah, 0, ',', '.') }}</td>
                            <td class="py-3 px-3 text-sm text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button onclick="openEditModal({{ $p->id }}, '{{ $p->nama }}', {{ $p->jumlah }})" class="p-1.5 text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                    <form action="{{ route('admin.demografis.destroy', $p) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-colors" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pekerjaan Table -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-gray-900">Kelompok Pekerjaan</h3>
                <button onclick="document.getElementById('modal-pekerjaan').classList.remove('hidden')" class="bg-primary hover:bg-green-700 text-white px-3 py-1.5 rounded-xl text-sm font-semibold transition-colors flex items-center gap-1 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="py-2 px-3 text-xs font-bold text-gray-500 uppercase tracking-wider">Pekerjaan</th>
                            <th class="py-2 px-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Jumlah</th>
                            <th class="py-2 px-3 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($pekerjaans as $p)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-3 px-3 text-sm font-semibold text-gray-900">{{ $p->nama }}</td>
                            <td class="py-3 px-3 text-sm text-gray-600 text-center">{{ number_format($p->jumlah, 0, ',', '.') }}</td>
                            <td class="py-3 px-3 text-sm text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button onclick="openEditModal({{ $p->id }}, '{{ $p->nama }}', {{ $p->jumlah }})" class="p-1.5 text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                    <form action="{{ route('admin.demografis.destroy', $p) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-colors" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Pendidikan -->
    <div id="modal-pendidikan" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h3 class="text-lg font-bold text-gray-900">Tambah Pendidikan</h3>
                <button onclick="document.getElementById('modal-pendidikan').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <form action="{{ route('admin.demografis.store') }}" method="POST" class="p-6">
                @csrf
                <input type="hidden" name="kategori" value="pendidikan">
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tingkat Pendidikan</label>
                    <input type="text" name="nama" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors" placeholder="Contoh: SD / Sederajat">
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah Penduduk</label>
                    <input type="number" name="jumlah" required min="0" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors" placeholder="0">
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="document.getElementById('modal-pendidikan').classList.add('hidden')" class="px-5 py-2 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">Batal</button>
                    <button type="submit" class="px-5 py-2 text-sm font-medium text-white bg-primary hover:bg-green-700 rounded-xl transition-colors">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Tambah Pekerjaan -->
    <div id="modal-pekerjaan" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h3 class="text-lg font-bold text-gray-900">Tambah Pekerjaan</h3>
                <button onclick="document.getElementById('modal-pekerjaan').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <form action="{{ route('admin.demografis.store') }}" method="POST" class="p-6">
                @csrf
                <input type="hidden" name="kategori" value="pekerjaan">
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kelompok Pekerjaan</label>
                    <input type="text" name="nama" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors" placeholder="Contoh: Petani">
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah Penduduk</label>
                    <input type="number" name="jumlah" required min="0" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors" placeholder="0">
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="document.getElementById('modal-pekerjaan').classList.add('hidden')" class="px-5 py-2 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">Batal</button>
                    <button type="submit" class="px-5 py-2 text-sm font-medium text-white bg-primary hover:bg-green-700 rounded-xl transition-colors">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="modal-edit" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h3 class="text-lg font-bold text-gray-900">Edit Data</h3>
                <button onclick="document.getElementById('modal-edit').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <form id="form-edit" method="POST" class="p-6">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan / Nama</label>
                    <input type="text" id="edit-nama" name="nama" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors">
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah Penduduk</label>
                    <input type="number" id="edit-jumlah" name="jumlah" required min="0" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors">
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="document.getElementById('modal-edit').classList.add('hidden')" class="px-5 py-2 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">Batal</button>
                    <button type="submit" class="px-5 py-2 text-sm font-medium text-white bg-primary hover:bg-green-700 rounded-xl transition-colors">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, nama, jumlah) {
            document.getElementById('edit-nama').value = nama;
            document.getElementById('edit-jumlah').value = jumlah;
            document.getElementById('form-edit').action = '/admin/demografis/' + id;
            document.getElementById('modal-edit').classList.remove('hidden');
        }
    </script>
</x-app-layout>
