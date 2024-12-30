
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.profile'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .scrollable {
            max-height: 200px; /* Set the maximum height */
            overflow-y: auto; /* Enable vertical scrolling */
        }

        /* Custom scrollbar */
        .scrollable::-webkit-scrollbar {
            width: 5px; /* Width of the scrollbar */
        }

        .scrollable::-webkit-scrollbar-thumb {
            background: #007bff; /* Color of the scrollbar thumb */
            border-radius: 4px; /* Rounded scrollbar thumb */
        }

        .scrollable::-webkit-scrollbar-thumb:hover {
            background: #0056b3; /* Darker color on hover */
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="<?php echo e(URL::asset('build/images/profile-bg.jpg')); ?>" alt="" class="profile-wid-img" />
        </div>
    </div>
    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-lg">
                    <div class="img-thumbnail rounded-circle d-flex justify-content-center align-items-center" style="width: 100px; height: 100px; background-color: #f0f0f0;">
                        <i class="fas fa-user" style="font-size: 40px; color: #999;"></i>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></h3>
                    <div class="hstack text-white-50 gap-1">
                        <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white text-opacity-75 fs-16 align-middle"></i><?php echo e($user->address); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="d-flex profile-wrapper">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">Overview</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#password-tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i>
                                <span class="d-none d-md-inline-block">Change Password</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Info</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Full Name</th>
                                                        <td class="text-muted"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Mobile</th>
                                                        <td class="text-muted"><?php echo e($user->number); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">E-mail</th>
                                                        <td class="text-muted"><?php echo e($user->email); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Location</th>
                                                        <td class="text-muted"><?php echo e($user->address); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Joining Date</th>
                                                        <td class="text-muted"><?php echo e($user->joining_date ? $user->joining_date : 'N/A'); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Recent Activities</h5>
                                    </div>
                                    <div class="card-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" id="activityTabs" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="today-tab" data-bs-toggle="tab" href="#today" role="tab">Today</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="yesterday-tab" data-bs-toggle="tab" href="#yesterday" role="tab">Yesterday</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="weekly-tab" data-bs-toggle="tab" href="#weekly" role="tab">Weekly</a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content pt-3">
                                            <!-- Today Tab -->
                                            <div class="tab-pane fade show active scrollable" id="today" role="tabpanel">
                                                <ul class="list-unstyled">
                                                    <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($entry->created_at->isToday()): ?>
                                                            <li class="mb-3">
                                                                <div class="d-flex align-items-start">
                                                                    <div class="me-3">
                                                                        <i class="ri-check-line fs-24 text-success"></i>
                                                                    </div>
                                                                    <div>
                                                                        <div class="fw-bold"><?php echo e($entry->history_msg); ?></div>
                                                                        <small class="text-muted"><?php echo e($entry->created_at->format('M d, Y h:i A')); ?></small>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>

                                            <!-- Yesterday Tab -->
                                            <div class="tab-pane fade scrollable" id="yesterday" role="tabpanel">
                                                <ul class="list-unstyled">
                                                    <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($entry->created_at->isYesterday()): ?>
                                                            <li class="mb-3">
                                                                <div class="d-flex align-items-start">
                                                                    <div class="me-3">
                                                                        <i class="ri-check-line fs-24 text-success"></i>
                                                                    </div>
                                                                    <div>
                                                                        <div class="fw-bold"><?php echo e($entry->history_msg); ?></div>
                                                                        <small class="text-muted"><?php echo e($entry->created_at->format('M d, Y h:i A')); ?></small>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>

                                            <!-- Weekly Tab -->
                                            <div class="tab-pane fade scrollable" id="weekly" role="tabpanel">
                                                <ul class="list-unstyled">
                                                    <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($entry->created_at->isToday() || $entry->created_at->isYesterday() || $entry->created_at->isCurrentWeek()): ?>
                                                            <li class="mb-3">
                                                                <div class="d-flex align-items-start">
                                                                    <div class="me-3">
                                                                        <i class="ri-check-line fs-24 text-success"></i>
                                                                    </div>
                                                                    <div>
                                                                        <div class="fw-bold"><?php echo e($entry->history_msg); ?></div>
                                                                        <small class="text-muted"><?php echo e($entry->created_at->format('M d, Y h:i A')); ?></small>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<div class="tab-pane" id="password-tab" role="tabpanel">
    <!-- Card for Change Password -->
    <div class="card" style="width:40rem;">
        <div class="card-header">
            <h5 class="card-title mb-0">Change Password</h5>
        </div>
        <div class="card-body ">
            <form action="<?php echo e(route('user.updatePassword')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="mb-3">
                    <label for="currentPassword" class="form-label">Current Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control <?php $__errorArgs = ['currentPassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="currentPassword" name="currentPassword" required>
                        <button type="button" class="btn" onclick="togglePasswordVisibility('currentPassword', 'toggleCurrentPasswordIcon')">
                            <i id="toggleCurrentPasswordIcon" class="fa fa-eye"></i>
                        </button>
                        <?php $__errorArgs = ['currentPassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control <?php $__errorArgs = ['newPassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="newPassword" name="newPassword" required>
                        <button type="button" class="btn " onclick="togglePasswordVisibility('newPassword', 'toggleNewPasswordIcon')">
                            <i id="toggleNewPasswordIcon" class="fa fa-eye"></i>
                        </button>
                        <?php $__errorArgs = ['newPassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="newPassword_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control <?php $__errorArgs = ['newPassword_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="newPassword_confirmation" name="newPassword_confirmation" required>
                        <button type="button" class="btn " onclick="togglePasswordVisibility('newPassword_confirmation', 'toggleConfirmPasswordIcon')">
                            <i id="toggleConfirmPasswordIcon" class="fa fa-eye"></i>
                        </button>
                        <?php $__errorArgs = ['newPassword_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility(inputId, iconId) {
        var input = document.getElementById(inputId);
        var icon = document.getElementById(iconId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>

    <!-- listjs init -->
    <script src="<?php echo e(URL::asset('build/js/pages/listjs.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    
        
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="<?php echo e(URL::asset('build/js/pages/select2.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the stored active tab from localStorage
        var activeTab = localStorage.getItem('activeTab');
        
        // If an active tab is stored, show it
        if (activeTab) {
            // Use the correct selector to find the tab link and show it
            var tabLink = document.querySelector('a[href="' + activeTab + '"]');
            if (tabLink) {
                var tab = new bootstrap.Tab(tabLink);
                tab.show();
            }
        }

        // Add event listener to store the active tab in localStorage when a tab is clicked
        document.querySelectorAll('a[data-bs-toggle="tab"]').forEach(function (tabLink) {
            tabLink.addEventListener('shown.bs.tab', function (e) {
                localStorage.setItem('activeTab', e.target.getAttribute('href'));
            });
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/user-profile/User_profile.blade.php ENDPATH**/ ?>