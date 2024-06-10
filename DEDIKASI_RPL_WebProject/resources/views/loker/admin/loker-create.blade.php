@extends('layout.adminmaster')
@section('title', 'Add Loker')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
        <div class="col-md-12">
         <div class="card">
    <div class="container">
        <h2 style="margin-top: 20px;">Tambah Lowongan Baru</h2>
        <form action="{{route('loker_store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="posisi">Posisi</label>
                <input class="form-control @error('posisi') is-invalid @enderror" placeholder="ex: UX Researcher"  id="posisi" name="posisi" required>
                @error('posisi')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_perusahaan">Perusahaan</label>
                <input class="form-control @error('nama_perusahaan') is-invalid @enderror" placeholder="ex: PT Telkom Indonesia"  id="nama_perusahaan" name="nama_perusahaan" required>
                @error('nama_perusahaan')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tipe_pekerjaan">Tipe Pekerjaan</label>
                <select class="form-control @error('tipe_pekerjaan') is-invalid @enderror" id="tipe_pekerjaan" name="tipe_pekerjaan" required>
                    <option value="">Pilih Tipe Pekerjaan</option>
                    <option value="Full-Time">Full-Time</option>
                    <option value="Part-Time">Part-Time</option>
                    <option value="Magang">Magang</option>                                                                            
                    <option value="Kontrak">Kontrak</option>
                    <option value="Freelance">Freelance</option>
                </select>
                @error('tipe_pekerjaan')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kota">Provinsi</label>
                <select class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" required>
                    <option value="">Pilih Provinsi</option>
                    <option value="Nanggroe Aceh Darussalam">Nanggroe Aceh Darussalam</option>
                    <option value="Sumatera Utara">Sumatera Utara</option>
                    <option value="Sumatera Selatan">Sumatera Selatan</option>
                    <option value="Sumatera Barat">Sumatera Barat</option>
                    <option value="Bengkulu">Bengkulu</option>
                    <option value="Riau">Riau</option>
                    <option value="Kepulauan Riau">Kepulauan Riau</option>
                    <option value="Jambi">Jambi</option>
                    <option value="Lampung">Lampung</option>
                    <option value="Bangka Belitung">Bangka Belitung</option>
                    <option value="Kalimantan Barat">Kalimantan Barat</option>
                    <option value="Kalimantan Timur">Kalimantan Timur</option>
                    <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                    <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                    <option value="Kalimantan Utara">Kalimantan Utara</option>
                    <option value="Banten">Banten</option>
                    <option value="DKI Jakarta">DKI Jakarta</option>
                    <option value="Jawa Barat">Jawa Barat</option>
                    <option value="Jawa Tengah">Jawa Tengah</option>
                    <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                    <option value="Jawa Timur">Jawa Timur</option>
                    <option value="Bali">Bali</option>
                    <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                    <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                    <option value="Gorontalo">Gorontalo</option>
                    <option value="Sulawesi Barat">Sulawesi Barat</option>
                    <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                    <option value="Sulawesi Utara">Sulawesi Utara</option>
                    <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                    <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                    <option value="Maluku Utara">Maluku Utara</option>
                    <option value="Maluku">Maluku</option>
                    <option value="Papua Barat">Papua Barat</option>
                    <option value="Papua">Papua</option>
                    <option value="Papua Tengah">Papua Tengah</option>
                    <option value="Papua Pegunungan">Papua Pegunungan</option>
                    <option value="Papua Selatan">Papua Selatan</option>
                    <option value="Papua Barat Daya">Papua Barat Daya</option>
                </select>
                @error('kota')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="kategori_pekerjaan">Kategori Pekerjaan</label>
                <input class="form-control @error('kategori_pekerjaan') is-invalid @enderror" placeholder="ex: UI/UX"  id="kategori_pekerjaan" name="kategori_pekerjaan" required>
                @error('kategori_pekerjaan')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi_loker">Persyaratan Lowongan Pekerjaan</label>
                <textarea class="form-control @error('deskripsi_loker') is-invalid @enderror" id="deskripsi_loker" name="deskripsi_loker" rows="3"></textarea>
                @error('deskripsi_loker')
                  <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="link_loker">Link Lowongan Pekerjaan</label>
                <input class="form-control @error('link_loker') is-invalid @enderror" placeholder="ex: https://www.example.com/lowongan" id="link_loker" name="link_loker" required>
                @error('link_loker')
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
