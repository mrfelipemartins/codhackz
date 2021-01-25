<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['login', 'password', 'link', 'description'];

    public function order() {
        return $this->belongsTo('App\Models\Order');
    }
}
