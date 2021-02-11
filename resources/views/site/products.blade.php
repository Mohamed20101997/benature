@extends('layouts.app')
@section('content')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/site/css/products.css')}}">
@endsection

   <!--start all products.-->
   <section class="products mt-4 pt-3">
    <div class="container text-center pt-2 pb-2">
        <h2>
            All Products
        </h2>
        <h3>
            you will find all you need
        </h3>
    </div>
    <div class="row ml-0 mr-0">
        <div class="col-md-3 col-sm-4 filter pr-0 pl-0">
            <h4>Filter</h4>
            <p data-class="all">all</p>
            <p data-class=".men">Men</p>
            <p data-class=".women">women</p>
            <div class="sort-price">
                <input class="form-control form-control" type="text" placeholder="Enter Max price" id="priceinp">
                <button onclick="sortPrice()" class="btn btn-outline text4 rounded-pill">sort by price</button>
            </div>
        </div>
        <div class="col-md-9 col-sm-8 ">
            <div class="container">
                <div class="row" id="boxs">
                    <div class="col-lg-4 col-md-6 text-center product men">
                        <div class="img-prod">
                            <img src="imgs/product2.jpg" class="img-fluid" />
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
                        <p><del>$50</del><span class="price">$32</span></p>
                        <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center product women">
                        <div class="img-prod">
                            <img src="imgs/product.jpg" class="img-fluid" />
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
                        <p><span class="price">$32</span></p>
                        <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center product women">
                        <div class="img-prod">
                            <img src="imgs/pp.jpg" class="img-fluid" />
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
                        <p><span class="price">$15</span></p>
                        <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center product men">
                        <div class="img-prod">

                            <img src="imgs/product2.jpg" class="img-fluid" />
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
                        <p><del>$50</del><span class="price">$10</span></p>
                        <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center product men">
                        <div class="img-prod">
                            <img src="imgs/product.jpg" class="img-fluid" />
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
                        <p><span class="price">$50</span></p>
                        <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center product men">
                        <div class="img-prod">
                            <img src="imgs/product.jpg" class="img-fluid" />
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
                        <p><span class="price">$92</span></p>
                        <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center product men">
                        <div class="img-prod">
                            <img src="imgs/product.jpg" class="img-fluid" />
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
                        <p><del>$50</del><span class="price">$22</span></p>
                        <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center product women">
                        <div class="img-prod">
                            <img src="imgs/product.jpg" class="img-fluid" />
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
                        <p><span class="price">$32</span></p>
                        <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center product women">
                        <div class="img-prod">
                            <img src="imgs/product.jpg" class="img-fluid" />
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
                        <p><span class="price">$32</span></p>
                        <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
                    </div>
                </div>
                <div class="button d-flex align-items-center justify-content-center">
                    <button class="btn btn-outline" id="showMore"><i class="fas fa-plus-circle"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end all products....-->


@endsection
