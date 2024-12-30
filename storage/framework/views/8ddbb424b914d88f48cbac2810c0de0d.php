<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.new-page-title'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <link href="<?php echo e(URL::asset('build/libs/quill/quill.snow.css')); ?>" rel="stylesheet" type="text/css" />

    <style>
        .ele-left-div {
            width: 50%;
            padding: 0px 1px;
            position: relative;
            border-right: 1px solid #ccc;
        }

        .ele-left-div button {
            padding: 2px 15px;
            border: none;
            background-color: #0056ac;
            color: white;
            font-size: 14px;
            margin-right: 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        .ele-watermark {
            position: absolute;
            left: 100px;
            font-size: 70px;
            color: rgba(0, 0, 0, 0.05);
            transform: rotate(-30deg);
            user-select: none;
            margin-top: 200px;
        }

        .ele-right-div {
            width: 50%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow-y: auto;
            height: 600px;
        }

        .ele-form-section {
            margin-bottom: 20px;
        }

        #fileInput {
            display: none;
        }

        .file-name {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }
    </style>
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
<?php if (isset($component)) { $__componentOriginal82bdff0088c1b67652c3a45146c10d18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal82bdff0088c1b67652c3a45146c10d18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.file-header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('file-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal82bdff0088c1b67652c3a45146c10d18)): ?>
<?php $attributes = $__attributesOriginal82bdff0088c1b67652c3a45146c10d18; ?>
<?php unset($__attributesOriginal82bdff0088c1b67652c3a45146c10d18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal82bdff0088c1b67652c3a45146c10d18)): ?>
<?php $component = $__componentOriginal82bdff0088c1b67652c3a45146c10d18; ?>
<?php unset($__componentOriginal82bdff0088c1b67652c3a45146c10d18); ?>
<?php endif; ?>

<div class="row" style="display: flex; border: 1px solid #ccc; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5); margin-top: 20px;">
    <!-- Left Div -->
    <div class="card" style="width: 50%; padding: 0px 1px; position: relative; border-right: 1px solid #ccc;">
        <input type="file" id="fileInput" accept="application/pdf" />
        <div class="elebtn">
            <button class="upload" id="uploadBtn" style="padding: 2px 15px; border: none; background-color: #0056ac; color: white; font-size: 14px; margin-right: 10px; cursor: pointer; border-radius: 3px;">
                Upload <i class="fas fa-upload"></i>
            </button>
            
            <button class="remove" id="removeBtn" style="padding: 2px 15px; border: none; background-color: #d2d0d0; color: white; font-size: 14px; margin-right: 10px; cursor: pointer; border-radius: 3px;">
                Remove <i class="fa-solid fa-xmark"></i>
            </button>
            <p style="color:red; margin-bottom:0px;">PDF ONLY <= 20MB</p>
        </div>
        <div class="file-name" id="fileName"></div>
        <div class="ele-watermark">Electronic</div>

        <!-- PDF Viewer (Initially Hidden) -->
        <div class="" id="pdfViewerContainer" style="display:none;">
            <iframe id="pdfViewer" style="width:100%; height:500px;" frameborder="0"></iframe>
        </div>
        
        <!-- Textarea (Shown by Default) -->
        <div class="snow-editor" id="textareaContainer">
            <textarea id="quillEditor" style="width: 100%; height: 500px;"></textarea>
        </div>
    </div>

   
        
        <!-- Right Div (Scrollable Form) -->
        <div class="card" style="  width: 50%;
    padding: 20px;
    display: flex;
    flex-direction: column;
    position: relative;
     overflow-y: auto; /* Scrollable form content */
    /*margin-bottom: 20px;*/
    overflow-x: hidden;
    height:600px;">
            

            <!-- Section 1: Diary Details -->
            <div class="ele-form-section">
            <div class="elesec1">
    <h3 style="font-size: 17px;">
        <span><i class="fa-solid fa-book"></i> Draft Details</span>
    </h3>
    <form>
        <div class="row align-items-center g-3">
            <div class="col-lg-4">
                <label class="form-label" for="draftNature">Draft Nature</label>
                <select id="draftNature" class="form-select">
                    <option>Letter</option>
                    <option>Post</option>
                </select>
            </div>
            <div class="col-lg-4">
                <label for="receiptNo" class="form-label">Receipt No</label>
                <select id="receiptNo" class="form-select">
                    <option>Letter</option>
                    <option>Post</option>
                </select>
            </div>
            <div class="col-lg-4">
                <label for="replyType" class="form-label">Reply Type</label>
                <select id="replyType" class="form-select">
                    <option>Hindi</option>
                    <option>English</option>
                </select>
            </div>
        </div>

        <div class="row align-items-center g-3">
            <div class="col-lg-4">
                <label for="communicationForms" class="form-label">Forms Of Communications</label>
                <select id="communicationForms" class="form-select">
                    <option>Option 1</option>
                    <option>Option 2</option>
                </select>
            </div>
            <div class="col-lg-4">
                <label for="prefix" class="form-label">Prefix</label>
                <select id="prefix" class="form-select">
                    <option>Option 1</option>
                    <option>Option 2</option>
                </select>
            </div>
            <div class="col-lg-4">
                <label for="language" class="form-label">Language</label>
                <select id="language" class="form-select">
                    <option>Option 1</option>
                    <option>Option 2</option>
                </select>
            </div>
        </div>

        <div class="row align-items-center g-3">
            <div class="col-lg-4">
                <label for="mainCategory" class="form-label">Main Category</label>
                <select id="mainCategory" class="form-select">
                    <option>By Hand</option>
                    <option>By Post</option>
                </select>
            </div>
            <div class="col-lg-4">
                <label for="subCategory" class="form-label">Sub Category</label>
                <select id="subCategory" class="form-select">
                    <option>Choose One</option>
                    <option>Internal</option>
                    <option>External</option>
                </select>
            </div>
        </div>

        <div class="row align-items-center g-3">
            <div class="col-lg-12">
                <label for="subject" class="form-label">Subject</label>
                <textarea id="subject" class="form-control" rows="4"></textarea>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12 text-end">
                <button type="submit" class="btn btn-primary">Add/Edit Recipients</button>
            </div>
        </div>
    </form>
</div>

        
    </div>
</div>
</div>

<script>
    document.getElementById('uploadBtn').addEventListener('click', function() {
        document.getElementById('fileInput').click();
    });

    document.getElementById('fileInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const fileNameDisplay = document.getElementById('fileName');
        const pdfViewerContainer = document.getElementById('pdfViewerContainer');
        const textareaContainer = document.getElementById('textareaContainer');
        const pdfViewer = document.getElementById('pdfViewer');

        if (file) {
            fileNameDisplay.textContent = file.name;
            textareaContainer.style.display = 'none'; // Hide textarea
            pdfViewerContainer.style.display = 'block'; // Show PDF viewer

            // Create a URL for the selected file and set it as the iframe source
            const fileURL = URL.createObjectURL(file);
            pdfViewer.src = fileURL;
        } else {
            fileNameDisplay.textContent = 'No file selected';
            textareaContainer.style.display = 'block'; // Show textarea
            pdfViewerContainer.style.display = 'none'; // Hide PDF viewer
            pdfViewer.src = ''; // Clear iframe source
        }
    });

    // Remove button functionality
    document.getElementById('removeBtn').addEventListener('click', function() {
        document.getElementById('fileInput').value = ''; // Reset input field
        document.getElementById('fileName').textContent = 'No file selected'; // Reset file name
        document.getElementById('textareaContainer').style.display = 'block'; // Show textarea
        document.getElementById('pdfViewerContainer').style.display = 'none'; // Hide PDF viewer
        document.getElementById('pdfViewer').src = ''; // Clear iframe source
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/quill/quill.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/form-editor.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/file/electronic/create-draft.blade.php ENDPATH**/ ?>