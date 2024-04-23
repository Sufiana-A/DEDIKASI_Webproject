@extends('layout.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="container">
                        <h2>Update Assignment</h2>
                        <form action="{{ route('assignments.update', $assignment->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST') 
                            <div class="form-group">
                                <label for="judul">Nama Penugasan</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $assignment->judul) }}" required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Tugas</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $assignment->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file">Link / File Terkait</label>
                                <p>Current File: {{ $assignment->file ?? 'No file uploaded' }}</p>
                                <input type="file" class="form-control-file @error('file') is-invalid @enderror" id="file" name="file">
                                @error('file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
