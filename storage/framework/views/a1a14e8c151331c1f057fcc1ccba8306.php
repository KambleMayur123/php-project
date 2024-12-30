
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Complete</h4>
                </div><!-- end card header -->

                <div class="card-body">
                        
                       <div class="col-sm-12 mt-3">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Left-aligned buttons -->
        <div class="d-flex align-items-center">
    <div class="dropdown me-3">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="viewDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            View
        </button>
        <ul class="dropdown-menu" aria-labelledby="viewDropdown">
            <li><a class="dropdown-item" href="#">Physical</a></li>
            <li><a class="dropdown-item" href="#">Electronic</a></li>
            <li><a class="dropdown-item" href="#">Followed up</a></li>
            <li><a class="dropdown-item" href="#">All</a></li>
        </ul>
    </div>
    <div class="dropdown me-3">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="markDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Mark as
        </button>
        <ul class="dropdown-menu" aria-labelledby="markDropdown">
            <li><a class="dropdown-item" href="#">Marked all</a></li>
        </ul>
    </div>
    <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo e(route('createpart')); ?>'">Created part</button>
</div>

        <!-- Right-aligned dropdown -->
      
    </div>
</div>

</div>

              <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                            </div>
                                        </th>
                                        <th class="sort" data-sort="number">Number</th>
                                        <th class="sort" data-sort="subject">Subject</th>
                                        <th class="sort" data-sort="subject_category">Sent to </th>
                                        <th class="sort" data-sort="created_on">sent on</th>
                                        <th class="sort" data-sort="remarks">Due on</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="option1">
                                            </div>
                                        </th>
                                        <td class="number">1</td>
                                        <td class="subject">Subject 1</td>
                                        <td class="subject_category">Category 1</td>
                                        <td class="created_on">2024-08-01</td>
                                        <td class="remarks">Remark 1</td>
                                       
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="option2">
                                            </div>
                                        </th>
                                        <td class="number">2</td>
                                        <td class="subject">Subject 2</td>
                                        <td class="subject_category">Category 2</td>
                                        <td class="created_on">2024-08-02</td>
                                        <td class="remarks">Remark 2</td>
                                       
                                    </tr>
                                    
                                </tbody>
                            </table>

                            <!-- Modal placed outside the loop -->
                            
                        <div class="d-flex justify-content-end mt-3">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-prev disabled" href="#">
                                    Previous
                                </a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-next" href="#">
                                    Next
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->
                      </div>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
        <script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('build/js/pages/crm-customer-list.init.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/file/sent/index.blade.php ENDPATH**/ ?>