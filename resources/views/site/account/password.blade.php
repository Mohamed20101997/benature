@extends('layouts.app')
@section('content')

    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/site/css/password.css')}}">
    @endpush

    @include('dashboard.includes.alerts.success')
    @include('dashboard.includes.alerts.errors')


    <!--acc-password-->
    <section class="acc-info mt-5 pt-4 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="m-auto  pass-content">
                        <h4 class="text-center">Change password</h4>
                        <form id="password">
                            <input type ='reset' id ='resetpassword' style="display: none" />
                            <div class="form-group">
                                <label for="exampleInputPassword1">Old Password</label>
                                <input type="password" name="old_password" class="form-control" id="exampleInputPassword1" placeholder="Old Password">
                                <span id="old_passwordError" class="alert-message text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">New Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="New Password">
                                <span id="passwordError" class="alert-message text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Repeat New Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="New Password">
                                <span id="password_confirmationError" class="alert-message text-danger"></span>
                            </div>
                            <button type="submit" id="passwordSubmit" class="btn btn-outline text4">Send code</button>
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

            $('#passwordSubmit').on('click', function(e){
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data = $('#password').serialize()
                $.ajax({
                    url: "/password",
                    type: 'POST',
                    data: data,
                    success: function(response){
                        if(response.error == 'dontMatch'){
                            new Noty({
                                theme: 'relax',
                                type:'error',
                                layout: 'topRight',
                                text : "The old password does not match our records.",
                                timeout: 2000,
                                kiler: true
                            }).show();
                        }else{

                        $('#resetpassword').click();
                        $('#old_passwordError').text('');
                        $('#passwordError').text('');
                        $('#password_confirmationError').text('');
                        new Noty({
                            theme: 'relax',
                            type:'success',
                            layout: 'topRight',
                            text : "update your Password successfully",
                            timeout: 2000,
                            kiler: true
                        }).show();
                        }
                    },
                    error: function(response){
                        $('#old_passwordError').text('');
                        $('#passwordError').text('');
                        $('#password_confirmationError').text('');

                        $('#old_passwordError').text(response.responseJSON.errors.old_password);
                        $('#passwordError').text(response.responseJSON.errors.password);
                        $('#password_confirmationError').text(response.responseJSON.errors.password_confirmation);

                    }
                });
            });
        });
    </script>
@endpush
