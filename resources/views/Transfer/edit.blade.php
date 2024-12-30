@extends('layouts.master')
@section('title')
    @lang('translation.edit-user')
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
                <h4 class="card-title mb-0">Transfer & Joining Order</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <form class="leave-form" autocomplete="off" action="{{ route('transfer.update' , $transfer->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- State, District, Taluka -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <select id="state" name="state" class="form-control" required>
                                <option value="">Select State</option>
                                @foreach($statesData['states'] as $state)
                <option value="{{ $state['state'] }}" {{ $transfer->state === $state['state'] ? 'selected' : '' }}>
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
                                            <option value="{{ $transfer->district}}"> {{ $transfer->district}}</option>

                                <!-- Districts will be loaded here -->
                            </select>
                            @error('district')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="organisation" class="form-label">Select Organization</label>
                            <select id="organisation" name="org_id" class="form-select mb-3" required>
                                <option value="">Select Organisation</option>
                            </select>
                        </div>
                    </div><!-- end row -->

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="department_name" class="form-label">Select Department</label>
                            <select name="depart_id" id="department_name" class="form-select mb-3">
                                <option value="">-- Select Department --</option>
                            </select>
                            @error('department_name')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="taluka-field" class="form-label">Taluka</label>
                            <select id="taluka-field" name="taluka" class="form-control" >
            <option value="{{ $transfer->taluka}}">{{ $transfer->taluka}}</option>
                                <!-- Talukas will be loaded here -->
                            </select>
                            @error('taluka')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="designation" class="form-label">Select Designation</label>
                            <select name="design_id" id="designation" class="form-select mb-3">
                                <option value="">-- Select Designation --</option>
                            </select>
                            @error('designation')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div><!-- end row -->
                    
                    
                    
                    
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="name" class="form-label">Profile Name</label>
                            <select id="name" name="user_id" class="form-control">
                                            <option value="{{ $transfer->user_id}}"> {{ $transfer->first_name}}</option>
                            </select>
                            @error('profile_name')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
<div class="col-md-3">
    <label for="last_working_date" class="form-label">Last working day</label>
    <input type="text" id="last_working_date" name="last_working_date" 
        data-provider="flatpickr" data-date-format="d M, Y" 
        class="form-control @error('last_working_date') is-invalid @enderror"
        value="{{ old('last_working_date', $formatted_last_working_date) }}"
        data-initial-value="{{ old('last_working_date', $formatted_last_working_date) }}">
    @error('last_working_date')
        <div class="invalid-feedback text-red">{{ $message }}</div>
    @enderror
</div>
<input type="hidden" id="formatted_last_working_date" name="formatted_last_working_date" />

                       <h6>Transfer To : </h6>
                       
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <select id="state_2" name="transfer_state" class="form-control" required>
                                <option value="">Select State</option>
                                @foreach($statesData['states'] as $state)
                <option value="{{ $state['state'] }}" {{ $transfer->transfer_state === $state['state'] ? 'selected' : '' }}>
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
                            <select id="district_2" name="transfer_district" class="form-control" required>
                                            <option value="{{ $transfer->transfer_district}}"> {{ $transfer->transfer_district}}</option>
                                <!-- Districts will be loaded here -->
                            </select>
                            @error('district')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="organisation" class="form-label">Select Organization</label>
                            <select id="organisation_2" name="transfer_org_id" class="form-select mb-3" required>
                                <option value="">Select Organization</option>
                            </select>
                        </div>
                    </div><!-- end row -->

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="department_name" class="form-label">Select Department</label>
                            <select name="transfer_depart_id" id="department_name_2" class="form-select mb-3">
                                <option value="">-- Select Department --</option>
                            </select>
                            @error('department_name')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="taluka-field" class="form-label">Taluka</label>
                            <select id="taluka-field_2" name="transfer_taluka" class="form-control" >
            <option value="{{ $transfer->transfer_taluka}}">{{ $transfer->transfer_taluka}}</option>
                                <!-- Talukas will be loaded here -->
                            </select>
                            @error('taluka')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="designation" class="form-label">Select Designation</label>
                            <select name="transfer_design_id" id="designation_2" class="form-select mb-3">
                                <option value="">-- Select Designation --</option>
                            </select>
                            @error('designation')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div><!-- end row -->
                    
                    
                    


                    <!-- Profile Name, Joining Date -->
                    
                    <!-- Digital Signature and Verification -->
<!--<div class="row mb-3">-->
<!--    <div class="col-md-12">-->
<!--        <label for="user_digital_sig" class="form-label">Digital Signature User</label>-->
<!--        <input type="file" id="user_digital_sig" name="user_dig_sig" class="form-control @error('user_digital_sig') is-invalid @enderror" onchange="previewImage(event, 'digital-sig-user-preview')" />-->
<!--        @error('user_digital_sig')-->
<!--            <div class="invalid-feedback text-red">{{ $message }}</div>-->
<!--        @enderror-->
<!--        <img id="digital-sig-user-preview" -->
<!--             src="{{ $transfer->user_dig_sig ? asset('images/' . $transfer->user_dig_sig) : '' }}" -->
<!--             alt="Digital Signature Preview" -->
<!--             style="{{ $transfer->user_dig_sig ? '' : 'display: none;' }} max-width: 200px; margin-top: 10px;" />-->
<!--    </div>-->
<!--</div>-->
<!-- end row -->

<!--<div class="row mb-3">-->
<!--    <div class="col-md-12">-->
<!--        <label for="hod_digital_sig" class="form-label">Digital Signature Hod</label>-->
<!--        <input type="file" id="hod_digital_sig" name="hod_dig_sig" class="form-control @error('hod_digital_sig') is-invalid @enderror" onchange="previewImage(event, 'digital-sig-hod-preview')" />-->
<!--        @error('hod_digital_sig')-->
<!--            <div class="invalid-feedback text-red">{{ $message }}</div>-->
<!--        @enderror-->
<!--        <img id="digital-sig-hod-preview" -->
<!--             src="{{ $transfer->hod_dig_sig ? asset('images/' . $transfer->hod_dig_sig) : '' }}" -->
<!--             alt="Digital Signature Preview" -->
<!--             style="{{ $transfer->hod_dig_sig ? '' : 'display: none;' }} max-width: 200px; margin-top: 10px;" />-->
<!--    </div>-->
<!--</div>-->
<!-- end row -->

<!--<div class="row mb-3">-->
<!--    <div class="col-md-12">-->
<!--        <label for="clerk_digital_sig" class="form-label">Digital Signature Clerk</label>-->
<!--        <input type="file" id="clerk_digital_sig" name="clerk_dig_sig" class="form-control @error('clerk_digital_sig') is-invalid @enderror" onchange="previewImage(event, 'digital-sig-clerk-preview')" />-->
<!--        @error('clerk_digital_sig')-->
<!--            <div class="invalid-feedback text-red">{{ $message }}</div>-->
<!--        @enderror-->
<!--        <img id="digital-sig-clerk-preview" -->
<!--             src="{{ $transfer->clerk_dig_sig ? asset('images/' . $transfer->clerk_dig_sig) : '' }}" -->
<!--             alt="Digital Signature Preview" -->
<!--             style="{{ $transfer->clerk_dig_sig ? '' : 'display: none;' }} max-width: 200px; margin-top: 10px;" />-->
<!--    </div>-->
<!--</div>-->
<!-- end row -->

                    <!-- Submit and Cancel Buttons -->
                      <div style="display: flex; justify-content: flex-end; gap: 10px;">
    <div class="hstack gap-2">
        <button type="submit" class="btn btn-success">update</button>
    </div>

    <div class="hstack gap-2">
        <button  type="button" class="btn btn-primary" onclick="window.location.href='{{ route('transfer.index')}}'">Back</button>
    </div>
</div></div><!-- end row -->
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>

<script>
    
    function previewImage(event, previewId) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById(previewId);
        output.src = reader.result;
        output.style.display = 'block';  
    };
    reader.readAsDataURL(event.target.files[0]);
}

    
    
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
    var initialState = '{{ $transfer->state }}';
    var initialDistrict = '{{ $transfer->district }}';
    var initialTaluka = '{{ $transfer->taluka }}';
    var initialDesignation = '{{ $transfer->designation_name }}';
    var initialDepartment = '{{ $transfer->name }}';
    var initialOrganisation = '{{ $transfer->org_name }}';

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
                    $('#organisation').val('{{ $transfer->org_id }}').trigger('change');
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
    console.log('Initial Department ID:', '{{ $transfer->depart_id }}');

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

                    if (response.some(dept => dept.id == '{{ $transfer->depart_id }}')) {
                        departmentDropdown.val('{{ $transfer->depart_id }}').trigger('change');
                        console.log('Department value set:', '{{ $transfer->depart_id }}');
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
                    $('#designation').val('{{ $transfer->design_id }}').trigger('change');
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
                    $('#designation').val('{{ $transfer->design_id }}').trigger('change');
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
    
    
    
    
    
    <script>
        
        
        $(document).ready(function() {
    // Initialize select2 for better styling and functionality
    $('#state_2').select2({ placeholder: 'Select State', allowClear: true });
    $('#district_2').select2({ placeholder: 'Select District', allowClear: true });
    $('#taluka-field_2').select2({ placeholder: 'Select Taluka', allowClear: true });
    $('#designation_2').select2({ placeholder: 'Select Designation', allowClear: true });
    $('#department_name_2').select2({ placeholder: 'Select Department', allowClear: true });
    $('#organisation_2').select2({ placeholder: 'Select Organisation', allowClear: true });


    function loadInitialDistricts2() {
        var state = $('#state_2').val();
        if (state) {
            var statesData = @json($statesData['states']);
            var selectedState = statesData.find(transfer => transfer.state === state);
            var districtDropdown = $('#district_2');

            districtDropdown.empty().append('<option value="">Select District</option>');

            if (selectedState) {
                selectedState.districts.forEach(district => {
                    districtDropdown.append($('<option>', { value: district, text: district }));
                });
                $('#district_2').val(initialDistrict).trigger('change');
            }
        }
    }


    // Function to load talukas based on selected state and district

    function loadInitialTalukas2() {
        var state = $('#state_2').val();
        var district = $('#district_2').val();
        if (state && district) {
            $.ajax({
                url: '{{ route('tehsils.get') }}',
                type: 'GET',
                data: { state: state, district: district },
                success: function(response) {
                    var talukaDropdown = $('#taluka-field_2');
                    talukaDropdown.empty().append('<option value="">Select Taluka</option>');
                    response.forEach(taluka => {
                        talukaDropdown.append($('<option>', { value: taluka, text: taluka }));
                    });
                    $('#taluka-field_2').val(initialTaluka).trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching talukas:', xhr.responseText);
                }
            });
        }
    }

    // Function to load organisations based on selected state and district
    function loadOrganisations2() {
        var state = $('#state_2').val();
        var district = $('#district_2').val();
        if (state && district) {
            $.ajax({
                url: '{{ route('organisations.get') }}',
                type: 'GET',
                data: { state: state, district: district },
                success: function(response) {
                    var organisationDropdown = $('#organisation_2');
                    organisationDropdown.empty().append('<option value="">Select Organisation</option>');
                    response.forEach(org => {
                        organisationDropdown.append($('<option>', { value: org.id, text: org.org_name }));
                    });
                    $('#organisation_2').val('{{ $transfer->transfer_org_id }}').trigger('change');
                },
                error: function(xhr) {
                    console.error('Error fetching organisations:', xhr.responseText);
                }
            });
        }
    }

    // Function to load departments based on selected state, district, and organisation
  
function loadDepartments2() {
    console.trace('Function loadDepartments called');
    var state = $('#state_2').val();
    var district = $('#district_2').val();
    var organisation = $('#organisation_2').val();

    console.log('State:', state, 'District:', district, 'Organisation:', organisation);
    console.log('Initial Department ID:', '{{ $transfer->transfer_depart_id }}');

    if (state && district && organisation) {
        console.log('hello');
        $.ajax({
            url: '{{ route('departments.get') }}',
            type: 'GET',
            data: { state: state, district: district, organisation: organisation },
            success: function(response) {
                console.log('Raw Response:', response); // Log the raw response

                if (Array.isArray(response)) {
                    var departmentDropdown = $('#department_name_2');
                    departmentDropdown.empty().append('<option value="">Select Department</option>');

                    response.forEach(dept => {
                        departmentDropdown.append($('<option>', { value: dept.id, text: dept.name }));
                    });

                    console.log('Available Departments:', response);

                    if (response.some(dept => dept.id == '{{ $transfer->transfer_depart_id }}')) {
                        departmentDropdown.val('{{ $transfer->transfer_depart_id }}').trigger('change');
                        console.log('Department value set:', '{{ $transfer->transfer_depart_id }}');
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
        $('#department_name_2').empty().append('<option value="">Select Department</option>');
    }
}
   
   // Function to load designations based on selected department, taluka, and organisation
function loadDesignations2() {
    var department = $('#department_name_2').val();
    var taluka = $('#taluka-field_2').val();
    var organisation = $('#organisation_2').val(); // Assuming organisation field is present

    var designationDropdown = $('#designation_2');
    designationDropdown.empty().append('<option value="">-- Select Designation --</option>'); // Clear dropdown

    // Case 1: Fetch designations based on both taluka and organisation
    if (taluka && organisation) {
        $.ajax({
            url: '{{ route('designations.getByTaluka') }}',
            type: 'GET',
            data: { taluka_id: taluka, organisation_id: organisation }, // Send taluka and organisation in the request
            success: function(response) {
                response.forEach(designation => {
                    designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));
                });
                $('#designation_2').val('{{ $transfer->transfer_design_id }}').trigger('change');
            },
            error: function(xhr) {
                console.error('Error fetching designations by taluka and organisation:', xhr.responseText);
            }
        });
    } 
    // Case 2: Fetch designations based on department
    else if (department) {
        $.ajax({
            url: '{{ route('designations.get') }}',
            type: 'GET',
            data: { department_id: department },
            success: function(response) {
                response.forEach(designation => {
                    designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));
                });
                $('#designation_2').val('{{ $transfer->transfer_design_id }}').trigger('change'); // Set the existing designation
            },
            error: function(xhr) {
                console.error('Error fetching designations by department:', xhr.responseText);
            }
        });
    }
}

// Event listeners for department, taluka, and organisation changes
 
    
    

    // Initialize dropdowns on page load
    loadDropdowns();

    // Attach change handlers
    $('#state_2').change(function() {
        var state = $(this).val();
        loadInitialDistricts2(state);
        loadOrganisations2(state, $('#district_2').val());
    });

    $('#district_2').change(function() {
        var state = $('#state_2').val();
        var district = $(this).val();
        loadInitialTalukas2(state, district);
        loadOrganisations2(state, district);
    });

    $('#organisation_2').change(function() {
        var state = $('#state_2').val();
        var district = $('#district_2').val();
        var organisation = $(this).val();
        loadDepartments2(state, district, organisation);
    });

  $('#department_name_2, #taluka-field_2, #organisation_2').change(function() {
    loadDesignations2();
});

    // Initial load
    var initialState = '{{ $transfer->transfer_state ?? '' }}';
    var initialDistrict = '{{ $transfer->transfer_district ?? '' }}';
    var initialTaluka = '{{ $transfer->transfer_taluka ?? '' }}';
    var initialDepartment = '{{ $transfer->transfer_depart_id ?? '' }}';
    var initialOrganisation = '{{ $transfer->transfer_org_id ?? '' }}';
    var initialDesignation = '{{ $transfer->transfer_design_id ?? '' }}';



  function loadDropdowns() {
        loadInitialDistricts2();
        loadInitialTalukas2();
        loadOrganisations2();
        loadDepartments2();
        loadDesignations2();
    }

    if (initialState) {
        $('#state_2').val(initialState).trigger('change');
    }
    if (initialDistrict) {
        $('#district_2').val(initialDistrict).trigger('change');
    }
    if (initialTaluka) {
        $('#taluka-field_2').val(initialTaluka).trigger('change');
    }
    if (initialOrganisation) {
        $('#organisation_2').val(initialOrganisation).trigger('change');
    }
    if (initialDepartment) {
        $('#department_name_2').val(initialDepartment).trigger('change');
    }
    if (initialDesignation) {
        $('#designation_2').val(initialDesignation).trigger('change');
    }
});

        
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to convert the date to Laravel format (Y-m-d)
    function convertToLaravelDateFormat(dateString) {
        const dateParts = dateString.replace(',', '').split(' ');
        if (dateParts.length === 3) {
            const day = dateParts[0].padStart(2, '0');
            const month = dateParts[1];
            const year = dateParts[2];

            const months = {
                'Jan': '01', 'Feb': '02', 'Mar': '03', 'Apr': '04',
                'May': '05', 'Jun': '06', 'Jul': '07', 'Aug': '08',
                'Sep': '09', 'Oct': '10', 'Nov': '11', 'Dec': '12'
            };

            const monthNumber = months[month];
            if (monthNumber) {
                return `${year}-${monthNumber}-${day}`;
            }
        }
        return '';  // Return an empty string if the format is incorrect
    }

    // Initialize flatpickr on the input field
    flatpickr("#last_working_date", {
        dateFormat: "d M, Y",
        onChange: function(selectedDates, dateStr) {
            // When the date is changed, update the formatted hidden input
            if (dateStr) {
                const formattedDate = convertToLaravelDateFormat(dateStr);
                document.getElementById('formatted_last_working_date').value = formattedDate;
            }
        }
    });

    const lastWorkingDateInput = document.getElementById('last_working_date');
    const initialDateValue = lastWorkingDateInput.getAttribute('data-initial-value');
    if (initialDateValue) {
        const formattedInitialDate = convertToLaravelDateFormat(initialDateValue);
        document.getElementById('formatted_last_working_date').value = formattedInitialDate || initialDateValue; // Fallback to initial value if formatting fails
    }

    // Event listener to update hidden input before form submission
    document.querySelector('form').addEventListener('submit', function(event) {
        const dateInput = lastWorkingDateInput.value;
        if (dateInput) {
            const formattedDate = convertToLaravelDateFormat(dateInput);
            document.getElementById('formatted_last_working_date').value = formattedDate || dateInput; // Fallback to input value if formatting fails
        }
    });
});
</script>

  @endsection
