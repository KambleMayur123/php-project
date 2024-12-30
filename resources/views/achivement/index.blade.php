@extends('layouts.master')
@section('title')
    @lang('translation.list-js')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
    
<div class="row">
    <div class="col-xxl-7">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Achievement category</h4>
                <a href="{{route('achievementtype.history')}}"> <button class="btn btn-sm btn-primary ">
                                            <i class="fa fa-edit"></i> History
                                        </button></a>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive" id="achievementTableContent">
                        <table class="table table-bordered" id="achievementTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Achievement Name</th>
                                    <th>Achievement Memo</th>
                                    @if((isset($permissions)) && (  
    ($permissions['achievement_type_edit'] == 2) || 
    ($permissions['achievement_type_delete'] == 2)
))
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                 @if((isset($permissions)) && (
    ($permissions['achievement_type_view'] == 2) ||  
    ($permissions['achievement_type_edit'] == 2) || 
    ($permissions['achievement_type_delete'] == 2)
))
                                @foreach($achievementTypes as $achievement)
                                <tr id="achievementRow{{ $achievement->id }}">
    <td>{{ ($achievementTypes->currentPage() - 1) * $achievementTypes->perPage() + $loop->iteration }}</td>
                                    <td class="Name">{{ $achievement->name }}</td>
                                    <td class="memo">{!! $achievement->memo !!}</td>
                                      @if((isset($permissions)) && ( 
    ($permissions['achievement_type_edit'] == 2) || 
    ($permissions['achievement_type_delete'] == 2)
))
                                    <td style="display:flex">
                                         @if((isset($permissions)) && ( ($permissions['achievement_type_edit'] == 2)))
                                        <button class="btn btn-sm btn-primary mx-2 editAchievementBtn" data-id="{{ $achievement->id }}" data-name="{{ $achievement->name }}" data-memo="{{ $achievement->memo }}">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        @endif
                                        @if((isset($permissions)) && ( ($permissions['achievement_type_delete'] == 2)))
                                        <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" data-id="{{ $achievement->id }}">
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

                        <!-- Pagination Links -->
                        <div class="d-flex justify-content-center">
                            {!! $achievementTypes->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Achievement -->
    @if((isset($permissions)) && ( ($permissions['achievement_type_create'] == 2)))
    <div class="col-xxl-5">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Add Achievement</h4>
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <form action="{{ route('achievements.store') }}" id="addAchievementForm" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="name" class="form-label">Achievement Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter achievement name" required>
                            @error('name')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div id="memo-editor" style="height: 200px;"></div>
                            <input type="hidden" name="memo" id="memo" class="form-control @error('memo') is-invalid @enderror">
                            @error('memo')
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

<!-- Delete Modal -->
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
<div class="modal fade" id="editAchievementModal" tabindex="-1" aria-labelledby="editAchievementModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editAchievementForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editAchievementModalLabel">Edit Achievement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Achievement Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="editName" required>
                        @error('name')
                            <div class="invalid-feedback" style="color: red;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div id="editMemoEditor" style="height: 200px;"></div>
                        <input type="hidden" name="memo" id="editMemo" class="form-control @error('memo') is-invalid @enderror">
                        @error('memo')
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
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script>
    $(document).ready(function() {
        // Initialize Quill editor for add form
        var quill = new Quill('#memo-editor', {
            theme: 'snow',
            modules: {
               toolbar: [
    [{ 'font': [] }],
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    ['bold', 'italic', 'underline', 'strike'],
    [{ 'script': 'sub'}, { 'script': 'super' }],
    [{ 'color': [] }, { 'background': [] }],
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'align': [] }],
    ['blockquote', 'code-block'],
    ['link', 'image', 'video'],
    ['clean']
]
            }
        });

        $('#addAchievementForm').submit(function(e) {
            e.preventDefault();
            var memoContent = quill.root.innerHTML;
            $('#memo').val(memoContent);
            this.submit();
        });

        // Edit Achievement functionality
        var quillEdit = new Quill('#editMemoEditor', {
            theme: 'snow',
            modules: {
                       toolbar: [
    [{ 'font': [] }],
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    ['bold', 'italic', 'underline', 'strike'],
    [{ 'script': 'sub'}, { 'script': 'super' }],
    [{ 'color': [] }, { 'background': [] }],
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'align': [] }],
    ['blockquote', 'code-block'],
    ['link', 'image', 'video'],
    ['clean']
]
            }
        });

        // Show modal with existing data
        $(document).on('click', '.editAchievementBtn', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var memo = $(this).data('memo');

            $('#editName').val(name);
            quillEdit.root.innerHTML = memo;
            $('#editAchievementForm').attr('action', '/achievements/' + id);

            $('#editAchievementModal').modal('show');
        });

        // Submit edit form using AJAX
        $('#editAchievementForm').submit(function(e) {
            e.preventDefault();

            var id = $('#editAchievementForm').attr('action').split('/').pop(); // Get the achievement ID
            var editMemoContent = quillEdit.root.innerHTML;
            var editName = $('#editName').val();
            
            $.ajax({
                url: '/achievements/' + id,  // Send to the same URL
                type: 'PUT',  // Use PUT for update
                data: {
                    name: editName,
                    memo: editMemoContent,
                    _token: '{{ csrf_token() }}'  // Add CSRF token for Laravel
                },
                success: function(response) {
                    // Assuming the response contains the updated achievement
                    $('#editAchievementModal').modal('hide'); // Hide the modal

                    // Update the table row with new values
                    var row = $('#achievementRow' + id);  // Assuming each row has an id like #achievement-row-1
                    row.find('.Name').text(editName);
                    row.find('.memo').html(editMemoContent);
                            Swal.fire({
            title: 'Success!',
            text: 'Achivement updated successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
        });


                    // Optionally, display a success message
                },
                error: function(xhr, status, error) {
                    // Handle errors (e.g., validation errors)
                    console.log(xhr.responseText);
                }
            });
        });
        
        
                    // Delete Achievement
            $('.remove-item-btn').click(function() {
                var id = $(this).data('id');
                $('#deleteForm').attr('action', '/achievements/' + id);
            });

            $('#deleteForm').submit(function(event) {
                event.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#achievementRow' + response.id).remove();
                        $('#deleteRecordModal').modal('hide');
                        $('#achievementTable').DataTable().draw();
                    }
                });
            });

    });
</script>

@endsection
