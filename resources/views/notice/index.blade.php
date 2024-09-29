@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'notice')
{{-- @section('content_header_subtitle', '') --}}

{{-- Content body: main page content --}}
@section('content_body')
    <div class="container">

        <a href="{{ route('notice.create') }}" class="btn btn-primary"> Add Notice</a>
        <!-- Bootstrap Table -->
        <table class="table table-striped table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Galleries</th>
                    <th scope="col">Post Types</th>
                    <th scope="col">PDF</th>
                    <th scope="col">Featured Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notices as $notice)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $notice->title ?? '-' }}</td>
                        <td>{{ $notice->slug ?? '-' }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($notice->description, 100, '...') }}</td>
                        <td>{{ $notice->date ?? '-' }}</td>
                        <td>{{ $notice->gallery->gallery_name ?? '-' }}</td>
                        <td>{{ $notice->postType->name ?? '-' }}</td>

                        <td>
                            @if (pathinfo($notice->pdf, PATHINFO_EXTENSION) == 'pdf')
                                <a href="{{ asset('images/' . $notice->pdf) }}" target="_blank" class=" text-black">View
                                    PDF</a>
                            @else
                                <img src="{{ asset('images/' . $notice->pdf) }}" alt="" style="max-width: 100px;">
                            @endif
                        </td>
                        <td>
                            @if ($notice->is_featureNotice === 1)
                                <span class="badge badge-success">Yes</span>
                            @else
                                <span class="badge badge-danger">No</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('notice.edit', $notice->slug) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('notice.destroy', $notice->slug) }}" method="POST"
                                    style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mx-2">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                <!-- Add more rows as needed -->
            </tbody>
        </table>
        <div>
            {{-- {{ $->links('vendor.pagination.bootstrap-5') }} --}}
        </div>



    </div>
@stop

{{-- Push extra CSS --}}
@push('css')
    <!-- Add any extra CSS for the table if needed -->
@endpush

{{-- Push extra JS --}}
@push('js')
    
@endpush
