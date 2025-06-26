<?php

namespace App\Livewire;

use App\Models\CartItem;
use App\Services\CartService;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Cart')]
class Cart extends Component
{
    protected $cartService;

    protected $listeners = [
        'cart-updated' => '$refresh'
    ];

    public function boot(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function removeFromCart($productId)
    {
        $product = \App\Models\Product::find($productId);
        if ($product) {
            $this->cartService->removeFromCart($product);
            $this->dispatch('cart-updated');
            session()->flash('success', 'Product removed from cart');
        }
    }

    public function updateQuantity($cartItemId, $quantity)
    {
        // Valideer quantity - tussen 1 en 99
        $quantity = max(1, min(99, (int)$quantity));

        $cartItem = CartItem::find($cartItemId);
        if ($cartItem && $cartItem->user_id === auth()->id()) {
            $cartItem->update(['quantity' => $quantity]);
            $this->refreshCart(); // Of je method om cart te vernieuwen
        }
    }

    public function render()
    {
        $cartItems = $this->cartService->getCartItems();
        $cartTotal = $this->cartService->getCartTotal();

        return view('livewire.cart', [
            'cartItems' => $cartItems,
            'cartTotal' => $cartTotal
        ]);
    }
}
