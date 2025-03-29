@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Event')
@section('content_header_title', 'Event')
@section('content_header_subtitle', 'Create Event')

{{-- Include CKEditor Component --}}
@include('components.ckeditor')

{{-- Content body: main page content --}}
@section('content_body')
    <x-form-layout 
        title="Create New Event" 
        action="{{ route('event.store') }}" 
        method="POST" 
        :hasFiles="true">
        
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title" class="form-label required">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                id="title" name="title" value="{{ old('title') }}"
                                placeholder="Enter event title">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="description" class="form-label required">Description</label>
                            <textarea class="form-control editor @error('description') is-invalid @enderror" 
                                id="description" name="description" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="date" class="form-label required">Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" 
                                id="date" name="date" value="{{ old('date') }}">
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h3 class="card-title">Event Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="feature_image" class="form-label">Feature Image</label>
                            <input type="file" class="form-control @error('feature_image') is-invalid @enderror" 
                                id="feature_image" name="feature_image" accept="pdf/*, image/*">
                            @error('feature_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div id="imagePreview" class="image-preview mt-2"></div>
                        </div>
                        <div class="form-group">
                            <label for="pdf" class="form-label">PDF</label>
                            <input type="file" class="form-control @error('pdf') is-invalid @enderror" 
                                id="pdf" name="pdf" accept="application/pdf">
                            @error('pdf')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div id="imagePreview" class="image-preview mt-2"></div>
                        </div>

                        <div class="form-group mt-4">
                            <label for="galleries_id" class="form-label">Gallery</label>
                            <select class="form-control @error('galleries_id') is-invalid @enderror" 
                                id="galleries_id" name="galleries_id">
                                <option value="">Select Gallery</option>
                                @foreach($galleries as $gallery)
                                    <option value="{{ $gallery->id }}" 
                                        {{ old('galleries_id') == $gallery->id ? 'selected' : '' }}>
                                        {{ $gallery->gallery_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('galleries_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="post_types_id" class="form-label required">Post Type</label>
                            <select class="form-control @error('post_types_id') is-invalid @enderror" 
                                id="post_types_id" name="post_types_id">
                                <option value="{{ $posttype->pluck('id')->implode(',') }}">
                                    {{ $posttype->pluck('slug')->implode(' ') }}
                                </option>
                            </select>
                            @error('post_types_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" 
                                    id="is_featureEvent" name="is_featureEvent" 
                                    {{ old('is_featureEvent') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_featureEvent">Featured Event</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-form-layout>
@stop

{{-- Push extra CSS --}}
@push('css')
<style>
    .required:after {
        content: ' *';
        color: red;
    }
    
    .custom-file-container {
        position: relative;
    }
    
    .custom-file-container .preview {
        max-width: 100%;
        height: 150px;
        background: #f8f9fa;
        border: 2px dashed #dee2e6;
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.875rem;
        color: #6c757d;
    }
    
    .custom-file-container .preview img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
    
    .select2-container--bootstrap4 .select2-selection--single {
        height: calc(2.25rem + 2px) !important;
    }
</style>
@endpush

{{-- Push extra JS --}}
@push('js')
<script>
    $(document).ready(function() {
        // Image preview
        $('#feature_image').change(function() {
            const file = this.files[0];
            const preview = $('#imagePreview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.html(`<img src="${e.target.result}" alt="Preview">`);
                }
                reader.readAsDataURL(file);
            } else {
                preview.empty();
            }
        });
    });
</script>
@endpush
