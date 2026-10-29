@extends('frontend.layouts.app')

@section('title', 'Galeri Foto - ' . \App\Models\SiteSetting::getSetting('nama_toko', 'Batik Andriyani'))

@section('content')
<div class="page-header-banner">
    <div class="container">
        <h1 class="display-5 fw-bold font-serif mb-2">Galeri Karya & Dokumentasi</h1>
        <p class="lead mb-0 text-white-50">Menyaksikan seni batik tulis dari proses membatik hingga hasil karya adiluhung</p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4">
        @forelse ($galeri as $item)
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 bg-white">
                    <div style="height: 250px; overflow: hidden; position: relative;">
                        <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    </div>
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-2">{{ $item->judul }}</h5>
                        @if ($item->deskripsi)
                            <p class="text-muted small mb-0">{{ $item->deskripsi }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-images fa-4x text-muted mb-3"></i>
                <h4 class="text-muted">Galeri foto belum tersedia</h4>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $galeri->links() }}
    </div>
</div>
@endsection

