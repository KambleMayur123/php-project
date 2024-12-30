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
                <h4 class="card-title mb-0">Add Organization Login</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <!-- Your existing form container -->
              <form class="leave-form" autocomplete="off" action="{{ route('organization.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="state" class="form-label">State</label>
            <select id="state" name="state" class="form-control" required>
                <option value="">Select State</option>
                @foreach($statesData['states'] as $state)
                    <option value="{{ $state['state'] }}">{{ $state['state'] }}</option>
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
            <select id="organisation" name="organisation" class="form-select" required>
                <option value="">Select organisation</option>
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
                            <select id="taluka-field" name="taluka" class="form-control" required>
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

        <div class="col-md-4">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter First Name" value="{{ old('first_name') }}" required>
            @error('first_name')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="middle_name" class="form-label">Middle Name</label>
            <input type="text" id="middle_name" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" placeholder="Enter Middle Name" value="{{ old('middle_name') }}">
            @error('middle_name')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name" value="{{ old('last_name') }}" required>
            @error('last_name')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" value="{{ old('email') }}" required>
        @error('email')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="number" class="form-label">Mobile No</label>
        <input type="tel" id="number" name="number" class="form-control @error('number') is-invalid @enderror" placeholder="Enter Contact Number" value="{{ old('number') }}" required>
        @error('number')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Enter Username" value="{{ old('username') }}" required>
        @error('username')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" required>
        @error('password')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address" value="{{ old('address') }}" required>
        @error('address')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="profile_pic" class="form-label">Profile Picture</label>
        <input type="file" id="profile_pic" name="profile_pic" class="form-control @error('profile_pic') is-invalid @enderror">
        @error('profile_pic')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>

    <div class="hstack gap-2 justify-content-end">
        <button type="submit" class="btn btn-success">Add</button>
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
        $('#district').select2({
            placeholder: 'Select District',
            allowClear: true
        });
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
            // Handle state selection change
            $('#state').change(function() {
                var state = $(this).val();
                var statesData = @json($statesData['states']); // Pass states data to JavaScript

                var districtDropdown = $('#district');
                districtDropdown.empty().append('<option value="">Select District</option>'); // Clear existing options

                var selectedState = statesData.find(function(item) {
                    return item.state === state;
                });

                if (selectedState) {
                    selectedState.districts.forEach(function(district) {
                        districtDropdown.append($('<option>', {
                            value: district,
                            text: district
                        }));
                    });
                }

                $('#taluka-field').empty().append('<option value="">Select Taluka</option>');
                $('#name').empty().append('<option value="">Select Profile Name</option>'); // Clear existing options
            });

            // Handle district selection change
            $('#district').change(function() {
                var state = $('#state').val();
                var district = $(this).val();

                if (state && district) {
                    $.ajax({
                        url: '{{ route('tehsils.get') }}', // Ensure this matches your route
                        type: 'GET',
                        data: { state: state, district: district },
                        success: function(response) {
                            var talukaDropdown = $('#taluka-field');
                            talukaDropdown.empty().append('<option value="">Select Taluka</option>'); 

                            response.forEach(function(taluka) {
                                talukaDropdown.append($('<option>', {
                                    value: taluka,
                                    text: taluka
                                }));
                            });
                        },
                        error: function(xhr) {
                            console.error('Error fetching talukas:', xhr.responseText);
                        }
                        
                        
                    });
                
                    
                    
                    
                }
                
                
                
                
                
                
                        
                
                
            });

            $('#designation').change(function() {
                var designation = $(this).val(); 

                if (designation) {
                    $.ajax({
                        url: '{{ route('fetch.profiles') }}',
                        type: 'GET',
                        data: {designation: designation },
                        success: function(response) {
                            var profileDropdown = $('#name');
                            profileDropdown.empty().append('<option value="">Select Profile Name</option>');

                            response.forEach(function(user) {
                                profileDropdown.append($('<option>', {
                                    value: user.id,
                                    text: `${user.first_name} ${user.last_name}`
                                }));
                            });
                        },
                        error: function(xhr) {
                            console.error('Error fetching profiles:', xhr.responseText);
                        }
                    });
                }
            });
        });
        
        
        
        
        
        
        
        
        
        $('#district').change(function() {
    var state = $('#state').val();
    var district = $(this).val();

    if (state && district) {
        // AJAX request to fetch organisations
        $.ajax({
            url: '{{ route('organisations.get') }}',
            type: 'GET',
            data: { state: state, district: district },
            success: function(response) {
                var organisationDropdown = $('#organisation');
                organisationDropdown.empty().append('<option value="">Select Organisation</option>');

                if (response.length === 0) {
                    console.warn('No organisations found for the selected district.');
                } else {
                    response.forEach(function(org) {
                        organisationDropdown.append($('<option>', {
                            value: org.id,
                            text: org.org_name
                        }));
                    });
                }
            },
            error: function(xhr) {
                console.error('Error fetching organisations:', xhr.responseText);
            }
        });
    } else {
        console.warn('State or district is missing.');
    }
});

          
        
        


                     $('#organisation').change(function() {
    var state = $('#state').val();
        var district = $('#district').val();

    var organisation = $(this).val();

    if (state && district && organisation) {
        $.ajax({
            url: '{{ route('departments.get') }}',
            type: 'GET',
            data: { state: state, district: district ,  organisation: organisation},
            success: function(response) {
                var departmentDropdown = $('#department_name');
                departmentDropdown.empty().append('<option value="">Select department</option>');

                if (response.length === 0) {
                    console.warn('No organisations found for the selected district.');
                } else {
                    response.forEach(function(depart) {
                        departmentDropdown.append($('<option>', {
                            value: depart.id,
                            text: depart.name
                        }));
                    });
                }
            },
            error: function(xhr) {
                console.error('Error fetching organisations:', xhr.responseText);
            }
        });
    } else {
        console.warn('State or district is missing.');
    }
});











function fetchDesignations() {
    var department = $('#department_name').val();
    var taluka = $('#taluka-field').val();

    if (taluka) {
        // Fetch designations based on taluka
        $.ajax({
            url: '{{ route('designations.getByTaluka') }}',
            type: 'GET',
            data: { taluka_id: taluka },
            success: function(response) {
                var designationDropdown = $('#designation');
                designationDropdown.empty().append('<option value="">-- Select Designation --</option>');

                if (response.length === 0) {
                    console.warn('No designations found for the selected taluka.');
                } else {
                    response.forEach(function(designation) {
                        designationDropdown.append($('<option>', {
                            value: designation.id,
                            text: designation.designation_name,
                        }));
                    });
                }
            },
            error: function(xhr) {
                console.error('Error fetching designations by taluka:', xhr.responseText);
            }
        });
    } else if (department) {
        // Fetch designations based on department
        $.ajax({
            url: '{{ route('designations.get') }}',
            type: 'GET',
            data: { department_id: department },
            success: function(response) {
                var designationDropdown = $('#designation');
                designationDropdown.empty().append('<option value="">-- Select Designation --</option>');

                if (response.length === 0) {
                    console.warn('No designations found for the selected department.');
                } else {
                    response.forEach(function(designation) {
                        designationDropdown.append($('<option>', {
                            value: designation.id,
                            text: designation.designation_name,
                        }));
                    });
                }
            },
            error: function(xhr) {
                console.error('Error fetching designations:', xhr.responseText);
            }
        });
    } else {
        console.warn('Neither department nor taluka is selected.');
    }
}

$('#department_name').change(fetchDesignations);
$('#taluka-field').change(fetchDesignations);


        

        

        
        
        
</script>
@endsection
