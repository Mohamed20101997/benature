<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="discription" content=" this is a form made by Amany Samir">
    <title></title>
    <link rel="stylesheet" href=" {{ asset('assets/site/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/site/css/all.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href=" {{ asset('assets/site/css/text.css')}}">

    @yield('style')
</head>

<body class="position-relative">
    <!--popups and fixed elements.....................-->
    <div class="bottom-cart">
        <a><i class="fas fa-shopping-cart"></i><span>3 </span></a>
    </div>
    <div class="bottom-cart-details p-3">
        <div class="row ml-0 mr-0">
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="row ml-0 mr-0">
                    <div class="col-5 p-0">
                        <div class="img-container">
                            <img src=" {{ asset('assets/site/imgs/product.jpg') }}" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-7">
                        <p class="name">Lorem ipsum, dolor sit amet consectetur consectetur</p>
                        <p class="price">$25</p>
                        <div class="quantity d-flex justify-content-start">
                            <p class="down">-</p> <input class="quantity-inp" value="1" type="text">
                            <p class="up">+</p>
                            <p class="d-flex align-items-center justify-content-center ml-2"><i class="fas fa-trash-alt"></i></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 d-md-block d-none">
                <div class="row ml-0 mr-0">
                    <div class="col-5 p-0">
                        <div class="img-container">
                            <img src=" {{ asset('assets/site/imgs/product.jpg') }}" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-7">
                        <p class="name">Lorem ipsum, dolor sit amet consectetur consectetur</p>
                        <p class="price">$25</p>
                        <div class="quantity d-flex justify-content-start">
                            <p class="down">-</p> <input class="quantity-inp" value="1" type="text">
                            <p class="up">+</p>
                            <p class="d-flex align-items-center justify-content-center ml-2"><i class="fas fa-trash-alt"></i></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-lg-block d-none">
                <div class="row ml-0 mr-0">
                    <div class="col-5 p-0">
                        <div class="img-container">
                            <img src=" {{ asset('assets/site/imgs/product.jpg') }}" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-7">
                        <p class="name">Lorem ipsum, dolor sit amet consectetur consectetur</p>
                        <p class="price">$25</p>
                        <div class="quantity d-flex justify-content-start">
                            <p class="down">-</p> <input class="quantity-inp" value="1" type="text">
                            <p class="up">+</p>
                            <p class="d-flex align-items-center justify-content-center ml-2"><i class="fas fa-trash-alt"></i></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md col-sm col">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>10 items</td>
                            <td>$125</td>
                        </tr>
                        <tr>
                            <td>shipping</td>
                            <td>$125</td>
                        </tr>
                        <tr>
                            <td>total</td>
                            <td>$125</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md col-sm col p-0">
                <a class="btn btn-outline text4" href="checkout.html" role="button">check out</a>
                <a class="btn btn-outline text4" href="shoppingcart.html" role="button">Shopping Cart</a>
            </div>
        </div>
    </div>
    <div class="up-down-btn">
        <button type="button" class="btn btn-outline "><i class="fas fa-angle-double-up"></i></button>
    </div>
    <div class="show-product">
        <div class="container h-100">
            <div class="prod-info h-100 d-flex align-items-center justify-content-center">
                <div class="position-absolute cart">
                    <div class="cart-content">
                        <div class="cart-head d-flex align-items-center">
                            <i class="fas fa-check"></i>
                            <h3>product successfully added to your shopping cart </h3>
                            <i class="fas fa-times ml-auto"></i>
                        </div>
                        <div class="row ml-0 mr-0 cart-body">
                            <div class="col-md-4 pr-0 pl-0 d-flex align-items-center">
                                <div class="img-container">
                                    <img src=" {{ asset('assets/site/imgs/prod-detail.jpg') }}" class="img-fluid" />
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-items-center pr-0 ">
                                <div>
                                    <h4 class="name">Lorem ipsum, dolor sit amet consectet</h4>
                                    <p class="brand"> brand : benatur</p>
                                    <p class="price">$32</p>
                                    <p class="code">code : 123fde</p>
                                </div>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <div class="cart-details">
                                    <p>there are 4 items in cart</p>
                                    <p>total price : $3256</p>
                                    <p>total shipping : $3</p>
                                    <p>taxes : 00</p>
                                    <p>total : $3259</p>
                                    <a class="btn btn-outline text4" href="checkout.html" role="button">check out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//////////////////////////////////////////////-->


    <!--start nav-->
    <nav class="uppernav d-flex">
        <div class="logo">
            <img src=" {{ asset('assets/site/imgs/navlogo.PNG') }}" class="img-fluid" />
        </div>
        <div class="whishlist-account d-flex align-items-center">
            <div class="whish">
                <i class="fas fa-heart"></i>
                <a href="wishlist.html"> wish list</a>
            </div>
            @auth
                <div class="account">
                    <i class="fas fa-user"></i> account
                    <div class="accountdropdown">
                        <ul class="list-unstyled mb-0">

                            <li>
                                <a href="account-info.html">
                                    <i class="fas fa-info"></i> account info
                                </a>
                            </li>
                            <li>
                                <a href="password.html">
                                    <i class="fas fa-key"></i> password
                                </a>
                            </li>
                            <li>
                                <a href="order-history.html">
                                    <i class="fas fa-history"></i> order history
                                </a>
                            </li>
                            <li>
                                <a href=" profile.html">
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
                            <li class="nav-item active">
                                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="products.html">Products</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Information
                            </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user-friends"></i> B2B wholesale shop
                                    </a>
                                    <a class="dropdown-item" href="about.html">
                                        <i class="fas fa-address-card"></i> About us
                                    </a>
                                    <a class="dropdown-item" href="delivery.html">
                                        <i class="fas fa-info-circle"></i> delivery information
                                    </a>
                                    <a class="dropdown-item" href="privacy-policy.html">
                                        <i class="far fa-check-circle"></i> privacy policy
                                    </a>
                                    <a class="dropdown-item" href="termsAndCondition.html">
                                        <i class="fas fa-file-invoice"></i> term and conditions
                                    </a>

                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-language"></i> <span>Country</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        Egypt
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        Amman
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        Saudi
                                    </a>

                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-6 col d-flex justify-content-end align-items-center p-0">
                <div class="cart">
                    <a href="shoppingcart.html"><i class="fas fa-shopping-cart"></i></a>
                    <span>$355.2</span>
                </div>
                <div class="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline" type="button" id="button-addon2"><i
                                class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--end nav-->


@yield('content')

<!--start footer -->
<footer class="mt-5 pt-5 pb-5">
    <div class="container">
        <h4 class="text-center">Let's Keep In Touch </h4>
        <div class="row">
            <div class="col-sm-6 animate__animated animate__backInLeft animate__slower">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Full Name</label>
                        <input type="text" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Massage</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write Your Message"></textarea>
                    </div>
                </form>
                <button type="button" class="btn btn-outline text4">Send</button>
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
                    </p>

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
<script src=" {{ asset('assets/site/js/popper.js') }}"></script>
<script src=" {{ asset('assets/site/js/bootstrap.min.js') }}"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src=" {{ asset('assets/site/js/main.js') }}"></script>
<script src=" {{ asset('assets/site/js/text.js') }}"></script>
@yield('script')
</body>

</html>


