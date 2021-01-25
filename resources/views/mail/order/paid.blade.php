@component('mail::message')
# We received your payment

Dear {{$order->user->name}},

Your payment via {{$order->payment_gateway}} was received. 
@if($order->type == 'premium-account')
You will receive an email with the account details shortly.
@else
Please refer to the order page to continue the delivery of your purchase.
@endif

@component('mail::button', ['url' => route('orders.show', $order->uid)])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
