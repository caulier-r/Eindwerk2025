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
        // Voorbeeldproducten - dit zou je later vervangen door echte database query
        $this->featuredProducts = [
            [
                'id' => 1,
                'name' => 'Advanced Police System',
                'description' => 'Een volledig politiesysteem met meldkamer, voertuigregistratie en boetesysteem.',
                'image' => 'police-system.jpg',
                'price' => 24.99,
                'category' => 'FiveM Plugin'
            ],
            [
                'id' => 2,
                'name' => 'Garage Management',
                'description' => 'Beheer je voertuigen met deze uitgebreide garage oplossing. Inclusief reparatie, tuning en parkeerplaatsbeheer.',
                'image' => 'garage-system.jpg',
                'price' => 19.99,
                'category' => 'FiveM Plugin'
            ],
            [
                'id' => 3,
                'name' => 'Discord Roleplay Bot',
                'description' => 'Verbind je Discord server met je FiveM server. Inclusief role management en server status updates.',
                'image' => 'discord-bot.jpg',
                'price' => 14.99,
                'category' => 'Discord Bot'
            ]
        ];
    }

    public function render()
    {
        return view('livewire.welcome-page');
    }
}
