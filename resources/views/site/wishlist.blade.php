@extends('layouts.app')
@section('content')

@push('style')
<link rel="stylesheet" href="{{ asset('assets/site/css/wish.css')}}">
@endpush

 <!--start wish lst product-->
 <section class="wish mt-5 pt-4">
    <div class="text-center">
        <h3>whish list </h3>
        <div class="row ml-0 mr-0 {{ 1 ? 'favorite': '' }}">

            @if($products->count() > 0)
            @foreach ($products as $product)
                <div class="product col-lg-3 col-md-4 col-sm-6 text-center">
                    <div class="img-prod">
                        <img src="{{image_path('products', $product->photo)}}" class="img-fluid" />
                        <div class="whish-show d-flex justify-content-center align-items-center">
                          <a href="{{ url('product/'.$product->id .'/' .$product->slug) }}"><i class="fas fa-eye"></i></a>
                          <i class="far fa-heart align-self-center product__fav-icon {{$product->is_favored ? 'active': ''}} product-{{$product->id}}"
                              data-url="{{ route('products.toggle_favorite', $product->id) }}" data-id="{{$product->id}}" >
                          </i>
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
                    <button type="button" class="btn btn-outline text4 rounded-pill far fa-heart align-self-center product__fav-icon"
                    data-url="{{ route('products.toggle_favorite', $product->id) }}"
                    data-id="{{$product->id}}"><i class="far fa-trash-alt"></i>remove</button>


                </div>


                @endforeach
                @else
                    <div class="col">
                        <h5 class="fw-300 alert alert-success ">Sorry no products found</h5>
                    </div>
            @endif
        </div>
    </div>
</section>


@endsection
