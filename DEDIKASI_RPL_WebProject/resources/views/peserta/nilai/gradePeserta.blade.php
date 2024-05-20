@extends('layout.master')

@section('content')
    <br>
    <div class="container">
        <h2>Peserta</h2>
        <div class="row">
            <div class="col-md-12">
                {{-- <form action="{{ route('peserta.assignment.index') }}" method="GET"> --}}
                <form action="{{ route('nilai-peserta') }}" method="GET"> {{-- fix: change to an already available route --}}
                    <div class="form-group">
                        <label for="filter">Filter:</label>
                        <select class="form-control" id="filter" name="filter">
                            <option value="">Semua</option>
                            <option value="Lulus" {{ request('filter') == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                            <option value="Belum Lulus" {{ request('filter') == 'Belum Lulus' ? 'selected' : '' }}>Belum
                                Lulus</option>
                        </select>
                        <button type="submit" class="btn btn-primary mt-2">Filter</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach ($assignments as $assignment)
                <div class="col-md-4">
                    @if (empty(request('filter')) || $assignment->pivot->nilai == request('filter'))
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="card-title">{{ $assignment->judul_tugas }}</h2>
                                <h4> Nilai Kamu </h4>
                                <button type="button"
                                    class="btn btn-{{ $assignment->pivot->nilai == 'Lulus' ? 'success' : 'danger' }}">
                                    {{ $assignment->pivot->nilai }}
                                </button>
                            </div>
                        </div>
                    @endif {{-- add: end of if, if it's not there can cause an error --}}
                </div>
            @endforeach
        </div>
    </div>
@endsection
