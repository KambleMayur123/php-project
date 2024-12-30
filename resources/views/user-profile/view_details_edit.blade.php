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
                <h4 class="card-title mb-0">Edit User Details</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <form class="leave-form" autocomplete="off" action="{{ route('updateuserdetails') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <!-- State, District, Taluka -->
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
    <select id="organisation" name="organisation" class="form-select mb-3">

    </select>
</div>

</div>

<div class="row">
    <div class="col-md-4">
    <label for="department_name" class="form-label">Select Department</label>
    <select name="department_name" id="department_name" class="form-select mb-3">

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
        <select name="designation" id="designation" class="form-select mb-3">
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
    <input type="text" id="name" name="name" class="form-control" value="{{ $user->first_name }}" readonly>
    <input type="hidden" value="{{$user->id}}" name="name">
</div>





</div>

                        <div class="col-md-6">
                            <label for="caste-field" class="form-label">Caste</label>
                            <input type="text" id="caste-field" name="caste" class="form-control @error('caste') is-invalid @enderror" placeholder="Enter Caste" value="{{ old('caste', $user->caste) }}" />
                            @error('caste')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                           <div class="form-group">
    <label>Gender</label><br>
    <label>
        <input type="radio" name="gender" value="male" {{ $user->gender == 'male' ? 'checked' : '' }} onclick="toggleMarriageFields(true)"> Male
    </label>
    <label>
        <input type="radio" name="gender" value="female" {{ $user->gender == 'female' ? 'checked' : '' }} onclick="toggleMarriageFields(true)"> Female
    </label>
</div>

<!-- Marriage fields, shown based on gender selection -->
<div id="marriage-fields" style="display: {{ $user->gender == 'female' ? 'block' : 'none' }};">
    <!-- Before Marriage -->
    <div class="row mt-4">
        <h5>Changed Name</h5>
        <div class="col-md-4">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}" placeholder="First Name">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input type="text" class="form-control" name="middle_name" id="middle_name" value="{{ old('middle_name', $user->middle_name) }}" placeholder="Middle Name">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}" placeholder="Last Name">
            </div>
        </div>
    </div>

    <!-- After Marriage -->
    <div class="row mt-4">
        <h5>After Marriage details</h5>
        <div class="col-md-4">
            <div class="form-group">
                <label for="after_mar_first_name">First Name</label>
                <input type="text" class="form-control" name="after_mar_first_name" id="after_mar_first_name" value="{{ old('after_mar_first_name', $user->after_mar_first_name) }}" placeholder="After Marriage First Name">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="after_mar_mid_name">Middle Name</label>
                <input type="text" class="form-control" name="after_mar_mid_name" id="after_mar_mid_name" value="{{ old('after_mar_mid_name', $user->after_mar_mid_name) }}" placeholder="After Marriage Middle Name">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="after_mar_last_name">Last Name</label>
                <input type="text" class="form-control" name="after_mar_last_name" id="after_mar_last_name" value="{{ old('after_mar_last_name', $user->after_mar_last_name) }}" placeholder="After Marriage Last Name">
            </div>
        </div>
    </div>
</div>

                    <!-- Address A, Address B -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="address-field" class="form-label">Address A<span 
             
            data-bs-toggle="tooltip" 
            data-bs-placement="top" 
            title="Current Address.">
            <i class="mdi mdi-information-variant-circle" style="font-size: 1.2rem;"></i>
        </span></label>
                            <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address A" value="{{ old('address' , $user->address) }}" />
                            @error('address')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="address_B-field" class="form-label">Address B<span 
             
            data-bs-toggle="tooltip" 
            data-bs-placement="top" 
            title="Permanent Address.">
            <i class="mdi mdi-information-variant-circle" style="font-size: 1.2rem;"></i>
        </span></label>
                            <input type="text" id="address_B-field" name="address_B" class="form-control @error('address_B') is-invalid @enderror" placeholder="Enter Address B" value="{{ old('address_B' , $user->address_B) }}" />
                            @error('address_B')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Father's Name and Address -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="father-name-field" class="form-label">Father's Name</label>
                            <input type="text" id="father-name-field" name="father_name" class="form-control @error('father_name') is-invalid @enderror" placeholder="Enter Father's Name" value="{{ old('father_name' , $user->father_name) }}" />
                            @error('father_name')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="father-address-field" class="form-label">Father's Address</label>
                            <input type="text" id="father-address-field" name="father_address" class="form-control @error('father_address') is-invalid @enderror" placeholder="Enter Father's Address" value="{{ old('father_address' , $user->father_address) }}" />
                            @error('father_address')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Birth Date, Birth Text, Height, Birth Mark -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="birth_date" class="form-label">Birth Date</label>
                            <input type="text" id="birth_date" name="birth_date" data-provider="flatpickr" data-date-format="d M, Y" class="form-control @error('birth_date') is-invalid @enderror" value="{{ old('birth_date' , $user->birth_date) }}" />
                            @error('birth_date')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="birth-text-field" class="form-label">Birth Date in Text</label>
                            <input type="text" id="birth-text-field" readonly class="form-control mt-2" placeholder="Date in words will appear here" value="{{ old('birth_text' , $user->birth_text) }}"  />
                            @error('birth_text')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="height-field" class="form-label">Height</label>
                            <input type="text" id="height-field" name="height" class="form-control @error('height') is-invalid @enderror" placeholder="e.g., 5 feet 4 inches" value="{{ old('height' , $user->height) }}" />
                            @error('height')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="birth-mark-field" class="form-label">Birth Mark</label>
                            <input type="text" id="birth-mark-field" name="birth_mark" class="form-control @error('birth_mark') is-invalid @enderror" placeholder="Enter Birth Mark" value="{{ old('birth_mark' , $user->birth_mark) }}" />
                            @error('birth_mark')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Qualification, Another Qualification -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="qualification-field" class="form-label">Joining Time Education Qualification</label>
                            <input type="text" id="qualification-field" name="qualification" class="form-control @error('qualification') is-invalid @enderror" placeholder="Enter Education Qualification" value="{{ old('qualification' , $user->qualification) }}" />
                            @error('qualification')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="another-qualification-field" class="form-label">Additional Qualification</label>
                            <input type="text" id="another-qualification-field" name="another_qualification" class="form-control @error('another_qualification') is-invalid @enderror" placeholder="Enter Additional Qualification" value="{{ old('another_qualification' , $user->another_qualification) }}" />
                            @error('another_qualification')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                               
<!-- Digital Signature User with Date -->
<!--<div class="row mb-3">-->
<!--    <div class="col-md-12">-->
<!--        <label for="digital-sig-field" class="form-label">Digital Signature User with Date</label>-->
<!--        <input type="file" id="digital-sig-field" name="digital_sig" class="form-control @error('digital_sig') is-invalid @enderror" onchange="previewImage(event, 'digital-sig-preview')" />-->
<!--        @error('digital_sig')-->
<!--            <div class="invalid-feedback text-red">{{ $message }}</div>-->
<!--        @enderror-->
<!--        <img id="digital-sig-preview" src="{{ asset('/'.$user->digital_sig) }}" alt="Digital Signature Preview" style="max-width: 200px; margin-top: 10px; {{ $user->digital_sig ? '' : 'display: none;' }}" />-->
<!--    </div>-->
<!--</div>-->

<!-- Digital Signature Verify By -->
<!--<div class="row mb-3">-->
<!--    <div class="col-md-12">-->
<!--        <label for="digital-sig-verify-field" class="form-label">Digital Signature Verify By</label>-->
<!--        <input type="file" id="digital-sig-verify-field" name="digital_sig_verify" class="form-control @error('digital_sig_verify') is-invalid @enderror" onchange="previewImage(event, 'digital-sig-verify-preview')" />-->
<!--        @error('digital_sig_verify')-->
<!--            <div class="invalid-feedback text-red">{{ $message }}</div>-->
<!--        @enderror-->
<!--        <img id="digital-sig-verify-preview" src="{{ asset('/'.$user->digital_sig_verify) }}" alt="Digital Signature Verify Preview" style="max-width: 200px; margin-top: 10px; {{ $user->digital_sig_verify ? '' : 'display: none;' }}" />-->
<!--    </div>-->
<!--</div>-->

<!-- Last Information Check by Date and Post Name -->
<!--<div class="row mb-3">-->
<!--    <div class="col-md-12">-->
<!--        <label for="post-name-field" class="form-label">Last Information Check by Date and Post Name</label>-->
<!--        <input type="file" id="post-name-field" name="post_name" class="form-control @error('post_name') is-invalid @enderror" onchange="previewImage(event, 'post-name-preview')" />-->
<!--        @error('post_name')-->
<!--            <div class="invalid-feedback text-red">{{ $message }}</div>-->
<!--        @enderror-->
<!--        <img id="post-name-preview" src="{{ asset('/'.$user->post_name) }}" alt="Post Name Preview" style="max-width: 200px; margin-top: 10px; {{ $user->post_name ? '' : 'display: none;' }}" />-->
<!--    </div>-->
<!--</div>-->

<!-- Medical Certificate Number -->
<div class="row mb-3">
    <div class="col-md-12">
        <label for="certificate-no-field" class="form-label">Medical Certificate Number</label>
        <input type="text" id="certificate-no-field" name="certificate_no" class="form-control @error('certificate_no') is-invalid @enderror" placeholder="Enter Medical Certificate Number" value="{{ old('certificate_no' , $user->certificate_no) }}" />
        @error('certificate_no')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>
</div>

                               
                               
                    <!-- Submit Button -->
                  <div style="display: flex; justify-content: flex-end; gap: 10px;">
    <div class="hstack gap-2">
        <button type="submit" class="btn btn-success">update</button>
    </div>

    <div class="hstack gap-2">
        <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('user-details-view')}}'">Back</button>
    </div>
</div>
                </form>
            </div><!-- end card-body -->
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
    
    
    
    
        
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>




<script>
    function toggleMarriageFields(show) {
        document.getElementById('marriage-fields').style.display = show ? 'block' : 'none';
    }

    window.onload = function() {
        const selectedGender = '{{ $user->gender }}';
        toggleMarriageFields(selectedGender === 'female');
                toggleMarriageFields(selectedGender === 'male');

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
                    $('#designation').val('{{ $user->design_id  }}').trigger('change');
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
