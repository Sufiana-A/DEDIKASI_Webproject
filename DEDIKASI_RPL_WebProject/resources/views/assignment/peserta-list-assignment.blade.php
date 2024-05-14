@extends('layout.master')
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title" style="font-size: 20px; font-weight: bold; margin-left: 10px; color:#3d5ee1;" >Assignment </h3> <br> <hr>    
                        </div>
                    </div>
                </div>
            </div>

        <div class="row ">
            @foreach ($assignments as $assignment)
            <div class="col-xl-10 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h5 class="card-title">{{ $assignment->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Tugas: {{ $assignment->id_tugas }}</h6>
                                <hr>
                                <p class="card-text">{{ $assignment->description }}</p>
                                {{-- <a href="{{ $assignment->addition }}" class="card-link" target="_blank">Tugas</a> --}}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="skip-group">
                                <a href="{{ asset('storage/assignment/'. $assignment->addition) }}" target="_blank" class="btn btn-info continue-btn" style="margin-top: 10px; padding: 5px 10px;" download><i class="fas fa-download"></i> File Tugas</a>
                                <a href="{{ route('create_assignment') }}" target="_blank" class="btn btn-info continue-btn" style="margin-top: 10px; padding: 5px 10px;"><i class="fas fa-book"></i> Kumpulkan Tugas</a>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
            @endforeach
        </div>
        </div>   
    </div>
@endsection