
@extends('frontend.layout') <!-- Extends the layout -->

@section('title', 'Home') <!-- Sets the page title -->

@section('content') <!-- Fills the content section -->


    <!-- Hero Section -->
    <section id="hero" class="hero section ">
        <div>
            <img class="bg-image hover-zoom" src="/assets/img/hero-bg.jpg" alt="" data-aos="fade-in">
        </div>


        <div class="container">
            <h2 data-aos="fade-up" data-aos-delay="100">Learning Today,<br>Leading Tomorrow</h2>
            <p data-aos="fade-up" data-aos-delay="200">We are team of talented designers making websites with Bootstrap
            </p>
            <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                <a href="courses.html" class="btn-get-started">Get Started</a>
            </div>
        </div>

    </section><!-- /Hero Section -->




    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <img width="100%"
                        src="https://i0.pickpik.com/photos/661/876/856/entrepreneur-computer-man-office-preview.jpg"
                        class="img-fluid" alt="">
                </div>

                <div class="col-lg-7 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                    <h3>Message From Principle</h3>
                    <p class="fst-italic">
                        At padandas, we offer comprehensive IT solutions tailored to your business needs. Our services
                        include the design, development, implementation.
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Duis aute irure dolor in reprehenderit in
                                voluptate velit.</span></li>
                    </ul>

                </div>

            </div>

        </div>

    </section>
    <!-- /About Section -->

    <!-- Counts Section -->
    <section id="counts" class="section counts">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Students</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Courses</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Events</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Staffs</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </section><!-- /Counts Section -->
    <section id="cards-i" class="cards-i section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Course We Offer</h2>
            <p>Popular cards</p>
        </div>

        <div class="container" data-aos="fade-up">

            <div class="row justify-content-around">


                @foreach ($programs as $program)
                    <div class="col-md-3 d-flex align-items-stretch">
                        <div class="card">
                            <div class="card-img">
                                {{-- <img src="../../assets/img/events-item-1.jpg" alt="..."> --}}

                                <img src="{{ asset('images/' . $program->feature_image) }}" alt="Feature Image">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="">{{ $program->title }}</a></h5>
                                <p class="fst-italic text-center">Sunday, September 26th at 7:00 pm</p>
                            </div>
                        </div>
                    </div>
                @endforeach




                {{-- <div class="col-md-3 d-flex align-items-stretch">
                    <div class="card">
                        <div class="card-img">
                            <img src="../../assets/img/events-item-1.jpg" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">Neb+2 Management</a></h5>
                            <p class="fst-italic text-center">Sunday, September 26th at 7:00 pm</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-items-stretch">
                    <div class="card">
                        <div class="card-img">
                            <img src="../../assets/img/events-item-2.jpg" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">Bsc Csit</a></h5>
                            <p class="fst-italic text-center">Sunday, November 15th at 7:00 pm</p>
                        </div>
                    </div>

                </div> --}}
            </div>

        </div>

    </section>

    <section id="event" class="events section">
        <div class="container content">
            <div class="row gy-4">
                <div style="    border-left: 1px solid green;" class="col-lg-6 order-1 order-lg-2  "
                    data-aos="fade-up" data-aos-delay="100">
                    <div class="d-flex justify-content-between section-title">
                        <h2 class="d-inline-block">Events</h2>
                        <a href="#">View All Events</a>
                    </div>
                    @foreach ($events as $event)
                        <div class="d-flex flex-wrap">
                            <a class="event-item d-inline-block" href="{{asset('images/' . $event->pdf) }}"
                                target="_blank">
                                <div class=" d-flex m-1">
                                    <div class="event-meta-data m-1">
                                        <div class="event-meta-date mb-1">
                                            <b>
                                                {{ \Carbon\Carbon::parse($event->date)->format('d') }}
                                            </b> <br />
                                            {{ \Carbon\Carbon::parse($event->date)->format('M') }}<br />
                                            {{ \Carbon\Carbon::parse($event->date)->format('Y') }}

                                        </div>
                                        <div class="event-meta-icon pt-1">
                                            <i class="bi bi-calendar-event"></i>
                                        </div>
                                    </div>
                                    <div class="event-content-text">
                                        <p>
                                            {{ $event->title }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-6 order-2 order-lg-1  " data-aos="fade-up" data-aos-delay="100">
                    <div class="d-flex justify-content-between section-title">
                        <h2 class="d-inline-block  ">Notices</h2>
                        <a href="#">View All Notice</a>
                    </div>
                    @foreach ($notices as $notice)
                        <div class="d-flex flex-wrap">
                            <a class="event-item d-inline-block" href="{{ asset('images/' . $notice->pdf) }}"
                                target="_blank">
                                <div class=" d-flex m-1">
                                    <div class="event-meta-data m-1">
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
                                        <p>
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
    </section>

    <section id="" class="cards section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Learn More About Us</h2>
            <p>Blogs and Articles</p>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="row">

                <div class="col-lg-3 mb-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div class="card-item">
                        <img src="../../assets/img/course-1.jpg" class="img-fluid" alt="..." />
                        <div class="card-content">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="category">Web Development</p>
                                <p class="date">2020/03/01</p>
                            </div>

                            <h3>
                                <a href="card-details.html">Let's learn about new knowledge and abilities</a>
                            </h3>
                            <p class="description">
                                Et architecto provident deleniti facere repellat nobis iste.
                                Id facere quia quae dolores dolorem tempore.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mb-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div class="card-item">
                        <img src="../../assets/img/course-1.jpg" class="img-fluid" alt="..." />
                        <div class="card-content">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="category">Web Development</p>
                                <p class="date">2020/03/01</p>
                            </div>

                            <h3>
                                <a href="card-details.html">Let's learn about new knowledge and abilities</a>
                            </h3>
                            <p class="description">
                                Et architecto provident deleniti facere repellat nobis iste.
                                Id facere quia quae dolores dolorem tempore.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mb-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div class="card-item">
                        <img src="../../assets/img/course-1.jpg" class="img-fluid" alt="..." />
                        <div class="card-content">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="category">Web Development</p>
                                <p class="date">2020/03/01</p>
                            </div>

                            <h3>
                                <a href="card-details.html">Let's learn about new knowledge and abilities</a>
                            </h3>
                            <p class="description">
                                Et architecto provident deleniti facere repellat nobis iste.
                                Id facere quia quae dolores dolorem tempore.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div class="card-item">
                        <img src="../../assets/img/course-1.jpg" class="img-fluid" alt="..." />
                        <div class="card-content">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="category">Web Development</p>
                                <p class="date">2020/03/01</p>
                            </div>

                            <h3>
                                <a href="card-details.html">Let's learn about new knowledge and abilities</a>
                            </h3>
                            <p class="description">
                                Et architecto provident deleniti facere repellat nobis iste.
                                Id facere quia quae dolores dolorem tempore.
                            </p>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>

    <section id="" class="gallery section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Moments and Memories</h2>
            <p>Gallery</p>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div class="gallery-item">
                        <img data-imagebox="g1" src="../../assets/img/course-1.jpg" class="img-fluid"
                            alt="..." />

                    </div>
                </div>
                <div class="col-lg-3 mb-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div class="gallery-item">
                        <img data-imagebox="g1" src="../../assets/img/course-1.jpg" class="img-fluid"
                            alt="..." />

                    </div>
                </div>
                <div class="col-lg-3 mb-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div class="gallery-item">
                        <img data-imagebox="g1" src="../../assets/img/course-1.jpg" class="img-fluid"
                            alt="..." />

                    </div>
                </div>
                <div class="col-lg-3 mb-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div class="gallery-item">
                        <img data-imagebox="g1" src="../../assets/img/course-1.jpg" class="img-fluid"
                            alt="..." />

                    </div>
                </div>
                <div class="col-lg-3 mb-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div class="gallery-item">
                        <img data-imagebox="g1" src="../../assets/img/course-1.jpg" class="img-fluid"
                            alt="..." />

                    </div>
                </div>
                <div class="col-lg-3 mb-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div class="gallery-item">
                        <img data-imagebox="g1" src="../../assets/img/course-1.jpg" class="img-fluid"
                            alt="..." />

                    </div>
                </div>
                <div class="col-lg-3 mb-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div class="gallery-item">
                        <img data-imagebox="g1" src="../../assets/img/course-1.jpg" class="img-fluid"
                            alt="..." />

                    </div>
                </div>
                <div class="col-lg-3 mb-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div class="gallery-item">
                        <img data-imagebox="g1"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXJA32WU4rBpx7maglqeEtt3ot1tPIRWptxA&s"
                            class="img-fluid" alt="..." />

                    </div>
                </div>
                <div class="col-lg-3 mb-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div class="gallery-item">
                        <img data-imagebox="g1" src="../../assets/img/course-1.jpg" class="img-fluid"
                            alt="..." />

                    </div>
                </div>
                <!-- End gallery Item-->


            </div>
        </div>
    </section>

    <section id="maps" class="container maps">
        <div class="container section-title" data-aos="fade-up">
            <h2>Our Location</h2>
            <p>Find us on the map</p>
        </div>


        <div style="max-width:100%;overflow:hidden;color:red;height:500px">
            <div id="google-maps-display" style="height:100%; width:100%;max-width:100%;"><iframe
                    style="height:100%;width:100%;border:0;" frameborder="0"
                    src="https://www.google.com/maps/embed/v1/search?q=sagarmatha+niketan+school&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
            </div>
            <style>
                #google-maps-display img {
                    max-width: none !important;
                    background: none !important;
                    font-size: inherit;
                    font-weight: inherit;
                }
            </style>
        </div>
    </section>

@endsection
