<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\DeliverOrder;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['uid', 'status', 'payment_gateway', 'type'];

    protected $with = ['items', 'user'];

    protected $appends = ['total', 'lapse'];

    public function items() {
        return $this->hasMany('App\Models\OrderItem');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function getTotalAttribute() {
        $total = 0;
        foreach($this->items as $item) {
            $total += $item->price;
        }
        return $total;
    }

    public function deliver() {
        DeliverOrder::dispatch($this);
    }
    
    public function getLapseAttribute() {
        return $this->created_at->diffForHumans();
    }

    public function account() {
        return $this->hasOne('App\Models\Account');
    }

    public function messages() {
        return $this->hasMany('App\Models\Message');
    }
}
