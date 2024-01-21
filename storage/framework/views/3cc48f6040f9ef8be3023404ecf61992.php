<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.client.title_singular')); ?>

        </div>

        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.clients.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="mobile"><?php echo e(trans('cruds.client.fields.mobile')); ?></label>
                            <input class="form-control <?php echo e($errors->has('mobile') ? 'is-invalid' : ''); ?>" type="text"
                                name="mobile" id="mobile" value="<?php echo e(old('mobile', '')); ?>" required>
                            <?php if($errors->has('mobile')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('mobile')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.client.fields.mobile_helper')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="name"><?php echo e(trans('cruds.client.fields.name')); ?></label>
                            <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text"
                                name="name" id="name" value="<?php echo e(old('name', '')); ?>" required>
                            <?php if($errors->has('name')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('name')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.client.fields.name_helper')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="email"><?php echo e(trans('cruds.client.fields.email')); ?></label>
                            <input class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" type="email"
                                name="email" id="email" value="<?php echo e(old('email')); ?>" required>
                            <?php if($errors->has('email')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('email')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.client.fields.email_helper')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo e(trans('cruds.client.fields.status')); ?></label>
                            <select class="form-control <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?>" name="status"
                                id="statuss">
                                <option value disabled <?php echo e(old('status', null) === null ? 'selected' : ''); ?>>
                                    <?php echo e(trans('global.pleaseSelect')); ?></option>
                                <?php $__currentLoopData = App\Models\Client::STATUS_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"
                                        <?php echo e(old('status', '1') === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('status')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('status')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.client.fields.status_helper')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo e(trans('cruds.client.fields.language')); ?></label>
                            <select class="form-control <?php echo e($errors->has('language') ? 'is-invalid' : ''); ?>" name="language"
                                id="language">
                                <option value disabled <?php echo e(old('language', null) === null ? 'selected' : ''); ?>>
                                    <?php echo e(trans('global.pleaseSelect')); ?></option>
                                <?php $__currentLoopData = App\Models\Client::LANGUAGE_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"
                                        <?php echo e(old('language', 'ar') === (string) $key ? 'selected' : ''); ?>>
                                        <?php echo e($label); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('language')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('language')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.client.fields.language_helper')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <button class="btn btn-danger" type="submit">
                        <?php echo e(trans('global.save')); ?>

                    </button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/clients/create.blade.php ENDPATH**/ ?>