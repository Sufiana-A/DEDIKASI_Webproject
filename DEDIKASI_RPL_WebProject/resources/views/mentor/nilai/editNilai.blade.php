@extends('layout.adminmaster')
@section('content')
{{-- message --}}

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">EDIT COURSE</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('mentor.manageNilai.index') }}">Course</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <form action="{{ route('mentor.manageNilai.update', $pivotData->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="nama">Nama Assignment</label>
                                    <input type="text" class="form-control" id="nama" value="{{ $assignment->title }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="file_assignment">File Assignment</label><br>
                                    <a href="{{ asset('storage/file_assignment/' . $pivotData->file_assignments) }}">{{ $pivotData->file_assignments }}</a>
                                </div>
                                <div class="form-group">
                                    <label for="nilai">Nilai</label>
                                    <select class="form-control" id="nilai" name="nilai">
                                        <option value="Belum Lulus" {{ $pivotData->nilai == 'Belum Lulus' ? 'selected' : ''}}>Belum Lulus</option>
                                        <option value="Lulus" {{ $pivotData->nilai == 'Lulus' ? 'selected' : ''}}>Lulus</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi">{{ $pivotData->deskripsi }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
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
        ['table', ['table']],
        ['insert', ['picture']],
        ['view', ['codeview', 'help']],
        ['height', ['height']]
      ]
    });
</script>
@endsection
