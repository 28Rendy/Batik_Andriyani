@extends('frontend.layouts.app')

@section('title', \App\Models\SiteSetting::getSetting('nama_toko', 'Batik Andriyani') . ' - Beranda')

@section('content')
<!-- Hero Carousel Dinamis -->
<section id="hero-slider" class="position-relative" style="margin-top: 72px;">
    <div id="mainCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($sliders as $key => $slide)
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @forelse ($sliders as $key => $slide)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="min-height: 520px; max-height: 600px; background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.65)), url('{{ asset($slide->gambar) }}') center/cover no-repeat;">
                    <div class="container h-100 d-flex align-items-center" style="min-height: 520px;">
                        <div class="col-lg-8 text-white py-5" data-aos="fade-up">
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill font-weight-bold mb-3 text-uppercase">Batik Tulis Premium</span>
                            <h1 class="display-4 fw-bold font-serif mb-3">{{ $slide->judul }}</h1>
                            <p class="lead mb-4" style="max-width: 650px;">{{ $slide->deskripsi }}</p>
                            <div class="d-flex gap-3">
                                <a href="{{ route('frontend.produk') }}" class="btn btn-warning btn-lg px-4 rounded-pill font-weight-bold shadow">
                                    <i class="fas fa-shopping-bag me-2"></i> Lihat Katalog
                                </a>
                                <a href="{{ route('frontend.tentang') }}" class="btn btn-outline-light btn-lg px-4 rounded-pill">
                                    Tentang Kami
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="carousel-item active" style="min-height: 480px; background: #5d4037;">
                    <div class="container h-100 d-flex align-items-center" style="min-height: 480px;">
                        <div class="col-lg-8 text-white py-5">
                            <h1 class="display-4 fw-bold font-serif">{{ \App\Models\SiteSetting::getSetting('nama_toko', 'Batik Andriyani') }}</h1>
                            <p class="lead">{{ \App\Models\SiteSetting::getSetting('tagline', 'Batik Tulis Khas Nusantara') }}</p>
                            <a href="{{ route('frontend.produk') }}" class="btn btn-warning btn-lg px-4 rounded-pill">Lihat Produk</a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Berikutnya</span>
        </button>
    </div>
</section>

<!-- Fitur & Keunggulan -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row g-4 text-center">
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                <div class="p-3">
                    <div class="d-inline-flex p-3 rounded-circle bg-light text-primary mb-3 shadow-sm">
                        <i class="fas fa-feather-alt fs-2 text-warning"></i>
                    </div>
                    <h5 class="fw-bold">100% Batik Tulis Asli</h5>
                    <p class="small text-muted mb-0">Dikerjakan langsung oleh pengrajin batik terampil & berpengalaman.</p>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="p-3">
                    <div class="d-inline-flex p-3 rounded-circle bg-light text-primary mb-3 shadow-sm">
                        <i class="fas fa-certificate fs-2 text-warning"></i>
                    </div>
                    <h5 class="fw-bold">Bahan Mori Premium</h5>
                    <p class="small text-muted mb-0">Kain mori halus, nyaman dipakai, awet dan tidak mudah pudar.</p>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="p-3">
                    <div class="d-inline-flex p-3 rounded-circle bg-light text-primary mb-3 shadow-sm">
                        <i class="fas fa-palette fs-2 text-warning"></i>
                    </div>
                    <h5 class="fw-bold">Bisa Pesan Custom</h5>
                    <p class="small text-muted mb-0">Melayani pesanan seragam batik custom motif dan logo instansi.</p>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="400">
                <div class="p-3">
                    <div class="d-inline-flex p-3 rounded-circle bg-light text-primary mb-3 shadow-sm">
                        <i class="fas fa-shipping-fast fs-2 text-warning"></i>
                    </div>
                    <h5 class="fw-bold">Kirim Seluruh RI</h5>
                    <p class="small text-muted mb-0">Pengemasan aman, rapi dan bergaransi sampai ke alamat Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Produk Unggulan -->
<section class="py-5" style="background-color: #f7f4ef;">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <span class="text-uppercase text-warning fw-bold small">Koleksi Pilihan</span>
                <h2 class="font-serif fw-bold mb-0">Produk Batik Unggulan</h2>
            </div>
            <a href="{{ route('frontend.produk') }}" class="btn btn-outline-dark rounded-pill px-4">
                Lihat Semua Produk <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse ($produkUnggulan as $p)
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="card card-product h-100">
                        <div style="height: 260px; overflow: hidden; position: relative;">
                            @if ($p->foto)
                                <img src="{{ asset('photos/' . $p->foto) }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $p->nama_produk }}">
                            @else
                                <div class="w-100 h-100 bg-secondary d-flex align-items-center justify-content-center text-white">
                                    <i class="fas fa-image fa-3x"></i>
                                </div>
                            @endif
                            <span class="badge bg-dark position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill">
                                Stok: {{ $p->stok }}
                            </span>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="small text-muted mb-1">{{ $p->motif->nama_motif ?? 'Motif Nusantara' }} &bull; {{ $p->ukuran->nama_ukuran ?? 'All Size' }}</span>
                            <h5 class="fw-bold mb-2">{{ $p->nama_produk }}</h5>
                            <div class="mt-auto pt-3 d-flex justify-content-between align-items-center border-top">
                                <div>
                                    <span class="small text-muted d-block">Harga</span>
                                    <span class="fs-5 fw-bold text-dark">Rp {{ number_format($p->harga, 0, ',', '.') }}</span>
                                </div>
                                <a href="{{ route('frontend.produk.detail', ['kategori' => 'produksi_sendiri', 'id' => $p->id]) }}" class="btn btn-warning px-3 rounded-pill fw-bold">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada produk unggulan yang ditampilkan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Galeri Preview -->
@if ($galeri->isNotEmpty())
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="text-uppercase text-warning fw-bold small">Karya & Dokumentasi</span>
            <h2 class="font-serif fw-bold">Galeri Batik Andriyani</h2>
            <p class="text-muted">Potret proses pembuatan, motif, dan koleksi istimewa kami</p>
        </div>

        <div class="row g-3">
            @foreach ($galeri as $item)
                <div class="col-md-4 col-6" data-aos="zoom-in">
                    <div class="rounded-3 overflow-hidden shadow-sm position-relative" style="height: 220px;">
                        <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" class="w-100 h-100" style="object-fit: cover;">
                        <div class="position-absolute bottom-0 start-0 end-0 p-3 text-white" style="background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                            <h6 class="mb-0 fw-bold">{{ $item->judul }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('frontend.galeri') }}" class="btn btn-outline-dark rounded-pill px-4">
                Buka Galeri Lengkap <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Berita & Edukasi Batik Terbaru -->
@if ($beritaTerbaru->isNotEmpty())
<section class="py-5" style="background-color: #f7f4ef;">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <span class="text-uppercase text-warning fw-bold small">Artikel & Informasi</span>
                <h2 class="font-serif fw-bold mb-0">Berita & Edukasi Batik</h2>
            </div>
            <a href="{{ route('frontend.berita') }}" class="btn btn-outline-dark rounded-pill px-4">
                Semua Berita <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            @foreach ($beritaTerbaru as $b)
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden bg-white">
                        <div style="height: 200px; overflow: hidden;">
                            @if ($b->image)
                                <img src="{{ asset('photos/' . $b->image) }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $b->title }}">
                            @else
                                <div class="w-100 h-100 bg-secondary d-flex align-items-center justify-content-center text-white">
                                    <i class="fas fa-newspaper fa-3x"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="small text-muted mb-2"><i class="fas fa-calendar-alt me-1"></i> {{ $b->published_at ? $b->published_at->format('d M Y') : $b->created_at->format('d M Y') }}</span>
                            <h5 class="fw-bold mb-2">
                                <a href="{{ route('frontend.berita.detail', $b->id) }}" class="text-dark text-decoration-none">
                                    {{ Str::limit($b->title, 55) }}
                                </a>
                            </h5>
                            <p class="text-muted small mb-4">{{ Str::limit(strip_tags($b->content), 90) }}</p>
                            <a href="{{ route('frontend.berita.detail', $b->id) }}" class="mt-auto fw-bold text-decoration-none text-primary small">
                                Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Pertanyaan Sering Diajukan (FAQ Preview) -->
@if ($faqs->isNotEmpty())
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="text-uppercase text-warning fw-bold small">Pusat Bantuan</span>
            <h2 class="font-serif fw-bold">Pertanyaan yang Sering Diajukan (FAQ)</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion shadow-sm rounded-3 overflow-hidden" id="accordionFaq">
                    @foreach ($faqs as $key => $f)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $key }}">
                                <button class="accordion-button {{ $key != 0 ? 'collapsed' : '' }} fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="{{ $key == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $key }}">
                                    {{ $f->pertanyaan }}
                                </button>
                            </h2>
                            <div id="collapse{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $key }}" data-bs-parent="#accordionFaq">
                                <div class="accordion-body text-muted">
                                    {{ $f->jawaban }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Banner CTA WhatsApp -->
<section class="py-5 text-white text-center" style="background: linear-gradient(135deg, #4e342e, #2b211b);">
    <div class="container py-3">
        <h2 class="font-serif fw-bold mb-3">Ingin Berkonsultasi atau Memesan Motif Batik Khusus?</h2>
        <p class="lead mb-4 mx-auto" style="max-width: 600px;">Kami melayani pesanan batik tulis seragam kantor, keluarga, acara pernikahan, maupun koleksi pribadi.</p>
        @php $wa = \App\Models\SiteSetting::getSetting('whatsapp', '628123456789'); @endphp
        <a href="https://wa.me/{{ $wa }}?text=Halo%20Batik%20Andriyani,%20saya%20ingin%20konsultasi%20pesanan%20batik." target="_blank" class="btn btn-success btn-lg rounded-pill px-5 fw-bold shadow">
            <i class="bi bi-whatsapp me-2"></i> Hubungi Kami via WhatsApp
        </a>
    </div>
</section>

@endsection
