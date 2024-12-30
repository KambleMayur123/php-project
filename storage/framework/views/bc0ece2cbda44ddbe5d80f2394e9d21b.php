
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
<style>
    
    .col-lg-12 {
        flex: 0 0 auto;
        width: 70% !important;
    }
.file-submit{
    margin:0 auto;
    padding:5px;
    margin-left: 380px;
    border-radius:5px;
     background-color:#405189;
    color:#fff;
    border:none;
}
</style>
     <div class="row">
        <div class="col-lg-12" style="margin-left:200px">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">File Received Report</h4>
                  
                </div><!-- end card header -->
                
                <div class="card-body">
                    <div class="live-preview">
                         

                <div class="row gy-12">
                         <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="exampleInputdate" class="form-label">From</label>
                                    <input type="date" class="form-control" id="exampleInputdate">
                                </div>
                        </div> 
                         <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="exampleInputdate" class="form-label">To</label>
                                    <input type="date" class="form-control" id="exampleInputdate">
                                </div>
                            </div>
                           
                </div>
                  <div class="row gy-6">
                         <div class="col-xxl-6 col-md-6">
                             <label for="exampleInputdate" class="form-label">Category</label>
                                <select class="form-select mb-3" aria-label="Default select example">
                                    <option selected>Select one </option>
                                    <option value="1">Declined Payment</option>
                                    <option value="2">Delivery Error</option>
                                    <option value="3">Wrong Amount</option>
                                </select>
                            </div>
                </div>  
                   <div class="row gy-6">
                         <div class="col-xxl-6 col-md-6">
                             <label for="exampleInputdate" class="form-label">Section/officer By</label>
                                <select class="form-select mb-3" aria-label="Default select example">
                                    <option selected>Select one </option>
                                    <option value="1">Declined Payment</option>
                                    <option value="2">Delivery Error</option>
                                    <option value="3">Wrong Amount</option>
                                </select>
                            </div>
                             <div class="col-xxl-6 col-md-6">
                             <label for="exampleInputdate" class="form-label">Sent By</label>
                                <select class="form-select mb-3" aria-label="Default select example">
                                    <option selected>Select One </option>
                                    <option value="1">Declined Payment</option>
                                    <option value="2">Delivery Error</option>
                                    <option value="3">Wrong Amount</option>
                                </select>
                            </div>
                </div>  
                
                   <a href="/received-file-report">
    <button class="file-submit">Submit</button>
</a>
            </div>
        </div>
        <!--end col-->
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/report/received-file.blade.php ENDPATH**/ ?>