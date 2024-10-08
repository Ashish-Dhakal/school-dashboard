@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'About')
{{-- @section('content_header_subtitle', '') --}}

{{-- Content body: main page content --}}
@section('content_body')
    <div class="container">

        <a href="{{ route('about.create') }}" class="btn btn-primary"> Add Content</a>
        <!-- Bootstrap Table -->
        <table class="table table-striped table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Description</th>
                    <th scope="col">Sub Description</th>
                    <th scope="col">Galleries</th>
                    <th scope="col">Post Types</th>
                    <th scope="col">Feature Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($abouts as $about)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $about->title }}</td>
                        <td>{{ $about->slug }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($about->description, 100, '...') }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($about->sub_desc, 100, '...') }}</td>
                        <td>{{ $about->gallery->gallery_name??'-'}}</td>
                        <td>{{ $about->postType->name??'-' }}</td>
                        <td><img src="{{ asset('images/' . $about->feature_image) }}" alt="Feature Image" style="max-width: 100px;"></td>

                        <td> 
                            <div class="d-flex">
                                <a href="{{ route('about.edit', $about->slug) }}"
                                    class="btn btn-primary">Edit</a>
                                <form action="{{ route('about.destroy', $about->slug) }}" method="POST"
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
