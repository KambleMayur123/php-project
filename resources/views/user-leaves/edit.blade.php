@extends('layouts.master')
@section('title')
    @lang('translation.edit-leave')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
                <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Edit User Leaves</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <form class="leave-form" method="POST" action="{{ route('leaves.update', $leave->id) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
 <div class="row mb-3">
    <div class="col-md-4">
        <label for="state" class="form-label">State</label>
        <select id="state" name="state" class="form-control">
            <option value="">Select State</option>
            @foreach($statesData['states'] as $state)
                <option value="{{ $state['state'] }}" {{ $user->state === $state['state'] ? 'selected' : '' }}>
                    {{ $state['state'] }}
                </option>
            @endforeach
        </select>
        @error('state')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="district" class="form-label">District</label>
        <select id="district" name="district" class="form-control">
            <option value="{{ $user->district}}"> {{ $user->district}}</option>
            <!-- Districts will be loaded here -->
        </select>
        @error('district')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>
   <div class="col-md-4">
    <label for="organisation" class="form-label">Select Organization</label>
    <select id="organisation" name="org_id" class="form-select mb-3">

    </select>
</div>

</div>

<div class="row">
    <div class="col-md-4">
    <label for="department_name" class="form-label">Select Department</label>
    <select name="depart_id" id="department_name" class="form-select mb-3">

    </select>
    @error('department_name')
        <div class="invalid-feedback" style="color: red;">
            {{ $message }}
        </div>
    @enderror
</div>

    <div class="col-md-4">
        <label for="taluka-field" class="form-label">Taluka</label>
        <select id="taluka-field" name="taluka" class="form-control" >
            <option value="{{ $user->taluka}}">{{ $user->taluka}}</option>
            <!-- Talukas will be loaded here -->
        </select>
        @error('taluka')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4">
        <label for="designation" class="form-label">Select Designation</label>
        <select name="design_id" id="designation" class="form-select mb-3">
            <!-- Designations will be loaded here -->
        </select>
        @error('designation')
            <div class="invalid-feedback" style="color: red;">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>


    <div class="row mb-3">
        
<div class="col-md-6">
    <label for="name" class="form-label">Profile Name</label>
    <input type="text" id="name" class="form-control" value="{{ $user->first_name }} {{ $user->last_name }}" readonly>
    
    <input type="hidden" name="user_id" value="{{ $user->id }}">
</div>
 <div class="col-md-6">
    <label for="available-leaves" class="form-label">Available Leaves</label>
    <input type="number" id="available-leaves" name="available_leave" class="form-control" placeholder="Available Leaves" value="{{ old('available_leave', $leave->available_leave ?? '') }}" readonly />
</div>
</div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="subject-field" class="form-label">Leave Subject</label>
                            <input type="text" id="subject-field" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Enter Leave Subject" value="{{ old('subject', $leave->subject) }}" />
                            @error('subject')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="description-field" class="form-label">Leave Description</label>
                            <textarea id="description-field" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Leave Description" value="{{ old('description', $user->description) }}">{{ old('description', $user->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                       <div class="col-md-4 mb-3">
    <label for="leave_category" class="form-label">Leave Category</label>
    <select id="leave_category" name="leave_category" class="form-control">
        @foreach($leavetype as $leave)
            <option value="{{ $leave->leave_type }}" 
                {{ old('leave_category', $user->leave_category ?? '') == $leave->leave_type ? 'selected' : '' }}>
                {{ $leave->leave_type }}
            </option>
        @endforeach
    </select>
    @error('leave_category')
        <div class="invalid-feedback text-red">{{ $message }}</div>
    @enderror
</div>


                    </div>


                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="start-date-field" class="form-label">Leave Starting Date</label>
                            <input type="date" id="start-date-field" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date', $user->start_date) }}" />
                            @error('start_date')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="end-date-field" class="form-label">Leave Ending Date</label>
                            <input type="date" id="end-date-field" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date', $user->end_date) }}" />
                            @error('end_date')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="apply-start-date-field" class="form-label">Leave Applied Starting Date</label>
                            <input type="date" id="apply-start-date-field" name="apply_start_date" class="form-control @error('apply_start_date') is-invalid @enderror" value="{{ old('apply_start_date', $user->apply_start_date) }}" />
                            @error('apply_start_date')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="apply-end-date-field" class="form-label">Leave Applied Ending Date</label>
                            <input type="date" id="apply-end-date-field" name="apply_end_date" class="form-control @error('apply_end_date') is-invalid @enderror" value="{{ old('apply_end_date', $user->apply_end_date) }}" />
                            @error('apply_end_date')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
    <div class="col-md-3 mb-3">
        <label for="leave-days-field" class="form-label">Leave Days</label>
        <input type="text" id="leave-days-field" name="leave_days" class="form-control" value="{{ old('leave_days', $user->leave_days) }}" readonly />
    </div>

    <!-- Available Leave Field -->
    <div class="col-md-3 mb-3">
        <label for="available-leave" class="form-label">Do you want to reduce days from available leave?</label>
        
        <div class="form-check">
            <input class="form-check-input" type="radio" id="available-leave-yes" name="reduce_available_leave" value="yes"
                {{ old('reduce_available_leave', $user->reduce_available_leave) == 'yes' ? 'checked' : '' }}>
            <label class="form-check-label" for="available-leave-yes">Yes</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" id="available-leave-no" name="reduce_available_leave" value="no"
                {{ old('reduce_available_leave', $user->reduce_available_leave) == 'no' ? 'checked' : '' }}>
            <label class="form-check-label" for="available-leave-no">No</label>
        </div>
    </div>
</div>

                    
                    <!--<div class="row">-->
                    <!--    <div class="col-md-6 mb-3">-->
                    <!--        <label for="approver-field" class="form-label">Leave Approved By</label>-->
                    <!--        <input type="text" id="approver-field" name="approver" class="form-control @error('approver') is-invalid @enderror" placeholder="Enter Approver's Name" value="{{ old('approver', $user->approver) }}" />-->
                    <!--        @error('approver')-->
                    <!--            <div class="invalid-feedback text-red">{{ $message }}</div>-->
                    <!--        @enderror-->
                    <!--    </div>-->

                    <!--    <div class="col-md-6 mb-3">-->
                    <!--        <label for="rejecter-field" class="form-label">Leave Rejecter</label>-->
                    <!--        <input type="text" id="rejecter-field" name="rejecter" class="form-control @error('rejecter') is-invalid @enderror" placeholder="Enter Rejecter's Name" value="{{ old('rejecter', $user->rejecter) }}" />-->
                    <!--        @error('rejecter')-->
                    <!--            <div class="invalid-feedback text-red">{{ $message }}</div>-->
                    <!--        @enderror-->
                    <!--    </div>-->
                    <!--</div>-->

                        <div class="row">
    <div class="col-md-12 mb-3">
        <label for="status-field" class="form-label">Leave Status</label>
        <select class="form-control @error('status') is-invalid @enderror" name="status" id="status-field">
            <option value="">Select Status</option>
            <option value="pending" {{ old('status', $user->status) == 'pending' ? 'selected' : '' }}>pending</option>
            <option value="approved" {{ old('status', $user->status) == 'approved' ? 'selected' : '' }}>approved</option>
            <option value="rejected" {{ old('status', $user->status) == 'rejected' ? 'selected' : '' }}>rejected</option>
        </select>
        @error('status')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row" id="reject-description-container" style="display: {{ old('status', $user->status) == 'rejected' ? 'block' : 'none' }}">
    <div class="col-md-12 mb-3">
        <label for="reject-description-field" class="form-label">Leave Rejecter's Description</label>
        <textarea id="reject-description-field" name="reject_description" class="form-control @error('reject_description') is-invalid @enderror" placeholder="Enter Reason for Rejection">{{ old('reject_description', $user->reject_description) }}</textarea>
        @error('reject_description')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>
</div>

                   
                   <div style="display: flex; justify-content: flex-end; gap: 10px;">
    <div class="hstack gap-2">
        <button type="submit" class="btn btn-success">update</button>
    </div>

    <div class="hstack gap-2">
        <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('leaves.index')}}'">Back</button>
    </div>
</div>
 
                </form>
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
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusField = document.getElementById('status-field');
        const rejectDescriptionContainer = document.getElementById('reject-description-container');

        function toggleRejectDescription() {
            if (statusField.value === 'rejected') {
                rejectDescriptionContainer.style.display = 'block';
            } else {
                rejectDescriptionContainer.style.display = 'none';
            }
        }

        toggleRejectDescription();
        statusField.addEventListener('change', toggleRejectDescription);
    });
</script>

<script>
        $('#district').select2({
            placeholder: 'Select District',
            allowClear: true
        });

    
    
     $(document).ready(function() {
        $('#state').select2({
            placeholder: 'Select District',
            allowClear: true
        });
    });
    
    
     $(document).ready(function() {
        $('#taluka-field').select2({
            placeholder: 'Select District',
            allowClear: true
        });
    });
</script>
<script>

$(document).ready(function() {
    // Initialize select2
    $('#state').select2({ placeholder: 'Select State', allowClear: true });
    $('#district').select2({ placeholder: 'Select District', allowClear: true });
    $('#taluka-field').select2({ placeholder: 'Select Taluka', allowClear: true });
    $('#designation').select2({ placeholder: 'Select Designation', allowClear: true });
    $('#department_name').select2({ placeholder: 'Select Department', allowClear: true });
    $('#organisation').select2({ placeholder: 'Select Organisation', allowClear: true });

    // Set initial values
    var initialState = '{{ $user->state }}';
    var initialDistrict = '{{ $user->district }}';
    var initialTaluka = '{{ $user->taluka }}';
    var initialDesignation = '{{ $user->designation_name }}';
    var initialDepartment = '{{ $user->name }}';
    var initialOrganisation = '{{ $user->org_name }}';

    function loadDropdowns() {
        loadInitialDistricts();
        loadInitialTalukas();
        loadOrganisations();
        loadDepartments();
        loadDesignations();
    }

    function loadInitialDistricts() {
        var state = $('#state').val();
        if (state) {
            var statesData = @json($statesData['states']);
            var selectedState = statesData.find(item => item.state === state);
            var districtDropdown = $('#district');

            districtDropdown.empty().append('<option value="">Select District</option>');

            if (selectedState) {
                selectedState.districts.forEach(district => {
                    districtDropdown.append($('<option>', { value: district, text: district }));
                });
                $('#district').val(initialDistrict).trigger('change');
            }
        }
    }

    function loadInitialTalukas() {
        var state = $('#state').val();
        var district = $('#district').val();
        if (state && district) {
            $.ajax({
                url: '{{ route('tehsils.get') }}',
                type: 'GET',
                data: { state: state, district: district },
                success: function(response) {
                    var talukaDropdown = $('#taluka-field');
                    talukaDropdown.empty().append('<option value="">Select Taluka</option>');
                    response.forEach(taluka => {
                        talukaDropdown.append($('<option>', { value: taluka, text: taluka }));
                    });
                    $('#taluka-field').val(initialTaluka).trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching talukas:', xhr.responseText);
                }
            });
        }
    }

    function loadOrganisations() {
        var state = $('#state').val();
        var district = $('#district').val();
        if (state && district) {
            $.ajax({
                url: '{{ route('organisations.get') }}',
                type: 'GET',
                data: { state: state, district: district },
                success: function(response) {
                    var organisationDropdown = $('#organisation');
                    organisationDropdown.empty().append('<option value="">Select Organisation</option>');
                    response.forEach(org => {
                        organisationDropdown.append($('<option>', { value: org.id, text: org.org_name }));
                    });
                    $('#organisation').val('{{ $user->org_id }}').trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching organisations:', xhr.responseText);
                }
            });
        }
    }

function loadDepartments() {
    console.trace('Function loadDepartments called');
    var state = $('#state').val();
    var district = $('#district').val();
    var organisation = $('#organisation').val();

    console.log('State:', state, 'District:', district, 'Organisation:', organisation);
    console.log('Initial Department ID:', '{{ $user->depart_id }}');

    if (state && district && organisation) {
        console.log('hello');
        $.ajax({
            url: '{{ route('departments.get') }}',
            type: 'GET',
            data: { state: state, district: district, organisation: organisation },
            success: function(response) {
                console.log('Raw Response:', response); // Log the raw response

                if (Array.isArray(response)) {
                    var departmentDropdown = $('#department_name');
                    departmentDropdown.empty().append('<option value="">Select Department</option>');

                    response.forEach(dept => {
                        departmentDropdown.append($('<option>', { value: dept.id, text: dept.name }));
                    });

                    console.log('Available Departments:', response);

                    if (response.some(dept => dept.id == '{{ $user->depart_id }}')) {
                        departmentDropdown.val('{{ $user->depart_id }}').trigger('change');
                        console.log('Department value set:', '{{ $user->depart_id }}');
                    } else {
                        console.warn('Initial Department ID not found in options');
                    }
                } else {
                    console.error('Response is not an array:', response);
                }
            },
            error: function(xhr) {
                console.error('Error fetching departments:', xhr.responseText);
            }
        });
    } else {
        $('#department_name').empty().append('<option value="">Select Department</option>');
    }
}
   

   
    function loadDesignations() {
        var department = $('#department_name').val();
        var taluka = $('#taluka-field').val();
            var organisation = $('#organisation').val();

    if (taluka && organisation) {
            $.ajax({
                url: '{{ route('designations.getByTaluka') }}',
                type: 'GET',
            data: { taluka_id: taluka, organisation_id: organisation },
                success: function(response) {
                    var designationDropdown = $('#designation');
                    designationDropdown.empty().append('<option value="">-- Select Designation --</option>');
                    response.forEach(designation => {
                        designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));
                    });
                    $('#designation').val('{{ $user->design_id }}').trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching designations by taluka:', xhr.responseText);
                }
            });
        } else if (department) {
            $.ajax({
                url: '{{ route('designations.get') }}',
                type: 'GET',
                data: { department_id: department },
                success: function(response) {
                    var designationDropdown = $('#designation');
                    designationDropdown.empty().append('<option value="">-- Select Designation --</option>');
                    response.forEach(designation => {
                        designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));
                    });
                    $('#designation').val('{{ $user->design_id }}').trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching designations:', xhr.responseText);
                }
            });
        }
    }
     // Initialize dropdowns on page load
    loadDropdowns();

    // Attach change handlers
    $('#state').change(function() {
        loadInitialDistricts();
        loadOrganisations();
    });

    $('#district').change(function() {
        loadInitialTalukas();
        loadOrganisations();
    });

    $('#organisation').change(function() {
        loadDepartments();
    });

$('#department_name, #taluka-field, #organisation').change(loadDesignations);
});

    </script>    

    
@endsection
