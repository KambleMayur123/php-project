
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet" type="text/css" />


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Edit Checklist</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <!-- Your existing form container -->
               <form class="leave-form" autocomplete="off" action="<?php echo e(route('checklist-new.update' , $checklist->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?> 

           <div class="row mb-3">
    <div class="col-md-4">
        <label for="state" class="form-label">State</label>
        <select id="state" name="state" class="form-control">
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
        <select id="district" name="district" class="form-control">
            <option value="<?php echo e($user->district); ?>"> <?php echo e($user->district); ?></option>
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
    <select id="organisation" name="org_id" class="form-select mb-3">

    </select>
</div>

</div>

<div class="row">
    <div class="col-md-4">
    <label for="department_name" class="form-label">Select Department</label>
    <select name="depart_id" id="department_name" class="form-select mb-3">

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
            <option value="<?php echo e($user->taluka); ?>"><?php echo e($user->taluka); ?></option>
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
            <!-- Designations will be loaded here -->
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


    <div class="row mb-3">
        
<div class="col-md-6">
    <label for="name" class="form-label">Profile Name</label>
    <input type="text" id="name" name="user_id" class="form-control" value="<?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>" readonly>
</div>

        <div class="col-md-6">
            <label for="checklist_name" class="form-label">Checklist Name</label>
<select id="checklist_name" name="checklist_name" class="form-control" required>
    <option value="">Select Checklist</option>
    <?php $__currentLoopData = $checklistMasters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checklist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($checklist->checklist_name); ?>" 
            <?php echo e(($user->checklist_name == $checklist->checklist_name) ? 'selected' : ''); ?>>
            <?php echo e($checklist->checklist_name); ?>

        </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
            <?php $__errorArgs = ['checklist_name'];
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
    <!-- Process Status -->
<div class="col-md-12 mb-3">
    <label class="form-label">Process Status</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="process_status" id="status_yes" value="Yes" 
            <?php echo e(($user->process_status == 'Yes') ? 'checked' : ''); ?> required>
        <label class="form-check-label" for="status_yes">Yes</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="process_status" id="status_no" value="No" 
            <?php echo e(($user->process_status == 'No') ? 'checked' : ''); ?> required>
        <label class="form-check-label" for="status_no">No</label>
    </div>
    <?php $__errorArgs = ['process_status'];
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

<!-- Conditional fields -->
<!-- Receipt Process Status dropdown -->
<div id="receipt-status-container" class="row mb-3" style="display: <?php echo e(($user->process_status == 'No') ? 'block' : 'none'); ?>;">
    <div class="col-md-12 mb-3">
        <label for="receipt_status" class="form-label">Receipt Process Status</label>
        <select id="receipt_status" name="receipt_process_status" class="form-select">
            <option value="">Select Status</option>
            <option value="Applied" <?php echo e(($user->receipt_process_status == 'Applied') ? 'selected' : ''); ?>>Applied</option>
            <option value="Not Applied" <?php echo e(($user->receipt_process_status == 'Not Applied') ? 'selected' : ''); ?>>Not Applied</option>
        </select>
    </div>
</div>

<!-- Additional receipt fields -->
<div id="additional-receipt-fields" class="row mb-3" style="display: <?php echo e(($user->receipt_process_status == 'Applied') ? 'block' : 'none'); ?>;">
    <div class="col-md-12 mb-3">
        <label for="receipt_no" class="form-label">Receipt No</label>
        <input type="text" id="receipt_no" name="receipt_no" class="form-control" 
            value="<?php echo e($user->receipt_no); ?>">
    </div>
    <div class="col-md-12 mb-3">
        <label for="receipt_status_dropdown" class="form-label">Receipt Status</label>
        <select id="receipt_status_dropdown" name="receipt_status" class="form-select">
            <option value="">Select Status</option>
            <option value="approved" <?php echo e(($user->receipt_status == 'approved') ? 'selected' : ''); ?>>Approved</option>
            <option value="reject" <?php echo e(($user->receipt_status == 'reject') ? 'selected' : ''); ?>>Reject</option>
            <option value="in_progress" <?php echo e(($user->receipt_status == 'in_progress') ? 'selected' : ''); ?>>In Progress</option>
        </select>
    </div>
</div>

<div id="conditional-fields" class="row mb-3" style="display: <?php echo e(($user->process_status == 'Yes' || $user->receipt_process_status == 'Applied') ? 'block' : 'none'); ?>;">
    <div class="col-md-12 mb-3">
        <label for="page_no" class="form-label">Page No</label>
        <input type="number" id="page_no" name="page_no" class="form-control" 
            value="<?php echo e($user->page_no); ?>">
    </div>
    <div class="col-md-12 mb-3">
        <label for="file_upload" class="form-label">File Upload</label>
        <input type="file" id="file_upload" name="page_file" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
        
        <!-- If the user has an existing file -->
        <?php if($user->page_file): ?>
            <div id="view-file-container" class="mt-2">
                <a href="<?php echo e(asset('/images/' . $user->page_file)); ?>" target="_blank">
                    View Uploaded File
                </a>
            </div>
        <?php endif; ?>
        
        <!-- Preview container for the new uploaded file -->
        <div id="preview-container" class="mt-3" style="display: none;">
            <img id="preview-image" src="#" alt="Image Preview" class="img-thumbnail" style="max-width: 200px; display: none;">
            <embed id="preview-pdf" src="#" type="application/pdf" width="200" height="200" class="img-thumbnail" style="display: none;">
        </div>
    </div>
</div>
</div>


 <div style="display: flex; justify-content: flex-end; gap: 10px;">
    <div class="hstack gap-2">
        <button type="submit" class="btn btn-success">submit</button>
    </div>

    <div class="hstack gap-2">
        <button class="btn btn-primary" onclick="window.location.href='<?php echo e(route('checklist-new.index')); ?>'">Back</button>
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
document.getElementById('file_upload').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const previewContainer = document.getElementById('preview-container');
    const previewImage = document.getElementById('preview-image');
    const previewPDF = document.getElementById('preview-pdf');
    const viewFileContainer = document.getElementById('view-file-container'); // The container for the "View Uploaded File" button

    // If a file is selected
    if (file) {
        const fileType = file.type;
        const fileURL = URL.createObjectURL(file);
        
        // Hide the "View Uploaded File" button by removing its container
        if (viewFileContainer) {
            viewFileContainer.style.display = 'none';
        }

        // Reset the previews
        previewImage.style.display = 'none';
        previewPDF.style.display = 'none';

        // Check if the uploaded file is an image
        if (fileType.match('image.*')) {
            previewImage.src = fileURL;
            previewImage.style.display = 'block';
        } 
        // Check if the uploaded file is a PDF
        else if (fileType === 'application/pdf') {
            previewPDF.src = fileURL;
            previewPDF.style.display = 'block';
        }

        // Show the preview container
        previewContainer.style.display = 'block';
    }
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const statusYes = document.getElementById('status_yes');
    const statusNo = document.getElementById('status_no');
    const conditionalFields = document.getElementById('conditional-fields');
    const receiptStatusContainer = document.getElementById('receipt-status-container');
    const receiptStatusDropdown = document.getElementById('receipt_status');
    const additionalReceiptFields = document.getElementById('additional-receipt-fields');
    const statusField = document.getElementById('Status'); // Ensure this exists

    // Function to handle conditional visibility based on Process Status
    function handleProcessStatusChange() {
        if (statusYes.checked) {
            conditionalFields.style.display = 'block';
            receiptStatusContainer.style.display = 'none';
            additionalReceiptFields.style.display = 'none';
            statusField.value = 'complete';
        } else if (statusNo.checked) {
            conditionalFields.style.display = 'none';
            receiptStatusContainer.style.display = 'block';
            additionalReceiptFields.style.display = 'none';
            statusField.value = ''; // Clear status when No is selected initially
        }
    }

    // Function to handle receipt status selection
    function handleReceiptStatusChange() {
        const receiptStatusValue = receiptStatusDropdown.value;
        if (receiptStatusValue === 'Applied') {
            conditionalFields.style.display = 'block';
            additionalReceiptFields.style.display = 'block';
            statusField.value = 'in-progress';
        } else if (receiptStatusValue === 'Not Applied') {
            conditionalFields.style.display = 'block';
            additionalReceiptFields.style.display = 'none';
            statusField.value = 'pending';
        } else {
            conditionalFields.style.display = 'none';
            additionalReceiptFields.style.display = 'none';
            statusField.value = ''; // Clear status when no receipt status is selected
        }
    }

    // Event listeners for radio buttons and dropdowns
    statusYes.addEventListener('change', handleProcessStatusChange);
    statusNo.addEventListener('change', handleProcessStatusChange);
    receiptStatusDropdown.addEventListener('change', handleReceiptStatusChange);

    // Initialize state on page load
    handleProcessStatusChange();
});
</script>



<script>
        $('#district').select2({
            placeholder: 'Select District',
            allowClear: true
        });

    
    
     $(document).ready(function() {
        $('#state').select2({
            placeholder: 'Select District',
            allowClear: true
        });
    });
    
    
     $(document).ready(function() {
        $('#taluka-field').select2({
            placeholder: 'Select District',
            allowClear: true
        });
    });
</script>
<script>

$(document).ready(function() {
    // Initialize select2
    $('#state').select2({ placeholder: 'Select State', allowClear: true });
    $('#district').select2({ placeholder: 'Select District', allowClear: true });
    $('#taluka-field').select2({ placeholder: 'Select Taluka', allowClear: true });
    $('#designation').select2({ placeholder: 'Select Designation', allowClear: true });
    $('#department_name').select2({ placeholder: 'Select Department', allowClear: true });
    $('#organisation').select2({ placeholder: 'Select Organisation', allowClear: true });

    // Set initial values
    var initialState = '<?php echo e($user->state); ?>';
    var initialDistrict = '<?php echo e($user->district); ?>';
    var initialTaluka = '<?php echo e($user->taluka); ?>';
    var initialDesignation = '<?php echo e($user->designation_name); ?>';
    var initialDepartment = '<?php echo e($user->name); ?>';
    var initialOrganisation = '<?php echo e($user->org_name); ?>';

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
                $('#district').val(initialDistrict).trigger('change');
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
                    $('#taluka-field').val(initialTaluka).trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching talukas:', xhr.responseText);
                }
            });
        }
    }

    function loadOrganisations() {
        var state = $('#state').val();
        var district = $('#district').val();
        if (state && district) {
            $.ajax({
                url: '<?php echo e(route('organisations.get')); ?>',
                type: 'GET',
                data: { state: state, district: district },
                success: function(response) {
                    var organisationDropdown = $('#organisation');
                    organisationDropdown.empty().append('<option value="">Select Organisation</option>');
                    response.forEach(org => {
                        organisationDropdown.append($('<option>', { value: org.id, text: org.org_name }));
                    });
                    $('#organisation').val('<?php echo e($user->org_id); ?>').trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching organisations:', xhr.responseText);
                }
            });
        }
    }

function loadDepartments() {
    console.trace('Function loadDepartments called');
    var state = $('#state').val();
    var district = $('#district').val();
    var organisation = $('#organisation').val();

    console.log('State:', state, 'District:', district, 'Organisation:', organisation);
    console.log('Initial Department ID:', '<?php echo e($user->depart_id); ?>');

    if (state && district && organisation) {
        console.log('hello');
        $.ajax({
            url: '<?php echo e(route('departments.get')); ?>',
            type: 'GET',
            data: { state: state, district: district, organisation: organisation },
            success: function(response) {
                console.log('Raw Response:', response); // Log the raw response

                if (Array.isArray(response)) {
                    var departmentDropdown = $('#department_name');
                    departmentDropdown.empty().append('<option value="">Select Department</option>');

                    response.forEach(dept => {
                        departmentDropdown.append($('<option>', { value: dept.id, text: dept.name }));
                    });

                    console.log('Available Departments:', response);

                    if (response.some(dept => dept.id == '<?php echo e($user->depart_id); ?>')) {
                        departmentDropdown.val('<?php echo e($user->depart_id); ?>').trigger('change');
                        console.log('Department value set:', '<?php echo e($user->depart_id); ?>');
                    } else {
                        console.warn('Initial Department ID not found in options');
                    }
                } else {
                    console.error('Response is not an array:', response);
                }
            },
            error: function(xhr) {
                console.error('Error fetching departments:', xhr.responseText);
            }
        });
    } else {
        $('#department_name').empty().append('<option value="">Select Department</option>');
    }
}
   

    function loadDesignations() {
        var department = $('#department_name').val();
        var taluka = $('#taluka-field').val();
            var organisation = $('#organisation').val();

    if (taluka && organisation) {
            $.ajax({
                url: '<?php echo e(route('designations.getByTaluka')); ?>',
                type: 'GET',
            data: { taluka_id: taluka, organisation_id: organisation },
                success: function(response) {
                    var designationDropdown = $('#designation');
                    designationDropdown.empty().append('<option value="">-- Select Designation --</option>');
                    response.forEach(designation => {
                        designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));
                    });
                    $('#designation').val('<?php echo e($user->design_id); ?>').trigger('change');
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
                    var designationDropdown = $('#designation');
                    designationDropdown.empty().append('<option value="">-- Select Designation --</option>');
                    response.forEach(designation => {
                        designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));
                    });
                    $('#designation').val('<?php echo e($user->design_id); ?>').trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching designations:', xhr.responseText);
                }
            });
        }
    }
    // Initialize dropdowns on page load
    loadDropdowns();

    // Attach change handlers
    $('#state').change(function() {
        loadInitialDistricts();
        loadOrganisations();
    });

    $('#district').change(function() {
        loadInitialTalukas();
        loadOrganisations();
    });

    $('#organisation').change(function() {
        loadDepartments();
    });

    $('#department_name, #taluka-field').change(loadDesignations);
});

    </script>    

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/checklist-master/newchecklistedit.blade.php ENDPATH**/ ?>