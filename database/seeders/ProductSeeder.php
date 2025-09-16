<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Paket Internet 10 Mbps',
                'description' => 'Paket internet cepat dengan kecepatan 10 Mbps cocok untuk browsing & sosmed.',
                'price' => 150000,
                'speed' => 10,
            ],
            [
                'name' => 'Paket Internet 20 Mbps',
                'description' => 'Kecepatan stabil 20 Mbps untuk streaming & belajar online.',
                'price' => 250000,
                'speed' => 20,
            ],
            [
                'name' => 'Paket Internet 50 Mbps',
                'description' => 'Internet super cepat 50 Mbps cocok untuk gaming & work from home.',
                'price' => 500000,
                'speed' => 50,
            ],
            [
                'name' => 'Paket Internet 100 Mbps',
                'description' => 'Premium package 100 Mbps unlimited quota.',
                'price' => 1000000,
                'speed' => 100,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
