<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.role.title')); ?>

        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <?php if(Auth::guard('web')->check()): ?>
                        <a class="btn btn-default" href="<?php echo e(route('admin.roles.index')); ?>">
                            <?php echo e(trans('global.back_to_list')); ?>

                        </a>
                    <?php elseif(Auth::guard('client_users')->check()): ?>
                        <a class="btn btn-info btn-s" href="<?php echo e(route('admin.roles.index')); ?>">
                            <?php echo e(trans('global.back_to_list')); ?>

                        </a>
                    <?php endif; ?>
                </div>
                <table class="table table-bordered table-striped mt-2">
                    <tbody>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.role.fields.id')); ?>

                            </th>
                            <td>
                                <?php echo e($role->id); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.role.fields.name')); ?>

                            </th>
                            <td>
                                <?php echo e($role->name); ?>

                            </td>
                        </tr>
                        <tr>
                            <th><?php echo e(trans('cruds.role.fields.permissions')); ?></th>
                            <td>
                                <div class="row">
                                    <?php $__currentLoopData = $role->permissions()->orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-3">
                                            <span class="label label-info"><?php echo e($permission->name); ?></span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="form-group">
                    <?php if(Auth::guard('web')->check()): ?>
                        <a class="btn btn-default" href="<?php echo e(route('admin.roles.index')); ?>">
                            <?php echo e(trans('global.back_to_list')); ?>

                        </a>
                    <?php elseif(Auth::guard('client_users')->check()): ?>
                        <a class="btn btn-info btn-s" href="<?php echo e(route('admin.roles.index')); ?>">
                            <?php echo e(trans('global.back_to_list')); ?>

                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/roles/show.blade.php ENDPATH**/ ?>