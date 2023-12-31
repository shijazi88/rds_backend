<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.role.title_singular')); ?>

        </div>
        <?php if(Auth::guard('web')->check()): ?>
            <div class="card-body">
                <form method="POST" action="<?php echo e(route('admin.roles.update', [$role->id])); ?>" enctype="multipart/form-data">
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="guard_name" value="web">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="required" for="name"><?php echo e(trans('cruds.role.fields.name')); ?></label>
                                <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text"
                                    name="name" id="name" value="<?php echo e(old('name', $role->name)); ?>" required>
                                <?php if($errors->has('name')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo e($errors->first('name')); ?>

                                    </div>
                                <?php endif; ?>
                                <span class="help-block"><?php echo e(trans('cruds.role.fields.title_helper')); ?></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="required"><?php echo e(trans('cruds.role.fields.permissions')); ?></label>
                                <div style="padding-bottom: 4px">
                                    <button type="button" class="btn btn-info btn-xs select-all"
                                        style="border-radius: 0"><?php echo e(trans('global.select_all')); ?></button>
                                    <button type="button" class="btn btn-info btn-xs deselect-all"
                                        style="border-radius: 0"><?php echo e(trans('global.deselect_all')); ?></button>
                                </div>
                                <div class="row">
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-3 mb-3">
                                            <div class="form-check">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input " type="checkbox" name="permissions[]"
                                                        role="switch" id="permission_<?php echo e($id); ?>"
                                                        value="<?php echo e($id); ?>"
                                                        <?php echo e(in_array($id, old('permissions', [])) || $role->permissions->contains($id) ? 'checked' : ''); ?>>
                                                </div>
                                                <label class="form-check-label" for="permission_<?php echo e($id); ?>">
                                                    <?php echo e($permission); ?>

                                                </label>
                                            </div>
                                        </div>
                                        <?php if(($loop->index + 1) % 4 == 0): ?>
                                </div>
                                <div class="row">
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php if($errors->has('permissions')): ?>
        <div class="invalid-feedback">
            <?php echo e($errors->first('permissions')); ?>

        </div>
    <?php endif; ?>
    <span class="help-block"><?php echo e(trans('cruds.role.fields.permissions_helper')); ?></span>
    </div>
    </div>
    </div>
    <div class="form-group">
        <button class="btn btn-danger" type="submit">
            <?php echo e(trans('global.save')); ?>

        </button>
    </div>
    </form>
    </div>
<?php elseif(Auth::guard('client_users')->check()): ?>
    <div class="card-body">
        <form method="POST" action="<?php echo e(route('admin.client-roles.update', [$role->id])); ?>" enctype="multipart/form-data">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <input type="hidden" name="guard_name" value="client_users">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="required" for="name"><?php echo e(trans('cruds.role.fields.name')); ?></label>
                        <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text"
                            name="name" id="name" value="<?php echo e(old('name', $role->name)); ?>" required>
                        <?php if($errors->has('name')): ?>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('name')); ?>

                            </div>
                        <?php endif; ?>
                        <span class="help-block"><?php echo e(trans('cruds.role.fields.title_helper')); ?></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="required"><?php echo e(trans('cruds.role.fields.permissions')); ?></label>
                        <div style="padding-bottom: 4px">
                            <button type="button" class="btn btn-info btn-xs select-all"
                                style="border-radius: 0"><?php echo e(trans('global.select_all')); ?></button>
                            <button type="button" class="btn btn-info btn-xs deselect-all"
                                style="border-radius: 0"><?php echo e(trans('global.deselect_all')); ?></button>
                        </div>
                        <div class="row">
                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3 mb-3">
                                    <div class="form-check">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input " type="checkbox" name="permissions[]"
                                                role="switch" id="permission_<?php echo e($id); ?>"
                                                value="<?php echo e($id); ?>"
                                                <?php echo e(in_array($id, old('permissions', [])) || $role->permissions->contains($id) ? 'checked' : ''); ?>>
                                        </div>
                                        <label class="form-check-label" for="permission_<?php echo e($id); ?>">
                                            <?php echo e($permission); ?>

                                        </label>
                                    </div>
                                </div>
                                <?php if(($loop->index + 1) % 4 == 0): ?>
                        </div>
                        <div class="row">
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php if($errors->has('permissions')): ?>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('permissions')); ?>

                            </div>
                        <?php endif; ?>
                        <span class="help-block"><?php echo e(trans('cruds.role.fields.permissions_helper')); ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group mt-2">
                <button class="btn btn-danger btn-s" type="submit">
                    <?php echo e(trans('global.save')); ?>

                </button>
                <a class="btn btn-info btn-s" href="<?php echo e(route('admin.roles.index')); ?>">
                    <?php echo e(trans('global.back_to_list')); ?>

                </a>
            </div>
        </form>
    </div>
    <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('.select-all').click(function() {
                $('input[type="checkbox"]').prop('checked', true);
            });

            $('.deselect-all').click(function() {
                $('input[name="permissions[]"]').prop('checked', false);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('form').find('input[required], select[required], textarea[required]').each(function() {
                var label = $('label[for="' + $(this).attr('id') + '"]');
                if (label.length > 0) {
                    label.append('<span class="required-field">*</span>');
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/roles/edit.blade.php ENDPATH**/ ?>