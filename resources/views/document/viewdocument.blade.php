@extends('layouts.master')

@section('title')
    Document Details
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">User Document Details</h4>
            </div><!-- end card header -->

            <div class="card-body">
                
                    <!-- State, District, Taluka, Profile Name -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">State:</label>
                            <input type="text" class="form-control" value="{{ $user->state }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">District:</label>
                            <input type="text" class="form-control" value="{{ $user->district }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Organization:</label>
                            <input type="text" class="form-control" value="{{ $user->org_name }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Department:</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Taluka:</label>
                            <input type="text" class="form-control" value="{{ $user->taluka }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Designation:</label>
                            <input type="text" class="form-control" value="{{ $user->designation_name }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Profile Name:</label>
                            <input type="text" class="form-control" value="{{ $user->first_name }} {{ $user->last_name }}" readonly>
                        </div>
                    </div>
                    
                                  <div id="rows-container">
    @foreach($documents as $doc)
        <div class="row mb-3">
<div class="col-md-5">
    <label class="form-label">Document Name:</label>
    <input type="text" class="form-control" value="{{ $doc->doc_name }}" readonly>
</div>
            <div class="col-md-5">
                <label class="form-label">Document Upload:</label>
                @if($doc->document_pdf) <!-- This is correct since we renamed the document -->
<a href="{{ asset('images/' . $doc->document_pdf) }}" target="_blank">View Current File</a>
                @else
                    <p>No document uploaded.</p>
                @endif
            </div>
        </div>
    @endforeach
</div>

    <form action="{{ route('documents-profile-status', $user->id) }}" id="achievement-form" method="POST">
 
    @csrf
    @method('PATCH')

    <div class="row">
        <div class="col-md-12 mb-3">
            @if(($user->status == 'pending' || $user->status == 'approved_clerk') && Auth::user()->is_admin == 'staff')
            <!-- Approve Button -->
            <button type="button" id="approve-button" class="btn btn-success me-2" data-docuser ="{{$user->user_id}}" >Approve</button>

            <!-- Reject Button -->
            <button type="button" id="reject-button" class="btn btn-danger">Reject</button>
             @elseif(($user->status == 'pending' || $user->status == 'approved_clerk') && Auth::user()->is_admin != 'staff')
                   <button type="button"  class="btn btn-warning me-2"  >Pending</button>
            @elseif ($user->status == 'approved')
              <button type="button"  class="btn btn-success me-2">Approved</button>
            @elseif ($user->status == 'rejected')
            <button type="button"  class="btn btn-danger">Rejected</button>
              @endif
        </div>
    </div>

    <!-- Hidden input field for status -->
    <input type="hidden" name="status" id="status-field" value="">

    <!-- Hidden input field for rejection description -->
    <input type="hidden" name="reject_description" id="reject-description-field" value="">

    <!-- Rejection Modal (Ensure this modal is included in your HTML) -->
    <div class="modal fade" id="rejectionModal" tabindex="-1" aria-labelledby="rejectionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectionModalLabel">Rejection Reason</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea id="reject-description-field-modal" class="form-control" placeholder="Enter rejection reason"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="submit-reject" class="btn btn-danger">Submit Rejection</button>
                </div>
            </div>
        </div>
    </div>
</form>
 @php
                                $role = DB::table('roles')->where('id', Auth::user()->role_name)->first();
$letter_user = DB::table('users')->where('id', $user->user_id)->first();
$staffs = collect();

$check_hod = DB::table('roles')->where('role_name', 'HOD')->get();

foreach ($check_hod as $check) {
    $matched_staffs = DB::table('users')
        ->join('departments', 'users.depart_id', '=', 'departments.id') 
        ->join('designations', 'users.design_id', '=', 'designations.id')
        ->where('users.is_admin', 'staff')
        ->where('users.role_name', $check->id)
        ->where('users.state', $letter_user->state)
        ->where('users.district', $letter_user->district)
        ->where('users.org_id', $letter_user->org_id)
        ->where(function($query) use ($letter_user) {
            $query->whereNull('users.taluka')
                  ->orWhere('users.taluka', $letter_user->taluka);
        })
        ->where('users.depart_id', $letter_user->depart_id)
        ->where('users.design_id', $letter_user->design_id)
        ->select('users.*', 'departments.name as department_name', 'designations.designation_name')
        ->get();

    $staffs = $staffs->merge($matched_staffs);
}

                                    @endphp   
<div class="modal fade" id="VerifyClerk" tabindex="-1" aria-labelledby="VerifyClerkLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="VerifyClerkLabel">Verify Otp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                           <div class="form-group" id="frwd_hod" style="display:none">
                                    <label for="hod">Forward To Staff</label>
                                    <select name="hod" class="form-control select2" id="hod_id"  >
                                       
                                      @foreach($staffs as $staff)
                                       <option value="{{$staff->id}}">{{$staff->first_name}}-{{$staff->department_name}}-{{$staff->designation_name}}</option>
                                      @endforeach
                                     
                                    </select>
                                </div>
                                  <div class="form-group" >
                                      <label for="hod">Otp</label>
                                  <input type="text" name="otp" class="form-control" placeholder="Enter otp" />
                                  </div>
                </div>
              
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="submitverify" class="btn btn-danger">Submit </button>
                </div>
            </div>
        </div>
    </div>
    
                    <!-- Back Button -->
                    <div class="row mb-3">
                        <div class="col-md-12 text-end">
                            <button type="button" class="btn btn-secondary" onclick="window.history.back();">Back</button>
                        </div>
                    </div>
                
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

@endsection

@section('script')

    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- listjs init -->
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>

    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

        
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>


<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script>
$(document).ready(function() {
      $('#hod_id').select2({
        placeholder: "Select a staff member",
        allowClear: true
    });
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const approveButton = document.getElementById('approve-button');
    const rejectButton = document.getElementById('reject-button');
    const rejectionModal = new bootstrap.Modal(document.getElementById('rejectionModal'));
    const verifyClerkModal = new bootstrap.Modal(document.getElementById('VerifyClerk'));
    const userId = approveButton.getAttribute('data-docuser'); // Get the document user ID from the button attribute

    // Approve Button Click Event with AJAX
    approveButton.addEventListener('click', function () {
        const apiUrl = '/api/send-otp-digital'; // Route for sending OTP
        const statusField = document.getElementById('status-field');
        statusField.value = 'approved'; // Set the status field to 'approved'

        // Perform the AJAX request
        fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Include CSRF token for security
            },
            body: JSON.stringify({
                user_id: '{{Auth::user()->id}}',
                page_id: userId,
                page: 'user_document'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // If 'data' is "OTHER", show the OTP modal and manage the select field
                if (data.data === 'OTHER') {
                    verifyClerkModal.show();

                    // Check if the role is HOD
                    const hodField = document.getElementById('frwd_hod');
                    
                    // If the data contains 'HOD', do not show the select
                    if (data.data === 'HOD') {
                        hodField.style.display = 'none'; 
                       
                        // Keep the select hidden
                    } else {
                        hodField.style.display = 'block'; // Show the select field for non-HOD users
                    }
                }else{
                    verifyClerkModal.show();

                    // Check if the role is HOD
                    const hodField = document.getElementById('frwd_hod');
                    
                    // If the data contains 'HOD', do not show the select
                    if (data.data === 'HOD') {
                        hodField.style.display = 'none'; 
                       
                        // Keep the select hidden
                    } else {
                        hodField.style.display = 'block'; // Show the select field for non-HOD users
                    }
                }

            } else {
                alert('Failed to send OTP. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while sending OTP.');
        });
    });

    // Submit OTP for Verification
    document.getElementById('submitverify').addEventListener('click', function () {
        const otpValue = document.querySelector('input[name="otp"]').value;
        const hodId = document.querySelector('select[name="hod"]').value; // Only used if hod field is visible

        if (otpValue) {
            fetch('/api/verify-otp-digital', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    user_id: '{{Auth::user()->id}}',
                    page_id: userId,
                    page: 'user_document',
                    verify_otp: otpValue,
                    hod_id: hodId // Pass the selected hod_id if needed
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('OTP verified successfully.');
                         if (data.data === 'approved_clerk' || data.data === 'approved') {
                        const statusField = document.getElementById('status-field');
                        statusField.value = data.data; // Set status field value

                        // Submit the form after setting the status
                        document.getElementById('achievement-form').submit();
                    }
                    verifyClerkModal.hide(); // Close the modal on success
                } else {
                    alert('OTP verification failed: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while verifying OTP.');
            });
        } else {
            alert('Please enter the OTP.');
        }
    });

    // Reject Button Click Event
    rejectButton.addEventListener('click', function () {
        // Show the rejection modal
        rejectionModal.show();
    });

    // Submit Rejection Button Click Event
    document.getElementById('submit-reject').addEventListener('click', function () {
        const rejectDescription = document.getElementById('reject-description-field-modal').value;

        if (rejectDescription) {
            // Set the reject description in the form
            const rejectDescriptionField = document.getElementById('reject-description-field');
            rejectDescriptionField.value = rejectDescription;

            // Set the status to rejected in the hidden input field
            const statusField = document.getElementById('status-field');
            statusField.value = 'rejected';

            // Close the modal and submit the form
            rejectionModal.hide();
            document.getElementById('achievement-form').submit();
        } else {
            alert("Please enter a reason for rejection.");
        }
    });
});

</script>



@endsection
