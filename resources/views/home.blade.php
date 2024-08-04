@extends('layouts.admin-template')

@section('title')
    Home
@endsection

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/chart.js/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/chart.js/Chart.bundle.min.js') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* #box{
                        background-color: #090909;
                        display: grid;
                        place-items: center;
                    } */
        #test {
            position: relative;
            font-size: 3rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            line-height: 70px;
            cursor: pointer;
        }

        .text {
            color: transparent;
            -webkit-text-stroke: 2px rgb(0, 0, 0);
            /* transition: 0.5s ease-out; */
        }

        .hover-text {
            position: absolute;
            inset: 0;
            width: 0%;
            color: rgb(0, 255, 0);
            overflow: hidden;
            /* border-right: 6px solid #1af7ff; */
            transition: 0.5s ease-in-out;
        }

        #test:hover .hover-text {
            width: 100%;
            filter: drop-shadow(0 0 40px #00c510);
        }
    </style>
    <style>
        .text-gradient {
            font-size: 4rem;
            font-family: Arial;
            filter: drop-shadow(0 0 40px #1b8101);
            background: linear-gradient(to right, rgb(0, 143, 0), #fbff00 35%, #178b00);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            -webkit-text-stroke: 1px rgb(0, 0, 0);
            animation: gradient 3s linear infinite
        }

        @keyframes gradient {
            0% {
                background-position: 0% 75%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 70%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="card">
                    <br>
                    <center>
                        <img src="{{ asset('pictures/logo_pondok.png') }}" width="40%"
                            class="d-block d-sm-none d-md-none d-lg-none">
                        <img src="{{ asset('pictures/logo_pondok.png') }}" width="25%"
                            class="d-none d-sm-block d-md-block d-lg-block">
                    </center>
                    <div class="card-body">
                        <h3 class="text-center">Welcome to
                            <center>
                                <div id="box" style="width: 280px; place-items: center" hidden>
                                    <div id="test" class="text-center">
                                        <span class="text">INV DARA</span>
                                        <span class="hover-text">INV DARA</span>
                                    </div>
                                </div>
                                <div class="text-gradient text-bold">INV DARA</div>
                            </center>
                            <h4 class="text-center">( INVITATION PONDOK PESANTREN ENTREPRENEUR DAR
                                AL-RAUDHAH )</h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- ChartJS -->
    <script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>

@endsection
