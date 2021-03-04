@extends('layouts.app')
@section('content')

    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/site/css/delivery.css')}}">
    @endpush

    @include('dashboard.includes.alerts.success')
    @include('dashboard.includes.alerts.errors')



    <!--delivery info-->
    <section class="delivery mt-5 pt-4">
        <div class="container">
            <div class="info">
                <h3 class="text-center"><i class="fas fa-info-circle"></i>Delivery information</h3>
                <h5 class="text-center">We deliver to all areas across Egypt.</h5>
                <p class="w-75 mr-auto ml-auto text-center">The moment you complete your purchase, your delivery will be processed. We will you send you a confirmation email to the email address you have provided, which includes the goods you have ordered and their cost.</p>
            </div>
            <h5 class="mt-5">Delivery Options</h5>
            <table class="table table-bordered mt-3">
                <thead>
                <tr>
                    <th scope="col">Home Delivery</th>
                    <th scope="col">Click & Collect</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Delivery charge is EGP 99, or free delivery on orders above EGP 399. Your order will be delivered within 1-5 days.</td>
                    <td>You can pay online and we will deliver your order to the selected store for collection. After placing your order, you’ll receive a confirmation email / text message with order number. Please wait for an email and/or SMS from us
                        telling you when it’s ready to collect.</td>
                </tr>
                <tr>
                    <td>The cash on delivery option is limited to a maximum of EGP 17,000 per order. We offer alternative payment options through debit/credit cards for orders above EGP 17,000. The cash on delivery option is subject to a surcharge of
                        EGP 50.</td>
                    <td>If you’re unable to collect your order for any reason, please contact us on 01235544112</td>
                </tr>
                </tbody>
            </table>
            <p>-Please note that we’re unable to accept orders that include either non-available item or items for collection from one of our stores as well as items for home delivery. In these cases please place two separate orders – one for collection
                and one for home delivery.</p>
            <p>-We keep your order in store for 7 business days.</p>
            <p>-All uncollected orders will be cancelled and any payments made will be refunded to the card used for the purchase.</p>
            <p>-If you’re unable to collect your order for any reason, please contact us on 01235544112</p>
        </div>
    </section>


@endsection
