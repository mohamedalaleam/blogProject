@component('mail::message')
<p>helllo {{ $user->name }}</p>
<p>we understand it happend </p>
@component('mail::button',['url'=>url('reset/' .$user->remember_token)])
Reset Your Password
@endcomponent
<p>in Case you have any issues recovering your password , please contact us</p>
thank <br/>
{{ config('app.name') }}
@endcomponent
