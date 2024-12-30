<!-- ========== App Menu ========== -->
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
            'achievement_type'
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
        'achievement_type'
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
        'achievement_type'
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
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('build/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('build/images/logo-dark.png')); ?>" width="170px" height="auto">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('build/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('build/images/logo-light.png')); ?>" alt="" width="170px" height="auto">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span><?php echo app('translator')->get('translation.menu'); ?>
                    </span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="mdi mdi-speedometer"></i> <span><?php echo app('translator')->get('translation.dashboards'); ?>
                        </span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                     
                            <li class="nav-item">
<a href="/index" class="nav-link">Dashboard</a>
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
                 <?php if((isset($permissions)) && (($permissions['department_view'] == 2) || 
                               ($permissions['department_create'] == 2) || 
                               ($permissions['department_edit'] == 2) || 
                               ($permissions['department_delete'] == 2))): ?>
                  <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebardepart" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebardepart">
                        <i class="mdi mdi-account-supervisor"></i> <span>Departments
                        </span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebardepart">
                        <ul class="nav nav-sm flex-column">
                     
                            <li class="nav-item">
                                <a href="<?php echo e(route('departments.index')); ?>" class="nav-link">View Department
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                </li>
                <?php endif; ?>
                 <?php if((isset($permissions)) && (($permissions['designation_view'] == 2) || 
                               ($permissions['designation_create'] == 2) || 
                               ($permissions['designation_edit'] == 2) || 
                               ($permissions['designation_delete'] == 2))): ?>
                   <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebardesignation" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebardesignation">
                        <i class="mdi mdi-account-tie-voice"></i> <span>Designation
                        </span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebardesignation">
                        <ul class="nav nav-sm flex-column">
                     
                        
                            <li class="nav-item">
                                <a href="<?php echo e(route('designations.index')); ?>" class="nav-link">View Designation
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                </li>
                <?php endif; ?>
                 <?php if((isset($permissions)) && (($permissions['receipt_master_view'] == 2)||($permissions['receipt_master_create'] == 2)||($permissions['receipt_master_edit'] == 2)||($permissions['receipt_master_delete'] == 2)
                 ||($permissions['checklist_master_view'] == 2)||($permissions['checklist_master_create'] == 2)||($permissions['checklist_master_edit'] == 2)||($permissions['checklist_master_delete'] == 2) 
                 ||($permissions['tehsils_view'] == 2)||($permissions['tehsils_create'] == 2)||($permissions['tehsils_edit'] == 2)||($permissions['tehsils_delete'] == 2)
                 ||($permissions['document_master_view'] == 2)||($permissions['document_master_create'] == 2)||($permissions['document_master_edit'] == 2)||($permissions['document_master_delete'] == 2)
                 ||($permissions['organizations_master_view'] == 2)||($permissions['organizations_master_create'] == 2)||($permissions['organizations_master_edit'] == 2)||($permissions['organizations_master_delete'] == 2)
                  ||($permissions['leave_category_view'] == 2)||($permissions['leave_category_create'] == 2)||($permissions['leave_category_edit'] == 2)||($permissions['leave_category_delete'] == 2)
                  ||($permissions['nomination_type_view'] == 2)||($permissions['nomination_type_create'] == 2)||($permissions['nomination_type_edit'] == 2)||($permissions['nomination_type_delete'] == 2)
                ||($permissions['affidavit_type_view'] == 2)||($permissions['affidavit_type_create'] == 2)||($permissions['affidavit_type_edit'] == 2)||($permissions['affidavit_type_delete'] == 2)
                ||($permissions['achievement_type_view'] == 2)||($permissions['achievement_type_create'] == 2)||($permissions['achievement_type_edit'] == 2)||($permissions['achievement_type_delete'] == 2)
                )): ?>
                  <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarchecklist" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarchecklist">
                        <i class="mdi mdi-card-account-details"></i> <span> Master Form
                        </span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarchecklist">
                        <ul class="nav nav-sm flex-column">
                     
                             <?php if((isset($permissions)) && (($permissions['receipt_master_view'] == 2)||($permissions['receipt_master_create'] == 2)
                            ||($permissions['receipt_master_edit'] == 2)||($permissions['receipt_master_delete'] == 2))): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('checklists.index')); ?>" class="nav-link"> Receipt Master
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php if((isset($permissions)) && (($permissions['checklist_master_view'] == 2)||($permissions['checklist_master_create'] == 2)
                             ||($permissions['checklist_master_edit'] == 2)||($permissions['checklist_master_delete'] == 2) )): ?>
                             <li class="nav-item">
                                <a href="<?php echo e(route('checklist-master.index')); ?>" class="nav-link"> Checklist Master
                                </a>
                            </li>
                           <?php endif; ?>
                            <?php if((isset($permissions)) && (($permissions['tehsils_view'] == 2)||($permissions['tehsils_create'] == 2)
                            ||($permissions['tehsils_edit'] == 2)||($permissions['tehsils_delete'] == 2))): ?>
                             <li class="nav-item">
                                <a href="<?php echo e(url('tehshil')); ?>" class="nav-link">Tehsil
                                </a>
                            </li>
                            <?php endif; ?>
                             <?php if((isset($permissions)) && (($permissions['document_master_view'] == 2)||($permissions['document_master_create'] == 2)
                             ||($permissions['document_master_edit'] == 2)||($permissions['document_master_delete'] == 2))): ?>
                              <li class="nav-item">
                                <a href="<?php echo e(url('document')); ?>" class="nav-link">Documents
                                </a>
                            </li>
                            <?php endif; ?>
                             <?php if((isset($permissions)) && (($permissions['organizations_master_view'] == 2)||($permissions['organizations_master_create'] == 2)
                             ||($permissions['organizations_master_edit'] == 2)||($permissions['organizations_master_delete'] == 2) )): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(url('organization')); ?>" class="nav-link">Organizations
                                </a>
                            </li>
                            <?php endif; ?>
                             <?php if((isset($permissions)) && (($permissions['leave_category_view'] == 2)||($permissions['leave_category_create'] == 2)
                             ||($permissions['leave_category_edit'] == 2)||($permissions['leave_category_delete'] == 2))): ?>
                            
                             <li class="nav-item">
                                <a href="<?php echo e(route('leaves_type')); ?>" class="nav-link"> Leave category
                                </a>
                            </li>
                            <?php endif; ?>
                             <?php if((isset($permissions)) && (($permissions['nomination_type_view'] == 2)||($permissions['nomination_type_create'] == 2)
                             ||($permissions['nomination_type_edit'] == 2)||($permissions['nomination_type_delete'] == 2))): ?>
                                  <li class="nav-item">
                                <a href="<?php echo e(route('nomination_type')); ?>" class="nav-link"> Nomination type 
                                </a>
                            </li>
                            <?php endif; ?>
                             <?php if((isset($permissions)) && (($permissions['achievement_type_view'] == 2)||($permissions['achievement_type_create'] == 2)
                             ||($permissions['achievement_type_edit'] == 2)||($permissions['achievement_type_delete'] == 2))): ?>
                                   <li class="nav-item">
                                <a href="<?php echo e(route('achievements.index')); ?>" class="nav-link"> Achievement category
                                </a>
                            </li>
                            <?php endif; ?>
                             <?php if((isset($permissions)) && (($permissions['affidavit_type_view'] == 2)||($permissions['affidavit_type_create'] == 2)
                             ||($permissions['affidavit_type_edit'] == 2)||($permissions['affidavit_type_delete'] == 2))): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('affidavits.index')); ?>" class="nav-link"> Affidavit category
                                </a>
                            </li>
                             <?php endif; ?>
                           </ul>
                    </div>
                </li>
               <?php endif; ?>
               <?php if((isset($permissions)) && (
    ($permissions['organization_view'] == 2) || ($permissions['organization_create'] == 2) || ($permissions['organization_edit'] == 2) || ($permissions['organization_delete'] == 2) ||
    ($permissions['staff_view'] == 2) || ($permissions['staff_create'] == 2) || ($permissions['staff_edit'] == 2) || ($permissions['staff_delete'] == 2) ||
    ($permissions['role_view'] == 2) || ($permissions['role_create'] == 2) || ($permissions['role_edit'] == 2) || ($permissions['role_delete'] == 2) ||
    ($permissions['permission_view'] == 2) || ($permissions['permission_create'] == 2) || ($permissions['permission_edit'] == 2) || ($permissions['permission_delete'] == 2)
)): ?>
                  <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarleaves" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarleaves">
                        <i class="mdi mdi-apps"></i> <span>Organization Login
                        </span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarleaves">
                        <ul class="nav nav-sm flex-column">
                     
                 
                             <?php if((isset($permissions)) && (($permissions['staff_view'] == 2) 
                             || ($permissions['staff_create'] == 2) || ($permissions['staff_edit'] == 2) || ($permissions['staff_delete'] == 2))): ?>
                           <li class="nav-item">
                                <a href="<?php echo e(route('staff-add.index')); ?>" class="nav-link">Staff Selection
                                </a>
                            </li>
                            <?php endif; ?>
                             <?php if((isset($permissions)) && (($permissions['role_view'] == 2) || ($permissions['role_create'] == 2)
                             || ($permissions['role_edit'] == 2) || ($permissions['role_delete'] == 2) )): ?>
                             <li class="nav-item">
                                <a href="<?php echo e(route('roles.index')); ?>" class="nav-link">Add Roles
                                </a>
                            </li>
                            <?php endif; ?>
                             <?php if((isset($permissions)) && (($permissions['permission_view'] == 2) || ($permissions['permission_create'] == 2) 
                             || ($permissions['permission_edit'] == 2) || ($permissions['permission_delete'] == 2))): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('rolespermission.index')); ?>" class="nav-link">Assign Permissions
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
                <?php endif; ?>
                <?php if((isset($permissions)) && (
    ($permissions['userprofile_view'] == 2) || ($permissions['userprofile_create'] == 2) || ($permissions['userprofile_edit'] == 2) || ($permissions['userprofile_delete'] == 2) ||
    ($permissions['userdetail_view'] == 2) || ($permissions['userdetail_create'] == 2) || ($permissions['userdetail_edit'] == 2) || ($permissions['userdetail_delete'] == 2) ||
    ($permissions['document_view'] == 2) || ($permissions['document_create'] == 2) || ($permissions['document_edit'] == 2) || ($permissions['document_delete'] == 2) ||
    ($permissions['leave_view'] == 2) || ($permissions['leave_create'] == 2) || ($permissions['leave_edit'] == 2) || ($permissions['leave_delete'] == 2) ||
    ($permissions['nomination_view'] == 2) || ($permissions['nomination_create'] == 2) || ($permissions['nomination_edit'] == 2) || ($permissions['nomination_delete'] == 2) ||
    ($permissions['salary_view'] == 2) || ($permissions['salary_create'] == 2) || ($permissions['salary_edit'] == 2) || ($permissions['salary_delete'] == 2) ||
    ($permissions['checklist_view'] == 2) || ($permissions['checklist_create'] == 2) || ($permissions['checklist_edit'] == 2) || ($permissions['checklist_delete'] == 2) ||
    ($permissions['trans_join_view'] == 2) || ($permissions['trans_join_create'] == 2) || ($permissions['trans_join_edit'] == 2) || ($permissions['trans_join_delete'] == 2) ||
    ($permissions['other_receipt_view'] == 2) || ($permissions['other_receipt_create'] == 2) || ($permissions['other_receipt_edit'] == 2) || ($permissions['other_receipt_delete'] == 2) ||
    ($permissions['affidavit_view'] == 2) || ($permissions['affidavit_create'] == 2) || ($permissions['affidavit_edit'] == 2) || ($permissions['affidavit_delete'] == 2) ||
    ($permissions['achievement_view'] == 2) || ($permissions['achievement_create'] == 2) || ($permissions['achievement_edit'] == 2) || ($permissions['achievement_delete'] == 2)
)): ?>
                    <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebaruserprofile" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebaruserprofile">
                        <i class="mdi mdi-account-circle"></i> <span>User Profile
                        </span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebaruserprofile">
                        <ul class="nav nav-sm flex-column">
                     
                         <!--<li class="nav-item">-->
                         <!--       <a href="index" class="nav-link">Add User Profile-->
                         <!--       </a>-->
                         <!--   </li>-->
                             <?php if((isset($permissions)) && (
    ($permissions['userprofile_view'] == 2) || ($permissions['userprofile_create'] == 2) 
    || ($permissions['userprofile_edit'] == 2) || ($permissions['userprofile_delete'] == 2) )): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('users.index')); ?>" class="nav-link"> User Profile
                                </a>
                            </li>
                            <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['userdetail_view'] == 2) || ($permissions['userdetail_create'] == 2) 
                                || ($permissions['userdetail_edit'] == 2) || ($permissions['userdetail_delete'] == 2)  )): ?>
                             <li class="nav-item">
                                <a href="<?php echo e(route('user-details-view')); ?>" class="nav-link"> User Details
                                </a>
                            </li>
                            <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['document_view'] == 2) || ($permissions['document_create'] == 2)
                                || ($permissions['document_edit'] == 2) || ($permissions['document_delete'] == 2))): ?>
                             <li class="nav-item">
                                <a href="<?php echo e(route('documents.index')); ?>" class="nav-link"> Document Details
                                </a>
                            </li>
                           <?php endif; ?>
                               <?php if((isset($permissions)) && (($permissions['leave_view'] == 2) || ($permissions['leave_create'] == 2) 
                               || ($permissions['leave_edit'] == 2) || ($permissions['leave_delete'] == 2))): ?>
                             <li class="nav-item">
                                <a href="<?php echo e(route('leaves.index')); ?>" class="nav-link"> Leave Details
                                </a>
                            </li>
                            <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['nomination_view'] == 2) || ($permissions['nomination_create'] == 2) 
                                || ($permissions['nomination_edit'] == 2) || ($permissions['nomination_delete'] == 2))): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('nomination-index')); ?>" class="nav-link"> Nomination Details
                                </a>
                            </li>
                            <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['salary_view'] == 2) || ($permissions['salary_create'] == 2)
                                || ($permissions['salary_edit'] == 2) || ($permissions['salary_delete'] == 2) )): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('salary.index')); ?>" class="nav-link"> Salary Details
                                </a>
                            </li>
                            <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['checklist_view'] == 2) || ($permissions['checklist_create'] == 2) 
                                || ($permissions['checklist_edit'] == 2) || ($permissions['checklist_delete'] == 2))): ?>
                                                        <li class="nav-item">
                                <a href="<?php echo e(route('checklist-new.index')); ?>" class="nav-link"> Checklist
                                </a>
                            </li>
                            <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['trans_join_view'] == 2) || ($permissions['trans_join_create'] == 2) 
                                || ($permissions['trans_join_edit'] == 2) || ($permissions['trans_join_delete'] == 2))): ?>
                                                        <li class="nav-item">
                                <a href="<?php echo e(route('transfer.index')); ?>" class="nav-link">Transfer & Joining Order
                                </a>
                            </li>
                            <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['other_receipt_view'] == 2) || ($permissions['other_receipt_create'] == 2)
                                || ($permissions['other_receipt_edit'] == 2) || ($permissions['other_receipt_delete'] == 2))): ?>
                        <li class="nav-item">
                                <a href="<?php echo e(route('receipts.index')); ?>" class="nav-link">Other's receipt
                                </a>
                            </li>
                            <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['affidavit_view'] == 2) || ($permissions['affidavit_create'] == 2) 
                                || ($permissions['affidavit_edit'] == 2) || ($permissions['affidavit_delete'] == 2) )): ?>
                                                         <li class="nav-item">
                                <a href="<?php echo e(route('getaffidavit')); ?>" class="nav-link">Affidavit
                                </a>
                            </li>
                            <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['achievement_view'] == 2) || ($permissions['achievement_create'] == 2) 
                                || ($permissions['achievement_edit'] == 2) || ($permissions['achievement_delete'] == 2))): ?>
                                                         <li class="nav-item">
                                <a href="<?php echo e(route('getahievement')); ?>" class="nav-link">Achievement
                                </a>
                            </li>
                         <?php endif; ?>
                                <?php if((isset($permissions)) && (($permissions['achievement_view'] == 2) || ($permissions['achievement_create'] == 2) 
                                || ($permissions['achievement_edit'] == 2) || ($permissions['achievement_delete'] == 2))): ?>
                                                         <li class="nav-item">
                                <a href="<?php echo e(route('audits.index')); ?>" class="nav-link">Audit
                                </a>
                            </li>
                         <?php endif; ?>
                           <?php if((isset($permissions)) && (($permissions['achievement_view'] == 2) || ($permissions['achievement_create'] == 2) 
                                || ($permissions['achievement_edit'] == 2) || ($permissions['achievement_delete'] == 2))): ?>
                                                         <li class="nav-item">
                                <a href="/pension" class="nav-link">Pension Details
                                </a>
                            </li>
                         <?php endif; ?>
                         

                        </ul>
                    </div>
                </li> 
                <?php endif; ?>
            

                <li class="menu-title"><i class="ri-more-fill"></i> <span>Migrate File
                    </span></li>
                    
                        <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="mdi mdi-view-grid-plus-outline"></i> <span><?php echo app('translator')->get('translation.apps'); ?>
                        </span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                           
                            <!--<li class="nav-item">-->
                            <!--    <a href="apps-chat" class="nav-link">Inbox-->
                            <!--    </a>-->
                            <!--</li>-->
                           
                            <li class="nav-item">
                                <a href="#sidebarEcommerce" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarEcommerce">Created

                                </a>
                                <div class="collapse menu-dropdown" id="sidebarEcommerce">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('draft.index')); ?>" class="nav-link">Drafts
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('complete.index')); ?>" class="nav-link">Completed
                                            </a>
                                        </li>
                                      
                                      
                                    </ul>
                                </div>
                            </li>
                            
                            <li class="nav-item">
                                <a href="<?php echo e(route('parked.index')); ?>" class="nav-link" >Parked

                                </a>
                                
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('closed.index')); ?>" class="nav-link">Closed
                                </a>
                            </li>
                            <!--<li class="nav-item">-->
                            <!--    <a href="" class="nav-link">Sent-->
                            <!--    </a>-->
                            <!--</li>-->
                            <li class="nav-item">
                                <a href="#sidebarTasks" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTasks">Physical File

                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTasks">
                                    <ul class="nav nav-sm flex-column">
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="/non-sfs" class="nav-link">Create New(Non SFS)-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('sfs-physical.create')); ?>" class="nav-link">Create New
                                            </a>
                                        </li>
                                        <!--  <li class="nav-item">-->
                                        <!--    <a href="apps-tasks-kanban" class="nav-link">Create Shadow File(Non SFS)-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="apps-tasks-list-view" class="nav-link">Create Shadow File(SFS)-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarCRM" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCRM">Electronic File

                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCRM">
                                    <ul class="nav nav-sm flex-column">
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="/non-sfs-electronic" class="nav-link">Create New(Non SFS)-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <li class="nav-item">
                                            <a href="<?php echo e(url('view-electronic-file')); ?>" class="nav-link">Create New
                                            </a>
                                        </li>
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="apps-tasks-kanban" class="nav-link">Create Shadow File(Non SFS)-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="apps-tasks-list-view" class="nav-link">Create Shadow File(SFS)-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarCrypto" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCrypto">Create Part
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCrypto">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="/createpartt" class="nav-link"><?php echo app('translator')->get('translation.transactions'); ?>
                                            </a>
                                        </li>
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="apps-crypto-buy-sell" class="nav-link"><?php echo app('translator')->get('translation.buy-sell'); ?>-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="apps-crypto-orders" class="nav-link"><?php echo app('translator')->get('translation.orders'); ?>-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="apps-crypto-wallet" class="nav-link"><?php echo app('translator')->get('translation.my-wallet'); ?>-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="apps-crypto-ico" class="nav-link"><?php echo app('translator')->get('translation.ico-list'); ?>-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="apps-crypto-kyc" class="nav-link"><?php echo app('translator')->get('translation.kyc-application'); ?>-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarInvoices" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInvoices">Create Volume
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarInvoices">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="/createvolumeindex" class="nav-link"><?php echo app('translator')->get('translation.list-view'); ?>
                                            </a>
                                        </li>
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="apps-invoices-details" class="nav-link"><?php echo app('translator')->get('translation.details'); ?>-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="apps-invoices-create" class="nav-link"><?php echo app('translator')->get('translation.create-invoice'); ?>-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarTickets" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTickets"> Recycle Bin
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarTickets">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="apps-tickets-list" class="nav-link">View
                                            </a>
                                        </li>
                                      
                                    </ul>
                                </div>
                            </li>
                         
                            <!--<li class="nav-item">-->
                            <!--    <a href="apps-api-key" class="nav-link"><?php echo app('translator')->get('translation.api-key'); ?></a>-->
                            <!--</li>-->
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="mdi mdi-account-circle-outline"></i> <span>Migrate File
                        </span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                                 <li class="nav-item">
                                <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn">create file

                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSignIn">
                                    <ul class="nav nav-sm flex-column">
                                         <li class="nav-item">
                                            <a href="/migrate" class="nav-link">create file
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/migrate-draft" class="nav-link">Draft
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/auth-signin-basic" class="nav-link">Complete
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="/layouts-detached" class="nav-link" target="_blank">Folder Permission
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/layouts-two-column" class="nav-link" target="_blank">Dispatch
                                </a>
                            </li>
                           
           
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                                <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn"><i class="mdi mdi-file-sign"></i><span>DSC(Digital Signature Certificate)</span>

                                </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="mdi mdi-sticker-text-outline"></i> <span>Reports
                        </span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/file-register" class="nav-link">File Register
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarProfile" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile"><?php echo app('translator')->get('translation.profile'); ?>

                                </a>
                                <div class="collapse menu-dropdown" id="sidebarProfile">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="pages-profile" class="nav-link"><?php echo app('translator')->get('translation.simple-page'); ?>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="pages-profile-settings" class="nav-link"><?php echo app('translator')->get('translation.settings'); ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="/diary-register" class="nav-link">Diary Register
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/file-movement" class="nav-link">File Movements
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/receipts-movement" class="nav-link">Receipts Movement
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/received-file" class="nav-link">Received Files
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/received-receipts" class="nav-link">Received Receipts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/parked-file" class="nav-link">Parked Files
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/closed-file" class="nav-link">Closed Files
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/file-forwarded-by-time" class="nav-link">File forwarded by time duration
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/receipts-forwarded-by-time" class="nav-link">Receipts forwarded by time duration
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/file-attended-24hours" class="nav-link">File attended for more then 24 hours</a>
                            </li>
                            <li class="nav-item">
                                <a href="/revenue" class="nav-link">Revenue Reports</a>
                            </li>
                        </ul>
                    </div>
                </li>
               
                 <li class="nav-item">
                                <a href="#sidebarEmail" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarEmail">
                                    <?php echo app('translator')->get('translation.email'); ?>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarEmail">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="/apps-mailbox" class="nav-link"><?php echo app('translator')->get('translation.mailbox'); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#sidebaremailTemplates" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebaremailTemplates">
                                                <?php echo app('translator')->get('translation.email-templates'); ?>
                                            </a>
                                            <div class="collapse menu-dropdown" id="sidebaremailTemplates">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="/apps-email-basic" class="nav-link"> <?php echo app('translator')->get('translation.basic-action'); ?> </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="/apps-email-ecommerce" class="nav-link"> <?php echo app('translator')->get('translation.ecommerce-action'); ?> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>