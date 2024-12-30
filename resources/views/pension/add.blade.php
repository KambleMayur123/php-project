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
                <h4 class="card-title mb-0">Add Pension</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <!-- Your existing form container -->
                <form class="leave-form" autocomplete="off" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    
<div class="row mb-3">
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <select id="state" name="state" class="form-control" >
                                <option value="">Select State</option>
                               
                                    <option value=""></option>
                              
                            </select>
                          
        <div class="invalid-feedback d-block"></div>
                           
                        </div>
                        <div class="col-md-4">
                            <label for="district" class="form-label">District</label>
                            <select id="district" name="district" class="form-control" >
                                <option value="">Select District</option>
                                 Districts will be loaded here 
                            </select>
                          
        <div class="invalid-feedback d-block"></div>
                           
                        </div>
                        
                        
                        
                                                                                                  <div class="col-md-4">
                            <label for="organisation" class="form-label">select organisation</label>
                            <select id="organisation" name="organisation" class="form-select mb-3" >
                                <option value="">Select organisation</option>
                            </select>
                                                     
        <div class="invalid-feedback d-block"></div>
                          

                        </div>

                      
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                                   <div class="row">
                                                
                                                
                                                <div class="col-md-4">
                            <label for="department_name" class="form-label">Select Department</label>
                           <select name="department_name"  id ="department_name" class="form-select mb-3" >
                            <option value="">-- Select Department --</option>
                        </select>
                       
        <div class="invalid-feedback d-block">
        </div>
                       
                            </div>


                        
                        
                        
                                                                                        <div class="col-md-4">
                            <label for="taluka-field" class="form-label">Taluka</label>
                            <select id="taluka-field" name="taluka" class="form-control" >
                                <option value="">Select Taluka</option>
                                 Talukas will be loaded here 
                            </select>
                          
        <div class="invalid-feedback d-block"></div>
                            
                        </div>

                        
                        
                                        <div class="col-md-4">
    <label for="designation" class="form-label">Select Designation</label>
    <select name="designation" id="designation" class="form-select mb-3">
        <option value="">-- Select Designation --</option>
    </select>
   
            <div class="invalid-feedback d-block"></div>

  
</div>   
                        
                        
                                     
                                                





</div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        


                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="first-name-field" class="form-label">First Name</label>
                            <input type="text" id="first-name-field" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter First Name" value="" />
                            @error('first_name')
                                <div class="invalid-feedback text-red"></div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="middle-name-field" class="form-label">Middle Name</label>
                            <input type="text" id="middle-name-field" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" placeholder="Enter Middle Name" value="" />
                            @error('middle_name')
                                <div class="invalid-feedback text-red"></div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="last-name-field" class="form-label">Last Name</label>
                            <input type="text" id="last-name-field" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name" value="" />
                            @error('last_name')
                                <div class="invalid-feedback text-red"></div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-6">
                         <div class="col-md-4">
                        <label for="email-field" class="form-label">Email</label>
                        <input type="email" id="email-field" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" value="" />
                        @error('email')
                            <div class="invalid-feedback text-red"></div>
                        @enderror
                        </div>
                         <div class="col-md-4">
                        <label for="contact-field" class="form-label">Contact</label>
                        <input type="tel" id="contact-field" name="number" class="form-control @error('number') is-invalid @enderror" placeholder="Enter Contact Number" value="" />
                        @error('number')
                            <div class="invalid-feedback text-red"></div>
                        @enderror
                    </div>
                    </div>

                    <div class="row mb-3">
                     <div class="col-md-4">
                            <label for="last-name-field" class="form-label">Demo1</label>
                            <input type="text" id="last-name-field" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name" value="" />
                            @error('last_name')
                                <div class="invalid-feedback text-red"></div>
                            @enderror
                    </div>
                     <div class="col-md-4">
                            <label for="last-name-field" class="form-label">Demo2</label>
                            <input type="text" id="last-name-field" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name" value="" />
                            @error('last_name')
                                <div class="invalid-feedback text-red"></div>
                            @enderror
                        </div>
                         <div class="col-md-4">
                            <label for="last-name-field" class="form-label">Demo3</label>
                            <input type="text" id="last-name-field" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name" value="" />
                            @error('last_name')
                                <div class="invalid-feedback text-red"></div>
                            @enderror
                        </div>
                    
                    </div>
                    
                   


                    

                    
                    <div class="row mb-3">
                    <div class="col-md-4">
                    <label for="file1" class="form-label">Clerk Degital Signature</label>
                    <input type="file" name="old_book" id="file1" class="form-control" onchange="uploadFile()" />
                    <small class="form-text text-muted">Choose a file to upload.</small>
            
                </div>
                  <div class="col-md-4">
                    <label for="file1" class="form-label">Hod Degital Signature</label>
                    <input type="file" name="old_book" id="file1" class="form-control" onchange="uploadFile()" />
                    <small class="form-text text-muted">Choose a file to upload.</small>
            
                </div>
                </div>


                        <div style="display: flex; justify-content: flex-end; gap: 10px;">
    <div class="hstack gap-2">
        <button type="submit" class="btn btn-success">submit</button>
    </div>

    <div class="hstack gap-2">
        <button class="btn btn-primary" >Back</button>
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
$(document).ready(function () {
    // Initialize Select2 for all dropdowns
    $('#state, #district, #taluka-field, #organisation, #department_name, #designation').select2({
        placeholder: 'Select an option',
        allowClear: true
    });

    // Function to apply Bootstrap validation to Select2 dropdowns
    function applySelect2Validation(id, errorMessage) {
        // Get the Select2 container
        var select2Element = $(id).next('.select2-container');

        if ($(id).hasClass('is-invalid')) {
            // Apply error style if validation fails
            select2Element.addClass('is-invalid');
            $(id).parent().find('.invalid-feedback').text(errorMessage).show();
        } else {
            // Remove error style if valid
            select2Element.removeClass('is-invalid');
            $(id).parent().find('.invalid-feedback').hide();
        }
    }

    // On form submission or validation, trigger validation manually
    $('#form-id').on('submit', function (e) {
        var hasErrors = false;

        // Check each dropdown for errors and apply validation
        $('#state, #district, #taluka-field, #organisation, #department_name, #designation').each(function () {
            if (!$(this).val()) {
                $(this).addClass('is-invalid');
                hasErrors = true;
            } else {
                $(this).removeClass('is-invalid');
            }
            applySelect2Validation('#' + this.id, 'This field is required');
        });

        // Prevent form submission if there are validation errors
        if (hasErrors) {
            e.preventDefault();
        }
    });

    // Handle Select2 validation dynamically
    $('#state, #district, #taluka-field, #organisation, #department_name, #designation').on('change', function () {
        $(this).removeClass('is-invalid');
        applySelect2Validation('#' + this.id, '');
    });
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
