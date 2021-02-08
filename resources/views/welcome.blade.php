@extends('layouts.app')
@section('content')

<!--start header............-->
<header class="header">
    <div class="container h-100">
        <div class="header-content h-100 d-flex align-items-center justify-content-end">
            <div>
                <h2>be natural with</h2>
                <h1>
                    <img src="{{ asset('assets/site/imgs/1.PNG') }}" class="img-fluid" /> benatur
                </h1>
                <p>beauty and skin care</p>
                <div class="social d-flex ">
                    <a href="#"> <i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fas fa-envelope"></i> </a>
                    <a href="#"> <i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>
<!--end header..............-->
<!--start beaty for you.....-->
<section class="beauty mt-5 position-relative">
    <div class="layout"></div>
    <div class="container text-center">
        <h3>beauty for you</h3>
    </div>
    <div class="togle text-center">
        <div class="site-menue">
            <p><i class="fas fa-chevron-up"></i></p>
            <p class="m-0">Site Menue</p>
        </div>
        <div class="product-page">
            <p><i class="fas fa-chevron-up"></i></p>
            <p class="m-0">product page</p>
        </div>
    </div>
    <div class="row ml-0 mr-0">
        <div class="col-lg-3 col-md-4 catg-map-links">

            <div class="row h-100">
                <div class="col-12 pr-0 site-menue-content d-md-block ">
                    <ul class="list-unstyled menue">
                        <li class="active d-flex align-items-center justify-content-between"><a href="#">home</a> <i class="fas fa-times x"></i></li>
                        <li><a href="#">product categories</a></li>
                        <li><a href="#new">new product</a></li>
                        <li><a href="#offer">offers</a></li>
                        <li><a href="#">packages</a></li>
                        <li><a href="#best">best seller</a></li>
                    </ul>
                </div>
                <div class="col-12 pr-0 cat-links product-page-content d-md-block">
                    <ul class="list-unstyled">
                        <li class="active head d-flex align-items-center justify-content-between"><a href="#">product page</a><i class="fas fa-times x"></i></li>
                        <li class="skincare">
                            <i class="fas fa-chevron-down"></i> skin care
                        </li>
                        <div class="dropdown-skincare">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="products.html">
                                            Cream & Gel
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Essence & Serum
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Eye & Lip Care
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Lotion & Emulsion
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Mask Sheet & Patch
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Massage & Pack
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Mist & Moisture
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Oil
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Other Goods
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Set Item
                                        </a>
                                </li>
                            </ul>
                        </div>
                        <li class="Cleansing">
                            <i class="fas fa-chevron-down"></i>cleansing
                        </li>
                        <div class="dropdown-cleansing">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">
                                            Cream & Lotion
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Foam & Toner
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Gel & Liquid
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Lip & Eye & Nail
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Oil
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Peeling & Scrub
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Soap & Powder
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Tissue
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Skin Toner
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Sun Care
                                        </a>
                                </li>
                            </ul>
                        </div>
                        <li class="body-hair">
                            <i class="fas fa-chevron-down"></i>BODY & HAIR
                        </li>
                        <div class="dropdown-body-hair">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">
                                            Body Care
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Body Cleansing
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Body Styling
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Hair Care
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Hair Cleansing
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Hair Remover
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Hair Styling
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Hand & Foot Care
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Perfume & Deodorant
                                        </a>
                                </li>
                            </ul>
                        </div>
                        <li class="tools">
                            <i class="fas fa-chevron-down"></i>tools
                        </li>
                        <div class="dropdown-tools">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">
                                            Body & Hair Tools
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Cleansing Tools
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Make up Brushes
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Make up Tools
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Pouch & Bottles
                                        </a>
                                </li>
                            </ul>
                        </div>
                        <li class="samples">
                            <i class="fas fa-chevron-down"></i>samples
                        </li>
                        <div class="dropdown-samples">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">
                                            Body & Hair
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Cleansing
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Skin Care
                                        </a>
                                </li>
                                <li>
                                    <a href="#">
                                            Special Offers
                                        </a>
                                </li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-7 col-12offset-1 category text-center">
            <div class="row">
                <div class="col-7 mb-4 p-2">
                    <img src=" {{ asset('assets/site/imgs/secend sec.jpg') }}" class="img-fluid" />
                    <p>Lorem ipsum dolor sit amet </p>
                    <button type="button" class="btn btn-outline text4">shop now</button>
                </div>
                <div class="col-5 mb- p-2">
                    <img src="{{ asset('assets/site/imgs/fff.jpg') }} " class="img-fluid" />
                    <p>Lorem ipsum dolor sit amet </p>
                    <button type="button" class="btn btn-outline text4">shop now</button>
                </div>
                <div class="col-5 mb-4">
                    <img src=" {{ asset('assets/site/imgs/secend sec2.jpg') }}" class="img-fluid" />
                    <p>Lorem ipsum dolor sit amet </p>
                    <button type="button" class="btn btn-outline text4">shop now</button>
                </div>
                <div class="col-7 mb-4">
                    <img src=" {{ asset('assets/site/imgs/s2.jpg') }}" class="img-fluid" />
                    <p>Lorem ipsum dolor sit amet </p>
                    <button type="button" class="btn btn-outline text4">shop now</button>
                </div>
            </div>
        </div>
    </div>

</section>
<!--end beauty for you......-->
<!--start popular in store-->
<section class="popular mt-4" id="best">
    <div class="container text-center">
        <h3>what's hot</h3>
        <h4>popular in store</h4>
    </div>
    <div class="row ml-0 mr-0">
        <div class="col-lg-3 col-md-4 col-sm-6 text-center product">
            <div class="img-prod">
                <img src="{{ asset('assets/site/imgs/pp.jpg')}}" class="img-fluid" />
                <div class="whish-show d-flex justify-content-center align-items-center">
                    <a href=" productDetails.html"><i class="fas fa-eye"></i></a>
                    <i class="fas fa-heart"></i>
                </div>
            </div>

            <div class="star d-flex justify-content-center">
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum, dolor sit amet consectet urconsectetur</p>
            <p>$32</p>
            <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 text-center product">
            <div class="img-prod">
                <img src="{{ asset('assets/site/imgs/product2.jpg')}}" class="img-fluid" />
                <div class="whish-show d-flex justify-content-center align-items-center">
                    <a href=" productDetails.html"><i class="fas fa-eye"></i></a>
                    <i class="fas fa-heart"></i>
                </div>
            </div>

            <div class="star d-flex justify-content-center">
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum, dolor sit amet consectet urconsectetur</p>
            <p>$32</p>
            <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 text-center product">
            <div class="img-prod">
                <img src="{{ asset('assets/site/imgs/product2.jpg')}}" class="img-fluid" />
                <div class="whish-show d-flex justify-content-center align-items-center">
                    <a href=" productDetails.html"><i class="fas fa-eye"></i></a>
                    <i class="fas fa-heart"></i>
                </div>
            </div>

            <div class="star d-flex justify-content-center">
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum, dolor sit amet consectet urconsectetur</p>
            <p>$32</p>
            <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 text-center product">
            <div class="img-prod">
                <img src="{{ asset('assets/site/imgs/product2.jpg')}}" class="img-fluid" />
                <div class="whish-show d-flex justify-content-center align-items-center">
                    <a href=" productDetails.html"><i class="fas fa-eye"></i></a>
                    <i class="fas fa-heart"></i>
                </div>
            </div>

            <div class="star d-flex justify-content-center">
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum, dolor sit amet consectet urconsectetur</p>
            <p>$32</p>
            <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
        </div>
    </div>
</section>
<!--end popular in store-->
<!--start new......-->
<section class="new mt-4 pt-4 pb-4" id="new">
    <div class="layout">
        <div class="container h-100">
            <div class="new-content d-flex align-items-center justify-content-end h-100">
                <div>
                    <h5>new in 2020</h5>
                    <h3>cosmatics from natural Ingredients</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa iste corrupti<br>nesciunt dolores eius, consequatur eaque quod qui exercitationem?Possim <br>qui consectetur libero reiciendis</p>
                    <button type="button" class="btn btn-outline text4 rounded-pill">Shop Now</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end new........-->
<!--start new slider...-->
<section class="new-slider mt-4">
    <div class="container text-center">
        <h3>what's new </h3>
        <h4>new products</h4>
    </div>
    <div class="new-slider-container">
        <div class="swiper-container new-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide text-center product">
                    <div>
                        <div class="img-prod">
                            <img src="{{ asset('assets/site/imgs/product2.jpg')}}" class="img-fluid" />
                            <div class="whish-show d-flex justify-content-center align-items-center">
                                <a href=" productDetails.html"><i class="fas fa-eye"></i></a>
                                <i class="fas fa-heart"></i>
                            </div>
                        </div>

                        <div class="star d-flex justify-content-center">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p>Lorem ipsum, dolor sit amet consectet urconsectetur</p>
                        <p>$32</p>
                        <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
                    </div>
                </div>
                <div class="swiper-slide text-center product">
                    <div>
                        <div class="img-prod">
                            <img src="{{ asset('assets/site/imgs/product.jpg')}}" class="img-fluid" />
                            <div class="whish-show d-flex justify-content-center align-items-center">
                                <a href=" productDetails.html"><i class="fas fa-eye"></i></a>
                                <i class="fas fa-heart"></i>
                            </div>
                        </div>

                        <div class="star d-flex justify-content-center">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p>Lorem ipsum, dolor sit amet consectet urconsectetur</p>
                        <p>$32</p>
                        <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
                    </div>
                </div>
                <div class="swiper-slide text-center product">
                    <div>
                        <div class="img-prod">
                            <img src="{{ asset('assets/site/imgs/pp.jpg')}}" class="img-fluid" />
                            <div class="whish-show d-flex justify-content-center align-items-center">
                                <a href=" productDetails.html"><i class="fas fa-eye"></i></a>
                                <i class="fas fa-heart"></i>
                            </div>
                        </div>

                        <div class="star d-flex justify-content-center">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p>Lorem ipsum, dolor sit amet consectet urconsectetur</p>
                        <p>$32</p>
                        <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
                    </div>
                </div>
                <div class="swiper-slide text-center product">
                    <div>
                        <div class="img-prod">
                            <img src="{{ asset('assets/site/imgs/product2.jpg')}}" class="img-fluid" />
                            <div class="whish-show d-flex justify-content-center align-items-center">
                                <a href=" productDetails.html"><i class="fas fa-eye"></i></a>
                                <i class="fas fa-heart"></i>
                            </div>
                        </div>

                        <div class="star d-flex justify-content-center">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p>Lorem ipsum, dolor sit amet consectet urconsectetur</p>
                        <p>$32</p>
                        <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
                    </div>
                </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>
<!--end new slider.....-->
<!--services .......-->
<section class="services text-center d-flex align-items-center mt-4" style="overflow: hidden;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 p-3 mb-3 animate__animated animate__backInDown animate__slower">
                <i class="fas fa-plane"></i>
                <p> Free shipping worldwide</p>
            </div>
            <div class="col-6 p-3 mb-3 animate__animated animate__backInRight animate__slower">
                <i class="fas fa-headphones"></i>
                <p> we here all day for support</p>
            </div>
            <div class="col-6 p-3 mb-3 animate__animated animate__backInLeft animate__slower">
                <i class="fas fa-undo-alt"></i>
                <p> 30days return any product</p>
            </div>
            <div class="col-6 p-3 mb-3 animate__animated animate__backInUp animate__slower">
                <i class="fas fa-heart"></i>
                <p>natural product for your skin</p>
            </div>
        </div>
    </div>
</section>
<!--end services.....-->
<!--sale product-->
<section class="sale mt-4" id="offer">
    <div class="container text-center">
        <h3>all in sale</h3>
        <h4>many products for you</h4>
        <div class="row">
            <div class="col-md-4 col-sm-6 text-center product">
                <div class="img-prod">
                    <img src="{{ asset('assets/site/imgs/product2.jpg')}}" class="img-fluid" />
                    <div class="whish-show d-flex justify-content-center align-items-center">
                        <a href=" productDetails.html"><i class="fas fa-eye"></i></a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>

                <div class="star d-flex justify-content-center">
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Lorem ipsum, dolor sit amet consectet urconsectetur</p>
                <p><del>$50</del>$32</p>
                <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
            </div>
            <div class="col-md-4 col-sm-6 text-center product">
                <div class="img-prod">
                    <img src="{{ asset('assets/site/imgs/pp.jpg')}}" class="img-fluid" />
                    <div class="whish-show d-flex justify-content-center align-items-center">
                        <a href=" productDetails.html"><i class="fas fa-eye"></i></a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>

                <div class="star d-flex justify-content-center">
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Lorem ipsum, dolor sit amet consectet urconsectetur</p>
                <p><del>$50</del>$32</p>
                <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
            </div>
            <div class="col-md-4 col-sm-6 text-center product">
                <div class="img-prod">
                    <img src="{{ asset('assets/site/imgs/product.jpg')}}" class="img-fluid" />
                    <div class="whish-show d-flex justify-content-center align-items-center">
                        <a href=" productDetails.html"><i class="fas fa-eye"></i></a>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>

                <div class="star d-flex justify-content-center">
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Lorem ipsum, dolor sit amet consectet urconsectetur</p>
                <p><del>$50</del>$32</p>
                <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
            </div>
        </div>
    </div>
</section>
<!--end sale product-->

@endsection
