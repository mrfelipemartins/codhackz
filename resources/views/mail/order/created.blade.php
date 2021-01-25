@component('mail::message')
# Your Order Details

Dear {{$order->user->name}},

Thank you for shopping at {{config('app.name')}}.

@component('mail::table')
| Product | Amount | Price |
|--|--|--|
@foreach($order->items as $item)
| {{$item->name}} | {{$item->amount}} | £{{$item->price / 100}} |
@endforeach
@endcomponent

For any assistance, please email us at support@codhackingservices.com and we will get back to you as soon as possible.

@component('mail::button', ['url' => route('orders.show', $order->uid)])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
