@extends('layouts.master')

@section('title')
    Edit Document Details
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
                <h4 class="card-title mb-0">Edit Document Details</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <form class="leave-form" autocomplete="off" action="{{ route('documents.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- State, District, Taluka, Profile Name (Read-Only) -->
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
        <select id="taluka-field" name="taluka" class="form-control" required>
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
    <input type="text" id="name" name="user_id" class="form-control" value="{{ $user->first_name }} {{ $user->last_name }}" readonly>
</div>


</div>
                    <!-- Document Rows for Editing -->
                    <div id="rows-container">
                        @foreach($documents as $doc)
                            <div class="row mb-3">
                                <!-- Document Name (Editable) -->
                                <div class="col-md-5">
                                    <label for="document-name-{{ $loop->index }}" class="form-label">Document Name</label>
                                    <select id="document-name-{{ $loop->index }}" name="document_name[]" class="form-control">
                                        <option value="">-- Select Document --</option>
                                        @foreach($documentTypes as $type)
                                            <option value="{{ $type }}" {{ $doc->doc_name == $type ? 'selected' : '' }}>
                                                {{ $type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('document_name.*')
                                        <div class="invalid-feedback text-red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Document Upload (Editable) -->
                                <div class="col-md-5">
                                    <label for="document-upload-{{ $loop->index }}" class="form-label">Document Upload</label>
                                    <input type="file" id="document-upload-{{ $loop->index }}" name="document_upload[]" class="form-control @error('document_upload.*') is-invalid @enderror" />
                                    @if($doc->document)
                                        <a href="{{ asset($doc->document) }}" target="_blank">View Current File</a>
                                    @endif
                                    @error('document_upload.*')
                                        <div class="invalid-feedback text-red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Hidden field to keep track of the document id -->
                                <input type="hidden" name="document_ids[]" value="{{ $doc->id }}">
                            </div>
                        @endforeach
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="row mb-3">
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-secondary" onclick="window.history.back();">Back</button>
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
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    
    
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

    $('#department_name, #taluka-field').change(loadDesignations);
});

    </script>    

    
@endsection
