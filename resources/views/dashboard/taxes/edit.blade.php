@extends('layouts.admin')
@section('title','Taxes Update')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">@lang('admin/taxe.home') </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('taxes.index')}}"> @lang('admin/taxe.taxes') </a>
                                </li>
                                <li class="breadcrumb-item active"> @lang('admin/taxe.edit') - {{$tax -> name}}
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
                                    <h4 class="card-title" id="basic-layout-form"> @lang('admin/taxe.edittaxes') </h4>
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
                                        <form class="form" action="{{route('taxes.update',$tax->id)}}"
                                              method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <input name="id" value="{{$tax -> country_id}}" type="hidden">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <select name="country_id" class="form-control select2"
                                                                    id="countries">
                                                                <optgroup label=" @lang('admin/taxe.pleaseChooseCountry')">
                                                                    @if($countries && $countries -> count() > 0)
                                                                        <option value="">@lang('admin/taxe.ChooseCountry')</option>
                                                                        @foreach($countries as $country)
                                                                            <option
                                                                                value="{{$country -> id }}" {{ $tax->country_id == $country->id ? 'selected' : ''}}>
                                                                                {{$country -> name}}
                                                                            </option>

                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>

                                                            </select>
                                                            @error('country_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label> @lang('admin/taxe.Percentage')% </label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <input type="number" name="tax" value="{{ old('tax', $tax->tax) }}" class="form-control" placeholder="ex : 10%">
                                                                    @error('tax')
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> @lang('admin/taxe.back')
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> @lang('admin/taxe.update')
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

