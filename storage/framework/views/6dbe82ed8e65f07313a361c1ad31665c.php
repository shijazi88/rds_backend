<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.clientAddress.title')); ?>

        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="<?php echo e(route('admin.client-addresses.index')); ?>">
                        <?php echo e(trans('global.back_to_list')); ?>

                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.clientAddress.fields.id')); ?>

                            </th>
                            <td>
                                <?php echo e($clientAddress->id); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.clientAddress.fields.client')); ?>

                            </th>
                            <td>
                                <?php echo e($clientAddress->client->mobile ?? ''); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.clientAddress.fields.lat')); ?>

                            </th>
                            <td>
                                <?php echo e($clientAddress->lat); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.clientAddress.fields.lng')); ?>

                            </th>
                            <td>
                                <?php echo e($clientAddress->lng); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.clientAddress.fields.name')); ?>

                            </th>
                            <td>
                                <?php echo e($clientAddress->name); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="<?php echo e(route('admin.client-addresses.index')); ?>">
                        <?php echo e(trans('global.back_to_list')); ?>

                    </a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/clientAddresses/show.blade.php ENDPATH**/ ?>