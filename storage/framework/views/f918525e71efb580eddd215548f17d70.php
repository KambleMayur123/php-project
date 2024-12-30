<header id="page-topbar" style="margin-top:120px">
    <div class="layout-width" style="margin-left:12px;">
     
              <div class="card-body">
  <div class="live-preview">
    <!-- Main Header Navigation Bar -->
    <div class="navbar" style="display: flex; justify-content: space-between; background-color: #5f5f5f; align-items: center; gap:20px; width:93%;padding:0px;">
      
      <!-- Left Section (RECEIPT) -->
   <div style="display: flex; align-items: center;">
    <!-- Buttons inside RECEIPT (attached closely) -->
    <div style="display: flex; gap: 0; margin-left: 5px;">
        <a href="#" style="padding: 7px 10px; color: white; text-decoration: none; border-radius: 4px;"><i class="fa-solid fa-house"></i></a>
        <span style="color: black; margin: 0 10px 0 10px;font-size:25px;">|</span>
        <a href="#" style="padding: 7px 10px; color: white; text-decoration: none; border-radius: 4px;">Movement</a>
        <span style="color: black; margin: 0 10px;font-size:25px;">|</span>
        <a href="#" style="padding: 7px 10px; color: white; text-decoration: none; border-radius: 4px;">Copy</a>
        <span style="color: black; margin: 0 10px;font-size:25px;">|</span>
        <a href="/electronic-sent" style="padding: 7px 10px; color: white; text-decoration: none; border-radius: 4px;">Send</a>
        <span style="color: black; margin: 0 10px;font-size:25px;">|</span>
        <a href="#" style="padding: 7px 10px; color: white; text-decoration: none; border-radius: 4px;" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Put in a file</a>
        <span style="color: black; margin: 0 10px;font-size:25px;">|</span>
        <div class="dropdown" style="position: relative;">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="draftDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Draft
            </button>
            <ul class="dropdown-menu" aria-labelledby="draftDropdown">
                <li><a class="dropdown-item" href="<?php echo e(url('create-draft')); ?>">Create Draft</a></li>
                <li><a class="dropdown-item" href="<?php echo e(url('view-draft')); ?>">View Draft</a></li>
            </ul>
        </div>
        <span style="color: black; margin: 0 10px;font-size:25px;">|</span>
        <a href="#" style="padding: 7px 10px; color: white; text-decoration: none; border-radius: 4px;">Close</a>
        <span style="color: black; margin: 0 10px;font-size:25px;">|</span>
        <a href="#" style="padding: 7px 10px; color: white; text-decoration: none; border-radius: 4px;">Generate Acknowledgement</a>
    </div>
</div>

    </div>
  </div>
</div>

        </div>
    </div>
    
</header>
<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#338fff; padding:10px;">
    <h5 class="modal-title" id="exampleModalgridLabel">Put In File(s)</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

            <div class="modal-body">
                <!-- Create Button -->
                <div class="d-flex mb-3">
    <?php if(isset($id)): ?>
        <a href="<?php echo e(route('createfile', ['id' => $id])); ?>">
            <button type="button" class="btn btn-primary me-auto">Create File</button>
        </a>
    <?php else: ?>
        <a href="<?php echo e(route('createfile')); ?>">
            <button type="button" class="btn btn-primary me-auto">Create File</button>
        </a>
    <?php endif; ?>
                </div>
                
                <!-- Table -->
<!-- Table -->
<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="table align-middle table-nowrap" id="customerTable">
            <tr>
                <th>Nature</th>
                <th>Type</th>
                <th>File No. 1</th>
                <th>File No. 2</th>
                <th>File No. 3</th>
                <th>File No. 4</th>
                <th>File No. 5</th>
                <th>File No. 6</th>
                <th>Description</th>
                <th>Main Category</th>
                <th>Sub Category</th>
                <th>Classified</th>
                <th>Remarks</th>
                <th>Previous Ref.</th>
                <th>Later Ref.</th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($files) && count($files) > 0): ?>
                <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($file->nature); ?></td>
                        <td><?php echo e($file->type); ?></td>
                        <td><?php echo e($file->fileno_1); ?></td>
                        <td><?php echo e($file->fileno_2); ?></td>
                        <td><?php echo e($file->fileno_3); ?></td>
                        <td><?php echo e($file->fileno_4); ?></td>
                        <td><?php echo e($file->fileno_5); ?></td>
                        <td><?php echo e($file->fileno_6); ?></td>
                        <td><?php echo e($file->description); ?></td>
                        <td><?php echo e($file->main_category); ?></td>
                        <td><?php echo e($file->sub_category); ?></td>
                        <td><?php echo e($file->classified); ?></td>
                        <td><?php echo e($file->remarks); ?></td>
                        <td><?php echo e($file->previous_ref); ?></td>
                        <td><?php echo e($file->later_ref); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr>
                    <td colspan="14" class="text-center">No files available</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

                <!-- Remark Input Field -->
                <div class="mt-3">
                    <label for="remarkInput" class="form-label">Remark</label>
                    <input type="text" class="form-control" id="remarkInput" placeholder="Enter your remark">
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/components/file-header.blade.php ENDPATH**/ ?>