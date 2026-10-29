@extends('frontend.layouts.app')

@section('title', $berita->title . ' - ' . \App\Models\SiteSetting::getSetting('nama_toko', 'Batik Andriyani'))

@section('content')
<div class="container py-5" style="margin-top: 80px;">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('frontend.berita') }}" class="text-decoration-none">Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($berita->title, 40) }}</li>
        </ol>
    </nav>

    <div class="row g-5">
        <div class="col-lg-8">
            <article class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill font-weight-bold d-inline-block mb-3" style="width: fit-content;">Artikel & Wawasan</span>
                <h1 class="font-serif fw-bold display-6 mb-3">{{ $berita->title }}</h1>
                <div class="d-flex align-items-center text-muted small mb-4 border-bottom pb-3">
                    <span class="me-3"><i class="fas fa-user-edit me-1"></i> {{ $berita->author }}</span>
                    <span><i class="fas fa-calendar-alt me-1"></i> {{ $berita->published_at ? $berita->published_at->format('d F Y') : $berita->created_at->format('d F Y') }}</span>
                </div>

                @if ($berita->image)
                    <div class="rounded-3 overflow-hidden mb-4 shadow-sm" style="max-height: 420px;">
                        <img src="{{ asset('photos/' . $berita->image) }}" alt="{{ $berita->title }}" class="w-100" style="object-fit: cover;">
                    </div>
                @endif

                <div class="content lh-lg text-secondary" style="font-size: 17px;">
                    {!! nl2br(e($berita->content)) !!}
                </div>

                <hr class="my-5">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('frontend.berita') }}" class="btn btn-outline-dark rounded-pill px-4">
                        <i class="fas fa-arrow-left me-1"></i> Kembali ke Berita
                    </a>
                </div>
            </article>
        </div>

        <!-- Sidebar Artikel Lainnya -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white sticky-top" style="top: 100px;">
                <h5 class="font-serif fw-bold mb-3">Artikel Terkait</h5>
                <div class="d-flex flex-column gap-3">
                    @foreach ($recentBerita as $item)
                        <div class="d-flex gap-3 align-items-center">
                            <div style="width: 70px; height: 60px; flex-shrink: 0;" class="rounded-3 overflow-hidden bg-light">
                                @if ($item->image)
                                    <img src="{{ asset('photos/' . $item->image) }}" class="w-100 h-100" style="object-fit: cover;">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted"><i class="fas fa-image"></i></div>
                                @endif
                            </div>
                            <div>
                                <a href="{{ route('frontend.berita.detail', $item->id) }}" class="text-dark text-decoration-none small fw-bold d-block line-clamp-2">
                                    {{ Str::limit($item->title, 45) }}
                                </a>
                                <span class="text-muted" style="font-size: 11px;">{{ $item->published_at ? $item->published_at->format('d M Y') : '' }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
