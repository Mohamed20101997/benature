
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
                            <p class="text-center">Forget Password</p>
                        </div>
                        <form method="post" action="{{url('forgotPasswordPost')}}">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input type="email" name="email" class="form-control" required placeholder="Email">
                            </div>
                            @error('email')
                                 <span class="text-danger">{{$message}}</span>
                            @enderror
                            <button type="submit" class="btn btn-outline text4">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

