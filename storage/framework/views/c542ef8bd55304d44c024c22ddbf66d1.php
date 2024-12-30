<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
 <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
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
    <label for="organisation" class="form-label">Select Organisation</label>
    <select id="organisation" name="organisation" class="form-select mb-3">

    </select>
</div>

</div>

<div class="row">
    <div class="col-md-4">
    <label for="department_name" class="form-label">Select Department</label>
    <select name="department_name" id="department_name" class="form-select mb-3">

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
        <select name="designation" id="designation" class="form-select mb-3">
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

                        
                        
                                     
                                                





</div>
<div class="col-md-4" style="margin:0px 5px;">
    <label for="role_name" class="form-label">Select Role</label>
    <select name="role_name" id="role_name" class="form-select mb-2">
        <option value="">-- Select Role --</option>
    </select>
    <div class="invalid-feedback" style="color: red;"></div>
</div>
 <!--<div class="row mb-3">-->
 <!--                       <div class="col-md-4">-->
 <!--                           <label for="role-name-field" class="form-label">Role Name</label>-->
 <!--                           <input type="text" id="role-name-field" name="role_name" class="form-control <?php $__errorArgs = ['role_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Role Name" value="<?php echo e(old('role_name' , $user->role_name)); ?>" />-->
                           
 <!--                               <div class="invalid-feedback text-red"></div>-->
                           
 <!--                       </div>-->
                        
 <!--                   </div>-->

                    
                    
                </div>
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
                                <?php if((isset($permissions)) && (($permissions['dashborad_view'] == 2) || ($permissions['dashborad_create'] == 2) || ($permissions['dashborad_edit'] == 2)|| ($permissions['dashborad_delete'] == 2) )): ?>
                                <tr>
                                    <td>Dashboard</td>
                                    <?php if((isset($permissions)) && (($permissions['dashborad_view'] == 2) )): ?>
                                    <td>
                                         
                                         <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck1" name="dashborad_view"value="2"  
                                        <?php echo e($user->dashborad_view == 2 ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="SwitchCheck1">View</label>
                                    </div>
                                
                                    </td>
                                       <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['dashborad_create'] == 2) )): ?>
                                     <td>
                                       
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0" style="display:none;">
                                            <input class="form-check-input" type="checkbox"  name="dashborad_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->dashborad_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                    
                                    </td>
                                        <?php endif; ?>
                                        <?php if((isset($permissions)) && (($permissions['dashborad_edit'] == 2) )): ?>
                                     <td>
                                         
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0" style="display:none;">
                                            <input class="form-check-input" type="checkbox" name="dashborad_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->dashborad_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                       <?php if((isset($permissions)) && (($permissions['dashborad_delete'] == 2) )): ?>
                                     <td>
                                        
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0" style="display:none;">
                                        <input class="form-check-input" type="checkbox" name="dashborad_delete" value="2"  role="switch" id="SwitchCheck4" 
                                            <?php echo e($user->dashborad_delete == 2 ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="SwitchCheck4">delete</label>
                                    </div>
                                 
                                    </td>
                                       <?php endif; ?>
                                </tr>
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['department_view'] == 2) || ($permissions['department_create'] == 2) || ($permissions['department_edit'] == 2)|| ($permissions['department_delete'] == 2) )): ?>
                                <tr>
                                    <td>Department</td>
                                              <?php if((isset($permissions)) && (($permissions['department_view'] == 2) )): ?>
                                    <td>
                              
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="department_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->department_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                     
                                    </td>
                                       <?php endif; ?>
                                       <?php if((isset($permissions)) && (($permissions['department_create'] == 2) )): ?>
                                     <td>
                                    <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="department_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->department_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['department_edit'] == 2) )): ?>
                                     <td>
                                         
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="department_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->department_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                    
                                    </td>
                                        <?php endif; ?>
                                         <?php if((isset($permissions)) && (($permissions['department_delete'] == 2) )): ?>
                                     <td>
                                        
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="department_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->department_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                    
                                </tr>
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['designation_view'] == 2) || ($permissions['designation_create'] == 2) || ($permissions['designation_edit'] == 2)|| ($permissions['designation_delete'] == 2) )): ?>
                               <tr>
                                    <td>Designation</td>
                                     <?php if((isset($permissions)) && (($permissions['designation_view'] == 2) )): ?>
                                    <td>
                                       
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="designation_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->designation_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                       <?php if((isset($permissions)) && (($permissions['designation_create'] == 2) )): ?>
                                     <td>
                                       
                                        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="designation_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->designation_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                       <?php if((isset($permissions)) && (($permissions['designation_edit'] == 2) )): ?>
                                     <td>
                                      
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="designation_edit" value="2"  id="cardtableCheck01"
                                                <?php echo e($user->designation_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                      <?php if((isset($permissions)) && (($permissions['designation_delete'] == 2) )): ?>
                                     <td>
                                        
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="designation_delete" value="2"  id="cardtableCheck01"
                                                <?php echo e($user->designation_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                   
                                    </td>
                                         <?php endif; ?>
                                    
                                </tr> 
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['organization_view'] == 2) || ($permissions['organization_create'] == 2) || ($permissions['organization_edit'] == 2)|| ($permissions['organization_delete'] == 2) )): ?>
                                <tr>
                                  <td colspan="5" class="table-light"><b style="color:#1d54ab;">Organization Login Section </b> </td>
                                </tr>
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['organization_view'] == 2) || ($permissions['organization_create'] == 2) || ($permissions['organization_edit'] == 2)|| ($permissions['organization_delete'] == 2) )): ?>
                            
                                  <tr>
                                    <td>Organization Login Details</td>
                                    <?php if((isset($permissions)) && (($permissions['organization_view'] == 2) )): ?>
                                    <td>
                                        
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="organization_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->organization_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                      <?php if((isset($permissions)) && (($permissions['organization_create'] == 2) )): ?>
                                     <td>
                                         
                                        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="organization_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->organization_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                     
                                    </td>
                                       <?php endif; ?>
                                       <?php if((isset($permissions)) && (($permissions['organization_edit'] == 2) )): ?>
                                     <td>
                                         
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="organization_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->organization_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['organization_delete'] == 2) )): ?>
                                     <td>
                                         
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="organization_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->organization_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                </tr> 
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['staff_view'] == 2) || ($permissions['staff_create'] == 2) || ($permissions['staff_edit'] == 2)|| ($permissions['staff_delete'] == 2) )): ?>
                            
                                <tr>
                                    <td>Staff Selection</td>
                                         <?php if((isset($permissions)) && (($permissions['staff_view'] == 2) )): ?>
                                    <td>
                                   
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="staff_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->staff_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                      <?php if((isset($permissions)) && (($permissions['staff_create'] == 2) )): ?>
                                     <td>
                                        
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="staff_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->staff_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['staff_edit'] == 2) )): ?>
                                     <td>
                                         
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="staff_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->staff_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['staff_delete'] == 2) )): ?>
                                     <td>
                                         
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="staff_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->staff_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                     
                                    </td>
                                       <?php endif; ?>
                                </tr>
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['role_view'] == 2) || ($permissions['role_create'] == 2) || ($permissions['role_edit'] == 2)|| ($permissions['role_delete'] == 2) )): ?>
                            
                                  <tr>
                                    <td>Add Role</td>
                                      <?php if((isset($permissions)) && (($permissions['role_view'] == 2) )): ?>
                                    <td>
                                      
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="role_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->role_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                      <?php if((isset($permissions)) && (($permissions['role_create'] == 2) )): ?>
                                     <td>
                                         
                                        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="role_create" value="2"  id="cardtableCheck01"
                                                <?php echo e($user->role_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                      <?php if((isset($permissions)) && (($permissions['role_edit'] == 2) )): ?>
                                     <td>
                                       
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="role_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->role_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['role_delete'] == 2) )): ?>
                                     <td>
                                        
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="role_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->role_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                     
                                    </td>
                                       <?php endif; ?>
                                </tr>
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['permission_view'] == 2) || ($permissions['permission_create'] == 2) || ($permissions['permission_edit'] == 2)|| ($permissions['permission_delete'] == 2) )): ?>
                            
                                  <tr>
                                    <td>Assign Permission</td>
                                    <?php if((isset($permissions)) && (($permissions['permission_view'] == 2) )): ?>
                                    <td>
                                        
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="permission_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->permission_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['permission_create'] == 2) )): ?>
                                     <td>
                                         
                                        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="permission_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->permission_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['permission_edit'] == 2) )): ?>
                                     <td>
                                        
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="permission_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->permission_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['permission_delete'] == 2) )): ?>
                                     <td>
                                         
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="permission_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->permission_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                    
                                </tr>
                                <?php endif; ?>
                                
                                <?php if((isset($permissions)) && (($permissions['report_view'] == 2) || ($permissions['report_create'] == 2) || ($permissions['report_edit'] == 2)|| ($permissions['report_delete'] == 2) )): ?>
                            
                                 <tr>
                                     
                                    <td>Report</td>
                                    <?php if((isset($permissions)) && (($permissions['report_view'] == 2) )): ?>
                                    <td>
                                        
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox"  name="report_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->report_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                       <?php if((isset($permissions)) && (($permissions['report_create'] == 2) )): ?>
                                     <td>
                                        
                                        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="report_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->report_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                      <?php if((isset($permissions)) && (($permissions['report_edit'] == 2) )): ?>
                                     <td>
                                        
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-02">
                                            <input class="form-check-input" type="checkbox" name="report_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->report_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['report_delete'] == 2) )): ?>
                                     <td>
                                         
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="report_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->report_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                    
                                </tr>
                                <?php endif; ?>
                                  
                                 <tr>
                                  <td colspan="5" class="table-light"><b style="color:#1d54ab;">User Profile Section</b> </td>
                              </tr>
                              <?php if((isset($permissions)) && (($permissions['userprofile_view'] == 2) || ($permissions['userprofile_create'] == 2) || ($permissions['ruserprofile_edit'] == 2)|| ($permissions['userprofile_delete'] == 2) )): ?>
                            
                                <tr>
                                    <td>User Profile</td>
                                    <?php if((isset($permissions)) && (($permissions['userprofile_view'] == 2) )): ?>
                                    <td>
                                        
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="userprofile_view" value="2"  id="cardtableCheck01"
                                                <?php echo e($user->userprofile_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['userprofile_create'] == 2) )): ?>
                                     <td>
                                         
                                        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="userprofile_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->userprofile_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                      <?php if((isset($permissions)) && (($permissions['userprofile_edit'] == 2) )): ?>
                                     <td>
                                        
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="userprofile_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->userprofile_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['userprofile_delete'] == 2) )): ?>
                                     <td>
                                         
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="userprofile_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->userprofile_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                     
                                    </td>
                                       <?php endif; ?>
                                </tr>
                                <?php endif; ?>
                                 <?php if((isset($permissions)) && (($permissions['userdetail_view'] == 2) || ($permissions['userdetail_create'] == 2) || ($permissions['userdetail_edit'] == 2)|| ($permissions['userdetail_delete'] == 2) )): ?>
                            
                                  <tr>
                                    <td>User Details</td>
                                     <?php if((isset($permissions)) && (($permissions['userdetail_view'] == 2) )): ?>
                                    <td>
                                       
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="userdetail_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->userdetail_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['userdetail_create'] == 2) )): ?>
                                     <td>
                                         
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="userdetail_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->userdetail_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                       <?php if((isset($permissions)) && (($permissions['userdetail_edit'] == 2) )): ?>
                                     <td>
                                        
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="userdetail_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->userdetail_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['userdetail_delete'] == 2) )): ?>
                                     <td>
                                         
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox"  name="userdetail_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->userdetail_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                    
                                </tr>
                                <?php endif; ?>
                                 <?php if((isset($permissions)) && (($permissions['document_view'] == 2) || ($permissions['document_create'] == 2) || ($permissions['document_edit'] == 2)|| ($permissions['document_delete'] == 2) )): ?>
                            
                                 <tr>
                                    <td>Document Details</td>
                                     <?php if((isset($permissions)) && (($permissions['document_view'] == 2) )): ?>
                                    <td>
                                       
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="document_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->document_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['document_create'] == 2) )): ?>
                                     <td>
                                         
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="document_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->document_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['document_edit'] == 2) )): ?>
                                     <td>
                                         
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="document_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->document_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['document_delete'] == 2) )): ?>
                                     <td>
                                         
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="document_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->document_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    
                                </tr>
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['leave_view'] == 2) || ($permissions['leave_create'] == 2) || ($permissions['leave_edit'] == 2)|| ($permissions['leave_delete'] == 2) )): ?>
                            
                                 <tr>
                                    <td>Leave Details</td>
                                    <?php if((isset($permissions)) && (($permissions['leave_view'] == 2) )): ?>
                                    <td>
                                        
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="leave_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->leave_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['leave_create'] == 2) )): ?>
                                     <td>
                                         
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="leave_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->leave_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                      <?php if((isset($permissions)) && (($permissions['leave_edit'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="leave_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->leave_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                      <?php if((isset($permissions)) && (($permissions['leave_delete'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="leave_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->leave_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                    
                                </tr>
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['nomination_view'] == 2) || ($permissions['nomination_create'] == 2) || ($permissions['nomination_edit'] == 2)|| ($permissions['nomination_delete'] == 2) )): ?>
                            
                                 <tr>
                                    <td>Nomination Details</td>
                                    <?php if((isset($permissions)) && (($permissions['nomination_view'] == 2) )): ?>
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="nomination_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->nomination_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['nomination_create'] == 2) )): ?>
                                     <td>
                                        <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="nomination_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->nomination_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['nomination_edit'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="nomination_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->nomination_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['nomination_delete'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="nomination_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->nomination_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    
                                </tr>
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['salary_view'] == 2) || ($permissions['salary_create'] == 2) || ($permissions['salary_edit'] == 2)|| ($permissions['salary_delete'] == 2) )): ?>
                            
                                 <tr>
                                    <td>Salary Details</td>
                                    <?php if((isset($permissions)) && (($permissions['salary_view'] == 2) )): ?>
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="salary_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->salary_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['salary_create'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="salary_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->salary_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['salary_edit'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="salary_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->salary_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                      <?php if((isset($permissions)) && (($permissions['salary_delete'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="salary_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->salary_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                </tr>
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['checklist_view'] == 2) || ($permissions['checklist_create'] == 2) || ($permissions['checklist_edit'] == 2)|| ($permissions['checklist_delete'] == 2) )): ?>
                            
                                 <tr>
                                    <td>Checklist</td>
                                    <?php if((isset($permissions)) && (($permissions['checklist_view'] == 2) )): ?>
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="checklist_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->checklist_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['checklist_create'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="checklist_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->checklist_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['checklist_edit'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="checklist_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->checklist_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['checklist_delete'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="checklist_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->checklist_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                </tr>
                                <?php endif; ?>
                                
                                 <?php if((isset($permissions)) && (($permissions['trans_join_view'] == 2) || ($permissions['trans_join_create'] == 2) || ($permissions['trans_join_edit'] == 2)|| ($permissions['trans_join_delete'] == 2) )): ?>
                            
                                  <tr>
                                    <td>Transfer & Joining Order</td>
                                    <?php if((isset($permissions)) && (($permissions['trans_join_view'] == 2) )): ?>
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="trans_join_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->trans_join_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['trans_join_create'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="trans_join_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->trans_join_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['trans_join_edit'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="trans_join_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->trans_join_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['trans_join_delete'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="trans_join_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->trans_join_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                    
                                    </td> 
                                        <?php endif; ?>
                                    
                                </tr>
                                <?php endif; ?>
                                 <?php if((isset($permissions)) && (($permissions['other_receipt_view'] == 2) || ($permissions['other_receipt_create'] == 2) || ($permissions['other_receipt_edit'] == 2)|| ($permissions['other_receipt_delete'] == 2) )): ?>
                            
                                  <tr>
                                    <td>Other Receipt</td>
                                    <?php if((isset($permissions)) && (($permissions['other_receipt_view'] == 2) )): ?>
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="other_receipt_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->other_receipt_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['other_receipt_create'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="other_receipt_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->other_receipt_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Add Letter</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                      <td></td>  <td></td> 
                                    
                                </tr>
                                <?php endif; ?>
                                 <?php if((isset($permissions)) && (($permissions['affidavit_view'] == 2) || ($permissions['affidavit_create'] == 2) || ($permissions['affidavit_edit'] == 2)|| ($permissions['affidavit_delete'] == 2) )): ?>
                            
                                  <tr>
                                    <td>Affidavit </td>
                                    <?php if((isset($permissions)) && (($permissions['affidavit_view'] == 2) )): ?>
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="affidavit_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->affidavit_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['affidavit_create'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="affidavit_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->affidavit_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['affidavit_edit'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="affidavit_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->affidavit_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                     
                                    </td>
                                       <?php endif; ?>
                                       <?php if((isset($permissions)) && (($permissions['affidavit_delete'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="affidavit_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->affidavit_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                       
                                    </td> 
                                     <?php endif; ?>
                                    
                                </tr>
                                <?php endif; ?>
                                 <?php if((isset($permissions)) && (($permissions['achievement_view'] == 2) || ($permissions['achievement_create'] == 2) || ($permissions['achievement_edit'] == 2)|| ($permissions['achievement_delete'] == 2) )): ?>
                            
                                  <tr>
                                    <td>Achievement </td>
                                    <?php if((isset($permissions)) && (($permissions['achievement_view'] == 2) )): ?>
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="achievement_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->achievement_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['achievement_create'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="achievement_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->achievement_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                      <?php if((isset($permissions)) && (($permissions['achievement_edit'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="achievement_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->achievement_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['achievement_delete'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="achievement_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->achievement_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                        
                                    </td> 
                                    <?php endif; ?>
                                    
                                </tr>
                                <?php endif; ?>
                                <tr>
                                  <td colspan="5" class="table-light"><b style="color:#1d54ab;">Master Form Section</b> </td>
                              </tr>
                               <?php if((isset($permissions)) && (($permissions['receipt_master_view'] == 2) || ($permissions['receipt_master_create'] == 2) || ($permissions['receipt_master_edit'] == 2)|| ($permissions['receipt_master_delete'] == 2) )): ?>
                            
                                 <tr>
                                    <td>Receipt Master</td>
                                    <?php if((isset($permissions)) && (($permissions['receipt_master_view'] == 2) )): ?>
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="receipt_master_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->receipt_master_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                      <?php if((isset($permissions)) && (($permissions['receipt_master_create'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="receipt_master_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->receipt_master_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['receipt_master_edit'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="receipt_master_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->receipt_master_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                      <?php if((isset($permissions)) && (($permissions['receipt_master_delete'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="receipt_master_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->receipt_master_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                      
                                    </td> 
                                      <?php endif; ?>
                                    
                                </tr> 
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['checklist_master_view'] == 2) || ($permissions['checklist_master_create'] == 2) || ($permissions['checklist_master_edit'] == 2)|| ($permissions['checklist_master_delete'] == 2) )): ?>
                            
                                  <tr>
                                    <td>Checklist Master</td>
                                    <?php if((isset($permissions)) && (($permissions['checklist_master_view'] == 2) )): ?>
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="checklist_master_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->checklist_master_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['checklist_master_create'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="checklist_master_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->checklist_master_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['checklist_master_edit'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="checklist_master_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->checklist_master_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['checklist_master_delete'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="checklist_master_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->checklist_master_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                    
                                    </td> 
                                        <?php endif; ?>
                                </tr>
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['tehsils_view'] == 2) || ($permissions['tehsils_create'] == 2) || ($permissions['tehsils_edit'] == 2)|| ($permissions['tehsils_delete'] == 2) )): ?>
                            
                                <tr>
                                    <td>Tehsils</td>
                                    <?php if((isset($permissions)) && (($permissions['tehsils_view'] == 2) )): ?>
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="tehsils_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->tehsils_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['tehsils_create'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="tehsils_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->tehsils_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['tehsils_delete'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="tehsils_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->tehsils_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                    <td></td>
                                    
                                </tr>
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['document_master_view'] == 2) || ($permissions['document_master_create'] == 2) || ($permissions['document_master_edit'] == 2)|| ($permissions['document_master_delete'] == 2) )): ?>
                            
                                  <tr>
                                    <td>Document</td>
                                    <?php if((isset($permissions)) && (($permissions['document_master_view'] == 2) )): ?>
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="document_master_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->document_master_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                      <?php if((isset($permissions)) && (($permissions['document_master_create'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="document_master_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->document_master_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['document_master_delete'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="document_master_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->document_master_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                  
                                    </td>
                                          <?php endif; ?>
                                      <td></td>
                                    
                                </tr>
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['organizations_master_view'] == 2) || ($permissions['organizations_master_create'] == 2) || ($permissions['organizations_master_edit'] == 2)|| ($permissions['organizations_master_delete'] == 2) )): ?>
                            
                                 <tr>
                                    <td>Organizations</td>
                                    <?php if((isset($permissions)) && (($permissions['organizations_master_view'] == 2) )): ?>
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="organizations_master_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->organizations_master_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['organizations_master_create'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="organizations_master_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->organizations_master_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['organizations_master_edit'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="organizations_master_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->organizations_master_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>

                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['organizations_master_delete'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="organizations_master_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->organizations_master_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                       
                                    </td> 
                                     <?php endif; ?>
                                </tr>
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['leave_category_view'] == 2) || ($permissions['leave_category_create'] == 2) || ($permissions['leave_category_edit'] == 2)|| ($permissions['leave_category_delete'] == 2) )): ?>
                            
                                  <tr>
                                    <td>Leave Category</td>
                                    <?php if((isset($permissions)) && (($permissions['leave_category_view'] == 2) )): ?>
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="leave_category_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->leave_category_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                      <?php if((isset($permissions)) && (($permissions['leave_category_view'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="leave_category_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->leave_category_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['leave_category_edit'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="leave_category_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->leave_category_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                     
                                    </td>
                                       <?php endif; ?>
                                       <?php if((isset($permissions)) && (($permissions['leave_category_delete'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="leave_category_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->leave_category_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                        
                                    </td> 
                                    <?php endif; ?>
                                    
                                </tr>
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['nomination_type_view'] == 2) || ($permissions['nomination_type_create'] == 2) || ($permissions['nomination_type_edit'] == 2)|| ($permissions['nomination_type_delete'] == 2) )): ?>
                            
                                <tr>
                                    <td>Nomination type</td>
                                    <?php if((isset($permissions)) && (($permissions['nomination_type_view'] == 2) )): ?>
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="nomination_type_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->nomination_type_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['nomination_type_create'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="nomination_type_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->nomination_type_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                     
                                    </td>
                                       <?php endif; ?>
                                       <?php if((isset($permissions)) && (($permissions['nomination_type_edit'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="nomination_type_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->nomination_type_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['nomination_type_delete'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="nomination_type_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->nomination_type_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                      
                                    </td> 
                                      <?php endif; ?>
                                    
                                </tr>
                                <?php endif; ?>
                                 <?php if((isset($permissions)) && (($permissions['achievement_type_view'] == 2) || ($permissions['achievement_type_create'] == 2) || ($permissions['achievement_type_edit'] == 2)|| ($permissions['achievement_type_delete'] == 2) )): ?>
                            
                                <tr>
                                    <td>Achievement Types</td>
                                    <?php if((isset($permissions)) && (($permissions['achievement_type_view'] == 2) )): ?>
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="achievement_type_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->achievement_type_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['achievement_type_create'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="achievement_type_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->achievement_type_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['achievement_type_edit'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="achievement_type_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->achievement_type_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['achievement_type_delete'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="achievement_type_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->achievement_type_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                      
                                    </td> 
                                      <?php endif; ?>
                                    
                                </tr>
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['affidavit_type_view'] == 2) || ($permissions['affidavit_type_create'] == 2) || ($permissions['affidavit_type_edit'] == 2)|| ($permissions['affidavit_type_delete'] == 2) )): ?>
                            
                                <tr>
                                    <td>Affidavit Types</td>
                                    <?php if((isset($permissions)) && (($permissions['affidavit_type_view'] == 2) )): ?>
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="affidavit_type_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->affidavit_type_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['affidavit_type_create'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="affidavit_type_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->affidavit_type_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['affidavit_type_edit'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="affidavit_type_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->affidavit_type_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                      <?php if((isset($permissions)) && (($permissions['affidavit_type_delete'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="affidavit_type_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->affidavit_type_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                      
                                    </td>
                                      <?php endif; ?>
                                    
                                </tr>
                                <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['audit_view'] == 2) || ($permissions['audit_create'] == 2) || ($permissions['audit_edit'] == 2)|| ($permissions['audit_delete'] == 2) )): ?>
                            
                                <tr>
                                    <td>Audit</td>
                                    <?php if((isset($permissions)) && (($permissions['audit_view'] == 2) )): ?>
                                    <td>
                                         <div class="form-check form-switch mb-2">
                                            <input class="form-check-input" type="checkbox" name="audit_view" value="2" id="cardtableCheck01"
                                                <?php echo e($user->audit_view == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">View</label>
                                        </div>
                                        
                                    </td>
                                    <?php endif; ?>
                                    <?php if((isset($permissions)) && (($permissions['audit_create'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="audit_create" value="2" id="cardtableCheck01"
                                                <?php echo e($user->audit_create == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Create</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['audit_edit'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="audit_edit" value="2" id="cardtableCheck01"
                                                <?php echo e($user->audit_edit == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Edit</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                     <?php if((isset($permissions)) && (($permissions['audit_delete'] == 2) )): ?>
                                     <td>
                                         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">
                                            <input class="form-check-input" type="checkbox" name="audit_delete" value="2" id="cardtableCheck01"
                                                <?php echo e($user->audit_delete == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="cardtableCheck01">Delete</label>
                                        </div>
                                       
                                    </td>
                                     <?php endif; ?>
                                    
                                </tr>
                                <?php endif; ?>
                                <!--<?php if((isset($permissions)) && (($permissions['pension_view'] == 2) || ($permissions['pension_create'] == 2) || ($permissions['pension_edit'] == 2)|| ($permissions['pension_delete'] == 2) )): ?>-->
                            
                                <!--<tr>-->
                                <!--    <td>Pension</td>-->
                                    
                                <!--    <td><?php if((isset($permissions)) && (($permissions['pension_view'] == 2) )): ?>-->
                                <!--         <div class="form-check form-switch mb-2">-->
                                <!--            <input class="form-check-input" type="checkbox" name="pension_view" value="2" id="cardtableCheck01"
                                    <?php echo e($user->pension_view == 2 ? 'checked' : ''); ?>>-->
                                <!--            <label class="form-check-label" for="cardtableCheck01">View</label>-->
                                <!--        </div>-->
                                <!--<?php endif; ?>-->
                                <!--    </td>-->
                                <!--     <td><?php if((isset($permissions)) && (($permissions['pension_create'] == 2) )): ?>-->
                                <!--         <div class="form-check form-switch form-switch-success mb-2 mb-md-0">-->
                                <!--            <input class="form-check-input" type="checkbox" name="pension_create" value="2" id="cardtableCheck01"
                                    <?php echo e($user->pension_create == 2 ? 'checked' : ''); ?>>-->
                                <!--            <label class="form-check-label" for="cardtableCheck01">Create</label>-->
                                <!--        </div>-->
                                 <!--<?php endif; ?>-->
                                <!--    </td>-->
                                <!--     <td><?php if((isset($permissions)) && (($permissions['pension_edit'] == 2) )): ?>-->
                                <!--         <div class="form-check form-switch form-switch-warning mb-2 mb-md-0">-->
                                <!--            <input class="form-check-input" type="checkbox" name="pension_edit" value="2" id="cardtableCheck01"
                                    <?php echo e($user->pension_edit == 2 ? 'checked' : ''); ?>>-->
                                <!--            <label class="form-check-label" for="cardtableCheck01">Edit</label>-->
                                <!--        </div>-->
                                  <!--<?php endif; ?>-->
                                <!--    </td>-->
                                <!--     <td><?php if((isset($permissions)) && (($permissions['pension_delete'] == 2) )): ?>-->
                                <!--         <div class="form-check form-switch form-switch-danger mb-2 mb-md-0">-->
                                <!--            <input class="form-check-input" type="checkbox" name="pension_delete" value="2" id="cardtableCheck01"
                                    <?php echo e($user->pension_delete == 2 ? 'checked' : ''); ?>>-->
                                <!--            <label class="form-check-label" for="cardtableCheck01">Delete</label>-->
                                <!--        </div>-->
                                  <!--<?php endif; ?>-->
                                <!--    </td> -->
                                    
                                <!--</tr>-->
                                <!--<?php endif; ?>-->
                                
                            </tbody>
                  
                        </table>
                        <div style="display: flex; justify-content: flex-end; gap: 10px;">
    <div class="hstack gap-2">
        <button type="submit" class="btn btn-success">update</button>
    </div>

    <div class="hstack gap-2">
        <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo e(route('rolespermission.index')); ?>'">Back</button>
    </div>
</div>
                    </div>
                    
                </div>
              
            </div><!-- end card-body -->
            </form>
        </div><!-- end card -->
    </div><!-- end col -->
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
         $('#role_name').select2({ placeholder: 'Select Role', allowClear: true });

    // Set initial values
    var initialState = '<?php echo e($user->state); ?>';
    var initialDistrict = '<?php echo e($user->district); ?>';
    var initialTaluka = '<?php echo e($user->taluka); ?>';
    var initialDesignation = '<?php echo e($user->designation_name); ?>';
    var initialDepartment = '<?php echo e($user->name); ?>';
    var initialOrganisation = '<?php echo e($user->org_name); ?>';
    
        var initialRoles = '<?php echo e($user->role_name); ?>'; // Corrected naming for consistency

    

    function loadDropdowns() {
        loadInitialDistricts();
        loadInitialTalukas();
        loadOrganisations();
        loadDepartments();
        loadDesignations();
                loadRoles(); 

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
                    $('#organisation').val('<?php echo e($user->organisation); ?>').trigger('change');
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
    console.log('Initial Department ID:', '<?php echo e($user->department_name); ?>');

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

                    if (response.some(dept => dept.id == '<?php echo e($user->department_name); ?>')) {
                        departmentDropdown.val('<?php echo e($user->department_name); ?>').trigger('change');
                        console.log('Department value set:', '<?php echo e($user->department_name); ?>');
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
                    $('#designation').val('<?php echo e($user->designation); ?>').trigger('change');
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
                    $('#designation').val('<?php echo e($user->designation); ?>').trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching designations:', xhr.responseText);
                }
            });
        }
    }
    
     function loadRoles() {
        var designation = $('#designation').val(); 

        if (designation) {
            $.ajax({
                url: '<?php echo e(route('fetchroles')); ?>',
                type: 'GET',
                data: { designation: designation },
                success: function(response) {
                    var rolesDropdown = $('#role_name');
                    rolesDropdown.empty().append('<option value="">Select Role</option>'); // Set default option
                    
                    response.forEach(role => {
                        rolesDropdown.append($('<option>', { value: role.id, text: role.role_name }));
                    });

                    // Set the initial value after the options are loaded
                    if (initialRoles) {
                        rolesDropdown.val(response.find(role => role.role_name === initialRoles)?.id || '').trigger('change'); // Set initial value
                    }
                },
                error: function(xhr) {
                    console.error('Error fetching roles:', xhr.responseText);
                }
            });
        } else {
            $('#role_name').empty().append('<option value="">Select Role</option>');
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

$('#department_name, #taluka-field, #organisation').change(loadDesignations);
        $('#designation').change(loadRoles);

});

    </script>  
    
<script>
    $(document).ready(function() {
    // Existing code for state, district, taluka, organisation, and designation dropdowns...

    function fetchRoles() {
        var state = $('#state').val();
        console.log(state);
        var district = $('#district').val();
        
        var organisation = $('#organisation').val();
        var department = $('#department_name').val();
        var designation = $('#designation').val();

        if (state && district && organisation && department && designation) {
            $.ajax({
                url: '<?php echo e(route('roles-dataget')); ?>', // Replace this with your actual route to fetch roles
                type: 'GET',
                data: {
                    state: state,
                    district: district,
                    
                    organisation: organisation,
                    department_name: department,
                    designation: designation
                },
              success: function(response) {
    var roleDropdown = $('#role_name');
    roleDropdown.empty().append('<option value="">-- Select Role --</option>');

    if (response.length === 0) {
        console.warn('No roles found for the selected filters.');
    } else {
        response.forEach(function(role) {
            var option = $('<option>', {
                value: role.id,
                text: role.role_name
            });

            // Check if the role matches the user's role name
            if (role.role_name === '<?= $user->role_name ?>') {
                option.prop('selected', true);
            }

            roleDropdown.append(option);
        });
    }
},

                error: function(xhr) {
                    console.error('Error fetching roles:', xhr.responseText);
                }
            });
        } else {
            console.warn('Missing state, district, organisation, department, or designation.');
        }
    }

    // Trigger role fetch when all relevant fields have values
    $('#designation,  #department_name').change(fetchRoles);
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/organization-login/assign-permission/edit.blade.php ENDPATH**/ ?>