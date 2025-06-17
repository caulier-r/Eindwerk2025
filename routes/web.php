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

Route::get('/auth/redirect/google', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/callback/google', [GoogleController::class, 'callback'])->name('google.callback');

Route::get('/auth/redirect/github', [GitHubController::class, 'redirect'])->name('github.redirect');
Route::get('/auth/callback/github', [GitHubController::class, 'callback'])->name('github.callback');

Route::get('/pricing', ShowPlans::class)->name('pricing');

Route::post('/checkout/{plan}', function (Request $request, Plan $plan) {
    $user = $request->user();

    return $user->newSubscription('default', $plan->stripe_price_id)
        ->checkout([
            'success_url' => route('dashboard'),
            'cancel_url' => route('pricing'),
        ]);
})->middleware(['auth'])->name('checkout');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/highlights', function () {
    return view('highlights');
})->name('highlights');

// ✅ Publieke product pagina voor alle gebruikers
Route::get('/products', [ProductController::class, 'publicIndex'])->name('products');

// Voor ingelogde gebruikers
Route::middleware(['auth'])->group(function () {
    Route::get('/my-plugins', function () {
        return view('my-plugins');
    })->name('my-plugins');

    Route::get('/invoices', function () {
        return view('invoices');
    })->name('invoices');
});

// ✅ Groupe met authentificatie
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::get('/users', ShowUsers::class)->name('users.index');
    Route::get('/users/create', CreateUser::class)->name('users.create');
    Route::get('/users/{user}/edit', EditUser::class)->name('users.edit');

    // Role routes
    Route::get('/roles', \App\Livewire\Roles\ShowRoles::class)->name('roles.index');
    Route::get('/roles/create', \App\Livewire\Roles\CreateRole::class)->name('roles.create');
    Route::get('/roles/{role}/edit', \App\Livewire\Roles\EditRole::class)->name('roles.edit');

    // Subscriptions
    Route::get('/subscriptions', Subscriptions::class)->name('subscriptions');
});

// ✅ Routes beschermd door abonnement
Route::middleware(['auth', 'check.plan'])->group(function () {
    Route::get('/orders', \App\Livewire\Orders\ShowOrders::class)->name('orders.index');
    Route::get('/orders/{order}', ShowOrder::class)->name('orders.show');
    Route::get('/orders/{order}/download', function (\App\Models\Order $order) {
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('livewire.orders.orderPDF', [
            'order' => $order,
            'user' => Auth::user(),
        ]);

        return $pdf->download("order-{$order->transaction_id}.pdf");
    })->name('orders.download');
});

// ✅ Product beheer voor admin/verkoper
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Controleer of user admin is OF verkoper rol heeft
    Route::middleware(function ($request, $next) {
        $user = $request->user();
        if ($user->hasRole('admin') || $user->hasRole('verkoper') || $user->is_admin) {
            return $next($request);
        }
        abort(403, 'Geen toegang tot admin gebied');
    })->group(function () {
        Route::resource('products', ProductController::class);
    });
});

Route::post('/stripe/webhook', [StripeWebhookController::class, 'handleWebhook']);

require __DIR__.'/auth.php';
