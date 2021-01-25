<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Order;

class StripeController extends Controller
{
    public function createCheckoutSession(Request $request) {
        Stripe::setApiKey('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');
        $order = Order::where('uid', $request->uid)->firstOrFail();
        $items = [];
        foreach($order->items as $item) {
            $items[] = [
                'price_data' => [
                    'currency' => 'gbp',
                    'product_data' => [
                        'name' => $item->name
                    ],
                    'unit_amount' => $item->price
                ],
                'quantity' => $item->amount
            ];
        }
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $items,
            'mode' => 'payment',
            'success_url' => route('orders.success', $order->uid),
            'cancel_url' => route('orders.fail', $order->uid),
            'client_reference_id' => $order->uid
        ]);
        return response()->json([
            'id' => $session->id
        ], 200);
    }

    public function webhook(Request $request) {
        if($request->type === 'checkout.session.completed') {
            $order = Order::where('uid', $request->data['object']['client_reference_id'])->firstOrFail();
            if($request->data['object']['payment_status'] == 'paid') {
                $order->status = 'PAID';
                $order->payment_gateway = 'STRIPE';
                $order->save();
                $order->user->notify(new \App\Notifications\OrderPaid($order));
                $order->deliver();
            } else {
                \Log::info($request->data['object']);
            }
        }
    }
}
