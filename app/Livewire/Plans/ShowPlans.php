<?php

namespace App\Livewire\Plans;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Plan;

#[Title('Plans')]
class ShowPlans extends Component
{
    public $plans;

    public function mount()
    {
        $this->plans = Plan::orderBy('price', 'asc')->get();
    }


    public function render()
    {
        return view('livewire.plans.show-plans');
    }
}
