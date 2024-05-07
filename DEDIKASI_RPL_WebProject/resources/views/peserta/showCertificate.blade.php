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
                                @foreach ($sertifikat as $sert)
                                    <tr>
                                        <td>{{ $sert->nama }}</td>
                                        <td><a href="{{ asset('sertifikat/'.$sert->file) }}" target="_blank">{{ $sert->file }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
