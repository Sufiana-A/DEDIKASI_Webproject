@extends('layout.master')
@section('title', 'List Pelatihan')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title" style="color:#3d5ee1;">Pelatihan Saya</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- Display session messages -->
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
                @foreach($pelatihanAcc as $enroll)
                    <div class="col md-6 mb-4">
                        <div class="card flex-fill comman-shadow mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-center mb-3 text-center">
                                    <h5 class="card-title"><strong>{{ $enroll->title }}</strong></h5>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-center mb-3">
                                    <img src="{{ asset('assets/img/course.jpg') }}" class="card-img-top img-fluid" style="width:350px" alt="gambar">
                                </div>
                                <hr>
                                <div class="d-flex justify-content-center mb-3 text-center">
                                    <p class="card-text">{{ strip_tags($enroll->description) }}</p>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-center mb-3">
                                    <a href="{{route('video_peserta')}}" class="btn btn-primary mx-2"><i class="fas fa-video"></i> Video </a>
                                    <a href="{{route('view_materi', $enroll->uuid)}}" class="btn btn-primary mx-2"><i class="fas fa-file"></i> Material </a>
                                    <a href="{{route('add_assignment')}}" class="btn btn-primary mx-2"><i class="fas fa-file-alt"></i> Assignment </a>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-center mb-3">
                                    <div class="actions">
                                        <button type="submit" class="btn btn-danger unenroll" data-bs-toggle="modal" data-bs-target="#unenroll" data-id="{{ $enroll->id }}">
                                            <i class="fas fa-times"> Unenroll </i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($loop->iteration % 2 == 0)
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

    <!-- Unenroll Modal -->
    {{-- model elete --}}
    <div class="modal custom-modal fade" id="unenroll" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Unenroll Pelatihan</h3>
                        <p>Apakah anda yakin mau unenroll?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <form action="{{ route('list_peserta_pelatihan_unenroll') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" id="unenroll-btn" class="btn btn-primary paid-continue-btn" style="width: 100%;">Yakin</button>
                                    </div>
                                    <div class="col-6">
                                        <a data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Tidak</a>
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
            $(document).on('click','.unenroll',function()
            {
                $('input[name="id"]').val($(this).data('id'));
            });
        </script>
    @endsection

@endsection