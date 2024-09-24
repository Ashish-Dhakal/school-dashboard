@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Post')
@section('content_header_subtitle', 'Edit Post')

{{-- Content body: main page content --}}
@section('content_body')
    <div class="container">

        <a href="{{ route('postType.index') }}" class="btn btn-primary">Back</a>

        <form action="{{ route('postType.update', $postType->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Post Type Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $postType->name }}" placeholder="Post Type Name">
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
 
@endpush
