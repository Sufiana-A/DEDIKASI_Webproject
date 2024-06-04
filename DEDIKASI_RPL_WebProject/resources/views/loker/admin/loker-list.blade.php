@extends('layout.adminmaster')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">LIST LOWONGAN KERJA</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Lowongan Kerja</li>
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
                                        <h3 class="page-title">Lowongan Pekerjaan</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        
                                        <a href="{{ route('loker_create') }}" class="btn btn-primary">
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
                                            <th>Posisi</th>
                                            <th>Perusahaan</th>
                                            <th>Tipe Pekerjaan</th>
                                            <th>Kategori Pekerjaan</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($loker as $loker)
                                        <tr>
                                            <td>{{ $loker->posisi }}</td>
                                            <td>{{ $loker->nama_perusahaan }}</td>
                                            <td>{{ $loker->tipe_pekerjaan }}</td>
                                            <td>{{ $loker->kategori_pekerjaan }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="{{ route('loker_detail', $loker->id) }}" class="btn btn-sm bg-danger-light" dusk="update-loker-button-{{ $loker->nama_perusahaan }}">
                                                        <i class="far fa-edit me-2"></i>
                                                    </a>
                                                    <a class="btn btn-sm bg-danger-light delete" dusk="delete-loker-button-{{ $loker->nama_perusahaan }}" data-bs-toggle="modal" data-bs-target="#delete" data-id="{{ $loker->id }}">
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
                        <h3>Hapus Lowongan</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <form action="{{ route('loker_delete') }}" method="GET">
                                @csrf
                                <input type="hidden" name="id" value="">
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
        {{-- delete js --}}
        <script>
            $(document).on('click','.delete',function()
            {
                $('input[name="id"]').val($(this).data('id'));
            });
        </script>
    @endsection
@endsection
