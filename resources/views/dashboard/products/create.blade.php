@extends('layouts.admin')
@section('title','Create Product')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">@lang('admin/product.home') </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('products.index')}}">@lang('admin/product.products')  </a>
                                </li>
                                <li class="breadcrumb-item active">@lang('admin/product.addproducts')
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Form wizard with number tabs section start -->
                <section id="number-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">@lang('admin/product.addproducts')</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-h font-medium-3"></i></a>
                                </div>
                                @include('dashboard.includes.alerts.success')
                                @include('dashboard.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="number-tab-steps wizard-circle"
                                              action="{{route('products.store')}}" method="POST"
                                              enctype="multipart/form-data" id="wizard">
                                        @csrf
                                        <!-- Step 1 -->
                                            <h6> @lang('admin/product.home')</h6>
                                            <fieldset>
                                                <div class="row">
                                                    @foreach (config('translatable.locales') as $locale)
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label><i class="fa fa-list">
                                                                        |</i> @lang('admin/product.'. $locale . '.productName')
                                                                </label>
                                                                <input type="text" name="{{ $locale }}[name]"
                                                                       value="{{ old($locale . '.name') }}"
                                                                       class="form-control">

                                                                @error("$locale.name")
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>


                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6" id="cats_list">
                                                        <label>@lang('admin/product.pleaseChooseCategory') </label>
                                                        <div class="form-group">
                                                            <select class="form-control" name="mainCategory" id="categories">
                                                                <optgroup>
                                                                    <option value="0">@lang('admin/product.ChooseCategory')</option>
                                                                    @if($categories && $categories -> count() > 0)
                                                                        @foreach($categories as $category)
                                                                            @if($category->childrens->count() > 0)
                                                                                <option
                                                                                    value="{{$category -> id }}"{{ old('mainCategory') == $category->id ? 'selected' :' ' }}>
                                                                                    {{$category->name}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>

                                                            </select>

                                                            @error('categories')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" id="cats_list">
                                                        <label>@lang('admin/product.pleaseChooseSubCategory')</label>
                                                        <div class="form-group">
                                                            <select name="category_id" class="form-control"
                                                                    id="subCategory">
                                                                <optgroup id="type">

                                                                </optgroup>

                                                            </select>
                                                            @error('category_id')
                                                                <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1" name="is_active"
                                                                   id="is_active" class="switchery-default"
                                                                   data-color="success" checked/>
                                                            <label for="is_active" class="card-title ml-1 ">@lang('admin/product.status')</label>

                                                            @error("is_active")
                                                                <span class="text-danger">{{$message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label> @lang('admin/product.ChooseCountry')</label>
                                                        <div class="form-group">
                                                            <select class="form-control" name="country_id">
                                                                <optgroup>
                                                                    <option value="">@lang('admin/product.pleaseChooseCountry')</option>
                                                                    @if($countries && $countries -> count() > 0)
                                                                        @foreach($countries as $country)

                                                                            <option
                                                                                value="{{$country -> id }}"{{ old('country_id') == $country->id ? 'selected' :' ' }}>
                                                                                {{$country->name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>

                                                            </select>

                                                            @error("country_id")
                                                                <span class="text-danger">{{$message }}</span>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6" id="cats_list">
                                                        <label> @lang('admin/product.Choosebrand') </label>
                                                        <div class="form-group">
                                                            <select name="brand_id" class="form-control"
                                                                    id="brand_id">
                                                                <optgroup>
                                                                    <option value=""> @lang('admin/product.Choosebrand') </option>
                                                                    @if($brands && $brands -> count() > 0)
                                                                        @foreach($brands as $brand)
                                                                            <option value="{{$brand -> id }}" {{ old('brand_id') == $brand->id ? 'selected' :' ' }}>{{$brand -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('brand_id')
                                                                <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    @foreach (config('translatable.locales') as $locale)
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label><i class="fa fa-list">|</i> @lang('admin/product.'. $locale . '.productlDescription') </label>
                                                                <textarea class="form-control" name="{{ $locale }}[description]">{{ old($locale . '.description') }}</textarea>
                                                            </div>

                                                            @error("$locale.description")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </fieldset>

                                            <!-- Step 4 -->
                                            <h6>@lang('admin/product.specifications')</h6>
                                            <fieldset>
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">@lang('admin/product.weight')</label>
                                                            <input type="number" id="weight"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('weight')}}"
                                                                   name="weight">
                                                            @error("weight")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">@lang('admin/product.Length')</label>
                                                            <input type="number" id="length"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('length')}}"
                                                                   name="length">
                                                            @error("length")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">@lang('admin/product.width')</label>
                                                            <input type="number" id="width"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('width')}}"
                                                                   name="width">
                                                            @error("width")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">@lang('admin/product.height')</label>
                                                            <input type="number" id="height"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('height')}}"
                                                                   name="height">
                                                            @error("height")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                            </fieldset>

                                            <!-- Step 2 -->
                                            <h6>@lang('admin/product.price') </h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">@lang('admin/product.price')</label>
                                                            <input type="number" id="price"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('price')}}"
                                                                   name="price">
                                                            @error("price")
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4" id="cats_list">
                                                        <label>@lang('admin/product.pleaseChooseMaterial') </label>
                                                        <div class="form-group">
                                                            <select class="form-control" name="material_id">
                                                                <optgroup>
                                                                    <option value=" ">@lang('admin/product.ChooseMaterial')</option>
                                                                    @if($materials && $materials -> count() > 0)
                                                                        @foreach($materials as $material)
                                                                            <option
                                                                                value="{{$material -> id }}"{{ old('material_id') == $material->id ? 'selected' :' ' }}>{{$material->name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>

                                                            </select>

                                                            @error('material_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">@lang('admin/product.sale')</label>
                                                            <select name="special_price_type" class="form-control" id="special_price_type">
                                                                <optgroup label="@lang('admin/product.pleaseChoose')">
                                                                    <option value="0" {{ old('special_price_type') == 0 ? 'selected' : ''}}>
                                                                        @lang('admin/product.notAvailable')
                                                                    </option>
                                                                    <option value="1" {{old('special_price_type') == 1 ? 'selected' : ''}}>
                                                                        @lang('admin/product.Available')
                                                                    </option>
                                                                </optgroup>
                                                            </select>
                                                            @error('special_price_type')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" id="special_price" style="display: none">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">@lang('admin/product.specialprice')</label>
                                                            <input type="number"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('special_price')}}"
                                                                   name="special_price">
                                                            @error("special_price")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> @lang('admin/product.specialpricestart')</label>
                                                            <input type="date" id="special_price_start"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('special_price_start')}}"
                                                                   name="special_price_start">

                                                            @error('special_price_start')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">@lang('admin/product.specialpriceend')
                                                            </label>
                                                            <input type="date" id="special_price_end"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('special_price_end')}}"
                                                                   name="special_price_end">

                                                            @error('special_price_end')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- Step 3 -->
                                            <h6>@lang('admin/product.stock')</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">@lang('admin/product.productCode')</label>
                                                            <input type="text" id="code"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('code')}}"
                                                                   name="code">
                                                            @error("code")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> @lang('admin/product.filter') </label>
                                                            <select name="filter" class="form-control" id="filter">
                                                                <optgroup>
                                                                    <option
                                                                        value="men" {{ old('filter') == 'men' ? 'selected' :' ' }}>
                                                                        @lang('admin/product.men')
                                                                    </option>
                                                                    <option
                                                                        value="women" {{ old('filter') == 'women' ? 'selected' :' ' }} >
                                                                        @lang('admin/product.Women')
                                                                    </option>
                                                                </optgroup>
                                                            </select>
                                                            @error("filter")
                                                            <span class="text-danger">{{$message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <!-- QTY  -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">@lang('admin/product.stockStatus')</label>
                                                            <select name="in_stock" class="form-control" id="in_stock">
                                                                <optgroup label="@lang('admin/product.pleaseChoose')">
                                                                    <option
                                                                        value="1">@lang('admin/product.AvailableForSale')
                                                                    </option>
                                                                    <option
                                                                        value="0">@lang('admin/product.NotAvailableForSale')
                                                                    </option>
                                                                </optgroup>
                                                            </select>
                                                            @error('in_stock')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" style="display:none" id="qtyDiv">
                                                        <div class="form-group">
                                                            <label for="projectinput1">@lang('admin/product.quantity')</label>
                                                            <input type="number"
                                                                   id="qty"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('qty')}}"
                                                                   name="qty">
                                                            @error("qty")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- Step 4 -->
                                            <h6>@lang('admin/product.productPhoto')</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <!-- QTY  -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label> @lang('admin/product.productPhoto') </label>
                                                            <label id="projectinput7" class="file center-block">
                                                                <input type="file" id="imgInp" name="photo">

                                                            </label>

                                                            @error('photo')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <img src="" id="blah" class="hidden" width="200px"
                                                             alt="your image" height="200px">
                                                    </div>
                                                </div>

                                            </fieldset>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Form wizard with number tabs section end -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Wizard tabs with numbers setup
        $(".number-tab-steps").steps({
            headerTag: "h6",
            bodyTag: "fieldset",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "@lang('admin/product.save')",
                next: "@lang('admin/product.next')",
                previous: "@lang('admin/product.previous')",
            },
            onFinished: function (event, currentIndex) {
                $('#wizard').submit();
            }
        });
        $("#category_id").select2();
        $("#brand_id").select2();
        $("#in_stock").select2();
        $("#filter").select2();
        $("#special_price_type").select2();
    </script>

    <script>
        $(document).on('change', '#in_stock', function () {
            if ($(this).val() == 1) {
                $('#qtyDiv').css('display', 'block');
            } else {
                $('#qtyDiv').css('display', 'none');
            }
        });

        $(document).on('change', '#special_price_type', function () {
            if ($(this).val() == 1) {
                $('#special_price').css('display', 'flex');
            } else {
                $('#special_price').css('display', 'none');
            }
        });


    </script>

    <script>
        $(document).ready(function () {
            var value = $("#in_stock option:selected");
            if (value.val() != 0) {
                $('#qtyDiv').css('display', 'block');
            } else {
                $('#qtyDiv').css('display', 'none');
            }
        });

        $(document).ready(function () {
            var value = $("#special_price_type option:selected");
            if (value.val() == 1) {
                $('#special_price').css('display', 'flex');
            } else {
                $('#special_price').css('display', 'none');
            }
        });

    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();
                $('#blah').removeClass('hidden');
                reader.onload = function (e) {

                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>

    <script>

        $(document).ready(function () {
            var value = $("#categories option:selected");
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
                    url: '{{route("getCategory")}}',
                    data: data,
                    success: function (data) {
                        var html = '';
                        $.each(data, function (k, v) {
                            html += '<option value = "' + v["id"] + '">' + v["name"] + '</option>';
                        });
                        $('#type').html(html);
                    }
                });

            }
            $(document).on('change', '#categories', function () {
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
                    url: '{{route("getCategory")}}',
                    data: data,
                    success: function (data) {
                        var html = '';
                        $.each(data, function (k, v) {
                            html += '<option value = "' + v["id"] + '">' + v["name"] + '</option>';
                        });
                        $('#type').html(html);
                    }
                });
            });
        });
    </script>


@endsection
