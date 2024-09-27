@extends('frontend.layout') <!-- Extends the layout -->

@section('title', 'About Us') <!-- Sets the page title -->

@section('content') <!-- Fills the content section -->
    <!-- Hero Section -->
    <section id="hero" class="hero section  " style="height:70vh">
        <div>
            <img class="bg-image hover-zoom" src="http://localhost/templates/assets/img/hero-bg.jpg" alt=""
                data-aos="fade-in">
        </div>


        <div class="container text-center">
            <h2 data-aos="fade-up" data-aos-delay="100">About Us</h2>
            {{-- <p data-aos="fade-up" data-aos-delay="200">We are team of talented designers making websites with Bootstrap</p> --}}

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

    <section id="content" class="content container">
        <h1>Lorem ipsum dolor sit amet.</h1>
        <p>Bachelors of Software Engineering program is a 4-year (8 semesters) 133 credit undergraduate engineering program.
            Graduates of this program possess knowledge and skills of a defined engineering approach to complex systems
            analysis, planning, design and construction. The program has a unique, project-driven curriculum, establishing a
            new model of communication, teamwork, critical thinking and professionalism.</p>
        <p>Students will learn to apply engineering principles to software development, and will work on projects that
            involve the design and development of software systems. The program is designed to provide students with a solid
            foundation in software engineering, and to prepare them for careers in software engineering, software
            development, and related fields.</p>
        <p>Students will learn to apply engineering principles to software development, and will work on projects that
            involve the design and development of software systems. The program is designed to provide students with a solid
            foundation in software engineering, and to prepare them for careers in software engineering, software
            development, and related fields.</p>
        <h2>Software Engineering graduates are expected to have:</h2>
        <ul>
            <li>an ability to apply knowledge of mathematics, science, and engineering</li>
            <li>an ability to design and conduct experiments, as well as to analyze and interpret data</li>
            <li>an ability to design a system, component, or process to meet desired needs within realistic constraints such
                as economic, environmental, social, political, ethical, health and safety, manufacturability, and
                sustainability</li>
            <li>an ability to function on multidisciplinary teams</li>
            <li>an ability to identify, formulate, and solve engineering problems</li>
            <li>an understanding of professional and ethical responsibility</li>
            <li>an ability to communicate effectively</li>
            <li>the broad education necessary to understand the impact of engineering solutions in a global, economic,
                environmental, and societal context</li>
            <li>a recognition of the need for, and an ability to engage in life-long learning</li>
            <li>a knowledge of contemporary issues</li>
            <li>an ability to use the techniques, skills, and modern engineering tools necessary for engineering practice
            </li>
        </ul>
        <h2>Program Objectives</h2>
        <p>The Bachelor of Software Engineering program is designed to produce graduates who:</p>
        <ul>
            <li>are able to apply knowledge of mathematics, science, and engineering to solve complex engineering problems
            </li>
            <li>are able to design and conduct experiments, as well as to analyze and interpret data</li>
            <li>are able to design a system, component, or process to meet desired needs within realistic constraints such
                as economic, environmental, social, political, ethical, health and safety, manufacturability, and
                sustainability</li>
            <li>are able to function on multidisciplinary teams</li>
            <li>are able to identify, formulate, and solve engineering problems</li>
            <li>understand professional and ethical responsibility</li>
            <li>are able to communicate effectively</li>
            <li>have the broad education necessary to understand the impact of engineering solutions in a global, economic,
                environmental, and societal context</li>
            <li>recognize the need for, and have the ability to engage in life-long learning</li>
            <li>have knowledge of contemporary issues</li>
            <li>have the ability to use the techniques, skills, and modern engineering tools necessary for engineering
                practice</li>
        </ul>
        <h3>Job Opportunities</h3>
        <p>Graduates of the Bachelor of Software Engineering program are prepared for careers in software engineering,
            software development, and related fields. Graduates may work as software engineers, software developers, systems
            analysts, software architects, project managers, and more. Graduates may work in a variety of industries,
            including software development, information technology, telecommunications, finance, healthcare, and more.</p>
        <ul>
            <li>Software Engineer</li>
            <li>Software Developer</li>
            <li>Systems Analyst</li>
            <li>Software Architect</li>
            <li>Project Manager</li>
            <li>and more</li>

        </ul>
        <!-- apply now button -->
        <a href="apply.html" class="btn btn-primary">Apply Now</a>






    </section>

@endsection
