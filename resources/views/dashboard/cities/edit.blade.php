@extends('layouts.admin')
@section('title','city Update')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">@lang('admin/city.Home') </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('cities.index')}}"> @lang('admin/city.cities')</a>
                                </li>
                                <li class="breadcrumb-item active"> @lang('admin/city.edit') - {{$city -> name}}
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
                                    <h4 class="card-title" id="basic-layout-form"> @lang('admin/city.editcity')</h4>
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
                                        <form class="form" action="{{route('cities.update',$city->id)}}"
                                              method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <input name="id" value="{{$city -> id}}" type="hidden">
                                            <div class="form-body">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <select name="country_id" class="form-control select2">
                                                                <optgroup label="@lang('admin/city.pleaseChooseCountry')">
                                                                    @if($countries && $countries -> count() > 0)
                                                                        <option value="">@lang('admin/city.ChooseCountry')</option>
                                                                        @foreach($countries as $county)
                                                                            <option value="{{$county -> id }}"  {{$city->country_id == $county->id  ? 'selected' :' ' }}>
                                                                                {{$county -> name}}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>

                                                            </select>
                                                            @error('country_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>

                                                        @error("")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div> {{-- end of row --}}

                                                <div class="row">
                                                    @foreach (config('translatable.locales') as $locale)

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label><i class="fa fa-list">
                                                                        |</i> @lang('admin/city.'. $locale .'.cityName')
                                                                </label>
                                                                <input type="text" name="{{ $locale }}[name]"
                                                                       value="{{ old($locale .'.name', $city->translate($locale)->name) }}"
                                                                       class="form-control">
                                                            </div>

                                                            @error("$locale.name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="row">

                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> @lang('admin/city.back')
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> @lang('admin/city.update')
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
