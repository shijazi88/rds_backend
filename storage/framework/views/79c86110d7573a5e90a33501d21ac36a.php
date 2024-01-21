<?php $__env->startSection('content'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('box_create')): ?>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="<?php echo e(route('admin.boxes.create')); ?>">
                    <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.box.title_singular')); ?>

                </a>
            </div>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('cruds.box.title_singular')); ?> <?php echo e(trans('global.list')); ?>

        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Box w-100">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            <?php echo e(trans('cruds.box.fields.id')); ?>

                        </th>

                        <th>
                            <?php echo e(trans('cruds.box.fields.serial_number')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.box.fields.price')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.box.fields.color')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.box.fields.size')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.box.fields.lat')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.box.fields.lng')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.box.fields.status')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.box.fields.expiry_date')); ?>

                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('box_delete')): ?>
                let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>';
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "<?php echo e(route('admin.boxes.massDestroy')); ?>",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).data(), function(entry) {
                            return entry.id
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

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "<?php echo e(route('admin.boxes.index')); ?>",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },

                    {
                        data: 'serial_number',
                        name: 'serial_number'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'color',
                        name: 'color'
                    },
                    {
                        data: 'size',
                        name: 'size'
                    },
                    {
                        data: 'lat',
                        name: 'lat'
                    },
                    {
                        data: 'lng',
                        name: 'lng'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'expiry_date',
                        name: 'expiry_date'
                    },
                    {
                        data: 'actions',
                        name: '<?php echo e(trans('global.actions')); ?>'
                    }
                ],
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            };
            let table = $('.datatable-Box').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/boxes/index.blade.php ENDPATH**/ ?>