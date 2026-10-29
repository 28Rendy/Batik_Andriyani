@extends('layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pesanan #ORD-{{ str_pad($pesanan->id, 5, '0', STR_PAD_LEFT) }}</h1>
        <a href="{{ route('admin.pesanan.index') }}" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm mr-1"></i> Kembali ke Daftar Pesanan
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <!-- Informasi Pesanan & Pelanggan -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-receipt mr-2"></i>Rincian Produk Dipesan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Produk</th>
                                    <th>Kategori</th>
                                    <th class="text-right">Harga Satuan</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">{{ $pesanan->nama_produk }}</td>
                                    <td>{{ $pesanan->sumber_produk == 'setengah_jadi' ? 'Kain Setengah Jadi' : 'Batik Produksi Sendiri' }}</td>
                                    <td class="text-right">Rp {{ number_format($pesanan->harga_satuan, 0, ',', '.') }}</td>
                                    <td class="text-center">{{ $pesanan->jumlah }}</td>
                                    <td class="text-right font-weight-bold">Rp {{ number_format($pesanan->total, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-right">Total Pembayaran:</th>
                                    <th class="text-right text-primary h5">Rp {{ number_format($pesanan->total, 0, ',', '.') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    @if ($pesanan->catatan)
                        <div class="alert alert-light border mt-3">
                            <strong class="d-block mb-1"><i class="fas fa-comment-dots mr-1"></i> Catatan Pelanggan:</strong>
                            <p class="mb-0 text-muted">{{ $pesanan->catatan }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Informasi Pembeli & Pengiriman -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-truck mr-2"></i>Tujuan Pengiriman & Kontak Pembeli</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-1 text-muted small font-weight-bold">NAMA PELANGGAN</p>
                            <p class="font-weight-bold mb-3">{{ $pesanan->user->nama ?? 'Tidak terdaftar' }}</p>

                            <p class="mb-1 text-muted small font-weight-bold">EMAIL</p>
                            <p class="mb-3">{{ $pesanan->user->email ?? '-' }}</p>

                            <p class="mb-1 text-muted small font-weight-bold">NOMOR HP / WHATSAPP</p>
                            <p class="mb-3">
                                {{ $pesanan->no_hp ?? '-' }}
                                @if($pesanan->no_hp)
                                    <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $pesanan->no_hp)) }}" target="_blank" class="btn btn-sm btn-success ml-2">
                                        <i class="fab fa-whatsapp"></i> Chat WA
                                    </a>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1 text-muted small font-weight-bold">ALAMAT PENGIRIMAN</p>
                            <div class="p-3 bg-light rounded border">
                                {{ $pesanan->alamat_pengiriman ?? 'Tidak ada catatan alamat' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Status -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-tasks mr-2"></i>Kelola Status Pesanan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.pesanan.updateStatus', $pesanan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label><strong>Status Pesanan:</strong></label>
                            <select name="status_pesanan" class="form-control">
                                <option value="pending" {{ $pesanan->status_pesanan == 'pending' ? 'selected' : '' }}>Pending (Menunggu Konfirmasi)</option>
                                <option value="diproses" {{ $pesanan->status_pesanan == 'diproses' ? 'selected' : '' }}>Diproses (Sedang Disiapkan)</option>
                                <option value="selesai" {{ $pesanan->status_pesanan == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="dibatalkan" {{ $pesanan->status_pesanan == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><strong>Status Pengiriman:</strong></label>
                            <select name="status_pengiriman" class="form-control">
                                <option value="menunggu" {{ $pesanan->status_pengiriman == 'menunggu' ? 'selected' : '' }}>Menunggu Pengiriman</option>
                                <option value="dikirim" {{ $pesanan->status_pengiriman == 'dikirim' ? 'selected' : '' }}>Sedang Dikirim (Dalam Perjalanan)</option>
                                <option value="diterima" {{ $pesanan->status_pengiriman == 'diterima' ? 'selected' : '' }}>Sudah Diterima Pembeli</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block shadow-sm">
                            <i class="fas fa-save mr-1"></i> Simpan Status
                        </button>
                    </form>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-secondary"><i class="fas fa-info mr-2"></i>Informasi Waktu</h6>
                </div>
                <div class="card-body small">
                    <p class="mb-1"><strong>Waktu Pemesanan:</strong><br>{{ $pesanan->created_at->format('d F Y, H:i:s') }}</p>
                    <p class="mb-0"><strong>Terakhir Diperbarui:</strong><br>{{ $pesanan->updated_at->format('d F Y, H:i:s') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
