@extends('layouts.admin')
@section('title','Brands Update')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">@lang('admin/brand.home') </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('brands.index')}}">@lang('admin/brand.brands')  </a>
                                </li>
                                <li class="breadcrumb-item active"> @lang('admin/brand.edit')   - {{$brand -> name}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">  @lang('admin/brand.editBrand') </h4>
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
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('brands.update',$brand -> id)}}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <input name="id" value="{{$brand -> id}}" type="hidden">

                                            <div class="form-body">

                                                <div class="row">
                                                    @foreach (config('translatable.locales') as $locale)

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><i class="fa fa-list"> |</i> @lang('admin/brand.'. $locale .'.brandName')</label>
                                                            <input type="text" name="{{ $locale }}[name]"
                                                                value="{{ old($locale .'.name', $brand->translate($locale)->name) }}"
                                                                class="form-control">
                                                        </div>

                                                        @error("$locale.name")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">

                                                            <input type="checkbox" value="1" name="is_active" id="switcheryColor4" class="switchery" data-color="success" @if($brand -> is_active == 1)checked @endif />
                                                            <label for="switcheryColor4" class="card-title ml-1">@lang('admin/brand.status')  </label>

                                                            @error("is_active")
                                                            <span class="text-danger">{{$message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> @lang('admin/brand.back')
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> @lang('admin/brand.update')
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

    @stop
