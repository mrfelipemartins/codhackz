<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaypalController extends Controller
{
    public function webhook(Request $request) {
        \Log::info($request->all());
    }
}
