<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class DeliverOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $order = $this->order;
        if($order->type === 'premium-account') {
            $account = $this->order->account;
            $account->delivered_at = now();
            $account->save();
            $order->user->notify(new \App\Notifications\OrderDelivered($this->order, [
                'account' => $account
            ]));
            $order->status = 'DELIVERED';
            $order->save();
        } else {
            $order->messages()->create([
                'body' => 'Hello, this is an automatic message to tell you that your payment was confirmed and our team will contact you shortly! Thanks for your purchase.',
                'user_id' => 1
            ]);
        }
    }
}
