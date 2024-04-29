@extends('layout.adminmaster')
@section('title', 'Dashboard Admin')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Welcome {{ Auth::guard('admin')->user()->first_name }} {{ Auth::guard('admin')->user()->last_name }}!</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-12 col-sm-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body text-center">
                        <h2>Total Peserta Saat Ini</h2>
                        <img src="{{ URL::to('assets/img/icons/dash-icon-01.svg') }}" alt="Dashboard Icon" style="width:100px">
                        <h3>{{ $data_peserta->count() }} Orang</h3>
                    </div>
                </div>
            </div>
        </div>  
@endsection

  