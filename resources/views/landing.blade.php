@extends('layouts.master-without-nav-ar')
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
                                <a class="nav-link active" href="#home">الصفحة الرئيسية</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#services">خدماتنا</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#boxwork">كيف يعمل صندوقنا الذكي؟</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#boxbox">طلب صندوقك</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#services"> عن ردس بوكس</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#faqs">الاسئلة الشائعة</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contactus">تواصل معنا</a>
                            </li>
                        </ul>


                    </div>

                </div>
            </nav>
            <!-- end navbar -->
            <div class="vertical-overlay" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent.show"></div>

            <section class="section" id="empty">
            </section>
            <!-- start hero section -->
            <section class="section" id="home">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h1 class="display-6 fw-semibold mb-3 lh-base">استلم شحناتك دون رنة</h1>
                                <p class="text-muted mb-4 ff-secondary">صندوق استلامك الذكي والحل الأمثل لكل مشاكل التسليم
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect" style="margin-right: 20px;">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-shield-check-line fs-36"></i> <!-- Updated icon for durability -->
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted my-3 ff-secondary">انتهت المشاكل المتعلقة باستلام الشحنات وطلبات
                                        التوصيل. بكل فخر، نقدم لكم ردس بوكس؛ الحل الأمثل لاستلام شحناتكم بكل سهولة من
                                        المندوب دون الحاجة إلى تحديد موقعكم أو تلقي أي اتصالات، مما يضمن تجربة خالية من
                                        الإزعاج.</p>
                                </div>

                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect" style="margin-right: 20px;">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-lock-2-line fs-36"></i> <!-- Updated icon for security -->
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted my-3 ff-secondary">إن صندوق ردس بوكس يعمل بنظام تقني ذكي مربوط مع
                                        شركات التوصيل؛ ليكون بديلك الموثوق لاستلام شحناتك وطلباتك من المندوب. إنه صندوق
                                        يُثبَّت عند باب المنزل، بتصاميم حديثة ومتطورة.</p>
                                </div>

                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect" style="margin-right: 20px;">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-tools-line fs-36"></i>
                                            <!-- Updated icon for ease of installation -->
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted my-3 ff-secondary">ردس بوكس يمثل بصمة ناجحة لرفع كفاءة الخدمات
                                        اللوجستية. أكبر المشاكل في نقل الشحنات تتمثل في مرحلة الميل الأخير من التوصيل، وهي
                                        تمثل نقطة مكلفة تشكل 40% من إجمالي تكاليف سلسلة الإمداد. ردس بوكس يقدم الحل الأمثل
                                        لهذه المعوقات بتقنية سلسة وكفاءة عالية.</p>
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
                                <h1 class="mb-3 ff-secondary fw-semibold lh-base">خدماتنا
                                </h1>
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
                                            <i class="ri-home-line fs-36"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted my-3 ff-secondary">صندوق منزلي</p>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-time-line fs-36"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted my-3 ff-secondary">اتاحة استلام على مدار اليوم 24/7</p>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-wifi-line fs-36"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted my-3 ff-secondary">الاتصال الدائم بالإنترنت</p>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-remote-control-line fs-36"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted my-3 ff-secondary">التحكم عن بعد</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-check-line fs-36"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted my-3 ff-secondary">نظام التأكد من استلام الشحنات</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-notification-line fs-36"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted my-3 ff-secondary">نظام اشعارات بفتح وإغلاق الصندوق استلام الشحنات
                                        بدون تدخل العميل</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="d-flex p-3">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle">
                                            <i class="ri-robot-line fs-36"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted my-3 ff-secondary">استقبال الشحنات الآلي</p>
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

            <section class="py-5 bg-primary position-relative">
                <div class="bg-overlay bg-overlay-pattern opacity-50"></div>
                <div class="container">
                    <div class="row align-items-center gy-4">
                        <div class="col-sm">
                            <div>
                                <h4 class="text-white mb-0 fw-semibold">سارع بالطلب وانضم معنا لتصل شحنتك بسرعة ودون
                                    رنة.
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-auto">
                            <div>
                                <a href="https://1.envato.market/RDS-admin" target="_blank"
                                    class="btn bg-gradient btn-secondary"><i
                                        class="ri-shopping-cart-2-line align-middle me-1"></i> اطلب الان</a>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>


            <section class="section" id="boxwork">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h1 class="display-6 fw-semibold mb-3 lh-base">كيف يعمل صندوقنا الذكي؟
                                    {{-- <span class="text-secondary">RDS </span>Box --}}
                                </h1>
                                <p class="text-muted mb-4 ff-secondary">لاتشيل هم؛ ماعليك إلا تطلب، وازهل الباقي علينا!
                                </p>

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
                                    <p class="text-muted my-3 ff-secondary">بعد طلبك من الموقع وإرسال شحنتك لشركات التوصيل
                                        يستلم نظام ردس طلب التسليم، المربوط مع شركات الشحن فيستلمها المندوب ويوصلها مباشرة
                                        دون الحاجة للتواصل وطلب الموقع، ويسلم الشحنة بشكل ذاتي للصندوق الذي يُفتح عن طريق
                                        صلاحيات خاصة بنظام ردس المربوط بين
                                        العميل وشركة الشحن، ويغلق بشكل ذاتي من أجل الحماية والأمان لل ُشحن.</p>

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
                                    <p class="text-muted my-3 ff-secondary">صندوق ردس بوكس مواكب للذكاء الاصطناعي فهو
                                        الجندي
                                        الموثوق لاستلام وتسليم
                                        شحناتك، إنه خاص لك ومبرمج لخدمتك وتسريع عملية الاستلام والتسليم بسلامة، صندوقنا
                                        الذكي يخدم الافراد والشركات، ويستخدم في جميع أنواع السكن والمنازل.</p>
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
                                    <p class="text-muted my-3 ff-secondary">صندوق ردس بوكس مصمم بطريقة يتناسب استخدامه في
                                        جميع المساكن للأفراد
                                        والشركات(فلل، شقق، أمامكن عمل.....إل. </p>

                                </div>
                            </div>
                        </div>
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
                                    <p class="text-muted my-3 ff-secondary">نحن مميزون بخدمات مابعد البيع؛ فريق ردس يقومون
                                        بتركيب الصندوق في المكان المطلوب
                                        ومتاحين للمتابعة والصيانة بشكل دائم، وهم على اتم الاستعداد للرد علىكل الاستفسارات
                                        والتساؤلات. </p>

                                </div>
                            </div>
                        </div>
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
                                    <p class="text-muted my-3 ff-secondary"> نظام ردس هو الحل لمشاكل التوصيل واستلام
                                        الشحنات</p>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>


            <section class="section" id="boxbox">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h3 class="mb-3 fw-semibold">طريقة عملنا</h3>
                                <p class="text-muted mb-4 ff-secondary">اكتشف بساطة وكفاءة نظام طلباتنا. في ثلاث خطوات
                                    واضحة، انطلق في رحلة سلسة من الاختيار إلى التوصيل مع ردس بوكس.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row text-center">

                        <div class="col-lg-4">
                            <div class="process-card mt-4">
                                <div class="avatar-sm icon-effect mx-auto mb-4">
                                    <div class="avatar-title bg-transparent text-success rounded-circle h1">
                                        <i class="ri-book-mark-line"></i>
                                    </div>
                                </div>

                                <h5>التوصيل</h5>
                                <p class="text-muted ff-secondary">الخطوة النهائية تشمل توصيل صندوق ردس بكفاءة إلى العميل.
                                    يتم التركيز على التوصيل الآمن والموثوق به في الوقت المحدد، لضمان وصول المنتج إلى العميل
                                    في حالة مثالية وضمن الإطار الزمني الموعود.</p>
                            </div>
                        </div>
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

                                <h5>إتمام العملية:</h5>
                                <p class="text-muted ff-secondary">بمجرد إتمام الشراء، يتم توجيه العملاء خلال الخطوات
                                    اللازمة لإكمال العملية. قد يشمل ذلك تعبئة تفاصيل التوصيل، اختيار خيارات التوصيل، أو
                                    تأكيد تفاصيل الطلب لضمان الدقة ورضا العملاء.</p>
                            </div>
                        </div>

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

                                <h5>اختر صندوق واشترِ</h5>
                                <p class="text-muted ff-secondary">في هذه الخطوة، يُعرض على العملاء خيارات متعددة لاختيار
                                    صندوق ردس المطلوب. يتم تصميم عملية الاختيار لتكون سهلة الاستخدام، مما يتيح للعملاء
                                    الاختيار بناءً على احتياجاتهم الخاصة. بعد الاختيار، يتابع العملاء عملية الشراء من خلال
                                    عملية معاملة آمنة وسهلة.</p>
                            </div>
                        </div>
                        <!-- end col -->

                        <!-- end col -->

                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>

            <!-- start faqs -->
            <section class="section" id="faqs">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h3 class="mb-3 fw-semibold">الأسئلة الشائعة</h3>
                                <p class="text-muted mb-4 ff-secondary">إذا لم تتمكن من العثور على إجابة على سؤالك في
                                    الأسئلة الشائعة لدينا، يمكنك دائمًا الاتصال بنا أو إرسال بريد إلكتروني لنا. سنقوم بالرد
                                    عليك في أقرب وقت ممكن!</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row g-lg-5 g-4">
                        <div class="col-lg-6">
                            <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box"
                                id="genques-accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="genques-headingOne">
                                        <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                            data-bs-target="#genques-collapseOne" aria-expanded="false"
                                            aria-controls="genques-collapseOne">
                                            كيف أطلب من الموقع؟? </button>
                                    </h2>
                                    <div id="genques-collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="genques-headingOne" data-bs-parent="#genques-accordion">
                                        <div class="accordion-body ff-secondary">
                                            أيقونة الطلب تنقل العميل لصفحة المتجر لطلب الصندوق، أما انظمام مواقع البيع
                                            والتوصيل عن طريق الأيقونة الخاصة بهم بخطوات سهلة ويسيرة.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="genques-headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#genques-collapseTwo"
                                            aria-expanded="false" aria-controls="genques-collapseTwo">
                                            كيف طريقة الدفع؟
                                        </button>
                                    </h2>
                                    <div id="genques-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="genques-headingTwo" data-bs-parent="#genques-accordion">
                                        <div class="accordion-body ff-secondary">
                                            نوفر جميع طرق الدفع.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="genques-headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#genques-collapseThree"
                                            aria-expanded="false" aria-controls="genques-collapseThree">
                                            كيف طريقة تجديد الاشتراك بخدمات الصندوق؟
                                        </button>
                                    </h2>
                                    <div id="genques-collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="genques-headingThree" data-bs-parent="#genques-accordion">
                                        <div class="accordion-body ff-secondary">
                                            تجديد الاشتراك بالتطبيق الخاص بالنظام بخطوات سهلة ويسيرة.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="genques-headingFour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#genques-collapseFour"
                                            aria-expanded="false" aria-controls="genques-collapseFour">
                                            كيف طريقة نقل الصندوق؟
                                        </button>
                                    </h2>
                                    <div id="genques-collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="genques-headingFour" data-bs-parent="#genques-accordion">
                                        <div class="accordion-body ff-secondary">
                                            فريق خاص يوصل الصندوق ويثبته لكم.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end accordion-->

                        </div>
                        <!-- end col -->
                        <div class="col-lg-6">
                            <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box"
                                id="privacy-accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="privacy-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#privacy-collapseOne"
                                            aria-expanded="false" aria-controls="privacy-collapseOne">
                                            طريقة الاستبدال والترجيع؟
                                        </button>
                                    </h2>
                                    <div id="privacy-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="privacy-headingOne" data-bs-parent="#privacy-accordion">
                                        <div class="accordion-body ff-secondary">
                                            لدينا خدمة الاستبدال والترجيع لمدة معينة بعد استلام الصندوق، وذلك عن طريق
                                            التواصل مع أرقام خدمة العملاء.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="privacy-headingTwo">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#privacy-collapseTwo" aria-expanded="false"
                                            aria-controls="privacy-collapseTwo">
                                            طريقة صيانة الصدوق؟
                                        </button>
                                    </h2>
                                    <div id="privacy-collapseTwo" class="accordion-collapse collapse show"
                                        aria-labelledby="privacy-headingTwo" data-bs-parent="#privacy-accordion">
                                        <div class="accordion-body ff-secondary">
                                            فريق ردس متاحين للمتابعة والصيانة بشكل دائم.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="privacy-headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#privacy-collapseThree"
                                            aria-expanded="false" aria-controls="privacy-collapseThree">
                                            سرية معلومات العميل؟
                                        </button>
                                    </h2>
                                    <div id="privacy-collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="privacy-headingThree" data-bs-parent="#privacy-accordion">
                                        <div class="accordion-body ff-secondary">
                                            البرنامج محمي بنظام آمان عالي من قبل المتخصصين.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="privacy-headingFour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#privacy-collapseFour"
                                            aria-expanded="false" aria-controls="privacy-collapseFour">
                                            مدة وصول الصندوق للعميل؟
                                        </button>
                                    </h2>
                                    <div id="privacy-collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="privacy-headingFour" data-bs-parent="#privacy-accordion">
                                        <div class="accordion-body ff-secondary">
                                            من أول طلب الصندوق يتم العمل على خدمتكم بشكل مباشر.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="privacy-headingFour">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#privacy-collapseFour"
                                            aria-expanded="false" aria-controls="privacy-collapseFour">
                                            الضمان على الصندوق؟
                                        </button>
                                    </h2>
                                    <div id="privacy-collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="privacy-headingFour" data-bs-parent="#privacy-accordion">
                                        <div class="accordion-body ff-secondary">
                                            نحن نتميز بخدمات مابعد البيع ونضمن لكم جودة ردس بوكس.
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

            <!-- start contact -->
            <section class="section" id="contactus">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="text-center mb-5">
                                <h3 class="mb-3 fw-semibold">تواصل معنا</h3>
                                <p class="text-muted mb-4 ff-secondary">نزدهر عندما نأتي بأفكار مبتكرة ولكننا نفهم أيضًا أن
                                    الفكرة
                                    الذكية يجب أن تدعم بنتائج قابلة للقياس.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row gy-4">
                        <div class="col-lg-4">
                            <div>
                                <div class="mt-4">
                                    <h5 class="fs-13 text-muted text-uppercase">عنوان المكتب 1:</h5>
                                    <div class="ff-secondary fw-semibold">4461 شارع سيدار، مورو، <br />أركنساس 72368</div>
                                </div>
                                <div class="mt-4">
                                    <h5 class="fs-13 text-muted text-uppercase">عنوان المكتب 2:</h5>
                                    <div class="ff-secondary fw-semibold">2467 شارع سويك هيل، <br />نيو أورليانز، لويزيانا
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h5 class="fs-13 text-muted text-uppercase">ساعات العمل:</h5>
                                    <div class="ff-secondary fw-semibold">9:00 صباحًا إلى 6:00 مساءً</div>
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
                                                <label for="name" class="form-label fs-13">الاسم</label>
                                                <input name="name" id="name" type="text"
                                                    class="form-control bg-light border-light" placeholder="اسمك*">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <label for="email" class="form-label fs-13">البريد الإلكتروني</label>
                                                <input name="email" id="email" type="email"
                                                    class="form-control bg-light border-light"
                                                    placeholder="بريدك الإلكتروني*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-4">
                                                <label for="subject" class="form-label fs-13">الموضوع</label>
                                                <input type="text" class="form-control bg-light border-light"
                                                    id="subject" name="subject" placeholder="موضوعك.." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="comments" class="form-label fs-13">الرسالة</label>
                                                <textarea name="comments" id="comments" rows="3" class="form-control bg-light border-light"
                                                    placeholder="رسالتك..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 text-end">
                                            <input type="submit" id="submit" name="send"
                                                class="submitBnt btn btn-primary" value="إرسال الرسالة">
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

            <section class="py-5 bg-primary position-relative">
                <div class="bg-overlay bg-overlay-pattern opacity-50"></div>
                <div class="container">
                    <div class="row align-items-center gy-4">
                        <div class="col-sm">
                            <div>
                                <h4 class="text-white mb-0 fw-semibold">
                                    نراهن على ارتفاع نسبة عمليات التوصيل الناجحة في وقت قياسي
                                    وزيادة الطلبات لسلعكم ومنتجاتكم؛
                                    سارعوا بالاشتراك
                                    معنا.
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-auto">
                            <div>
                                <a href="https://1.envato.market/RDS-admin" target="_blank"
                                    class="btn bg-gradient btn-secondary"><i
                                        class="ri-shopping-cart-2-line align-middle me-1"></i> اشترك الان</a>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>

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
                                        CMS, Project management apps, Admin Panels, etc using ردس .</p>
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
                                    </script>ردس
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
