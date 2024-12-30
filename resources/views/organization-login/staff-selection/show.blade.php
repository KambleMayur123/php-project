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
                <h4 class="card-title mb-0">Staff Details</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <input type="text" id="state" class="form-control" value="{{ $user->state }}" readonly />
                        </div>

                        <div class="col-md-4">
                            <label for="district" class="form-label">District</label>
                            <input type="text" id="district" class="form-control" value="{{ $user->district }}" readonly />
                        </div>

                        <div class="col-md-4">
                            <label for="organisation" class="form-label">Organisation</label>
                            <input type="text" id="organisation" class="form-control" value="{{ $user->org_name }}" readonly />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="department_name" class="form-label">Department</label>
                            <input type="text" id="department_name" class="form-control" value="{{ $user->name }}" readonly />
                        </div>

                        <div class="col-md-4">
                            <label for="taluka" class="form-label">Taluka</label>
                            <input type="text" id="taluka" class="form-control" value="{{ $user->taluka }}" readonly />
                        </div>

                        <div class="col-md-4">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" id="designation" class="form-control" value="{{ $user->designation_name }}" readonly />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" id="first_name" class="form-control" value="{{ $user->first_name }}" readonly />
                        </div>

                        <div class="col-md-4">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" id="middle_name" class="form-control" value="{{ $user->middle_name }}" readonly />
                        </div>

                        <div class="col-md-4">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" id="last_name" class="form-control" value="{{ $user->last_name }}" readonly />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" class="form-control" value="{{ $user->email }}" readonly />
                        </div>

                        <div class="col-md-4">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" id="phone_number" class="form-control" value="{{ $user->number }}" readonly />
                        </div>

                        <div class="col-md-4">
                            <label for="birth_date" class="form-label">Birth Date</label>
                            <input type="text" id="birth_date" class="form-control" value="{{ $user->birth_date }}" readonly />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" id="address" class="form-control" value="{{ $user->address }}" readonly />
                        </div>

                        <div class="col-md-4">
                            <label for="role_name" class="form-label">Role</label>
                            <input type="text" id="role_name" class="form-control" value="{{ $user->role_name }}" readonly />
                        </div>

                        <div class="col-md-4">
                            <label for="created_at" class="form-label">Created At</label>
                            <input type="text" id="created_at" class="form-control" value="{{ $user->created_at }}" readonly />
                        </div>
                    </div>

                    <div style="display: flex; justify-content: flex-end; gap: 10px;">
                        <div class="hstack gap-2">
                            <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('staff-add.index') }}'">Back</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>
@endsection
