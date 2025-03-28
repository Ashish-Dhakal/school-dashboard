@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Event')
@section('content_header_title', 'Event')
@section('content_header_subtitle', 'Manage Event')

{{-- Content body: main page content --}}
@section('content_body')
    <x-table-layout 
        title="All Events" 
        createUrl="{{ route('event.create') }}">
        
        <div class="table-responsive">
            <table class="table table-hover" id="eventTable">
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
                    @forelse($events as $event)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->slug }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($event->description, 100, '...') }}</td>
                            <td>{{ $event->date }}</td>
                            <td>
                                <span class="badge bg-info">
                                    {{ $event->gallery->gallery_name ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $event->postType->name ?? '-' }}
                                </span>
                            </td>
                            <td>
                                @if($event->feature_image)
                                    <img src="{{ asset('images/' . $event->feature_image) }}" 
                                        alt="Event Image" 
                                        class="img-thumbnail" 
                                        style="max-width: 50px;">
                                @else
                                    <span class="badge bg-secondary">No Image</span>
                                @endif
                            </td>
                            <td>
                                @if($event->is_featureEvent)
                                    <span class="badge bg-success">Featured</span>
                                @else
                                    <span class="badge bg-secondary">Regular</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('event.edit', $event->slug) }}" 
                                        class="btn btn-sm btn-primary" 
                                        data-bs-toggle="tooltip" 
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('event.destroy', $event->slug) }}" 
                                        method="POST" 
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="btn btn-sm btn-danger" 
                                            data-bs-toggle="tooltip" 
                                            title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this event?')">
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
                                    <i class="fas fa-calendar-alt text-muted mb-3" style="font-size: 3rem;"></i>
                                    <h6 class="text-muted">No events found</h6>
                                    <a href="{{ route('event.create') }}" class="btn btn-primary mt-3">
                                        <i class="fas fa-plus"></i> Create New Event
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
        $('#eventTable').DataTable({
            pageLength: 10,
            ordering: true,
            responsive: true,
            language: {
                search: "",
                searchPlaceholder: "Search event..."
            }
        });

        // Initialize tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
@endpush
