<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        $createPostPermission = Permission::firstOrCreate(['name' => 'create_post']);

        $adminRole->permissions()->attach($createPostPermission->id);

        echo "Admin roliga 'create_post' permission qo'shildi!\n";
    }
}
