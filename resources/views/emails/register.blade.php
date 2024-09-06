@component('mail::message')
    
    <p>Hello{{ $user->name }}</p>

    @component('mail::button' , ['url' => url('verify/'. $user->remember_token)])
    Verify
    @endcomponent

    <p>in case you have issuues please content our contact us</p>

    thanks <br>
    {{ config('app.name') }}
@endcomponent

    
