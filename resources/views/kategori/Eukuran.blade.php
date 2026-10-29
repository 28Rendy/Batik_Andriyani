@extends('layouts.layout')

@section('content')
    <div class="container mt-3">
        <h3><b>Edit Ukuran</b></h3>
        <hr>
        <form action="{{ route('ukuran.update', $ukuran->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <b><label for="ukuran">Ukuran</label></b>
                <input type="text" name="ukuran" class="form-control" value="{{ $ukuran->ukuran }}" required placeholder="Tambahkan angkan saja">
            </div>

            <div class="form-group">
                <b><label for="deskripsi">Deskripsi</label></b>
                <textarea name="deskripsi" class="form-control" rows="3">{{ $ukuran->deskripsi }}</textarea>
            </div>



            <button type="submit" class="btn btn-success mt-2">Update</button>
            <a href="{{ route('ukuran.index') }}" class="btn btn-secondary mt-2">Kembali</a>
        </form>
    </div>
@endsection
