@extends('layout.master')

{{-- message --}}

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="card">
            <h6 class="m-3">Time Line</h6>
        </div>
        <div class="card">
            {{-- @for ($i = 0; $i < 4; $i++) --}}
                <div class="row justify-content-between mx-2">
                    <div class="col mx-2 my-2 rounded">
                        <div class="row">
                            <div class="col-lg-1 col-sm-5 mx-auto my-auto">
                                <i class="fas fa-book" style="font-size: 40px; color: rgba(95, 95, 95, 0.585) "></i>
                            </div>
                            <div class="col">
                                <p>Membuat Flow</p>
                                <p>UI UX Course</p>
                                <button class="btn btn-primary">Add Submission</button>
                            </div>
                        </div>
                    </div>
                    <div class="col text-end mx-2 my-auto">
                        <h6>24.00</h6>
                    </div>
                </div>
            {{-- @endfor --}}
        </div>
        <div class="card">
            <h6 class="m-3">Progress</h6>
        </div>
        <div class="row ">
            <div class="col-6">
                <div class="card flex-fill comman-shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title">UI/UX for Beginer</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-3 dash-widget1">
                                <div class="circle-bar circle-bar2">
                                    <div class="circle-graph2" data-percent="75">
                                        <b>75%</b>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="col-lg-3 col-md-3">
                                    <div class="dash-details">
                                        <div class="lesson-activity">
                                            <div class="lesson-imgs">
                                                <img src="{{ URL::to('assets/img/icons/lesson-icon-04.svg') }}"
                                                    alt="">
                                            </div>
                                            <div class="views-lesson">
                                                <h5>QUIZ</h5>
                                                <h4>3/10</h4>
                                            </div>
                                        </div>
                                        <div class="lesson-activity">
                                            <div class="lesson-imgs">
                                                <img src="{{ URL::to('assets/img/icons/lesson-icon-06.svg') }}"
                                                    alt="">
                                            </div>
                                            <div class="views-lesson">
                                                <h5>Asignment</h5>
                                                <h4>6/10</h4>
                                            </div>
                                        </div>
                                        <div class="lesson-activity">
                                            <div class="lesson-imgs">
                                                <img src="{{ URL::to('assets/img/icons/lesson-icon-06.svg') }}"
                                                    alt="">
                                            </div>
                                            <div class="views-lesson">
                                                <h5>Completion</h5>
                                                <h4>10/50</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="skip-group">
                                   
                                    <button type="submit" class="btn btn-info continue-btn">View</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card flex-fill comman-shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title">Python for Beginer</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-3 dash-widget1">
                                <div class="circle-bar circle-bar2">
                                    <div class="circle-graph2" data-percent="10">
                                        <b>10%</b>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="col-lg-3 col-md-3">
                                    <div class="dash-details">
                                        <div class="lesson-activity">
                                            <div class="lesson-imgs">
                                                <img src="{{ URL::to('assets/img/icons/lesson-icon-04.svg') }}"
                                                    alt="">
                                            </div>
                                            <div class="views-lesson">
                                                <h5>QUIZ</h5>
                                                <h4>0/10</h4>
                                            </div>
                                        </div>
                                        <div class="lesson-activity">
                                            <div class="lesson-imgs">
                                                <img src="{{ URL::to('assets/img/icons/lesson-icon-06.svg') }}"
                                                    alt="">
                                            </div>
                                            <div class="views-lesson">
                                                <h5>Asignment</h5>
                                                <h4>1/10</h4>
                                            </div>
                                        </div>
                                        <div class="lesson-activity">
                                            <div class="lesson-imgs">
                                                <img src="{{ URL::to('assets/img/icons/lesson-icon-06.svg') }}"
                                                    alt="">
                                            </div>
                                            <div class="views-lesson">
                                                <h5>Completion</h5>
                                                <h4>1/50</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="skip-group">
                                
                                    <button type="submit" class="btn btn-info continue-btn">View</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
