@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('motif.update', $motif->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <legend class="text-center">Edit Motif Batik</legend>
                        <div class="form-group">
                            <label for="kode_motif">Kode Motif</label>
                            <input type="text" class="form-control @error('kode_motif') is-invalid @enderror" id="kode_motif" name="kode_motif" value="{{ old('kode_motif', $motif->kode_motif) }}" required>
                            @error('kode_motif')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Motif</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $motif->nama) }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $motif->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-success btn-send" value="Update">
                            <a href="{{ route('motif.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection

