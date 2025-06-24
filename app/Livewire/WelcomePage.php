<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class WelcomePage extends Component
{
    // Dit zou later vervangen worden door echte producten uit de database
    public $featuredProducts = [];

    public function mount()
    {
        $this->featuredProducts = Product::where('featured', true)->take(3)->get();
    }

    public function render()
    {
        return view('livewire.welcome-page');
    }
}
