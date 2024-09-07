@component('mail::message')
    
    <p>Hello{{ $user->name }}</p>

    <p>we understand what happend</p>

    @component('mail::button' , ['url' => route('reset/', $user->remember_token)])
    Rest Your Password
    @endcomponent

    <p>in case you have any issuue please recover your password</p>

    thanks <br>
    {{ config('app.name') }}
@endcomponent

    
