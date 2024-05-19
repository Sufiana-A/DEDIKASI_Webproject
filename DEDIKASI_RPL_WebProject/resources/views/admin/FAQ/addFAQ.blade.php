@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add FAQ</h1>
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
            <input type="text" class="form-control" id="question" name="question" value="{{ old('question') }}" required>
        </div>
        <div class="form-group">
            <label for="answer">Answer</label>
            <textarea class="form-control" id="answer" name="answer" rows="4" required>{{ old('answer') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
