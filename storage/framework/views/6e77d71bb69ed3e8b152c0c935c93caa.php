

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
    .modal-dialog {
    position: absolute;  /* Use absolute positioning */
    top: 30px;           /* Set the top position to whatever you prefer */
    left: 0%;
    transform: translateX(-50%); /* Center horizontally */
}

.modal-content {
    margin-top: 0; /* Override any margin */
}

</style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
                      <?php



?>
<div class="row">
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Organizations</h4>
                <a href="<?php echo e(route('organization.history')); ?>">
                      <button class="btn btn-sm btn-primary">
                                                History
                                            </button>
                </a>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="designationsTable">
                           <thead>
    <tr>
        <th>S. No</th>
        <th>State Name</th>
        <th>District Name</th>
        <th>Organization Name</th>
        <th>Organization Logo</th> <!-- Added column for logo -->
        <?php if((isset($permissions)) && ($permissions['organizations_master_delete'] == 2)): ?>
            <th>Action</th>
        <?php endif; ?>
    </tr>
</thead>
<tbody>
    <?php if((isset($permissions)) && ($permissions['organizations_master_view'] == 2 || $permissions['organizations_master_delete'] == 2)): ?>
        <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $org): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <tr id="tehsilRow<?php echo e($org->id); ?>">
                <td><?php echo e($organizations->perPage() * ($organizations->currentPage() - 1) + $key + 1); ?></td>
                <td><?php echo e($org->state_name); ?></td>
                <td><?php echo e($org->district_name); ?></td>
                <td><?php echo e($org->org_name); ?></td>
                
                <!-- Display the organization logo -->
                <td>
                    <?php if($org->org_logo): ?>
<a href="<?php echo e(asset('/images/' . $org->org_logo)); ?>" target="_blank">
    <img src="<?php echo e(asset('/images/' . $org->org_logo)); ?>" alt="Organization Logo" style="max-height: 60px;">
</a>
                    <?php else: ?>
                        <span>No Logo</span>
                    <?php endif; ?>
                </td>
                
                
                <?php if((isset($permissions)) && ($permissions['organizations_master_delete'] == 2)): ?>
                    <td>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-sm btn-primary edit-item-btn me-2" data-bs-toggle="modal" data-bs-target="#editRecordModal" data-id="<?php echo e($org->id); ?>" data-state="<?php echo e($org->state_name); ?>" data-district="<?php echo e($org->district_name); ?>" data-orgname="<?php echo e($org->org_name); ?>"
        data-orglogo="<?php echo e(asset('/images/' . $org->org_logo)); ?>"> 
                                Edit
                            </button>
                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="<?php echo e($org->id); ?>">
                                Remove
                            </button>
                        </div>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</tbody>

                        </table>
                                             <?php if($organizations->isNotEmpty()): ?>
                    <div class="d-flex justify-content-center">
                        <?php echo $organizations->links(); ?>

                    </div>
                    <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php if((isset($permissions)) && (($permissions['organizations_master_create'] == 2) )): ?>
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Add Organizations</h4>
            </div>
            <div class="card-body">
                <div class="live-preview">
<form action="<?php echo e(route('store-organization')); ?>" method="POST" class="row g-3" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-12">
                            <input type="hidden" name="owner_id" value="<?php echo e(Auth::user()->id); ?>">
                            <label for="state" class="form-label">State Name</label>
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
                            <label for="district" class="form-label">District Name</label>
                            <select id="district" name="district" class="form-select mb-3" required>
                                <option value="">Select District</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="tehshil_name" class="form-label">Organization Name</label>
                            <input type="text" name="org_name" class="form-control <?php $__errorArgs = ['org_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="org_name" placeholder="Enter organization name">
                            <?php $__errorArgs = ['org_name'];
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
    <label for="edit-org_logo" class="form-label">Organization Logo</label>
    <input type="file" name="org_logo" class="form-control <?php $__errorArgs = ['org_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="edit-org_logo" accept="image/*" onchange="previewImage()">
    
    <!-- Image Preview -->
    <div class="mt-3">
        <img id="org_logo_preview" src="#" alt="Organization Logo Preview" style="display: none; max-height: 150px; border: 1px solid #ddd; padding: 5px;">
    </div>
    
    <?php $__errorArgs = ['org_logo'];
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

<script>
    function previewImage() {
        var file = document.getElementById('edit-org_logo').files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var preview = document.getElementById('org_logo_preview');
            preview.src = e.target.result;
            preview.style.display = 'block'; // Show the preview
        };

        // Read the image file as a data URL
        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>

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

<!-- Modal for Deleting Record -->
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
<!-- Modal for Editing Record -->
<div class="modal fade zoomIn" id="editRecordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 50px;"> <!-- Adjust this value to control how far down from the top the modal opens -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Organization</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close-edit"></button>
            </div>
            <div class="modal-body">
<form id="editForm" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <input type="hidden" name="id" id="edit-id">
    <div class="mb-3">
        <label for="edit-state" class="form-label">State Name</label>
        <select id="edit-state" name="state" class="form-select mb-3" required>
            <option value="">Select state</option>
            <?php $__currentLoopData = $statesData['states']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($state['state']); ?>"><?php echo e($state['state']); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="edit-district" class="form-label">District Name</label>
        <select id="edit-district" name="district" class="form-select mb-3" required>
            <option value="">Select District</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="edit-org_name" class="form-label">Organization Name</label>
        <input type="text" name="org_name" class="form-control" id="edit-org_name" required>
    </div>
  <div class="mb-3">
    <label for="edit-org_logo" class="form-label">Organization Logo</label>
    <input type="file" name="org_logo" class="form-control" id="edit-org_logo" accept="image/*">
</div>
<div class="mb-3">
    <label for="current-org_logo" class="form-label">Current Organization Logo</label>
    <div id="current-org_logo">
        <img src="" alt="Current Logo" id="currentLogoImg" style="max-height: 60px; display: none;">
        <span id="noLogoMessage" style="display: none;">No Logo</span>
    </div>
</div>

    
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
            </div>
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

    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
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
    
    
</script>
<script>
    $(document).ready(function() {
    $('#editRecordModal').on('shown.bs.modal', function () {
        $('#edit-state').select2({
            placeholder: 'Select state',
            allowClear: true,
            dropdownParent: $('#editRecordModal') // Ensure the dropdown is appended to the modal
        });

        $('#edit-district').select2({
            placeholder: 'Select district',
            allowClear: true,
            dropdownParent: $('#editRecordModal')
        });


    });
});
</script>

<script>
// Handle edit button click to populate the modal
document.querySelectorAll('.edit-item-btn').forEach(button => {
    button.addEventListener('click', function () {
        var id = this.getAttribute('data-id');
        var state = this.getAttribute('data-state');
        var district = this.getAttribute('data-district');
        var orgName = this.getAttribute('data-orgname');
        var orgLogo = this.getAttribute('data-orglogo'); // Add this line to retrieve the logo

        // Set values in the modal
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-org_name').value = orgName;

        // Set state
        var editStateSelect = document.getElementById('edit-state');
        editStateSelect.value = state;

        // Populate districts based on the selected state
        populateDistricts(state, district);

        var currentLogoImg = document.getElementById('currentLogoImg');
        var noLogoMessage = document.getElementById('noLogoMessage');

        if (orgLogo) {
            currentLogoImg.src = orgLogo; // Set the image source
            currentLogoImg.style.display = 'block'; // Show the image
            noLogoMessage.style.display = 'none'; // Hide the "No Logo" message
        } else {
            currentLogoImg.style.display = 'none'; // Hide the image
            noLogoMessage.style.display = 'block'; // Show the "No Logo" message
        }
    });
});

// Function to populate districts based on the selected state
function populateDistricts(state, selectedDistrict) {
    var statesData = <?php echo json_encode($statesData['states'], 15, 512) ?>; // Retrieve states data from PHP
    var selectedState = statesData.find(item => item.state === state);
    var editDistrictDropdown = $('#edit-district');
    editDistrictDropdown.empty().append('<option value="">Select District</option>'); // Clear existing options

    if (selectedState) {
        selectedState.districts.forEach(function(district) {
            editDistrictDropdown.append($('<option>', {
                value: district,
                text: district
            }));
        });
    }

    // Set the selected district if applicable
    editDistrictDropdown.val(selectedDistrict);
}

// Handle state selection change in edit modal
document.getElementById('edit-state').addEventListener('change', function() {
    var newState = this.value;
    populateDistricts(newState, ''); // Clear the district selection when state changes
});

// Handle form submission

</script>

<script>
    
    $(document).ready(function() {
    // Submit the form via AJAX
    $('#editForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
        
        // Create FormData object to handle file uploads
        var formData = new FormData(this);
        
        var id = $('#edit-id').val(); // Get the ID of the organization being edited
        var url = '/organizationss/' + id; // Use the route with the ID

        $.ajax({
            url: url,
            type: 'POST', // Use POST for the update (with _method PUT in FormData)
            data: formData,
            contentType: false, // Important for file upload
            processData: false, // Important for file upload
            success: function(response) {
                if(response.success) {
                    // If update is successful, close the modal
                    $('#editRecordModal').modal('hide');

                    // Optionally, reload part of the page or update the table with new data
                    // Example:
                    // $('#organizationTable').load(window.location.href + ' #organizationTable');
                    
                    // Show a success message (optional)
                    alert('Organization updated successfully!');
                } else {
                    // If there are validation errors, show them
                    console.log(response.errors);
                    $.each(response.errors, function(key, error) {
                        // Show the error (you can also display them in the modal)
                        alert(error);
                    });
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText); // Log any errors for debugging
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


    // Handle delete button click to set form action
    document.querySelectorAll('.remove-item-btn').forEach(button => {
        button.addEventListener('click', function () {
            var id = this.getAttribute('data-id');
            var deleteForm = document.getElementById('deleteForm');
            deleteForm.action = `/organization/${id}`;
            deleteForm.dataset.id = id; // Store ID for later use
        });
    });

    // Handle form submission for deletion
    document.getElementById('deleteForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        var form = this;
        var formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest', // To signal it's an AJAX request
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove the row from the table
                var row = document.getElementById(`tehsilRow${form.dataset.id}`);
                if (row) row.remove();

                // Hide the modal
                var modal = bootstrap.Modal.getInstance(document.getElementById('deleteRecordModal'));
                if (modal) {
                    modal.hide();
                }
            } else {
                alert('Failed to delete the record.');
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

</script>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/checklist-master/organization.blade.php ENDPATH**/ ?>