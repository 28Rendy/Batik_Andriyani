@extends('frontend.layouts.app')

@section('title', $produk->nama_produk . ' - ' . \App\Models\SiteSetting::getSetting('nama_toko', 'Batik Andriyani'))

@section('content')
<div class="container py-5" style="margin-top: 80px;">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('frontend.produk') }}" class="text-decoration-none">Katalog Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $produk->nama_produk }}</li>
        </ol>
    </nav>

    <div class="row g-5">
        <!-- Foto Produk -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white p-2">
                <div style="min-height: 400px; max-height: 520px; overflow: hidden;" class="rounded-3">
                    @if ($produk->foto)
                        <img src="{{ asset('photos/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}" class="w-100 h-100" style="object-fit: cover;">
                    @else
                        <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center text-muted" style="min-height: 380px;">
                            <i class="fas fa-image fa-4x"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Rincian Produk & Aksi Beli -->
        <div class="col-lg-6">
            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill font-weight-bold mb-2">
                {{ $sumber == 'setengah_jadi' ? 'Kain Setengah Jadi' : 'Batik Produksi Sendiri' }}
            </span>
            <h1 class="font-serif fw-bold display-6 mb-3">{{ $produk->nama_produk }}</h1>
            <h3 class="fw-bold text-primary mb-4">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h3>

            <div class="card bg-white border-0 shadow-sm p-4 rounded-4 mb-4">
                <h6 class="font-weight-bold mb-3 border-bottom pb-2">Spesifikasi Produk</h6>
                <div class="row g-3 small">
                    <div class="col-6">
                        <span class="text-muted d-block">Kode Produk:</span>
                        <strong>{{ $produk->kode_produk ?? '-' }}</strong>
                    </div>
                    <div class="col-6">
                        <span class="text-muted d-block">Motif Batik:</span>
                        <strong>{{ $produk->motif->nama_motif ?? '-' }}</strong>
                    </div>
                    <div class="col-6">
                        <span class="text-muted d-block">Jenis Kain:</span>
                        <strong>{{ $produk->JenisKain->nama_jenis_kain ?? '-' }}</strong>
                    </div>
                    <div class="col-6">
                        <span class="text-muted d-block">Ukuran / Dimensi:</span>
                        <strong>{{ $produk->ukuran->nama_ukuran ?? '-' }}</strong>
                    </div>
                    <div class="col-6">
                        <span class="text-muted d-block">Ketersediaan Stok:</span>
                        @if ($produk->stok > 0)
                            <span class="badge bg-success">Tersedia ({{ $produk->stok }} pcs)</span>
                        @else
                            <span class="badge bg-danger">Habis</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Tombol Beli / Pesan -->
            <div class="d-grid gap-3">
                @if ($produk->stok > 0)
                    <!-- Tombol Pesan Online Langsung di Sistem -->
                    <button type="button" class="btn btn-warning btn-lg rounded-pill fw-bold py-3 shadow" data-bs-toggle="modal" data-bs-target="#orderModal">
                        <i class="fas fa-shopping-bag me-2"></i> Pesan Produk Ini Sekarang
                    </button>
                @else
                    <button class="btn btn-secondary btn-lg rounded-pill fw-bold py-3" disabled>
                        Stok Produk Sedang Habis
                    </button>
                @endif

                <!-- Tombol Tanya via WhatsApp -->
                @php
                    $pesanWa = "Halo Batik Andriyani, saya ingin bertanya tentang produk: " . $produk->nama_produk . " (Rp " . number_format($produk->harga, 0, ',', '.') . ")";
                @endphp
                <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode($pesanWa) }}" target="_blank" class="btn btn-outline-success btn-lg rounded-pill fw-bold py-3">
                    <i class="bi bi-whatsapp me-2"></i> Tanya Produk via WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Form Checkout Pesanan -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title font-serif fw-bold" id="orderModalLabel">Form Pemesanan Batik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                @guest
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-1"></i> Anda belum login. Silakan <strong><a href="{{ route('login') }}" class="alert-link">Masuk</a></strong> atau <strong><a href="{{ route('register.pelanggan') }}" class="alert-link">Daftar Akun Pelanggan</a></strong> terlebih dahulu untuk melacak riwayat pesanan Anda.
                    </div>
                @endguest

                <form action="{{ route('frontend.checkout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                    <input type="hidden" name="sumber_produk" value="{{ $sumber }}">
                    <input type="hidden" name="nama_produk" value="{{ $produk->nama_produk }}">
                    <input type="hidden" name="harga_satuan" id="hargaSatuan" value="{{ $produk->harga }}">

                    <div class="mb-3">
                        <label class="form-label small font-weight-bold">Produk</label>
                        <input type="text" class="form-control bg-light" value="{{ $produk->nama_produk }}" readonly>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label small font-weight-bold">Jumlah Pesanan</label>
                            <input type="number" name="jumlah" id="inputJumlah" class="form-control" value="1" min="1" max="{{ $produk->stok }}" required onchange="hitungTotal()">
                        </div>
                        <div class="col-6">
                            <label class="form-label small font-weight-bold">Total Harga</label>
                            <input type="text" id="totalPreview" class="form-control fw-bold text-primary bg-light" value="Rp {{ number_format($produk->harga, 0, ',', '.') }}" readonly>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small font-weight-bold">Nomor WhatsApp Penerima *</label>
                        <input type="text" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx" value="{{ Auth::user()->phone ?? '' }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small font-weight-bold">Alamat Pengiriman Lengkap *</label>
                        <textarea name="alamat_pengiriman" rows="3" class="form-control" placeholder="Alamat jalan, kelurahan, kecamatan, kota, kode pos" required>{{ Auth::user()->address ?? '' }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small font-weight-bold">Catatan Khusus (Opsional)</label>
                        <textarea name="catatan" rows="2" class="form-control" placeholder="Ukuran khusus, permintaan warna, atau instruksi pengiriman"></textarea>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 rounded-pill fw-bold py-3 shadow">
                        Konfirmasi & Buat Pesanan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function hitungTotal() {
        var harga = parseInt(document.getElementById('hargaSatuan').value) || 0;
        var jumlah = parseInt(document.getElementById('inputJumlah').value) || 1;
        var total = harga * jumlah;
        document.getElementById('totalPreview').value = 'Rp ' + total.toLocaleString('id-ID');
    }
</script>
@endsection
