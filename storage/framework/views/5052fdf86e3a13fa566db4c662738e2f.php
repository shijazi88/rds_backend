<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.box.title_singular')); ?>

        </div>

        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.boxes.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <!-- New fields: serial_number, color, and size -->
                        <div class="form-group">
                            <label for="serial_number"><?php echo e(trans('cruds.box.fields.serial_number')); ?></label>
                            <input class="form-control <?php echo e($errors->has('serial_number') ? 'is-invalid' : ''); ?>"
                                type="text" name="serial_number" id="serial_number" value="<?php echo e(old('serial_number')); ?>">
                            <?php if($errors->has('serial_number')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('serial_number')); ?>

                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="price"><?php echo e(trans('cruds.box.fields.price')); ?></label>
                            <input class="form-control <?php echo e($errors->has('price') ? 'is-invalid' : ''); ?>" type="number"
                                name="price" id="price" value="<?php echo e(old('price', '')); ?>" step="0.01" required>
                            <?php if($errors->has('price')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('price')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.box.fields.price_helper')); ?></span>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="expiry_date"><?php echo e(trans('cruds.box.fields.expiry_date')); ?></label>
                            <input class="form-control date <?php echo e($errors->has('expiry_date') ? 'is-invalid' : ''); ?>"
                                type="text" name="expiry_date" id="expiry_date" value="<?php echo e(old('expiry_date')); ?>">
                            <?php if($errors->has('expiry_date')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('expiry_date')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.box.fields.expiry_date_helper')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required"><?php echo e(trans('cruds.box.fields.status')); ?></label>
                            <select class="form-control <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?>" name="status"
                                id="statuss" required>
                                <option value disabled <?php echo e(old('status', null) === null ? 'selected' : ''); ?>>
                                    <?php echo e(trans('global.pleaseSelect')); ?></option>
                                <?php $__currentLoopData = App\Models\Box::STATUS_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            <span class="help-block"><?php echo e(trans('cruds.box.fields.status_helper')); ?></span>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lat"><?php echo e(trans('cruds.box.fields.lat')); ?></label>
                            <input class="form-control <?php echo e($errors->has('lat') ? 'is-invalid' : ''); ?>" type="number"
                                name="lat" id="lat" value="<?php echo e(old('lat', '')); ?>" step="0.01">
                            <?php if($errors->has('lat')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('lat')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.box.fields.lat_helper')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lng"><?php echo e(trans('cruds.box.fields.lng')); ?></label>
                            <input class="form-control <?php echo e($errors->has('lng') ? 'is-invalid' : ''); ?>" type="number"
                                name="lng" id="lng" value="<?php echo e(old('lng', '')); ?>" step="0.01">
                            <?php if($errors->has('lng')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('lng')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.box.fields.lng_helper')); ?></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="color"><?php echo e(trans('cruds.box.fields.color')); ?></label>
                            <input class="form-control <?php echo e($errors->has('color') ? 'is-invalid' : ''); ?>" type="text"
                                name="color" id="color" value="<?php echo e(old('color')); ?>">
                            <?php if($errors->has('color')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('color')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="size"><?php echo e(trans('cruds.box.fields.size')); ?></label>
                            <input class="form-control <?php echo e($errors->has('size') ? 'is-invalid' : ''); ?>" type="text"
                                name="size" id="size" value="<?php echo e(old('size')); ?>">
                            <?php if($errors->has('size')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('size')); ?>

                                </div>
                            <?php endif; ?>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/boxes/create.blade.php ENDPATH**/ ?>