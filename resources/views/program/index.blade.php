@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Program')
@section('content_header_title', 'Programs')
@section('content_header_subtitle', 'Manage Programs')

{{-- Content body: main page content --}}
@section('content_body')
    <x-table-layout 
        title="All Programs" 
        createUrl="{{ route('program.create') }}">
        
        <div class="table-responsive">
            <table class="table table-hover" id="programsTable">
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
                    @forelse($programs as $program)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $program->title }}</td>
                            <td>{{ $program->slug }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($program->description, 100, '...') }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($program->sub_desc, 100, '...') }}</td>
                            <td>
                                <span class="badge bg-info">
                                    {{ $program->gallery->gallery_name ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $program->postType->name ?? '-' }}
                                </span>
                            </td>
                            <td>
                                @if($program->feature_image)
                                    <img src="{{ asset('images/' . $program->feature_image) }}" 
                                        alt="Feature Image" 
                                        class="img-thumbnail" 
                                        style="max-width: 50px;">
                                @else
                                    <span class="badge bg-secondary">No Image</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('program.edit', $program->slug) }}" 
                                        class="btn btn-sm btn-primary" 
                                        data-bs-toggle="tooltip" 
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('program.destroy', $program->slug) }}" 
                                        method="POST" 
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="btn btn-sm btn-danger" 
                                            data-bs-toggle="tooltip" 
                                            title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this program?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <div class="empty-state">
                                    <i class="fas fa-folder-open text-muted mb-3" style="font-size: 3rem;"></i>
                                    <h6 class="text-muted">No programs found</h6>
                                    <a href="{{ route('program.create') }}" class="btn btn-primary mt-3">
                                        <i class="fas fa-plus"></i> Create New Program
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
        $('#programsTable').DataTable({
            pageLength: 10,
            ordering: true,
            responsive: true,
            language: {
                search: "",
                searchPlaceholder: "Search programs..."
            }
        });

        // Initialize tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
@endpush
