@extends('layout.adminmaster')

@section('content')
<div class="container mt-5 ps-5 ms-5 pt-5">
    <h1>FAQs</h1>
    <a href="{{ route('faqs.create') }}" class="btn btn-primary mb-3">Add FAQ</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Question</th>
                <th>Answer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faqs as $faq)
            <tr>
                <td>{{ $faq->question }}</td>
                <td>{{ $faq->answer }}</td>
                <td>
                    <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
