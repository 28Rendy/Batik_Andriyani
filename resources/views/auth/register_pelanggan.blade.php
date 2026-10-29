<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pendaftaran Akun Pelanggan - {{ \App\Models\SiteSetting::getSetting('nama_toko', 'Batik Andriyani') }}</title>
    <!-- Custom fonts -->
    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles -->
    <link href="{{ asset('asset/css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="card o-hidden border-0 shadow-lg my-3">
                    <div class="card-body p-0">
                        <div style="background-color: #fdfaf7;" class="p-4 p-md-5">
                            <div class="text-center mb-4">
                                <img src="{{ asset('asset/img/logo_batik.png')}}" width="130" class="mb-3">
                                <h1 class="h4 text-gray-900 font-weight-bold">Daftar Akun Pelanggan</h1>
                                <p class="text-muted small">Buat akun untuk memesan batik dan memantau status pengiriman pesanan Anda</p>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger small">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $err)
                                            <li>{{ $err }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('register.pelanggan.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="small font-weight-bold text-gray-700">Nama Lengkap *</label>
                                    <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" required placeholder="Contoh: Budi Santoso">
                                </div>

                                <div class="form-group">
                                    <label class="small font-weight-bold text-gray-700">Alamat Email *</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="nama@email.com">
                                </div>

                                <div class="form-group">
                                    <label class="small font-weight-bold text-gray-700">Nomor WhatsApp / HP Aktif *</label>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required placeholder="08xxxxxxxxxx">
                                </div>

                                <div class="form-group">
                                    <label class="small font-weight-bold text-gray-700">Alamat Pengiriman Lengkap *</label>
                                    <textarea class="form-control" name="address" rows="3" required placeholder="Jalan, No Rumah, RT/RW, Kelurahan, Kecamatan, Kota/Kabupaten, Kode Pos">{{ old('address') }}</textarea>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <label class="small font-weight-bold text-gray-700">Password *</label>
                                        <input type="password" class="form-control" name="password" required placeholder="Minimal 6 karakter">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="small font-weight-bold text-gray-700">Konfirmasi Password *</label>
                                        <input type="password" class="form-control" name="password_confirmation" required placeholder="Ulangi password">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block font-weight-bold py-2 shadow-sm mt-3">
                                    <i class="fas fa-user-plus mr-1"></i> Daftar Sekarang
                                </button>
                            </form>

                            <hr class="my-4">
                            <div class="text-center">
                                <span class="small text-muted">Sudah punya akun?</span>
                                <a class="small font-weight-bold ml-1 text-primary" href="{{ route('login') }}">Masuk di sini</a>
                            </div>
                            <div class="text-center mt-2">
                                <a class="small text-muted" href="{{ route('frontend.home') }}">
                                    <i class="fas fa-arrow-left mr-1"></i> Kembali ke Beranda
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('asset/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
