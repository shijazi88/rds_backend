<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.permission.title_singular')); ?>

        </div>
        <?php if(Auth::guard('web')->check()): ?>
            <div class="card-body">
                <form method="POST" action="<?php echo e(route('admin.permissions.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="guard_name" value="web">

                    <div class="form-group">
                        <label class="required" for="name"><?php echo e(trans('cruds.permission.fields.name')); ?></label>
                        <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text"
                            name="name" id="name" value="<?php echo e(old('name', '')); ?>" required>
                        <?php if($errors->has('name')): ?>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('name')); ?>

                            </div>
                        <?php endif; ?>
                        <span class="help-block"><?php echo e(trans('cruds.permission.fields.title_helper')); ?></span>
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-danger btn-s" type="submit">
                            <?php echo e(trans('global.save')); ?>

                        </button>
                        <a class="btn btn-info btn-s" href="<?php echo e(route('admin.permissions.index')); ?>">
                            <?php echo e(trans('global.back_to_list')); ?>

                        </a>
                    </div>
                </form>
            </div>
        <?php elseif(Auth::guard('client_users')->check()): ?>
            <div class="card-body">
                <form method="POST" action="<?php echo e(route('admin.client-permissions.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="guard_name" value="client_users">

                    <div class="form-group">
                        <label class="required" for="name"><?php echo e(trans('cruds.permission.fields.name')); ?></label>
                        <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text"
                            name="name" id="name" value="<?php echo e(old('name', '')); ?>" required>
                        <?php if($errors->has('name')): ?>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('name')); ?>

                            </div>
                        <?php endif; ?>
                        <span class="help-block"><?php echo e(trans('cruds.permission.fields.title_helper')); ?></span>
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-danger btn-s" type="submit">
                            <?php echo e(trans('global.save')); ?>

                        </button>
                        <a class="btn btn-info btn-s" href="<?php echo e(route('admin.permissions.index')); ?>">
                            <?php echo e(trans('global.back_to_list')); ?>

                        </a>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/permissions/create.blade.php ENDPATH**/ ?>