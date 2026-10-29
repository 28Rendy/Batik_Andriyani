@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="h3 mb-4 text-gray-800">Tambah Jenis Kain</h1>
    <hr>

    <form action="{{ route('Jkain.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Jenis Kain</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>



        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('Jkain.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
