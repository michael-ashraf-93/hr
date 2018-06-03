@extends('admin.layouts.index')
@include('admin.layouts.inside')
@include('admin.modals.AddNewTaskModal')
@section('content')
    <link rel="stylesheet" href="{{ url('admin/plugins/fullcalendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/plugins/fullcalendar/fullcalendar.print.css') }}" media="print">
    <section class="content">
        {{--        @include('admin.layouts.clock')--}}
        <div class="container-fluid">
            <h5 class="mb-2"></h5>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fa fa-user-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Employees</span>
                            <span class="info-box-number">{{ @count(App\User::all()) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fa fa-sitemap"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Departments</span>
                            <span class="info-box-number">{{ @count(App\Department::all()) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fa fa-briefcase"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Jobs</span>
                            <span class="info-box-number">{{ @count(App\Job::all()) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fa fa-map-marker"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Locations</span>
                            <span class="info-box-number">{{ @count(App\Location::all()) }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>

    <div class="col-md-12">
        <div class=" card card-primary">
            <div class="card-body p-0">
                <div id="calendar"></div>
            </div>
        </div>
    </div>

@endsection
@section('js')

    <script>
        $(function () {

            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function () {

                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 1070,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0  //  original position after the drag
                    })

                })
            }

            ini_events($('#external-events div.external-event'))

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                buttonText: {
                    today: 'today',
                    month: 'month',
                    week: 'week',
                    day: 'day'
                },
                events: [
                        @foreach(\App\Task::get() as $task)
                    {
                        title: '{{ $task->title }}',
                        start: '{{ date('Y-m-d',$task->date) }}',
                        backgroundColor: '{{ $task->back }}', //red§
                        textColor: '{{ $task->text }}',
                        borderColor: '#000' //red
                    },


                    @endforeach
                ],

            })

        })
    </script>
@endsection
