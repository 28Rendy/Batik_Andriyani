@extends('layouts.layout')

@section('content')
    <h3 class="mb-4">Tambah Data Penjualan (Produksi Sendiri)</h3>
    <form action="{{ route('ppsendiri.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Tanggal Penjualan</label>
            <input type="date" name="tanggal_penjualan" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="form-control" required>
            <div class="form-group">
                <label>Nama Produk</label>
                <select name="nama_produk" id="nama_produk" class="form-control" required>
                    <option value="">Pilih Produk</option>
                    @foreach ($produk as $item)
                        <option value="{{ $item->id }}" data-harga="{{ $item->harga }}"
                            data-kode="{{ $item->kode_produk }}">{{ $item->nama_produk }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Kode Produk</label>
                <input type="text" name="kode_produk" id="kode_produk" class="form-control" readonly>
            </div>
            <!-- <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control"
                    placeholder="Masukkan keterangan tambahan (opsional)">
            </div> -->
            <div class="form-group">
                <label>Jumlah Item</label>
                <input type="number" name="jumlah_item" id="jumlah_item" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Harga Satuan</label>
                <input type="number" name="harga_satuan" id="harga_satuan" class="form-control" required readonly>
            </div>
            <div class="form-group">
                <label>Total Bayar</label>
                <input type="number" name="total_bayar" id="total_bayar" class="form-control" required readonly>
            </div>
            <div class="form-group">
                <label>Status Pembayaran</label>
                <select name="status_pembayaran" class="form-control" required>
                    <option value="lunas">Lunas</option>
                    <option value="belum_lunas">Belum Lunas</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <script>
        // Mengambil harga dan kode berdasarkan produk yang dipilih
        document.getElementById('nama_produk').addEventListener('change', function() {
            var harga = this.options[this.selectedIndex].getAttribute('data-harga');
            var kode = this.options[this.selectedIndex].getAttribute('data-kode');
            document.getElementById('harga_satuan').value = harga;
            document.getElementById('kode_produk').value = kode;
            hitungTotal();
        });

        // Menghitung total bayar berdasarkan jumlah item dan harga satuan
        document.getElementById('jumlah_item').addEventListener('input', function() {
            hitungTotal();
        });

        function hitungTotal() {
            var jumlahItem = document.getElementById('jumlah_item').value;
            var hargaSatuan = document.getElementById('harga_satuan').value;
            var totalBayar = jumlahItem * hargaSatuan;
            document.getElementById('total_bayar').value = totalBayar;
        }
    </script>
@endsection
