<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Product 1',
            'user_id' => 2,
            'price' => 30000,
            'stock' => 10,
            'weight' => 500,
            'image' => 'https://i.pinimg.com/236x/ea/ef/d8/eaefd8dc4b431d679903739fb04a94dd.jpg',
            'condition' => 'Baru',
            'description' => 'Deskripsi produk yang panjang',
        ]);
    }
}
