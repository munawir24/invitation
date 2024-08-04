<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: auto;">
{{-- second --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('pictures/LOGO PONDOK.ico') }}" type="icon">

    <!-- Fonts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <style>
        @font-face {
            font-family: 'Traditional Arabic Regular';
            /* Ganti dengan nama font yang diinginkan */
            src: url('/public/vendor/fonts/Traditional Arabic Regular.ttf') format('truetype');
            /* Sesuaikan path dengan lokasi font di proyek Anda */
            font-weight: normal;
            font-style: normal;
            padding: 0rem;
            margin: 0rem;
            word-spacing: 0rem
        }

        @font-face {
            font-family: 'aldhabi';
            /* Ganti dengan nama font yang diinginkan */
            src: url('/public/vendor/fonts/aldhabi.ttf') format('truetype');
            /* Sesuaikan path dengan lokasi font di proyek Anda */
            font-weight: normal;
            font-style: normal;
            padding: 0rem;
            margin: 0rem;
            word-spacing: 0rem
        }
    </style>
    <style>
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }

        .carousel-indicators {
            display: flex;
            justify-content: center;
        }

        .carousel-indicators li {
            background-color: #888;
            border-radius: 50%;
            width: 12px;
            height: 12px;
            margin: 0 6px;
            border: 2px solid rgb(45, 255, 3);
            /* Untuk memberikan garis putih di sekitar setiap lingkaran */
            cursor: pointer;
        }
    </style>
</head>

<body class="layout-top-nav" style="height: auto;">
    <div class="wrapper">
        <!-- Navbar -->
        <div class="main-header bg-success">
            <div class="container">
                <div class="row justify-content-center text-white pt-2 d-none d-sm-block d-md-block d-lg-block">
                    <div class="col-12 text-white text-center" style="height: auto">
                        <a href="{{ url('/') }}" class="navbar-brand">
                            <img src="{{ asset('pictures/LOGO PONDOK.png') }}" alt="Santri Logo"
                                class="brand-image img-circle elevation-3" style="opacity: .9;">
                            <span class="brand-text font-weight-light text-white"><b>Pondok Pesantren Entrepreneur Dar
                                    Al-Raudhah</b></span>
                        </a>
                        <small>
                            <div class="brand-text">Akhlaq, Entrepreneur, Bilingual</div>
                        </small>
                    </div>
                </div>
                <div class="row justify-content-center text-white pt-2 d-block d-sm-none d-md-none d-lg-none">
                    <div class="col-12 text-white text-center" style="height: auto">
                        <a href="{{ url('/') }}" class="navbar-brand">
                            <img src="{{ asset('pictures/LOGO PONDOK.png') }}" alt="Santri Logo"
                                class="brand-image img-circle elevation-3" style="opacity: .9;">
                            <span class="brand-text font-weight-light text-white"><b>PPE Dar
                                    Al-Raudhah</b></span>
                        </a>
                        <small>
                            <div class="brand-text">Akhlaq, Entrepreneur, Bilingual</div>
                        </small>
                    </div>
                </div>
            </div>

            <nav class="navbar navbar-expand-md navbar-light navbar-success">
                <div class="container bg-white rounded-sm">

                    <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                        data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <small>Menu</small>
                    </button>

                    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                        <!-- Left navbar links -->
                        <ul class="navbar-nav nav-tabs text-bold text-center">
                            <li class="nav-item">
                                <a href="{{ url('/') }}"
                                    class="nav-link {{ request()->is('/') ? 'active bg-success' : '' }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href=""
                                    class="nav-link">Berita</a>
                            </li>
                        </ul>

                        <!-- SEARCH FORM -->
                        {{-- <form class="form-inline ml-0 ml-md-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}
                    </div>
                    <!-- Right navbar links -->
                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <!-- Messages Dropdown Menu -->
                        <li class="nav-item"><a class="nav-link text-danger"
                                href="https://www.youtube.com/@daratv_Channel" target="_blank"><i
                                    class="fab fa-youtube"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/ppe_daralraudhah/"
                                target="_blank"
                                style="background: linear-gradient(to bottom, #6d00fc, #a004fa, #f925b2, #ff5722, #eeff00, #f9a825);
                                -webkit-background-clip: text;
                                -webkit-text-fill-color: transparent;"><i
                                    class="fab fa-instagram"></i></a></li>
                        <li class="nav-item"><a class="nav-link text-primary"
                                href="https://web.facebook.com/ponpesdarurraudhah" target="_blank"><i
                                    class="fab fa-facebook"></i></a></li>
                        <li class="nav-link">
                            @auth
                                <a href="{{ url('/home') }}" class="text-gray">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}"class="text-gray">Log in</a>
                            @endauth
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 486px; background-color: springgreen">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                @yield('content-header')
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                @yield('content')
                <a id="back-to-top" href="#" class="btn btn-danger back-to-top" role="button"
                    aria-label="Scroll to top" style="display: none">
                    <i class="fas fa-chevron-up"></i>
                </a>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        @yield('informasi')
        <!-- Main Footer -->

        <div class="main-footer bg-info border-0">
            <div class="container">
                <div class="row justify-content-center mb-3">
                    <div class="col-12 col-md-5 col-sm-5 mb-1">
                        <h5>Hubungi Kami</h5>
                        <div>Silahkan menghubungi kami pada kontak di bawah ini :</div>
                        <div><i class="fas fa-map-marked-alt"></i> Jl. Pangkalan Bungur RT.26 Sungai Tatas Kel. Baru Kec. Arsel Pangkalan Bun – Kalimantan
                            Tengah 74113</div>
                        <div><a href="tel:081349821310" class="text-white" target="_blank"><i class="fa fa-phone-square fa-rotate-90"></i> Telp : 0813 4982 1310</a> / <a href="tel:082150874581" class="text-white" target="_blank"> 0821 5087 4581</a>
                        </div>
                        <div><a href="mailto:dar.alraudhah@gmail.com" class="text-white" target="_blank"><i class="fas fa-envelope"></i> Email :
                                dar.alraudhah@gmail.com</a></div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2173.1507438103854!2d111.66498930609521!3d-2.6424050333172078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e08edf5b174faa9%3A0xea0c754018b551e6!2sPondok%20Pesantren%20Entrepreneur%20Dar%20Al-Raudhah!5e0!3m2!1sid!2sid!4v1690607011283!5m2!1sid!2sid"
                            width="100%" height="250" style="border:0; border-radius: 5px" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" class="pt-2"></iframe>
                    </div>
                    <div class="col-12 col-md-2 col-sm-2 mb-1">
                        <h5 class="pl-4">Link Terkait</h5>
                        <ul>
                            <li><a href="" class="text-white">Aktifitas Santri</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-3 col-sm-3 mb-1">
                        <h5 class="pl-4">Sistem Informasi Santri</h5>
                        <ul>
                            <li><a href=""class="text-white">Calon
                                    Santri</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-2 col-sm-2 mb-1">
                        <h5 class="pl-4">Lainnya</h5>
                        <ul>
                            <li><a href="" class="text-white">Wisuda Paripurna</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <footer class="main-footer bg-warning rounded-sm">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    Never Try Never Know
                </div>
                <!-- Default to the left -->
                <strong>Copyright © 2023 <a href="https://api.whatsapp.com/send?phone=6282251925522"
                        target="_blank">TIM IT DARA</a></strong> Akhlaq, Entrepreneur, Bilingual
            </footer>
        </div>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>

    <script src="{{ asset('adminlte/dist/js/pages/dashboard.js') }}"></script>

    <script>
        //Get the button
        var mybutton = document.getElementById("back-to-top");

        // When the user scrolls down 40px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            mybutton.style.display = "none";
        }
    </script>
    @yield('script')
</body>

</html>
