@extends('layout.master')
@section('content')
{{-- message --}}

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title" style="color:#3d5ee1;">Edit Timeline</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard-peserta">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('timeline_index') }}">Timeline</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <form action="{{ route('timeline_update', $timelines->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="title" class="form-label">Pelatihan</label>
                                    <select id="title" name="title" class="form-select" required>
                                        <option value=""></option>
                                        @foreach($pelatihanAcc as $course)
                                        <option value="{{ $course->id }}" {{ $course->id == $timelines->course_id ? 'selected' : '' }}>{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="class" class="form-label">Class</label>
                                    <input type="text" class="form-control" id="class" name="class" value="{{ $timelines->class }}" required readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description" value="{{ $timelines->description }}" required readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="tugas" class="form-label">Tugas</label>
                                    <textarea class="form-control summernote" id="tugas" rows="3" name="tugas" required>{{ $timelines->tugas }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="deadline" class="control-label">Deadline</label>
                                    <input type="datetime-local" class="form-control" id="deadline" name="deadline" value="{{ $timelines->deadline }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select id="status" name="status" class="form-select" required>
                                        <option value=""></option>
                                        <option value="OPEN" {{ $timelines->status == 'OPEN' ? 'selected' : '' }}>OPEN</option>
                                        <option value="IN PROGRESS" {{ $timelines->status == 'IN PROGRESS' ? 'selected' : '' }}>IN PROGRESS</option>
                                        <option value="DONE" {{ $timelines->status == 'DONE' ? 'selected' : '' }}>DONE</option>
                                    </select>
                                </div>
                                <div class="mb-3 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <span class="mx-2"></span>
                                    <a class="btn btn-secondary" href="{{ route('timeline_index') }}">Back</a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#title').change(function() {
        var courseId = $(this).val();
        var courseData = @json($pelatihanAccArray);
        if (courseData[courseId]) {
            $('#class').val(courseData[courseId]['class']);
            $('#description').val(courseData[courseId]['description']);
        }
    });
});
</script>
@endsection