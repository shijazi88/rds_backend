<?php $__env->startSection('content'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_create')): ?>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="<?php echo e(route('admin.orders.create')); ?>">
                    <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.order.title_singular')); ?>

                </a>
            </div>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('cruds.order.title_singular')); ?> <?php echo e(trans('global.list')); ?>

        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Order w-100">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.id')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.client')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.box')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.driver')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.amount_before_vat')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.vat')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.discount')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.amount_after_vat')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.delivery_date')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.status')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.address')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.clientAddress.fields.name')); ?>

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
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_delete')): ?>
                let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>';
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "<?php echo e(route('admin.orders.massDestroy')); ?>",
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
                ajax: "<?php echo e(route('admin.orders.index')); ?>",
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'client_mobile',
                        name: 'client.mobile'
                    },
                    {
                        data: 'box_status',
                        name: 'box.status'
                    },
                    {
                        data: 'driver_name',
                        name: 'driver.name'
                    },
                    {
                        data: 'amount_before_vat',
                        name: 'amount_before_vat'
                    },
                    {
                        data: 'vat',
                        name: 'vat'
                    },
                    {
                        data: 'discount',
                        name: 'discount'
                    },
                    {
                        data: 'amount_after_vat',
                        name: 'amount_after_vat'
                    },
                    {
                        data: 'delivery_date',
                        name: 'delivery_date'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'address_name',
                        name: 'address.name'
                    },
                    {
                        data: 'address.name',
                        name: 'address.name'
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
            let table = $('.datatable-Order').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/orders/index.blade.php ENDPATH**/ ?>