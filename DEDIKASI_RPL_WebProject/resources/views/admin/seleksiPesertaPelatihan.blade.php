@extends('layout.adminmaster')
@section('content')
{{-- message --}}

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">SELEKSI PESERTA</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Seleksi Peserta</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="student-group-form">
                <form action="{{ route('seleksi_peserta.search')}}" method="get">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Cari Berdasarkan Nama" name="nama" value="{{ request()->nama ?? null }}">
                            </div>
                        </div>
                        {{-- <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Cari Berdasarkan Pelatihan" name="title" value="{{ request()->title ?? null }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Cari Berdasarkan Status" name="status" value="{{ request()->status ?? null }}">
                            </div>
                        </div> --}}
                        <div class="col-lg-2">
                            <div class="search-student-btn">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Daftar Peserta</h3>
                                    </div>

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>Waktu Pendaftaran</th>
                                            <th>Nama Peserta</th>
                                            <th>Pelatihan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pesertaPelatihan as $peserta)
                                        @foreach ($peserta->course as $course)
                                        <tr>
                                            <td>{{ $course->pivot->created_at }}</td>
                                            <td>{{ $peserta->first_name }} {{ $peserta->last_name }}</td>
                                            <td>{{ $course->title }}</td>
                                            <td>{{ $course->pivot->status }}</td>
                                            <td><a href="{{ route('detail_seleksi_peserta', [$peserta->id, $course->id]) }}" class="btn btn-primary btn-sm text-white"><i class="fas fa-edit"></i> Update Status</a>
                                        </tr>
                                        @endforeach
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
