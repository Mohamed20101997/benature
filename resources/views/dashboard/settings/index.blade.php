@extends('layouts.admin')
@section('title','Settings')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">@lang('admin/setting.settings') </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
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
                                        <div class="card-body card-dashboard">
                                            <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                                                <thead class="">
                                                <tr>
                                                    <th>@lang('admin/setting.facebook')</th>
                                                    <th>@lang('admin/setting.gmail')  </th>
                                                    <th>@lang('admin/setting.Whatsapp') </th>
                                                    <th>@lang('admin/setting.Actions') </th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @isset($settings)
                                                    @foreach($settings as $setting)
                                                        <tr>
                                                            <td>{{$setting->facebook}}</td>
                                                            <td>{{$setting->gmail}}</td>
                                                            <td> {{$setting->whatsapp}} </td>

                                                            @if (auth()->guard('admin')->user()->hasPermission('update_settings'))
                                                                <td>
                                                                    <a href="{{route('settings.edit', $setting ->id)}}" class="btn btn-outline-primary  mr-1 mb-1">@lang('admin/setting.edit') </a>
                                                                </td>
                                                            @endif
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
                    </div>
                </section>
                <!-- // Basic form layout section end -->


            </div>
        </div>
    </div>
@stop




