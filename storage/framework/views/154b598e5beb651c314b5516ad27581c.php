
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
                <h4 class="card-title mb-0">Add Nomination Details</h4>
            </div><!-- end card header -->

            <div class="card-body">
                   <form class="leave-form" autocomplete="off" action="<?php echo e(route('nominationstore')); ?>" method="post" enctype="multipart/form-data">
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
                                <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
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
                                <div class="invalid-feedback text-red"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        
                        
                                                                                                  <div class="col-md-4">
                            <label for="organisation" class="form-label">select organization</label>
                            <select id="organisation" name="organisation" class="form-select mb-3" required>
                                <option value="">Select organization</option>
                            </select>
                        </div>

                      
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                                                                                                           <div class="row">
                                                
                                                
                                                <div class="col-md-4">
                            <label for="department_name" class="form-label">Select Department</label>
                           <select name="department_name"  id ="department_name" class="form-select mb-3" >
                            <option value="">-- Select Department --</option>
                        </select>
                        <?php $__errorArgs = ['department_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback" style="color: red;">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                        </div>
                        
                        
                        
                                                                                        <div class="col-md-4">
                            <label for="taluka-field" class="form-label">Taluka</label>
                            <select id="taluka-field" name="taluka" class="form-control" >
                                <option value="">Select Taluka</option>
                                <!-- Talukas will be loaded here -->
                            </select>
                            <?php $__errorArgs = ['taluka'];
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
    <div class="invalid-feedback" style="color: red;">
        <?php echo e($message); ?>

    </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>   
                        
                        
                                     
                                                





</div>


    <!-- Profile Name, Position -->
    <div class="row mb-3">
         <div class="col-md-6">
                            <label for="name" class="form-label">Profile Name</label>
<select id="name" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
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
            <label for="position-field" class="form-label">Position</label>
            <input type="text" id="position-field" name="position" class="form-control <?php $__errorArgs = ['position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Position" value="<?php echo e(old('position')); ?>" />
            <?php $__errorArgs = ['position'];
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

    <!-- Date of Birth, Joining Date -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="dob-field" class="form-label">Date of Birth</label>
            <input type="date" id="birth_date" name="birth_date" class="form-control <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('birth_date')); ?>" />
            <?php $__errorArgs = ['dob'];
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
            <label for="join-date-field" class="form-label">Joining Date</label>
            <input type="date" id="join-date-field" name="join_date" class="form-control <?php $__errorArgs = ['join_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('join_date')); ?>" />
            <?php $__errorArgs = ['join_date'];
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
        
         <div class="row mb-3"> 
    <div class="col-md-6">
    <label for="nomination_type" class="form-label">Nomination Type</label>
    <select id="nomination_type" name="nomination_type" class="form-control <?php $__errorArgs = ['nomination_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
        <option value="">--Nomination Type--</option>
        <?php $__currentLoopData = $Nominationtype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Nominationtypes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($Nominationtypes->nomination_type); ?>"><?php echo e($Nominationtypes->nomination_type); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php $__errorArgs = ['nomination_type'];
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
<div id="nominee-sections">
    <!-- Nominee Section Template -->
    <div class="nominee-section">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="nominee-name-field" class="form-label">Nominee Name</label>
                <input type="text" id="nominee-name-field" name="nominee_name[]" class="form-control <?php $__errorArgs = ['nominee_name.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Nominee Name"  />
                <?php $__errorArgs = ['nominee_name.*'];
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
            <div class="col-md-4">
                <label for="nominee_dob-field" class="form-label">Nominee Date of Birth</label>
                <input type="date" id="nominee_dob-field" name="nominee_dob[]" class="form-control <?php $__errorArgs = ['nominee_dob.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  />
                <?php $__errorArgs = ['nominee_dob.*'];
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
            <div class="col-md-4">
                <label for="nominee-age-field" class="form-label">Nominee Age</label>
                <input type="number" id="nominee-age-field" name="nominee_age[]" class="form-control <?php $__errorArgs = ['nominee_age.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Nominee Age"  />
                <?php $__errorArgs = ['nominee_age.*'];
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
        
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="atypical-event-field" class="form-label">Atypical Event for Named Pointer Invalidity</label>
                <input type="text" id="atypical-event-field" name="atypical_event[]" class="form-control <?php $__errorArgs = ['atypical_event.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Describe the event" value="<?php echo e(old('atypical_event[]')); ?>" />
                <?php $__errorArgs = ['atypical_event.*'];
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
        
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="relationship-field" class="form-label">Relationship with Nominee</label>
                <input type="text" id="relationship-field" name="relationship_nominee[]" class="form-control <?php $__errorArgs = ['relationship_nominee.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Relationship"  />
                <?php $__errorArgs = ['relationship_nominee.*'];
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
            <div class="col-md-4">
                <label for="nominee-type-field" class="form-label">Nominee Type</label>
                <select id="nominee-type-field" name="nominee_type[]" class="form-control <?php $__errorArgs = ['nominee_type.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> nominee-type" >
                    <option value="">Select Type</option>
                    <option value="Main">Main Nominee</option>
                    <option value="Sub">Sub Nominee</option>
                </select>
                <?php $__errorArgs = ['nominee_type.*'];
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
            <div class="col-md-4">
                <label for="nominee-amount-field" class="form-label">Amount/Portion</label>
                <input type="text" id="nominee-amount-field" name="nominee_amount[]" class="form-control <?php $__errorArgs = ['nominee_amount.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> nominee-amount" placeholder="Enter Amount or Portion"  />
                <?php $__errorArgs = ['nominee_amount.*'];
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
    </div>
</div>


    <!-- Add Nominee Button -->
    <div class="row mb-3">
        <div class="col-md-12">
            <button type="button" id="add-nominee" class="btn btn-secondary">Add Nominee</button>
        </div>
    </div>
   
    <!-- Digital Signatures -->
    <!--<div class="row mb-3">-->
    <!--    <div class="col-md-4">-->
    <!--        <label for="digital_sig_user" class="form-label">Digital Signature Main User</label>-->
    <!--        <input type="file" id="digital_sig_user" name="digital_sig_user" class="form-control <?php $__errorArgs = ['digital_sig_user'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />-->
    <!--        <?php $__errorArgs = ['digital_sig_user'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
    <!--        <div class="invalid-feedback text-red"><?php echo e($message); ?></div>-->
    <!--        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
    <!--    </div>-->
    <!--    <div class="col-md-4">-->
    <!--        <label for="digital_sig_clerk" class="form-label">Digital Signature Office Clerk</label>-->
    <!--        <input type="file" id="digital_sig_clerk" name="digital_sig_clerk" class="form-control <?php $__errorArgs = ['digital_sig_clerk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />-->
    <!--        <?php $__errorArgs = ['digital_sig_clerk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
    <!--        <div class="invalid-feedback text-red"><?php echo e($message); ?></div>-->
    <!--        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
    <!--    </div>-->
    <!--    <div class="col-md-4">-->
    <!--        <label for="digital_sig_head" class="form-label">Digital Signature Office Head</label>-->
    <!--        <input type="file" id="digital_sig_head" name="digital_sig_head" class="form-control <?php $__errorArgs = ['digital_sig_head'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />-->
    <!--        <?php $__errorArgs = ['digital_sig_head'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
    <!--        <div class="invalid-feedback text-red"><?php echo e($message); ?></div>-->
    <!--        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
    <!--    </div>-->
    <!--</div>-->

    <!-- Witness Signatures -->
    <!--<div class="row mb-3">-->
    <!--    <div class="col-md-6">-->
    <!--        <label for="witness_sig_one" class="form-label">Witness Signature 1</label>-->
    <!--        <input type="file" id="witness_sig_one" name="witness_sig_one" class="form-control <?php $__errorArgs = ['witness_sig_one'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />-->
    <!--        <?php $__errorArgs = ['witness_sig_one'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
    <!--        <div class="invalid-feedback text-red"><?php echo e($message); ?></div>-->
    <!--        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
    <!--    </div>-->
    <!--    <div class="col-md-6">-->
    <!--        <label for="witness_sig_two" class="form-label">Witness Signature 2</label>-->
    <!--        <input type="file" id="witness_sig_two" name="witness_sig_two" class="form-control <?php $__errorArgs = ['witness_sig_two'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />-->
    <!--        <?php $__errorArgs = ['witness_sig_two'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
    <!--        <div class="invalid-feedback text-red"><?php echo e($message); ?></div>-->
    <!--        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
    <!--    </div>-->
    <!--</div>-->

    <!-- Submit Button -->
     <div style="display: flex; justify-content: flex-end; gap: 10px;">
    <div class="hstack gap-2">
        <button type="submit" class="btn btn-success">submit</button>
    </div>

    <div class="hstack gap-2">
        <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo e(route('nomination-index')); ?>'">Back</button>
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
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    
    
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="<?php echo e(URL::asset('build/js/pages/select2.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<script>
let mainNomineeAdded = false;






function calculateTotalMainNomineePercentage() {
    const nomineeSections = document.querySelectorAll('.nominee-section');
    let totalMainNomineeAmount = 0;

    nomineeSections.forEach(section => {
        const nomineeType = section.querySelector('.nominee-type').value;
        if (nomineeType === 'Main') {
            const nomineeAmount = section.querySelector('.nominee-amount').value;
            totalMainNomineeAmount += parseInt(nomineeAmount.replace('%', ''), 10) || 0;
        }
    });

    return totalMainNomineeAmount;
}

// Example usage
document.addEventListener('input', function (e) {
    if (e.target && e.target.classList.contains('nominee-amount')) {
        const totalMainNomineeAmount = calculateTotalMainNomineePercentage();
        console.log('Total Main Nominee Percentage:', totalMainNomineeAmount);
        
        if (totalMainNomineeAmount > 100) {
            alert('Total percentage for Main Nominees exceeds 100%. Please adjust the values.');
            e.target.value = '0%';  // Reset to 0% to prevent exceeding 100%
        }
    }
});

// Initial setup
document.addEventListener('DOMContentLoaded', function () {
    const totalMainNomineeAmount = calculateTotalMainNomineePercentage();
    console.log('Initial Total Main Nominee Percentage:', totalMainNomineeAmount);
});


function calculateTotalSubNomineePercentage() {
    const nomineeSections = document.querySelectorAll('.nominee-section');
    let totalSubNomineeAmount = 0;

    nomineeSections.forEach(section => {
        const nomineeType = section.querySelector('.nominee-type').value;
        if (nomineeType === 'Sub') {
            const nomineeAmount = section.querySelector('.nominee-amount').value;
            totalSubNomineeAmount += parseInt(nomineeAmount.replace('%', ''), 10) || 0;
        }
    });

    return totalSubNomineeAmount;
}


function enableAllSubNomineeAmounts() {
    const nomineeSections = document.querySelectorAll('.nominee-section');
    
    nomineeSections.forEach(section => {
        const nomineeType = section.querySelector('.nominee-type').value;
        
        const nomineeAmount = section.querySelector('.nominee-amount');

        if (nomineeType === 'Sub') {
            nomineeAmount.disabled = false;
        }
    });
}

function updateNomineeAmountInput() {
    const nomineeSections = document.querySelectorAll('.nominee-section');

    nomineeSections.forEach(section => {
        const nomineeType = section.querySelector('.nominee-type').value;
        const nomineeAmount = section.querySelector('.nominee-amount');

        if (nomineeType === 'Main') {
            section.querySelector('.nominee-type').disabled = false;
            mainNomineeAdded = false;
        } else if (nomineeType === 'Sub') {
            nomineeAmount.disabled = false;
        }
    });
}

document.getElementById('add-nominee').addEventListener('click', function () {
    const totalSubNomineeAmount = calculateTotalSubNomineePercentage();
    
    if (totalSubNomineeAmount >= 100) {
        alert('100% quota has been distributed among Sub Nominees.');
        return;
    }

    // Clone the nominee section and reset values
    const nomineeSection = document.querySelector('.nominee-section').cloneNode(true);
    nomineeSection.querySelectorAll('input').forEach(input => input.value = '');
    nomineeSection.querySelector('.nominee-amount').disabled = false;
    nomineeSection.querySelector('.nominee-type').disabled = false;

    if (mainNomineeAdded) {
        nomineeSection.querySelector('.nominee-type').querySelector('option[value="Main"]').disabled = true;
    }


   document.getElementById('nominee-sections').appendChild(nomineeSection);

// Hide specific fields in the newly added nominee section only
const newlyAddedSection = document.querySelectorAll('.nominee-section')[document.querySelectorAll('.nominee-section').length - 1];

const atypicalEventField = newlyAddedSection.querySelector('input[name="atypical_event[]"]');

// Get the first row's values
const firstSection = document.querySelector('.nominee-section');
const firstatypicalevent = firstSection.querySelector('input[name="atypical_event[]"]').value;

if (atypicalEventField) {
    atypicalEventField.value = firstatypicalevent;
    atypicalEventField.style.visibility = 'hidden';  // Hide the field content
    atypicalEventField.parentElement.style.display = 'none'; // Hide the entire column
}

// Disable previous sub-nominee amount fields
disablePreviousSubNomineeAmounts();

});

document.addEventListener('change', function (e) {
    if (e.target && e.target.classList.contains('nominee-type')) {
        const nomineeType = e.target.value;
        const nomineeAmount = e.target.closest('.nominee-section').querySelector('.nominee-amount');

        if (nomineeType === 'Main') {
            mainNomineeAdded = false;
        } else if (nomineeType === 'Sub') {
            nomineeAmount.value = '0%';
            nomineeAmount.disabled = false;
        }

        // Update fields after change
        updateNomineeAmountInput();
    }
});

document.addEventListener('input', function (e) {
    if (e.target && e.target.classList.contains('nominee-amount')) {
        const totalSubNomineeAmount = calculateTotalSubNomineePercentage();

        if (totalSubNomineeAmount > 100) {
            alert('Total percentage exceeds 100%. Please adjust the values.');
            e.target.value = '0%';  // Reset to 0% to prevent exceeding 100%
        }

        // Disable previous sub-nominee amount fields if needed
        disablePreviousSubNomineeAmounts();
    }
});

// Initial setup
updateNomineeAmountInput();


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
                        text: `${user.first_name} ${user.last_name}`
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
$(document).ready(function() {
    $('#name').change(function() {
        var profileId = $(this).val();
        console.log(profileId);
        if (profileId) {
            $.ajax({
                url: '/get-nomination-type/' + profileId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    // Reset all options
                    $('#nomination_type option').prop('disabled', false);

                    if (response.nomination_type) {
                        $('#nomination_type option').each(function() {
                            if ($(this).val() === response.nomination_type) {
                                $(this).prop('disabled', true);
                            }
                        });
                    }
                },
                error: function() {
                    alert('Error retrieving nomination type.');
                }
            });
        } 
    });
});
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/nomination/create.blade.php ENDPATH**/ ?>