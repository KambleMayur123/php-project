<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.new-page-title'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

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
   



            

   
   <div classs="row" style="display:flex; 
            border: 1px solid #ccc !important;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5) !important; margin-top:40px;">
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

        <!-- Left Div -->
        <div class="card" style=" width: 50%;
            padding: 0px 1px;
            position: relative;
            border-right: 1px solid #ccc;">
            <form  action="<?php echo e(route('audits.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

<!--<input type="file" id="fileInput" name="upload_file" accept="application/pdf" />-->
          
         <div class="file-name" id="fileName"></div>

<!-- Container for the PDF viewer -->
<iframe id="pdfViewer" style="width:100%; height:500px;" frameborder="0"></iframe>


            
            
        </div>
     
        
        
        
        
        
        <!-- Right Div (Scrollable Form) -->
        <div class="card" style="  width: 50%;
    padding: 20px;
    display: flex;
    flex-direction: column;
    position: relative;
     overflow-y: auto; /* Scrollable form content */
    /*margin-bottom: 20px;*/
    overflow-x: hidden;
    height:600px;">
            

            <!-- Section 1: Diary Details -->
            <div class="ele-form-section">
            <div class="elesec1">
                <h3 style="font-size: 17px;">
                <span> <i class="fa-solid fa-book"></i> Audit Details</span>
                
            </h3>
            
<div class="row mb-3">
    <div class="col-md-4">
        <label for="state" class="form-label">State</label>
        <select id="state" name="state" class="form-control" required>
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
        <select id="district" name="district" class="form-control" required>
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
        <select id="organisation" name="org_id" class="form-select mb-3" required>
            <option value="">Select Organisation</option>
        </select>
        <?php $__errorArgs = ['org_id'];
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

<div class="row">
    <div class="col-md-4">
        <label for="department_name" class="form-label">Select Department</label>
        <select name="depart_id" id="department_name" class="form-select mb-3">
            <option value="">-- Select Department --</option>
        </select>
        <?php $__errorArgs = ['depart_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback" style="color: red;"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    
    <div class="col-md-4">
        <label for="taluka-field" class="form-label">Taluka</label>
        <select id="taluka-field" name="taluka" class="form-control" >
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

    <div class="col-md-4">
        <label for="designation" class="form-label">Select Designation</label>
        <select name="design_id" id="designation" class="form-select mb-3">
            <option value="">-- Select Designation --</option>
        </select>
        <?php $__errorArgs = ['design_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback" style="color: red;"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="name" class="form-label">Profile Name</label>
        <select id="name" name="user_id" class="form-control">
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
</div>

<div class="row align-items-center g-3">
    <div class="col-lg-4">
        <label class="form-label" for="audit_name">Audit Name</label>
        <input type="text" id="audit_name" class="form-control" name="audit_name">
    </div>
    <div class="col-lg-4">
        <label class="form-label" for="description">Description</label>
        <input type="text" id="description" class="form-control" name="description">
    </div>
    <div class="col-lg-4">
        <label for="audit_remark" class="form-label">Audit Remark</label>
        <input type="text" id="audit_remark" class="form-control" name="audit_remark">
    </div>
</div>

<div class="row align-items-center g-3">
    <div class="col-lg-4">
        <label class="form-label" for="auditor_name">Auditor Name</label>
        <input type="text" id="auditor_name" class="form-control" name="auditor_name">
    </div>
    <div class="col-lg-4">
        <label class="form-label" for="position">Position</label>
        <input type="text" id="position" class="form-control" name="position">
    </div>
     <div class="col-lg-4">
                        <label for="deliveryMode"  class="form-label">organization</label>
                      <select id="deliveryMode" class="form-select" name="organisation_name"> 
    <?php $__currentLoopData = $org_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organisation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($organisation->id); ?>"><?php echo e($organisation->org_name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
    </div>
                   
</div>

<div class="row align-items-center g-3">
    <div class="col-lg-6">
        <label for="auditor_veri_des" class="form-label">Auditor Verification Description</label>
        <input type="text" id="auditor_veri_des" class="form-control" name="auditor_veri_des">
    </div>
</div>

<!--<div class="row">-->
<!--    <div class="col-md-12 mb-3">-->
<!--        <label for="status-field" class="form-label">Auditor Status</label>-->
<!--        <select class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="status" id="status-field">-->
<!--            <option value="">Select Status</option>-->
<!--            <option value="approved">Approved</option>-->
<!--            <option value="rejected">Rejected</option>-->
<!--            <option value="wrong_information">Wrong Information</option>-->
<!--        </select>-->
<!--        <div class="invalid-feedback text-red"></div>-->
<!--    </div>-->
<!--</div>-->

<div class="row" id="reject-description-row" style="display: none;">
    <div class="col-md-12 mb-3">
        <label for="reject-description-field" class="form-label">Description</label>
        <textarea id="reject-description-field" name="reason_description" 
                  class="form-control <?php $__errorArgs = ['reject_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                  placeholder="Enter Reason for Rejection"></textarea>
        <div class="invalid-feedback text-red"></div>
    </div>
</div>

<!--<div class="flex-bnt" style="display:flex;gap:5px; margin:30px 17px;">-->
<!--    <button class="upload" name="clerk_signature" id="uploadBtn" style="padding: 2px 15px; border: none; background-color: #0056ac; color: white; font-size: 14px; margin-right: 10px; cursor: pointer; border-radius: 3px;">-->
<!--        Clerk Digital Signature <i class="fas fa-upload"></i>-->
<!--    </button>-->
<!--    <button class="upload" id="uploadBtn" name="auditor_signature" style="padding: 2px 15px; border: none; background-color: #0056ac; color: white; font-size: 14px; margin-right: 10px; cursor: pointer; border-radius: 3px;">-->
<!--        Auditor Digital Signature <i class="fas fa-upload"></i>-->
<!--    </button>-->
<!--</div>-->
            <!-- More sections as needed -->



    
<!--   <div class="row mb-3">-->
<!--    <div class="col-md-12">-->
<!--        <label for="clerk_signature" class="form-label">Clerk Signature</label>-->
<!--        <input type="file" id="clerk_signature" name="clerk_signature" class="form-control <?php $__errorArgs = ['clerk_signature'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept=".png, .jpg, .jpeg" />-->
<!--        <?php $__errorArgs = ['clerk_signature'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
<!--            <div class="invalid-feedback text-red"><?php echo e($message); ?></div>-->
<!--        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
<!--        <img id="clerk_signature_preview" src="" alt="Clerk Signature Preview" style="display: none; max-width: 200px; margin-top: 10px;" />-->
<!--    </div>-->
<!--</div>-->
<!-- end row -->

<!--<div class="row mb-3">-->
<!--    <div class="col-md-12">-->
<!--        <label for="auditor_signature" class="form-label">Auditor Signature</label>-->
<!--        <input type="file" id="auditor_signature" name="auditor_signature" class="form-control <?php $__errorArgs = ['auditor_signature'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept=".png, .jpg, .jpeg" />-->
<!--        <?php $__errorArgs = ['auditor_signature'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>-->
<!--            <div class="invalid-feedback text-red"><?php echo e($message); ?></div>-->
<!--        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>-->
<!--        <img id="auditor_signature_preview" src="" alt="Auditor Signature Preview" style="display: none; max-width: 200px; margin-top: 10px;" />-->
<!--    </div>-->
<!--</div>-->
<!-- end row -->

 
        <div class="card-footer" style="   display: flex;
    align-items: center;
    gap:10px;
   
    padding: 10px;
    position: sticky; /* Keeps the footer visible at the bottom */
    bottom: 0;
    left: 0;
    width: 100%;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.6);
    z-index: 1000; /* Ensure the footer is above other content ">
            
            <div class="btn1">
                <a href =""><button type="submit">save</button></a>
            </div>
            <div class="btn2">
<button class="btn btn-primary" onclick="window.history.back()">Back</button>
            </div>

        </div>
    </div>
</div>
 </form>

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
    document.getElementById('clerk_signature').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('clerk_signature_preview');
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block'; // Show the image
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
            preview.style.display = 'none'; // Hide the image if no file is selected
        }
    });

    document.getElementById('auditor_signature').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('auditor_signature_preview');
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block'; // Show the image
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
            preview.style.display = 'none'; // Hide the image if no file is selected
        }
    });
</script>

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
    document.getElementById('status-field').addEventListener('change', function() {
        var status = this.value;
        var rejectDescriptionRow = document.getElementById('reject-description-row');
        var rejectDescriptionField = document.getElementById('reject-description-field');
        
        if (status === 'rejected') {
            rejectDescriptionRow.style.display = 'block';
            rejectDescriptionField.placeholder = "Enter Reason for Rejection"; // Placeholder for Reject
        } else if (status === 'wrong_information') {
            rejectDescriptionRow.style.display = 'block';
            rejectDescriptionField.placeholder = "Enter Reason for Wrong Information"; // Placeholder for Wrong Information
        } else {
            rejectDescriptionRow.style.display = 'none'; 
            rejectDescriptionField.placeholder = ""; // Clear placeholder
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deliveryModeSelect = document.getElementById('deliveryMode');
        const rejectReasonContainer = document.getElementById('rejectReasonContainer');
        const rejectReasonInput = document.getElementById('rejectReason');

        // Show/hide input field based on dropdown selection
        deliveryModeSelect.addEventListener('change', function () {
            const selectedValue = deliveryModeSelect.value;

            if (selectedValue === 'reject') {
                rejectReasonContainer.style.display = 'block';
                rejectReasonInput.placeholder = 'Reject Description';
            } else if (selectedValue === 'wrong-info') {
                rejectReasonContainer.style.display = 'block';
                rejectReasonInput.placeholder = 'Wrong Information Description';
            } else {
                rejectReasonContainer.style.display = 'none';
                rejectReasonInput.value = '';  // Clear input if hidden
            }
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
    /// When the user selects a file, show the file name and preview (if it's a PDF)
document.getElementById('fileInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    
    if (file) {
        const fileName = document.getElementById('fileName');
        fileName.textContent = file.name;
        
        // Check if the file is a PDF and display it
        if (file.type === 'application/pdf') {
            const pdfViewer = document.getElementById('pdfViewer');
            pdfViewer.src = URL.createObjectURL(file);
            pdfViewer.style.display = 'block';
        } else {
            const pdfViewer = document.getElementById('pdfViewer');
            pdfViewer.style.display = 'none'; // Hide PDF preview if not a PDF
        }
    }
});

// When the user clicks the upload button
document.getElementById('uploadBtn').addEventListener('click', function(e) {
    const fileInput = document.getElementById('fileInput');
    
    // Check if a file is selected
    if (fileInput.files.length === 0) {
        e.preventDefault(); // Prevent form submission

        fileInput.click();
    } else {
        // Proceed with the upload if a file is selected
        alert('File is ready to be uploaded!');
    }
});

// When the user clicks the remove button, reset the file input and hide the preview
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
});

</script>



<script>
     
     const states = [
    "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chhattisgarh", 
    "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jharkhand", 
    "Karnataka", "Kerala", "Madhya Pradesh", "Maharashtra", "Manipur", 
    "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Punjab", 
    "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana", "Tripura", 
    "Uttar Pradesh", "Uttarakhand", "West Bengal"
];

document.getElementById('stateInput').addEventListener('input', function() {
    const input = this.value.toLowerCase();
    const suggestions = states.filter(state => state.toLowerCase().includes(input));
    const suggestionsList = document.getElementById('stateSuggestions');

    // Clear previous suggestions
    suggestionsList.innerHTML = '';

    if (input.length === 0 || suggestions.length === 0) {
        suggestionsList.style.display = 'none';
        return;
    }

    // Display the filtered states
    suggestions.forEach(state => {
        const li = document.createElement('li');
        li.textContent = state;
        li.classList.add('list-group-item');
        li.addEventListener('click', function() {
            document.getElementById('stateInput').value = state;
            suggestionsList.style.display = 'none';
        });
        suggestionsList.appendChild(li);
    });

    suggestionsList.style.display = 'block';
});

    
</script>


<script>
    $(document).ready(function() {
    let isAddressBookChecked = false;

    // When the checkbox is clicked
    $('#addToAddressBook').on('change', function() {
        if ($(this).is(':checked')) {
            isAddressBookChecked = true;
        } else {
            isAddressBookChecked = false;
            $('#nameSuggestions').hide(); // Hide suggestions when unchecked
        }
    });

    // Handle name input and fetch suggestions only if checkbox is checked
    $('#name').on('keyup', function() {
        let query = $(this).val();

        if (isAddressBookChecked && query.length > 2) { // Only fetch suggestions if checkbox is checked and input has 2+ characters
            $.ajax({
                url: '/get-user-suggestions',  // Correct URL for the route
                method: 'GET',
                data: { query: query },
                success: function(response) {
                    let suggestions = '';
                    if (response.length > 0) {
                        response.forEach(function(contact) {
                            suggestions += `<li class="list-group-item suggestion-item" data-id="${contact.id}">${contact.name}</li>`;
                        });
                        $('#nameSuggestions').html(suggestions).show();
                    } else {
                        $('#nameSuggestions').hide();
                    }
                },
                error: function() {
                    console.error('Error fetching suggestions');
                }
            });
        } else {
            $('#nameSuggestions').hide(); // Hide suggestions if the query is too short or checkbox is unchecked
        }
    });

    // Handle click on suggestion to autofill details
    $(document).on('click', '.suggestion-item', function() {
        let contactId = $(this).data('id');
        let contactName = $(this).text();

        // Autofill the name field with selected suggestion
        $('#name').val(contactName);
        $('#nameSuggestions').hide();

        // Fetch other contact details based on the selected name
        $.ajax({
            url: `/fetch-contact-details/${contactId}`,  // Adjust the route as necessary
            method: 'GET',
            success: function(data) {
                // Autofill other fields (e.g., designation, mobile, email, etc.)
                $('#designation').val(data.designation);
                $('input[name="organisation"]').val(data.organisation);
                $('input[name="mobile_no"]').val(data.mobile);
                $('input[name="email"]').val(data.email);
                $('input[name="address"]').val(data.address);
                $('select[name="country"]').val(data.country);
                $('input[name="state"]').val(data.state);
                $('input[name="city"]').val(data.city);
                $('input[name="pincode"]').val(data.pincode);
                $('input[name="landline"]').val(data.landline);
                $('input[name="fax"]').val(data.fax);
            }
        });
    });
});

</script>





<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/audit/add.blade.php ENDPATH**/ ?>