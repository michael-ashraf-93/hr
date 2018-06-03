<?php echo $__env->make('admin.modals.EditTask', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(count($tasks)): ?>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title"><b>Jobs</b></h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <h1> <span style="color: dodgerblue"><span
                                            style="color: gainsboro"><?php echo e($tasks->count()); ?></span> Of
                <span style="color: gainsboro"> <?php echo e($tasks->total()); ?> </span> Tasks</span></h1>
                            <div style="overflow-x:auto;">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Date and Time</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="user<?php echo e($task->id); ?>">
                                            <td style="background:<?php echo e($task->back); ?>; color: <?php echo e($task->text); ?>"><?php echo e($task->title); ?></td>
                                            <td><?php echo e($task->body); ?></td>
                                            <td><?php echo e(date('d - m - Y',$task->date)); ?></td>
                                            <td>
                                                <a href="task/<?php echo e($task->id); ?>/edit" data-toggle="modal" data-target="#exampleModal/<?php echo e($task->id); ?>">
                                                    <button class="btn btn-primary btn-xs">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger  Destroy" tskid="<?php echo e($task->id); ?>">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php echo e($tasks->links()); ?>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    <?php else: ?>
        <div style="text-align:center;">
            <img style="width: 80%;" src="<?php echo e(asset('no.svg')); ?>" alt="No Tasks!">
            <h1 style="color: #666666">Whoops, No Countries Found!</h1>
            <h2 style="color: #a9a9a9">You Can Add New Country<h1>
                    <a href="#" style="color: #007bff" data-toggle="modal" data-target="#add-new-task"><b>Here</b>
                    </a></h1></h2>
        </div>

    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $(document).on('click', '.Destroy', function () {
                var id = $(this).attr('tskid');
                var _token = '<?php echo e(csrf_token()); ?>';
                $.ajax({
                    url: '<?php echo e(url('task/destroy')); ?>',
                    type: 'post',
                    dataType: 'json',
                    data: {id: id, _token: _token},
                    success: function (data) {
                        if (data.status == true) {
                            alert('Deleted');
                            $('#user' + id).remove();
                        }
                        else {
                            alert('Error');
                        }
                    }
                });
            }
        )
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>