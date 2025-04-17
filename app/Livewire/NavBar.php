<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NavBar extends Component
{
    public function render()
    {
        return view('livewire.nav-bar');
    }

    public function toggleDarkMode()
    {
        $this->dispatch('toggle-dark-mode');
    }
}
