
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.view-affidavit'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Affidavit Details</h4>
            </div>

            <div class="card-body">
             
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="state" class="form-label">State:</label>
                            <input type="text" class="form-control" id="state" value="<?php echo e($Affidavit->state); ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="district" class="form-label">District:</label>
                            <input type="text" class="form-control" id="district" value="<?php echo e($Affidavit->district); ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="organisation" class="form-label">Organization:</label>
                            <input type="text" class="form-control" id="organisation" value="<?php echo e($Affidavit->org_name); ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="department_name" class="form-label">Department:</label>
                            <input type="text" class="form-control" id="department_name" value="<?php echo e($Affidavit->name); ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="taluka-field" class="form-label">Taluka:</label>
                            <input type="text" class="form-control" id="taluka-field" value="<?php echo e($Affidavit->taluka); ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="designation" class="form-label">Designation:</label>
                            <input type="text" class="form-control" id="designation" value="<?php echo e($Affidavit->designation_name); ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Profile Name:</label>
                            <input type="text" class="form-control" id="name" value="<?php echo e($Affidavit->first_name); ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="affidavit_name" class="form-label">Affidavit Name:</label>
                            <input type="text" class="form-control" id="affidavit_names" value="<?php echo $Affidavit->affidavit_names; ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="memo" class="form-label">Memo:</label>
                            <?php echo $Affidavit->affidavit_memo; ?>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
    <label for="reference_docs" class="form-label">Reference Documents:</label>
    <?php if($Affidavit->refrence_docs): ?>
        <a href="<?php echo e(asset('images/'.$Affidavit->refrence_docs)); ?>" target="_blank" class="">View PDF</a>
    <?php else: ?>
        <p>No documents uploaded.</p>
    <?php endif; ?>
</div>

                    </div>

<!--                   <div class="row mb-4">-->
<!--    <div class="col-md-3">-->
<!--        <h5 class="form-label">Witness Signature:</h5>-->
<!--        <div >-->
<!--            <?php if($Affidavit->witness_signature): ?>-->
<!--                <a href="<?php echo e(asset('images/'.$Affidavit->witness_signature)); ?>" target="_blank">-->
<!--                    <img src="<?php echo e(asset('images/'.$Affidavit->witness_signature)); ?>" alt="Witness Signature" class="img-fluid" style="max-width: 200px; margin-top: 10px;" />-->
<!--                </a>-->
<!--            <?php else: ?>-->
<!--                <p class="text-muted">No signature uploaded.</p>-->
<!--            <?php endif; ?>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!--<div class="row mb-4">-->
<!--    <div class="col-md-3">-->
<!--        <h5 class="form-label">HOD Signature:</h5>-->
<!--        <div >-->
<!--            <?php if($Affidavit->hod_signature): ?>-->
<!--                <a href="<?php echo e(asset('images/'.$Affidavit->hod_signature)); ?>" target="_blank">-->
<!--                    <img src="<?php echo e(asset('images/'.$Affidavit->hod_signature)); ?>" alt="HOD Signature" class="img-fluid" style="max-width: 200px; margin-top: 10px;" />-->
<!--                </a>-->
<!--            <?php else: ?>-->
<!--                <p class="text-muted">No signature uploaded.</p>-->
<!--            <?php endif; ?>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!--<div class="row mb-4">-->
<!--    <div class="col-md-3">-->
<!--        <h5 class="form-label">Clerk Signature:</h5>-->
<!--        <div  >-->
<!--            <?php if($Affidavit->clerk_signature): ?>-->
<!--                <a href="<?php echo e(asset('images/'.$Affidavit->clerk_signature)); ?>" target="_blank">-->
<!--                    <img src="<?php echo e(asset('images/'.$Affidavit->clerk_signature)); ?>" alt="Clerk Signature" class="img-fluid" style="max-width: 200px; margin-top: 10px;" />-->
<!--                </a>-->
<!--            <?php else: ?>-->
<!--                <p class="text-muted">No signature uploaded.</p>-->
<!--            <?php endif; ?>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


 <form action="<?php echo e(route('affidavit.updateStatus', $Affidavit->id)); ?>" id="transferForm" method="POST">
 
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>

    <div class="row">
        <div class="col-md-12 mb-3">
           
            <?php if((($Affidavit->status =='pending' || ($Affidavit->status == 'approved_clerk' && $Affidavit->frwd_hod_id == Auth::user()->id )) && Auth::user()->is_admin == 'staff' )): ?>
          
            <!-- Approve Button -->
           
              <button type="button" id="send-button" class="btn btn-primary me-2" data-docuser="<?php echo e($Affidavit->id); ?>" data-bs-toggle="modal" data-bs-target="#ForwardModel">Send</button>

              
            <button type="button" id="approve-button" class="btn btn-success me-2" data-docuser ="<?php echo e($Affidavit->id); ?>" >Send & Sign</button>

            <!-- Reject Button -->
            <button type="button" id="reject-button" class="btn btn-danger">Reject</button>
            
             <?php elseif(($Affidavit->status == 'pending' || $Affidavit->status == 'approved_clerk') && Auth::user()->is_admin != 'staff'): ?>
                   <button type="button"  class="btn btn-warning me-2"  >Pending</button>
            <?php elseif($Affidavit->status == 'approved'): ?>
              <button type="button"  class="btn btn-success me-2">Approved</button>
            <?php elseif($Affidavit->status == 'rejected'): ?>
            <button type="button"  class="btn btn-danger">Rejected</button>
              <?php endif; ?>
              <?php if($Affidavit->witness_status == 'pending' && ($Affidavit->status != 'rejected' || $Affidavit->status != 'approved') ): ?>
              <button type="button" id="verify-button" class="btn btn-primary me-2" data-docuser ="<?php echo e($Affidavit->id); ?>" >Verify Witness Digital Signature </button>
              <?php endif; ?>
              
        </div>
    </div>

    <!-- Hidden input field for status -->
    <input type="hidden" name="status" id="status-field" value="">
    <input type="hidden" name="status_type" id="status-field-type" value="">

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

$letter_user = DB::table('users')->where('id', $Affidavit->user_id)->first();

$staffs = DB::table('users')
    ->where('users.id', '!=', Auth::user()->id)
    ->join('departments', 'users.depart_id', '=', 'departments.id')
    ->join('designations', 'users.design_id', '=', 'designations.id')
    ->where('users.is_admin', 'staff')
    ->where('users.state', $letter_user->state)
    ->where('users.district', $letter_user->district)
    ->where('users.org_id', $letter_user->org_id)
    ->where(function($query) use ($letter_user) {
        $query->whereNull('users.taluka')
              ->orWhere('users.taluka', $letter_user->taluka);
    })
    ->where('users.depart_id', $letter_user->depart_id)
    ->where('users.design_id', $letter_user->design_id)
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
    
    <div class="modal fade" id="VerifyUserClerk" tabindex="-1" aria-labelledby="VerifyUserClerkLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="VerifyUserClerkLabel">Verify Otp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                           
                                  <div class="form-group" >
                                      <label for="hod">Otp</label>
                                  <input type="text" name="user_otp" class="form-control" placeholder="Enter otp" />
                                  </div>
                </div>
              
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="submituserverify" class="btn btn-danger">Submit </button>
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
                        <input type="hidden" name="frwd_leave_id" value="<?php echo e($Affidavit->id); ?>" id="frwd_leave_id">
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
<button class="btn btn-primary" onclick="window.history.back()">Back</button>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.x/dist/js/bootstrap.bundle.min.js"></script>

    <!-- listjs init -->
    <script src="<?php echo e(URL::asset('build/js/pages/listjs.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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

<script src="<?php echo e(URL::asset('build/js/pages/select2.init.js')); ?>"></script>  
 <?php if($Affidavit->witness_status == 'pending'): ?>
<script>

    document.addEventListener('DOMContentLoaded', function () {
    const verifyButton = document.getElementById('verify-button');

    const verifyUserClerkModal = new bootstrap.Modal(document.getElementById('VerifyUserClerk'));
    const userId = verifyButton.getAttribute('data-docuser'); // Get the document user ID from the button attribute

    // Approve Button Click Event with AJAX
    verifyButton.addEventListener('click', function () {
        const apiUrl = '/api/send-otp-digital'; // Route for sending OTP
        const statusField = document.getElementById('status-field');
        
        statusField.value = 'approved'; // Set the status field to 'approved'
         const statusFieldType = document.getElementById('status-field-type');
        
        statusFieldType.value = 'user';

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
                page: 'witness_affidavit'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
               
                    verifyUserClerkModal.show();

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
    document.getElementById('submituserverify').addEventListener('click', function () {
    const otpValue = document.querySelector('input[name="user_otp"]').value;
   
    

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
                page: 'witness_affidavit',
                verify_otp: otpValue,
              
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('OTP verified successfully.');
                console.log(data);
              
                verifyUserClerkModal.hide(); // Close the modal on success
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


});

</script>
<?php endif; ?>
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
   const statusFieldType = document.getElementById('status-field-type');
        
        statusFieldType.value = 'other';
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
                page: 'affidavit'
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
                page: 'affidavit',
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
                      const statusFieldType = document.getElementById('status-field-type');
        
        statusFieldType.value = 'other';

                    // Submit the form after setting the status
                    document.getElementById('transferForm').submit();
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
            document.getElementById('transferForm').submit();
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
            url: '/api/forward-user-affidavit',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // If CSRF token is needed
            },
            success: function(response) {
                if (response.success) {
                    alert(' forwarded successfully');
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
 <script>
//     document.addEventListener('DOMContentLoaded', function () {
//         const affidavitForm = document.getElementById('affidavitFormNew');

//         // Check if form is found
//         if (!affidavitForm) {
//             console.error('Affidavit form not found.');
//             return; // Prevent further execution if form is not found
//         }

//         // Handle Approve button click
//         document.getElementById('approveButton').addEventListener('click', function () {
//             // Set status to 'approved'
//             document.getElementById('reject-description-field').value = ''; // Clear any previous rejection description
//             document.getElementById('status-field').value = 'approved';
            
//             // Submit the form directly
//             affidavitForm.submit();
//         });

//         // Handle Reject button click
//         document.getElementById('rejectButton').addEventListener('click', function () {
//             // Show the rejection modal
//             var rejectModal = new bootstrap.Modal(document.getElementById('rejectModal'));
//             rejectModal.show();
//         });

//         // Handle Confirm Reject button click inside the modal
//         document.getElementById('confirmRejectButton').addEventListener('click', function () {
//             // Get the rejection description from the modal
//             var rejectDescription = document.getElementById('modal-reject-description').value;

//             if (rejectDescription.trim() === '') {
//                 alert('Please enter a reason for rejection.');
//                 return; // Prevent form submission if the description is empty
//             }

//             // Set status to 'rejected' and rejection description
//             document.getElementById('status-field').value = 'rejected';
//             document.getElementById('reject-description-field').value = rejectDescription;

//             // Hide the modal
//             var rejectModal = bootstrap.Modal.getInstance(document.getElementById('rejectModal'));
//             rejectModal.hide();

//             // Submit the form
//             affidavitForm.submit();
//         });
        
//         console.log(affidavitForm); // Log form element to check if it's found
//     });
// </script>
     <script>
// document.getElementById('status-field').addEventListener('change', function() {
//       const status = this.value;
//     const rejectRow = document.getElementById('reject-description-row');
//     const submitButtonRow = document.getElementById('submit-button-row');
//     const signAndSendRow = document.getElementById('sign-and-send-row');

//     rejectRow.style.display = 'none';
//     submitButtonRow.style.display = 'none';
//     signAndSendRow.style.display = 'none';

//     if (status === 'rejected') {
//         rejectRow.style.display = 'block';
//         submitButtonRow.style.display = 'block';
//     } else if (status === 'approved') {
//         signAndSendRow.style.display = 'block';  
//     } else if (status === 'pending') {
//         submitButtonRow.style.display = 'block';  
//     }
// });


// document.getElementById('signAndSendButton').addEventListener('click', function() {
//     $('#otpModal').modal('show');  
// });

// document.getElementById('verifyButton').addEventListener('click', function() {
//     const otp = document.getElementById('otp-field').value;

//     if (otp === "123456") {
//         alert("OTP verified successfully!");
//         $('#otpModal').modal('hide');
//     } else {
//         document.getElementById('otpError').style.display = 'block';
//     }
// });
// </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/affidavit/affidavitshow.blade.php ENDPATH**/ ?>