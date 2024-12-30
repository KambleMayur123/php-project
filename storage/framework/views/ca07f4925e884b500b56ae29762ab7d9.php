
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.new-page-title'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
 <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUa6NITdRTvSnHLFdBJ0pkzkr5h7QPH0XHd8lzKHuau9gAhn7bHUs59dNQSJ" crossorigin="anonymous">


    <style>
  /* Flexbox for row arrangement */
    .nonsfs-row {
        display: flex;
        gap: 20px; /* Space between columns */
    }

    /* Flexbox column styling */
    .nonsfs-col {
        flex: 1; /* Equal width for both columns */
    }

    /* Optional: Adjust width for form inputs */
    .nonsfs-file-no-section input,
    .nonsfs-file-no-section select {
        width: 100%; /* Full width of the container */
        margin-bottom: 10px;
    }

.nonsfs-container {
    width: 700px !important;
    margin: 50px auto;
    padding: 20px;
    /*background-color: #9D4E81;*/
    border: 2px solid black;
   
}

.nonsfs-header {
    text-align: center;
    margin-bottom: 20px;
    color: #000;
}

.nonsfs-header h3, .nonsfs-header h4, .nonsfs-header p {
    margin: 5px 0;
    color:#000;
    font-weight:500;
}

.nonsfs-file-no-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}


.nonsfs-required {
    color: red;
}

nonsfs-fieldset {
    border: 2px solid black;
    margin-bottom: 20px;
    padding: 10px;
    color: white;
}

.nonsfs-legend {
    background-color: #0099ff;
    padding: 5px 10px;
    color: white;
    border: 2px solid black;
    margin: 0 auto !important;
    float:center:
    
}

.nonsfs-label {
    display: block;
    margin-bottom: 5px;
    color: white;
}

input[type="text"], textarea, select {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
    border: 1px solid black;
    border-radius: 2px;
}

textarea {
    height: 60px;
    resize: none;
}

.nonsfs-buttons {
   display: flex;
    justify-content: center; /* Centers the button horizontally */
    margin-top: 20px;
}

.nonsfs-button {
    background-color: #0099ff;
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 5px;
    display: flex;
    align-items: center;
}

.nonsfs-button i {
    margin-right: 5px;
}

.nonsfs-button:hover {
    background-color: #0099ff;
}
legend {
   
    width: 100%;
    padding: 0;
    margin-bottom: .5rem;
    font-size:15px !important;
    line-height: inherit;
    text-align:center !important;
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

   <div class="nonsfs-container">
     
  <form method="POST" action="<?php echo e(route('storefile')); ?>">
    <?php echo csrf_field(); ?>
    <!-- New div for Nature and Type with flexbox layout -->
    <div style="background-color: #0099ff; padding: 10px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
        <!-- Nature section (aligned to the left) -->
        <div>
            <label for="nature"><b>Nature: </b></label>
            <input type="radio" id="electronic" name="nature" value="electronic" checked>
            <label for="electronic">Electronic</label>
        </div>

        <!-- Type section (aligned to the right) -->
        <div>
            <label for="type"><b>Type: </b></label>
            <input type="radio" id="nonSFS" name="type" value="nonSFS" checked>
            <label for="nonSFS">Non SFS</label>

           
        </div>
<input type="hidden" name="diary_id" value="<?php echo e($id); ?>">
    </div>
    
    <div class="nonsfs-file-no-section">
        <label>File No.: <span class="nonsfs-required">*</span></label>
        <select name="fileno_1">
    <option value="">Choose</option> <!-- Placeholder option -->
    <option value="CAOPTH-CAOPTH">CAOPTH-CAOPTH</option>
   
</select>

<select name="fileno_2">
    <option value="">Choose</option> <!-- Placeholder option -->
    <option value="establishment">Establishment</option>
    <option value="account">Account</option>
    <option value="misc">Misc</option>
    <option value="file">File</option>
    <option value="technical">Technical</option>
    <option value="RTI">RTI</option>
</select>
        <select name="fileno_3">
    <option value="">Choose</option> 
    <option value="E-office">E-office</option>
   
</select>

         <select name="fileno_4">
    <option value="Choose-one">Choose one</option> 

</select>

<input type="text" name="fileno_5" value="<?php echo e(\Carbon\Carbon::now()->year); ?>">
        <select name="fileno_6">
            <option >CAOPTH</option>
        </select>
    </div>

    <fieldset class="nonsfs-fieldset">
        <legend class="nonsfs-legend">Subject</legend>
        <label>Description <span class="nonsfs-required">*</span></label>
        <textarea name="description"></textarea>

        <!-- Flexbox row for Category and Subcategory -->
        <div class="nonsfs-row">
            <div class="nonsfs-col">
                <label >Category</label>
                <input type="text" name="main_category" placeholder="Main Choose One">
            </div>
            <div class="nonsfs-col">
                <label >Subcategory</label>
                <input type="text" name="sub_category" placeholder="Sub Choose One">
            </div>
        </div>
    </fieldset>

    <fieldset class="nonsfs-fieldset">
        <legend class="nonsfs-legend">Other Details</legend>
        <label >Classified</label>
        <select name="classified">
            <option>Choose One</option>
        </select>

        <label >Remarks</label>
        <textarea name="remarks"></textarea>

        <!-- Flexbox row for Previous Reference and Later Reference -->
        <div class="nonsfs-row">
            <div class="nonsfs-col">
                <label >Previous Reference</label>
                <input type="text" name="previous_ref">
            </div>
            <div class="nonsfs-col">
                <label >Later Reference</label>
                <input type="text" name="later_ref">
            </div>
        </div>
    </fieldset>

   <div class="nonsfs-buttons">
<button type="button" class="nonsfs-button" id="createFileButton" data-bs-toggle="modal" data-bs-target="#confirmationModal">
    <i class="fas fa-file"></i> Create File To Put In
</button>

</div>
 
<!-- First Modal: Confirmation -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>File number will be generated (Number generated will be final and cannot be edited). Do you wish to proceed?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="proceedButton" data-bs-toggle="modal" data-bs-target="#remarksModal">Proceed</button>
            </div>
        </div>
    </div>
</div>

<!-- Second Modal: Remarks -->
<div class="modal fade" id="remarksModal" tabindex="-1" role="dialog" aria-labelledby="remarksModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="remarksModalLabel">Put in Remarks</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea class="form-control" id="remarksTextarea" rows="4" placeholder="Enter your remarks here..."></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="okButton">OK</button>
            </div>
        </div>
    </div>
</div>

</form>

.

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRjWEJ9xg6dvORIMXttIEY9j18sm2FxZz8jc4mTfC" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoDILhtPGqLk61lF0JpCecykfjs5Z1m0I5CMggxcL96YFyc" crossorigin="anonymous"></script>

    <!-- listjs init -->
    <script src="<?php echo e(URL::asset('build/js/pages/listjs.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/sweetalerts.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

<script>
   
   
        document.getElementById('uploadBtn').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });

        document.getElementById('fileInput').addEventListener('change', function() {
            const fileInput = document.getElementById('fileInput');
            const fileNameDisplay = document.getElementById('fileName');
            if (fileInput.files.length > 0) {
                fileNameDisplay.textContent = fileInput.files[0].name;
            } else {
                fileNameDisplay.textContent = 'No file selected';
            }
        });


</script>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

<script>
    document.getElementById('fileInput').addEventListener('change', handleFileSelect);

function handleFileSelect(event) {
    const file = event.target.files[0];
    const fileName = document.getElementById('fileName');
    const pdfViewer = document.getElementById('pdfViewer');
    const removeBtn = document.getElementById('removeBtn');

    if (file) {
        fileName.textContent = file.name;
        pdfViewer.style.display = 'block'; // Show the iframe

        // Create a URL for the selected file and set it as the iframe source
        const fileURL = URL.createObjectURL(file);
        pdfViewer.src = fileURL;
    } else {
        fileName.textContent = 'No file selected';
        pdfViewer.style.display = 'none'; // Hide the iframe
        pdfViewer.src = ''; // Clear iframe source
    }
}

// Remove button functionality
document.getElementById('removeBtn').addEventListener('click', function() {
    document.getElementById('fileInput').value = ''; // Reset input field
    document.getElementById('fileName').textContent = 'No file selected'; // Reset file name
    document.getElementById('pdfViewer').style.display = 'none'; // Hide iframe
    document.getElementById('pdfViewer').src = ''; // Clear iframe source
});

</script>

<script>
$(document).ready(function() {
    // Open confirmation modal on create file button click
    $('#createFileButton').on('click', function() {
        $('#confirmationModal').modal('show');
    });

    // Handle proceed button click
    $('#proceedButton').on('click', function() {
        $('#confirmationModal').modal('hide'); // Close the confirmation modal
        $('#remarksModal').modal('show'); // Open the remarks modal
    });

    // Handle OK button click in remarks modal
    $('#okButton').on('click', function() {
        const remarks = $('#remarksTextarea').val();
        // Perform any actions with the remarks, e.g., save to the database
        console.log('Remarks submitted:', remarks);
        $('#remarksModal').modal('hide'); // Close the remarks modal
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/file/electronic/create-file.blade.php ENDPATH**/ ?>