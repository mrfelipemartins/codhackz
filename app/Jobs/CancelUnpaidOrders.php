<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class CancelUnpaidOrders implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $orders = Order::where('status', 'OPEN')->whereDate('created_at', '<=', now()->subHours(3)->toDateTimeString())->get();
        \Log::info($orders->count());
        foreach($orders as $order) {
            if($order->type === 'premium-account') {
                if($order->account) {
                    $account = $order->account;
                    $account->on_hold_until = null;
                    $account->order_id = null;
                    $account->save();
                }
            }
            $order->status = 'CANCELED';
            $order->save();
        }
    }
}
