<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Merchant;
use App\Models\Vendor;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchants = Merchant::all();

        foreach ($merchants as $merchant) {
            for ($i = 1; $i <= 2; $i++) {
                Vendor::create([
                    'user_id' => User::factory()->create(['role_id' => Role::where('name', 'Vendor')->first()->id])->id,
                    'merchant_id' => $merchant->id,
                    'store_name' => 'Vendor Store ' . $i,
                ]);
            }
        }
    }
}
