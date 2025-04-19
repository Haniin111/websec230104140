<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
</head>
<body>
    <?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <h1 class="mt-5">Your Profile</h1>
        <div class="card">
            <div class="card-body">
               <p>Hello</p>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\websec-main\WebSecService\resources\views/welcome.blade.php ENDPATH**/ ?>