<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Merchant;
use Spatie\Permission\Models\Role;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchantRole = Role::where('name', 'merchant')->first();
        $usersWithMerchantRole = User::where('role_id', $merchantRole->id)->get();

        foreach ($usersWithMerchantRole as $user) {
            Merchant::create([
                'user_id' => $user->id,
                'business_name' => $user->name . "'s Business",
            ]);
        }
    }
}
