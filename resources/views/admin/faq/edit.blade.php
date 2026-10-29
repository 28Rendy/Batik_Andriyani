@extends('layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit FAQ</h1>
        <a href="{{ route('admin.faq.index') }}" class="btn btn-sm btn-secondary shadow-sm">
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
            <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label><strong>Pertanyaan *</strong></label>
                    <input type="text" name="pertanyaan" class="form-control" value="{{ old('pertanyaan', $faq->pertanyaan) }}" required>
                </div>
                <div class="form-group">
                    <label><strong>Jawaban *</strong></label>
                    <textarea name="jawaban" rows="5" class="form-control" required>{{ old('jawaban', $faq->jawaban) }}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label><strong>Nomor Urut Tampil</strong></label>
                        <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $faq->urutan) }}" min="0">
                    </div>
                    <div class="col-md-6 form-group">
                        <label><strong>Status</strong></label>
                        <div class="custom-control custom-switch mt-2">
                            <input type="checkbox" name="aktif" value="1" class="custom-control-input" id="switchAktif" {{ $faq->aktif ? 'checked' : '' }}>
                            <label class="custom-control-label" for="switchAktif">Tampilkan di halaman FAQ publik</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Perbarui FAQ</button>
                    <a href="{{ route('admin.faq.index') }}" class="btn btn-light border ml-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

