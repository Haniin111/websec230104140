<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
</head>
<body>
    <?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container mt-5">
        <h1>Products</h1>
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-products')): ?>
            <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary mb-3">Add Product</a>
        <?php endif; ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th> <!-- التأكد إن العمود ده موجود -->
                    <th>Action</th> <!-- التأكد إن العمود ده موجود -->
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($product->id); ?></td>
                        <td><?php echo e($product->name); ?></td>
                        <td><?php echo e($product->price); ?></td>
                        <td><?php echo e($product->stock ?? '0'); ?></td> <!-- عرض Stock -->
                        <td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase-products')): ?>
                                <form action="<?php echo e(route('products.purchase', $product->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <input type="number" name="quantity" value="1" min="1" max="<?php echo e($product->stock); ?>" style="width: 60px;">
                                    <button type="submit" class="btn btn-sm btn-success">Buy</button>
                                </form>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-products')): ?>
                                <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-sm btn-primary">Edit</a>
                                <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>
</html><?php /**PATH C:\Users\Mega Store\Downloads\websec-main\WebSecService\resources\views/products/index.blade.php ENDPATH**/ ?>