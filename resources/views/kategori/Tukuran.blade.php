@extends('layouts.layout')

@section('content')
    <div class="container mt-3">
        <h3>Tambah Ukuran</h3>
        <hr>
        <form action="{{ route('ukuran.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ukuran">Ukuran</label>
                <input type="text" name="ukuran" class="form-control" required placeholder="Tambahkan angka saja">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
            </div>

      

            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
            <a href="{{ route('ukuran.index') }}" class="btn btn-secondary mt-2">Kembali</a>
        </form>
    </div>
@endsection
