
@extends('layout.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <h1 class="col-sm-12 d-flex justify-content-center text-center" style="font-size: 20px; font-weight: bold;margin-bottom: 30px; ">Registrasi Pelatihan</h1>
            <div class="row">
                <div class="col">
                    <form method="post" action="" class="w-75 m-auto">
                        @csrf
                    <div class="form-group row mb-4">
                        <label class="col-sm-12 col-md-4 col-form-label">NIK</label>
                        <div class="col-sm-12 col-md-8">
                        <input type="text" class="form-control" style="width: 450px; height: 30px;" @error('nik') is-invalid @enderror" name="nik" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="ktm" class="col-sm-12 col-md-4 col-form-label">Scan KTM</label>
                        <div class="col-sm-12 col-md-8">
                            <div class="input-group mb-2 fs-15">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="ktm" name="ktm" accept=".jpeg,.jpg,.png" required>
                                </div>                            
                            </div>
                            <small id="fileHelp" class="form-text text-muted">Hanya menerima file .jpg dan .png</small>
                        </div>
                    </div>                    
                    <div class="form-group row mb-4">
                        <label for="ktp" class="col-sm-12 col-md-4 col-form-label">Scan KTP</label>
                        <div class="col-sm-12 col-md-8">
                            <div class="input-group mb-2 fs-15">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="ktp" name="ktp" accept=".jpeg,.jpg,.png" required>
                                </div>
                            </div>
                            <small id="fileHelp" class="form-text text-muted">Hanya menerima file .jpg dan .png</small>
                        </div>
                    </div>
                    
                    <div class="form-group row justify-content-end mb-1">
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button class="btn btn-primary btn-block" type="submit">Daftar Pelatihan</button>
                        </div>
                    </div>
                    </form>
        </div>
    </div>
  </div>
@endsection
