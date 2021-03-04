@extends('layouts.app')
@section('content')

    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/site/css/about.css')}}">
    @endpush

    @include('dashboard.includes.alerts.success')
    @include('dashboard.includes.alerts.errors')


    <!--about-->
    <section class="about mt-5 pt-3 text-center">
        <div class="container ">
            <h3><i class="fas fa-address-card"></i>About Us </h3>
            <p class="w-75 mr-auto ml-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis distinctio aperiam incidunt ducimus molestiae ut exercitationem beatae, ab nihil accusantium aut, consequuntur non soluta placeat facere accusamus tempore ipsam! Fugiat.</p>
            <div class="row w-75 mr-auto ml-auto mt-5 pt-2 numbers">
                <div class="col-md-4 mb-3">
                    <h5>24K</h5>
                    <p>Products available</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>80%</h5>
                    <p>Clients come back</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>+15M</h5>
                    <p>Site members</p>
                </div>
            </div>
        </div>
    </section>
    <!--store events-->
    <section class="events mt-5 pt-3">
        <div class="container">
            <h3 class="text-center mb-4">store events</h3>
            <div class="row text-center">
                <div class="col-md-4 mb-3">
                    <i class="fas fa-search"></i>
                    <h5>FOR CONVENIENCE OF CHOICE</h5>
                    <p>We think about the convenience of your choice. Our products are supplied with star rating that should help hesitant buyers to take a decision. What’s more, you can search our site if you know exactly what you are looking for or use
                        a bunch of different filters that will considerably save your time and efforts.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <i class="fas fa-truck"></i>
                    <h5>DELIVERY TO ALL REGIONS</h5>
                    <p>We deliver our goods worldwide. No matter where you live, your order will be shipped in time and delivered right to your door or to any other location you have stated. The packages are handled with utmost care, so the ordered products
                        will be handed to you safe and sound, just like you expect them to be.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <i class="fas fa-thumbs-up"></i>
                    <h5>THE HIGHEST QUALITY OF PRODUCTS</h5>
                    <p>We guarantee the highest quality of the products we sell. Several decades of successful operation and millions of happy customers let us feel certain about that. Besides, all items we sell pass thorough quality control, so no characteristics
                        mismatch can escape the eye of our professionals.</p>
                </div>

            </div>
        </div>
    </section>




@endsection
