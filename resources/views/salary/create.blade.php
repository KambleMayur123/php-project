@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')

<div class="row">
     @php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

$userId = Auth::id();

$user = DB::table('users')
    ->join('designations', 'users.design_id', '=', 'designations.id')
    ->join('departments', 'users.depart_id', '=', 'departments.id')
    ->join('organizations', 'users.org_id', '=', 'organizations.id')
    ->select('users.*', 
             'designations.designation_name', 
             'departments.name as department_name', 
             'organizations.org_name as organisation_name')
    ->where('users.id', $userId)
    ->first();
@endphp

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Add Salary</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <!-- Your existing form container -->
<form class="leave-form" autocomplete="off" action="{{ route('salary.details.page') }}" method="get" enctype="multipart/form-data">
    @csrf
    
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="state" class="form-label">State</label>
            <select id="state" name="state" class="form-control" required>
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
            <select id="district" name="district" class="form-control" required>
                <option value="">Select District</option>
                <!-- Districts will be loaded dynamically -->
            </select>
            @error('district')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="organisation" class="form-label">Select Organization</label>
            <select id="organisation" name="org_id" class="form-select" required>
                <option value="">Select organization</option>
                <!-- Organizations will be loaded dynamically -->
            </select>
            @error('organisation')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>
    </div>

                                                                                                                               <div class="row">
                                                
                                                
                                                <div class="col-md-4">
                            <label for="department_name" class="form-label">Select Department</label>
                           <select name="department_name"  id ="department_name" class="form-select mb-3" >
                            <option value="">-- Select Department --</option>
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
                                <option value="">Select Taluka</option>
                                <!-- Talukas will be loaded here -->
                            </select>
                            @error('taluka')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        
                                        <div class="col-md-4">
    <label for="designation" class="form-label">Select Designation</label>
    <select name="designation" id="designation" class="form-select mb-3">
        <option value="">-- Select Designation --</option>
    </select>
    @error('designation')
    <div class="invalid-feedback" style="color: red;">
        {{ $message }}
    </div>
    @enderror
</div>   
                        
                        

                                                





</div>

        <div class="row mb-3">
         <div class="col-md-3">
                            <label for="name" class="form-label">Select Profile</label>
                            <select id="name" name="name" class="form-control">
                                <option value="">Select Profile</option>
                            </select>
                            @error('profile_name')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
          <div class="col-md-3">
                            <label for="salary_type" class="form-label">Salary Type</label>
                            <select id="salary_type" name="salary_type" class="form-control">
                                <option value="">Select Profile Name</option>
                                <option value="education">Education</option>
                                <option value="other">Other</option>
                            </select>
                            @error('salary_type')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
<div class="col-md-3">
    <label for="join_start_salary" class="form-label">Joining Starting Salary</label>
    <input type="number" id="join_start_salary" name="join_start_salary" class="form-control">
    @error('join_start_salary')
        <div class="invalid-feedback text-red">{{ $message }}</div>
    @enderror
</div>


<div class="col-md-3">
    <label for="joining_date" class="form-label">Joining Date</label>
    <input type="date" id="joining_date" name="joining_date" class="form-control">
    @error('joining_date')
        <div class="invalid-feedback text-red">{{ $message }}</div>
    @enderror
</div>

                        
       </div>
       
    <div class="hstack gap-2 justify-content-end">
        <button type="submit" class="btn btn-success">get details</button>
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
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>




<script>
$(document).ready(function() {
    // Initialize select2 for better dropdown styling
    $('#state').select2({ placeholder: 'Select State', allowClear: true });
    $('#district').select2({ placeholder: 'Select District', allowClear: true });
    $('#taluka-field').select2({ placeholder: 'Select Taluka', allowClear: true });
    $('#designation').select2({ placeholder: 'Select Designation', allowClear: true });
    $('#department_name').select2({ placeholder: 'Select Department', allowClear: true });
    $('#organisation').select2({ placeholder: 'Select Organisation', allowClear: true });

    // Set initial values using user details
    var initialState = '{{ old('state', $user->state) }}';
    var initialDistrict = '{{ old('district', $user->district) }}';
    var initialTaluka = '{{ old('taluka', $user->taluka) }}';
    var initialDesignation = '{{ old('designation', $user->design_id) }}';
    var initialDepartment = '{{ old('department_name', $user->depart_id) }}';
    var initialOrganisation = '{{ old('organisation', $user->org_id) }}';

    // Initialize dropdowns with initial values
    $('#state').val(initialState).trigger('change');
    $('#district').val(initialDistrict).trigger('change');
    $('#taluka-field').val(initialTaluka).trigger('change');
    $('#designation').val(initialDesignation).trigger('change');
    $('#department_name').val(initialDepartment).trigger('change');
    $('#organisation').val(initialOrganisation).trigger('change');

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
                // Set selected value to the initial district
                districtDropdown.val(initialDistrict).trigger('change');
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
                    // Set selected value to the initial taluka
                    talukaDropdown.val(initialTaluka).trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching talukas:', xhr.responseText);
                }
            });
        } else {
            $('#taluka-field').empty().append('<option value="">Select Taluka</option>');
        }
    }

    function loadOrganisations() {
        var state = $('#state').val() || initialState; // Use selected state or initial
        var district = $('#district').val() || initialDistrict; // Use selected district or initial
        var organisationDropdown = $('#organisation');


        organisationDropdown.empty().append('<option value="">Select Organisation</option>');

        if (state && district) {
            $.ajax({
                url: '{{ route('organisations.get') }}',
                type: 'GET',
                data: { state: state, district: district },
                success: function(response) {
                    response.forEach(org => {
                        if (!organisationDropdown.find('option[value="' + org.id + '"]').length) { // Prevent duplicates
                            organisationDropdown.append($('<option>', { value: org.id, text: org.org_name }));
                        }
                    });
                    // Set selected value to the initial organisation
                    organisationDropdown.val(initialOrganisation).trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching organisations:', xhr.responseText);
                }
            });
        }
    }

    function loadDepartments() {
        var state = $('#state').val();
        var district = $('#district').val();
        var organisation = $('#organisation').val();
        var departmentDropdown = $('#department_name');

        departmentDropdown.empty().append('<option value="">Select Department</option>');

        if (state && district && organisation) {
            $.ajax({
                url: '{{ route('departments.get') }}',
                type: 'GET',
                data: { state: state, district: district, organisation: organisation },
                success: function(response) {
                    response.forEach(dept => {
                        if (!departmentDropdown.find('option[value="' + dept.id + '"]').length) { // Prevent duplicates
                            departmentDropdown.append($('<option>', { value: dept.id, text: dept.name }));
                        }
                    });
                    // Set selected value to the initial department
                    departmentDropdown.val(initialDepartment).trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching departments:', xhr.responseText);
                }
            });
        }
    }

    function loadDesignations() {
        var department = $('#department_name').val();
        var taluka = $('#taluka-field').val();
        var organisation = $('#organisation').val();
        var designationDropdown = $('#designation');

        designationDropdown.empty().append('<option value="">-- Select Designation --</option>');

        if (taluka && organisation) {
            $.ajax({
                url: '{{ route('designations.getByTaluka') }}',
                type: 'GET',
                data: { taluka_id: taluka, organisation_id: organisation },
                success: function(response) {
                    response.forEach(designation => {
                        if (!designationDropdown.find('option[value="' + designation.id + '"]').length) { // Prevent duplicates
                            designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));
                        }
                    });
                    // Set selected value to the initial designation
                    designationDropdown.val(initialDesignation).trigger('change');
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
                    response.forEach(designation => {
                        if (!designationDropdown.find('option[value="' + designation.id + '"]').length) { // Prevent duplicates
                            designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));
                        }
                    });
                    // Set selected value to the initial designation
                    designationDropdown.val(initialDesignation).trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching designations:', xhr.responseText);
                }
            });
        }
    }
    
function fetchProfileName() {
    var designation = $('#designation').val(); 
    if (designation) {
        $.ajax({
            url: '{{ route('fetch.profiles') }}',  // Ensure this route returns profiles based on designation
            type: 'GET',
            data: { designation: designation },
            success: function(response) {
                var profileDropdown = $('#name'); // The profile dropdown
                profileDropdown.empty().append('<option value="">Select Profile Name</option>');

                response.forEach(function(user) {
                    profileDropdown.append($('<option>', {
                        value: user.id,
                        text: `${user.first_name} ${user.last_name}`
                    }));
                });

                // Set the selected profile based on old value
                var selectedProfile = '{{ old('name', $user->profile_id ?? '') }}'; // Get the old value or the existing profile id
                profileDropdown.val(selectedProfile); // Set the old or pre-filled value
            },
            error: function(xhr) {
                console.error('Error fetching profiles:', xhr.responseText);
            }
        });
    } else {
        $('#name').empty().append('<option value="">Select Profile Name</option>'); // Reset if no designation is selected
    }
}

    // Attach change handlers to reload dependent dropdowns
    $('#state').change(function() {
        loadInitialDistricts();
        loadOrganisations();
    });

    $('#district').change(function() {
        loadInitialTalukas();
        loadOrganisations();
                    $('#designation').empty().append('<option value="">-- Select Designation --</option>');

    });

    $('#organisation').change(function() {
        loadDepartments();
    });

    $('#department_name, #taluka-field, #organisation').change(function() {
        loadDesignations();
    });
    
     $('#designation').change(function() {
        fetchProfileName();
    });

    // Initialize dropdowns on page load
    loadDropdowns();
});
</script>

@endsection