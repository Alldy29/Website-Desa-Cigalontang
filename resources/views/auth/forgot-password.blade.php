<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi - Desa Cigalontang</title>
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
                    <h2 class="text-4xl font-extrabold mb-4 leading-tight">Pemulihan<br>Akses Akun</h2>
                    <p class="text-green-50 text-lg leading-relaxed mb-8 opacity-90">Jangan khawatir, kami akan membantu Anda mengatur ulang kata sandi dengan aman.</p>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="w-full lg:w-1/2 p-8 sm:p-12 lg:p-16 flex flex-col justify-center bg-white">
                
                <!-- Mobile Header -->
                <div class="flex lg:hidden items-center justify-center gap-3 mb-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12 h-12 object-contain drop-shadow" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Lambang_Kabupaten_Tasikmalaya.webp/150px-Lambang_Kabupaten_Tasikmalaya.webp.png'; this.onerror=null;">
                    <div class="text-left">
                        <h2 class="text-xl font-bold text-gray-900 leading-tight">Desa Cigalontang</h2>
                        <p class="text-xs text-gray-500 font-medium">Pemulihan Akun</p>
                    </div>
                </div>

                <div class="text-center lg:text-left mb-8">
                    <h3 class="text-2xl sm:text-3xl font-black text-gray-900 mb-2">Lupa Kata Sandi?</h3>
                    <p class="text-gray-500 text-sm font-medium leading-relaxed">Masukkan alamat email Anda, dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi.</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200 text-green-600 text-sm font-medium text-center">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-colors text-gray-900" placeholder="contoh@email.com">
                        </div>
                        @error('email')
                            <p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-4 space-y-4">
                        <button type="submit" class="w-full flex justify-center items-center gap-2 py-3.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-primary hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all">
                            Kirim Tautan Reset Sandi
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </button>
                        
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="text-sm font-bold text-gray-500 hover:text-gray-900 transition-colors">
                                Kembali ke Halaman Login
                            </a>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>
