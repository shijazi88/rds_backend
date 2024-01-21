<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>

<div class="row">
    <?php $__currentLoopData = $commands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $command): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($command['label']); ?></h5>
                    <p class="card-text">
                        <strong>Command:</strong> <?php echo e($command['slug']); ?><br>
                        <strong>Example:</strong> <?php echo e($command['example']); ?><br>
                        <strong>Explanation:</strong> <?php echo e($command['explanation']); ?>

                    </p>
                    <form method="POST" action="<?php echo e(route('admin.boxes.send-command', [$box, $command['slug']])); ?>">
                        <?php echo csrf_field(); ?>
                        <?php if($command['slug'] === 'pass-code-unlock'): ?>
                            <div class="form-group">
                                <label for="pass_code">Enter Pass Code:</label>
                                <input type="number" name="pass_code" id="pass_code" class="form-control" required>
                            </div>
                        <?php endif; ?>

                        <button type="submit" class="btn btn-primary mt-2">Send Command</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /Users/shijazi/Documents/mywork/rds/default/resources/views/admin/boxes/commands.blade.php ENDPATH**/ ?>