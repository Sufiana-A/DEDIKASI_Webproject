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
                            <li class="breadcrumb-item"><a href="{{ route('admin.manageCourse.index') }}">Course</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <form action="{{ route('admin.manageCourse.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="uuid" value="{{ $course->uuid }}">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $course->title }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="class" class="form-label">Class</label>
                                    <input type="text" class="form-control" id="class" name="class" value="{{ $course->class }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control summernote" id="description" rows="3" name="description" required>{!! $course->description !!}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="id_mentor" class="form-label">Mentor</label>
                                    <select id="id_mentor" name="id_mentor" class="form-select" required>
                                        @foreach($idMentor as $mentor_id)
                                        <option value="{{ $mentor_id->id }}" {{ $mentor_id->id == $course->mentor_id ? 'selected' : '' }}>{{ $mentor_id->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
        ['table', ['table']],
        ['insert', ['picture']],
        ['view', ['codeview', 'help']],
        ['height', ['height']]
      ]
    });
</script>
@endsection
