@extends('frontend.layouts.app')

@section('title', 'Katalog Batik - ' . \App\Models\SiteSetting::getSetting('nama_toko', 'Batik Andriyani'))

@section('content')
<div class="page-header-banner">
    <div class="container">
        <h1 class="display-5 fw-bold font-serif mb-2">Katalog Batik Tulis</h1>
        <p class="lead mb-0 text-white-50">Temukan ragam motif kain batik tulis asli dan bahan setengah jadi pilihan</p>
    </div>
</div>

<div class="container py-5">
    <!-- Filter Kategori & Pencarian -->
    <div class="row align-items-center mb-5 g-3">
        <div class="col-md-7">
            <div class="btn-group" role="group">
                <a href="{{ route('frontend.produk', ['kategori' => 'semua', 'q' => $q]) }}" class="btn {{ $kategori == 'semua' ? 'btn-dark' : 'btn-outline-dark' }} px-4 py-2 rounded-start-pill">
                    Semua Koleksi
                </a>
                <a href="{{ route('frontend.produk', ['kategori' => 'produksi_sendiri', 'q' => $q]) }}" class="btn {{ $kategori == 'produksi_sendiri' ? 'btn-dark' : 'btn-outline-dark' }} px-4 py-2">
                    Batik Jadi (Produksi Sendiri)
                </a>
                <a href="{{ route('frontend.produk', ['kategori' => 'setengah_jadi', 'q' => $q]) }}" class="btn {{ $kategori == 'setengah_jadi' ? 'btn-dark' : 'btn-outline-dark' }} px-4 py-2 rounded-end-pill">
                    Kain Setengah Jadi
                </a>
            </div>
        </div>
        <div class="col-md-5">
            <form action="{{ route('frontend.produk') }}" method="GET" class="d-flex">
                <input type="hidden" name="kategori" value="{{ $kategori }}">
                <input type="text" name="q" class="form-control rounded-start-pill border-end-0 px-3" placeholder="Cari nama batik atau motif..." value="{{ $q }}">
                <button type="submit" class="btn btn-warning rounded-end-pill px-4">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Koleksi Produksi Sendiri -->
    @if ($produkSendiri->isNotEmpty())
        <div class="mb-5">
            @if ($kategori == 'semua')
                <div class="d-flex align-items-center mb-4">
                    <h3 class="font-serif fw-bold mb-0">Batik Siap Pakai (Produksi Sendiri)</h3>
                    <div class="flex-grow-1 ms-3 border-bottom"></div>
                </div>
            @endif

            <div class="row g-4">
                @foreach ($produkSendiri as $p)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card card-product h-100">
                            <div style="height: 220px; overflow: hidden; position: relative;">
                                @if ($p->foto)
                                    <img src="{{ asset('photos/' . $p->foto) }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $p->nama_produk }}">
                                @else
                                    <div class="w-100 h-100 bg-secondary d-flex align-items-center justify-content-center text-white">
                                        <i class="fas fa-image fa-2x"></i>
                                    </div>
                                @endif
                                <span class="badge bg-dark position-absolute top-0 end-0 m-2 px-2 py-1 rounded-pill small">
                                    Stok: {{ $p->stok }}
                                </span>
                            </div>
                            <div class="card-body p-3 d-flex flex-column">
                                <span class="small text-muted mb-1">{{ $p->motif->nama_motif ?? 'Motif Tradisional' }}</span>
                                <h6 class="fw-bold mb-2 text-truncate" title="{{ $p->nama_produk }}">{{ $p->nama_produk }}</h6>
                                <p class="small text-muted mb-2">{{ $p->ukuran->nama_ukuran ?? '-' }} &bull; {{ $p->JenisKain->nama_jenis_kain ?? '-' }}</p>
                                <div class="mt-auto pt-2 d-flex justify-content-between align-items-center border-top">
                                    <span class="fw-bold text-dark">Rp {{ number_format($p->harga, 0, ',', '.') }}</span>
                                    <a href="{{ route('frontend.produk.detail', ['kategori' => 'produksi_sendiri', 'id' => $p->id]) }}" class="btn btn-sm btn-outline-dark rounded-pill px-3">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Koleksi Setengah Jadi -->
    @if ($produkSetengah->isNotEmpty())
        <div class="mb-5">
            @if ($kategori == 'semua')
                <div class="d-flex align-items-center mb-4 mt-5">
                    <h3 class="font-serif fw-bold mb-0">Bahan Kain Batik Setengah Jadi</h3>
                    <div class="flex-grow-1 ms-3 border-bottom"></div>
                </div>
            @endif

            <div class="row g-4">
                @foreach ($produkSetengah as $p)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card card-product h-100">
                            <div style="height: 220px; overflow: hidden; position: relative;">
                                @if ($p->foto)
                                    <img src="{{ asset('photos/' . $p->foto) }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $p->nama_produk }}">
                                @else
                                    <div class="w-100 h-100 bg-secondary d-flex align-items-center justify-content-center text-white">
                                        <i class="fas fa-image fa-2x"></i>
                                    </div>
                                @endif
                                <span class="badge bg-dark position-absolute top-0 end-0 m-2 px-2 py-1 rounded-pill small">
                                    Stok: {{ $p->stok }}
                                </span>
                            </div>
                            <div class="card-body p-3 d-flex flex-column">
                                <span class="small text-muted mb-1">{{ $p->motif->nama_motif ?? 'Motif Tradisional' }}</span>
                                <h6 class="fw-bold mb-2 text-truncate" title="{{ $p->nama_produk }}">{{ $p->nama_produk }}</h6>
                                <p class="small text-muted mb-2">{{ $p->ukuran->nama_ukuran ?? '-' }} &bull; {{ $p->JenisKain->nama_jenis_kain ?? '-' }}</p>
                                <div class="mt-auto pt-2 d-flex justify-content-between align-items-center border-top">
                                    <span class="fw-bold text-dark">Rp {{ number_format($p->harga, 0, ',', '.') }}</span>
                                    <a href="{{ route('frontend.produk.detail', ['kategori' => 'setengah_jadi', 'id' => $p->id]) }}" class="btn btn-sm btn-outline-dark rounded-pill px-3">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if ($produkSendiri->isEmpty() && $produkSetengah->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
            <h4>Tidak ada produk ditemukan</h4>
            <p class="text-muted">Coba ubah kata kunci pencarian atau pilih kategori lain.</p>
            <a href="{{ route('frontend.produk') }}" class="btn btn-outline-dark rounded-pill">Reset Pencarian</a>
        </div>
    @endif
</div>
@endsection
