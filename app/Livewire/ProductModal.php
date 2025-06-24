<?php

namespace App\Livewire;

use App\Models\Product;
use App\Services\CartService;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductModal extends Component
{
    public $isOpen = false;
    public $product = null;
    public $quantity = 1;

    protected $cartService;

    public function boot(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    #[On('open-product-modal')]
    public function openModal($productId)
    {
        $this->product = Product::find($productId);
        $this->quantity = 1;
        $this->isOpen = true;

        // Geen scroll als modal openstaat
        $this->js('document.body.style.overflow = "hidden"');
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->product = null;
        $this->quantity = 1;

        // Als je modal sluit weer scroll
        $this->js('document.body.style.overflow = "auto"');
    }

    public function addToCart()
    {
        if (!$this->product) {
            return;
        }

        try {
            $this->cartService->addToCart($this->product, $this->quantity);

            // Success notification
            $this->dispatch('cart-updated');
            session()->flash('success', 'Product added to cart successfully!');

            $this->closeModal();

        } catch (\Exception $e) {
            // Error notification
            session()->flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.product-modal');
    }
}
