@extends('layout.adminmaster')
@section('title', 'Dashboard Admin')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Welcome {{ Auth::guard('admin')->user()->first_name }} {{ Auth::guard('admin')->user()->last_name }}!</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-12 col-sm-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body text-center">
                        <h2>Total Peserta Saat Ini</h2>
                        <img src="{{ URL::to('assets/img/icons/dash-icon-01.svg') }}" alt="Dashboard Icon" style="width:100px">
                        <h3>{{ $data_peserta->count() }} Orang</h3>
                    </div>
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
                                    <h3 class="page-title">Daftar Jumlah Peserta Pelatihan</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        {{-- <th>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </th> --}}
                                        <th>ID</th>
                                        <th>Nama Pelatihan</th>
                                        <th>Total Peserta (Status Diterima)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                        <tr>
                                            {{-- <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="something">
                                                </div>
                                            </td> --}}
                                            <td class="subject_id">{{ $course->id }}</td>
                                            <td>
                                                <h2>
                                                    <a>{{ $course->title }}</a>
                                                </h2>
                                            </td>
                                            <td>
                                                {{ $course->peserta->where('pivot.status', 'diterima')->count() }}
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
@endsection

  