@extends('layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Banner Slider</h1>
        <a href="{{ route('admin.hero-slider.index') }}" class="btn btn-sm btn-secondary shadow-sm">
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
            <form action="{{ route('admin.hero-slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label><strong>Judul Banner *</strong></label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required placeholder="Contoh: Promo Batik Tulis Asli">
                </div>
                <div class="form-group">
                    <label><strong>Deskripsi / Subtitle</strong></label>
                    <textarea name="deskripsi" rows="3" class="form-control" placeholder="Contoh: Dapatkan koleksi motif khas nusantara dengan bahan pilihan">{{ old('deskripsi') }}</textarea>
                </div>
                <div class="form-group">
                    <label><strong>Gambar Banner * (Maks 3MB)</strong></label>
                    <input type="file" name="gambar" class="form-control-file" accept="image/*" required>
                    <small class="text-muted">Format: JPG, JPEG, PNG, WEBP. Disarankan resolusi lanskap (1920x800 px).</small>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label><strong>Nomor Urut Tampil</strong></label>
                        <input type="number" name="urutan" class="form-control" value="{{ old('urutan', 1) }}" min="0">
                        <small class="text-muted">Angka lebih kecil tampil lebih dulu.</small>
                    </div>
                    <div class="col-md-6 form-group">
                        <label><strong>Status Aktif</strong></label>
                        <div class="custom-control custom-switch mt-2">
                            <input type="checkbox" name="aktif" value="1" class="custom-control-input" id="switchAktif" checked>
                            <label class="custom-control-label" for="switchAktif">Tampilkan di halaman utama</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Simpan Banner</button>
                    <a href="{{ route('admin.hero-slider.index') }}" class="btn btn-light border ml-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

