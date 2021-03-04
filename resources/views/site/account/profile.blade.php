@extends('layouts.app')
@section('content')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/site/css/profile.css')}}">
@endpush

@include('dashboard.includes.alerts.success')
@include('dashboard.includes.alerts.errors')


<!--acc-profile-->
<section class="profile text-center mt-5 mb-5 pt-4">
    <div class="container">
        <h4>
            My Account
        </h4>
        <div class="row">
            <div class="col-md-4">
                <a href="{{url('account')}}">
                    <div class="content">
                        <i class="fas fa-user"></i>
                        <p>Information</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href=" {{route('orderHistory')}}">
                    <div class="content">
                        <i class="fas fa-calendar-alt"></i>
                        <p>Order History</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ url('getFavorite') }}">
                    <div class="content">
                        <i class="fas fa-heart"></i>
                        <p>My Wishlist</p>
                    </div>
                </a>
            </div>
            <a class="btn btn-outline text4" href="{{url('logout')}}" role="button" style="width: 150px; margin: 10px auto;">sign out</a>
        </div>
    </div>
</section>


@endsection
