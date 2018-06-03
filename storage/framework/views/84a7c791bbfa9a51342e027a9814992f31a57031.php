<?php echo $__env->make('admin.layouts.inside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.modals.AddNewTaskModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(url('admin/plugins/fullcalendar/fullcalendar.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('admin/plugins/fullcalendar/fullcalendar.print.css')); ?>" media="print">
    <section class="content">
        
        <div class="container-fluid">
            <h5 class="mb-2"></h5>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fa fa-user-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Employees</span>
                            <span class="info-box-number"><?php echo e(@count(App\User::all())); ?></span>
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
                            <span class="info-box-number"><?php echo e(@count(App\Department::all())); ?></span>
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
                            <span class="info-box-number"><?php echo e(@count(App\Job::all())); ?></span>
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
                            <span class="info-box-number"><?php echo e(@count(App\Location::all())); ?></span>
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

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
                        <?php $__currentLoopData = \App\Task::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    {
                        title: '<?php echo e($task->title); ?>',
                        start: '<?php echo e(date('Y-m-d',$task->date)); ?>',
                        backgroundColor: '<?php echo e($task->back); ?>', //red§
                        textColor: '<?php echo e($task->text); ?>',
                        borderColor: '#000' //red
                    },


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],

            })

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>