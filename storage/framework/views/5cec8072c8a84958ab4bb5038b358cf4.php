<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.order.title_singular')); ?>

        </div>

        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.orders.update', [$order->id])); ?>" enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="client_id"><?php echo e(trans('cruds.order.fields.client')); ?></label>
                            <select class="form-control select2 <?php echo e($errors->has('client') ? 'is-invalid' : ''); ?>"
                                name="client_id" id="client_id" required>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>"
                                        <?php echo e((old('client_id') ? old('client_id') : $order->client->id ?? '') == $id ? 'selected' : ''); ?>>
                                        <?php echo e($entry); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('client')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('client')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.order.fields.client_helper')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="box_id"><?php echo e(trans('cruds.order.fields.box')); ?></label>
                            <select class="form-control select2 <?php echo e($errors->has('box') ? 'is-invalid' : ''); ?>"
                                name="box_id" id="box_id" required>
                                <?php $__currentLoopData = $boxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>"
                                        <?php echo e((old('box_id') ? old('box_id') : $order->box->id ?? '') == $id ? 'selected' : ''); ?>>
                                        <?php echo e($entry); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('box')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('box')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.order.fields.box_helper')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="driver_id"><?php echo e(trans('cruds.order.fields.driver')); ?></label>
                            <select class="form-control select2 <?php echo e($errors->has('driver') ? 'is-invalid' : ''); ?>"
                                name="driver_id" id="driver_id" required>
                                <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>"
                                        <?php echo e((old('driver_id') ? old('driver_id') : $order->driver->id ?? '') == $id ? 'selected' : ''); ?>>
                                        <?php echo e($entry); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('driver')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('driver')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.order.fields.driver_helper')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required"
                                for="amount_before_vat"><?php echo e(trans('cruds.order.fields.amount_before_vat')); ?></label>
                            <input class="form-control <?php echo e($errors->has('amount_before_vat') ? 'is-invalid' : ''); ?>"
                                type="number" name="amount_before_vat" id="amount_before_vat"
                                value="<?php echo e(old('amount_before_vat', $order->amount_before_vat)); ?>" step="0.01" required>
                            <?php if($errors->has('amount_before_vat')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('amount_before_vat')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.order.fields.amount_before_vat_helper')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="vat"><?php echo e(trans('cruds.order.fields.vat')); ?></label>
                            <input class="form-control <?php echo e($errors->has('vat') ? 'is-invalid' : ''); ?>" type="number"
                                name="vat" id="vat" value="<?php echo e(old('vat', $order->vat)); ?>" step="0.01"
                                required>
                            <?php if($errors->has('vat')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('vat')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.order.fields.vat_helper')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="discount"><?php echo e(trans('cruds.order.fields.discount')); ?></label>
                            <input class="form-control <?php echo e($errors->has('discount') ? 'is-invalid' : ''); ?>" type="number"
                                name="discount" id="discount" value="<?php echo e(old('discount', $order->discount)); ?>"
                                step="0.01">
                            <?php if($errors->has('discount')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('discount')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.order.fields.discount_helper')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required"
                                for="amount_after_vat"><?php echo e(trans('cruds.order.fields.amount_after_vat')); ?></label>
                            <input class="form-control <?php echo e($errors->has('amount_after_vat') ? 'is-invalid' : ''); ?>"
                                type="number" name="amount_after_vat" id="amount_after_vat"
                                value="<?php echo e(old('amount_after_vat', $order->amount_after_vat)); ?>" step="0.01" required>
                            <?php if($errors->has('amount_after_vat')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('amount_after_vat')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.order.fields.amount_after_vat_helper')); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="delivery_date"><?php echo e(trans('cruds.order.fields.delivery_date')); ?></label>
                            <input class="form-control datetime <?php echo e($errors->has('delivery_date') ? 'is-invalid' : ''); ?>"
                                type="text" name="delivery_date" id="delivery_date"
                                value="<?php echo e(old('delivery_date', $order->delivery_date)); ?>">
                            <?php if($errors->has('delivery_date')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('delivery_date')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.order.fields.delivery_date_helper')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required"><?php echo e(trans('cruds.order.fields.status')); ?></label>
                            <select class="form-control <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?>" name="status"
                                id="statuss" required>
                                <option value disabled <?php echo e(old('status', null) === null ? 'selected' : ''); ?>>
                                    <?php echo e(trans('global.pleaseSelect')); ?></option>
                                <?php $__currentLoopData = App\Models\Order::status_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>"
                                        <?php echo e(old('status', $order->status) === (string) $key ? 'selected' : ''); ?>>
                                        <?php echo e($label); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('status')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('status')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.order.fields.status_helper')); ?></span>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address_id"><?php echo e(trans('cruds.order.fields.address')); ?></label>
                            <select class="form-control select2 <?php echo e($errors->has('address') ? 'is-invalid' : ''); ?>"
                                name="address_id" id="address_id">
                                <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>"
                                        <?php echo e((old('address_id') ? old('address_id') : $order->address->id ?? '') == $id ? 'selected' : ''); ?>>
                                        <?php echo e($entry); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('address')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('address')); ?>

                                </div>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.order.fields.address_helper')); ?></span>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/orders/edit.blade.php ENDPATH**/ ?>