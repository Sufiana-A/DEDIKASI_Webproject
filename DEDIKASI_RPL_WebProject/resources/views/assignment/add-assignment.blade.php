@extends('layout.master')
@section('title', 'Add Assignment')
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
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
            
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card-body">
                        @if($assignment)
                        <form action="{{ route('submit_assignment', ['peserta_id' => Auth::guard('peserta')->user()->id, 'id_tugas' => $assignment->id_tugas, 'assignment_id' => $assignment->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <div class="mb-4">
                                    <label for="assignment_id"> ID Assignment </label>
                                    <input type="text" value="{{$assignment->id}}" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="id_tugas"> ID Tugas </label>
                                    <input type="text" value="{{$assignment->id_tugas}}" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="text_submission"> Pengumpulan Teks </label>
                                    <textarea class="form-control summernote" id="text_submission" rows="3" name="text_submission"></textarea>
                                </div>                                
                                <div class="mb-4">
                                    <label for="file_submission" class="form-label">Pengumpulan File </label>
                                    <input type="file" class="form-control" id="file_submission" name="file_submission" >
                                </div> 
                            </div>
                            <button type="submit" class="btn btn-primary">Kumpulkan</button>
                        </form>
                        @else
                        <form action="{{ route('submit_assignment', ['peserta_id' => Auth::guard('peserta')->user()->id, 'id_tugas' => $assignment->id_tugas]) }}" method="POST" enctype="multipart/form-data">
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
                            <button type="submit" class="btn btn-primary">Kumpulkan</button>
                        </form>
                        @endif
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
@endsection