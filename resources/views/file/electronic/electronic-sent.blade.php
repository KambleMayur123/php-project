@extends('layouts.master')
@section('title')
    @lang('translation.new-page-title')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    
    <link href="{{ URL::asset('build/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />

    
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
.card {
    border: 1px solid #ccc;
    padding: 15px;
    background-color: #f9f9f9;
}

.header-tabs ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    border-bottom: 2px solid #ccc;
}

.header-tabs ul li {
  font-size: 13px;
    font-weight: 900;
}


.header-tabs ul li a {
    text-decoration: none;
    padding: 10px 15px;
    display: block;
    color: #333;
}

.form-section {
    padding: 15px;
    overflow-y:auto !important;
}

.form-section label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-section input[type="text"],
.form-section input[type="date"],
.form-section select,
.form-section textarea {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
}

.notify-section {
    display: flex;
    align-items: center;
}

.notify-section label {
    margin-right: 10px;
}

.note {
    font-size: 12px;
    color: #888;
    margin-bottom: 10px;
}

textarea {
    height: 100px;
}

.char-count {
    font-size: 12px;
    color: #999;
    text-align: right;
}

.form-row {
    display: flex;
    justify-content: space-between;
}

.form-group {
    width: 48%;
}

.footer-buttons {
    display: flex;
    justify-content: flex-end;
    margin-top: 10px;
}

.footer-buttons button {
    padding: 10px 15px;
    border: none;
    background-color: #007bff;
    color: white;
    margin-left: 10px;
}

.footer-buttons .dsc-btn img {
    margin-right: 5px;
}



.header-section {
    background-color: #f9f9f9;
    border-bottom: 1px solid #ccc;
    padding: 10px;
    margin-top:20px;
}

.radio-buttons {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.radio-buttons input[type="radio"] {
    margin-right: 5px;
}

.radio-buttons label {
    margin-right: 15px;
}

.organization-dropdown {
    display: flex;
    align-items: center;
}

.organization-dropdown label {
    margin-right: 10px;
    font-weight: bold;
}

.organization-dropdown select {
    padding: 5px;
    border: 1px solid #ccc;
    width: 200px;
}

    </style>
@endsection

@section('content')
   

<x-common-header />
<x-file-header />
<div class="header-section card">
    <div class="radio-buttons">
        <input type="radio" id="internal" name="type" value="internal" checked>
        <label for="internal">Internal</label>
        <input type="radio" id="external" name="type" value="external">
        <label for="external">External</label>
    </div>

    <div class="organization-dropdown">
        <label for="organization">Organization</label>
        <select id="organization" name="organization">
            <option value="">Choose One</option>
            <!-- Add more options as needed -->
        </select>
    </div>
</div>


   
   <div classs="row" style="display:flex; 
            border: 1px solid #ccc !important;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5) !important; margin-top:20px;">
<div class="card" style="width: 50%; padding: 0px 1px; position: relative; border-right: 1px solid #ccc;">
   
    <div class="card-body" style="flex:none">
       <ul class="nav nav-tabs mb-3" role="tablist" >
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab" aria-selected="false" tabindex="-1">
                                                All
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#product1" role="tab" aria-selected="true">
                                                Recent 5
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab" aria-selected="false" tabindex="-1">
                                                In Channel
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false" tabindex="-1">
                                                Sub-ordinstes
                                            </a>
                                        </li>
                                          <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false" tabindex="-1">
                                                Send Back
                                            </a>
                                        </li>
                                          <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="false" tabindex="-1">
                                                Reporting Officer
                                            </a>
                                        </li>
                                    </ul>
    </div>
      <div class="tab-content  text-muted">
    <div class="tab-pane  active" id="home" role="tabpanel">
    <div class="form-section">
        <div class="toflex" style="display:flex;justify-content:space-between;padding:0px 5px">
        <label for="to">To<span>*</span></label>
        <input type="text" id="to" name="to" placeholder="Recipient" style="width:50%">
        
        <div class="notify-section">
            <label>Notify Through:</label>
            <input type="checkbox" id="email" name="notify" value="email">
            <label for="email">Email</label>
            <input type="checkbox" id="sms" name="notify" value="sms">
            <label for="sms">SMS</label>
        </div>
         </div>
        <p class="note">Note: Email/SMS will be sent based on checkbox selection (Notify Through), irrespective of User Preferences and Instance Configuration.</p>

        <label for="remarks">Remarks</label>
        <textarea id="remarks" name="remarks"></textarea>
        <p class="char-count">Total 1000 | 1000 Character left</p>
        
        <div class="form-row">
            <div class="form-group">
                <label for="duedate">Set Due Date</label>
                <input type="date" id="duedate" name="duedate">
            </div>
            <div class="form-group">
                <label for="action">Action</label>
                <select id="action" name="action">
                    <option value="">Choose One</option>
                    <!-- Options can be added here -->
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="priority">Priority</label>
            <select id="priority" name="priority">
                <option value="">Choose One</option>
                <!-- Options can be added here -->
            </select>
        </div>
    </div>
    </div>
      <div class="tab-pane" id="product1" role="tabpanel">
          <table class="table align-middle table-nowrap" id="customerTable">
                <thead class="table-light">
                    <tr>
                        
                        <th class="sort" data-sort="customer_name"></th>
                        <th class="sort" data-sort="name">Name</th>
                        <th class="sort" data-sort="phone">Marking Abbreviation</th>
                        <th class="sort" data-sort="date">Section</th>
                       
                      
                    </tr>
                </thead>
                <tbody class="list form-check-all">
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                            </div>
                        </th>
                        <td class="id" style="display:none;">
                            <a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a>
                        </td>
                        <td class="customer_name">Mary Cousar</td>
                        <td class="email">E</td>
                       
                        <td>hbhb</td>
                       
                        
                    </tr>
                </tbody>
            </table> 
        <div class="card" style="margin:10px">
            <div class="toflex" style="display:flex;justify-content:space-between;padding:0px 5px">
        <label for="to">To<span>*</span></label>
        <input type="text" id="to" name="to" placeholder="Recipient" style="width:50%">
        
        <div class="notify-section">
            <label>Notify Through:</label>
            <input type="checkbox" id="email" name="notify" value="email">
            <label style="margin-bottom:0px;" for="email">Email</label>
            <input type="checkbox" id="sms" name="notify" value="sms">
            <label style="margin-bottom:0px;" for="sms">SMS</label>
        </div>
         </div>
        <p class="note">Note: Email/SMS will be sent based on checkbox selection (Notify Through), irrespective of User Preferences and Instance Configuration.</p>
        </div>
    </div>
   </div>
    <div class="card-footer" style="  display: flex;
    align-items: center;
    justify-content: flex-end;
   
    padding: 10px;
    position: sticky; /* Keeps the footer visible at the bottom */
    bottom: 0;
    left: 0;
    width: 100%;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.6);
    z-index: 1000; /* Ensure the footer is above other content">
        <button class="dsc-btn">
            <span class="mdi mdi-arrow-expand-up"></span> DSC Sign & Send
        </button>
        <button class="send-btn" style="margin-left:10px">Send</button>
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
    <div class="card" style="width: 100%;">
        <!-- Card Header with Title -->
        <!--<div class="card-header" style="background-color: lightgray;">-->
        <!--    <h5 class="card-title mb-0">List of Draft</h5>-->
        <!--</div>-->

        <!-- Card Body with Table -->
        <div class="card-body" style="overflow-x: auto;">
            <table class="table align-middle table-nowrap" id="customerTable">
                <thead class="table-light">
                    <tr>
                        <th scope="col" style="width: 50px;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                            </div>
                        </th>
                        <th class="sort" data-sort="customer_name">File/Receipt Components</th>
                        <th class="sort" data-sort="email"></th>
                        <th class="sort" data-sort="phone">Comp.No</th>
                        <th class="sort" data-sort="date">File No/Receipt No.</th>
                        <th class="sort" data-sort="status">Subject</th>
                        <th class="sort" data-sort="page">Note Type</th>
                      
                    </tr>
                </thead>
                <tbody class="list form-check-all">
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                            </div>
                        </th>
                        <td class="id" style="display:none;">
                            <a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a>
                        </td>
                        <td class="customer_name">Mary Cousar</td>
                        <td class="email">E</td>
                        <td class="phone">580-464-4694</td>
                        <td class="date">06 Apr, 2021</td>
                        <td>hbhb</td>
                        <td>1-1</td>
                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
      <div class="card" style="width: 100%;">
        <!-- Card Header with Title -->
        <div class="card-header">
            <h5 class="card-title mb-0">Intimate to </h5>
        </div>

        <!-- Card Body with Table -->
        <div class="card-body" style="overflow-x: auto;">
            <table class="table align-middle table-nowrap" id="customerTable">
                <thead class="table-light">
                    <tr>
                     
                        <th class="sort" data-sort="version">S.No</th>
                        <th class="sort" data-sort="createdon">Employee Name</th>
                        <th class="sort" data-sort="created_by">Marking Abbreviation</th>
                        <th class="sort" data-sort="status">Section</th>
                        <th class="sort" data-sort="action">Email</th>
                         <th class="sort" data-sort="action">SMS</th>
                    </tr>
                </thead>
                <tbody class="list form-check-all">
                    <tr>
                        
                        <td class="id" style="display:none;">
                            <a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a>
                        </td>
                        <td class="customer_name">Mary Cousar</td>
                        <td class="email">marycousar@velzon.com</td>
                        <td class="phone">580-464-4694</td>
                        <td class="date">06 Apr, 2021</td>
                        <td>hbhb</td>
                         <td>hbhb</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
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
@endsection

@section('script')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- listjs init -->    <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('build/libs/quill/quill.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>

    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
