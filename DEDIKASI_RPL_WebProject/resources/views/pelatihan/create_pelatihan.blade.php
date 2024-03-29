@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Tambah Pelatihan</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="subjects.html">Pelatihan</a></li>
                            <li class="breadcrumb-item active">Tambah Pelatihan</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('pelatihan/save') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Informasi Pelatihan</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nama Pelatihan <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="nama_pelatihan" placeholder="Masukkan Nama Pelatihan">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Kategori Pelatihan <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="kategori_pelatihan" placeholder="Masukkan Kategori">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="peserta-submit">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection