<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendors = Vendor::all();

        foreach ($vendors as $vendor) {
            for ($i = 1; $i <= 2; $i++) {
                Brand::create([
                    'vendor_id' => $vendor->id,
                    'name' => 'Brand ' . $i . ' for ' . $vendor->store_name,
                    'description' => 'Description for Brand ' . $i,
                ]);
            }
        }
    }
}
