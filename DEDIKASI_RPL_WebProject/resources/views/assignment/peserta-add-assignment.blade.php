@extends('layout.master')
@section('title', 'Add Submit Assignment')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" style="font-size: 20px; font-weight: bold;">Pengumpulan Tugas</h4>
                        <h6>Silakan kumpulkan tugas Anda di sini!</h6>
                    </div>    
                    <div class="card-body">
                        <form action="{{ route('submit_assignment') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <div class="mb-4">
                                    <label for="text_submission"> Pengumpulan Teks </label>
                                    <textarea class="form-control summernote" id="text_submission" rows="3" name="text_submission"></textarea>
                                </div>                                
                                <div class="mb-4">
                                    <label for="file_submission" class="form-label">Pengumpulan File </label>
                                    <input type="file" class="form-control" id="file_submission" name="file_submission" >
                                </div> 
                            </div>
                            {{-- <div class="form-group">
                                <label for="file_submission">File Pengumpulan</label>
                                <input type="file" class="form-control-file" id="file_submission" name="file_submission">
                                @if($submission && $submission->file_submission)
                                    <div class="mt-2">
                                        <a href="{{ Storage::url($submission->file_submission) }}">Download</a>
                                    </div>
                                @endif
                            </div> --}}
                            <button type="submit" class="btn btn-primary">Kumpulkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
