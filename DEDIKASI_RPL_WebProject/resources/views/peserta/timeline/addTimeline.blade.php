@extends('layout.master')
@section('title', 'Add Timeline')
@section('content')
{{-- message --}}

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title" style="color:#3d5ee1;">Tambah Timeline</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard-peserta">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('timeline_index') }}">Timeline</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- PKD-31 -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <form action="{{ route('timeline_store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Pelatihan</label>
                                    <select id="title" name="title" class="form-select" required>
                                        <option value=""></option>
                                        @foreach($pelatihanAcc as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="class" class="form-label">Class</label>
                                    <input type="text" class="form-control" id="class" name="class" required readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description" required readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="tugas" class="form-label">Tugas</label>
                                    <textarea class="form-control summernote" id="tugas" rows="3" name="tugas" required></textarea>
                                </div>
                                @php
                                    $now = date('Y-m-d\TH:i', time());
                                @endphp
                                <div class="mb-3">
                                    <label for="deadline" class="control-label">Deadline</label>
                                    <input type="datetime-local" class="form-control" id="deadline" name="deadline" min="{{ $now }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select id="status" name="status" class="form-select" required>
                                        <option value=""></option>
                                        <option value="OPEN">OPEN</option>
                                        <option value="IN PROGRESS">IN PROGRESS</option>
                                        <option value="DONE">DONE</option>
                                    </select>
                                </div>
                                <div class="mb-3 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Save</button>
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

<script>
    $(document).ready(function() {
        // Mendapatkan data course dari PHP
        var courses = @json($pelatihanAccArray);

        // Mendeteksi perubahan pada dropdown title
        $('#title').change(function() {
            var courseId = $(this).val();

            if (courseId in courses) {
                // Memperbarui nilai input class dan description
                $('#class').val(courses[courseId]['class']);
                $('#description').val(courses[courseId]['description']);
            } else {
                // Mengosongkan nilai input class dan description jika tidak ada course yang dipilih
                $('#class').val('');
                $('#description').val('');
            }
        });
    });
</script>
@endsection