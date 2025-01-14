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
                      <?php

if (Auth::user()->is_admin == 'staff' || Auth::user()->is_admin == 'organization') {
    // Fetch permissions for 'staff' from the database as an array
    $permission = DB::table('role_permissions')
        ->where('role_name', Auth::user()->role_name)
        ->first();

    // Check if permissions are found
    if ($permission) {
        // Convert the object to an associative array
        $permissions = (array) $permission;
    } else {
        // Create an array to hold the modified permissions
        $permissions = [];

        // List of modules and permission suffixes
        $modules = [
            'dashborad', 'department', 'designation', 'organization', 'staff', 'role',
            'permission', 'report', 'userprofile', 'userdetail', 'document', 'leave',
            'nomination', 'salary', 'checklist', 'trans_join', 'other_receipt', 'affidavit',
            'achievement', 'receipt_master', 'checklist_master', 'tehsils', 'document_master',
            'organizations_master', 'leave_category', 'nomination_type', 'affidavit_type',
            'achievement_type'
        ];
        $permissionSuffixes = ['view', 'create', 'edit', 'delete'];

        // Set permissions for the allowed actions to 0 (default)
        foreach ($modules as $module) {
            foreach ($permissionSuffixes as $suffix) {
                $permissions["{$module}_{$suffix}"] = 1;
            }
        }
    }
} else if (Auth::user()->is_admin == 'admin') {
    // Create an array to hold the modified permissions
    $permissions = [];

    // List of modules and permission suffixes
    $modules = [
        'dashborad', 'department', 'designation', 'organization', 'staff', 'role',
        'permission', 'report', 'userprofile', 'userdetail', 'document', 'leave',
        'nomination', 'salary', 'checklist', 'trans_join', 'other_receipt', 'affidavit',
        'achievement', 'receipt_master', 'checklist_master', 'tehsils', 'document_master',
        'organizations_master', 'leave_category', 'nomination_type', 'affidavit_type',
        'achievement_type'
    ];
    $permissionSuffixes = ['view', 'create', 'edit', 'delete'];

    // Set permissions for the allowed actions to 2 (admin level)
    foreach ($modules as $module) {
        foreach ($permissionSuffixes as $suffix) {
            $permissions["{$module}_{$suffix}"] = 2;
        }
    }
} else {
    // Create an array to hold the modified permissions
    $permissions = [];

    // List of modules and permission suffixes
    $modules = [
        'dashborad', 'department', 'designation', 'organization', 'staff', 'role',
        'permission', 'report', 'userprofile', 'userdetail', 'document', 'leave',
        'nomination', 'salary', 'checklist', 'trans_join', 'other_receipt', 'affidavit',
        'achievement', 'receipt_master', 'checklist_master', 'tehsils', 'document_master',
        'organizations_master', 'leave_category', 'nomination_type', 'affidavit_type',
        'achievement_type'
    ];
    $permissionSuffixes = ['view', 'create', 'edit', 'delete'];

    // Set permissions for the allowed actions to 0 (default)
    foreach ($modules as $module) {
        foreach ($permissionSuffixes as $suffix) {
            $permissions["{$module}_{$suffix}"] = 1;
        }
    }
}


?>
<div class="row">
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Receipt</h4>
                 <a href="{{route('checklists.showdata')}}"> <button class="btn btn-sm btn-primary "  >
                                           History
                                           </button></a>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="checklistTable">
                            <thead>
                                <tr>
                                    <th>S. No</th>
                                    <th>Receipt Name</th>
                                    @if((isset($permissions)) && ( ($permissions['receipt_master_edit'] == 2)
                                    || ($permissions['receipt_master_delete'] == 2)))
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if((isset($permissions)) && (($permissions['receipt_master_view'] == 2)
                                ||  ($permissions['receipt_master_edit'] == 2) 
                                || ($permissions['receipt_master_delete'] == 2)))
                                @foreach($checklists as $checklist)
                                <tr id="checklistRow{{ $checklist->id }}">
    <td>{{ ($checklists->currentPage() - 1) * $checklists->perPage() + $loop->iteration }}</td>
                                    <td class="checklistName">{{ $checklist->name }}</td>
                                    @if((isset($permissions)) && (($permissions['receipt_master_edit'] == 2) || ($permissions['receipt_master_delete'] == 2)))
                                    <td>
                                                                  @if((isset($permissions)) && (($permissions['receipt_master_edit'] == 2) ))
                                        <button class="btn btn-sm btn-primary editChecklist" data-id="{{ $checklist->id }}">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        @endif
                                                                  @if((isset($permissions)) && (($permissions['receipt_master_delete'] == 2)))
                                        <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="{{ $checklist->id }}">
                                           Remove
                                           </button>
                                           @endif
                                           
                                           
                                             </td>
                                             @endif
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        
                        
                        
                                                                     @if($checklists->isNotEmpty())
                    <div class="d-flex justify-content-center">
                        {!! $checklists->links() !!}
                    </div>
                    @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
                          @if((isset($permissions)) && ( ($permissions['receipt_master_create'] == 2)))
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Add Receipt</h4>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <form action="{{ route('checklists.store') }}" method="POST" class="row g-3">
                        @csrf
                         <input type="hidden" name="owner_id"  value="{{auth()->user()->id}}">
                         
                        <div class="col-md-12">
                            <label for="name" class="form-label">Receipt Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Receipt name">
                            @error('name')
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


<!-- Edit Modal -->
<div class="modal fade" id="editChecklistModal" tabindex="-1" aria-labelledby="editChecklistModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editChecklistForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editChecklistModalLabel">Edit Checklist</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <input type="hidden" name="owner_id"  value="{{auth()->user()->id}}">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Checklist Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="editName" required>
                        @error('name')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
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
    $(document).ready(function() {
        // Handle Edit Checklist Modal
        $('.editChecklist').click(function() {
            var id = $(this).data('id');
            $.get('/checklists/' + id + '/edit', function(data) {
                $('#editChecklistModal').modal('show');
                $('#editName').val(data.name);
                $('#editChecklistForm').attr('action', '/checklists/' + id);
            });
        });

        // Handle Edit Checklist Form Submission
        $('#editChecklistForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            var form = $(this);
            var actionUrl = form.attr('action');
            var formData = form.serialize();

            $.ajax({
                url: actionUrl,
                type: 'PUT',
                data: formData,
                success: function(response) {
                    var id = response.id;
                    $('#checklistRow' + id + ' .checklistName').text(response.name);
                    $('#editChecklistModal').modal('hide');
        Swal.fire({
            title: 'Success!',
            text: 'Receipt updated successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
        });
                },
                error: function(response) {
                    alert('An error occurred while trying to update the Receipt.');
                }
            });
        });
        
        
        
        
        
        
        
        
         $('.remove-item-btn').click(function() {
        var id = $(this).data('id');
        $('#deleteForm').attr('action', '/checklists/' + id);
    });

    // Handle Delete Department Form Submission
    $('#deleteForm').submit(function(event) {
        event.preventDefault();

        var form = $(this);
        var actionUrl = form.attr('action');
        var id = actionUrl.split('/').pop(); // Extract ID from URL

        $.ajax({
            url: actionUrl,
            type: 'DELETE',
            data: form.serialize(),
            success: function(response) {
                $('#checklistRow' + id).remove();
                $('#deleteRecordModal').modal('hide');
                alert('Receipt deleted successfully.');
            },
            error: function(response) {
                alert('An error occurred while trying to delete the checklists.');
            }
        });
    });
});


        // Handle Delete Checklist with AJAX
    
</script>
@endsection
