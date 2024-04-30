@extends('layout.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
        <div class="col-md-12">
         <div class="card">
    <div class="container">
        <h2>Tambah Video Baru</h2>
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
	    <div class="form-group">
                <label for="judul">Judul Video</label>
                <input class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required>
		@error('judul')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi Video</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3"></textarea>
                @error('deskripsi')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="file">Link / File Terkait</label>
                <input type="file" class="form-control-file @error('file') is-invalid @enderror" id="file" name="file" required>
                @error('file')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection