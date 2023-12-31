<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.clientAddress.title_singular')); ?>

        </div>

        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.client-addresses.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="client_id"><?php echo e(trans('cruds.clientAddress.fields.client')); ?></label>
                            <select class="form-control select2 <?php echo e($errors->has('client') ? 'is-invalid' : ''); ?>"
                                name="client_id" id="client_id" required>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>" <?php echo e(old('client_id') == $id ? 'selected' : ''); ?>>
                                        <?php echo e($entry); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('client')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('client')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.clientAddress.fields.client_helper')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="lat"><?php echo e(trans('cruds.clientAddress.fields.lat')); ?></label>
                            <input class="form-control <?php echo e($errors->has('lat') ? 'is-invalid' : ''); ?>" type="number"
                                name="lat" id="lat" value="<?php echo e(old('lat', '')); ?>" step="0.01" required>
                            <?php if($errors->has('lat')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('lat')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.clientAddress.fields.lat_helper')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="lng"><?php echo e(trans('cruds.clientAddress.fields.lng')); ?></label>
                            <input class="form-control <?php echo e($errors->has('lng') ? 'is-invalid' : ''); ?>" type="number"
                                name="lng" id="lng" value="<?php echo e(old('lng', '')); ?>" step="0.01" required>
                            <?php if($errors->has('lng')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('lng')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.clientAddress.fields.lng_helper')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="name"><?php echo e(trans('cruds.clientAddress.fields.name')); ?></label>
                            <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text"
                                name="name" id="name" value="<?php echo e(old('name', '')); ?>" required>
                            <?php if($errors->has('name')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('name')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.clientAddress.fields.name_helper')); ?></span>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/clientAddresses/create.blade.php ENDPATH**/ ?>