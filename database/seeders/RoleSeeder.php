<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionsByRole = [
            'admin' => [
                'admin-analysis-read', 
                'merchant-analysis-read', 
                'vendor-analysis-read',
                'merchant-read','merchant-write', 
                'vendor-read','vendor-write',
                'brand-read','brand-write',
                'categorie-read','categorie-write',
                'product-read','product-write',
                'brand-read','brand-write',
                'coupon-read','coupon-write',
                'order-read','order-write',
            ],
            'merchant' => [
                'merchant-analysis-read', 
                'vendor-analysis-read',
                'vendor-read','vendor-write',
                'brand-read','brand-write',
                'categorie-read','categorie-write',
                'product-read','product-write',
                'brand-read','brand-write',
                'coupon-read','coupon-write',
                'order-read','order-write',
            ],
            'vendor' => [
                'vendor-analysis-read',
                'brand-read','brand-write',
                'categorie-read','categorie-write',
                'product-read','product-write',
                'brand-read','brand-write',
                'coupon-read','coupon-write',
                'order-read',
            ]
        ];

        $permissionIdsByRole = [];
        foreach ($permissionsByRole as $role => $permissions) {
            $permissionIdsByRole[$role] = collect($permissions)->map(function ($permission) {
                // Use firstOrCreate to ensure permission exists
                $permissionModel = DB::table('permissions')->where('name', $permission)->first();

                if (!$permissionModel) {
                    $id = DB::table('permissions')->insertGetId(['name' => $permission, 'guard_name' => 'web']);
                } else {
                    $id = $permissionModel->id;
                }

                return $id;
            })->toArray();
        }

        foreach ($permissionIdsByRole as $roleName => $permissionIds) {
            $role = Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);

            foreach ($permissionIds as $permissionId) {
                DB::table('role_has_permissions')->updateOrInsert(
                    ['role_id' => $role->id, 'permission_id' => $permissionId],
                    ['role_id' => $role->id, 'permission_id' => $permissionId]
                );
            }
        }

    }
}
