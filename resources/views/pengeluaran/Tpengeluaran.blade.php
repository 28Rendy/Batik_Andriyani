@extends('layouts.layout')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Data Pengeluaran</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('pengeluaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" required
                                placeholder="Jumlah">
                        </div>
                    </div>
                </div>

                <!-- Brown Box Sections -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="label">Metode Pembayaran</label>
                        <div class="form-group">
                            <select name="metode_pembayaran" class="form-control" required>
                                <option value="">Pilih Metode</option>
                                <option value="Cash">Cash</option>
                                <option value="Transfer">Transfer</option>
                                <option value="E-Wallet">E-Wallet</option>
                                <option value="QRIS">QRIS</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kategori</label>
                        <div class="form-group">
                            <select name="kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Bahan Baku">Bahan Baku</option>
                                <option value="Operasional">Operasional</option>
                                <option value="Gaji">Gaji</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Penerima</label>
                            <input type="text" name="penerima" class="form-control"
                                placeholder="Nama vendor atau penerima pengeluaran" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Total Pengeluaran (Rp)</label>
                            <input type="number" name="total" id="total" class="form-control" required
                                placeholder="Total pengeluaran">
                        </div>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" required
                        placeholder="Contoh: Beli kain, Bayar listrik, dll">
                </div>



                <div class="form-group row">
                    <div class="col-md-10">
                        <label for="bukti">Bukti Pembayaran</label>
                        <input id="bukti_pembayaran" type="file" name="bukti" class="form-control">
                    </div>
                    <small class="text-muted">Format: JPG, PNG, PDF (Maksimal 2MB)</small>
                </div>


                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
