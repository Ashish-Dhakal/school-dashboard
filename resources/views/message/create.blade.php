@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Message Create')

{{-- Content body: main page content --}}
@section('content_body')
    <div class="container">


        <a href="{{ route('message.index') }}" class="btn btn-primary"> Back</a>


        <!-- Modal -->
        <form action="{{ route('message.store') }}" method="post" class="mb-4" enctype="multipart/form-data">
            @csrf

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" id="title" value="{{ old('title') }}" name="title"
                            placeholder="Enter title">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" id="position" value="{{ old('position') }}"
                                name="position" placeholder="Enter position">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter description">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="galleries_id">Gallery</label>
                            <select class="form-control" id="galleries_id" name="galleries_id">
                                <option value="">Select Gallery</option>
                                @foreach ($galleries as $gallery)
                                    <option value="{{ $gallery->id }}">{{ $gallery->gallery_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="post_types_id">Post Types</label>
                            <select class="form-control" id="post_types_id" name="post_types_id">
                                <option value="{{ $posttype->pluck('id')->implode(',') }}">
                                    {{ $posttype->pluck('slug')->implode(' ') }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mt-3"></div>


                <div class="">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
        </form>

    </div>
@stop

{{-- Push extra CSS --}}
@push('css')
    <!-- Add any extra CSS for the table if needed -->
@endpush

{{-- Push extra JS --}}
@push('js')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
