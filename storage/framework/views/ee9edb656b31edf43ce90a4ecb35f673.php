<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Bought Products</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Purchased At</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($purchase->product->name); ?></td>
                        <td><?php echo e($purchase->quantity); ?></td>
                        <td><?php echo e($purchase->total_price); ?></td>
                        <td><?php echo e($purchase->purchased_at); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\websec-main\WebSecService\resources\views/products/bought_products_list.blade.php ENDPATH**/ ?>