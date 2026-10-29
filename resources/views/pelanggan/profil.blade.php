@extends('pelanggan.layouts.app')

@section('title', 'Pengaturan Akun Pelanggan')

@section('content')
<div class="card card-custom p-4">
    <div class="border-bottom pb-3 mb-4">
        <h4 class="fw-bold mb-1 font-serif">Pengaturan Akun & Profil</h4>
        <p class="text-muted small mb-0">Kelola informasi kontak dan alamat pengiriman default Anda</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger rounded-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pelanggan.profil.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label small fw-bold">Nama Lengkap *</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $user->nama) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label small fw-bold">Alamat Email</label>
                <input type="email" class="form-control bg-light" value="{{ $user->email }}" readonly>
                <small class="text-muted">Email tidak dapat diubah karena merupakan identitas login.</small>
            </div>

            <div class="col-md-6">
                <label class="form-label small fw-bold">Nomor WhatsApp / HP *</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
            </div>

            <div class="col-12">
                <label class="form-label small fw-bold">Alamat Pengiriman Default *</label>
                <textarea name="address" rows="3" class="form-control" required placeholder="Contoh: Jl. Diponegoro No. 12, RT 02 / RW 05, Kelurahan ..., Kecamatan ..., Kota ..., Kode Pos ...">{{ old('address', $user->address) }}</textarea>
            </div>

            <div class="col-12 mt-4 pt-3 border-top">
                <h6 class="fw-bold font-serif mb-2">Ganti Password (Opsional)</h6>
                <p class="text-muted small">Biarkan kosong jika Anda tidak ingin mengubah password akun.</p>
            </div>

            <div class="col-md-6">
                <label class="form-label small fw-bold">Password Baru</label>
                <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter">
            </div>

            <div class="col-md-6">
                <label class="form-label small fw-bold">Ulangi Password Baru</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password">
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-warning rounded-pill px-5 fw-bold shadow">
                    <i class="fas fa-save me-1"></i> Simpan Perubahan Profil
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

