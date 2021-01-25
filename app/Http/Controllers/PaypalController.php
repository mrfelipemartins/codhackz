<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaypalController extends Controller
{
    public function webhook(Request $request) {
        if($request->event_type === 'PAYMENT.CAPTURE.COMPLETED') {
            $id = $request->resource['invoice_id'];
            \Log::info($id);
        }
    }
}
