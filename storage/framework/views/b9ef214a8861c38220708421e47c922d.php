<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="alert alert-danger text-center">
            <h1>Insufficient Credit</h1>
            <p>Your current credit balance is not enough to complete this transaction.</p>
            <a href="<?php echo e(route('products_list')); ?>" class="btn btn-primary">OK</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\websec-main\WebSecService\resources\views/products/insufficient_credit.blade.php ENDPATH**/ ?>