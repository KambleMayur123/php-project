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
        <div class="col-lg-12" style="margin-left:200px">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Receipt Movement Report</h4>
                  
                </div><!-- end card header -->
                
                <div class="card-body">
                    <div class="live-preview">
                          <div class="col-lg-12" style="margin:10px">
                                <div class="mt-4 mt-lg-0">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">ReceiptMovement Report</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Comparative Report of Organization Unit</label>
                                    </div>
                                    
                                </div>
                            </div><!-- end col -->

                        <div class="row gy-12" style="margin:10px">
                         <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="exampleInputdate" class="form-label">From</label>
                                    <input type="date" class="form-control" id="exampleInputdate">
                                </div>
                        </div> 
                         <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="exampleInputdate" class="form-label">To</label>
                                    <input type="date" class="form-control" id="exampleInputdate">
                                </div>
                            </div>
                           
                </div>
                 
                 <div class="row gy-12" style="margin:10px" >
                         <div class="col-xxl-6 col-md-6">
                             <label for="exampleInputdate" class="form-label">Section</label>
                                <input type="text" class="form-control">
                            </div>
                            
                </div>  
                   <a href="/receipts-movement-report">
    <button class="file-submit">Submit</button>
</a>
            </div>
        </div>
        <!--end col-->
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
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@endsection
