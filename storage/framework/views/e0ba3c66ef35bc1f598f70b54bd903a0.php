<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
 <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>


   

    /* Reduce left and right padding in the table cells */
    .table td, .table th {
        padding-left: 5px; /* Adjust this value for left padding */
        padding-right: 5px; /* Adjust this value for right padding */
        padding-top: 10px;  /* Keep top padding as it is */
        padding-bottom: 10px; /* Keep bottom padding as it is */
    }

    /* You can also adjust the checkbox label spacing if needed */
    .form-check-label {
        margin-left: 5px; /* Reduce margin to make checkboxes closer */
    }
    .footer.container-fluid .row {
    position: static !important;
    width: 0px !important;
}



</style>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">All Permissions</h4>

              
              
            </div><!-- end card header -->
              <form action="<?php echo e(route('rolespermission.update', $user->id)); ?>" method="POST" class="row g-3">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?> <!-- This line is crucial for Laravel to recognize the update operation -->

             <div class="col-xxl-12">
        <div class="card" style=" margin: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.0);">
            <div class="card-body">
                <div class="live-preview">
                
 <div class="row mb-3">
    <div class="col-md-4">
        <label for="state" class="form-label">State</label>
        <input type="text" id="state" name="state" class="form-control" value="<?php echo e($user->state); ?>" readonly>
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
        <input type="text" id="district" name="district" class="form-control" value="<?php echo e($user->district); ?>" readonly>
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
        <label for="organisation" class="form-label">Select Organisation</label>
        <input type="text" id="organisation" name="organisation" class="form-control" value="<?php echo e($user->org_name); ?>" readonly>
        <?php $__errorArgs = ['organisation'];
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
        <input type="text" id="department_name" name="department_name" class="form-control" value="<?php echo e($user->name); ?>" readonly>
        <?php $__errorArgs = ['department_name'];
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
        <input type="text" id="taluka-field" name="taluka" class="form-control" value="<?php echo e($user->taluka); ?>" readonly>
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
        <input type="text" id="designation" name="designation" class="form-control" value="<?php echo e($user->designation_name); ?>" readonly>
        <?php $__errorArgs = ['designation'];
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

<div class="col-md-4" style="margin:20px 5px;">
    <label for="role_name" class="form-label">Select Role</label>
    <input type="text" id="role_name" name="role_name" class="form-control" value="<?php echo e($user->role_name); ?>" readonly>
    <div class="invalid-feedback" style="color: red;"></div>
</div>
       </div>
            <div class="card-body" style="margin: 0px 20px;">
                

                <div class="live-preview">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width:220px;">Module</th>
                                    <th scope="col" colspan="9">Permission</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               <tr>
    <td>Dashboard</td>
    <td>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck1" name="dashborad_view" value="2" 
                <?php echo e($user->dashborad_view == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="SwitchCheck1">View</label>
        </div>
    </td>
    <td >
        <div class="form-check form-switch form-switch-success mb-2 mb-md-0" style="display:none">
            <input class="form-check-input" type="checkbox" name="dashborad_create" value="2" id="cardtableCheck01" 
                <?php echo e($user->dashborad_create == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">Create</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-warning mb-2 mb-md-0" style="display:none">
            <input class="form-check-input" type="checkbox" name="dashborad_edit" value="2" id="cardtableCheck01" 
                <?php echo e($user->dashborad_edit == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">Edit</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-danger mb-2 mb-md-0" style="display:none">
            <input class="form-check-input" type="checkbox" name="dashborad_delete" value="2" role="switch" id="SwitchCheck4" 
                <?php echo e($user->dashborad_delete == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="SwitchCheck4">Delete</label>
        </div>
    </td>
</tr>

                              <tr>
    <td>Department</td>
    <td>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" name="department_view" value="2" id="cardtableCheck01"
                <?php echo e($user->department_view == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">View</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="department_create" value="2" id="cardtableCheck01"
                <?php echo e($user->department_create == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">Create</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="department_edit" value="2" id="cardtableCheck01"
                <?php echo e($user->department_edit == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">Edit</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="department_delete" value="2" id="cardtableCheck01"
                <?php echo e($user->department_delete == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">Delete</label>
        </div>
    </td>
</tr>

                                <tr>
    <td>Designation</td>
    <td>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" name="designation_view" value="2" id="cardtableCheck01"
                <?php echo e($user->designation_view == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">View</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="designation_create" value="2" id="cardtableCheck01"
                <?php echo e($user->designation_create == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">Create</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="designation_edit" value="2" id="cardtableCheck01"
                <?php echo e($user->designation_edit == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">Edit</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="designation_delete" value="2" id="cardtableCheck01"
                <?php echo e($user->designation_delete == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">Delete</label>
        </div>
    </td>
</tr>
 <tr>
                                  <td colspan="5" class="table-light"><b style="color:#1d54ab;">Organizations Login Section</b> </td>
                              </tr>
<tr>
    <td>Organization Login Details</td>
    <td>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" name="organization_view" value="2" id="cardtableCheck01"
                <?php echo e($user->organization_view == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">View</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="organization_create" value="2" id="cardtableCheck01"
                <?php echo e($user->organization_create == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">Create</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="organization_edit" value="2" id="cardtableCheck01"
                <?php echo e($user->organization_edit == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">Edit</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="organization_delete" value="2" id="cardtableCheck01"
                <?php echo e($user->organization_delete == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">Delete</label>
        </div>
    </td>
</tr>

<tr>
    <td>Staff Selection</td>
    <td>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" name="staff_view" value="2" id="cardtableCheck01"
                <?php echo e($user->staff_view == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">View</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="staff_create" value="2" id="cardtableCheck01"
                <?php echo e($user->staff_create == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">Create</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="staff_edit" value="2" id="cardtableCheck01"
                <?php echo e($user->staff_edit == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">Edit</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="staff_delete" value="2" id="cardtableCheck01"
                <?php echo e($user->staff_delete == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">Delete</label>
        </div>
    </td>
</tr>

<tr>
    <td>Add Role</td>
    <td>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" name="role_view" value="2" id="cardtableCheck01"
            <?php echo e($user->role_view == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">View</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="role_create" value="2" id="cardtableCheck01"
            <?php echo e($user->role_create == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">Create</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="role_edit" value="2" id="cardtableCheck01"
            <?php echo e($user->role_edit == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">Edit</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="role_delete" value="2" id="cardtableCheck01"
            <?php echo e($user->role_delete == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck01">Delete</label>
        </div>
    </td>
</tr>

<tr>
    <td>Assign Permission</td>
    <td>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" name="permission_view" value="2" id="cardtableCheck02"
            <?php echo e($user->permission_view == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck02">View</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="permission_create" value="2" id="cardtableCheck02"
            <?php echo e($user->permission_create == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck02">Create</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="permission_edit" value="2" id="cardtableCheck02"
            <?php echo e($user->permission_edit == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck02">Edit</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="permission_delete" value="2" id="cardtableCheck02"
            <?php echo e($user->permission_delete == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="cardtableCheck02">Delete</label>
        </div>
    </td>
</tr>

                                <tr>
    <td>Report</td>
    <td>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" name="report_view" value="2" id="report_view"
            <?php echo e($user->report_view == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="report_view">View</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="report_create" value="2" id="report_create"
            <?php echo e($user->report_create == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="report_create">Create</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="report_edit" value="2" id="report_edit"
            <?php echo e($user->report_edit == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="report_edit">Edit</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="report_delete" value="2" id="report_delete"
            <?php echo e($user->report_delete == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="report_delete">Delete</label>
        </div>
    </td>
</tr>
<tr>
                                  <td colspan="5" class="table-light"><b style="color:#1d54ab;">User Profile Section</b> </td>
                              </tr>
<tr>
    <td>User Profile</td>
    <td>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" name="userprofile_view" value="2" id="userprofile_view"
            <?php echo e($user->userprofile_view == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="userprofile_view">View</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="userprofile_create" value="2" id="userprofile_create"
            <?php echo e($user->userprofile_create == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="userprofile_create">Create</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="userprofile_edit" value="2" id="userprofile_edit"
            <?php echo e($user->userprofile_edit == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="userprofile_edit">Edit</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="userprofile_delete" value="2" id="userprofile_delete"
            <?php echo e($user->userprofile_delete == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="userprofile_delete">Delete</label>
        </div>
    </td>
</tr>
<tr>
    <td>User Details</td>
    <td>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" name="userdetail_view" value="2" id="userdetail_view"
            <?php echo e($user->userdetail_view == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="userdetail_view">View</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="userdetail_create" value="2" id="userdetail_create"
            <?php echo e($user->userdetail_create == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="userdetail_create">Create</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="userdetail_edit" value="2" id="userdetail_edit"
            <?php echo e($user->userdetail_edit == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="userdetail_edit">Edit</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="userdetail_delete" value="2" id="userdetail_delete"
            <?php echo e($user->userdetail_delete == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="userdetail_delete">Delete</label>
        </div>
    </td>
</tr>

<tr>
    <td>Document Details</td>
    <td>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" name="document_view" value="2" id="document_view"
            <?php echo e($user->document_view == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="document_view">View</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="document_create" value="2" id="document_create"
            <?php echo e($user->document_create == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="document_create">Create</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="document_edit" value="2" id="document_edit"
            <?php echo e($user->document_edit == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="document_edit">Edit</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="document_delete" value="2" id="document_delete"
            <?php echo e($user->document_delete == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="document_delete">Delete</label>
        </div>
    </td>
</tr>
<tr>
    <td>Leave Details</td>
    <td>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" name="leave_view" value="2" id="leave_view"
            <?php echo e($user->leave_view == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="leave_view">View</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="leave_create" value="2" id="leave_create"
            <?php echo e($user->leave_create == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="leave_create">Create</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="leave_edit" value="2" id="leave_edit"
            <?php echo e($user->leave_edit == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="leave_edit">Edit</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="leave_delete" value="2" id="leave_delete"
            <?php echo e($user->leave_delete == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="leave_delete">Delete</label>
        </div>
    </td>
</tr>
<tr>
    <td>Nomination Details</td>
    <td>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" name="nomination_view" value="2" id="nomination_view"
            <?php echo e($user->nomination_view == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="nomination_view">View</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="nomination_create" value="2" id="nomination_create"
            <?php echo e($user->nomination_create == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="nomination_create">Create</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="nomination_edit" value="2" id="nomination_edit"
            <?php echo e($user->nomination_edit == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="nomination_edit">Edit</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="nomination_delete" value="2" id="nomination_delete"
            <?php echo e($user->nomination_delete == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="nomination_delete">Delete</label>
        </div>
    </td>
</tr>
<tr>
    <td>Salary Details</td>
    <td>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" name="salary_view" value="2" id="salary_view"
            <?php echo e($user->salary_view == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="salary_view">View</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="salary_create" value="2" id="salary_create"
            <?php echo e($user->salary_create == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="salary_create">Create</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="salary_edit" value="2" id="salary_edit"
            <?php echo e($user->salary_edit == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="salary_edit">Edit</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="salary_delete" value="2" id="salary_delete"
            <?php echo e($user->salary_delete == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="salary_delete">Delete</label>
        </div>
    </td>
</tr>
<tr>
    <td>Checklist</td>
    <td>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" name="checklist_view" value="2" id="checklist_view"
            <?php echo e($user->checklist_view == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="checklist_view">View</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="checklist_create" value="2" id="checklist_create"
            <?php echo e($user->checklist_create == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="checklist_create">Create</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="checklist_edit" value="2" id="checklist_edit"
            <?php echo e($user->checklist_edit == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="checklist_edit">Edit</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="checklist_delete" value="2" id="checklist_delete"
            <?php echo e($user->checklist_delete == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="checklist_delete">Delete</label>
        </div>
    </td>
</tr>
<tr>
    <td>Transfer & Joining Order</td>
    <td>
        <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" name="trans_join_view" value="2" id="trans_join_view"
            <?php echo e($user->trans_join_view == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="trans_join_view">View</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="trans_join_create" value="2" id="trans_join_create"
            <?php echo e($user->trans_join_create == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="trans_join_create">Create</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="trans_join_edit" value="2" id="trans_join_edit"
            <?php echo e($user->trans_join_edit == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="trans_join_edit">Edit</label>
        </div>
    </td>
    <td>
        <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
            <input class="form-check-input" type="checkbox" name="trans_join_delete" value="2" id="trans_join_delete"
            <?php echo e($user->trans_join_delete == 2 ? 'checked' : ''); ?> disabled >
            <label class="form-check-label" for="trans_join_delete">Delete</label>
        </div>
    </td>
</tr>

 <tr>
                                    <td>Other Receipt</td>
                                    
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="other_receipt_view" value="2" id="cardtableCheck01"
                                            <?php echo e($user->other_receipt_view == 2 ? 'checked' : ''); ?> disabled>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="other_receipt_create" value="2" id="cardtableCheck01"
                                            <?php echo e($user->other_receipt_create == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Add Letter</label>
                                        </div>
                                    </td>
                                      <td></td>  <td></td> 
                                    
                                </tr>
                                  <tr>
                                    <td>Affidavit </td>
                                    
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="affidavit_view" value="2" id="cardtableCheck01"
                                            <?php echo e($user->affidavit_view == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="affidavit_create" value="2" id="cardtableCheck01"
                                            <?php echo e($user->affidavit_create == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="affidavit_edit" value="2" id="cardtableCheck01"
                                            <?php echo e($user->affidavit_edit == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="affidavit_delete" value="2" id="cardtableCheck01"
                                            <?php echo e($user->affidavit_delete == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                    </td> 
                                    
                                </tr>
                                  <tr>
                                    <td>Achievement </td>
                                    
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="achievement_view" value="2" id="cardtableCheck01"
                                            <?php echo e($user->achievement_view == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="achievement_create" value="2" id="cardtableCheck01"
                                            <?php echo e($user->achievement_create == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="achievement_edit" value="2" id="cardtableCheck01"
                                            <?php echo e($user->achievement_edit == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="achievement_delete" value="2" id="cardtableCheck01"
                                            <?php echo e($user->achievement_delete == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                    </td> 
                                    
                                </tr>
                                <tr>
                                  <td colspan="5" class="table-light"><b style="color:#1d54ab;">Master Form Section</b> </td>
                              </tr>
                                 <tr>
                                    <td>Receipt Master</td>
                                    
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="receipt_master_view" value="2" id="cardtableCheck01"
                                            <?php echo e($user->receipt_master_view == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="receipt_master_create" value="2" id="cardtableCheck01"
                                            <?php echo e($user->receipt_master_create == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="receipt_master_edit" value="2" id="cardtableCheck01"
                                            <?php echo e($user->receipt_master_edit == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="receipt_master_delete" value="2" id="cardtableCheck01"
                                            <?php echo e($user->receipt_master_delete == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                    </td> 
                                    
                                </tr> 
                                  <tr>
                                    <td>Checklist Master</td>
                                    
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="checklist_master_view" value="2" id="cardtableCheck01"
                                            <?php echo e($user->checklist_master_view == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="checklist_master_create" value="2" id="cardtableCheck01"
                                            <?php echo e($user->checklist_master_create == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="checklist_master_edit" value="2" id="cardtableCheck01"
                                            <?php echo e($user->checklist_master_edit == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="checklist_master_delete" value="2" id="cardtableCheck01"
                                            <?php echo e($user->checklist_master_delete == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                    </td> 
                                    
                                </tr>
                                
                                <tr>
                                    <td>Tehsils</td>
                                    
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="tehsils_view" value="2" id="cardtableCheck01"
                                            <?php echo e($user->tehsils_view == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="tehsils_create" value="2" id="cardtableCheck01"
                                            <?php echo e($user->tehsils_create == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                    </td>
                                    
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="tehsils_delete" value="2" id="cardtableCheck01"
                                            <?php echo e($user->tehsils_delete == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                    </td>
                                    <td></td>
                                    
                                </tr>
                                  <tr>
                                    <td>Document</td>
                                    
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="document_master_view" value="2" id="cardtableCheck01"
                                            <?php echo e($user->document_master_view == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="document_master_create" value="2" id="cardtableCheck01"
                                            <?php echo e($user->document_master_create == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                    </td>
                                    
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="document_master_delete" value="2" id="cardtableCheck01"
                                            <?php echo e($user->document_master_delete == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                    </td> 
                                      <td></td>
                                    
                                </tr>
                               
                                 <tr>
                                    <td>Organizations</td>
                                    
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="organizations_master_view" value="2" id="cardtableCheck01"
                                            <?php echo e($user->organizations_master_view == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="organizations_master_create" value="2" id="cardtableCheck01"
                                            <?php echo e($user->organizations_master_create == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="organizations_master_edit" value="2" id="cardtableCheck01"
                                            <?php echo e($user->organizations_master_edit == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="organizations_master_delete" value="2" id="cardtableCheck01"
                                            <?php echo e($user->organizations_master_delete == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                    </td> 
                                    
                                </tr>
                                  <tr>
                                    <td>Leave Category</td>
                                    
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="leave_category_view" value="2" id="cardtableCheck01"
                                            <?php echo e($user->leave_category_view == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="leave_category_create" value="2" id="cardtableCheck01"
                                            <?php echo e($user->leave_category_create == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="leave_category_edit" value="2" id="cardtableCheck01"
                                            <?php echo e($user->leave_category_edit == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="leave_category_delete" value="2" id="cardtableCheck01"
                                            <?php echo e($user->leave_category_delete == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                    </td> 
                                    
                                </tr>
                                <tr>
                                    <td>Nomination type</td>
                                    
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="nomination_type_view" value="2" id="cardtableCheck01"
                                            <?php echo e($user->nomination_type_view == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="nomination_type_create" value="2" id="cardtableCheck01"
                                            <?php echo e($user->nomination_type_create == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="nomination_type_edit" value="2" id="cardtableCheck01"
                                            <?php echo e($user->nomination_type_edit == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="nomination_type_delete" value="2" id="cardtableCheck01"
                                            <?php echo e($user->nomination_type_delete == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                    </td> 
                                    
                                </tr>
                                <tr>
                                    <td>Achievement Types</td>
                                    
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="achievement_type_view" value="2" id="cardtableCheck01"
                                            <?php echo e($user->achievement_type_view == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="achievement_type_create" value="2" id="cardtableCheck01"
                                            <?php echo e($user->achievement_type_create == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="achievement_type_edit" value="2" id="cardtableCheck01"
                                            <?php echo e($user->achievement_type_edit == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="achievement_type_delete" value="2" id="cardtableCheck01"
                                            <?php echo e($user->achievement_type_delete == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                    </td> 
                                    
                                </tr>
                                <tr>
                                    <td>Affidavit Types</td>
                                    
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="affidavit_type_view" value="2" id="cardtableCheck01"
                                            <?php echo e($user->affidavit_type_view == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="affidavit_type_create" value="2" id="cardtableCheck01"
                                            <?php echo e($user->affidavit_type_create == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="affidavit_type_edit" value="2" id="cardtableCheck01"
                                            <?php echo e($user->affidavit_type_edit == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                    </td>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="affidavit_type_delete" value="2" id="cardtableCheck01"
                                            <?php echo e($user->affidavit_type_delete == 2 ? 'checked' : ''); ?> disabled >
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                    </td> 
                                    
                                </tr>
                                  
                            </tbody>
                        </table>
                                    </form>

                       <div class="hstack gap-2 justify-content-end" style="margin: 10px;">
<button type="button" class="btn btn-success" onclick="window.history.back();">Back</button>
                    </div>
                    </div>
                    
                </div>
              
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
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
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="<?php echo e(URL::asset('build/js/pages/select2.init.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/organization-login/assign-permission/view.blade.php ENDPATH**/ ?>