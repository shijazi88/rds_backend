<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.box.title')); ?>

        </div>
        


        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="<?php echo e(route('admin.boxes.index')); ?>">
                        <?php echo e(trans('global.back_to_list')); ?>

                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.box.fields.id')); ?>

                            </th>
                            <td>
                                <?php echo e($box->id); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.box.fields.status')); ?>

                            </th>
                            <td>
                                <?php echo e(App\Models\Box::STATUS_SELECT[$box->status] ?? ''); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.box.fields.price')); ?>

                            </th>
                            <td>
                                <?php echo e($box->price); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.box.fields.lat')); ?>

                            </th>
                            <td>
                                <?php echo e($box->lat); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.box.fields.lng')); ?>

                            </th>
                            <td>
                                <?php echo e($box->lng); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.box.fields.expiry_date')); ?>

                            </th>
                            <td>
                                <?php echo e($box->expiry_date); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.box.fields.serial_number')); ?>

                            </th>
                            <td>
                                <?php echo e($box->serial_number); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.box.fields.color')); ?>

                            </th>
                            <td>
                                <?php echo e($box->color); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.box.fields.size')); ?>

                            </th>
                            <td>
                                <?php echo e($box->size); ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="<?php echo e(route('admin.boxes.index')); ?>">
                        <?php echo e(trans('global.back_to_list')); ?>

                    </a>
                </div>

                <?php echo $__env->make('admin.boxes.commands', ['commands' => $commands], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/boxes/show.blade.php ENDPATH**/ ?>