<?php $__env->startSection('content'); ?>
<?php if(count($managers)): ?>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title"><b>Jobs</b></h1>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div style="overflow-x:auto;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Hire Date</th>
                                <th>Salary</th>
                                <th>Commission</th>
                                <th>Manager</th>
                                <th>Department</th>
                                <th>Job</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tbody>
                            <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($manager->fname .' '. $manager->lname); ?></td>
                                    <td><?php echo e($manager->phone); ?></td>
                                    <td><?php echo e($manager->hire_date); ?></td>
                                    <td><?php echo e($manager->salary); ?></td>
                                    <td><?php echo e($manager->commission_pct); ?></td>
                                    <?php if(isset($manager->manager->fname)): ?>
                                        <td><?php echo e($manager->manager->fname .' '. $manager->manager->lname); ?></td>
                                    <?php else: ?>
                                        <td> --</td>
                                    <?php endif; ?>
                                    <td><?php echo e($manager->department->name); ?></td>
                                    <td><?php echo e($manager->Job->title); ?></td>
                                    <td><?php echo e($manager->email); ?></td>
                                    <td>
                                        <a href="/<?php echo e($manager->id); ?>/edit_employee">
                                            <button class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger  Destroy" mngrid="<?php echo e($manager->id); ?>">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        </div>
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
        <img style="width: 80%;" src="<?php echo e(asset('no.svg')); ?>" alt="No Managers!">
        <h1 style="color: #666666">Whoops, No Managers Found!</h1>
        <h2 style="color: #a9a9a9">You Can Add New Manager<h1>
                <a href="user/create" style="color: #007bff"><b>Here</b>
                </a></h1></h2>
    </div>

<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $(document).on('click', '.Destroy', function () {
                var id = $(this).attr('mngrid');
                var _token = '<?php echo e(csrf_token()); ?>';
                $.ajax({
                    url: '<?php echo e(url('manager/destroy')); ?>',
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