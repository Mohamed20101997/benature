@extends('layouts.admin')
@section('title','shipping Update')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('shippings.index')}}"> الشحن </a>
                                </li>
                                <li class="breadcrumb-item active"> تعديل - {{$shipping -> name}}
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
                                    <h4 class="card-title" id="basic-layout-form"> تعديل الشحن </h4>
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
                                        <form class="form" action="{{route('shippings.update',$shipping->id)}}"
                                              method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <input name="id" value="{{$shipping -> id}}" type="hidden">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> بيانات الشحن </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <select name="country_id" class="form-control select2"
                                                                    id="countries">
                                                                <optgroup label="من فضلك اختر البلد">
                                                                    <option value="">أختر البلد</option>
                                                                    @foreach($countries as $country)
                                                                        @if($country->cities->count() !=  0)
                                                                            <option
                                                                                value="{{$country -> id }}" {{ $shipping->country_id == $country->id ? 'selected' : ''}}>
                                                                                {{$country -> name}}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </optgroup>

                                                            </select>
                                                            @error('country_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" id="city_list">
                                                        <div class="form-group">
                                                            <select name="city_id" class="form-control">
                                                                <optgroup id="city" label="من فضلك اختر المدينه">
                                                                    <option value="">أختر المدينه</option>
                                                                </optgroup>

                                                            </select>
                                                            @error('city_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> السعر </label>
                                                        <input type="number" name="price"
                                                               value="{{ old('price',$shipping->price) }}"
                                                               class="form-control">
                                                        @error('price')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> تحديث
                                                </button>
                                            </div>
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


@section('script')
    <script>
        $(document).ready(function () {
            var value = $("#countries option:selected");
            if (value.val() != 0) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id = value.val();
                var data = {
                    'id': id
                };
                $.ajax({
                    type: "GET",
                    url: '{{route("getCities")}}',
                    data: data,
                    success: function (data) {
                        var html = '';
                        $.each(data, function (k, v) {
                            html += '<option value = "' + v["id"] + '">' + v["name"] + '</option>';
                        });
                        $('#city').html(html);
                    }
                });

            }

            $(document).on('change', '#countries', function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id = $(this).val();
                var data = {
                    'id': id
                };
                $.ajax({
                    type: "GET",
                    url: '{{route("getCities")}}',
                    data: data,
                    success: function (data) {
                        var html = '';
                        $.each(data, function (k, v) {
                            html += '<option value = "' + v["id"] + '">' + v["name"] + '</option>';
                        });
                        $('#city').html(html);
                    }
                });
            });
        })
    </script>
@endsection
