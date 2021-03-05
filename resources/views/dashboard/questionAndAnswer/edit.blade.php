@extends('layouts.admin')
@section('title','Update Q$A')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href=""> </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('materials.index')}}">@lang('admin/question.q&a')</a>
                                </li>
                                <li class="breadcrumb-item active"> @lang('admin/question.Addq&a') </li>
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
                                    <h4 class="card-title" id="basic-layout-form"> @lang('admin/question.Updateq&a')</h4>
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
                                        <form class="form" action="{{route('question_and_answer.update', $questionAndAnswer->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mt-1">
                                                        <label class="card-title ml-1">@lang('admin/question.Question') </label>
                                                        <input type="text" name="question" value="{{old('question',$questionAndAnswer->question)}}" class="form-control" />

                                                        @error("question")
                                                        <span class="text-danger">{{$message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mt-1">
                                                        <label class="card-title ml-1">>@lang('admin/question.Answer') </label>
                                                        <input type="text" name="answer" value="{{old('answer' ,$questionAndAnswer->answer)}}" class="form-control" />

                                                        @error("answer")
                                                        <span class="text-danger">{{$message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                    <div class="form-actions">
                                        <button type="button" class="btn btn-warning mr-1"
                                                onclick="history.back();">
                                            <i class="ft-x"></i> @lang('admin/question.back')
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> @lang('admin/question.update')
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
