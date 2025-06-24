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
                'name' => 'Kapot Refund System',
                'description' => ' This script allows administrators to easily create refund codes, ensuring players receive the correct compensation. It supports cash, black money, and items, making it a complete refund solution for ESX servers.',
                'image' => 'rv-product5m.png',
                'price' => 14.99,
                'category' => 'FiveM Plugin',
                'frameworks' => ['ESX'],
                'featured' => true
            ],
            [
                'name' => 'Emergency Vehicle Whitelist',
                'description' => 'This script prevents unauthorized players from entering government vehicles. Only players with an authorized job can get in. Unauthorized attempts are automatically logged and forwarded to a Discord webhook.',
                'image' => 'rv-product5m.png',
                'price' => 7.99,
                'category' => 'FiveM Plugin',
                'frameworks' => ['QBCore', 'ESX'],
                'featured' => true
            ],
            [
                'name' => 'Player ID Display',
                'description' => '
                Quick ID Access – Hold down the DELETE key to reveal the IDs of nearby players displayed above their heads.

                ⚡ Optimized Performance – This script runs efficiently with minimal resource usage, ensuring smooth server performance. ',
                'image' => 'rv-product5m.png',
                'price' => 7.99,
                'category' => 'FiveM Plugin',
                'frameworks' => ['QBCore', 'ESX'],
                'featured' => true
            ],
            [
                'name' => 'Kapot Death Announcements',
                'description' => 'Bring drama and realism to your FiveM server with the Death Announcements script! This script allows authorized roles, such as emergency services, to declare a player dead, sending a custom message to everyone on the server. Enhance your roleplay scenarios with this immersive and impactful addition.',
                'image' => 'rv-product5m.png',
                'price' => 3.99,
                'category' => 'FiveM Plugin',
                'frameworks' => ['QBCore', 'ESX'],
                'featured' => true
            ],
            [
                'name' => 'GAS Station Safety Override',
                'description' => '
                ✅ Explosion Prevention – This script prevents gas stations from exploding when vehicles collide with them, ensuring a safer gameplay environment.

                ✅ Rock Solid Structure – Gas stations are made "indestructible," eliminating accidental explosions and promoting a more stable experience.

                ⚡ Optimized Performance – This script runs efficiently with an average usage of only 0.02ms, ensuring smooth server performance without lag.

                Watch the demo here: https://youtu.be/Ou4lHozaCUk',
                'image' => 'rv-product5m.png',
                'price' => 3.99,
                'category' => 'FiveM Plugin',
                'frameworks' => ['QBCore', 'ESX'],
                'featured' => true
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
