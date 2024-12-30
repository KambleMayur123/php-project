@extends('layouts.master')
@section('title')
    Add Letter
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">

@endsection

@section('content')
<?php
        if (Auth::user()->is_admin == 'staff' || Auth::user()->is_admin == 'organization') {
    // Fetch permissions for 'staff' from the database as an array
    $permission = DB::table('role_permissions')
        ->where('role_name', Auth::user()->role_name)
        ->first();

    // Check if permissions are found
    if ($permission) {
        // Convert the object to an associative array
        $permissions = (array) $permission;
    } else {
        // Create an array to hold the modified permissions
        $permissions = [];

        // List of modules and permission suffixes
        $modules = [
            'dashborad', 'department', 'designation', 'organization', 'staff', 'role',
            'permission', 'report', 'userprofile', 'userdetail', 'document', 'leave',
            'nomination', 'salary', 'checklist', 'trans_join', 'other_receipt', 'affidavit',
            'achievement', 'receipt_master', 'checklist_master', 'tehsils', 'document_master',
            'organizations_master', 'leave_category', 'nomination_type', 'affidavit_type',
            'achievement_type','audit','pension'
        ];
        $permissionSuffixes = ['view', 'create', 'edit', 'delete'];

        // Set permissions for the allowed actions to 0 (default)
        foreach ($modules as $module) {
            foreach ($permissionSuffixes as $suffix) {
                $permissions["{$module}_{$suffix}"] = 1;
            }
        }
    }
   
    
} else if (Auth::user()->is_admin == 'admin') {
    // Create an array to hold the modified permissions
    $permissions = [];

    // List of modules and permission suffixes
    $modules = [
        'dashborad', 'department', 'designation', 'organization', 'staff', 'role',
        'permission', 'report', 'userprofile', 'userdetail', 'document', 'leave',
        'nomination', 'salary', 'checklist', 'trans_join', 'other_receipt', 'affidavit',
        'achievement', 'receipt_master', 'checklist_master', 'tehsils', 'document_master',
        'organizations_master', 'leave_category', 'nomination_type', 'affidavit_type',
        'achievement_type','audit','pension'
    ];
    $permissionSuffixes = ['view', 'create', 'edit', 'delete'];

    // Set permissions for the allowed actions to 2 (admin level)
    foreach ($modules as $module) {
        foreach ($permissionSuffixes as $suffix) {
            $permissions["{$module}_{$suffix}"] = 2;
        }
    }
     
    
} else {
    // Create an array to hold the modified permissions
    $permissions = [];

    // List of modules and permission suffixes
    $modules = [
        'dashborad', 'department', 'designation', 'organization', 'staff', 'role',
        'permission', 'report', 'userprofile', 'userdetail', 'document', 'leave',
        'nomination', 'salary', 'checklist', 'trans_join', 'other_receipt', 'affidavit',
        'achievement', 'receipt_master', 'checklist_master', 'tehsils', 'document_master',
        'organizations_master', 'leave_category', 'nomination_type', 'affidavit_type',
        'achievement_type','audit','pension'
    ];
    $permissionSuffixes = ['view', 'create', 'edit', 'delete'];

    // Set permissions for the allowed actions to 0 (default)
    foreach ($modules as $module) {
        foreach ($permissionSuffixes as $suffix) {
            $permissions["{$module}_{$suffix}"] = 1;
        }
    }
       
   
}  
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Letter</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('receipts.update' , $letter->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                     <input type="hidden" name="owner_id" class="form-control" id="owner" value="{{Auth::user()->id}}">
                        <div class="row">

                            
                            <div class="col-md-6">
                                
                                   
<div class="elebtn" style="display: flex; align-items: center; gap: 10px;">
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
    <input type="file" id="fileInput" name="letter_content" accept="application/pdf" style="display: none;" />

            
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


                                <div class="form-group">
                                    <label for="letter_content">Letter Content</label>
                                    <textarea id="summernote" name="letter_content" class="form-control"></textarea>
                                </div>
                            </div>

                            <!-- Second Column: Form Fields -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="letter_no">Letter No.</label>
                                    <input type="text" name="letter_no" class="form-control" id="letter_no" required>
                                </div>

                                <div class="form-group">
                                    <label for="date_generated">Date of Generated</label>
                                    <input type="date" name="date_of_generated" class="form-control flatpickr" id="date_generated" required>
                                </div>
                        @php
                                   $role = DB::table('roles')->where('id', Auth::user()->role_name)->first();
$letter_user = DB::table('users')->where('id', $letter->user_id)->first();
$staffs = collect();  // Use collect() to make it easier to merge results

$check_hod = DB::table('roles')->where('role_name', 'HOD')->get();

foreach ($check_hod as $check) {
    // Fetch staff that matches the conditions
    $matched_staffs = DB::table('users')
        ->where('is_admin', 'staff')  // Check if the user is staff
        ->where('role_name', $check->id)  // Match HOD role
        ->where('state', $letter_user->state)  // Match state
        ->where('district', $letter_user->district)  // Match district
        ->where('org_id', $letter_user->org_id)  // Match organization ID
        ->where(function($query) use ($letter_user) {
            // Match taluka if it exists, or if the staff taluka is null
            $query->whereNull('taluka')
                  ->orWhere('taluka', $letter_user->taluka);
        })
        ->where('depart_id', $letter_user->depart_id)  // Match department ID
        ->where('design_id', $letter_user->design_id)  // Match designation ID
        ->get();

    // Merge the matched staff into the main $staffs collection
    $staffs = $staffs->merge($matched_staffs);
}

// Now $staffs contains all matched staff across the HOD roles

                                    @endphp        
                                
                           @if((isset($role->role_name) && $role->role_name != 'HOD' && $letter->receipt_status == 'pending') || (isset($role->role_name) && $role->role_name == 'HOD' && $letter->receipt_status != 'approved'))
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="receipt_status" class="form-control select2" id="Status"  data-receipt="{{$letter->id}}" required>
                                      <option value="">Select Status</option>  
                                     <option value="approved">Approved</option>
                                        <option value="rejected">Rejected</option>
                                    </select>
                                </div>
                         @endif
                         
                                <div id="verify_section" style="display:none">
                                    
                                   @if(isset($role->role_name) && $role->role_name != 'HOD')
                                     <div class="form-group">
                                    <label for="hod">Forward To Staff</label>
                                    <select name="hod" class="form-control select2" id="hod_id"  >
                                       
                                      @foreach($staffs as $staff)
                                       <option value="{{$staff->id}}">{{$staff->first_name}}</option>
                                      @endforeach
                                     
                                    </select>
                                </div>
                                    @endif
    <input style="margin:10px 0px;" type="text" name="verify_otp" class="form-control" id="otp" placeholder="Enter OTP">
    <button class="btn btn-primary "type="button" id="verify_otp_btn" data-receipt_id="{{$letter->id}}" data-user_id="{{ Auth::user()->id }}">Verify OTP</button>
</div>

<div style="display: flex; justify-content: flex-end; gap: 10px; " id="submitBButtonSection">
    <div class="hstack gap-2">
        <button type="submit" class="btn btn-success">submit</button>
    </div>

    <div class="hstack gap-2">
        <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('receipts.index')}}'">Back</button>
    </div>
</div>                            </div>
                        </div> <!-- End Row -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <!-- jQuery -->
    <!-- Bootstrap JS -->
    <!-- SweetAlert -->
    <!-- Select2 -->
 <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>

    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
   <script>
    $(document).ready(function() {
        $('#Status').on('change', function() {
            var selectedValue = $(this).val();
            var receiptId = $(this).data('receipt');

            if (selectedValue === 'approved') {
                $.ajax({
                    url: '/api/send-otp-other-digital',
                    type: 'POST',
                    data: {
                        receipt_id: receiptId,
                        user_id: '{{ Auth::user()->id }}',
                        _token: '{{ csrf_token() }}' // Include CSRF token for security
                    },
                    success: function(response) {
                        if (response.success) {
                            // Show the verify section when OTP is successfully sent
                            $('#verify_section').css('display', 'block');
                             $('#submitBButtonSection').hide();
                          
                        } else {
                            alert(response.message); // Show error message
                        }
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr);
                        alert('Something went wrong. Please try again.');
                    }
                });
            } else {
                // Hide the verify section if the status is not approved
                $('#verify_section').css('display', 'none');
            }
        });
    });
</script>
<script>
$(document).ready(function() {
    $('#verify_otp_btn').on('click', function() {
        // Get the OTP entered in the input field
        var otp = $('#otp').val();
        var hod_id = $('#hod_id').val();
        // Check if the OTP field is not empty
        if (otp.trim() === '') {
            alert('Please enter OTP.');
            return;
        }
        

        // Get additional data from the button attributes
        var receiptId = $(this).data('receipt_id');
        var userId = $(this).data('user_id');

        // Send an AJAX request to the 'verify-other-digital-otp' API route
        $.ajax({
            url: '/api/verify-otp-other-digital',
            type: 'POST',
            data: {
                receipt_id: receiptId,
                user_id: userId,
                verify_otp: otp,
                hod_id :hod_id
            },
            success: function(response) {
                // Handle the response
                if (response.success) {
                    alert('OTP verified successfully!');
                    // Optionally, hide or update the verify section based on success
                    $('#verify_section').hide();
                    $('#submitBButtonSection').css('display', 'block');
                } else {
                    alert('OTP verification failed: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX error
                console.error('Error:', error);
                  alert('OTP verification failed: ' + error);
            }
        });
    });
});
</script>

    <script>
        $(document).ready(function() {
            // Initialize Summernote
            $('#summernote').summernote({
                height: 300, // Set editor height
                tabsize: 2,  // Set tab size
                placeholder: 'Write your letter content here...',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
    
    

        
        
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
document.getElementById('fileInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    
    if (file) {
        const fileName = document.getElementById('fileName');
        fileName.textContent = file.name;
        
        if (file.type === 'application/pdf') {
            const pdfViewer = document.getElementById('pdfViewer');
            pdfViewer.src = URL.createObjectURL(file);
            pdfViewer.style.display = 'block';
            console.log("hide");
        $('#summernote').parent().hide(); // Hides the entire Summernote container
        } else {
            const pdfViewer = document.getElementById('pdfViewer');
            pdfViewer.style.display = 'none'; // Hide PDF preview if not a PDF
            
            // Show Summernote editor again using jQuery
            $('#summernote').closest('.note-editor').show();
        }
    }
});

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
    
    // Show the Summernote editor again using jQuery
    $('#summernote').closest('.note-editor').show();
});

</script>


<script>
    function generateLetterNo() {
        const randomNum = Math.floor(100000 + Math.random() * 900000);
        return 'LN' + randomNum;
    }

    function setTodayDate() {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('letter_no').value = generateLetterNo();
        document.getElementById('date_generated').value = setTodayDate();
        
        document.getElementById('letter_no').readOnly = true;
document.getElementById('date_generated').readOnly = true;

    });
</script>

@endsection
