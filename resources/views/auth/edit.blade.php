@extends('layouts.admin-template')

@section('title')
    Edit User
@endsection

@section('css')
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <script>
        function tampilkanFormLain() {
            var selectBox = document.getElementById("role");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            if (selectedValue == "USER") {
                document.getElementById("form-user").innerHTML =
                    '<select class="form-control" name="id_slug"><option value="">-- Pilih User Order --</option>@foreach ($order as $odr) <option value="{{ $odr->slug }}">{{ $odr->nama }}</option> @endforeach </select>';
            } else {
                document.getElementById("form-user").innerHTML = '';
            }
        }
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                <div class="card card-outline card-warning">
                    <div class="card-header text-center text-dark">
                        <img src="{{ asset('pictures/logo dara.png') }}" width="50" height="50">
                        <p class="h1">Edit <b>User</b></p>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('perbarui-user', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $user->name }}" required autocomplete="name" autofocus
                                    placeholder="Nama Lengkap">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ $user->email }}" required autocomplete="email" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3 row">
                                <div class="col-sm-9">
                                    <span>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="foto">
                                            <label class="custom-file-label"
                                                for="exampleInputFile">{{ $user->foto }}</label>
                                        </div>
                                    </span>
                                </div>
                                <div class="col-sm-3">
                                    <span>
                                        @if ($user->foto)
                                            <img src="{{ asset('pictures/user/' . $user->foto) }}" alt="{{ $user->name }}"
                                                class="img-thumbnail" id="preview_photo">
                                        @else
                                            <img src="{{ asset('pictures/user/default.jpg') }}" alt="{{ $user->name }}"
                                                class="img-thumbnail" id="preview_photo">
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password" placeholder="New password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span id="mybutton" onclick="change()">
                                            <!-- icon mata bawaan bootstrap  -->
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                <path fill-rule="evenodd"
                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password"
                                    placeholder="Ulangi New password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span id="mybutton2" onclick="change2()">
                                            <!-- icon mata bawaan bootstrap  -->
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                <path fill-rule="evenodd"
                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <select class="form-control" name="level" id="level"
                                    onchange="tampilkanFormLain()">
                                    <option value="">-- Pilih Tipe User --
                                    </option>
                                    <option value="Admin" {{ $user->level == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="Kepsek"
                                        {{ $user->level == 'Kepsek - SMP' || $user->level == 'Kepsek - SMK' || $user->level == 'Kepsek - WUSTHA' || $user->level == 'Kepsek - ULYA' ? 'selected' : '' }}>
                                        Kepala Sekolah</option>
                                    <option value="Walas"
                                        {{ str_contains($user->level, 'Walas - SMP') || str_contains($user->level, 'Walas - SMK') || str_contains($user->level, 'Walas - MQ') ? 'selected' : '' }}>
                                        Wali Kelas</option>
                                    <option value="PSB Dara" {{ $user->level == 'PSB Dara' ? 'selected' : '' }}>Panitia Santri Baru</option>
                                    <option value="Santri" {{ $user->level == 'Santri' ? 'selected' : '' }}>Santri</option>
                                </select>
                            </div>
                            <div id="form-sekolah" class="input-group mb-3">
                                <!-- SEKOLAH -->
                            </div>
                            <div id="form-kelas" class="input-group mb-3">
                                <!-- KELAS -->
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('user') }}" class="btn btn-warning btn-block">
                                        <i class="fas fa-user-times"></i> Kembali</a>
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <button type="submit" class="btn btn-success btn-block">
                                        <i class="fas fa-user-edit"></i> Perbarui</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
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
                document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                    <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                    </svg>`;
            } else {

                //ubah form input password menjadi text
                document.getElementById('password').type = 'password';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
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
                document.getElementById('mybutton2').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                    <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                    </svg>`;
            } else {

                //ubah form input password menjadi text
                document.getElementById('password-confirm').type = 'password';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton2').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                    </svg>`;
            }
        }
    </script>
    <script src="{{ asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
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
@endsection
