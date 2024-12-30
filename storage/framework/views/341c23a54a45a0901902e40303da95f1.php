
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.view-nomination'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Nomination Details</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <!--<form class="leave-form" autocomplete="off">-->

                    <!-- State, District, Taluka -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <input type="text" id="state" name="state" class="form-control" value="<?php echo e($nomination->state); ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="district" class="form-label">District</label>
                            <input type="text" id="district" name="district" class="form-control" value="<?php echo e($nomination->district); ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="organisation" class="form-label">Organisation</label>
                            <input type="text" id="organisation" name="organisation" class="form-control" value="<?php echo e($nomination->org_name ?? ''); ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="department_name" class="form-label">Department</label>
                            <input type="text" id="department_name" name="depart_id" class="form-control" value="<?php echo e($nomination->name ?? ''); ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="taluka-field" class="form-label">Taluka</label>
                            <input type="text" id="taluka-field" name="taluka" class="form-control" value="<?php echo e($nomination->taluka); ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" id="designation" name="design_id" class="form-control" value="<?php echo e($nomination->designation_name ?? ''); ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Profile Name</label>
                            <input type="text" id="name" name="user_id" class="form-control" value="<?php echo e($nomination->first_name); ?> <?php echo e($nomination->last_name); ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="position-field" class="form-label">Position</label>
                            <input type="text" id="position-field" name="position" class="form-control" value="<?php echo e($nomination->position); ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="dob-field" class="form-label">Date of Birth</label>
                            <input type="date" id="birth_date" name="birth_date" class="form-control" value="<?php echo e(\Carbon\Carbon::parse($nomination->birth_date)->format('Y-m-d')); ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="join-date-field" class="form-label">Joining Date</label>
                            <input type="date" id="join-date-field" name="join_date" class="form-control" value="<?php echo e(\Carbon\Carbon::parse($nomination->join_date)->format('Y-m-d')); ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nomination_type" class="form-label">Nomination Type</label>
                            <input type="text" id="nomination_type" name="nomination_type" class="form-control" value="<?php echo e($nomination->nomination_type); ?>" readonly>
                        </div>
                    </div>

                    <div id="nominee-sections">
                        <?php $__currentLoopData = $nominationDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="nominee-section mb-4">
                            <h5>Nominee <?php echo e($index + 1); ?></h5>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="nominee-name-field-<?php echo e($index); ?>" class="form-label">Nominee Name</label>
                                    <input type="text" id="nominee-name-field-<?php echo e($index); ?>" name="nominee_name[]" class="form-control" value="<?php echo e($detail->nominee_name); ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="nominee_dob-field-<?php echo e($index); ?>" class="form-label">Nominee Date of Birth</label>
                                    <input type="date" id="nominee_dob-field-<?php echo e($index); ?>" name="nominee_dob[]" class="form-control" value="<?php echo e($detail->nominee_dob); ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="nominee-age-field-<?php echo e($index); ?>" class="form-label">Nominee Age</label>
                                    <input type="number" id="nominee-age-field-<?php echo e($index); ?>" name="nominee_age[]" class="form-control" value="<?php echo e($detail->nominee_age); ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="atypical_event-field-<?php echo e($index); ?>" class="form-label">Atypical Event</label>
                                    <input type="text" id="atypical_event-field-<?php echo e($index); ?>" name="atypical_event[]" class="form-control" value="<?php echo e($detail->atypical_event); ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="relationship_nominee-field-<?php echo e($index); ?>" class="form-label">Relationship with Nominee</label>
                                    <input type="text" id="relationship_nominee-field-<?php echo e($index); ?>" name="relationship_nominee[]" class="form-control" value="<?php echo e($detail->relationship_nominee); ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="nominee_type-<?php echo e($index); ?>" class="form-label">Nominee Type</label>
                                    <input type="text" id="nominee_type-<?php echo e($index); ?>" name="nominee_type[]" class="form-control" value="<?php echo e($detail->nominee_type); ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="nominee-amount-field-<?php echo e($index); ?>" class="form-label">Nominee Amount</label>
                                    <input type="text" id="nominee-amount-field-<?php echo e($index); ?>" name="nominee_amount[]" class="form-control" value="<?php echo e($detail->nominee_amount); ?>" readonly>
                                </div>
                            </div>

                            <input type="hidden" name="nominee_id[]" value="<?php echo e($detail->id); ?>">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

  <form action="<?php echo e(route('nomination.updateStatus', $nomination->nid)); ?>" id="nomination-status-form" method="POST">
 
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>

    <div class="row">
        <div class="col-md-12 mb-3">
             
          
            <?php if(($nomination->sstatus =='pending' || ($nomination->sstatus == 'approved_clerk' && $nomination->frwd_hod_id == Auth::user()->id )) && Auth::user()->is_admin == 'staff' ): ?>
          
            <!-- Approve Button -->
              <button type="button" id="send-button" class="btn btn-primary me-2" data-docuser="<?php echo e($nomination->nid); ?>" data-bs-toggle="modal" data-bs-target="#ForwardModel">Send</button>

              
            <button type="button" id="approve-button" class="btn btn-success me-2" data-docuser ="<?php echo e($nomination->nid); ?>" >Send & Sign</button>

            <!-- Reject Button -->
            <button type="button" id="reject-button" class="btn btn-danger">Reject</button>
             <?php elseif(($nomination->sstatus === 'pending' || $nomination->sstatus === 'approved_clerk') && Auth::user()->is_admin != 'staff'): ?>
                   <button type="button"  class="btn btn-warning me-2"  >Pending</button>
            <?php elseif($nomination->sstatus == 'approved'): ?>
              <button type="button"  class="btn btn-success me-2">Approved</button>
            <?php elseif($nomination->sstatus == 'rejected'): ?>
            <button type="button"  class="btn btn-danger">Rejected</button>
              <?php endif; ?>
        </div>
    </div>

    <!-- Hidden input field for status -->
    <input type="hidden" name="status" id="status-field" value="">

    <!-- Hidden input field for rejection description -->
    <input type="hidden" name="reject_description" id="reject-description-field" value="">

    <!-- Rejection Modal (Ensure this modal is included in your HTML) -->
    <div class="modal fade" id="rejectionModal" tabindex="-1" aria-labelledby="rejectionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectionModalLabel">Rejection Reason</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea id="reject-description-field-modal" class="form-control" placeholder="Enter rejection reason"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="submit-reject" class="btn btn-danger">Submit Rejection</button>
                </div>
            </div>
        </div>
    </div>
</form>
 <?php
 
                                 $role = DB::table('roles')->where('id', Auth::user()->role_name)->first();
$letter_user = DB::table('users')->where('id', $nomination->user_id)->first();

$staffs = DB::table('users')
    ->join('departments', 'users.depart_id', '=', 'departments.id')
    ->join('designations', 'users.design_id', '=', 'designations.id')
    ->where('users.id', '!=', Auth::user()->id)  // Explicit users.id
    ->where('users.is_admin', 'staff')  // Explicit users.is_admin
    ->where('users.state', $letter_user->state)  // Explicit users.state
    ->where('users.district', $letter_user->district)  // Explicit users.district
    ->where('users.org_id', $letter_user->org_id)  // Explicit users.org_id
    ->where(function($query) use ($letter_user) {
        // Match taluka if it exists, or if the staff taluka is null
        $query->whereNull('users.taluka')  // Explicit users.taluka
              ->orWhere('users.taluka', $letter_user->taluka);
    })
    ->where('users.depart_id', $letter_user->depart_id)  // Explicit users.depart_id
    ->where('users.design_id', $letter_user->design_id)  // Explicit users.design_id
    ->select('users.*', 'departments.name as department_name', 'designations.designation_name')
    ->get();

       


                                    ?>   
<div class="modal fade" id="VerifyClerk" tabindex="-1" aria-labelledby="VerifyClerkLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="VerifyClerkLabel">Verify Otp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                           <div class="form-group" id="frwd_hod" style="display:none">
                                    <label for="hod">Forward To Staff</label>
                                    <select name="hod" class="form-control select2" id="hod_id"  >
                                       
                                      <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->first_name); ?>-<?php echo e($staff->department_name); ?>-<?php echo e($staff->designation_name); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     
                                    </select>
                                </div>
                                  <div class="form-group" >
                                      <label for="hod">Otp</label>
                                  <input type="text" name="otp" class="form-control" placeholder="Enter otp" />
                                  </div>
                </div>
              
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="submitverify" class="btn btn-danger">Submit </button>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="ForwardModel" tabindex="-1" aria-labelledby="ForwardModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ForwardModelLabel">Forward </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!--<form id="frwd_to_staff_Form"> -->
                    <div class="form-group">
                        <input type="hidden" name="frwd_user_id" value="<?php echo e(Auth::user()->id); ?>" id="frwd_user_id">
                        <input type="hidden" name="frwd_leave_id" value="<?php echo e($nomination->nid); ?>" id="frwd_leave_id">
                        <label for="frwd_hod_id">Forward To Staff</label>
                        <select name="frwd_hod_id" class="form-control select2" id="frwd_hod_id">
                            <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php
                         
    $role_staff = DB::table('roles')->where('id', $staff->role_name)->first();
    
?>
<?php if(isset($role_staff) && $role_staff->role_name != 'HOD'): ?>
                                       <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->first_name); ?>-<?php echo e($staff->department_name); ?>-<?php echo e($staff->designation_name); ?></option>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                <!--</form> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="submitfrwd" class="btn btn-danger">Submit</button>
            </div>
        </div>
    </div>
</div>
                    <div style="display: flex; justify-content: flex-end; gap: 10px;">
                        <div class="hstack gap-2">
                            <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo e(route('nomination-index')); ?>'">Back</button>
                        </div>
                    </div>

                <!--</form>-->

            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- listjs init -->
    <script src="<?php echo e(URL::asset('build/js/pages/listjs.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
        <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

        
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="<?php echo e(URL::asset('build/js/pages/select2.init.js')); ?>"></script>


<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<script>
$(document).ready(function() {
    $('#frwd_hod_id').select2({
        placeholder: "Select a staff member",
        allowClear: true
    });
      $('#hod_id').select2({
        placeholder: "Select a staff member",
        allowClear: true
    });
});
</script>


<script>

    document.addEventListener('DOMContentLoaded', function () {
    const approveButton = document.getElementById('approve-button');
    const rejectButton = document.getElementById('reject-button');
    const rejectionModal = new bootstrap.Modal(document.getElementById('rejectionModal'));
    const verifyClerkModal = new bootstrap.Modal(document.getElementById('VerifyClerk'));
    const userId = approveButton.getAttribute('data-docuser'); // Get the document user ID from the button attribute

    // Approve Button Click Event with AJAX
    approveButton.addEventListener('click', function () {
        const apiUrl = '/api/send-otp-digital'; // Route for sending OTP
        const statusField = document.getElementById('status-field');
        statusField.value = 'approved'; // Set the status field to 'approved'

        // Perform the AJAX request
        fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Include CSRF token for security
            },
            body: JSON.stringify({
                user_id: '<?php echo e(Auth::user()->id); ?>',
                page_id: userId,
                page: 'nomination'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // If 'data' is "OTHER", show the OTP modal and manage the select field
                if (data.data === 'OTHER') {
                    verifyClerkModal.show();

                    // Check if the role is HOD
                    const hodField = document.getElementById('frwd_hod');
                    
                    // If the data contains 'HOD', do not show the select
                    if (data.data === 'HOD') {
                        hodField.style.display = 'none'; 
                       
                        // Keep the select hidden
                    } else {
                        hodField.style.display = 'block'; // Show the select field for non-HOD users
                    }
                }else{
                    verifyClerkModal.show();

                    // Check if the role is HOD
                    const hodField = document.getElementById('frwd_hod');
                    
                    // If the data contains 'HOD', do not show the select
                    if (data.data === 'HOD') {
                        hodField.style.display = 'none'; 
                       
                        // Keep the select hidden
                    } else {
                        hodField.style.display = 'block'; // Show the select field for non-HOD users
                    }
                }

            } else {
                alert('Failed to send OTP. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while sending OTP.');
        });
    });

    // Submit OTP for Verification
    document.getElementById('submitverify').addEventListener('click', function () {
    const otpValue = document.querySelector('input[name="otp"]').value;
    const hodId = document.querySelector('select[name="hod"]').value; // Only used if hod field is visible
    

    if (otpValue) {
        fetch('/api/verify-otp-digital', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                user_id: '<?php echo e(Auth::user()->id); ?>',
                page_id: userId,
                page: 'nomination',
                verify_otp: otpValue,
                hod_id: hodId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('OTP verified successfully.');
                console.log(data);
                if (data.data === 'approved_clerk' || data.data === 'approved') {
                    const statusField = document.getElementById('status-field');
                    statusField.value = data.data; // Set status field value

                    // Submit the form after setting the status
                    document.getElementById('nomination-status-form').submit();
                }
                verifyClerkModal.hide(); // Close the modal on success
            } else {
                alert('OTP verification failed: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while verifying OTP.');
        });
    } else {
        alert('Please enter the OTP.');
    }
});


    // Reject Button Click Event
    rejectButton.addEventListener('click', function () {
        // Show the rejection modal
        rejectionModal.show();
    });

    // Submit Rejection Button Click Event
    document.getElementById('submit-reject').addEventListener('click', function () {
        const rejectDescription = document.getElementById('reject-description-field-modal').value;

        if (rejectDescription) {
            // Set the reject description in the form
            const rejectDescriptionField = document.getElementById('reject-description-field');
            rejectDescriptionField.value = rejectDescription;

            // Set the status to rejected in the hidden input field
            const statusField = document.getElementById('status-field');
            statusField.value = 'rejected';

            // Close the modal and submit the form
            rejectionModal.hide();
            document.getElementById('nomination-status-form').submit();
        } else {
            alert("Please enter a reason for rejection.");
        }
    });
});

</script>
<script>
    $(document).ready(function() {
    // Click event for submit button in the modal
    $('#submitfrwd').on('click', function(e) {
        e.preventDefault(); // Prevent the default form submission
      

        // Collect form data
        var formData = {
            frwd_user_id: $('#frwd_user_id').val(),
            frwd_leave_id: $('#frwd_leave_id').val(),
            frwd_hod_id: $('#frwd_hod_id').val(),
           
        };

        // Send AJAX request to the API
        $.ajax({
            url: '/api/forward-user-nomination',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // If CSRF token is needed
            },
            success: function(response) {
                if (response.success) {
                    alert('Nomination forwarded successfully');
                    $('#ForwardModel').modal('hide'); // Close the modal
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + error);
            }
        });
    });
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/nomination/viewnomination.blade.php ENDPATH**/ ?>