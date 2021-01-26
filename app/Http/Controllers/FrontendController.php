<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Mail\FormContact;
use Mail;

class FrontendController extends Controller
{
    public function index() {
        return Inertia::render('Index');
    }

    public function reviews() {
        return Inertia::render('Reviews');
    }

    public function contact() {
        return Inertia::render('Contact');
    }

    public function sendContact(Request $request) {
        Mail::to('support@codhackingservices.com')->send(new FormContact($request->all()));
    }
}
