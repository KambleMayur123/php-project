@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Edit affidavit</h4>
            </div>

            <div class="card-body">
                <form class="leave-form"id="affidavit" method="POST" action="{{ route('updateaffidavit', $Affidavit->id) }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
    <input type="text" id="name" name="user_id" class="form-control" value="{{ $user->first_name }}" readonly>
</div>


</div>
                      <div class="row">
                        <div class="col-md-6">
    <label for="affidavit_name" class="form-label">Select Affidavit Name</label>
    <select name="affidavit_name" id="affidavit_name" class="form-select mb-3">
        <option value="">-- Select Affidavit --</option>
        @foreach($AffidavitType as $AffidavitTypes)
            <option value="{{ $AffidavitTypes->id }}" {{ $Affidavit->affidavit_name == $AffidavitTypes->id ? 'selected' : '' }}>{{ $AffidavitTypes->name }}</option>
        @endforeach
    </select>
    @error('affidavit_name')
        <div class="invalid-feedback" style="color: red;">
            {{ $message }}
        </div>
    @enderror
</div>

                    </div>
               <div class="row" id="memoField">
    <div class="form-group col-md-12">
        <label for="memo">Memo:</label>
        <div id="memo-editor" contenteditable="true" style="border: 1px solid #ccc; height: 200px; overflow-y: auto; padding: 10px;">
            {!! old('affidavit_memo', $Affidavit->affidavit_memo) !!}
        </div>
        <textarea id="memo" name="affidavit_memo" style="display:none;">{!! old('affidavit_memo', $Affidavit->affidavit_memo) !!}</textarea>
    </div>
</div>






   <div class="row mb-3">
    <div class="col-md-12">
        <label for="reference_docs" class="form-label">Reference Documents (PDF only)</label>
        <input type="file" id="reference_docs" name="reference_docs" class="form-control @error('reference_docs') is-invalid @enderror" />
        
        @if($Affidavit->refrence_docs)
            <div class="mt-3">
                <a href="{{ asset('images/'.$Affidavit->refrence_docs) }}" target="_blank">View PDF</a>
            </div>
        @endif
        
        @error('reference_docs')
            <div class="invalid-feedback text-red">{{ $message }}</div>
        @enderror
    </div>
</div>


                 <!--<div class="row mb-3">-->
                 <!--       <div class="col-md-12">-->
                 <!--           <label for="witness_signature" class="form-label">witness Signature</label>-->
                 <!--           <input type="file" id="witness_signature" name="witness_signature" class="form-control @error('witness_signature') is-invalid @enderror" />-->
                 <!--           @if($Affidavit->witness_signature)-->
                 <!--               <img id="hod-signature-preview" src="{{ asset('images/'.$Affidavit->witness_signature) }}" alt="HOD Signature Preview" style="max-width: 200px; margin-top: 10px;" />-->
                 <!--           @endif-->
                 <!--           @error('witness_signature')-->
                 <!--               <div class="invalid-feedback text-red">{{ $message }}</div>-->
                 <!--           @enderror-->
                 <!--       </div>-->
                 <!--   </div>-->


                    <!--<div class="row mb-3">-->
                    <!--    <div class="col-md-12">-->
                    <!--        <label for="hod_signature" class="form-label">HOD Signature</label>-->
                    <!--        <input type="file" id="hod_signature" name="hod_signature" class="form-control @error('hod_signature') is-invalid @enderror" />-->
                    <!--        @if($Affidavit->hod_signature)-->
                    <!--            <img id="hod-signature-preview" src="{{ asset('images/'.$Affidavit->hod_signature) }}" alt="HOD Signature Preview" style="max-width: 200px; margin-top: 10px;" />-->
                    <!--        @endif-->
                    <!--        @error('hod_signature')-->
                    <!--            <div class="invalid-feedback text-red">{{ $message }}</div>-->
                    <!--        @enderror-->
                    <!--    </div>-->
                    <!--</div>-->

             
                    <!--<div class="row mb-3">-->
                    <!--    <div class="col-md-12">-->
                    <!--        <label for="clerk_signature" class="form-label">Clerk Signature</label>-->
                    <!--        <input type="file" id="clerk_signature" name="clerk_signature" class="form-control @error('clerk_signature') is-invalid @enderror" />-->
                    <!--        @if($Affidavit->clerk_signature)-->
                    <!--            <img id="clerk-signature-preview" src="{{ asset('images/'.$Affidavit->clerk_signature) }}" alt="Clerk Signature Preview" style="max-width: 200px; margin-top: 10px;" />-->
                    <!--        @endif-->
                    <!--        @error('clerk_signature')-->
                    <!--            <div class="invalid-feedback text-red">{{ $message }}</div>-->
                    <!--        @enderror-->
                    <!--    </div>-->
                    <!--</div>-->

                    <div style="display: flex; justify-content: flex-end; gap: 10px;">
                        <div class="hstack gap-2">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>

                        <div class="hstack gap-2">
                            <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('getaffidavit') }}'">Back</button>
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
    
    

   <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      
      
              <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>

      
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
  
    loadDropdowns();

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
    
  <script>
$(document).ready(function() {
    var quill = new Quill('#memo-editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'font': [] }],
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'script': 'sub' }, { 'script': 'super' }],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['blockquote', 'code-block'],
                ['link', 'image', 'video'],
                ['clean']
            ]
        }
    });
    
    var memoEditor = document.getElementById('memo-editor');

    $('#affidavit').submit(function(e) {
        var memoContent = quill.root.innerHTML;

        $('#memo').val(memoContent); 

    });


    // Populate memo if editing an affidavit
    @if($Affidavit->memo)
        quill.root.innerHTML = `{!! $Affidavit->memo !!}`;
    @endif

    // Handle form submission
    $('#addaffidavitForm').submit(function(e) {
        var memoContent = quill.root.innerHTML;
        $('#memo').val(memoContent); 
    });

    // Handle affidavit selection change
    $('#affidavitName').on('change', function() {
        var affidavitId = $(this).val();

        if (affidavitId == "") {
            $('#memoField').hide();
            quill.setContents([]); // Clear the Quill editor
            return;
        }

        $.ajax({
            url: '/get-affidavit-memo/' + affidavitId,
            type: 'GET',
            success: function(response) {
                if (response && response.memo) {
                    $('#memoField').show();
                    quill.root.innerHTML = response.memo; // Populate the Quill editor with memo
                } else {
                    alert('No memo found for the selected affidavit.');
                    $('#memoField').hide();
                }
            },
            error: function(xhr, status, error) {
                alert('Failed to fetch memo. Please try again.');
                console.error('Error:', error);
            }
        });
    });
});
</script>


    
    
    
    
    
@endsection
