@extends('frontend.layout') <!-- Extends the layout -->

@section('title', 'Notice') <!-- Sets the page title -->



@section('content') <!-- Fills the content section -->
    <!-- Hero Section -->
    <section id="hero" class="hero section  " style="height:70vh">
        <div>
            <img class="bg-image hover-zoom" src="http://localhost/templates/assets/img/hero-bg.jpg" alt=""
                data-aos="fade-in">
        </div>


        <div class="container text-center">
            <h2 data-aos="fade-up" data-aos-delay="100">Notice</h2>
            <p data-aos="fade-up" data-aos-delay="200">We are team of talented designers making websites with Bootstrap</p>

        </div>

    </section><!-- /Hero Section -->



    <section id="event" class="events section">
        <div class="container content">
            <div class="row gy-4">
                <div class="" data-aos="fade-up" data-aos-delay="100">
                    <div class="float-left mb-3">
                        <h2 class="d-inline-block">Notices</h2>
                    </div>
    
                    <div class="row">
                        @foreach ($notices as $notice)
                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4 shadow-hover"> <!-- Responsive columns -->
                                <a class=" gap-1" 
                                    href="{{ route('content', ['post_type' => $notice->postType->slug, 'post_content' => $notice->slug]) }}">
                                    <div class="d-flex d-flex p-3 border rounded w-100">
                                        <div class="event-meta-data me-3">
                                            <div class="event-meta-date mb-1">
                                                <b>
                                                    {{ \Carbon\Carbon::parse($notice->date)->format('d') }}
                                                </b> <br />
                                                {{ \Carbon\Carbon::parse($notice->date)->format('M') }}<br />
                                                {{ \Carbon\Carbon::parse($notice->date)->format('Y') }}
                                            </div>
                                            <div class="event-meta-icon pt-1">
                                                <i class="bi bi-calendar-event"></i>
                                            </div>
                                        </div>
                    
                                        <div class="event-content-text">
                                            <p class="mb-0">
                                                {{ $notice->title }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    
                    
                    
                </div>
            </div>
        </div>
    </section>

@endsection
