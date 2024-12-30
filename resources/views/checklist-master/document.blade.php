@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')
                       <?php



?>
<div class="row">
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Document Name List</h4>
                <a href="{{route('document.history')}}"> <button class="btn btn-sm btn-primary" >
                                                History
                                            </button></a>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="designationsTable">
                            <thead>
                                <tr>
                                    <th>S. No</th>
                                    <th>Document Name</th>
                                    @if((isset($permissions)) && ( 
    ($permissions['document_master_delete'] == 2)
))
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if((isset($permissions)) && (
    ($permissions['document_master_view'] == 2) || 

    ($permissions['document_master_delete'] == 2)
))
                                @foreach($documents as $key => $doc)
                                    <tr id="tehsilRow{{ $doc->id }}">
    <td>{{ ($documents->currentPage() - 1) * $documents->perPage() + $loop->iteration }}</td>
                                        <td>{{ $doc->doc_name }}</td>
                                        @if((isset($permissions)) && (
    ($permissions['document_master_delete'] == 2)
))
                                        <td>
                                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="{{ $doc->id }}">
                                                Remove
                                            </button>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                            @if($documents->isNotEmpty())
                    <div class="d-flex justify-content-center">
                        {!! $documents->links() !!}
                    </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@if((isset($permissions)) && (
    ($permissions['document_master_create'] == 2) 
    
))
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Add Documents</h4>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <form action="{{ route('store-document') }}" method="POST" class="row g-3">
                        @csrf
                   <input type="hidden" name="owner_id" value="{{Auth::user()->id}}">
                   
                        <div class="col-md-12">
                            <label for="doc_name" class="form-label">Document Name</label>
                            <input type="text" name="doc_name" class="form-control @error('doc_name') is-invalid @enderror" id="doc_name" placeholder="Enter Document Name">
                            @error('doc_name')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Modal for Deleting Record -->
<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <div class="modal-body text-center">
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                    <h4>Are you Sure?</h4>
                    <p class="text-muted mx-4 mb-0">Are you sure you want to remove this record?</p>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <form id="deleteForm" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-light">Yes, delete it</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>

    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
   document.addEventListener('DOMContentLoaded', function() {
    // Handle state change to populate districts
  
    // Handle delete button click to set form action
    document.querySelectorAll('.remove-item-btn').forEach(button => {
        button.addEventListener('click', function () {
            var id = this.getAttribute('data-id');
            var deleteForm = document.getElementById('deleteForm');
            deleteForm.action = `/document/${id}`;
            deleteForm.dataset.id = id; // Store ID for later use
        });
    });

    // Handle form submission for deletion
    document.getElementById('deleteForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        var form = this;
        var formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest', // To signal it's an AJAX request
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove the row from the table
                var row = document.getElementById(`tehsilRow${form.dataset.id}`);
                if (row) row.remove();

                // Hide the modal
                var modal = bootstrap.Modal.getInstance(document.getElementById('deleteRecordModal'));
                if (modal) {
                    modal.hide();
                }
            } else {
                alert('Failed to delete the record.');
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

</script>
<meta name="csrf-token" content="{{ csrf_token() }}">



@endsection
