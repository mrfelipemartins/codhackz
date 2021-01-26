<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\AccountsController;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontendController::class, 'sendContact'])->name('sendContact');
Route::get('/reviews', [FrontendController::class, 'reviews'])->name('reviews.index');

Route::prefix('webhook')->group(function() {
    Route::post('stripe', [StripeController::class, 'webhook']);
    Route::post('paypal', [PaypalController::class, 'webhook']);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/my-account', [DashboardController::class, 'account'])->name('dashboard');

    Route::resource('orders', OrdersController::class);
    Route::resource('orders/{id}/messages', MessagesController::class);
    Route::get('orders/place/{product_name}', [OrdersController::class, 'place'])->name('orders.place');
    Route::get('orders/{uid}/checkout', [OrdersController::class, 'checkout'])->name('orders.checkout');
    Route::get('orders/{uid}/success', [OrdersController::class, 'success'])->name('orders.success');
    Route::get('orders/{uid}/fail', [OrdersController::class, 'fail'])->name('orders.fail');
    Route::post('orders/{uid}/pending', [OrdersController::class, 'pending'])->name('orders.pending');
    Route::post('orders/{uid}/deliver', [OrdersController::class, 'deliver'])->name('orders.deliver');
    Route::post('orders/{uid}/cancel', [OrdersController::class, 'cancel'])->name('orders.cancel');
    Route::post('orders/{uid}/pay', [OrdersController::class, 'pay'])->name('orders.pay');

    Route::resource('accounts', AccountsController::class);

    Route::prefix('stripe')->group(function() {
        Route::post('create-checkout-session', [StripeController::class, 'createCheckoutSession'])->name('stripe.session');
    });

    Route::get('/dashboard', function() {
        return redirect()->route('dashboard');
    });

    Route::get('test/{msg}', function($msg) {
        \App\Models\User::findOrFail(1)->notify(new \App\Notifications\DiscordMessage($msg));
    });
});