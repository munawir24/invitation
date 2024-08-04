<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>INV Dara | Login</title>
    <link rel="icon" href="{{ asset('pictures/LOGO PONDOK.ico') }}" type="icon">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

</head>

<body class="login-page bg-success">
    <center>
        <div><img src="{{ asset('pictures/LOGO PONDOK.png') }}" width="110" height="105"></div>
        <p class="h1">
            <b>INV</b>Dara
        </p>
    </center>
    <div class="login-box pt-2 border-white border-2">
        <!-- /.login-logo -->
        <div class="card border-white card-outline card-warning"
            style="background: transparent; backdrop-filter: blur(100px); border: 2px solid rgb(36, 255, 7)">
            <div class="card-header text-center border-white border-3">
                <p class="h3">
                    <b>MASUK</b>
                </p>
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3 pt-1">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email"
                            autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-2">
                        <input type="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span id="mybutton" onclick="change()">
                                    <!-- icon mata bawaan bootstrap  -->
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z" />
                                        <path
                                            d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z" />
                                        <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-1">
                        <div class="col-8">
                            <div class="icheck-dark">
                                <input type="checkbox" name="centang" id="remember">
                                <label class="" for="remember">
                                    Ingatkan saya
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4 text-right mt-1">
                            <small>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-warning">Lupa Password ?</a>
                                @endif
                            </small>
                        </div>
                        <!-- /.col -->
                    </div>
                    <button type="submit" class="btn btn-light btn-block pt-1 mb-2 text-bold btn-outline-primary">
                        <i class="fas fa-sign-in-alt"></i> LOGIN</button>
                </form>
                <!-- /.social-auth-links -->
                {{-- <div class="row pt-1">
                    <div class="col-6">
                        <a href="{{ url('/') }}" class="btn btn-sm btn-outline-dark text-white"><i class="far fa-arrow-alt-circle-left"></i> Home</a>
                    </div>
                    <div class="col-6 text-right">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-sm btn-outline-warning text-white">Daftar User Baru <i class="far fa-arrow-alt-circle-right"></i></a>
                        @endif
                    </div>
                </div> --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery-Validation -->
    <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $('#login').validate({
                rules: {

                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                    },
                    centang: {
                        required: true
                    },
                },
                messages: {
                    password: {
                        required: "Isikan Password Anda"
                    },
                    email: {
                        required: "Isikan Email Pendaftaran",
                        email: "Isikan Email Pendaftaran Yang Masih Aktif"
                    },
                    centang: "Tolong Centang Untuk Menyetujui",
                },
                errorElement: 'span',

                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                },


                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    $(element).addClass('is-valid');
                },
                submitHandler: function(form) {
                    // Handle the form submission, e.g., send data to the server
                    $.ajax({
                        url: "{{ route('login') }}", // Gantilah ini dengan URL tujuan Anda
                        type: "POST",
                        data: $(form).serialize(),
                        success: function(response) {
                            // Handle the server response
                            alert("Form submitted successfully!");
                        },
                        error: function(error) {
                            // Handle the error
                            alert("Error submitting the form");
                        }
                    });
                }
            });
        });
    </script>
    <script>
        // membuat fungsi change
        function change() {

            // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password
            var x = document.getElementById('password').type;

            //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
            if (x == 'password') {

                //ubah form input password menjadi text
                document.getElementById('password').type = 'text';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                    </svg>`;
            } else {

                //ubah form input password menjadi text
                document.getElementById('password').type = 'password';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                </svg>`;
            }
        }
    </script>
</body>

</html>
