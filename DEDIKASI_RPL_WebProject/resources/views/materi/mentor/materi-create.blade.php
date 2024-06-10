@extends('layout.mentormaster')
@section('title', 'Add Materi')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="container">
                        <h2 style="margin-top: 20px;">Tambah Materi Baru</h2>
                        <form action="{{route('materi_store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="pelatihan">Pelatihan</label>
                                <select class="form-control @error('pelatihan') is-invalid @enderror" id="pelatihan" name="pelatihan" required>
                                    <option value="">Pilih Pelatihan</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->uuid }}">{{ $course->uuid }}: {{ $course->title }}</option>
                                    @endforeach
                                </select>
                                @error('pelatihan')
                                  <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="id_materi">ID Materi</label>
                                <input class="form-control @error('id_materi') is-invalid @enderror" placeholder="ex: WAD-01"  id="id_materi" name="id_materi" required>
                                @error('id_materi')
                                  <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="judul_materi">Judul Materi</label>
                                <input class="form-control @error('judul_materi') is-invalid @enderror" placeholder="ex: Materi 01 - (Nama Materi)" id="judul_materi" name="judul_materi" required>
                                @error('judul_materi')
                                  <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi_materi">Deskripsi Materi</label>
                                <textarea class="form-control @error('deskripsi_materi') is-invalid @enderror" id="deskripsi_materi" name="deskripsi_materi" rows="3"></textarea>
                                @error('deskripsi_materi')
                                  <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="link_terkait">File Materi</label>
                                <input type="file" class="form-control-file @error('link_terkait') is-invalid @enderror" id="link_terkait" name="link_terkait" required>
                                @error('link_terkait')
                                  <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button style="margin-bottom: 20px;" type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
