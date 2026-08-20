<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    <!-- Halaman Statis -->
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ url('/profil') }}</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/berita') }}</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ url('/galeri') }}</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ url('/umkm') }}</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/wisata') }}</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/paket-wisata') }}</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/aspirasi') }}</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>

    <!-- Berita -->
    @foreach ($beritas as $berita)
        <url>
            <loc>{{ url('/berita/' . $berita->slug) }}</loc>
            <lastmod>{{ $berita->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
            @if($berita->foto_url)
            <image:image>
                <image:loc>{{ asset('storage/' . $berita->foto_url) }}</image:loc>
                <image:title>{{ htmlspecialchars($berita->judul) }}</image:title>
            </image:image>
            @endif
        </url>
    @endforeach

    <!-- Wisata -->
    @foreach ($wisatas as $wisata)
        <url>
            <loc>{{ url('/wisata/' . $wisata->id) }}</loc>
            <lastmod>{{ $wisata->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
            @if($wisata->foto_url)
            <image:image>
                <image:loc>{{ asset('storage/' . $wisata->foto_url) }}</image:loc>
                <image:title>{{ htmlspecialchars($wisata->nama) }}</image:title>
            </image:image>
            @endif
        </url>
    @endforeach

    <!-- Paket Wisata -->
    @foreach ($paketWisatas as $paket)
        <url>
            <loc>{{ url('/paket-wisata/' . $paket->id) }}</loc>
            <lastmod>{{ $paket->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
            @if($paket->gambar)
            <image:image>
                <image:loc>{{ asset('storage/' . $paket->gambar) }}</image:loc>
                <image:title>{{ htmlspecialchars($paket->nama) }}</image:title>
            </image:image>
            @endif
        </url>
    @endforeach

    <!-- UMKM -->
    @foreach ($umkms as $umkm)
        <url>
            <loc>{{ url('/umkm/' . $umkm->id) }}</loc>
            <lastmod>{{ $umkm->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
            @if($umkm->foto_url)
            <image:image>
                <image:loc>{{ asset('storage/' . $umkm->foto_url) }}</image:loc>
                <image:title>{{ htmlspecialchars($umkm->nama_produk) }}</image:title>
            </image:image>
            @endif
        </url>
    @endforeach
</urlset>
