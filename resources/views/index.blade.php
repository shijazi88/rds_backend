@extends('layouts.master-front')

@section('title', 'Home Page')

@section('addon_css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
@endsection
@section('content')
    <!-- Hero Section Start -->
    <div class="hero parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <!-- Hero Left Content Start -->
                    <div class="hero-content">
                        <div class="hero-content-title">
                            <h1 class="text-anime-style-3">{!!__('hero_section.title')!!}</h1>
                        </div>
                        <div class="hero-content-body wow fadeInUp" data-wow-delay="0.25s">
                            <p>{{ __('hero_section.body') }}</p>
                        </div>
                        <div class="hero-content-footer wow fadeInUp" data-wow-delay="0.5s">
                            <a href="#" class="btn-default" data-bs-toggle="modal" data-bs-target="#registerModal" id="btnOrderBox">
                                {{ __('hero_section.explore_more') }}
                            </a>
                            <a href="#" class="btn-default" id="getBox" style="display: none;">
                                {{ __('hero_section.explore_more_2') }}
                            </a>
                            <a href="#" class="btn-default">{{ __('hero_section.ordercompany') }}</a>
                            <a href="#" class="btn-default">{{ __('hero_section.becomepartner') }}</a>
                        </div>
                    </div>
                    <!-- Hero Left Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->
    <!-- Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Step 1: Registration -->
                    <form id="registerForm" style="display: block;">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>

                    <!-- Step 2: OTP Verification -->
                    <form id="otpForm" style="display: none;">
                        <div class="mb-3">
                            <label for="otp" class="form-label">Enter OTP</label>
                            <input type="text" class="form-control" id="otp" name="otp" required>
                        </div>
                        <button type="submit" class="btn btn-success">Verify OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- Modal -->
    <div id="boxModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Step 1: Choose a Box -->
                <div id="step1" class="modal-step">
                    <div class="modal-header">
                        <h5 class="modal-title">Choose a Box</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <ul id="boxList"></ul>
                    </div>
                </div>

                <!-- Step 2: Create Address -->
                <div id="step2" class="modal-step d-none">
                    <div class="modal-header">
                        <h5 class="modal-title">Enter Delivery Address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="createAddressForm">
                            <div class="mb-3">
                                <label for="address_name" class="form-label">Address Name</label>
                                <input type="text" id="address_name" name="name" class="form-control" required>
                            </div>
                            <div id="map" style="height: 400px; margin-bottom: 15px;"></div>
                            <input type="hidden" id="address_lat" name="lat">
                            <input type="hidden" id="address_lng" name="lng">
                            <button type="submit" class="btn btn-primary">Create Address</button>
                        </form>
                    </div>
                </div>

                <!-- Step 3: Buy Box -->
                <div id="step3" class="modal-step d-none">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Purchase</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="buyBoxForm">
                            <input type="hidden" id="selectedBoxId" name="box_id">
                            <input type="hidden" id="selectedAddressId" name="address_id">
                            <button type="submit" class="btn btn-primary">Buy Box</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section Start -->
    <div class="cargo-shipment">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <!-- Cargo Shipment Item Start -->
                    <div class="cargo-shipment-item wow fadeInUp" data-wow-delay="0.25s">
                        <div class="cargo-shipment-image">
                            <img src="{{ asset('assets/images/solid-bg.png') }}" alt="{{ __('features.select_box_image_alt') }}">
                        </div>
                        <div class="cargo-shipment-content">
                            <div class="cargo-shipment-icon">
                                <img src="{{ asset('assets/images/icon-select-box.svg') }}" alt="{{ __('features.select_box_icon_alt') }}">  
                            </div>
                            <h3>{{ __('features.select_box_title') }}</h3>
                            <p>{{ __('features.select_box_description') }}</p>
                        </div>
                    </div>
                    <!-- Cargo Shipment Item End -->
                </div>

                <div class="col-md-4">
                    <!-- Cargo Shipment Item Start -->
                    <div class="cargo-shipment-item active wow fadeInUp" data-wow-delay="0.5s">
                        <div class="cargo-shipment-image">
                            <img src="{{ asset('assets/images/solid-bg.png') }}" alt="{{ __('features.complete_process_image_alt') }}">
                        </div>
                        <div class="cargo-shipment-content">
                            <div class="cargo-shipment-icon">
                                <img src="{{ asset('assets/images/icon-complete-proccess.svg') }}" alt="{{ __('features.complete_process_icon_alt') }}">
                            </div>
                            <h3>{{ __('features.complete_process_title') }}</h3>
                            <p>{{ __('features.complete_process_description') }}</p>
                        </div>
                    </div>
                    <!-- Cargo Shipment Item End -->
                </div>

                <div class="col-md-4">
                    <!-- Cargo Shipment Item Start -->
                    <div class="cargo-shipment-item wow fadeInUp" data-wow-delay="0.75s">
                        <div class="cargo-shipment-image">
                            <img src="{{ asset('assets/images/solid-bg.png') }}" alt="{{ __('features.delivery_image_alt') }}">
                        </div>
                        <div class="cargo-shipment-content">
                            <div class="cargo-shipment-icon">
                                <img src="{{ asset('assets/images/icon-complete-order.svg') }}" alt="{{ __('features.delivery_icon_alt') }}">
                            </div>
                            <h3>{{ __('features.delivery_title') }}</h3>
                            <p>{{ __('features.delivery_description') }}</p>
                        </div>
                    </div>
                    <!-- Cargo Shipment Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Features Shipment Section End -->

    <!-- Features Section Start -->
    <div class="latest-posts" id="features">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2 class="text-anime-style-3">
                        <span>{{ __('features_section.title_span') }}</span><br>
                        {{ __('features_section.title') }}
                    </h2>
                    <p class="wow fadeInUp" data-wow-delay="0.25s">{{ __('features_section.description') }}</p>
                </div>
                <!-- Section Title End -->
            </div>
            
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp" data-wow-delay="0.25s">
                        <!-- Post Featured Image Start -->
                        <div class="post-featured-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/images/feature-homebox.png') }}" alt="{{ __('features_section.home_box_image_alt') }}">
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- Post Body Start -->
                        <div class="post-body">
                            <h3>{{ __('features_section.home_box_title') }}</h3>
                            <p>{{ __('features_section.home_box_description') }}</p>
                        </div>
                        <!-- Post Body End -->
                    </div>
                    <!-- Post Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp" data-wow-delay="0.5s">
                        <!-- Post Featured Image Start -->
                        <div class="post-featured-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/images/feature-24-7.png') }}" alt="{{ __('features_section.service_image_alt') }}">
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- Post Body Start -->
                        <div class="post-body">
                            <h3>{{ __('features_section.service_title') }}</h3>
                            <p>{{ __('features_section.service_description') }}</p>
                        </div>
                        <!-- Post Body End -->
                    </div>
                    <!-- Post Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp" data-wow-delay="0.75s">
                        <!-- Post Featured Image Start -->
                        <div class="post-featured-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/images/feature-wireless.png') }}" alt="{{ __('features_section.connectivity_image_alt') }}">
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- Post Body Start -->
                        <div class="post-body">
                            <h3>{{ __('features_section.connectivity_title') }}</h3>
                            <p>{{ __('features_section.connectivity_description') }}</p>
                        </div>
                        <!-- Post Body End -->
                    </div>
                    <!-- Post Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp" data-wow-delay="0.75s">
                        <!-- Post Featured Image Start -->
                        <div class="post-featured-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/images/feature-remote-access.png') }}" alt="{{ __('features_section.remote_access_image_alt') }}">
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- Post Body Start -->
                        <div class="post-body">
                            <h3>{{ __('features_section.remote_access_title') }}</h3>
                            <p>{{ __('features_section.remote_access_description') }}</p>
                        </div>
                        <!-- Post Body End -->
                    </div>
                    <!-- Post Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp" data-wow-delay="0.75s">
                        <!-- Post Featured Image Start -->
                        <div class="post-featured-image">
                            <figure class="image-anime">
                                <img src="{{ asset('assets/images/feature-verification.png') }}" alt="{{ __('features_section.verification_image_alt') }}">
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- Post Body Start -->
                        <div class="post-body">
                            <h3>{{ __('features_section.verification_title') }}</h3>
                            <p>{{ __('features_section.verification_description') }}</p>
                        </div>
                        <!-- Post Body End -->
                    </div>
                    <!-- Post Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Features Section End -->

    <!-- How We Work Section Start -->
    <div class="our-contract parallaxie" id="how-we-work">
        <div class="container">
            <div class="row align-items-center">  
                <div class="col-md-12">
                    <!-- Our Cta Box Start -->
                    <div class="our-cta-box">
                        <div class="our-contract-title">
                            <h2 class="text-anime-style-3">{{ __('how_we_work_section.title') }}</h2>
                        </div>
                        <div class="our-contract-body">
                            <p class="wow fadeInUp" data-wow-delay="0.25s">{{ __('how_we_work_section.description') }}</p>
                        </div>
                    </div>
                    <!-- Our Cta Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- How We Work Section End -->

    <!-- Recent Project Section Start -->
    <div class="recent-project">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2 class="text-anime-style-3">{!!__('recent_project_section.title')!!}</h2>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="project-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <!-- Recent Projects Slide Start -->
                                <div class="swiper-slide">
                                    <div class="project-item">
                                        <div class="project-image">
                                            <figure class="image-anime">
                                                <img src="{{ asset('assets/images/pro1.png') }}" alt="{{ __('recent_project_section.project_1_alt') }}">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <!-- Recent Projects Slide End -->

                                <!-- Recent Projects Slide Start -->
                                <div class="swiper-slide">
                                    <div class="project-item">
                                        <div class="project-image">
                                            <figure class="image-anime">
                                                <img src="{{ asset('assets/images/pro2.png') }}" alt="{{ __('recent_project_section.project_2_alt') }}">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <!-- Recent Projects Slide End -->

                                <!-- Recent Projects Slide Start -->
                                <div class="swiper-slide">
                                    <div class="project-item">
                                        <div class="project-image">
                                            <figure class="image-anime">
                                                <img src="{{ asset('assets/images/pro3.png') }}" alt="{{ __('recent_project_section.project_3_alt') }}">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <!-- Recent Projects Slide End -->
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="client-button-prev"><i class="fa-regular fa-circle-left"></i></div>
                        <div class="client-button-next"><i class="fa-regular fa-circle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Project Section End -->

    <!-- Providing Service Section Start -->
    <div class="providing-service">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="Featured-Content-Box">
                    <figure class="reveal image-anime">
                        <img src="{{ asset('assets/images/box-banner.png') }}" alt="{{ __('providing_service_section.banner_image_alt') }}">
                    </figure>
                    </div>
                </div>

                <div class="col-lg-6">
                    <!-- Providing Content Start -->
                    <div class="providing-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h2 class="text-anime-style-3">{{ __('providing_service_section.title') }}<br><span>{{ __('providing_service_section.subtitle') }}</span></h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Providing Content Body Start -->
                        <div class="providing-content-body">
                            <p class="wow fadeInUp" data-wow-delay="0.25s">{{ __('providing_service_section.description') }}</p>

                            <div class="providing-item-box">
                                <div class="providing-item wow fadeInUp" data-wow-delay="0.25s">
                                    <div class="icon-box">
                                        <span>1.</span>
                                    </div>
                                    <span>{{ __('providing_service_section.security') }}</span>
                                </div>

                                <div class="providing-item wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="icon-box">
                                        <span>2.</span>
                                    </div>
                                    <span>{{ __('providing_service_section.privacy') }}</span>
                                </div>

                                <div class="providing-item wow fadeInUp" data-wow-delay="0.75s">
                                    <div class="icon-box">
                                        <span>3.</span>
                                    </div>
                                    <span>{{ __('providing_service_section.support') }}</span>
                                </div>
                            </div>
                        </div>  
                        <!-- Providing Content Body End -->              
                    </div>
                    <!-- Providing Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Providing Service Section End -->

    <!-- Our Contract Section Start -->
    <div class="our-contract our-contract2 parallaxie" id="downloadApp">
        <div class="container">
            <div class="row align-items-center">  
                <div class="col-md-12">
                    <!-- Our Cta Box Start -->
                    <div class="our-cta-box">
                        <div class="our-contract-title">
                            <h2 class="text-anime-style-3">{{ __('our_contract_section.title') }}</h2>
                        </div>
                        <div class="our-contract-body">
                            <p class="wow fadeInUp" data-wow-delay="0.25s">{{ __('our_contract_section.description') }}</p>
                            <a style="display:inline-block;" class="image_apple" href="https://www.apple.com/app-store/">
                                <figure class="mb-0 available-apple">
                                    <img class="img-fluid" src="{{ asset('assets/images/bannerapple-img1.png') }}" alt="{{ __('our_contract_section.apple_store_alt') }}">
                                </figure>
                            </a>
                            <a style="display:inline-block;" class="image_google" href="https://play.google.com/store/games">
                                <figure class="mb-0 available-google">
                                    <img class="img-fluid" src="{{ asset('assets/images/bannergoogle-img2.png') }}" alt="{{ __('our_contract_section.google_play_store_alt') }}">
                                </figure>
                            </a>
                        </div>
                    </div>
                    <!-- Our Cta Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Contract Section End -->


    <!-- About Section Start -->
    <div class="home-transportation" id="about-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 order-lg-1 order-md-2 order-2">
                    <!-- Home Transportation Content Start -->
                    <div class="home-transportation-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h2 class="text-anime-style-3">{!!__('about_section.title')!!}</h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Home Transportation Body Start -->
                        <div class="home-transportation-body">
                            <p class="wow fadeInUp" data-wow-delay="0.25s">{{ __('about_section.body_first') }}</p>
                            <p class="wow fadeInUp" data-wow-delay="0.5s">{{ __('about_section.body_second') }}</p>
                        </div>
                        <!-- Home Transportation Body End -->

                        <!-- Home Transportation Footer Start -->
                        <div class="home-transportation-footer wow fadeInUp" data-wow-delay="0.75s">
                            <div class="transportation-footer-btn">
                                <a href="#features" class="btn-default">{{ __('about_section.discover_more') }}</a>
                            </div>                            
                            <div class="header-contact-us">
                                <a href="#"><img src="{{ asset('assets/images/icon-phone.svg') }}" alt="{{ __('about_section.contact_phone_alt') }}"><hل3>{{ __('about_section.contact_phone_title') }} <span>{{ __('about_section.contact_phone_number') }}</span></h3></a>
                            </div>    
                        </div>
                        <!-- Home Transportation Footer End -->
                    </div>
                    <!-- Home Transportation Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- FAQs Section Start -->
    <div class="page-faqs" id="faq">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2 class="text-anime-style-3">{!!__('faqs_section.title')!!}</h2>
                    <p class="wow fadeInUp" data-wow-delay="0.25s">{{ __('faqs_section.subtitle') }}</p>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12 offset-lg-2">
                    <!-- FAQs Accordion Start -->
                    <div class="faq-accordion" id="accordion">
                        @foreach(__('faqs_section.questions') as $key => $faq)
                            <div class="accordion-item wow fadeInUp" data-wow-delay="{{ $faq['delay'] }}">
                                <h2 class="accordion-header box-border-linear-gradient" id="heading{{ $key }}">
                                    <button class="accordion-button {{ $key > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="{{ $key == 1 ? 'true' : 'false' }}" aria-controls="collapse{{ $key }}">{{ $faq['question'] }}</button>
                                </h2>
                                <div id="collapse{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $key }}" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>{{ $faq['answer'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- FAQs Accordion End -->
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs Section Ends -->

@endsection

@section('addon_js')

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.getElementById('registerForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        try {
            const response = await fetch('{{ route('client.register.web') }}', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            });

            const result = await response.json();
            if (response.ok) {
                Swal.fire({
                    icon: "success",
                    title: "Registration successful. Please enter the OTP sent to your mobile.",
                    showConfirmButton: false,
                    timer: 1500
                });
                document.getElementById('registerForm').style.display = 'none';
                document.getElementById('otpForm').style.display = 'block';
                // Store the mobile for OTP verification
                document.getElementById('otpForm').dataset.mobile = formData.get('mobile');
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error during registration.",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        } catch (error) {
            Swal.fire({
                icon: "error",
                title: "An unexpected error occurred. Please try again.",
                showConfirmButton: false,
                timer: 1500
            });
        }
    });

    document.getElementById('otpForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        const mobile = this.dataset.mobile; // Retrieve the mobile from the first step
        formData.append('mobile', mobile);

        try {
            const response = await fetch('{{ route('client.verifyRegistrationOTP') }}', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            });

            const result = await response.json();
            if (response.ok) {
                Swal.fire({
                    icon: "success",
                    title: "OTP verified successfully!",
                    showConfirmButton: false,
                    timer: 1500
                });
                this.reset();
                $('#registerModal').modal('hide');
                window.localStorage.setItem('token',result.data.token);
                $('#btnOrderBox').hide();
                $('#getBox').show();
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Invalid OTP. Please try again.",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        } catch (error) {
            Swal.fire({
                icon: "error",
                title: "An unexpected error occurred. Please try again.",
                showConfirmButton: false,
                timer: 1500
            });
        }
    });

    $( document ).ready(function() {
        if(window.localStorage.getItem('token') != undefined) {
            $('#btnOrderBox').hide();
            $('#getBox').show();
        }
    });

    $(document).ready(function () {

        let map, marker;

        // Open modal and load boxes
        $('#getBox').on('click', function (e) {
            e.preventDefault();
            $('#boxModal').modal('show');
            loadBoxes();
        });

        // Initialize map when entering Step 2
        function initializeMap() {
            if (!map) {
                // Initialize map centered on a default location
                map = L.map('map').setView([25.276987, 55.296249], 10); // Example: Dubai

                // Add OpenStreetMap tiles
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                }).addTo(map);

                // Add a marker on the map
                marker = L.marker([25.276987, 55.296249], { draggable: true }).addTo(map);

                // Update hidden fields when marker is moved
                marker.on('move', function (event) {
                    const latlng = event.target.getLatLng();
                    $('#address_lat').val(latlng.lat);
                    $('#address_lng').val(latlng.lng);
                });

                // Set initial coordinates in hidden fields
                $('#address_lat').val(marker.getLatLng().lat);
                $('#address_lng').val(marker.getLatLng().lng);

                // Update marker position on map click
                map.on('click', function (e) {
                    marker.setLatLng(e.latlng);
                    $('#address_lat').val(e.latlng.lat);
                    $('#address_lng').val(e.latlng.lng);
                });
            }
        }

        // Load boxes from API
        function loadBoxes() {
            $.ajax({
                url: "{{ route('boxes.forSale') }}",
                method: "GET",
                headers: {
                    'Authorization': `Bearer ${window.localStorage.getItem('token')}`,
                },
                success: function (response) {
                    if (response.status) {
                        const boxes = response.data;
                        const boxList = $('#boxList');
                        boxList.empty();
                        boxes.forEach(box => {
                            boxList.append(`
                                <li>
                                    <div>
                                        <h6>${box.title} - $${box.price}</h6>
                                        <p>${box.descrption}</p>
                                        <button class="btn btn-primary select-box" data-box-id="${box.id}">
                                            Select
                                        </button>
                                    </div>
                                </li>
                            `);
                        });

                        // Attach click handler for box selection
                        $('.select-box').on('click', function () {
                            const boxId = $(this).data('box-id');
                            $('#selectedBoxId').val(boxId);
                            $('#step1').addClass('d-none');
                            $('#step2').removeClass('d-none');
                            initializeMap();
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Failed to load boxes",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: "error",
                        title: "Error loading boxes",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        }

        // Create address
        $('#createAddressForm').on('submit', function (e) {
            e.preventDefault();
            const formData = $(this).serialize();

            $.ajax({
                url: "{{ route('client.address.create') }}",
                method: "POST",
                data: formData,
                headers: {
                    'Authorization': `Bearer ${window.localStorage.getItem('token')}`,
                },
                success: function (response) {
                    if (response.status) {
                        const addressId = response.data.id;
                        $('#selectedAddressId').val(addressId);
                        $('#step2').addClass('d-none');
                        $('#step3').removeClass('d-none');
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Failed to create address",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: "error",
                        title: "Error creating address",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });

        // Buy box
        $('#buyBoxForm').on('submit', function (e) {
            e.preventDefault();
            const formData = $(this).serialize();

            $.ajax({
                url: "{{ route('boxes.buy.web') }}",
                method: "POST",
                data: formData,
                headers: {
                    'Authorization': `Bearer ${window.localStorage.getItem('token')}`,
                },
                success: function (response) {
                    if (response.status) {
                        window.location.href = response.data;
                        $('#boxModal').modal('hide');
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Failed to purchase box",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error: function () {
                    
                    Swal.fire({
                        icon: "error",
                        title: "Error processing your request",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
    });



</script>
@endsection
