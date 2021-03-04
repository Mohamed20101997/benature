@extends('layouts.admin')
@section('title','Products')
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> المنتجات </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> المنتجات </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">جميع المنتجات </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">

                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')
                            @include('dashboard.includes.alerts.confirm')

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <a href="{{route('products.create')}}" class="btn btn-outline-primary" id="new">Add New Product</a>
                                    <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead class="">
                                            <tr>
                                                <th>الاسم </th>
                                                <th>المدينه</th>
                                                <th>القسم</th>
                                                <th>حالة المنتج</th>
                                                <th>حالة المخزن</th>
                                                <th>السعر</th>
                                                <th>صورة المنتج</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @isset($products)
                                                @foreach($products as $product)
                                                <tr>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->country->name}}</td>
                                                    <td> {{$product->category->name}} </td>
                                                    <td>{{$product->getActive()}}</td>
                                                    <td>{{$product->_getActive('in_stock')}}</td>
                                                    <td>{{$product->price}}</td>
                                                    <td><img src="{{image_path('products', $product->photo)}}" width="100px" height="100px"></td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">

                                                            @if($product->is_popular == 0)
                                                                <button  type="submit" id="popular" data-id="{{$product->id}}" class="btn btn-danger rounded-0">not popular</button>
                                                            @else
                                                                <button  type="submit" id="popular" data-id="{{$product->id}}" class="btn btn-success rounded-0">is popular</button>
                                                            @endif

                                                            @if (auth()->guard('admin')->user()->hasPermission('update_products'))
                                                                <a href="{{route('products.edit', $product ->id)}}" class="btn btn-outline-primary"><i class="ficon ft-edit"></i></a>
                                                            @endif

                                                            @if (auth()->guard('admin')->user()->hasPermission('delete_products'))
                                                                <form action="{{route('products.destroy', $product ->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-outline-danger delete rounded-0"><i class="ficon ft-trash"></i></button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>
                                    <div class="justify-content-center d-flex">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection

