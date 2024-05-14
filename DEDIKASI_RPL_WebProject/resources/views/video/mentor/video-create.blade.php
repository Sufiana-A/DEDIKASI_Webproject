@extends('layout.adminmaster')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Tambahkan Video</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('video_mentor') }}">Video</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <form action="{{ route('video_store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="id_video" class="form-label">ID Video</label>
                                    <input type="text" class="form-control" id="id_video" name="id_video" placeholder="contoh: 'V01C010'" required>
                                </div>
                                <div class="mb-3">
                                    <label for="judul_video" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="judul_video" name="judul_video" placeholder="contoh: 'Materi Pertemuan 1: Introduction'" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi_video" class="form-label">Deskripsi</label>
                                    <textarea class="form-control summernote" id="deskripsi_video" rows="3" name="deskripsi_video" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="link_terkait" class="form-label">Link Terkait</label>
                                    <input type="text" class="form-control" id="link_terkait" name="link_terkait" placeholder="masukkan_link_video" required>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    $('.summernote').summernote({
      placeholder: 'Type here',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'strikethrough', 'clear']],
        ['color', ['color']],
        ['para', ['paragraph']],
        ['insert', ['link', 'picture']],
        ['table', ['table']],
        ['insert', ['picture']],
        ['view', ['codeview', 'help']],
        ['height', ['height']]
      ]
    });
</script>
@endsection

