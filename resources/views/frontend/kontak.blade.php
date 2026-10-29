@extends('frontend.layouts.app')

@section('title', 'Kontak & FAQ - ' . \App\Models\SiteSetting::getSetting('nama_toko', 'Batik Andriyani'))

@section('content')
<div class="page-header-banner">
    <div class="container">
        <h1 class="display-5 fw-bold font-serif mb-2">Hubungi Kami & Pusat Bantuan</h1>
        <p class="lead mb-0 text-white-50">Kami siap melayani kebutuhan batik tulis Anda dengan senang hati</p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-5">
        <!-- Informasi Kontak Langsung -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white h-100">
                <span class="text-uppercase text-warning fw-bold small">Informasi Toko</span>
                <h3 class="font-serif fw-bold mb-4">Informasi Kontak</h3>

                <div class="d-flex mb-4">
                    <div class="me-3 p-3 rounded-circle bg-light text-primary" style="height: fit-content;">
                        <i class="fas fa-map-marked-alt fs-4 text-warning"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Alamat Galeri Batik</h6>
                        <p class="text-muted small mb-0">{{ \App\Models\SiteSetting::getSetting('alamat', 'Indonesia') }}</p>
                    </div>
                </div>

                <div class="d-flex mb-4">
                    <div class="me-3 p-3 rounded-circle bg-light text-primary" style="height: fit-content;">
                        <i class="fab fa-whatsapp fs-4 text-success"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">WhatsApp Customer Service</h6>
                        @php $wa = \App\Models\SiteSetting::getSetting('whatsapp', '628123456789'); @endphp
                        <p class="text-muted small mb-1">+{{ $wa }}</p>
                        <a href="https://wa.me/{{ $wa }}" target="_blank" class="btn btn-sm btn-outline-success rounded-pill px-3">
                            <i class="fab fa-whatsapp me-1"></i> Mulai Chat WhatsApp
                        </a>
                    </div>
                </div>

                <div class="d-flex mb-4">
                    <div class="me-3 p-3 rounded-circle bg-light text-primary" style="height: fit-content;">
                        <i class="fas fa-envelope-open-text fs-4 text-danger"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Email Resmi</h6>
                        <p class="text-muted small mb-0">{{ \App\Models\SiteSetting::getSetting('email', 'info@batikandriyani.com') }}</p>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="me-3 p-3 rounded-circle bg-light text-primary" style="height: fit-content;">
                        <i class="fas fa-clock fs-4 text-info"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Jam Operasional Toko</h6>
                        <p class="text-muted small mb-0">{{ \App\Models\SiteSetting::getSetting('jam_buka', 'Senin–Sabtu: 08.00–17.00 WIB') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Interaktif -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white h-100">
                <span class="text-uppercase text-warning fw-bold small">Tanya Jawab</span>
                <h3 class="font-serif fw-bold mb-4">Frequently Asked Questions (FAQ)</h3>

                <div class="accordion" id="accordionFaqPage">
                    @forelse ($faqs as $key => $f)
                        <div class="accordion-item border rounded-3 mb-3 overflow-hidden">
                            <h2 class="accordion-header" id="headingPage{{ $key }}">
                                <button class="accordion-button {{ $key != 0 ? 'collapsed' : '' }} fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePage{{ $key }}" aria-expanded="{{ $key == 0 ? 'true' : 'false' }}">
                                    {{ $f->pertanyaan }}
                                </button>
                            </h2>
                            <div id="collapsePage{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" data-bs-parent="#accordionFaqPage">
                                <div class="accordion-body text-muted">
                                    {{ $f->jawaban }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada pertanyaan FAQ yang ditambahkan.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
