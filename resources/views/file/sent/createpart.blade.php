@extends('layouts.master')
@section('title')
    @lang('translation.new-page-title')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-12"> <!-- Reduced the width by changing col-lg-8 to col-lg-6 -->
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white text-center">
                    <h4 class="card-title mb-0">Create New Entry</h4>
                </div>

                <div class="card-body">
                    <form class="entry-form" autocomplete="off" action="" method="post">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="file-number-field" class="form-label">File Number</label>
                                <input type="text" id="file-number-field" name="file_number" class="form-control @error('file_number') is-invalid @enderror" value="{{ old('file_number') }}" />
                                @error('file_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="subject-field" class="form-label">Subject</label>
                                <input type="text" id="subject-field" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" />
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="description-field" class="form-label">Description</label>
                                <input type="text" id="description-field" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" />
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="category-main-field" class="form-label">Category (Main)</label>
                                <select id="category-main-field" name="category_main" class="form-select @error('category_main') is-invalid @enderror">
                                    <option value="">Choose One</option>
                                    <!-- Add your category options here -->
                                </select>
                                @error('category_main')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="category-sub-field" class="form-label">Category (Sub)</label>
                                <select id="category-sub-field" name="category_sub" class="form-select @error('category_sub') is-invalid @enderror">
                                    <option value="">Choose One</option>
                                    <!-- Add your sub-category options here -->
                                </select>
                                @error('category_sub')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="classified-field" class="form-label">Classified</label>
                                <select id="classified-field" name="classified" class="form-select @error('classified') is-invalid @enderror">
                                    <option value="">Choose One</option>
                                    <!-- Add your classified options here -->
                                </select>
                                @error('classified')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="remarks-field" class="form-label">Remarks</label>
                                <input type="text" id="remarks-field" name="remarks" class="form-control @error('remarks') is-invalid @enderror" value="{{ old('remarks') }}" />
                                @error('remarks')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="previous-reference-field" class="form-label">Previous Reference</label>
                                <input type="text" id="previous-reference-field" name="previous_reference" class="form-control @error('previous_reference') is-invalid @enderror" value="{{ old('previous_reference') }}" />
                                @error('previous_reference')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="later-reference-field" class="form-label">Later Reference</label>
                                <input type="text" id="later-reference-field" name="later_reference" class="form-control @error('later_reference') is-invalid @enderror" value="{{ old('later_reference') }}" />
                                @error('later_reference')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-info">Create Part</button>
                        </div>
                    </form>
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
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
