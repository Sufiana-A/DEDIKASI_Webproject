@extends('layout.adminmaster')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
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
                                <input type="text" name="id_pelatihan" id="id_pelatihan" class="form-control" required>

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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Sertifikat') }}</div>

                    <div class="card-body">
                        <ul>
                            @foreach ($sertifikat as $sert)
                                <li>
                                    {{ $sert->id }} 
                                    {{ $sert->nama_file }} 
                                    <form action="{{ route('sertifikat.destroy', 1) }}" method="DELETE">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm ml-2">Hapus</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
