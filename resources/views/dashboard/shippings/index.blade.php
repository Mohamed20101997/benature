
@extends('layouts.admin')
@section('title','shippings')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> @lang('admin/shipping.shippings') </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">@lang('admin/shipping.home')</a>
                                </li>
                                <li class="breadcrumb-item active"> @lang('admin/shipping.shippings')
                                </li>
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
                                    <h4 class="card-title">@lang('admin/shipping.allshippings')</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
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
                                        <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th> @lang('admin/shipping.country') </th>
                                                <th> @lang('admin/shipping.city') </th>
                                                <th> @lang('admin/shipping.shippingPrice') </th>
                                                <th>@lang('admin/shipping.actions')</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($shippings)
                                                @foreach($shippings as $shipping)
                                                    <tr>
                                                        <td>{{$shipping ->country->name}}</td>
                                                        <td>{{$shipping ->city->name}}</td>
                                                        <td>{{$shipping ->price}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                @if (auth()->guard('admin')->user()->hasPermission('update_shippings'))
                                                                    <a href="{{route('shippings.edit',$shipping-> id)}}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">@lang('admin/shipping.edit')</a>
                                                                @endif
                                                                @if (auth()->guard('admin')->user()->hasPermission('delete_shippings'))
                                                                    <form action="{{route('shippings.destroy' , $shipping->id)}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-outline-danger delete btn-min-width box-shadow-3 mr-1 mb-1">@lang('admin/shipping.delete')</button>
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

@stop
