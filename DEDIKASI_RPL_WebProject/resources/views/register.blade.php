@extends('layout.app')
@section('content')
    <div class="login-right">
        <div class="login-right-wrap">
            <h1>Register</h1>
            <p class="account-subtitle">Masukkan detail untuk membuat akun</p>
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Depan <span class="login-danger">*</span></label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name">
                    <span class="profile-views"></span>
                </div>
                <div class="form-group">
                    <label>Nama Belakang <span class="login-danger">*</span></label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name">
                    <span class="profile-views"></i></span>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir (dd/mm/yyyy) <span class="login-danger">*</span></label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir">
                    <span class="profile-views"></i></span>
                </div>
                <div class="form-group">
                    <label>NIM <span class="login-danger">*</span></label>
                    <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim">
                    <span class="profile-views"></span>
                </div>
                <div class="form-group">
                    <label>Jurusan <span class="login-danger">*</span></label>
                    <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan">
                    <span class="profile-views"></span>
                </div>
                <div class="form-group">
                    <label>Angkatan (Tahun Masuk) <span class="login-danger">*</span></label>
                    <input type="integer" class="form-control @error('angkatan') is-invalid @enderror" name="angkatan">
                    <span class="profile-views"></span>
                </div>
                <div class="form-group">
                    <label>No. Handphone <span class="login-danger">*</span></label>
                    <input type="integer" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp">
                    <span class="profile-views"><i class="fas fa-phone"></i></span>
                </div>
                <div class="form-group">
                    <label>Email <span class="login-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                </div>
                <div class="form-group">
                    <label>Password <span class="login-danger">*</span></label>
                    <input type="password" class="form-control pass-input  @error('password') is-invalid @enderror" name="password">
                    <span class="profile-views feather-eye toggle-password"></span>
                </div>
                <div class="form-group">
                    <label>Confirm password <span class="login-danger">*</span></label>
                    <input type="password" class="form-control pass-confirm @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                    <span class="profile-views feather-eye reg-toggle-password"></span>
                </div>
                <div class=" dont-have">Already Registered? <a  href="{{ route('login')}}">Login</a></div>
                <div class="form-group mb-0">
                    <button class="btn btn-primary btn-block" type="submit">Register</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection
