@extends('layout.master')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h2>Daftar Lowongan Pekerjaan</h2>
                    </div>
                </div>
            </div>
        </div>
          {{-- <div class="student-group-form">
                <form action="{{ route('view_loker') }}" method="get">
                    <div class="row">
                        <form action="{{ route('view_loker.search') }}" method="GET">
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label for="tipe_pekerjaan">Tipe Pekerjaan</label>
                                    <input type="text" class="form-control" placeholder="Cari berdasarkan Tipe Pekerjaan" name="tipe_pekerjaan" value="{{ request()->tipe_pekerjaan ?? null }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" class="form-control" placeholder="Cari berdasarkan Lokasi" name="lokasi" value="{{ request()->lokasi ?? null }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label for="kategori_pekerjaan">Kategori Pekerjaan</label>
                                    <input type="text" class="form-control" placeholder="Cari berdasarkan Kategori Pekerjaan" name="kategori_pekerjaan" value="{{ request()->kategori_pekerjaan ?? null }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 align-self-end">
                                <div class="form-group">
                                    <label for="">&nbsp;</label>
                                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </form>
            </div> --}}

        <div class="row">
            @foreach ($loker as $item)
                <div class="col-xl-10 col-sm-6 col-12 mb-2">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h4 class="card-title mb-2"><strong style="font-size: 1em;">{{ $item->posisi }}</strong></h4>
                                    <h5 class="mb-3" style="color: #666;"><strong>{{ $item->nama_perusahaan }}</strong></h5>
                                    <p class="mb-2" style="font-size: 0.9em;"><i class="fas fa-briefcase"></i> Tipe Pekerjaan: {{ $item->tipe_pekerjaan }}</p>
                                    <p class="mb-2" style="font-size: 0.9em;"><i class="fas fa-map-pin"></i> Lokasi: {{ $item->kota }}</p>
                                    <p class="mb-2" style="font-size: 0.9em;"><i class="fas fa-layer-group"></i> Kategori Pekerjaan: {{ $item->kategori_pekerjaan }}</p>
                                    <p class="mb-3" style="font-size: 0.9em;"><i class="fas fa-info-circle"></i> Persyaratan: {{ $item->deskripsi_loker }}</p>
                                    <a href="{{ $item->link_loker }}" class="btn btn-primary mb-1" target="_blank"><i class="fas fa-link"></i> Kunjungi Lowongan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
