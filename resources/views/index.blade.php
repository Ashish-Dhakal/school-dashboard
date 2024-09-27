<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Padandas School of studies</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/tobiasroeder/imagebox@1.3.1/dist/imagebox.min.css">


    <link href="style.css" rel="stylesheet">


</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ route('front.index') }}" class="logo d-flex align-items-center me-auto">

                <!-- <img src="./assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Mentor</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.html" class="active">Home<br></a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="courses.html">Courses</a></li>
                    <li><a href="trainers.html">Trainers</a></li>
                    <li><a href="events.html">Events</a></li>
                    <li><a href="pricing.html">Pricing</a></li>
                    <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Dropdown 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Deep Dropdown 1</a></li>
                                    <li><a href="#">Deep Dropdown 2</a></li>
                                    <li><a href="#">Deep Dropdown 3</a></li>
                                    <li><a href="#">Deep Dropdown 4</a></li>
                                    <li><a href="#">Deep Dropdown 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Dropdown 2</a></li>
                            <li><a href="#">Dropdown 3</a></li>
                            <li><a href="#">Dropdown 4</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="courses.html">Get Started</a>

        </div>
    </header>


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

    </section><!-- /About Section -->

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

    <footer id="footer" class="footer position-relative">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">Mentor</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                        <p><strong>Email:</strong> <span>info@example.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Product Management</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                    <form action="forms/newsletter.php" method="post" class="php-email-form">
                        <div class="newsletter-form"><input type="email" name="email"><input type="submit"
                                value="Subscribe"></div>
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                    </form>
                </div>

            </div>
        </div>

        <div class=" copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Education Technology</strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits">

                Designed by <a href="https://xerosoft.com.np/">XeroSoft Technologies</a>
            </div>
        </div>

    </footer>


    <!-- Vendor JS Files -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/tobiasroeder/imagebox@1.3.1/dist/imagebox.min.js"></script>
    <script>
        imagebox.options({
            info: false,
            swipeToChange: true,
            swipeToClose: true,
            closeEverywhere: true,
            keyControls: true,
            htmlCaption: true,
        });
    </script>

    <!-- Main JS File -->
    <script src="main.js"></script>


</body>

</html>
