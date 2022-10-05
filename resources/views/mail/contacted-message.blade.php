@component('mail::message')
Hello,

Someone contacted you with a specific message:

"{{ $message}}"

Maybe you want to get in touch:{{ $email }}


@endcomponent
