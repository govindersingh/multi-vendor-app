<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all();

        foreach ($roles as $key => $role) {
            User::create([
                'email' => strtolower($role->name) . '@example.com',
                'password' => Hash::make('password'),
                'name' => $role->name . ' User',
                'role_id' => $role->id,
            ]);
        }
    }
}
