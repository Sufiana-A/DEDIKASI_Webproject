@extends('layout.master')
@section('title', 'Detail Pengumuman')
@section('content')
<style>
    .description {
        text-align: justify;
        margin-bottom: 30px;
        line-height: 1.8; /* Mengatur spasi antar baris menjadi lebih renggang */
    }
    .card-title {
        font-size: 40px; /* Menjadikan ukuran font judul lebih besar */
        font-weight: bold; /* Memperkuat font judul */
        margin-bottom: 20px;
    }
</style>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Detail Pengumuman</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('announcements.index') }}">Pengumuman</a></li>
                        <li class="breadcrumb-item active">Detail Pengumuman</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $announcement->title }}</h3>
                        <div class="image">
                            {!! (($announcement->image)) !!}
                        </div>
                        <div class="description">
                            {!! nl2br(strip_tags($announcement->description)) !!}
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('announcements.index') }}" class="btn btn-secondary">Kembali ke Pengumuman</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
