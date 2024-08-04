@extends('layouts.admin-template')

@section('title')
    Edit Tamu Undangan
@endsection

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-12">
                <div class="card card-outline card-warning">
                    <div class="card-header text-center text-dark">
                        {{-- <img src="{{ asset('pictures/logo dara.png') }}" width="50" height="50"> --}}
                        <p class="h1">Edit Tamu Undangan</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('perbarui-tamu', $data->id) }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Tamu</label>
                                <input type="text" name="nama" id="nama" class="form-control"  value="{{ $data->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nomor">No WhatsApp</label>
                                <input type="text" name="nomor_hp" id="nomor" inputmode="numeric" class="form-control" value="{{ $data->nomor_hp }}">
                            </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-around">
                            <a href="{{ route('user') }}" class="btn btn-md btn-warning">
                                <i class="fas fa-user-times"></i> Kembali</a>
                            <button type="submit" class="btn btn-md btn-success">
                                <i class="fas fa-user-edit"></i> Perbarui</button>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
