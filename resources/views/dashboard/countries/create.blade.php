@extends('layouts.admin')
@section('title','Create Country')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href=""> @lang('admin/country.home') </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('countries.index')}}"> @lang('admin/country.countries')</a>
                                </li>
                                <li class="breadcrumb-item active"> @lang('admin/country.addcountry')
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
                                    <h4 class="card-title" id="basic-layout-form"> @lang('admin/country.addcountry') </h4>
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
                                        <form class="form" action="{{route('countries.store')}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">

                                                <div class="row">
                                                    @foreach (config('translatable.locales') as $locale)
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label><i class="fa fa-list">
                                                                        |</i> @lang('admin/country.'. $locale . '.countryName')
                                                                </label>
                                                                <input type="text" name="{{ $locale }}[name]"
                                                                       value="{{ old($locale . '.name') }}"
                                                                       class="form-control">
                                                            </div>

                                                            @error("$locale.name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    @endforeach
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>@lang('admin/country.currency')</label>
                                                            <input type="text" name="currency"  value="{{ old('currency') }}" class="form-control" placeholder="EX: EGY , SAR">
                                                        </div>

                                                        @error("currency")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> @lang('admin/country.back')
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> @lang('admin/country.create')
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
