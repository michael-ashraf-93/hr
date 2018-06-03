<?php $__env->startSection('content'); ?>
    <?php if(count($users)): ?>
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
                                            style="color: gainsboro"><?php echo e($users->count()); ?></span> Of
                <span style="color: gainsboro"> <?php echo e($users->total()); ?> </span> Users</span></h1>
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
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <?php if(auth()->user()->id == $user->id): ?>
                                                <td>
                                                    <span style="color: rgb(40, 167, 69);"><?php echo e($user->fname .' '. $user->lname); ?></span>
                                                </td>
                                            <?php else: ?>
                                                <td><?php echo e($user->fname .' '. $user->lname); ?></td>
                                            <?php endif; ?>
                                            <td><?php echo e($user->phone); ?></td>
                                            <?php if(isset($user->hire_date)): ?>
                                                <td><?php echo e(@$user->hire_date); ?></td>
                                            <?php else: ?>
                                                <td> --</td>
                                            <?php endif; ?>
                                            <?php if(isset($user->salary)): ?>
                                                <td><?php echo e(@$user->salary); ?></td>
                                            <?php else: ?>
                                                <td> --</td>
                                            <?php endif; ?>
                                            <?php if(isset($user->commission_pct)): ?>
                                                <td><?php echo e(@$user->commission_pct); ?></td>
                                            <?php else: ?>
                                                <td> --</td>
                                            <?php endif; ?>
                                            <?php if(isset($user->manager->fname)): ?>
                                                <td><?php echo e($user->manager->fname .' '. $user->manager->lname); ?></td>
                                            <?php else: ?>
                                                <td> --</td>
                                            <?php endif; ?>
                                            <?php if(isset($user->department->name)): ?>
                                                <td><?php echo e(@$user->department->name); ?></td>
                                            <?php else: ?>
                                                <td> --</td>
                                            <?php endif; ?>
                                            <?php if(isset($user->job->title)): ?>
                                                <td><?php echo e($user->Job->title); ?></td>
                                            <?php else: ?>
                                                <td> --</td>
                                            <?php endif; ?>
                                            <td><?php echo e($user->email); ?></td>
                                            <td>
                                                <a href="/<?php echo e($user->id); ?>/edit_employee">
                                                    <button class="btn btn-primary btn-xs">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger  Destroy" usrid="<?php echo e($user->id); ?>">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php echo e($users->links()); ?>


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
            <img style="width: 80%;" src="<?php echo e(asset('no.svg')); ?>" alt="No Users!">
            <h1 style="color: #666666">Whoops, No Countries Found!</h1>
            <h2 style="color: #a9a9a9">You Can Add New Country<h1>
                    <a href="user/create" style="color: #007bff"><b>Here</b>
                    </a></h1></h2>
        </div>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $(document).on('click', '.Destroy', function () {
                var id = $(this).attr('usrid');
                var _token = '<?php echo e(csrf_token()); ?>';
                $.ajax({
                    url: '<?php echo e(url('user/destroy')); ?>',
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