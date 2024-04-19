@extends('layout.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title" style="color:#3d5ee1;">Edit Profil</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="" src="{{ asset('assets/img/profiles/'.Auth::guard('peserta')->user()->foto_peserta) }}">
                            </a>
                        </div>
                        <form method="POST" action="{{ route('profil_photo_submit_peserta') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col ms-md-n2 profile-user-info">
                                <h4 class="user-name mb-3">Change Photo</h4>
                                <input type="file" class="form-control mt_10" name="photo">
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="tab-content profile-tab-cont">
                    <div class="tab-pane fade show active" id="per_details_tab">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between mb-3">
                                            <span style="color:#3d5ee1;">Edit Detail Profil</span>
                                        </h5>
                                        <form method="POST" action="{{ route('profile_submit_peserta') }}">
                                            @csrf
                                            <div class="mb-4 form-group">
                                                <label for="first_name" class="text-muted text-sm-end mb-3 mb-sm-3">First Name</label>
                                                <input type="text" class="form-control col-sm-9" name="first_name" value="{{ Auth::guard('peserta')->user()->first_name }}" readonly>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="last_name" class="text-muted text-sm-end mb-3 mb-sm-3">Last Name</label>
                                                <input type="text" class="form-control col-sm-9" name="last_name" value="{{ Auth::guard('peserta')->user()->last_name }}" readonly>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="nim" class="text-muted text-sm-end mb-3 mb-sm-3">NIM</label>
                                                <input type="text" class="form-control col-sm-9" name="nim" value="{{ Auth::guard('peserta')->user()->nim  }}" readonly>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="angkatan" class="text-muted text-sm-end mb-3 mb-sm-3">Angkatan</label>
                                                <input type="text" class="form-control col-sm-9 @error('angkatan') is-invalid @enderror" name="angkatan" placeholder="contoh: 2021" value="{{ Auth::guard('peserta')->user()->angkatan }}">
                                                @error('angkatan')
                                                <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="jurusan" class="text-muted text-sm-end mb-3 mb-sm-3">Jurusan</label>
                                                <input type="text" class="form-control col-sm-9 @error('jurusan') is-invalid @enderror" name="jurusan" placeholder="contoh: sistem informasi" value="{{ Auth::guard('peserta')->user()->jurusan }}">
                                                @error('jurusan')
                                                <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="email" class="text-muted text-sm-end mb-3 mb-sm-3">Email</label>
                                                <input type="text" class="form-control col-sm-9 @error('email') is-invalid @enderror" placeholder="example@gmail.com" name="email" value="{{ Auth::guard('peserta')->user()->email  }}">
                                                @error('email')
                                                <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="nomor_telepon" class="text-muted text-sm-end mb-3 mb-sm-3">Nomor Telepon</label>
                                                <div class="input-group col-sm-9">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <img src="{{ asset('assets/img/icons/flag-idn.png') }}" alt="flag idn" width="25">+62</span>
                                                    </div>
                                                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" placeholder="8510023841" name="no_hp" value="{{ ltrim(Auth::guard('peserta')->user()->no_hp, '0') }}">
                                                    @error('no_hp')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="change_pw" class="text-muted text-sm-end mb-3 mb-sm-3">Change Password</label>
                                                <input type="text" class="form-control col-sm-9 @error('password') is-invalid @enderror" placeholder="Type your new password" name="password">
                                                @error('password')
                                                <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="pw_confirm" class="text-muted text-sm-end mb-3 mb-sm-3">Password Confirmation</label>
                                                <input type="text" class="form-control col-sm-9 @error('password_confirm') is-invalid @enderror" placeholder="Retype your password here" name="password_confirm">
                                                @error('password_confirm')
                                                <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label"></label>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-sync" aria-hidden="true"></i> Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection