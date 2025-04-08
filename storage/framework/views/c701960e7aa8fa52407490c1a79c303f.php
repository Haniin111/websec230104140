<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
</head>
<body>
    <?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <h1 class="mt-5">Login</h1>
        <form action="<?php echo e(route('do_login')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo e($error); ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="form-group mb-2">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" placeholder="email" name="email" value="<?php echo e(old('email')); ?>" required>
            </div>
            <div class="form-group mb-2">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" placeholder="password" name="password" required>
            </div>
            <div class="form-group mb-2">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\websec-main\WebSecService\resources\views/users/login.blade.php ENDPATH**/ ?>