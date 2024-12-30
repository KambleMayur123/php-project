
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
      <?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

$userId = Auth::id();

$user = DB::table('users')
    ->join('designations', 'users.design_id', '=', 'designations.id')
    ->join('departments', 'users.depart_id', '=', 'departments.id')
    ->join('organizations', 'users.org_id', '=', 'organizations.id')
    ->select('users.*', 
             'designations.designation_name', 
             'departments.name as department_name', 
             'organizations.org_name as organisation_name')
    ->where('users.id', $userId)
    ->first();
?>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Add User Details</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <form class="leave-form" autocomplete="off" action="<?php echo e(route('updateuserdetails')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <!-- State, District, Taluka -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <select id="state" name="state" class="form-control" >
                                <option value="">Select State</option>
                                <?php $__currentLoopData = $statesData['states']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($state['state']); ?>" <?php echo e($user->state === $state['state'] ? 'selected' : ''); ?>>
                    <?php echo e($state['state']); ?>

                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4">
                            <label for="district" class="form-label">District</label>
                            <select id="district" name="district" class="form-control" >
                                <option value="">Select District</option>
                                <!-- Districts will be loaded here -->
                            </select>
                            <?php $__errorArgs = ['district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        
                                                  <div class="col-md-4">
                            <label for="organisation" class="form-label">select organisation</label>
                            <select id="organisation" name="organisation" class="form-select mb-3" >
                                <option value="">Select organization</option>
                            </select>
                             <?php $__errorArgs = ['organisation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                      

                                           </div>
                                           
                                           
                                           
                                           
                                <div class="row">
    <div class="col-md-4">
        <label for="department_name" class="form-label">Select Department</label>
        <select name="department_name" id="department_name" class="form-select mb-3">
            <option value="">-- Select Department --</option>
        </select>
        <?php $__errorArgs = ['department_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="col-md-4">
        <label for="taluka-field" class="form-label">Taluka</label>
        <select id="taluka-field" name="taluka" class="form-select mb-3">
            <option value="">Select Taluka</option>
            <!-- Talukas will be loaded here -->
        </select>
        <?php $__errorArgs = ['taluka'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="col-md-4">
        <label for="designation" class="form-label">Select Designation</label>
        <select name="designation" id="designation" class="form-select mb-3">
            <option value="">-- Select Designation --</option>
        </select>
        <?php $__errorArgs = ['designation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div> <!-- Closing row div -->


                    <!-- Profile Name, Caste -->
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Profile Name</label>
<select id="name" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onchange="checkGenderAndAlert()">
                                <option value="">Select Profile Name</option>
                            </select>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="caste-field" class="form-label">Caste</label>
                            <input type="text" id="caste-field" name="caste" class="form-control <?php $__errorArgs = ['caste'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Caste" value="<?php echo e(old('caste')); ?>" />
                            <?php $__errorArgs = ['caste'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    
                    
                      <div class="form-group">
    <label>Gender</label><br>
    <label>
        <input type="radio" name="gender" value="male" id="gender_male" onclick="toggleMarriageFields(true)"> Male
    </label>
    <label>
        <input type="radio" name="gender" value="female"id="gender_female" onclick="toggleMarriageFields(true)"> Female
    </label>

    <!-- Error message for gender field -->
    <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-danger"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>


    <!-- Marriage fields, hidden by default -->
    <div id="marriage-fields" style="display: none; ">
        <!-- Before Marriage -->
        
                    <div class="row mt-4" >

                <h5>Changed Name</h5>
                 <div class="col-md-4">

                <div class="form-group">
                    <label for="after_mar_first_name">First Name</label>
                    <input type="text" class="form-control" name="after_mar_first_name" id="afvar initialName = '<?php echo e(old('user_id', '' )); ?>'; 
ter_mar_first_name" placeholder=" First Name">
                </div>
                </div>
                                            <div class="col-md-4">

                <div class="form-group">
                    <label for="after_mar_mid_name">Middle Name</label>
                    <input type="text" class="form-control" name="after_mar_mid_name" id="after_mar_mid_name" placeholder=" Middle Name">
                </div>
                </div>
                                                            <div class="col-md-4">

                <div class="form-group">
                    <label for="after_mar_last_name">Last Name</label>
                    <input type="text" class="form-control" name="after_mar_last_name" id="after_mar_last_name" placeholder=" Last Name">
                </div>
                
                </div>
            
        </div>
    </div>


                    
                    
                    

                    <!-- Address A, Address B -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="address-field" class="form-label">Address A<span 
             
            data-bs-toggle="tooltip" 
            data-bs-placement="top" 
            title="Current Address.">
            <i class="mdi mdi-information-variant-circle" style="font-size: 1.2rem;"></i>
        </span></label>
                            <input type="text" id="address" name="address" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Address A" value="<?php echo e(old('address')); ?>" />
                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-6">
                            <label for="address_B-field" class="form-label">Address B<span 
             
            data-bs-toggle="tooltip" 
            data-bs-placement="top" 
            title="You Declared Swagram and Address">
            <i class="mdi mdi-information-variant-circle" style="font-size: 1.2rem;"></i>
        </span></label>
                            <input type="text" id="address_B-field" name="address_B" class="form-control <?php $__errorArgs = ['address_B'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Address B" value="<?php echo e(old('address_B')); ?>" />
                            <?php $__errorArgs = ['address_B'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <!-- Father's Name and Address -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="father-name-field" class="form-label">Father's Name</label>
                            <input type="text" id="father-name-field" name="father_name" class="form-control <?php $__errorArgs = ['father_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Father's Name" value="<?php echo e(old('father_name')); ?>" />
                            <?php $__errorArgs = ['father_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-6">
                            <label for="father-address-field" class="form-label">Father's Address</label>
                            <input type="text" id="father-address-field" name="father_address" class="form-control <?php $__errorArgs = ['father_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Father's Address" value="<?php echo e(old('father_address')); ?>" />
                            <?php $__errorArgs = ['father_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <!-- Birth Date, Birth Text, Height, Birth Mark -->
                    <div class="row mb-3">
                      <div class="col-md-3">
                        <label for="birth_date" class="form-label">Birth Date</label>
                        <input type="text" id="birth_date" name="birth_date" data-provider="flatpickr" data-date-format="d M, Y" class="form-control <?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('birth_date')); ?>" />
                        <?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-md-3">
                        <label for="birth-text-field" class="form-label">Birth Date in Text</label>
    <input type="text" id="birth-text-field" readonly class="form-control mt-2" placeholder="Date in words will appear here" />
                        <?php $__errorArgs = ['birth_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                        <div class="col-md-3">
                            <label for="height-field" class="form-label">Height</label>
                            <input type="text" id="height-field" name="height" class="form-control <?php $__errorArgs = ['height'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="e.g., 5 feet 4 inches" value="<?php echo e(old('height')); ?>" />
                            <?php $__errorArgs = ['height'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-3">
                            <label for="birth-mark-field" class="form-label">Birth Mark</label>
                            <input type="text" id="birth-mark-field" name="birth_mark" class="form-control <?php $__errorArgs = ['birth_mark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Birth Mark" value="<?php echo e(old('birth_mark')); ?>" />
                            <?php $__errorArgs = ['birth_mark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <!-- Qualification, Another Qualification -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="qualification-field" class="form-label">Joining Time Education Qualification</label>
                            <input type="text" id="qualification-field" name="qualification" class="form-control <?php $__errorArgs = ['qualification'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Qualification at Joining" value="<?php echo e(old('qualification')); ?>" />
                            <?php $__errorArgs = ['qualification'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-3">
                            <label for="another-qualification-field" class="form-label">After Joining Education Qualification</label>
                            <input type="text" id="another-qualification-field" name="another_qualification" class="form-control <?php $__errorArgs = ['another_qualification'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Qualification After Joining" value="<?php echo e(old('another_qualification')); ?>" />
                            <?php $__errorArgs = ['another_qualification'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                       <div class="col-md-3">
    <label for="joining_date" class="form-label">Joining Date</label>
    <input type="text" id="joining_date" name="joining_date" 
           data-provider="flatpickr" data-date-format="d M, Y" 
           class="form-control <?php $__errorArgs = ['joining_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
           value="<?php echo e(old('joining_date')); ?>"/>
    <?php $__errorArgs = ['joining_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<input type="hidden" id="formatted_joining_date" name="formatted_joining_date" />



                          <div class="col-md-3">
                            <label for="another-qualification-field" class="form-label">Joining  Starting Salary</label>
                            <input type="number" id="joining_start_salary" name="joining_start_salary" placeholder="Joining Starting Salary" class="form-control <?php $__errorArgs = ['joining_start_salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('joining_start_salary')); ?>"/>
                            <?php $__errorArgs = ['joining_start_salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <!-- Digital Signature and Verification -->
<!--                  <div class="row mb-3">-->
<!--    <div class="col-md-12">-->
<!--        <label for="digital-sig-field" class="form-label">Digital Signature User with Date</label>-->
<!--        <input type="file" id="digital-sig-field" name="digital_sig" class="form-control <?php $__errorArgs = ['digital_sig'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />-->
<!--        <?php $__errorArgs = ['digital_sig'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
<!--            <div class="invalid-feedback text-red"><?php echo e($message); ?></div>-->
<!--        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
<!--        <img id="digital-sig-preview" src="" alt="Digital Signature Preview" style="display: none; max-width: 200px; margin-top: 10px;" />-->
<!--    </div>-->
<!--</div>-->

<!--<div class="row mb-3">-->
<!--    <div class="col-md-12">-->
<!--        <label for="digital-sig-verify-field" class="form-label">Digital Signature Verify By</label>-->
<!--        <input type="file" id="digital-sig-verify-field" name="digital_sig_verify" class="form-control <?php $__errorArgs = ['digital_sig_verify'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />-->
<!--        <?php $__errorArgs = ['digital_sig_verify'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
<!--            <div class="invalid-feedback text-red"><?php echo e($message); ?></div>-->
<!--        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
<!--        <img id="digital-sig-verify-preview" src="" alt="Digital Signature Verify Preview" style="display: none; max-width: 200px; margin-top: 10px;" />-->
<!--    </div>-->
<!--</div>-->

<!--<div class="row mb-3">-->
<!--    <div class="col-md-12">-->
<!--        <label for="post-name-field" class="form-label">Last Information Check by Date and Post Name</label>-->
<!--        <input type="file" id="post-name-field" name="post_name" class="form-control <?php $__errorArgs = ['post_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />-->
<!--        <?php $__errorArgs = ['post_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
<!--            <div class="invalid-feedback text-red"><?php echo e($message); ?></div>-->
<!--        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
<!--        <img id="post-name-preview" src="" alt="Post Name Preview" style="display: none; max-width: 200px; margin-top: 10px;" />-->
<!--    </div>-->
<!--</div>-->
  
                      <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="certificate-no-field" class="form-label">Medical Certificate Number</label>
                            <input type="text" id="certificate-no-field" name="certificate_no" class="form-control <?php $__errorArgs = ['certificate_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Medical Certificate Number" value="<?php echo e(old('certificate_no')); ?>" />
                            <?php $__errorArgs = ['certificate_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>



                    <!-- Submit and Cancel Buttons -->
                    
                        <div style="display: flex; justify-content: flex-end; gap: 10px;">
    <div class="hstack gap-2">
        <button type="submit" class="btn btn-success" id="submitBtn">submit</button>
    </div>

    <div class="hstack gap-2">
        <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo e(route('user-details-view')); ?>'">Back</button>
    </div>
</div>

                </form>
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
<script>
    function toggleMarriageFields(show) {
        var marriageFields = document.getElementById('marriage-fields');
        if (show) {
            marriageFields.style.display = 'block';
        } else {
            marriageFields.style.display = 'none';
        }
    }
</script>


<script>
    function checkGenderAndAlert() {
        var selectedOption = $('#name option:selected');
        var selectedGender = selectedOption.data('gender');
        
        if (selectedGender) {
            // Pre-fill the gender field based on the selected profile's gender
            if (selectedGender === 'male') {
                $('#gender_male').prop('checked', true);
            } else if (selectedGender === 'female') {
                $('#gender_female').prop('checked', true);
            }

            // Show an alert and disable the submit button
            alert('Cannot update this profile');
            $('#submitBtn').prop('disabled', true);
        } else {
            // Enable the submit button if no issue
            $('#submitBtn').prop('disabled', false);
        }
    }

</script>






<script>
$(document).ready(function() {
    // Initialize select2 for better dropdown styling
    $('#state').select2({ placeholder: 'Select State', allowClear: true });
    $('#district').select2({ placeholder: 'Select District', allowClear: true });
    $('#taluka-field').select2({ placeholder: 'Select Taluka', allowClear: true });
    $('#designation').select2({ placeholder: 'Select Designation', allowClear: true });
    $('#department_name').select2({ placeholder: 'Select Department', allowClear: true });
    $('#organisation').select2({ placeholder: 'Select Organisation', allowClear: true });

    // Set initial values using user details
    var initialState = '<?php echo e(old('state', $user->state)); ?>';
    var initialDistrict = '<?php echo e(old('district', $user->district)); ?>';
    var initialTaluka = '<?php echo e(old('taluka', $user->taluka)); ?>';
    var initialDesignation = '<?php echo e(old('designation', $user->design_id)); ?>';
    var initialDepartment = '<?php echo e(old('department_name', $user->depart_id)); ?>';
    var initialOrganisation = '<?php echo e(old('organisation', $user->org_id)); ?>';

    // Initialize dropdowns with initial values
    $('#state').val(initialState).trigger('change');
    $('#district').val(initialDistrict).trigger('change');
    $('#taluka-field').val(initialTaluka).trigger('change');
    $('#designation').val(initialDesignation).trigger('change');
    $('#department_name').val(initialDepartment).trigger('change');
    $('#organisation').val(initialOrganisation).trigger('change');

    function loadDropdowns() {
        loadInitialDistricts();
        loadInitialTalukas();
        loadOrganisations();
        loadDepartments();
        loadDesignations();
    }

    function loadInitialDistricts() {
        var state = $('#state').val();
        if (state) {
            var statesData = <?php echo json_encode($statesData['states'], 15, 512) ?>;
            var selectedState = statesData.find(item => item.state === state);
            var districtDropdown = $('#district');

            districtDropdown.empty().append('<option value="">Select District</option>');

            if (selectedState) {
                selectedState.districts.forEach(district => {
                    districtDropdown.append($('<option>', { value: district, text: district }));
                });
                // Set selected value to the initial district
                districtDropdown.val(initialDistrict).trigger('change');
            }
        }
    }

    function loadInitialTalukas() {
        var state = $('#state').val();
        var district = $('#district').val();
        if (state && district) {
            $.ajax({
                url: '<?php echo e(route('tehsils.get')); ?>',
                type: 'GET',
                data: { state: state, district: district },
                success: function(response) {
                    var talukaDropdown = $('#taluka-field');
                    talukaDropdown.empty().append('<option value="">Select Taluka</option>');
                    response.forEach(taluka => {
                        talukaDropdown.append($('<option>', { value: taluka, text: taluka }));
                    });
                    // Set selected value to the initial taluka
                    talukaDropdown.val(initialTaluka).trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching talukas:', xhr.responseText);
                }
            });
        } else {
            $('#taluka-field').empty().append('<option value="">Select Taluka</option>');
        }
    }

    function loadOrganisations() {
        var state = $('#state').val() || initialState; // Use selected state or initial
        var district = $('#district').val() || initialDistrict; // Use selected district or initial
        var organisationDropdown = $('#organisation');


        organisationDropdown.empty().append('<option value="">Select Organisation</option>');

        if (state && district) {
            $.ajax({
                url: '<?php echo e(route('organisations.get')); ?>',
                type: 'GET',
                data: { state: state, district: district },
                success: function(response) {
                    response.forEach(org => {
                        if (!organisationDropdown.find('option[value="' + org.id + '"]').length) { // Prevent duplicates
                            organisationDropdown.append($('<option>', { value: org.id, text: org.org_name }));
                        }
                    });
                    // Set selected value to the initial organisation
                    organisationDropdown.val(initialOrganisation).trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching organisations:', xhr.responseText);
                }
            });
        }
    }

    function loadDepartments() {
        var state = $('#state').val();
        var district = $('#district').val();
        var organisation = $('#organisation').val();
        var departmentDropdown = $('#department_name');

        departmentDropdown.empty().append('<option value="">Select Department</option>');

        if (state && district && organisation) {
            $.ajax({
                url: '<?php echo e(route('departments.get')); ?>',
                type: 'GET',
                data: { state: state, district: district, organisation: organisation },
                success: function(response) {
                    response.forEach(dept => {
                        if (!departmentDropdown.find('option[value="' + dept.id + '"]').length) { // Prevent duplicates
                            departmentDropdown.append($('<option>', { value: dept.id, text: dept.name }));
                        }
                    });
                    // Set selected value to the initial department
                    departmentDropdown.val(initialDepartment).trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching departments:', xhr.responseText);
                }
            });
        }
    }

    function loadDesignations() {
        var department = $('#department_name').val();
        var taluka = $('#taluka-field').val();
        var organisation = $('#organisation').val();
        var designationDropdown = $('#designation');

        designationDropdown.empty().append('<option value="">-- Select Designation --</option>');

        if (taluka && organisation) {
            $.ajax({
                url: '<?php echo e(route('designations.getByTaluka')); ?>',
                type: 'GET',
                data: { taluka_id: taluka, organisation_id: organisation },
                success: function(response) {
                    response.forEach(designation => {
                        if (!designationDropdown.find('option[value="' + designation.id + '"]').length) { // Prevent duplicates
                            designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));
                        }
                    });
                    // Set selected value to the initial designation
                    designationDropdown.val(initialDesignation).trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching designations by taluka:', xhr.responseText);
                }
            });
        } else if (department) {
            $.ajax({
                url: '<?php echo e(route('designations.get')); ?>',
                type: 'GET',
                data: { department_id: department },
                success: function(response) {
                    response.forEach(designation => {
                        if (!designationDropdown.find('option[value="' + designation.id + '"]').length) { // Prevent duplicates
                            designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));
                        }
                    });
                    // Set selected value to the initial designation
                    designationDropdown.val(initialDesignation).trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching designations:', xhr.responseText);
                }
            });
        }
    }
    
    function fetchProfileName() {
        var designation = $('#designation').val(); 
        if (designation) {
            $.ajax({
                url: '<?php echo e(route('fetch.profiles')); ?>',  // Ensure this route returns profiles based on designation
                type: 'GET',
                data: { designation: designation },
                success: function(response) {
                    var profileDropdown = $('#name'); // The profile dropdown
                    profileDropdown.empty().append('<option value="">Select Profile Name</option>');

                    response.forEach(function(user) {
                        profileDropdown.append($('<option>', {
                            value: user.id,
                            text: `${user.first_name} ${user.last_name}`,
        'data-gender': user.gender  // Make sure gender is being added properly
                        }));

                    });

                    // Set the selected profile based on old value
                    var selectedProfile = '<?php echo e(old('name', $user->profile_id ?? '')); ?>'; // Get the old value or the existing profile id
                    profileDropdown.val(selectedProfile); // Set the old or pre-filled value
                },
                error: function(xhr) {
                    console.error('Error fetching profiles:', xhr.responseText);
                }
            });
        } else {
            $('#name').empty().append('<option value="">Select Profile Name</option>'); // Reset if no designation is selected
        }
    }
    

    // Check gender and alert if the profile cannot be updated
    
    // Attach change handlers to reload dependent dropdowns
    $('#state').change(function() {
        loadInitialDistricts();
        loadOrganisations();
    });

    $('#district').change(function() {
        loadInitialTalukas();
        loadOrganisations();
                    $('#designation').empty().append('<option value="">-- Select Designation --</option>');

    });

    $('#organisation').change(function() {
        loadDepartments();
    });

    $('#department_name, #taluka-field, #organisation').change(function() {
        loadDesignations();
    });
    
     $('#designation').change(function() {
        fetchProfileName();
    });

    // Initialize dropdowns on page load
    loadDropdowns();
});
</script>










       <script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize flatpickr on the input field
    flatpickr("#joining_date", {
        dateFormat: "d M, Y",
        onChange: function(selectedDates, dateStr) {
            // When the date is changed, update the formatted hidden input
            if (dateStr) {
                const formattedDate = convertToLaravelDateFormat(dateStr);
                document.getElementById('formatted_joining_date').value = formattedDate;
            }
        }
    });

    // Function to convert the date to Laravel format (Y-m-d)
    function convertToLaravelDateFormat(dateString) {
        const dateParts = dateString.replace(',', '').split(' ');
        const day = dateParts[0];
        const month = dateParts[1];
        const year = dateParts[2];

        const months = {
            'Jan': '01', 'Feb': '02', 'Mar': '03', 'Apr': '04',
            'May': '05', 'Jun': '06', 'Jul': '07', 'Aug': '08',
            'Sep': '09', 'Oct': '10', 'Nov': '11', 'Dec': '12'
        };

        const monthNumber = months[month];
        return `${year}-${monthNumber}-${day.padStart(2, '0')}`;  // Y-m-d format
    }

    // Event listener to update hidden input before form submission
    document.querySelector('form').addEventListener('submit', function(event) {
        const dateInput = document.getElementById('joining_date').value;
        if (dateInput) {
            const formattedDate = convertToLaravelDateFormat(dateInput);
            document.getElementById('formatted_joining_date').value = formattedDate;
        }
    });
});
</script>

        
        
        
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to convert number to text
    function numberToText(num) {
        const ones = [
            '', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'
        ];
        const teens = [
            'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
        ];
        const tens = [
            '', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'
        ];

        if (num === 0) return 'zero';

        if (num < 10) return ones[num];
        if (num < 20) return teens[num - 10];
        if (num < 100) return tens[Math.floor(num / 10)] + (num % 10 ? '-' + ones[num % 10] : '');

        if (num < 1000) {
            return ones[Math.floor(num / 100)] + ' hundred' + (num % 100 ? ' and ' + numberToText(num % 100) : '');
        }

        if (num < 1000000) {
            return numberToText(Math.floor(num / 1000)) + ' thousand' + (num % 1000 ? ' ' + numberToText(num % 1000) : '');
        }

        if (num < 1000000000) {
            return numberToText(Math.floor(num / 1000000)) + ' million' + (num % 1000000 ? ' ' + numberToText(num % 1000000) : '');
        }

        return numberToText(Math.floor(num / 1000000000)) + ' billion' + (num % 1000000000 ? ' ' + numberToText(num % 1000000000) : '');
    }

    // Function to convert a date string into text format
    function convertDateToText(dateString) {
        const parts = dateString.replace(',', '').split(' '); 
        
        
                const day = parts[0];
        const month = parts[1];
        const year = parts[2];



        const months = {
            'Jan': 'January', 'Feb': 'February', 'Mar': 'March', 'Apr': 'April',
            'May': 'May', 'Jun': 'June', 'Jul': 'July', 'Aug': 'August', 'Sep': 'September',
            'Oct': 'October', 'Nov': 'November', 'Dec': 'December'
        };

        const dayText = numberToText(parseInt(day));
        const monthText = months[month];
        const yearText = numberToText(parseInt(year));

        return `${dayText} ${monthText} ${yearText}`;
    }

    // Event listener to handle date input change
    document.getElementById('birth_date').addEventListener('input', function() {
        const dateString = this.value;
        if (dateString) {
            document.getElementById('birth-text-field').value = convertDateToText(dateString);
        }
    });
});













                            document.getElementById('birth_date').addEventListener('change', function() {
        const dateString = this.value;
        if (dateString) {
            const formattedDate = convertToLaravelDateFormat(dateString);
            document.getElementById('formatted_birth_date').value = formattedDate;
        }
    });

    // Optional: Prevent form submission and manually set formatted date if needed
    document.querySelector('form').addEventListener('submit', function(event) {
        const birthDateInput = document.getElementById('birth_date').value;
        if (birthDateInput) {
            document.getElementById('formatted_birth_date').value = convertToLaravelDateFormat(birthDateInput);
        }
    });








      
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/user-profile/view_details_add.blade.php ENDPATH**/ ?>