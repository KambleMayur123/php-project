
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
}
</style>
       <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <!--<div class="card-header align-items-center d-flex">-->
            <!--    <h4 class="card-title mb-0 flex-grow-1">Default Table</h4>-->
            <!--    <div class="flex-shrink-0">-->
            <!--        <div class="form-check form-switch form-switch-right form-switch-md">-->
            <!--            <label for="default-showcode" class="form-label text-muted">Show Code</label>-->
            <!--            <input class="form-check-input code-switcher" type="checkbox" id="default-showcode">-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div><!-- end card header -->

            <div class="card-body">
               
                <div class="live-preview">
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">File No.</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Sender Name</th>
                                    <th scope="col">Receiver Name</th>
                                     
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th >1</th>
                                    <td>Bobby Davis</td>
                                    <td></td>
                                    <td>$2,30</td>
                                    <td>bkbkhk</td>
                                    
                                </tr>
                                  <tr>
                                    <th >2</th>
                                    <td>Bobby Davis</td>
                                    <td></td>
                                    <td>$2,30</td>
                                    <td>vhjgj</td>
                                    
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

            
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->

  
    <!-- end col -->
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/report/received-file-report.blade.php ENDPATH**/ ?>