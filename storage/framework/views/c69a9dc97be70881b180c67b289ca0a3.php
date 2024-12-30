<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.new-page-title'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">


    <style>
        .container {
            margin: 20px; /* Margin around the container */
        }

        #rowleft {
            display: flex;
            border: 1px solid #ccc !important;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5) !important;
            margin-top: 40px;
            height: 600px; /* Set a fixed height for the row */
        }

        .ele-left-div {
            width: 50%;
            padding: 0px 1px;
            position: relative;
            border-right: 1px solid #ccc;
            margin-right: 10px; /* Added margin */
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
            display: flex; /* Added to align icon and text */
            align-items: center; /* Center items vertically */
        }

        .ele-left-div button i {
            margin-right: 5px; /* Space between icon and text */
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
            overflow-y: auto; /* Allow scrolling if content exceeds height */
            height: 100%; /* Ensure it takes full height of the parent row */
        }

        .ele-right-div h3 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
        }

        .ele-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: white; /* Set the background color to white */
            padding: 10px;
            position: sticky; /* Keeps the footer visible at the bottom */
            bottom: 0;
            left: 0;
            width: 100%;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.6);
            z-index: 1000; /* Ensure the footer is above other content */
        }

        .card-footer button {
            background-color: #0056ac;
            color: #fff;
            padding: 5px 15px;
            border: none;
            border-radius: 5px;
        }

        /* Remove scrollbar from the right div */
        .ele-right-div::-webkit-scrollbar {
            display: none; /* For Chrome, Safari, and Opera */
        }
        
        .ele-right-div {
            -ms-overflow-style: none; /* For Internet Explorer and Edge */
            scrollbar-width: none; /* For Firefox */
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

<div class="containers mx-5"> <!-- Added container for margin -->

    <div class="row" id="rowleft">
        <!-- Left Div -->
        <div class="card" style="width: 50%; padding: 0px 1px; position: relative; background-color:#acdcac !important;">
            <div class="" style="display: flex; justify-content: flex-start; margin-top: 9px;">
                <button class="btn btn-success" id="greenNoteButton">
                    <i class="fa-solid fa-pencil"></i> Green Note
                </button>
                <button class="btn btn-warning" id="yellowNoteButton" style="margin-left: 20px;">
                    <i class="fa-solid fa-pencil"></i> Yellow Note
                </button>
            </div>
            
            
                     <form action="<?php echo e(route('greennoteupdate', ['id' => $id])); ?>" method="POST" id="memoForm">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="row" id="memoField" style="display:none">
        <div class="form-group col-md-12">
            <div style="display: flex; justify-content: flex-start; margin-top: 9px;">
                <button type="button" class="btn btn-primary" id="greenNoteButton">
                    Quick Noting
                </button>
                <button type="button" class="btn btn-primary" id="saveButton" style="margin-left: 8px;">
                    <i class="fa-solid fa-floppy-disk"></i> Save
                </button>
                <button type="button" class="btn btn-primary" id="discardButton" style="margin-left: 8px;">
                    <i class="fa-solid fa-xmark"></i> Discard
                </button>
            </div>

            <div id="memo-editor" contenteditable="true" style="border: 1px solid #ccc; height:400px; overflow-y: auto; padding: 10px;">
                <!-- Quill editor will be initialized here -->
            </div>
            <textarea id="memo" name="green_note" style="display:none;"></textarea>
        </div>
    </div>
</form>



        </div>

        <!-- Right Div (Form Details) -->
        <div class="card" style="width: 50%; padding: 20px; display: flex; flex-direction: column; position: relative;">
            <h3 style="font-size: 17px;">
                <span><i class="fa-solid fa-book"></i> File Details</span>
            </h3>
            
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
            
        </tbody>
    </table>
</div>


            <div class="hstack gap-2" style="display: flex; justify-content: flex-end;">
                <button class="btn btn-primary" onclick="window.location.href='<?php echo e(route('leaves.index')); ?>'">Back</button>
            </div>
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
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let quill;

    document.getElementById('greenNoteButton').addEventListener('click', function() {
        const memoField = document.getElementById('memoField');
        const greenNoteButton = document.getElementById('greenNoteButton');

        if (memoField.style.display === 'none' || memoField.style.display === '') {
            memoField.style.display = 'block'; 
            greenNoteButton.style.display = 'none';
                        yellowNoteButton.style.display = 'none';


            if (!quill) {
                quill = new Quill('#memo-editor', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{ 'font': [] }],
                            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                            ['bold', 'italic', 'underline', 'strike'],
                            [{ 'script': 'sub' }, { 'script': 'super' }],
                            [{ 'color': [] }, { 'background': [] }],
                            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                            [{ 'align': [] }],
                            ['blockquote', 'code-block'],
                            ['link', 'image', 'video'],
                            ['clean']
                        ]
                    }
                });
            }
            document.getElementById('memo-editor').focus();
        } else {
            memoField.style.display = 'none'; 
        }
    });

    document.getElementById('discardButton').addEventListener('click', function() {
        const memoField = document.getElementById('memoField');
        memoField.style.display = 'none'; 
        document.getElementById('greenNoteButton').style.display = 'block'; 
        if (quill) {
            quill.setContents([]); 
        }
    });

    document.getElementById('saveButton').addEventListener('click', function() {
        if (quill) {
            var memoContent = quill.root.innerHTML; 
            document.getElementById('memo').value = memoContent; 
            document.getElementById('memoForm').submit(); 
        }
    });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/file/electronic/green_note.blade.php ENDPATH**/ ?>