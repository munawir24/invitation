@extends('layouts.admin-template')

@section('title')
    Pesanan Undangan
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
                        <h2 class="card-title"><strong>Pesanan Undangan</strong></h2>
                        <div class="card-tools">
                            <div class="input-group input-group-sm float-right">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary rounded-sm" data-toggle="modal"
                                    data-target="#modal-default">
                                    <i class="fas fa-plus"></i> Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <div id="admin_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <table id="admin" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead class="bg-cyan">
                                    <tr class="text-center">
                                        <th style="vertical-align: middle">NO</th>
                                        <th style="vertical-align: middle">NAMA PEMESAN</th>
                                        <th style="vertical-align: middle">TIPE UNDANGAN</th>
                                        <th style="vertical-align: middle">STATUS</th>
                                        <th style="vertical-align: middle">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dt)
                                        <tr class="odd&even text-center">
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $no++ }}</td>
                                            <td style="vertical-align: middle">{{ $dt->nama }}</td>
                                            <td style="vertical-align: middle">{{ $dt->tipe }}</td>
                                            {{-- <td style="vertical-align: middle">{{ $dt->absen }}</td> --}}
                                            <td class="project-state" style="vertical-align: middle">
                                                <span
                                                    class="badge {{ $dt->status == 0 ? 'badge-warning' : 'badge-success' }}"
                                                    style="font-size: 16px">{{ $dt->status == 0 ? 'TIDAK AKTIF' : 'AKTIF' }}</span>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle">
                                                <button class="btn btn-sm btn-danger text-bold"
                                                    onclick="confirmDelete({{ $dt->id }})" {{ Auth::user()->role == "SUPER ADMIN" ? '' : 'disabled' }}><i class="fa fa-trash"></i>
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

    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title">Tambah Pemesan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('simpan-tamu') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Pemesan</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tipe">Jenis Undangan</label>
                            <select name="tipe" id="tipe" class="form-control">
                                @foreach ($tipe as $tp)
                                    <option value="{{$tp->nama}}">{{ $tp->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <center>
                                <div class="text-bold">Status</div>
                            </center>
                            <div class="row text-center">
                                <div class="custom-control custom-radio col-sm-6 col-6 slide-left">
                                    <input class="custom-control-input custom-control-input-success" name="status"
                                        type="radio" id="customRadio1" value="1" required>
                                    <label for="customRadio1" class="custom-control-label">AKTIF</label>
                                </div>
                                <div class="custom-control custom-radio col-sm-6 col-6 slide-right">
                                    <input class="custom-control-input custom-control-input-success" name="status"
                                        type="radio" id="customRadio2" value="0" required>
                                    <label for="customRadio2" class="custom-control-label">TIDAK</label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i
                            class="fa fa-close"></i>
                        BATAL</button>
                    <button type="submit" class="btn btn-success text-bold">
                        <i class="fas fa-save"></i> SIMPAN</button>
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
