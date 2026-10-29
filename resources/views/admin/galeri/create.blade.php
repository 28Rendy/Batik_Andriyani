@extends('layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Foto Galeri</h1>
        <a href="{{ route('admin.galeri.index') }}" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm mr-1"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label><strong>Judul Foto / Karya Batik *</strong></label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required placeholder="Contoh: Proses Canting Batik Tulis">
                </div>
                <div class="form-group">
                    <label><strong>Deskripsi Singkat</strong></label>
                    <textarea name="deskripsi" rows="3" class="form-control" placeholder="Contoh: Dokumentasi proses canting malam pada kain mori prima">{{ old('deskripsi') }}</textarea>
                </div>
                <div class="form-group">
                    <label><strong>Pilih File Foto * (Maks 3MB)</strong></label>
                    <input type="file" name="gambar" class="form-control-file" accept="image/*" required>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label><strong>Nomor Urut Tampil</strong></label>
                        <input type="number" name="urutan" class="form-control" value="{{ old('urutan', 1) }}" min="0">
                    </div>
                    <div class="col-md-6 form-group">
                        <label><strong>Status</strong></label>
                        <div class="custom-control custom-switch mt-2">
                            <input type="checkbox" name="aktif" value="1" class="custom-control-input" id="switchAktif" checked>
                            <label class="custom-control-label" for="switchAktif">Tampilkan di halaman galeri</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Simpan ke Galeri</button>
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-light border ml-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
