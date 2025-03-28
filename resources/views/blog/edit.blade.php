@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Blog')
@section('content_header_subtitle', 'Edit Blog')

{{-- Include CKEditor Component --}}
@include('components.ckeditor')

{{-- Content body: main page content --}}
@section('content_body')
    <div class="container">
        <a href="{{ route('blog.index') }}" class="btn btn-primary">Back</a>

        <form action="{{ route('blog.update', $blog->slug) }}" method="post" class="mb-4" enctype="multipart/form-data">
            @csrf

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="feature_image">Feature Image</label>
                        @if ($blog->feature_image)
                            <div class="mb-2">
                                <img src="{{ asset('images/' . $blog->feature_image) }}" alt="Feature Image"
                                    style="max-width: 100px;">
                            </div>
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
                        <textarea class="form-control editor" id="description" name="description">{{ $blog->description }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="sub_desc">Sub Description</label>
                        <textarea class="form-control editor" id="sub_desc" name="sub_desc">{{ $blog->sub_desc }}</textarea>
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
                        <select class="form-control" id="post_types_id" name="post_types_id" required>
                            <option value="{{ $posttype->pluck('id')->implode(',') }}">
                                {{ $posttype->pluck('slug')->implode(' ') }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update Blog</button>
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
