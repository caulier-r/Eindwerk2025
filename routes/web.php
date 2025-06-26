<?php

use App\Http\Controllers\Auth\GitHubController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\ProductController;
use App\Livewire\Orders\ShowOrder;
use App\Livewire\Plans\ShowPlans;
use App\Livewire\Subscriptions;
use App\Livewire\Users\CreateUser;
use App\Livewire\Users\EditUser;
use App\Livewire\Users\ShowUsers;
use App\Models\Order;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// ==========================================
// PUBLIC ROUTES (No authentication required)
// ==========================================

// Home & Marketing Pages
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/portfolio', function (){
    return view('pages.portfolio');
})->name('portfolio');

Route::get('/about', function (){
    return view('pages.about');
})->name('about');

Route::get('/contact', function (){
    return view('pages.contact');
})->name('contact');

Route::get('/pricing', ShowPlans::class)->name('pricing');

Route::get('/highlights', function () {
    return view('highlights');
})->name('highlights');

Route::post('/contact', function (Request $request) {
    // Validatie
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'project_type' => 'required|string',
        'message' => 'required|string',
    ]);

    // Hier kun je later email logica toevoegen
    // Mail::to('hello@rvdesign.dev')->send(new ContactMessage($request->all()));

    // Voor nu, redirect terug met success message
    return redirect()->back()->with('success', 'Thank you for your message! We\'ll get back to you within 24 hours.');
})->name('contact.store');

// ==========================================
// AUTHENTICATION ROUTES
// ==========================================

// Social Login Routes
Route::get('/auth/redirect/google', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/callback/google', [GoogleController::class, 'callback'])->name('google.callback');

Route::get('/auth/redirect/github', [GitHubController::class, 'redirect'])->name('github.redirect');
Route::get('/auth/callback/github', [GitHubController::class, 'callback'])->name('github.callback');

// ==========================================
// AUTHENTICATED USER ROUTES
// ==========================================

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
        ->middleware(['verified'])
        ->name('dashboard');

    // User Profile & Settings
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    // Winkelcar
    Route::get('/cart', \App\Livewire\Cart::class)->name('cart');

    // User Management
    Route::get('/users', ShowUsers::class)->name('users.index');
    Route::get('/users/create', CreateUser::class)->name('users.create');
    Route::get('/users/{user}/edit', EditUser::class)->name('users.edit');

    // Role Management
    Route::get('/roles', \App\Livewire\Roles\ShowRoles::class)->name('roles.index');
    Route::get('/roles/create', \App\Livewire\Roles\CreateRole::class)->name('roles.create');
    Route::get('/roles/{role}/edit', \App\Livewire\Roles\EditRole::class)->name('roles.edit');

    // User Dashboard Pages
    Route::get('/my-plugins', function () {
        return view('my-plugins');
    })->name('my-plugins');

    Route::get('/invoices', function () {
        return view('invoices');
    })->name('invoices');

    Route::get('/products', [ProductController::class, 'publicIndex'])->name('products');

    // Subscription Management
    Route::get('/subscriptions', Subscriptions::class)->name('subscriptions');

//    // Checkout
//    Route::post('/checkout/{plan}', function (Request $request, Plan $plan) {
//        $user = $request->user();
//
//        return $user->newSubscription('default', $plan->stripe_price_id)
//            ->checkout([
//                'success_url' => route('dashboard'),
//                'cancel_url' => route('pricing'),
//            ]);
//    })->name('checkout');

    // E-commerce routes
    Route::get('/checkout', \App\Livewire\Checkout::class)->name('checkout');
    Route::get('/checkout/success', function () {
        return view('checkout.success');
    })->name('checkout.success');
    Route::get('/checkout/cancel', function () {
        return view('checkout.cancel');
    })->name('checkout.cancel');
});

// ==========================================
// SUBSCRIPTION PROTECTED ROUTES
// ==========================================

Route::middleware(['auth'])->group(function () {

    // Order Management
    Route::get('/orders', \App\Livewire\Orders\ShowOrders::class)->name('orders.index');
    Route::get('/orders/{order}', ShowOrder::class)->name('orders.show');

    // Order PDF Download
    Route::get('/orders/{order}/download', function (\App\Models\Order $order) {
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('livewire.orders.orderPDF', [
            'order' => $order,
            'user' => Auth::user(),
        ]);

        return $pdf->download("order-{$order->transaction_id}.pdf");
    })->name('orders.download');
});

// ==========================================
// ADMIN ROUTES
// ==========================================

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
});

// ==========================================
// WEBHOOKS & API
// ==========================================

Route::post('/stripe/webhook', [StripeWebhookController::class, 'handleWebhook']);

//test route voor de betaling
Route::middleware('auth')->group(function () {
    Route::get('/test-mark-paid', function () {
        $order = \App\Models\Order::where('client_id', auth()->id())->latest()->first();
        if ($order) {
            $order->update(['status' => 'paid']);
            \App\Models\CartItem::where('user_id', auth()->id())->delete();
            return redirect()->route('dashboard')->with('success', 'Order marked as paid and cart cleared!');
        }
        return redirect()->route('dashboard')->with('error', 'No recent order found.');
    })->name('test.mark-paid');

    Route::get('/test-order-status', function () {
        $orders = \App\Models\Order::where('client_id', auth()->id())->latest()->take(5)->get();
        return view('test-orders', compact('orders'));
    })->name('test.orders');
});

// ==========================================
// AUTH PACKAGE ROUTES
// ==========================================

require __DIR__.'/auth.php';
