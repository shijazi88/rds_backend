@extends('layouts.master-front')

@section('title', 'Home Page')

@section('addon_css')

@endsection
@section('content')
    <!-- Page header Start -->
    <div class="page-header parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- Page Header box Start -->
                    <div class="page-header-box">
                        <h2 class="text-anime-style-3">{{ __('contact_us.page_title') }}</h2>
                        <nav class="wow fadeInUp" data-wow-delay="0.25s">
                            <ol class="breadcrumb">
                                <li><a href="#">{{ __('contact_us.home') }}</a></li>
                                <li>{{ __('contact_us.page_title') }}</li>
                            </ol>
                        </nav>                                
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Get In Touch Section Start -->
    <div class="get-in-touch">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!-- Get Quote Start -->
                    <div class="get-quote">
                        <h2 class="text-anime-style-3">{{ __('contact_us.drop_us_a_line') }}</h2>
                        <div class="get-quote-content">
                            <p class="wow fadeInUp" data-wow-delay="0.5s">{{ __('contact_us.form_instructions') }}</p>
                        </div>
                        <div class="get-quote-form wow fadeInUp" data-wow-delay="0.75s">
                        <form id="contactCompanyForm" action="" method="post" data-toggle="validator">
                            @csrf 
                            <div class="row">
                                <div class="form-group col-md-12 mb-3">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('contact_us.company_placeholder_name') }}" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('contact_us.placeholder_email') }}" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="{{ __('contact_us.placeholder_phone') }}" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="{{ __('contact_us.placeholder_quantity') }}" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn-default">{{ __('contact_us.submit_button') }}</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                </div>
                            </div>
                        </form>

                        </div>
                    </div>
                    <!-- Get Quote End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Get In Touch Section End -->
@endsection

@section('addon_js')
<script></script>
@endsection
