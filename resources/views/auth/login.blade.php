<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - Desa Cigalontang</title>
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
                    <h2 class="text-4xl font-extrabold mb-4 leading-tight">Portal Admin<br>Desa Digital</h2>
                    <p class="text-green-50 text-lg leading-relaxed mb-8 opacity-90">Kelola konten, layanan, dan informasi desa dengan mudah, aman, dan terintegrasi.</p>
                    
                    <div class="flex items-center gap-4 text-sm font-medium text-green-100">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            Aman
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            Cepat
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                            Terintegrasi
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="w-full lg:w-1/2 p-8 sm:p-12 lg:p-16 flex flex-col justify-center bg-white">
                
                <!-- Mobile Header -->
                <div class="flex lg:hidden items-center justify-center gap-3 mb-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12 h-12 object-contain drop-shadow" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Lambang_Kabupaten_Tasikmalaya.webp/150px-Lambang_Kabupaten_Tasikmalaya.webp.png'; this.onerror=null;">
                    <div class="text-left">
                        <h2 class="text-xl font-bold text-gray-900 leading-tight">Desa Cigalontang</h2>
                        <p class="text-xs text-gray-500 font-medium">Portal Administrator</p>
                    </div>
                </div>

                <div class="text-center lg:text-left mb-8">
                    <h3 class="text-2xl sm:text-3xl font-black text-gray-900 mb-2">Selamat Datang</h3>
                    <p class="text-gray-500 text-sm font-medium">Silakan masuk ke akun Anda untuk melanjutkan.</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200 text-green-600 text-sm font-medium text-center">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </div>
                            <input id="email" type="email" name="email" required autofocus autocomplete="username" class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors text-gray-900" placeholder="contoh@email.com">
                        </div>
                        @error('email')
                            <p class="mt-2 text-xs text-red-500 font-medium">Email atau kata sandi yang Anda masukkan salah.</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider">Kata Sandi</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs font-bold text-primary hover:text-green-700 transition-colors">
                                    Lupa sandi?
                                </a>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input id="password" type="password" name="password" required autocomplete="current-password" class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors text-gray-900" placeholder="••••••••">
                        </div>
                        @error('password')
                            <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary bg-gray-50">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-600 cursor-pointer">
                            Ingat saya
                        </label>
                    </div>

                    <div class="pt-4 space-y-3">
                        <button type="submit" class="w-full flex justify-center items-center gap-2 py-3.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-primary hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all">
                            Masuk ke Dashboard
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                        
                        <a href="{{ url('/') }}" class="w-full flex justify-center items-center gap-2 py-3.5 px-4 border border-gray-200 rounded-xl text-sm font-bold text-gray-600 bg-white hover:bg-gray-50 hover:text-primary focus:outline-none transition-all shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Kembali ke Web Pengunjung
                        </a>
                    </div>
                </form>
                
                <div class="mt-8 text-center text-xs text-gray-400 font-medium">
                    &copy; {{ date('Y') }} Pemerintah Desa Cigalontang.<br>Dilindungi Hak Cipta.
                </div>
            </div>
        </div>
    </div>
</body>
</html>
