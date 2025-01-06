<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;
use App\Models\ShopifyProduct;
use App\Models\Category;

class ShopifyProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendors = Vendor::all();

        foreach ($vendors as $vendor) {
            for ($i = 1; $i <= 3; $i++) {
                ShopifyProduct::create([
                    'vendor_id' => $vendor->id,
                    'brand_id' => $vendor->brands->random()->id,
                    'category_id' => Category::inRandomOrder()->first()->id,
                    'shopify_product_id' => 'SP' . rand(1000, 9999),
                    'title' => 'Product ' . $i . ' for ' . $vendor->store_name,
                    'description' => 'Description for Product ' . $i,
                    'option1' => 'Size',
                    'option2' => 'Color',
                    'option3' => null,
                ]);
            }
        }
    }
}
