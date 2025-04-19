<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row mt-2">
        <div class="col col-10">
            <h1>Users</h1>
        </div>
    </div>
    <form>
        <div class="row">
            <div class="col col-sm-2">
                <input name="keywords" type="text" class="form-control" placeholder="Search Keywords"
                    value="<?php echo e(request()->keywords); ?>" />
            </div>
            <div class="col col-sm-1">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col col-sm-1">
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>
    </form>

    <div class="card mt-2">
        <div class="card-body">
            <table class="table">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users')): ?>
                    <a href="<?php echo e(route('users.create')); ?>" class="btn btn-success mb-4">Create New User</a>
                <?php endif; ?>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_customer')): ?>
                            <th scope="col">Credit</th>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_users' && 'delete_users')): ?>
                            <th scope="col">Actions</th>
                            <th scope="col">Actions</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td scope="col"><?php echo e($user->id); ?></td>
        <td scope="col"><?php echo e($user->name); ?></td>
        <td scope="col"><?php echo e($user->email); ?></td>
        <td scope="col">
            <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="badge bg-primary"><?php echo e($role->name); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_customer')): ?>
            <td scope="col">
                <form action="<?php echo e(route('update.credit')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="number" name="credit" class="form-control" value="<?php echo e($user->credit); ?>"
                        min="<?php echo e($user->credit); ?>">
                    <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                </form>
            </td>
        <?php endif; ?>
        <td scope="col">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_users')): ?>
                <a class="btn btn-primary" href="<?php echo e(route('users_edit', [$user->id])); ?>">Edit</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users')): ?>
                <a class="btn btn-primary" href="<?php echo e(route('edit_password', [$user->id])); ?>">Change Password</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_users')): ?>
                <a class="btn btn-danger" href="<?php echo e(route('users_delete', [$user->id])); ?>">Delete</a>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\websec-main\WebSecService\resources\views/users/list.blade.php ENDPATH**/ ?>