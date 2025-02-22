<!DOCTYPE html>
<html>

<head dir="ltr">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="discription" content=" this is a form made by Amany Samir">
    <title></title>
    <link rel="stylesheet" href=" {{ asset('assets/site/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/site/css/all.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- easy auto complete -->
    <link rel="stylesheet" href="{{ asset('assets/easyautocomplete/easy-autocomplete.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/site/css/text.css')}}">

    {{-- noty --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/plugins/noty/noty.css') }}">
  <script src="{{ asset('assets/admin/css/plugins/noty/noty.min.js') }}"></script>


  <style>

    .fw-900{
        font-weight: 900;
        color: #f00;
    }

    .hidden{
        display: none;
    }

    .show{
        display: inline ;
    }

</style>


    @stack('style')
</head>

<body class="position-relative">
    <!--popups and fixed elements.....................-->
{{--    <div class="bottom-cart">--}}
{{--        <a><i class="fas fa-shopping-cart"></i><span>3 </span></a>--}}
{{--    </div>--}}
{{--    <div class="bottom-cart-details p-3">--}}
{{--        <div class="row ml-0 mr-0">--}}
{{--            <div class="col-lg-3 col-md-4 col-sm-6 col-6">--}}
{{--                <div class="row ml-0 mr-0">--}}
{{--                    <div class="col-5 p-0">--}}
{{--                        <div class="img-container">--}}
{{--                            <img src="imgs/product.jpg" class="img-fluid" />--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-7">--}}
{{--                        <p class="name">Lorem ipsum, dolor sit amet consectetur consectetur</p>--}}
{{--                        <p class="price">$25</p>--}}
{{--                        <div class="quantity d-flex justify-content-start">--}}
{{--                            <p class="down">-</p> <input class="quantity-inp" value="1" type="text">--}}
{{--                            <p class="up">+</p>--}}
{{--                            <p class="d-flex align-items-center justify-content-center ml-2"><i class="fas fa-trash-alt"></i></p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-2 col-md col-sm col">--}}
{{--                <table class="table table-hover">--}}
{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td>10 items</td>--}}
{{--                        <td>$125</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>shipping</td>--}}
{{--                        <td>$125</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>total</td>--}}
{{--                        <td>$125</td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--            <div class="col-md col-sm col p-0">--}}
{{--                <a class="btn btn-outline text4" href="checkout.html" role="button">check out</a>--}}
{{--                <a class="btn btn-outline text4" href="shoppingcart.html" role="button">Shopping Cart</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}




    <div class="up-down-btn">
        <button type="button" class="btn btn-outline "><i class="fas fa-angle-double-up"></i></button>
    </div>

    <!--start nav-->
    <nav class="uppernav d-flex">
        <div class="logo">
            <img src=" {{ asset('assets/site/imgs/navlogo.PNG') }}" class="img-fluid" />
        </div>
        <div class="whishlist-account d-flex align-items-center">
            @auth
                <div class="whish">
                <a href="{{ url('getFavorite') }}">
                    <i class="fas fa-heart"></i>
                        wish list
                    </a>
                </div>
            @else
                <div class="whish">
                <a href="{{ url('login') }}">
                    <i class="fas fa-heart"></i>
                        wish list
                    </a>
                </div>
            @endauth
            @auth
                <div class="account">
                    <i class="fas fa-user"></i> account
                    <div class="accountdropdown">
                        <ul class="list-unstyled mb-0">

                            <li>
                                    <a href="{{url('account')}}">
                                    <i class="fas fa-info"></i> account info
                                </a>
                            </li>
                            <li>
                                <a href="{{url('password')}}">
                                    <i class="fas fa-key"></i> password
                                </a>
                            </li>
                            <li>
                                <a href="{{route('orderHistory')}}">
                                    <i class="fas fa-history"></i> order history
                                </a>
                            </li>
                            <li>
                                <a href="{{url('profile')}}">
                                    <i class="fas fa-user"></i> profile
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            @else
            <div class="whish">
                <a href="{{url('login')}}"> <i class="fas fa-sign-in-alt"></i> Login</a>
            </div>
            @endauth
        </div>
    </nav>

    <nav class="secdnav">
        <div class="row mr-0 ml-0">
            <div class="col-md-6 col d-flex align-items-center p-0">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item {{\Request::route()->getName() == '' ? 'active' : ''}}">
                                <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item {{\Request::route()->getName() == 'products' ? 'active' : ''}}">
                                <a class="nav-link" href="{{url('products')}}">Products</a>
                            </li>
                            <li class="nav-item dropdown {{\Request::route()->getName() == 'information.*' ? 'active' : ''}}">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Information
                            </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user-friends"></i> B2B wholesale shop
                                    </a>
                                    <a class="dropdown-item" href="{{route('about-us')}}">
                                        <i class="fas fa-address-card"></i> About us
                                    </a>
                                    <a class="dropdown-item" href="{{route('delivery-information')}}">
                                        <i class="fas fa-info-circle"></i> delivery information
                                    </a>
                                    <a class="dropdown-item" href="{{route('privacy-policy')}}">
                                        <i class="far fa-check-circle"></i> privacy policy
                                    </a>
                                    <a class="dropdown-item" href="{{route('term-and-conditions')}}">
                                        <i class="fas fa-file-invoice"></i> term and conditions
                                    </a>

                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-language"></i> <span>Country</span>
                                </a>
                                @php
                                    $countries = \App\Models\Country::get();
                                @endphp

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach($countries as $country)
                                            @if($country->products->count() > 0)
                                                <a class="dropdown-item" href="{{url('country/' .  $country->name .'/' . $country->id)}}">
                                                    {{$country->name}}
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-6 col d-flex justify-content-end align-items-center p-0">
                <div class="cart">
                    <a href="{{route('site.cart.index')}}"><i class="fas fa-shopping-cart"></i></a>
                    <span class="item_coutn">{{ $basket->itemCount() > 0 ? $basket->itemCount() : 0 }} </span>
                </div>

                <form action=" form-group">
                    <div class="search">
                        <div class="input-group">
                            <input type="search" class="form-control" name="search" placeholder="Search by name or description or price" aria-label="Recipient's username"  aria-describedby="button-addon2">
                            <button class="btn btn-outline" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <!--end nav-->


@yield('content')

<!--start footer -->
<footer class="mt-5 pt-5 pb-5">
    <div class="container">
        <h4 class="text-center">Let's Keep In Touch </h4>
            @include('dashboard.includes.alerts.success')
            @include('dashboard.includes.alerts.errors')
        <div class="row">
            <div class="col-sm-6 animate__animated animate__backInLeft animate__slower">
                <form  id="myForm">
                    <input type ='reset' id ='resetform' style="display: none" />
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Full Name</label>
                        <input type="text" id="name" class="form-control" required name="name" value="{{ old('name') }}" placeholder="Your Name">
                        <span id="nameError" class="alert-message text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" id="email" class="form-control" value="{{ old('email') }}" required name="email" placeholder="Your Email">
                        <span id="emailError" class="alert-message  text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Message</label>
                        <textarea class="form-control" id="message" name="message" required id="exampleFormControlTextarea1" rows="3" placeholder="Write Your Message">{{ old('message') }}</textarea>
                        <span id="messageError" class="alert-message  text-danger"></span>
                    </div>
                    <button  id="ajaxSubmit" class="btn btn-outline text4">Send</button>
                </form>
            </div>
            <div class="col-sm-6 animate__animated animate__backInRight animate__slower">
                <div>
                    <h5 class="d-flex align-items-center">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>10th of Ramadan Cairo, Egypt</p>
                    </h5>
                    <h5 class="d-flex align-items-center"><i class="fas fa-envelope"></i>
                        <p>info@be-natur.com</p>
                    </h5>
                    <h5 class="d-flex align-items-center"><i class="fas fa-phone-alt"></i>
                        <p>+20 1011316207 - +20 1011316207</p>
                    </h5>
                    <h5 class="d-flex align-items-center"><i class="fab fa-facebook-f"></i>
                        <p><a href="https://www.facebook.com/benatur.eg/">BeNatur </a></p>
                    </h5>

                </div>
            </div>
        </div>
    </div>
</footer>
<!--end footer -->
<section class="copyright">
    <div class="d-flex justify-content-center p-2" data-wow-duration="0.5s">
        Copy Right &copy; 2020 benatur - All Rights Reserved
    </div>
</section>
<!--/////////////////////////////////////-->
<script src=" {{ asset('assets/site/js/jquery.js') }}"></script>
<script src=" {{ asset('assets/site/js/jquery-ui.min.js') }}"></script>
<script src=" {{ asset('assets/site/js/popper.js') }}"></script>
<script src=" {{ asset('assets/site/js/bootstrap.min.js') }}"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src=" {{ asset('assets/site/js/main.js') }}"></script>
<script src="{{ asset('assets/easyautocomplete/jquery.easy-autocomplete.min.js') }}"></script>

  <script src=" {{ asset('assets/site/js/text.js') }}"></script>
  <script src=" {{ asset('assets/site/js/favorite.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var options = {

        url: function(search) {

		return "/products?search=" + search;
	},
	getValue: "name",

    template: {
		type: "iconLeft",
		fields: {
			iconSrc: "image_path"
		}
	},
    list:{
        onChooseEvent: function() {
            var product = $('.form-control[type="search"]').getSelectedItemData();
            var url = window.location.origin + '/product/' + product.id + '/' +product.slug;
            window.location.replace(url) ;
		}
    }
    };
    $('.form-control[type="search"]').easyAutocomplete(options);
</script>

<script>
     jQuery(document).ready(function(){

        $('#ajaxSubmit').on('click', function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var data = $('#myForm').serialize()
        $.ajax({
                url: "/message",
                type: 'POST',
                data: data,
                success: function(response){
                    $('#resetform').click();
                    $('#nameError').text('');
                    $('#emailError').text('');
                    $('#messageError').text('');
                    new Noty({
                    theme: 'relax',
                    type:'success',
                    layout: 'topRight',
                    text : "Message sent successfully",
                    timeout: 2000,
                    kiler: true
                }).show();

                },
                error: function(response){
                    $('#nameError').text('');
                    $('#emailError').text('');
                    $('#messageError').text('');

                    $('#nameError').text(response.responseJSON.errors.name);
                    $('#emailError').text(response.responseJSON.errors.email);
                    $('#messageError').text(response.responseJSON.errors.message);
                }
            });
        });
    });
</script>

<script>
     jQuery(document).ready(function(){

        $('.cart-addition').on('click', function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
                url: "{{route('site.cart.add')}}",
                type: 'POST',
                data: {
                    'product_id':$(this).attr('data-product-id'),
                    'product_slug':$(this).attr('data-product-slug'),
                },
                success: function(response){

                    $('.cart-'+response.product.id).addClass('hidden');

                   let hidden  = $('.go-cart-'+response.product.id).hasClass('hidden');
                    if(hidden){
                        $('.go-cart-'+response.product.id).removeClass('hidden')
                    }
                    new Noty({
                        theme: 'relax',
                        type:'success',
                        layout: 'topRight',
                        text : "add to cart successfully",
                        timeout: 2000,
                        kiler: true
                    }).show();

                    $('.item_coutn').text(response.basket);
                },

            });
        });
    });
</script>


@stack('script')
</body>

</html>


