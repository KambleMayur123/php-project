
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
                         
<div class="row">
    
<div class="col-xxl-7">
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Departments</h4>
             <a href="<?php echo e(route('departments.showdata')); ?>" ><button class="btn btn-sm btn-success mx-2 " data-id="">
                                        <i class="fa fa-eye"></i> History
                                    </button></a>
            
        </div>
        <div class="card-body">
            <div class="live-preview">
                <div class="table-responsive" id="departmentTableContent">
                    <!-- Department Table -->
                    <table class="table table-bordered" id="departmentsTable">
                        <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Department Name</th>
                                            <th>State</th>
            <th>District</th>
            <th>Taluka</th>
            <th>Organization</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if((isset($permissions)) && (
    ($permissions['department_view'] == 2) || 
   
    ($permissions['department_edit'] == 2) || 
    ($permissions['department_delete'] == 2)
)): ?>
                       <?php if($departments->isNotEmpty()): ?>
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="departmentRow<?php echo e($department->id); ?>">
    <td><?php echo e(($departments->currentPage() - 1) * $departments->perPage() + $loop->iteration); ?></td>
                                <td class="departmentName"><?php echo e($department->name); ?></td>
                                            <td class="statename"><?php echo e($department->state); ?></td>
            <td class="districtname"><?php echo e($department->district); ?></td>
            <td class="taluka"><?php echo e($department->taluka); ?></td>
            <td class="organisation"><?php echo e($department->org_name); ?></td>

                                <td style="display:flex">
                                   
                                    <?php if((isset($permissions)) && (($permissions['department_edit'] == 2))): ?>
                                    <button class="btn btn-sm btn-primary mx-2 editDepartment" data-id="<?php echo e($department->id); ?>">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && ( ($permissions['department_delete'] == 2))): ?>
                                    <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="<?php echo e($department->id); ?>">
                                       Remove
                                    </button>
                                    <?php endif; ?>
                                   
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                     <?php if($departments->isNotEmpty()): ?>
                    <div class="d-flex justify-content-center">
                        <?php echo $departments->links(); ?>

                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if((isset($permissions)) && (($permissions['department_create'] == 2))): ?>
    <div class="col-xxl-5">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Add Department</h4>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <form action="<?php echo e(route('departments.store')); ?>" method="POST" class="row g-3">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="owner_id" value="<?php echo e(Auth::user()->id); ?>" >
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
                            <label for="organisation" class="form-label">select organization</label>
                            <select id="organisation" name="organisation" class="form-select mb-3" required>
                                <option value="">Select organization</option>
                            </select>
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
                            <label for="name" class="form-label">Department Name</label>
                            <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" placeholder="Enter department name">
                            <?php $__errorArgs = ['name'];
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
</div>
<?php endif; ?>

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
<div class="modal fade" id="editDepartmentModal" tabindex="-1" aria-labelledby="editDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editDepartmentForm" method="POST" action="">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" name="id" id="editDepartmentId"> <!-- Hidden input for department ID -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editDepartmentModalLabel">Edit Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                    <div class="mb-3">
                        <label for="editDistrict" class="form-label">Select District</label>
                        <select id="editDistrict" name="district" class="form-select mb-3" required>
                            <option value="">Select District</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editOrganisation" class="form-label">Select Organization</label>
                        <select id="editOrganisation" name="organisation" class="form-select mb-3" required>
                            <option value="">Select Organization</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editTaluka" class="form-label">Taluka</label>
                        <select id="editTaluka" name="taluka" class="form-select mb-3">
                            <option value="">Select Taluka</option>
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
                    <div class="mb-3">
                        <label for="editName" class="form-label">Department Name</label>
                        <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="editName" required>
                        <?php $__errorArgs = ['name'];
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
    <script src="<?php echo e(URL::asset('build/js/pages/listjs.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    
    
    
    
    
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

</script>
<script>
    $(document).ready(function() {
    $('#editDepartmentModal').on('shown.bs.modal', function () {
        $('#editState').select2({
            placeholder: 'Select state',
            allowClear: true,
            dropdownParent: $('#editDepartmentModal') // Ensure the dropdown is appended to the modal
        });

        $('#editDistrict').select2({
            placeholder: 'Select district',
            allowClear: true,
            dropdownParent: $('#editDepartmentModal')
        });

        $('#editTaluka').select2({
            placeholder: 'Select taluka',
            allowClear: true,
            dropdownParent: $('#editDepartmentModal')
        });
        
        
        
        $('#editOrganisation').select2({
            placeholder: 'Select Organisation',
            allowClear: true,
            dropdownParent: $('#editDepartmentModal')
        });


    });
});
</script>

<script>
$(document).ready(function() {
    // Handle Edit Department Modal
    $('.editDepartment').click(function() {
        var id = $(this).data('id');
        $.get('/departments/' + id + '/edit', function(data) {
            $('#editDepartmentModal').modal('show');
            $('#editDepartmentId').val(data.id); // Set department ID
            $('#editName').val(data.name);

            // Set existing state and trigger change
            $('#editState').val(data.state).change();

            // Set existing district and trigger change if available
            $('#editDistrict').val(data.district).change();

            // Store the selected taluka and organisation in data attributes
            $('#editTaluka').data('selected-taluka', data.taluka); 
            $('#editOrganisation').data('selected-organisation', data.organisation); 
        $('#editDepartmentForm').attr('action', '/departments/' + id);

            console.log('Selected Taluka:', data.taluka);
            console.log('Selected Organisation:', data.organisation);
        });
    });
        $('#editDepartmentForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var form = $(this);
        var actionUrl = form.attr('action'); // Use the action URL from the form
        var formData = form.serialize();

        $.ajax({
            url: actionUrl,
            type: 'PUT',
            data: formData,
            success: function(response) {
                console.log(response);
                var id = response.id;
                $('#departmentRow' + id + ' .departmentName').text(response.name);
                $('#editDepartmentModal').modal('hide');
        Swal.fire({
            title: 'Success!',
            text: 'Department updated successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
        });
            },
            error: function(response) {
                alert('An error occurred while trying to update the department.');
            }
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

        // Clear taluka and organization dropdowns
        $('#editTaluka').empty().append('<option value="">Select Taluka</option>');
        $('#editOrganisation').empty().append('<option value="">Select Organisation</option>');
    });

    // Handle district selection change for talukas
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

                    // Now set the selected taluka
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

                    // Now set the selected organisation
                    var selectedOrganisation = $('#editOrganisation').data('selected-organisation');
                    if (selectedOrganisation) {
                        $('#editOrganisation').val(selectedOrganisation);
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
});

</script>

<script>
    $(document).ready(function() {
        // Handle Edit Department Modal
  
        
           $('.remove-item-btn').click(function() {
        var id = $(this).data('id');
        $('#deleteForm').attr('action', '/departments/' + id);
    });

    // Handle Delete Department Form Submission
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
                $('#departmentRow' + id).remove();
                $('#deleteRecordModal').modal('hide');
                alert('Department deleted successfully.');
            },
            error: function(response) {
                alert('An error occurred while trying to delete the department.');
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


        
        
        
        
        
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/departments/index.blade.php ENDPATH**/ ?>