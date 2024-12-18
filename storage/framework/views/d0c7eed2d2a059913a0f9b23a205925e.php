

<?php $__env->startSection('title', 'Home Page'); ?>

<?php $__env->startSection('addon_css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Hero Section Start -->
    <div class="hero parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <!-- Hero Left Content Start -->
                    <div class="hero-content">
                        <div class="hero-content-title">
                            <h1 class="text-anime-style-3"><?php echo __('hero_section.title'); ?></h1>
                        </div>
                        <div class="hero-content-body wow fadeInUp" data-wow-delay="0.25s">
                            <p><?php echo e(__('hero_section.body')); ?></p>
                        </div>
                        <div class="hero-content-footer wow fadeInUp" data-wow-delay="0.5s">
                            <a href="#" class="btn-default"><?php echo e(__('hero_section.explore_more')); ?></a>
                            <a href="#" class="btn-default"><?php echo e(__('hero_section.ordercompany')); ?></a>
                            <a href="#" class="btn-default"><?php echo e(__('hero_section.becomepartner')); ?></a>
                        </div>
                    </div>
                    <!-- Hero Left Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Features Section Start -->
    <div class="cargo-shipment">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <!-- Cargo Shipment Item Start -->
                    <div class="cargo-shipment-item wow fadeInUp" data-wow-delay="0.25s">
                        <div class="cargo-shipment-image">
                            <img src="<?php echo e(asset('assets/images/solid-bg.png')); ?>" alt="<?php echo e(__('features.select_box_image_alt')); ?>">
                        </div>
                        <div class="cargo-shipment-content">
                            <div class="cargo-shipment-icon">
                                <img src="<?php echo e(asset('assets/images/icon-select-box.svg')); ?>" alt="<?php echo e(__('features.select_box_icon_alt')); ?>">  
                            </div>
                            <h3><?php echo e(__('features.select_box_title')); ?></h3>
                            <p><?php echo e(__('features.select_box_description')); ?></p>
                        </div>
                    </div>
                    <!-- Cargo Shipment Item End -->
                </div>

                <div class="col-md-4">
                    <!-- Cargo Shipment Item Start -->
                    <div class="cargo-shipment-item active wow fadeInUp" data-wow-delay="0.5s">
                        <div class="cargo-shipment-image">
                            <img src="<?php echo e(asset('assets/images/solid-bg.png')); ?>" alt="<?php echo e(__('features.complete_process_image_alt')); ?>">
                        </div>
                        <div class="cargo-shipment-content">
                            <div class="cargo-shipment-icon">
                                <img src="<?php echo e(asset('assets/images/icon-complete-proccess.svg')); ?>" alt="<?php echo e(__('features.complete_process_icon_alt')); ?>">
                            </div>
                            <h3><?php echo e(__('features.complete_process_title')); ?></h3>
                            <p><?php echo e(__('features.complete_process_description')); ?></p>
                        </div>
                    </div>
                    <!-- Cargo Shipment Item End -->
                </div>

                <div class="col-md-4">
                    <!-- Cargo Shipment Item Start -->
                    <div class="cargo-shipment-item wow fadeInUp" data-wow-delay="0.75s">
                        <div class="cargo-shipment-image">
                            <img src="<?php echo e(asset('assets/images/solid-bg.png')); ?>" alt="<?php echo e(__('features.delivery_image_alt')); ?>">
                        </div>
                        <div class="cargo-shipment-content">
                            <div class="cargo-shipment-icon">
                                <img src="<?php echo e(asset('assets/images/icon-complete-order.svg')); ?>" alt="<?php echo e(__('features.delivery_icon_alt')); ?>">
                            </div>
                            <h3><?php echo e(__('features.delivery_title')); ?></h3>
                            <p><?php echo e(__('features.delivery_description')); ?></p>
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
                        <span><?php echo e(__('features_section.title_span')); ?></span><br>
                        <?php echo e(__('features_section.title')); ?>

                    </h2>
                    <p class="wow fadeInUp" data-wow-delay="0.25s"><?php echo e(__('features_section.description')); ?></p>
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
                                <img src="<?php echo e(asset('assets/images/feature-homebox.png')); ?>" alt="<?php echo e(__('features_section.home_box_image_alt')); ?>">
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- Post Body Start -->
                        <div class="post-body">
                            <h3><?php echo e(__('features_section.home_box_title')); ?></h3>
                            <p><?php echo e(__('features_section.home_box_description')); ?></p>
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
                                <img src="<?php echo e(asset('assets/images/feature-24-7.png')); ?>" alt="<?php echo e(__('features_section.service_image_alt')); ?>">
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- Post Body Start -->
                        <div class="post-body">
                            <h3><?php echo e(__('features_section.service_title')); ?></h3>
                            <p><?php echo e(__('features_section.service_description')); ?></p>
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
                                <img src="<?php echo e(asset('assets/images/feature-wireless.png')); ?>" alt="<?php echo e(__('features_section.connectivity_image_alt')); ?>">
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- Post Body Start -->
                        <div class="post-body">
                            <h3><?php echo e(__('features_section.connectivity_title')); ?></h3>
                            <p><?php echo e(__('features_section.connectivity_description')); ?></p>
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
                                <img src="<?php echo e(asset('assets/images/feature-remote-access.png')); ?>" alt="<?php echo e(__('features_section.remote_access_image_alt')); ?>">
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- Post Body Start -->
                        <div class="post-body">
                            <h3><?php echo e(__('features_section.remote_access_title')); ?></h3>
                            <p><?php echo e(__('features_section.remote_access_description')); ?></p>
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
                                <img src="<?php echo e(asset('assets/images/feature-verification.png')); ?>" alt="<?php echo e(__('features_section.verification_image_alt')); ?>">
                            </figure>
                        </div>
                        <!-- Post Featured Image End -->

                        <!-- Post Body Start -->
                        <div class="post-body">
                            <h3><?php echo e(__('features_section.verification_title')); ?></h3>
                            <p><?php echo e(__('features_section.verification_description')); ?></p>
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
                            <h2 class="text-anime-style-3"><?php echo e(__('how_we_work_section.title')); ?></h2>
                        </div>
                        <div class="our-contract-body">
                            <p class="wow fadeInUp" data-wow-delay="0.25s"><?php echo e(__('how_we_work_section.description')); ?></p>
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
                    <h2 class="text-anime-style-3"><?php echo __('recent_project_section.title'); ?></h2>
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
                                                <img src="<?php echo e(asset('assets/images/pro1.png')); ?>" alt="<?php echo e(__('recent_project_section.project_1_alt')); ?>">
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
                                                <img src="<?php echo e(asset('assets/images/pro2.png')); ?>" alt="<?php echo e(__('recent_project_section.project_2_alt')); ?>">
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
                                                <img src="<?php echo e(asset('assets/images/pro3.png')); ?>" alt="<?php echo e(__('recent_project_section.project_3_alt')); ?>">
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
                        <img src="<?php echo e(asset('assets/images/box-banner.png')); ?>" alt="<?php echo e(__('providing_service_section.banner_image_alt')); ?>">
                    </figure>
                    </div>
                </div>

                <div class="col-lg-6">
                    <!-- Providing Content Start -->
                    <div class="providing-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h2 class="text-anime-style-3"><?php echo e(__('providing_service_section.title')); ?><br><span><?php echo e(__('providing_service_section.subtitle')); ?></span></h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Providing Content Body Start -->
                        <div class="providing-content-body">
                            <p class="wow fadeInUp" data-wow-delay="0.25s"><?php echo e(__('providing_service_section.description')); ?></p>

                            <div class="providing-item-box">
                                <div class="providing-item wow fadeInUp" data-wow-delay="0.25s">
                                    <div class="icon-box">
                                        <span>1.</span>
                                    </div>
                                    <span><?php echo e(__('providing_service_section.security')); ?></span>
                                </div>

                                <div class="providing-item wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="icon-box">
                                        <span>2.</span>
                                    </div>
                                    <span><?php echo e(__('providing_service_section.privacy')); ?></span>
                                </div>

                                <div class="providing-item wow fadeInUp" data-wow-delay="0.75s">
                                    <div class="icon-box">
                                        <span>3.</span>
                                    </div>
                                    <span><?php echo e(__('providing_service_section.support')); ?></span>
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
                            <h2 class="text-anime-style-3"><?php echo e(__('our_contract_section.title')); ?></h2>
                        </div>
                        <div class="our-contract-body">
                            <p class="wow fadeInUp" data-wow-delay="0.25s"><?php echo e(__('our_contract_section.description')); ?></p>
                            <a style="display:inline-block;" class="image_apple" href="https://www.apple.com/app-store/">
                                <figure class="mb-0 available-apple">
                                    <img class="img-fluid" src="<?php echo e(asset('assets/images/bannerapple-img1.png')); ?>" alt="<?php echo e(__('our_contract_section.apple_store_alt')); ?>">
                                </figure>
                            </a>
                            <a style="display:inline-block;" class="image_google" href="https://play.google.com/store/games">
                                <figure class="mb-0 available-google">
                                    <img class="img-fluid" src="<?php echo e(asset('assets/images/bannergoogle-img2.png')); ?>" alt="<?php echo e(__('our_contract_section.google_play_store_alt')); ?>">
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
                            <h2 class="text-anime-style-3"><?php echo __('about_section.title'); ?></h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Home Transportation Body Start -->
                        <div class="home-transportation-body">
                            <p class="wow fadeInUp" data-wow-delay="0.25s"><?php echo e(__('about_section.body_first')); ?></p>
                            <p class="wow fadeInUp" data-wow-delay="0.5s"><?php echo e(__('about_section.body_second')); ?></p>
                        </div>
                        <!-- Home Transportation Body End -->

                        <!-- Home Transportation Footer Start -->
                        <div class="home-transportation-footer wow fadeInUp" data-wow-delay="0.75s">
                            <div class="transportation-footer-btn">
                                <a href="#features" class="btn-default"><?php echo e(__('about_section.discover_more')); ?></a>
                            </div>                            
                            <div class="header-contact-us">
                                <a href="#"><img src="<?php echo e(asset('assets/images/icon-phone.svg')); ?>" alt="<?php echo e(__('about_section.contact_phone_alt')); ?>"><hل3><?php echo e(__('about_section.contact_phone_title')); ?> <span><?php echo e(__('about_section.contact_phone_number')); ?></span></h3></a>
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
                    <h2 class="text-anime-style-3"><?php echo __('faqs_section.title'); ?></h2>
                    <p class="wow fadeInUp" data-wow-delay="0.25s"><?php echo e(__('faqs_section.subtitle')); ?></p>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12 offset-lg-2">
                    <!-- FAQs Accordion Start -->
                    <div class="faq-accordion" id="accordion">
                        <?php $__currentLoopData = __('faqs_section.questions'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="accordion-item wow fadeInUp" data-wow-delay="<?php echo e($faq['delay']); ?>">
                                <h2 class="accordion-header box-border-linear-gradient" id="heading<?php echo e($key); ?>">
                                    <button class="accordion-button <?php echo e($key > 0 ? 'collapsed' : ''); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($key); ?>" aria-expanded="<?php echo e($key == 1 ? 'true' : 'false'); ?>" aria-controls="collapse<?php echo e($key); ?>"><?php echo e($faq['question']); ?></button>
                                </h2>
                                <div id="collapse<?php echo e($key); ?>" class="accordion-collapse collapse <?php echo e($key == 0 ? 'show' : ''); ?>" aria-labelledby="heading<?php echo e($key); ?>" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p><?php echo e($faq['answer']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- FAQs Accordion End -->
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs Section Ends -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('addon_js'); ?>
<script></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\rds_backend\resources\views/index.blade.php ENDPATH**/ ?>