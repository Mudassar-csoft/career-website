<header class="main-header">
    <div class="top-bar">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="top-contact d-flex align-items-center">
                    <a href="tel:03414444101">
                        <i class="fas fa-phone-alt"></i>
                        0341-4444101
                    </a>
                    <a href="mailto:info@career.edu.pk">
                        <i class="fas fa-envelope"></i>
                        info@career.edu.pk
                    </a>
                </div>
                <ul class="top-links d-none d-lg-flex">
                    <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#admission-modal">
                            Online Admission
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('how-to-pay') }}">
                            How to Apply
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('verifications') }}">
                            Verification
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('job-placement') }}">
                            Job Placement
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('ambassador-program') }}">
                            Ambassador Program
                        </a>
                    </li>
                    <li>
                        <a href="#footer">
                            Success Stories
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light menu-bar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="Career Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                            About
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('courses-certifications') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            Trainings
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('courses-certifications') }}">
                                    Course and Certification
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    Intermediate (HSSC)
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    Associate Degree Program (ADP)
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('pearson-vue', 'psi-exam', 'kryterion') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            Testing Services
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('pearson-vue') }}">
                                    Pearson VUE Testing Center
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('psi-exam') }}">
                                    PSI Exam Center
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('kryterion') }}">
                                    Kryterion Testing Center
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('coworking-space') ? 'active' : '' }}" href="{{ route('coworking-space') }}">
                            Coworking Space
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('study-abroad') ? 'active' : '' }}" href="{{ route('study-abroad') }}">
                            Study Abroad
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact-us') ? 'active' : '' }}" href="{{ route('contact-us') }}">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>