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
                <div class="row row-cols-md-2">
                    <div class="col mb-4">
                        <div class="card bg-primary text-white shadow mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $enroll->courses->title }}</h5>
                                <p class="card-text">{{ $enroll->courses->description }}</p>
                                <a href="#" class="btn btn-outline-dark"><i class="fas fa-video"></i> Video </a>
                                <a href="#" class="btn btn-outline-dark"><i class="fas fa-file"></i> Material </a>
                                <a href="#" class="btn btn-outline-dark"><i class="fas fa-file-alt"></i> Assignment </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection