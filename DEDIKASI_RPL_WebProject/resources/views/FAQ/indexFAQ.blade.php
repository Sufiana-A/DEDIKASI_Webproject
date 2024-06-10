@extends('layout.adminmaster')
@section('title', 'Index FAQ')
@section('content')
{{-- message --}}

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1>FAQs</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard-admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">FAQ</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
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
                                    <!-- <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete" data-id="{{ $faq->id }}">Delete</button> -->
                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete" data-id="{{ $faq->id }}">Delete</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- model delete --}}
<div class="modal custom-modal fade" id="delete" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Hapus FAQ</h3>
                    <p>Apakah anda yakin menghapus ini?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        @if($faq)
                            <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" id="delete-btn" class="btn btn-primary paid-continue-btn"
                                            style="width: 100%;">Yakin</button>
                                    </div>
                                    <div class="col-6">
                                        <a data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Tidak
                                        </a>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    @section('script')
    {{-- js untuk delete --}}
        <script>
            $(document).on('click', '.delete', function () {
                $('input[name="id"]').val($(this).data('id'));
            });
        </script>
    @endsection

