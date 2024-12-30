@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-5B9K8dP87n5pFh6X+cDpx3eR8jlk64GwbD8MXcOJS+YXFEc4G5BSwU6oe5M+E2Q" crossorigin="anonymous">
    <style>
        body {
            background-color: none;
        }
    </style>
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Show Salary</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <!-- Basic Information -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="state" class="form-label">State</label>
                        <input type="text" id="state" name="state" class="form-control" value="{{ $salaryDetails['state'] }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="district" class="form-label">District</label>
                        <input type="text" id="district" name="district" class="form-control" value="{{ $salaryDetails['district'] }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="organisation" class="form-label">Organization</label>
                        <input type="text" id="organisation" name="org_id" class="form-control" value="{{ $org_name }}" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="department_name" class="form-label">Department</label>
                        <input type="text" id="department_name" name="department_name" class="form-control" value="{{ $department_name }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="taluka" class="form-label">Taluka</label>
                        <input type="text" id="taluka" name="taluka" class="form-control" value="{{ $salaryDetails['taluka'] }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" id="designation" name="designation" class="form-control" value="{{ $designation }}" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Profile Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $name }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="salary_type" class="form-label">Salary Type</label>
                        <input type="text" id="salary_type" name="salary_type" class="form-control" value="{{ $salaryDetails['salary_type'] }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="starting_salary" class="form-label">Starting Salary</label>
                        <input type="text" id="starting_salary" name="starting_salary" class="form-control" value="{{ $salaryDetails['starting_salary'] }}" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="joining_date" class="form-label">Joining Date</label>
                        <input type="date" id="joining_date" name="joining_date" class="form-control" value="{{ $salaryDetails['joining_date'] }}" readonly>
                    </div>
                </div>

                <!-- Additional Information -->
                    <div class="mb-3">
                        <label for="salary" class="form-label">Promotion Salary</label>
                        <input type="text" class="form-control" value="{{ $salaryDetails['promotion_salary'] ?? 'N/A' }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="increment_type" class="form-label">Increment Type</label>
                        <input type="text" class="form-control" value="{{ $salaryDetails['increment_type'] ?? 'N/A' }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="increment_name" class="form-label">Increment Name</label>
                        <input type="text" class="form-control" value="{{ $salaryDetails['increment_name'] ?? 'N/A' }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" rows="3" readonly>{{ $salaryDetails['description'] ?? 'N/A' }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="additional_document" class="form-label">Additional Document</label>
                        <input type="text" class="form-control" value="{{ $salaryDetails['additional_document'] ? 'Document Available' : 'N/A' }}" readonly>
                        @if(isset($salaryDetails['additional_document']))
                            <p><a href="{{ asset($salaryDetails['additional_document']) }}" target="_blank">View Document</a></p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="increment_date" class="form-label">Increment Date</label>
                        <input type="text" class="form-control" value="{{ $salaryDetails['increment_date'] ?? 'N/A' }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="salary_calculation_type" class="form-label">Salary Calculation Type</label>
                        <input type="text" class="form-control" value="{{ $salaryDetails['salary_calculation_type'] ?? 'N/A' }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="additional_salary" class="form-label">Additional Salary</label>
                        <input type="text" class="form-control" value="{{ $salaryDetails['additional_salary'] ?? 'N/A' }}" readonly>
                    </div>
                     <form action="{{ route('salary-update-status', $salaryDetails['id']) }}" id="achievement-form" method="POST">
 
    @csrf
    @method('PATCH')

    <div class="row">
        <div class="col-md-12 mb-3">
            @if(($salaryDetails['Status'] =='pending' || $salaryDetails['Status'] == 'approved_clerk') && Auth::user()->is_admin == 'staff')
            <!-- Approve Button -->
            <button type="button" id="approve-button" class="btn btn-success me-2" data-docuser ="{{$salaryDetails['id']}}" >Approve</button>

            <!-- Reject Button -->
            <button type="button" id="reject-button" class="btn btn-danger">Reject</button>
             @elseif(($salaryDetails['Status'] == 'pending' || $salaryDetails['Status'] == 'approved_clerk') && Auth::user()->is_admin != 'staff')
                   <button type="button"  class="btn btn-warning me-2"  >Pending</button>
            @elseif ($salaryDetails['Status'] == 'approved')
              <button type="button"  class="btn btn-success me-2">Approved</button>
            @elseif ($salaryDetails['Status'] == 'rejected')
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

$letter_user = DB::table('users')->where('id', $salaryDetails['user_id'])->first();

$staffs = DB::table('users')
    ->join('departments', 'users.depart_id', '=', 'departments.id')
    ->join('designations', 'users.design_id', '=', 'designations.id')
    ->where('users.is_admin', 'staff')  // Ensure we're referencing the correct table column
    ->where('users.state', $letter_user->state)
    ->where('users.district', $letter_user->district)
    ->where('users.org_id', $letter_user->org_id)
    ->where(function($query) use ($letter_user) {
        $query->whereNull('users.taluka')  // Make sure 'users' is referenced
              ->orWhere('users.taluka', $letter_user->taluka);
    })
    ->where('users.depart_id', $letter_user->depart_id)
    ->where('users.design_id', $letter_user->design_id)
    ->select('users.*', 'departments.name as department_name', 'designations.designation_name')  
    ->get();


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
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="window.location='{{ route('salary.index') }}'">Back</button>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->
@endsection

@section('script')
       <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    
    <script>
$(document).ready(function() {
    $('#frwd_hod_id').select2({
        placeholder: "Select a staff member",
        allowClear: true
    });
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
                page: 'salary'
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
                    page: 'salary',
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
