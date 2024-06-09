@extends('layout.mentormaster')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Perbarui Assignment</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('assignment_mentor') }}">Assignment</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <form action="{{ route('assignment_update', [$assignments->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="form-group">
                                    <label for="pelatihan">Pelatihan</label>
                                    <select class="form-control @error('pelatihan') is-invalid @enderror" id="pelatihan" name="pelatihan" required>
                                        <option value="">Pilih Pelatihan</option>
                                        @foreach($courses as $course)
                                             <option value="{{ $course->uuid }}" {{ $materi->pelatihan == $course->uuid ? 'selected' : '' }}>{{ $course->uuid }}: {{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('pelatihan')
                                      <div class="alert text-danger">{{ $message }}</div>
                                    @enderror
                                </div> --}}
                                <div class="mb-3">
                                    <label for="id_tugas" class="form-label">ID Tugas</label>
                                    <input type="text" class="form-control" id="id_tugas" name="id_tugas" value={{ $assignments->id_tugas }}>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="title" name="title" value={{ $assignments->title }}>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea class="form-control summernote" id="description" rows="3" name="description" >{{ strip_tags($assignments->description) }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="addition" class="form-label">File Terkait</label>                
                                    <div class="col-12">
                                        <div class="skip-group">
                                            <a href="{{ asset('storage/assignment/'. $assignments->addition) }}"  download><i class="fas fa-download"></i> {{$assignments->addition}}
                                        </div>
                                        <br>
                                    </div>                    
                                    <input type="file" class="form-control" id="addition" name="addition" value={{ $assignments->addition }}>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Perbarui</button>
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

