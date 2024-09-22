@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Program')
{{-- @section('content_header_subtitle', '') --}}

{{-- Content body: main page content --}}
@section('content_body')
    <div class="container">

        <a href="{{ route('program.create') }}" class="btn btn-primary"> Add Content</a>
        <!-- Bootstrap Table -->
        <table class="table table-striped table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>hrllo</td>
                    <td>hello</td>
                    <td>
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>

                    </td>
                </tr>

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
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@endpush
