@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
<style>
    
    .col-lg-12 {
        flex: 0 0 auto;
        width: 70% !important;
    }
.file-submit{
    margin:0 auto;
    padding:5px;
    margin-left: 380px;
    border-radius:5px;
     background-color:#405189;
    color:#fff;
    border:none;
}

</style>
       <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">File Parked Report</h4>
                
            </div> 

            <div class="card-body">
               
                <div class="live-preview">
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">File Number</th>
                                    <th scope="col">Subject</th>
                                    
                                     <th scope="col">Remarks</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <tr>
                                    <td >1</td>
                                    <td>Bobby Davis</td>
                                    <td>October 15, 2021</td>
                                   
                                </tr>
                                  <tr>
                                    <td >1</td>
                                    <td>Bobby Davis</td>
                                    <td>October 15, 2021</td>
                                    
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

            
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->

  
    <!-- end col -->
</div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@endsection
