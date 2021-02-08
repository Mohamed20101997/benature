
@extends('layouts.app')
@section('content')
    @section('style')
        <link rel="stylesheet" href="{{ asset('assets/site/css/signin.css')}}">
    @endsection

    <section class="signin mt-5 mb-5 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    @include('dashboard.includes.alerts.success')
                    @include('dashboard.includes.alerts.errors')
                    <div class=" m-auto sign-in-content">
                        <div>
                            <p class="text-center">Change Password</p>
                        </div>
                        <form method="post" action="{{url('resetPassword', $check_token->token)}}">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control">
                                @error("password")
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>re-Password</label>
                                <input name="password_confirmation" type="password" class="form-control">
                                @error("password_confirmation")
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-outline text4">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

