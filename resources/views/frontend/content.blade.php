@extends('frontend.layout') <!-- Extends the layout -->

@section('title', 'About Us') <!-- Sets the page title -->

@section('content') <!-- Fills the content section -->
    <!-- Hero Section -->
    <section id="hero" class="hero section  " style="height:70vh">
        <div>
            <img class="bg-image hover-zoom"
                src="{{ $content->feature_image ? asset('images/' . $content->feature_image) : asset('assets/img/hero-bg.jpg') }}"
                alt="Feature Image" data-aos="fade-in">
        </div>


        <div class="container text-center">
            <h2 data-aos="fade-up" data-aos-delay="100">{{$content->title }}</h2>

            {{-- <p data-aos="fade-up" data-aos-delay="200">We are team of talented designers making websites with Bootstrap</p> --}}

        </div>


    </section>

    {{-- {{$about}} --}}
    <section id="content" class="content container">
        <h2 data-aos="fade-up" data-aos-delay="100">{{$content->title }}</h2>


        
        {!! $content->description !!}

        <a href="apply.html" class="btn btn-primary">Apply Now</a>






    </section>

@endsection
