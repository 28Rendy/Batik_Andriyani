@extends('pelanggan.layouts.app')

@section('title', 'Dashboard Pelanggan')

@section('content')
<div class="row g-4 mb-4">
    <!-- Stat Cards -->
    <div class="col-md-4">
        <div class="card card-custom p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small font-weight-bold d-block">TOTAL PESANAN</span>
                    <h2 class="fw-bold mb-0 mt-1">{{ $totalPesanan }}</h2>
                </div>
                <div class="p-3 bg-light rounded-circle text-primary">
                    <i class="fas fa-shopping-bag fs-3 text-secondary"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-custom p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small font-weight-bold d-block">SEDANG DIPROSES</span>
                    <h2 class="fw-bold mb-0 mt-1" style="color: #8c5200;">{{ $pesananDiproses }}</h2>
                </div>
                <div class="p-3 bg-light rounded-circle" style="color: #8c5200;">
                    <i class="fas fa-spinner fs-3"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-custom p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small font-weight-bold d-block">SELESAI / DITERIMA</span>
                    <h2 class="fw-bold mb-0 mt-1 text-success">{{ $pesananSelesai }}</h2>
                </div>
                <div class="p-3 bg-light rounded-circle text-success">
                    <i class="fas fa-check-double fs-3"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pesanan Terbaru -->
<div class="card card-custom p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold mb-0 font-serif">Pesanan Terbaru Anda</h5>
        <a href="{{ route('pelanggan.pesanan') }}" class="btn btn-sm btn-outline-dark rounded-pill px-3">
            Lihat Semua Pesanan
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No. Order</th>
                    <th>Tanggal</th>
                    <th>Produk</th>
                    <th>Total</th>
                    <th>Status Pesanan</th>
                    <th>Pengiriman</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pesananTerbaru as $p)
                    <tr>
                        <td class="fw-bold">#ORD-{{ str_pad($p->id, 5, '0', STR_PAD_LEFT) }}</td>
                        <td class="small text-muted">{{ $p->created_at->format('d/m/Y') }}</td>
                        <td>{{ $p->nama_produk }} ({{ $p->jumlah }} pcs)</td>
                        <td class="fw-bold">Rp {{ number_format($p->total, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge bg-{{ $p->statusBadgeClass() }} {{ $p->status_pesanan == 'pending' ? 'text-dark' : '' }} px-2 py-1 font-weight-bold">
                                {{ strtoupper($p->status_pesanan) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-{{ $p->pengirimanBadgeClass() }} px-2 py-1">
                                {{ strtoupper($p->status_pengiriman) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('pelanggan.pesanan.detail', $p->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                Rincian
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="fas fa-box-open fa-3x mb-3 text-secondary"></i>
                            <p class="mb-2">Anda belum memiliki riwayat pesanan.</p>
                            <a href="{{ route('frontend.produk') }}" class="btn btn-warning rounded-pill px-4 btn-sm fw-bold">
                                Mulai Belanja Sekarang
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

