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
                        <div class="card bg-primary text-black shadow mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $enroll->course->title }}</h5>
                                <p class="card-text">{{ $enroll->course->class }}</p>
                                <img src="{{ asset('assets/img/peserta_pelatihan/'.Auth::guard('course')->user()->image) }}" class="card-img-top" style="width:400px" alt="figma">
                                <p class="card-text">{{ $enroll->course->description }}</p>
                                <a href="{{ $enroll->video->id_video }}" class="btn btn-primary"><i class="fas fa-video"></i> Video </a>
                                <a href="{{ $enroll->materi->id_materi }}" class="btn btn-primary"><i class="fas fa-file"></i> Material </a>
                                <a href="{{ $enroll->assignment->id_tugas }}" class="btn btn-primary"><i class="fas fa-file-alt"></i> Assignment </a>
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