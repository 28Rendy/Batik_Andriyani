<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lupa Password - Ganti</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        body {
            color: #000000 !important;
        }
        .card {
            background-color: rgba(255, 248, 235, 0.94) !important;
            backdrop-filter: blur(5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4) !important;
        }
        h1, .h4, .text-gray-900 {
            color: #000000 !important;
            font-weight: 800 !important;
        }
        label, .col-form-label {
            color: #000000 !important;
            font-weight: 700 !important;
            font-size: 0.95rem;
        }
        .form-control {
            color: #000000 !important;
            background-color: #ffffff !important;
            border: 1px solid #ced4da !important;
            font-weight: 600 !important;
        }
        .form-control:focus {
            color: #000000 !important;
            background-color: #ffffff !important;
            border-color: #80bdff !important;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
        }
    </style>
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="center">
                            <div class="col-lg-6 d-none d-lg-block"></div>
                            <div class="col-lg-20">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Ganti Password Anda</h1>
                                    </div>

                                    <form action="{{ session('reset_email') ? route('forgot.update') : route('forgot.store') }}" method="POST">
                                        @csrf
                                        @if (session('reset_email'))
                                             @method('PUT')
                                        @endif
                                    
                                        <div class="form-group">
                                            <label for="email" class="col-form-label text-md-left">Alamat Email</label>
                                            <input type="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_ibu" class="col-form-label text-md-left">Nama Ibu</label>
                                            <input type="text" id="nama_ibu"
                                                class="form-control @error('nama_ibu') is-invalid @enderror"
                                                name="nama_ibu" required autocomplete="nama_ibu">
                                            @error('nama_ibu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="col-form-label text-md-left">Password Baru</label>
                                            <input type="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirmation" class="col-form-label text-md-left">Konfirmasi Password</label>
                                            <input type="password" id="password_confirmation" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>

                                        <div class="form-group mb-0">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary">
                                                    Ubah Password
                                                </button>
                                                <input type="button" class="btn btn-secondary ml-2" value="Back"
                                                    onclick="history.go(-1)">
                                            </div>
                                        </div>
                                    </form>
                                    @if (session('success'))
                                        <div class="alert alert-success mt-3">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('asset/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('asset/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('asset/js/sb-admin-2.min.js') }}"></script>
</body>

</html>
