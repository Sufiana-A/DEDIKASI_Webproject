@extends('layout.mentormaster')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Tambahkan Assignment</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('assignment_mentor') }}">Assignment</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <form action="{{ route('assignment_store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="pelatihan">Pelatihan</label>
                                    <select class="form-control @error('pelatihan') is-invalid @enderror" id="pelatihan" name="pelatihan" required>
                                        <option value="">Pilih Pelatihan</option>
                                        @foreach($courses as $course)
                                            <option value="{{ $course->uuid }}">{{ $course->uuid }}: {{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('pelatihan')
                                      <div class="alert text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="id_tugas" class="form-label">ID Tugas</label>
                                    <input type="text" class="form-control" id="id_tugas" name="id_tugas" placeholder="contoh: 'A01C010'" required>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="contoh: 'Tugas Pertemuan 1: Resume Diskusi Kelompok'" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea class="form-control summernote" id="description" rows="3" name="description" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="addition" class="form-label">File Terkait</label>
                                    <input type="file" class="form-control" id="addition" name="addition" >
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

