@extends('layout.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Silahkan isi feedback terkait mentor dan sistem kami</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('student.dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Feedback</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <form action="{{ route('feedback_peserta_submit', ['id' => Auth::guard('peserta')->user()->id]) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="tipe_feedback" class="form-label">Pilih hal yang ingin kamu berikan feedback</label>
                                <div class="col-sm-12 col-md-8">           
                                    <select class="form-select form-select-sm" name="tipe_feedback" required>
                                            <option value="Sistem">Sistem</option>
                                            <option value="Mentor">Mentor</option>
                                    </select>
                                </div>
                            </div>  
                            <div class="mb-3">
                                <label for="rating" class="form-label">Berikan rating 1-5 (angka yang semakin tinggi berarti semakin baik)</label>
                                <div class="col-sm-12 col-md-8">
                                    <select class="form-select form-select-sm" name="rating" required>
                                        <option value="">Pilih Rating</option> 
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="feedback" class="form-label">Berikan feedback kamu</label>
                                <textarea class="form-control summernote" id="feedback" rows="3" name="feedback" required></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
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