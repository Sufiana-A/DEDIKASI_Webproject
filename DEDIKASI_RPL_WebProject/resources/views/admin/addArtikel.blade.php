@extends('layout.adminmaster')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Buat Artikel</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('list_artikel') }}">Artikel</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <form action="{{ route('store_artikel') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="id_artikel" class="form-label">ID Artikel</label>
                                    <input type="text" class="form-control" id="id_artikel" name="id_artikel" placeholder="contoh: 'AR001'" required>
                                </div>
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="contoh: 'Capaian Gemilang Mahasiswa Sistem informasi Telkom University'" required>
                                </div>
                                <div class="mb-3">
                                    <label for="penulis" class="form-label">Nama Penulis</label>
                                    <input type="text" class="form-control" id="penulis" name="penulis" placeholder="contoh: 'Nafila Alfirahma'" required>
                                </div>
                                <div class="mb-3">
                                    <label for="waktu" class="form-label">Tanggal Unggahan</label>
                                    <input type="date" class="form-control" id="waktu" name="waktu" default=today required>
                                </div>
                                <div class="mb-3">
                                    <label for="konten" class="form-label">Konten</label>
                                    <textarea class="form-control summernote" id="konten" rows="3" name="konten" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Unggah</button>
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

