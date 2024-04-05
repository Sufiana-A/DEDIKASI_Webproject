@extends('layout.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title" style="color:#3d5ee1;">Pelatihan Saya</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($pelatihanAcc as $enroll)
                <div class="col-md-4">
                    <div class="card bg-danger text-white shadow mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $enroll->pelatihan->nama }}</h5>
                            <p class="card-text">{{ $enroll->pelatihan->desc }}</p>
                            <a href="#" class="btn btn-outline-dark"><i class="fas fa-video"></i> Video </a>
                            <a href="#" class="btn btn-outline-dark"><i class="fas fa-file"></i> Material </a>
                            <a href="#" class="btn btn-outline-dark"><i class="fas fa-file-alt"></i> Assignment </a>
                        </div>
                    </div>
                </div>
                @if (($loop->index + 1) % 3 == 0)
                    </div><div class="row">
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection