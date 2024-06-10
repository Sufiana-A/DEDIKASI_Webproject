@extends('layout.adminmaster')
@section('title', 'Add FAQ')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1>Tambah FAQ</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard-admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('faqs.index') }}">FAQ</a></li>
                        <li class="breadcrumb-item active">Tambah FAQ</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('faqs.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" class="form-control" id="question" name="question" value="{{ old('question') }}"
                        required placeholder="Tulis Pertanyaan">
                </div>
                <div class="form-group">
                    <label for="answer">Answer</label>
                    <textarea class="form-control" id="answer" name="answer" rows="4" required
                        placeholder="Tulis Jawabannya disini">{{ old('answer') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection