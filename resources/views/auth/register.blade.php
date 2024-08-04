<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIASA Dara | Daftar</title>
    <link rel="icon" href="{{ asset('pictures/LOGO PONDOK.ico') }}" type="icon">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="register-page bg-success">
    <center>
        {{-- <div><img src="{{ asset('pictures/LOGO PONDOK.png') }}" width="110" height="105" hidden></div> --}}
        <p class="h1">
            <img src="{{ asset('pictures/LOGO PONDOK.png') }}" width="60" height="55"> <b>SIASA</b>Dara
        </p>
    </center>
    <div class="register-box">
        <div class="card card-outline card-warning pt-2"
            style="background: transparent; backdrop-filter: blur(100px); border: 2px solid white">
            <div class="card-header text-center border-white border-3">
                <p class="h3"><b>DAFTAR</b></p>
            </div>
            <div class="card-body">
                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-2">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="Nama Lengkap">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-2">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email"
                            placeholder="Email">
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
                    <div class="input-group row mb-2">
                        <div class="col-9 col-md-9 col-sm-9">
                            <span>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('foto') is-invalid @enderror"
                                        id="exampleInputFile" name="foto" accept="image/*">
                                    <label class="custom-file-label" for="exampleInputFile">Pilih Foto Max:2mb</label>
                                </div>
                            </span>
                        </div>
                        <div class="col-3 col-md-3 col-sm-3">
                            <span>
                                <img class="img-thumbnail" id="preview_photo">
                            </span>
                        </div>
                        @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-2">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password" placeholder="New password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span id="mybutton" onclick="change()">
                                    <!-- icon mata bawaan bootstrap  -->
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill"
                                        fill="currentColor">
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
                    <div class="input-group mb-2">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Ulangi New password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span id="mybutton2" onclick="change2()">
                                    <!-- icon mata bawaan bootstrap  -->
                                    <svg width="1em" height="1em" viewBox="0 0 16 16"
                                        class="bi bi-eye-slash-fill" fill="currentColor">
                                        <path
                                            d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z" />
                                        <path
                                            d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z" />
                                        <path fill-rule="evenodd"
                                            d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-2">
                        <div class="icheck-silver">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms" class="text-dark">
                                Saya setuju <a href="#" class="text-white">Ketentuan</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="input-group mb-2">
                        <button type="submit" class="btn btn-light btn-block btn-outline-primary text-bold">
                            <i class="fas fa-user-plus"></i> REGISTER</button>
                    </div>
                    <!-- /.col -->
                </form>
                <a href="{{ route('login') }}" class="text-warning">Saya sudah punya user</a>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    <!-- /.register-box -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jquery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlte/dist/js/naja.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

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
    <script>
        // membuat fungsi change
        function change2() {

            // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password
            var x = document.getElementById('password-confirm').type;

            //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
            if (x == 'password') {

                //ubah form input password menjadi text
                document.getElementById('password-confirm').type = 'text';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton2').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                </svg>`;
            } else {

                //ubah form input password menjadi text
                document.getElementById('password-confirm').type = 'password';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton2').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor">
                                                                <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                </svg>`;
            }
        }
    </script>
    <script>
        function tampilkanFormLain() {
            var selectBox = document.getElementById("level");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            if (selectedValue == "Kepsek") {
                document.getElementById("form-sekolah").innerHTML =
                    '<select class="form-control" name="sekolah" required><option value="">-- Pilih Sekolah --</option><option value="SMP">SMP</option><option value="SMK">SMK</option><option value="WUSTHA">WUSTHA</option><option value="ULYA">ULYA</option></select>@error('sekolah')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror';
            } else if (selectedValue == "Walas") {
                document.getElementById("form-sekolah").innerHTML =
                    '<select class="form-control  @error('sekolah') is-invalid @enderror" name="sekolah" id="sekolah2" onchange="tampilkanWalas()" required><option value="">-- Pilih Sekolah --</option><option value="SMP">SMP</option><option value="SMK">SMK</option><option value="WUSTHA">WUSTHA</option><option value="ULYA">ULYA</option></select>@error('sekolah')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror';
            } else {
                document.getElementById("form-sekolah").innerHTML = '';
            }
        }
    </script>
    <script>
        function tampilkanWalas() {
            var selectBox = document.getElementById("sekolah2");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            if (selectedValue == "SMP") {
                document.getElementById("form-kelas").innerHTML =
                    '<select class="form-control" name="kelas" required>@foreach ($kelas_smp as $smp)<option value="{{ $smp->nama_kelas }}">{{ $smp->nama_kelas }}</option>@endforeach</select>@error('kelas')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror';
            } else if (selectedValue == "SMK") {
                document.getElementById("form-kelas").innerHTML =
                    '<select class="form-control" name="kelas" required>@foreach ($kelas_smk as $smp)<option value="{{ $smp->nama_kelas }}">{{ $smp->nama_kelas }}</option>@endforeach</select>';
            } else if (selectedValue == "WUSTHA") {
                document.getElementById("form-kelas").innerHTML =
                    '<select class="form-control" name="kelas" required>@foreach ($kelas_wustha as $smp)<option value="{{ $smp->nama_kelas }}">{{ $smp->nama_kelas }}</option>@endforeach</select>';
            } else if (selectedValue == "ULYA") {
                document.getElementById("form-kelas").innerHTML =
                    '<select class="form-control" name="kelas" required>@foreach ($kelas_ulya as $smp)<option value="{{ $smp->nama_kelas }}">{{ $smp->nama_kelas }}</option>@endforeach</select>';
            } else {
                document.getElementById("form-kelas").innerHTML = '';
            }
        }
    </script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        // Preview photo when user select a file
        const photoInput = document.getElementById('exampleInputFile');
        const previewPhoto = document.getElementById('preview_photo');

        photoInput.addEventListener('change', function() {
            const file = this.files[0];
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                previewPhoto.src = reader.result;
            });

            reader.readAsDataURL(file);
        });
    </script>
</body>

</html>
