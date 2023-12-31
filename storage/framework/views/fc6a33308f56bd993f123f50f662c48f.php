<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.driver.title')); ?>

        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="<?php echo e(route('admin.drivers.index')); ?>">
                        <?php echo e(trans('global.back_to_list')); ?>

                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.driver.fields.id')); ?>

                            </th>
                            <td>
                                <?php echo e($driver->id); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.driver.fields.name')); ?>

                            </th>
                            <td>
                                <?php echo e($driver->name); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.driver.fields.password')); ?>

                            </th>
                            <td>
                                ********
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.driver.fields.status')); ?>

                            </th>
                            <td>
                                <?php echo e(App\Models\Driver::STATUS_SELECT[$driver->status] ?? ''); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.driver.fields.mobile')); ?>

                            </th>
                            <td>
                                <?php echo e($driver->mobile); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.driver.fields.email')); ?>

                            </th>
                            <td>
                                <?php echo e($driver->email); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.driver.fields.language')); ?>

                            </th>
                            <td>
                                <?php echo e(App\Models\Driver::LANGUAGE_SELECT[$driver->language] ?? ''); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.driver.fields.lat')); ?>

                            </th>
                            <td>
                                <?php echo e($driver->lat); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.driver.fields.lng')); ?>

                            </th>
                            <td>
                                <?php echo e($driver->lng); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="<?php echo e(route('admin.drivers.index')); ?>">
                        <?php echo e(trans('global.back_to_list')); ?>

                    </a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/drivers/show.blade.php ENDPATH**/ ?>