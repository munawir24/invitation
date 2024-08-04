<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: auto;">
<!-- head -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>INV Dara | @yield('title')</title>
    <link rel="icon" href="{{ asset('pictures/LOGO PONDOK.ico') }}" type="icon">


    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <style>
        .slider-mode {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 32px;
            color: greenyellow;
        }

        .mode-switch {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .mode-label {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 32px;
        }

        .mode-label:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: #fff;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 50%;
        }

        .mode-switch:checked+.mode-label {
            background-color: #000000;
        }

        .mode-switch:checked+.mode-label:before {
            content: "";
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }
    </style>
    <style type="text/css">
        /* Chart.js */
        @keyframes chartjs-render-animation {
            from {
                /* opacity: .99; */
                transform: rotate(0deg);
            }

            to {
                /* opacity: 1; */
                transform: rotate(360deg);
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 2s linear infinite
        }

        .chartjs-size-monitor,
        .chartjs-size-monitor-expand,
        .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand>div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink>div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }
    </style>
    <style>
        .rotating-image {
            width: 110px;
            /* Sesuaikan ukuran gambar sesuai kebutuhan */
            height: 100px;
            position: relative;
            animation: rotateRight 2s linear infinite;
            2s adalah durasi rotasi,
            sesuaikan jika perlu
        }

        @keyframes rotateRight {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>
    <style>
        td.highlight {
            background-color: rgb(60, 255, 0) !important;
        }

        html.dark-mode td.highlight {
            background-color: rgba(var(--dt-row-hover), 0.082) !important;
        }
    </style>
    <style>
        /* CSS untuk loader 3D */
        .loader-3d {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
            /* Sesuaikan dengan ukuran yang Anda inginkan */
        }

        .spinner {
            width: 40px;
            height: 40px;
            position: relative;
            animation: spin 2s linear infinite;
        }

        .front,
        .back {
            position: relative;
            width: 110px;
            height: 100px;
            /* border: 2px solid #3498db; */
            /* border-radius: 50%; */
        }

        .front {
            border-bottom: 2px solid transparent;
            border-left: 2px solid transparent;
            border-top-color: #3498db;
            animation: rotateFront 1s linear infinite;
        }

        .back {
            border-bottom-color: transparent;
            border-right: 2px solid transparent;
            border-top: 2px solid transparent;
            animation: rotateBack 2s linear infinite;
        }


        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes rotateFront {
            0% {
                transform: rotateX(0deg) rotateY(0deg);
            }

            100% {
                transform: rotateX(0deg) rotateY(365deg);
            }
        }

        @keyframes rotateBack {
            0% {
                transform: rotateX(0deg) rotateY(0deg);
            }

            100% {
                transform: rotateX(0deg) rotateY(365deg);
            }
        }
    </style>
    <section>
        @yield('css')
    </section>
</head>
<!-- /head -->

<body class="sidebar-mini layout-navbar-fixed layout-footer-fixed layout-fixed sidebar-closed" style="height: auto;">
    @php
        use App\Models\User;
        $pengguna = User::all();
        $jumlah_user = count($pengguna);
    @endphp
    <div class="wrapper">
        {{-- Freeloader --}}
        <div class="preloader flex-column justify-content-center align-items-center" style="height: 100%;">
            {{-- animation__shake --}}
            <img class="loader-3d font back" src="{{ asset('pictures/LOGO PONDOK.png') }}" alt="AdminLTELogo"
                height="100" width="100" style="display: block">
        </div>
        <!-- Navbar -->
        @include('template.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('template.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- <div class="content-header"> -->
            <!-- <div class="container-fluid"> -->
            <!-- <div class="row"> -->
            <!-- <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">/li>
                </ol>
            </div> -->

            <!-- </div>
            </div>
            </div> -->
            <!-- /.content-header -->
            <div class="content-header no-print">
                @yield('content-header')
            </div>
            <!-- Main content -->
            <div class="content">
                @yield('content')
            </div>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('template.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jquery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlte/dist/js/naja.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="{{ asset('adminlte/dist/js/pages/dashboard.js') }}"></script> --}}
    {{-- Sweatalert 2 --}}
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        var toggleSwitch = document.querySelector('.slider-mode input[type="checkbox"]');
        var currentTheme = localStorage.getItem('theme');
        var mainHeader = document.querySelector('.main-header');

        if (currentTheme) {
            if (currentTheme === 'dark') {
                if (!document.body.classList.contains('dark-mode')) {
                    document.body.classList.add("dark-mode");
                }
                if (mainHeader.classList.contains('navbar-light')) {
                    mainHeader.classList.add('navbar-dark');
                    mainHeader.classList.remove('navbar-light');
                }
                toggleSwitch.checked = true;
            }
        }

        function switchTheme(e) {
            if (e.target.checked) {
                if (!document.body.classList.contains('dark-mode')) {
                    document.body.classList.add("dark-mode");
                }
                if (mainHeader.classList.contains('navbar-light')) {
                    mainHeader.classList.add('navbar-dark');
                    mainHeader.classList.remove('navbar-light');
                }
                localStorage.setItem('theme', 'dark');
            } else {
                if (document.body.classList.contains('dark-mode')) {
                    document.body.classList.remove("dark-mode");
                }
                if (mainHeader.classList.contains('navbar-dark')) {
                    mainHeader.classList.add('navbar-light');
                    mainHeader.classList.remove('navbar-dark');
                }
                localStorage.setItem('theme', 'light');
            }
        }

        toggleSwitch.addEventListener('change', switchTheme, false);
    </script>
    <script>
        //Get the button
        var mybuttonTop = document.getElementById("back-to-top");

        // When the user scrolls down 40px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
                mybuttonTop.style.display = "block";
            } else {
                mybuttonTop.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    {{-- <script>
        const table = new DataTable('#example1');

        table.on('mouseenter', 'td', function() {
            let colIdx = table.cell(this).index().column;

            table
                .cells()
                .nodes()
                .each((el) => el.classList.remove('highlight'));

            table
                .column(colIdx)
                .nodes()
                .each((el) => el.classList.add('highlight'));
        });
    </script> --}}

    @include('sweetalert::alert')
    {{-- script --}}
    @yield('script')

</body>

</html>
