
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC0mXh4jCq5SW6RO5jt5Zf1zrXt0yVf9yI" crossorigin="anonymous">
    
    <style>
    
        .checkmark-container {
            position: relative;
    /*background-color: #fff;*/
    padding: 20px;
    border-radius: 8px;
    max-width: 228px;
    margin: 0 auto;
    /*box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
    text-align: center;
        }

        .signed-info {
            font-size: 8px;
    color: black;
    font-weight: bold;
        }

       .checkmark {
            position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 50px;
    /*opacity: 0.5;*/
        }
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
                <h4 class="card-title mb-0">Audit</h4>
            </div>
                               

            <div class="card-body">
                 <div class="row g-4 mb-3">

            <div class="col-sm-auto">
                                <div>
                                   <button type="button" class="btn btn-success add-btn" onclick="window.location.href='<?php echo e(route('audits.create')); ?>'">
    Add
</button>
                         <button type="button" class="btn btn-warning add-btn" onclick="window.location.href='<?php echo e(route('pending-request')); ?>'">
    Request
</button>
</div>
</div>
</div>
                <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="customerTable">

                        <thead class="table-light">
                            <tr>
                                                                        <th>ID</th>
                                                                                <th>Username</th>


                                        <th>State</th>
        <th>District</th>
        <th>Taluka</th>
        <th>Organization</th>
        <th>Department Name</th>
        <th>Designation Name</th>

                                <th>Audit Name</th>
                                <th>Description</th>
                                <th>Report View</th>
                                <th>Audit Remark</th>
                                <th>Auditor Name</th>
                                <th>Position</th>
                                <th>Organization</th>
                                <th>Auditor Verification Description</th>
                                <th>Status</th>
                                <th>Clerk Signature</th>
                                <th>Auditor Signature</th>
                                
                                <th>Forward To</th>
                                <th>Reason Description</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $audits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $audit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr id="userRow<?php echo e($audit->id); ?>">
                                                                <td><?php echo e($audit->id); ?></td>
                                 <td><?php echo e($audit->first_name); ?> <?php echo e($audit->last_name); ?></td>

                                <td><?php echo e($audit->state); ?></td>
                                <td><?php echo e($audit->district); ?></td>
                                <td><?php echo e($audit->taluka); ?></td>
                                <td><?php echo e($audit->org_name); ?></td>
                                <td><?php echo e($audit->department_name); ?></td>
                                <td><?php echo e($audit->designation_name); ?></td>

                                <td><?php echo e($audit->audit_name); ?></td>
                                  <td>
                                 <!-- Eye Button -->
                <button class="btn btn-info btn-sm view-description" 
                        data-description="<?php echo e($audit->description); ?>" 
                        data-bs-toggle="modal" 
                        data-bs-target="#descriptionModal">
                    <i class="fas fa-eye"></i>
                </button>
                </td>
                                <td><?php echo e($audit->report_view); ?></td>
                                <td><?php echo e($audit->audit_remark); ?></td>
                                <td><?php echo e($audit->auditor_name); ?></td>
                                <td><?php echo e($audit->position); ?></td>
                                <td><?php echo e($audit->organisation_name); ?></td>
                                <td><?php echo e($audit->auditor_veri_des); ?></td>
                                
          <td class="status">
                                           
                                          
                                            <?php if($audit->status == 'pending'): ?>
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                                 <?php elseif($audit->status == 'approved_clerk'): ?>
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending from HOD</span>
                                                <?php elseif($audit->status == 'approved'): ?>
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                                <?php elseif($audit->status == 'rejected'): ?>
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                                   <?php elseif($audit->status == 'forward'): ?>
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">forward</span>

                                                <?php endif; ?>
                                      </td>
                                       <td><?php if($audit->clerk_otp_status == 1): ?>  <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                    <img src="<?php echo e(asset('checkmark1.png')); ?>" alt="Checkmark" class="checkmark"> <!-- Replace 'checkmark.png' with your actual image file -->
                                </div><?php else: ?> <?php if($audit->status == 'rejected'): ?>  <div class="checkmark-container">
                                    <!-- Signed info text -->
                                    <div class="signed-info">
                                        CLERK REJECTED <br>
                                   
                                    </div>
                                
                                    
                                    <img src="<?php echo e(asset('crossred2.png')); ?>" alt="Checkmark" class="checkmark"> <!-- Replace 'checkmark.png' with your actual image file -->
                                </div> <?php else: ?> PENDING <?php endif; ?> <?php endif; ?></td>
                               <td><?php if($audit->hod_otp_status == 1 ): ?> <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                    <img src="<?php echo e(asset('checkmark1.png')); ?>" alt="Checkmark" class="checkmark"> <!-- Replace 'checkmark.png' with your actual image file -->
                                </div>  <?php else: ?> <?php if($audit->status == 'rejected'): ?>  <div class="checkmark-container">
                                    <!-- Signed info text -->
                                    <div class="signed-info">
                                        HOD REJECTED <br>
                                   
                                    </div>
                                
                                    <!-- Image placed over the text -->
                                    <img src="<?php echo e(asset('crossred2.png')); ?>" alt="Checkmark" class="checkmark"> <!-- Replace 'checkmark.png' with your actual image file -->
                                </div> <?php else: ?> PENDING <?php endif; ?>  <?php endif; ?>
                                </td>
                                              <?php $usernameFrwd = DB::table('users')->where('id',$audit->frwd_hod_id)->first(); ?>
                                    <td><?php echo e($usernameFrwd ? $usernameFrwd->first_name : 'N/A'); ?></td>
                                                           <td><?php echo e($audit->reason_description); ?></td>
                                
                                <td>
    <div class="d-flex align-items-center">
        <!-- Status Dropdown -->
        <!-- Edit, View, and Remove Buttons -->
        <div class="d-flex gap-2">
             <?php if($audit->status != 'rejected' && $audit->status != 'approved'): ?>
<button class="btn btn-sm btn-primary" onclick="window.location.href='<?php echo e(route('audits.edit', $audit->id)); ?>'">Edit</button>
            <?php endif; ?>
<button class="btn btn-sm btn-success" onclick="window.location.href='<?php echo e(route('audits.show', $audit->id)); ?>'">View</button>
         <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="<?php echo e($audit->id); ?>">Remove</button>
        </div>
          


</td>

                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

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


<div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="descriptionModalLabel">Audit Description</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalDescription">
                <!-- Description will be populated here -->
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
    document.addEventListener('DOMContentLoaded', function () {
        // Function to check the status and hide/show the dropdown
        function checkStatusAndHide(dropdown, status) {
            if (status === 'approved' || status === 'rejected') {
                dropdown.style.display = 'none'; // Hide the dropdown
            } else {
                dropdown.style.display = 'block'; // Show the dropdown
            }
        }

        // Loop through each dropdown and check initial status
        <?php $__currentLoopData = $audits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $audit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            const dropdown<?php echo e($audit->id); ?> = document.getElementById(`dropdown-<?php echo e($audit->id); ?>`);
            checkStatusAndHide(dropdown<?php echo e($audit->id); ?>, '<?php echo e($audit->status); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        window.updateStatus = function(auditId, newStatus) {
            // Update the hidden input with the new status
            document.getElementById(`status-select-${auditId}`).value = newStatus;

            // Call the function to check status and hide dropdown
            const dropdown = document.getElementById(`dropdown-${auditId}`);
            checkStatusAndHide(dropdown, newStatus);
        };
    });
</script>

<script>
function showRejectModal(auditId) {
    document.getElementById('status-select-' + auditId).value = 'rejected';
    var rejectModal = new bootstrap.Modal(document.getElementById('rejectModal-' + auditId));
    rejectModal.show();
}

function showApprovedWarning(auditId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to approve this audit.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'rgb(85 87 90 / 68%)',
        cancelButtonColor: 'rgb(220 88 44)',
        confirmButtonText: 'Yes, approve it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('status-select-' + auditId).value = 'approved';
            document.getElementById('statusForm-' + auditId).submit();
        }
    });
}

function showForwardModal(auditId) {
    document.getElementById('status-select-' + auditId).value = 'forward';
    var forwardModal = new bootstrap.Modal(document.getElementById('forwardModal-' + auditId));
    forwardModal.show();
}

function submitRejectForm(auditId) {
    var rejectDescription = document.getElementById('reject-description-textarea-' + auditId).value;

    if (rejectDescription.trim() === "") {
        alert('Please provide a reason for rejection.');
        return;
    }

    document.getElementById('reason-description-field-' + auditId).value = rejectDescription;
    document.getElementById('statusForm-' + auditId).submit();
}

function submitForwardForm(auditId) {
    var forwardPerson = document.getElementById('forward-select-field-' + auditId).value;

    if (forwardPerson === "") {
        alert('Please select a person to forward the audit to.');
        return;
    }

    document.getElementById('reason-description-field-' + auditId).value = 'Forwarded to ' + forwardPerson;
    document.getElementById('statusForm-' + auditId).submit();
}

</script>


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

      <script>
$(document).ready(function() {
    $('.remove-item-btn').click(function() {
        var id = $(this).data('id');
        var action = '/audits/' + id; 
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
                    $('#userRow' + response.id).remove();
                } 
            },
            error: function(response) {
                Swal.fire('Error!', 'An error occurred while trying to delete the record.', 'error');
            }
        });
    });
});





</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybU5P3rQ9a3qTgHvbm6EP9edvFNTrRDkA8smBuJ34j5yKzhl/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93DBFfCkbMQ/6FpqXjh1uzOxbdiJNnkk70l8OGptTwzGtvf6MQrU2niSf+Zo/" crossorigin="anonymous"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/audit/index.blade.php ENDPATH**/ ?>