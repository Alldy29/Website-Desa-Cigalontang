<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Kata Sandi - Desa Cigalontang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased relative min-h-screen flex items-center justify-center">
    
    <!-- Background Decor -->
    <div class="fixed inset-0 bg-gradient-to-br from-green-900 via-primary to-emerald-800 -z-20"></div>
    <div class="fixed -top-40 -right-40 w-96 h-96 bg-white/10 rounded-full blur-3xl -z-10"></div>
    <div class="fixed -bottom-40 -left-40 w-96 h-96 bg-emerald-400/20 rounded-full blur-3xl -z-10"></div>

    <div class="w-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-center z-10">
        <div class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden flex w-full max-w-4xl border border-white/20">
            <!-- Left Side - Branding -->
            <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-green-600 to-green-800 p-12 flex-col justify-between text-white relative overflow-hidden">
                <div class="absolute inset-0 bg-black/10"></div>
                <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                
                <div class="relative z-10">
                    <a href="/" class="inline-flex items-center gap-3 hover:opacity-80 transition-opacity">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-7 h-7 object-contain" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Lambang_Kabupaten_Tasikmalaya.webp/150px-Lambang_Kabupaten_Tasikmalaya.webp.png'; this.onerror=null;">
                        </div>
                        <span class="font-bold text-xl tracking-tight">Cigalontang</span>
                    </a>
                </div>
                
                <div class="relative z-10 mt-20">
                    <h2 class="text-4xl font-extrabold mb-4 leading-tight">Buat Sandi<br>Baru</h2>
                    <p class="text-green-50 text-lg leading-relaxed mb-8 opacity-90">Silakan buat kata sandi baru untuk akun Anda. Pastikan untuk menggunakan sandi yang kuat.</p>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="w-full lg:w-1/2 p-8 sm:p-12 lg:p-16 flex flex-col justify-center bg-white">
                
                <!-- Mobile Header -->
                <div class="flex lg:hidden items-center justify-center gap-3 mb-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12 h-12 object-contain drop-shadow" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Lambang_Kabupaten_Tasikmalaya.webp/150px-Lambang_Kabupaten_Tasikmalaya.webp.png'; this.onerror=null;">
                    <div class="text-left">
                        <h2 class="text-xl font-bold text-gray-900 leading-tight">Desa Cigalontang</h2>
                        <p class="text-xs text-gray-500 font-medium">Buat Sandi Baru</p>
                    </div>
                </div>

                <div class="text-center lg:text-left mb-8">
                    <h3 class="text-2xl sm:text-3xl font-black text-gray-900 mb-2">Reset Kata Sandi</h3>
                    <p class="text-gray-500 text-sm font-medium">Masukkan alamat email dan kata sandi baru Anda di bawah ini.</p>
                </div>

                <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email', request('email')) }}" required autofocus autocomplete="username" class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors text-gray-900">
                        </div>
                        @error('email')
                            <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Kata Sandi Baru</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input id="password" type="password" name="password" required autocomplete="new-password" class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors text-gray-900" placeholder="Minimal 8 karakter">
                        </div>
                        @error('password')
                            <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Konfirmasi Kata Sandi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors text-gray-900" placeholder="Ketik ulang kata sandi baru">
                        </div>
                        @error('password_confirmation')
                            <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full flex justify-center items-center gap-2 py-3.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-primary hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all">
                            Simpan Kata Sandi Baru
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>
