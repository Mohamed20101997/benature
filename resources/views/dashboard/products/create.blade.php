@extends('layouts.admin')
@section('title','Brands Create')
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
                                <li class="breadcrumb-item"><a href="{{route('products.index')}}">ألمنتجات </a>
                                </li>
                                <li class="breadcrumb-item active">  أضافه منتج
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
                                <h4 class="card-title">اضافة منتج جديد</h4>
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
                                        <h6> الرئيسه</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الاسم</label>
                                                        <input type="text" id="name"
                                                               class="form-control"
                                                               placeholder="من فضلك اضف اسم المنتج"
                                                               value="{{old('name')}}"
                                                               name="name">
                                                        @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="projectinput1">الاسم بالرابط</label>
                                                        <input type="text"
                                                               class="form-control"
                                                               placeholder="  "
                                                               value="{{old('slug')}}"
                                                               name="slug">
                                                        @error("slug")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">وصف المنتج</label>
                                                        <textarea name="description" id="description"
                                                                  class="form-control"
                                                                  placeholder="  "
                                                        >{{old('description')}}</textarea>

                                                        @error("description")
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">النوع</label>
                                                        <input type="text"
                                                               class="form-control"
                                                               placeholder="  "
                                                               value="{{old('type')}}"
                                                               name="type">
                                                        @error("type")
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label
                                                            for="projectinput1">الماده</label>
                                                        <input type="text"
                                                               class="form-control"
                                                               placeholder="  "
                                                               value="{{old('matrial')}}"
                                                               name="matrial">
                                                        @error("matrial")
                                                         <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4" id="cats_list">
                                                    <label>من فضلك اختر القسم </label>
                                                    <div class="form-group">
                                                        <select name="category_id" class="form-control" id="categories">
                                                            <optgroup>
                                                                 <option value="">أختر القسم</option>
                                                                @if($categories && $categories -> count() > 0)
                                                                    @foreach($categories as $category)
                                                                        <option value="{{$category -> id }}"{{ old('category_id') == $category->id ? 'selected' :' ' }}>{{$category -> name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </optgroup>

                                                        </select>

                                                        @error('categories.0')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4" id="cats_list">
                                                    <label> اختر العلامه التجاريه </label>
                                                    <div class="form-group">
                                                        <select name="brand_id" class="form-control" id="brand_id">
                                                            <optgroup>
                                                                <option value="">أختر العلامه التجاريه</option>
                                                                @if($brands && $brands -> count() > 0)
                                                                    @foreach($brands as $brand)
                                                                        <option value="{{$brand -> id }}" {{ old('brand_id') == $brand->id ? 'selected' :' ' }}>{{$brand -> name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </optgroup>
                                                        </select>
                                                        @error('brand')
                                                            <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" id="cats_list">
                                                <div class="col-md-12">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" value="1"
                                                               name="is_active" id="is_active" class="switchery switchery-default" data-color="success" checked/>
                                                        <label for="is_active" class="card-title ml-1">الحاله</label>

                                                        @error("is_active")
                                                            <span class="text-danger">{{$message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>

                                        <!-- Step 4 -->
                                        <h6>مواصفات</h6>
                                        <fieldset>
                                            <div class="row">

                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                        for="projectinput1">الحجم</label>
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
                                                        for="projectinput1">الطول</label>
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
                                                        for="projectinput1">العرض</label>
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
                                                        for="projectinput1">الارتفاع</label>
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
                                        <h6>السعر </h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="projectinput1">السعر</label>
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
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="projectinput1">سعر خاص</label>
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
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> تاريخ البداية </label>
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
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> تاريخ النهايه
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
                                        <h6>المخزن</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="projectinput1">كود المنتج</label>
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
                                                        <label for="projectinput1">تتبع المستودع</label>
                                                        <select name="manage_stock" style="width: 100%" class="form-control" id="manageStock">
                                                            <optgroup label="من فضلك أختر النوع ">
                                                                <option value="1">اتاحة التتبع</option>
                                                                <option value="0" selected>عدم اتاحه التتبع</option>
                                                            </optgroup>
                                                        </select>
                                                        @error('in_stock')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- QTY  -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="projectinput1">الحاله</label>
                                                        <select name="in_stock" class="form-control">
                                                            <optgroup label="من فضلك اختر">
                                                                <option
                                                                    value="1">متاح</option>
                                                                <option
                                                                    value="0">غير متاح</option>
                                                            </optgroup>
                                                        </select>
                                                        @error('in_stock')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="display:none" id="qtyDiv">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الكميه</label>
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
                                        <h6>صورة المنتج</h6>
                                        <fieldset>
                                            <div class="row">
                                                <!-- QTY  -->
                                                <div class="col-md-6" >
                                                    <div class="form-group">
                                                        <label> صوره المنتج </label>
                                                        <label id="projectinput7" class="file center-block">
                                                            <input type="file" id="imgInp" name="photo">

                                                        </label>

                                                        @error('photo')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <img src="" id="blah" class="hidden" width="200px" alt="your image" height="200px">
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
                finish: "حفظ",
                next: "التالي",
                previous: "السابق",
            },
            onFinished: function (event, currentIndex) {
                $('#wizard').submit();
            }
        });
        $("#category_id").select2();
        $("#brand_id").select2();
        $("#in_stock").select2();
        $("#manageStock").select2();
        $("#special_price_type").select2();
    </script>
    <script>
    $(document).on('change', '#manageStock', function () {
        if ($(this).val() == 1) {
            $('#qtyDiv').show();
        } else {
            $('#qtyDiv').hide();
        }
    });

    </script>

    <script>
        function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();
    $('#blah').removeClass('hidden');
    reader.onload = function(e) {

      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
        </script>

@endsection
