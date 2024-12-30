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
                <h4 class="card-title mb-0">Add User</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <!-- Your existing form container -->
                <form class="leave-form"  autocomplete="off" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
<div class="row mb-3">
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <select id="state" name="state" class="form-control" >
                                <option value="">Select State</option>
                                @foreach($statesData['states'] as $state)
                <option value="{{ $state['state'] }}" {{ $user->state === $state['state'] ? 'selected' : '' }}>
                    {{ $state['state'] }}
                </option>
                                 @endforeach
                            </select>
                            @error('state')
        <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="district" class="form-label">District</label>
                            <select id="district" name="district" class="form-control" >
                                <option value="">Select District</option>
                                 Districts will be loaded here 
                            </select>
                            @error('district')
        <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        
                        
                                                                                                  <div class="col-md-4">
                            <label for="organisation" class="form-label">select organisation</label>
                            <select id="organisation" name="organisation" class="form-select mb-3" >
                                <option value="">Select organization</option>
                            </select>
                                                        @error('organisation')
        <div class="invalid-feedback d-block">{{ $message }}</div>
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
        <div class="invalid-feedback d-block">{{ $message }}
        </div>
                        @enderror
                            </div>


                        
                        
                        
                                                                                        <div class="col-md-4">
                            <label for="taluka-field" class="form-label">Taluka</label>
                            <select id="taluka-field" name="taluka" class="form-control" >
                                <option value="">Select Taluka</option>
                                 Talukas will be loaded here 
                            </select>
                            @error('taluka')
        <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        
                                        <div class="col-md-4">
    <label for="designation" class="form-label">Select Designation</label>
    <select name="designation" id="designation" class="form-select mb-3">
        <option value="">-- Select Designation --</option>
    </select>
    @error('designation')
            <div class="invalid-feedback d-block">{{ $message }}</div>

    @enderror
</div>   
                        
                        
                                     
                                                





</div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        


                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="first-name-field" class="form-label">First Name</label>
                            <input type="text" id="first-name-field" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter First Name" value="{{ old('first_name') }}" />
                            @error('first_name')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="middle-name-field" class="form-label">Middle Name</label>
                            <input type="text" id="middle-name-field" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" placeholder="Enter Middle Name" value="{{ old('middle_name') }}" />
                            @error('middle_name')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="last-name-field" class="form-label">Last Name</label>
                            <input type="text" id="last-name-field" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name" value="{{ old('last_name') }}" />
                            @error('last_name')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email-field" class="form-label">Email</label>
                        <input type="email" id="email-field" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" value="{{ old('email') }}" />
                        @error('email')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="contact-field" class="form-label">Contact</label>
                        <input type="tel" id="contact-field" name="number" class="form-control @error('number') is-invalid @enderror" placeholder="Enter Contact Number" value="{{ old('number') }}" />
                        @error('number')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    
                   <div class="row mb-3">
                                            <div class="col-md-3">
                        <label for="birth_date" class="form-label">Birth Date</label>
                        <input type="text" id="birth_date" name="birth_date" data-provider="flatpickr" data-date-format="d M, Y" class="form-control @error('birth_date') is-invalid @enderror" value="{{ old('birth_date') }}" />
                        @error('birth_date')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>
                    
                        <input type="hidden" id="formatted_birth_date" name="formatted_birth_date" />


                    <div class="col-md-3">
                        <label for="birth-text-field" class="form-label">Birth Date in Text</label>
    <input type="text" id="birth-text-field" name="birth_text" class="form-control mt-2" placeholder="Date in words will appear here" readonly/>
                        @error('birth_text')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>


                    

                    <div class="mb-3">
                        <label for="address-field" class="form-label">Address</label>
                        <input type="text" id="address-field" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address" value="{{ old('address') }}" />
                        @error('address')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>
<div class="mb-3">
    <label for="total-leaves-field" class="form-label">Total Yearly Leaves</label>
    <input type="number" id="total-leaves" name="leaves" class="form-control @error('leaves') is-invalid @enderror" placeholder="Enter Total Yearly Leaves" value="{{ old('leaves') }}" />
    @error('leaves')
        <div class="invalid-feedback text-red">{{ $message }}</div>
    @enderror
</div>
                    
                       <div class="mb-3">
    <label for="available-leaves-field" class="form-label">Available Leaves</label>
    <input type="number" id="available-leaves" name="available_leave" class="form-control" placeholder="Available Leaves" />
</div>


                    <div class="mb-3">
                    <label for="file1" class="form-label">Upload Old Book</label>
                    <input type="file" name="old_book" id="file1" class="form-control" onchange="uploadFile()" />
                    <small class="form-text text-muted">Choose a file to upload.</small>
                
                    <div class="mt-2">
                        <progress id="progressBar" value="0" max="100" style="width: 100%; height: 25px;"></progress>
                    </div>
                
                    <div class="mt-2">
                        
                        <p id="Uploadstatus" class="small text-muted"></p>
                        <p id="loaded_n_total" class="small text-muted" style="display: inline-block;"></p>
                    </div>
                    
                    @error('old_book')
                        <div class="invalid-feedback text-red">{{ $message }}</div>
                    @enderror
                </div>


                        <div style="display: flex; justify-content: flex-end; gap: 10px;">
    <div class="hstack gap-2">
        <button type="submit" class="btn btn-success">submit</button>
    </div>

    <div class="hstack gap-2">
        <button type="button"class="btn btn-primary" onclick="window.location.href='{{ route('users.index')}}'">Back</button>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script>
    document.getElementById('total-leaves').addEventListener('input', function() {
        var totalLeaves = this.value;
        document.getElementById('available-leaves').value = totalLeaves;
    });
</script>


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
            var state = $('#state').val() || initialState;
            var district = $('#district').val() || initialDistrict;
            var organisationDropdown = $('#organisation');

            organisationDropdown.empty().append('<option value="">Select Organisation</option>');

            if (state && district) {
                $.ajax({
                    url: '{{ route('organisations.get') }}',
                    type: 'GET',
                    data: { state: state, district: district },
                    success: function(response) {
                        response.forEach(org => {
                            if (!organisationDropdown.find('option[value="' + org.id + '"]').length) {
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
                            if (!departmentDropdown.find('option[value="' + dept.id + '"]').length) {
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

            // Clear the designation dropdown first
            designationDropdown.empty().append('<option value="">-- Select Designation --</option>');

            if (taluka && organisation) {
                $.ajax({
                    url: '{{ route('designations.getByTaluka') }}',
                    type: 'GET',
                    data: { taluka_id: taluka, organisation_id: organisation },
                    success: function(response) {
                        response.forEach(designation => {
                            designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));
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
                            designationDropdown.append($('<option>', { value: designation.id, text: designation.designation_name }));
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

        // Attach change handlers to reload dependent dropdowns
        $('#state').change(function() {
            loadInitialDistricts();
            loadOrganisations();
        });

        $('#district').change(function() {
            loadInitialTalukas();
            loadOrganisations();
            // Always clear the designation when district changes
            $('#designation').empty().append('<option value="">-- Select Designation --</option>');
        });

        $('#organisation').change(function() {
            loadDepartments();
        });

        $('#department_name, #taluka-field, #organisation').change(function() {
            loadDesignations();
        });

        // Initialize dropdowns on page load
        loadDropdowns();
    });
</script>
    
    
    
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Convert date from display format (e.g., 19 Sep, 2023) to Laravel format (Y-m-d)
    function convertToLaravelDateFormat(dateString) {
        const dateParts = dateString.replace(',', '').split(' ');
        const day = dateParts[0];
        const month = dateParts[1];
        const year = dateParts[2];

        const months = {
            'Jan': '01', 'Feb': '02', 'Mar': '03', 'Apr': '04',
            'May': '05', 'Jun': '06', 'Jul': '07', 'Aug': '08',
            'Sep': '09', 'Oct': '10', 'Nov': '11', 'Dec': '12'
        };

        const monthNumber = months[month];

        return `${year}-${monthNumber}-${day.padStart(2, '0')}`;  // Output in Y-m-d format
    }

    // Event listener to update the hidden input before form submission
    document.getElementById('birth_date').addEventListener('change', function() {
        const dateString = this.value;
        if (dateString) {
            const formattedDate = convertToLaravelDateFormat(dateString);
            document.getElementById('formatted_birth_date').value = formattedDate;
        }
    });

    // Optional: Prevent form submission and manually set formatted date if needed
    document.querySelector('form').addEventListener('submit', function(event) {
        const birthDateInput = document.getElementById('birth_date').value;
        if (birthDateInput) {
            document.getElementById('formatted_birth_date').value = convertToLaravelDateFormat(birthDateInput);
        }
    });
});
</script>

    
    
    
    
    
    
    
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to convert number to text
    function numberToText(num) {
        const ones = [
            '', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'
        ];
        const teens = [
            'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
        ];
        const tens = [
            '', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'
        ];

        if (num === 0) return 'zero';

        if (num < 10) return ones[num];
        if (num < 20) return teens[num - 10];
        if (num < 100) return tens[Math.floor(num / 10)] + (num % 10 ? '-' + ones[num % 10] : '');

        if (num < 1000) {
            return ones[Math.floor(num / 100)] + ' hundred' + (num % 100 ? ' and ' + numberToText(num % 100) : '');
        }

        if (num < 1000000) {
            return numberToText(Math.floor(num / 1000)) + ' thousand' + (num % 1000 ? ' ' + numberToText(num % 1000) : '');
        }

        if (num < 1000000000) {
            return numberToText(Math.floor(num / 1000000)) + ' million' + (num % 1000000 ? ' ' + numberToText(num % 1000000) : '');
        }

        return numberToText(Math.floor(num / 1000000000)) + ' billion' + (num % 1000000000 ? ' ' + numberToText(num % 1000000000) : '');
    }

    // Function to convert a date string into text format
    function convertDateToText(dateString) {
        const parts = dateString.replace(',', '').split(' '); 
        
        
                const day = parts[0];
        const month = parts[1];
        const year = parts[2];



        const months = {
            'Jan': 'January', 'Feb': 'February', 'Mar': 'March', 'Apr': 'April',
            'May': 'May', 'Jun': 'June', 'Jul': 'July', 'Aug': 'August', 'Sep': 'September',
            'Oct': 'October', 'Nov': 'November', 'Dec': 'December'
        };

        const dayText = numberToText(parseInt(day));
        const monthText = months[month];
        const yearText = numberToText(parseInt(year));

        return `${dayText} ${monthText} ${yearText}`;
    }

    // Event listener to handle date input change
    document.getElementById('birth_date').addEventListener('input', function() {
        const dateString = this.value;
        if (dateString) {
            document.getElementById('birth-text-field').value = convertDateToText(dateString);
        }
    });
});
</script>


<script>
function _(el) {
    return document.getElementById(el);
}

function uploadFile() {
    var file = _("file1").files[0];
    if (!file) {
        _("Uploadstatus").innerHTML = "No file selected";
        return;
    }

    var formdata = new FormData();
    formdata.append("file1", file);

    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);

    ajax.open("POST", "file_upload_parser.php"); // Modify this with your actual file upload route.
    ajax.send(formdata);
}

function progressHandler(event) {
    var totalMB = (event.total / (1024 * 1024)).toFixed(2);
    var loadedMB = (event.loaded / (1024 * 1024)).toFixed(2);

    _("loaded_n_total").innerHTML = `Uploaded ${loadedMB} MB of ${totalMB} MB`;

    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("Uploadstatus").innerHTML = `Uploading... ${Math.round(percent)}% completed`;
    
    // Reset color on progress
    _("progressBar").style.backgroundColor = "#d3d3d3"; // Light gray by default
}

function completeHandler(event) {
    _("Uploadstatus").innerHTML = "Upload completed successfully!";
    _("progressBar").style.backgroundColor = "blue"; // Change progress bar color to blue
    _("progressBar").value = 100; // Ensure it's filled to 100%
}

function errorHandler(event) {
    _("Uploadstatus").innerHTML = "Upload failed";
}

function abortHandler(event) {
    _("Uploadstatus").innerHTML = "Upload aborted";
}

</script>
@endsection
