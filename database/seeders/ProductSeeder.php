<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Advanced Police System',
                'description' => 'Een volledig politiesysteem met meldkamer, voertuigregistratie en boetesysteem.',
                'image' => 'police-system.jpg',
                'price' => 24.99,
                'category' => 'FiveM Plugin',
                'featured' => true
            ],
            [
                'name' => 'Garage Management',
                'description' => 'Beheer je voertuigen met deze uitgebreide garage oplossing. Inclusief reparatie, tuning en parkeerplaatsbeheer.',
                'image' => 'garage-system.jpg',
                'price' => 19.99,
                'category' => 'FiveM Plugin',
                'featured' => true
            ],
            [
                'name' => 'Discord Roleplay Bot',
                'description' => 'Verbind je Discord server met je FiveM server. Inclusief role management en server status updates.',
                'image' => 'discord-bot.jpg',
                'price' => 14.99,
                'category' => 'Discord Bot',
                'featured' => true
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
