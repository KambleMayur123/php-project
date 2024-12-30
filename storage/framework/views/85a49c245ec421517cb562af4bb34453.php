
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

        .ele-container {
            display: flex;
            width: 100%;
            height: 90%;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
            margin-top: 30px;
        }

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
        

/*.ele-right-div {*/
/*    width: 50%;*/
/*    padding: 20px;*/
/*    display: flex;*/
/*    flex-direction: column;*/
/*    position: relative;*/
/*     overflow-y: auto; */
/*    overflow-x: hidden;*/
/*    height:600px;*/
/*}*/

/*.ele-form-section {*/
/*    flex-grow: 1;*/
/*    overflow-y: auto; */
/*    margin-bottom: 20px;*/
/*    overflow-x: hidden;*/
/*}*/

/*.ele-footer {*/
/*    display: flex;*/
/*    align-items: center;*/
/*    justify-content: space-between;*/
/*    background-color: #d2d0d0;*/
/*    padding: 10px;*/
/*    position: sticky; */
/*    bottom: 0;*/
/*    left: 0;*/
/*    width: 100%;*/
/*}*/

/*        .ele-right-div h3 {*/
/*            display: flex;*/
/*            justify-content: space-between;*/
/*            align-items: center;*/
/*            font-size: 18px;*/
/*        }*/

/*        .ele-form-section {*/
/*            margin-bottom: 20px;*/
           
/*        }*/

/*        .ele-form-section h4 {*/
/*            margin-bottom: 10px;*/
/*            display: flex;*/
/*            justify-content: space-between;*/
/*            align-items: center;*/
/*        }*/

/*        .ele-form-section h4 .radio {*/
/*            display: flex;*/
/*            align-items: center;*/
/*        }*/

/*        .ele-form-section h4 .radio label {*/
/*            margin-right: 10px;*/
/*        }*/

/*        .ele-form-row {*/
/*            display: flex;*/
/*            justify-content: space-between;*/
/*            margin-bottom: 15px;*/
/*            margin-right: 10px;*/
/*            gap:5px;*/
/*        }*/

/*        .ele-form-row .form-group {*/
        
/*            margin: 0 10px;*/
/*        }*/

/*        .ele-form-group label {*/
/*            display: block;*/
/*            margin-bottom: 5px;*/
/*            font-size: 14px;*/
/*        }*/

/*        .ele-form-group input {*/
/*            width: 100%;*/
/*            padding: 8px;*/
/*            font-size: 14px;*/
/*            border: 1px solid #ccc;*/
/*            border-radius: 3px;*/
/*        }*/
/*        .ele-form-group select{*/
/*            width: 107% !important;*/
/*            padding: 8px;*/
/*            font-size: 14px;*/
/*            border: 1px solid #ccc;*/
/*            border-radius: 3px;*/
/*        }*/
/*        .ele-right-div h3{*/
/*            background-color: #d2d0d0;*/
/*            color: #000;*/
/*            font-size: 18px;*/
/*            padding: 5px;*/
/*        }*/
/*        .ele-form-section h4{*/
/*            background-color: #d2d0d0;*/
/*            color: #000;*/
/*            font-size: 18px;*/
/*            padding: 5px;*/
/*        }*/
/*        #minDeptother{*/
/*            width: 500px !important;*/
/*        }*/
/*    .ele-footer{*/
/*        display: flex;*/
/*        align-items: center;*/
/*        justify-content: space-between;*/
/*        background-color: #d2d0d0;*/
/*        padding: 10px;*/
        
/*    }*/
/*    .ele-footer button{*/
/*        background-color: #0056ac;*/
/*        color: #fff;*/
/*        padding: 5px 15px;*/
/*        border: none;*/
/*        border-radius: 5px;*/
/*    }*/
/*    #fileInput {*/
/*            display: none;*/
/*        }*/
/*         .file-name {*/
/*            margin-top: 10px;*/
/*            font-size: 14px;*/
/*            color: #555;*/
/*        }*/
       
 
/*.elebtn{*/
/*    background-color:#FFF;*/
/*      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);*/
/*      padding:5px;*/
/*display:flex;*/
      
/*}*/
/*.elesec1{*/
/*    border:1px solid #ddd;*/
/*    padding:10px;*/
   
/*}*/

.ele-right-div {
    width: 50%;
    padding: 20px;
    display: flex;
    flex-direction: column;
    position: relative;
    overflow-y: auto;
    overflow-x: hidden;
    height: 600px;
    background-color: #fff; /* White background */
    border-radius: 8px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
}

.ele-form-section {
    flex-grow: 1;
    overflow-y: auto;
    margin-bottom: 20px;
    overflow-x: hidden;
}

/*.ele-footer {*/
/*    display: flex;*/
/*    align-items: center;*/
/*    justify-content: space-between;*/
    /*background-color:#333; */
/*    padding: 15px;*/
/*    position: sticky;*/
/*    bottom: 0;*/
/*    left: 0;*/
/*    width: 100%;*/
/*    color: #fff;*/
/*    box-shadow: 0px -2px 10px rgba(0, 0, 0, 0.1);*/
/*    border-top-left-radius: 10px;*/
/*    border-top-right-radius: 10px;*/
/*    font-weight: bold;*/
/*}*/
.ele-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #f9f9f9;
    border-top: 1px solid #ddd;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.ele-radiobtn {
    display: flex;
    align-items: center;
    font-size: 16px;
}

.ele-radiobtn input[type="radio"] {
    margin-right: 10px;
}

.ele-radiobtn label {
    margin: 0;
    color: #333;
}

.btn-group {
    display: flex;
    gap: 10px;
}

.btn {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

.btn-generate {
 background-color: #007bff;
    color: white;
}

/*.btn-generate:hover {*/
/*    background-color: #0056b3;*/
/*}*/

.btn-generate-send {
   background-color: #007bff;
    color: white;
}

/*.btn-generate-send:hover {*/
/*    background-color: #218838;*/
/*}*/

.btn-generate:last-child {
    background-color: #007bff;
    color: white;
}

/*.btn-generate:last-child:hover {*/
/*    background-color: #5a6268;*/
/*}*/

.ele-right-div h3, .ele-form-section h4 {
    background-color: #d2d0d0;
    color: #000;
    font-size: 18px;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
    box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
}

.ele-form-section h4 .radio {
    display: flex;
    align-items: center;
}

.ele-form-section h4 .radio label {
    margin-right: 10px;
}

.ele-form-row {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
    align-items: flex-start; /* Ensure vertical alignment */
}

.ele-form-row .form-group {
    flex: 1;
}

.ele-form-group label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
}

.ele-form-group input, .ele-form-group select {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
}

.ele-footer button {
 background-color: #007bff;
    color: white;
        padding: 5px 15px;
        border: none;
        border-radius: 5px;
}

/*.ele-footer button:hover {*/
    background-color: #ff8c33; /* Button hover effect */
/*}*/

#fileInput {
    display: none;
}

.file-name {
    margin-top: 10px;
    font-size: 14px;
    color: #555;
}

.elebtn {
    background-color: #fff;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
    cursor: pointer;
    transition: box-shadow 0.3s;
}

.elebtn:hover {
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
}

.elesec1 {
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 8px;
    background-color: #f5f5f5;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
}


/**/
 .form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .ele-form-group {
        margin-bottom: 15px;
    }

    .ele-form-row {
        margin-bottom: 20px;
    }

    .section-divider {
        margin-top: 30px;
        margin-bottom: 20px;
        border-bottom: 1px solid #ddd;
    }

    .dropdown-icon {
        position: relative;
    }

    .dropdown-icon select {
        padding-right: 30px;
    }

    .dropdown-icon i {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
    }

    .card {
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 20px;
    }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   
   <div class="card">
               
                <div class="card-body">
                 

                    <div class="live-preview">
                        <div class="progress progress-step-arrow progress-info">
                            <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="0">Receipt</div>
                            <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="30"
                                aria-valuemin="0" aria-valuemax="100"> Step 2</div>
                            <div class="progress-bar bg-light text-body" role="progressbar" style="width: 10%"
                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> Step 3</div>
                        </div>
                    </div>

                    <div class="d-none code-view">
                        <pre class="language-markup">
<code>&lt;div class=&quot;progress progress-step-arrow progress-info&quot;&gt;
&lt;a href=&quot;javascript:void(0);&quot; class=&quot;progress-bar&quot; role=&quot;progressbar&quot; style=&quot;width: 100%&quot; aria-valuenow=&quot;100&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt;Step 1&lt;/a&gt;
&lt;a href=&quot;javascript:void(0);&quot; class=&quot;progress-bar&quot; role=&quot;progressbar&quot; style=&quot;width: 100%&quot; aria-valuenow=&quot;30&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt; Step 2&lt;/a&gt;
&lt;a href=&quot;javascript:void(0);&quot; class=&quot;progress-bar bg-light text-body&quot; role=&quot;progressbar&quot; style=&quot;width: 100%&quot; aria-valuenow=&quot;20&quot; aria-valuemin=&quot;0&quot; aria-valuemax=&quot;100&quot;&gt; Step 3&lt;/a&gt;
&lt;/div&gt;;</code></pre>
                    </div>
                </div><!-- end card-body -->
            </div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="live-preview">
                    <form action="javascript:void(0);">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="fileInput" class="form-label">Upload Document</label>
                                    <input type="file" id="fileInput" accept="application/pdf" class="form-control mb-2" />
                                    
                                    <!-- Align buttons and file size message in the same row -->
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-primary me-2" id="uploadBtn">
                                                Upload <i class="fas fa-upload"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" id="removeBtn">
                                                Remove <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </div>
                                        <p id="fileSize" class="mb-0" style="color:red;">10kb file</p>
                                    </div>

                                    <div id="fileName" class="mt-2">No file selected</div>
                                    <div class="ele-watermark">Electronic</div>
                                    
                                    <!-- Container for the PDF viewer -->
                                    <iframe id="pdfViewer" style="width:100%; height:500px; display:none;" frameborder="0"></iframe>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col-md-6 -->
    <!---->
<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="live-preview">
                <!-- Scrollable form container -->
                <form action="javascript:void(0);" style="max-height: 600px; overflow-y: auto; padding: 15px; border: 1px solid #ddd; width: 100%; margin: 0 auto;">
                    
                    <!-- Diary Details Section -->
                    <h3 style="font-size: 1.8rem; font-weight: bold; margin-bottom: 20px;">
                        <i class="fa-solid fa-book" style="margin-right: 10px;"></i> Diary Details
                    </h3>

                    <!-- Fields (Diary Details) -->
                    <div class="ele-form-row" style="display: flex; justify-content: space-between; gap: 10px;">
                        <div class="ele-form-group" style="flex: 1;">
                            <label for="diaryDate">Diary Date</label>
                            <input type="date" id="diaryDate" class="form-control">
                        </div>
                        <div class="ele-form-group" style="flex: 1;">
                            <label for="communicationMode">Forms of Communication</label>
                            <div class="dropdown-icon">
                                <select id="communicationMode" class="form-control">
                                    <option>Letter</option>
                                    <option>Post</option>
                                </select>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="ele-form-group" style="flex: 1;">
                            <label for="language">Language</label>
                            <div class="dropdown-icon">
                                <select id="language" class="form-control">
                                    <option>Hindi</option>
                                    <option>English</option>
                                </select>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Diary Details Fields -->
                    <div class="ele-form-row" style="display: flex; justify-content: space-between; gap: 10px; margin-top: 15px;">
                        <div class="ele-form-group" style="flex: 1;">
                            <label for="receivedDate">Received Date</label>
                            <input type="date" id="receivedDate" class="form-control">
                        </div>
                        <div class="ele-form-group" style="flex: 1;">
                            <label for="letterDate">Letter Date</label>
                            <input type="date" id="letterDate" class="form-control">
                        </div>
                        <div class="ele-form-group" style="flex: 1;">
                            <label for="letterRefNumber">Letter Ref. Number</label>
                            <input type="text" id="letterRefNumber" class="form-control">
                        </div>
                    </div>

                    <div class="ele-form-row" style="display: flex; justify-content: space-between; gap: 10px; margin-top: 15px;">
                        <div class="ele-form-group" style="flex: 1;">
                            <label for="deliveryMode">Delivery Mode</label>
                            <div class="dropdown-icon">
                                <select id="deliveryMode" class="form-control">
                                    <option>By Hand</option>
                                    <option>By Post</option>
                                </select>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="ele-form-group" style="flex: 1;">
                            <label for="modeNumber">Mode Number</label>
                            <input type="text" id="modeNumber" class="form-control">
                        </div>
                        <div class="ele-form-group" style="flex: 1;">
                            <label for="senderType">Sender Type</label>
                            <div class="dropdown-icon">
                                <select id="senderType" class="form-control">
                                    <option>Choose One</option>
                                    <option>Internal</option>
                                    <option>External</option>
                                </select>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>

                    <div class="ele-form-row" style="display: flex; justify-content: space-between; gap: 10px; margin-top: 15px;">
                        <div class="ele-form-group" style="flex: 1;">
                            <label for="vip">VIP</label>
                            <div class="dropdown-icon">
                                <select id="vip" class="form-control">
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Details Section -->
<!-- Contact Details Section -->
<div class="section-divider" style="margin-top: 30px; margin-bottom: 20px; border-bottom: 1px solid #ddd;"></div>

<h4 style="font-size: 1.5rem; font-weight: bold; margin-top: 20px; margin-bottom: 10px; display: flex; align-items: center;">
    <i class="fa-solid fa-address-book" style="margin-right: 10px;"></i> Contact Details
</h4>

<!-- Contact Details Form -->
<div style="margin-top: 10px;">
    <div style="margin-bottom: 10px; display: flex; align-items: center;">
        <span><i class="fa-solid fa-message"></i> Contact Details</span>
        <div class="radio" style="margin-left: 20px;">
            <input type="radio" id="radio1" name="vip" value="yes">
            <label for="radio1" style="font-size: 15px;">Add to Address Book</label>
        </div>
    </div>

    <!-- Dropdown Section -->
    <div class="ele-form-row" style="display: flex; justify-content: space-between; gap: 10px;">
        <div class="ele-form-group" style="flex: 1;">
            <label for="minDeptother">Min./Dept./Others</label>
            <select id="minDeptother" class="form-control">
                <option>Select Level</option>
            </select>
        </div>
    </div>

    <!-- Personal Details -->
    <div class="ele-form-row" style="display: flex; justify-content: space-between; gap: 10px;">
        <div class="ele-form-group" style="flex: 1;">
            <label for="name">Name</label>
            <input type="text" id="name" class="form-control">
        </div>
        <div class="ele-form-group" style="flex: 1;">
            <label for="designation">Designation</label>
            <input type="text" id="designation" class="form-control">
        </div>
        <div class="ele-form-group" style="flex: 1;">
            <label for="organization">Organization</label>
            <input type="text" id="organization" class="form-control">
        </div>
    </div>

    <!-- Contact Information -->
    <div class="ele-form-row" style="display: flex; justify-content: space-between; gap: 10px;">
        <div class="ele-form-group" style="flex: 1;">
            <label for="mobile">Mobile</label>
            <input type="text" id="mobile" class="form-control">
        </div>
        <div class="ele-form-group" style="flex: 1;">
            <label for="email">Email</label>
            <input type="text" id="email" class="form-control">
        </div>
        <div class="ele-form-group" style="flex: 1;">
            <label for="address">Address</label>
            <input type="text" id="address" class="form-control">
        </div>
    </div>

    <!-- Address Details -->
    <div class="ele-form-row" style="display: flex; justify-content: space-between; gap: 10px;">
        <div class="ele-form-group" style="flex: 1;">
            <label for="country">Country</label>
            <select id="country" class="form-control">
                <option value="">Choose Country</option>
                <option value="usa">United States</option>
                <option value="canada">Canada</option>
                <option value="uk">United Kingdom</option>
            </select>
        </div>
        <div class="ele-form-group" style="flex: 1;">
            <label for="state">State</label>
            <select id="state" class="form-control">
                <option value="">Choose State</option>
                <option value="alabama">Alabama</option>
                <option value="california">California</option>
                <option value="texas">Texas</option>
            </select>
        </div>
        <div class="ele-form-group" style="flex: 1;">
            <label for="city">City</label>
            <input type="text" id="city" class="form-control">
        </div>
    </div>

    <!-- Additional Details -->
    <div class="ele-form-row" style="display: flex; justify-content: space-between; gap: 10px;">
        <div class="ele-form-group" style="flex: 1;">
            <label for="pincode">Pin code</label>
            <input type="text" id="pincode" class="form-control">
        </div>
        <div class="ele-form-group" style="flex: 1;">
            <label for="landline">Landline</label>
            <input type="text" id="landline" class="form-control">
        </div>
        <div class="ele-form-group" style="flex: 1;">
            <label for="fax">Fax</label>
            <input type="text" id="fax" class="form-control">
        </div>
    </div>
</div>

                    <!-- Contact Details Section -->
                    <!--<div class="section-divider" style="margin-top: 30px; margin-bottom: 20px; border-bottom: 1px solid #ddd;"></div>-->
                    
                    <!--<h4 style="font-size: 1.5rem; font-weight: bold; margin-top: 20px; margin-bottom: 10px; display: flex; align-items: center;">-->
                    <!--    <i class="fa-solid fa-address-book" style="margin-right: 10px;"></i> Contact Details-->
                    <!--</h4>-->
                    <!--<div class="ele-form-row" style="display: flex; justify-content: space-between; gap: 10px;">-->
                    <!--    <div class="ele-form-group" style="flex: 1;">-->
                    <!--        <label for="country">Country</label>-->
                    <!--        <div class="dropdown-icon">-->
                    <!--            <select id="country" class="form-control">-->
                    <!--                <option value="">Choose Country</option>-->
                    <!--                <option value="usa">United States</option>-->
                    <!--                <option value="canada">Canada</option>-->
                    <!--                <option value="uk">United Kingdom</option>-->
                    <!--            </select>-->
                    <!--            <i class="fa fa-chevron-down"></i>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="ele-form-group" style="flex: 1;">-->
                    <!--        <label for="state">State</label>-->
                    <!--        <div class="dropdown-icon">-->
                    <!--            <select id="state" class="form-control">-->
                    <!--                <option value="">Choose State</option>-->
                    <!--                <option value="alabama">Alabama</option>-->
                    <!--                <option value="california">California</option>-->
                    <!--                <option value="texas">Texas</option>-->
                    <!--            </select>-->
                    <!--            <i class="fa fa-chevron-down"></i>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="ele-form-group" style="flex: 1;">-->
                    <!--        <label for="city">City</label>-->
                    <!--        <input type="text" id="city" class="form-control">-->
                    <!--    </div>-->
                    <!--</div>-->

                    <!-- Category & Subject Section -->
            <!--        <div class="section-divider" style="margin-top: 30px; margin-bottom: 20px; border-bottom: 1px solid #ddd;"></div>-->

            <!--        <h4 style="font-size: 1.5rem; font-weight: bold; margin-top: 20px; margin-bottom: 10px; display: flex; align-items: center;">-->
            <!--            <i class="fa-solid fa-tags" style="margin-right: 10px;"></i> Category & Subject-->
            <!--        </h4>-->
            <!--        <div class="ele-form-row" style="display: flex; justify-content: space-between; gap: 10px;">-->
            <!--            <div class="ele-form-group" style="flex: 1;">-->
            <!--                <label for="mainCategory">Main Category</label>-->
            <!--                <div class="dropdown-icon">-->
            <!--                    <select id="mainCategory" class="form-control">-->
            <!--                        <option>Select Level</option>-->
            <!--                    </select>-->
            <!--                    <i class="fa fa-chevron-down"></i>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="ele-form-group" style="flex: 1;">-->
            <!--                <label for="subCategory">Sub Category</label>-->
            <!--                <div class="dropdown-icon">-->
            <!--                    <select id="subCategory" class="form-control">-->
            <!--                        <option>Choose One</option>-->
            <!--                    </select>-->
            <!--                    <i class="fa fa-chevron-down"></i>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="ele-form-group" style="flex: 1;">-->
            <!--                <label for="subject">Subject</label>-->
            <!--                <input type="text" id="subject" class="form-control">-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </form>-->
            <!--</div>-->
            <!-- Category & Subject Section -->
<div class="section-divider" style="margin-top: 30px; margin-bottom: 20px; border-bottom: 1px solid #ddd;"></div>

<h4 style="font-size: 1.5rem; font-weight: bold; margin-top: 20px; margin-bottom: 10px; display: flex; align-items: center;">
    <i class="fa-solid fa-tags" style="margin-right: 10px;"></i> Category & Subject
</h4>

<!-- Category & Subject Form -->
<div style="margin-top: 10px;">
    <div class="ele-form-row" style="display: flex; justify-content: space-between; gap: 10px;">
        <div class="ele-form-group" style="flex: 1;">
            <label for="mainCategory">Main Category</label>
            <div class="dropdown-icon">
                <select id="mainCategory" class="form-control">
                    <option>Select Level</option>
                </select>
                <i class="fa fa-chevron-down"></i>
            </div>
        </div>
        <div class="ele-form-group" style="flex: 1;">
            <label for="subCategory">Sub Category</label>
            <div class="dropdown-icon">
                <select id="subCategory" class="form-control">
                    <option>Choose One</option>
                </select>
                <i class="fa fa-chevron-down"></i>
            </div>
        </div>
        <div class="ele-form-group" style="flex: 1;">
            <label for="subject">Subject</label>
            <input type="text" id="subject" class="form-control">
        </div>
    </div>

    <div class="ele-form-row" style="margin-top: 20px;">
        <div class="ele-form-group" style="flex: 1;">
            <label for="minDeptother">Enclosure/Remark</label>
            <input type="text" id="minDeptother" class="form-control">
        </div>
    </div>
</div>

        </div>
    </div>
<!--  <div class="ele-footer">-->
<!--    <div class="ele-radiobtn">-->
<!--        <input type="radio" id="radio1" name="vip" value="yes">-->
<!--        <label for="radio1">Personalize Acknowledgement</label>-->
<!--    </div>-->
<!--    <div class="btn-group">-->
<!--        <button class="btn btn-generate">Generate</button>-->
<!--        <button class="btn btn-generate-send">Generate & Send</button>-->
<!--        <button class="btn btn-generate">Generate</button>-->
<!--    </div>-->
<!--</div>-->

</div>

<div class="row">
        <div class="col-lg-12">
            <div class="card">
                

                <div class="card-body">
                    
                  --  <div class="ele-footer">-->

                   
                    </div>
                </div>
            </div>
        </div> <!-- end col -->

    </div><!--end row-->
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/acttconnect/e-office.acttconnect.com/resources/views/file/physical-file/non-sfs.blade.php ENDPATH**/ ?>