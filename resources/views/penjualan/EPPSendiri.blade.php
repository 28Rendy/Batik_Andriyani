@extends('layouts.layout')

@section('content')
<div class="container">
    <h2>Edit Penjualan Produk Setengah Jadi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
{{-- 
    <form action="{{ route('psetengah.update', $penjualan->id) }}" method="POST"> --}}
        <form action="{{ route('ppsendiri.update', $penjualan->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="tanggal_penjualan">Tanggal Penjualan</label>
            <input type="date" name="tanggal_penjualan" id="tanggal_penjualan" class="form-control" value="{{ old('tanggal_penjualan', $penjualan->tanggal_penjualan) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" value="{{ old('nama_pelanggan', $penjualan->nama_pelanggan) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="nama_produk">Nama Produk</label>
            <select name="nama_produk" id="nama_produk" class="form-control" required>
                <option value="">Pilih Produk</option>
                @foreach ($produk as $item)
                    <option value="{{ $item->id }}" data-harga="{{ $item->harga }}"
                        {{ $penjualan->produk_id == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_produk }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- <div class="form-group mb-3">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control" value="{{ old('keterangan', $penjualan->keterangan) }}" placeholder="Masukkan keterangan tambahan (opsional)">
        </div> -->

        <div class="form-group mb-3">
            <label for="jumlah_item">Jumlah Item</label>
            <input type="number" name="jumlah_item" id="jumlah_item" class="form-control" value="{{ old('jumlah_item', $penjualan->jumlah_item) }}" min="1" required>
        </div>

        <div class="form-group mb-3">
            <label for="harga_satuan">Harga Satuan</label>
            <input type="number" name="harga_satuan" id="harga_satuan" class="form-control" readonly>
        </div>

        <div class="form-group mb-3">
            <label for="total_bayar">Total Bayar</label>
            <input type="number" name="total_bayar" id="total_bayar" class="form-control" readonly>
        </div>

        <div class="form-group mb-4">
            <label for="status_pembayaran">Status Pembayaran</label>
            <select name="status_pembayaran" id="status_pembayaran" class="form-control" required>
                <option value="lunas" {{ $penjualan->status_pembayaran === 'lunas' ? 'selected' : '' }}>Lunas</option>
                <option value="belum_lunas" {{ $penjualan->status_pembayaran === 'belum_lunas' ? 'selected' : '' }}>Belum Lunas</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary bg-success"  >Simpan Perubahan</button>
        <a href="{{ route('psetengah.index') }}" class="btn btn-secondary">Kembali</a>
        
    </form>
</div>

<script>
    const produkSelect = document.getElementById('nama_produk');
    const hargaInput = document.getElementById('harga_satuan');
    const jumlahInput = document.getElementById('jumlah_item');
    const totalInput = document.getElementById('total_bayar');

    function setInitialHargaDanTotal() {
        const selectedOption = produkSelect.options[produkSelect.selectedIndex];
        const harga = selectedOption.getAttribute('data-harga');
        hargaInput.value = harga;
        hitungTotal();
    }

    function hitungTotal() {
        const jumlah = parseFloat(jumlahInput.value) || 0;
        const harga = parseFloat(hargaInput.value) || 0;
        totalInput.value = jumlah * harga;
    }

    produkSelect.addEventListener('change', function () {
        const harga = this.options[this.selectedIndex].getAttribute('data-harga');
        hargaInput.value = harga;
        hitungTotal();
    });

    jumlahInput.addEventListener('input', function () {
        hitungTotal();
    });

    window.addEventListener('DOMContentLoaded', function () {
        setInitialHargaDanTotal();
    });
</script>
@endsection
