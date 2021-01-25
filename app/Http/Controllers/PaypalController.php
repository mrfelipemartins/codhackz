<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaypalController extends Controller
{
    public function webhook(Request $request) {
        if($request->event_type === 'PAYMENT.CAPTURE.COMPLETED') {
            $id = $request->resource['invoice_id'];
            $order = Order::where('uid', $id)->firstOrFail();
            $order->status = 'PAID';
            $order->payment_gateway = 'STRIPE';
            $order->save();
            $order->user->notify(new \App\Notifications\OrderPaid($order));
            $order->deliver();
        }
    }
}
