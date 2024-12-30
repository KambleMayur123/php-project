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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

<style>
    
    .col-lg-12 {
        flex: 0 0 auto;
        width: 70% !important;
    }
 .btn-primary{

    margin: 20px auto;
    padding: 5px;
    margin-left: 240px;
    border-radius: 5px;
    background-color: #405189;
    color: #fff;
    border: none
}
.card-body{
    width:50%;
    margin:50px 10px;
    
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Dark shadow with 80% opacity */

}
 .swal2-confirm{
   background-color: #405189!important;
   border:none !important;
   margin:5px !important;
   color:#fff !important;
   padding:5px 20px !important;
     border-radius:5px !important;
 }
 .swal2-cancel{
      background-color:red!important;
   border:none !important;
   margin:5px !important;
   color:#fff !important;
   padding:5px 20px !important;
   border-radius:5px !important;
 }
</style>
<body>
     <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">DSC Enrollment</h4>
            </div> 
            <div class="card-header align-items-center d-flex">
                <p class="card-title mb-0 flex-grow-1">please insert your e-Token to read Digital Certificate Information
                <br>
                 <span style="color:#5076f3;"> Digital Certificate:Signing</span></p>
              
              <div class="flex-shrink-0" style=+margin:10px;>
   <a href="">
    <button class="btn btn-success waves-effect waves-light">
        <i class="fas fa-sync-alt"></i> Refresh
    </button>
</a>

<!-- Help Button with Link -->
<a href="">
    <button class="btn btn-warning waves-effect waves-light">
        <i class="fas fa-question-circle" ></i> Help
    </button>
</a>

<!-- Back Button with Link -->
<a href="">
    <button class="btn btn-danger waves-effect waves-light">
        <i class="fas fa-arrow-left"></i> Back
    </button>
</a>

</div>
            </div> 
             
       
             <div class="card-body">
              
                <div class="live-preview">
                    <div class="table-responsive">
                        <h5>DSC Enrollment</h5>
                        <table class="table align-middle table-nowrap mb-0">
                            <thead>
                                <tr>
                                
                                    <th scope="col">Certificate</th>
                                    <th scope="col">Issued By</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Expiry Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th >nlm</th>
                                    <td>nlml</td>
                                    <td>nlm</td>
                                    <td>nln</td>
                                    
                                    
                                </tr>
                                 
                                
                            </tbody>
                        </table>
                         <button type="button" class="btn btn-primary btn-sm" id="sa-success">Click
                                            me</button>
                    </div>
                </div>

            
            </div>
        </div>
        
    </div>
   
</div>




 </body>   
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <!-- Include Bootstrap JS for button functionality -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/sweetalerts.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@endsection
