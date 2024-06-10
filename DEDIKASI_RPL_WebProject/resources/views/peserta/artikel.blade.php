@extends('layout.master')
@section('title', 'List Artikel')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h2 style="color: blue">Artikel </h2> 
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($artikel as $artikel)
            <hr>
            <a href="/detail-artikel/{{ $artikel->id }}" style="width: 100%; text-decoration: none;">
                <div class="col-xl-10 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100" style="transition: transform 0.3s ease; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); cursor: pointer;" 
                        onmouseover="this.style.transform='translateY(-5px)';" 
                        onmouseout="this.style.transform='translateY(0)';">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h5 class="card-title">{{ $artikel->judul }}</h5>
                                    <h6>{{ $artikel->penulis }} | {{ $artikel->waktu }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection