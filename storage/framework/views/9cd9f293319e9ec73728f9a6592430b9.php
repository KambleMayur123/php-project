
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginal36b17d019c9df50eb21df8f39abb94b2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal36b17d019c9df50eb21df8f39abb94b2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.common-header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('common-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal36b17d019c9df50eb21df8f39abb94b2)): ?>
<?php $attributes = $__attributesOriginal36b17d019c9df50eb21df8f39abb94b2; ?>
<?php unset($__attributesOriginal36b17d019c9df50eb21df8f39abb94b2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal36b17d019c9df50eb21df8f39abb94b2)): ?>
<?php $component = $__componentOriginal36b17d019c9df50eb21df8f39abb94b2; ?>
<?php unset($__componentOriginal36b17d019c9df50eb21df8f39abb94b2); ?>
<?php endif; ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">View Electronic File</h4>
                </div><!-- end card header -->

                <div class="card-body">
                        
                       <div class="col-sm-12 mt-3">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Left-aligned buttons -->
        <div class="d-flex align-items-center">
           
               <a href="<?php echo e(route('sfs-electronics.create')); ?>"> <button class="btn btn-secondary " type="button">
                  Create Electronic File
                </button></a>
              
        </div>

        <!-- Right-aligned dropdown -->
        <!--<div>-->
        <!--    <select class="form-select" aria-label="Hierarchy View">-->
        <!--        <option selected>Select Hierarchy View</option>-->
        <!--        <option value="1">Option 1</option>-->
        <!--        <option value="2">Option 2</option>-->
        <!--        <option value="3">Option 3</option>-->
        <!--    </select>-->
        <!--</div>-->
    </div>
</div>

</div>
<?php
$getDiaryDetails = DB::table('diary_details')->orderBy('id','DESC')->get();
?>
              <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                       
                                        <th class="sort" data-sort="number">ID</th>
                                        <th class="sort" data-sort="subject">Diary Date</th>
                                        <th class="sort" data-sort="subject_category"> Latter No</th>
                                        <th class="sort" data-sort="created_on">Diary Mode</th>
                                        <th class="sort" data-sort="remarks">Form Of Communication</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    <?php $__currentLoopData = $getDiaryDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                   
                                        <td class="number"><?php echo e($temp->id); ?></td>
                                        <td class="subject"><?php echo e($temp->diary_date); ?></td>
                                        <td class="subject_category"><?php echo e($temp->diary_letter_date); ?></td>
                                        <td class="created_on"><?php echo e($temp->diary_delivery_mode); ?></td>
                                        <td class="remarks"><?php echo e($temp->diary_forms_comm); ?></td>
                                       
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/file/electronic/view-electronic-file.blade.php ENDPATH**/ ?>