@extends('layout.master')
@section('content')
{{-- message --}}

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title" style="color:#3d5ee1;">Timeline Saya</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard-peserta">Dashboard</a></li>
                            <li class="breadcrumb-item active">Timeline</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="student-group-form">
                <form action="{{ route('timeline_index') }}" method="get">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search by Title" name="title" value="{{ request()->title ?? null }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search by Class" name="class" value="{{ request()->class ?? null }}">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="search-student-btn">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Timelines</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="{{ route('timeline_add') }}" dusk="add-timeline" class="btn btn-primary">
                                            <i class="fas fa-plus"></i>
                                        </a>
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
                                            <th style="text-align: center;">Title</th>
                                            <th style="text-align: center;">Class</th>
                                            <th style="text-align: center;">Description</th>
                                            <th style="text-align: center;">Tugas</th>
                                            <th style="text-align: center;">Deadline</th>
                                            <th style="text-align: center;">Status</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($timelines as $timeline)
                                        <tr>
                                            {{-- <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="something">
                                                </div>
                                            </td> --}}
                                            <td style="text-align: center;">{{ $timeline->title }}</td>
                                            <td style="text-align: center;">{{ $timeline->class }}</td>
                                            <td style="text-align: center;">{{ $timeline->description }}</td>
                                            <td style="text-align: center;">{{ strip_tags($timeline->tugas) }}</td>
                                            <td style="text-align: center;">{{ $timeline->deadline }}</td>
                                            <td style="text-align: center;">{{ $timeline->status }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="{{ route('timeline_edit', $timeline->id) }}" dusk="edit-timeline" class="btn btn-sm bg-danger-light">
                                                        <i class="far fa-edit me-2"></i>
                                                    </a>
                                                    <a class="btn btn-sm bg-danger-light delete" dusk="delete-timeline" data-bs-toggle="modal" data-bs-target="#delete" data-uuid="{{ $timeline->id }}">
                                                        <i class="fe fe-trash-2"></i>
                                                    </a>
                                                </div>
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

    {{-- model elete --}}
    <div class="modal custom-modal fade" id="delete" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Hapus Timeline</h3>
                        <p>Apakah anda yakin mau hapus?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            @if($timeline)
                                <form action="{{ route('timeline_delete', $timeline->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" id="delete-btn" class="btn btn-primary paid-continue-btn" style="width: 100%;">Yakin</button>
                                        </div>
                                        <div class="col-6">
                                            <a data-bs-dismiss="modal"
                                                class="btn btn-primary paid-cancel-btn">Tidak
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        {{-- delete js --}}
        <script>
            $(document).on('click','.delete',function()
            {
                $('input[name="id"]').val($(this).data('id'));
            });
        </script>
    @endsection

@endsection