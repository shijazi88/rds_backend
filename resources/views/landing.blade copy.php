@extends('layouts.master-without-nav')
@section('title')
    Landing
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('body')

    <body data-bs-spy="scroll" data-bs-target="#navbar-example">
    @endsection
    @section('content')
        <!-- Begin page -->
        <div class="layout-wrapper landing">
            <nav class="navbar navbar-expand-lg navbar-landing fixed-top" id="navbar">
                <div class="container">
                    <a class="navbar-brand" href="index">
                        <img src="{{ URL::asset('build/images/logo-light.png') }}" class="card-logo card-logo-dark"
                            alt="logo dark" height="120">
                        <img src="{{ URL::asset('build/images/logo-light.png') }}" class="card-logo card-logo-light"
                            alt="logo light" height="17">
                    </a>
                    <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                            <li class="nav-item">
                                <a class="nav-link active" href="#hero">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#services">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#features">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#plans">Find Us</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#reviews">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#team">Team</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Contact</a>
                            </li> --}}
                        </ul>

                        {{-- <div class="">
                            <a href="auth-signin-basic" class="btn btn-link fw-medium text-decoration-none text-dark">Sign
                                in</a>
                            <a href="auth-signup-basic" class="btn btn-primary">Sign Up</a>
                        </div> --}}
                    </div>

                </div>
            </nav>
            <!-- end navbar -->
            <div class="vertical-overlay" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent.show"></div>

            <!-- start hero section -->
            <section class="section" id="services">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h1 class="display-6 fw-semibold mb-3 lh-base">Keep Your Shipments Safe with
                                    <span class="text-secondary">RDS </span>Box
                                </h1>

                            </div>
                        </div>
                    </div>

                    <!-- end row -->

                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-pencil-ruler-2-line fs-36"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    {{-- <h5 class="fs-18">Product's Durability</h5> --}}
                                    <p class="text-muted my-3 ff-secondary">your intelligent solution to the challenges of
                                        package delivery. Say goodbye to the inconvenience of coordinating delivery times
                                        and locations. With RDS BOX, your packages are securely received without any
                                        disruptions to your day.</p>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-palette-line fs-36"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    {{-- <h5 class="fs-18">Security Aspects</h5> --}}
                                    <p class="text-muted my-3 ff-secondary">RDS BOX operates on cutting-edge technology
                                        seamlessly integrated with delivery services, providing a hassle-free experience for
                                        both recipients and delivery personnel. Installed at your doorstep, RDS BOX boasts
                                        sleek, modern designs, enhancing the aesthetic of any home.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-lightbulb-flash-line fs-36"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    {{-- <h5 class="fs-18">Ease of Installation</h5> --}}
                                    <p class="text-muted my-3 ff-secondary">Efficiency is at the core of RDS BOX. By
                                        addressing the notorious "last mile" of delivery, which accounts for 40% of supply
                                        chain costs, RDS BOX significantly optimizes logistics operations. Our seamless
                                        technology ensures swift and secure deliveries, reducing overheads and improving
                                        customer satisfaction.</p>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>



            <!-- start services -->
            <section class="section" id="services">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h1 class="mb-3 ff-secondary fw-semibold lh-base">System Services:
                                </h1>
                                {{-- <p class="text-muted">Your smart receipt box and the perfect solution to all your delivery
                                    problems.</p> --}}
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-pencil-ruler-2-line fs-36"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    {{-- <h5 class="fs-18">Product's Durability</h5> --}}
                                    <p class="text-muted my-3 ff-secondary">Home Box</p>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-palette-line fs-36"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    {{-- <h5 class="fs-18">Security Aspects</h5> --}}
                                    <p class="text-muted my-3 ff-secondary">24/7 Availability: Receipts accessible round
                                        the clock..</p>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-lightbulb-flash-line fs-36"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    {{-- <h5 class="fs-18">Ease of Installation</h5> --}}
                                    <p class="text-muted my-3 ff-secondary">Continuous Internet Connectivity</p>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->


                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-briefcase-5-line fs-36"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    {{-- <h5 class="fs-18">Top Industry Specialists</h5> --}}
                                    <p class="text-muted my-3 ff-secondary">Remote Control Capabilities</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-briefcase-5-line fs-36"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    {{-- <h5 class="fs-18">Top Industry Specialists</h5> --}}
                                    <p class="text-muted my-3 ff-secondary">Shipment Confirmation System: Ensures reliable
                                        acknowledgment of deliveries.</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-briefcase-5-line fs-36"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    {{-- <h5 class="fs-18">Top Industry Specialists</h5> --}}
                                    <p class="text-muted my-3 ff-secondary">Notification system for opening and closing the
                                        box</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-briefcase-5-line fs-36"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    {{-- <h5 class="fs-18">Top Industry Specialists</h5> --}}
                                    <p class="text-muted my-3 ff-secondary">Automated Shipment Reception: Enables seamless
                                        receipt of shipments without customer intervention.</p>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>
            <!-- end services -->


            <!-- start cta -->
            {{-- <section class="py-5 bg-primary position-relative">
                <div class="bg-overlay bg-overlay-pattern opacity-50"></div>
                <div class="container">
                    <div class="row align-items-center gy-4">
                        <div class="col-sm">
                            <div>
                                <h4 class="text-white mb-0 fw-semibold">Build your web App/SaaS with RDS dashboard</h4>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-auto">
                            <div>
                                <a href="https://1.envato.market/RDS-admin" target="_blank"
                                    class="btn bg-gradient btn-secondary"><i
                                        class="ri-shopping-cart-2-line align-middle me-1"></i> Buy Now</a>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section> --}}
            <!-- end cta -->

            <!-- start features -->
            <section class="section">
                <div class="container">
                    <div class="row align-items-center gy-4">
                        <div class="col-lg-6 order-2 order-lg-1">
                            <div class="text-muted">
                                <h5 class="fs-12 text-uppercase text-secondary">Design</h5>
                                <h4 class="mb-3">Well Designed Box</h4>
                                <p class="mb-4 ff-secondary">Quality Box is a condition-specific, actionable
                                    web-based application for quality reporting and population management that is integrated
                                    into the Electronic Health Record (EHR).</p>

                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="vstack gap-2">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <div class="avatar-xs icon-effect">
                                                        <div
                                                            class="avatar-title bg-transparent text-success rounded-circle h2">
                                                            <i class="ri-check-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-14 mb-0">Ecommerce</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <div class="avatar-xs icon-effect">
                                                        <div
                                                            class="avatar-title bg-transparent text-success rounded-circle h2">
                                                            <i class="ri-check-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-14 mb-0">Analytics</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <div class="avatar-xs icon-effect">
                                                        <div
                                                            class="avatar-title bg-transparent text-success rounded-circle h2">
                                                            <i class="ri-check-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-14 mb-0">CRM</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="vstack gap-2">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <div class="avatar-xs icon-effect">
                                                        <div
                                                            class="avatar-title bg-transparent text-success rounded-circle h2">
                                                            <i class="ri-check-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-14 mb-0">Crypto</h5>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <div class="avatar-xs icon-effect">
                                                        <div
                                                            class="avatar-title bg-transparent text-success rounded-circle h2">
                                                            <i class="ri-check-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-14 mb-0">Projects</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <a href="index" class="btn btn-primary">Learn More <i
                                            class="ri-arrow-right-line align-middle ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-6 col-sm-7 col-10 ms-auto order-1 order-lg-2">
                            <div>
                                <img src="{{ URL::asset('build/images/landing/features/img-1.png') }}" alt=""
                                    style="width: 200px; height: auto;" style="width: 100px; height: auto;"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row align-items-center mt-5 pt-lg-5 gy-4">
                        <div class="col-lg-6 col-sm-7 col-10 mx-auto">
                            <div>
                                <img src="{{ URL::asset('build/images/landing/features/img-3.png') }}" alt=""
                                    class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="text-muted ps-lg-5">
                                <h5 class="fs-12 text-uppercase text-secondary">structure</h5>
                                <h4 class="mb-3">Well Documented</h4>
                                <p class="mb-4">used to describe something that is known about or known to be true
                                    because there are many documents that describe it, prove it, etc.</p>

                                <div class="vstack gap-2">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-2">
                                            <div class="avatar-xs icon-effect">
                                                <div class="avatar-title bg-transparent text-success rounded-circle h2">
                                                    <i class="ri-check-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">Dynamic Conetnt</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-2">
                                            <div class="avatar-xs icon-effect">
                                                <div class="avatar-title bg-transparent text-success rounded-circle h2">
                                                    <i class="ri-check-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">Setup plugin's information.</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-2">
                                            <div class="avatar-xs icon-effect">
                                                <div class="avatar-title bg-transparent text-success rounded-circle h2">
                                                    <i class="ri-check-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">Themes customization information</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>
            <!-- end features -->

            <!-- start plan -->
            <section class="section bg-light" id="plans">
                <div class="bg-overlay bg-overlay-pattern"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h3 class="mb-3 fw-semibold">Choose the plan that's right for you</h3>
                                <p class="text-muted mb-4">Simple pricing. No hidden fees. Advanced features for you
                                    business.</p>

                                <div class="d-flex justify-content-center align-items-center">
                                    <div>
                                        <h5 class="fs-14 mb-0">Month</h5>
                                    </div>
                                    <div class="form-check form-switch fs-20 ms-3 " onclick="check()">
                                        <input class="form-check-input" type="checkbox" id="plan-switch">
                                        <label class="form-check-label" for="plan-switch"></label>
                                    </div>
                                    <div>
                                        <h5 class="fs-14 mb-0">Annual <span class="badge badge-soft-success">Save
                                                20%</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row gy-4">
                        <div class="col-lg-4">
                            <div class="card plan-box mb-0">
                                <div class="card-body p-4 m-2">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="mb-1 fw-semibold">Basic Plan</h5>
                                            <p class="text-muted mb-0">For Startup</p>
                                        </div>
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-secondary">
                                                <i class="ri-book-mark-line fs-20"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-4 text-center">
                                        <h1 class="month"><sup><small>$</small></sup><span
                                                class="ff-secondary fw-bold">19</span> <span
                                                class="fs-13 text-muted">/Month</span></h1>
                                        <h1 class="annual"><sup><small>$</small></sup><span
                                                class="ff-secondary fw-bold">171</span> <span
                                                class="fs-13 text-muted">/Year</span></h1>
                                    </div>

                                    <div>
                                        <ul class="list-unstyled text-muted vstack gap-3 ff-secondary">
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Upto <b>3</b> Projects
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Upto <b>299</b> Customers
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Scalable Bandwidth
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>5</b> FTP Login
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-danger me-1">
                                                        <i class="ri-close-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>24/7</b> Support
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-danger me-1">
                                                        <i class="ri-close-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>Unlimited</b> Storage
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-danger me-1">
                                                        <i class="ri-close-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Domain
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="mt-4">
                                            <a href="javascript:void(0);" class="btn btn-soft-primary w-100">Get
                                                Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-4">
                            <div class="card plan-box mb-0 ribbon-box right">
                                <div class="card-body p-4 m-2">
                                    <div class="ribbon-two ribbon-two-danger"><span>Popular</span></div>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="mb-1 fw-semibold">Pro Business</h5>
                                            <p class="text-muted mb-0">Professional plans</p>
                                        </div>
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-secondary">
                                                <i class="ri-medal-fill fs-20"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-4 text-center">
                                        <h1 class="month"><sup><small>$</small></sup><span
                                                class="ff-secondary fw-bold">29</span> <span
                                                class="fs-13 text-muted">/Month</span></h1>
                                        <h1 class="annual"><sup><small>$</small></sup><span
                                                class="ff-secondary fw-bold">261</span> <span
                                                class="fs-13 text-muted">/Year</span></h1>
                                    </div>

                                    <div>
                                        <ul class="list-unstyled text-muted vstack gap-3 ff-secondary">
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Upto <b>15</b> Projects
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>Unlimited</b> Customers
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Scalable Bandwidth
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>12</b> FTP Login
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>24/7</b> Support
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-danger me-1">
                                                        <i class="ri-close-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>Unlimited</b> Storage
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-danger me-1">
                                                        <i class="ri-close-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Domain
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="mt-4">
                                            <a href="javascript:void(0);" class="btn btn-soft-primary w-100">Get
                                                Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-4">
                            <div class="card plan-box mb-0">
                                <div class="card-body p-4 m-2">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="mb-1 fw-semibold">Platinum Plan</h5>
                                            <p class="text-muted mb-0">Enterprise Businesses</p>
                                        </div>
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-secondary">
                                                <i class="ri-stack-fill fs-20"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-4 text-center">
                                        <h1 class="month"><sup><small>$</small></sup><span
                                                class="ff-secondary fw-bold">39</span> <span
                                                class="fs-13 text-muted">/Month</span></h1>
                                        <h1 class="annual"><sup><small>$</small></sup><span
                                                class="ff-secondary fw-bold">351</span> <span
                                                class="fs-13 text-muted">/Year</span></h1>
                                    </div>

                                    <div>
                                        <ul class="list-unstyled text-muted vstack gap-3 ff-secondary">
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>Unlimited</b> Projects
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>Unlimited</b> Customers
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Scalable Bandwidth
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>Unlimited</b> FTP Login
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>24/7</b> Support
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <b>Unlimited</b> Storage
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 text-success me-1">
                                                        <i class="ri-checkbox-circle-fill fs-15 align-middle"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        Domain
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="mt-4">
                                            <a href="javascript:void(0);" class="btn btn-soft-primary w-100">Get
                                                Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!-- end container -->
            </section>
            <!-- end plan -->

            <!-- start faqs -->
            <section class="section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h3 class="mb-3 fw-semibold">Frequently Asked Questions</h3>
                                <p class="text-muted mb-4 ff-secondary">If you can not find answer to your question in our
                                    FAQ, you can always contact us or email us. We will answer you shortly!</p>

                                {{-- <div class="hstack gap-2 justify-content-center">
                                    <button type="button" class="btn btn-primary btn-label rounded-pill"><i
                                            class="ri-mail-line label-icon align-middle rounded-pill fs-16 me-2"></i> Email
                                        Us</button>
                                    <button type="button" class="btn btn-secondary btn-label rounded-pill"><i
                                            class="ri-twitter-line label-icon align-middle rounded-pill fs-16 me-2"></i>
                                        Send Us Tweet</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row g-lg-5 g-4">
                        <div class="col-lg-6">
                            {{-- <div class="d-flex align-items-center mb-2">
                                <div class="flex-shrink-0 me-1">
                                    <i class="ri-question-line fs-24 align-middle text-success me-1"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="mb-0 fw-semibold">General Questions</h5>
                                </div>
                            </div> --}}
                            <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box"
                                id="genques-accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="genques-headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#genques-collapseOne" aria-expanded="true"
                                            aria-controls="genques-collapseOne">
                                            How do I place an order on the website? </button>
                                    </h2>
                                    <div id="genques-collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="genques-headingOne" data-bs-parent="#genques-accordion">
                                        <div class="accordion-body ff-secondary">
                                            Simply click on the order icon, which will direct you to the store page where
                                            you can easily place an order for the box. For sales and delivery locations,
                                            organization can be completed through their respective icons, following
                                            straightforward steps.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="genques-headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#genques-collapseTwo"
                                            aria-expanded="false" aria-controls="genques-collapseTwo">
                                            What payment methods are accepted?
                                        </button>
                                    </h2>
                                    <div id="genques-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="genques-headingTwo" data-bs-parent="#genques-accordion">
                                        <div class="accordion-body ff-secondary">
                                            We offer a variety of payment methods for your convenience.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="genques-headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#genques-collapseThree"
                                            aria-expanded="false" aria-controls="genques-collapseThree">
                                            How do I renew my subscription to the box’s services?
                                        </button>
                                    </h2>
                                    <div id="genques-collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="genques-headingThree" data-bs-parent="#genques-accordion">
                                        <div class="accordion-body ff-secondary">
                                            Renewing your subscription is a breeze through the system’s application, with
                                            simple and straightforward steps.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="genques-headingFour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#genques-collapseFour"
                                            aria-expanded="false" aria-controls="genques-collapseFour">
                                            How is the box transported to me?
                                        </button>
                                    </h2>
                                    <div id="genques-collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="genques-headingFour" data-bs-parent="#genques-accordion">
                                        <div class="accordion-body ff-secondary">
                                            Our dedicated team handles the delivery and installation of the box for your
                                            convenience.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end accordion-->

                        </div>
                        <!-- end col -->
                        <div class="col-lg-6">
                            {{-- <div class="d-flex align-items-center mb-2">
                                <div class="flex-shrink-0 me-1">
                                    <i class="ri-shield-keyhole-line fs-24 align-middle text-success me-1"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="mb-0 fw-semibold">Privacy &amp; Security</h5>
                                </div>
                            </div> --}}

                            <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box"
                                id="privacy-accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="privacy-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#privacy-collapseOne"
                                            aria-expanded="false" aria-controls="privacy-collapseOne">
                                            What is the process for exchanges and returns?
                                        </button>
                                    </h2>
                                    <div id="privacy-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="privacy-headingOne" data-bs-parent="#privacy-accordion">
                                        <div class="accordion-body ff-secondary">
                                            We offer an exchange and return service within a specified period after
                                            receiving the box. Simply contact our customer service numbers for assistance.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="privacy-headingTwo">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#privacy-collapseTwo" aria-expanded="true"
                                            aria-controls="privacy-collapseTwo">
                                            How do I maintain the box?
                                        </button>
                                    </h2>
                                    <div id="privacy-collapseTwo" class="accordion-collapse collapse show"
                                        aria-labelledby="privacy-headingTwo" data-bs-parent="#privacy-accordion">
                                        <div class="accordion-body ff-secondary">
                                            Rest assured, our RDS team is always available for follow-up and maintenance.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="privacy-headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#privacy-collapseThree"
                                            aria-expanded="false" aria-controls="privacy-collapseThree">
                                            How is customer information kept confidential?
                                        </button>
                                    </h2>
                                    <div id="privacy-collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="privacy-headingThree" data-bs-parent="#privacy-accordion">
                                        <div class="accordion-body ff-secondary">
                                            Your privacy is our priority. Our program is fortified by a high-security system
                                            managed by specialists to ensure the confidentiality of your information.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="privacy-headingFour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#privacy-collapseFour"
                                            aria-expanded="false" aria-controls="privacy-collapseFour">
                                            How soon can I expect the box to be delivered?
                                        </button>
                                    </h2>
                                    <div id="privacy-collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="privacy-headingFour" data-bs-parent="#privacy-accordion">
                                        <div class="accordion-body ff-secondary">
                                            Upon your initial request, the box will be promptly delivered to your doorstep.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="privacy-headingFour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#privacy-collapseFour"
                                            aria-expanded="false" aria-controls="privacy-collapseFour">
                                            Is there a warranty on the box?
                                        </button>
                                    </h2>
                                    <div id="privacy-collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="privacy-headingFour" data-bs-parent="#privacy-accordion">
                                        <div class="accordion-body ff-secondary">
                                            We take pride in our after-sales services and stand behind the quality of the
                                            RDS BOX.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end accordion-->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>
            <!-- end faqs -->

            <!-- start review -->
            {{-- <section class="section bg-primary" id="reviews">
                <div class="bg-overlay bg-overlay-pattern"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="text-center">
                                <div>
                                    <i class="ri-double-quotes-l text-secondary display-3"></i>
                                </div>
                                <h4 class="text-white mb-5"><span class="text-secondary">19k</span>+ Satisfied clients
                                </h4>

                                <!-- Swiper -->
                                <div class="swiper client-review-swiper rounded" dir="ltr">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="row justify-content-center">
                                                <div class="col-10">
                                                    <div class="text-white-50">
                                                        <p class="fs-20 ff-secondary mb-4">" I am givng 5 stars. Theme is
                                                            great and everyone one stuff everything in theme. Future request
                                                            should not affect current state of theme. "</p>

                                                        <div>
                                                            <h5 class="text-white">gregoriusus</h5>
                                                            <p>- Skote User</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end slide -->
                                        <div class="swiper-slide">
                                            <div class="row justify-content-center">
                                                <div class="col-10">
                                                    <div class="text-white-50">
                                                        <p class="fs-20 ff-secondary mb-4">" Awesome support. Had few
                                                            issues while setting up because of my device, the support team
                                                            helped me fix them up in a day. Everything looks clean and good.
                                                            Highly recommended! "</p>

                                                        <div>
                                                            <h5 class="text-white">GeekyGreenOwl</h5>
                                                            <p>- Skote User</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end slide -->
                                        <div class="swiper-slide">
                                            <div class="row justify-content-center">
                                                <div class="col-10">
                                                    <div class="text-white-50">
                                                        <p class="fs-20 ff-secondary mb-4">" Amazing template, Redux store
                                                            and components is nicely designed. It's a great start point for
                                                            an admin based project. Clean Code and good documentation.
                                                            Template is completely in React and absolutely no usage of
                                                            jQuery "</p>

                                                        <div>
                                                            <h5 class="text-white">sreeks456</h5>
                                                            <p>- Veltrix User</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end slide -->
                                    </div>
                                    <div class="swiper-button-next bg-white rounded-circle"></div>
                                    <div class="swiper-button-prev bg-white rounded-circle"></div>
                                    <div class="swiper-pagination position-relative mt-2"></div>
                                </div>
                                <!-- end slider -->
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section> --}}
            <!-- end review -->

            <!-- start counter -->
            <section class="py-5 position-relative bg-light">
                <div class="container">
                    <div class="row text-center gy-4">
                        <div class="col-lg-3 col-6">
                            <div>
                                <h2 class="mb-2"><span class="counter-value" data-target="100">0</span>+</h2>
                                <div class="text-muted">Projects Completed</div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-3 col-6">
                            <div>
                                <h2 class="mb-2"><span class="counter-value" data-target="24">0</span></h2>
                                <div class="text-muted">Win Awards</div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-3 col-6">
                            <div>
                                <h2 class="mb-2"><span class="counter-value" data-target="20.3">0</span>k</h2>
                                <div class="text-muted">Satisfied Clients</div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-6">
                            <div>
                                <h2 class="mb-2"><span class="counter-value" data-target="50">0</span></h2>
                                <div class="text-muted">Employees</div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>
            <!-- end counter -->

            <!-- start Work Process -->
            <section class="section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h3 class="mb-3 fw-semibold">Our Work Process</h3>
                                <p class="text-muted mb-4 ff-secondary">Discover the simplicity and efficiency of our
                                    ordering system. In just three straightforward steps, embark on a seamless journey from
                                    selection to delivery with RDS Box.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row text-center">
                        <div class="col-lg-4">
                            <div class="process-card mt-4">
                                <div class="process-arrow-img d-none d-lg-block">
                                    <img src="{{ URL::asset('build/images/landing/process-arrow-img.png') }}"
                                        alt="" class="img-fluid">
                                </div>
                                <div class="avatar-sm icon-effect mx-auto mb-4">
                                    <div class="avatar-title bg-transparent text-success rounded-circle h1">
                                        <i class="ri-quill-pen-line"></i>
                                    </div>
                                </div>

                                <h5>Select Box & Buy</h5>
                                <p class="text-muted ff-secondary">In this step, customers are presented with various
                                    options to select their desired RDS Box. The selection process is made user-friendly,
                                    allowing customers to choose based on their specific needs. After selection, customers
                                    proceed to purchase the box using an easy and secure transaction process.</p>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-4">
                            <div class="process-card mt-4">
                                <div class="process-arrow-img d-none d-lg-block">
                                    <img src="{{ URL::asset('build/images/landing/process-arrow-img.png') }}"
                                        alt="" class="img-fluid">
                                </div>
                                <div class="avatar-sm icon-effect mx-auto mb-4">
                                    <div class="avatar-title bg-transparent text-success rounded-circle h1">
                                        <i class="ri-user-follow-line"></i>
                                    </div>
                                </div>

                                <h5>Complete the Process:</h5>
                                <p class="text-muted ff-secondary">Once the purchase is made, customers are guided through
                                    any necessary steps to complete the process. This might include filling out delivery
                                    details, choosing delivery options, or confirming order details to ensure accuracy and
                                    customer satisfaction..</p>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-4">
                            <div class="process-card mt-4">
                                <div class="avatar-sm icon-effect mx-auto mb-4">
                                    <div class="avatar-title bg-transparent text-success rounded-circle h1">
                                        <i class="ri-book-mark-line"></i>
                                    </div>
                                </div>

                                <h5>Delivery</h5>
                                <p class="text-muted ff-secondary">The final step involves the efficient delivery of the
                                    RDS Box to the customer. Emphasis is placed on timely and secure delivery, ensuring that
                                    the product reaches the customer in perfect condition and within the promised timeframe.
                                </p>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>
            <!-- end Work Process -->

            <!-- start team -->
            {{-- <section class="section bg-light" id="team">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h3 class="mb-3 fw-semibold">Our <span class="text-danger">Team</span></h3>
                                <p class="text-muted mb-4 ff-secondary">To achieve this, it would be necessary to have
                                    uniform grammar, pronunciation and more common words. If several languages coalesce the
                                    grammar.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-xl mx-auto mb-4 position-relative">
                                        <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}" alt=""
                                            class="img-fluid rounded-circle">
                                        <a href="apps-mailbox"
                                            class="btn btn-secondary btn-sm position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                            <div class="avatar-title bg-transparent">
                                                <i class="ri-mail-fill align-bottom"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- end card body -->
                                    <h5 class="mb-1"><a href="pages-profile" class="text-body">Nancy Martino</a>
                                    </h5>
                                    <p class="text-muted mb-0 ff-secondary">Team Leader</p>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-xl mx-auto mb-4 position-relative">
                                        <img src="{{ URL::asset('build/images/users/avatar-10.jpg') }}" alt=""
                                            class="img-fluid rounded-circle">
                                        <a href="apps-mailbox"
                                            class="btn btn-secondary btn-sm position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                            <div class="avatar-title bg-transparent">
                                                <i class="ri-mail-fill align-bottom"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- end card body -->
                                    <h5 class="mb-1"><a href="pages-profile" class="text-body">Henry Baird</a>
                                    </h5>
                                    <p class="text-muted mb-0 ff-secondary">Full Stack Developer</p>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-xl mx-auto mb-4 position-relative">
                                        <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}" alt=""
                                            class="img-fluid rounded-circle">
                                        <a href="apps-mailbox"
                                            class="btn btn-secondary btn-sm position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                            <div class="avatar-title bg-transparent">
                                                <i class="ri-mail-fill align-bottom"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- end card body -->
                                    <h5 class="mb-1"><a href="pages-profile" class="text-body">Frank Hook</a></h5>
                                    <p class="text-muted mb-0 ff-secondary">Project Manager</p>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-xl mx-auto mb-4 position-relative">
                                        <img src="{{ URL::asset('build/images/users/avatar-8.jpg') }}" alt=""
                                            class="img-fluid rounded-circle">
                                        <a href="apps-mailbox"
                                            class="btn btn-secondary btn-sm position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                            <div class="avatar-title bg-transparent">
                                                <i class="ri-mail-fill align-bottom"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- end card body -->
                                    <h5 class="mb-1"><a href="pages-profile" class="text-body">Donald Palmer</a>
                                    </h5>
                                    <p class="text-muted mb-0 ff-secondary">UI/UX Designer</p>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-xl mx-auto mb-4 position-relative">
                                        <img src="{{ URL::asset('build/images/users/avatar-5.jpg') }}" alt=""
                                            class="img-fluid rounded-circle">
                                        <a href="apps-mailbox"
                                            class="btn btn-secondary btn-sm position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                            <div class="avatar-title bg-transparent">
                                                <i class="ri-mail-fill align-bottom"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- end card body -->
                                    <h5 class="mb-1"><a href="pages-profile" class="text-body">Erica Kernan</a>
                                    </h5>
                                    <p class="text-muted mb-0 ff-secondary">Web Designer</p>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-xl mx-auto mb-4 position-relative">
                                        <img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}" alt=""
                                            class="img-fluid rounded-circle">
                                        <a href="apps-mailbox"
                                            class="btn btn-secondary btn-sm position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                            <div class="avatar-title bg-transparent">
                                                <i class="ri-mail-fill align-bottom"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- end card body -->
                                    <h5 class="mb-1"><a href="pages-profile" class="text-body">Alexis Clarke</a>
                                    </h5>
                                    <p class="text-muted mb-0 ff-secondary">Backend Developer</p>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-xl mx-auto mb-4 position-relative">
                                        <img src="{{ URL::asset('build/images/users/avatar-6.jpg') }}" alt=""
                                            class="img-fluid rounded-circle">
                                        <a href="apps-mailbox"
                                            class="btn btn-secondary btn-sm position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                            <div class="avatar-title bg-transparent">
                                                <i class="ri-mail-fill align-bottom"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- end card body -->
                                    <h5 class="mb-1"><a href="pages-profile" class="text-body">Marie Ward</a></h5>
                                    <p class="text-muted mb-0 ff-secondary">Full Stack Developer</p>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->

                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body text-center p-4">
                                    <div class="avatar-xl mx-auto mb-4 position-relative">
                                        <img src="{{ URL::asset('build/images/users/avatar-7.jpg') }}" alt=""
                                            class="img-fluid rounded-circle">
                                        <a href="apps-mailbox"
                                            class="btn btn-secondary btn-sm position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                            <div class="avatar-title bg-transparent">
                                                <i class="ri-mail-fill align-bottom"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- end card body -->
                                    <h5 class="mb-1"><a href="pages-profile" class="text-body">Jack Gough</a></h5>
                                    <p class="text-muted mb-0 ff-secondary">React Js Developer</p>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section> --}}
            <!-- end team -->

            <!-- start contact -->
            <section class="section" id="contact">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h3 class="mb-3 fw-semibold">Get In Touch</h3>
                                <p class="text-muted mb-4 ff-secondary">We thrive when coming up with innovative ideas but
                                    also understand that a smart concept should be supported with faucibus sapien odio
                                    measurable results.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row gy-4">
                        <div class="col-lg-4">
                            <div>
                                <div class="mt-4">
                                    <h5 class="fs-13 text-muted text-uppercase">Office Address 1:</h5>
                                    <div class="ff-secondary fw-semibold">4461 Cedar Street Moro, <br />AR 72368</div>
                                </div>
                                <div class="mt-4">
                                    <h5 class="fs-13 text-muted text-uppercase">Office Address 2:</h5>
                                    <div class="ff-secondary fw-semibold">2467 Swick Hill Street <br />New Orleans, LA
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h5 class="fs-13 text-muted text-uppercase">Working Hours:</h5>
                                    <div class="ff-secondary fw-semibold">9:00am to 6:00pm</div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-8">
                            <div>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <label for="name" class="form-label fs-13">Name</label>
                                                <input name="name" id="name" type="text"
                                                    class="form-control bg-light border-light" placeholder="Your name*">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <label for="email" class="form-label fs-13">Email</label>
                                                <input name="email" id="email" type="email"
                                                    class="form-control bg-light border-light" placeholder="Your email*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-4">
                                                <label for="subject" class="form-label fs-13">Subject</label>
                                                <input type="text" class="form-control bg-light border-light"
                                                    id="subject" name="subject" placeholder="Your Subject.." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="comments" class="form-label fs-13">Message</label>
                                                <textarea name="comments" id="comments" rows="3" class="form-control bg-light border-light"
                                                    placeholder="Your message..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 text-end">
                                            <input type="submit" id="submit" name="send"
                                                class="submitBnt btn btn-primary" value="Send Message">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>
            <!-- end contact -->

            <!-- start cta -->
            {{-- <section class="py-5 bg-primary position-relative">
                <div class="bg-overlay bg-overlay-pattern opacity-50"></div>
                <div class="container">
                    <div class="row align-items-center gy-4">
                        <div class="col-sm">
                            <div>
                                <h4 class="text-white mb-0 fw-semibold">Build your web App/SaaS with RDS dashboard</h4>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-auto">
                            <div>
                                <a href="https://1.envato.market/RDS-admin" target="_blank"
                                    class="btn bg-gradient btn-danger"><i
                                        class="ri-shopping-cart-2-line align-middle me-1"></i> Buy Now</a>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section> --}}
            <!-- end cta -->

            <!-- Start footer -->
            <footer class="custom-footer bg-dark py-5 position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 mt-4">
                            <div>
                                <div>
                                    <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="logo light"
                                        height="150">
                                </div>
                                <div class="mt-4 fs-13">
                                    <p>Premium Multipurpose Admin & Dashboard Template</p>
                                    <p class="ff-secondary">You can build any type of web application like eCommerce, CRM,
                                        CMS, Project management apps, Admin Panels, etc using RDS.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 ms-lg-auto">
                            <div class="row">
                                <div class="col-sm-4 mt-4">
                                    <h5 class="text-white mb-0">Company</h5>
                                    <div class="text-muted mt-3">
                                        <ul class="list-unstyled ff-secondary footer-list">
                                            <li><a href="pages-profile">About Us</a></li>
                                            <li><a href="pages-gallery">Gallery</a></li>
                                            <li><a href="apps-projects-overview">Projects</a></li>
                                            <li><a href="pages-timeline">Timeline</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-4 mt-4">
                                    <h5 class="text-white mb-0">Apps Pages</h5>
                                    <div class="text-muted mt-3">
                                        <ul class="list-unstyled ff-secondary footer-list">
                                            <li><a href="pages-pricing">Calendar</a></li>
                                            <li><a href="apps-mailbox">Mailbox</a></li>
                                            <li><a href="apps-chat">Chat</a></li>
                                            <li><a href="apps-crm-deals">Deals</a></li>
                                            <li><a href="apps-tasks-kanban">Kanban Board</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-4 mt-4">
                                    <h5 class="text-white mb-0">Support</h5>
                                    <div class="text-muted mt-3">
                                        <ul class="list-unstyled ff-secondary footer-list">
                                            <li><a href="pages-faqs">FAQ</a></li>
                                            <li><a href="pages-faqs">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row text-center text-sm-start align-items-center mt-5">
                        <div class="col-sm-6">

                            <div>
                                <p class="copy-rights mb-0">
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> Â© RDS - Themesbrand
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end mt-3 mt-sm-0">
                                <ul class="list-inline mb-0 footer-social-link">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-facebook-fill"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-github-fill"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-linkedin-fill"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-google-fill"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="avatar-xs d-block">
                                            <div class="avatar-title rounded-circle">
                                                <i class="ri-dribbble-line"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end footer -->


            <!--start back-to-top-->
            <button onclick="topFunction()" class="btn btn-danger btn-icon landing-back-top" id="back-to-top">
                <i class="ri-arrow-up-line"></i>
            </button>
            <!--end back-to-top-->

        </div>
        <!-- end layout wrapper -->
    @endsection
    @section('script')
        <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/landing.init.js') }}"></script>
    @endsection
