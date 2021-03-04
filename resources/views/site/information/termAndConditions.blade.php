@extends('layouts.app')
@section('content')

    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/site/css/termsAndConditions.css')}}">
    @endpush

    @include('dashboard.includes.alerts.success')
    @include('dashboard.includes.alerts.errors')

    <!--terms and conditions-->
    <section class="termsAndConditions mt-5 pt-3">
        <div class="container">
            <h3 class="text-center"><i class="fas fa-file-invoice"></i>terms and conditions</h3>
            <p class="w-75 mr-auto ml-auto text-center">The moment you complete your purchase, your delivery will be processed. We will you send you a confirmation email to the email address you have provided, which includes the goods you have ordered and their cost.</p>
            <h5>your order</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt sequi exercitationem odit. Non facere voluptatum autem vitae soluta in, ab magni sequi. Natus recusandae harum consectetur! Enim dignissimos ea magni.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi pariatur inventore quod iusto sequi impedit, officiis quaerat, tempore mollitia, neque nesciunt? Itaque, quam. Culpa assumenda nulla amet blanditiis autem distinctio?</p>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates expedita consequatur ipsam optio maiores ab sint, distinctio reiciendis illo iste esse culpa voluptatem autem eos non saepe ut consequuntur cupiditate! Lorem ipsum dolor
                sit amet consectetur adipisicing elit. Quo sequi voluptates eos natus magni nemo, ea illum iusto aperiam ipsam, possimus accusantium ut tenetur distinctio! Molestiae nostrum ab optio minima. Lorem ipsum dolor sit amet consectetur adipisicing
                elit. Quae est natus ab assumenda quis modi, quaerat ipsa libero dignissimos beatae molestias rerum, dolores voluptatum! Similique cupiditate maiores quaerat hic repellendus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui
                accusantium officiis libero. Accusantium, impedit. Esse sunt voluptas possimus repudiandae quasi blanditiis quas autem provident commodi ex alias, quibusdam beatae tempora! </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt sequi exercitationem odit. Non facere voluptatum autem vitae soluta in, ab magni sequi. Natus recusandae harum consectetur! Enim dignissimos ea magni.</p>
            <h5>Delivery / collection</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt sequi exercitationem odit. Non facere voluptatum autem vitae soluta in, ab magni sequi. Natus recusandae harum consectetur! Enim dignissimos ea magni.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi pariatur inventore quod iusto sequi impedit, officiis quaerat, tempore mollitia, neque nesciunt? Itaque, quam. Culpa assumenda nulla amet blanditiis autem distinctio?</p>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptates expedita consequatur ipsam optio maiores ab sint, distinctio reiciendis illo iste esse culpa voluptatem autem eos non saepe ut consequuntur cupiditate!</p>
            <h5>Promotional offers</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore maiores commodi id temporibus quam, eveniet debitis asperiores quibusdam nam fugiat. Quas sapiente obcaecati dolore! Sunt ab quod quasi veniam magni?</p>
        </div>
    </section>

@endsection
