<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Welcome To Andriyani Batik</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="asset/img/favicon.png" rel="icon">
    <link href="asset/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="asset/vendor/aos/aos.css" rel="stylesheet">
    <link href="asset/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="asset/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="asset/css/main.css" rel="stylesheet">
    <link href="asset/css/custom.css" rel="stylesheet">
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="http://localhost:8000/" class="gap-3 logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('asset/img/logo_batik.png') }}" alt="">
                <h1 class="sitename">Andriyani Batik</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#about">Berita</a></li>
                    <li><a href="#services">Fitur</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="http://localhost:8000/login">Masuk</a>

        </div>
    </header>

    <mainclass="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-item active">
                <img src="asset/assets/img//template/Groovin/hero-carousel/suluran.png" alt="">
                <div class="carousel-container">
                    <h2>Batik Suluran Latar Remek</h2>
                    <p>Batik motif suluran latar remek ini mempunyai makna yang sangat dalam dan bersejarah.
                        Makna dari motif suluran latar remek ini adalah keinginan untuk mempertahankan
                        tradisi dan budaya yang telah diwariskan oleh nenek moyang.</p>
                </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
                <img src="asset/assets/img//template/Groovin/hero-carousel/buketan.png" alt="">
                <div class="carousel-container">
                    <h2>Batik Buketan Latar Jenggot</h2>
                    <p>Batik motif buketan latar jenggot ini mempunyai makna yang sangat berharga dan penuh
                        makna. Makna dari motif buketan latar jenggot ini adalah perjuangan yang keras
                        dan berani untuk mempertahankan tradisi dan budaya yang telah diwariskan oleh
                        nenek moyang.</p>
                </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
                <img src="asset/assets/img//template/Groovin/hero-carousel/sekar_jagat.png" alt="">
                <div class="carousel-container">
                    <h2>Batik Sekar Jagat</h2>
                    <p>Batik motif sekar jagat ini mempunyai makna yang sangat indah dan bersejarah.
                        Makna dari motif sekar jagat ini adalah perjuangan yang keras dan berani untuk
                        mempertahankan tradisi dan budaya yang telah diwariskan oleh nenek moyang.</p>
                </div>
            </div><!-- End Carousel Item -->

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

            <ol class="carousel-indicators"></ol>

        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->

        <div class="other-news-section">

            {{-- <div class="container section-title" data-aos="fade-up">
                <h2>Tentang</h2>
                <p>Berikut adalah latar belakang, tujuan, dan manfaat dari pengembangan Sistem Informasi Penjualan
                    Batik
                    Premium</p>
            </div> --}}
            <div style="margin-bottom: 30px">
                <h2 class="section-title" style="margin-bottom: 30px">Berita Lainnya</h2>
            </div>
            <div class="news-grid">
                {{-- @foreach ($news as $berita)
                    <div class="news-card">
                        <img src="{{ asset('photos/' . $berita->image) }}" alt="Berita 4">
                        <div class="news-card-content">
                            <h3>{{ $berita->title }}</h3>
                            <p>{{ $berita->content }}</p>
                            <div class="date">1 hari yang lalu</div>
                        </div>
                    </div>
                @endforeach --}}

                {{-- <div class="news-card">
                        <img src="https://picsum.photos/400/200?random=6" alt="Berita 5">
                        <div class="news-card-content">
                            <h3>Festival Kuliner Nusantara Hadirkan 500 Menu Tradisional</h3>
                            <p>Acara tahunan ini menampilkan kekayaan kuliner dari 34 provinsi di Indonesia dengan
                                partisipasi lebih dari 200 chef.</p>
                            <div class="date">1 hari yang lalu</div>
                        </div>
                    </div>

                    <div class="news-card">
                        <img src="https://picsum.photos/400/200?random=7" alt="Berita 6">
                        <div class="news-card-content">
                            <h3>Proyek Smart City di Surabaya Memasuki Fase Kedua</h3>
                            <p>Implementasi Internet of Things dan big data analytics untuk meningkatkan kualitas
                                layanan publik di Kota Surabaya.</p>
                            <div class="date">2 hari yang lalu</div>
                        </div>
                    </div>

                    <div class="news-card">
                        <img src="https://picsum.photos/400/200?random=8" alt="Berita 7">
                        <div class="news-card-content">
                            <h3>Tim Robotika Indonesia Juara di Kompetisi Internasional</h3>
                            <p>Prestasi membanggakan dari mahasiswa ITB yang berhasil mengalahkan 50 tim dari 25 negara
                                dalam kompetisi robotika.</p>
                            <div class="date">2 hari yang lalu</div>
                        </div>
                    </div>

                    <div class="news-card">
                        <img src="https://picsum.photos/400/200?random=9" alt="Berita 8">
                        <div class="news-card-content">
                            <h3>Peluncuran Satelit Komunikasi Pertama Buatan Indonesia</h3>
                            <p>Satelit Nusantara-1 berhasil diluncurkan dan akan meningkatkan konektivitas internet di
                                daerah terpencil.</p>
                            <div class="date">3 hari yang lalu</div>
                        </div>
                    </div>

                    <div class="news-card">
                        <img src="https://picsum.photos/400/200?random=10" alt="Berita 9">
                        <div class="news-card-content">
                            <h3>Program Beasiswa Pemerintah untuk Teknologi Hijau</h3>
                            <p>Pemerintah mengalokasikan dana beasiswa khusus untuk penelitian teknologi ramah
                                lingkungan di perguruan tinggi.</p>
                            <div class="date">3 hari yang lalu</div>
                        </div>
                    </div> --}}
            </div>
        </div>
        

        <div class="container" style="margin-top: 50px" data-aos="fade-up">

            <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-6">
                    <div>
                        <img src="{{ asset('photos/' . $news->first()->image) }}" class="img-fluid"
                            style="border-radius: 30px; height: 460px; width: 100%; object-fit: cover;"
                            alt="">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="side-news">
                        @foreach ($news->skip(1) as $berita)
                            <div class="side-news-item">
                                <img style="widhth: 100px; object-fit: cover"
                                    src="{{ asset('photos/' . $berita->image) }}" alt="Berita 1">
                                <div class="side-news-content">
                                    <h3>{{ $berita->title }}</h3>
                                    <p>{{ $berita->content }}</p>
                                    <div>{{ $berita->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ route('semua-berita') }}">
                        <div class="btn-read-more" style="margin-top: 10px;">
                            <span>Semua Berita</span>
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div><!-- End Tab 3 Content -->
        </div>

        </div>

        </div>

        </div>

    </section><!-- /About Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Fitur</h2>
            <p>Andriyani Batik memiliki beberapa fitur yang memudahkan pengguna saat menggunakannya antara lain :
            </p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item  position-relative">
                        <div class="icon">
                            <i class="bi bi-activity"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Data Pengguna</h3>
                        </a>
                        <p>Fitur ini digunakan untuk menginput data pengguna Andriyani Batik, dapat disimpulkan
                            program
                            Andriyani Batik dapat digunakan pada lebih dari satu device.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-broadcast"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Data Penjualan</h3>
                        </a>
                        <p>Fitur ini digunakan untuk menginput setiap transaksi penjualan mulai dari tanggal, barang
                            yang terjual, dan totalnya.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-easel"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Data Pembelian</h3>
                        </a>
                        <p>Fitur ini digunakan untuk menginput setiap transaksi pembelian mulai dari tanggal, barang
                            yang dibeli, dan totalnya.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-bounding-box-circles"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Data Persediaan</h3>
                        </a>
                        <p>Fitur ini digunakan untuk menginput stok persediaan mulai nama barang, jumlah stok, dan
                            harga jual.</p>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div><!-- End Service Item -->

                <!-- <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-calendar4-week"></i>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-chat-square-text"></i>
                        </div>
                        <a href="3" class="stretched-link">
                            <h3>Laporan</h3>
                        </a>
                        <p>Fitur ini digunakan untuk melihat report , penjualan, dan pembelian
                        </p>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

    </section><!-- /Services Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="why-us section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Kenapa Andriyani Batik Jadi Pilihan ?</h2>
            <p>Berikut beberapa alasan mengapa Andriyani Batik cocok dijadikan pilihan untuk usaha batik</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-item">
                        <span>01</span>
                        <h4><a href="#" class="stretched-link">Meminimalkan Biaya Operasional</a></h4>
                        <p>Dengan mengurangi pekerjaan manual, seperti perhitungan stok dan pencatatan laporan,
                            Andriyani Batik membantu mengurangi kebutuhan tenaga kerja tambahan, sehingga lebih
                            hemat biaya dalam usaha batik.
                        </p>
                    </div>
                </div><!-- Card Item -->

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-item">
                        <span>02</span>
                        <h4><a href="#" class="stretched-link">Kemudahan Penggunaan</a></h4>
                        <p>Antarmuka intuitif, sehingga dapat digunakan tanpa memerlukan pelatihan khusus.Tersedia
                            deskripsi dari setiap fitur yang membantu pengguna memulai dengan cepat.</p>
                    </div>
                </div><!-- Card Item -->

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-item">
                        <span>03</span>
                        <h4><a href="#" class="stretched-link">Laporan Terintegrasi untuk Pengambilan
                                Keputusan</a></h4>
                                </div>
                </div><!-- Card Item -->

            </div>

        </div>

    </section><!-- /Why Us Section -->

    <!-- Team Section -->
    <section id="team" class="team section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Pemilik Andriyani Batik</h2>

        </div><!-- End Section Title -->

        <div class="container">

            <div style="display: flex ; justify-content: center;align-items: center" class="row gy-4">

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <img src="asset/img/team/andriyani.png" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>andriyani_batik</h4>
                                <div class="social">
                                    <a href="https://instagram.com/andriyani_batik"><i
                                            class="bi bi-instagram"></i></a>
                                    <a href="https://www.linkedin.com/in/andriyani_batik"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->
                <!-- Section Title -->

            </div>

        </div>

    </section><!-- /Team Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Yang Sering Ditanyakan Terkait Andriyani Batik</h2>
            <p>Berikut hal yang sering ditanyakan mengenai program Andriyani Batik</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-8">

                    <div class="faq-container">

                        <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
                            <i class="faq-icon bi bi-question-circle"></i>
                            <h3>Apa itu Andriyani Batik??</h3>
                            <div class="faq-content">
                                <p>Andriyani Batik adalah sebuah sistem informasi sederhana yang dirancang khusus
                                    untuk
                                    membantu UMKM di sektor batik dalam mengelola proses bisnis mereka, mulai dari
                                    penjualan, pembelian, pengelolaan persediaan, hingga pembuatan laporan keuangan
                                    secara otomatis.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                            <i class="faq-icon bi bi-question-circle"></i>
                            <h3>Apakah Andriyani Batik bisa digunakan secara offline?</h3>
                            <div class="faq-content">
                                <p>Andriyani Batik dapat diakses secara offline untuk pencatatan dasar, namun
                                    beberapa fitur
                                    seperti pembaruan data real-time atau laporan terintegrasi mungkin memerlukan
                                    koneksi internet</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                            <i class="faq-icon bi bi-question-circle"></i>
                            <h3>Apakah Andriyani Batik mendukung multi-user?</h3>
                            <div class="faq-content">
                                <p>Ya, Andriyani Batik mendukung penggunaan multi-user dengan pengaturan hak akses,
                                    sehingga
                                    setiap karyawan dapat diberikan izin yang sesuai dengan perannya.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                            <i class="faq-icon bi bi-question-circle"></i>
                            <h3>Apakah ada pelatihan untuk menggunakan Andriyani Batik?</h3>
                            <div class="faq-content">
                                <p>Ya, kami menyediakan panduan penggunaan dalam bentuk manual book untuk membantu
                                    pengguna memahami cara kerja Andriyani Batik dengan cepat.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                            <i class="faq-icon bi bi-question-circle"></i>
                            <h3>Apakah memungkinkan jika Andriyani Batik digunakan selain disektor batik?</h3>
                            <div class="faq-content">
                                <p>Ya, Andriyani Batik memungkinkan untuk digunakan di sektor lain selain batik,
                                    tetapi mungkin memerlukan penyesuaian tertentu. </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>

                </div>

            </div>

        </div>

    </section><!-- /Faq Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Kontak</h2>
            <p>Jika terdapat saran, masukan, atau kesulitan saat menggunakan program ini, Anda dapat menghubungi
                kontak di bawah ini</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-4">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Alamat</h3>
                        <p>Jalan AR Hakim, Kota Tegal, 52123</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-4">
                    <div
                        class="info-item d-flex flex-column justify-content-center align-items-center info-item-borders">
                        <i class="bi bi-telephone"></i>
                        <h3>WhatsApp</h3>
                        <p>+62 857 1325 2536</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-4">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-envelope"></i>
                        <h3>Email</h3>
                        <p>OkwanFast@gmail.com</p>
                    </div>
                </div><!-- End Info Item -->

            </div>


        </div>

    </section><!-- /Contact Section -->

    </main>
    <div style="text-align: center; background-color: rgb(153, 206, 150); ">
        <h5>Program Andriyani Batik Dibuat Oleh Mahasiswa Sistem Informasi Akuntansi</h5>
        <h6>Universitas Bina Sarana Informatika</h6>
    </div>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="asset/vendor/bootstrap/js/Groovin/bootstrap.bundle.min.js"></script>
    <script src="asset/vendor/php-email-form/validate.js"></script>
    <script src="asset/vendor/aos/aos.js"></script>
    <script src="asset/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="asset/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="asset/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="asset/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="asset/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="asset/js/main.js"></script>

</body>

</html>
