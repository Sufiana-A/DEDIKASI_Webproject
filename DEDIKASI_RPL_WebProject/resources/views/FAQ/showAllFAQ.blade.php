@extends('layout.adminmaster')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="container">
            <div class="text-center">
                <h1>FAQ</h1>
                <p>Berikut ini adalah pertanyaan-pertanyaan yang sering ditanyakan oleh peserta. Selamat menikmati!</p>
            </div>
            <div class="accordion" id="faqAccordion">
                @foreach ($faqs as $faq)
                    <div class="card mb-2">
                        <div class="card-header" id="heading{{ $faq->id }}">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapse{{ $faq->id }}" aria-expanded="true"
                                    aria-controls="collapse{{ $faq->id }}">
                                    {{ $faq->question }}
                                    <span class="float-right"><i class="fa fa-chevron-down"></i></span>
                                </button>
                            </h2>
                        </div>

                        <div id="collapse{{ $faq->id }}" class="collapse" aria-labelledby="heading{{ $faq->id }}"
                            data-parent="#faqAccordion">
                            <div class="card-body">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    .card-header button {
        background: #f8f9fa;
        border: none;
        font-size: 1.25rem;
    }

    .card-header button:hover {
        text-decoration: none;
    }

    .card-header button .fa-chevron-down {
        transition: transform 0.2s;
    }

    .card-header button.collapsed .fa-chevron-down {
        transform: rotate(180deg);
    }

    .card {
        border: none;
    }
</style>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#faqAccordion').on('show.bs.collapse', function () {
            $(this).parent().find('.btn-link').addClass('active');
        }).on('hide.bs.collapse', function () {
            $(this).parent().find('.btn-link').removeClass('active');
        });
    });
</script>
@endsection