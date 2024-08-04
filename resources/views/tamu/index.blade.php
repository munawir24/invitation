@extends('layouts.admin-template')

@section('title')
    Tamu Undangan
@endsection

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title"><strong>Tamu Undangan</strong></h2>
                        <div class="card-tools">
                            <div class="input-group input-group-sm float-right">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary rounded-sm" data-toggle="modal"
                                        data-target="#modal-default">
                                        <i class="fas fa-plus"></i> Tambah Tamu</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <form action="" method="get" id="form-get" {{ Auth::user()->role == "USER" ? "hidden" : "" }}>
                            <div class="row">
                                <div class="col-md-4 col-sm-7 col-9">
                                    <div class="input-group mb-2">
                                        <label for="tahun_ajar" class="form-control text-right"
                                            style="border: none">Tahun Ajaran</label>
                                        <select name="order" id="tahun_ajar" class="form-control" onchange="tahun()">
                                            @foreach ($order as $t)
                                                <option value="{{ $t->slug }}"
                                                    {{ $t->slug == $get_aktif ? 'selected' : '' }}>
                                                    {{ $t->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-md btn-primary">Go</button>
                                </div>
                            </div>
                        </form>
                        <div id="admin_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <table id="admin" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead class="bg-cyan">
                                    <tr class="text-center">
                                        <th style="vertical-align: middle">NO</th>
                                        <th style="vertical-align: middle">NAMA TAMU</th>
                                        <th style="vertical-align: middle">NO WA</th>
                                        <th style="vertical-align: middle">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dt)
                                        <tr class="odd&even text-center">
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $no++ }}</td>
                                            <td style="vertical-align: middle">{{ $dt->nama }}</td>
                                            <td> <i class="fab fa-whatsapp-square text-success"></i> <strong><a
                                                        target="_blank"
                                                        href="https://api.whatsapp.com/send?phone=@php
                                                        $nomor_asal = $dt->nomor_hp;
                                                        // Periksa apakah nomor dimulai dengan '08'
                                                        if (substr($nomor_asal, 0, 2) === '08') {
                                                            // Jika ya, ganti '08' menjadi '628'
                                                            $nomor_asal = '628' . substr($nomor_asal, 2);
                                                        }
                                                        echo $nomor_asal;
                                                    @endphp&text=Assalamualaikum Wr. Wb. Bapak/Ibu. %0A %0Ahttps://invitation.ponpesdara.com/wedding/alia-abdillah/{{$dt->slug_tamu}}"
                                                        class="text-dark">{{ ' ' . $dt->nomor_hp }} </a></strong>
                                            </td>

                                            <td class="text-center" style="vertical-align: middle">
                                                <a target="_blank" href="{{ route('wedding-pesanan',$dt->slug_tamu) }}" class="btn btn-sm btn-primary text-bold"><i
                                                    class="fa fa-eye"></i> Lihat</a>
                                                <a href="{{ route('edit-tamu',$dt->id) }}" class="btn btn-sm btn-warning text-bold"><i
                                                        class="fa fa-edit"></i> Edit</a>
                                                <button class="btn btn-sm btn-danger text-bold"
                                                    onclick="confirmDelete({{ $dt->id }})"><i class="fa fa-trash"></i>
                                                    Hapus</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot hidden>
                                    <tr class="text-center">
                                        <th>NO</th>
                                        <th>NAMA PENGGUNA</th>
                                        <th>LEVEL</th>
                                        <th>AKSI</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title">Tambah Tamu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('simpan-tamu') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Tamu</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nomor">No WhatsApp</label>
                            <input type="text" name="nomor_hp" id="nomor" inputmode="numeric" class="form-control">
                        </div>
                        <div class="form-group" hidden>
                            <label for="id_slug">Order Undangan</label>
                            <input type="text" name="id_slug" id="id_slug" class="form-control" value="{{ Auth::user()->id_slug == null ? $get_aktif : Auth::user()->id_slug }}">
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fa fa-close"></i>
                        BATAL</button>
                    <button type="submit" class="btn btn-success text-bold">
                        <i class="fas fa-user-save"></i> SIMPAN</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('script')
    {{-- Form Get --}}
    <script>
        function tahun() {
            var select = document.getElementById("tahun_ajar");

            document.getElementById('form-get').submit();
        }
    </script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus?',
                text: 'Data yang dihapus tidak dapat dikembalikan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                confirmButtonColor: 'red',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke rute yang menghapus data berdasarkan id
                    window.location.href = "tamu/delete/" + id;
                }
            });
        }
    </script>
    <!-- DataTables & plugins -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.js') }}"></script>
    {{-- <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script> --}}

    <script>
        $(function() {
            $("#admin").DataTable({
                "responsive": true,
                "Paginate": true,
                "lengthChange": true,
                "Filter": true,
                "Sort": true,
                "Info": true,
                "autoWidth": false,
                "StateSave": true,


                "buttons": ["copy", "excel", "colvis"]
            }).buttons().container().appendTo('#admin_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script>
        const number1 = document.documentById('nomor_asal');
        const number2 = document.documentById('nomor_jadi');
        const newNumber = "62" + number1.slice(1);

        console.log(number2);
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
        } <
        /s> <
        script src = "{{ asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}" >
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
@endsection
