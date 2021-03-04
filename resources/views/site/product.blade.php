@extends('layouts.app')
@section('content')

    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/site/css/productdetails.css')}}">
    @endpush

    @include('dashboard.includes.alerts.success')
    @include('dashboard.includes.alerts.errors')

    <!--start product details...-->
    <section class="product-details mt-5">
        <div class="container">
            <div class="row ml-0 mr-0">
                <div class="col-md-5">
                    <div class="img-container">
                        <img src="{{image_path('products' , $product->photo)}}" class="img-fluid"/>
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
                        @for($i=1 ; $i<6 ; $i++)
                            @if (average($product->id) < $i)
                                <i class="far fa-star"></i>
                            @elseif(average($product->id) >= $i)
                                <i class="fas fa-star"></i>
                            @endif
                        @endfor

                        <p> ({{$count}} review)</p>
                    </div>
                    @if ($product->qty != null || $product->qty > 0)
                        <div class="quantity d-flex justify-content-start">
                            <p class="down">-</p>
                            <input class="quantity-inp" value="1" readonly max="{{$product->qty}}">
                            <p class="up">+</p>
                        </div>
                    @else
                        <div class="quantity d-flex justify-content-start  text-danger"> Not available</div>
                    @endif


                    <div class="d-flex justify-content-start align-items-center wish">
                        <button type="button" class="btn btn-outline text4 ml-0 mr-0">Add to cart</button>
                        @auth
                            <i class="far fa-heart product__fav-icon {{$product->is_favored ? 'toggleActive': ''}} product-{{$product->id}}"
                               data-url="{{ route('products.toggle_favorite', $product->id) }}"
                               data-id="{{$product->id}}"></i>
                        @else
                            <a href="{{url('login')}}" style="margin: 0 6px;"><i class="far fa-heart"></i></a>

                        @endauth
                        <a class="btn btn-outline text4" href="checkout.html" role="button">proceed to check out</a>
                    </div>
                    <p class="type"> type : {{ $product->category->name}} </p>
                    <p class="matrial">matrial : {{$product->material->name}}</p>
                    <p class="category">Category : {{ parent($product->category->parent_id) }}</p>
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
                    <a class="nav-item nav-link active" id="nav-details-tab" data-toggle="tab" href="#nav-home"
                       role="tab" aria-controls="nav-home" aria-selected="true">Details</a>
                    <a class="nav-item nav-link" id="nav-help-tab" data-toggle="tab" href="#nav-profile" role="tab"
                       aria-controls="nav-profile" aria-selected="false">Help</a>
                    <a class="nav-item nav-link" id="nav-review-tab" data-toggle="tab" href="#nav-contact" role="tab"
                       aria-controls="nav-contact" aria-selected="false">Reviews</a>
                    <a class="nav-item nav-link" id="nav-qa-tab" data-toggle="tab" href="#nav-qa" role="tab"
                       aria-controls="nav-contact" aria-selected="false">Q&A</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active mt-3 p-3 " id="nav-home" role="tabpanel"
                     aria-labelledby="nav-details-tab">
                    <p class="type"> type : {{ $product->category->name}}</p>
                    <p class="matrial">matrial : {{ $product->material->name }}</p>
                    <p class="category">Category : {{ parent($product->category->parent_id) }} </p>
                    <p>weight : {{ $product->weight }}kg</p>
                    <p>dimention : {{ $product->Length }} * {{ $product->width }} * {{ $product->height }} cm</p>
                </div>
                <div class="tab-pane fade mt-3 p-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-help-tab">
                    <p> Help : customer.services@benatur.com </p>
                </div>
                <div class="tab-pane fade mt-3 p-3 reviews" id="nav-contact" role="tabpanel"
                     aria-labelledby="nav-review-tab">
                    <div class="reviewBody">
                        @foreach($reviews as $review)
                        <div class="d-flex reviews  mt-4">
                            <div class="avatar-container">
                                <img src="{{ asset('assets/site/imgs/avatar.jpg ') }}" class="img-fluid"/>
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
                                    <span class="name">{{ $review->name }} </span> - <span
                                        class="date">{{ $review->created_at }}</span>
                                </p>
                                <p class="review"> {{ $review->comment }} </p>
                            </div>
                        </div>
                        @endforeach
                    </div>


                    <div class="add-review  mt-4">
                        <h5>
                            add review
                        </h5>
                        <p class="mb-0 ml-1">rate product</p>
                        <form id="reviews">
                            <div class="star d-flex mb-2">
                                <div class="rating">
                                    <input type="radio" id="star5" name="rating" value="5"/>
                                    <label for="star5" title="text" class="fas fa-star"></label>
                                    <input type="radio" id="star4" name="rating" value="4"/>
                                    <label for="star4" title="text" class="fas fa-star"></label>
                                    <input type="radio" id="star3" name="rating" value="3"/>
                                    <label for="star3" title="text" class="fas fa-star"></label>
                                    <input type="radio" id="star2" name="rating" value="2"/>
                                    <label for="star2" title="text" class="fas fa-star"></label>
                                    <input type="radio" id="star1" name="rating" value="1"/>
                                    <label for="star1" title="text" class="fas fa-star"></label>
                                </div>
                            </div>
                            <input type='reset' id='resetreviews' style="display: none"/>
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">leave a comment</label>
                                <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"
                                          placeholder="Your Review"></textarea>
                                <span id="commentError" class="alert-message text-danger"></span>

                            </div>
                            <label for="exampleFormControlInput1">Enter your name</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                   placeholder="EX : Amany Samir">
                            <span id="nameeError" class="alert-message text-danger"></span>

                            <button type="submit" id="reviewsSubmit" class="btn btn-outline text4 ml-0 mr-0">Submit
                            </button>
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
                                <img src="{{ image_path('Products',$sProduct->photo) }}" class="img-fluid"/>
                                <div class="whish-show d-flex justify-content-center align-items-center">
                                    <a href="{{ url('product/'.$sProduct->id .'/' .$sProduct->slug) }}"><i
                                            class="fas fa-eye"></i></a>
                                    @auth
                                        <i class="far fa-heart product__fav-icon {{$product->is_favored ? 'toggleActive': ''}} product-{{$product->id}}"
                                           data-url="{{ route('products.toggle_favorite', $product->id) }}"
                                           data-id="{{$product->id}}"></i>
                                    @else
                                        <a href="{{url('login')}}" class="text-white align-self-center"><i
                                                class="far fa-heart"></i></a>
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

                            <p>{{$sProduct->name}}</p>
                            <p>
                                @if($sProduct->special_price != null && $sProduct->special_price_type == 1)
                                    <del>${{$sProduct->price}}</del>
                                    <span class="price">${{$sProduct->special_price}}</span>
                                @else
                                    <span class="price">${{$sProduct->price}}</span>
                                @endif
                            </p>
                            @if($basket->has($sProduct) == false)
                                <button type="button"
                                        class="btn btn-outline text4 rounded-pill cart-addition cart-{{$sProduct->id}}"
                                        data-product-id="{{$sProduct->id}}" data-product-slug="{{$sProduct->slug}}">Add
                                    to cart
                                </button>
                            @else
                                <a href="{{url('cart')}}" class="text-decoration-none go-cart-{{$sProduct->id}}">
                                    <button type="button"
                                            class="btn btn-outline text4 rounded-pill  go-cart-{{$sProduct->id}}"> Go to
                                        cart
                                    </button>
                                </a>
                            @endif
                            <a href="{{url('cart')}}" class="text-decoration-none go-cart-{{$sProduct->id}} hidden">
                                <button type="button"
                                        class="btn btn-outline text4 rounded-pill  go-cart-{{$sProduct->id}}"> Go to
                                    cart
                                </button>
                            </a>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </section>
    <!--end whats next-->

@endsection

@push('script')
    <script>

        jQuery(document).ready(function () {

            $('#reviewsSubmit').on('click', function (e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data = $('#reviews').serialize()
                $.ajax({
                    url: "/reviews",
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        $('#resetreviews').click();
                        $('#commentError').text('');
                        $('#nameeError').text('');

                        $('.reviewBody').html(html);

                        new Noty({
                            theme: 'relax',
                            type: 'success',
                            layout: 'topRight',
                            text: "review sent successfully",
                            timeout: 2000,
                            kiler: true
                        }).show();
                    },
                    error: function (response) {
                        $('#commentError').text('');
                        $('#nameeError').text('');

                        $('#commentError').text(response.responseJSON.errors.comment);
                        $('#nameeError').text(response.responseJSON.errors.name);

                    }
                });
            });
        });
    </script>

@endpush
