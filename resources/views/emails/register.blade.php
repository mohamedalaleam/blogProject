@component('mail::message')
<p>helllo {{ $user->name }}</p>
@component('mail::button',['url'=>url('verify/' .$user->remember_token)])
verify
@endcomponent
<p>in this case you have issues please contact us</p>
thank <br/>
{{ config('app.name') }}
@endcomponent
