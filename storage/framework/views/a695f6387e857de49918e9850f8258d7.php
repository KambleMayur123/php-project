
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    
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
                    <h4 class="card-title mb-0">Role</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="listjs-table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                     <?php if((isset($permissions)) && (
    ($permissions['role_create'] == 2) 
    
)): ?>
                                   <a href="<?php echo e(route('roles.create')); ?>"<button type="button" class="btn btn-success add-btn">
    Add
</button></a>
<?php endif; ?>
  <a href="<?php echo e(route('roles-history')); ?>"<button type="button" class="btn btn-primary">
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
                        <table class="table align-middle table-nowrap" id="customerTable">
    <thead class="table-light">
        <tr>
                        <th class="sort" data-sort="ID">ID</th>

            <th class="sort" data-sort="customer_name">Role Name</th>
            <th class="sort" data-sort="state">State</th>
            <th class="sort" data-sort="dist">District</th>
            <th class="sort" data-sort="taluka">Taluka</th>
            <th class="sort" data-sort="contact">Designation</th>
            <th class="sort" data-sort="department_name">Department</th>
                  <?php if((isset($permissions)) && (
    
    ($permissions['role_edit'] == 2) || 
    ($permissions['role_delete'] == 2)
)): ?>
            <th class="sort" data-sort="action">Action</th>
            <?php endif; ?>
        </tr>
    </thead>
                                                   <!--<?php $sno = 1; ?> -->

    <tbody class="list form-check-all">
            <?php if((isset($permissions)) && (
    ($permissions['role_view'] == 2) || 
    
    ($permissions['role_edit'] == 2) || 
    ($permissions['role_delete'] == 2)
)): ?>
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr id="userRow<?php echo e($role->id); ?>">
            
                                        <td class="id"><?php echo e($role->id); ?></td>

            <td class="role_name"><?php echo e(isset($role->role_name) ? $role->role_name : ''); ?></td>
            <td class="state"><?php echo e(isset($role->state_name) ? $role->state_name : ''); ?></td>
            <td class="dist"><?php echo e(isset($role->district_name) ? $role->district_name : ''); ?></td>
            <td class="taluka"><?php echo e(isset($role->taluka) ? $role->taluka : ''); ?></td>
            <td class="contact"><?php echo e(isset($role->designation_name) ? $role->designation_name : ''); ?></td>
            <td class="department_name"><?php echo e(isset($role->department_name) ? $role->department_name : ''); ?></td>
             <?php if((isset($permissions)) && (
    
    ($permissions['role_edit'] == 2) || 
    ($permissions['role_delete'] == 2)
)): ?>
            <td>
                <div class="d-flex gap-2">
                    <div class="edit">
                          <?php if((isset($permissions)) && (
    
    ($permissions['role_edit'] == 2) 
)): ?>
                        <button type="button" class="btn btn-sm btn-primary edit-item-btn" onclick="window.location.href='<?php echo e(route('roles.edit', $role->id)); ?>'">
                            Edit
                        </button>
                        <?php endif; ?>
                    </div>
                    <div class="show">
                        <?php if((isset($permissions)) && (
    
    ($permissions['role_view'] == 2) 
)): ?>
                        <button type="button" class="btn btn-sm btn-success " onclick="window.location.href='<?php echo e(route('roles.show', $role->id)); ?>'">
                            View
                        </button>
                        <?php endif; ?>
                       
                    </div>
                    
                    <div class="remove">
                          <?php if((isset($permissions)) && (
    
    ($permissions['role_delete'] == 2) 
)): ?>
                        <button class="btn btn-sm btn-danger remove-item-btn" data-id="<?php echo e($role->id); ?>">
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

 <div class="d-flex justify-content-center">
                        <?php echo $roles->links(); ?>

                    </div>
<!-- Modal placed outside the loop -->
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
                   
                    <button type="submit" class="btn btn-sm btn-light">Yes, delete it</button>
                </form>
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

    <!-- listjs init -->
    <!--<script src="<?php echo e(URL::asset('build/js/pages/listjs.init.js')); ?>"></script>-->

    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
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
    // Single delete when "Remove" button is clicked
    $('.remove-item-btn').click(function() {
        var id = $(this).data('id');
        if (confirm('Are you sure you want to delete this role?')) {
            $.ajax({
                url: '/roles-data/' + id,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#userRow' + id).remove(); // Remove the deleted row from the table
                    alert('Role deleted successfully.');
                },
                error: function(response) {
                    alert('An error occurred while trying to delete the role.');
                }
            });
        }
    });

    // Select or Deselect all checkboxes
    $('#checkAll').change(function() {
        $('input[name="selected_roles"]').prop('checked', $(this).prop('checked'));
    });

    // Multiple delete when the "Delete" button is clicked
    $('#deleteMultipleButton').click(function() {
        var selectedIds = [];
        $('input[name="selected_roles"]:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
            alert('Please select at least one role to delete.');
            return;
        }

        if (confirm('Are you sure you want to delete the selected roles?')) {
            $.ajax({
                url: '/roles-data',
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


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/organization-login/add-role/index.blade.php ENDPATH**/ ?>