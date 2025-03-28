@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Blog')
@section('content_header_title', 'Blog')
@section('content_header_subtitle', 'Manage Blog')

{{-- Content body: main page content --}}
@section('content_body')
    <x-table-layout 
        title="All Blogs" 
        createUrl="{{ route('blog.create') }}">
        
        <div class="table-responsive">
            <table class="table table-hover" id="blogTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Galleries</th>
                        <th scope="col">Post Types</th>
                        <th scope="col">Image</th>
                        <th scope="col">Featured</th>
                        <th scope="col" width="120px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->slug }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($blog->description, 100, '...') }}</td>
                            <td>{{ $blog->date }}</td>
                            <td>
                                <span class="badge bg-info">
                                    {{ $blog->gallery->gallery_name ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $blog->postType->name ?? '-' }}
                                </span>
                            </td>
                            <td>
                                @if($blog->feature_image)
                                    <img src="{{ asset('images/' . $blog->feature_image) }}" 
                                        alt="Blog Image" 
                                        class="img-thumbnail" 
                                        style="max-width: 50px;">
                                @else
                                    <span class="badge bg-secondary">No Image</span>
                                @endif
                            </td>
                            <td>
                                @if($blog->is_featureBlog)
                                    <span class="badge bg-success">Featured</span>
                                @else
                                    <span class="badge bg-secondary">Regular</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('blog.edit', $blog->slug) }}" 
                                        class="btn btn-sm btn-primary" 
                                        data-bs-toggle="tooltip" 
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('blog.destroy', $blog->slug) }}" 
                                        method="POST" 
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="btn btn-sm btn-danger" 
                                            data-bs-toggle="tooltip" 
                                            title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this blog?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center py-4">
                                <div class="empty-state">
                                    <i class="fas fa-newspaper text-muted mb-3" style="font-size: 3rem;"></i>
                                    <h6 class="text-muted">No blogs found</h6>
                                    <a href="{{ route('blog.create') }}" class="btn btn-primary mt-3">
                                        <i class="fas fa-plus"></i> Create New Blog
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-table-layout>
@stop

{{-- Push extra CSS --}}
@push('css')
<style>
    .badge {
        font-size: 0.8rem;
        font-weight: 500;
        padding: 0.35em 0.65em;
    }
    
    .table th {
        font-weight: 600;
        background-color: #f8f9fa;
    }
    
    .empty-state {
        text-align: center;
        padding: 2rem;
    }
    
    .btn-group .btn {
        padding: 0.25rem 0.5rem;
    }
    
    .btn-group .btn i {
        font-size: 0.875rem;
    }
    
    .img-thumbnail {
        padding: 0.25rem;
        border-radius: 0.25rem;
    }
</style>
@endpush

{{-- Push extra JS --}}
@push('js')
<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#blogTable').DataTable({
            pageLength: 10,
            ordering: true,
            responsive: true,
            language: {
                search: "",
                searchPlaceholder: "Search blog..."
            }
        });

        // Initialize tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
@endpush
