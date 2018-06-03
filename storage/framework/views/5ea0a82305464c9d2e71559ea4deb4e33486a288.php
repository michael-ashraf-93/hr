<?php $__env->startSection('content'); ?>



<?php if(count($departments)): ?>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title"><b>Jobs</b></h1>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th><?php echo e(__('lang.name')); ?></th>
                                <th><?php echo e(__('lang.location')); ?></th>
                                <th><?php echo e(__('lang.manager')); ?></th>
                                <th><?php echo e(__('lang.edit')); ?></th>
                                <th><?php echo e(__('lang.delete')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tbody>
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($department->name); ?></td>
                                    <td><?php echo e($department->location->street_address . ', ' . $department->location->city . ', ' . $department->location->country->name); ?></td>

                                    <?php if(isset($department->manager->fname)): ?>
                                        <td><?php echo e($department->manager->fname .' '. $department->manager->lname); ?></td>
                                    <?php else: ?>
                                        <td> --</td>
                                    <?php endif; ?>

                                    <td>
                                        <a href="/<?php echo e($department->id); ?>/edit_department">
                                            <button class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    </td>

                                    <td>
                                        <button class="btn btn-danger  Destroy" depid="<?php echo e($department->id); ?>">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
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
        <img style="width: 80%;" src="<?php echo e(asset('no.svg')); ?>" alt="No Departments!">
        <h1 style="color: #666666">Whoops, No Department Found!</h1>
        <h2 style="color: #a9a9a9">You Can Add New Department<h1>
                <a href="department/create" style="color: #007bff"><b>Here</b>
                </a></h1></h2>
    </div>

<?php endif; ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
    <script>
        $(document).on('click', '.Destroy', function () {
                var id = $(this).attr('depid');
                var _token = '<?php echo e(csrf_token()); ?>';
                $.ajax({
                    url: '<?php echo e(url('department/destroy')); ?>',
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