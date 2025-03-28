@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Event')
@section('content_header_subtitle', 'Edit Event')

{{-- Include CKEditor Component --}}
@include('components.ckeditor')

{{-- Content body: main page content --}}
@section('content_body')
    <div class="container">
        <a href="{{ route('event.index') }}" class="btn btn-primary">Back</a>

        <form action="{{ route('event.update', $event->slug) }}" method="post" class="mb-4" enctype="multipart/form-data">
            @csrf

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pdf">PDF/Image</label>
                        @if ($event->pdf)
                            <div class="mb-2">
                                @if (in_array(pathinfo($event->pdf, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'bmp']))
                                    <img src="{{ asset('images/' . $event->pdf) }}" alt="Event Image" style="max-width: 100px;">
                                @else
                                    <a href="{{ asset('images/' . $event->pdf) }}" target="_blank">View Current PDF</a>
                                @endif
                            </div>
                        @endif
                        <input type="file" class="form-control" id="pdf" name="pdf">
                        <input type="hidden" name="current_pdf" value="{{ $event->pdf }}">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control editor" id="description" name="description">{{ $event->description }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ $event->date }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="galleries_id">Gallery</label>
                        <select class="form-control" id="galleries_id" name="galleries_id">
                            <option value="{{ $event->gallery?->id ?? '' }}">
                                {{ $event->gallery ? $event->gallery->gallery_name : 'Select a gallery' }}</option>
                            @foreach ($galleries as $gallery)
                                <option value="{{ $gallery->id }}">{{ $gallery->gallery_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
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

                <div class="col-md-6">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is_featureNotice" name="is_featureNotice"
                                {{ $event->is_featureNotice ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_featureNotice">Featured Event</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update Event</button>
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
