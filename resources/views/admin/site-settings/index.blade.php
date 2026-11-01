@extends('layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengaturan Website (CMS)</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ route('admin.site-settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Informasi Umum Toko -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-store mr-2"></i>Identitas Toko</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label><strong>Nama Toko</strong></label>
                            <input type="text" name="nama_toko" class="form-control" value="{{ $settings['nama_toko']->value ?? 'Aruna Batik Nusantara' }}" required>
                        </div>
                        <div class="form-group">
                            <label><strong>Tagline / Slogan</strong></label>
                            <input type="text" name="tagline" class="form-control" value="{{ $settings['tagline']->value ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label><strong>Deskripsi Singkat Toko</strong></label>
                            <textarea name="deskripsi_toko" rows="4" class="form-control">{{ $settings['deskripsi_toko']->value ?? '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label><strong>Logo Toko</strong></label>
                            @if(isset($settings['logo']) && $settings['logo']->value)
                                <div class="mb-2">
                                    <img src="{{ asset($settings['logo']->value) }}" alt="Logo" style="max-height: 60px;" class="border p-1 rounded bg-light">
                                </div>
                            @endif
                            <input type="file" name="logo" class="form-control-file" accept="image/*">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah logo.</small>
                        </div>
                        <div class="form-group">
                            <label><strong>Teks Footer / Hak Cipta</strong></label>
                            <input type="text" name="footer_teks" class="form-control" value="{{ $settings['footer_teks']->value ?? '© 2025 Aruna Batik Nusantara. Hak cipta dilindungi.' }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kontak & Operasional -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-address-book mr-2"></i>Kontak & Jam Buka</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label><strong>Alamat Lengkap</strong></label>
                            <textarea name="alamat" rows="2" class="form-control">{{ $settings['alamat']->value ?? '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label><strong>Nomor WhatsApp</strong> (contoh: 628123456789)</label>
                            <input type="text" name="whatsapp" class="form-control" value="{{ $settings['whatsapp']->value ?? '' }}">
                            <small class="text-muted">Gunakan awalan 62 untuk integrasi tombol chat WhatsApp otomatis.</small>
                        </div>
                        <div class="form-group">
                            <label><strong>Email Toko</strong></label>
                            <input type="email" name="email" class="form-control" value="{{ $settings['email']->value ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label><strong>Jam Operasional</strong></label>
                            <input type="text" name="jam_buka" class="form-control" value="{{ $settings['jam_buka']->value ?? 'Senin–Sabtu: 08.00–17.00 WIB' }}">
                        </div>
                        <div class="form-group">
                            <label><strong>Instagram (URL / Username)</strong></label>
                            <input type="text" name="instagram" class="form-control" value="{{ $settings['instagram']->value ?? '' }}" placeholder="https://instagram.com/arunabatik">
                        </div>
                        <div class="form-group">
                            <label><strong>Facebook (URL)</strong></label>
                            <input type="text" name="facebook" class="form-control" value="{{ $settings['facebook']->value ?? '' }}" placeholder="https://facebook.com/arunabatik">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Halaman Tentang Kami (About Us) -->
            <div class="col-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-info-circle mr-2"></i>Konten Halaman "Tentang Kami"</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label><strong>Judul Bagian Tentang</strong></label>
                            <input type="text" name="tentang_judul" class="form-control" value="{{ $settings['tentang_judul']->value ?? 'Tentang Aruna Batik Nusantara' }}">
                        </div>
                        <div class="form-group">
                            <label><strong>Isi Lengkap Tentang Kami</strong></label>
                            <textarea name="tentang_isi" rows="5" class="form-control">{{ $settings['tentang_isi']->value ?? '' }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label><strong>Visi</strong></label>
                                <textarea name="visi" rows="3" class="form-control">{{ $settings['visi']->value ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 form-group">
                                <label><strong>Misi</strong></label>
                                <textarea name="misi" rows="3" class="form-control">{{ $settings['misi']->value ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right mb-5">
                    <button type="submit" class="btn btn-primary btn-lg shadow">
                        <i class="fas fa-save mr-2"></i>Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

