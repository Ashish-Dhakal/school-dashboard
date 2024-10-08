@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Gallery')

{{-- Content body: main page content --}}
@section('content_body')
    <div class="container">

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add Gallary
        </button>
        <!-- Bootstrap Table -->        
        <table class="table table-striped table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
       
                @foreach ($galleries as $gallery)
                    <tr>
                        <td>{{ $loop->iteration }} </td>
                        <td>{{ $gallery->gallery_name }}</td>
                        <td>
                            <div class="d-flex">
                                <!-- Edit Button -->
                                <a class="text-decoration-none" href="{{ route('gallery.edit',$gallery->id) }}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                                <!-- Delete Form -->
                                <form action="{{ route('gallery.destroy',$gallery->id) }}" method="POST">
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
            {{ $galleries->links('vendor.pagination.bootstrap-5') }}
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Gallery</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="gallery_name" class="form-label">Gallery Name</label>
                                <input type="text" class="form-control" name="gallery_name" id="gallery_name"
                                       placeholder="Gallery Name">
                            </div>
                            <div class="mb-3">
                                <label for="images" class="form-label">Gallery Images</label>
                                <input type="file" class="form-control" name="images[]" id="images" multiple>
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
   
@endpush
