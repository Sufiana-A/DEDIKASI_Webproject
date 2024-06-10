@extends('layout.master')
@section('title', 'Edit Assignment')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="font-size: 20px; font-weight: bold;">Update Pengumpulan Tugas</h4>
                        <h6> > Silakan perbarui tugas Anda di sini.</h6>
                    </div>    
                    <div class="card-body">
                        <form action="{{ route('assignments.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="text_submission">Teks Pengumpulan</label>
                                <textarea class="form-control" id="text_submission" name="text_submission" rows="4">{{ $submission->text_submission ?? '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="file_submission">File Pengumpulan</label>
                                <input type="file" class="form-control-file" id="file_submission" name="file_submission">
                                @if($submission && $submission->file_submission)
                                    <div class="mt-2">
                                        <a href="{{ Storage::url($submission->file_submission) }}">Download</a>
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
