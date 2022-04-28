

<?php $__env->startSection('title'); ?>
<?php echo e('Edit Customer'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                  

        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo e('Edit Customer'); ?></h6>
                </div>
                <div class="card-body">
                 <form method="post" action="<?php echo e(route('customer.update')); ?>">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label"><?php echo e(__('sentence.Full Name')); ?><font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" name="fullname" value="<?php echo e($customer->fullname); ?>">
                        <input type="hidden" class="form-control" id="inputEmail3" name="id" value="<?php echo e($customer->id); ?>">
                        <?php echo e(csrf_field()); ?>

                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">E-mail<font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputPassword3" name="email" value="<?php echo e($customer->email); ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"><?php echo e(__('sentence.Phone')); ?></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPassword3" name="phone" value="<?php echo e($customer->phone); ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"><?php echo e(__('sentence.Address')); ?></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPassword3" name="address" value="<?php echo e($customer->address); ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Group<font color="red">*</font></label>
                      <div class="col-sm-9">
                        <select name="group_id" class="form-control" id="inputPassword3" required>
                          <option disabled selected>~ Select a group ~</option>
                          <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($group->id === $customer->group_id): ?>
                              <option selected value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                              <?php continue; ?>  
                            <?php endif; ?>
                            <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">GST Number</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPassword3" name="gst_number" value="<?php echo e($customer->gst_number); ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Opening Balance</label>
                      <div class="col-sm-4">
                        <input type="number" class="form-control" id="inputPassword3" name="opening_balance" value="<?php echo e($customer->opening_balance); ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">As of Date</label>
                      <div class="col-sm-4">
                        <input type="date" class="form-control" id="inputPassword3" name="as_of_date" value="<?php echo e($customer->as_of_date); ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-1">
                        <input type="radio" class="form-control create-customer-radio" id="inputPassword3" name="to_receive" checked="<?php echo e($customer->to_receive ? 1 : 0); ?>">
                      </div>
                      <label for="inputPassword3" class="col-sm-2 col-form-label">To receive</label>

                      <div class="col-sm-1">
                        <input type="radio" class="form-control create-customer-radio" id="inputPassword3" name="to_pay" checked="<?php echo e($customer->to_pay  ? 1 : 0); ?>">
                      </div>
                      <label for="inputPassword3" class="col-sm-2 col-form-label">To pay</label>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary"><?php echo e(__('sentence.Save')); ?></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pms\resources\views/customer/edit.blade.php ENDPATH**/ ?>