
<?php $__env->startSection('title'); ?>
<?php echo e('New Pricing'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<form method="post" action="<?php echo e(route('pricing.store')); ?>">
   <div class="row">
      <div class="col">
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
      </div>
   </div>
   <div class="row justify-content-center">
      <div class="col-md-4">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Select Customer</h6>
            </div>
            <div class="card-body">
               <div class="form-group text-center">
                  <img src="<?php echo e(asset('img/patient-icon.png')); ?>" class="img-profile rounded-circle img-fluid">
               </div>
               <div class="form-group">
                  <select class="form-control select2 select2-hidden-accessible" id="drug" tabindex="-1" name="customer_id" aria-hidden="true">
                     <option disabled selected>~ Select a Customer ~</option>
                     <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->fullname); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php echo e(csrf_field()); ?>

               </div>
               
               <div class="form-group">
                  <input type="submit" value="Submit" class="btn btn-warning" align="center">
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-8">
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Pricing List</h6>
            </div>
            <div class="card-body">
               <fieldset class="test_labels">
                  <div class="repeatable"></div>
                  <div class="form-group">
                     <a type="button" class="btn btn-success add text-white" align="center"><i class='fa fa-plus'></i> Add Pricing</a>
                  </div>
               </fieldset>
            </div>
         </div>
      </div>
   </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script type="text/template" id="test_labels">
   <section>
      <div class="row">
         <div class="col-md-6">
            <select class="form-control select2 select2-hidden-accessible" name="product_id[]" id="test" tabindex="-1" aria-hidden="true">
               <option disabled selected>~ Select a Product ~</option>
               <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
         </div>
         
         <div class="col-md-6">
            <div class="form-group-custom">
                  <input type="text" id="strength" name="price[]"  class="form-control" placeholder="Price">
            </div>
         </div>
      </div>
   </section>
   <hr color="#a1f1d4">
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\ganesh-store\resources\views/pricing/create.blade.php ENDPATH**/ ?>