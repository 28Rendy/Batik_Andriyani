@extends('frontend.layouts.app')

@section('title', 'Berita & Artikel Batik - ' . \App\Models\SiteSetting::getSetting('nama_toko', 'Aruna Batik Nusantara'))

@section('content')
<div class="page-header-banner">
    <div class="container">
        <h1 class="display-5 fw-bold font-serif mb-2">Berita & Edukasi Batik</h1>
        <p class="lead mb-0 text-white-50">Wawasan seputar ragam motif, tips merawat batik, dan kabar terbaru kami</p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-5">
        <!-- Main Content -->
        <div class="col-lg-8">
            <div class="row g-4">
                @forelse ($berita as $b)
                    <div class="col-md-6" data-aos="fade-up">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                            <div style="height: 220px; overflow: hidden;">
                                @if ($b->image)
                                    <img src="{{ asset('photos/' . $b->image) }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $b->title }}">
                                @else
                                    <div class="w-100 h-100 bg-secondary d-flex align-items-center justify-content-center text-white">
                                        <i class="fas fa-newspaper fa-3x"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body p-4 d-flex flex-column">
                                <span class="small text-muted mb-2">
                                    <i class="fas fa-calendar-alt me-1"></i> {{ $b->published_at ? $b->published_at->format('d M Y') : $b->created_at->format('d M Y') }} &bull; Oleh: {{ $b->author }}
                                </span>
                                <h5 class="fw-bold mb-2">
                                    <a href="{{ route('frontend.berita.detail', $b->id) }}" class="text-dark text-decoration-none">
                                        {{ $b->title }}
                                    </a>
                                </h5>
                                <p class="text-muted small mb-4">{{ Str::limit(strip_tags($b->content), 100) }}</p>
                                <a href="{{ route('frontend.berita.detail', $b->id) }}" class="mt-auto fw-bold text-decoration-none text-primary small">
                                    Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Belum ada artikel berita yang dipublikasikan.</p>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $berita->links() }}
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
                <h5 class="font-serif fw-bold mb-3">Cari Berita</h5>
                <form action="{{ route('frontend.berita') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control rounded-start-pill" placeholder="Kata kunci..." value="{{ $q }}">
                        <button class="btn btn-warning rounded-end-pill px-3" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <h5 class="font-serif fw-bold mb-3">Artikel Terbaru</h5>
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

