<x-app-layout>
    @section('title', 'Tambah Pengguna')
    @section('header_title', 'Tambah Akun Baru')

    <div class="max-w-2xl bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Nama -->
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" required>
                @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Alamat Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" required>
                @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" required>
                @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Password Confirmation -->
            <div>
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" required>
            </div>

            <!-- Role -->
            <div>
                <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Peran (Role)</label>
                <select name="role" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-primary focus:border-primary block w-full p-2.5" required>
                    <option value="">-- Pilih Peran --</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>{{ strtoupper($role->name) }}</option>
                    @endforeach
                </select>
                @error('role') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="inline-flex items-center gap-2 text-white bg-slate-800 hover:bg-slate-900 font-medium rounded-xl text-sm px-5 py-2.5 transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Simpan Akun
                </button>
                <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 text-slate-700 bg-slate-100 hover:bg-slate-200 font-medium rounded-xl text-sm px-5 py-2.5 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
