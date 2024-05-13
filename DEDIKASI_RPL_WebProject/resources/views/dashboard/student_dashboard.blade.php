@extends('layout.master')

    {{-- message --}}

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

            <div class="row">
                <div class="col-xl-10 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Pelatihan yang Kamu Ikuti</h6>
                                    <h3>20</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{ URL::to('assets/img/icons/teacher-icon-01.svg') }}" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            <div class="col-12 col-lg-12 col-xl-4 d-flex">
                <div class="card flex-fill comman-shadow">
                    <div class="card-body">
                        <div id="calendar-doctor" class="calendar-container"></div>
                        <div class="calendar-info calendar-info1">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row ">
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
                                                    <img src="{{ URL::to('assets/img/icons/lesson-icon-04.svg') }}"
                                                        alt="">
                                                </div>
                                                <div class="views-lesson">
                                                    <h5>QUIZ</h5>
                                                    <h4>10</h4>
                                                </div>
                                            </div>
                                            <div class="lesson-activity">
                                                <div class="lesson-imgs">
                                                    <img src="{{ URL::to('assets/img/icons/lesson-icon-06.svg') }}"
                                                        alt="">
                                                </div>
                                                <div class="views-lesson">
                                                    <h5>Asignment</h5>
                                                    <h4>10</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="skip-group">
                                    @php
                                        $enrolled = $course->peserta->contains(Auth::guard('peserta')->user()->id);
                                    @endphp
                                    @if ($enrolled)
                                        <button class="btn btn-info continue-btn" disabled>Enrolled</button>
                                    @else
                                        <a href="{{ route('enroll_pelatihan', ['id_peserta' => Auth::guard('peserta')->user()->id, 'id_course' => $course->id]) }}" class="btn btn-info continue-btn">Enroll</a>
                                    @endif                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>