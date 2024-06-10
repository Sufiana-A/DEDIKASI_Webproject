@extends('layout.mentormaster')
@section('title', 'Edit Profile Mentor')
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
                                <img class="rounded-circle" alt="" src="{{ asset('assets/img/profiles/'.Auth::guard('mentor')->user()->foto_mentor) }}">
                            </a>
                        </div>
                        <form method="POST" action="{{ route('profil_photo_submit_mentor') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col ms-md-n2 profile-user-info">
                                <h4 class="user-name mb-3">Change Photo</h4>
                                <input type="file" class="form-control mt_10" name="photo">
                            </div>
                            <div class="pt-2">
                                <label class="form-label"></label>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sync" aria-hidden="true"></i> Update</button>
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
                                        <form method="POST" action="{{ route('profile_submit_mentor') }}">
                                            @csrf
                                            <div class="mb-4 form-group">
                                                <label for="first_name" class="text-muted text-sm-end mb-3 mb-sm-3">First Name</label>
                                                <input type="text" class="form-control col-sm-9" name="first_name" value="{{ Auth::guard('mentor')->user()->first_name }}" readonly>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="last_name" class="text-muted text-sm-end mb-3 mb-sm-3">Last Name</label>
                                                <input type="text" class="form-control col-sm-9" name="last_name" value="{{ Auth::guard('mentor')->user()->last_name }}" readonly>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="nip" class="text-muted text-sm-end mb-3 mb-sm-3">NIP</label>
                                                <input type="text" class="form-control col-sm-9" name="nip" value="{{ Auth::guard('mentor')->user()->nip }}" readonly>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="email" class="text-muted text-sm-end mb-3 mb-sm-3">Email</label>
                                                <input type="email" class="form-control col-sm-9 @error('email') is-invalid @enderror" name="email" placeholder="example@gmail.com" value="{{  Auth::guard('mentor')->user()->email }}">
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
                                                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" placeholder="8510023841" name="no_hp" value="{{ ltrim(Auth::guard('mentor')->user()->no_hp, '0') }}">
                                                    @error('no_hp')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="change_pw" class="text-muted text-sm-end mb-3 mb-sm-3">Change Password</label>
                                                <input type="password" class="form-control col-sm-9 @error('password') is-invalid @enderror" placeholder="Type your new password" name="password">
                                                @error('password')
                                                <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-4 form-group">
                                                <label for="pw_confirm" class="text-muted text-sm-end mb-3 mb-sm-3">Password Confirmation</label>
                                                <input type="password" class="form-control col-sm-9 @error('password_confirm') is-invalid @enderror" placeholder="Retype your password here" name="password_confirm">
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