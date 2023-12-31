<?php $__env->startSection('content'); ?>
    <div class="container mt-3">
        <div class="row">

            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Role Name: <?php echo e($role->name); ?></h5>
                            
                            <p class="card-text">Total Permissions: <?php echo e($role->permissions->count()); ?></p>
                            <div class="text-center">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_edit')): ?>
                                    <a href="<?php echo e(Auth::guard('web')->check() ? route('admin.roles.edit', $role->id) : route('admin.client-roles.edit', $role->id)); ?>"
                                        class="btn btn-sm btn-success"><?php echo e(trans('global.edit')); ?></a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_show')): ?>
                                    <a href="<?php echo e(Auth::guard('web')->check() ? route('admin.roles.show', $role->id) : route('admin.client-roles.show', $role->id)); ?>"
                                        class="btn btn-sm btn-info"><?php echo e(trans('global.view')); ?></a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_delete')): ?>
                                    <form
                                        action="<?php echo e(Auth::guard('web')->check() ? route('admin.roles.destroy', $role->id) : route('admin.client-roles.destroy', $role->id)); ?>"
                                        method="POST" onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');"
                                        style="display: inline-block;">
                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <button type="submit"
                                            class="btn btn-sm btn-danger"><?php echo e(trans('global.delete')); ?></button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_create')): ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <a href="<?php echo e(Auth::guard('web')->check() ? route('admin.roles.create') : route('admin.client-roles.create')); ?>"
                                class="btn btn-success"><?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.role.title_singular')); ?></a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/roles/index.blade.php ENDPATH**/ ?>