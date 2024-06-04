@extends('layout.adminmaster')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1>Edit FAQ</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard-admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('faqs.index') }}">FAQ</a></li>
                        <li class="breadcrumb-item active">Edit FAQ</li>
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
            <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" class="form-control" id="question" name="question" value="{{ $faq->question }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="answer">Answer</label>
                    <textarea class="form-control" id="answer" name="answer" rows="4"
                        required>{{ $faq->answer }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection