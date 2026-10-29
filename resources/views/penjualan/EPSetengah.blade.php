@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2>Edit Penjualan Produk Setengah Jadi</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('psetengah.update', $penjualan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="tanggal_penjualan">Tanggal Penjualan</label>
                <input type="date" name="tanggal_penjualan" id="tanggal_penjualan" class="form-control"
                    value="{{ old('tanggal_penjualan', $penjualan->tanggal_penjualan) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="nama_pelanggan">Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control"
                    value="{{ old('nama_pelanggan', $penjualan->nama_pelanggan) }}" required>
            </div>

            <div class="form-group mb-3">
                <label>Nama Produk</label>
                <select name="nama_produk" id="nama_produk" class="form-control" required>
                    <option value="">Pilih Produk</option>
                    @foreach ($produk as $item)
                        <option value="{{ $item->id }}" 
                                data-harga="{{ $item->harga }}" 
                                data-kode="{{ $item->kode_produk }}"
                                {{ $penjualan->produk_id == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_produk }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Kode Produk</label>
                <input type="text" name="kode_produk" id="kode_produk" class="form-control" 
                       value="{{ old('kode_produk', $penjualan->kode_produk) }}" readonly>
            </div>

            <!-- <div class="form-group mb-3">
                <label>Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control"
                    value="{{ old('keterangan', $penjualan->keterangan) }}"
                    placeholder="Masukkan keterangan tambahan (opsional)">
            </div> -->

            <div class="form-group mb-3">
                <label for="jumlah_item">Jumlah Item</label>
                <input type="number" name="jumlah_item" id="jumlah_item" class="form-control"
                    value="{{ old('jumlah_item', $penjualan->jumlah_item) }}" min="1" required>
            </div>

            <div class="form-group mb-3">
                <label for="harga_satuan">Harga Satuan</label>
                <input type="number" name="harga_satuan" id="harga_satuan" class="form-control" 
                       value="{{ old('harga_satuan', $penjualan->harga_satuan) }}" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="total_bayar">Total Bayar</label>
                <input type="number" name="total_bayar" id="total_bayar" class="form-control" 
                       value="{{ old('total_bayar', $penjualan->total_bayar) }}" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="status_pembayaran">Status Pembayaran</label>
                <select name="status_pembayaran" id="status_pembayaran" class="form-control" required>
                    <option value="lunas" {{ $penjualan->status_pembayaran === 'lunas' ? 'selected' : '' }}>Lunas</option>
                    <option value="belum_lunas" {{ $penjualan->status_pembayaran === 'belum_lunas' ? 'selected' : '' }}>
                        Belum Lunas</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary bg-success">Simpan Perubahan</button>
            <a href="{{ route('psetengah.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script>
        const produkSelect = document.getElementById('nama_produk');
        const hargaInput = document.getElementById('harga_satuan');
        const kodeInput = document.getElementById('kode_produk');
        const jumlahInput = document.getElementById('jumlah_item');
        const totalInput = document.getElementById('total_bayar');

        // Fungsi untuk set harga, kode, dan total saat load awal
        function setInitialData() {
            const selectedOption = produkSelect.options[produkSelect.selectedIndex];
            if (selectedOption.value) {
                const harga = selectedOption.getAttribute('data-harga');
                const kode = selectedOption.getAttribute('data-kode');
                hargaInput.value = harga;
                kodeInput.value = kode;
                hitungTotal();
            }
        }

        function hitungTotal() {
            const jumlah = parseFloat(jumlahInput.value) || 0;
            const harga = parseFloat(hargaInput.value) || 0;
            totalInput.value = jumlah * harga;
        }

        produkSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga');
            const kode = selectedOption.getAttribute('data-kode');
            hargaInput.value = harga;
            kodeInput.value = kode;
            hitungTotal();
        });

        jumlahInput.addEventListener('input', function() {
            hitungTotal();
        });

        // Jalankan saat halaman pertama kali dimuat
        window.addEventListener('DOMContentLoaded', function() {
            setInitialData();
        });
    </script>
@endsection