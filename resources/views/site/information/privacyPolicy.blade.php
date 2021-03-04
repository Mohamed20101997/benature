@extends('layouts.app')
@section('content')

    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/site/css/privacy-policy.css')}}">
    @endpush

    @include('dashboard.includes.alerts.success')
    @include('dashboard.includes.alerts.errors')


    <!--privacy policy-->
    <section class="privacy-policy mt-5 pt-4">
        <div class="container">
            <h3 class="text-center"><i class="far fa-check-circle"></i>Privacy Policy</h3>
            <h4 class="text-center">WHO WE ARE</h4>
            <p class="text-center w-75 mr-auto ml-auto">
                We are Benatur Limited , “we”, “our” and “us”) and we are the company that collects your personal data and controls how it will be used (the “data controller”).
            </p>
            <h4>SCOPE OF THIS POLICY</h4>
            <p>
                We We are committed to respecting your privacy and protecting the personal data you share with us and that we collect about you. This policy tells you about how we use the personal data we collect about you when you use our website and app. It also provides
                more information about your privacy rights and how the law protects you.
            </p>
            <h4>HOW DO WE COLLECT YOUR PERSONAL DATA, WHAT DO WE COLLECT AND WHAT DO WE DO WITH IT?</h4>
            <p>
                We have set out below the personal data we may collect from you during your use of our website and app and how this is used by Benatur How and what personal data do we collect?
            </p>
            <h4>MARKETING</h4>
            <p>
                Where you have made a purchase from our website or app we want to make sure that you are kept up to date with all the latest products, events and offers available on our website and app so will send you messages by email and/or SMS unless you tell us
                that you do not want to continue receiving these messages by “opting out” or contacting us at unsubscribe@benatur.com.
            </p>
            <p>
                Where we are relying on consent to sending you marketing communications, you can withdraw your consent at any time by following the opt-out link in any messages we send to you. Please note that if you opt-out of receiving messages relating to any loyalty
                scheme, you may miss out on exclusive offers and events.
            </p>
            <h4>SHARING OF PERSONAL DATA</h4>
            <p>
                SHARING OF PERSONAL DATA We do not sell your personal data to any third parties. We may share your personal data with our carefully selected third party service providers who help us provide our services to you, including:
            </p>
            <h5 class="mb-5">
                <div class="row">
                    <div class="col-6 pl-0 pr-0">
                        <p>Our logistics/warehouse service provider.</p>
                    </div>
                    <div class="col-6 pl-0 pr-0">
                        <p>Our couriers and similar delivery companies.</p>
                    </div>
                    <div class="col-6 pl-0 pr-0">
                        <p>Our payment providers.</p>
                    </div>
                    <div class="col-6 pl-0 pr-0">
                        <p>Our professional partners, including our marketing agencies and website hosts.</p>
                    </div>
                    <div class="col-6 pl-0 pr-0">
                        <p>Our customer service providers.</p>
                    </div>
                    <div class="col-6 pl-0 pr-0">
                        <p>Our analytics providers.</p>
                    </div>
                    <div class="col-12 pl-0 pr-0 ">
                        <p class="justify-content-center">Our IT and technical service providers.</p>
                    </div>
                </div>
            </h5>
            <p>In certain circumstances we may also need to share your personal data with our legal advisers, bankers, auditors and insurers and our regulators.
            </p>
            <p>
                We require all third parties to respect the security of your personal data and to treat it in accordance with the law. We do not allow our third party service providers to use your personal data for their own purposes and only permit them to use your
                personal data for specified purposes and in accordance with our instructions.
            </p>
        </div>
    </section>



@endsection
