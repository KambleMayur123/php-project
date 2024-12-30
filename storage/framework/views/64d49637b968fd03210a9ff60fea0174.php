
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.new-page-title'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

    
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

        .ele-left-div button.remove {
            background-color: #d2d0d0;
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
     overflow-y: auto; /* Scrollable form content */
    /*margin-bottom: 20px;*/
    overflow-x: hidden;
    height:600px;
}

.ele-form-section {
    flex-grow: 1; /* Makes the form content take up remaining space */
    overflow-y: auto; /* Scrollable form content */
    margin-bottom: 20px;
    overflow-x: hidden;
}



        .ele-right-div h3 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
        }

        .ele-form-section {
            margin-bottom: 20px;
           
        }

        .ele-form-section h4 {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ele-form-section h4 .radio {
            display: flex;
            align-items: center;
        }

        .ele-form-section h4 .radio label {
            margin-right: 10px;
             margin-top: 10px;
        }

        .ele-form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            margin-right: 10px;
            gap:5px;
        }

        .ele-form-row .form-group {
            /*width: 42% !important;*/
            margin: 0 10px;
        }

        .ele-form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .ele-form-group input {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .ele-form-group select{
            width: 107% !important;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .ele-right-div h3{
            /*background-color: #d2d0d0;*/
            color: #000;
            font-size: 18px;
            padding: 5px;
        }
        .ele-form-section h4{
            /*background-color: #d2d0d0;*/
            /*color: #000;*/
            font-size: 18px;
            padding: 5px;
        }
        #minDeptother{
            width: 500px !important;
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

    .card-footer button{
        background-color: #0056ac;
        color: #fff;
        padding: 5px 15px;
        border: none;
        border-radius: 5px;
    }
    #fileInput {
            display: none;
        }
         .file-name {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }
       
 
.elebtn{
    /*background-color:#FFF;*/
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
      padding:5px;
display:flex;
      
}
.elesec1{
    border:1px solid #ddd;
    padding:10px;
     /*box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);*/
}
.live-preview {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.progress-container {
    display: flex;
    justify-content: space-between;
    width: 100%;
}

.progress-step-arrow {
    flex: 1; /* Allows the progress bar to take up available space */
    margin: 0 10px; /* Optional: Adds space between progress bars */
}

.progress-bar {
   margin:0 10px;
}
.progress-step-arrow {
    height: 1.78rem !important;
}
.progress-step-arrow .progress-bar:after {
    
     bottom: 5px !important; 
    
}
.progress-info .progress-bar {
   background-color: #70769b !important;
    color:#fff !important;
}
.progress-info .progress-bar:after {
    border-left-color:  #70769b  !important;
     color:#fff !important;
    
}
.progress-barr {
    display: flex;
    flex-direction: column;
    justify-content: center;
    font-size: .875rem;
    
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.file-header','data' => ['id' => $diary->id,'files' => $files]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('file-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($diary->id),'files' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($files)]); ?>
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




   
   <div classs="row" style="display:flex; 
            border: 1px solid #ccc !important;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5) !important; margin-top:20px;">
    
        <!-- Left Div -->
        <div class="card" style=" width: 50%;
            padding: 0px 1px;
            position: relative;
            border-right: 1px solid #ccc;">
            <input type="file" id="fileInput" value="" accept="application/pdf" />
            
<!-- PDF Viewer Iframe -->
            <iframe id="pdfViewer" style="width:100%; height:600px;" frameborder="0" src="<?php echo e(asset('images/' . $diary->upload_file)); ?>"></iframe>

<script>
    window.onload = function() {
        // Optionally, you can handle any additional logic on page load here
        var pdfViewer = document.getElementById('pdfViewer');
        var pdfUrl = "<?php echo e(asset('images/' . $diary->upload_file)); ?>"; 
        
        // Set the iframe src to load the PDF by default
        pdfViewer.src = pdfUrl;
    };
</script>

        </div>
     
        
        
        
        
        
        <!-- Right Div (Scrollable Form) -->
    <!-- Right Div (Scrollable View) -->
<div class="card" style="width: 50%; padding: 20px; display: flex; flex-direction: column; position: relative; overflow-y: auto; overflow-x: hidden; height: 600px;">
    <!-- Section 1: Diary Details -->
    <div class="ele-form-section">
    <div class="elesec1">
        <h3 style="font-size: 17px; background-color: #f0f0f0; padding: 10px;">
            <span><i class="fa-solid fa-book"></i> Diary Details</span>
        </h3>
        <div class="row align-items-center g-3">
            <div class="col-lg-4">
                <label class="form-label" for="diaryDateView">Diary Date</label>
                <p id="diaryDateView"><?php echo e($diary->diary_date ?? 'N/A'); ?></p>
            </div>
            <div class="col-lg-4">
                <label for="deliveryModeView" class="form-label">Forms of Communication</label>
                <p id="deliveryModeView"><?php echo e($diary->diary_forms_comm ?? 'N/A'); ?></p>
            </div>
            <div class="col-lg-4">
                <label for="languageView" class="form-label">Language</label>
                <p id="languageView"><?php echo e($diary->diary_lang ?? 'N/A'); ?></p>
            </div>
        </div>
        <div class="row align-items-center g-3">
            <div class="col-lg-4">
                <label for="receivedDateView" class="form-label">Received Date</label>
                <p id="receivedDateView"><?php echo e($diary->diary_received_date ?? 'N/A'); ?></p>
            </div>
            <div class="col-lg-4">
                <label for="letterDateView" class="form-label">Letter Date</label>
                <p id="letterDateView"><?php echo e($diary->diary_letter_date ?? 'N/A'); ?></p>
            </div>
            <div class="col-lg-4">
                <label for="letterRefNumberView" class="form-label">Letter Ref. Number</label>
                <p id="letterRefNumberView"><?php echo e($diary->diary_letter_ref_no ?? 'N/A'); ?></p>
            </div>
        </div>
        <div class="row align-items-center g-3">
            <div class="col-lg-4">
                <label for="deliveryMode2View" class="form-label">Delivery Mode</label>
                <p id="deliveryMode2View"><?php echo e($diary->diary_delivery_mode ?? 'N/A'); ?></p>
            </div>
            <div class="col-lg-4">
                <label for="modeNumberView" class="form-label">Mode Number</label>
                <p id="modeNumberView"><?php echo e($diary->diary_mode_on ?? 'N/A'); ?></p>
            </div>
            <div class="col-lg-4">
                <label for="senderTypeView" class="form-label">Sender Type</label>
                <p id="senderTypeView"><?php echo e($diary->diary_sender_type ?? 'N/A'); ?></p>
            </div>
        </div>
        <div class="row align-items-center g-3">
            <div class="col-lg-4">
                <label for="vipView" class="form-label">VIP</label>
                <p id="vipView"><?php echo e($diary->diary_vip ?? 'N/A'); ?></p>
            </div>
        </div>
    </div>
</div>
<div class="ele-form-section">
    <div class="elesec1">
        <h3 style="font-size: 17px; background-color: #f0f0f0; padding: 10px;">
            <span><i class="fa-solid fa-book"></i>Dispatch History</span>
        </h3>
        <ul class="nav nav-pills arrow-navtabs nav-success bg-light mb-3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#arrow-overview" role="tab">
                        <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                        <span class="d-none d-sm-block">Dispatch</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#arrow-profile" role="tab">
                        <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                        <span class="d-none d-sm-block">Attached/Detached</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#arrow-contact" role="tab">
                        <span class="d-block d-sm-none"><i class="mdi mdi-email"></i></span>
                        <span class="d-none d-sm-block">Closed</span>
                    </a>
                </li>
            </ul>
        <!--<table class="table align-middle table-nowrap" id="customerTable">-->
        <!--    <thead>-->
        <!--        <tr>-->
        <!--               <th>Dispatch No</th>-->
        <!--                        <th>Issue No</th>-->
        <!--                        <th>Subject</th>-->
        <!--                        <th>Dispatched On</th>-->
        <!--                        <th>Dispatched By</th>-->
        <!--                        <th>Delivery Mode</th>-->
        <!--        </tr>-->
        <!--    </thead>-->
        <!--    <tbody>-->
        <!--        <tr>-->
        <!--            <td>001</td>-->
        <!--                        <td>123</td>-->
        <!--                        <td>Subject Example</td>-->
        <!--                        <td>2024-09-11</td>-->
        <!--                        <td>John Doe</td>-->
        <!--                        <td>By Hand</td>-->
        <!--        </tr>-->
              
        <!--    </tbody>-->
        <!--</table>-->
    </div>
</div>

</div>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/file/electronic/non-sfs.blade.php ENDPATH**/ ?>