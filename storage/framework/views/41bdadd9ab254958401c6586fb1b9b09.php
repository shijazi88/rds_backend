    <div class="dropdown">
        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="ri-more-2-fill"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($viewGate)): ?>
                <li>
                    <a href="<?php echo e(route('admin.' . $crudRoutePart . '.show', $row->id)); ?>" class="dropdown-item">
                        <?php echo e(trans('global.view')); ?></a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($editGate)): ?>
                <li>
                    <a class="dropdown-item" href="<?php echo e(route('admin.' . $crudRoutePart . '.edit', $row->id)); ?>">
                        <?php echo e(trans('global.edit')); ?></a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($deleteGate)): ?>
                <li>
                    <form action="<?php echo e(route('admin.' . $crudRoutePart . '.destroy', $row->id)); ?>" method="POST"
                        onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="submit" class="dropdown-item" value="<?php echo e(trans('global.delete')); ?>">
                    </form>
                </li>
            <?php endif; ?>

            <?php if(isset($crudRoutePart) && $crudRoutePart == 'subscriptions'): ?>
                <?php if($row->status == 'active'): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($suspendGate)): ?>
                        <li>
                            <a class="dropdown-item" href="<?php echo e(route('admin.' . $crudRoutePart . '.suspend', $row->id)); ?>">
                                <?php echo e(trans('global.suspend')); ?></a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(isset($crudRoutePart) && $crudRoutePart == 'subscriptions'): ?>
                <?php if($row->status == 'active'): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($upgradeGate)): ?>
                        <li>
                            <a class="dropdown-item" href="<?php echo e(route('admin.' . $crudRoutePart . '.upgrade', $row->id)); ?>">
                                <?php echo e(trans('global.upgrade')); ?></a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(isset($crudRoutePart) && $crudRoutePart == 'subscriptions'): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($cancelGate)): ?>
                    <?php if($row->status == 'active'): ?>
                        <li>
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); if(confirm('<?php echo e(trans('global.confirm_cancel')); ?>')){document.getElementById('cancel-form-<?php echo e($row->id); ?>').submit();}">
                                <?php echo e(trans('global.cancel')); ?>

                            </a>
                            <form id="cancel-form-<?php echo e($row->id); ?>"
                                action="<?php echo e(route('admin.' . $crudRoutePart . '.cancel', $row->id)); ?>" method="POST"
                                style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(isset($crudRoutePart) && $crudRoutePart == 'subscriptions'): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($reactivateGate)): ?>
                    <li>
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); if(confirm('<?php echo e(trans('global.confirm_reactivate')); ?>')){document.getElementById('reactivate-form-<?php echo e($row->id); ?>').submit();}">
                            <?php echo e(trans('global.reactivate')); ?>

                        </a>
                        <form id="reactivate-form-<?php echo e($row->id); ?>"
                            action="<?php echo e(route('admin.' . $crudRoutePart . '.reactivate', $row->id)); ?>" method="POST"
                            style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(isset($crudRoutePart) && $crudRoutePart == 'branches'): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($copyGate)): ?>
                    <li>
                        <a class="dropdown-item" href="<?php echo e(route('admin.' . $crudRoutePart . '.copy', $row->id)); ?>">
                            <?php echo e(trans('global.copy')); ?></a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(isset($crudRoutePart) && $crudRoutePart == 'class-schedules'): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($copyGate)): ?>
                    <li>
                        <a class="dropdown-item" href="<?php echo e(route('admin.' . $crudRoutePart . '.copy', $row->id)); ?>">
                            <?php echo e(trans('global.copy')); ?></a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(isset($crudRoutePart) && $crudRoutePart == 'member-transactions'): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($paymentsGate)): ?>
                    <li>
                        <a class="dropdown-item" href="<?php echo e(route('admin.' . $crudRoutePart . '.payments', $row->id)); ?>">
                            <?php echo e(trans('cruds.memberPayment.label')); ?></a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(isset($crudRoutePart) && $crudRoutePart == 'member-transactions'): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($tapGate)): ?>
                    <li>
                        <a class="dropdown-item" href="<?php echo e(route('admin.' . $crudRoutePart . '.tap', $row->id)); ?>">
                            <?php echo e(trans('cruds.tapTransaction.title')); ?></a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
    </div>
<?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/partials/datatablesActions.blade.php ENDPATH**/ ?>