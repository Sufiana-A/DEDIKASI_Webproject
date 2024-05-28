@extends('layout.adminmaster')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
        <div class="col-md-12">
         <div class="card">
    <div class="container">
        <h2 style="margin-top: 20px;">Ubah Lowongan</h2>
        <form action="{{route('loker_update', [$loker->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="posisi">Posisi</label>
                <input class="form-control @error('posisi') is-invalid @enderror" id="posisi" name="posisi" value="{{ $loker->posisi }}" required>
                @error('posisi')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_perusahaan">Perusahaan</label>
                <input class="form-control @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" name="nama_perusahaan" value="{{ $loker->nama_perusahaan }}" required>
                @error('nama_perusahaan')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tipe_pekerjaan">Tipe Pekerjaan</label>
                <select class="form-control @error('tipe_pekerjaan') is-invalid @enderror" id="tipe_pekerjaan" name="tipe_pekerjaan" required>
                    <option value="">Pilih Tipe Pekerjaan</option>
                    <option value="Full-Time" {{ $loker->tipe_pekerjaan == 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                    <option value="Part-Time" {{ $loker->tipe_pekerjaan == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                    <option value="Magang" {{ $loker->tipe_pekerjaan == 'Magang' ? 'selected' : '' }}>Magang</option>
                    <option value="Kontrak" {{ $loker->tipe_pekerjaan == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                    <option value="Freelance" {{ $loker->tipe_pekerjaan == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                </select>
                @error('tipe_pekerjaan')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kota">Provinsi</label>
                <select class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" required>
                    <option value="">Pilih Provinsi</option>
                    <option value="Nanggroe Aceh Darussalam" {{ $loker->kota == 'Nanggroe Aceh Darussalam' ? 'selected' : '' }}>Nanggroe Aceh Darussalam</option>
                    <option value="Sumatera Utara" {{ $loker->kota == 'Nanggroe Aceh Darussalam' ? 'selected' : '' }}>Sumatera Utara</option>
                    <option value="Sumatera Selatan" {{ $loker->kota == 'Sumatera Selatan' ? 'selected' : '' }}>Sumatera Selatan</option>
                    <option value="Sumatera Barat"{{ $loker->kota == 'Sumatera Barat' ? 'selected' : '' }}>Sumatera Barat</option>
                    <option value="Bengkulu"{{ $loker->kota == 'Bengkulu' ? 'selected' : '' }}>Bengkulu</option>
                    <option value="Riau"{{ $loker->kota == 'Riau' ? 'selected' : '' }}>Riau</option>
                    <option value="Kepulauan Riau"{{ $loker->kota == 'Kepulauan Riau' ? 'selected' : '' }}>Kepulauan Riau</option>
                    <option value="Jambi"{{ $loker->kota == 'Jambi' ? 'selected' : '' }}>Jambi</option>
                    <option value="Lampung"{{ $loker->kota == 'Lampung' ? 'selected' : '' }}>Lampung</option>
                    <option value="Bangka Belitung"{{ $loker->kota == 'Bangka Belitung' ? 'selected' : '' }}>Bangka Belitung</option>
                    <option value="Kalimantan Barat"{{ $loker->kota == 'Kalimantan Barat' ? 'selected' : '' }}>Kalimantan Barat</option>
                    <option value="Kalimantan Timur"{{ $loker->kota == 'Kalimantan Timur' ? 'selected' : '' }}>Kalimantan Timur</option>
                    <option value="Kalimantan Selatan"{{ $loker->kota == 'Kalimantan Selatan' ? 'selected' : '' }}>Kalimantan Selatan</option>
                    <option value="Kalimantan Tengah"{{ $loker->kota == 'Kalimantan Tengah' ? 'selected' : '' }}>Kalimantan Tengah</option>
                    <option value="Kalimantan Utara"{{ $loker->kota == 'Kalimantan Utara' ? 'selected' : '' }}>Kalimantan Utara</option>
                    <option value="Banten"{{ $loker->kota == 'Banten' ? 'selected' : '' }}>Banten</option>
                    <option value="DKI Jakarta"{{ $loker->kota == 'DKI Jakarta' ? 'selected' : '' }}>DKI Jakarta</option>
                    <option value="Jawa Barat"{{ $loker->kota == 'Jawa Barat' ? 'selected' : '' }}>Jawa Barat</option>
                    <option value="Jawa Tengah"{{ $loker->kota == 'Jawa Tengah' ? 'selected' : '' }}>Jawa Tengah</option>
                    <option value="Daerah Istimewa Yogyakarta"{{ $loker->kota == 'Daerah Istimewa Yogyakarta' ? 'selected' : '' }}>Daerah Istimewa Yogyakarta</option>
                    <option value="Jawa Timur"{{ $loker->kota == 'Jawa Timur' ? 'selected' : '' }}>Jawa Timur</option>
                    <option value="Bali"{{ $loker->kota == 'Bali' ? 'selected' : '' }}>Bali</option>
                    <option value="Nusa Tenggara Timur"{{ $loker->kota == 'Nusa Tenggara Timur' ? 'selected' : '' }}>Nusa Tenggara Timur</option>
                    <option value="Nusa Tenggara Barat"{{ $loker->kota == 'Nusa Tenggara Barat' ? 'selected' : '' }}>Nusa Tenggara Barat</option>
                    <option value="Gorontalo"{{ $loker->kota == 'Gorontalo' ? 'selected' : '' }}>Gorontalo</option>
                    <option value="Sulawesi Barat"{{ $loker->kota == 'Sulawesi Barat' ? 'selected' : '' }}>Sulawesi Barat</option>
                    <option value="Sulawesi Tengah"{{ $loker->kota == 'Sulawesi Tengah' ? 'selected' : '' }}>Sulawesi Tengah</option>
                    <option value="Sulawesi Utara"{{ $loker->kota == 'Sulawesi Utara' ? 'selected' : '' }}>Sulawesi Utara</option>
                    <option value="Sulawesi Tenggara"{{ $loker->kota == 'Sulawesi Tenggara' ? 'selected' : '' }}>Sulawesi Tenggara</option>
                    <option value="Sulawesi Selatan"{{ $loker->kota == 'Sulawesi Selatan' ? 'selected' : '' }}>Sulawesi Selatan</option>
                    <option value="Maluku Utara"{{ $loker->kota == 'Maluku Utara' ? 'selected' : '' }}>Maluku Utara</option>
                    <option value="Maluku"{{ $loker->kota == 'Maluku' ? 'selected' : '' }}>Maluku</option>
                    <option value="Papua Barat"{{ $loker->kota == 'Papua Barat' ? 'selected' : '' }}>Papua Barat</option>
                    <option value="Papua"{{ $loker->kota == 'Papua' ? 'selected' : '' }}>Papua</option>
                    <option value="Papua Tengah"{{ $loker->kota == 'Papua Tengah' ? 'selected' : '' }}>Papua Tengah</option>
                    <option value="Papua Pegunungan"{{ $loker->kota == 'Papua Pegunungan' ? 'selected' : '' }}>Papua Pegunungan</option>
                    <option value="Papua Selatan"{{ $loker->kota == 'Papua Selatan' ? 'selected' : '' }}>Papua Selatan</option>
                    <option value="Papua Barat Daya"{{ $loker->kota == 'Papua Barat Daya' ? 'selected' : '' }}>Papua Barat Daya</option>
                </select>
                @error('kota')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kategori_pekerjaan">Kategori Pekerjaan</label>
                <input class="form-control @error('kategori_pekerjaan') is-invalid @enderror" id="kategori_pekerjaan" name="kategori_pekerjaan" value="{{ $loker->kategori_pekerjaan }}" required>
                @error('kategori_pekerjaan')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi_loker">Persyaratan Lowongan Pekerjaan</label>
                <textarea class="form-control @error('deskripsi_loker') is-invalid @enderror" id="deskripsi_loker" name="deskripsi_loker" rows="3">{{ $loker->deskripsi_loker }}</textarea>
                @error('deskripsi_loker')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="link_loker">Link Lowongan Pekerjaan</label>
                <input class="form-control @error('link_loker') is-invalid @enderror" id="link_loker" name="link_loker" value="{{ $loker->link_loker }}" required>
                @error('link_loker')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>            
            <button style="margin-bottom: 20px;" type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection
