<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all();

        foreach ($roles as $role) {
            for ($i = 1; $i <= 3; $i++) {
                User::create([
                    'email' => strtolower($role->name) . $i . '@example.com',
                    'password' => Hash::make('password'),
                    'name' => $role->name . ' User ' . $i,
                    'role_id' => $role->id,
                ]);
            }
        }
    }
}
