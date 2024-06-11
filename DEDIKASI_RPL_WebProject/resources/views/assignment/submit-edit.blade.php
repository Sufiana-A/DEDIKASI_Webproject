@extends('layout.master')
@section('title', 'Edit Submit Assignment')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">SUBMISSION ASSIGNMENT LIST</h3>
                </div>
            </div>
        </div>

        <div class="student-group-form"></div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Assignments Submission</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>ID Assignment</th>
                                        <th>ID Tugas</th>
                                        <th>File Unggahan</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assignments as $assignment)
                                        @foreach ($assignment->peserta as $submission)
                                            <tr>
                                                <td>{{ $assignment->id }}</td>
                                                <td>{{ $submission->pivot->id_tugas }}</td>
                                                <td>
                                                    @if ($submission->pivot->file_assignments)
                                                        <a href="{{ url('storage/' . $submission->pivot->file_assignments) }}" target="_blank">
                                                            View File
                                                        </a>
                                                    @else
                                                        No File Uploaded
                                                    @endif
                                                </td>
                                                <td class="text-end">
                                                    <div class="actions">
                                                        <a class="btn btn-sm bg-danger-light delete" data-bs-toggle="modal" data-bs-target="#delete" data-id_tugas="{{ $submission->pivot->id_tugas }}" dusk="delete-assignment-button-{{ $submission->pivot->id_tugas }}">
                                                            <i class="fe fe-trash-2"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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

<div class="modal custom-modal fade" id="delete" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Assignment</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <form action="{{ route('assignment_delete') }}" method="GET">
                            @csrf
                            <input type="hidden" name="id_tugas" value="">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" id="delete-btn" class="btn btn-primary paid-continue-btn" style="width: 100%;">Delete</button>
                                </div>
                                <div class="col-6">
                                    <a data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Cancel</a>
                                </div>
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
    $(document).on('click', '.delete', function() {
        $('input[name="id_tugas"]').val($(this).data('id_tugas'));
    });
</script>
@endsection