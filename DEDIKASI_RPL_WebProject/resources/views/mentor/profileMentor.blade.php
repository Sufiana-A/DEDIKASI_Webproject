@extends('layout.mentormaster')
@section('title', 'Profile Mentor')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title" style="color:#3d5ee1;">Profil Saya</h3>
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
                        <div class="col ms-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">Hi, {{ Auth::guard('mentor')->user()->first_name }} {{ Auth::guard('mentor')->user()->last_name }}</h4>
                        </div>
                    </div>
                </div>
                <div class="profile-menu"></div>
                <div class="tab-content profile-tab-cont">
                    <div class="tab-pane fade show active" id="per_details_tab">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span style="color:#3d5ee1;">Detail Profil Mentor</span>
                                            <a class="edit-link" href="{{ route('profile_edit_mentor') }}"><i
                                                    class="far fa-edit me-1"></i>Edit</a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Nama Depan</p>
                                            <p class="col-sm-9">{{ Auth::guard('mentor')->user()->first_name }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Nama Belakang</p>
                                            <p class="col-sm-9">{{ Auth::guard('mentor')->user()->last_name }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Tanggal Lahir</p>
                                            <p class="col-sm-9">{{ Auth::guard('mentor')->user()->tanggal_lahir }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Email</p>
                                            <p class="col-sm-9"><a href="mailto:{{ Auth::guard('mentor')->user()->email }}">{{ Auth::guard('mentor')->user()->email }}</a>
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Nomor Telepon</p>
                                            <p class="col-sm-9">{{ Auth::guard('mentor')->user()->no_hp }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">NIP</p>
                                            <p class="col-sm-9">{{ Auth::guard('mentor')->user()->nip }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Kelompok Keahlian</p>
                                            <p class="col-sm-9">{{ Auth::guard('mentor')->user()->kelompok_keahlian }}</p>
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
</div>
@endsection