@extends('layouts.app')
@section('content')

    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/site/css/order-history.css')}}">
    @endpush

    @include('dashboard.includes.alerts.success')
    @include('dashboard.includes.alerts.errors')


    <!--order-history-->
    <section class="order-history mt-5 pt-4 mb-5">
        <div class="container">
            <div class="d-flex justify-content-between">
                <p>Order History</p>
                <p style="cursor: pointer;">Clear all</p>
            </div>
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td>Code : 123ee</td>
                    <td>4 items</td>
                    <td>$25</td>
                    <td>on 13 jan,2020</td>
                    <td>on the way</td>
                </tr>
                <tr>
                    <td>Code : 123ee</td>
                    <td>4 items</td>
                    <td>$25</td>
                    <td>on 13 jan,2020</td>
                    <td>on the way</td>
                </tr>
                <tr>
                    <td>Code : 123ee</td>
                    <td>4 items</td>
                    <td>$25</td>
                    <td>on 13 jan,2020</td>
                    <td>on the way</td>
                </tr>
                <tr>
                    <td>Code : 123ee</td>
                    <td>4 items</td>
                    <td>$25</td>
                    <td>on 13 jan,2020</td>
                    <td>on the way</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
