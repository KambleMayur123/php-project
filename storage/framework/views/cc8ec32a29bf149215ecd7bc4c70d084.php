
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            </div><!-- end card header -->

            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="card-header">
                    <h4 class="card-title">Receipt List</h4>
                    <?php if((isset($permissions)) && ( ($permissions['other_receipt_create'] == 2))): ?>

                      <a href="<?php echo e(route('receipts.create')); ?>"><button type="button" class="btn btn-primary ">Add </button></a>
                      <?php endif; ?>
                    <a href="<?php echo e(route('receipts.pending')); ?>"><button type="button" class="btn btn-warning ">Request </button></a>
                <a href="<?php echo e(route('receipts.history')); ?>"><button type="button" class="btn btn-primary ">History </button></a>
              
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
                        <table class="table table-bordered" id="designationsTable">
                           <thead>
                            <tr>
 <!--<th scope="col" style="width: 50px;">-->
 <!--                                       <div class="form-check">-->
 <!--                                           <input class="form-check-input" type="checkbox" id="checkAll" value="option">-->
 <!--                                       </div>-->
 <!--                                   </th>
 -->                                   <th>ID</th>
                                                                     <th>Username</th>

                                   <th>Receipt No</th>
                                <th>Receipt Category</th>
                                <th>Subject</th>
                                <th>Description</th>
                                   <th>Forwarded to</th>
                                <th>Status</th>
                               <th>Reject Description</th>
                                  <th >Clerk Digital Signature</th>
                                   <th >HOD Digital Signature</th>
                                <th>Document</th>
                                <?php if((isset($permissions)) && (
    ($permissions['other_receipt_view'] == 2) || 
   ($permissions['other_receipt_create'] == 2)
)): ?>

                                <th>Actions</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                                                       <!--<?php $sno = 1; ?> -->
  <?php if((isset($permissions)) && (
    ($permissions['other_receipt_view'] == 2) || 
   ($permissions['other_receipt_create'] == 2)
)): ?>

                            <?php $__currentLoopData = $receipts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receipt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          
                            <tr>
                                <td><?php echo e($receipt->id); ?></td>

                                <td><?php echo e($receipt->first_name); ?> <?php echo e($receipt->last_name); ?></td>

                                <td><?php echo e($receipt->receipt_no); ?></td>
                                <td><?php echo e($receipt->receipt_checklist_id); ?></td>
                                <td><?php echo e($receipt->subject); ?></td>
                                     <td>
                                 <!-- Eye Button -->
                <button class="btn btn-info btn-sm view-description" 
                        data-description="<?php echo e($receipt->description); ?>" 
                        data-bs-toggle="modal" 
                        data-bs-target="#descriptionModal">
                    <i class="fas fa-eye"></i>
                </button>
                </td>
                                <?php $usernameFrwd = DB::table('users')->where('id',$receipt->frwd_hod_id)->first(); ?>
                                    <td><?php echo e($usernameFrwd ? $usernameFrwd->first_name : 'N/A'); ?></td>
                                                                        <td class="status">
                                           
                                          
                                            <?php if($receipt->status == 'pending'): ?>
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                                 <?php elseif($receipt->status == 'approved_clerk'): ?>
                                                <span class="badge bg-warning-subtle text-warning text-uppercase">Pending from HOD</span>
                                                <?php elseif($receipt->status == 'approved'): ?>
                                                <span class="badge bg-success-subtle text-success text-uppercase">Approved</span>
                                                <?php elseif($receipt->status == 'rejected'): ?>
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">Rejected</span>
                                                   <?php elseif($receipt->status == 'forward'): ?>
                                                 <span class="badge bg-danger-subtle text-danger text-uppercase">forward</span>

                                                <?php endif; ?>
                                      </td>
                                     <td><?php echo e($receipt->reject_description); ?></td>
                                       <td><?php if($receipt->clerk_otp_status == 1 || ($receipt->status != 'rejected' && $receipt->status != 'pending')): ?>  <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                    <img src="<?php echo e(asset('checkmark1.png')); ?>" alt="Checkmark" class="checkmark"> <!-- Replace 'checkmark.png' with your actual image file -->
                                </div><?php elseif($receipt->status == 'rejected' && $receipt->frwd_hod_id == null ): ?>  <div class="checkmark-container">
                                    <!-- Signed info text -->
                                    <div class="signed-info">
                                        CLERK REJECTED <br>
                                   
                                    </div>
                                
                                    
                                    <img src="<?php echo e(asset('crossred2.png')); ?>" alt="Checkmark" class="checkmark"> <!-- Replace 'checkmark.png' with your actual image file -->
                                </div> <?php else: ?> PENDING  <?php endif; ?></td>
                               <td><?php if($receipt->hod_otp_status == 1 ): ?> <div class="checkmark-container">
                                  
                                
                                    <!-- Image placed over the text -->
                                    <img src="<?php echo e(asset('checkmark1.png')); ?>" alt="Checkmark" class="checkmark"> <!-- Replace 'checkmark.png' with your actual image file -->
                                </div>  <?php elseif($receipt->status == 'rejected' && $receipt->frwd_hod_id != null ): ?>  <div class="checkmark-container">
                                    <!-- Signed info text -->
                                    <div class="signed-info">
                                        HOD REJECTED <br>
                                   
                                    </div>
                                
                                    <!-- Image placed over the text -->
                                    <img src="<?php echo e(asset('crossred2.png')); ?>" alt="Checkmark" class="checkmark"> <!-- Replace 'checkmark.png' with your actual image file -->
                                </div> <?php else: ?> PENDING   <?php endif; ?>
                                </td>
                               
                                <td><a href="<?php echo e(asset('/uploads/document/'. $receipt->receipt_pdf)); ?>" target="_blank">View PDF</a></td>
                                  
  <?php if((isset($permissions)) && (
    ($permissions['other_receipt_view'] == 2) || 
   ($permissions['other_receipt_create'] == 2)
)): ?>
                                <td>
                                    <?php if((isset($permissions)) && (
   ($permissions['other_receipt_view'] == 2)
)): ?>

                                    <a href="<?php echo e(route('receipts.edit' ,$receipt->id )); ?>" class="btn btn-success btn-sm">View</a>
                                
                                      <?php endif; ?>
                                      <?php if((isset($permissions)) && (
   ($permissions['other_receipt_create'] == 2)
)): ?>
<?php if($receipt->status != 'rejected' && $receipt->status != 'approved' ): ?>
                                    <a href="<?php echo e(route('receipts.edit' ,$receipt->id )); ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <?php endif; ?>
                                    <?php endif; ?>
<form action="<?php echo e(route('receipts.destroy', $receipt->id)); ?>" method="POST" style="display:inline;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this receipt?');">
        Remove
    </button>
</form>

                                </td>
                                <?php endif; ?>
                              
                            </tr>
                        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                        </table>
                    </div>

                    <!--<div class="d-flex justify-content-end">-->
                    <!--    <div class="pagination-wrap hstack gap-2">-->
                    <!--        <a class="page-item pagination-prev disabled" href="javascript:void(0);">Previous</a>-->
                    <!--        <ul class="pagination listjs-pagination mb-0"></ul>-->
                    <!--        <a class="page-item pagination-next" href="javascript:void(0);">Next</a>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<!-- Delete Record Modal -->
<!--<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-dialog-centered">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title">Delete Record</h5>-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>-->
<!--            </div>-->
<!--            <div class="modal-body text-center">-->
<!--                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>-->
<!--                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">-->
<!--                    <h4>Are you Sure?</h4>-->
<!--                    <p class="text-muted mx-4 mb-0">Are you sure you want to remove this record?</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="modal-footer justify-content-center">-->
<!--                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>-->
<!--                <form id="deleteForm" method="POST" style="display:inline;">-->
<!--                    <?php echo csrf_field(); ?>-->
<!--                    <?php echo method_field('DELETE'); ?>-->
<!--                    <button type="submit" class="btn btn-sm btn-light">Yes, delete it</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>


    <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>

    <!-- listjs init -->
    <script src="<?php echo e(URL::asset('build/js/pages/listjs.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>


    
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="<?php echo e(URL::asset('build/js/pages/select2.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

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
                <h5 class="modal-title" id="descriptionModalLabel">Receipt Description</h5>
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

<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        $('.remove-item-btn').click(function() {-->
<!--            var id = $(this).data('id');-->
<!--            var action = '/salary/' + id; -->
<!--            $('#deleteForm').attr('action', action);-->
<!--        });-->

<!--        $('#deleteForm').submit(function(event) {-->
<!--            event.preventDefault(); -->
<!--            var form = $(this);-->
<!--            $.ajax({-->
<!--                url: form.attr('action'),-->
<!--                type: 'POST',-->
<!--                data: form.serialize(),-->
<!--                success: function(response) {-->
<!--                    $('#deleteRecordModal').modal('hide');-->
<!--                    $('#userRow' + response.id).remove();-->
<!--                    alert('Salary record deleted successfully.');-->
<!--                },-->
<!--                error: function(response) {-->
<!--                    alert('An error occurred while trying to delete the record.');-->
<!--                }-->
<!--            });-->
<!--        });-->
<!--    });-->
<!--</script>-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/receipt/index.blade.php ENDPATH**/ ?>