@extends('layouts.public')

@section('title', 'Galeri Kegiatan')

@section('content')
<!-- Premium Hero Section -->
<div class="relative bg-gradient-to-br from-green-900 via-primary to-emerald-800 overflow-hidden pt-28 pb-28 flex flex-col justify-center items-center">
    <!-- Decorative background shapes -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-10 w-72 h-72 bg-emerald-400/20 rounded-full blur-2xl"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <span class="inline-block py-1 px-3 rounded-full bg-white/20 text-white text-xs font-bold tracking-widest uppercase mb-3 backdrop-blur-sm border border-white/30">
            Dokumentasi
        </span>
        <h1 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl lg:text-5xl mb-3">Galeri Desa</h1>
        <p class="text-lg text-primary-100 max-w-2xl mx-auto text-white/90">Kumpulan momen, kegiatan, dan pesona alam yang terekam dalam perjalanan membangun Desa Cigalontang.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-16 relative z-20">
    <!-- Gallery Masonry Grid -->
    <div class="columns-2 sm:columns-3 lg:columns-4 gap-4 space-y-4" id="katalog-galeri">
        
        @foreach($galeris as $galeri)
        <div class="galeri-item relative overflow-hidden rounded-3xl bg-gray-100 shadow-sm border border-gray-100 group cursor-pointer break-inside-avoid">
            @if($galeri->foto_url && Storage::disk('public')->exists($galeri->foto_url))
                <img src="{{ Storage::url($galeri->foto_url) }}" alt="{{ $galeri->judul }}" class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-700">
            @elseif($galeri->foto_url)
                <img src="{{ $galeri->foto_url }}" alt="{{ $galeri->judul }}" class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-700">
            @else
                <div class="w-full aspect-square flex items-center justify-center text-gray-400 bg-gray-200">
                    No Image
                </div>
            @endif
            <!-- Overlay untuk memunculkan judul saat di hover -->
            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center p-4">
                <p class="text-white text-center font-semibold transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">{{ $galeri->judul }}</p>
            </div>
        </div>
        @endforeach

    </div>

    <!-- Pagination Modern -->
    {{ $galeris->onEachSide(1)->links('vendor.pagination.custom') }}
</div>

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 z-50 bg-gray-900/95 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300 p-4">
    <!-- Close Button -->
    <button id="lightbox-close" class="absolute top-6 right-6 text-white hover:text-gray-300 transition-colors p-2 focus:outline-none">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>
    <!-- Image Container -->
    <img id="lightbox-img" src="" alt="Galeri Full" class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl scale-95 transition-transform duration-300">
</div>

<style>
/* Open state for lightbox */
#lightbox.active {
    opacity: 1;
    pointer-events: auto;
}
#lightbox.active #lightbox-img {
    transform: scale(1);
}
/* Hide scrollbar for Chrome, Safari and Opera */
.hide-scrollbar::-webkit-scrollbar {
  display: none;
}
/* Hide scrollbar for IE, Edge and Firefox */
.hide-scrollbar {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>

<!-- Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const galeriItems = document.querySelectorAll('.galeri-item');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxClose = document.getElementById('lightbox-close');

    // Buka Lightbox saat gambar diklik
    galeriItems.forEach(item => {
        item.addEventListener('click', () => {
            const imgSrc = item.querySelector('img').src;
            lightboxImg.src = imgSrc;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden'; // cegah background scroll
        });
    });

    // Tutup Lightbox saat tombol X diklik
    lightboxClose.addEventListener('click', () => {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
    });

    // Tutup Lightbox saat area di luar gambar diklik
    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }
    });

    // Tutup Lightbox saat tombol Escape ditekan
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && lightbox.classList.contains('active')) {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
});
</script>
@endsection
