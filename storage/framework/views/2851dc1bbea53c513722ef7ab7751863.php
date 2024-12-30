<?php $__env->startSection('title'); ?>
    Add Letter
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
        if (Auth::user()->is_admin == 'staff' || Auth::user()->is_admin == 'organization') {
    // Fetch permissions for 'staff' from the database as an array
    $permission = DB::table('role_permissions')
        ->where('role_name', Auth::user()->role_name)
        ->first();

    // Check if permissions are found
    if ($permission) {
        // Convert the object to an associative array
        $permissions = (array) $permission;
    } else {
        // Create an array to hold the modified permissions
        $permissions = [];

        // List of modules and permission suffixes
        $modules = [
            'dashborad', 'department', 'designation', 'organization', 'staff', 'role',
            'permission', 'report', 'userprofile', 'userdetail', 'document', 'leave',
            'nomination', 'salary', 'checklist', 'trans_join', 'other_receipt', 'affidavit',
            'achievement', 'receipt_master', 'checklist_master', 'tehsils', 'document_master',
            'organizations_master', 'leave_category', 'nomination_type', 'affidavit_type',
            'achievement_type','audit','pension'
        ];
        $permissionSuffixes = ['view', 'create', 'edit', 'delete'];

        // Set permissions for the allowed actions to 0 (default)
        foreach ($modules as $module) {
            foreach ($permissionSuffixes as $suffix) {
                $permissions["{$module}_{$suffix}"] = 1;
            }
        }
    }
   
    
} else if (Auth::user()->is_admin == 'admin') {
    // Create an array to hold the modified permissions
    $permissions = [];

    // List of modules and permission suffixes
    $modules = [
        'dashborad', 'department', 'designation', 'organization', 'staff', 'role',
        'permission', 'report', 'userprofile', 'userdetail', 'document', 'leave',
        'nomination', 'salary', 'checklist', 'trans_join', 'other_receipt', 'affidavit',
        'achievement', 'receipt_master', 'checklist_master', 'tehsils', 'document_master',
        'organizations_master', 'leave_category', 'nomination_type', 'affidavit_type',
        'achievement_type','audit','pension'
    ];
    $permissionSuffixes = ['view', 'create', 'edit', 'delete'];

    // Set permissions for the allowed actions to 2 (admin level)
    foreach ($modules as $module) {
        foreach ($permissionSuffixes as $suffix) {
            $permissions["{$module}_{$suffix}"] = 2;
        }
    }
     
    
} else {
    // Create an array to hold the modified permissions
    $permissions = [];

    // List of modules and permission suffixes
    $modules = [
        'dashborad', 'department', 'designation', 'organization', 'staff', 'role',
        'permission', 'report', 'userprofile', 'userdetail', 'document', 'leave',
        'nomination', 'salary', 'checklist', 'trans_join', 'other_receipt', 'affidavit',
        'achievement', 'receipt_master', 'checklist_master', 'tehsils', 'document_master',
        'organizations_master', 'leave_category', 'nomination_type', 'affidavit_type',
        'achievement_type','audit','pension'
    ];
    $permissionSuffixes = ['view', 'create', 'edit', 'delete'];

    // Set permissions for the allowed actions to 0 (default)
    foreach ($modules as $module) {
        foreach ($permissionSuffixes as $suffix) {
            $permissions["{$module}_{$suffix}"] = 1;
        }
    }
       
   
}  
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Letter</h4>
                </div>
                <div class="card-body">
                    
                    <!--<form action="<?php echo e(route('receipts.update' , $letter->id)); ?>" method="POST" enctype="multipart/form-data" id="mainform">-->
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                     <input type="hidden" name="owner_id" class="form-control" id="owner" value="<?php echo e(Auth::user()->id); ?>">
                        <div class="row">

                            
                            <div class="col-md-6">
                                
                                   
<div class="elebtn" style="display: flex; align-items: center; gap: 10px;">
            <button class="upload" id="uploadBtn" style="padding: 2px 15px;
            border: none;
            background-color: #0056ac;
            color: white;
            font-size: 14px;
            margin-right: 10px;
            cursor: pointer;
            border-radius: 3px;">
                Upload <i class="fas fa-upload"></i>
            </button>
    <input type="file" id="fileInput" name="letter_content" accept="application/pdf" style="display: none;" />

            
            <button class="remove" id="removeBtn" style='padding: 2px 15px;
            border: none;
           
            color: white;
            font-size: 14px;
            margin-right: 10px;
            cursor: pointer;
            border-radius: 3px;'>
                Remove <i class="fa-solid fa-xmark"></i>
            </button>
            <p style="color:red;margin-bottom:0px;"> PDF ONLY <= 20MB</p>
            </div>
            <div class="file-name" id="fileName"></div>

            <!-- Container for the PDF viewer -->
            <iframe id="pdfViewer" style="width:100%; height:500px; display:none;" frameborder="0"></iframe>


                                <div class="form-group">
                                    <label for="letter_content">Letter Content</label>
                                    <textarea id="summernote" name="letter_content" class="form-control"> <?php echo $letter->letter_content; ?></textarea>
                                </div>
                            </div>

                            <!-- Second Column: Form Fields -->
                           
                     <div class="col-md-6">
                         <?php $user_data = DB::table('users')
    ->leftJoin('organizations', 'users.org_id', '=', 'organizations.id')
    ->leftJoin('departments', 'users.depart_id', '=', 'departments.id')
    ->leftJoin('tehsils', 'users.taluka', '=', 'tehsils.id')
    ->leftJoin('designations', 'users.design_id', '=', 'designations.id')
    ->where('users.id', $letter->user_id)
    ->select('users.*', 'organizations.org_name', 'departments.name as department_name', 'designations.designation_name','tehsils.th_name')
    ->first();?>
                               <div class="form-group">
                        <label for="state" >State</label>
                        <input type="text" id="state" name="state" class="form-control" value="<?php echo e($user_data->state); ?>" readonly>
                       </div>
                   
                        <div class="form-group">
                        <label for="district">District</label>
                        <input type="text" id="district" name="district" class="form-control" value="<?php echo e($user_data->district); ?>" readonly>
                    </div>
                    
                               
                
                                <div class="form-group">
                        <label for="organisation"> Organization</label>
                        <input type="text" id="organisation" name="org_id" class="form-control" value="<?php echo e($user_data->org_name); ?>" readonly>
                    </div>

                                <div class="form-group">
                        <label for="department_name"> Department</label>
                        <input type="text" id="department_name" name="department_name" class="form-control" value="<?php echo e($user_data->department_name); ?>" readonly>
                    </div>
     
                                <div class="form-group">
                        <label for="taluka">Taluka</label>
                        <input type="text" id="taluka" name="taluka" class="form-control" value="<?php echo e($user_data->th_name); ?>" readonly>
                    </div>
                   
                                <div class="form-group">
                        <label for="designation" >Designation</label>
                        <input type="text" id="designation" name="designation" class="form-control" value="<?php echo e($user_data->designation_name); ?>" readonly>
                    </div>
                        <div class="form-group">
                        <label for="designation" >Receipt NO</label>
                        <input type="text" id="receipt_no"  class="form-control" value="<?php echo e($letter->receipt_no); ?>" readonly>
                    </div>
                        <div class="form-group">
                        <label for="designation" >Receipt Category </label>
                        <input type="text" id="receipt_checklist_id" class="form-control" value="<?php echo e($letter->receipt_checklist_id); ?>" readonly>
                    </div>
                        <div class="form-group">
                        <label for="designation" >Subject</label>
                        <input type="text" id="subject" class="form-control" value="<?php echo e($letter->subject); ?>" readonly>
                    </div>
                    
                                <div class="form-group">
                                    <label for="letter_no">Letter No.</label>
                                    <input type="text" name="letter_no" class="form-control" id="letter_no" required>
                                </div>

                                <div class="form-group">
                                    <label for="date_generated">Date of Generated</label>
                                    <input type="date" name="date_of_generated" class="form-control flatpickr" id="date_generated" required>
                                </div>
                                
                            
      
                <form action="<?php echo e(route('otherdetails.updateStatus', $letter->id)); ?>" id="achievement-form" method="POST">
 
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>

    <div class="row">
        <div class="col-md-12 mb-3">
            <?php if(($letter->status =='pending' || ($letter->status == 'approved_clerk' && $letter->frwd_hod_id == Auth::user()->id )) && Auth::user()->is_admin == 'staff' ): ?>
          
            <!-- Approve Button -->
              <button type="button" id="send-button" class="btn btn-primary me-2" data-docuser="<?php echo e($letter->id); ?>" data-bs-toggle="modal" data-bs-target="#ForwardModel">Send</button>

              
            <button type="button" id="approve-button" class="btn btn-success me-2" data-docuser ="<?php echo e($letter->id); ?>" >Send & Sign</button>

            <!-- Reject Button -->
            <button type="button" id="reject-button" class="btn btn-danger">Reject</button>
             <?php elseif(($letter->status == 'pending' || $letter->status == 'approved_clerk') && Auth::user()->is_admin != 'staff'): ?>
                   <button type="button"  class="btn btn-warning me-2"  >Pending</button>
            <?php elseif($letter->status == 'approved'): ?>
              <button type="button"  class="btn btn-success me-2">Approved</button>
            <?php elseif($letter->status == 'rejected'): ?>
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

$letter_user = DB::table('users')->where('id', $letter->user_id)->first();

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
                        <input type="hidden" name="frwd_leave_id" value="<?php echo e($letter->id); ?>" id="frwd_leave_id">
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
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="submitfrwd" class="btn btn-danger">Submit</button>
            </div>
        </div>
    </div>
</div>   
                        <?php
                                   $role = DB::table('roles')->where('id', Auth::user()->role_name)->first();
$letter_user = DB::table('users')->where('id', $letter->user_id)->first();
$staffs = collect();  // Use collect() to make it easier to merge results

$check_hod = DB::table('roles')->where('role_name', 'HOD')->get();

foreach ($check_hod as $check) {
    // Fetch staff that matches the conditions
    $matched_staffs = DB::table('users')
        ->where('is_admin', 'staff')  // Check if the user is staff
        ->where('role_name', $check->id)  // Match HOD role
        ->where('state', $letter_user->state)  // Match state
        ->where('district', $letter_user->district)  // Match district
        ->where('org_id', $letter_user->org_id)  // Match organization ID
        ->where(function($query) use ($letter_user) {
            // Match taluka if it exists, or if the staff taluka is null
            $query->whereNull('taluka')
                  ->orWhere('taluka', $letter_user->taluka);
        })
        ->where('depart_id', $letter_user->depart_id)  // Match department ID
        ->where('design_id', $letter_user->design_id)  // Match designation ID
        ->get();

    // Merge the matched staff into the main $staffs collection
    $staffs = $staffs->merge($matched_staffs);
}

// Now $staffs contains all matched staff across the HOD roles

                                    ?>        
                                
                           <?php if((isset($role->role_name) && $role->role_name != 'HOD' && $letter->receipt_status == 'pending') || (isset($role->role_name) && $role->role_name == 'HOD' && $letter->receipt_status != 'approved')): ?>
                                <!--<div class="form-group">-->
                                <!--    <label for="status">Status</label>-->
                                <!--    <select name="receipt_status" class="form-control select2" id="Status"  data-receipt="<?php echo e($letter->id); ?>" required>-->
                                <!--      <option value="">Select Status</option>  -->
                                <!--     <option value="approved">Approved</option>-->
                                <!--        <option value="rejected">Rejected</option>-->
                                <!--    </select>-->
                                <!--</div>-->
                         <?php endif; ?>
                         
<!--                                <div id="verify_section" style="display:none">-->
                                    
<!--                                   <?php if(isset($role->role_name) && $role->role_name != 'HOD'): ?>-->
<!--                                     <div class="form-group">-->
<!--                                    <label for="hod">Forward To Staff</label>-->
<!--                                    <select name="hod" class="form-control select2" id="hod_id"  >-->
                                       
<!--                                      <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
<!--                                       <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->first_name); ?></option>-->
<!--                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                                     
<!--                                    </select>-->
<!--                                </div>-->
<!--                                    <?php endif; ?>-->
<!--    <input style="margin:10px 0px;" type="text" name="verify_otp" class="form-control" id="otp" placeholder="Enter OTP">-->
<!--    <button class="btn btn-primary "type="button" id="verify_otp_btn" data-receipt_id="<?php echo e($letter->id); ?>" data-user_id="<?php echo e(Auth::user()->id); ?>">Verify OTP</button>-->
<!--</div>-->

<div style="display: flex; justify-content: flex-end; gap: 10px; " id="submitBButtonSection">
    <!--<div class="hstack gap-2">-->
    <!--    <button type="submit" class="btn btn-success">submit</button>-->
    <!--</div>-->

    <div class="hstack gap-2">
        <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo e(route('receipts.index')); ?>'">Back</button>
    </div>
</div>                            </div>
                        </div> <!-- End Row -->
                    
                    <!--</form>-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <!-- jQuery -->
    <!-- Bootstrap JS -->
    <!-- SweetAlert -->
    <!-- Select2 -->
 <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>

    <!-- listjs init -->
    <script src="<?php echo e(URL::asset('build/js/pages/listjs.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
    
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
//     $(document).ready(function() {
//         $('#Status').on('change', function() {
//             var selectedValue = $(this).val();
//             var receiptId = $(this).data('receipt');

//             if (selectedValue === 'approved') {
//                 $.ajax({
//                     url: '/api/send-otp-other-digital',
//                     type: 'POST',
//                     data: {
//                         receipt_id: receiptId,
//                         user_id: '<?php echo e(Auth::user()->id); ?>',
//                         _token: '<?php echo e(csrf_token()); ?>' // Include CSRF token for security
//                     },
//                     success: function(response) {
//                         if (response.success) {
//                             // Show the verify section when OTP is successfully sent
//                             $('#verify_section').css('display', 'block');
//                              $('#submitBButtonSection').hide();
                          
//                         } else {
//                             alert(response.message); // Show error message
//                         }
//                     },
//                     error: function(xhr) {
//                         console.log('Error:', xhr);
//                         alert('Something went wrong. Please try again.');
//                     }
//                 });
//             } else {
//                 // Hide the verify section if the status is not approved
//                 $('#verify_section').css('display', 'none');
//             }
//         });
//     });
// </script>
 <script>
// $(document).ready(function() {
//     $('#verify_otp_btn').on('click', function() {
//         // Get the OTP entered in the input field
//         var otp = $('#otp').val();
//         var hod_id = $('#hod_id').val();
//         // Check if the OTP field is not empty
//         if (otp.trim() === '') {
//             alert('Please enter OTP.');
//             return;
//         }
        

//         // Get additional data from the button attributes
//         var receiptId = $(this).data('receipt_id');
//         var userId = $(this).data('user_id');

//         // Send an AJAX request to the 'verify-other-digital-otp' API route
//         $.ajax({
//             url: '/api/verify-otp-other-digital',
//             type: 'POST',
//             data: {
//                 receipt_id: receiptId,
//                 user_id: userId,
//                 verify_otp: otp,
//                 hod_id :hod_id
//             },
//             success: function(response) {
//                 // Handle the response
//                 if (response.success) {
//                     alert('OTP verified successfully!');
//                     // Optionally, hide or update the verify section based on success
//                     $('#verify_section').hide();
//                     $('#submitBButtonSection').css('display', 'block');
//                 } else {
//                     alert('OTP verification failed: ' + response.message);
//                 }
//             },
//             error: function(xhr, status, error) {
//                 // Handle AJAX error
//                 console.error('Error:', error);
//                   alert('OTP verification failed: ' + error);
//             }
//         });
//     });
// });
// </script>

    <script>
        $(document).ready(function() {
            // Initialize Summernote
            $('#summernote').summernote({
                height: 300, // Set editor height
                tabsize: 2,  // Set tab size
                placeholder: 'Write your letter content here...',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
    
    

        
        
<script>
        // Get the current date
        const today = new Date();
        
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0'); 
        const dd = String(today.getDate()).padStart(2, '0');

        const formattedDate = `${yyyy}-${mm}-${dd}`;
        
        document.getElementById('diaryDate').value = formattedDate;
    </script>
    <script>
document.getElementById('fileInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    
    if (file) {
        const fileName = document.getElementById('fileName');
        fileName.textContent = file.name;
        
        if (file.type === 'application/pdf') {
            const pdfViewer = document.getElementById('pdfViewer');
            pdfViewer.src = URL.createObjectURL(file);
            pdfViewer.style.display = 'block';
            console.log("hide");
        $('#summernote').parent().hide(); // Hides the entire Summernote container
        } else {
            const pdfViewer = document.getElementById('pdfViewer');
            pdfViewer.style.display = 'none'; // Hide PDF preview if not a PDF
            
            // Show Summernote editor again using jQuery
            $('#summernote').closest('.note-editor').show();
        }
    }
});

document.getElementById('uploadBtn').addEventListener('click', function(e) {
    const fileInput = document.getElementById('fileInput');
    
    // Check if a file is selected
    if (fileInput.files.length === 0) {
        e.preventDefault(); // Prevent form submission

        // Trigger the file input click to open file picker
        fileInput.click();
    } else {
        // Proceed with the upload if a file is selected
        alert('File is ready to be uploaded!');
    }
});

document.getElementById('removeBtn').addEventListener('click', function(e) {
    e.preventDefault(); // Prevent default button behavior

    // Clear file input
    const fileInput = document.getElementById('fileInput');
    fileInput.value = ''; 
    
    // Clear file name display
    document.getElementById('fileName').textContent = ''; 
    
    // Hide PDF preview
    const pdfViewer = document.getElementById('pdfViewer');
    pdfViewer.style.display = 'none';
    
    // Show the Summernote editor again using jQuery
    $('#summernote').closest('.note-editor').show();
});

</script>


<script>
    function generateLetterNo() {
        const randomNum = Math.floor(100000 + Math.random() * 900000);
        return 'LN' + randomNum;
    }

    function setTodayDate() {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('letter_no').value = generateLetterNo();
        document.getElementById('date_generated').value = setTodayDate();
        
        document.getElementById('letter_no').readOnly = true;
document.getElementById('date_generated').readOnly = true;

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
                page: 'other_reciept'
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
    var memoEditorContent = $('#summernote').summernote('code').trim(); 
 // Get and trim the content from memo-editor

   

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
                page: 'other_reciept',
                verify_otp: otpValue,
                hod_id: hodId, // Pass the selected hod_id if needed
                other_note_dis: memoEditorContent // Pass the memo content if available, else null
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('OTP verified successfully.');
                if (data.data === 'approved_clerk' || data.data === 'approved') {
                    const statusField = document.getElementById('status-field');
                    statusField.value = data.data; // Set status field value

                    // Submit the form after setting the status
                    document.getElementById('achievement-form').submit();
                }
                verifyClerkModal.hide(); // Close the modal on success
            } else {
                alert('OTP verification failed: ' + data.message);
            }
        })
       
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
            document.getElementById('achievement-form').submit();
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
        var memoEditorContent = $('#summernote').summernote('code').trim(); 

    
        // Collect form data
        var formData = {
            frwd_user_id: $('#frwd_user_id').val(),
            frwd_leave_id: $('#frwd_leave_id').val(),
            frwd_hod_id: $('#frwd_hod_id').val(),
            other_note_dis: memoEditorContent
        };

        // Send AJAX request to the API
        $.ajax({
            url: '/api/forward-user-otherrecipt',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // If CSRF token is needed
            },
            success: function(response) {
                if (response.success) {
                    alert('Leave forwarded successfully');
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/receipt/add-letter.blade.php ENDPATH**/ ?>