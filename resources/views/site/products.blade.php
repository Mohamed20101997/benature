@extends('layouts.app')
@section('content')

@push('style')
<link rel="stylesheet" href="{{ asset('assets/site/css/products.css')}}">
@endpush

   <!--start all products.-->
   <section class="products mt-4 pt-3">
    <div class="container text-center pt-2 pb-2">
        <h2>
            @isset($cat_name)
                {{$cat_name}}
            @else
                All Products
            @endisset

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

                    @isset($products)
                        @foreach ($products as $product)
                        @if ($product->is_active == 1)

                            <div class="col-lg-4 col-md-6 text-center product {{ $product->filter }}">
                                <div class="img-prod">
                                    <img src="{{image_path('products' , $product->photo)}}" class="img-fluid" />
                                    <div class="whish-show d-flex justify-content-center align-items-center">
                                        <a href="{{ url('product/'.$product->id .'/' .$product->slug) }}"><i class="fas fa-eye"></i></a>
                                         @auth
                                            <i class="far fa-heart product__fav-icon {{$product->is_favored ? 'active': ''}} product-{{$product->id}}"
                                            data-url="{{ route('products.toggle_favorite', $product->id) }}"
                                            data-id="{{$product->id}}"></i>
                                        @else
                                            <a href="{{url('login')}}" class="text-white align-self-center"><i class="far fa-heart"></i></a>
                                        @endauth
                                    </div>
                                </div>

                                <div class="star d-flex justify-content-center">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>

                                <p>{{$product->name}}</p>
                                <p>
                                    @if($product->special_price != null && $product->special_price_type == 1)
                                        <del>${{$product->price}}</del>
                                        <span class="price">${{$product->special_price}}</span>
                                     @else
                                        <span class="price">${{$product->price}}</span>
                                    @endif
                                </p>
                                <button type="button" class="btn btn-outline text4 rounded-pill addtocart cart-addition"
                                data-product-id="{{$product->id}}" data-product-slug="{{$product->slug}}">Add to cart</button>
                            </div>
                            @endif
                        @endforeach

                        @else
                        <div class="alert alert-success">There are no products</div>
                    @endisset


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
