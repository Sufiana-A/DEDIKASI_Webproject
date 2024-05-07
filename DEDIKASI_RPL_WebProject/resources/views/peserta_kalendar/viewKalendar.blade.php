@extends('layout.master')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title" style="color:#3d5ee1;">Timeline Saya</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">My Calendar</div>
                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#eventAdd">Add Event</a>
                        </div>
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="eventAdd" role="dialog" data-dismiss="modal" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content bg-light ">
                <div class="modal-header bg-gray">
                    <div class="card-title">Add Event</div>
                </div>
                <form id="addEventSubmit" type="post" target="#">
                    {{ csrf_field() }}
                <div class="card-body text-black p-4">
                    <div class="row mb-3 pl-4 pr-4">
                        <div class="col-md-12">
                            <label for="title" >Title</label>
                            <input id="title" type="text" name="title" class="form-control" autofocus>
                        </div>
                    </div>
                    <div class="row mb-3 ">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Date Range
                                  <input type="text" name="rangepick" class="form-control daterange" /></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="submit" id="addvent" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
</div>

<div class="modal fade" id="eventEdit" role="dialog" data-dismiss="modal" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content bg-light ">
                <div class="modal-header bg-gray">
                    <div class="card-title">Edit Event</div>
                </div>
                <form id="editEventSubmit" type="post" target="#">
                    {{ csrf_field() }}
                    <div class="card-body text-black p-4">
                        <div class="row mb-3 ">
                            <div class="col-md-1">
                                Start:
                            </div>
                            <div class="col-md-5">
                                <div id="startdate"></div>
                            </div>
                            <div class="col-md-1">
                                End:
                            </div>
                            <div class="col-md-5">
                                <div id="enddate"></div>
                            </div>
                        </div>
                        <div class="row mb-3 pl-4 pr-4">
                            <div class="col-md-12">
                                <label for="edittitle">Title</label>
                                <input id="eventid" type="hidden" name="eventid">
                                <input id="edittitle" type="text" name="edittitle" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3 ">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>New Date Range
                                            <input type="text" name="rangepick2" class="form-control daterange" /></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger btn-sm" id="delevent" data-id>Delete</a>
                        <button type="button" id="editeventsubmit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
</div>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            editable: true,
            displayEventTime:true,
            displayEventEnd:true,
            events:'{{route('/getevents')}}',
            eventClick: function(events, jsEvent, view) {
                $('#eventid').val(events.event.id);
                $('#edittitle').val(events.event.title);
                startdt = new Date(events.event.start);
                startdate = moment(startdt).format('MMM DD YYYY h:mm A');
                const startDiv = document.getElementById('startdate');
                startDiv.textContent = startdate;
                enddt = new Date(events.event.end);
                enddate = moment(enddt).format('MMM DD YYYY h:mm A');
                const endDiv = document.getElementById('enddate');
                endDiv.textContent = enddate;
                $('#eventEdit').modal('show');
                $(document).on('click','#editeventsubmit',function(){
                    $.ajax({
                        method: 'post',
                        url: '{{route('mycalendar.editevent')}}',
                        data: $('#editEventSubmit').serialize(),
                        success: function(response) {
                            $('#eventEdit').modal('hide');
                            calendar.refetchEvents();
                        },

                    });
                });

                $(document).on('click','#delevent',function(){
   		            var id = events.event.id;
      		        $.ajax({
        		        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'post',
                        url: '{{route('mycalendar.deleteevent')}}',
                        data: {id:id},
                        success: function(response) {
                            $('#eventEdit').modal('hide');
                            calendar.refetchEvents();
                        },

                    });
                });
            }
        });
        calendar.render();
    });
</script>

<script>
    $(document).ready(function(){
        $(document).on('submit','#addEventSubmit',function(){
            $.ajax({
                method: 'post',
                url: '{{route('mycalendar.addevent')}}',
                data: $('#addEventSubmit').serialize(),
                success: function(response) {
                },
            });
        });
    });
</script>

<script type="text/javascript">
    $(function() {
        $('input[name="rangepick"]').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'YYYY-MM-DD HH:mm'
            }
        });
    });
</script>

<script type="text/javascript">
    $(function() {
        $('input[name="rangepick2"]').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'YYYY-MM-DD HH:mm'
            }
        });
    });
</script>
@endsection