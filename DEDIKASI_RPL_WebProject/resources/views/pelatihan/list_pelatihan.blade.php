@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Pelatihan</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pelatihan</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="peserta-group-form">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Cari ID ...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Cari Nama ...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Cari Kategori ...">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="search-peserta-btn">
                            <button type="btn" class="btn btn-primary">Pencarian</button>
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
                                        <h3 class="page-title">Pelatihan</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="{{ route('pelatihan/add/page') }}" class="btn btn-primary">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-peserta table-hover table-center mb-0 datatable table-striped">
                                    <thead class="peserta-thread">
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Kategori</th>
                                            <th class="text-end">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pelatihanList as $key => $value)
                                        <tr>
                                            <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="something">
                                                </div>
                                            </td>
                                            <td class="id_pelatihan">{{ $value->id_pelatihan }}</td>
                                            <td>
                                                <h2>
                                                    <a>{{ $value->nama_pelatihan }}</a>
                                                </h2>
                                            </td>
                                            <td>{{ $value->kategori_pelatihan }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="{{ url('pelatihan/edit/'.$value->id_pelatihan) }}" class="btn btn-sm bg-danger-light">
                                                        <i class="far fa-edit me-2"></i>
                                                    </a>
                                                    <a class="btn btn-sm bg-danger-light delete" data-bs-toggle="modal" data-bs-target="#delete">
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
                        <h3>Hapus Pelatihan</h3>
                        <p>Apakah anda mau menghapus pelatihan?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <form action="{{ route('pelatihan/delete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_pelatihan" class="e_id_pelatihan" value="">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary paid-continue-btn" style="width: 100%;">Hapus</button>
                                    </div>
                                    <div class="col-6">
                                        <a data-bs-dismiss="modal"
                                            class="btn btn-primary paid-cancel-btn">Batal
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
                var _this = $(this).parents('tr');
                $('.e_id_pelatihan').val(_this.find('.id_pelatihan').text());
            });
        </script>
    @endsection

@endsection