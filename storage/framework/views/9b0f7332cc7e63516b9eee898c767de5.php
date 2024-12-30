
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
                         
<div class="row">
    
<div class="col-xxl-7">
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Achivements Type History</h4>
            <a href="<?php echo e(route('achievements.index')); ?>"><button type="button" class="btn btn-primary ">Back </button></a>
        </div>
        <div class="card-body">
            <div class="live-preview">
                <div class="table-responsive" id="departmentTableContent">
                    <!-- Department Table -->
                    <table class="table table-bordered" id="departmentsTable">
                        <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Action</th>
                                            <th>Date</th>
            <th>Time</th>
              <th>Action done by</th>

                                
                            </tr>
                        </thead>
                        <tbody>

                       <?php if($departments->isNotEmpty()): ?>
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="departmentRow<?php echo e($department->id); ?>">
    <td><?php echo e(($departments->currentPage() - 1) * $departments->perPage() + $loop->iteration); ?></td>
                                <td class="departmentName"><?php echo e($department->history_msg); ?></td>
<td class="statename"><?php echo e(\Carbon\Carbon::parse($department->created_at)->format('d-m-Y')); ?></td>

<td class="districtname"><?php echo e(\Carbon\Carbon::parse($department->created_at)->format('h:i A')); ?></td>
  <td class="districtname"><?php if($department->owner_name == Auth::user()->first_name): ?>  You  <?php else: ?> <?php echo e($department->owner_name); ?> <?php endif; ?></td>
        
       

           
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                     <?php if($departments->isNotEmpty()): ?>
                    <div class="d-flex justify-content-center">
                        <?php echo $departments->links(); ?>

                    </div>
                    <?php endif; ?>
                </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="<?php echo e(URL::asset('build/js/pages/select2.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/achivement/achievement_type_history.blade.php ENDPATH**/ ?>