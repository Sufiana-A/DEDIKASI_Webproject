@extends('layout.master')
@section('title', 'Show Certificate')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1>Sertifikat Saya</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard-peserta">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('faqs.index') }}">Sertifikat</a></li>
                        <li class="breadcrumb-item active">Sertifikat Saya</li>
                    </ul>
                </div>
            </div>
        </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Sertifikat') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">File</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        @if (
                                            Auth::guard('peserta')->user()->first_name." ".Auth::guard('peserta')->user()->last_name == $sertifikat->peserta
                                        )
                                        <td>{{ $sertifikat->peserta }}</td>
                                        <td>
                                        <a href="{{ asset('storage/certificates/'. $sertifikat->nama_file) }}" class="btn btn-info continue-btn" style="margin-top: 10px; padding: 5px 10px;" download><i class="fas fa-download"></i> File Sertifikat</a>
                                        </td>
                                        @endif
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
