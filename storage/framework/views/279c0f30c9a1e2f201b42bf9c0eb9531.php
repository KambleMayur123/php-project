
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
                    <h4 class="card-title mb-0">User Leaves</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <?php if((isset($permissions)) && ( 
    ($permissions['leave_create'] == 2) 
)): ?>
                                    <a href="<?php echo e(route('leaves.create')); ?>">
                                        <button type="button" class="btn btn-success add-btn"><i
                                                class="ri-add-line align-bottom me-1"></i> Add</button>
                                    </a>
                                    <?php endif; ?>
                                     <a href="<?php echo e(route('user-leaves-pending')); ?>"><button type="button" class="btn btn-warning ">Request </button></a>
                                     <a href="<?php echo e(route('leaves-history')); ?>"><button type="button" class="btn btn-primary ">History </button></a>
                                </div>
                            </div>
                                                    </div>

                        <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table table-bordered" id="">
                                <thead class="table-light">
                                    <tr   >
                                        <!--<th scope="col" style="width: 50px;">-->
                                        <!--    <div class="form-check">-->
                                        <!--        <input class="form-check-input" type="checkbox" id="checkAll" value="option">-->
                                        <!--    </div>-->
                                        <!--</th>-->
                                       <th class="sort" data-sort="ID">ID</th>
                                        <th class="sort" data-sort="customer_name">User Name</th>
                                        <th class="sort" data-sort="state">State</th>
                                        <th class="sort" data-sort="dist">District</th>
                                        <th class="sort" data-sort="taluka">Taluka</th>
                                        <th class="sort" data-sort="leave_starting_date">Leave Starting Date</th>
                                        <th class="sort" data-sort="leave_ending_date">Leave Ending Date</th>
                                                                                <th class="sort" data-sort="leave_applied_ending_date">Leave days</th>
                                        <th class="sort" data-sort="leave_applied_ending_date">Do you want to reduce days from available leave?
                                        </th>
                                  <th class="sort" data-sort="leave_applied_ending_date">Leave category</th>

                                            <th class="sort" data-sort="leave_applied_starting_date">Leave Applied Starting Date</th>
                                        <th class="sort" data-sort="leave_applied_ending_date">Leave Applied Ending Date</th>
                                        
                                        <th class="sort" data-sort="leave_approved_by">Leave Approved By</th>
                                        <th class="sort" data-sort="leave_rejecter">Leave Rejecter</th>
                                        <th class="sort" data-sort="leave_reject_desc">Leave Rejecter's Description</th>
                                        <th class="sort" data-sort="leave_status">Leave Status</th>
                                        <?php if((isset($permissions)) && (
    ($permissions['leave_view'] == 2) || 
     
    ($permissions['leave_edit'] == 2) || 
    ($permissions['leave_delete'] == 2)
)): ?>
                                        <th class="sort" data-sort="action">Action</th>
                                        
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                                                <!--<?php $sno = 1; ?> -->

                                <tbody class="form-check-all">
                                    
                                    
                                     <?php if((isset($permissions)) && (
    ($permissions['leave_view'] == 2) || 
($permissions['leave_edit'] == 2) || 
    ($permissions['leave_delete'] == 2)
)): ?>


                                    <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($leave->status != 'pending'): ?>
                                    
                              <tr id="userRow<?php echo e($leave->id); ?>">
                                            <!--<th scope="row">-->
                                            <!--    <div class="form-check">-->
                                            <!--        <input class="form-check-input" type="checkbox" name="chk_child" value="<?php echo e($leave->id); ?>">-->
                                            <!--    </div>-->
                                            <!--</th>-->
                                            
                                          <td><?php echo e($leave->id); ?></td>

                                            <td class="customer_name"><?php echo e($leave->name); ?></td>
                                            <td class="state"><?php echo e($leave->state); ?></td>
                                            <td class="dist"><?php echo e($leave->district); ?></td>
                                            <td class="taluka"><?php echo e($leave->taluka); ?></td>
                                            <td class="leave_starting_date"><?php echo e($leave->start_date); ?></td>
                                            <td class="leave_ending_date"><?php echo e($leave->end_date); ?></td>
                                                                                        <td class="leave_days"><?php echo e($leave->leave_days); ?></td>
                                            <td class="available_leave"><?php echo e($leave->reduce_available_leave); ?></td>
                                                                                         <td class="leave_category"><?php echo e($leave->leave_category); ?></td>

                                            <td class="leave_applied_starting_date"><?php echo e($leave->apply_start_date); ?></td>
                                            <td class="leave_applied_ending_date"><?php echo e($leave->apply_end_date); ?></td>
                                                    <td class="leave_approved_by"> <?php if($leave->status == 'approved'): ?>
                                            <?php
                                            $staff_name=DB::table('users')->where('id',$leave->hod_verify_staff	)->first();
                                            ?>
                                             <?php if(isset($staff_name->first_name)): ?>
    <?php echo e($staff_name->first_name); ?>

<?php else: ?>
   Staff
<?php endif; ?> <?php endif; ?> </td>
                                            <td class="leave_rejecter"><?php if($leave->status == 'rejected'): ?>
                                            <?php
                                            if($leave->hod_verify_staff != null){
                                            $staff_name=DB::table('users')->where('id',$leave->hod_verify_staff	)->first(); }else{
                                                 $staff_name=DB::table('users')->where('id',$leave->clerk_verify_staff	)->first();
                                            }
                                            ?>
                                             <?php if(isset($staff_name->first_name)): ?>
    <?php echo e($staff_name->first_name); ?>

<?php else: ?>
   Staff
<?php endif; ?> <?php endif; ?> </td>

                                             <td>
                                 <!-- Eye Button -->
                <button class="btn btn-info btn-sm view-description" 
                        data-description="<?php echo e($leave->reject_description); ?>" 
                        data-bs-toggle="modal" 
                        data-bs-target="#descriptionModal">
                    <i class="fas fa-eye"></i>
                </button>
                </td>
                                                    <td   class="leave-status">
                                           
                                          
                                            <?php if($leave->status == 'pending'): ?>
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                                 <?php elseif($leave->status == 'approved_clerk'): ?>
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending from HOD</span>
                                                <?php elseif($leave->status == 'approved'): ?>
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                                <?php elseif($leave->status == 'rejected'): ?>
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                                   <?php elseif($leave->status == 'forward'): ?>
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">forward</span>

                                                <?php endif; ?>
                                      </td>
                                               <?php if((isset($permissions)) && (
    ($permissions['leave_view'] == 2) || 
    ($permissions['leave_edit'] == 2) || 
    ($permissions['leave_delete'] == 2)
)): ?>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    
                                                   <div class="dropdown">
  <form action="<?php echo e(route('leaves.updateStatus', $leave->id)); ?>" method="POST" id="statusForm" style="display: inline;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>
    <!--<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">-->
    <!--    <?php echo e(ucfirst($leave->status)); ?>-->
    <!--</button>-->
    <!--<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
    <!--    <li><a class="dropdown-item" href="#" id="sa-warning" onclick="event.preventDefault(); showpendingWarning();">Pending</a></li>-->
    <!--    <li><a class="dropdown-item" href="#" id="sa-warning" onclick="event.preventDefault(); showApprovedWarning();">Approved</a></li>-->
    <!--    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); showRejectModal();">Rejected</a></li>-->
    <!--</ul>-->
    <!--<select name="status" style="display: none;" id="status-select">-->
    <!--    <option value="pending" <?php echo e($leave->status == 'pending' ? 'selected' : ''); ?>>pending</option>-->
    <!--    <option value="approved" <?php echo e($leave->status == 'approved' ? 'selected' : ''); ?>>approved</option>-->
    <!--    <option value="rejected" <?php echo e($leave->status == 'rejected' ? 'selected' : ''); ?>>rejected</option>-->
    <!--</select>-->
    <!--<input type="hidden" name="reject_description" id="reject-description-field" value="">-->

</div>
           </form>
<!--<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="rejectModalLabel">Reject Leave</h5>-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <label for="reject-description-field" class="form-label">Leave Rejecter's Description</label>-->
<!--                <textarea id="reject-description-textarea" class="form-control" placeholder="Enter Reason for Rejection"></textarea>-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
<!--                <button type="button" class="btn btn-primary" onclick="submitRejectForm()">Save changes</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

                  <!--<div class="remove">-->
                  <!--  <button type="button" class="btn btn-sm btn-success " onclick="window.location.href='<?php echo e(route('leavegreennote' ,  $leave->id)); ?>'">-->
                  <!--                                Add green note-->
                  <!--                                  </div>-->
                                                   


<div class="edit">
     <?php if($leave->status != 'approved' && $leave->status != 'rejected'): ?>
 <?php if((isset($permissions)) && ( ($permissions['leave_edit'] == 2) )): ?>
                    <button type="button" class="btn btn-sm btn-primary edit-item-btn" onclick="window.location.href='<?php echo e(route('leaves.edit' ,  $leave->id)); ?>'">
                          Edit
                      </button>
                      <?php endif; ?>
                        <?php endif; ?>               

                    </div>
                    <?php if((isset($permissions)) && ( ($permissions['leave_delete'] == 2) )): ?>
                                                    <div class="remove">
                                                  <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="<?php echo e($leave->id); ?>">
                                                  Remove
                                                    </div>
                                                    <?php endif; ?>
                                                    
                                                    
                                                    
                                                    
                                                                                <div class="edit">
  <?php if((isset($permissions)) && ( ($permissions['leave_view'] == 2) )): ?>
                    <button type="button" class="btn btn-sm btn-success edit-item-btn" onclick="window.location.href='<?php echo e(route('leaves.show' ,  $leave->id)); ?>'">
                         View
                      </button>
<?php endif; ?>

                    </div>

                                                </div>
                                            </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>

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

    <!-- Modal for Add Leave -->
    <!-- Modal for Edit Leave -->
<!-- Modal for Edit Leave -->


    <!-- Modal for Delete Confirmation -->
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

    <!-- listjs init -->
    <script src="<?php echo e(URL::asset('build/js/pages/listjs.init.js')); ?>"></script>

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
            paging: true,
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


<!-- Description Modal -->
<div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="descriptionModalLabel">Leave Reject Description</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalDescription">
                <!-- Description will be populated here -->
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const viewButtons = document.querySelectorAll('.view-description');
    const modalDescription = document.getElementById('modalDescription');

    viewButtons.forEach(button => {
        button.addEventListener('click', function () {
            const description = this.getAttribute('data-description');
            modalDescription.textContent = description;
        });
    });
});

</script>


    <script>
    let statusToChange = '';

    function showRejectModal() {
        document.getElementById('status-select').value = 'rejected';
        var rejectModal = new bootstrap.Modal(document.getElementById('rejectModal'));
        rejectModal.show();
    }
    
    
        function showApprovedWarning() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to approve this leave.",
            icon: 'warning',
            showCancelButton: true,
    confirmButtonColor: 'rgb(85 87 90 / 68%)', 
    cancelButtonColor: 'rgb(220 88 44)',  
            confirmButtonText: 'Yes, approve it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('status-select').value = 'approved';
                document.getElementById('statusForm').submit();
            }
        });
    }
    
    
    
     function showpendingWarning() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to pending this leave.",
            icon: 'warning',
            showCancelButton: true,
    confirmButtonColor: 'rgb(85 87 90 / 68%)',  
    cancelButtonColor: 'rgb(220 88 44)',   
            confirmButtonText: 'Yes, pending it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('status-select').value = 'pending';
                document.getElementById('statusForm').submit();
            }
        });
    }



    function submitRejectForm() {
                document.getElementById('status-select').value = 'rejected';

        var rejectDescription = document.getElementById('reject-description-textarea').value;

        document.getElementById('reject-description-field').value = rejectDescription;

        document.getElementById('statusForm').submit();
    }

    function submitStatusForm() {
        document.getElementById('status-select').value = statusToChange;
        document.getElementById('statusForm').submit();
    }
</script>

      <script>
$(document).ready(function() {
    $('.remove-item-btn').click(function() {
        var id = $(this).data('id');
        var action = '/leaves/' + id; 
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
                if (response.success) {
                    $('#deleteRecordModal').modal('hide');
                    // Remove the deleted user row from the table
                    $('#userRow' + response.id).remove();
                } else {
                    Swal.fire('Failed!', 'An error occurred while trying to delete the record.', 'error');
                }
            },
            error: function(response) {
                Swal.fire('Error!', 'An error occurred while trying to delete the record.', 'error');
            }
        });
    });
});





</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/user-leaves/index.blade.php ENDPATH**/ ?>