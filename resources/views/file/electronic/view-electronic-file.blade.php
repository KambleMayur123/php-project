@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
  <x-common-header />
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">View Electronic File</h4>
                </div><!-- end card header -->

                <div class="card-body">
                        
                       <div class="col-sm-12 mt-3">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Left-aligned buttons -->
        <div class="d-flex align-items-center">
           
               <a href="{{route('sfs-electronics.create')}}"> <button class="btn btn-secondary " type="button">
                  Create Electronic File
                </button></a>
              
        </div>

        <!-- Right-aligned dropdown -->
        <!--<div>-->
        <!--    <select class="form-select" aria-label="Hierarchy View">-->
        <!--        <option selected>Select Hierarchy View</option>-->
        <!--        <option value="1">Option 1</option>-->
        <!--        <option value="2">Option 2</option>-->
        <!--        <option value="3">Option 3</option>-->
        <!--    </select>-->
        <!--</div>-->
    </div>
</div>

</div>
<?php
$getDiaryDetails = DB::table('diary_details')->orderBy('id','DESC')->get();
?>
              <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                       
                                        <th class="sort" data-sort="number">ID</th>
                                        <th class="sort" data-sort="subject">Diary Date</th>
                                        <th class="sort" data-sort="subject_category"> Latter No</th>
                                        <th class="sort" data-sort="created_on">Diary Mode</th>
                                        <th class="sort" data-sort="remarks">Form Of Communication</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach($getDiaryDetails as $temp)
                                    <tr>
                                   
                                        <td class="number">{{$temp->id}}</td>
                                        <td class="subject">{{$temp->diary_date}}</td>
                                        <td class="subject_category">{{$temp->diary_letter_date}}</td>
                                        <td class="created_on">{{$temp->diary_delivery_mode}}</td>
                                        <td class="remarks">{{$temp->diary_forms_comm}}</td>
                                       
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Modal placed outside the loop -->
                            
                        <div class="d-flex justify-content-end mt-3">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-prev disabled" href="#">
                                    Previous
                                </a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-next" href="#">
                                    Next
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->
                      </div>

    @endsection
    @section('script')
        <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/crm-customer-list.init.js') }}"></script>
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
