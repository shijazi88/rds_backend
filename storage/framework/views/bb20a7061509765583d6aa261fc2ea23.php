<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.client.title')); ?>

        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="<?php echo e(route('admin.clients.index')); ?>">
                        <?php echo e(trans('global.back_to_list')); ?>

                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.client.fields.id')); ?>

                            </th>
                            <td>
                                <?php echo e($client->id); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.client.fields.mobile')); ?>

                            </th>
                            <td>
                                <?php echo e($client->mobile); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.client.fields.name')); ?>

                            </th>
                            <td>
                                <?php echo e($client->name); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.client.fields.email')); ?>

                            </th>
                            <td>
                                <?php echo e($client->email); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.client.fields.status')); ?>

                            </th>
                            <td>
                                <?php echo e(App\Models\Client::STATUS_SELECT[$client->status] ?? ''); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.client.fields.language')); ?>

                            </th>
                            <td>
                                <?php echo e(App\Models\Client::LANGUAGE_SELECT[$client->language] ?? ''); ?>

                            </td>
                        </tr>

                        <tr>
                            <th>
                                <?php echo e(trans('cruds.clientAddress.title')); ?>

                            </th>
                            <td>
                                <?php if($clientAddresses->count() > 0): ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><?php echo e(trans('cruds.clientAddress.fields.name')); ?></th>
                                                <th><?php echo e(trans('cruds.clientAddress.fields.lat')); ?></th>
                                                <th><?php echo e(trans('cruds.clientAddress.fields.lng')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $clientAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($address->name); ?></td>
                                                    <td><?php echo e($address->lat); ?></td>
                                                    <td><?php echo e($address->lng); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <?php echo e(trans('global.no_data_found')); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.order.title')); ?>

                            </th>
                            <td>
                                <?php if($orders->count() > 0): ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th><?php echo e(trans('cruds.order.fields.amount_before_vat')); ?></th>
                                                <th><?php echo e(trans('cruds.order.fields.vat')); ?></th>
                                                <th><?php echo e(trans('cruds.order.fields.discount')); ?></th>
                                                <th><?php echo e(trans('cruds.order.fields.amount_after_vat')); ?></th>
                                                <th><?php echo e(trans('cruds.order.fields.delivery_date')); ?></th>
                                                <th><?php echo e(trans('cruds.order.fields.status')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($order->amount_before_vat); ?></td>
                                                    <td><?php echo e($order->vat); ?></td>
                                                    <td><?php echo e($order->discount); ?></td>
                                                    <td><?php echo e($order->amount_after_vat); ?></td>
                                                    <td><?php echo e($order->delivery_date); ?></td>
                                                    <td><?php echo e($order->status); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <?php echo e(trans('global.no_data_found')); ?>

                                <?php endif; ?>
                            </td>
                        </tr>



                    </tbody>
                </table>



                <div class="form-group">
                    <a class="btn btn-default" href="<?php echo e(route('admin.clients.index')); ?>">
                        <?php echo e(trans('global.back_to_list')); ?>

                    </a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/clients/show.blade.php ENDPATH**/ ?>