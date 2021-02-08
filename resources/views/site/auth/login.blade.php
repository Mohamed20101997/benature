
@extends('layouts.app')
@section('content')
    @section('style')
        <link rel="stylesheet" href="{{ asset('assets/site/css/signin.css')}}">
    @endsection
<section class="signin mt-5 mb-5 pt-4">
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="m-auto sign-in-content">
                    <div>
                        @include('dashboard.includes.alerts.success')
                        @include('dashboard.includes.alerts.errors')
                        <p class="text-center">Sign In</p>
                    </div>
                    <form method="POST" action="{{url('login')}}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label>E-Mail</label>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                            @error("email")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <small class="form-text">
                                <a href="{{url('forgotPassword')}}">Forget Password ....!</a>
                            </small>
                        @error("password")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>

                        <button class="btn btn-outline text4"  role="button" style="width: 150px; margin: 10px auto; color: #fff;">sign In</button>
                    </form>
                    <h5 class="text-center">First Time <a href="{{url('register')}}"> Create New Account </a></h5>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

