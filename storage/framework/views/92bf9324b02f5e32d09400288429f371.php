
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
                <h4 class="card-title mb-0">Transfer Order</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <form class="leave-form" autocomplete="off" action="<?php echo e(route('transfer.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
 <input type="hidden" name="order_type" class="form-control" value="Transfer">
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
                            <label for="organisation" class="form-label">Select Organization</label>
                            <select id="organisation" name="org_id" class="form-select mb-3" >
                                <option value="">Select Organization</option>
                            </select>
                        </div>
                    </div><!-- end row -->

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="department_name" class="form-label">Select Department</label>
                            <select name="depart_id" id="department_name" class="form-select mb-3">
                                <option value="">-- Select Department --</option>
                            </select>
                            <?php $__errorArgs = ['department_name'];
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
                            <select name="design_id" id="designation" class="form-select mb-3">
                                <option value="">-- Select Designation --</option>
                            </select>
                            <?php $__errorArgs = ['designation'];
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
                    </div><!-- end row -->
                    
                    
                    
                    
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="name" class="form-label">Profile Name</label>
    <select id="name" name="user_id" class="form-control <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="">Select Profile Name</option>
                            </select>
                            <?php $__errorArgs = ['user_id'];
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
                            <label for="last_working_date" class="form-label"> Last working day</label>
                            <input type="text" id="last_working_date" name="last_working_date" 
                                data-provider="flatpickr" data-date-format="d M, Y" 
                                class="form-control <?php $__errorArgs = ['last_working_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                value="<?php echo e(old('last_working_date')); ?>" />
                            <?php $__errorArgs = ['last_working_date'];
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
                        <input type="hidden" id="formatted_last_working_date" name="formatted_last_working_date" />
                    </div><!-- end row -->

                       <h6>Transfer To : </h6>
                       
                  <div class="row mb-3">
    <div class="col-md-4">
        <label for="state" class="form-label">State</label>
        <select id="state_2" name="transfer_state" class="form-control <?php $__errorArgs = ['transfer_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <option value="">Select State</option>
            <?php $__currentLoopData = $statesData['states']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($state['state']); ?>" <?php echo e(old('transfer_state') == $state['state'] ? 'selected' : ''); ?>>
                    <?php echo e($state['state']); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php $__errorArgs = ['transfer_state'];
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
        <select id="district_2" name="transfer_district" class="form-control <?php $__errorArgs = ['transfer_district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <option value="">Select District</option>
            <!-- Districts will be loaded here -->
        </select>
        <?php $__errorArgs = ['transfer_district'];
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
        <label for="organisation" class="form-label">Select Organization</label>
        <select id="organisation_2" name="transfer_org_id" class="form-select mb-3 <?php $__errorArgs = ['transfer_org_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <option value="">Select Organization</option>
            <!-- Organizations will be loaded here -->
        </select>
        <?php $__errorArgs = ['transfer_org_id'];
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

<div class="row mb-3">
    <div class="col-md-4">
        <label for="department_name" class="form-label">Select Department</label>
        <select name="transfer_depart_id" id="department_name_2" class="form-select mb-3 <?php $__errorArgs = ['transfer_depart_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <option value="">-- Select Department --</option>
            <!-- Departments will be loaded here -->
        </select>
        <?php $__errorArgs = ['transfer_depart_id'];
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
        <select id="taluka-field_2" name="transfer_taluka" class="form-control <?php $__errorArgs = ['transfer_taluka'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <option value="">Select Taluka</option>
            <!-- Talukas will be loaded here -->
        </select>
        <?php $__errorArgs = ['transfer_taluka'];
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
        <select name="transfer_design_id" id="designation_2" class="form-select mb-3 <?php $__errorArgs = ['transfer_design_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <option value="">-- Select Designation --</option>
            <!-- Designations will be loaded here -->
        </select>
        <?php $__errorArgs = ['transfer_design_id'];
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

  
                    
                    


                    <!-- Profile Name, Joining Date -->
                    
                    <!-- Digital Signature and Verification -->
                    <!--<div class="row mb-3">-->
                    <!--    <div class="col-md-12">-->
                    <!--        <label for="digital-sig-field" class="form-label">Digital Signature User</label>-->
                    <!--        <input type="file" id="user_digital_sig" name="user_digital_sig" class="form-control <?php $__errorArgs = ['user_digital_sig'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />-->
                    <!--        <?php $__errorArgs = ['user_digital_sig'];
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
                    
                    <!-- end row -->

                    <!--<div class="row mb-3">-->
                    <!--    <div class="col-md-12">-->
                    <!--        <label for="digital-sig-verify-field" class="form-label">Digital Signature Hod</label>-->
                    <!--        <input type="file" id="hod_digital_sig" name="hod_digital_sig" class="form-control <?php $__errorArgs = ['hod_digital_sig'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />-->
                    <!--        <?php $__errorArgs = ['digital_sig_hod'];
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
                    <!-- end row -->

                    <!--<div class="row mb-3">-->
                    <!--    <div class="col-md-12">-->
                    <!--        <label for="clerk_digital_sig" class="form-label">Digital signature clerk</label>-->
                    <!--        <input type="file" id="clerk_digital_sig" name="clerk_digital_sig" class="form-control <?php $__errorArgs = ['clerk_digital_sig'];
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
                    <!-- end row -->

                    <!-- Submit and Cancel Buttons -->
                     <div style="display: flex; justify-content: flex-end; gap: 10px;">
    <div class="hstack gap-2">
        <button type="submit" class="btn btn-success">submit</button>
    </div>

    <div class="hstack gap-2">
        <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo e(route('transfer.index')); ?>'">Back</button>
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

<!--<script>-->
<!--$(document).ready(function () {-->
    // Store old values from the request
<!--    var oldValues = {-->
<!--        organisation: "<?php echo e(old('transfer_org_id')); ?>",-->
<!--        department: "<?php echo e(old('transfer_depart_id')); ?>",-->
<!--        designation: "<?php echo e(old('transfer_design_id')); ?>",-->
<!--        state: "<?php echo e(old('transfer_state')); ?>",-->
<!--        district: "<?php echo e(old('transfer_district')); ?>",-->
<!--        taluka: "<?php echo e(old('transfer_taluka')); ?>"-->
<!--    };-->

    // Convert states data to a usable format
<!--    var statesData = <?php echo json_encode($statesData['states'], 15, 512) ?>;-->

    // Function to initialize Select2 for each dropdown
<!--    function initializeSelect2() {-->
<!--        $('#state_2, #district_2, #taluka-field_2, #organisation_2, #department_name_2, #designation_2').select2({-->
<!--            placeholder: 'Select an option',-->
<!--            allowClear: true-->
<!--        });-->
<!--    }-->

    // Function to set the old value in the dropdown
<!--    function setOldValue(selector, oldValue, options) {-->
<!--        var dropdown = $(selector);-->
<!--        dropdown.empty().append('<option value="">Select</option>');-->
<!--        options.forEach(option => {-->
<!--            var selected = option.value === oldValue ? 'selected' : '';-->
<!--            dropdown.append(`<option value="${option.value}" ${selected}>${option.text}</option>`);-->
<!--        });-->
<!--        dropdown.val(oldValue).trigger('change');-->
<!--    }-->

    // Load districts based on the selected state
<!--    function loadDistricts() {-->
<!--        if (oldValues.state) {-->
<!--            var selectedState = statesData.find(item => item.state === oldValues.state);-->
<!--            if (selectedState) {-->
<!--                setOldValue('#district_2', oldValues.district, selectedState.districts.map(district => ({ value: district, text: district })));-->
<!--            }-->
<!--        }-->
<!--    }-->

    // Load talukas based on the selected district
<!--    function loadTalukas() {-->
<!--        if (oldValues.district) {-->
<!--            $.get('<?php echo e(route('tehsils.get')); ?>', { state: $('#state_2').val(), district: oldValues.district }, function (response) {-->
<!--                setOldValue('#taluka-field_2', oldValues.taluka, response.map(taluka => ({ value: taluka, text: taluka })));-->
<!--            });-->
<!--        }-->
<!--    }-->

    // Load organisations based on the selected state and district
<!--    function loadOrganisations() {-->
<!--        if ($('#state_2').val() && $('#district_2').val()) {-->
<!--            $.get('<?php echo e(route('organisations.get')); ?>', { state: $('#state_2').val(), district: $('#district_2').val() }, function (response) {-->
<!--                setOldValue('#organisation_2', oldValues.organisation, response.map(org => ({ value: org.id, text: org.org_name })));-->
<!--            });-->
<!--        }-->
<!--    }-->

    // Load departments based on the selected organisation
<!--    function loadDepartments() {-->
<!--        if ($('#state_2').val() && $('#district_2').val() && $('#organisation_2').val()) {-->
<!--            $.get('<?php echo e(route('departments.get')); ?>', { state: $('#state_2').val(), district: $('#district_2').val(), organisation: $('#organisation_2').val() }, function (response) {-->
<!--                setOldValue('#department_name_2', oldValues.department, response.map(depart => ({ value: depart.id, text: depart.name })));-->
<!--            });-->
<!--        }-->
<!--    }-->

    // Load designations based on selected department or organisation
<!--    function loadDesignations() {-->
<!--        var department = $('#department_name_2').val();-->
<!--        var taluka = $('#taluka-field_2').val();-->
<!--        var organisation = $('#organisation_2').val();-->

<!--        if (taluka && organisation) {-->
<!--            $.get('<?php echo e(route('designations.getByTaluka')); ?>', { taluka_id: taluka, organisation_id: organisation }, function (response) {-->
<!--                setOldValue('#designation_2', oldValues.designation, response.map(designation => ({ value: designation.id, text: designation.designation_name })));-->
<!--            });-->
<!--        } else if (department) {-->
<!--            $.get('<?php echo e(route('designations.get')); ?>', { department_id: department }, function (response) {-->
<!--                setOldValue('#designation_2', oldValues.designation, response.map(designation => ({ value: designation.id, text: designation.designation_name })));-->
<!--            });-->
<!--        }-->
<!--    }-->

    // Event listeners for dropdown changes
<!--    $('#state_2').change(function() {-->
<!--        loadDistricts();-->
<!--        loadOrganisations();-->
<!--    });-->

<!--    $('#district_2').change(function() {-->
<!--        loadTalukas();-->
<!--        loadOrganisations();-->
<!--    });-->

<!--    $('#organisation_2').change(loadDepartments);-->
<!--    $('#department_name_2').change(loadDesignations);-->

    // Initialize all select2 components
<!--    initializeSelect2();-->
<!--    loadDistricts();-->
<!--    loadTalukas();-->
<!--    loadOrganisations();-->
<!--    loadDepartments();-->
<!--    loadDesignations();-->
<!--});-->
<!--</script>-->




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
    $('#state_2').select2({
        placeholder: 'Select State',
        allowClear: true
    });

    $('#district_2').select2({
        placeholder: 'Select District',
        allowClear: true
    });

    $('#taluka-field').select2({
        placeholder: 'Select Taluka',
        allowClear: true
    });

    $('#taluka-field_2').select2({
        placeholder: 'Select Taluka',
        allowClear: true
    });

    $('#organisation_2').select2({
        placeholder: 'Select Organization',
        allowClear: true
    });

    $('#department_name_2').select2({
        placeholder: ' Select Department ',
        allowClear: true
    });

    $('#designation_2').select2({
        placeholder: 'Select Designation ',
        allowClear: true
    });


</script>
<script>
    $(document).ready(function() {
        // Handle state_2 selection change
        $('#state_2').change(function() {
            var state = $(this).val();
            var statesData = <?php echo json_encode($statesData['states'], 15, 512) ?>; // Pass states data to JavaScript

            var districtDropdown = $('#district_2');
            districtDropdown.empty().append('<option value="">Select District</option>'); // Clear existing options

            var selectedState = statesData.find(function(item) {
                return item.state === state;
            });

            if (selectedState) {
                selectedState.districts.forEach(function(district) {
                    districtDropdown.append($('<option>', {
                        value: district,
                        text: district
                    }));
                });
            }

            $('#taluka-field_2').empty().append('<option value="">Select Taluka</option>');
        });

        // Handle district_2 selection change
        $('#district_2').change(function() {
            var state = $('#state_2').val();
            var district = $(this).val();

            if (state && district) {
                $.ajax({
                    url: '<?php echo e(route('tehsils.get')); ?>', // Ensure this matches your route
                    type: 'GET',
                    data: { state: state, district: district },
                    success: function(response) {
                        var talukaDropdown = $('#taluka-field_2');
                        talukaDropdown.empty().append('<option value="">Select Taluka</option>');

                        response.forEach(function(taluka) {
                            talukaDropdown.append($('<option>', {
                                value: taluka,
                                text: taluka
                            }));
                        });
                    },
                    error: function(xhr) {
                        console.error('Error fetching talukas:', xhr.responseText);
                    }
                });
            }
        });

        // Handle district_2 selection change for fetching organisations
        $('#district_2').change(function() {
            var state = $('#state_2').val();
            var district = $(this).val();

            if (state && district) {
                $.ajax({
                    url: '<?php echo e(route('organisations.get')); ?>',
                    type: 'GET',
                    data: { state: state, district: district },
                    success: function(response) {
                        var organisationDropdown = $('#organisation_2');
                        organisationDropdown.empty().append('<option value="">Select Organisation</option>');

                        if (response.length === 0) {
                            console.warn('No organisations found for the selected district.');
                        } else {
                            response.forEach(function(org) {
                                organisationDropdown.append($('<option>', {
                                    value: org.id,
                                    text: org.org_name
                                }));
                            });
                        }
                    },
                    error: function(xhr) {
                        console.error('Error fetching organisations:', xhr.responseText);
                    }
                });
            } else {
                console.warn('State or district is missing.');
            }
        });

        // Handle organisation_2 selection change for fetching departments
        $('#organisation_2').change(function() {
            var state = $('#state_2').val();
            var district = $('#district_2').val();
            var organisation = $(this).val();

            if (state && district && organisation) {
                $.ajax({
                    url: '<?php echo e(route('departments.get')); ?>',
                    type: 'GET',
                    data: { state: state, district: district, organisation: organisation },
                    success: function(response) {
                        var departmentDropdown = $('#department_name_2');
                        departmentDropdown.empty().append('<option value="">Select department</option>');

                        if (response.length === 0) {
                            console.warn('No departments found.');
                        } else {
                            response.forEach(function(depart) {
                                departmentDropdown.append($('<option>', {
                                    value: depart.id,
                                    text: depart.name
                                }));
                            });
                        }
                    },
                    error: function(xhr) {
                        console.error('Error fetching departments:', xhr.responseText);
                    }
                });
            } else {
                console.warn('State, district, or organisation is missing.');
            }
        });

        // Function to fetch designations based on department, taluka, or organisation
        function fetchDesignations2() {
            var department = $('#department_name_2').val();
            var taluka = $('#taluka-field_2').val();
            var organisation = $('#organisation_2').val();

            var designationDropdown = $('#designation_2');
            designationDropdown.empty().append('<option value="">-- Select Designation --</option>');

            if (taluka && organisation) {
                $.ajax({
                    url: '<?php echo e(route('designations.getByTaluka')); ?>',
                    type: 'GET',
                    data: { taluka_id: taluka, organisation_id: organisation },
                    success: function(response) {
                        let seenDesignations = new Set();

                        response.forEach(designation => {
                            if (!seenDesignations.has(designation.id)) {
                                designationDropdown.append($('<option>', {
                                    value: designation.id,
                                    text: designation.designation_name
                                }));
                                seenDesignations.add(designation.id);
                            }
                        });
                    },
                    error: function(xhr) {
                        console.error('Error fetching designations by taluka and organisation:', xhr.responseText);
                    }
                });
            } else if (department) {
                $.ajax({
                    url: '<?php echo e(route('designations.get')); ?>',
                    type: 'GET',
                    data: { department_id: department },
                    success: function(response) {
                        let seenDesignations = new Set();

                        response.forEach(designation => {
                            if (!seenDesignations.has(designation.id)) {
                                designationDropdown.append($('<option>', {
                                    value: designation.id,
                                    text: designation.designation_name
                                }));
                                seenDesignations.add(designation.id);
                            }
                        });
                    },
                    error: function(xhr) {
                        console.error('Error fetching designations:', xhr.responseText);
                    }
                });
            } else {
                console.warn('Neither department nor taluka/organisation is selected.');
            }
        }

        // Trigger fetchDesignations2 when either department, taluka, or organisation is changed
        $('#department_name_2, #taluka-field_2, #organisation_2').change(fetchDesignations2);
    });
</script>


 
   <script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize flatpickr on the input field
    flatpickr("#last_working_date", {
        dateFormat: "d M, Y",
        onChange: function(selectedDates, dateStr) {
            // When the date is changed, update the formatted hidden input
            if (dateStr) {
                const formattedDate = convertToLaravelDateFormat(dateStr);
                document.getElementById('formatted_last_working_date').value = formattedDate;
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
        const dateInput = document.getElementById('last_working_date').value;
        if (dateInput) {
            const formattedDate = convertToLaravelDateFormat(dateInput);
            document.getElementById('formatted_last_working_date').value = formattedDate;
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


});














});







      
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/Transfer/add.blade.php ENDPATH**/ ?>