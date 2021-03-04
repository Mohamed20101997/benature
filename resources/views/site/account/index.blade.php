@extends('layouts.app')
@section('content')

    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/site/css/acc-info.css')}}">
    @endpush

    @include('dashboard.includes.alerts.success')
    @include('dashboard.includes.alerts.errors')



    <!--acc-info-->
    <section class="acc-info mt-5 pt-4 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <div class="m-auto  info-content">
                        <h4 class="text-center">personal information</h4>
                        <form id="account">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="f_name" class="form-control" value="{{old('f_name', $user->f_name)}}" required id="inputEmail3" placeholder="First Name">
                                    <span id="f_nameError" class="alert-message text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="l_name"  value="{{old('l_name', $user->l_name)}}" required class="form-control" id="inputEmail3" placeholder="Last Name">
                                    <span id="l_nameError" class="alert-message text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email"  value="{{old('email', $user->email)}}" class="form-control" id="inputEmail3" placeholder="Email">
                                    <span id="emailError" class="alert-message text-danger"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone"  value="{{old('phone', $user->phone)}}" class="form-control" id="inputPassword3" placeholder="Phone">
                                    <span id="phoneError" class="alert-message text-danger"></span>
                                </div>
                            </div>
                            <button type="submit" id="accountSubmit" class="btn btn-outline text4">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('script')
    <script>

        jQuery(document).ready(function(){

            $('#accountSubmit').on('click', function(e){
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data = $('#account').serialize()
                $.ajax({
                    url: "/account",
                    type: 'POST',
                    data: data,
                    success: function(response){

                        $('#f_nameError').text('');
                        $('#l_nameError').text('');
                        $('#emailError').text('');
                        $('#phoneError').text('');
                        new Noty({
                            theme: 'relax',
                            type:'success',
                            layout: 'topRight',
                            text : "update information successfully",
                            timeout: 2000,
                            kiler: true
                        }).show();
                    },
                    error: function(response){
                        $('#f_nameError').text('');
                        $('#l_nameError').text('');
                        $('#emailError').text('');
                        $('#phoneError').text('');

                        $('#f_nameError').text(response.responseJSON.errors.f_name);
                        $('#l_nameError').text(response.responseJSON.errors.l_name);
                        $('#emailError').text(response.responseJSON.errors.email);
                        $('#phoneError').text(response.responseJSON.errors.phone);
                    }
                });
            });
        });
    </script>
@endpush
