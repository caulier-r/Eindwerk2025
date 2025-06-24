<?php

namespace App\Livewire;

use App\Services\CartService;
use Livewire\Component;

class CartIcon extends Component
{
    public $cartCount = 0;

    protected $cartService;

    protected $listeners = [
        'cart-updated' => 'updateCartCount'
    ];

    public function boot(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function mount()
    {
        $this->updateCartCount();
    }

    public function updateCartCount()
    {
        $this->cartCount = $this->cartService->getCartCount();
    }

    public function render()
    {
        return view('livewire.cart-icon');
    }
}
