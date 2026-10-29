@extends('layouts.layout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penjualan Setengah Jadi</h1>
    </div>
    <hr>
    <div class="card-header py-3" align="right">
        <a href="{{ route('psetengah.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                <thead align="center">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Pelanggan</th>
                        <th>kode produk</th>
                        <th>Produk</th>
                        <!-- <th>Keterangan</th> -->
                        <th>Jml Item</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjualan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tanggal_penjualan }}</td>
                            <td>{{ $item->nama_pelanggan }}</td>
                            <td>{{ $item->kode_produk ?? '-' }}</td>
                            <td>{{ $item->nama_produk }}</td>
                            <!-- <td>{{ $item->keterangan }}</td> -->
                            <td>{{ $item->jumlah_item }}</td>
                            <td>Rp. {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                            <td>
                                <span
                                    class="status-indicator 
                                @if ($item->status_pembayaran == 'lunas') bg-success
                                @elseif($item->status_pembayaran == 'belum_lunas')
                                    bg-danger @endif"></span>
                                {{ ucfirst($item->status_pembayaran) }}
                            </td>

                            <td align="center">
                                <a href="{{ route('psetengah.edit', $item->id) }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-edit"></i> Edit

                                </a>
                                <form action="{{ route('psetengah.destroy', $item->id) }}" method="POST"
                                    style="display:inline;" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .status-indicator {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 5px;
            /* Memberi jarak antara indikator dan teks */
        }

        .bg-success {
            background-color: #28a745;
            /* Warna hijau untuk status lunas */
        }

        .bg-warning {
            background-color: #ffc107;
            /* Warna kuning untuk status belum lunas */
        }
    </style>
@endsection
