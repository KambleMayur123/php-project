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
                <h4 class="card-title mb-0">view User Details</h4>
            </div>

            <div class="card">
                <div class="card-body">
                        <!-- State, District, Taluka -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="state" class="form-label">State</label>
                                <input type="text" name="state" class="form-control" value="{{ $user->state }}">
                            </div>
                            <div class="col-md-4">
                                <label for="district" class="form-label">District</label>
                                <input type="text" name="district" class="form-control" value="{{ $user->district }}">
                            </div>
                            <div class="col-md-4">
                                <label for="organisation" class="form-label">Organization</label>
                                <input type="text" name="org_name" class="form-control" value="{{ $user->org_name }}">
                            </div>
                        </div>

                        <!-- Organisation, Department -->
                        <div class="row mb-3">

                            <div class="col-md-4">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" name="department" class="form-control" value="{{ $user->name }}">
                            </div>
                            
                                                        <div class="col-md-4">
                                <label for="taluka" class="form-label">Taluka</label>
                                <input type="text" name="taluka" class="form-control" value="{{ $user->taluka }}">
                            </div>
                            <div class="col-md-4">
                                <label for="designation" class="form-label">Designation</label>
                                <input type="text" name="designation" class="form-control" value="{{ $user->designation_name }}">
                            </div>
                        </div>

                        <!-- Profile Name -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Profile Name</label>
                                <input type="text" name="profile_name" class="form-control" value="{{ $user->first_name }} {{ $user->last_name }}">
                            </div>
                        </div>

                        <!-- Caste, Address A, Address B -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="caste" class="form-label">Caste</label>
                                <input type="text" name="caste" class="form-control" value="{{ $user->caste }}">
                            </div>
                            <div class="col-md-4">
                                <label for="address_a" class="form-label">Address A</label>
                                <input type="text" name="address_a" class="form-control" value="{{ $user->address }}">
                            </div>
                            <div class="col-md-4">
                                <label for="address_b" class="form-label">Address B</label>
                                <input type="text" name="address_b" class="form-control" value="{{ $user->address_B }}">
                            </div>
                        </div>

                        <!-- Father's Name, Father's Address -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="father_name" class="form-label">Father's Name</label>
                                <input type="text" name="father_name" class="form-control" value="{{ $user->father_name }}">
                            </div>
                                <label for="father_address" class="form-label">Father's Address</label>
                                <input type="text" name="father_address" class="form-control" value="{{ $user->father_address }}">
                            </div>
                        </div>

                        <!-- Birth Date, Height, Birth Mark -->
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="birth_date" class="form-label">Birth Date</label>
                                <input type="date" name="birth_date" class="form-control" value="{{ $user->birth_date }}">
                            </div>
                            <div class="col-md-3">
                                <label for="height" class="form-label">Height</label>
                                <input type="text" name="height" class="form-control" value="{{ $user->height }}">
                            </div>
                            <div class="col-md-3">
                                <label for="birth_mark" class="form-label">Birth Mark</label>
                                <input type="text" name="birth_mark" class="form-control" value="{{ $user->birth_mark }}">
                            </div>
                        </div>

                        <!-- Qualification, Additional Qualification -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="qualification" class="form-label">Qualification</label>
                                <input type="text" name="qualification" class="form-control" value="{{ $user->qualification }}">
                            </div>
                            <div class="col-md-6">
                                <label for="another_qualification" class="form-label">Additional Qualification</label>
                                <input type="text" name="another_qualification" class="form-control" value="{{ $user->another_qualification }}">
                            </div>
                        </div>

                        <!-- Digital Signature -->
                        <!--<div class="row mb-3">-->
                        <!--    <div class="col-md-6">-->
                        <!--        <label for="digital_sig" class="form-label">Digital Signature</label>-->
                        <!--        <input type="file" name="digital_sig" class="form-control">-->
                        <!--        <img src="{{ asset('/' . $user->digital_sig) }}" alt="Digital Signature" style="max-width: 200px;">-->
                        <!--    </div>-->
                        <!--    <div class="col-md-6">-->
                        <!--        <label for="digital_sig_verify" class="form-label">Verified Digital Signature</label>-->
                        <!--        <input type="file" name="digital_sig_verify" class="form-control">-->
                        <!--        <img src="{{ asset('/' . $user->digital_sig_verify) }}" alt="Verified Signature" style="max-width: 200px;">-->
                        <!--    </div>-->
                        <!--</div>-->

                        <!-- Last Information Check -->
                        <div class="row mb-3">
                                                        <div class="col-md-4">
                                <label for="address_b" class="form-label">Joining Time Education Qualification</label>
                                <input type="text" name="address_b" class="form-control" value="{{ $user->qualification }}">
                            </div>                            <div class="col-md-4">
                                <label for="address_b" class="form-label">After Joining Education Qualification</label>
                                <input type="text" name="address_b" class="form-control" value="{{ $user->another_qualification }}">
                            </div>

                            <div class="col-md-4">
                                <label for="certificate_no" class="form-label">Certificate Number</label>
                                <input type="text" name="certificate_no" class="form-control" value="{{ $user->certificate_no }}">
                            </div>
                        </div>
                        
        

                  <div style="display: flex; justify-content: flex-end; gap: 10px;">
    <div class="hstack gap-2">
        <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('user-details-view')}}'">Back</button>
    </div>
</div>
                </div>
            </div>
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
@endsection
