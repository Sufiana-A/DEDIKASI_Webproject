@extends('layout.master')

@section('css')
<style>
    img {
        max-width: 100%;
        height: auto;
    }
</style>
@endsection

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">{{ $course->title }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-10 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        {!! $course->description !!}
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">Materi</a>
                        <a href="#" class="btn btn-primary">Assignment</a>
                        <a href="#" class="btn btn-primary">Video</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

