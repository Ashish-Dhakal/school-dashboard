@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Post')
@section('content_header_subtitle', 'Edit Post')

{{-- Content body: main page content --}}
@section('content_body')
    <div class="container">

        <a href="{{ route('gallery.index') }}" class="btn btn-primary">Back</a>

        <form action="{{ route('gallery.update', $gallery->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gallery_name" class="form-label">Gallery Name</label>
                        <input type="text" class="form-control" name="gallery_name" id="gallery_name" value="{{$gallery->gallery_name}}">
                    </div>
                </div>
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary float-left">Add</button>
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
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@endpush
