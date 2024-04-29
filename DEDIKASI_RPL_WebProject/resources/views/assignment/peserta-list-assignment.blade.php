@extends('layout.master')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="font-size: 20px; font-weight: bold; margin-left: 10px; color:#3d5ee1;">Daftar Penugasan</h4>
                        <h6> > Lihat daftar penugasan yang tersedia!</h6> <br>
                    </div>    
                    <div class="card-body">
                        <div class="row">
                            @foreach ($assignments as $assignment)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $assignment->judul_tugas }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">ID Tugas: {{ $assignment->id_tugas }}</h6>
                                        <p class="card-text">{{ $assignment->deskripsi_tugas }}</p>
                                        <a href="{{ $assignment->link_terkait }}" class="card-link" target="_blank">Lihat Materi</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection