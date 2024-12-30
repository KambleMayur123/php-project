
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.edit-user'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>





<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">User Details</h4>
            </div><!-- end card header -->

            <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <input type="text" id="state" name="state" class="form-control" value="<?php echo e($user->state); ?>" readonly />
                        </div>
                        <div class="col-md-4">
                            <label for="district" class="form-label">District</label>
                            <input type="text" id="district" name="district" class="form-control" value="<?php echo e($user->district); ?>" readonly />
                        </div>
                        <div class="col-md-4">
                            <label for="organisation" class="form-label">Select Organisation</label>
                            <input type="text" id="organisation" name="organisation" class="form-control" value="<?php echo e($user->org_name); ?>" readonly />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="department_name" class="form-label">Select Department</label>
                            <input type="text" id="department_name" name="department_name" class="form-control" value="<?php echo e($user->name); ?>" readonly />
                        </div>
                        <div class="col-md-4">
                            <label for="taluka" class="form-label">Taluka</label>
                            <input type="text" id="taluka" name="taluka" class="form-control" value="<?php echo e($user->taluka); ?>" readonly />
                        </div>
                        <div class="col-md-4">
                            <label for="designation" class="form-label">Select Designation</label>
                            <input type="text" id="designation" name="designation" class="form-control" value="<?php echo e($user->designation_name); ?>" readonly />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo e($user->first_name); ?>" readonly />
                        </div>
                        <div class="col-md-4">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" id="middle_name" name="middle_name" class="form-control" value="<?php echo e($user->middle_name); ?>" readonly />
                        </div>
                        <div class="col-md-4">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo e($user->last_name); ?>" readonly />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo e($user->email); ?>" readonly />
                    </div>

                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="tel" id="contact" name="contact" class="form-control" value="<?php echo e($user->number); ?>" readonly />
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" name="address" class="form-control" value="<?php echo e($user->address); ?>" readonly />
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?php echo e($user->username); ?>" readonly />
                    </div>

                    <div class="mb-3">
                        <label for="profile_pic" class="form-label">Profile Picture</label>
                        <?php if($user->profile_pic): ?>
                            <div class="mb-2">
                                <img src="<?php echo e(asset('images/' . $user->profile_pic)); ?>" alt="Profile Picture" width="100">
                                <p>Current Profile Picture</p>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mt-2">
                        <div style="display: flex; justify-content: flex-end; gap: 10px;">
        <button class="btn btn-primary" onclick="window.location.href='<?php echo e(route('organization.index')); ?>'">Back</button>
                        </div>
                    </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->






<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
   <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>

    <!-- listjs init -->
    <script src="<?php echo e(URL::asset('build/js/pages/listjs.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="<?php echo e(URL::asset('build/js/pages/select2.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/organization-login/show.blade.php ENDPATH**/ ?>