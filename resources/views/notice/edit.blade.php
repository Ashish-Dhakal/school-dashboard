@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Notice')
@section('content_header_title', 'Notice')
@section('content_header_subtitle', 'Edit Notice')

{{-- Include CKEditor Component --}}
@include('components.ckeditor')

{{-- Content body: main page content --}}
@section('content_body')
    <x-form-layout 
        title="Edit Notice: {{ $notice->title }}" 
        action="{{ route('notice.update', $notice->slug) }}" 
        method="POST" 
        :hasFiles="true">
        @method('PUT')
        
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label required">Title</label>
                            <input type="text" 
                                class="form-control @error('title') is-invalid @enderror" 
                                name="title" 
                                value="{{ old('title', $notice->title) }}" 
                                placeholder="Enter notice title">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label class="form-label required">Description</label>
                            <textarea class="form-control editor @error('description') is-invalid @enderror" 
                                name="description" 
                                rows="5">{{ old('description', $notice->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label class="form-label required">Date</label>
                            <input type="date" 
                                class="form-control @error('date') is-invalid @enderror" 
                                name="date" 
                                value="{{ old('date', $notice->date) }}">
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
                        <h3 class="card-title">Notice Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Feature Image</label>
                            <div class="custom-file-container" data-upload-id="featureImage">
                                @if ($notice->feature_image)
                                    <div class="current-image mb-3">
                                        <label class="d-block text-muted mb-2">Current Image</label>
                                        <img src="{{ asset('images/' . $notice->feature_image) }}" 
                                            alt="Current Feature Image" 
                                            class="img-fluid rounded">
                                    </div>
                                @endif
                                
                                <input type="file" 
                                    class="form-control custom-file-input @error('feature_image') is-invalid @enderror" 
                                    name="feature_image" 
                                    id="feature_image"
                                    accept="image/*">
                                <div class="preview mt-2">
                                    <small class="text-muted">Upload new image to change</small>
                                </div>
                                
                                <input type="hidden" name="current_image" value="{{ $notice->feature_image }}">
                            </div>
                            @error('feature_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label class="form-label">Gallery</label>
                            <select class="form-control select2 @error('galleries_id') is-invalid @enderror" 
                                name="galleries_id">
                                <option value="">Select Gallery</option>
                                @foreach ($galleries as $gallery)
                                    <option value="{{ $gallery->id }}" 
                                        {{ old('galleries_id', $notice->gallery?->id) == $gallery->id ? 'selected' : '' }}>
                                        {{ $gallery->gallery_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('galleries_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label class="form-label required">Post Type</label>
                            <select class="form-control select2 @error('post_types_id') is-invalid @enderror" 
                                name="post_types_id">
                                <option value="{{ $posttype->pluck('id')->implode(',') }}">
                                    {{ $posttype->pluck('slug')->implode(' ') }}
                                </option>
                            </select>
                            @error('post_types_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
    
    .custom-file-container .current-image img {
        max-height: 200px;
        width: auto;
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

@push('js')
<script>
    $(document).ready(function() {
        // Initialize Select2
        $('.select2').select2({
            theme: 'bootstrap4',
            width: '100%'
        });
        
        // Image preview
        $('#feature_image').change(function() {
            const file = this.files[0];
            const preview = $(this).siblings('.preview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.html(`<img src="${e.target.result}" alt="Preview">`);
                }
                reader.readAsDataURL(file);
            } else {
                preview.html('Upload new image to change');
            }
        });
    });
</script>
@endpush
