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
                <h4 class="card-title mb-0">User Details</h4>
            </div><!-- end card header -->

            <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <input type="text" id="state" name="state" class="form-control" value="{{ $user->state }}" readonly />
                        </div>
                        <div class="col-md-4">
                            <label for="district" class="form-label">District</label>
                            <input type="text" id="district" name="district" class="form-control" value="{{ $user->district }}" readonly />
                        </div>
                        <div class="col-md-4">
                            <label for="organisation" class="form-label">Select Organisation</label>
                            <input type="text" id="organisation" name="organisation" class="form-control" value="{{ $user->org_name}}" readonly />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="department_name" class="form-label">Select Department</label>
                            <input type="text" id="department_name" name="department_name" class="form-control" value="{{ $user->name }}" readonly />
                        </div>
                        <div class="col-md-4">
                            <label for="taluka" class="form-label">Taluka</label>
                            <input type="text" id="taluka" name="taluka" class="form-control" value="{{ $user->taluka }}" readonly />
                        </div>
                        <div class="col-md-4">
                            <label for="designation" class="form-label">Select Designation</label>
                            <input type="text" id="designation" name="designation" class="form-control" value="{{ $user->designation_name }}" readonly />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" value="{{ $user->first_name }}" readonly />
                        </div>
                        <div class="col-md-4">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" id="middle_name" name="middle_name" class="form-control" value="{{ $user->middle_name }}" readonly />
                        </div>
                        <div class="col-md-4">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" value="{{ $user->last_name }}" readonly />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" readonly />
                    </div>

                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="tel" id="contact" name="contact" class="form-control" value="{{ $user->number }}" readonly />
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ $user->address }}" readonly />
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control" value="{{ $user->username }}" readonly />
                    </div>

                    <div class="mb-3">
                        <label for="profile_pic" class="form-label">Profile Picture</label>
                        @if($user->profile_pic)
                            <div class="mb-2">
                                <img src="{{ asset('images/' . $user->profile_pic) }}" alt="Profile Picture" width="100">
                                <p>Current Profile Picture</p>
                            </div>
                        @endif
                    </div>
                    
                    <div class="mt-2">
                        <div style="display: flex; justify-content: flex-end; gap: 10px;">
        <button class="btn btn-primary" onclick="window.location.href='{{ route('organization.index')}}'">Back</button>
                        </div>
                    </div>
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
@endsection