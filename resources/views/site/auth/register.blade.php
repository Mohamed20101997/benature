
@extends('layouts.app')
@section('content')
@push('style')
    <link rel="stylesheet" href=" {{ asset('assets/site/css/signout.css')}}">
@endpush

<section class="signout mt-5 mb-5 pt-4">
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="m-auto sign-in-content">
                        @include('dashboard.includes.alerts.success')
                        @include('dashboard.includes.alerts.errors')
                        <div class="d-flex singnin-guest">
                            <p>Already have account </p>
                            <p> <a href="{{url('login')}}">sign in</a></p>
                        </div>
                    <form method="POST" action="{{url('register')}}">
                        @csrf
                        @method('POST')

                            <div class="form-group">
                                <label>First Name</label>
                                <input name="f_name" value="{{old('f_name')}}" type="text" class="form-control" placeholder="First Name">
                                @error("f_name")
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input name="l_name" value="{{old('l_name')}}"  type="text" class="form-control" placeholder="Last Name">
                                @error("l_name")
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>E-Mail</label>
                                <input name="email" value="{{old('email')}}"  type="email" class="form-control" placeholder="Email">
                                @error("email")
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" name="phone" value="{{old('phone')}}"  class="form-control" placeholder="Mobile Number">
                            </div>
                            @error("phone")
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control" placeholder="Password">
                                @error("password")
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>re-Password</label>
                                <input name="password_confirmation" type="password" class="form-control" placeholder="password_confirmation">
                                @error("password_confirmation")
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                        <button class="btn btn-outline text4"  role="button" style="width: 150px; margin: 10px auto; color: #fff;">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

