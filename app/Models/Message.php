<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'user_id', 'body'];

    protected $appends = ['lapse'];

    protected $with = ['user'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function order() {
        return $this->belongsTo('App\Models\Order');
    }

    public function getLapseAttribute() {
        return $this->created_at->toIso8601String();
    }
}
