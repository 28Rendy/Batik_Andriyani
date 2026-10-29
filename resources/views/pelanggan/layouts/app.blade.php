<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Portal Pelanggan') - {{ \App\Models\SiteSetting::getSetting('nama_toko', 'Batik Andriyani') }}</title>

    <link href="{{ asset('asset/img/favicon.png') }}" rel="icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">
    <!-- Vendor CSS -->
    <link href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f7f5f2;
            color: #333;
        }
        .customer-sidebar {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.04);
            padding: 24px 16px;
        }
        .customer-sidebar .nav-link {
            color: #555;
            padding: 12px 18px;
            border-radius: 10px;
            font-weight: 500;
            display: flex;
            align-items: center;
            margin-bottom: 6px;
            transition: all 0.2s;
        }
        .customer-sidebar .nav-link i {
            width: 24px;
            font-size: 17px;
            margin-right: 12px;
        }
        .customer-sidebar .nav-link:hover,
        .customer-sidebar .nav-link.active {
            background-color: #f5ede4;
            color: #6d4c41;
            font-weight: 600;
        }
        .card-custom {
            background: #ffffff;
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.04);
        }
        .btn-batik {
            background-color: #795548;
            color: #fff;
            border-radius: 25px;
            padding: 8px 20px;
            font-weight: 600;
            border: none;
        }
        .btn-batik:hover {
            background-color: #5d4037;
            color: #fff;
        }

        /* Kontras Tinggi untuk teks & background kuning/emas di Portal Pelanggan */
        .text-warning {
            color: #8c5200 !important; /* warna amber tua pekat, sangat kontras di background putih/krem */
            font-weight: 700;
        }

        .btn-warning {
            background-color: #f5af19 !important;
            border-color: #e09e0f !important;
            color: #111111 !important;
            font-weight: 700 !important;
        }

        .btn-warning:hover {
            background-color: #e09e0f !important;
            color: #000000 !important;
        }

        .badge.bg-warning, .badge-warning {
            background-color: #ffc107 !important;
            color: #111111 !important;
            font-weight: 700 !important;
            border: 1px solid #d39e00;
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Navbar Pelanggan -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 shadow-sm" style="background-color: #3e2723 !important;">
        <div class="container">
            <a class="navbar-brand fw-bold font-serif fs-4" href="{{ route('frontend.home') }}">
                <i class="fas fa-gem text-warning me-2"></i>{{ \App\Models\SiteSetting::getSetting('nama_toko', 'Batik Andriyani') }}
            </a>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('frontend.produk') }}" class="btn btn-outline-light btn-sm rounded-pill px-3">
                    <i class="fas fa-shopping-bag me-1"></i> Belanja Lagi
                </a>
                <span class="text-white-50 small d-none d-md-inline">Halo, <strong>{{ Auth::user()->nama }}</strong></span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">
                        <i class="fas fa-sign-out-alt"></i> Keluar
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container py-5">
        <div class="row g-4">
            <!-- Sidebar Menu Pelanggan -->
            <div class="col-lg-3">
                <div class="customer-sidebar mb-4">
                    <div class="text-center pb-3 mb-3 border-bottom">
                        <div class="mx-auto mb-2 position-relative" style="width: 86px; height: 86px;">
                            <div class="w-100 h-100 rounded-circle overflow-hidden bg-light border shadow-sm d-flex align-items-center justify-content-center">
                                @if (Auth::user()->foto && file_exists(public_path('photos/' . Auth::user()->foto)))
                                    <img src="{{ asset('photos/' . Auth::user()->foto) }}" alt="{{ Auth::user()->nama }}" class="w-100 h-100" style="object-fit: cover;">
                                @else
                                    <i class="fas fa-user-circle fa-4x text-secondary"></i>
                                @endif
                            </div>
                            <a href="{{ route('pelanggan.profil') }}" class="position-absolute bottom-0 end-0 bg-warning text-dark rounded-circle p-1 shadow-sm small" title="Ganti Foto Profil" style="width: 26px; height: 26px; display: flex; align-items: center; justify-content: center; font-size: 11px;">
                                <i class="fas fa-camera"></i>
                            </a>
                        </div>
                        <h6 class="fw-bold mb-0 text-dark">{{ Auth::user()->nama }}</h6>
                        <small class="text-muted d-block">{{ Auth::user()->email }}</small>
                    </div>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('pelanggan.dashboard') ? 'active' : '' }}" href="{{ route('pelanggan.dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('pelanggan.pesanan*') ? 'active' : '' }}" href="{{ route('pelanggan.pesanan') }}">
                                <i class="fas fa-receipt"></i> Pesanan Saya
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('pelanggan.profil') ? 'active' : '' }}" href="{{ route('pelanggan.profil') }}">
                                <i class="fas fa-user-cog"></i> Pengaturan Akun
                            </a>
                        </li>
                        <li class="nav-item mt-3 pt-3 border-top">
                            <a class="nav-link text-primary fw-bold" href="{{ route('frontend.home') }}" target="_blank">
                                <i class="fas fa-external-link-alt text-primary"></i> Ke Toko Utama <span class="badge bg-light text-dark border ms-auto small">Tab Baru</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-lg-9">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show rounded-4" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('warning'))
                    <div class="alert alert-warning alert-dismissible fade show rounded-4" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>{{ session('warning') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Script Bootstrap -->
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('scripts')
</body>
</html>

