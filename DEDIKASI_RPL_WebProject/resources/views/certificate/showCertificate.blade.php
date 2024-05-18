
@extends('layout.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                                        <td>{{ $sertifikat->peserta->first_name . ' ' .$sertifikat->peserta->last_name }}</td>
                                        <td><a href="{{ asset('sertifikat/'.$sertifikat->nama_file) }}" target="_blank">{{ $sertifikat->nama_file }}</a></td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
