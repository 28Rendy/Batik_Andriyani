@extends('layouts.layout')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Jenis Kain Batik</h1>
    </div>
    <hr>
    <div class="card-header py-3" align="right">
        {{-- <a href="{{ route('jeniskain.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Motif
        </a> --}}
        <a href="{{ route('Jkain.create') }}" class="btn btn-primary">
            Tambah
        </a>
        
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Jenis Kain</th>
                            <th>Deskripsi</th>
                            {{-- <th>Harga</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenis_kain as $jk)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jk->nama }}</td>
                                <td>{{ $jk->deskripsi }}</td>
                                {{-- <td>Rp {{ number_format($jk->harga, 0, ',', '.') }}</td> --}}
                                <td align="center">
                                    <a href="{{ route('Jkain.edit', $jk->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                                    </a>
                                    {{-- <form action="{{ route('motif.destroy', $jk->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus
                                        </button>
                                    </form> --}}
                                    <form action="{{ route('Jkain.destroy', $jk->id) }}" method="POST"
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
