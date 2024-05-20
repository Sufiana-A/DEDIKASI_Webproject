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

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Daftar Feedback Untuk Sistem</h3>
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
                                        <th>ID</th>
                                        <th>Rating</th>
                                        <th>Isi Feedback</th>
                                        <th>Timestamp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($feedback_sistem as $feedback)
                                        <tr>
                                            {{-- <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="something">
                                                </div>
                                            </td> --}}
                                            <td class="subject_id">{{ $feedback->id }}</td>
                                            <td>
                                                <h2>
                                                    {{ $feedback->rating }}
                                                </h2>
                                            </td>
                                            <td>
                                                {{ $feedback->feedback }}
                                            </td>
                                            <td>
                                                {{ $feedback->create_at }}
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