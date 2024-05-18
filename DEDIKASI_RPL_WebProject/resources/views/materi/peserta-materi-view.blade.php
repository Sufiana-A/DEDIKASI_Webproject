@extends('layout.master')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h2>Materi</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($materi as $item)
                <div class="col-xl-10 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h5 class="card-title">{{ $item->judul_materi }}</h5>
                                    <h6>{{ $item->deskripsi_materi }}</h6>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="skip-group">
                                    <a href="{{ asset('storage/materi/'. $item->link_terkait) }}" class="btn btn-info continue-btn" style="margin-top: 10px; padding: 5px 10px;" download><i class="fas fa-download"></i> File Materi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
