
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
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
    <style>
        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th, .table td {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            padding: 10px;
            vertical-align: middle;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
                        width: 1%;

        }


    table.dataTable tbody tr {
        background-color: transparent !important;
    }

.table-responsive {
    overflow-x: auto; /* Enable horizontal scrolling */
}

.table {
    width: 100%; /* Ensure table takes full width */
}

.table th, .table td {
    white-space: nowrap; /* Prevent text from wrapping */
}

        @media (prefers-color-scheme: dark) {
            .table th {
                background-color: #1c1e21;
                color: #e1e1e1;
            }

            .table td {
                color: #d1d1d1;
            }
        }

        .table tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table tbody tr:last-child td {
            border-bottom: none; 
        }

        /* Make the table scrollable on smaller screens */
        @media screen and (max-width: 768px) {
            .table-responsive {
                display: block;
                overflow-x: auto;
            }
        }

        .dataTables_wrapper {
            overflow-x: auto;
        }
        
        
        .table-nowrap td .sorting, .table-nowrap td .sorting_asc, .table-nowrap td .sorting_desc {
    display: none; 
}


     table.dataTable>thead .sorting:after, table.dataTable>thead .sorting_asc:after, table.dataTable>thead .sorting_desc:after, table.dataTable>thead .sorting_asc_disabled:after, table.dataTable>thead .sorting_desc_disabled:after{
    
     content:"" !important;
    
    
}


table.dataTable>thead .sorting:before, table.dataTable>thead .sorting_asc:before, table.dataTable>thead .sorting_desc:before, table.dataTable>thead .sorting_asc_disabled:before, table.dataTable>thead .sorting_desc_disabled:before{
    
    
    content:"" !important;
}

    </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Staff Selection</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="listjs-table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <?php if((isset($permissions)) && (  ($permissions['staff_create'] == 2))): ?>
                                   <a href="<?php echo e(route('staff-add.create')); ?>"<button type="button" class="btn btn-success add-btn">
    Add
</button></a>
<?php endif; ?>
  <a href="<?php echo e(route('staff.history')); ?>"<button type="button" class="btn btn-primary ">
    History
</button></a>
                                </div>
                            </div>
                            <!--<div class="col-sm">-->
                            <!--    <div class="d-flex justify-content-sm-end">-->
                            <!--        <div class="search-box ms-2">-->
                            <!--            <input type="text" class="form-control search" placeholder="Search...">-->
                            <!--            <i class="ri-search-line search-icon"></i>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>

                        <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="designationsTable">
    <thead class="table-light">
        <tr>
                        <th class="sort" data-sort="ID">ID</th>

            <th class="sort" data-sort="full_name">Full Name</th>
            <th class="sort" data-sort="middle_name">Middle Name</th>
            <th class="sort" data-sort="last_name">Last Name</th>
            <th class="sort" data-sort="organisation_name">Organization</th>
            <th class="sort" data-sort="state">State</th>
            <th class="sort" data-sort="district">District</th>
            <th class="sort" data-sort="designation_name">Designation</th>
            <th class="sort" data-sort="role_name">Role</th>
            <th class="sort" data-sort="taluka">Taluka</th>
            <th class="sort" data-sort="phone_number">Phone Number</th>
            <th class="sort" data-sort="email">Email</th>
            <th class="sort" data-sort="password">Password</th>
            <th class="sort" data-sort="address">Address</th>
            <?php if((isset($permissions)) && (
    ($permissions['staff_edit'] == 2) || 
    ($permissions['staff_delete'] == 2)
)): ?>
            <th class="sort" data-sort="action">Action</th>
            <?php endif; ?>
        </tr>
    </thead>
                                           <!--<?php $sno = 1; ?> -->

    <tbody class="list form-check-all">
        <?php if((isset($permissions)) && (
    ($permissions['staff_view'] == 2) || 
     
    ($permissions['staff_edit'] == 2) || 
    ($permissions['staff_delete'] == 2)
)): ?>
        <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>                <td class="first_name"><?php echo e($staff->id); ?></td>

                <td class="first_name"><?php echo e($staff->first_name); ?></td>
                <td class="middle_name"><?php echo e($staff->middle_name); ?></td>
                <td class="last_name"><?php echo e($staff->last_name); ?></td>
                <td class="organisation_name"><?php echo e($staff->org_name); ?></td>
                <td class="state"><?php echo e($staff->state_name); ?></td>
                <td class="district"><?php echo e($staff->district_name); ?></td>
                <td class="designation_name"><?php echo e($staff->designation_name); ?></td>
                <td class="role_name"><?php echo e($staff->role_name); ?></td>
                <td class="taluka"><?php echo e($staff->taluka); ?></td>
                <td class="phone_number"><?php echo e($staff->number); ?></td>
                <td class="email"><?php echo e($staff->email); ?></td>
                  <td class="password"><?php echo e($staff->password_word); ?></td>
                <td class="address"><?php echo e($staff->address); ?></td>
                <?php if((isset($permissions)) && (
    ($permissions['staff_edit'] == 2) || 
    ($permissions['staff_delete'] == 2)
)): ?>
                <td>
                    <div class="d-flex gap-2">
                         <?php if((isset($permissions)) && (($permissions['staff_edit'] == 2) )): ?>
                        <div class="edit">
                           <a href="<?php echo e(route('staff-add.edit',$staff->id )); ?>"> <button type="button" class="btn btn-sm btn-primary edit-item-btn" >
                                Edit
                            </button></a>
                        </div>
                        <?php endif; ?>
                         <div class="show">
                           <a href="<?php echo e(route('staff-add.show',$staff->id )); ?>"> <button type="button" class="btn btn-sm btn-success" >
                                view
                            </button></a>
                        </div>
                       
                        <?php if((isset($permissions)) && (($permissions['staff_delete'] == 2) )): ?>
                        <div class="remove">
                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="<?php echo e($staff->id); ?>">
    Remove
</button>
<?php endif; ?>
                        </div>
                    </div>
                </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </tbody>
</table>

<!-- Pagination Links -->
<?php echo e($staffs->links()); ?>




<!-- Modal -->
<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-labelledby="deleteRecordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <div class="modal-body text-center">
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                    <h4>Are you sure?</h4>
                    <p class="text-muted mx-4 mb-0">Are you sure you want to remove this record?</p>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-sm btn-light" id="confirmDeleteButton">Yes, delete it</button>
            </div>
        </div>
    </div>
</div>

                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                    </lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                        orders for you search.</p>
                                </div>
                            </div>
                        </div>

                        <!--<div class="d-flex justify-content-end">-->
                        <!--    <div class="pagination-wrap hstack gap-2">-->
                        <!--        <a class="page-item pagination-prev disabled" href="javascript:void(0);">-->
                        <!--            Previous-->
                        <!--        </a>-->
                        <!--        <ul class="pagination listjs-pagination mb-0"></ul>-->
                        <!--        <a class="page-item pagination-next" href="javascript:void(0);">-->
                        <!--            Next-->
                        <!--        </a>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <!-- end row -->


   
    <!-- Modal -->
    
<!--end modal -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>
  <!--<script src="<?php echo e(URL::asset('build/js/pages/listjs.init.js')); ?>"></script>-->
  <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('build/js/pages/sweet-alert.init.js')); ?>"></script>
 
       <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

   <script>
    $(document).ready(function() {
        var table = $('#customerTable').DataTable({
            scrollY: '400px', 
            scrollX: true, 
            scrollCollapse: true,
            paging: false,
            searching: true,
            order: [[0, 'asc']],
            lengthMenu: [10, 25, 50, 100],
            buttons: ['copy', 'excel', 'pdf', 'print'],
            responsive: true,
            dom: 'Bfrtip',
                                                                                    "order": [[0, 'desc']], 

        });

        // Position the buttons correctly
        table.buttons().container()
            .appendTo('#customerTable_wrapper .col-md-6:eq(0)');

            });
</script>


      <script>
$(document).ready(function() {
    var selectedRoleId; // Store the ID of the selected role for deletion

    // Open modal and store the role ID
    $('.remove-item-btn').on('click', function() {
        selectedRoleId = $(this).data('id');
    });

    // Confirm deletion inside modal
    $('#confirmDeleteButton').on('click', function() {
        $.ajax({
            url: '/staff-delete/' + selectedRoleId,
            type: 'DELETE',
           data: {
        _token: $('meta[name="csrf-token"]').attr('content')
    },
            success: function(response) {
                $('#userRow' + selectedRoleId).remove(); // Remove the row from the table
                $('#deleteRecordModal').modal('hide'); // Hide the modal
                alert('Staff deleted successfully.');
                window.location.reload();
            },
            error: function(response) {
                alert('An error occurred while trying to delete the role.');
            }
        });
    });

    // Handle multiple delete functionality (unchanged)
    $('#deleteMultipleButton').click(function() {
        var selectedIds = [];
        $('input[name="staff_ids[]"]:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
            alert('Please select at least one role to delete.');
            return;
        }

        if (confirm('Are you sure you want to delete the selected roles?')) {
            $.ajax({
                url: '/staff-delete-all',
                type: 'DELETE',
                data: {
                    ids: selectedIds,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    selectedIds.forEach(function(id) {
                        $('#userRow' + id).remove(); // Remove each deleted row from the table
                    });
                    alert('Selected roles deleted successfully.');
                     window.location.reload();
                },
                error: function(response) {
                    alert('An error occurred while trying to delete the selected roles.');
                }
            });
        }
    });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/organization-login/staff-selection/index.blade.php ENDPATH**/ ?>