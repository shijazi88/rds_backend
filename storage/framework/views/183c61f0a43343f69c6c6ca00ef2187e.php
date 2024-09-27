<!DOCTYPE html>
<html lang="<?php echo e(session()->get('locale')); ?>" <?php if(session()->get('locale') == 'ar'): ?> dir="rtl" <?php endif; ?>>

<head>
    <title><?php echo e(env('APP_NAME')); ?> | <?php echo $__env->yieldContent('title'); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- /SEO Ultimate -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" href="<?php echo e(asset('favicon.ico')); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo e(asset('favicon.ico')); ?>">
    
    <!-- Google Fonts Css-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" media="screen">
    <!-- SlickNav Css -->
    <link href="<?php echo e(asset('assets/css/slicknav.min.css')); ?>" rel="stylesheet">
    <!-- Swiper Css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/swiper-bundle.min.css')); ?>">
    <!-- Font Awesome Icon Css-->
    <link href="<?php echo e(asset('assets/css/all.min.css')); ?>" rel="stylesheet" media="screen">
    <!-- Animated Css -->
    <link href="<?php echo e(asset('assets/css/animate.css')); ?>" rel="stylesheet">
    <!-- Magnific Css -->
    <link href="<?php echo e(asset('assets/css/magnific-popup.css')); ?>" rel="stylesheet">
    <!-- Main Custom Css -->
    <link href="<?php echo e(asset('assets/css/custom.css')); ?>" rel="stylesheet" media="screen">
    <script>
        let isArabic = false;
    </script>
    <?php if(session()->get('locale') == 'ar'): ?>
    <link href="<?php echo e(asset('assets/css/rtl.css')); ?>" rel="stylesheet" type="text/css">
    <script>
        isArabic = true;
    </script>
    <?php endif; ?>
    <?php echo $__env->yieldContent('addon_css'); ?>

</head>

<body class="tt-magic-cursor" id="home">

    <!-- Preloader Start -->
    <div class="preloader">
        <div class="loading-container">
            <div class="loading"></div>
            <div id="loading-icon"><img src="<?php echo e(asset('assets/images/logo-square.svg')); ?>" alt=""></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Magic Cursor Start -->
    <div id="magic-cursor">
        <div id="ball"></div>
    </div>
    <!-- Magic Cursor End -->

    <!-- Topbar Section Start -->
    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 text-center">
                    <!-- Topbar Contact Information Start -->
                    <div class="topbar-contact-info">
                        <ul>
                            <li><a href="#downloadApp"> <?php echo e(__('front.download_app')); ?></a></li>
                            <li>
                        </ul>
                    </div>
                    <!-- Topbar Contact Information End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar Section End -->

    <!-- Header Start -->
    <header class="main-header">
        <div class="header-sticky">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <!-- Logo Start -->
                    <a class="navbar-brand" href="./"><img src="<?php echo e(asset('assets/images/logo.svg')); ?>" alt=""></a>
                    <!-- Logo End -->
    
                    <!-- Main Menu Start -->
                    <div class="collapse navbar-collapse main-menu">
                        <ul class="navbar-nav mr-auto" id="menu">
                            <li class="nav-item"><a class="nav-link" href="/#home"><?php echo e(__('front.home')); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="/#about-us"><?php echo e(__('front.about_us')); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="/#features"><?php echo e(__('front.features')); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="/#how-we-work"><?php echo e(__('front.how_we_work')); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="/#faq"><?php echo e(__('front.faq')); ?></a></li>
                            <li class="nav-item" <?php if(app()->getLocale() === 'en') echo 'style="display:none"'?>>
                                <a class="nav-link" href="<?php echo e(route('change.locale', ['locale' => app()->getLocale() === 'en' ? 'ae' : 'en'])); ?>">
                                    <?php echo e(app()->getLocale() === 'en' ? 'العربية' : 'English'); ?>

                                </a>
                            </li>
                            <li class="nav-item" <?php if(app()->getLocale() === 'ae') echo 'style="display:none"'?>>
                                <a class="nav-link" href="<?php echo e(route('change.locale', ['locale' => app()->getLocale() === 'en' ? 'ae' : 'en'])); ?>" style="font-family:'GE SS Two', sans-serif;">
                                    <?php echo e(app()->getLocale() === 'en' ? 'العربية' : 'English'); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Main Menu End -->

                    <!--Get Contact Us Start-->
                    <div class="header-contact-us">
                        <a href="<?php echo e(route('contact')); ?>" class="try_free_btn" href="#!"><img src="<?php echo e(asset('assets/images/icon-phone.svg')); ?>" alt=""><h3><?php echo e(__('front.request_box')); ?><span> <?php echo e(__('front.now')); ?></span></h3></a>
                    </div>                           
                    <!--Get Contact Us End-->

                    <div class="navbar-toggle"></div>                         
                </div>
            </nav>

            <div class="responsive-menu"></div>
        </div>
    </header>
    <!-- Header End -->

    <?php echo $__env->yieldContent('content'); ?>
    
    <!-- Main Footer Start  -->
    <footer class="main-footer">
        <!-- Mega Footer Start -->
        <div class="mega-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <!-- Footer About Start -->
                        <div class="footer-about">
                            <!-- Footer Heading Start -->
                            <div class="footer-heading">
                                <figure>
                                    <img src="<?php echo e(asset('assets/images/logo-white.svg')); ?>" alt="">
                                </figure>
                            </div>
                            <!-- Footer Heading End -->

                            <!-- Footer Content Start -->
                            <div class="footer-content">
                                <p><?php echo e(__('front.we_are_rds')); ?></p>
                            </div>
                            <!-- Footer Content End -->

                            <!-- Footer Social Link Start -->
                            <div class="footer-social-link">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i><svg style="fill: #FFD038;height: 20px;padding: 0;margin: 0;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li> 
                                </ul>
                            </div>
                            <!-- Footer Social Link End -->
                        </div>  
                        <!-- Footer About End -->                         
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Footer links Start -->
                        <div class="footer-links">
                            <div class="footer-info-heading">
                                <h2><?php echo e(__('front.quick_links')); ?></h2>
                            </div>
                            <ul>
                                <li><a href="/#"><?php echo e(__('front.home')); ?></a></li>
                                <li><a href="<?php echo e(route('contact')); ?>"><?php echo e(__('front.request_box_now')); ?></a></li>
                            </ul>
                        </div>
                        <!-- Footer links End -->
                    </div>                        

                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Footer Contact Info Start -->
                        <div class="footer-contact-info">
                            <!-- footer info heading Start -->
                            <div class="footer-info-heading">
                                <h2><?php echo e(__('front.contact_us')); ?></h2>
                            </div>
                            <!-- footer info heading End -->

                            <!-- Footer Contact Info Box Start -->
                            <div class="footer-contact-box">
                                <div class="footer-info-box">
                                    <div class="icon-box">
                                        <i class="fa-regular fa-envelope"></i>
                                    </div>

                                    <p><?php echo e(__('front.email')); ?></p>
                                </div>

                                <div class="footer-info-box">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    
                                    <p><?php echo e(__('front.address')); ?></p>									
                                </div>

                                <div class="footer-info-box">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>

                                    <p><?php echo e(__('front.phone')); ?></p>
                                </div>
                            </div>
                            <!-- Footer Contact Info Box End -->
                        </div>
                    </div>
                    <!-- Footer Contact Info End -->
                </div>
            </div>
        </div>
        <!-- Mega Footer End -->
    </footer>
    <!-- Main footer End -->

    <!-- Footer Copyright Section Start -->
    <div class="footer-copyright-links">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Footer Copyright Content Start -->
                    <div class="footer-copyright">
                        <p><?php echo e(__('front.copyright')); ?> <b>RDS Box.</b> <?php echo e(__('front.all_rights_reserved')); ?>.</p>
                    </div>
                    <!-- Footer Copyright Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Copyright Section End -->

    <!-- Jquery Library File -->
    <script src="<?php echo e(asset('assets/js/jquery-3.7.1.min.js')); ?>"></script>
    <!-- Bootstrap js File -->
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <!-- Validator js File -->
    <script src="<?php echo e(asset('assets/js/validator.min.js')); ?>"></script>
    <!-- SlickNav js File -->
    <script src="<?php echo e(asset('assets/js/jquery.slicknav.js')); ?>"></script>
    <!-- Swiper js File -->
    <script src="<?php echo e(asset('assets/js/swiper-bundle.min.js')); ?>"></script>
    <!-- Counter js File -->
    <script src="<?php echo e(asset('assets/js/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.counterup.min.js')); ?>"></script>
    <!-- Magnific js File -->
    <script src="<?php echo e(asset('assets/js/jquery.magnific-popup.min.js')); ?>"></script>
    <!-- SmoothScroll -->
    <script src="<?php echo e(asset('assets/js/SmoothScroll.js')); ?>"></script>
    <!-- Parallax js -->
    <script src="<?php echo e(asset('assets/js/parallaxie.js')); ?>"></script>
    <!-- MagicCursor js File -->
    <script src="<?php echo e(asset('assets/js/gsap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/magiccursor.js')); ?>"></script>
    <!-- Text Effect js File -->
    <script src="<?php echo e(asset('assets/js/SplitText.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/ScrollTrigger.min.js')); ?>"></script>
    <!-- YTPlayer js File -->
    <script src="<?php echo e(asset('assets/js/jquery.mb.YTPlayer.min.js')); ?>"></script>
    <!-- Wow js File -->
    <script src="<?php echo e(asset('assets/js/wow.js')); ?>"></script>
    <!-- Main Custom js File -->
    <script src="<?php echo e(asset('assets/js/function.js')); ?>"></script>
    <?php echo $__env->yieldContent('addon_js'); ?>
</body>

</html>
<?php /**PATH C:\wamp64\www\rds_backend\resources\views/layouts/master-front.blade.php ENDPATH**/ ?>