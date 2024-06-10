@extends('layout.master')
@section('title', 'Detail Artikel')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h5>Detail Artikel <hr></h5> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex" style="justify-content: center;">
                <div class="card bg-comman w-100">
                    <div class="card-body" style="display: flex; justify-content: center; align-items: center; text-align: center;">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info" style="text-align: center;">
                                <h2 class="card-title" >{{ $artikel->judul }}</h2>
                                <h6>{{ $artikel->penulis }} | diunggah {{ $artikel->waktu }} </h6>
                                <br>
                                <p>{!! $artikel->konten !!}</p>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
        <a href="{{ route('peserta_artikel') }}">Kembali ke List Artikel</a>
    </div>
</div>
@endsection