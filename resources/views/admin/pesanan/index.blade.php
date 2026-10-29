@extends('layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Pesanan Pelanggan</h1>
        <div class="btn-group">
            <a href="{{ route('admin.pesanan.index') }}" class="btn btn-sm {{ !$status ? 'btn-primary' : 'btn-outline-primary' }}">Semua</a>
            <a href="{{ route('admin.pesanan.index', ['status' => 'pending']) }}" class="btn btn-sm {{ $status == 'pending' ? 'btn-warning' : 'btn-outline-warning' }}">Pending</a>
            <a href="{{ route('admin.pesanan.index', ['status' => 'diproses']) }}" class="btn btn-sm {{ $status == 'diproses' ? 'btn-info' : 'btn-outline-info' }}">Diproses</a>
            <a href="{{ route('admin.pesanan.index', ['status' => 'selesai']) }}" class="btn btn-sm {{ $status == 'selesai' ? 'btn-success' : 'btn-outline-success' }}">Selesai</a>
            <a href="{{ route('admin.pesanan.index', ['status' => 'dibatalkan']) }}" class="btn btn-sm {{ $status == 'dibatalkan' ? 'btn-danger' : 'btn-outline-danger' }}">Dibatalkan</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th>ID Order</th>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Status Pesanan</th>
                            <th>Pengiriman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pesanan as $p)
                            <tr>
                                <td class="text-center font-weight-bold">#ORD-{{ str_pad($p->id, 5, '0', STR_PAD_LEFT) }}</td>
                                <td class="text-center small">{{ $p->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <strong>{{ $p->user->nama ?? 'Pelanggan' }}</strong><br>
                                    <small class="text-muted"><i class="fas fa-envelope mr-1"></i>{{ $p->user->email ?? '-' }}</small><br>
                                    <small class="text-muted"><i class="fab fa-whatsapp mr-1 text-success"></i>{{ $p->no_hp ?? '-' }}</small>
                                </td>
                                <td>{{ $p->nama_produk }}</td>
                                <td class="text-center">{{ $p->jumlah }}</td>
                                <td class="font-weight-bold text-right">Rp {{ number_format($p->total, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $p->statusBadgeClass() }} px-2 py-1">
                                        {{ strtoupper($p->status_pesanan) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $p->pengirimanBadgeClass() }} px-2 py-1">
                                        {{ strtoupper($p->status_pengiriman) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.pesanan.show', $p->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye mr-1"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-5">
                                    <i class="fas fa-shopping-bag fa-3x mb-3 text-gray-300"></i>
                                    <p>Belum ada data pesanan masuk.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $pesanan->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
