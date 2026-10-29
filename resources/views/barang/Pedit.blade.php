@extends('layouts.layout')

@section('content')
    <form action="{{ route('Psendiri.update', $produksi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <fieldset>
            <legend>Edit Data Produksi Sendiri</legend>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="kode_produk">Kode Produk</label>
                    <input id="kode_produk" type="text" name="kode_produk" class="form-control"
                        value="{{ $produksi->kode_produk }}" required placeholder="Ambil 1 huruf awal pada nama produk contoh : Ambringan = A">
                </div>

                <div class="col-md-5">
                    <label for="nama_produk">Nama Produk Batik</label>
                    <input id="nama_produk" type="text" name="nama_produk" class="form-control"
                        value="{{ $produksi->nama_produk }}" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-5">
                    <label for="motif_id">Motif</label>
                    <select id="motif_id" name="motif_id" class="form-control" required>
                        <option value="" disabled>-- Pilih Motif --</option>
                        @foreach ($motif as $m)
                            <option value="{{ $m->id }}" {{ $m->id == $produksi->motif_id ? 'selected' : '' }}>
                                {{ $m->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-5">
                    <label for="jenis_kain_id">Jenis Kain</label>
                    <select id="jenis_kain_id" name="jenis_kain_id" class="form-control" required>
                        <option value="" disabled>-- Pilih Jenis Kain --</option>
                        @foreach ($JenisKain as $jk)
                            <option value="{{ $jk->id }}" {{ $jk->id == $produksi->jenis_kain_id ? 'selected' : '' }}>
                                {{ $jk->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-5">
                    <label for="ukuran_id">Ukuran</label>
                    <select id="ukuran_id" name="ukuran_id" class="form-control" required>
                        <option value="" disabled>-- Pilih Ukuran --</option>
                        @foreach ($ukuran as $u)
                            <option value="{{ $u->id }}" {{ $u->id == $produksi->ukuran_id ? 'selected' : '' }}>
                                {{ $u->ukuran }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-5">
                    <label for="stok">Stok</label>
                    <input id="stok" type="number" name="stok" class="form-control" value="{{ $produksi->stok }}"
                        required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-5">
                    <label for="harga">Harga</label>
                    <input id="harga" type="number" name="harga" class="form-control" value="{{ $produksi->harga }}"
                        required>
                </div>

                <div class="col-md-5">
                    <label for="foto">Foto (Biarkan kosong jika tidak ingin mengganti)</label>
                    <input id="foto" type="file" name="foto" class="form-control">
                </div>
            </div>

            <br>
            <div class="col-md-10">
                <input type="submit" class="btn btn-success btn-send" value="Update">
                <a href="{{ route('Psendiri.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <hr>
        </fieldset>
    </form>
@endsection

