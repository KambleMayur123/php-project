
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
 
    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Nomination type</h4>
                    <a href="<?php echo e(route('nomination_type.history')); ?>"> <button class="btn btn-sm btn-primary ">
                                                <i class="fa fa-edit"></i> History
                                            </button>
                        
                    </button></a>
                </div>
                <div class="card-body">
                    <div class="live-preview">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="nominationTable">
                                <thead>
                                    <tr>
                                        <th>S. No</th>
                                        <th>Nomination type</th>
                                        <?php if((isset($permissions)) && (($permissions['nomination_type_edit'] == 2) || 
    ($permissions['nomination_type_delete'] == 2))): ?>
                                        <th>Action</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if((isset($permissions)) && (
    ($permissions['nomination_type_view'] == 2) || 
    
    ($permissions['nomination_type_edit'] == 2) || 
    ($permissions['nomination_type_delete'] == 2)
)): ?>
                                    <?php $__currentLoopData = $nominations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nomination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="nominationRow<?php echo e($nomination->id); ?>">
    <td><?php echo e(($nominations->currentPage() - 1) * $nominations->perPage() + $loop->iteration); ?></td>
                                        <td class="nominationtype"><?php echo e($nomination->nomination_type); ?></td>
                                         <?php if((isset($permissions)) && ( ($permissions['nomination_type_edit'] == 2) || 
                                         ($permissions['nomination_type_delete'] == 2))): ?>
                                        <td>
                                            <?php if((isset($permissions)) && ( ($permissions['nomination_type_edit'] == 2))): ?>
                                            <button class="btn btn-sm btn-primary editNomination" data-id="<?php echo e($nomination->id); ?>">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <?php endif; ?>
                                              <?php if((isset($permissions)) && ( ($permissions['nomination_type_delete'] == 2))): ?>
                                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="<?php echo e($nomination->id); ?>">
                                                Remove
                                            </button>
                                            <?php endif; ?>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                                                                         <?php if($nominations->isNotEmpty()): ?>
                    <div class="d-flex justify-content-center">
                        <?php echo $nominations->links(); ?>

                    </div>
                    <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php if((isset($permissions)) && ( ($permissions['nomination_type_create'] == 2))): ?>
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Add nomination type</h4>
                </div>
                <div class="card-body">
                    <div class="live-preview">
                        <form action="<?php echo e(route('nomination_type.store')); ?>" method="POST" class="row g-3">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-12">
                                <label for="nomination_type" class="form-label">Nomination type</label>
                                <input type="text" name="nomination_type" class="form-control <?php $__errorArgs = ['nomination_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nomination_type" placeholder="Enter Nomination Type">
                                <?php $__errorArgs = ['nomination_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback" style="color: red;">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-12">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- Delete Modal -->
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

    <!-- Edit Modal -->
    <div class="modal fade" id="editNominationModal" tabindex="-1" aria-labelledby="editNominationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editNominationForm" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="editNominationModalLabel">Edit nomination type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editNominationType" class="form-label">Nomination type</label>
                            <input type="text" name="nomination_type" class="form-control <?php $__errorArgs = ['nomination_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="editNominationType" required>
                            <?php $__errorArgs = ['nomination_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback" style="color: red;">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
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
 <script>
$(document).ready(function() {
    // Edit Nomination
    $('.editNomination').click(function() {
        var id = $(this).data('id');
        $.get('<?php echo e(route('nomination_type.edit', '')); ?>/' + id, function(data) {
            $('#editNominationModal').modal('show');
            $('#editNominationType').val(data.nomination_type); 
            $('#editNominationForm').attr('action', '<?php echo e(route('nomination_type.update', '')); ?>/' + id);
        });
    });

    // Handle Edit Form Submission
    $('#editNominationForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var form = $(this);
        var actionUrl = form.attr('action');
        var formData = form.serialize();

        $.ajax({
            url: actionUrl,
            type: 'PUT',
            data: formData,
            success: function(response) {
                var id = response.id;
                $('#nominationRow' + id + ' .nominationtype').text(response.nomination_type); // Update to correct class
                $('#editNominationModal').modal('hide');
        Swal.fire({
            title: 'Success!',
            text: 'Nomination updated successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
        });
            },
            error: function(response) {
                alert('An error occurred while trying to update the nomination.');
            }
        });
    });

    // Handle Delete Nomination
    $('.remove-item-btn').click(function() {
        var id = $(this).data('id');
        $('#deleteForm').attr('action', '<?php echo e(route('nomination_type.destroy', '')); ?>/' + id);
    });

    // Handle Delete Form Submission
    $('#deleteForm').submit(function(event) {
        event.preventDefault();

        var form = $(this);
        var actionUrl = form.attr('action');
        var id = actionUrl.split('/').pop(); // Extract ID from URL

        $.ajax({
            url: actionUrl,
            type: 'DELETE',
            data: form.serialize(),
            success: function(response) {
                $('#nominationRow' + id).remove();
                $('#deleteRecordModal').modal('hide');
                alert('Nomination deleted successfully.');
            },
            error: function(response) {
                alert('An error occurred while trying to delete the nomination.');
            }
        });
    });
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/nomination/nomination_type.blade.php ENDPATH**/ ?>