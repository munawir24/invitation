@extends('layouts.admin-template')

@section('title')
    Data User
@endsection

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <style>
        .btn-secondary {
            background-color: green;
        }

        div.dt-button-collection button.dt-btn-split-drop-button:active {
            background-color: #09ff00
        }
    </style>
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <script>
        function tampilkanFormLain() {
            var selectBox = document.getElementById("level");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            if (selectedValue == "Kepsek") {
                document.getElementById("form-sekolah").innerHTML =
                    '<select class="form-control" name="sekolah"><option value="">-- Pilih Sekolah --</option><option value="SMP">SMP</option><option value="SMK">SMK</option><option value="WUSTHA">WUSTHA</option><option value="ULYA">ULYA</option></select>';
            } else if (selectedValue == "Walas") {
                document.getElementById("form-sekolah").innerHTML =
                    '<select class="form-control" name="sekolah" id="sekolah2" onchange="tampilkanWalas()"><option value="">-- Pilih Sekolah --</option><option value="SMP">SMP</option><option value="SMK">SMK</option><option value="WUSTHA">WUSTHA</option><option value="ULYA">ULYA</option></select>';
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
                    '<select class="form-control" name="kelas">@foreach ($kelas_smp as $smp)<option value="{{ $smp->nama_kelas }}">{{ $smp->nama_kelas }}</option>@endforeach</select>';
            } else if (selectedValue == "SMK") {
                document.getElementById("form-kelas").innerHTML =
                    '<select class="form-control" name="kelas">@foreach ($kelas_smk as $smp)<option value="{{ $smp->nama_kelas }}">{{ $smp->nama_kelas }}</option>@endforeach</select>';
            } else if (selectedValue == "WUSTHA") {
                document.getElementById("form-kelas").innerHTML =
                    '<select class="form-control" name="kelas">@foreach ($kelas_wustha as $smp)<option value="{{ $smp->nama_kelas }}">{{ $smp->nama_kelas }}</option>@endforeach</select>';
            } else if (selectedValue == "ULYA") {
                document.getElementById("form-kelas").innerHTML =
                    '<select class="form-control" name="kelas">@foreach ($kelas_ulya as $smp)<option value="{{ $smp->nama_kelas }}">{{ $smp->nama_kelas }}</option>@endforeach</select>';
            } else {
                document.getElementById("form-kelas").innerHTML = '';
            }
        }
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title"><strong>Data Seluruh Pengguna</strong></h2>
                        <div class="card-tools">
                            <div class="input-group input-group-sm float-right">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary rounded-sm" data-toggle="modal"
                                        data-target="#modal-default">
                                        <i class="fas fa-plus"></i> Tambah User</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <ul class="nav nav-pills nav-success justify-content-center" id="custom-content-above-tab" role="tablist">
                            <li class="nav-item btn-xs">
                                <a class="nav-link btn btn-sm btn-outline-success text-bold active"
                                    id="custom-content-above-admin-tab" data-toggle="pill"
                                    href="#custom-content-above-admin" role="tab"
                                    aria-controls="custom-content-above-kepsek" aria-selected="false">Admin</a>
                            </li>
                            <li class="nav-item btn-xs">
                                <a class="nav-link btn btn-sm btn-outline-success text-bold" id="custom-content-above-kepsek-tab"
                                    data-toggle="pill" href="#custom-content-above-kepsek" role="tab"
                                    aria-controls="custom-content-above-kepsek" aria-selected="false">Kepsek</a>
                            </li>
                            <li class="nav-item btn-xs">
                                <a class="nav-link btn btn-sm btn-outline-success text-bold" id="custom-content-above-walas-tab"
                                    data-toggle="pill" href="#custom-content-above-walas" role="tab"
                                    aria-controls="custom-content-above-walas" aria-selected="false">Wali Kelas</a>
                            </li>
                            <li class="nav-item btn-xs">
                                <a class="nav-link btn btn-sm btn-outline-success text-bold" id="custom-content-above-psb-tab"
                                    data-toggle="pill" href="#custom-content-above-psb" role="tab"
                                    aria-controls="custom-content-above-psb" aria-selected="true">PSB Dara</a>
                            </li>
                            <li class="nav-item btn-xs">
                                <a class="nav-link btn btn-sm btn-outline-success text-bold" id="custom-content-above-santri-tab"
                                    data-toggle="pill" href="#custom-content-above-santri" role="tab"
                                    aria-controls="custom-content-above-santri" aria-selected="true">Santri</a>
                            </li>
                            <li class="nav-item btn-xs">
                                <a class="nav-link btn btn-sm btn-outline-success text-bold" id="custom-content-above-semua-tab"
                                    data-toggle="pill" href="#custom-content-above-semua" role="tab"
                                    aria-controls="custom-content-above-semua" aria-selected="true">Semua</a>
                            </li>
                        </ul>
                        {{-- <div class="tab-custom-content">
                            <p class="lead mb-0"></p>
                        </div> --}}
                        <div class="tab-content" id="custom-content-above-tabContent">
                            {{-- Admin --}}
                            <div class="tab-pane fade active show" id="custom-content-above-admin" role="tabpanel"
                                aria-labelledby="custom-content-above-admin-tab">
                                <div class="row pt-2">
                                    <div class="col-md-12 col-12">
                                        <div id="admin_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <table id="admin" class="table table-bordered table-striped dataTable dtr-inline">
                                                <thead class="bg-cyan">
                                                    <tr class="text-center">
                                                        <th style="vertical-align: middle">NO</th>
                                                        <th style="vertical-align: middle">AVATAR</th>
                                                        <th style="vertical-align: middle">NAMA PENGGUNA</th>
                                                        <th style="vertical-align: middle">LEVEL</th>
                                                        <th style="vertical-align: middle">EMAIL</th>
                                                        <th style="vertical-align: middle">PASSWORD</th>
                                                        <th style="vertical-align: middle">DIBUAT</th>
                                                        <th style="vertical-align: middle">DIPERBARUI</th>
                                                        <th style="vertical-align: middle">AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($admin as $adm)
                                                        <tr class="odd&even text-center">
                                                            <td class="text-center" style="vertical-align: middle">
                                                                {{ $no1++ }}</td>
                                                            <td><img src="{{ asset('pictures/user/' . $adm->foto) }}" width=auto,
                                                                    height=100px, alt="{{ $adm->foto }}">
                                                            </td>
                                                            <td style="vertical-align: middle">{{ $adm->name }}</td>
                                                            <td style="vertical-align: middle">{{ $adm->level }}</td>
                                                            <td style="vertical-align: middle">{{ $adm->email }}</td>
                                                            <td style="vertical-align: middle">{{ $adm->password }}</td>
                                                            <td style="vertical-align: middle">
                                                                {{ \Carbon\Carbon::parse($adm->created_at)->translatedFormat('d F Y H:i') . ' WIB' }}
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                {{ \Carbon\Carbon::parse($adm->updated_at)->diffForHumans() }}
                                                            </td>
                                                            @php
                                                                $id_encrypt = Crypt::encrypt($adm->id);
                                                            @endphp
                                                            <td class="text-center" style="vertical-align: middle">
                                                                <a href="{{ route('edit-user', $id_encrypt) }}"
                                                                    class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>
                                                                    Edit</a>
                                                                <button class="btn btn-sm btn-danger"
                                                                    onclick="confirmDelete({{ $adm->id }})"><i
                                                                        class="fa fa-trash"></i>
                                                                    Hapus</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot hidden>
                                                    <tr class="text-center">
                                                        <th rowspan="1" colspan="1">NO</th>
                                                        <th rowspan="1" colspan="1">AVATAR</th>
                                                        <th rowspan="1" colspan="1">NAMA PENGGUNA</th>
                                                        <th rowspan="1" colspan="1">LEVEL</th>
                                                        <th rowspan="1" colspan="1">EMAIL</th>
                                                        <th rowspan="1" colspan="1">PASSWORD</th>
                                                        <th rowspan="1" colspan="1">DIBUAT</th>
                                                        <th rowspan="1" colspan="1">DIPERBARUI</th>
                                                        <th rowspan="1" colspan="1" class="text-center">AKSI</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Kepsek --}}
                            <div class="tab-pane fade" id="custom-content-above-kepsek" role="tabpanel"
                                aria-labelledby="custom-content-above-kepsek-tab">
                                <div class="row pt-2">
                                    <div class="col-md-12 col-12">
                                        <div id="kepsek_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <table id="kepsek" class="table table-bordered table-striped dataTable dtr-inline">
                                                <thead class="bg-cyan">
                                                    <tr class="text-center">
                                                        <th style="vertical-align: middle">NO</th>
                                                        <th style="vertical-align: middle">AVATAR</th>
                                                        <th style="vertical-align: middle">NAMA PENGGUNA</th>
                                                        <th style="vertical-align: middle">LEVEL</th>
                                                        <th style="vertical-align: middle">EMAIL</th>
                                                        <th style="vertical-align: middle">PASSWORD</th>
                                                        <th style="vertical-align: middle">DIBUAT</th>
                                                        <th style="vertical-align: middle">DIPERBARUI</th>
                                                        <th style="vertical-align: middle">AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($kepsek as $kps)
                                                        <tr class="odd&even text-center">
                                                            <td class="text-center" style="vertical-align: middle">
                                                                {{ $no2++ }}</td>
                                                            <td><img src="{{ asset('pictures/user/' . $kps->foto) }}" width=auto,
                                                                    height=100px, alt="{{ $kps->foto }}">
                                                            </td>
                                                            <td style="vertical-align: middle">{{ $kps->name }}</td>
                                                            <td style="vertical-align: middle">{{ $kps->level }}</td>
                                                            <td style="vertical-align: middle">{{ $kps->email }}</td>
                                                            <td style="vertical-align: middle">{{ $kps->password }}</td>
                                                            <td style="vertical-align: middle">
                                                                {{ \Carbon\Carbon::parse($kps->created_at)->translatedFormat('d F Y H:i') . ' WIB' }}
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                {{ \Carbon\Carbon::parse($kps->updated_at)->diffForHumans() }}
                                                            </td>
                                                            @php
                                                                $id_encrypt = Crypt::encrypt($kps->id);
                                                            @endphp
                                                            <td class="text-center" style="vertical-align: middle">
                                                                <a href="{{ route('edit-user', $id_encrypt) }}"
                                                                    class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>
                                                                    Edit</a>
                                                                <button class="btn btn-sm btn-danger"
                                                                    onclick="confirmDelete({{ $kps->id }})"><i
                                                                        class="fa fa-trash"></i>
                                                                    Hapus</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot hidden>
                                                    <tr class="text-center">
                                                        <th rowspan="1" colspan="1">NO</th>
                                                        <th rowspan="1" colspan="1">AVATAR</th>
                                                        <th rowspan="1" colspan="1">NAMA PENGGUNA</th>
                                                        <th rowspan="1" colspan="1">LEVEL</th>
                                                        <th rowspan="1" colspan="1">EMAIL</th>
                                                        <th rowspan="1" colspan="1">PASSWORD</th>
                                                        <th rowspan="1" colspan="1">DIBUAT</th>
                                                        <th rowspan="1" colspan="1">DIPERBARUI</th>
                                                        <th rowspan="1" colspan="1" class="text-center">AKSI</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Wali Kelas --}}
                            <div class="tab-pane fade" id="custom-content-above-walas" role="tabpanel"
                                aria-labelledby="custom-content-above-walas-tab">
                                <div class="row pt-2">
                                    <div class="col-md-12 col-12">
                                        <div id="walas_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <table id="walas" class="table table-bordered table-striped dataTable dtr-inline"
                                                aria-describedby="admin_info">
                                                <thead class="bg-cyan">
                                                    <tr class="text-center">
                                                        <th style="vertical-align: middle">NO</th>
                                                        <th style="vertical-align: middle">AVATAR</th>
                                                        <th style="vertical-align: middle">NAMA PENGGUNA</th>
                                                        <th style="vertical-align: middle">LEVEL</th>
                                                        <th style="vertical-align: middle">EMAIL</th>
                                                        <th style="vertical-align: middle">PASSWORD</th>
                                                        <th style="vertical-align: middle">DIBUAT</th>
                                                        <th style="vertical-align: middle">DIPERBARUI</th>
                                                        <th style="vertical-align: middle">AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($walas as $wls)
                                                        <tr class="odd&even text-center">
                                                            <td class="text-center" style="vertical-align: middle">
                                                                {{ $no3++ }}</td>
                                                            <td><img src="{{ asset('pictures/user/' . $wls->foto) }}" width=auto,
                                                                    height=100px, alt="{{ $wls->foto }}">
                                                            </td>
                                                            <td style="vertical-align: middle">{{ $wls->name }}</td>
                                                            <td style="vertical-align: middle">{{ $wls->level }}</td>
                                                            <td style="vertical-align: middle">{{ $wls->email }}</td>
                                                            <td style="vertical-align: middle">{{ $wls->password }}</td>
                                                            <td style="vertical-align: middle">
                                                                {{ \Carbon\Carbon::parse($wls->created_at)->translatedFormat('d F Y H:i') . ' WIB' }}
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                {{ \Carbon\Carbon::parse($wls->updated_at)->diffForHumans() }}
                                                            </td>
                                                            @php
                                                                $id_encrypt = Crypt::encrypt($wls->id);
                                                            @endphp
                                                            <td class="text-center" style="vertical-align: middle">
                                                                <a href="{{ route('edit-user', $id_encrypt) }}"
                                                                    class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>
                                                                    Edit</a>
                                                                <button class="btn btn-sm btn-danger"
                                                                    onclick="confirmDelete({{ $wls->id }})"><i
                                                                        class="fa fa-trash"></i>
                                                                    Hapus</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot hidden>
                                                    <tr class="text-center">
                                                        <th rowspan="1" colspan="1">NO</th>
                                                        <th rowspan="1" colspan="1">AVATAR</th>
                                                        <th rowspan="1" colspan="1">NAMA PENGGUNA</th>
                                                        <th rowspan="1" colspan="1">LEVEL</th>
                                                        <th rowspan="1" colspan="1">EMAIL</th>
                                                        <th rowspan="1" colspan="1">PASSWORD</th>
                                                        <th rowspan="1" colspan="1">DIBUAT</th>
                                                        <th rowspan="1" colspan="1">DIPERBARUI</th>
                                                        <th rowspan="1" colspan="1" class="text-center">AKSI</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- PSB --}}
                            <div class="tab-pane fade" id="custom-content-above-psb" role="tabpanel"
                                aria-labelledby="custom-content-above-psb-tab">
                                <div class="row pt-2">
                                    <div class="col-md-12 col-12">
                                        <div id="psb_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <table id="psb" class="table table-bordered table-striped dataTable dtr-inline"
                                                aria-describedby="admin_info">
                                                <thead class="bg-cyan">
                                                    <tr class="text-center">
                                                        <th style="vertical-align: middle">NO</th>
                                                        <th style="vertical-align: middle">AVATAR</th>
                                                        <th style="vertical-align: middle">NAMA PENGGUNA</th>
                                                        <th style="vertical-align: middle">LEVEL</th>
                                                        <th style="vertical-align: middle">EMAIL</th>
                                                        <th style="vertical-align: middle">PASSWORD</th>
                                                        <th style="vertical-align: middle">DIBUAT</th>
                                                        <th style="vertical-align: middle">DIPERBARUI</th>
                                                        <th style="vertical-align: middle">AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($psb as $p)
                                                        <tr class="odd&even text-center">
                                                            <td class="text-center" style="vertical-align: middle">
                                                                {{ $no4++ }}</td>
                                                            <td><img src="{{ asset('pictures/user/' . $p->foto) }}" width=auto,
                                                                    height=100px, alt="{{ $p->foto }}">
                                                            </td>
                                                            <td style="vertical-align: middle">{{ $p->name }}</td>
                                                            <td style="vertical-align: middle">{{ $p->level }}</td>
                                                            <td style="vertical-align: middle">{{ $p->email }}</td>
                                                            <td style="vertical-align: middle">{{ $p->password }}</td>
                                                            <td style="vertical-align: middle">
                                                                {{ \Carbon\Carbon::parse($p->created_at)->translatedFormat('d F Y H:i') . ' WIB' }}
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                {{ \Carbon\Carbon::parse($p->updated_at)->diffForHumans() }}
                                                            </td>
                                                            @php
                                                                $id_encrypt = Crypt::encrypt($p->id);
                                                            @endphp
                                                            <td class="text-center" style="vertical-align: middle">
                                                                <a href="{{ route('edit-user', $id_encrypt) }}"
                                                                    class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>
                                                                    Edit</a>
                                                                <button class="btn btn-sm btn-danger"
                                                                    onclick="confirmDelete({{ $p->id }})"><i
                                                                        class="fa fa-trash"></i>
                                                                    Hapus</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot hidden>
                                                    <tr class="text-center">
                                                        <th rowspan="1" colspan="1">NO</th>
                                                        <th rowspan="1" colspan="1">AVATAR</th>
                                                        <th rowspan="1" colspan="1">NAMA PENGGUNA</th>
                                                        <th rowspan="1" colspan="1">LEVEL</th>
                                                        <th rowspan="1" colspan="1">EMAIL</th>
                                                        <th rowspan="1" colspan="1">PASSWORD</th>
                                                        <th rowspan="1" colspan="1">DIBUAT</th>
                                                        <th rowspan="1" colspan="1">DIPERBARUI</th>
                                                        <th rowspan="1" colspan="1" class="text-center">AKSI</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Santri --}}
                            <div class="tab-pane fade" id="custom-content-above-santri" role="tabpanel"
                                aria-labelledby="custom-content-above-santri-tab">
                                <div class="row pt-2">
                                    <div class="col-md-12 col-12">
                                        <div id="santri_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <table id="santri" class="table table-bordered table-striped dataTable dtr-inline"
                                                aria-describedby="admin_info">
                                                <thead class="bg-cyan">
                                                    <tr class="text-center">
                                                        <th style="vertical-align: middle">NO</th>
                                                        <th style="vertical-align: middle">AVATAR</th>
                                                        <th style="vertical-align: middle">NAMA PENGGUNA</th>
                                                        <th style="vertical-align: middle">LEVEL</th>
                                                        <th style="vertical-align: middle">EMAIL</th>
                                                        <th style="vertical-align: middle">PASSWORD</th>
                                                        <th style="vertical-align: middle">DIBUAT</th>
                                                        <th style="vertical-align: middle">DIPERBARUI</th>
                                                        <th style="vertical-align: middle">AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($santri as $s)
                                                        <tr class="odd&even text-center">
                                                            <td class="text-center" style="vertical-align: middle">
                                                                {{ $no5++ }}</td>
                                                            <td><img src="{{ asset('pictures/user/' . $s->foto) }}" width=auto,
                                                                    height=100px, alt="{{ $s->foto }}">
                                                            </td>
                                                            <td style="vertical-align: middle">{{ $s->name }}</td>
                                                            <td style="vertical-align: middle">{{ $s->level }}</td>
                                                            <td style="vertical-align: middle">{{ $s->email }}</td>
                                                            <td style="vertical-align: middle">{{ $s->password }}</td>
                                                            <td style="vertical-align: middle">
                                                                {{ \Carbon\Carbon::parse($s->created_at)->translatedFormat('d F Y H:i') . ' WIB' }}
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                {{ \Carbon\Carbon::parse($s->updated_at)->diffForHumans() }}
                                                            </td>
                                                            @php
                                                                $id_encrypt = Crypt::encrypt($s->id);
                                                            @endphp
                                                            <td class="text-center" style="vertical-align: middle">
                                                                <a href="{{ route('edit-user', $id_encrypt) }}"
                                                                    class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>
                                                                    Edit</a>
                                                                <button class="btn btn-sm btn-danger"
                                                                    onclick="confirmDelete({{ $s->id }})"><i
                                                                        class="fa fa-trash"></i>
                                                                    Hapus</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot hidden>
                                                    <tr class="text-center">
                                                        <th rowspan="1" colspan="1">NO</th>
                                                        <th rowspan="1" colspan="1">AVATAR</th>
                                                        <th rowspan="1" colspan="1">NAMA PENGGUNA</th>
                                                        <th rowspan="1" colspan="1">LEVEL</th>
                                                        <th rowspan="1" colspan="1">EMAIL</th>
                                                        <th rowspan="1" colspan="1">PASSWORD</th>
                                                        <th rowspan="1" colspan="1">DIBUAT</th>
                                                        <th rowspan="1" colspan="1">DIPERBARUI</th>
                                                        <th rowspan="1" colspan="1" class="text-center">AKSI</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Semua --}}
                            <div class="tab-pane fade" id="custom-content-above-semua" role="tabpanel"
                                aria-labelledby="custom-content-above-semua-tab">
                                <div class="row pt-2">
                                    <div class="col-md-12 col-12">
                                        <div id="semua_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <table id="semua" class="table table-bordered table-striped dataTable dtr-inline"
                                                aria-describedby="admin_info">
                                                <thead class="bg-cyan">
                                                    <tr class="text-center">
                                                        <th style="vertical-align: middle">NO</th>
                                                        <th style="vertical-align: middle">AVATAR</th>
                                                        <th style="vertical-align: middle">NAMA PENGGUNA</th>
                                                        <th style="vertical-align: middle">LEVEL</th>
                                                        <th style="vertical-align: middle">EMAIL</th>
                                                        <th style="vertical-align: middle">PASSWORD</th>
                                                        <th style="vertical-align: middle">DIBUAT</th>
                                                        <th style="vertical-align: middle">DIPERBARUI</th>
                                                        <th style="vertical-align: middle">AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($all as $u)
                                                        <tr class="odd&even text-center">
                                                            <td class="text-center" style="vertical-align: middle">
                                                                {{ $no6++ }}</td>
                                                            <td><img src="{{ asset('pictures/user/' . $u->foto) }}" width=auto,
                                                                    height=100px, alt="{{ $u->foto }}">
                                                            </td>
                                                            <td style="vertical-align: middle">{{ $u->name }}</td>
                                                            <td style="vertical-align: middle">{{ $u->level }}</td>
                                                            <td style="vertical-align: middle">{{ $u->email }}</td>
                                                            <td style="vertical-align: middle">{{ $u->password }}</td>
                                                            <td style="vertical-align: middle">
                                                                {{ \Carbon\Carbon::parse($u->created_at)->translatedFormat('d F Y H:i') . ' WIB' }}
                                                            </td>
                                                            <td style="vertical-align: middle">
                                                                {{ \Carbon\Carbon::parse($u->updated_at)->diffForHumans() }}
                                                            </td>
                                                            @php
                                                                $id_encrypt = Crypt::encrypt($u->id);
                                                            @endphp
                                                            <td class="text-center" style="vertical-align: middle">
                                                                <a href="{{ route('edit-user', $id_encrypt) }}"
                                                                    class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>
                                                                    Edit</a>
                                                                <button class="btn btn-sm btn-danger"
                                                                    onclick="confirmDelete({{ $u->id }})"><i
                                                                        class="fa fa-trash"></i>
                                                                    Hapus</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot hidden>
                                                    <tr class="text-center">
                                                        <th rowspan="1" colspan="1">NO</th>
                                                        <th rowspan="1" colspan="1">AVATAR</th>
                                                        <th rowspan="1" colspan="1">NAMA PENGGUNA</th>
                                                        <th rowspan="1" colspan="1">LEVEL</th>
                                                        <th rowspan="1" colspan="1">EMAIL</th>
                                                        <th rowspan="1" colspan="1">PASSWORD</th>
                                                        <th rowspan="1" colspan="1">DIBUAT</th>
                                                        <th rowspan="1" colspan="1">DIPERBARUI</th>
                                                        <th rowspan="1" colspan="1" class="text-center">AKSI</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    <h5 class="modal-title">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('simpan-user') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus
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
                                value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
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
                                        <label class="custom-file-label" for="exampleInputFile">Pilih Foto Max:2mb</label>
                                    </div>
                                </span>
                            </div>
                            <div class="col-sm-3">
                                <span>
                                    <img class="img-thumbnail" id="preview_photo">
                                </span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="Password">
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
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Ulangi password">
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
                            <select class="form-control" name="level" id="level" onchange="tampilkanFormLain()">
                                <option value="">-- Pilih Tipe User --</option>
                                <option value="Admin">Admin</option>
                                <option value="Kepsek">Kepala Sekolah</option>
                                <option value="Walas">Wali Kelas</option>
                                <option value="PSB Dara">Panitia Santri Baru</option>
                                <option value="Santri">Santri</option>
                            </select>
                        </div>
                        <div id="form-sekolah" class="input-group mb-3">

                        </div>
                        <div id="form-kelas" class="input-group mb-3">

                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i
                            class="fa fa-close"></i> BATAL</button>
                    <button type="submit" class="btn btn-success text-bold">
                        <i class="fas fa-user-plus"></i> DAFTAR</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('script')
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
                    window.location.href = "user-delete/" + id;
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
                "columnDefs": [{
                        targets: 5,
                        visible: false
                    },
                    {
                        targets: 6,
                        visible: false
                    },
                    {
                        targets: 7,
                        visible: false
                    },

                ],

                "buttons": ["copy", "csv", "excel", "colvis"]
            }).buttons().container().appendTo('#admin_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#kepsek").DataTable({
                "responsive": true,
                "Paginate": true,
                "lengthChange": true,
                "Filter": true,
                "Sort": true,
                "Info": true,
                "autoWidth": false,
                "StateSave": true,
                "columnDefs": [{
                        targets: 5,
                        visible: false
                    },
                    {
                        targets: 6,
                        visible: false
                    },
                    {
                        targets: 7,
                        visible: false
                    },

                ],

                "buttons": ["copy", "csv", "excel", "colvis"]
            }).buttons().container().appendTo('#kepsek_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#walas").DataTable({
                "responsive": true,
                "Paginate": true,
                "lengthChange": true,
                "Filter": true,
                "Sort": true,
                "Info": true,
                "autoWidth": false,
                "StateSave": true,
                "columnDefs": [{
                        targets: 5,
                        visible: false
                    },
                    {
                        targets: 6,
                        visible: false
                    },
                    {
                        targets: 7,
                        visible: false
                    },

                ],

                "buttons": ["copy", "csv", "excel", "colvis"]
            }).buttons().container().appendTo('#walas_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#psb").DataTable({
                "responsive": true,
                "Paginate": true,
                "lengthChange": true,
                "Filter": true,
                "Sort": true,
                "Info": true,
                "autoWidth": false,
                "StateSave": true,
                "columnDefs": [{
                        targets: 5,
                        visible: false
                    },
                    {
                        targets: 6,
                        visible: false
                    },
                    {
                        targets: 7,
                        visible: false
                    },

                ],

                "buttons": ["copy", "csv", "excel", "colvis"]
            }).buttons().container().appendTo('#psb_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#santri").DataTable({
                "responsive": true,
                "Paginate": true,
                "lengthChange": true,
                "Filter": true,
                "Sort": true,
                "Info": true,
                "autoWidth": false,
                "StateSave": true,
                "columnDefs": [{
                        targets: 5,
                        visible: false
                    },
                    {
                        targets: 6,
                        visible: false
                    },
                    {
                        targets: 7,
                        visible: false
                    },

                ],

                "buttons": ["copy", "csv", "excel", "colvis"]
            }).buttons().container().appendTo('#santri_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#semua").DataTable({
                "responsive": true,
                "Paginate": true,
                "lengthChange": true,
                "Filter": true,
                "Sort": true,
                "Info": true,
                "autoWidth": false,
                "StateSave": true,
                "columnDefs": [{
                        targets: 5,
                        visible: false
                    },
                    {
                        targets: 6,
                        visible: false
                    },
                    {
                        targets: 7,
                        visible: false
                    },

                ],

                "buttons": ["copy", "csv", "excel", "colvis"]
            }).buttons().container().appendTo('#semua_wrapper .col-md-6:eq(0)');
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
