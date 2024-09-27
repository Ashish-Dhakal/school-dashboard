<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{ route('front.index') }}" class="logo d-flex align-items-center me-auto">

            <!-- <img src="./assets/img/logo.png" alt=""> -->
            <h1 class="sitename">Mentor</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{route('front.index')}}" class="active">Home<br></a></li>
                <li><a href="{{route('front.abouts')}}">About</a></li>
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
                        <li><a href="http://127.0.0.1:8000/about">main 2</a></li>
                        <li><a href="http://127.0.0.1:8000/about-uss/why-study-at-pc">content abt 3</a></li>
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
