
@extends('layouts.admin')
@section('title','materials')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">material
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> @lang('admin/material.materials') </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">@lang('admin/material.home') </a>
                                </li>
                                <li class="breadcrumb-item active"> @lang('admin/material.materials')
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
                                    <h4 class="card-title">@lang('admin/material.allmaterials')</h4>
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
                                                <th>@lang('admin/material.name') </th>
                                                <th>@lang('admin/material.status')</th>
                                                <th>@lang('admin/material.actions')</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($materials)
                                                @foreach($materials as $material)
                                                    <tr>
                                                        <td>{{$material -> name}}</td>
                                                         <td>{{$material -> getActive()}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                                @if (auth()->guard('admin')->user()->hasPermission('update_material'))
                                                                    <a href="{{route('materials.edit',$material-> id)}}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">@lang('admin/material.edit')</a>
                                                                @endif

                                                                @if (auth()->guard('admin')->user()->hasPermission('delete_material'))
                                                                    <form action="{{route('materials.destroy' , $material->id)}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-outline-danger delete btn-min-width box-shadow-3 mr-1 mb-1">@lang('admin/material.delete')</button>
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
