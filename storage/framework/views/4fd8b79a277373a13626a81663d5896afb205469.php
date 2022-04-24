

<?php $__env->startSection('title'); ?>
<?php echo e(__('sentence.New Patient')); ?>

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
                  <h6 class="m-0 font-weight-bold text-primary">New Customer</h6>
                </div>
                <div class="card-body">
                 <form method="post" action="<?php echo e(route('patient.create')); ?>">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label"><?php echo e(__('sentence.Full Name')); ?><font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" name="name">
                        <?php echo e(csrf_field()); ?>

                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">E-mail</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputPassword3" name="email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"><?php echo e(__('sentence.Phone')); ?><font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="inputPassword3" name="phone">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label"><?php echo e(__('sentence.Address')); ?><font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPassword3" name="adress">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Group<font color="red">*</font></label>
                      <div class="col-sm-9">
                        <!-- <input type="select" class="form-control" id="inputPassword3" name="group"> -->
                        <select name="group" class="form-control" id="inputPassword3">
                          <option value=""> Select</option>
                          <option value="mora"> Mora</option>
                          <option value="uran"> Uran</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">GST Number</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPassword3" name="gstnumber">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Opening Balance</label>
                      <div class="col-sm-4">
                        <input type="number" class="form-control" id="inputPassword3" name="openingbalance">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">As of Date</label>
                      <div class="col-sm-4">
                        <input type="date" class="form-control" id="inputPassword3" name="asofdate">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-1">
                        <input type="radio" class="form-control create-customer-radio" id="inputPassword3" name="torecieve">
                      </div>
                      <label for="inputPassword3" class="col-sm-2 col-form-label">To recieve</label>

                      <div class="col-sm-1">
                        <input type="radio" class="form-control create-customer-radio" id="inputPassword3" name="topay">
                      </div>
                      <label for="inputPassword3" class="col-sm-2 col-form-label">To pay</label>
                    </div>
                    <div class="form-group row">
                      <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Add Customer</button>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\ganesh-store\resources\views/patient/create.blade.php ENDPATH**/ ?>