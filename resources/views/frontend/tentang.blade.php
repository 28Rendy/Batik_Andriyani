@extends('frontend.layouts.app')

@section('title', 'Tentang Kami - ' . \App\Models\SiteSetting::getSetting('nama_toko', 'Batik Andriyani'))

@section('content')
<div class="page-header-banner">
    <div class="container">
        <h1 class="display-5 fw-bold font-serif mb-2">{{ \App\Models\SiteSetting::getSetting('tentang_judul', 'Tentang Batik Andriyani') }}</h1>
        <p class="lead mb-0 text-white-50">Menjaga warisan luhur budaya nusantara lewat tiap helai kain batik tulis autentik</p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-5 align-items-center mb-5">
        <div class="col-lg-6" data-aos="fade-right">
            <span class="text-uppercase section-subtitle d-block mb-1">Cerita & Identitas Kami</span>
            <h2 class="font-serif fw-bold display-6 mb-4">{{ \App\Models\SiteSetting::getSetting('nama_toko', 'Batik Andriyani') }}</h2>
            <div class="text-secondary lh-lg mb-4" style="font-size: 16px;">
                {!! nl2br(e(\App\Models\SiteSetting::getSetting('tentang_isi', \App\Models\SiteSetting::getSetting('deskripsi_toko')))) !!}
            </div>
            <div class="d-flex gap-3">
                <a href="{{ route('frontend.produk') }}" class="btn btn-warning rounded-pill px-4 fw-bold">
                    <i class="fas fa-shopping-bag me-1"></i> Jelajahi Produk
                </a>
                <a href="{{ route('frontend.kontak') }}" class="btn btn-outline-dark rounded-pill px-4">
                    Hubungi Kami
                </a>
            </div>
        </div>

        <div class="col-lg-6" data-aos="fade-left">
            <div class="card border-0 shadow rounded-4 overflow-hidden p-2 bg-white">
                <img src="{{ asset('asset/img/slide2.jpg') }}" alt="Tentang Batik" class="rounded-3 w-100" style="max-height: 420px; object-fit: cover;">
            </div>
        </div>
    </div>

    <!-- Visi & Misi -->
    <div class="row g-4 mt-4">
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                <div class="d-inline-flex p-3 rounded-circle bg-light mb-3" style="width: fit-content;">
                    <i class="fas fa-eye fs-2 text-warning"></i>
                </div>
                <h4 class="font-serif fw-bold mb-3">Visi Kami</h4>
                <p class="text-secondary lh-base mb-0">
                    {{ \App\Models\SiteSetting::getSetting('visi', 'Menjadi produsen batik tulis terpercaya yang melestarikan budaya nusantara.') }}
                </p>
            </div>
        </div>

        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                <div class="d-inline-flex p-3 rounded-circle bg-light mb-3" style="width: fit-content;">
                    <i class="fas fa-bullseye fs-2 text-warning"></i>
                </div>
                <h4 class="font-serif fw-bold mb-3">Misi Kami</h4>
                <div class="text-secondary lh-base mb-0">
                    {!! nl2br(e(\App\Models\SiteSetting::getSetting('misi', '1. Menghasilkan batik berkualitas tinggi\n2. Melestarikan motif tradisional'))) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

