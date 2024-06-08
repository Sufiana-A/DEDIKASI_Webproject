@extends('layout.adminmaster')
@section('content')
{{-- message --}}

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1>Tambah Sertifikat</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard-admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('faqs.index') }}">Sertifikat</a></li>
                        <li class="breadcrumb-item active">Tambah Sertifikat</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-mt-2">
                    <!-- <h1>Tambah Sertifikat</h1> -->
                    <div class="card position-relative">
                        <div class="card-header">{{ __('Unggah Sertifikat') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('sertifikat.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="id_peserta">ID Peserta</label>
                                    <input type="text" name="id_peserta" id="id_peserta" class="form-control" required>

                                    @error('id_peserta')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="id_pelatihan">ID Pelatihan</label>
                                    <input type="text" name="id_pelatihan" id="id_pelatihan" class="form-control"
                                        required>

                                    @error('id_pelatihan')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="file">File Sertifikat</label>
                                    <br>
                                    <input type="file" name="file" id="file" class="form-control-file" required>

                                    @error('file')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian ini untuk menampilkan sertifikat dan tombol delete -->
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header">{{ __('Daftar Sertifikat') }}</div>

                        <div class="card-body pt-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama File</th>
                                        <th scope="col">Nama Peserta</th>
                                        <th scope="col">Judul Kursus</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sertifikat as $sert)
                                        <tr>
                                            <td>{{ $sert->id }}</td>
                                            <td>{{ $sert->nama_file }}</td>
                                            <td>{{ $sert->peserta->first_name . ' ' . $sert->peserta->last_name }}</td>
                                            <td>{{ $sert->Course->title }}</td>
                                            <td>
                                                <form action="{{ route('sertifikat.destroy', $sert->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
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
@endsection