<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel') - {{ config('app.name', 'Desa Cigalontang') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=montserrat:400,500,600,700,800,900|roboto:400,500,700&display=swap" rel="stylesheet" />

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

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Flash Message: Success
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{!! session('success') !!}",
                    confirmButtonColor: '#10b981',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            @endif

            // Flash Message: Error
            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: "{!! session('error') !!}",
                    confirmButtonColor: '#ef4444',
                });
            @endif

            // Laravel Validation Errors
            @if($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Validasi Gagal!',
                    html: `
                        <div class="text-left text-sm text-red-600 bg-red-50 p-4 rounded-xl mt-2">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    `,
                    confirmButtonColor: '#ef4444',
                });
            @endif

            // Global Delete Confirmation
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                const methodInput = form.querySelector('input[name="_method"][value="DELETE"]');
                if (methodInput) {
                    // Remove default browser confirmation
                    form.removeAttribute('onsubmit');
                    
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: "Data yang dihapus tidak dapat dikembalikan!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#ef4444',
                            cancelButtonColor: '#6b7280',
                            confirmButtonText: 'Ya, Hapus Data!',
                            cancelButtonText: 'Batal',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                } else {
                    // For Create/Update forms, catch HTML5 invalid events to show SweetAlert
                    form.addEventListener('invalid', function(e) {
                        e.preventDefault(); // Prevent default browser tooltip
                        
                        // We only want to show the alert once per form submission attempt
                        // Debouncing the alert logic since invalid fires for every empty field
                        if (!form.dataset.isAlerting) {
                            form.dataset.isAlerting = true;
                            
                            // Highlight the invalid field
                            e.target.classList.add('border-red-500', 'ring-red-500');
                            
                            // Determine field name for the message
                            let fieldName = e.target.getAttribute('name') || 'Bidang ini';
                            if (e.target.id) {
                                const label = document.querySelector('label[for="' + e.target.id + '"]');
                                if (label) {
                                    fieldName = label.innerText.replace(/\*|:|\(.*?\)/g, '').trim();
                                }
                            }
                            // If we still only have the raw name attribute, format it nicely
                            if (fieldName === e.target.getAttribute('name')) {
                                fieldName = fieldName.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
                            }
                            
                            Swal.fire({
                                icon: 'warning',
                                title: 'Data Belum Lengkap',
                                text: `"${fieldName}" masih Kosong lengkapi terlebih dahulu.`,
                                confirmButtonColor: '#f59e0b',
                            }).then(() => {
                                form.dataset.isAlerting = '';
                                e.target.focus();
                            });
                        } else {
                            e.target.classList.add('border-red-500', 'ring-red-500');
                        }
                        
                        // Remove highlight when user types
                        e.target.addEventListener('input', function() {
                            this.classList.remove('border-red-500', 'ring-red-500');
                        }, { once: true });
                        
                    }, true);
                }
            });
        });
    </script>
</body>
</html>
