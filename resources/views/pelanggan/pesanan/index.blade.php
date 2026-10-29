@extends('pelanggan.layouts.app')

@section('title', 'Riwayat Pesanan Saya')

@section('content')
<div class="card card-custom p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1 font-serif">Riwayat Pesanan Saya</h4>
            <p class="text-muted small mb-0">Pantau proses pengerjaan dan status pengiriman produk batik Anda</p>
        </div>
        <a href="{{ route('frontend.produk') }}" class="btn btn-warning rounded-pill px-4 btn-sm fw-bold">
            <i class="fas fa-plus me-1"></i> Pesan Produk Lain
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No. Order</th>
                    <th>Tanggal</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Total Belanja</th>
                    <th>Status Pesanan</th>
                    <th>Status Pengiriman</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pesanan as $p)
                    <tr>
                        <td class="fw-bold">#ORD-{{ str_pad($p->id, 5, '0', STR_PAD_LEFT) }}</td>
                        <td class="small text-muted">{{ $p->created_at->format('d M Y, H:i') }}</td>
                        <td class="fw-bold">{{ $p->nama_produk }}</td>
                        <td class="text-center">{{ $p->jumlah }}</td>
                        <td class="fw-bold text-primary">Rp {{ number_format($p->total, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge bg-{{ $p->statusBadgeClass() }} px-3 py-2 rounded-pill">
                                {{ strtoupper($p->status_pesanan) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-{{ $p->pengirimanBadgeClass() }} px-3 py-2 rounded-pill">
                                {{ strtoupper($p->status_pengiriman) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('pelanggan.pesanan.detail', $p->id) }}" class="btn btn-sm btn-outline-dark rounded-pill px-3">
                                <i class="fas fa-eye me-1"></i> Rincian
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="fas fa-shopping-bag fa-3x mb-3 text-secondary"></i>
                            <p class="mb-2">Belum ada riwayat pesanan.</p>
                            <a href="{{ route('frontend.produk') }}" class="btn btn-warning rounded-pill px-4 btn-sm fw-bold">
                                Jelajahi Katalog Batik
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $pesanan->links() }}
    </div>
</div>
@endsection
