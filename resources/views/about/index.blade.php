@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'About')
@section('content_header_title', 'About')
@section('content_header_subtitle', 'Manage About')

{{-- Content body: main page content --}}
@section('content_body')
    <x-table-layout 
        title="All About" 
        createUrl="{{ route('about.create') }}">
        
        <div class="table-responsive">
            <table class="table table-hover" id="aboutTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Description</th>
                        <th scope="col">Sub Description</th>
                        <th scope="col">Galleries</th>
                        <th scope="col">Post Types</th>
                        <th scope="col">Feature Image</th>
                        <th scope="col" width="120px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($abouts as $about)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $about->title }}</td>
                            <td>{{ $about->slug }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($about->description, 100, '...') }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($about->sub_desc, 100, '...') }}</td>
                            <td>
                                <span class="badge bg-info">
                                    {{ $about->gallery->gallery_name ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $about->postType->name ?? '-' }}
                                </span>
                            </td>
                            <td>
                                @if($about->feature_image)
                                    <img src="{{ asset('images/' . $about->feature_image) }}" 
                                        alt="Feature Image" 
                                        class="img-thumbnail" 
                                        style="max-width: 50px;">
                                @else
                                    <span class="badge bg-secondary">No Image</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('about.edit', $about->slug) }}" 
                                        class="btn btn-sm btn-primary" 
                                        data-bs-toggle="tooltip" 
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('about.destroy', $about->slug) }}" 
                                        method="POST" 
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="btn btn-sm btn-danger" 
                                            data-bs-toggle="tooltip" 
                                            title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this about?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-4">
                                <div class="empty-state">
                                    <i class="fas fa-folder-open text-muted mb-3" style="font-size: 3rem;"></i>
                                    <h6 class="text-muted">No about content found</h6>
                                    <a href="{{ route('about.create') }}" class="btn btn-primary mt-3">
                                        <i class="fas fa-plus"></i> Create New About
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
        $('#aboutTable').DataTable({
            pageLength: 10,
            ordering: true,
            responsive: true,
            language: {
                search: "",
                searchPlaceholder: "Search about..."
            }
        });

        // Initialize tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
@endpush
