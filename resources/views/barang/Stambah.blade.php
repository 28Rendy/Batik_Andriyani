@extends('layouts.layout')

@section('content')
    <form action="{{ route('Sjadi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <fieldset>
            <legend>Tambah Data Produk Setengah Jadi</legend>

            <div class="form-group row">
                <div class="col-md-5">
                    <label for="kode_produk">Kode Produk</label>
                    <input id="kode_produk" type="text" name="kode_produk" class="form-control" required placeholder="Ambil 1 huruf awal pada nama produk contoh : Ambringan = A">
                </div>
                <div class="col-md-5">
                    <label for="nama_produk">Nama Produk Batik</label>
                    <input id="nama_produk" type="text" name="nama_produk" class="form-control" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-5">
                    <label for="motif_id">Motif</label>
                    <select id="motif_id" name="motif_id" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Motif --</option>
                        @foreach($motif as $m)
                            <option value="{{ $m->id }}">{{ $m->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="jenis_kain_id">Jenis Kain</label>
                    <select id="jenis_kain_id" name="jenis_kain_id" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Jenis Kain --</option>
                        @foreach($JenisKain as $jk)
                            <option value="{{ $jk->id }}">{{ $jk->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-5">
                    <label for="ukuran_id">Ukuran</label>
                    <select id="ukuran_id" name="ukuran_id" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Ukuran --</option>
                        @foreach($ukuran as $u)
                            <option value="{{ $u->id }}">{{ $u->ukuran }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="stok">Stok</label>
                    <input id="stok" type="number" name="stok" class="form-control" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-5">
                    <label for="harga">Harga</label>
                    <input id="harga" type="number" placeholder="Jangan menggunakan titik atau koma" name="harga" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <label for="foto">Foto</label>
                    <input id="foto" type="file" name="foto" class="form-control">
                </div>
            </div>

            <br>
            <div class="col-md-10">
                <input type="submit" class="btn btn-success btn-send" value="Simpan">
                <input type="button" class="btn btn-primary btn-send" value="Kembali" onclick="history.go(-1)">
            </div>
            <hr>
        </fieldset>
    </form>
@endsection

