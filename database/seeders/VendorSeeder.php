<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Merchant;
use App\Models\Vendor;
use Spatie\Permission\Models\Role;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchants = Merchant::all();

        foreach ($merchants as $merchant) {
            Vendor::create([
                'user_id' => User::factory()->create(['role_id' => Role::where('name', 'vendor')->first()->id])->id,
                'merchant_id' => $merchant->id,
                'store_name' => 'Vendor Store',
            ]);
        }
    }
}
