@extends('pelanggan.layouts.app')

@section('title', 'Detail Pesanan #ORD-' . str_pad($pesanan->id, 5, '0', STR_PAD_LEFT))

@section('content')
<div class="mb-4">
    <a href="{{ route('pelanggan.pesanan') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
        <i class="fas fa-arrow-left me-1"></i> Kembali ke Riwayat Pesanan
    </a>
</div>

<div class="row g-4">
    <!-- Rincian Produk & Status -->
    <div class="col-lg-8">
        <!-- Status Timeline Pengiriman -->
        <div class="card card-custom p-4 mb-4">
            <h5 class="fw-bold font-serif mb-4">Status Pengiriman & Pesanan</h5>

            <div class="d-flex justify-content-between text-center position-relative mb-2">
                <!-- Step 1: Pesanan Dibuat -->
                <div class="d-flex flex-column align-items-center" style="width: 33.3%;">
                    <div class="p-3 rounded-circle {{ $pesanan->status_pesanan != 'dibatalkan' ? 'bg-success text-white' : 'bg-danger text-white' }} mb-2 shadow-sm" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas {{ $pesanan->status_pesanan == 'dibatalkan' ? 'fa-times' : 'fa-check' }}"></i>
                    </div>
                    <span class="small fw-bold">Pesanan Diterima</span>
                    <span class="text-muted" style="font-size: 11px;">{{ $pesanan->created_at->format('d/m/Y') }}</span>
                </div>

                <!-- Step 2: Pengiriman -->
                <div class="d-flex flex-column align-items-center" style="width: 33.3%;">
                    <div class="p-3 rounded-circle {{ in_array($pesanan->status_pengiriman, ['dikirim', 'diterima']) ? 'bg-success text-white' : 'bg-light text-muted' }} mb-2 shadow-sm" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-truck"></i>
                    </div>
                    <span class="small fw-bold">Dalam Pengiriman</span>
                    <span class="text-muted" style="font-size: 11px;">{{ $pesanan->status_pengiriman == 'dikirim' ? 'Sedang Dikirim' : ($pesanan->status_pengiriman == 'diterima' ? 'Terkirim' : 'Menunggu') }}</span>
                </div>

                <!-- Step 3: Selesai -->
                <div class="d-flex flex-column align-items-center" style="width: 33.3%;">
                    <div class="p-3 rounded-circle {{ $pesanan->status_pengiriman == 'diterima' || $pesanan->status_pesanan == 'selesai' ? 'bg-success text-white' : 'bg-light text-muted' }} mb-2 shadow-sm" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-home"></i>
                    </div>
                    <span class="small fw-bold">Pesanan Selesai</span>
                    <span class="text-muted" style="font-size: 11px;">{{ $pesanan->status_pengiriman == 'diterima' ? 'Diterima' : 'Belum Selesai' }}</span>
                </div>
            </div>
        </div>

        <!-- Tabel Rincian Produk -->
        <div class="card card-custom p-4">
            <h5 class="fw-bold font-serif mb-3">Rincian Item Dipesan</h5>
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Produk</th>
                            <th class="text-end">Harga Satuan</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold">{{ $pesanan->nama_produk }}</td>
                            <td class="text-end">Rp {{ number_format($pesanan->harga_satuan, 0, ',', '.') }}</td>
                            <td class="text-center">{{ $pesanan->jumlah }}</td>
                            <td class="text-end fw-bold">Rp {{ number_format($pesanan->total, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Total Pembayaran:</th>
                            <th class="text-end text-primary fs-5">Rp {{ number_format($pesanan->total, 0, ',', '.') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            @if ($pesanan->catatan)
                <div class="alert alert-light border mt-3 mb-0">
                    <strong class="small d-block mb-1">Catatan Anda:</strong>
                    <p class="small text-muted mb-0">{{ $pesanan->catatan }}</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Info Alamat & Bantuan -->
    <div class="col-lg-4">
        <div class="card card-custom p-4 mb-4">
            <h6 class="fw-bold font-serif mb-3">Alamat Pengiriman</h6>
            <p class="small text-muted mb-3"><i class="fas fa-map-marker-alt text-danger me-1"></i> {{ $pesanan->alamat_pengiriman }}</p>
            <p class="small text-muted mb-0"><i class="fas fa-phone text-success me-1"></i> {{ $pesanan->no_hp }}</p>
        </div>

        <div class="card card-custom p-4 text-center">
            <h6 class="fw-bold font-serif mb-2">Butuh Bantuan Pesanan?</h6>
            <p class="small text-muted mb-3">Hubungi tim customer service kami untuk konfirmasi atau pertanyaan pengiriman.</p>
            @php
                $wa = \App\Models\SiteSetting::getSetting('whatsapp', '628123456789');
                $pesanWa = "Halo Admin Batik Andriyani, saya ingin menanyakan status pesanan saya: #ORD-" . str_pad($pesanan->id, 5, '0', STR_PAD_LEFT);
            @endphp
            <a href="https://wa.me/{{ $wa }}?text={{ urlencode($pesanWa) }}" target="_blank" class="btn btn-success rounded-pill w-100 fw-bold">
                <i class="fab fa-whatsapp me-2"></i> Chat CS Toko
            </a>
        </div>
    </div>
</div>
@endsection
