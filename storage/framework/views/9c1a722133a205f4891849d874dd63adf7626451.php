<?php $__env->startSection('content'); ?>
<!-- <?php if($errors->any()): ?>
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
<?php endif; ?> -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <div class="row">
         <div class="col-8">
            <h6 class="m-0 font-weight-bold text-primary w-75 p-2"> Report Generation </h6>
         </div>
      </div>
   </div>
   <div class="card-body">
      
      <div class="card mb-3">
         <div class="card-header">
            <div class="row">
               <div class="col-9">
                  <h6 class="m-0 font-weight-bold text-primary">Filters</h6>
               </div>
            </div>
         </div>

         <div class="card-body">
            <form method="post" action="">
               <div class="row">
               
                  <div class="col-2">
                     <select name="year" class="form-control">
                        <option selected disabled>~ Select a year ~</option>
                        
                        <!-- <?php if(isset($year)): ?>
                           <option selected value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
                        <?php endif; ?>

                        <?php for($i = date('Y') - 10; $i <= date('Y'); $i++): ?>
                           <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                        <?php endfor; ?> -->
                     </select>
                     <?php echo e(csrf_field()); ?>

                  </div>
   
                  <div class="col-2">
                     <select name="month" class="form-control">
                        <option selected disabled>~ Select a month ~</option>
                        
                        <!-- <?php if(isset($month)): ?>
                           <option selected value="<?php echo e($month); ?>"><?php echo e(date('F', mktime(0, 0, 0, $month, 10))); ?></option>
                        <?php endif; ?> -->
                        
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                     </select>
                  </div>
                  
                  <div class="col-2">
                     <select name="date" class="form-control">
                        <option selected disabled>~ Select a date ~</option>
                        <!-- <?php if(isset($date)): ?>
                           <option selected value="<?php echo e($date); ?>"><?php echo e($date); ?></option>
                        <?php endif; ?>
                        
                        <?php for($i = 1; $i <= 31; $i++): ?>
                           <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                        <?php endfor; ?> -->
                     </select>
                  </div>

                  <div class="col-1">
                     <button type="submit" class="form-control btn btn-sm btn-primary">
                        Search
                     </button>
                  </div>
                  <div class="col-1">
                     <a class="form-control btn btn-sm btn-danger" href="#">
                        Reset
                     </a>
                  </div>
                  
               </div>
            </form>
         </div>
      </div>

      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>#</th>
                  <th><?php echo e(__('sentence.Doctor')); ?></th>
                  <th><?php echo e(__('sentence.Total Patients')); ?></th>
                  <th><?php echo e(__('sentence.Total Xrays')); ?></th>
                  <th><?php echo e(__('sentence.Total Sonography')); ?></th>
                  <th><?php echo e(__('sentence.Total Blood Tests')); ?></th>
                  <th><?php echo e(__('sentence.Total Amount')); ?></th>
                  <th class="text-center"><?php echo e(__('sentence.Actions')); ?></th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $no = 0;
               ?>
               
               <!-- <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> -->
               <tr>
                  <td><?php echo e(++$no); ?></td>
                  <td><a href="<?php echo e(url('doctor/view/'.$doctor->id)); ?>"> <?php echo e($doctor->name); ?> </a></td>
                  <td><?php echo e($doctor->patient_count); ?></td>
                  <td><?php echo e($doctor->xray_count); ?></td>
                  <td><?php echo e($doctor->sonography_count); ?></td>
                  <td><?php echo e($doctor->blood_test_count); ?></td>
                  <td><?php echo e(App\Setting::get_option('currency')); ?> <?php echo e($doctor->total_amount); ?></td>
                  <td class="text-center">
                     <a href="<?php echo e(url('reports/pdf/'.$doctor->id)); ?>" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-print"></i></a>
                  </td>
               </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pms\resources\views/settings/prescription_settings.blade.php ENDPATH**/ ?>