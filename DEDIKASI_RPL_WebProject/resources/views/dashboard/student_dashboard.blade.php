@extends('layout.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Selamat Datang!</h3>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="page-title">Course Favorite</h3>
        <div class="card-container row row-cols-1 row-cols-md-2 row-cols-lg-4 justify-content-start">
            @foreach($pelatihanAcc as $enroll)
                <div class="col mb-4">
                    <div class="card h-100 d-flex flex-column" style="display: flex; flex-direction: column;">
                        <div class="card-body d-flex flex-column" style="display: flex; flex-direction: column;">
                            <h5 class="card-title"><strong>{{ $enroll->title }}</strong></h5>
                            <p class="card-text">{!! Str::limit(strip_tags($enroll->description), 100, '...') !!}</p>
                            <div style="margin-top: auto;">
                                <button id="submitBtn" type="button" class="btn btn-primary btn-submit">View</button>
                            </div>
                            @if($enroll->pivot->favorite === 'yes')
                                <!-- Action or button for "favorite" -->
                            @else
                                <!-- If not favorite -->
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-xl-10 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Total Pelatihan</h6>
                                <h3>{{ $courses->count() }}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{URL::to('assets/img/icons/teacher-icon-02.svg')}}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            @foreach ($courses as $course)
            <div class="col-12 col-md-4">
                <div class="card flex-fill comman-shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title">{{ $course->title }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="col-lg-3 col-md-3">
                                    <div class="dash-details">
                                        <div class="lesson-activity">
                                            <div class="lesson-imgs">
                                                <img src="{{ URL::to('assets/img/icons/lesson-icon-04.svg') }}" alt="">
                                            </div>
                                            <div class="views-lesson">
                                                <h5>DESKRIPSI COURSE</h5>
                                                <h4>10</h4>
                                            </div>
                                        </div>
                                        <div class="lesson-activity">
                                            <div class="lesson-imgs">
                                                <img src="{{ URL::to('assets/img/icons/lesson-icon-06.svg') }}" alt="">
                                            </div>
                                            <div class="views-lesson">
                                                <h5>DESKRIPSI COURSE</h5>
                                                <h4>10</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="skip-group">
                                    @php
                                        $peserta = Auth::guard('peserta')->user();
                                        $enrollment = $peserta->course()->where('course_id', $course->id)->first();
                                    @endphp
                                    @if ($enrollment)
                                        @if ($enrollment->pivot->status == 'Pending')
                                            <button class="btn btn-info continue-btn" disabled>Enrolled</button>
                                        @elseif ($enrollment->pivot->status == 'Diterima')
                                            <div class="alert alert-success" role="alert">
                                                Anda sudah diterima dalam pelatihan ini
                                            </div>
                                            <button class="btn btn-info continue-btn" disabled>Enrolled</button>
                                        @elseif (str_contains($enrollment->pivot->status, 'Ditolak'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ $enrollment->pivot->status }}
                                            </div>
                                            <a href="{{ route('enroll_pelatihan', ['id_peserta' => $peserta->id, 'id_course' => $course->id]) }}" class="btn btn-info continue-btn" dusk="enroll-button-{{ $course->id }}">Enroll</a>
                                        @else
                                            <a href="{{ route('enroll_pelatihan', ['id_peserta' => $peserta->id, 'id_course' => $course->id]) }}" class="btn btn-info continue-btn" dusk="enroll-button-{{ $course->id }}">Enroll</a>
                                        @endif
                                    @else
                                        <a href="{{ route('enroll_pelatihan', ['id_peserta' => $peserta->id, 'id_course' => $course->id]) }}" class="btn btn-info continue-btn" dusk="enroll-button-{{ $course->id }}">Enroll</a>
                                    @endif          
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card flex-fill comman-shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title">Timeline Event</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                                <div class="col-12">
                                    @foreach ($upcomingEvents as $upcomingEvent)
                                        <div class="dash-details">
                                            <div class="lesson-activity">
                                                <div class="lesson-imgs">
                                                    <img src="{{ URL::to('assets/img/icons/lesson-icon-04.svg') }}" alt="">
                                                </div>
                                                <div class="views-lesson">
                                                    <h5 style="width: 100%;">{{ strip_tags($upcomingEvent->tugas) }}</h5>
                                                </div>
                                            </div>
                                            <div class="lesson-activity">
                                                <div class="lesson-imgs">
                                                    <img src="{{ URL::to('assets/img/icons/lesson-icon-06.svg') }}" alt="">
                                                </div>
                                                <div class="views-lesson">
                                                    <h5>{{ $upcomingEvent->deadline }}</h5>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Temukan tombol dengan ID 'submitBtn'
    var submitBtn = document.getElementById('submitBtn');

    // Tambahkan event listener untuk mengarahkan ke route lain saat tombol diklik
    submitBtn.addEventListener('click', function() {
        // Ganti URL di bawah dengan URL route yang diinginkan
        window.location.href = "{{ route('list_peserta_pelatihan') }}";
    });
</script>
@endsection