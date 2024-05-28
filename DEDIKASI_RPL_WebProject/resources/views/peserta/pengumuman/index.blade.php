@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">PENGUMUMAN <i class="fa fa-envelope-o ms-2" aria-hidden="true" id="notification-icon"></i></h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pengumuman</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">List Pengumuman</h3>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ route('announcements.index') }}" class="btn btn-primary" id="read-all-btn">Read All</a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($announcements as $announcement)
                                            <tr>
                                                <td>{{ $announcement->title }}</td>
                                                <td>
                                                    @php
                                                        $description = strip_tags($announcement->description);
                                                        $maxLength = 60;
                                                        $shortDescription = strlen($description) > $maxLength ? substr($description, 0, $maxLength) . "..." : $description;
                                                    @endphp
                                                    {{ $shortDescription }}
                                                    @if (strlen($description) > $maxLength)
                                                        <span class="more-content" style="display: none;">{{ substr($description, $maxLength) }}</span>
                                                        <a href="#" class="show-more">Lihat Selengkapnya</a>
                                                    @endif
                                                </td>
                                                <td class="text-end">
                                                    <a href="{{ route('announcements.view', $announcement->id) }}" class="btn btn-sm btn-primary text-white mr-2">
                                                        View
                                                    </a>                                                   
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
