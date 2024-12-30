@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet" type="text/css" />


@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Update staff</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <!-- Your existing form container -->
               <form class="leave-form" autocomplete="off" action="{{ route('staff-add.update', $user->id) }}" method="post" enctype="multipart/form-data">
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
            <option value="">Select District</option>
            <!-- Districts will be loaded here -->
        </select>
        @error('district')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="organisation" class="form-label">Select Organisation</label>
        <select id="organisation" name="organisation" class="form-select mb-3">
            <option value="">Select Organisation</option>
            <!-- Organisations will be loaded here -->
        </select>
        @error('organisation')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <label for="department_name" class="form-label">Select Department</label>
        <select name="department_name" id="department_name" class="form-select mb-3">
            <option value="">Select Department</option>
            <!-- Departments will be loaded here -->
        </select>
        @error('department_name')
            <div class="invalid-feedback text-red">{{ $message }}</div>
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
            <option value="">Select Designation</option>
            <!-- Designations will be loaded here -->
        </select>
        @error('designation')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>
</div>


    <div class="row mb-3">
        <div class="col-md-4">
            <label for="first-name-field" class="form-label">First Name</label>
            <input type="text" id="first-name-field" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter First Name" value="{{ $user->first_name}}" />
            @error('first_name')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="middle-name-field" class="form-label">Middle Name</label>
            <input type="text" id="middle-name-field" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" placeholder="Enter Middle Name" value="{{ $user->middle_name}}" />
            @error('middle_name')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="last-name-field" class="form-label">Last Name</label>
            <input type="text" id="last-name-field" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name" value="{{$user->last_name}}" />
            @error('last_name')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <label for="email-field" class="form-label">Email</label>
            <input type="email" id="email-field" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" value="{{$user->email}}" />
            @error('email')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="phone_number-field" class="form-label">Phone Number</label>
            <input type="text" id="phone_number-field" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" value="{{ $user->number}}" />
            @error('phone_number')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="birth_date" class="form-label">Birth Date</label>
            <input type="text" id="birth_date" name="birth_date" data-provider="flatpickr" data-date-format="d M, Y" class="form-control @error('birth_date') is-invalid @enderror" value="{{ $user->birth_date}}" />
            @error('birth_date')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <label for="address-field" class="form-label">Address</label>
            <input type="text" id="address-field" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address" value="{{ $user->address}}" />
            @error('address')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="role_name" class="form-label">Select Role</label>
            <select name="role_name" id="role_name" class="form-select mb-2" required>
                <option value="">-- Select Role --</option>
                <!-- Roles will be loaded dynamically -->
            </select>
            @error('role_name')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="password-field" class="form-label">Password</label>
            <input type="password" id="password-field" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" />
            @error('password')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="password_confirmation-field" class="form-label">Confirm Password</label>
            <input type="password" id="password_confirmation-field" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Enter Confirm Password" />
            @error('password_confirmation')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>
    </div>

   <div style="display: flex; justify-content: flex-end; gap: 10px;">
    <div class="hstack gap-2">
        <button type="submit" class="btn btn-success">update</button>
    </div>

    <div class="hstack gap-2">
        <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('staff-add.index')}}'">Back</button>
    </div>
</div>

</form>
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
    $('#state, #district, #taluka-field, #designation, #department_name, #organisation, #role_name').select2({
        placeholder: 'Select',
        allowClear: true
    });

    // Set initial values
    var initialState = '{{ $user->state }}';
    var initialDistrict = '{{ $user->district }}';
    var initialTaluka = '{{ $user->taluka }}';
    var initialDesignation = '{{ $user->designation_name }}';
    var initialDepartment = '{{ $user->name }}';
    var initialOrganisation = '{{ $user->org_name }}';
    var initialRoles = '{{ $user->role_name }}'; // Corrected naming for consistency

    function loadDropdowns() {
        loadInitialDistricts();
        loadInitialTalukas();
        loadOrganisations();
        loadDepartments();
        loadDesignations();
        loadRoles(); // Corrected naming for consistency
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
                    talukaDropdown.val(initialTaluka).trigger('change');
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
                    organisationDropdown.val('{{ $user->org_id }}').trigger('change');
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

        if (state && district && organisation) {
            $.ajax({
                url: '{{ route('departments.get') }}',
                type: 'GET',
                data: { state: state, district: district, organisation: organisation },
                success: function(response) {
                    var departmentDropdown = $('#department_name');
                    departmentDropdown.empty().append('<option value="">Select Department</option>');
                    response.forEach(dept => {
                        departmentDropdown.append($('<option>', { value: dept.id, text: dept.name }));
                    });
                    departmentDropdown.val('{{ $user->depart_id }}').trigger('change');
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
                    $('#designation').val('{{ $user->designation }}').trigger('change');
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
                    $('#designation').val('{{ $user->designation }}').trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching designations:', xhr.responseText);
                }
            });
        }
    }
    function loadRoles() {
        var designation = $('#designation').val(); 

        if (designation) {
            $.ajax({
                url: '{{ route('fetchroles') }}',
                type: 'GET',
                data: { designation: designation },
                success: function(response) {
                    var rolesDropdown = $('#role_name');
                    rolesDropdown.empty().append('<option value="">Select Role</option>'); // Set default option
                    
                    response.forEach(role => {
                        rolesDropdown.append($('<option>', { value: role.id, text: role.role_name }));
                    });

                    // Set the initial value after the options are loaded
                    if (initialRoles) {
                        rolesDropdown.val(response.find(role => role.role_name === initialRoles)?.id || '').trigger('change'); // Set initial value
                    }
                },
                error: function(xhr) {
                    console.error('Error fetching roles:', xhr.responseText);
                }
            });
        } else {
            $('#role_name').empty().append('<option value="">Select Role</option>');
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

    $('#organisation').change(loadDepartments);
$('#department_name, #taluka-field, #organisation').change(loadDesignations);
    $('#designation').change(loadRoles);
});
</script>

@endsection
