@extends('layouts.admin')
@section('title','Create Settings')
@section('content')
    <div class="app-content content" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">@lang('admin/setting.settings') </a>
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
                                        <form class="form" action="{{route('settings.update', $setting->id)}}"
                                              method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <hr class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i>@lang('admin/setting.settings') </h4>

                                            <h2 class="text-center m-auto">Social links</h2>
                                            <div class="row mt-5 mb-3">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('admin/setting.facebook')</label>
                                                        <input type="text" id="code"
                                                               class="form-control"
                                                               placeholder="facebook"
                                                               value="{{old('facebook',$setting->facebook)}}"
                                                               name="facebook">
                                                        @error('facebook')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('admin/setting.gmail')</label>
                                                        <input type="text" id="code"
                                                               class="form-control"
                                                               placeholder="gmail"
                                                               value="{{old('gmail', $setting->gmail)}}"
                                                               name="gmail">
                                                        @error('gmail')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('admin/setting.Whatsapp')</label>
                                                        <input type="text" id="code"
                                                               class="form-control"
                                                               placeholder="whatsapp"
                                                               value="{{old('whatsapp', $setting->whatsapp)}}"
                                                               name="whatsapp">
                                                        @error('whatsapp')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- end of the row--}}

                                            <h2 class="text-center m-auto">Beauty For You</h2>

                                            <div class="row mt-5 mb-3">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label> @lang('admin/setting.photo') 1</label>
                                                        <label id="projectinput7" class="file center-block">
                                                            <input type="file" id="imgInp" name="image1">
                                                        </label>

                                                        @error('image1')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label> @lang('admin/setting.caption') 1</label>
                                                        <input type="text" name="label1" class="form-control" value="{{old('label1', $setting->label1)}}" placeholder="Caption">
                                                        @error('label1')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <img src="{{image_path('products',$setting->image1)}}" id="blah" width="200px" alt="your image" height="200px">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label> @lang('admin/setting.photo') 2</label>
                                                        <label id="projectinput7" class="file center-block">
                                                            <input type="file" id="imgInp2" name="image2">
                                                        </label>

                                                        @error('image2')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label> @lang('admin/setting.caption') 2</label>
                                                        <input type="text" name="label2" class="form-control" value="{{old('label2', $setting->label2)}}" placeholder="Caption">
                                                        @error('label2')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mt-3">
                                                        <img src="{{image_path('products',$setting->image2)}}" id="blah2" width="200px" alt="your image" height="200px">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label> @lang('admin/setting.photo') 3</label>
                                                        <label id="projectinput7" class="file center-block">
                                                            <input type="file"  id="imgInp3" name="image3">
                                                        </label>

                                                        @error('image3')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label> @lang('admin/setting.caption') 3</label>
                                                        <input type="text" name="label3" class="form-control"  value="{{old('label3', $setting->label3)}}" placeholder="Caption">
                                                        @error('label1')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mt-3">
                                                        <img src="{{image_path('products',$setting->image3)}}" id="blah3" width="200px" alt="your image" height="200px">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label> @lang('admin/setting.photo') 4</label>
                                                        <label id="projectinput7" class="file center-block">
                                                            <input type="file" id="imgInp4" name="image4">
                                                        </label>

                                                        @error('image4')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label> @lang('admin/setting.caption') 4</label>
                                                        <input type="text" name="label4" class="form-control" value="{{old('label4', $setting->label4)}}" placeholder="Caption">
                                                        @error('label4')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mt-3">
                                                        <img src="{{image_path('products',$setting->image4)}}" id="blah4" width="200px" alt="your image" height="200px">
                                                    </div>
                                                </div>
                                            </div> {{-- end of the row --}}


                                            <h2 class="text-center m-auto">New</h2>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group mt-3">
                                                        <label> header </label>
                                                        <input type="text" name="header" value="{{old('header', $setting->header)}}" class="form-control" placeholder="header">

                                                        @error('header')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group mt-3">
                                                        <label> title </label>
                                                        <input type="text" name="title" class="form-control" value="{{old('title', $setting->title)}}" placeholder="title">

                                                        @error('title')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group mt-3">
                                                        <label> description</label>
                                                        <input type="text" name="description" class="form-control" placeholder="description" value="{{old('description', $setting->description)}}">

                                                        @error('description')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> @lang('admin/setting.back')
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>  @lang('admin/setting.update')
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

@section('script')

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
        function readURL2(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();
                $('#blah2').removeClass('hidden');
                reader.onload = function (e) {

                    $('#blah2').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#imgInp2").change(function () {
            readURL2(this);
        });
    </script>

    <script>
        function readURL3(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();
                $('#blah3').removeClass('hidden');
                reader.onload = function (e) {

                    $('#blah3').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#imgInp3").change(function () {
            readURL3(this);
        });
    </script>

    <script>
        function readURL4(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();
                $('#blah4').removeClass('hidden');
                reader.onload = function (e) {

                    $('#blah4').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#imgInp4").change(function () {
            readURL4(this);
        });
    </script>

@endsection
