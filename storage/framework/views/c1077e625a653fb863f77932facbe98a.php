<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.new-page-title'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            margin-top: 20px;
        }

        /* Header Section with File No. */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f1f1f1;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .header .file-no {
            font-size: 16px;
            font-weight: bold;
        }

        /* Tabs */
        .nav-tabs {
            margin-bottom: 20px;
        }

        .nav-tabs .nav-item {
            margin-right: 5px;
        }

        .nav-tabs .nav-link {
            border: 1px solid #ddd;
            border-radius: 0;
        }

        .tab-content {
            border: 1px solid #ddd;
            padding: 15px;
            background-color: #fff;
        }

        /* Left Panel */
        .left-panel {
            width: 50%;
            background-color: #d5f0d5; /* light green */
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        /* Button Styling for Smaller Size */
        .btn-small {
            padding: 5px 10px; /* Smaller padding */
            font-size: 12px; /* Smaller font size */
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 5px; /* Spacing between buttons */
        }

        .btn-small.add-yellow-note {
            background-color: #f0c74f; /* Yellow color */
        }

        /* Align buttons in a single row */
        .button-group {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        /* Right Panel */
        .right-panel {
            width: 50%;
            background-color: #f8dcdc; /* light pink */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .right-panel p {
            font-size: 18px;
            color: #d9534f; /* red text */
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <!-- File No. Header -->
        <div class="header">
            <div class="file-no">File No: 12345/ABC</div>
            <div class="header-actions">
                <!-- Optional actions for the header can be added here -->
            </div>
        </div>

        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="noting-tab" data-bs-toggle="tab" href="#noting" role="tab" aria-controls="noting" aria-selected="true">Noting</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="correspondence-tab" data-bs-toggle="tab" href="#correspondence" role="tab" aria-controls="correspondence" aria-selected="false">Correspondence</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="draft-tab" data-bs-toggle="tab" href="#draft" role="tab" aria-controls="draft" aria-selected="false">Draft</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="references-tab" data-bs-toggle="tab" href="#references" role="tab" aria-controls="references" aria-selected="false">References</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="link-tab" data-bs-toggle="tab" href="#link" role="tab" aria-controls="link" aria-selected="false">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="details-tab" data-bs-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="false">Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="movements-tab" data-bs-toggle="tab" href="#movements" role="tab" aria-controls="movements" aria-selected="false">Movements</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="moreaction-tab" data-bs-toggle="tab" href="#moreaction" role="tab" aria-controls="moreaction" aria-selected="false">More Action</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="createvolume-tab" data-bs-toggle="tab" href="#createvolume" role="tab" aria-controls="createvolume" aria-selected="false">Create Volume</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="moredetails-tab" data-bs-toggle="tab" href="#moredetails" role="tab" aria-controls="moredetails" aria-selected="false">More Details</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="myTabContent">
            <!-- Noting Tab -->
            <div class="tab-pane fade show active" id="noting" role="tabpanel" aria-labelledby="noting-tab">
                <div class="row">
                    <!-- Left Panel with Compact Buttons -->
                    <div class="col-md-6 left-panel">
                        <div class="button-group">
                            <button class="btn-small add-green-note">Add Green Note</button>
                            <button class="btn-small add-yellow-note">Add Yellow Note</button>
                        </div>
                    </div>

                    <!-- Right Panel -->
                    <div class="col-md-6 right-panel">
                        <p>There is no correspondence attached with this file.</p>
                    </div>
                </div>
            </div>

            <!-- Correspondence Tab -->
            <div class="tab-pane fade" id="correspondence" role="tabpanel" aria-labelledby="correspondence-tab">
                <p>No correspondence available for this file.</p>
            </div>

            <!-- Draft Tab -->
            <div class="tab-pane fade" id="draft" role="tabpanel" aria-labelledby="draft-tab">
                <p>No draft available for this file.</p>
            </div>

            <!-- References Tab -->
            <div class="tab-pane fade" id="references" role="tabpanel" aria-labelledby="references-tab">
                <p>No references available for this file.</p>
            </div>

            <!-- Link Tab -->
            <div class="tab-pane fade" id="link" role="tabpanel" aria-labelledby="link-tab">
                <p>No links available for this file.</p>
            </div>

            <!-- Details Tab -->
            <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                <p>No details available for this file.</p>
            </div>

            <!-- Movements Tab -->
            <div class="tab-pane fade" id="movements" role="tabpanel" aria-labelledby="movements-tab">
                <p>No movements available for this file.</p>
            </div>

            <!-- More Action Tab -->
            <div class="tab-pane fade" id="moreaction" role="tabpanel" aria-labelledby="moreaction-tab">
                <p>No actions available for this file.</p>
            </div>

            <!-- Create Volume Tab -->
            <div class="tab-pane fade" id="createvolume" role="tabpanel" aria-labelledby="createvolume-tab">
                <p>No volumes available for this file.</p>
            </div>

            <!-- More Details Tab -->
            <div class="tab-pane fade" id="moredetails" role="tabpanel" aria-labelledby="moredetails-tab">
                <p>No more details available for this file.</p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>

    <!-- listjs init -->
    <script src="<?php echo e(URL::asset('build/js/pages/listjs.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/file/electronic/continueworking.blade.php ENDPATH**/ ?>