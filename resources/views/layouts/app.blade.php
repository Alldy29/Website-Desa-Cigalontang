<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel') - {{ config('app.name', 'Desa Cigalontang') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50 overflow-hidden">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen w-full">
        
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Mobile overlay -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition.opacity class="fixed inset-0 z-10 bg-gray-900/50 backdrop-blur-sm md:hidden"></div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col h-full overflow-hidden">
            
            <!-- Topbar -->
            @include('layouts.topbar')

            <!-- Main Scrollable Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50/50 p-6 lg:p-8">
                <!-- Page Content -->
                {{ $slot }}
            </main>
            
        </div>
    </div>
</body>
</html>
