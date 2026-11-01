@extends('layouts.layout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Produksi Sendiri</h1>
    </div>
    <hr>
    <div class="card-header py-3" align="right">
        <a href="{{ route('Psendiri.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah </a>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Motif</th>
                            <th>Jenis Kain</th>
                            <th>Ukuran</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produksi as $prod)
                            <tr>
                                <td>{{ $prod->kode_produk  }}</td>
                                <td>{{ $prod->nama_produk }}</td>

                                <td>{{ $prod->motif->nama }}</td>
                                <td>{{ $prod->JenisKain->nama }}</td> <!-- Sesuai dengan nama relasi di model -->
                                <td>{{ $prod->ukuran->ukuran }}</td>
                                <!-- karena field-nya di model Ukuran adalah 'ukuran' bukan 'nama' -->

                                <td>{{ $prod->stok }}</td>
                                <td>Rp {{ number_format($prod->harga, 0, ',', '.') }}</td>

                                <td>
                                    <img src="{{ asset($prod->foto) }}" alt="Foto" width="130" class="thumbnail"
                                        data-toggle="modal" data-target="#imageModal" style="cursor: pointer;">
                                </td>


                                <td align="center">
                                    <a href="{{ route('Psendiri.edit', $prod->id) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <form action="{{ route('Psendiri.destroy', $prod->id) }}" method="POST"
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
    </div>
@endsection


<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Aruna Batik Nusantara</b> <br> Nama Batik :
                    {{ $prod->nama_produk }}</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" alt="Detail Foto" class="img-fluid">
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.thumbnail').click(function() {
            var imgSrc = $(this).attr('src'); // Ambil src gambar
            $('#modalImage').attr('src', imgSrc); // Set gambar di modal
        });
    });
</script>

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS dan jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>