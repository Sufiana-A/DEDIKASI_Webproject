@extends('layout.master')
@section('title', 'List Video')
@section('content')
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
                @php
                    $youtube_url = null;
                    if (!empty($video->link_terkait)) {
                        $youtube_url = $video->link_terkait;
                        if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $youtube_url, $id)) {
                            $youtube_url = 'https://www.youtube.com/embed/' . $id[1];
                        } elseif (preg_match('/youtu\.be\/([^\&\?\/]+)/', $youtube_url, $id)) {
                            $youtube_url = 'https://www.youtube.com/embed/' . $id[1];
                        }
                    }
                @endphp

                <div class="col-sm-12" style="justify-content: center;">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h5 class="card-title">{{ $video->judul_video }}</h5>
                                    <h6>{{ $video->deskripsi_video }}</h6>
                                </div>
                            </div>
                            <div class="col-12" style="display: flex; justify-content: center; align-items: center; text-align: center;">
                                    @if ($youtube_url)
                                        <div class="skip-group">
                                            <iframe width="800" height="500" src="{{ $youtube_url }}" frameborder="2" style="border-radius: 10px;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>

                                    @else
                                        <h6 style="color: red"><i>Video belum diunggah</i></h6>
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
