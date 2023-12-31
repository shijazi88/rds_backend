<?php $__env->startSection('content'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_create')): ?>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <?php if(Auth::guard('web')->check()): ?>
                    <a class="btn btn-success" href="<?php echo e(route('admin.permissions.create')); ?>">
                        <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.permission.title_singular')); ?>

                    </a>
                <?php elseif(Auth::guard('client_users')->check()): ?>
                    <a class="btn btn-success" href="<?php echo e(route('admin.client-permissions.create')); ?>">
                        <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.permission.title_singular')); ?>

                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('cruds.permission.title_singular')); ?> <?php echo e(trans('global.list')); ?>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Permission"
                    width="100%">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                <?php echo e(trans('cruds.permission.fields.id')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.permission.fields.name')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.permission.fields.guard_name')); ?>

                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($permission->id); ?>">
                                <td>

                                </td>
                                <td>
                                    <?php echo e($permission->id ?? ''); ?>

                                </td>
                                <td>
                                    <?php echo e($permission->name ?? ''); ?>

                                </td>
                                <td>
                                    <?php echo e($permission->guard_name ?? ''); ?>

                                </td>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_show')): ?>
                                        <?php if(Auth::guard('web')->check()): ?>
                                            <a class="btn btn-sm btn-info view-item-btn"
                                                href="<?php echo e(route('admin.permissions.show', $permission->id)); ?>">
                                                <?php echo e(trans('global.view')); ?>

                                            </a>
                                        <?php elseif(Auth::guard('client_users')->check()): ?>
                                            <a class="btn btn-sm btn-info view-item-btn"
                                                href="<?php echo e(route('admin.client-permissions.show', $permission->id)); ?>">
                                                <?php echo e(trans('global.view')); ?>

                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_edit')): ?>
                                        <?php if(Auth::guard('web')->check()): ?>
                                            <a class="btn btn-sm btn-success edit-item-btn"
                                                href="<?php echo e(route('admin.permissions.edit', $permission->id)); ?>">
                                                <?php echo e(trans('global.edit')); ?>

                                            </a>
                                        <?php elseif(Auth::guard('client_users')->check()): ?>
                                            <a class="btn btn-sm btn-success edit-item-btn"
                                                href="<?php echo e(route('admin.client-permissions.edit', $permission->id)); ?>">
                                                <?php echo e(trans('global.edit')); ?>

                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_delete')): ?>
                                        <?php if(Auth::guard('web')->check()): ?>
                                            <form action="<?php echo e(route('admin.permissions.destroy', $permission->id)); ?>"
                                                method="POST" onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                <input type="submit" class="btn btn-sm btn-danger remove-item-btn"
                                                    value="<?php echo e(trans('global.delete')); ?>">
                                            </form>
                                        <?php elseif(Auth::guard('client_users')->check()): ?>
                                            <form action="<?php echo e(route('admin.client-permissions.destroy', $permission->id)); ?>"
                                                method="POST" onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                <input type="submit" class="btn btn-sm btn-danger remove-item-btn"
                                                    value="<?php echo e(trans('global.delete')); ?>">
                                            </form>
                                        <?php endif; ?>
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
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_delete')): ?>
                let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "<?php echo e(route('admin.permissions.massDestroy')); ?>",
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
            let table = $('.datatable-Permission:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/permissions/index.blade.php ENDPATH**/ ?>