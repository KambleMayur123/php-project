@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Add Salary</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <!-- Your existing form container -->
              <form class="leave-form" autocomplete="off" action="{{ route('salary.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    
    
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="state" class="form-label">State</label>
            <select id="state" name="state" class="form-control" >
                <option value="">Select State</option>
                @foreach($statesData['states'] as $state)
                    <option value="{{ $state['state'] }}" 
                        {{ $data['state'] == $state['state'] ? 'selected' : '' }}>
                        {{ $state['state'] }}
                @endforeach
            </select>
            @error('state')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="district" class="form-label">District</label>
            <select id="district" name="district" class="form-control" >
                <option value="{{ $data['district'] }}" selected>{{ $data['district'] }}</option>
                <!-- Districts will be loaded dynamically -->
            </select>
            @error('district')
                <div class="invalid-feedback text-red">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="organisation" class="form-label">Select Organization</label>
            <select id="organisation" name="org_id" class="form-select" >
<option value="{{ $data['org_id'] }}" selected>{{ $org_name }}</option>
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
                           <select name="depart_id"  id ="department_name" class="form-select mb-3" >
                <option value="{{ $data['department_name'] }}" selected>{{ $department_name }}</option>
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
<option value="{{ $data['taluka'] ?? ' ' }}" selected>{{ $data['taluka'] ?? ' ' }}</option>
                                <!-- Talukas will be loaded here -->
                            </select>
                            @error('taluka')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        
                                        <div class="col-md-4">
    <label for="designation" class="form-label">Select Designation</label>
    <select name="design_id" id="designation" class="form-select mb-3">
                <option value="{{ $data['designation'] }}" selected>{{ $designation }}</option>
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
                <option value="{{ $data['name'] }}" selected>{{ $name }}</option>
                            </select>
                            @error('profile_name')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
          <div class="col-md-3">
                            <label for="salary_type" class="form-label">Salary Type</label>
                            <select id="salary_type" name="salary_type" class="form-control">
                                <option value="">Select Profile Name</option>
                <option value="education" {{ $data['salary_type'] == 'education' ? 'selected' : '' }}>Education</option>
                <option value="other" {{ $data['salary_type'] == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('salary_type')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
<div class="col-md-3">
    <label for="join_start_salary" class="form-label">Joining Starting Salary</label>
            <input type="number" name="starting_salary" class="form-control" value="{{ $data['join_start_salary'] }}">
    @error('join_start_salary')
        <div class="invalid-feedback text-red">{{ $message }}</div>
    @enderror
</div>


<div class="col-md-3">
    <label for="joining_date" class="form-label">Joining Date</label>
    <input type="date" id="joining_date" name="joining_date"  value="{{ $data['joining_date'] }}"  class="form-control">
    @error('joining_date')
        <div class="invalid-feedback text-red">{{ $message }}</div>
    @enderror
</div>

                        
       </div>
       <div class="row">
   <div class="col-xl-4 col-lg-6">
    <div class="card">
        <div class="card-header" style="background-color: #455cff;">
            <h4 class="card-title mb-0" style="color:white">Basic Salary Analysis</h4>
        </div><!-- end card header -->

        <div class="card-body">
            <!--<h3>Salary Analysis</h3>-->
            <div class="mx-n3">
                <div data-simplebar data-simplebar-auto-hide="false" data-simplebar-track="success"
                    style="max-height: 274px;">
<ul class="list-group list-group-flush">
    @php
        $joiningDate = new DateTime($data['joining_date']);
        $currentSalary = $data['join_start_salary'];
        $incrementPercentage = 0.03;
        $promotionMonths = ($data['salary_type'] == 'education') ? 12 : 10;

        $monthlyIncrementDate = clone $joiningDate;
        $promotionApplied = false;
        $show3PercentBadge = false;
        $currentDate = new DateTime('now');
    @endphp

    <li class="list-group-item py-3">
        <div class="d-flex align-items-center">
            <div class="flex-shrink-0 ms-4">
                <div>{{ $joiningDate->format('d-m-Y') }}</div>
                <div class="text-truncate badge ms-auto bg-primary">Joining Date</div>
            </div>
            <div class="flex-shrink-0 mx-3">
                <i class="ri-arrow-right-fill text-muted"></i>
            </div>
            <div class="flex-grow-1 text-muted overflow-hidden">
                <h5 class="text-truncate fs-14 mb-1">₹{{ number_format($currentSalary) }}</h5>
                <div class="text-truncate badge ms-auto bg-primary">Joining Salary</div>
            </div>
        </div>
    </li>

    @for ($month = 1; $month <= $promotionMonths; $month++)
        @php
            $currentSalary += $currentSalary * $incrementPercentage;

            if (!$promotionApplied && $month == $promotionMonths) {
                if ($salaryCalculationType == 'percent') {
                    $additionalSalaryPercent = $currentSalary * ($additionalSalary / 100);
                    $currentSalary += $additionalSalaryPercent;
                } else {
                    $currentSalary += $additionalSalary;
                }
                $promotionApplied = true;
            }

            $show3PercentBadge = ($month % 12 == 0);
            $monthlyIncrementDate->modify('+1 month');
            $formattedIncrementDate = $monthlyIncrementDate->format('d-m-Y');

            if ($monthlyIncrementDate > $currentDate) {
                break;
            }
        @endphp

        <li class="list-group-item py-3">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 ms-4">
                    <div>{{ $formattedIncrementDate }}</div>
                </div>
                <div class="flex-shrink-0 mx-3">
                    <i class="ri-arrow-right-fill text-muted"></i>
                </div>
                <div class="flex-grow-1 text-muted overflow-hidden">
                    <h5 class="text-truncate fs-14 mb-1">₹{{ number_format($currentSalary) }}</h5>
                    @if ($show3PercentBadge)
                        <div class="text-truncate badge ms-auto bg-success">+3%</div>
                    @endif
                </div>
            </div>
        </li>
    @endfor
</ul>

                </div>
            </div>
        </div><!-- end card-body -->

        <div class="card-footer text-center">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPromotionModal">
    
    
    Add promotion 
    </button>
        </div><!-- end card footer -->
    </div><!-- end card -->
</div>


<div class="col-xl-4">
    <div class="card shadow-sm">
        <div class="card-header" style="background-color: #455cff;">
            <h4 class="card-title mb-0" style="color:white">Promotion Salary Analysis</h4>
        </div>
        
@if($showPromotionCard)
<div class="mb-3">
    <div data-simplebar data-simplebar-auto-hide="false" data-simplebar-track="success" style="max-height: 274px;">
        <h5><strong>Designation:</strong> {{ $designation_name?? 'N/A' }}</h5>

        <ul class="list-group list-group-flush">
            @php
                $joiningYear = date('Y', strtotime($data['joining_date']));
                $promotionYears = ($data['salary_type'] == 'education') ? 12 : 10;
                $promotionSalary = $salaryDetails['promotion_salary'] ?? 0;
                $promotionJoiningYear = $joiningYear + $promotionYears;
                $currentYear = date('Y');
                $incrementDayMonth = date('d-m', strtotime($increment_date));
                    $monthCount = 0;
        $promotionMonths = ($data['salary_type'] == 'education') ? 12 : 10;


            @endphp

            <!-- Initial Year (Promotion Salary) -->
            <li class="list-group-item py-3">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 ms-4">
                        <div>{{ date('d-m-Y', strtotime($increment_date)) }}</div>
                        <div class="text-truncate badge ms-auto bg-primary">Increment Date</div>
                    </div>
                    <div class="flex-shrink-0 mx-3">
                        <i class="ri-arrow-right-fill text-muted"></i>
                    </div>
                    <div class="flex-grow-1 text-muted overflow-hidden">
                        <h5 class="text-truncate fs-14 mb-1">₹{{ number_format($promotionSalary) }}</h5>
                        <div class="text-truncate badge ms-auto bg-primary">Promotion Salary</div>
                    </div>
                </div>
            </li>

            <!-- Increment Years (up to current year) -->
    @for ($month = 1; $month <= $promotionMonths; $month++)
                @php

                        $monthCount++;
        
        $formattedIncrementDate = date('d-m-Y', strtotime("+$monthCount month", strtotime($increment_date)));

                    $promotionSalary += $promotionSalary * 0.03;

                    if ($salaryCalculationType == 'percent') {
                        $promotionSalary += $promotionSalary * ($additionalSalary / 100);
                    } else {
                        $promotionSalary += $additionalSalary;
                    }
                                    $show3PercentBadge = ($month % 12 == 0);

                @endphp

                <li class="list-group-item py-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 ms-4">
                            <div>{{ $formattedIncrementDate }}</div>
                        </div>
                        <div class="flex-shrink-0 mx-3">
                            <i class="ri-arrow-right-fill text-muted"></i>
                        </div>
                        <div class="flex-grow-1 text-muted overflow-hidden">
                            <h5 class="text-truncate fs-14 mb-1">₹{{ number_format($promotionSalary) }}</h5>
                                                @if ($show3PercentBadge)

                            <div class="text-truncate badge ms-auto bg-success">+3%</div>
                            @endif
                        </div>
                    </div>
                </li>
            @endfor
        </ul>
    </div><!-- Scrollable content ends here -->
</div><!-- End card body -->
@endif
    </div><!-- End card -->
</div><!-- End col -->
</div>
    
<!-- Add Promotion Modal -->
<!-- Add Promotion Modal -->

<div class="modal fade" id="addPromotionModal" tabindex="-1" aria-labelledby="addPromotionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPromotionModalLabel">Add Promotion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Designation Select -->
                <!--<div class="mb-3">-->
                <!--    <label for="designation" class="form-label">Designation</label>-->
                <!--    <select id="designation" name="designation" class="form-control @error('designation') is-invalid @enderror">-->
                <!--        <option value="">Select Designation</option>-->
                <!--        @foreach($designations as $designation)-->
                <!--            <option value="{{ $designation->id }}" -->
                <!--                    {{ old('designation', $salaryDetails['designation'] ?? '') == $designation->id ? 'selected' : '' }}>-->
                <!--                {{ $designation->designation_name }}-->
                <!--            </option>-->
                <!--        @endforeach-->
                <!--    </select>-->
                <!--    <div class="text-danger mt-2" id="designationError"></div>-->
                <!--</div>-->
                
                
                
                
                
                
                
                
                
                
                
                <div class="row mb-3">
                    
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <select id="state_2" name="promotion_state" class="form-control " >
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
                            <select id="district_2" name="promotion_district" class="form-control" >
                                <option value="">Select District</option>
                            </select>
                            @error('district')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="organisation" class="form-label">Select Organisation</label>
                            <select id="organisation_2" name="promotion_org_id" class="form-select mb-3" >
                                <option value="">Select Organisation</option>
                            </select>
                        </div>
                    </div><!-- end row -->

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="department_name" class="form-label">Select Department</label>
                            <select name="promotion_depart_id" id="department_name_2" class="form-select mb-3">
                                <option value="">-- Select Department --</option>
                            </select>
                            @error('department_name')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="taluka-field" class="form-label">Taluka</label>
                            <select id="taluka-field_2" name="promotion_taluka" class="form-control" >
                                <option value="">Select Taluka</option>
                            </select>
                            @error('taluka')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="designation" class="form-label">Select Designation</label>
                            <select name="promotion_design_id" id="designation_2" class="form-select mb-3">
                                <option value="">-- Select Designation --</option>
                            </select>
                            @error('designation')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div><!-- end row -->
                    

                <!-- Salary -->
                <div class="mb-3">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="text" id="salary" name="salary" class="form-control @error('salary') is-invalid @enderror" 
                           value="{{ $currentSalary }}">
                    <div class="text-danger mt-2" id="salaryError"></div>
                </div>

                <div class="mb-3">
                    <label for="increment_type" class="form-label">Increment Type</label>
                    <select id="increment_type" name="increment_type" class="form-control @error('increment_type') is-invalid @enderror">
                        <option value="">Select Increment Type</option>
                        <option value="additional_salary" {{ old('increment_type', $salaryDetails['increment_type'] ?? '') == 'additional_salary' ? 'selected' : '' }}>Additional Salary</option>
                        <option value="position_salary" {{ old('increment_type', $salaryDetails['increment_type'] ?? '') == 'position_salary' ? 'selected' : '' }}>Position Salary</option>
                    </select>
                    <div class="text-danger mt-2" id="incrementTypeError"></div>
                </div>

                <!-- Increment Name -->
                <div class="mb-3">
                    <label for="increment_name" class="form-label">Increment Name</label>
                    <input type="text" id="increment_name" name="increment_name" class="form-control @error('increment_name') is-invalid @enderror" 
                           value="{{ old('increment_name', $salaryDetails['increment_name'] ?? '') }}">
                    <div class="text-danger mt-2" id="incrementNameError"></div>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $salaryDetails['description'] ?? '') }}</textarea>
                    <div class="text-danger mt-2" id="descriptionError"></div>
                </div>

                <!-- Additional Document -->
                <div class="mb-3">
                    <label for="additional_document" class="form-label">Additional Document</label>
                    <input type="file" id="additional_document" name="additional_document" class="form-control @error('additional_document') is-invalid @enderror">
                    @if(isset($salaryDetails['additional_document']))
                        <p>Current file: <a href="{{ asset($salaryDetails['additional_document']) }}" target="_blank">View</a></p>
                    @endif
                    <div class="text-danger mt-2" id="additionalDocumentError"></div>
                </div>

                <!-- Increment Date -->
                <div class="mb-3">
                    <label for="increment_date" class="form-label">Increment Date</label>
                    <input type="date" id="increment_date" name="increment_date" class="form-control @error('increment_date') is-invalid @enderror" 
                           value="{{ old('increment_date', $salaryDetails['increment_date'] ?? '') }}">
                    <div class="text-danger mt-2" id="incrementDateError"></div>
                </div>

                <!-- Salary Increment Type -->
                <div class="mb-3">
                    <label for="salary_calculation_type" class="form-label">Salary calculation Type</label>
                    <select id="salary_calculation_type" name="salary_calculation_type" class="form-control @error('salary_calculation_type') is-invalid @enderror">
                        <option value="">Select Salary Increment Type</option>
                        <option value="percent" {{ old('salary_calculation_type', $salaryDetails['salary_calculation_type'] ?? '') == 'percent' ? 'selected' : '' }}>Percentage %</option>
                        <option value="amount" {{ old('salary_calculation_type', $salaryDetails['salary_calculation_type'] ?? '') == 'amount' ? 'selected' : '' }}>Amount</option>
                    </select>
                    <div class="text-danger mt-2" id="salaryIncrementTypeError"></div>
                </div>

                <!-- Additional Salary Field (Shown based on Increment Type) -->
                <div id="additional_salary_container" style="display: none;">
                    <div class="mb-3">
                        <label for="additional_salary" class="form-label">Additional Salary</label>
                        <input type="number" id="additional_salary" name="additional_salary" class="form-control @error('additional_salary') is-invalid @enderror">
                        <div class="text-danger mt-2" id="additionalSalaryError"></div>
                    </div>
                </div>

                <!-- Clerk Digital Signature -->
                <!--<div class="mb-3">-->
                <!--    <label for="clerk_digital_sig" class="form-label">Clerk Digital Signature</label>-->
                <!--    <input type="file" id="clerk_digital_sig" name="clerk_dig_sig" class="form-control @error('clerk_digital_sig') is-invalid @enderror">-->
                <!--    @if(isset($salaryDetails['clerk_dig_sig']))-->
                <!--        <p>Current file: <a href="{{ asset($salaryDetails['clerk_dig_sig']) }}" target="_blank">View</a></p>-->
                <!--    @endif-->
                <!--    <div class="text-danger mt-2" id="clerkDigitalSigError"></div>-->
                <!--</div>-->

                <!-- HOD Digital Signature -->
                <!--<div class="mb-3">-->
                <!--    <label for="hod_digital_sig" class="form-label">HOD Digital Signature</label>-->
                <!--    <input type="file" id="hod_digital_sig" name="hod_dig_sig" class="form-control @error('hod_digital_sig') is-invalid @enderror">-->
                <!--    @if(isset($salaryDetails['hod_dig_sig']))-->
                <!--        <p>Current file: <a href="{{ asset($salaryDetails['hod_dig_sig']) }}" target="_blank">View</a></p>-->
                <!--    @endif-->
                <!--    <div class="text-danger mt-2" id="hodDigitalSigError"></div>-->
                <!--</div>-->

                <!-- User Digital Signature -->
                <!--<div class="mb-3">-->
                <!--    <label for="user_digital_sig" class="form-label">User Digital Signature</label>-->
                <!--    <input type="file" id="user_digital_sig" name="user_dig_sig" class="form-control @error('user_digital_sig') is-invalid @enderror">-->
                <!--    @if(isset($salaryDetails['user_dig_sig']))-->
                <!--        <p>Current file: <a href="{{ asset($salaryDetails['user_dig_sig']) }}" target="_blank">View</a></p>-->
                <!--    @endif-->
                <!--    <div class="text-danger mt-2" id="userDigitalSigError"></div>-->
                <!--</div>-->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
<button type="button" class="btn btn-primary" 
        onclick="window.location='{{ route('salary.index') }}'">back</button>

            </div>
        </div>
    </div>
</div>


</form>
<div class="text-end">
    <button type="button" class="btn btn-primary" 
            onclick="window.location='{{ route('salary.index') }}'">Back</button>
</div>


            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->




<!-- Modal -->
<!-- Modal -->


@endsection
@section('script')


    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>

    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>


    
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>



<script>
$(document).ready(function() {
    $('#addPromotionModal').on('shown.bs.modal', function () {
        $('#state_2').select2({
            placeholder: 'Select state',
            allowClear: true,
            dropdownParent: $('#addPromotionModal') // Ensure the dropdown is appended to the modal
        });

        $('#district_2').select2({
            placeholder: 'Select district',
            allowClear: true,
            dropdownParent: $('#addPromotionModal')
        });

        $('#taluka-field_2').select2({
            placeholder: 'Select taluka',
            allowClear: true,
            dropdownParent: $('#addPromotionModal')
        });

    });
});



    $(document).ready(function() {
        
        
        

        $('#district').select2({
            placeholder: 'Select district',
            allowClear: true
        });
    });
    
    
    
     $(document).ready(function() {
        $('#state').select2({
            placeholder: 'Select state',
            allowClear: true
        });
    });
    
    
     $(document).ready(function() {
        $('#taluka-field').select2({
            placeholder: 'Select taluka',
            allowClear: true
        });
    });
</script>

    <script>
        $(document).ready(function() {
            // Handle state selection change
            $('#state , #state_2').change(function() {
                var state = $(this).val();
                var statesData = @json($statesData['states']); // Pass states data to JavaScript

                var districtDropdown = $('#district ,  #district_2');

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

            });

            // Handle district selection change
            $('#district ').change(function() {
                var state = $('#state ').val();
                var district = $(this).val();

                if (state && district) {
                    $.ajax({
                        url: '{{ route('tehsils.get') }}', // Ensure this matches your route
                        type: 'GET',
                        data: { state: state, district: district },
                        success: function(response) {
                            var talukaDropdown = $('#taluka-field');

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


                           $('#district_2').change(function() {
                var state = $('#state_2').val();
                var district = $(this).val();

                if (state && district) {
                    $.ajax({
                        url: '{{ route('tehsils.get') }}', // Ensure this matches your route
                        type: 'GET',
                        data: { state: state, district: district },
                        success: function(response) {
                            var talukaDropdown = $('#taluka-field_2');

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
    var state = $('#state ,  #state_2').val();
    var district = $(this).val();

    if (state && district) {
        // AJAX request to fetch organisations
        $.ajax({
            url: '{{ route('organisations.get') }}',
            type: 'GET',
            data: { state: state, district: district },
            success: function(response) {
                var organisationDropdown = $('#organisation');

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

        $('#district_2').change(function() {
    var state = $('#state_2').val();
    var district = $(this).val();

    if (state && district) {
        // AJAX request to fetch organisations
        $.ajax({
            url: '{{ route('organisations.get') }}',
            type: 'GET',
            data: { state: state, district: district },
            success: function(response) {
                var organisationDropdown = $('#organisation_2');

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


              
              
                                   $('#organisation_2').change(function() {
    var state = $('#state_2').val();
        var district = $('#district_2').val();

    var organisation = $(this).val();

    if (state && district && organisation) {
        $.ajax({
            url: '{{ route('departments.get') }}',
            type: 'GET',
            data: { state: state, district: district ,  organisation: organisation},
            success: function(response) {
                var departmentDropdown = $('#department_name_2');

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
    var organisation = $('#organisation').val();

    var designationDropdown = $('#designation');
    designationDropdown.empty().append('<option value="">-- Select Designation --</option>');

    if (taluka && organisation) {
        $.ajax({
            url: '{{ route('designations.getByTaluka') }}',
            type: 'GET',
            data: { taluka_id: taluka, organisation_id: organisation },
            success: function(response) {
                if (response.length === 0) {
                    console.warn('No designations found for the selected taluka and organisation.');
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
                console.error('Error fetching designations by taluka and organisation:', xhr.responseText);
            }
        });
    } else if (department) {
        $.ajax({
            url: '{{ route('designations.get') }}',
            type: 'GET',
            data: { department_id: department },
            success: function(response) {
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
        console.warn('Neither department nor taluka/organisation is selected.');
    }
}

$('#department_name').change(fetchDesignations);
$('#taluka-field, #organisation').change(fetchDesignations);

              

        
        
        
function fetchDesignations2() {
    var department = $('#department_name_2').val(); // Selected department
    var taluka = $('#taluka-field_2').val();       // Selected taluka
    var organisation = $('#organisation_2').val(); // Selected organisation
    var designationDropdown = $('#designation_2'); // Designation dropdown

    // Clear previous options
    designationDropdown.empty().append('<option value="">-- Select Designation --</option>');

    if (taluka && organisation) {
        // Fetch designations based on both taluka and organisation
        $.ajax({
            url: '{{ route('designations.getByTaluka') }}', // Route to fetch based on taluka and organisation
            type: 'GET',
            data: { 
                taluka_id: taluka,
                organisation_id: organisation
            },
            success: function(response) {
                if (response.length === 0) {
                    console.warn('No designations found for the selected taluka and organisation.');
                } else {
                    response.forEach(function(designation) {
                        designationDropdown.append($('<option>', {
                            value: designation.id,
                            text: designation.designation_name
                        }));
                    });
                }
            },
            error: function(xhr) {
                console.error('Error fetching designations by taluka and organisation:', xhr.responseText);
            }
        });
    } else if (department) {
        // Fetch designations based on department
        $.ajax({
            url: '{{ route('designations.get') }}', // Route to fetch based on department
            type: 'GET',
            data: { department_id: department },
            success: function(response) {
                if (response.length === 0) {
                    console.warn('No designations found for the selected department.');
                } else {
                    response.forEach(function(designation) {
                        designationDropdown.append($('<option>', {
                            value: designation.id,
                            text: designation.designation_name
                        }));
                    });
                }
            },
            error: function(xhr) {
                console.error('Error fetching designations by department:', xhr.responseText);
            }
        });
    } else {
        console.warn('Neither department nor both taluka and organisation are selected.');
    }
}

$('#department_name_2').change(fetchDesignations2);
$('#taluka-field_2, #organisation_2').change(fetchDesignations2);


        

        
        
       $('#name').change(function() {
    var profileId = $(this).val();

    if (profileId) {
        $.ajax({
            url: '{{ route('fetch.salary') }}',
            type: 'GET',
            data: { profile_id: profileId },
            success: function(response) {
                if (response) {
                
                    $('#join_start_salary').val(response.joining_start_salary);
                    $('#joining_date').val(response.joining_date);
                } else {
                    $('#join_start_salary').val('');
                    $('#joining_date').val('');
                }
            },
            error: function(xhr) {
                console.error('Error fetching salary:', xhr.responseText);
            }
        });
    } else {
        $('#join_start_salary').val('');
        $('#joining_date').val('');
    }
});

        
        
</script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const salaryIncrementTypeDropdown = document.getElementById('salary_calculation_type');
    const additionalSalaryContainer = document.getElementById('additional_salary_container');
    const additionalSalaryInput = document.getElementById('additional_salary');

    function toggleAdditionalSalaryField() {
        const incrementType = salaryIncrementTypeDropdown.value;
        
        if (incrementType === 'percent') {
            // Show the field and set constraints for percentage
            additionalSalaryContainer.style.display = 'block';
            additionalSalaryInput.setAttribute('placeholder', 'Enter percentage (1-100)');
            additionalSalaryInput.setAttribute('min', '1');
            additionalSalaryInput.setAttribute('max', '100');
            additionalSalaryInput.setAttribute('step', '0.01'); // Allow decimal percentages if needed
        } else if (incrementType === 'amount') {
            // Show the field without constraints for amount
            additionalSalaryContainer.style.display = 'block';
            additionalSalaryInput.setAttribute('placeholder', 'Enter amount');
            additionalSalaryInput.removeAttribute('min');
            additionalSalaryInput.removeAttribute('max');
            additionalSalaryInput.removeAttribute('step');
        } else {
            // Hide the field if neither percent nor amount is selected
            additionalSalaryContainer.style.display = 'none';
            additionalSalaryInput.value = ''; // Clear the value if field is hidden
        }
    }

    // Initialize on page load
    toggleAdditionalSalaryField();

    // Event listener for changes in Salary Increment Type dropdown
    salaryIncrementTypeDropdown.addEventListener('change', toggleAdditionalSalaryField);

    // Optional: Validation for percentage input (to ensure value is between 1 and 100)
    additionalSalaryInput.addEventListener('input', function() {
        const incrementType = salaryIncrementTypeDropdown.value;
        if (incrementType === 'percent') {
            const value = parseFloat(this.value);
            if (value < 1 || value > 100) {
                this.setCustomValidity("Percentage must be between 1 and 100");
            } else {
                this.setCustomValidity(""); // Clear error if valid
            }
        } else {
            this.setCustomValidity(""); // Clear error if not percent
        }
    });
});
</script>



@endsection
