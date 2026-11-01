<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script src="{{ asset('asset/vendor/jquery/jquery.min.js') }}"></script>

    <style>
        /* Kontras warna tajam untuk teks di Admin Panel (mencegah teks samar di background kuning/emas) */
        .badge-warning, .badge.bg-warning {
            background-color: #ffc107 !important;
            color: #111111 !important;
            font-weight: 700 !important;
            border: 1px solid #d39e00;
        }
        .btn-warning {
            background-color: #ffc107 !important;
            border-color: #e0a800 !important;
            color: #111111 !important;
            font-weight: 700 !important;
        }
        .btn-warning:hover {
            background-color: #e0a800 !important;
            color: #000000 !important;
        }
        .btn-outline-warning {
            border-color: #d39e00 !important;
            color: #724c00 !important;
            font-weight: 700 !important;
            background-color: #fffbf0;
        }
        .btn-outline-warning:hover, .btn-outline-warning.active {
            background-color: #ffc107 !important;
            color: #111111 !important;
        }
        .text-warning {
            color: #8c5200 !important; /* amber/emas tua pekat yang kontras tajam di atas background putih/terang */
            font-weight: 700;
        }
        .collapse-item i {
            width: 18px;
            text-align: center;
        }

        /* Pastikan form input & card di Admin Panel selalu putih bersih dengan teks hitam pekat */
        .card {
            background-color: #ffffff !important;
        }
        .card-body {
            background-color: #ffffff !important;
            color: #212529 !important;
        }
        .form-control, input.form-control, textarea.form-control, select.form-control {
            background-color: #ffffff !important;
            color: #111111 !important;
            border: 1px solid #c5bba8 !important;
            font-size: 14px !important;
        }
        .form-control:focus {
            background-color: #ffffff !important;
            color: #000000 !important;
            border-color: #795548 !important;
            box-shadow: 0 0 0 0.2rem rgba(121, 85, 72, 0.2) !important;
        }
        /* Perbaiki placeholder agar abu-abu ringan, bukan ikut warna krem */
        .form-control::placeholder {
            color: #999 !important;
            opacity: 1;
        }
        /* Override native input tag (tidak pakai class form-control) */
        input[type="text"]:not(.form-control),
        input[type="email"]:not(.form-control),
        input[type="number"]:not(.form-control),
        input[type="password"]:not(.form-control),
        input[type="tel"]:not(.form-control) {
            background-color: #ffffff !important;
            color: #111111 !important;
        }
        /* Card header */
        .card-header {
            background-color: #f8f3ec !important;
            color: #2b211b !important;
            border-bottom: 2px solid #d4c4a8 !important;
            font-weight: 700 !important;
        }
        /* Teks sub-menu collapse sidebar agar terbaca */
        .collapse-inner .collapse-item {
            color: #2b211b !important;
            font-weight: 500;
        }
        .collapse-inner .collapse-item:hover,
        .collapse-inner .collapse-item.active {
            background-color: #e8dfd4 !important;
            color: #1a0f0a !important;
        }
        label, strong {
            color: #2b211b !important;
        }

        /* ====================================================
           EFEK BLOK WARNA AKTIF SIDEBAR BACKEND ADMIN
           ==================================================== */
        .sidebar .nav-item {
            margin-bottom: 3px;
        }
        .sidebar .sidebar-menu-box {
            background-color: rgba(60, 50, 40, 0.65);
            border-radius: 8px;
            margin: 4px 10px;
            padding: 2px 6px;
            transition: all 0.25s ease-in-out;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .sidebar .sidebar-menu-box:hover {
            background-color: rgba(130, 90, 50, 0.85);
            transform: translateX(4px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }
        /* Blok warna aktif yang kontras & menyala */
        .sidebar .sidebar-menu-box.active {
            background: linear-gradient(135deg, #d48b28 0%, #795548 100%) !important;
            border-left: 5px solid #ffffff !important;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.45) !important;
            transform: translateX(4px);
        }
        .sidebar .sidebar-menu-box.active .nav-link span {
            color: #ffffff !important;
            font-weight: 800 !important;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.7);
        }
        .sidebar .sidebar-menu-box.active .nav-link i {
            color: #ffffff !important;
            transform: scale(1.15);
        }

        /* Sub-menu di dalam collapse aktif */
        .collapse-inner .collapse-item {
            font-weight: 600;
            transition: all 0.2s ease;
            border-radius: 6px;
            margin: 2px 6px;
            color: #2b211b !important;
        }
        .collapse-inner .collapse-item:hover {
            background-color: #f3ece4 !important;
            color: #8d5b28 !important;
        }
        .collapse-inner .collapse-item.active-sub {
            background: linear-gradient(135deg, #c58b27, #8d5b28) !important;
            color: #ffffff !important;
            font-weight: 700 !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }
        .collapse-inner .collapse-item.active-sub i {
            color: #ffffff !important;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul style="width: 250px" class="navbar-nav bg-gradient-primary sidebar sidebar-light accordion"
            id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
                <div class="sidebar-brand-icon rotate-n-0">
                    <img style="border-radius: 15px" src="{{ asset('asset/img/logo_batik.png') }}" width="60">
                </div>
                <div class="sidebar-brand-text mx-2 text-light ">Andriyani Batik</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Dashboard Link -->
            @php $isDashboard = Request::is('home*'); @endphp
            <li class="nav-item {{ $isDashboard ? 'active' : '' }}">
                <div class="sidebar-menu-box {{ $isDashboard ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fas fa-fw fa-home"></i>
                        <b><span class="text-light">Dashboard</span></b>
                    </a>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            @if (in_array(Auth::user()->roles, ['PEMILIK', 'ADMIN']))
                @php $isUser = Request::is('user*'); @endphp
                <li class="nav-item {{ $isUser ? 'active' : '' }}">
                    <div class="sidebar-menu-box {{ $isUser ? 'active' : '' }}">
                        <a style="padding-top: 7px; padding-bottom: 7px" class="nav-link"
                            href="{{ url('/user') }}">
                            <i class="fas fa-fw fa-user"></i>
                            <b><span class="text-light">Data Pengguna</span></b>
                        </a>
                    </div>
                </li>
            @endif

            <!-- Data Barang -->
            @php $isDataBarang = Request::is('Sjadi*') || Request::is('Psendiri*') || Request::is('persediaan*'); @endphp
            <li class="nav-item {{ $isDataBarang ? 'active' : '' }}">
                <div class="sidebar-menu-box {{ $isDataBarang ? 'active' : '' }}">
                    <a style="padding-top: 7px; padding-bottom: 7px" class="nav-link {{ $isDataBarang ? '' : 'collapsed' }}" href="#collapseDataBarang"
                        data-toggle="collapse" data-target="#collapseDataBarang" aria-expanded="{{ $isDataBarang ? 'true' : 'false' }}"
                        aria-controls="collapseDataBarang">
                        <i class="fas fa-fw fa-folder-open"></i>
                        <b><span class="text-light">Data Barang</span></b>
                    </a>
                </div>
                <div id="collapseDataBarang"
                    class="collapse {{ $isDataBarang ? 'show' : '' }}"
                    aria-labelledby="headingDataBarang">
                    <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                        <a class="collapse-item {{ Request::is('Sjadi*') ? 'active-sub' : '' }}"
                            href="{{ url('/Sjadi') }}"><i class="fas fa-arrow-circle-right mr-1"></i> Setengah Jadi</a>
                        <a class="collapse-item {{ Request::is('Psendiri*') ? 'active-sub' : '' }}"
                            href="{{ url('/Psendiri') }}"><i class="fas fa-arrow-circle-right mr-1"></i> Produksi Sendiri</a>
                    </div>
                </div>
            </li>

            <!-- Kategori Batik -->
            @php $isKategori = Request::is('motif*') || Request::is('Jkain*') || Request::is('ukuran*'); @endphp
            <li class="nav-item {{ $isKategori ? 'active' : '' }}">
                <div class="sidebar-menu-box {{ $isKategori ? 'active' : '' }}">
                    <a style="padding-top: 7px; padding-bottom: 7px" class="nav-link {{ $isKategori ? '' : 'collapsed' }}" href="#collapseKategoriBatik"
                        data-toggle="collapse" data-target="#collapseKategoriBatik" aria-expanded="{{ $isKategori ? 'true' : 'false' }}"
                        aria-controls="collapseKategoriBatik">
                        <i class="fas fa-fw fa-list-alt"></i>
                        <b><span class="text-light">Kategori Batik</span></b>
                    </a>
                </div>
                <div id="collapseKategoriBatik"
                    class="collapse {{ $isKategori ? 'show' : '' }}"
                    aria-labelledby="headingKategoriBatik">
                    <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                        <a class="collapse-item {{ Request::is('motif*') ? 'active-sub' : '' }}"
                            href="{{ url('/motif') }}"><i class="fas fa-arrow-circle-right mr-1"></i> Motif</a>
                        <a class="collapse-item {{ Request::is('Jkain*') ? 'active-sub' : '' }}"
                            href="{{ url('/Jkain') }}"><i class="fas fa-arrow-circle-right mr-1"></i> Jenis Kain</a>
                        <a class="collapse-item {{ Request::is('ukuran*') ? 'active-sub' : '' }}"
                            href="{{ url('/ukuran') }}"><i class="fas fa-arrow-circle-right mr-1"></i> Ukuran</a>
                    </div>
                </div>
            </li>

            <!-- Penjualan Menu -->
            @php $isPenjualan = Request::is('psetengah*') || Request::is('ppsendiri*'); @endphp
            <li class="nav-item {{ $isPenjualan ? 'active' : '' }}">
                <div class="sidebar-menu-box {{ $isPenjualan ? 'active' : '' }}">
                    <a style="padding-top: 7px; padding-bottom: 7px" class="nav-link {{ $isPenjualan ? '' : 'collapsed' }}" href="#collapsePenjualan"
                        data-toggle="collapse" data-target="#collapsePenjualan" aria-expanded="{{ $isPenjualan ? 'true' : 'false' }}"
                        aria-controls="collapsePenjualan">
                        <i class="fas fa-fw fa-exchange-alt"></i>
                        <b><span class="text-light">Penjualan</span></b>
                    </a>
                </div>
                <div style="margin-bottom: 7px" id="collapsePenjualan"
                    class="collapse {{ $isPenjualan ? 'show' : '' }}"
                    aria-labelledby="headingPenjualan">
                    <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                        <a class="collapse-item {{ Request::is('psetengah*') ? 'active-sub' : '' }}"
                            href="{{ url('/psetengah') }}"><i class="fas fa-arrow-circle-right mr-1"></i> Penj Setengah Jadi</a>
                        <a class="collapse-item {{ Request::is('ppsendiri*') ? 'active-sub' : '' }}"
                            href="{{ url('/ppsendiri') }}"><i class="fas fa-arrow-circle-right mr-1"></i> Penj Produk Sendiri</a>
                    </div>
                </div>
            </li>

            <!-- Keuangan Menu -->
            @php $isKeuangan = Request::is('pengeluaran*') || Request::is('bukubesar*') || Request::is('akun*'); @endphp
            <li class="nav-item {{ $isKeuangan ? 'active' : '' }}">
                <div class="sidebar-menu-box {{ $isKeuangan ? 'active' : '' }}">
                    <a style="padding-top: 7px; padding-bottom: 7px" class="nav-link {{ $isKeuangan ? '' : 'collapsed' }}" href="#collapseKeuangan"
                        data-toggle="collapse" data-target="#collapseKeuangan" aria-expanded="{{ $isKeuangan ? 'true' : 'false' }}"
                        aria-controls="collapseKeuangan">
                        <i class="fas fa-fw fa-wallet"></i>
                        <b><span class="text-light">Menu Keuangan lain</span></b>
                    </a>
                </div>
                <div id="collapseKeuangan" class="collapse {{ $isKeuangan ? 'show' : '' }}"
                    aria-labelledby="headingKeuangan">
                    <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                        <a class="collapse-item {{ Request::is('pengeluaran*') ? 'active-sub' : '' }}"
                            href="{{ url('/pengeluaran') }}"><i class="fas fa-arrow-circle-right mr-1"></i> Pengeluaran Kas</a>
                    </div>
                </div>
            </li>

            <!-- Pesanan Online Pelanggan -->
            @php $isPesanan = Request::is('admin/pesanan*'); @endphp
            <li class="nav-item {{ $isPesanan ? 'active' : '' }}">
                <div class="sidebar-menu-box {{ $isPesanan ? 'active' : '' }}">
                    <a style="padding-top: 7px; padding-bottom: 7px" class="nav-link"
                        href="{{ url('/admin/pesanan') }}">
                        <i class="fas fa-fw fa-shopping-cart text-warning"></i>
                        <b><span class="text-light">Pesanan Online</span></b>
                    </a>
                </div>
            </li>

            <!-- Kelola Website (CMS) -->
            @if (in_array(Auth::user()->roles, ['PEMILIK', 'ADMIN']))
            @php
                $isCmsActive = Request::is('admin/site-settings*') || Request::is('admin/hero-slider*') || Request::is('admin/galeri*') || Request::is('admin/faq*') || Request::is('berita*');
            @endphp
            <li class="nav-item {{ $isCmsActive ? 'active' : '' }}">
                <div class="sidebar-menu-box {{ $isCmsActive ? 'active' : '' }}">
                    <a style="padding-top: 7px; padding-bottom: 7px" class="nav-link {{ $isCmsActive ? '' : 'collapsed' }}" href="#collapseCMS"
                        data-toggle="collapse" data-target="#collapseCMS" aria-expanded="{{ $isCmsActive ? 'true' : 'false' }}"
                        aria-controls="collapseCMS">
                        <i class="fas fa-fw fa-globe text-info"></i>
                        <b><span class="text-light">Kelola Website (CMS)</span></b>
                    </a>
                </div>
                <div id="collapseCMS"
                    class="collapse {{ $isCmsActive ? 'show' : '' }}"
                    aria-labelledby="headingCMS">
                    <div class="bg-white py-2 collapse-inner rounded shadow-sm">
                        <a class="collapse-item {{ Request::is('admin/site-settings*') ? 'active-sub' : '' }}"
                            href="{{ url('/admin/site-settings') }}"><i class="fas fa-store mr-1"></i> Identitas Toko & Kontak</a>
                        <a class="collapse-item {{ Request::is('admin/hero-slider*') ? 'active-sub' : '' }}"
                            href="{{ url('/admin/hero-slider') }}"><i class="fas fa-images mr-1"></i> Hero Slider (Banner)</a>
                        <a class="collapse-item {{ Request::is('admin/galeri*') ? 'active-sub' : '' }}"
                            href="{{ url('/admin/galeri') }}"><i class="fas fa-camera mr-1"></i> Galeri Foto</a>
                        <a class="collapse-item {{ Request::is('admin/faq*') ? 'active-sub' : '' }}"
                            href="{{ url('/admin/faq') }}"><i class="fas fa-question-circle mr-1"></i> Kelola FAQ</a>
                        <a class="collapse-item {{ Request::is('berita*') ? 'active-sub' : '' }}"
                            href="{{ url('/berita') }}"><i class="fas fa-newspaper mr-1"></i> Berita & Artikel</a>
                        <hr class="my-1">
                        <a class="collapse-item text-success font-weight-bold"
                            href="{{ url('/') }}" target="_blank"><i class="fas fa-external-link-alt text-success mr-1"></i> Lihat Website Publik</a>
                    </div>
                </div>
            </li>
            @endif

            <!-- Laporan -->
            @if (in_array(Auth::user()->roles, ['PEMILIK', 'ADMIN']))
            @php $isLaporan = Request::is('laporan*'); @endphp
            <li class="nav-item {{ $isLaporan ? 'active' : '' }}">
                <div class="sidebar-menu-box {{ $isLaporan ? 'active' : '' }}">
                    <a style="padding-top: 7px; padding-bottom: 7px" class="nav-link"
                        href="{{ url('/laporan/index') }}">
                        <i class="fas fa-fw fa-chart-bar"></i>
                        <b><span class="text-light">Laporan</span></b>
                    </a>
                </div>
            </li>
            @endif

            <!-- Logout -->
            <li class="nav-item">
                <div class="sidebar-menu-box">
                    <a style="padding-top: 7px; padding-bottom: 7px; cursor: pointer" class="nav-link"
                        data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-fw fa-share"></i>
                        <b><span class="text-light">Keluar</span></b>
                    </a>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-dark topbar mb-2 static-top shadow">


                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <div style="width: 100% ">
                        <div class="card-header bg-primary text-white text-center">
                            <i class="fas fa-user"></i> <!-- Add appropriate icon -->
                            <strong>Welcome Back.... !!!</strong>
                            <i>{{ Auth::user()->nama ?? 'Guest' }}</i> di website Andriyani Batik
                        </div>

                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        {{-- <div class="topbar-divider d-none d-sm-block"></div> --}}

                        <!-- Nav Item - User Information -->
                        {{-- <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><b>{{ Auth::user()->nama ?? 'Guest' }}</b></span>
                        <img class="img-profile rounded-circle" src="{{ asset('asset/img/avatar2.png') }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal"
                                data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                        </li> --}}
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <!-- Page Heading -->
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-secondary">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span class="text-light">Copyright &copy; OkwanFast ~ Andriyani Batik 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light" id="exampleModalLabel">Keluar Aplikasi</h5>
                    <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body bg-light">
                    <p class="text-dark">Pilih "Logout" apabila ingin keluar aplikasi</p>
                </div>
                <div class="modal-footer bg-light">
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('asset/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('asset/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('asset/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset/js/demo/datatables-demo.js') }}"></script>

    <script>
        $(document).ready(function () {
            // Pastikan klik pada toggler collapse membuka/menutup submenu dengan mulus
            $('[data-toggle="collapse"]').on('click', function (e) {
                e.preventDefault();
                var target = $(this).attr('data-target') || $(this).attr('href');
                if (target && target.startsWith('#')) {
                    $(target).collapse('toggle');
                }
            });

            // Pastikan semua link menu (nav-link & collapse-item) selalu dapat diklik dan bernavigasi tanpa halangan
            $('.sidebar a[href]').not('[data-toggle="collapse"]').not('[data-toggle="modal"]').on('click', function (e) {
                var url = $(this).attr('href');
                if (url && url !== '#' && !url.startsWith('javascript:')) {
                    window.location.href = url;
                }
            });
        });
    </script>
</body>

</html>