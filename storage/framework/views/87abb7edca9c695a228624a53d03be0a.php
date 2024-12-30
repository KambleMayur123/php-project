
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.new-page-title'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

    
    <style>
        /*body {*/
        /*    font-family: Arial, sans-serif;*/
        /*    margin: 0;*/
        /*    padding: 0;*/
        /*    display: flex;*/
        /*    justify-content: center;*/
        /*    align-items: flex-start;*/
        /*    height: 100vh;*/
        /*    background-color: #f4f4f4;*/
        /*}*/

        /*.row {*/
        /*    display: flex !important;*/
        /*    width: 100% !important;*/
        /*    height: 90% !important;*/
        /*    background-color: white !important;*/
        /*    border: 1px solid #ccc !important;*/
        /*    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5) !important;*/
        /*    margin-top: 30px !important;*/
        /*}*/

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

            <form  action="<?php echo e(route('sfs-physical.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

   
   <div classs="row" style="display:flex; 
            border: 1px solid #ccc !important;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5) !important; margin-top:40px;">
    
        <!-- Left Div -->
        <div class="card" style=" width: 50%;
            padding: 0px 1px;
            position: relative;
            border-right: 1px solid #ccc;">

<input type="file" id="fileInput" name="upload_file" accept="application/pdf" />
            <div class="elebtn">
            <button class="upload" id="uploadBtn" style="padding: 2px 15px;
            border: none;
            background-color: #0056ac;
            color: white;
            font-size: 14px;
            margin-right: 10px;
            cursor: pointer;
            border-radius: 3px;">
                Upload <i class="fas fa-upload"></i>
            </button>
            
            <button class="remove" id="removeBtn" style='padding: 2px 15px;
            border: none;
           
            color: white;
            font-size: 14px;
            margin-right: 10px;
            cursor: pointer;
            border-radius: 3px;'>
                Remove <i class="fa-solid fa-xmark"></i>
            </button>
            <p style="color:red;margin-bottom:0px;"> PDF ONLY <= 20MB</p>
            </div>
            <div class="file-name" id="fileName"></div>

            <!-- Container for the PDF viewer -->
            <iframe id="pdfViewer" style="width:100%; height:500px; display:none;" frameborder="0"></iframe>
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
                <span> <i class="fa-solid fa-book"></i> Diary Details</span>
                
            </h3>
            



                <div class="row align-items-center g-3">
                    <div class="col-lg-4">
                        <label class="form-label"for="diaryDate">Diary Date</label>
                        <input class="form-control" type="date" id="diaryDate" name="diary_date" /readonly>
                    </div>
                    <div class="col-lg-4">
                        <label for="deliveryMode" class="form-label">Forms of Communication</label><span style="color:red">*</span>
                        <select id="deliveryMode" class="form-select" name="diary_forms_comm" >
                             <option>Choose One</option>
                            <option value="acknowledgement">acknowledgement</option>
                            <option value="Bills">Bills</option>
                             <option value="Cabinet">Cabinet</option>
                              <option value="CCEA">CCEA</option>
                               <option value="Circular">Circular</option>
                                <option value="COS-Note">COS Note</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="deliveryMode"  class="form-label">Language</label>
                        <select id="deliveryMode" class="form-select" name="diary_lang"> 
                        <option>English</option>
                            <option>Hindi</option>
                            
                        </select>
                    </div>
                    
                </div>
                <div class="row align-items-center g-3">
                    <div class="col-lg-4">
                        <label for="diaryDate"  class="form-label">Received Date</label>
                        <input type="date" id="diaryDate"  class="form-control" name="diary_received_date">
                    </div>
                    <div class="col-lg-4">
                        <label for="diaryDate"  class="form-label">Letter Date</label>
                        <input type="date" id="diaryDate"  class="form-control" name="diary_letter_date">
                    </div>
                    <div class="col-lg-4">
                        <label for="modeNumber"  class="form-label">Letter Ref. Number</label>
                        <input type="text" id="modeNumber"  class="form-control"name="diary_letter_ref_no">
                    </div>
                    
                </div>

                <!-- Dropdowns -->
                <div class="row align-items-center g-3">
                    <div class="col-lg-4">
                        <label for="deliveryMode" class="form-label">Delivery Mode</label><span style="color:red">*</span>
                        <select id="deliveryMode" class="form-select" name="diary_delivery_mode">
                            <option value="by-hand">By Hand</option>
                            <option value="by-post">By Post</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="modeNumber" class="form-label">Mode Number</label>
                        <input type="text" id="modeNumber"  class="form-control"name="diary_mode_on">
                    </div>
                    <div class="col-lg-4">
                        <label for="senderType" class="form-label">Sender Type</label>
                        <select id="senderType" class="form-select" name="diary_sender_type">
                            <option>Choose One</option>
                            <option value="internal">Internal</option>
                            <option value="external">External</option>
                        </select>
                    </div>
                </div>
                   <!-- Dropdowns -->
                   <div class="row align-items-center g-3">
                    <div class="col-lg-4">
                        <label for="deliveryMode" class="form-label">VIP</label>
                        <select id="deliveryMode" class="form-select" name="diary_vip">
                            <option value="by-hand">By Hand</option>
                            <option value="by-post">By Post</option>
                        </select>
                    </div>
                    
                </div>
          
             </div>
            <!-- Section 2: Contact Details -->
            <div class="ele-form-section" style="margin-top:10px;">
                <div class="elesec1">
                <h4 style="font-size: 17px;">
                    <span><i class="fa-solid fa-message"></i> Contact Details</span>
                    <div class="radio">
                       
                        <input type="radio" id="radio1" name="vip" value="yes">
                        <label for="radio1" style="font-size: 15px;">Add to Address Book</label>
                    </div>
                </h4>

                <div class="row align-items-center g-3">
                    <div class="col-lg-4">
                        <label for="minDeptother" class="form-label">Min./Dept./Others</label>
                        <select id="minDeptother" class="form-select">
                            <option>Select Level</option>
                        </select>
                    </div>
                   
                </div>
                <div class="row align-items-center g-3" >
                    <div class="col-lg-4">
                        <label for="name" class="form-label">Name</label><span style="color:red">*</span>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label for="designation" class="form-label">Designation</label><span style="color:red">*</span>
                        <input type="text" id="designation"  name="designation"  class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label for="name" class="form-label">Organization</label>
                        <input type="text" id="name" name="organisation" class="form-control">
                    </div>
                </div>
               
                <div class="row align-items-center g-3">
                    <div class="col-lg-4">
                        <label for="name" class="form-label">Mobile</label>
                        <input type="text" id="name" name="mobile_no" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label for="designation" class="form-label">Email</label>
                        <input type="text" id="designation"  name="email" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label for="name" class="form-label">Address</label><span style="color:red">*</span>
                        <input type="text" id="name" name="address" class="form-control">
                    </div>
                   
                </div>
                <div class="row align-items-center g-3">
                    <div class="col-lg-4">
                    <label for="country" class="form-label">Country</label>
                    <select id="country" class="form-select" name="country">
                        <option value="">Choose Country</option>
                        <option value="india">India</option>

                    </select>
                </div>
<div class="col-lg-4">
    <label for="stateInput" class="form-label">State</label>
    <input type="text" id="stateInput" name="state" class="form-control" placeholder="" autocomplete="off">
    <ul id="stateSuggestions" class="list-group" style="display:none; position:absolute; z-index:1000;"></ul>
</div>

                    <div class="col-lg-4">
                        <label for="designation" class="form-label">City</label>
                        <input type="text" id="designation" class="form-control" name="city">
                    </div>
                    
                   
                </div>
                <div class="row align-items-center g-3">
                    <div class="col-lg-4">
                        <label for="name" class="form-label">Pin code</label>
                        <input type="text" id="name"  name="pincode" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label for="designation" class="form-label">Landline</label>
                        <input type="text" id="designation" name="landline" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label for="name" class="form-label">fax</label>
                        <input type="text" id="name" name="fax"  class="form-control">
                    </div>
                   
                </div>
              </div>
            </div>
            <div class="ele-form-section">
                <div class="elesec1">
                <h4 style="font-size: 17px;">
                    <span><i class="fa-solid fa-list"></i> Category & Subject</span>
    
                </h4>

                <div class="row align-items-center g-3">
                    <div class="col-lg-6">
                        <label for="minDep" class="form-label">Main Category</label><span style="color:red">*</span>
                        <select id="minDep" class="form-select" name="main_category">
                            <option value="general">General</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="minDep" class="form-label" >Sub Category</label>
                        <select id="minDep" class="form-select" name="sub_category">
                            <option value="one">Choose One</option>
                        </select>
                    </div>

                </div>
                                <div class="row align-items-center g-3" >

                
                                    <div class="col-lg-12">
                        <label for="name" aria-required="true" class="form-label">Subject</label><span style="color:red">*</span>
                        <input type="textarea" id="name" name="subject" class="form-control">
                    </div>
                    
                    </div>
                <div class="row align-items-center" >
                    <div class="col-lg-12">
                        <label for="minDeptother" class="form-label">Encloser/Remark</label>
                        <input type="text" class="form-control"name="remark">
                    </div>
                  
                </div>
               
               
            </div>
                    </div>



            <!-- More sections as needed -->

 
        <div class="card-footer" style="   display: flex;
    align-items: center;
    justify-content: space-between;
   
    padding: 10px;
    position: sticky; /* Keeps the footer visible at the bottom */
    bottom: 0;
    left: 2px;
    width: 100%;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.6);
    z-index: 1000; /* Ensure the footer is above other content ">
            <div class="ele-radiobtn">
                
                <input type="radio" id="radio1" name="vip" value="yes">
                <label for="radio1">Personalize Acknowledgement</label>
            </div>
            <div class="btn1">
                <a href =""><button type="submit">Generate</button></a>
            </div>
            <div class="btn2">
                <a href ="<?php echo e(url('non-sfs-electronic')); ?>"><button>Generate & Send</button></a>
            </div>
           
        </div>
    </div>
</div>
</div>
</form>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

<script>
        // Get the current date
        const today = new Date();
        
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0'); 
        const dd = String(today.getDate()).padStart(2, '0');

        const formattedDate = `${yyyy}-${mm}-${dd}`;
        
        document.getElementById('diaryDate').value = formattedDate;
    </script>
    <script>
    /// When the user selects a file, show the file name and preview (if it's a PDF)
document.getElementById('fileInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    
    if (file) {
        const fileName = document.getElementById('fileName');
        fileName.textContent = file.name;
        
        // Check if the file is a PDF and display it
        if (file.type === 'application/pdf') {
            const pdfViewer = document.getElementById('pdfViewer');
            pdfViewer.src = URL.createObjectURL(file);
            pdfViewer.style.display = 'block';
        } else {
            const pdfViewer = document.getElementById('pdfViewer');
            pdfViewer.style.display = 'none'; // Hide PDF preview if not a PDF
        }
    }
});

// When the user clicks the upload button
document.getElementById('uploadBtn').addEventListener('click', function(e) {
    const fileInput = document.getElementById('fileInput');
    
    // Check if a file is selected
    if (fileInput.files.length === 0) {
        e.preventDefault(); // Prevent form submission

        // Trigger the file input click to open file picker
        fileInput.click();
    } else {
        // Proceed with the upload if a file is selected
        alert('File is ready to be uploaded!');
    }
});

// When the user clicks the remove button, reset the file input and hide the preview
document.getElementById('removeBtn').addEventListener('click', function(e) {
    e.preventDefault(); // Prevent default button behavior

    // Clear file input
    const fileInput = document.getElementById('fileInput');
    fileInput.value = ''; 
    
    // Clear file name display
    document.getElementById('fileName').textContent = ''; 
    
    // Hide PDF preview
    const pdfViewer = document.getElementById('pdfViewer');
    pdfViewer.style.display = 'none';
});

</script>



<script>
     
     const states = [
    "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chhattisgarh", 
    "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jharkhand", 
    "Karnataka", "Kerala", "Madhya Pradesh", "Maharashtra", "Manipur", 
    "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Punjab", 
    "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana", "Tripura", 
    "Uttar Pradesh", "Uttarakhand", "West Bengal"
];

document.getElementById('stateInput').addEventListener('input', function() {
    const input = this.value.toLowerCase();
    const suggestions = states.filter(state => state.toLowerCase().includes(input));
    const suggestionsList = document.getElementById('stateSuggestions');

    // Clear previous suggestions
    suggestionsList.innerHTML = '';

    if (input.length === 0 || suggestions.length === 0) {
        suggestionsList.style.display = 'none';
        return;
    }

    // Display the filtered states
    suggestions.forEach(state => {
        const li = document.createElement('li');
        li.textContent = state;
        li.classList.add('list-group-item');
        li.addEventListener('click', function() {
            document.getElementById('stateInput').value = state;
            suggestionsList.style.display = 'none';
        });
        suggestionsList.appendChild(li);
    });

    suggestionsList.style.display = 'block';
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/file/physical-file/sfs.blade.php ENDPATH**/ ?>