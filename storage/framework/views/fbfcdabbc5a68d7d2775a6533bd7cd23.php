
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
           <?php


?>
<div class="row">
    <div class="col-xxl-7">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Designations</h4>
                <a href="<?php echo e(route('designations.showdata')); ?>"> <button class="btn btn-sm btn-success mx-2 " data-id="">
                                        <i class="fa fa-eye"></i> History
                                    </button></a>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="designationsTable">
                            <thead>
                                <tr>
                                    <th>S. No</th>
                                    <th>Department Name</th>
                                    <th>Designation Name</th>
                                    <th>State</th>
                                    <th>District</th>
                                    <th>taluka</th>
                                    <th>organization</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if((isset($permissions)) && (
    ($permissions['designation_view'] == 2) || 
    
    ($permissions['designation_edit'] == 2) || 
    ($permissions['designation_delete'] == 2)
)): ?>
                                <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="designationRow<?php echo e($designation->id); ?>">
    <td><?php echo e(($designations->currentPage() - 1) * $designations->perPage() + $loop->iteration); ?></td>
                                    <td><?php echo e($designation->department_name); ?></td>

                                    <td class="designationName"><?php echo e($designation->designation_name); ?></td>
                                    <td><?php echo e($designation->state); ?></td>
                                    <td><?php echo e($designation->district); ?></td>
                                    <td><?php echo e($designation->taluka); ?></td>
                                    <td><?php echo e($designation->org_name); ?></td>

                                <td style="display:flex">
                                  
                                    <?php if((isset($permissions)) && (($permissions['designation_edit'] == 2) )): ?>
                                    <button class="btn btn-sm btn-primary mx-2 editDesignation" data-id="<?php echo e($designation->id); ?>">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['designation_delete'] == 2))): ?>
                                         <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="<?php echo e($designation->id); ?>">
                                           Remove
                                           </button>
                                         <?php endif; ?>
                                          
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                                            <div class="d-flex justify-content-center">
                        <?php echo $designations->links(); ?>

                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php if((isset($permissions)) && (($permissions['designation_create'] == 2))): ?>
    <div class="col-xxl-5">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Add Designation</h4>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <form action="<?php echo e(route('designations.store')); ?>" method="POST" class="row g-3">
                        <?php echo csrf_field(); ?>
<input type="hidden" name="owner_id" value="<?php echo e(auth()->user()->id); ?>">

                         <div class="col-md-12">
                            <label for="state" class="form-label">Select State</label>
                            <select id="state" name="state" class="form-select mb-3" required>
                                <option value="">Select state</option>
                                <?php $__currentLoopData = $statesData['states']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($state['state']); ?>"><?php echo e($state['state']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['state'];
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
                        <div class="col-md-12">
                            <label for="district" class="form-label">Select District</label>
                            <select id="district" name="district" class="form-select mb-3" required>
                                <option value="">Select District</option>
                            </select>
                        </div>
                        
                        
                         <div class="col-md-12">
                            <label for="organisation" class="form-label">Select Organization</label>
                            <select id="organisation" name="organisation" class="form-select mb-3" required>
                                <option value="">Select organization</option>
                            </select>
                        </div>
                      
                        
                                                
                         

                        <div class="col-md-12">
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
                        
                        
                                                <div class="col-md-12">
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
                        
                        

                        <div class="col-md-12">
                            <label for="name" class="form-label">Designation Name</label>
                            <input type="text" name="designation_name" class="form-control <?php $__errorArgs = ['designation_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="designation_name" placeholder="Enter designation name">
                            <?php $__errorArgs = ['designation_name'];
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
                        <div class="col-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>


<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <div class="modal-body text-center">
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                    <h4>Are you Sure?</h4>
                    <p class="text-muted mx-4 mb-0">Are you sure you want to remove this record?</p>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <form id="deleteForm" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-sm btn-light">Yes, delete it</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editDesignationModal" tabindex="-1" aria-labelledby="editDesignationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editDesignationForm" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="modal-header">
                    <h5 class="modal-title" id="editDesignationModalLabel">Edit Designation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <!-- Owner ID (hidden) -->
                    <input type="hidden" name="owner_id" value="<?php echo e(auth()->user()->id); ?>">
                    
                    <!-- State -->
                    <div class="mb-3">
                        <label for="editState" class="form-label">Select State</label>
                        <select id="editState" name="state" class="form-select mb-3" required>
                            <option value="">Select state</option>
                            <?php $__currentLoopData = $statesData['states']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($state['state']); ?>"><?php echo e($state['state']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['state'];
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

                    <!-- District -->
                    <div class="mb-3">
                        <label for="editDistrict" class="form-label">Select District</label>
                        <select id="editDistrict" name="district" class="form-select mb-3" required>
                            <option value="">Select District</option>
                        </select>
                    </div>

                    <!-- Organisation -->
                    <div class="mb-3">
                        <label for="editOrganisation" class="form-label">Select Organization</label>
                        <select id="editOrganisation" name="organisation" class="form-select mb-3" required>
                            <option value="">Select organization</option>
                        </select>
                    </div>

                    <!-- Department -->
<div class="mb-3">
    <label for="editDepartmentName" class="form-label">Select Department</label>
    <select id="editDepartmentName" name="department_name" class="form-select mb-3">
        <option value="" disabled selected>-- Select Department --</option>
        <option value="">Select department</option>
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


                    <!-- Taluka -->
                    <div class="mb-3">
                        <label for="editTaluka" class="form-label">Taluka</label>
                        <select id="editTaluka" name="taluka" class="form-select">
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

                    <!-- Designation Name -->
                    <div class="mb-3">
                        <label for="editDesignationName" class="form-label">Designation Name</label>
                        <input type="text" name="designation_name" class="form-control <?php $__errorArgs = ['designation_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="editDesignationName" placeholder="Enter designation name">
                        <?php $__errorArgs = ['designation_name'];
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

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>

    <!-- listjs init -->
    <script src="<?php echo e(URL::asset('build/js/pages/listjs.init.js')); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        
        
        
           
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="<?php echo e(URL::asset('build/js/pages/select2.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>


        
        
        <script>
    $(document).ready(function() {
        $('#district').select2({
            placeholder: 'Select District',
            allowClear: true
        });
    });
    
    
    
     $(document).ready(function() {
        $('#state').select2({
            placeholder: 'Select state',
            allowClear: true
        });
    });
    
    
     $(document).ready(function() {
        $('#taluka-field').select2({
            placeholder: 'Select taluka',
            allowClear: true
        });
    });
    
        $(document).ready(function() {
        $('#organisation').select2({
            placeholder: 'Select organization',
            allowClear: true
        });
    });






        $(document).ready(function() {
        $('#department_name').select2({
            placeholder: 'Select department',
            allowClear: true
        });
    });

</script>

<script>
    $(document).ready(function() {
    $('#editDesignationModal').on('shown.bs.modal', function () {
        $('#editState').select2({
            placeholder: 'Select state',
            allowClear: true,
            dropdownParent: $('#editDesignationModal') // Ensure the dropdown is appended to the modal
        });

        $('#editDistrict').select2({
            placeholder: 'Select district',
            allowClear: true,
            dropdownParent: $('#editDesignationModal')
        });

        $('#editTaluka').select2({
            placeholder: 'Select taluka',
            allowClear: true,
            dropdownParent: $('#editDesignationModal')
        });
        
        
        
        $('#editOrganisation').select2({
            placeholder: 'Select Organisation',
            allowClear: true,
            dropdownParent: $('#editDesignationModal')
        });

  
        $('#editDepartmentName').select2({
            placeholder: 'Select Department',
            allowClear: true,
            dropdownParent: $('#editDesignationModal')
        });

    });
});
</script>

<script>
$(document).ready(function() {
    // Handle Edit Designation Modal
    $('.editDesignation').click(function() {
        var id = $(this).data('id');
        $.get('/designations/' + id + '/edit', function(data) {
            $('#editDesignationModal').modal('show');
            $('#editDesignationId').val(data.id); // Set designation ID
            $('#editDesignationName').val(data.designation_name); // Set designation name
            
            // Set existing state and trigger change
            $('#editState').val(data.state).change();
            
            // Set existing district and trigger change if available
            $('#editDistrict').val(data.district).change();
            
            // Store the selected taluka, organisation, and department in data attributes
            $('#editTaluka').data('selected-taluka', data.taluka);
            $('#editOrganisation').data('selected-organisation', data.organisation);
            $('#editDepartmentName').data('selected-department', data.department_name); // Ensure department selection

            // Set form action URL dynamically
            $('#editDesignationForm').attr('action', '/designations/' + id);
        });
    });

    // Handle state selection change
    $('#editState').change(function() {
        var state = $(this).val();
        var statesData = <?php echo json_encode($statesData['states'], 15, 512) ?>; // Pass states data to JavaScript
        
        var districtDropdown = $('#editDistrict');
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

        // Clear taluka, organisation, and department dropdowns
        $('#editTaluka').empty().append('<option value="">Select Taluka</option>');
        $('#editOrganisation').empty().append('<option value="">Select Organisation</option>');
        $('#editDepartmentName').empty().append('<option value="">Select Department</option>'); // Clear department dropdown
    });

    // Handle district selection change for talukas, organisations, and departments
    $('#editDistrict').change(function() {
        var state = $('#editState').val();
        var district = $(this).val();

        if (state && district) {
            // Fetch Talukas
            $.ajax({
                url: '<?php echo e(route('tehsils.get')); ?>',
                type: 'GET',
                data: { state: state, district: district },
                success: function(response) {
                    var talukaDropdown = $('#editTaluka');
                    talukaDropdown.empty().append('<option value="">Select Taluka</option>');

                    response.forEach(function(taluka) {
                        talukaDropdown.append($('<option>', {
                            value: taluka,
                            text: taluka
                        }));
                    });

                    // Set the selected taluka
                    var selectedTaluka = $('#editTaluka').data('selected-taluka');
                    if (selectedTaluka) {
                        $('#editTaluka').val(selectedTaluka);
                    }
                },
                error: function(xhr) {
                    console.error('Error fetching talukas:', xhr.responseText);
                }
            });

            // Fetch Organisations
            $.ajax({
                url: '<?php echo e(route('organisations.get')); ?>',
                type: 'GET',
                data: { state: state, district: district },
                success: function(response) {
                    var organisationDropdown = $('#editOrganisation');
                    organisationDropdown.empty().append('<option value="">Select Organisation</option>');

                    response.forEach(function(org) {
                        organisationDropdown.append($('<option>', {
                            value: org.id,
                            text: org.org_name
                        }));
                    });

                    // Set the selected organisation
                    var selectedOrganisation = $('#editOrganisation').data('selected-organisation');
                    if (selectedOrganisation) {
                        $('#editOrganisation').val(selectedOrganisation);
                    }

                    // Trigger department fetch after organisation selection
                    $('#editOrganisation').trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching organisations:', xhr.responseText);
                }
            });
        } else {
            console.warn('State or district is missing.');
        }
    });

    // Handle organisation selection change to fetch departments
    $('#editOrganisation').change(function() {
        var state = $('#editState').val();
        var district = $('#editDistrict').val();
        var organisation = $(this).val();

        if (state && district && organisation) {
            // Fetch Departments
            $.ajax({
                url: '<?php echo e(route('departments.get')); ?>',
                type: 'GET',
                data: { state: state, district: district, organisation: organisation },
                success: function(response) {
                    var departmentDropdown = $('#editDepartmentName'); // Updated selector to match
                    departmentDropdown.empty().append('<option value="">Select Department</option>');

                    response.forEach(function(department) {
                        departmentDropdown.append($('<option>', {
                            value: department.id,
                            text: department.name
                        }));
                    });

                    // Set the selected department
                    var selectedDepartment = $('#editDepartmentName').data('selected-department');
                    if (selectedDepartment) {
                        $('#editDepartmentName').val(selectedDepartment);
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

    // Handle form submission for editing designation
    $('#editDesignationForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var formAction = $(this).attr('action');
        $.ajax({
            url: formAction,
            type: 'POST',
            data: $(this).serialize(), // Serialize the form data
            success: function(response) {
                $('#editDesignationModal').modal('hide');
                Swal.fire({
                    title: 'Success!',
                    text: 'Designation updated successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload(); // Reload the page to reflect changes
                    }
                });
            },
            error: function(xhr) {
                // Show error alert
                Swal.fire({
                    title: 'Error!',
                    text: 'There was an error updating the designation. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
</script>




<script>
    
    
    
            $(document).ready(function() {
            // Handle state selection change
            $('#state').change(function() {
                var state = $(this).val();
                var statesData = <?php echo json_encode($statesData['states'], 15, 512) ?>; // Pass states data to JavaScript

                var districtDropdown = $('#district');
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

                $('#taluka-field').empty().append('<option value="">Select Taluka</option>');
                $('#name').empty().append('<option value="">Select Profile Name</option>'); // Clear existing options
            });

            // Handle district selection change
            $('#district').change(function() {
                var state = $('#state').val();
                var district = $(this).val();

                if (state && district) {
                    $.ajax({
                        url: '<?php echo e(route('tehsils.get')); ?>', // Ensure this matches your route
                        type: 'GET',
                        data: { state: state, district: district },
                        success: function(response) {
                            var talukaDropdown = $('#taluka-field');
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

            // Handle taluka selection change
            $('#taluka-field').change(function() {
                var state = $('#state').val();
                var district = $('#district').val();
                var taluka = $(this).val(); 

                if (state && district && taluka) {
                    $.ajax({
                        url: '<?php echo e(route('fetch.profiles')); ?>',
                        type: 'GET',
                        data: { state: state, district: district, taluka: taluka },
                        success: function(response) {
                            var profileDropdown = $('#name');
                            profileDropdown.empty().append('<option value="">Select Profile Name</option>');

                            response.forEach(function(user) {
                                profileDropdown.append($('<option>', {
                                    value: user.id,
                                    text: `${user.first_name} ${user.last_name}`
                                }));
                            });
                        },
                        error: function(xhr) {
                            console.error('Error fetching profiles:', xhr.responseText);
                        }
                    });
                }
            });
        });
        
        
        
        
        
        
        
        
        
        
        $('#district').change(function() {
    var state = $('#state').val();
    var district = $(this).val();

    if (state && district) {
        // AJAX request to fetch organisations
        $.ajax({
            url: '<?php echo e(route('organisations.get')); ?>',
            type: 'GET',
            data: { state: state, district: district },
            success: function(response) {
                var organisationDropdown = $('#organisation');
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





                     $('#organisation').change(function() {
    var state = $('#state').val();
        var district = $('#district').val();

    var organisation = $(this).val();

    if (state && district && organisation) {
        $.ajax({
            url: '<?php echo e(route('departments.get')); ?>',
            type: 'GET',
            data: { state: state, district: district ,  organisation: organisation},
            success: function(response) {
                var departmentDropdown = $('#department_name');
                departmentDropdown.empty().append('<option value="">Select department</option>');

                if (response.length === 0) {
                    console.warn('No organisations found for the selected district.');
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
                console.error('Error fetching organisations:', xhr.responseText);
            }
        });
    } else {
        console.warn('State or district is missing.');
    }
});

      
             
          
        
        
        

</script>











<script>
$(document).ready(function() {
    // Handle Edit Designation Modal
    $('.editDesignation').click(function() {
        var id = $(this).data('id');
        // Open your edit modal here, and pass the ID as needed
        // Example: $('#editDesignationModal').modal('show');
        // You can also make an AJAX call to get the details for the edit form
    });

    // Handle Remove Designation Modal and form submission
    $('.remove-item-btn').click(function() {
        var id = $(this).data('id');
        $('#deleteForm').attr('action', '/designations/' + id); // Update the form action to designations
    });

    // Handle Delete Designation Form Submission
    $('#deleteForm').submit(function(event) {
        event.preventDefault();

        var form = $(this);
        var actionUrl = form.attr('action');
        var id = actionUrl.split('/').pop(); // Extract ID from URL

        $.ajax({
            url: actionUrl,
            type: 'DELETE',
            data: form.serialize(),
            success: function(response) {
                $('#designationRow' + id).remove(); // Updated to reflect designations row
                $('#deleteRecordModal').modal('hide');
                alert('Designation deleted successfully.');
            },
            error: function(response) {
                alert('An error occurred while trying to delete the designation.');
            }
        });
    });
});
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/designation/index.blade.php ENDPATH**/ ?>