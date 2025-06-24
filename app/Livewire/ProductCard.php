<?php

namespace App\Livewire;

use Livewire\Component;

class ProductCard extends Component
{
    public $product;
    public $showFeaturedBadge = false;
    public $size = 'default';

    public function mount($product, $showFeaturedBadge = false, $size = 'default')
    {
        $this->product = $product;
        $this->showFeaturedBadge = $showFeaturedBadge;
        $this->size = $size;
    }

    public function openModal()
    {
        $this->dispatch('open-product-modal', productId: $this->product->id);
    }

    public function needsReadMore()
    {
        return strlen($this->product->description) > 120;
    }

    public function render()
    {
        return view('livewire.product-card');
    }
}
