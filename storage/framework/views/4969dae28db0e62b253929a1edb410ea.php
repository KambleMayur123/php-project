
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
     <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
   
   <style>
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
                        width: 20%;

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
 
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">User Profile</h4>
                </div>

                <div class="card-body">
                    <div class="listjs-table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <?php if((isset($permissions)) && (
    ($permissions['userprofile_create'] == 2) 
)): ?>
                                <button type="button" class="btn btn-success add-btn" onclick="window.location.href='<?php echo e(route('users.create')); ?>'">Add</button>
                                <?php endif; ?>
                                  <button type="button" class="btn btn-primary " onclick="window.location.href='<?php echo e(route('usersdetail-history')); ?>'">History</button>
                              
                            </div>
                        </div>

                        <div class="table-responsive table-card mt-3 mb-1">
                         <table class="table table-bordered" id="designationsTable">
                                <thead class="table-light">
                                    <tr>
                                        <!--<th scope="col" style="width: 50px;">-->
                                            <!--<div class="form-check">-->
                                            <!--    <input class="form-check-input" type="checkbox" id="checkAll" value="option">-->
                                            <!--</div>-->
                                        <!--</th>-->
                                        <th>ID</th>

                                        <th class="sort" data-sort="customer_name">Full Name</th>
                                        <th class="sort" data-sort="state">State</th>
                                        <th class="sort" data-sort="dist">Dist</th>
                                        <th class="sort" data-sort="taluka">Taluka</th>
                                        <th class="sort" data-sort="contact">Contact</th>
                                        <th class="sort" data-sort="address">Address</th>
                                          
                                             <th class="" data-sort="reject_description">Reject description</th>
                                        <th class="sort" data-sort="total_leaves">Total Yearly Leaves</th>
                                        <?php if((isset($permissions)) && (
    ($permissions['userprofile_view'] == 2) || 
    
    ($permissions['userprofile_edit'] == 2) || 
    ($permissions['userprofile_delete'] == 2)
)): ?>
                                        <th class="sort" data-sort="action">Action</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody class="form-check-all">
                                     <?php if((isset($permissions)) && (
    ($permissions['userprofile_view'] == 2) || 
    
    ($permissions['userprofile_edit'] == 2) || 
    ($permissions['userprofile_delete'] == 2)
)): ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="userRow<?php echo e($user->id); ?>">
                                            <!--<th scope="row">-->
                                            <!--    <div class="form-check">-->
                                            <!--        <input class="form-check-input" type="checkbox" name="" value="option<?php echo e($loop->index + 1); ?>">-->
                                            <!--    </div>-->
                                            <!--</th>-->
                                            <td class="id"><?php echo e($user->id); ?></td>

                                            <td class="first_name"><?php echo e($user->first_name); ?></td>
                                            <td class="state"><?php echo e($user->state); ?></td>
                                            <td class="dist"><?php echo e($user->district); ?></td>
                                            <td class="taluka"><?php echo e($user->taluka); ?></td>
                                            <td class="contact"><?php echo e($user->number); ?></td>
                                            <td class="address"><?php echo e($user->address); ?></td>
                                                                                                                            
                <td class="reject_description"><?php echo e($user->reject_description ?? 'No data available'); ?></td>

                                            <td class="total_leaves"><?php echo e($user->leaves); ?></td>
                                             <?php if((isset($permissions)) && (
    ($permissions['userprofile_view'] == 2) || 
    
    ($permissions['userprofile_edit'] == 2) || 
    ($permissions['userprofile_delete'] == 2)
)): ?>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="edit">
                                                         <?php if((isset($permissions)) && (($permissions['userprofile_edit'] == 2))): ?>
                                                        <button type="button" class="btn btn-sm btn-primary edit-item-btn" onclick="window.location.href='<?php echo e(route('users.edit', $user->id)); ?>'">Edit</button>
                                                          <?php endif; ?>
                                                    </div>
                                                    <div class="remove">
                                                         <?php if((isset($permissions)) && (($permissions['userprofile_delete'] == 2))): ?>
                                                        <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="<?php echo e($user->id); ?>">Remove</button>
                                                    <?php endif; ?>
                                                    </div>
                                                    <div class="edit">
                                                         <?php if((isset($permissions)) && (($permissions['userprofile_view'] == 2))): ?>
                                                        <button type="button" class="btn btn-sm btn-success edit-item-btn" onclick="window.location.href='<?php echo e(route('users.show', $user->id)); ?>'">View</button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-sm btn-light">Yes, delete it</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('build/js/pages/listjs.init.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('build/js/pages/sweet-alert.init.js')); ?>"></script>
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            paging: true,
            // searching: true,
            order: [[0, 'asc']],
            lengthMenu: [10, 25, 50, 100],
            // buttons: ['copy', 'excel', 'pdf', 'print'],
            responsive: true,
            dom: 'Bfrtip',
                        "order": [[0, 'desc']], 

        });
</script>

  <script>
          $(document).ready(function() {
        $('.remove-item-btn').click(function() {
            var id = $(this).data('id');
            var action = '/users/' + id; 
            $('#deleteForm').attr('action', action);
        });

        // Handle the form submission
        $('#deleteForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    $('#deleteRecordModal').modal('hide');
                    // Remove the deleted user row from the table
                    $('#userRow' + response.id).remove();
                    alert('User deleted successfully.');
                },
                error: function(response) {
                    alert('An error occurred while trying to delete the user.');
                }
            });
        });
    });


      
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/user-profile/index.blade.php ENDPATH**/ ?>