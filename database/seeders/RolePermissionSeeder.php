<?php

namespace Database\Seeders;

use App\Models\RolePermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RolePermission::firstOrCreate([
            'role_id' => 1,
            'permission_id' => 5
        ], [
            'route_name' => 'dashboard',
            'status' => 1,
        ]);
    }
}
