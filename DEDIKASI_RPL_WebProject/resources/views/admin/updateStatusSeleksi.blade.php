@extends('layout.adminmaster')
@section('title', 'Update Seleksi Peserta Pelatihan')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <h1 class="col-sm-12 d-flex justify-content-center text-center" style="font-size: 20px; font-weight: bold;margin-bottom: 30px; ">Detail Peserta</h1>
            <div class="row">
                <div class="col">
                    <form method="POST" action="{{ route('submit_update_seleksi', [$peserta->id, $course->id]) }}" enctype="multipart/form-data" class="w-75 m-auto">
                        @csrf

                        <div class="form-group row mb-4">
                            <label class="col-sm-12 col-md-4 col-form-label">Nama Peserta</label>
                            <div class="col-sm-12 col-md-8">
                                <span class="form-control" style="width: 450px; height: 25px; border: 1px solid #ced4da; padding: 1px 5px; background-color: #f0f0f0; pointer-events: none; color: #6c757d; font-size: 14px;">{{ $peserta->first_name }} {{ $peserta->last_name }}</span>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-12 col-md-4 col-form-label">Pelatihan</label>
                            <div class="col-sm-12 col-md-8">
                                <span class="form-control" style="width: 450px; height: 25px; border: 1px solid #ced4da; padding: 1px 5px; background-color: #f0f0f0; pointer-events: none; color: #6c757d; font-size: 14px;">{{$course->title }}</span>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-12 col-md-4 col-form-label">NIM</label>
                            <div class="col-sm-12 col-md-8">
                                <span class="form-control" style="width: 450px; height: 25px; border: 1px solid #ced4da; padding: 1px 5px; background-color: #f0f0f0; pointer-events: none; color: #6c757d; font-size: 14px;">{{ $peserta->nim }}</span>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-sm-12 col-md-4 col-form-label">NIK</label>
                            <div class="col-sm-12 col-md-8">
                                <span class="form-control" style="width: 450px; height: 25px; border: 1px solid #ced4da; padding: 1px 5px; background-color: #f0f0f0; pointer-events: none; color: #6c757d; font-size: 14px;">{{$course->pivot->nik}}</span>

                            </div>
                        </div>                        
                        <div class="form-group row mb-4">
                            <label for="ktm" class="col-sm-12 col-md-4 col-form-label">Scan KTM</label>
                            <div class="col-sm-12 col-md-8">
                                <img src="{{ asset('storage/seleksi/ktm/'. $course->pivot->ktm) }}" alt=" " style="max-height: 200px;">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="ktp" class="col-sm-12 col-md-4 col-form-label">Scan KTP</label>
                            <div class="col-sm-12 col-md-8">
                                <img src="{{asset('/storage/seleksi/ktp/'. $course->pivot->ktp)}}" alt=" " style="max-height: 200px;">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="status" class="col-sm-12 col-md-4 col-form-label" name="status">Status</label>
                            <div class="col-sm-12 col-md-8">           
                                <select class="form-select form-select-sm" name="status">
                                        <<option value="Pending" {{ $course->pivot->status == 'Pending'? 'selected' : '' }}>Pending</option>
                                        <option value="Diterima" {{ $course->pivot->status == 'Diterima'? 'selected' : '' }}>Diterima</option>
                                        <option value="Ditolak - Data Tidak Sesuai" {{ $course->pivot->status == 'Ditolak - Data Tidak Sesuai'? 'selected' : '' }}>Ditolak - Data Tidak Sesuai</option>                                                                            
                                        <option value="Ditolak - File Tidak Terbaca" {{ $course->pivot->status == 'Ditolak - File Tidak Terbaca'? 'selected' : '' }}>Ditolak - File Tidak Terbaca</option>
                                    </select>
                            </div>
                        </div>                                     
                        <div class="form-group row justify-content-end mb-1">
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button class="btn btn-primary" type="submit" style="margin-right: 10px;">Simpan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

