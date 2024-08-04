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
                                        <th style="vertical-align: middle">NAMA PENGIRIM</th>
                                        <th style="vertical-align: middle">KEHADIRAN</th>
                                        <th style="vertical-align: middle">PESAN</th>
                                        <th style="vertical-align: middle">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dt)
                                        <tr class="odd&even text-center">
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $no++ }}</td>
                                            <td style="vertical-align: middle">{{ $dt->nama }}</td>
                                            {{-- <td style="vertical-align: middle">{{ $dt->absen }}</td> --}}
                                            <td class="project-state" style="vertical-align: middle">
                                                <span
                                                    class="badge {{ $dt->absen == 0 ? 'badge-warning' : 'badge-success' }}"
                                                    style="font-size: 16px">{{ $dt->absen == 0 ? 'TIDAK' : 'HADIR' }}</span>
                                            </td>
                                            <td style="vertical-align: middle">{{ $dt->pesan }}</td>

                                            <td class="text-center" style="vertical-align: middle">
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
                                        <th>NAMA</th>
                                        <th>ABSEN</th>
                                        <th>PESAN</th>
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
                    window.location.href = "sending-message/delete/" + id;
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
@endsection
