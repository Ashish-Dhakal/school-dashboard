@extends('frontend.layout') <!-- Extends the layout -->

@section('title', 'Contact') <!-- Sets the page title -->

@section('content') <!-- Fills the content section -->
    <!-- Hero Section with Parallax Effect -->
 <!-- Hero Section -->
 <section id="hero" class="hero section  " style="height:70vh">
    <div>
        <img class="bg-image hover-zoom" src="http://localhost/templates/assets/img/hero-bg.jpg" alt=""
            data-aos="fade-in">
    </div>


    <div class="container text-center">
        <h2 data-aos="fade-up" data-aos-delay="100">Contact</h2>
        <p data-aos="fade-up" data-aos-delay="200">We are team of talented designers making websites with Bootstrap</p>

    </div>

</section>

    <!-- Contact Section With Card Design -->
    <section id="contact-form" class="py-5">
        <div class="container py-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <h2 class="fw-bold mb-3" data-aos="fade-up">Get in Touch With Us</h2>
                    <p class="text-muted" data-aos="fade-up" data-aos-delay="100">We're here to answer any questions you may
                        have about our services. Reach out to us and we'll respond as soon as we can.</p>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Contact Information Cards -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-4"
                                style="width: 60px; height: 60px;">
                                <i class="fas fa-map-marker-alt fa-lg"></i>
                            </div>
                            <h4 class="mb-3">Our Location</h4>
                            <p class="text-muted">123 Main Street, City, Country</p>
                            <a href="https://maps.google.com" class="btn btn-outline-primary btn-sm mt-2">Get Directions</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-4"
                                style="width: 60px; height: 60px;">
                                <i class="fas fa-phone fa-lg"></i>
                            </div>
                            <h4 class="mb-3">Phone Number</h4>
                            <p class="text-muted">(123) 456-7890</p>
                            <a href="tel:(123)456-7890" class="btn btn-outline-primary btn-sm mt-2">Call Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-4"
                                style="width: 60px; height: 60px;">
                                <i class="fas fa-envelope fa-lg"></i>
                            </div>
                            <h4 class="mb-3">Email Address</h4>
                            <p class="text-muted">contact@yourwebsite.com</p>
                            <a href="mailto:contact@yourwebsite.com" class="btn btn-outline-primary btn-sm mt-2">Email
                                Us</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="row mt-5">
                <div class="col-lg-8 mx-auto" data-aos="fade-up" data-aos-delay="400">
                    <div class="card border-0 shadow">
                        <div class="card-body p-5">
                            <h3 class="card-title mb-4 text-center">Send Us a Message</h3>
                            <form action="#" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Your Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Enter your name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Enter your email" required>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="subject" class="form-label">Subject</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                            <input type="text" class="form-control" id="subject"
                                                placeholder="Enter subject">
                                        </div>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="message" class="form-label">Message</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-comment"></i></span>
                                            <textarea class="form-control" id="message" rows="5" placeholder="Enter your message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg px-5 py-3">
                                            <i class="fas fa-paper-plane me-2"></i>Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Media Section -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h3 class="mb-4" data-aos="fade-up">Connect With Us</h3>
                    <ul class="list-inline mb-0" data-aos="fade-up" data-aos-delay="100">
                        <li class="list-inline-item mx-3">
                            <a href="#" class="text-decoration-none">
                                <div class="social-icon bg-primary text-white">
                                    <i class="fab fa-facebook-f fa-lg"></i>
                                </div>
                                <p class="small mt-2 mb-0">Facebook</p>
                            </a>
                        </li>
                        <li class="list-inline-item mx-3">
                            <a href="#" class="text-decoration-none">
                                <div class="social-icon bg-info text-white">
                                    <i class="fab fa-twitter fa-lg"></i>
                                </div>
                                <p class="small mt-2 mb-0">Twitter</p>
                            </a>
                        </li>
                        <li class="list-inline-item mx-3">
                            <a href="#" class="text-decoration-none">
                                <div class="social-icon bg-danger text-white">
                                    <i class="fab fa-instagram fa-lg"></i>
                                </div>
                                <p class="small mt-2 mb-0">Instagram</p>
                            </a>
                        </li>
                        <li class="list-inline-item mx-3">
                            <a href="#" class="text-decoration-none">
                                <div class="social-icon bg-primary text-white">
                                    <i class="fab fa-linkedin-in fa-lg"></i>
                                </div>
                                <p class="small mt-2 mb-0">LinkedIn</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Add custom CSS for social icons -->
    <style>
        .social-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            transform: translateY(-5px);
        }
    </style>
@endsection
