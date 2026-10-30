<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', \App\Models\SiteSetting::getSetting('nama_toko', 'Batik Andriyani')) - {{ \App\Models\SiteSetting::getSetting('tagline', 'Batik Tulis Khas Nusantara') }}</title>
    <meta name="description" content="{{ \App\Models\SiteSetting::getSetting('deskripsi_toko', 'Batik Tulis Berkualitas') }}">

    <!-- Favicon -->
    <link href="{{ asset('asset/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('asset/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,500;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Main CSS File -->
    <link href="{{ asset('asset/css/main.css') }}" rel="stylesheet">

    <style>
        /* =====================================================
           OVERRIDE CSS VARIABLES main.css
           Semua warna di-override di root agar tidak perlu !important berulang
           ===================================================== */
        :root {
            --primary-color: #795548;
            --primary-dark: #4e342e;
            --accent-gold: #c59b27;
            --accent-dark-gold: #8d5b28;
            --font-serif: 'Playfair Display', Georgia, serif;
            --font-sans: 'Plus Jakarta Sans', sans-serif;

            /* Override variabel main.css agar hover nav tidak jadi putih */
            --nav-color: #3e2723;
            --nav-hover-color: #3e2723;           /* FIX #1: hover teks tetap cokelat tua, BUKAN putih */
            --nav-mobile-background-color: #ffffff;
            --nav-dropdown-background-color: #ffffff;
            --nav-dropdown-color: #3e2723;
            --nav-dropdown-hover-color: #795548;

            /* Override warna default teks & background */
            --default-color: #2b2b2b;
            --heading-color: #1a0f0a;
            --background-color: #faf8f5;          /* FIX #2: background bukan hitam */
        }

        body {
            font-family: var(--font-sans);
            color: #2b2b2b;
            background-color: #faf8f5;
        }

        /* Pastikan elemen dengan class text-white dan heading di dalamnya selalu berwarna putih */
        .text-white, .text-white h1, .text-white h2, .text-white h3, .text-white h4, .text-white h5, .text-white h6 {
            color: #ffffff !important;
        }

        /* Kontras Tinggi untuk teks & background kuning/emas di Frontend */
        .text-warning, .section-subtitle {
            color: #8c5200 !important; /* warna cokelat keemasan tua pekat, kontras tinggi & jelas terbaca */
            font-weight: 700 !important;
            letter-spacing: 0.5px;
        }

        .btn-warning {
            background-color: #f5af19 !important;
            border-color: #e09e0f !important;
            color: #111111 !important; /* teks hitam pekat */
            font-weight: 700 !important;
        }

        .btn-warning:hover {
            background-color: #e09e0f !important;
            color: #000000 !important;
        }

        .badge.bg-warning, .badge-warning {
            background-color: #ffc107 !important;
            color: #111111 !important; /* teks hitam pekat di atas background emas */
            font-weight: 700 !important;
            border: 1px solid #d39e00;
        }

        h1, h2, h3, h4, .font-serif {
            font-family: var(--font-serif);
        }

        .header {
            background: #ffffff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            padding: 14px 0;
        }

        .header .sitename {
            font-family: var(--font-serif);
            font-weight: 700;
            font-size: 24px;
            color: var(--primary-dark);
            margin: 0;
        }

        .navmenu ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            align-items: center;
            gap: 8px;
        }

        .navmenu a,
        .navmenu a:focus {
            color: #3e2723 !important;
            font-weight: 500;
            font-size: 15px;
            padding: 8px 16px;
            border-radius: 20px;
            transition: all 0.25s ease;
            text-decoration: none;
        }

        /* Perbaikan: Saat hover teks tetap cokelat tua pekat, tidak menjadi putih */
        .navmenu a:hover,
        .navmenu li:hover > a,
        .navmenu a.active,
        .navmenu .active,
        .navmenu .active:focus {
            color: #3e2723 !important;
            background-color: #f3ece4 !important;
            font-weight: 700 !important;
        }

        /* FIX #1 ekstra: garis bawah animasi dari main.css pakai warna batik */
        .navmenu a:hover:before,
        .navmenu li:hover > a:before,
        .navmenu .active:before {
            background-color: #795548 !important;
        }

        .btn-auth-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            white-space: nowrap;
            background: linear-gradient(135deg, #795548, #5d4037);
            color: #fff !important;
            padding: 7px 18px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 13.5px;
            line-height: 1.2;
            border: none;
            box-shadow: 0 2px 8px rgba(121, 85, 72, 0.25);
            text-decoration: none;
            transition: all 0.25s ease;
            flex-shrink: 0;
        }

        .btn-auth-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(121, 85, 72, 0.35);
            color: #fff !important;
            background: linear-gradient(135deg, #6d4c41, #4e342e);
        }

        .floating-wa {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #25d366;
            color: #fff;
            width: 58px;
            height: 58px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
            z-index: 999;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .floating-wa:hover {
            transform: scale(1.1);
            color: #fff;
        }

        /* Perbaikan: Footer teks terang kontras di atas cokelat tua */
        .footer {
            background: #2b211b;
            background-color: #2b211b !important;
            color: #f0e6da !important;
            padding: 60px 0 30px 0;
            margin-top: 60px;
        }

        .footer h4 {
            color: #ffffff !important;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer p,
        .footer span,
        .footer li,
        .footer .text-muted,
        .footer div {
            color: #ded6cf !important; /* warna krem terang terbaca jelas */
        }

        .footer a {
            color: #f5ece4 !important;
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer a:hover {
            color: #ffc107 !important;
        }

        /* Perbaikan: Judul banner halaman wajib putih bersih */
        .page-header-banner {
            background: linear-gradient(rgba(35, 25, 20, 0.85), rgba(35, 25, 20, 0.9)), url('{{ asset("asset/img/about.jpg") }}') center/cover no-repeat;
            padding: 85px 0 55px 0;
            color: #ffffff !important;
            text-align: center;
            margin-top: 70px;
        }

        .page-header-banner h1,
        .page-header-banner h2,
        .page-header-banner .display-5 {
            color: #ffffff !important;
            font-weight: 700 !important;
            text-shadow: 0 2px 10px rgba(0,0,0,0.6);
        }

        .page-header-banner p,
        .page-header-banner .lead,
        .page-header-banner .text-white-50 {
            color: #f5ede4 !important;
            text-shadow: 0 1px 5px rgba(0,0,0,0.6);
        }
        .card-product {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            background: #fff;
        }

        .card-product:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }
    </style>
    @yield('styles')
</head>

<body>

    <!-- Header & Navigation -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('frontend.home') }}" class="logo d-flex align-items-center text-decoration-none">
                @php
                    $logoPath = \App\Models\SiteSetting::getSetting('logo');
                @endphp
                @if ($logoPath && file_exists(public_path($logoPath)))
                    <img src="{{ asset($logoPath) }}" alt="Logo" style="max-height: 44px;" class="me-2">
                @else
                    <i class="fas fa-gem text-warning fs-3 me-2"></i>
                @endif
                <h1 class="sitename">{{ \App\Models\SiteSetting::getSetting('nama_toko', 'Batik Andriyani') }}</h1>
            </a>

            <!-- Menu Navigasi Multi-Page -->
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('frontend.home') }}" class="{{ request()->routeIs('frontend.home') ? 'active' : '' }}">Beranda</a></li>
                    <li><a href="{{ route('frontend.produk') }}" class="{{ request()->routeIs('frontend.produk*') ? 'active' : '' }}">Katalog Produk</a></li>
                    <li><a href="{{ route('frontend.galeri') }}" class="{{ request()->routeIs('frontend.galeri') ? 'active' : '' }}">Galeri Foto</a></li>
                    <li><a href="{{ route('frontend.berita') }}" class="{{ request()->routeIs('frontend.berita*') ? 'active' : '' }}">Berita</a></li>
                    <li><a href="{{ route('frontend.tentang') }}" class="{{ request()->routeIs('frontend.tentang') ? 'active' : '' }}">Tentang Kami</a></li>
                    <li><a href="{{ route('frontend.kontak') }}" class="{{ request()->routeIs('frontend.kontak') ? 'active' : '' }}">Kontak & FAQ</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <!-- Autentikasi Tombol -->
            <div class="d-flex align-items-center ms-3 flex-shrink-0">
                @guest
                    <a class="btn-auth-primary" href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt me-1.5"></i> Masuk
                    </a>
                @else
                    @if (in_array(Auth::user()->roles, ['PEMILIK', 'ADMIN', 'STAFF']) && Auth::user()->tipe_akun !== 'pelanggan')
                        <a class="btn-auth-primary" href="{{ url('/home') }}">
                            <i class="fas fa-tachometer-alt me-1.5"></i> Panel Admin
                        </a>
                    @else
                        <div class="d-flex align-items-center gap-2">
                            <a class="btn btn-warning rounded-pill px-3 py-1 font-weight-bold shadow-sm text-dark d-flex align-items-center" href="{{ route('pelanggan.dashboard') }}">
                                <i class="fas fa-columns me-1.5"></i> Dashboard Pelanggan
                            </a>
                            <div class="dropdown">
                                <button class="btn btn-outline-dark dropdown-toggle rounded-pill px-2.5 py-1 font-weight-bold" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if (Auth::user()->foto && file_exists(public_path('photos/' . Auth::user()->foto)))
                                        <img src="{{ asset('photos/' . Auth::user()->foto) }}" class="rounded-circle me-1" style="width: 24px; height: 24px; object-fit: cover;">
                                    @else
                                        <i class="fas fa-user-circle me-1"></i>
                                    @endif
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userMenu">
                                    <li><a class="dropdown-item" href="{{ route('pelanggan.dashboard') }}"><i class="fas fa-home me-2"></i> Dashboard Pelanggan</a></li>
                                    <li><a class="dropdown-item" href="{{ route('pelanggan.pesanan') }}"><i class="fas fa-shopping-bag me-2"></i> Riwayat Pesanan</a></li>
                                    <li><a class="dropdown-item" href="{{ route('pelanggan.profil') }}"><i class="fas fa-user-cog me-2"></i> Pengaturan Akun</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-2"></i> Keluar</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                @endguest
            </div>

        </div>
    </header>

    <!-- Main Content -->
    <main class="main" style="min-height: 70vh;">
        @yield('content')
    </main>

    <!-- Tombol WhatsApp Floating -->
    @php
        $wa = \App\Models\SiteSetting::getSetting('whatsapp', '628123456789');
    @endphp
    <a href="https://wa.me/{{ $wa }}?text=Halo%20Batik%20Andriyani,%20saya%20tertarik%20dengan%20produk%20batik%20Anda." target="_blank" class="floating-wa shadow" title="Chat WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <h4 class="font-serif">{{ \App\Models\SiteSetting::getSetting('nama_toko', 'Batik Andriyani') }}</h4>
                    <p class="small text-muted mb-3">{{ \App\Models\SiteSetting::getSetting('deskripsi_toko', 'Batik Tulis Khas Nusantara Berkualitas Tinggi.') }}</p>
                    <p class="small mb-1"><i class="fas fa-map-marker-alt me-2 text-warning"></i> {{ \App\Models\SiteSetting::getSetting('alamat', 'Indonesia') }}</p>
                    <p class="small mb-1"><i class="fas fa-clock me-2 text-warning"></i> {{ \App\Models\SiteSetting::getSetting('jam_buka', '08.00 - 17.00') }}</p>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4>Navigasi Halaman</h4>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ route('frontend.home') }}"><i class="fas fa-chevron-right me-1 small"></i> Beranda</a></li>
                        <li class="mb-2"><a href="{{ route('frontend.produk') }}"><i class="fas fa-chevron-right me-1 small"></i> Katalog Batik</a></li>
                        <li class="mb-2"><a href="{{ route('frontend.galeri') }}"><i class="fas fa-chevron-right me-1 small"></i> Galeri Foto</a></li>
                        <li class="mb-2"><a href="{{ route('frontend.berita') }}"><i class="fas fa-chevron-right me-1 small"></i> Berita & Artikel</a></li>
                        <li class="mb-2"><a href="{{ route('frontend.tentang') }}"><i class="fas fa-chevron-right me-1 small"></i> Tentang Kami</a></li>
                        <li class="mb-2"><a href="{{ route('frontend.kontak') }}"><i class="fas fa-chevron-right me-1 small"></i> Hubungi Kami</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h4>Akun</h4>
                    <ul class="list-unstyled small">
                        @guest
                            <li class="mb-2"><a href="{{ route('login') }}">Masuk</a></li>
                            <li class="mb-2"><a href="{{ route('register.pelanggan') }}">Daftar Pelanggan</a></li>
                        @else
                            <li class="mb-2"><a href="{{ route('pelanggan.dashboard') }}">Dashboard Saya</a></li>
                            <li class="mb-2"><a href="{{ route('pelanggan.pesanan') }}">Pesanan Saya</a></li>
                            <li class="mb-2"><a href="{{ route('pelanggan.profil') }}">Profil Saya</a></li>
                        @endguest
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4>Hubungi Kami</h4>
                    <p class="small mb-2"><i class="bi bi-whatsapp me-2 text-success"></i> WhatsApp: <a href="https://wa.me/{{ $wa }}" target="_blank">+{{ $wa }}</a></p>
                    <p class="small mb-3"><i class="bi bi-envelope me-2 text-danger"></i> Email: {{ \App\Models\SiteSetting::getSetting('email', 'info@batikandriyani.com') }}</p>
                    
                    <div class="d-flex gap-2">
                        @if (\App\Models\SiteSetting::getSetting('instagram'))
                            <a href="{{ \App\Models\SiteSetting::getSetting('instagram') }}" target="_blank" class="btn btn-outline-light btn-sm rounded-circle"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if (\App\Models\SiteSetting::getSetting('facebook'))
                            <a href="{{ \App\Models\SiteSetting::getSetting('facebook') }}" target="_blank" class="btn btn-outline-light btn-sm rounded-circle"><i class="fab fa-facebook-f"></i></a>
                        @endif
                    </div>
                </div>
            </div>

            <hr class="border-secondary mt-5 mb-4">
            <div class="text-center small text-muted">
                {{ \App\Models\SiteSetting::getSetting('footer_teks', '© 2025 Batik Andriyani. Hak cipta dilindungi.') }}
            </div>
        </div>
    </footer>

    <!-- Scroll To Top Button -->
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center" style="position:fixed;bottom:20px;right:20px;width:40px;height:40px;background:#8B4513;color:#fff;border-radius:50%;opacity:0;transition:all 0.4s;z-index:9999;text-decoration:none;display:none !important;">
        <i class="bi bi-arrow-up-short" style="font-size:1.4rem;"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('asset/vendor/bootstrap/js/Groovin/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('asset/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('asset/js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>

