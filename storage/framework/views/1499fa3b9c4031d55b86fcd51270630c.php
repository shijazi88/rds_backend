<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.driver.title_singular')); ?>

        </div>

        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.drivers.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="name"><?php echo e(trans('cruds.driver.fields.name')); ?></label>
                            <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text"
                                name="name" id="name" value="<?php echo e(old('name', '')); ?>" required>
                            <?php if($errors->has('name')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('name')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.driver.fields.name_helper')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="password"><?php echo e(trans('cruds.driver.fields.password')); ?></label>
                            <input class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" type="password"
                                name="password" id="password" required>
                            <?php if($errors->has('password')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('password')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.driver.fields.password_helper')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required"><?php echo e(trans('cruds.driver.fields.status')); ?></label>
                            <select class="form-control <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?>" name="status"
                                id="statuss" required>
                                <option value disabled <?php echo e(old('status', null) === null ? 'selected' : ''); ?>>
                                    <?php echo e(trans('global.pleaseSelect')); ?></option>
                                <?php $__currentLoopData = App\Models\Driver::STATUS_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"
                                        <?php echo e(old('status', 'enabled') === (string) $key ? 'selected' : ''); ?>>
                                        <?php echo e($label); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('status')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('status')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.driver.fields.status_helper')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="mobile"><?php echo e(trans('cruds.driver.fields.mobile')); ?></label>
                            <input class="form-control <?php echo e($errors->has('mobile') ? 'is-invalid' : ''); ?>" type="text"
                                name="mobile" id="mobile" value="<?php echo e(old('mobile', '')); ?>" required>
                            <?php if($errors->has('mobile')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('mobile')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.driver.fields.mobile_helper')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="email"><?php echo e(trans('cruds.driver.fields.email')); ?></label>
                            <input class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" type="text"
                                name="email" id="email" value="<?php echo e(old('email', '')); ?>" required>
                            <?php if($errors->has('email')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('email')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.driver.fields.email_helper')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo e(trans('cruds.driver.fields.language')); ?></label>
                            <select class="form-control <?php echo e($errors->has('language') ? 'is-invalid' : ''); ?>" name="language"
                                id="language">
                                <option value disabled <?php echo e(old('language', null) === null ? 'selected' : ''); ?>>
                                    <?php echo e(trans('global.pleaseSelect')); ?></option>
                                <?php $__currentLoopData = App\Models\Driver::LANGUAGE_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"
                                        <?php echo e(old('language', 'en') === (string) $key ? 'selected' : ''); ?>>
                                        <?php echo e($label); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('language')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('language')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.driver.fields.language_helper')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="lat"><?php echo e(trans('cruds.driver.fields.lat')); ?></label>
                            <input class="form-control <?php echo e($errors->has('lat') ? 'is-invalid' : ''); ?>" type="text"
                                name="lat" id="lat" value="<?php echo e(old('lat', '')); ?>" required>
                            <?php if($errors->has('lat')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('lat')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.driver.fields.lat_helper')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lng"><?php echo e(trans('cruds.driver.fields.lng')); ?></label>
                            <input class="form-control <?php echo e($errors->has('lng') ? 'is-invalid' : ''); ?>" type="text"
                                name="lng" id="lng" value="<?php echo e(old('lng', '')); ?>">
                            <?php if($errors->has('lng')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('lng')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.driver.fields.lng_helper')); ?></span>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/drivers/create.blade.php ENDPATH**/ ?>