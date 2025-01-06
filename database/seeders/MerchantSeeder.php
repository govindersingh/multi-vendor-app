<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Merchant;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchantUsers = User::whereHas('role', function ($query) {
            $query->where('name', 'Merchant');
        })->get();

        foreach ($merchantUsers as $user) {
            Merchant::create([
                'user_id' => $user->id,
                'business_name' => $user->name . "'s Business",
            ]);
        }
    }
}
