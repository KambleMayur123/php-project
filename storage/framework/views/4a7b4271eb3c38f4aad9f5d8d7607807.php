
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    
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
                    <h4 class="card-title mb-0">User Details</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="listjs-table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>

                                              <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo e(route('user-details-view')); ?>'">
Back
</button>
                                </div>
                            </div>
                            
                        </div>

                        <div class="table-responsive table-card mt-3 mb-1">
                    <table class="table align-middle table-nowrap" id="customerTable">
    <thead class="table-light">
        <tr>
                        <th class="sort" data-sort="ID">ID</th>

            <th class="sort" data-sort="first_name">First Name</th>
            <th class="sort" data-sort="caste">Caste</th>
            <th class="sort" data-sort="address_B">Address B</th>
            <th class="sort" data-sort="father_name">Father's Name</th>
            <th class="sort" data-sort="father_address">Father's Address</th>
            <th class="sort" data-sort="birth_date">Birth Date</th>
            <th class="sort" data-sort="birth_text">Birth Text</th>
            <th class="sort" data-sort="birth_mark">Birth Mark</th>
            <th class="sort" data-sort="height">Height</th>
            <th class="sort" data-sort="qualification">Qualification</th>
            <th class="sort" data-sort="another_qualification">Another Qualification</th>
                        <th class="sort" data-sort="certificate_no">Certificate Number</th>
      <th>Forwarded to</th>
                                <th>Status</th>
                               <th >User Digital Signature</th>
                                  <th>Clerk Digital Signature</th>
                                   <th >HOD Digital Signature</th>
            <th class="sort" data-sort="action">Action</th>
        </tr>
    </thead>
    <tbody class="  form-check-all">
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($user->digital_sig == NULL): ?>
           <tr id="userRow<?php echo e($user->id); ?>">
           <td class="id"><?php echo e($user->id ?? 'No data available'); ?></td>

<td class="first_name"><?php echo e($user->first_name ?? 'No data available'); ?></td>
<td class="caste"><?php echo e($user->caste ?? 'No data available'); ?></td>
<td class="address_B"><?php echo e($user->address_B ?? 'No data available'); ?></td>
<td class="father_name"><?php echo e($user->father_name ?? 'No data available'); ?></td>
<td class="father_address"><?php echo e($user->father_address ?? 'No data available'); ?></td>
<td class="birth_date"><?php echo e($user->birth_date ?? 'No data available'); ?></td>
<td class="birth_text"><?php echo e($user->birth_text ?? 'No data available'); ?></td>
<td class="birth_mark"><?php echo e($user->birth_mark ?? 'No data available'); ?></td>
<td class="height"><?php echo e($user->height ?? 'No data available'); ?></td>
<td class="qualification"><?php echo e($user->qualification ?? 'No data available'); ?></td>
<td class="another_qualification"><?php echo e($user->another_qualification ?? 'No data available'); ?></td>
<td class="certificate_no"><?php echo e($user->certificate_no ?? 'No data available'); ?></td>
 <?php $usernameFrwd = DB::table('users')->where('id',$user->frwd_hod_id)->first(); ?>
                                    <td><?php echo e($usernameFrwd ? $usernameFrwd->first_name : 'N/A'); ?></td>
                                                                        <td class="status">
                                           
                                          
                                            <?php if($user->status == 'pending'): ?>
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                                 <?php elseif($user->status == 'approved_clerk'): ?>
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending from HOD</span>
                                                <?php elseif($user->status == 'approved'): ?>
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                                <?php elseif($user->status == 'rejected'): ?>
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                                   <?php elseif($user->status == 'forward'): ?>
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">forward</span>

                                                <?php endif; ?>
                                      </td>
                                      <td><?php if($user->user_status == 'approved' ): ?> <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                    <img src="<?php echo e(asset('checkmark1.png')); ?>" alt="Checkmark" class="checkmark"> <!-- Replace 'checkmark.png' with your actual image file -->
                                </div>   <?php else: ?> PENDING <?php endif; ?> 
                                </td>
                                       <td><?php if($user->clerk_otp_status == 1): ?>  <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                    <img src="<?php echo e(asset('checkmark1.png')); ?>" alt="Checkmark" class="checkmark"> <!-- Replace 'checkmark.png' with your actual image file -->
                                </div><?php else: ?> <?php if($user->status == 'rejected'): ?>  <div class="checkmark-container">
                                    <!-- Signed info text -->
                                    <div class="signed-info">
                                        CLERK REJECTED <br>
                                   
                                    </div>
                                
                                    
                                    <img src="<?php echo e(asset('crossred2.png')); ?>" alt="Checkmark" class="checkmark"> <!-- Replace 'checkmark.png' with your actual image file -->
                                </div> <?php else: ?> PENDING <?php endif; ?> <?php endif; ?></td>
                               <td><?php if($user->hod_otp_status == 1 ): ?> <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                    <img src="<?php echo e(asset('checkmark1.png')); ?>" alt="Checkmark" class="checkmark"> <!-- Replace 'checkmark.png' with your actual image file -->
                                </div>  <?php else: ?> <?php if($user->status == 'rejected'): ?>  <div class="checkmark-container">
                                    <!-- Signed info text -->
                                    <div class="signed-info">
                                        HOD REJECTED <br>
                                   
                                    </div>
                                
                                    <!-- Image placed over the text -->
                                    <img src="<?php echo e(asset('crossred2.png')); ?>" alt="Checkmark" class="checkmark"> <!-- Replace 'checkmark.png' with your actual image file -->
                                </div> <?php else: ?> PENDING <?php endif; ?>  <?php endif; ?>
                                </td>
<!-- Digital Signature -->
<!--<td class="digital_sig">-->
<!--    <?php if($user->digital_sig && in_array(pathinfo($user->digital_sig, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif' , 'pdf'])): ?>-->
<!--        <img src="<?php echo e(asset($user->digital_sig)); ?>" alt="Digital Signature" width="100" height="100">-->
<!--            <button class="btn btn-sm " onclick="window.open('<?php echo e(asset( $user->digital_sig)); ?>', '_blank')">-->
<!--                <i class="fas fa-eye"></i> -->
<!--            </button>-->

<!--    <?php elseif($user->digital_sig && pathinfo($user->digital_sig, PATHINFO_EXTENSION) == 'pdf'): ?>-->
<!--        <a href="<?php echo e(asset($user->digital_sig)); ?>" target="_blank">View PDF</a>-->
<!--            <button class="btn btn-sm" onclick="window.open('<?php echo e(asset($user->digital_sig)); ?>', '_blank')">-->
<!--                <i class="fas fa-eye"></i> -->
<!--            </button>-->

<!--    <?php else: ?>-->
<!--        No file available-->
<!--    <?php endif; ?>-->
<!--</td>-->

<!-- Digital Signature Verify -->
<!--<td class="digital_sig_verify">-->
<!--    <?php if($user->digital_sig_verify && in_array(pathinfo($user->digital_sig_verify, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif' , 'pdf'])): ?>-->
<!--        <img src="<?php echo e(asset($user->digital_sig_verify)); ?>" alt="Digital Signature Verify" width="100" height="100">-->
<!--                    <button class="btn btn-sm" onclick="window.open('<?php echo e(asset( $user->digital_sig)); ?>', '_blank')">-->
<!--                <i class="fas fa-eye"></i> -->
<!--            </button>-->

<!--    <?php elseif($user->digital_sig_verify && pathinfo($user->digital_sig_verify, PATHINFO_EXTENSION) == 'pdf'): ?>-->
<!--        <a href="<?php echo e(asset($user->digital_sig_verify)); ?>" target="_blank">View PDF</a>-->
<!--    <?php else: ?>-->
<!--        No file available-->
<!--    <?php endif; ?>-->
<!--</td>-->

<!-- Post Name (if it's a document like an image or PDF) -->
<!--<td class="post_name">-->
<!--    <?php if($user->post_name && in_array(pathinfo($user->post_name, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif' , 'pdf'])): ?>-->
<!--        <img src="<?php echo e(asset($user->post_name)); ?>" alt="Post Name Document" width="100" height="100">-->
<!--                    <button class="btn btn-sm " onclick="window.open('<?php echo e(asset($user->digital_sig)); ?>', '_blank')">-->
<!--                <i class="fas fa-eye"></i> -->
<!--            </button>-->

<!--    <?php elseif($user->post_name && pathinfo($user->post_name, PATHINFO_EXTENSION) == 'pdf'): ?>-->
<!--        <a href="<?php echo e(asset($user->post_name)); ?>" target="_blank">View PDF</a>-->
<!--    <?php else: ?>-->
<!--        No file available-->
<!--    <?php endif; ?>-->
<!--</td>-->

<td>
    <div class="d-flex gap-2">
        
        <!--<div class="edit">-->
            
        <!--    <button type="button" class="btn btn-sm btn-success edit-item-btn" onclick="window.location.href='<?php echo e(route('usersdetails.edit' ,  $user->id)); ?>'">-->
        <!--        Edit-->
        <!--    </button>-->
        <!--</div>-->

        <!--<div class="remove">-->
        <!--    <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="<?php echo e($user->id); ?>">-->
        <!--        Remove-->
        <!--    </button>-->
        <!--</div>-->
                                                            <div class="edit">
                                                        <button type="button" class="btn btn-sm btn-success edit-item-btn" onclick="window.location.href='<?php echo e(route('usersdetailshow', $user->id)); ?>'">view</button>
                                                 
                                                    </div>
    </div>
</td>
        </tr>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

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
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
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



    document.addEventListener('DOMContentLoaded', function () {
    // Handle the Edit button click event
    document.querySelectorAll('.edit-item-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            // Get data attributes from the button
            var id = this.getAttribute('data-id');
            var firstName = this.getAttribute('data-first-name');
            var middleName = this.getAttribute('data-middle-name');
            var lastName = this.getAttribute('data-last-name');
            var email = this.getAttribute('data-email');
            var state = this.getAttribute('data-state');
            var district = this.getAttribute('data-district');
            var taluka = this.getAttribute('data-taluka');
            var number = this.getAttribute('data-number');
            var address = this.getAttribute('data-address');
            var leaves = this.getAttribute('data-leaves');

            // Populate the modal fields
            document.getElementById('first-name-field').value = firstName;
            document.getElementById('middle-name-field').value = middleName;
            document.getElementById('last-name-field').value = lastName;
            document.getElementById('email-field').value = email;
            document.getElementById('state-field').value = state;
            document.getElementById('district-field').value = district;
            document.getElementById('taluka-field').value = taluka;
            document.getElementById('contact-field').value = number;
            document.getElementById('address-field').value = address;
            document.getElementById('total-leaves-field').value = leaves;

            // Set form action to the correct URL
            var form = document.getElementById('editUserForm');
            form.action = '/users/' + id; // Make sure this matches your route
        });
    });
});

</script>


<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/user-profile/pending.blade.php ENDPATH**/ ?>