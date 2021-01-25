@component('mail::message')
# Order Delivered

Dear {{$order->user->name}},

Thanks for your purchase. This is an email to inform you that your order was delivered.

@if($order->type === 'premium-account')
Here is your new account credentials:

E-mail: {{$data['account']->login}}

Password: {{$data['account']->password}}

E-mail Access: {{$data['account']->link}}
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
