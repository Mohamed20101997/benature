@extends('layouts.app')
@section('content')

@push('style')
<link rel="stylesheet" href="{{ asset('assets/site/css/cart.css')}}">
@endpush

<!--start shopping cart-->
<section class="shoping-cart mt-5 mb-5 pt-4">
    <div class="container">
        <h5>Shopping Cart </h5>
        <div class="row">
            <div class="col-md-9">
                <table class="table table-hover mb-4">
                    @isset($basket)
                    <tbody>
                        @foreach ($basket -> all() as $product)
                            <tr class="cart-item">
                                <td>
                                    <div class="d-flex">
                                        <div class="img-container">
                                            <img src="{{image_path('products',$product->photo)}}" class="img-fluid" />
                                        </div>
                                        <div>
                                            <p>{{$product->name}}</p>
                                            <div class="product-line-info product-price">
                                                @if($product->special_price != null && $product->special_price_type == 1)
                                                <del>${{$product->price}}</del>
                                                    <span class="price">${{$product->special_price}}</span>
                                                 @else
                                                    <span class="price">${{$product->price}}</span>
                                                @endif

                                             </div>
                                            <p>dimention : {{ $product->Length }} * {{ $product->width }} * {{ $product->height }} cm</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if ($product->qty != null || $product->qty > 0)
                                    <div class="quantity d-flex justify-content-start">
                                        <p class="down">-</p>
                                        <input class="quantity-inp" value="1" readonly  max="{{$product->qty}}">
                                        <p class="up">+</p>
                                    </div>
                                @else
                                    <div class="quantity d-flex justify-content-start  text-danger"> Not available </div>
                                @endif
                                </td>
                                <td>$125</td>
                                <td>
                                    <a class="far fa-trash-alt remove-from-cart" rel="nofollow"
                                    data-link-action="delete-from-cart"
                                    data-id-product="{{$product ->id}}"
                                    data-url-product="{{route('site.cart.update',$product -> slug)}}"
                                    data-id-customization=""></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    @endisset
                </table>
            </div>
            <div class="col-md-3">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>{{$basket->itemCount()}} items</td>
                            <td>${{$basket  -> subTotal()}}</td>
                        </tr>
                        <tr>
                            <td>shipping</td>
                            <td>$125</td>
                        </tr>
                        <tr>
                            <td>total</td>
                            <td>${{$basket  -> subTotal()}}</td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-outline text4" href="checkout.html" role="button">check out</a>
            </div>
        </div>
    </div>
</section>



@endsection

@push('script')

<script>
    jQuery(document).ready(function(){

       $('.remove-from-cart').on('click', function(e){
       e.preventDefault();
       $(this).closest('.cart-item').remove()
       $.ajaxSetup({
           headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });

       $.ajax({
               url: $(this).attr('data-url-product'),
               type: 'POST',
               data: {
                   'product_id':$(this).attr('data-product-id'),
               },
               success: function(response){
                   new Noty({
                       theme: 'relax',
                       type:'success',
                       layout: 'topRight',
                       text : "deleted a product successfully",
                       timeout: 2000,
                       kiler: true
                   }).show();

                   $('.item_coutn').text(response.basket);
               },

           });
       });
   });
</script>

@endpush
