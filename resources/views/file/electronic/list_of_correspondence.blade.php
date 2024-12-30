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
@endsection

@section('content')
   

<x-common-header />
<x-file-header />
   
<div class="row" style="display:flex;  
            border: 1px solid #ccc !important;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5) !important; margin-top:20px;">
    <div class="card" id="leftDiv" style="width: 50%; padding: 0px 1px; position: relative; border-right: 1px solid #ccc; background-color:#adebad">
        <div class="elebtn">
            <button id="greenNote" style="padding: 2px 15px; border: none; background-color: #adebad; color: white; font-size: 14px; margin-right: 10px; cursor: pointer; border-radius: 3px;">
                Green Note <i class="fas fa-pencil"></i>
            </button>

            <button id="yellowNote" style="padding: 2px 15px; border: none; background-color: #ffdb4d; color: white; font-size: 14px; margin-right: 10px; cursor: pointer; border-radius: 3px;">
                Yellow Note <i class="fas fa-pencil"></i>
            </button>

            <button style="padding: 2px 15px; border: none; background-color: #66c2ff; color: white; font-size: 14px; margin-left:210px; cursor: pointer; border-radius: 3px;">
                Save <i class="fas fa-file"></i>
            </button>
        </div>

        <!-- Text area container (initially hidden) -->
        <div class="snow-editor" style="height: 300px;">
            <textarea id="snowEditor" style="width: 100%; height: 100%; border: 1px solid #ccc;"></textarea>
        </div>
    </div>


<script>
    // Get elements
    const greenNoteButton = document.getElementById('greenNote');
    const yellowNoteButton = document.getElementById('yellowNote');
    const leftDiv = document.getElementById('leftDiv');

    // Event listener for Green Note button
    greenNoteButton.addEventListener('click', function() {
        leftDiv.style.backgroundColor = '#adebad'; // Set background to green
    });

    // Event listener for Yellow Note button
    yellowNoteButton.addEventListener('click', function() {
        leftDiv.style.backgroundColor = '#ffdb4d'; // Set background to yellow
    });
</script>

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
        <div class="card-header" style="background-color: lightgray;">
            <h5 class="card-title mb-0">List of Correspondence</h5>
        </div>

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
                        <th class="sort" data-sort="customer_name">Receipt/Issue No.</th>
                        <th class="sort" data-sort="email">Subject</th>
                        <th class="sort" data-sort="phone">Marked As</th>
                        <th class="sort" data-sort="date">Attached On</th>
                        <th class="sort" data-sort="status">Issued On</th>
                        <th class="sort" data-sort="page">Page</th>
                        <th class="sort" data-sort="remark">Remark</th>
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
                        <td class="email">marycousar@velzon.com</td>
                        <td class="phone">580-464-4694</td>
                        <td class="date">06 Apr, 2021</td>
                        <td>hbhb</td>
                        <td>1-1</td>
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
