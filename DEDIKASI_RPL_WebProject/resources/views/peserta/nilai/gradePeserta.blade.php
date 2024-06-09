@extends('layout.master')
@section('title', 'Nilai Kamu')
@section('content')
    <div class="container mt-5">
        <br>
        <h2 class="mb-4 text-center">Nilai Kamu</h2>
        
        <div class="row mb-4 justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('nilai-peserta') }}" method="GET" class="p-3 rounded shadow-sm bg-light">
                    <div class="form-group row align-items-center">
                        <label for="filter" class="col-sm-2 col-form-label">Filter:</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="filter" name="filter">
                                <option value="">Semua</option>
                                <option value="Lulus" {{ request('filter') == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                                <option value="Belum Lulus" {{ request('filter') == 'Belum Lulus' ? 'selected' : '' }}>Belum Lulus</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary w-100">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="row">
            @foreach ($assignments as $assignment)
                @if (empty(request('filter')) || $assignment->pivot->nilai == request('filter'))
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm border-0 rounded-lg">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">{{ $assignment->judul_tugas }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Nilai Kamu</h6>
                                <button type="button" class="btn btn-{{ $assignment->pivot->nilai == 'Lulus' ? 'success' : 'danger' }} mt-2">
                                    {{ $assignment->pivot->nilai == 'Lulus' ? 'Lulus' : 'Belum Lulus' }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
