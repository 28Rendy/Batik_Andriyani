@extends('layouts.layout')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Data Pengeluaran</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control"
                                value="{{ old('tanggal', $pengeluaran->tanggal) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Jumlah Unit</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control"
                                value="{{ old('jumlah', $pengeluaran->jumlah) }}" required placeholder="Jumlah unit">
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
                                <option value="Cash"
                                    {{ old('metode_pembayaran', $pengeluaran->metode_pembayaran) == 'Cash' ? 'selected' : '' }}>
                                    Cash</option>
                                <option value="Transfer"
                                    {{ old('metode_pembayaran', $pengeluaran->metode_pembayaran) == 'Transfer' ? 'selected' : '' }}>
                                    Transfer</option>
                                <option value="E-Wallet"
                                    {{ old('metode_pembayaran', $pengeluaran->metode_pembayaran) == 'E-Wallet' ? 'selected' : '' }}>
                                    E-Wallet</option>
                                <option value="QRIS"
                                    {{ old('metode_pembayaran', $pengeluaran->metode_pembayaran) == 'QRIS' ? 'selected' : '' }}>
                                    QRIS</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kategori</label>
                        <div class="form-group">
                            <select name="kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Bahan Baku"
                                    {{ old('kategori', $pengeluaran->kategori) == 'Bahan Baku' ? 'selected' : '' }}>Bahan
                                    Baku</option>
                                <option value="Operasional"
                                    {{ old('kategori', $pengeluaran->kategori) == 'Operasional' ? 'selected' : '' }}>
                                    Operasional</option>
                                <option value="Gaji"
                                    {{ old('kategori', $pengeluaran->kategori) == 'Gaji' ? 'selected' : '' }}>Gaji</option>
                                <option value="Lainnya"
                                    {{ old('kategori', $pengeluaran->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Penerima</label>
                            <input type="text" name="penerima" class="form-control"
                                value="{{ old('penerima', $pengeluaran->penerima) }}"
                                placeholder="Nama vendor atau penerima pengeluaran" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Total Pengeluaran (Rp)</label>
                            <input type="number" name="total" id="total" class="form-control"
                                value="{{ old('total', $pengeluaran->total) }}" required placeholder="Total pengeluaran">
                        </div>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control"
                        value="{{ old('keterangan', $pengeluaran->keterangan) }}" required
                        placeholder="Contoh: Beli kain, Bayar listrik, dll">
                </div>

                <div class="form-group row mb-4">
                    <div class="col-md-10">
                        <label for="bukti">Bukti Pembayaran</label>
                        <input id="bukti_pembayaran" type="file" name="bukti_pembayaran" class="form-control">
                        @if ($pengeluaran->bukti)
                            <div class="mt-2">
                                <small>File saat ini:</small>
                                <a href="{{ asset($pengeluaran->bukti) }}" target="_blank" class="d-block">
                                    Lihat Bukti Pembayaran
                                </a>
                                <label class="mt-2">
                                    <input type="checkbox" name="hapus_bukti" value="1"> Hapus file saat ini
                                </label>
                            </div>
                        @endif
                    </div>
                    <small class="text-muted">Format: JPG, PNG, PDF (Maksimal 2MB)</small>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary px-4">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
