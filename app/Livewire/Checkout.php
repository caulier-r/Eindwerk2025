<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Services\CartService;
use Livewire\Component;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Str;

class Checkout extends Component
{
    public $name = '';
    public $email = '';
    public $address = '';
    public $city = '';
    public $postal_code = '';
    public $country = 'BE';

    public $cartItems;
    public $cartTotal;

    protected $cartService;

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email',
        'address' => 'required|min:5',
        'city' => 'required|min:2',
        'postal_code' => 'required|min:4',
        'country' => 'required'
    ];

    public function boot(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function mount()
    {
        $this->cartItems = $this->cartService->getCartItems();
        $this->cartTotal = $this->cartService->getCartTotal();

        // Pre-fill with user data (inclusief saved address!)
        $user = auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->address = $user->address ?? '';
        $this->city = $user->city ?? '';
        $this->postal_code = $user->postal_code ?? '';
        $this->country = $user->country ?? 'BE';

        // Redirect if cart is empty
        if ($this->cartItems->isEmpty()) {
            return redirect()->route('cart');
        }
    }

    public function processPayment()
    {
        $this->validate();

        try {
            // Update user's address for future use
            auth()->user()->update([
                'address' => $this->address,
                'city' => $this->city,
                'postal_code' => $this->postal_code,
                'country' => $this->country,
            ]);

            // Create order in database first
            $order = Order::create([
                'client_id' => auth()->id(),
                'transaction_id' => Str::uuid(),
                'amount' => $this->cartTotal,
                'status' => 'unpaid',
                'date' => now()
            ]);

            // Add order items
            foreach ($this->cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->price
                ]);
            }

            // Create Stripe Checkout Session (much simpler!)
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => 'Order #' . $order->transaction_id,
                        ],
                        'unit_amount' => $this->cartTotal * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('checkout.cancel'),
                'metadata' => [
                    'order_id' => $order->id,
                ]
            ]);

            // Store session ID
            $order->update(['stripe_customer_id' => $session->id]);

            // Redirect to Stripe Checkout
            return redirect()->away($session->url);

        } catch (\Exception $e) {
            session()->flash('error', 'Payment failed: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
