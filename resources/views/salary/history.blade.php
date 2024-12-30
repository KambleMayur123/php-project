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
    
<div class="col-xxl-7">
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Salary  History</h4>
            <a href="{{route('salary.index')}}"><button type="button" class="btn btn-primary ">Back </button></a>
        </div>
        <div class="card-body">
            <div class="live-preview">
                <div class="table-responsive" id="departmentTableContent">
                    <!-- Department Table -->
                    <table class="table table-bordered" id="departmentsTable">
                        <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Action</th>
                                            <th>Date</th>
            <th>Time</th>
              <th>Action done by</th>

                                
                            </tr>
                        </thead>
                        <tbody>

                       @if($departments->isNotEmpty())
                            @foreach($departments as $department)
                            <tr id="departmentRow{{ $department->id }}">
    <td>{{ ($departments->currentPage() - 1) * $departments->perPage() + $loop->iteration }}</td>
                                <td class="departmentName">{{ $department->history_msg }}</td>
<td class="statename">{{ \Carbon\Carbon::parse($department->created_at)->format('d-m-Y') }}</td>

<td class="districtname">{{ \Carbon\Carbon::parse($department->created_at)->format('h:i A') }}</td>
  <td class="districtname">@if($department->owner_name == Auth::user()->first_name)  You  @else {{ $department->owner_name }} @endif</td>
        
       

           
                            </tr>
                            @endforeach
                            @endif
                          
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                     @if($departments->isNotEmpty())
                    <div class="d-flex justify-content-center">
                        {!! $departments->links() !!}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

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
