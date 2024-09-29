@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Blog Create')

{{-- Content body: main page content --}}
@section('content_body')
    <div class="container">


        <a href="{{ route('blog.index') }}" class="btn btn-primary"> Back</a>


        <!-- Modal -->
        <form action="{{ route('blog.update', $blog->slug) }}" method="post" class="mb-4"
            enctype="multipart/form-data">
            @csrf

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $blog->title }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="feature_image">Feature Image</label>
                        
                        @if ($blog->feature_image)
                            <div class="mb-3">
                                <img src="{{ asset('images/' . $blog->feature_image) }}" alt="Feature Image"
                                    style="max-width: 100px;">
                            </div>
                        @else
                            <p>No image available</p>
                        @endif
                        <input type="file" class="form-control" id="feature_image" name="feature_image">

                        <input type="hidden" name="current_image" value="{{ $blog->feature_image }}">
                    </div>



                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"> {{ $blog->description }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="sub_desc">Sub Description</label>
                        <textarea class="form-control" id="sub_desc" name="sub_desc">{{ $blog->sub_desc }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="galleries_id">Gallery</label>
                        <select class="form-control" id="galleries_id" name="galleries_id">
                            <option value="{{ $blog->gallery?->id ?? '' }}">
                                {{ $blog->gallery ? $blog->gallery->gallery_name : 'Select a gallery' }}</option>
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
