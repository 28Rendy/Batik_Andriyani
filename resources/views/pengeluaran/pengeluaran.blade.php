@extends('layouts.layout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pengeluaran</h1>
    </div>
    <hr>
    <div class="card-header py-3" align="right">
        <a href="{{ route('pengeluaran.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
        </a>
    </div>

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                <thead align="center">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Metode Pembayaran</th>
                        <th>Bukti Pembayaran</th>
                        <th>Penerima</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengeluarans as $key => $pengeluaran)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ date('d-m-Y', strtotime($pengeluaran->tanggal)) }}</td>
                            <td>{{ $pengeluaran->keterangan }}</td>
                            <td>{{ $pengeluaran->kategori }}</td>
                            <td>{{ number_format($pengeluaran->jumlah) }}</td>
                            <td>Rp {{ number_format($pengeluaran->total, 0, ',', '.') }}</td>
                            <td>{{ $pengeluaran->metode_pembayaran }}</td>
                            {{-- <td>
                                @if ($pengeluaran->bukti)
                                    <a href="{{ asset('storage/' . $pengeluaran->bukti) }}" target="_blank">
                                        Lihat Bukti
                                    </a>
                                @else
                                    -
                                @endif
                            </td> --}}
                            <td>
                                <img src="{{ asset('photos/' . $pengeluaran->bukti_pembayaran) }}" alt="bukti" width="130" class="thumbnail"
                                    data-toggle="modal" data-target="#imageModal" style="cursor: pointer;">
                            </td>
                            <td>{{ $pengeluaran->penerima }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{  route('pengeluaran.edit', $pengeluaran->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('pengeluaran.destroy', $pengeluaran->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
