@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="h3 mb-4 text-gray-800">Edit Jenis Kain</h1>
    <hr>

    <form action="{{ route('Jkain.update', $jenis_kain->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Jenis Kain</label>
            <input type="text" name="nama" class="form-control" value="{{ $jenis_kain->nama }}" required>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $jenis_kain->deskripsi }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('Jkain.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
