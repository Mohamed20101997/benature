@extends('layouts.admin')
@section('title','Create Brand')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">@lang('admin/admin.home') </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admins.index')}}"> @lang('admin/admin.admins') </a>
                                </li>
                                <li class="breadcrumb-item active"> @lang('admin/admin.addadmin')
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
                                    <h4 class="card-title" id="basic-layout-form"> @lang('admin/admin.addadmin')</h4>
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
                                        <form class="form" action="{{route('admins.update',$admin -> id)}}"
                                              method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <input name="id" value="{{$admin -> id}}" type="hidden">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name"><i class="fa fa-user-circle-o"> |</i> @lang('admin/admin.name')</label>
                                                        <input type="text" name="name" value="{{ old('name' , $admin->name) }}"
                                                               class="form-control">
                                                        @error('name')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email"><i class="fa fa-envelope"> |</i> @lang('admin/admin.email')</label>
                                                        <input type="email" name="email" value="{{ old('email', $admin->email) }}"
                                                               class="form-control">

                                                        @error('email')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> {{--  end of the row --}}

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="password"><i class="fa fa-key"> |</i> @lang('admin/admin.password') </label>
                                                        <input type="password" name="password" class="form-control">
                                                        @error('password')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">


                                                    <div class="form-group">
                                                        <label for="password_confirmation"><i class="fa fa-user-secret">
                                                                |</i>@lang('admin/admin.repassword')</label>
                                                        <input type="password" name="password_confirmation"
                                                               class="form-control">

                                                        @error('password_confirmation')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> {{--  end of the row --}}


                                            <div class="form-group">
                                                <label><i class="fa fa-address-book"> |</i> @lang('admin/admin.permissions') </label>
                                                <div class="nav-tabs-custom">
                                                    @php
                                                       $models = ['admins' ,'categories' ,'countries','cities','shippings' ,'taxes','brands' ,'material' ,'products','messages','question','settings'] ;
                                                      $maps = ['create' ,'read' ,'update','delete'] ;
                                                      $mapMessage = ['read' ,'delete'] ;
                                                      $mapsettting = ['read' ,'update','create'] ;
                                                    @endphp


                                                    <ul class="nav nav-tabs nav-top-border no-hover-bg">
                                                        @foreach ($models as $index=>$model)
                                                            <li class="nav-item">
                                                                <a class="nav-link {{ $index == 0 ? 'active' : '' }}"
                                                                   id="base-{{ $model }}"
                                                                   data-toggle="tab" aria-controls="tab11"
                                                                   href="#{{ $model }}"
                                                                   aria-expanded="true">{{ $model }}</a>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                    <div class="tab-content px-1 pt-1">
                                                        @foreach ($models as $index=>$model)
                                                            <div class="tab-pane {{ $index == 0 ? 'active' : '' }}"
                                                                 id="{{$model}}" aria-labelledby="base-{{$model}}">
                                                                @if($model == 'messages')
                                                                    @foreach ($mapMessage as $indexmap=>$map)
                                                                        <input type="checkbox"
                                                                               {{ $admin->hasPermission($map . '_' . $model) ? 'checked' : '' }}
                                                                               id="{{ $model  . $indexmap }}"
                                                                               name="permissions[]"
                                                                               class="ui-checkboxradio ui-helper-hidden-accessible ml-5"
                                                                               value="{{ $map . '_' . $model }}">
                                                                        <label class="ui-checkboxradio-label"
                                                                               for="{{ $model .$indexmap }}">{{$map}}</label>
                                                                    @endforeach
                                                                @elseif($model == 'settings')
                                                                    @foreach ($mapsettting as $indexmap=>$map)
                                                                        <input type="checkbox"
                                                                               {{ $admin->hasPermission($map . '_' . $model) ? 'checked' : '' }}
                                                                               id="{{ $model  . $indexmap }}"
                                                                               name="permissions[]"
                                                                               class="ui-checkboxradio ui-helper-hidden-accessible ml-5"
                                                                               value="{{ $map . '_' . $model }}">
                                                                        <label class="ui-checkboxradio-label"
                                                                               for="{{ $model .$indexmap }}">{{$map}}</label>
                                                                    @endforeach
                                                                @else
                                                                    @foreach ($maps as $indexmap=>$map)
                                                                        <input type="checkbox"
                                                                               {{ $admin->hasPermission($map . '_' . $model) ? 'checked' : '' }}
                                                                               id="{{ $model  . $indexmap }}"
                                                                               name="permissions[]"
                                                                               class="ui-checkboxradio ui-helper-hidden-accessible ml-5"
                                                                               value="{{ $map . '_' . $model }}">
                                                                        <label class="ui-checkboxradio-label"
                                                                               for="{{ $model .$indexmap }}">{{$map}}</label>
                                                                    @endforeach
                                                                @endif

                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                @error('permissions')
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> @lang('admin/admin.back')
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>  @lang('admin/admin.update')
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
