<?php $__env->startSection('title'); ?>
<?php echo e('All Orders'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
   <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </ul>
</div>
<?php endif; ?>
<?php if(session('success')): ?>
<div class="alert alert-success">
   <?php echo e(session('success')); ?>

</div>
<?php endif; ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <div class="row">
         <div class="col-8">
            <h6 class="m-0 font-weight-bold text-primary w-75 p-2"><?php echo e('All Orders'); ?></h6>
         </div>
         <div class="col-4">
            <a href="<?php echo e(route('order.create')); ?>" class="btn btn-primary float-right"><i class="fa fa-plus"></i> <?php echo e('New Order'); ?></a>
         </div>
      </div>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>Id</th>
                  <th class="text-center"><?php echo e('Customer'); ?></th>
                  <th class="text-center"><?php echo e('Product'); ?></th>
                  <th class="text-center"><?php echo e('Quantity'); ?></th>
                  <th class="text-center"><?php echo e('Status'); ?></th>
                  <th class="text-center"><?php echo e('Actions'); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                  <td><?php echo e($order->id); ?></td>
                  <td><a href="<?php echo e(url('customer/show/'.$order->customer_id)); ?>"> <?php echo e($order->customer_name); ?> </a></td>
                  <td><a href="<?php echo e(url('product/show/'.$order->product_id)); ?>"> <?php echo e($order->product_name); ?> </a></td>
                  <td><?php echo e($order->quantity); ?></td>
                  <td><?php echo e($order->status); ?></td>
                  <td class="text-center">
                     <a href="<?php echo e(url('order/delete/'.$order->id)); ?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                  </td>
               </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\ganesh-store\resources\views/order/index.blade.php ENDPATH**/ ?>