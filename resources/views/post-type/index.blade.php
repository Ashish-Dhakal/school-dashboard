@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Post')
{{-- @section('content_header_subtitle', 'Welcome') --}}

{{-- Content body: main page content --}}
@section('content_body')
    <div class="container">

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add Post Type
        </button>
        <!-- Bootstrap Table -->
        <table class="table table-striped table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Pin to side bar</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($postTypes as $postType)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $postType->name }}</td>
                          <!-- Checkbox for pin_to_sidebar -->
                          <td>
                            <input type="checkbox" class="pin-checkbox" data-id="{{ $postType->id }}"
                                {{ $postType->is_pinned ? 'checked' : '' }}>
                        </td>
                        <td>
                            <div class="d-flex">
                                <a class=" text-decoration-none" href="{{ route('postType.edit', $postType->slug) }}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                                <form action="{{ route('postType.destroy', $postType->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger mx-3" type="submit">Delete</button>
                                </form>


                            </div>

                        </td>
                    </tr>
                @endforeach
                <!-- Add more rows as needed -->
            </tbody>
        </table>
        <div>
            {{ $postTypes->links('vendor.pagination.bootstrap-5') }}
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Post Type</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('postType.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Post Type Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Post Type Name">



                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
@stop

{{-- Push extra CSS --}}
@push('css')
    <!-- Add any extra CSS for the table if needed -->
@endpush

{{-- Push extra JS --}}
@push('js')
<script>
    // Handle the pin checkbox change event
    $('.pin-checkbox').on('change', function() {
        var postTypeId = $(this).data('id');
        var isChecked = $(this).is(':checked') ? 1 : 0;

        // Send an AJAX request to update the status in the database
        $.ajax({
            url: '{{ route('postType.updatePinStatus') }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: postTypeId,
                pin_to_sidebar: isChecked
            },
            success: function(response) {
                // Optionally show a message or update UI
                console.log(response.message);
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
</script>
@endpush
