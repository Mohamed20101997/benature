@extends('layouts.app')
@section('content')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/site/css/productdetails.css')}}">
@endsection

@include('dashboard.includes.alerts.success')
@include('dashboard.includes.alerts.errors')

    <!--start product details...-->
    <section class="product-details mt-5">
        <div class="container">
            <div class="row ml-0 mr-0">
                <div class="col-md-5">
                    <div class="img-container">
                        <img src="{{image_path('products' , $product->photo)}}" class="img-fluid" />
                    </div>
                </div>
                <div class="col-md-7 product">
                    <div>
                        <h4 class="name">{{$product->name}}</h4>
                        <p class="brand"> brand : {{$product->brand->name}}</p>
                        <p class="code">code : {{$product->code}}</p>
                        @if($product->special_price != null && $product->special_price_type == 1)
                        <del>${{$product->price}}</del>
                            <span class="price">${{$product->special_price}}</span>
                         @else
                            <span class="price">${{$product->price}}</span>
                        @endif
                    </div>
                    <div class="star d-flex">
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <p> (1 review)</p>
                    </div>
                    @if ($product->qty != null || $product->qty > 0)
                        <div class="quantity d-flex justify-content-start">
                            <p class="down">-</p>
                            <input class="quantity-inp" value="1" readonly  max="{{$product->qty}}">  <!-- sile max  //////////////////////// -->
                            <p class="up">+</p>
                        </div>
                    @else
                        <div class="quantity d-flex justify-content-start  text-danger"> Not available </div>
                    @endif


                    <div class="d-flex justify-content-start align-items-center wish">
                        <button type="button" class="btn btn-outline text4 ml-0 mr-0">Add to cart</button>
                        <i class="fas fa-heart"></i>
                        <a class="btn btn-outline text4" href="checkout.html" role="button">proceed to check out</a>
                    </div>
                    <p class="type"> type : @foreach ($product->categories as $category){{ $category ->name}} @endforeach</p>
                    <p class="matrial">matrial : {{$product->material->name}}</p>
                    <p class="category">Category : {{ $category->_parent->name }}</p>
                    <p class="product-discriptian">
                        Description : {{ $product->description }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="details-slide mt-5 pt-3">
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-details-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Details</a>
                    <a class="nav-item nav-link" id="nav-help-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Help</a>
                    <a class="nav-item nav-link" id="nav-review-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Reviews</a>
                    <a class="nav-item nav-link" id="nav-qa-tab" data-toggle="tab" href="#nav-qa" role="tab" aria-controls="nav-contact" aria-selected="false">Q&A</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active mt-3 p-3 " id="nav-home" role="tabpanel" aria-labelledby="nav-details-tab">
                    <p class="type"> type :  @foreach ($product->categories as $category){{ $category ->name}} @endforeach</p>
                    <p class="matrial">matrial : {{ $product->material->name }}</p>
                    <p class="category">Category : {{ $category->_parent->name }} </p>
                    <p>weight : {{ $product->weight }}kg</p>
                    <p>dimention : {{ $product->Length }} * {{ $product->width }} * {{ $product->height }} cm</p>
                </div>
                <div class="tab-pane fade mt-3 p-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-help-tab">
                    <p> Help : customer.services@benatur.com </p>
                </div>
                <div class="tab-pane fade mt-3 p-3" id="nav-contact" role="tabpanel" aria-labelledby="nav-review-tab">
                    @foreach ($reviews as $review)
                        <div class="d-flex reviews  mt-4">
                            <div class="avatar-container">
                                <img src="{{ asset('assets/site/imgs/avatar.jpg ') }}" class="img-fluid" />
                            </div>
                            <div>
                                <div class="star d-flex">
                                    @for($i=1 ; $i<6 ; $i++)
                                        @if ($review->rating < $i)
                                        <i class="far fa-star"></i>
                                        @elseif($review->rating >= $i)
                                        <i class="fas fa-star"></i>
                                        @endif
                                    @endfor
                                            
                                    </div>
                                <p class="profile-info">
                                    <span class="name">{{ $review->name }} </span> - <span class="date">{{ $review->created_at }}</span>
                                </p>
                                <p class="review">
                                    {{ $review->comment }}
                                </p>
                            </div>
                        </div>
                     @endforeach
                    <div class="add-review  mt-4">
                        <h5>
                            add review
                        </h5>
                        <p class="mb-0 ml-1">rate product</p>
                        <div class="star d-flex mb-2">
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <form action="{{ url('reviews') }}" method="post">
                            @csrf
                            @method('POST')
                            <input type="hidden" value="{{ $product->id }}" name="product_id"> 
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">leave a comment</label>
                                <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3" placeholder="Your Review"></textarea>
                                @error('comment')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <label for="exampleFormControlInput1">Enter your name</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="EX : Amany Samir">
                            @error('name')
                                <span class="text-danger"> {{$message}}</span>
                            @enderror
                            <button type="submit" id="btn" class="btn btn-outline text4 ml-0 mr-0">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade mt-3 p-3" id="nav-qa" role="tabpanel" aria-labelledby="nav-qa-tab">
                    <div class="question">
                        what is the product name ?
                    </div>
                    <div class="answer">
                        Lorem ipsum, dolor sit amet consectet urconsectetur
                    </div>
                    <div class="question">
                        what is the product name ?
                    </div>
                    <div class="answer">
                        Lorem ipsum, dolor sit amet consectet urconsectetur
                    </div>
                    <div class="question">
                        what is the product name ?
                    </div>
                    <div class="answer">
                        Lorem ipsum, dolor sit amet consectet urconsectetur
                    </div>
                    <div class="question">
                        what is the product name ?
                    </div>
                    <div class="answer">
                        Lorem ipsum, dolor sit amet consectet urconsectetur
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end product details.....-->
    <!--start whats next-->
    <section class="next mt-4">
        <div class="text-center">
            <h3>What's sale </h3>
            <h4>similar product</h4>
            <div class="row ml-0 mr-0">
                @isset($similarProduct)      
                    @foreach ($similarProduct as $sProduct)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-sm-5 text-center product">
                            <div class="img-prod">
                                <img src="{{ image_path('Products',$sProduct->photo) }}" class="img-fluid" />
                                <div class="whish-show d-flex justify-content-center align-items-center">
                                    <a href="{{ url('product/'.$sProduct->id .'/' .$sProduct->slug) }}"><i class="fas fa-eye"></i></a>
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
                    
                            <p>{{$sProduct->name}}</p>
                            <p>
                                @if($sProduct->special_price != null && $sProduct->special_price_type == 1)
                                    <del>${{$sProduct->price}}</del>
                                    <span class="price">${{$sProduct->special_price}}</span>
                                @else
                                    <span class="price">${{$sProduct->price}}</span>
                                @endif
                            </p>
                            <button type="button" class="btn btn-outline text4 rounded-pill addtocart">Add to cart</button>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </section>
    <!--end whats next-->

@endsection
