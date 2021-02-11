@extends('layouts.admin')
@section('title','Edit Category')
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
                            <li class="breadcrumb-item"><a href=""> الاقسام الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item active"> تعديل - {{$category->name}}
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
                                <h4 class="card-title" id="basic-layout-form"> تعديل قسم رئيسي </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                                    <form class="form" action="{{route('category.update', $category->id)}}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input name="id" value="{{$category->id}}" type="hidden">

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i> بيانات القسم </h4>
                                            <div class="row">
                                                @foreach (config('translatable.locales') as $locale)

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-list"> |</i> @lang('site.'. $locale .
                                                            '.categoryName')</label>
                                                        <input type="text" name="{{ $locale }}[name]"
                                                            value="{{ old($locale .'.name', $category->translate($locale)->name) }}"
                                                            class="form-control">
                                                    </div>

                                                    @error("$locale.name")
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                @endforeach
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group mt-1">
                                                        <label for="switcheryColor4" class="card-title ml-1"> الحالة
                                                        </label> <br>
                                                        <input type="checkbox" value="1" name="is_active"
                                                            id="switcheryColor4" class="switchery" data-color="success"
                                                            {{ $category->is_active == 1 ? 'checked' : '' }} />

                                                        @error("is_active")
                                                        <span class="text-danger">{{$message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group mt-1">
                                                        <label class="card-title ml-1">
                                                            قسم رئيسي
                                                        </label> <br>
                                                        <input type="radio" name="type" value="1" checked
                                                            class="switchery" data-color="success" />

                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group mt-1">
                                                        <label class="card-title ml-1">
                                                            قسم فرعي
                                                        </label><br>
                                                        <input type="radio" name="type" value="2" class="switchery"
                                                            data-color="success" />
                                                    </div>
                                                </div>
                                                <div class="hidden col-md-6" id="cats_list">
                                                    <label>من فضلك اختر القسم </label>
                                                    <div class="form-group">
                                                        <select name="parent_id" class="form-control select2">
                                                            <optgroup label="من فضلك أختر القسم ">
                                                                @if($categories && $categories -> count() > 0)
                                                                <option value="">أختر القسم</option>
                                                                @foreach($categories as $mainCategory)
                                                                <option value="{{$mainCategory -> id }}"
                                                                    {{$mainCategory->id == $category->parent_id ? 'selected' : ''}}>
                                                                    {{$mainCategory -> name}}</option>
                                                                @endforeach
                                                                @endif
                                                            </optgroup>

                                                        </select>

                                                        @error('parent_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> انشاء
                                            </button>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- // Basic form layout section end -->
    </div>
</div>
</div>
@section('script')

<script>
    $('input:radio[name="type"]').change(
        function () {
            if (this.checked && this.value == '2') { // 1 if main cat - 2 if sub cat
                $('#cats_list').removeClass('hidden');
            } else {
                $('#cats_list').addClass('hidden');
            }
        });

</script>

@endsection

@stop
