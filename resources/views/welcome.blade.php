@extends('layouts.app')
@section('content')

    @push('style')
        <style>

            .shop {
                text-decoration: none;
            }

            .shop:hover, .shop:focus {
                text-decoration: none;
            }
        </style>
    @endpush

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
                    <a href="{{$setting->facebook}}"> <i class="fab fa-facebook-f"></i></a>
                    <a href="{{$setting->gmail}}"><i class="fas fa-envelope"></i> </a>
                    <a href="{{$setting->whatsapp}}"> <i class="fab fa-whatsapp"></i></a>
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
                        <p class="active head d-flex align-items-center justify-content-between"><a href="#">product page</a><i class="fas fa-times x"></i></p>
                        @foreach($categories as $category)
                            <li>
                                <i class="fas fa-chevron-down"></i> {{$category->name}}
                            </li>
                            <div>
                                <ul class="list-unstyled">

                                    @foreach($category->childrens as $children)
                                        @if($children->products->count() != 0)
                                        <li>
                                            <a href="{{url('products/'. $children->id . '/' .  $children->slug)}}">
                                                {{$children->name}}
                                            </a>
                                        </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
        <div class="col-lg-8 col-md-7 col-12offset-1 category text-center">
            <div class="row">
                <div class="col-7 mb-4 p-2">
                    <img src=" {{ image_path('products',$setting->image1) }}" class="img-fluid" />
                    <p>{{ $setting->label1 }} </p>
                    <a class="shop" href="{{ url('products') }}"><button type="button" class="btn btn-outline text4">shop now</button></a>
                </div>
                <div class="col-5 mb- p-2">
                    <img src="{{ image_path('products',$setting->image2) }} " class="img-fluid" />
                    <p>{{ $setting->label2 }}</p>
                    <a class="shop" href="{{ url('products') }}"><button type="button" class="btn btn-outline text4">shop now</button></a>
                </div>
                <div class="col-5 mb-4">
                    <img src=" {{ image_path('products',$setting->image3) }}" class="img-fluid" />
                    <p>{{ $setting->label3 }} </p>
                    <a class="shop" href="{{ url('products') }}"><button type="button" class="btn btn-outline text4">shop now</button></a>
                </div>
                <div class="col-7 mb-4">
                    <img src=" {{ image_path('products',$setting->image4) }}" class="img-fluid" />
                    <p>{{ $setting->label4 }} </p>
                    <a class="shop" href="{{ url('products') }}"><button type="button" class="btn btn-outline text4">shop now</button></a>
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
        @isset($populars)
            @foreach($populars as $popular)
                <div class="col-lg-3 col-md-4 col-sm-6 text-center product">
                    <div class="img-prod">
                        <img src="{{image_path('products' , $popular->photo)}}" class="img-fluid" />
                        <div class="whish-show d-flex justify-content-center align-items-center">
                            <a href="{{ url('product/'.$popular->id .'/' .$popular->slug) }}"><i class="fas fa-eye"></i></a>
                            @auth
                                <i class="fa fa-heart product__fav-icon {{$popular->is_favored ? 'toggleActive': ''}} product-{{$popular->id}}"
                                   data-url="{{ route('products.toggle_favorite', $popular->id) }}"
                                   data-id="{{$popular->id}}"></i>
                            @else <a href="{{url('login')}}" class="text-white align-self-center"><i class="far fa-heart"></i></a>
                            @endauth
                        </div>
                    </div>

                    <div class="star d-flex justify-content-center">
                            @for($i=1 ; $i<6 ; $i++)
                                @if (average($popular->id) < $i)
                                    <i class="far fa-star"></i>
                                @elseif(average($popular->id) >= $i)
                                    <i class="fas fa-star"></i>
                                @endif
                            @endfor
                    </div>
                    <p>{{$popular->name}}</p>
                    <p>{{$popular->country->currency}} {{$popular->price}}</p>
                    @if($basket->has($popular) == false)
                        <button type="button" class="btn btn-outline text4 rounded-pill cart-addition cart-{{$popular->id}}"
                                data-product-id="{{$popular->id}}" data-product-slug="{{$popular->slug}}">Add to cart
                        </button>
                    @else
                        <a href="{{url('cart')}}" class="text-decoration-none go-cart-{{$popular->id}}">
                            <button type="button" class="btn btn-outline text4 rounded-pill  go-cart-{{$popular->id}}"> Go to cart</button>
                        </a>
                    @endif
                    <a href="{{url('cart')}}" class="text-decoration-none go-cart-{{$popular->id}} hidden">
                        <button type="button" class="btn btn-outline text4 rounded-pill  go-cart-{{$popular->id}}"> Go to cart</button>
                    </a>
        </div>
            @endforeach
        @endisset
    </div>
</section>
<!--end popular in store-->
<!--start new......-->
<section class="new mt-4 pt-4 pb-4" id="new">
    <div class="layout">
        <div class="container h-100">
            <div class="new-content d-flex align-items-center justify-content-end h-100">
                <div>
                    <h5 class="text-center">{{ $setting->header }}</h5>
                            <h3>{{ $setting->title }}</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.Ipsa iste corrupti<br> nesciunt
                            dolores eius, consequatur eaque quod qui exercitationem?Possim <br>
                            qui consectetur libero reiciendis</p>
                    <a class="shop" href="{{ url('products') }}"> <button type="button" class="btn btn-outline text4 rounded-pill">Shop Now</button></a>
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
                @foreach ($products as $product)
                        <div class="swiper-slide text-center product">
                            <div>
                                <div class="img-prod">
                                    <img src="{{image_path('products' , $product->photo)}}" class="img-fluid" />
                                    <div class="whish-show d-flex justify-content-center align-items-center">
                                        <a href="{{ url('product/'.$product->id .'/' .$product->slug) }}"><i class="fas fa-eye"></i></a>
                                        @auth
                                        <i class="fa fa-heart product__fav-icon {{$product->is_favored ? 'toggleActive': ''}} product-{{$product->id}}"
                                        data-url="{{ route('products.toggle_favorite', $product->id) }}"
                                        data-id="{{$product->id}}"></i>
                                        @else <a href="{{url('login')}}" class="text-white align-self-center"><i class="far fa-heart"></i></a>
                                        @endauth
                                    </div>
                                </div>

                                <div class="star d-flex justify-content-center">
                                    @for($i=1 ; $i<6 ; $i++)
                                        @if (average($product->id) < $i)
                                            <i class="far fa-star"></i>
                                        @elseif(average($product->id) >= $i)
                                            <i class="fas fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <p>{{$product->name}}</p>
                                <p>{{$product->country->currency}} {{$product->price}}</p>
                                @if($basket->has($product) == false)
                                    <button type="button" class="btn btn-outline text4 rounded-pill cart-addition cart-{{$product->id}}"
                                            data-product-id="{{$product->id}}" data-product-slug="{{$product->slug}}">Add to cart
                                    </button>
                                @else
                                    <a href="{{url('cart')}}" class="text-decoration-none go-cart-{{$product->id}}">
                                        <button type="button" class="btn btn-outline text4 rounded-pill  go-cart-{{$product->id}}"> Go to cart</button>
                                    </a>
                                @endif
                                <a href="{{url('cart')}}" class="text-decoration-none go-cart-{{$product->id}} hidden">
                                    <button type="button" class="btn btn-outline text4 rounded-pill  go-cart-{{$product->id}}"> Go to cart</button>
                                </a>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
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
            @foreach ($sales as $sale)
            <div class="col-md-4 col-sm-6 text-center product">
                <div class="img-prod">
                    <img src="{{image_path('products' , $sale->photo)}}" class="img-fluid" />
                    <div class="whish-show d-flex justify-content-center align-items-center">
                        <a href="{{ url('product/'.$sale->id .'/' .$sale->slug) }}"><i class="fas fa-eye"></i></a>
                        @auth
                            <i class="fa fa-heart product__fav-icon {{$product->is_favored ? 'toggleActive': ''}} product-{{$product->id}}"
                            data-url="{{ route('products.toggle_favorite', $product->id) }}"
                            data-id="{{$product->id}}"></i>
                        @else
                            <a href="{{url('login')}}" class="text-white align-self-center"><i class="far fa-heart"></i></a>
                        @endauth
                    </div>
                </div>

                <div class="star d-flex justify-content-center">
                    @for($i=1 ; $i<6 ; $i++)
                        @if (average($product->id) < $i)
                            <i class="far fa-star"></i>
                        @elseif(average($product->id) >= $i)
                            <i class="fas fa-star"></i>
                        @endif
                    @endfor
                </div>
                <p>{{$sale->name}}</p>
                <p>
                    @if($sale->special_price != null && $sale->special_price_type == 1)
                        <del>{{$sale->country->currency}} {{$sale->price}}</del>
                        <span class="price">{{$sale->country->currency}} {{$sale->special_price}}</span>
                        @else
                        <span class="price">{{$sale->country->currency}} {{$sale->price}}</span>
                    @endif
                </p>
                @if($basket->has($sale) == false)
                    <button type="button" class="btn btn-outline text4 rounded-pill cart-addition cart-{{$sale->id}}"
                            data-product-id="{{$sale->id}}" data-product-slug="{{$sale->slug}}">Add to cart
                    </button>
                @else
                    <a href="{{url('cart')}}" class="text-decoration-none go-cart-{{$sale->id}}">
                        <button type="button" class="btn btn-outline text4 rounded-pill  go-cart-{{$sale->id}}"> Go to cart</button>
                    </a>
                @endif
                <a href="{{url('cart')}}" class="text-decoration-none go-cart-{{$sale->id}} hidden">
                    <button type="button" class="btn btn-outline text4 rounded-pill  go-cart-{{$sale->id}}"> Go to cart</button>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!--end sale product-->

@endsection

