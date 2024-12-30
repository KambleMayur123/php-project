@extends('layouts.master')
@section('title')
    @lang('translation.view-checklist')
@endsection

@section('content')
<div class="row" style="display: flex; border: 1px solid #ccc; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5); margin-top: 40px;">
     <div class="card" style="width: 50%; padding: 0; border-right: 1px solid #ccc;">

        <div class="file-name" id="fileName"></div>
        
       
<iframe id="pdfViewer" style="width:100%; height:600px;" frameborder="0"></iframe>

    </div>
   
        <div class="card" style="width: 50%; padding: 20px; display: flex; flex-direction: column; overflow-y: auto; height: 600px;">
            <div class="card-header">
                <h4 class="card-title mb-0">View  Checklist</h4>
            </div><!-- end card header -->

            <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <input type="text" id="state" name="state" class="form-control" value="{{ $user->state }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="district" class="form-label">District</label>
                            <input type="text" id="district" name="district" class="form-control" value="{{ $user->district }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="organisation" class="form-label">Organisation</label>
                            <input type="text" id="organisation" name="org_id" class="form-control" value="{{ $user->org_name}}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="department_name" class="form-label">Department</label>
                            <input type="text" id="department_name" name="depart_id" class="form-control" value="{{ $user->name }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="taluka-field" class="form-label">Taluka</label>
                            <input type="text" id="taluka-field" name="taluka" class="form-control" value="{{ $user->taluka }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" id="designation" name="design_id" class="form-control" value="{{ $user->designation_name }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Profile Name</label>
                            <input type="text" id="name" name="user_id" class="form-control" value="{{ $user->first_name }} {{ $user->last_name }}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="checklist_name" class="form-label">Checklist Name</label>
                            <input type="text" id="checklist_name" name="checklist_name" class="form-control" value="{{ $user->checklist_name }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Process Status</label>
                            <input type="text" name="process_status" class="form-control" value="{{ $user->process_status }}" readonly>
                        </div>
                    </div>

                    <div id="receipt-status-container" class="row mb-3" style="display: {{ $user->receipt_status ? 'block' : 'none' }}">
                        <div class="col mb-3">
                            <label for="receipt_status" class="form-label">Receipt Process Status</label>
                            <input type="text" id="receipt_status" name="receipt_process_status" class="form-control" value="{{ $user->receipt_process_status }}" readonly>
                        </div>
                    </div>

                    <div id="additional-receipt-fields" class="row mb-3" style="display: {{ $user->receipt_no ? 'block' : 'none' }}">
                        <div class="col-md-12 mb-3">
                            <label for="receipt_no" class="form-label">Receipt No</label>
                            <input type="text" id="receipt_no" name="receipt_no" class="form-control" value="{{ $user->receipt_no }}" readonly>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="receipt_status_dropdown" class="form-label">Receipt Status</label>
                            <input type="text" id="receipt_status_dropdown" name="receipt_status" class="form-control" value="{{ $user->receipt_status }}" readonly>
                        </div>
                    </div>

                    <div id="conditional-fields" class="row mb-3" style="display: {{ $user->page_no ? 'block' : 'none' }}">
                        <div class="col-md-12 mb-3">
                            <label for="page_no" class="form-label">Page No</label>
                            <input type="number" id="page_no" name="page_no" class="form-control" value="{{ $user->page_no }}" readonly>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="file_upload" class="form-label">File Upload</label>
                            <input type="text" id="file_upload" name="page_file" class="form-control" value="{{ $user->page_file }}" readonly>
                            @if($user->page_file)
                                <div id="view-file-container" class="mt-2">
                                    <a href="{{ asset('/images/' . $user->page_file) }}" target="_blank">
                                        View Uploaded File
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

            <form id="checklistForm" action="{{ route('checklistupdatestatus', $user->nid) }}" method="POST">
    @csrf
    @method('PATCH')
    
    @if($user->Status == 'Pending')
    <div class="row mb-3">
        <div class="col-md-12">
            <!-- Approve Button -->
            <button type="button" class="btn btn-success me-2" id="approveButton">Approve</button>
            
            <!-- Reject Button -->
            <button type="button" class="btn btn-danger" id="rejectButton">Reject</button>
        </div>
    </div>
    @elseif($user->Status == 'Approved')
    <div class="row mb-3">
        <div class="col-md-12">
            <!-- Approve Button -->
            <button type="button" class="btn btn-success me-2" >Approve</button>
            
        </div>
    </div>
@else
 <div class="row mb-3">
        <div class="col-md-12">
            <!-- Approve Button -->
          <button type="button" class="btn btn-danger" >Reject</button>
            
        </div>
    </div>
@endif
    <!-- Hidden input to store the status -->
    <input type="hidden" name="Status" id="status-field">
    
    <!-- Hidden input for rejection description (used when rejected) -->
    <input type="hidden" name="reject_description" id="reject-description-field">

    <!-- Rejection Modal -->
    <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Enter Reason for Rejection</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="modal-reject-description-field" class="form-label">Reason for Rejection</label>
                        <textarea id="modal-reject-description-field" class="form-control" placeholder="Enter Reason"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="confirmRejectButton" class="btn btn-danger">Confirm Reject</button>
                </div>
            </div>
        </div>
    </div>
</form>



                  
                    <div style="display: flex; justify-content: flex-end; gap: 10px;">
                        <div class="hstack gap-2">
                            <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('checklist-new.index')}}'">Back</button>
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

    <!-- listjs init -->
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>

    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>


<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Approve button functionality
        document.getElementById('approveButton').addEventListener('click', function () {
            // Set status to 'approved'
            document.getElementById('status-field').value = 'Approved';
            
            // Submit the form
            document.getElementById('checklistForm').submit();
        });

        // Reject button functionality
        document.getElementById('rejectButton').addEventListener('click', function () {
            // Show the reject modal
            var rejectModal = new bootstrap.Modal(document.getElementById('rejectModal'));
            rejectModal.show();
        });

        // Confirm reject button functionality
        document.getElementById('confirmRejectButton').addEventListener('click', function () {
            // Get the rejection description
            var rejectDescription = document.getElementById('modal-reject-description-field').value;

            // Set status to 'rejected' and store rejection description
            document.getElementById('status-field').value = 'Rejected';
            document.getElementById('reject-description-field').value = rejectDescription;

            // Hide the modal
            var rejectModal = bootstrap.Modal.getInstance(document.getElementById('rejectModal'));
            rejectModal.hide();

            // Submit the form
            document.getElementById('checklistForm').submit();
        });
    });
</script>
 <script>
 
document.getElementById('status-field').addEventListener('change', function() {
       const status = this.value;
    const rejectRow = document.getElementById('reject-description-row');
    const submitButtonRow = document.getElementById('submit-button-row');
    const signAndSendRow = document.getElementById('sign-and-send-row');

    rejectRow.style.display = 'none';
    submitButtonRow.style.display = 'none';
    signAndSendRow.style.display = 'none';

    if (status === 'rejected') {
        rejectRow.style.display = 'block';
        submitButtonRow.style.display = 'block';
    } else if (status === 'approved') {
        signAndSendRow.style.display = 'block';  
    } else if (status === 'pending') {
        submitButtonRow.style.display = 'block';  
    }
});


document.getElementById('signAndSendButton').addEventListener('click', function() {
    $('#otpModal').modal('show');  
});

document.getElementById('verifyButton').addEventListener('click', function() {
    const otp = document.getElementById('otp-field').value;

    if (otp === "123456") {
        alert("OTP verified successfully!");
        $('#otpModal').modal('hide');
    } else {
        document.getElementById('otpError').style.display = 'block';
    }
});
</script>
<script>
    window.onload = function() {
        // Pass the dynamic PDF path to the showPDF function
        showPDF('{{ asset("images/" . $user->page_file) }}');
    };

    function showPDF(pdfPath) {
        var pdfViewer = document.getElementById('pdfViewer');
        pdfViewer.src = pdfPath;  // Set the source of the PDF viewer
        pdfViewer.style.display = 'block';  // Make sure the viewer is visible
    }
</script>

@endsection