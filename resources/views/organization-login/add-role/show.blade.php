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
                <h4 class="card-title mb-0">Role Details</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <form class="role-form" autocomplete="off">
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
                            <label for="organisation" class="form-label">Organisation</label>
                            <input type="text" id="organisation" name="organisation" class="form-control" value="{{ $user->org_name }}" readonly />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="department_name" class="form-label">Department</label>
                            <input type="text" id="department_name" name="department_name" class="form-control" value="{{ $user->name }}" readonly />
                        </div>

                        <div class="col-md-4">
                            <label for="taluka" class="form-label">Taluka</label>
                            <input type="text" id="taluka" name="taluka" class="form-control" value="{{ $user->taluka }}" readonly />
                        </div>

                        <div class="col-md-4">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" id="designation" name="designation" class="form-control" value="{{ $user->designation_name }}" readonly />
                        </div>
                    </div>

                    <div class="row mb-3">
                       
                        <div class="col-md-4">
                            <label for="role_name" class="form-label">Role</label>
                            <input type="text" id="role_name" name="role_name" class="form-control" value="{{ $user->role_name }}" readonly />
                        </div>

                    </div>

                    <div style="display: flex; justify-content: flex-end; gap: 10px;">
                        <div class="hstack gap-2">
                            <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('roles.index') }}'">Back</button>
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
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ URL::asset('build/js/pages/select2.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection