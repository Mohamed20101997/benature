@component('mail::message')

Welcome {{ $data['data']->name }} <br>

Welcome to benatur site ,

@component('mail::button', ['url' => url('resetPassword',$data['token'])])
Click Here For Reset Password
@endcomponent
OR <br>
Copy This Link
<a href="url('resetPassword'.$data['token'])">{{ url('resetPassword',$data['token']) }}</a>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
