<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.order.title')); ?>

        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="<?php echo e(route('admin.orders.index')); ?>">
                        <?php echo e(trans('global.back_to_list')); ?>

                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.order.fields.id')); ?>

                            </th>
                            <td>
                                <?php echo e($order->id); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.order.fields.client')); ?>

                            </th>
                            <td>
                                <?php if($order->client): ?>
                                    <a href="<?php echo e(route('admin.clients.show', $order->client->id)); ?>">
                                        <?php echo e($order->client->mobile ?? ''); ?>

                                    </a>
                                <?php else: ?>
                                    <?php echo e(trans('global.na')); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.order.fields.box')); ?>

                            </th>
                            <td>
                                <?php echo e($order->box->status ?? ''); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.order.fields.driver')); ?>

                            </th>
                            <td>
                                <?php if($order->driver): ?>
                                    <a href="<?php echo e(route('admin.drivers.show', $order->driver->id)); ?>">
                                        <?php echo e($order->driver->name ?? ''); ?>

                                    </a>
                                <?php else: ?>
                                    <?php echo e(trans('global.na')); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.order.fields.amount_before_vat')); ?>

                            </th>
                            <td>
                                <?php echo e($order->amount_before_vat); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.order.fields.vat')); ?>

                            </th>
                            <td>
                                <?php echo e($order->vat); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.order.fields.discount')); ?>

                            </th>
                            <td>
                                <?php echo e($order->discount); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.order.fields.amount_after_vat')); ?>

                            </th>
                            <td>
                                <?php echo e($order->amount_after_vat); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.order.fields.delivery_date')); ?>

                            </th>
                            <td>
                                <?php echo e($order->delivery_date); ?>

                            </td>
                        </tr>

                        <tr>
                            <th>
                                <?php echo e(trans('cruds.order.fields.address')); ?>

                            </th>
                            <td>
                                <?php if($order->address): ?>
                                    <a href="<?php echo e(route('admin.client-addresses.show', $order->address->id)); ?>">
                                        <?php echo e($order->address->name ?? ''); ?>

                                    </a>
                                <?php else: ?>
                                    <?php echo e(trans('global.na')); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="<?php echo e(route('admin.orders.index')); ?>">
                        <?php echo e(trans('global.back_to_list')); ?>

                    </a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/orders/show.blade.php ENDPATH**/ ?>