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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">edit Nomination Details</h4>
            </div><!-- end card header -->

            <div class="card-body">
<form class="leave-form" autocomplete="off" action="{{ route('nomination.update', $nomination->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Use PUT method for updating -->

    <!-- State, District, Taluka -->
<!-- State -->
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
    <input type="text" id="name" name="user_id" class="form-control" value="{{ $user->first_name }} {{ $user->last_name }}" readonly>
</div>


</div>

    <!-- Profile Name, Position -->
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="position-field" class="form-label">Position</label>
            <input type="text" id="position-field" name="position" class="form-control @error('position') is-invalid @enderror" placeholder="Enter Position" value="{{ old('position', $nomination->position) }}" />
            @error('position')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Date of Birth, Joining Date -->
  <div class="row mb-3">
    <div class="col-md-6">
        <label for="dob-field" class="form-label">Date of Birth</label>
        <input type="date" id="birth_date" name="birth_date" class="form-control @error('dob') is-invalid @enderror" value="{{ old('birth_date', \Carbon\Carbon::parse($nomination->birth_date)->format('Y-m-d')) }}" />
        @error('dob')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="join-date-field" class="form-label">Joining Date</label>
        <input type="date" id="join-date-field" name="join_date" class="form-control @error('join_date') is-invalid @enderror" value="{{ old('join_date', \Carbon\Carbon::parse($nomination->join_date)->format('Y-m-d')) }}" />
        @error('join_date')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>
</div>

    <div class="col-md-6">
    <label for="nomination_type" class="form-label">Nomination Type</label>
    <select id="nomination_type" name="nomination_type" class="form-control @error('nomination_type') is-invalid @enderror">
        <option >--Nomination Type--</option>
        @foreach($nominationTypes as $nominationType)
            <option value="{{ $nominationType->nomination_type }}" 
                @if($nomination->nomination_type === $nominationType->nomination_type) selected @endif>
                {{ $nominationType->nomination_type }}
            </option>
        @endforeach
    </select>
    @error('nomination_type')
        <div class="invalid-feedback text-red">{{ $message }}</div>
    @enderror
</div>


                    <div id="nominee-sections">
                        @foreach($nominationDetails as $index => $detail)
                        <div class="nominee-section">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="nominee-name-field" class="form-label">Nominee Name</label>
                                    <input type="text" id="nominee-name-field-{{ $index }}" name="nominee_name[]" class="form-control @error('nominee_name.' . $index) is-invalid @enderror" placeholder="Enter Nominee Name" value="{{ old('nominee_name.' . $index, $detail->nominee_name) }}" />
                                    @error('nominee_name.' . $index)
                                        <div class="invalid-feedback text-red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="nominee_dob-field" class="form-label">Nominee Date of Birth</label>
                                    <input type="date" id="nominee_dob-field-{{ $index }}" name="nominee_dob[]" class="form-control @error('nominee_dob.' . $index) is-invalid @enderror" value="{{ old('nominee_dob.' . $index, $detail->nominee_dob) }}" />
                                    @error('nominee_dob.' . $index)
                                        <div class="invalid-feedback text-red">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="nominee-age-field" class="form-label">Nominee Age</label>
                                    <input type="number" id="nominee-age-field-{{ $index }}" name="nominee_age[]" class="form-control @error('nominee_age.' . $index) is-invalid @enderror" value="{{ old('nominee_age.' . $index, $detail->nominee_age) }}" />
                                    @error('nominee_age.' . $index)
                                        <div class="invalid-feedback text-red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="atypical_event-field" class="form-label">Atypical Event</label>
                                    <input type="text" id="atypical_event-field-{{ $index }}" name="atypical_event[]" class="form-control @error('atypical_event.' . $index) is-invalid @enderror" placeholder="Enter Atypical Event" value="{{ old('atypical_event.' . $index, $detail->atypical_event) }}" />
                                    @error('atypical_event.' . $index)
                                        <div class="invalid-feedback text-red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="relationship_nominee-field" class="form-label">Relationship with Nominee</label>
                                    <input type="text" id="relationship_nominee-field-{{ $index }}" name="relationship_nominee[]" class="form-control @error('relationship_nominee.' . $index) is-invalid @enderror" placeholder="Enter Relationship" value="{{ old('relationship_nominee.' . $index, $detail->relationship_nominee) }}" />
                                    @error('relationship_nominee.' . $index)
                                        <div class="invalid-feedback text-red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="nominee_type" class="form-label">Nominee Type</label>
                                    <select id="nominee_type-{{ $index }}" name="nominee_type[]" class="form-control @error('nominee_type.' . $index) is-invalid @enderror">
                                        <option value="">--Nominee Type--</option>
                                        <option value="Main" {{ old('nominee_type.' . $index, $detail->nominee_type) == 'Main' ? 'selected' : '' }}>Main</option>
                                        <option value="Sub" {{ old('nominee_type.' . $index, $detail->nominee_type) == 'Sub' ? 'selected' : '' }}>Sub</option>
                                    </select>
                                    @error('nominee_type.' . $index)
                                        <div class="invalid-feedback text-red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="nominee-amount-field" class="form-label">Nominee Amount</label>
                                    <input type="text" id="nominee-amount-field-{{ $index }}" name="nominee_amount[]" class="form-control @error('nominee_amount.' . $index) is-invalid @enderror" placeholder="Enter Nominee Amount" value="{{ old('nominee_amount.' . $index, $detail->nominee_amount) }}" />
                                    @error('nominee_amount.' . $index)
                                        <div class="invalid-feedback text-red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Hidden input to pass nominee_id -->
                            <input type="hidden" name="nominee_id[]" value="{{ $detail->id }}">
                        </div>
                        @endforeach
                    </div>

                   

    

  <div style="display: flex; justify-content: flex-end; gap: 10px;">
    <div class="hstack gap-2">
        <button type="submit" class="btn btn-success">update</button>
    </div>

    <div class="hstack gap-2">
        <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('nomination-index')}}'">Back</button>
    </div>
</div></form>



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

<script src="{{ URL::asset('build/js/app.js') }}"></script>


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

