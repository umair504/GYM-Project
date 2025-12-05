<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Dumbbells Set', 'price' => 50, 'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStsuxFx_26d4iKsumigu0MaVLkM0y6mxqvGw&s'],
            ['name' => 'Olympic Barbell', 'price' => 120, 'image_url' => 'https://images.unsplash.com/photo-1605296867304-46d5465a13f1'],
            ['name' => 'Weight Plates', 'price' => 80, 'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHRhGmxCPMDHB7YALaZX2pfXOQDwKHD40Q9A&s'],
            ['name' => 'Multi Gym Machine', 'price' => 450, 'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYFF5KbjGEU00k8rqvTOlaULJybv8v2cSB7Q&s'],
            ['name' => 'Resistance Bands Set', 'price' => 25, 'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxzBEpLIAyu-iIvvfUcg_M5aChLMOyQdkAdw&s'],
            ['name' => 'Kettlebell', 'price' => 60, 'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSATdXobRMIfUShpnA4oDl3URNRrmNe871nvA&s'],
            ['name' => 'Speed Jump Rope', 'price' => 15, 'image_url' => 'https://www.elitefts.com/media/catalog/product/cache/36d7bfb33e8965fc8880f222555067c7/t/a/ta128_1.jpg'],
            ['name' => 'Workout Gloves', 'price' => 20, 'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_2aVMJU1UAgTGBgCrmg5pb7OhdI8-najicQ&s'],
            ['name' => 'Yoga Mat', 'price' => 30, 'image_url' => 'https://m.media-amazon.com/images/I/31rlkB1gwwL._SR290,290_.jpg'],
            ['name' => 'Gym Bag', 'price' => 45, 'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcgyOAAmzhO2OFXv_m5-26_SGuqmYwGAuprg&s'],
            ['name' => 'Gym Towel', 'price' => 10, 'image_url' => 'https://m.media-amazon.com/images/I/41rU4iv7-nL._AC_US1000_.jpg'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
