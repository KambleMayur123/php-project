@extends('layouts.master')
@section('title')
    @lang('translation.new-page-title')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Create New Entry</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <!-- New form container -->
                <form class="entry-form" autocomplete="off" action="" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="file-number-field" class="form-label">File Number</label>
                            <input type="text" id="file-number-field" name="file_number" class="form-control @error('file_number') is-invalid @enderror" placeholder="Enter File Number" value="{{ old('file_number') }}" />
                            @error('file_number')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="subject-field" class="form-label">Subject</label>
                            <input type="text" id="subject-field" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Enter Subject" value="{{ old('subject') }}" />
                            @error('subject')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="to-field" class="form-label">To</label>
                            <input type="text" id="to-field" name="to" class="form-control @error('to') is-invalid @enderror" placeholder="Enter Recipient" value="{{ old('to') }}" />
                            @error('to')
                                <div class="invalid-feedback text-red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="due-date-field" class="form-label">Set Due Date</label>
                        <input type="date" id="due-date-field" name="due_date" class="form-control @error('due_date') is-invalid @enderror" value="{{ old('due_date') }}" />
                        @error('due_date')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="action-field" class="form-label">Action</label>
                        <select id="action-field" name="action" class="form-control @error('action') is-invalid @enderror">
                            <option value="">Select Action</option>
                            <option value="forward">Forward</option>
                            <option value="approved">Approved</option>
                            <option value="for_approval">For Approval</option>
                            <option value="for_information">For Information</option>
                            <option value="seen">Seen</option>
                            <option value="put_up_again">Put Up Again</option>
                        </select>
                        @error('action')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="priority-field" class="form-label">Priority</label>
                        <select id="priority-field" name="priority" class="form-control @error('priority') is-invalid @enderror">
                            <option value="">Select Priority</option>
                            <option value="out_today">Out Today</option>
                            <option value="most_immediate">Most Immediate</option>
                        </select>
                        @error('priority')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="remarks-field" class="form-label">Remarks</label>
                        <textarea id="remarks-field" name="remarks" class="form-control @error('remarks') is-invalid @enderror" placeholder="Enter Remarks">{{ old('remarks') }}</textarea>
                        @error('remarks')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="hstack gap-2 justify-content-end">
                        <button type="submit" class="btn btn-success">Send</button>
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
@endsection
