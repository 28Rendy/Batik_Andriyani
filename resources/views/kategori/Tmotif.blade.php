@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('motif.store') }}" method="POST">
                    @csrf
                    <fieldset>
                        <legend class="text-center"><b>Tambah Motif</b></legend>

                        <div class="form-group">
                            <label for="kode_motif"><b>Kode Motif</b></label>
                            <input type="text" class="form-control @error('kode_motif') is-invalid @enderror" id="kode_motif" name="kode_motif" value="{{ old('kode_motif') }}" required placeholder="Tambahkan huruf awal nama motif dan angka contoh : TK01">
                            @error('kode_motif')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama"><b>Nama Motif</b></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi"><b>Deskripsi</b></label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

            

                        <div class="form-group text-center mt-3">
                            <input type="submit" class="btn btn-success" value="Simpan">
                            <a href="{{ route('motif.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection

