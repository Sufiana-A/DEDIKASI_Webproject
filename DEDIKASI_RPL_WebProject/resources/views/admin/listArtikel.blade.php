@extends('layout.adminmaster')
@section('title', 'List Artikel')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">ARTIKEL</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Artikel</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="student-group-form">
                <form action="{{ route('list_artikel') }}" method="get">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search by Name" name="judul" value="{{ request()->judul ?? null }}">
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

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">List Artikel</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        
                                        <a href="{{ route('add_artikel') }}" class="btn btn-primary">
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
                                            <th>ID Artikel</th>
                                            <th>Judul</th>
                                            <th>Penulis</th>
                                            <th>Tanggal Diunggah</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($artikel as $artikel)
                                        <tr>
                                            <td class="id_artikel">{{ $artikel->id_artikel }}</td>
                                            <td>
                                                <h2>
                                                    <a>{{ $artikel->judul }}</a>
                                                </h2>
                                            </td>
                                            <td class="penulis">{{ $artikel->penulis }}</td>
                                            <td class="waktu">{{ $artikel->waktu }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="{{ route('edit_artikel', $artikel->id) }}" class="btn btn-sm bg-danger-light">
                                                        <i class="far fa-edit me-2"></i>
                                                    </a>
                                                    <a href="{{ route('detail_artikel', $artikel->id) }}" class="btn btn-sm bg-danger-light">
                                                        <i class="far fa-eye me-2"></i>
                                                    </a>
                                                    <a class="btn btn-sm bg-danger-light delete" data-bs-toggle="modal" data-bs-target="#delete" data-id_artikel="{{ $artikel->id_artikel }}">
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
    <div class="modal custom-modal fade" id="delete" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Artikel</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <form action="{{ route('delete_artikel') }}" method="GET">
                                @csrf
                                <input type="hidden" name="id_artikel" value="">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" id="delete-btn" class="btn btn-primary paid-continue-btn" style="width: 100%;">Delete</button>
                                    </div>
                                    <div class="col-6">
                                        <a data-bs-dismiss="modal"
                                            class="btn btn-primary paid-cancel-btn">Cancel
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <script>
            $(document).on('click','.delete',function()
            {
                $('input[name="id_artikel"]').val($(this).data('id_artikel'));
            });
        </script>
    @endsection
@endsection
