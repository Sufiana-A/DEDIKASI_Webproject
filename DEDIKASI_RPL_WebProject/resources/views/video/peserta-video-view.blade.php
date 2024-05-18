@extends('layout.master')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h2>Video</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($video as $video)
                <div class="col-xl-10 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h5 class="card-title">{{ $video->judul_video }}</h5>
                                    <h6>{{ $video->deskripsi_video }}</h6>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="skip-group">
                                    <a href="{{ $video->link_terkait }}" class="btn btn-info continue-btn" style="margin-top: 10px; padding: 5px 10px;" target="_blank"><i class="fas fa-video"></i> Lihat Video</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
