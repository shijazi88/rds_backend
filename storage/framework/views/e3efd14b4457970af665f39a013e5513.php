<?php $__env->startSection('content'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_create')): ?>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="<?php echo e(route('admin.users.create')); ?>">
                    <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.user.title_singular')); ?>

                </a>
            </div>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('cruds.user.title_singular')); ?> <?php echo e(trans('global.list')); ?>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User" width="100%">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                <?php echo e(trans('cruds.user.fields.id')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.user.fields.name')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.user.fields.email')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.user.fields.email_verified_at')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.user.fields.roles')); ?>

                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($user->id); ?>">
                                <td>

                                </td>
                                <td>
                                    <?php echo e($user->id ?? ''); ?>

                                </td>
                                <td>
                                    <?php echo e($user->name ?? ''); ?>

                                </td>
                                <td>
                                    <?php echo e($user->email ?? ''); ?>

                                </td>
                                <td>
                                    <?php echo e($user->email_verified_at ?? ''); ?>

                                </td>
                                <td>
                                    <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge badge-info" style='color:black'><?php echo e($item->name); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_show')): ?>
                                        <a class="btn btn-sm btn-info view-item-btn"
                                            href="<?php echo e(route('admin.users.show', $user->id)); ?>">
                                            <?php echo e(trans('global.view')); ?>

                                        </a>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_edit')): ?>
                                        <a class="btn btn-sm btn-success edit-item-btn"
                                            href="<?php echo e(route('admin.users.edit', $user->id)); ?>">
                                            <?php echo e(trans('global.edit')); ?>

                                        </a>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_delete')): ?>
                                        <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" method="POST"
                                            onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                            <input type="submit" class="btn btn-sm btn-danger remove-item-btn"
                                                value="<?php echo e(trans('global.delete')); ?>">
                                        </form>
                                    <?php endif; ?>

                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_delete')): ?>
                let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "<?php echo e(route('admin.users.massDestroy')); ?>",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('<?php echo e(trans('global.datatables.zero_selected')); ?>')

                            return
                        }

                        if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                // dtButtons.push(deleteButton)
            <?php endif; ?>

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-User:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/users/index.blade.php ENDPATH**/ ?>