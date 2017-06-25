@component('mail::message')
Welcome {{ $user->name }} to {{ config('app.name') }}. We hope you will enjoy it!

@component('mail::button', ['url' => url('/')])
Check your tasks
@endcomponent

Thanks,<br>
{{ config('app.name') }} team
@endcomponent
