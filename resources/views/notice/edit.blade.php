@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Notice Edit')

{{-- Content body: main page content --}}
@section('content_body')
    <div class="container">


        <a href="{{ route('notice.index') }}" class="btn btn-primary"> Back</a>


        <!-- Modal -->
        <form action="{{ route('notice.update', $notice->slug) }}" method="post" class="mb-4" enctype="multipart/form-data">
            @csrf

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title"
                            value="{{ $notice->title, old('title') }}" name="title" placeholder="Enter title">
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date"
                            min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" onfocus="this.showPicker()">

                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter description">{{$notice->description , old('description') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="pdf">Notice File (Image or PDF)</label>
                        <td>
                            @if(pathinfo($notice->pdf, PATHINFO_EXTENSION) == 'pdf')
                                <iframe src="{{ asset('images/' . $notice->pdf) }}" style="width: 100px; height: 100px;" frameborder="0"></iframe>
                            @else
                                <img src="{{ asset('images/' . $notice->pdf) }}" alt="" style="max-width: 100px;">
                            @endif
                        </td>
                        <br>
                        <input type="file" name="pdf" id="pdf" accept="image/*,application/pdf" placeholder="choose new one to upload new PDF">

                    </div>
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="galleries_id">Gallery</label>
                        <select class="form-control" id="galleries_id" name="galleries_id">
                            <option value="">Select Gallery</option>
                            @foreach ($galleries as $gallery)
                                <option value="{{ $gallery->id }}">{{ $gallery->gallery_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="post_types_id">Post Types</label>
                        <select class="form-control" id="post_types_id" name="post_types_id">
                            <option value="{{ $posttype->pluck('id')->implode(',') }}">
                                {{ $posttype->pluck('slug')->implode(' ') }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mt-3"></div>


            <div class="">
                <button type="submit" class="btn btn-primary">Add</button>
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
    {{-- <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script> --}}
@endpush
