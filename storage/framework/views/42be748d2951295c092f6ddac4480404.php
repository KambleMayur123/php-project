<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.new-page-title'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
        /*body {*/
        /*    font-family: Arial, sans-serif;*/
        /*    margin: 0;*/
        /*    padding: 0;*/
        /*    display: flex;*/
        /*    justify-content: center;*/
        /*    align-items: flex-start;*/
        /*    height: 100vh;*/
        /*    background-color: #f4f4f4;*/
        /*}*/

        /*.row {*/
        /*    display: flex !important;*/
        /*    width: 100% !important;*/
        /*    height: 90% !important;*/
        /*    background-color: white !important;*/
        /*    border: 1px solid #ccc !important;*/
        /*    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5) !important;*/
        /*    margin-top: 30px !important;*/
        /*}*/

        .ele-left-div {
            width: 50%;
            padding: 0px 1px;
            position: relative;
            border-right: 1px solid #ccc;
        }

        .ele-left-div button {
            padding: 2px 15px;
            border: none;
            background-color: #0056ac;
            color: white;
            font-size: 14px;
            margin-right: 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        .ele-left-div button.remove {
            background-color: #d2d0d0;
        }

        .ele-watermark {
            position: absolute;
    left: 100px;
    font-size: 70px;
    color: rgba(0, 0, 0, 0.05);
    transform: rotate(-30deg);
    user-select: none;
    margin-top: 200px;
}
        

.ele-right-div {
    width: 50%;
    padding: 20px;
    display: flex;
    flex-direction: column;
    position: relative;
     overflow-y: auto; /* Scrollable form content */
    /*margin-bottom: 20px;*/
    overflow-x: hidden;
    height:600px;
}

.ele-form-section {
    flex-grow: 1; /* Makes the form content take up remaining space */
    overflow-y: auto; /* Scrollable form content */
    margin-bottom: 20px;
    overflow-x: hidden;
}



        .ele-right-div h3 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
        }

        .ele-form-section {
            margin-bottom: 20px;
           
        }

        .ele-form-section h4 {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ele-form-section h4 .radio {
            display: flex;
            align-items: center;
        }

        .ele-form-section h4 .radio label {
            margin-right: 10px;
             margin-top: 10px;
        }

        .ele-form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            margin-right: 10px;
            gap:5px;
        }

        .ele-form-row .form-group {
            /*width: 42% !important;*/
            margin: 0 10px;
        }

        .ele-form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .ele-form-group input {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .ele-form-group select{
            width: 107% !important;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .ele-right-div h3{
            /*background-color: #d2d0d0;*/
            color: #000;
            font-size: 18px;
            padding: 5px;
        }
        .ele-form-section h4{
            /*background-color: #d2d0d0;*/
            /*color: #000;*/
            font-size: 18px;
            padding: 5px;
        }
        #minDeptother{
            width: 500px !important;
        }
   .ele-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: white; /* Set the background color to white */
    padding: 10px;
    position: sticky; /* Keeps the footer visible at the bottom */
    bottom: 0;
    left: 0;
    width: 100%;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.6);
    z-index: 1000; /* Ensure the footer is above other content */
}

    .card-footer button{
        background-color: #0056ac;
        color: #fff;
        padding: 5px 15px;
        border: none;
        border-radius: 5px;
    }
    #fileInput {
            display: none;
        }
         .file-name {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }
       
 
.elebtn{
    /*background-color:#FFF;*/
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
      padding:5px;
display:flex;
      
}
.elesec1{
    border:1px solid #ddd;
    padding:10px;
     /*box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);*/
}
.live-preview {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.progress-container {
    display: flex;
    justify-content: space-between;
    width: 100%;
}

.progress-step-arrow {
    flex: 1; /* Allows the progress bar to take up available space */
    margin: 0 10px; /* Optional: Adds space between progress bars */
}

.progress-bar {
   margin:0 10px;
}
.progress-step-arrow {
    height: 1.78rem !important;
}
.progress-step-arrow .progress-bar:after {
    
     bottom: 5px !important; 
    
}
.progress-info .progress-bar {
   background-color: #70769b !important;
    color:#fff !important;
}
.progress-info .progress-bar:after {
    border-left-color:  #70769b  !important;
     color:#fff !important;
    
}
.progress-barr {
    display: flex;
    flex-direction: column;
    justify-content: center;
    font-size: .875rem;
    
}

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>




<div class="row" style="display:flex; 
    border: 1px solid #ccc !important;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5) !important; margin-top:40px;">

    <!-- Left Div -->
    <div class="card" style=" width: 50%;
        padding: 0px 1px;
        position: relative;
        border-right: 1px solid #ccc;">
        
        <!-- Container for PDF Viewer -->
        <iframe id="pdfViewer" src="" style="width:100%; height:500px;" frameborder="0"></iframe>
    </div>
    
    <!-- Right Div (Form Details) -->
    <div class="card" style="  width: 50%;
        padding: 20px;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow-y: auto;
        height:600px;">
        
        <h3 style="font-size: 17px;">
            <span><i class="fa-solid fa-book"></i> Audit Details</span>
        </h3>

        <!-- Audit Details -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="state" class="form-label">State:</label>
                <input type="text" class="form-control" id="state" value="<?php echo e($audit->state); ?>" readonly>
            </div>
            <div class="col-md-4">
                <label for="district" class="form-label">District:</label>
                <input type="text" class="form-control" id="district" value="<?php echo e($audit->district); ?>" readonly>
            </div>
            <div class="col-md-4">
                <label for="organisation" class="form-label">Organization:</label>
                <input type="text" class="form-control" id="organisation" value="<?php echo e($audit->org_name_by_id); ?>" readonly>
            </div>
        </div>

        <!-- Department, Taluka, Designation -->
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="department_name" class="form-label">Department:</label>
                <input type="text" class="form-control" id="department_name" value="<?php echo e($audit->name); ?>" readonly>
            </div>
            <div class="col-md-4">
                <label for="taluka-field" class="form-label">Taluka:</label>
                <input type="text" class="form-control" id="taluka-field" value="<?php echo e($audit->taluka); ?>" readonly>
            </div>
            <div class="col-md-4">
                <label for="designation" class="form-label">Designation:</label>
                <input type="text" class="form-control" id="designation" value="<?php echo e($audit->designation_name); ?>" readonly>
            </div>
        </div>

        <!-- Profile Name, Audit Name -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Profile Name:</label>
                <input type="text" class="form-control" id="name" value="<?php echo e($audit->first_name); ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="audit_name" class="form-label">Audit Name:</label>
                <input type="text" class="form-control" id="audit_name" value="<?php echo e($audit->audit_name); ?>" readonly>
            </div>
        </div>

        <!-- Description, Audit Remark -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="description" class="form-label">Description:</label>
                <input type="text" class="form-control" id="description" value="<?php echo e($audit->description); ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="audit_remark" class="form-label">Audit Remark:</label>
                <input type="text" class="form-control" id="audit_remark" value="<?php echo e($audit->audit_remark); ?>" readonly>
            </div>
        </div>

        <!-- Auditor Name, Position -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="auditor_name" class="form-label">Auditor Name:</label>
                <input type="text" class="form-control" id="auditor_name" value="<?php echo e($audit->auditor_name); ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="position" class="form-label">Position:</label>
                <input type="text" class="form-control" id="position" value="<?php echo e($audit->position); ?>" readonly>
            </div>
             <div class="col-md-6">
                <label for="position" class="form-label">Organization</label>
                <input type="text" class="form-control" id="position" value="<?php echo e($audit->org_name_by_name); ?>" readonly>
            </div>
        </div>

        <!-- Auditor Verification Description -->
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="auditor_veri_des" class="form-label">Auditor Verification Description:</label>
                <input type="text" class="form-control" id="auditor_veri_des" value="<?php echo e($audit->auditor_veri_des); ?>" readonly>
            </div>
        </div>

        <!-- Audit Status -->
        <!-- Conditional Reject Description -->
        <?php if($audit->status === 'rejected'): ?>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="reject-description-field" class="form-label">Reason for Rejection:</label>
                <input type="text" class="form-control" id="reject-description-field" value="<?php echo e($audit->reason_description); ?>" readonly>
            </div>
        </div>
        <?php endif; ?>

        <!-- Signatures -->
        <!--<div class="row mb-3">-->
        <!--    <div class="col-md-6">-->
        <!--        <label for="clerk_signature" class="form-label">Clerk Signature:</label>-->
        <!--        <img src="<?php echo e(asset('public/images/'.$audit->clerk_signature)); ?>" alt="Clerk Signature" style="max-width: 100px;">-->
        <!--    </div>-->
        <!--    <div class="col-md-6">-->
        <!--        <label for="auditor_signature" class="form-label">Auditor Signature:</label>-->
        <!--        <img src="<?php echo e(asset('public/images/'.$audit->auditor_signature)); ?>" alt="Auditor Signature" style="max-width: 100px;">-->
        <!--    </div>-->
        <!--</div>-->
        
<!--    <form id="audit-status-form" action="<?php echo e(route('auditstatus', $audit->id)); ?>" method="POST">-->
<!--    <?php echo csrf_field(); ?>-->
<!--    <?php echo method_field('PATCH'); ?>-->

<!--    <input type="hidden" name="status" id="status-hidden-field">-->
    <!-- Approve and Reject Buttons -->
<!--    <div class="row">-->
<!--        <div class="col-md-12 mb-3 d-flex justify-content-end">-->
<!--            <?php if($audit->status == 'pending'): ?>-->
<!--            <button type="button" class="btn btn-success me-2" onclick="submitFormWithStatus('approved')">Approve</button>-->
<!--            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>-->
<!--            <?php elseif($audit->status == 'approved'): ?>-->
<!--                        <button type="button" class="btn btn-success me-2" >Approve</button>-->
<!--            <?php elseif($audit->status == 'rejected'): ?>-->
<!--             <button type="button" class="btn btn-danger" >Reject</button>-->
<!--            <?php endif; ?>-->
<!--        </div>-->
<!--    </div>-->
<!--</form>-->


<!-- Reject Modal -->
<!--<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="rejectModalLabel">Rejection Reason</h5>-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
                <!-- Rejecter's Description Field in Modal -->
<!--                <div class="mb-3">-->
<!--                    <label for="reject-description-field" class="form-label"> Rejecter's Description</label>-->
<!--                    <textarea id="reject-description-field" class="form-control <?php $__errorArgs = ['reject_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Reason for Rejection"></textarea>-->
<!--                    <?php $__errorArgs = ['reject_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
<!--                        <div class="invalid-feedback text-red"><?php echo e($message); ?></div>-->
<!--                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>-->
<!--                <button type="button" class="btn btn-danger" onclick="submitRejection()">Submit Rejection</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
 <!-- Sign and Send Row for Approved -->
<!--    <div class="row" id="sign-and-send-row" style="display: none;">-->
<!--        <div class="col-md-12 d-flex justify-content-end mb-4">-->
<!--            <button type="button" id="signAndSendButton" class="btn btn-success" onclick="openOtpModal()">Sign and Send</button>-->
<!--        </div>-->
<!--    </div>-->
  <!-- OTP Modal -->
<!--    <div class="modal fade" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="otpModalLabel" aria-hidden="true">-->
<!--        <div class="modal-dialog" role="document">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title" id="otpModalLabel">Enter OTP</h5>-->
<!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                        <span aria-hidden="true">&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
<!--                    <div class="mb-3">-->
<!--                        <label for="otp-field" class="form-label">Enter OTP</label>-->
<!--                        <input type="text" id="otp-field" name="otp" class="form-control" placeholder="Enter OTP">-->
<!--                        <div class="invalid-feedback text-red" id="otpError" style="display: none;">Invalid OTP. Please try again.</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="modal-footer">-->
<!--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
<!--                    <button type="button" id="verifyButton" class="btn btn-primary">Verify</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!-- Forward Modal -->
<!--    <div class="modal fade" id="forwardModal" tabindex="-1" aria-labelledby="forwardModalLabel" aria-hidden="true">-->
<!--        <div class="modal-dialog">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title" id="forwardModalLabel">Forward</h5>-->
<!--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
<!--                    <label for="forward-select-field" class="form-label">To</label>-->
<!--                    <select id="forward-select-field" class="form-select">-->
<!--                        <option value="">Select Staff</option>-->
<!--                        <?php $__currentLoopData = $userNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
<!--                            <option value="<?php echo e($name); ?>"><?php echo e($name); ?></option>-->
<!--                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
<!--                    </select>-->
<!--                </div>-->
<!--                <div class="modal-footer">-->
<!--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
<!--                    <button type="button" class="btn btn-primary" onclick="submitForwardForm()">Forward</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

                                   

<form action="<?php echo e(route('auditstatus', $audit->id)); ?>" id="transferForm" method="POST">
 
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>

    <div class="row">
        <div class="col-md-12 mb-3">
           
            <?php if((($audit->status =='pending' || ($audit->status == 'approved_clerk' && $audit->frwd_hod_id == Auth::user()->id )) && Auth::user()->is_admin == 'staff' )): ?>
          
            <!-- Approve Button -->
           
              <button type="button" id="send-button" class="btn btn-primary me-2" data-docuser="<?php echo e($audit->id); ?>" data-bs-toggle="modal" data-bs-target="#ForwardModel">Send</button>

              
            <button type="button" id="approve-button" class="btn btn-success me-2" data-docuser ="<?php echo e($audit->id); ?>" >Send & Sign</button>

            <!-- Reject Button -->
            <button type="button" id="reject-button" class="btn btn-danger">Reject</button>
            
             <?php elseif(($audit->status == 'pending' || $audit->status == 'approved_clerk') && Auth::user()->is_admin != 'staff'): ?>
                   <button type="button"  class="btn btn-warning me-2"  >Pending</button>
            <?php elseif($audit->status == 'approved'): ?>
              <button type="button"  class="btn btn-success me-2">Approved</button>
            <?php elseif($audit->status == 'rejected'): ?>
            <button type="button"  class="btn btn-danger">Rejected</button>
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

$letter_user = DB::table('users')->where('id', $audit->user_id)->first();

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
                        <input type="hidden" name="frwd_leave_id" value="<?php echo e($audit->id); ?>" id="frwd_leave_id">
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

                                   


        <!-- Back Button -->
       <div class="card-footer" style="display: flex; justify-content: flex-end; padding: 10px;">
    <div class="btn2">
        <a href="<?php echo e(route('audits.index')); ?>">
            <button type="button" class="btn btn-secondary">Back</button>
        </a>
    </div>
</div>

    </div>
</div>








<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>
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
//     function submitFormWithStatus(status) {
//         // Set the hidden input field value for status
//         document.getElementById('status-hidden-field').value = status;

//         // Submit the form directly for approval
//         if (status === 'approved') {
//             document.getElementById('audit-status-form').submit();
//         }
//     }

//     function submitRejection() {
//         const rejectDescription = document.getElementById('reject-description-field').value;

//         // Ensure rejection description is not empty
//         if (!rejectDescription) {
//             alert('Please provide a reason for rejection.');
//             return;
//         }

//         // Create a hidden textarea element to include the reject description in the form
//         const rejectDescriptionField = document.createElement('textarea');
//         rejectDescriptionField.name = 'reject_description';
//         rejectDescriptionField.style.display = 'none';
//         rejectDescriptionField.value = rejectDescription;

//         // Append this textarea to the form
//         document.getElementById('audit-status-form').appendChild(rejectDescriptionField);

//         // Set status to 'rejected'
//         document.getElementById('status-hidden-field').value = 'rejected';

//         // Submit the form
//         document.getElementById('audit-status-form').submit();
//     }
// </script>
 <script>
//     function handleStatusChange(select) {
//         const selectedValue = select.value;

//         // Hide all conditional fields by default
//         document.getElementById('reject-description-row').style.display = 'none';
//         document.getElementById('sign-and-send-row').style.display = 'none';
//         document.getElementById('submit-button-row').style.display = 'none';

//         if (selectedValue === 'forward') {
//             // Show forward modal
//             $('#forwardModal').modal('show');
//         } else if (selectedValue === 'approved') {
//             // Show the "Sign and Send" button
//             document.getElementById('sign-and-send-row').style.display = 'block';
//         } else if (selectedValue === 'rejected') {
//             // Show rejection description textarea
//             document.getElementById('reject-description-row').style.display = 'block';
//             document.getElementById('submit-button-row').style.display = 'block';
//         }
//     }

//     function openOtpModal() {
//         // Open OTP modal
//         $('#otpModal').modal('show');
//     }

//     function submitForwardForm() {
//         // Submit forward form logic or actions
//         alert("Form forwarded to selected staff");
//     }
// </script>

<script>
    window.onload = function() {
        showPDF('/images/1726757507-E_Office%20logo.pdf');
    };

    function showPDF(pdfPath) {
        var pdfViewer = document.getElementById('pdfViewer');
        pdfViewer.src = pdfPath;
        pdfViewer.style.display = 'block';
    }
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
                page: 'audit'
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
                page: 'audit',
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
            url: '/api/forward-user-audit',
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/audit/show.blade.php ENDPATH**/ ?>