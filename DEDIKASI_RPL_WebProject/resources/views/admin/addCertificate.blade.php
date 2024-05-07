@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Unggah Sertifikat') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('sertifikat.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nama">Nama Sertifikat:</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="file">File Sertifikat:</label>
                                <input type="file" name="file" id="file" class="form-control-file" required>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Unggah') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
